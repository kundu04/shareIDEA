<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
class CommentController extends Controller
{
    public function store(Request $request)
    {
       $comment = new Comment();
       $comment->user_id = $request->user_id;
       $comment->post_id = $request->post_id;
       $comment->body = $request->message;
       $comment->status = 'Listed';
       $comment->save();

       session()->flash('success','Thanks for your comment!');
        return redirect()->route('post.details',$request->post_id);
    }
    public function destroy($id)
    {
        Comment::findOrFail($id)->delete();
        session()->flash('success','Comment deleted successfully !');
        return redirect()->route('dashboard');
    }

    
}
