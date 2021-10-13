@extends('admin.layouts.master')
@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Edit Admin</h4>
                <p class="card-category">Edit {{ $admin->admin_name }} admin here</p>
            </div>
            <div class="card-body">
                {!! Form::model($admin,['route' => ['admin.update',$admin->id],'method'=>'put']) !!}
                    <div class="form-group">
                    {!! Form::label('name', 'Admin Name ') !!}
                        {!! Form::text('name', $admin->admin_name, ['class' =>'form-control']) !!}
                    </div>

                    <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                        {!! Form::email('email',null, ['class' =>'form-control','required']) !!}
                    </div>

                    <div class="form-group">
                    {!! Form::label('password', 'Password') !!}
                        {!! Form::password('password', ['class' =>'form-control','id'=>'password']) !!}
                    </div>
                    
                    <div class="form-group">
                    {!! Form::label('status1', 'Active') !!}
                        {!! Form::radio('status', 'Active', true) !!}
                        {!! Form::label('status2', 'Inactive') !!}
                        {!! Form::radio('status', 'Inactive') !!}
                    </div>
                    <div class="m-t-20 text-center">
                        <button class="btn btn-primary">Update Admin</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection