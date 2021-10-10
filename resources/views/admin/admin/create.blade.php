@extends('admin.layouts.master')
@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Create Admin</h4>
                <p class="card-category">Create new Admin here</p>
            </div>
            <div class="card-body">
                {!! Form::open(['route' => 'admin.store','method'=>'post']) !!}
                    <div class="form-group">
                    {!! Form::label('name', 'Admin Name *') !!}
                        {!! Form::text('name', '', ['class' =>'form-control','required']) !!}
                    </div>

                    <div class="form-group">
                    {!! Form::label('email', 'Email*') !!}
                        {!! Form::email('email',null, ['class' =>'form-control','required']) !!}
                    </div>

                    <div class="form-group">
                    {!! Form::label('password', 'Password*') !!}
                        {!! Form::password('password', ['class' =>'form-control','id'=>'password','required']) !!}
                    </div>

                    <div class="form-group">
                    {!! Form::label('status1', 'Active') !!}
                        {!! Form::radio('status', 'Active', true) !!}
                        {!! Form::label('status2', 'Inactive') !!}
                        {!! Form::radio('status', 'Inactive') !!}
                    </div>

                    <div class="m-t-20 text-center">
                        <button class="btn btn-primary">Create Admin</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection