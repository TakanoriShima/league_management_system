<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Position;

class Game extends Model
{
    use HasFactory;
    
    /**
     * この試合に回答したユーザー
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_game', 'game_id', 'user_id')->withTimestamps();
    }
    
    public function is_present($userId)
    {
        return $this->users()->where('user_id', $userId)->where('status', 1)->exists();
    }
    
    // public function position($userId){
    //      $user = $this->users()->where('user_id', $userId)->get()->first();
    //      $position_name = Position::find($user->position_id)->get()->first()->name;
    //      return $position_name;
    // }
}
