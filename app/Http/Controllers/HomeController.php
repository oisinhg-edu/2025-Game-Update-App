<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $recentGames = Game::latest()->take(3)->get(); // fetch 3 most recent games
        return view('home', compact('recentGames'));
    }
}
