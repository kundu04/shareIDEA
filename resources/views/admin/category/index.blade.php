@extends('admin/layouts/master')
@section('content')
    <div class="col-md-12">
        <a href="{{ route('category.create') }}" class="btn btn-primary">Add New</a>
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Categories</h4>
                <p class="card-category"> All category here</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                        <th>
                            ID
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Actions
                        </th>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>{{ $category->status }}</td>
                                    <td>
                                        <a href="{{ route('category.edit',$category->id) }}">Edit</a>
                                        {{ Form::open(['route'=>['category.destroy',$category->id],'method'=>'DELETE']) }}
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