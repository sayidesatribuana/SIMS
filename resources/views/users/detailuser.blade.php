@extends('layouts.master')
@section('title')
<title>Detail User - SIMS</title>
@stop
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Detail User</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
					<li class="breadcrumb-item"><a href="/users">Users</a></li>
                    <li class="breadcrumb-item active">Detail User</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="col-lg-4 col-6">
        @foreach($users as $u)
		<div class="small-box bg-secondary">
			<div class="inner">
				<h3>{{$u->role}}</h3>
				<p>{{$u->name}}</p>
			</div>
			<div class="icon">
				<i class="fas fa-user-friends"></i>
			</div>
			<a data-toggle="collapse" href="#detail_user" class="small-box-footer btn" title="Melihat Detail User"><i class="fa fa-search"></i> Lihat Detail User</a>
		</div>
		<div class="collapse" id="detail_user">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <strong>
                                <i class="fa fa-user"></i> 
                                Username
                            </strong>
                            <p class="text-muted">
                                {{$u->username}}
                            </p>
                        </div>
                        <div class="col-md-6">
                            <strong>
                                <i class="fa fa-clock"></i> 
                                Akun Dibuat
                            </strong>
                            <p class="text-muted">
                                {{$u->created_at}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-center">
                        <a href="/users" class="btn btn-default btn-sm" ng-click="add()">Close</a>
                        <a href="/users/edit/{{$u->username}}" class="btn btn-default btn-sm" title="Mengedit User">
                            <i class="fa fa-edit"></i> Edit User
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@stop