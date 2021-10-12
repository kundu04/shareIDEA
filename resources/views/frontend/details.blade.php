@extends('frontend.layouts.master')
@section('content')
    <!-- row -->
    <div class="row">
					<!-- Post content -->
					<div class="col-md-8">

					<div class="section-row sticky-container">
							<div class="main-post">
								<h3>{{$story->relCategory->category_name}}</h3>
								<p>{{$story->body}}</p>
								<p>{{$story->section}}</p>
								<figure class="figure-img">
									<img class="img-responsive" src="{{asset($story->image)}}" alt="">
									<figcaption>{{$story->image_caption}}</figcaption>
								</figure>
								
								<blockquote class="blockquote">
									{{date("d M Y", strtotime($story->created_at))}}
								</blockquote>
								
							</div>
							<div class="post-shares sticky-shares">
								<a href="#" class="share-facebook"><i class="fa fa-facebook"></i></a>
								<a href="#" class="share-twitter"><i class="fa fa-twitter"></i></a>
								<a href="#" class="share-google-plus"><i class="fa fa-google-plus"></i></a>
								<a href="#" class="share-pinterest"><i class="fa fa-pinterest"></i></a>
								<a href="#" class="share-linkedin"><i class="fa fa-linkedin"></i></a>
								<a href="#"><i class="fa fa-envelope"></i></a>
							</div>
						</div>




						@auth
						<!-- comments -->

						<div class="section-row">
							<div class="section-title">
							<h2>{{$total_comments}} Comments</h2>
							</div>
							@foreach($comments as $comment)

							<div class="post-comments">
								<!-- comment -->
								<div class="media">
									
									<div class="media-body">
										<div class="media-heading">
											<h4>{{$comment->relUser->name}}</h4>
											<span class="time">{{date("d M Y", strtotime($comment->created_at))}}</span>
											
											<!-- <a href="#" class="reply">Delete</a> -->
										</div>
										<p>{{$comment->body}}</p>
										
									</div>
								</div>
								@endforeach
								<!-- /comment -->

								
							</div>
						</div>
						<!-- /comments -->

						<!-- reply -->
						
						<div class="section-row">
						@if(session()->has('success'))
						<button class="btn btn-success">{{session()->get('success')}}</button>
						@endif
							<div class="section-title">
								<h2>Leave a Comment</h2>
							</div>
							<form class="post-reply" action="{{route('comment.store')}}" method="post">@csrf
								<div class="row">
									
									<div class="col-md-12">
										<div class="form-group">
											<textarea class="input" name="message" placeholder="Message"></textarea>
											<input type="hidden" name="user_id" value="{{auth()->user()->id}}">
											<input type="hidden" name="post_id" value="{{$story->id}}">
										</div>
										<button type= submit class="primary-button">Submit</button>
									</div>
								</div>
							</form>
						</div>
						@endauth
						<!-- /reply -->
					</div>
					<!-- /Post content -->

					<!-- aside -->
					<div class="col-md-4">
						

						

					
						
						<!-- catagories -->
						<div class="aside-widget">
							<div class="section-title">
								<h3>Posted By: </h3>
								<p>{{$story->relUser->name}}</p>
							</div>
						
						</div>
						<!-- /catagories -->
						
						<!-- tags -->
						<div class="aside-widget">
							<div class="tags-widget">
								<ul>
								@foreach($story->relTag as $tag)

									<li><a href="#">{{$tag->name}}</a></li>
								@endforeach
								</ul>
							</div>
						</div>
						
					</div>
					<!-- /aside -->
				</div>
				<!-- /row -->
@endsection
