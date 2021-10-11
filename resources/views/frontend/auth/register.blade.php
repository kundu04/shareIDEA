@extends('frontend.layouts.master')
@section('content')
<div class="container">
        
        <br>
        <p class="text-center">Register</p>
        <hr> 
        @include('frontend.partial._messages')
        <form class="form" action="{{route('register')}}" method="post" enctype="multipart/form-data">@csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="{{old('name')}}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="{{old('email')}}" required>
            </div>

            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="number" class="form-control" name="phone" value="{{old('phone')}}" required>
            </div>

            <div class="form-group">
                <label for="date_of_birth">Date of Birth</label>
                <input type="date" class="form-control" name="dob" value="{{old('dob')}}" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label></br>
                <input type="radio" name="gender" value="Male" checked>
                  <label for="male">Male</label>
                  <input type="radio" name="gender" value="Female">
                  <label for="gender">Female</label><br>           
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" name="image" value="{{old('image')}}" >
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control" name="password" required>
            </div>
            <br>
            <div class="form-group">
                <button type="submit" class="btn btn-block btn-success">
                    Register
                </button>
            </div>
        </form>
</div>
@endsection