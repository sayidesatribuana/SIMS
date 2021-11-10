@extends('layouts.master')
@section('title')
<title>Edit User - SIMS</title>
@stop
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit User</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item"><a href="/users">Users</a></li>
                    <li class="breadcrumb-item active">Edit User</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Form Edit Santri</h3>
            </div>
            @foreach($users as $u)
            <form role="form" action="/users/update" method="POST">
                <div class="card-body">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input name="name" type="text" class="form-control" id="name" value="{{$u->name}}">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input name="username" type="text" class="form-control" id="username" value="{{$u->username}}">
                            </div>
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select name="role" class="form-control">
                                    <option value="Super Admin" @if($u->role == 'Super Admin') selected @endif>Super Admin</option>
                                    <option value="Admin" @if($u->role == 'Admin') selected @endif>Admin</option>
                                </select>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="card-footer">
                    <a href="/users" class="btn btn-default" ng-click="add()">Close</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            @endforeach
        </div>
    </div>
</section>
@stop