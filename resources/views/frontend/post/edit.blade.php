@extends('frontend.layouts.master')
@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header card-header-primary">
            <h4 class="card-title">Edit Post</h4>
                <p class="card-category">Edit <b>{{ $post->title }}</b> post here</p>
            </div>
            <div class="card-body">
            {{ Form::model($post,['route'=>['post.update',$post->id],'method'=>'put','files'=>true]) }}
                <style>
                .fileOverride{
                    position: static!important;
                    opacity: 1!important;
                }
                </style>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {{ Form::label('category_id', 'Category',['class'=>'bmd-label-floating']) }}
                    {{ Form::select('category_id',$categories,$post->relCategory->category_name ,['class'=>'form-control','required']) }}
                </div>
            </div>
           
            <div class="col-md-12">
                <div class="form-group">
                    {{ Form::label('title', 'Title',['class'=>'bmd-label-floating']) }}
                    {{ Form::text('title',$post->title,['class'=>'form-control','required']) }}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    {{ Form::label('body', 'Body',['class'=>'bmd-label-floating']) }}
                    {{ Form::textarea('body',$post->body,['class'=>'form-control','cols'=>10,'required']) }}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    {{ Form::label('section', 'Section',['class'=>'bmd-label-floating']) }}
                    {{ Form::textarea('section',$post->section,['class'=>'form-control','cols'=>10,'required']) }}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    {{ Form::label('tags', 'Tags',['class'=>'bmd-label-floating']) }}
                    {{ Form::select('tags[]',$tags,null ,['class'=>'form-control','required']) }}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    {{ Form::label('image', 'Image',['class'=>'bmd-label-floating']) }}
                    <br>
                    <?php $image_required= 'Required'; ?>
                    @if(isset($post))
                        <?php $image_required= null; ?>
                    @endif
                    {{ Form::file('image',[$image_required,'class'=>'fileOverride']) }}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    {{ Form::label('image_caption', 'Image Caption',['class'=>'bmd-label-floating']) }}
                    {{ Form::textarea('image_caption',$post->image_caption,['class'=>'form-control','cols'=>10,'required']) }}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    {{ Form::label('status', 'Status',['class'=>'bmd-label-floating']) }}
                    <br>
                    {{ Form::radio('status','Active',null,['checked']) }} Active
                    {{ Form::radio('status','Inactive',null) }} Inactive
                </div>
            </div>
        </div>
                        {{ Form::submit('Update Post',['class'=>'btn btn-primary pull-right']) }}
                        <div class="clearfix"></div>
                        {{ Form::close() }}
        </div>
    </div>
 </div>
@endsection