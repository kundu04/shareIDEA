<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $data['stories'] = Post::where('status','Active')->latest()->get();
        return view('frontend.home',$data);
    }

    
}
