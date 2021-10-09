@extends('admin.layouts.master')
@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Edit Tag</h4>
                <p class="card-category">Edit {{ $tag->name }} tag here</p>
            </div>
            <div class="card-body">
                {!! Form::model($tag,['route' => ['tag.update',$tag->id],'method'=>'put']) !!}
                    <div class="form-group">
                    {!! Form::label('name', 'Tag Name *') !!}
                        {!! Form::text('name', $tag->name, ['class' =>'form-control']) !!}
                    </div>
                    
                    <div class="m-t-20 text-center">
                        <button class="btn btn-primary">Update Tag</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection