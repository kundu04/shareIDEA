@extends('admin.layouts.master')
@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Edit Category</h4>
                <p class="card-category">Edit {{ $category->category_name }} category here</p>
            </div>
            <div class="card-body">
                {!! Form::model($category,['route' => ['category.update',$category->id],'method'=>'put']) !!}
                    <div class="form-group">
                    {!! Form::label('name', 'Category Name *') !!}
                        {!! Form::text('name', $category->category_name, ['class' =>'form-control']) !!}
                    </div>
                    <div class="form-group">
                    {!! Form::label('status1', 'Active') !!}
                        {!! Form::radio('status', 'Active', true) !!}
                        {!! Form::label('status2', 'Inactive') !!}
                        {!! Form::radio('status', 'Inactive') !!}
                    </div>
                    <div class="m-t-20 text-center">
                        <button class="btn btn-primary">Update Category</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection