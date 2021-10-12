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