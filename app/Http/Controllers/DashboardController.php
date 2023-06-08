<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;

class DashboardController extends Controller
{
    public function index(){
        $games = Game::all();
        return view('dashboard', compact('games'));
    }
}
