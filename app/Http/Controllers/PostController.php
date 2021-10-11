<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Auth;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['posts']=Post::all();
        return view('frontend.post.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data['user_id']= $request->user_id;
        $data['categories']= Category::where('status','Active')->pluck('category_name','id');
        $data['tags']= Tag::pluck('name','id');
        return view('frontend.post.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post= new Post();
        $post->title= $request->title;
        $post->user_id= $request->user_id;
        $post->category_id= $request->category_id;
        $post->body= $request->body;
        $post->section= $request->section;
        $post->image_caption= $request->image_caption;
        $post->status= $request->status;
        $image= $request->file('image');
        $image->move('images/post',$image->getClientOriginalName());
        $post->image= 'images/post/'.$image->getClientOriginalName();      
        $post->save();
        $post->relTag()->sync($request->tags, false);
        session()->flash('success','Post stored successfully');
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['post']=Post::findOrFail($id);
        $data['categories']= Category::where('status','Active')->pluck('category_name','id');
        $data['tags']= Tag::pluck('name','id');
        return view('frontend.post.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post= Post::findOrFail($id);
        $post->title= $request->title;
        $post->user_id= Auth()->user()->id;
        $post->category_id= $request->category_id;
        $post->body= $request->body;
        $post->section= $request->section;
        $post->image_caption= $request->image_caption;
        $post->status= $request->status;

        if($request->hasFile('image')) {
            if(file_exists(public_path($post->image)))
            {
                unlink(public_path($post->image));
            }
            $image = $request->file('image');
            $image->move('images/post', $image->getClientOriginalName());
            $post->image = 'images/post/' . $image->getClientOriginalName();
        }
        $post->save();
        session()->flash('success','Post updated successfully');
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::findOrFail($id);
        if(file_exists(public_path($post->image)))
        {
            unlink(public_path($post->image));
        }
        $post->delete();
        session()->flash('success','Post deleted successfully');
        return redirect()->route('post.index');
    }
}
