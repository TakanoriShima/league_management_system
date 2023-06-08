<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserGame;

class UserGameController extends Controller
{
    public function update(Request $request, $id){
        $user_game = UserGame::where('game_id', $id)->where('user_id', $request->user_id)->get()->first();
        // dd($user_game);
        $user_game->position_id = $request->position_id;
        $user_game->status = 2;
        $user_game->save();
        
        return redirect('/admin/games/' . $id);
    }
}
