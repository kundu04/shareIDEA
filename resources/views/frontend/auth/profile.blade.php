@extends('frontend/layouts/master')
@section('content')
<h2 class="card-title ">User Profile</h2>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
            </div>
            <div class="card-body">
                <div class="col-md-4">
                    <h4>Profile Picture</h4>
                    <img src=" {{ asset($user->avater) }}" alt="" height=300px>   
                    <h4><b>Name : </b>{{ $user->name }}</h4>
                    <h4><b>Email : </b>{{ $user->email }}</h4>
                    <h4><b>Phone : </b>{{ $user->phone }}</h4>
                    <h4><b>Date of Birth : </b>{{ $user->dob }}</h4>
                    <h4><b>Gender : </b>{{ $user->gender }}</h4>
                    <a href="{{ route('register.edit',$user->id) }}"> <button class='btn btn-success'>Edit Profile</button></a><br>

                </div>
                <div class="col-md-8">
                <p>Do you like Cheese Whiz? Spray tan? Fake eyelashes? That's what is Lorem Ipsum to many—it rubs them the wrong way, all the way. It's unreal, uncanny, makes you wonder if something is wrong, it seems to seek your attention for all the wrong reasons. Usually, we prefer the real thing, wine without sulfur based preservatives, real butter, not margarine, and so we'd like our layouts and designs to be filled with real words, with thoughts that count, information that has value. </p>

                </div>
            </div>
        </div>
    </div>
@endsection