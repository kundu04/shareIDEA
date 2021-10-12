@extends('frontend.layouts.master')
@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Create Post</h4>
            </div>
            <div class="card-body">
                {{ Form::open(['route'=>'post.store','files'=>true]) }}
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
                    {{ Form::select('category_id',$categories,null,['class'=>'form-control','required','placeholder'=>'Select Category']) }}
                </div>
            </div>
           
            <div class="col-md-12">
                <div class="form-group">
                    {{ Form::label('title', 'Title',['class'=>'bmd-label-floating']) }}
                    {{ Form::text('title',null,['class'=>'form-control','required']) }}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    {{ Form::label('body', 'Body',['class'=>'bmd-label-floating']) }}
                    {{ Form::textarea('body',null,['class'=>'form-control','cols'=>10,'required']) }}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    {{ Form::label('section', 'Section',['class'=>'bmd-label-floating']) }}
                    {{ Form::textarea('section',null,['class'=>'form-control','cols'=>10,'required']) }}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    {{ Form::label('tags', 'Tags',['class'=>'bmd-label-floating']) }}
                    {{ Form::select('tags[]',$tags,null,['class'=>'form-control select2-multi','multiple'=>'multiple','required','placeholder'=>'Select Tag']) }}
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
                    {{ Form::textarea('image_caption',null,['class'=>'form-control','cols'=>10,'required']) }}
                </div>
            </div>
           
            {!! Form::hidden('user_id', $user_id )!!}

           
        </div>
                        {{ Form::submit('Store Post',['class'=>'btn btn-primary pull-right']) }}
                        <div class="clearfix"></div>
                        {{ Form::close() }}
        </div>
    </div>
 </div>
@endsection