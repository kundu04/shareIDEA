@extends('frontend/layouts/master')
@section('content')
<h2 style=background:LightGray; class="card-title ">User Profile</h2>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <div class="col-md-8">
                        <h4>Profile Picture</h4>
                        <img src=" {{ asset($user->avater) }}" alt="" height=500px width=400px> 
                    </div>
                    <div class="col-md-4">
                        <h4><b>Name : </b>{{ $user->name }}</h4>
                        <h4><b>Email : </b>{{ $user->email }}</h4>
                        <h4><b>Phone : </b>{{ $user->phone }}</h4>
                        <h4><b>Date of Birth : </b>{{ $user->dob }}</h4>
                        <h4><b>Gender : </b>{{ $user->gender }}</h4>
                        <a href="{{ route('register.edit',$user->id) }}"> <button class='btn btn-success'>Edit Profile</button></a>
                    </div>
                </div>
                <div class="col-md-12">
                <hr>
                </div>
                <div class="row">
                <div class="col-md-12"> <h3 style=background:LightGray;>Recent Post </h3></div>
                    @foreach($stories as $story)
                <div class="col-md-4">
						<div class="post">
							<a class="post-img" href="#"><img src="{{asset($story->image)}}" alt="" height=200px ></a>
                            <p>{{$story->image_caption}}</p>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-1" href="category.html">{{$story->relCategory->category_name}}</a>
									<span class="post-date">{{ date("d M Y", strtotime($story->created_at))}}</span>
								</div>
								<h3 class="post-title"><a href="blog-post.html">{{$story->title}}</a></h3>
                                <hr>
                                <h4>Body: </hr>
                                <p>{{$story->body}}</p>
                                <h4>Section: </hr>
                                <p>{{$story->section}}</p>
                                
                            </div>
						</div>
					</div>
               
                @endforeach
                </div>
            </div>
</div>
    </div>
@endsection