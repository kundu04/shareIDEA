@extends('frontend.layouts.master')
@section('content')
    <div class="col-md-12">
        <a href="{{ route('post.create') }}" class="btn btn-primary">Add New Post</a>
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">All post here</h4>
                <!-- <p class="card-category"> All post here</p> -->
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>ID</th>
                            <!-- <th>Image</th>
                            <th>Image Caption</th> -->
                            <th>Title</th>
                            <th>Category Name</th>
                            <th>Body</th>
                            <th>Section</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->relCategory->category_name }}</td>
                                    <td>{{ $post->body }}</td>
                                    <td>{{ $post->section }}</td>
                                    <td>{{ $post->status }}</td>
                                    <td>
                                        <a href="{{ route('post.edit',$post->id) }}">Edit</a>
                                        {{ Form::open(['route'=>['post.destroy',$post->id],'method'=>'DELETE']) }}
                                            {{ Form::submit('Delete',['onclick'=>"return confirm('Are you confirm ?')"]) }}
                                        {{ Form::close() }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection