<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Post;
use App\Models\User;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'post_id',
        'body',
        'status'
        
    ];

    public function relPost(){
        return $this->belongsTo(Post::class);
    }
    public function relUser(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
