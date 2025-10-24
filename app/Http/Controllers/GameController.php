<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class GameController extends Controller
{
    public function welcome()
    {
        $recentGames = Game::orderBy('created_at', 'desc')->take(3)->get(); // fetch 3 most recent games
        return view('welcome', compact('recentGames'));
    }

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

        // create the games data from the query ordered by creation date
        // this will get all games if no search input
        $games = $query->orderBy('created_at', 'desc')->get();

        // pass games data to game.index view
        return view('games.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('games.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate Input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:600',
            'release_date' => 'required|date',
            'platform' => [
                'required',
                Rule::in(Game::getPlatformOptions()), // dynamic enum validation
            ],
            'cover_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // check if image is uploaded and handle it
        if ($request->hasFile('cover_img')) {
            $imageName = Str::uuid() . '.' . $request->cover_img->extension();
            $request->file('cover_img')->move(public_path('images/games'), $imageName);
        }

        // create game record in db
        Game::create([
            'title' => $request->title,
            'description' => $request->description,
            'release_date' => $request->release_date,
            'platform' => $request->platform,
            'cover_img' => $imageName, //img url stored
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // return to index and display success message
        return to_route('games.index')->with('success', 'Game created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        // Fetch a random quote
        $response = Http::get('https://zenquotes.io/api/random');
        $quoteData = $response->json();

        $quote = [
            'content' => $quoteData[0]['q'] ?? 'No quote available',
            'author' => $quoteData[0]['a'] ?? 'Unknown',
        ];
        
        return view('games.show', compact('game', 'quote'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        return view('games.edit', compact('game'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game)
    {
        // Validate Input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:600',
            'release_date' => 'required|date',
            'platform' => [
                'required',
                Rule::in(Game::getPlatformOptions()), // dynamic enum validation
            ],
            'cover_img' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // not required because might be using old image
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
        } else { // if image not uploaded, use old image
            $imageName = $game->cover_img;
        }

        // update game record in db
        $game->update([
            'title' => $request->title,
            'description' => $request->description,
            'platform' => $request->platform,
            'cover_img' => $imageName, //img url stored
            'updated_at' => now()
        ]);

        // go to updated game and display success message
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
            unlink($oldPath);
        }

        $game->delete();

        // go to game index and display success message
        return to_route('games.index')->with('success', 'Game deleted successfully!');
    }
}
