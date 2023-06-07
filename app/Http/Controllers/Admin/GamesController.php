<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Position;

class GamesController extends Controller
{
    // public function index(){
    //     $games = Game::all();
    //     return view('admin.games.index', compact('games'));
    // }
    
    public function create(Request $request){
        // dd('koko');
        $game = new Game();
        return view('admin.games.create', compact('game')); 
    }
    
    public function store(Request $request){
        // dd($request);
        $game = new Game;
        $game->day = $request->day;
        $game->time = $request->time;
        $game->battleteam = $request->battleteam;
        $game->place = $request->place;
        $game->memo = $request->memo;
        $game->save();
        // dd($user);
        // User::create(['name' => $request->name, 'email' => $request->email, 'password' => Hash::make($request->password), 'position' => $request->position_id]);
        // User::create(['name' => $request->name, 'email' => $request->email, 'password' => Hash::make($request->password), 'position' => $request->position_id]);
        
        return redirect('admin/dashboard');
    }
    
    public function show(Request $request, $id){
        // dd($id);
        $game = Game::find($id);
        $positions = Position::all();
        return view('admin.games.show', compact('game', 'positions'));
    }
}
