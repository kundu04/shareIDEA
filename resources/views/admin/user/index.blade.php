@extends('admin/layouts/master')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title " >User</h4>
                <p class="card-admin"> All Registered User here</p>
                <div class="row" >
						
                        {{ Form::model(request(),['method'=>'get']) }}
                            <div class="input-group no-border" >
                                {{Form::text('name',null,['class'=>'form-control','placeholder'=>'search user name'])}}
                            </div>
                            <div class="input-group no-border">
                                {{Form::text('email',null,['class'=>'form-control','placeholder'=>'search email'])}}
                            </div>
                            
                            <div class="input-group no-border">
                                {{Form::submit('search',['class'=>'btn btn-warning'])}}
                            </div>
                            {{Form::close()}}
                        </div>
            </div>
           
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                        <th>
                            Avater
                        </th>
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
                            Type
                        </th>
                        <th>
                            Date of Birth
                        </th>
                        <th>
                            Phone
                        </th>
                        <th>
                            Gender
                        </th>
                        
                        <th>
                            Status
                        </th>
                        <th>
                            Actions
                        </th>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td><img src="{{asset($user->avater)}}" alt="" height=100px weight=150px></td>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->type }}</td>
                                    <td>{{ $user->dob }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->gender}}</td>
                                    <td>{{ $user->status }}</td>
                                    <td>
                                        @if($user->status == 'Active')
                                        {{ Form::open(['route'=>['block.user',$user->id],'method'=>'get']) }}
                                            {{ Form::submit('BLOCK',['onclick'=>"return confirm('Are you confirm ?')"]) }}
                                        {{ Form::close() }}
                                       @else
                                        {{ Form::open(['route'=>['block.user',$user->id],'method'=>'get']) }}
                                            {{ Form::submit('UNBLOCK',['onclick'=>"return confirm('Are you confirm ?')"]) }}
                                        {{ Form::close() }}
                                        @endif
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