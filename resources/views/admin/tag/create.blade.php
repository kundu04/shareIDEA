@extends('admin.layouts.master')
@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Create Tag</h4>
                <p class="card-category">Create new tag here</p>
            </div>
            <div class="card-body">
                {!! Form::open(['route' => 'tag.store','method'=>'post']) !!}
                    <div class="form-group">
                    {!! Form::label('name', 'Tag Name *') !!}
                        {!! Form::text('name', '', ['class' =>'form-control','required']) !!}
                    </div>
                   
                    <div class="m-t-20 text-center">
                        <button class="btn btn-primary">Create Tag</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection