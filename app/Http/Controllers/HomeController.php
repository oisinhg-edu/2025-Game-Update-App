<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // fetch 3 most recent games
        $recentGames = Game::latest()
            ->take(3)
            ->get();

        return view('home', compact('recentGames'));
    }
}
