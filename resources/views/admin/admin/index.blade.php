@extends('admin/layouts/master')
@section('content')
    <div class="col-md-12">
        <a href="{{ route('admin.create') }}" class="btn btn-primary">Add New</a>
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Admins</h4>
                <p class="card-admin"> All admin here</p>
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
                            email
                        </th>
                        
                        <th>
                            Status
                        </th>
                        <th>
                            Actions
                        </th>
                        </thead>
                        <tbody>
                            @foreach($admins as $admin)
                                <tr>
                                    <td>{{ $admin->id }}</td>
                                    <td>{{ $admin->name }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td>{{ $admin->status }}</td>
                                    <td>
                                        <a href="{{ route('admin.edit',$admin->id) }}">Edit</a>
                                        {{ Form::open(['route'=>['admin.destroy',$admin->id],'method'=>'DELETE']) }}
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