@extends('layouts.app')

@section('page_title')
    Create Users
@endsection

@section('content')

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Create User</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form method="POST" action="{{ route('user.store') }}" class="form-horizontal">
        @csrf
        <div class="box-body">
            <div class="form-group">
                <label class="col-sm-2 control-label">Name</label>

                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Email</label>

                <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Phone</label>

                <div class="col-sm-10">
                    <input type="text" maxlength="11" name="phone" class="form-control" placeholder="Phone">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Password</label>

                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
            </div>
    </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <a href="{{ route('user.index') }}" class="btn btn-info pull-left">Cancel</a>
            <button type="submit" class="btn btn-info pull-right">Create</button>
        </div>
        <!-- /.box-footer -->
    </form>

</div>

@endsection
