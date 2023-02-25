<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gamepost extends Model
{
    use HasFactory;
    
     protected $fillable = [
        'title',
        'body',
        'user_id',
        'post_id',
        'comment_id',
    ];
    
    public function getPaginateByLimit(int $limit_count = 2)
    {
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
