<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('frontend.auth.register');
    }
    public function processRegister(Request $request){
       //dd($request->all());
       

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'min:11', 'numeric', 'unique:users'],
            'dob' => ['required'],
            'gender' => ['required'],
            'image'=>'mimes:jpg,jpeg,png',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],

            
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if ($request->hasFile('image')) {
            $image= $request->file('image');
            $image->move('images/auth',$image->getClientOriginalName());
            $image_name= 'images/auth/'.$image->getClientOriginalName(); 
        }
        try{
            $userdata = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'type' => 'Client',
                'phone' => $request['phone'],
                'dob' => $request['dob'],
                'gender' => $request['gender'],
                'password' => bcrypt($request['password']),
                'avater' => $image_name,


           
            ]);
            
            
            session()->flash('type','success');
            session()->flash('message','Information recorded!');
            return redirect()->back();
            
        }
        catch(Exception $e){
            session()->flash('type','warning');
            session()->flash('message',$e->getMessage());

            
        }
        return redirect()->back();
        
    

    }  
    public function showLoginForm(){
        
        return view('frontend.auth.login');

    }
    public function processLogin(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $credentials = $request->only(['email','password']);
        if(auth()->attempt($credentials)){
           
            session()->flash('type','success');
            session()->flash('message','You are logged in!');
            return redirect()->intended();

        }
        session()->flash('type','warning');
        session()->flash('message','Invalid credentials');
        return redirect()->route('login');

    }
    public function profile(){
        return view('frontend.auth.profile');
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }
}