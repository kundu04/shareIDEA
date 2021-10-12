<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Tag;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'user_id',
        'category_id',
        'body',
        'section',
        'image',
        'image_caption',
        'status'
        
    ];

    public function relUser(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function relCategory(){
        return $this->belongsTo(Category::class,'category_id','id');
    } 

    public function relComment(){
        return $this->hasMany(Comment::class);
    } 

    public function relTag(){
        return $this->belongsToMany(Tag::class,'post_tag');
    } 
}
