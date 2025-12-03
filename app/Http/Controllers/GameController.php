<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // implement search functionality
        $query = Game::query();

        // if search input exists, filter games by title
        if ($search = $request->input('search')) {
            $query->where('title', 'like', "%{$search}%");
        }

        // create a variable from the cards info in url
        // default 18
        $cards = $request->input('cards', 18);

        // create the games data from the query ordered by creation date
        // this will get all games if no search input
        // paginate function to tell laravel how many game cards per page
        $games = $query->orderBy('created_at', 'desc')->paginate($cards)->onEachSide(1);

        // create array to be appended to the returned view
        $append = [
            'search' => $request->input('search')
        ];

        // if default value don't append to array
        if ($cards != 18) {
            $append['cards'] = $cards;
        }

        $games->appends($append);

        // pass games data to game.index view
        return view('games.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $developers = Developer::orderBy('company_name')->get();
        return view('games.create', compact('developers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate Input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:600',
            'release_date' => 'required|date',
            'platform' => [
                'required',
                Rule::in(Game::getPlatformOptions()), // dynamic enum validation
            ],
            'cover_img' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',

            // devs pivot
            'developers'   => ['nullable', 'array'],
            'developers.*' => ['exists:developers,id'],
        ]);

        // check if image is uploaded and handle it
        if ($request->hasFile('cover_img')) {
            $imageName = Str::uuid() . '.' . $request->cover_img->extension();
            $request->file('cover_img')->move(public_path('images/games'), $imageName);
            $validated['cover_img'] = $imageName;
        }

        // create game record in db
        $game = Game::create($validated);

        // Attach devs
        if (!empty($validated['developers'])) {
            $game->developers()->sync($validated['developers']);
        }

        // return to index and display success message
        return to_route('games.index')->with('success', 'Game added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        // load game with its associated patches
        $game->load('developers', 'patches');

        return view('games.show', compact('game'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        $developers = Developer::orderBy('company_name')->get();
        return view('games.edit', compact('developers', 'game'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game)
    {

        // Validate Input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:600',
            'release_date' => 'required|date',
            'platform' => [
                'required',
                Rule::in(Game::getPlatformOptions()), // dynamic enum validation
            ],
            'cover_img' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // not required because might be using old image

            // devs pivot
            'developers'   => ['nullable', 'array'],
            'developers.*' => ['exists:developers,id'],
        ]);

        // check if image is uploaded
        // if it is set give a unique file name and delete old image
        if ($request->hasFile('cover_img')) {

            // delete old image if file found
            $oldPath = public_path('images/games/' . $game->cover_img);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }

            $imageName = Str::uuid() . '.' . $request->cover_img->extension();
            $request->file('cover_img')->move(public_path('images/games'), $imageName);
            $validated['cover_img'] = $imageName;
        } else { // if image not uploaded, use old image
            $imageName = $game->cover_img;
            $validated['cover_img'] = $imageName;
        }

        // update game record in db
        $game->update($validated);

        // Sync games
        $game->developers()->sync($validated['developers'] ?? []);

        return to_route('games.show', $game)->with('success', 'Game updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {

        // delete old image from public folder if file found
        $oldPath = public_path('images/games/' . $game->cover_img);

        if (file_exists($oldPath)) {
            // get folder name if any
            $parts = explode('/', $game->cover_img);
            $folder = count($parts) > 1 ? $parts[0] : null;

            // only delete if not in 'seeded' or 'placeholder' folders
            if (!in_array($folder, ['seeded', 'placeholder'])) {
                unlink($oldPath);
            }
        }

        $game->delete();

        // go to game index and display success message
        return to_route('games.index')->with('success', 'Game deleted successfully!');
    }
}
