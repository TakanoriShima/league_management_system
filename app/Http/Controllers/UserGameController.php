<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserGameController extends Controller
{
    public function store(Request $request, $gameId){
        // dd($request);
        $user = \Auth::user();
        // dd($user);
        $user->submit($gameId, $user->position->id, $request->status);
        return redirect('/games/' . $gameId);
    }
}
