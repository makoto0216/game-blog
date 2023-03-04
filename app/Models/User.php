<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Auth; 

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
    
    public function getOwnPaginateByLimit(int $limit_count = 5)
    {
        return $this::with('gameposts')->find(Auth::id())->gameposts()->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function gameposts()
    {
        return $this->hasMany(Gamepost::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
}
