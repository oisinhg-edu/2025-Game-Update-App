<?php

namespace App\Http\Controllers;

use App\Models\Patch;
use App\Models\Game;
use Illuminate\Http\Request;

class PatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Game $game)
    {
        $request->validate([
            'version' => 'required|string',
            'content' => 'nullable|string|max:10000',
        ]);

        $game->patches()->create([
            'game_id' => $game->id,
            'user_id' => auth()->id(),
            'version' => $request->input('version'),
            'content' => $request->input('content'),
        ]);

        return redirect()->route('games.show', $game)->with('success', 'Patch note added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Patch $patch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patch $patch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game, Patch $patch)
    {
        // only allow creator of the patch or admin to update it
        $user = auth()->user();
        if (! ($user->can('manage-game') || $patch->user_id === $user->id)) {
            abort(403);
        }

        $patch->update([
            'version'  => $request->input('version'),
            'content'  => $request->input('content'),
            'user_id'  => auth()->id(),
        ]);

        return redirect()->route('games.show', $patch->game_id)->with('success', 'Patch Note updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game, Patch $patch)
    {

        // only allow creator of the patch or admin to delete it
        $user = auth()->user();
        if (! ($user->can('manage-game') || $patch->user_id === $user->id)) {
            abort(403);
        }

        $patch->delete();

        return redirect()->route('games.show', $game)->with('success', 'Patch Note deleted successfully');
    }
}
