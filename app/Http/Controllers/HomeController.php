<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $story=Post::where('status','Active')->with('relTag')->latest()->get();
        
        
        if(isset($request->title)){
            $story=Post::where('title','like','%'.$request->title.'%')->where('status','Active')->get();
        }
        if(isset($request->body)){
            $story=Post::where('body','like','%'.$request->body.'%')->where('status','Active')->get();
        }
        if(isset($request->section)){
            $story=Post::where('section','like','%'.$request->section.'%')->where('status','Active')->get();
        }
        $tag=$request->tag;
        if(isset($tag)){
            $story = Post::where('status','Active')->whereHas('relTag', function ($query) use($tag){
                return $query->where('name','like','%'.$tag.'%');
            })->get();

        }
        
        $data['stories']=$story;

        return view('frontend.home',$data);
    }

    
}
