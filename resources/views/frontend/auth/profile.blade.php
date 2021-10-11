@extends('admin/layouts/master')
@section('content')
    <div class="col-md-12">
        <a href="{{ route('admin.create') }}" class="btn btn-primary">Add New</a>
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">User Profile</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                        <th>
                            Profile Picture
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            email
                        </th>
                        <th>
                            Phone Number
                        </th>
                        <th>
                            Date of Birth
                        </th>
                        
                        <th>
                            Gender
                        </th>
                        <th>
                            Actions
                        </th>
                        </thead>
                        <tbody>
                                <tr>
                                    <td>{{ asset($user->avater) }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->dob }}</td>
                                    <td>{{ $user->gender }}</td>
                                   
                                    <td>
                                        <a href="{{ route('register.edit',$user->id) }}">Edit</a>
                                       
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection