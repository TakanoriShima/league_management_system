<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Position;
use App\Models\Game;
use App\Models\UserGame;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'position_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function position()
    {
        return $this->belongsTo(Position::class);
    }
    
    /**
     * このユーザが回答した試合
     */
    public function games()
    {
        return $this->belongsToMany(Game::class, 'user_game', 'user_id', 'game_id')->withTimestamps();
    }
    
    public function position_name($gameId){
        $position_id = $this->hasMany(UserGame::class)->where('game_id', $gameId)->get()->first()->position_id;

        return Position::find($position_id)->name;
    }
    
    
    /**
     * $userIdで指定されたユーザをフォローする。
     *
     * @param  int  $userId
     * @return bool
     */
    public function submit($gameId, $positionId, $status)
    {
        $exist = $this->is_submitting($gameId);
        
        if ($exist) {
            return false;
        } else {
            $this->games()->attach($gameId, ['position_id' => $positionId, 'status' => $status]);
            return true;
        }
    }
    
    /**
     * 指定された$gameIdの試合をこのユー回答中であるか調べる。
     * 
     * @param  int $gameId
     * @return bool
     */
    public function is_submitting($gameId)
    {
        return $this->games()->where('game_id', $gameId)->exists();
    }

}
