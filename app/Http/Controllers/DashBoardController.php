<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
class DashBoardController extends Controller
{
    public function index()
    {
        $data['stories']= Post::latest()->get();
        return view('admin.dashboard',$data);
    }

    public function registered_user(Request $request)
    {
        $user=User::get();
        if($request->name != Null){
            $user=User::where('name','like','%'.$request->name.'%')->get();
        }
        if(isset($request->email)){
            $user=User::where('email','like','%'.$request->email.'%')->get();
        }
        
        $data['users']=$user;
        return view('admin.user.index',$data);


    }

    public function block_user($id)
    {
        $user = User::findOrFail($id);
        if($user->status == 'Inactive'){        
            $user->status = 'Active';
        }
        else{
            $user->status = 'Inactive';
        }
        
        $user->save();
        return redirect()->back();
        
    }
    public function unlist_post($id)
    {
        $post = Post::findOrFail($id);
        $post->status='Inactive';
        $post->save();
        session()->flash('success','Post unlisted successfully !');
        return redirect()->back();

    }

    
    
}
