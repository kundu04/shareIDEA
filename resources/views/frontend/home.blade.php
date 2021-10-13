@extends('frontend.layouts.master')
@section('content')

   <!-- row -->
   <div class="row">
	   @if(session()->has('success'))
	   <button class="btn btn-success">{{session()->get('success')}}</button>
	   @endif
					<div class="col-md-12">
						<div class="section-title">
							<h2>Recent Posts</h2>
						</div>
					</div>
					<div class="row" >
						
                        {{ Form::model(request(),['method'=>'get']) }}
						<div class="col-sm-3">
							{{Form::text('title',null,['class'=>'form-control','placeholder'=>'search story title'])}}
						</div>
						<div class="col-sm-3">
							{{Form::text('body',null,['class'=>'form-control','placeholder'=>'search story body'])}}
						</div>
						<div class="col-sm-2">
							{{Form::text('section',null,['class'=>'form-control','placeholder'=>'search section'])}}
						</div>
						<div class="col-sm-2">
							{{Form::text('tag',null,['class'=>'form-control','placeholder'=>'search tag'])}}
						</div>
                            
                            <div class="col-sm-2">
                                {{Form::submit('search',['class'=>'btn btn-warning'])}}
                            </div>
                            {{Form::close()}}
                	</div>
					<hr>
				@foreach($stories as $story)
					<!-- post -->
					<div class="col-md-4">
						<div class="post">
						<a class="post-img" href="#"><img src="{{asset($story->image)}}" alt="" height=200px ></a>
							
							<p>{{$story->image_caption}}</p>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-1" href="category.html">{{$story->relCategory->category_name}}</a>
									<span class="post-date">{{ date("d M Y", strtotime($story->created_at))}}</span>
								</div>
								<div class="post-meta">
								<h3 class="post-title"><a href="blog-post.html">{{$story->title}}</a></h3>
								<a class="post-category cat-4" href="{{route('post.details',$story->id)}}">Details</a>
								</div>
                                <hr>
                                
							</div>
						</div>
					</div>
					<!-- /post -->
				@endforeach
					
	</div>
	<!-- /row -->
@endsection