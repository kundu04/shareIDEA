@extends('frontend.layouts.master')
@section('content')
<div class="container">
        
        <br>
        <p class="text-center">Edit Profile Information</p>
        <hr> 
        @include('frontend.partial._messages')
        <form class="form" action="{{route('register.update',$profile->id)}}" method="post" enctype="multipart/form-data">@csrf
        {{method_field('PUT')}}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="{{$profile->name}}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="{{$profile->email}}" required>
            </div>

            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="number" class="form-control" name="phone" value="{{$profile->phone}}" required>
            </div>

            <div class="form-group">
                <label for="date_of_birth">Date of Birth</label>
                <input type="date" class="form-control" name="dob" value="{{$profile->dob}}" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label></br>
                <input type="radio" name="gender" value="Male"{{ $profile->gender == 'Male' ? 'checked' : '' }}>
                  <label for="male">Male</label>
                  <input type="radio" name="gender" value="Female" {{ $profile->gender == 'Female' ? 'checked' : '' }}>
                  <label for="gender">Female</label><br>           
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" name="image" value="{{old('image')}}" >
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" value={{$profile->password}}>
            </div>
            <br>
            <div class="form-group">
                <button type="submit" class="btn btn-block btn-success">
                    Update Profile
                </button>
            </div>
        </form>
</div>
@endsection