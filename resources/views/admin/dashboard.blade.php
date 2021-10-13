@extends('admin/layouts/master')
@section('content')
    <div class="container-fluid">
       
        <div class="row">
        @foreach($stories as $story)
            <div class="col-md-4">
                <div class="card card-chart">
                    <div class="card-header card-header-success">
                        {{$story->relUser->name}}
                        <div class="ct-chart" id="dailySalesChart"></div>
                    </div>
                    <hr>
                    <a class="post-img" href="#"><img src="{{asset($story->image)}}" alt="" height=200px width=210px></a>
							
							<p ><b> Caption: </b>{{$story->image_caption}}</p>
                    <div class="card-body">
                        <h4 class="card-title">{{$story->title}}</h4>
                        <p class="card-category">
                            <span class="text-success"><b>{{$story->relCategory->category_name}}</b></span>
                         </p>
                         <p class="card-category">
                            <span class="text-success">Body: </span>
                            {{$story->body}}
                         </p>
                         <p class="card-category">
                            <span class="text-success">Section: </span>
                            {{$story->section}}
                         </p>
                         <p class="card-category">
                            <span class="text-success">Status: </span>
                            {{$story->status}}
                         </p>
                         <div>
                         <ul>
								@foreach($story->relComment as $comment)

									<li>{{$comment->body}} <b>by</b> {{$comment->relUser->name}}
                                    {{ Form::open(['route'=>['comment.destroy',$comment->id],'method'=>'DELETE']) }}
                                            {{ Form::submit('Delete',['onclick'=>"return confirm('Are you confirm ?')"]) }}
                                        {{ Form::close() }}
                                    </li>
								@endforeach
								</ul>
                         </div>
                    </div>
                    
                    <div class="card-footer">
                        @if($story->status == 'Active')
                        <a href="{{ route('unlist.post',$story->id) }}">Unlist</a>
                   @endif

                        <div class="stats">
                            <i class="material-icons">access_time</i> {{ date("d M Y", strtotime($story->created_at))}}
                        </div>
                    </div>
                </div>
            </div>
           
           @endforeach
        </div>
        
    
    </div>
@endsection