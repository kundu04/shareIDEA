<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Post;
class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_name',
        'status'
        
    ];

    public function relPost(){
        return $this->hasMany(Post::class);
    } 
}
