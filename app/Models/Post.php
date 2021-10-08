<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->belongsTo(User::class);
    }

    public function relCategory(){
        return $this->belongsTo(Category::class);
    } 

    public function relComment(){
        return $this->hasMany(Comment::class);
    } 

    public function relTag(){
        return $this->belongsToMany(Tag::class);
    } 
}
