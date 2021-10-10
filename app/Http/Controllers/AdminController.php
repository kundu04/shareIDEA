<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class AdminController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['admins'] = User::where('type','Admin')->get();
        return view('admin/admin/index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/admin/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required|min:6',
            'status'=>'required',

        ]);

        $admin = new User();
        $admin->name=$request->name;
        $admin->type='Admin';
        $admin->email=$request->email;
        $admin->password=bcrypt($request->password);
        $admin->status= $request->status;
        $admin->save();
        session()->flash('success','Admin user stored successfully !');
        return redirect()->route('admin.index');
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
        $data['admin'] = User::findOrFail($id);
        return view('admin.admin.edit',$data);
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
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users,email,'. $id,
            'status'=>'required',

        ]);

        $admin = User::findOrFail($id);
        $admin->name=$request->name;
        $admin->type='Admin';
        $admin->email=$request->email;
        if(isset($request->password))
        {
            $admin->password= bcrypt($request->password);
        } 
        $admin->status= $request->status;
        
        $admin->save();
        session()->flash('success',' Admin user updated successfully !');
        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        session()->flash('success','Admin user deleted successfully !');
        return redirect()->route('admin.index');
    }
}
