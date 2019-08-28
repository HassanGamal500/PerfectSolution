@extends('layouts.app')

@section('page_title')
    Users
@endsection

@section('content')

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Users Table</h3>
        <a href="{{url(route('user.create'))}}" class="badge bg-blue pull-right"><i class="fa fa-plus"></i> New User</a>
    </div>
    <!-- /.box-header -->
    @if(count($users))
        <div class="box-body">
            <table class="table table-bordered">
                <tr>
                    <th style="width: 10px">#</th>
                    <th style="width: 200px">Name</th>
                    <th style="width: 100px">Phone</th>
                    <th style="width: 200px">Email</th>
                    <th style="width: 40px; text-align: center">Edit</th>
                    <th style="width: 40px; text-align: center">Delete</th>
                </tr>
                @foreach($users as $user)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->email}}</td>
                    <td style="text-align: center"><a href="{{url(route('user.edit', $user->id))}}" class="badge bg-green"><i class="fa fa-edit"></i></a></td>
                    <td style="text-align: center">
                        <form method="POST" action="{{route('user.destroy', $user->id)}}">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="badge bg-red"><i class="fa fa-trash-o"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    @else
        <div class="alert alert-danger" role="alert">
            No Data
        </div>
    @endif
    <!-- /.box-body -->
    <div class="box-footer clearfix">
        <ul class="pagination pagination-sm no-margin pull-right">
            <li><a href="#">&laquo;</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">&raquo;</a></li>
        </ul>
    </div>
</div>
<!-- /.box -->

@endsection
