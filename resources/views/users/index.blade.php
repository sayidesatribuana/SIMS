@extends('layouts.master')
@section('title')
<title>Users - SIMS</title>
@stop
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Users</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Users</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    @if(session('sukses'))
        <div class="col-md-4">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fa fas fa-check"></i>
                <strong> {{session('sukses')}}</strong>
                <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif
    @if(session('error'))
    <div class="col-md-4">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fa fas fa-times"></i>
            <strong> {{session('error')}}</strong>
            <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    @endif
    @if (count($errors) > 0)
    <div class="col-md-4">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fa fas fa-times"></i>
            <strong> Data tidak berhasil ditambah!</strong>
            <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    @endif

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Users</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-tambahuser" title="Menambah User">
                        <i class="fa far fa-plus-square"></i> Tambah User
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div id="users_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="data_users" class="table table-hover table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <tr role="row">
                                        <th></th>
                                        <th class="text-center">Username</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Role</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0;?>
                                    @foreach($users as $u)
                                    <?php $no++ ;?>
                                    <tr role="row">
                                        <td class="text-center">{{$no}}</td>
                                        <td class="text-center">{{$u->username}}</td>
                                        <td>{{$u->name}}</td>
                                        <td class="text-center">
                                            @if($u->role == 'Super Admin')
                                            <span class="badge badge-primary">{{$u->role}}</span>
                                            @elseif ($u->role == 'Admin')
                                            <span class="badge badge-info">{{$u->role}}</span>
                                            @endif
                                        </td>
                                        <td class="actions text-center">
                                            <div class="btn-group">
                                                <a class="btn btn-info btn-xs ng-scope" href="/users/detail/{{$u->username}}" title="Melihat Detail User">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a class="btn btn-warning btn-xs ng-scope text-white" href="/users/edit/{{$u->username}}" title="Mengedit Data User">   
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a class="btn btn-danger btn-xs ng-scope" href="/users/hapus/{{$u->username}}" onclick="return confirm ('Yakin ingin menghapus data?')" title="Menghapus User">   
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-tambahuser">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah User</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/user/store" role="form" method="POST">
                        <div class="modal-body">
                            {{csrf_field()}}
                            <div class="col-md-12">
                                <div class="form-group {{$errors->has('name') ? ' has-error' : ''}}">
                                    <label for="name">Nama</label>
                                    <input name="name" type="text" class="form-control" id="name" placeholder="Masukkan Nama" value="{{old('name')}}">
                                    @if ($errors->has('name'))
                                        <span class="help-block text-danger">{{$errors->first('name')}}</span>
                                    @endif
                                </div>
                                <div class="form-group {{$errors->has('username') ? ' has-error' : ''}}">
                                    <label for="username">Username</label>
                                    <input name="username" type="text" class="form-control" id="username" placeholder="Masukkan Username" value="{{old('username')}}">
                                    @if ($errors->has('username'))
                                        <span class="help-block text-danger">{{$errors->first('username')}}</span>
                                    @endif
                                </div>
                                <div class="form-group {{$errors->has('password') ? ' has-error' : ''}}">
                                    <label for="password">Password</label>
                                    <input name="password" type="password" class="form-control" id="password" placeholder="Masukkan Password" value="{{old('password')}}">
                                    <input type="checkbox" id="checkboxpassword"> Tampilkan Password
                                    @if ($errors->has('password'))
                                        <span class="help-block text-danger">{{$errors->first('password')}}</span>
                                    @endif
                                </div>
                                <div class="form-group {{$errors->has('role') ? ' has-error' : ''}}">
                                    <label for="role">Role</label>
                                    <select name="role" class="form-control">
                                        <option value="Super Admin" {{(old('role') == 'Super Admin') ? ' selected' : ''}}>Super Admin</option>
                                        <option value="Admin" {{(old('role') == 'Admin') ? ' selected' : ''}}>Admin</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@stop

@section('footer')
<script>
  $(function () {
    $("#data_users").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
</script>
<script type="text/javascript">
	$(document).ready(function(){		
		$("#checkboxpassword").click(function(){
			if($(this).is(':checked')){
				$("#password").attr('type','text');
			}else{
				$("#password").attr('type','password');
			}
		});
	});
</script>
@stop