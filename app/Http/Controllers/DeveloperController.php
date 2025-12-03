<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DeveloperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $developers = Developer::orderBy('company_name')->paginate(18)->onEachSide(1);

        return view('developers.index', compact('developers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $games = Game::orderBy('title')->get();
        return view('developers.create', compact('games'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_name' => ['required', 'string', 'max:255'],
            'founded'      => ['required', 'integer', 'min:1800', 'max:' . date('Y')],
            'country'      => ['required', 'string', 'max:255'],
            'logo_img'     => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],

            // games pivot
            'games'   => ['nullable', 'array'],
            'games.*' => ['exists:games,id'],
        ]);

        // Handle logo image upload
        if ($request->hasFile('logo_img')) {
            $imageName = Str::uuid() . '.' . $request->logo_img->extension();
            $request->file('logo_img')->move(public_path('images/developers'), $imageName);
            $validated['logo_img'] = $imageName;
        }

        $developer = Developer::create($validated);

        // Attach games
        if (!empty($validated['games'])) {
            $developer->games()->sync($validated['games']);
        }

        return to_route('developers.index')->with('success', 'Developer added successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Developer $developer)
    {
        //
        return view('developers.show', compact('developer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Developer $developer)
    {
        $games = Game::orderBy('title')->get();
        return view('developers.edit', compact('games', 'developer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Developer $developer)
    {
        $validated = $request->validate([
            'company_name' => ['required', 'string', 'max:255'],
            'founded'      => ['required', 'integer', 'min:1800', 'max:' . date('Y')],
            'country'      => ['required', 'string', 'max:255'],
            'logo_img'     => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],

            // games pivot
            'games'   => ['nullable', 'array'],
            'games.*' => ['exists:games,id'],
        ]);

        // check if image is uploaded
        // if it is set give a unique file name and delete old image
        if ($request->hasFile('logo_img')) {

            // delete old image if file found
            $oldPath = public_path('images/developers/' . $developer->logo_img);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }

            $imageName = Str::uuid() . '.' . $request->logo_img->extension();
            $request->file('cover_img')->move(public_path('images/developers'), $imageName);

            $validated['logo_img'] = $imageName;
        } else { // if image not uploaded, use old image
            $imageName = $developer->logo_img;
            $validated['logo_img'] = $imageName;
        }

        $developer->update($validated);

        // Sync games
        $developer->games()->sync($validated['games'] ?? []);

        return to_route('developers.show', $developer)->with('success', 'Developer updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Developer $developer)
    {
        // delete old image from public folder if file found
        $oldPath = public_path('images/developers/' . $developer->logo_img);

        if (file_exists($oldPath)) {
            // get folder name if any
            $parts = explode('/', $developer->logo_img);
            $folder = count($parts) > 1 ? $parts[0] : null;

            // only delete if not in 'seeded' or 'placeholder' folders
            if (!in_array($folder, ['seeded', 'placeholder'])) {
                unlink($oldPath);
            }
        }

        $developer->delete();

        return to_route('developers.index')->with('success', 'Developer deleted successfully!');
    }
}
