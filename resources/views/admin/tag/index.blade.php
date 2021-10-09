@extends('admin/layouts/master')
@section('content')
    <div class="col-md-12">
        <a href="{{ route('tag.create') }}" class="btn btn-primary">Add New</a>
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Tag</h4>
                <p class="card-category"> All tag here</p>
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
                            Actions
                        </th>
                        </thead>
                        <tbody>
                            @foreach($tags as $tag)
                                <tr>
                                    <td>{{ $tag->id }}</td>
                                    <td>{{ $tag->name }}</td>
                                    <td>
                                        <a href="{{ route('tag.edit',$tag->id) }}">Edit</a>
                                        {{ Form::open(['route'=>['tag.destroy',$tag->id],'method'=>'DELETE']) }}
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