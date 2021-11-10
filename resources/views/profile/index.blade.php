@extends('layouts.master')
@section('title')
<title>Profile - SIMS</title>
@stop
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Profile</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Profile</li>
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
            <strong> Password tidak berhasil diganti!</strong>
            <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    @endif

    <div class="col-lg-4 col-6">
		<div class="small-box bg-secondary">
			<div class="inner">
				<h3>{{auth()->user()->role}}</h3>
				<p>{{auth()->user()->name}}</p>
			</div>
			<div class="icon">
				<i class="fas fa-user-friends"></i>
			</div>
			<a data-toggle="collapse" href="#detail_user" class="small-box-footer btn"><i class="fa fa-search"></i> Lihat Detail User</a>
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
                                {{auth()->user()->username}}
                            </p>
                        </div>
                        <div class="col-md-6">
                            <strong>
                                <i class="fa fa-clock"></i> 
                                Akun Dibuat
                            </strong>
                            <p class="text-muted">
                                {{auth()->user()->created_at}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-center">
                        <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-gantipassword" title="Mengganti Password">
                        	<i class="fa fa-key"></i> Ganti Password
                    	</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

		<div class="modal fade" id="modal-gantipassword">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-white"><i class="fa fa-key"></i> Ganti Password</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('gantipassword')}}" role="form" method="POST">
                        <div class="modal-body">
                            {{csrf_field()}}
                            <div class="col-md-12">
                                <div class="form-group {{$errors->has('passwordlama') ? ' has-error' : ''}}">
                                    <label for="passwordlama">Password Lama</label>
                                    <input name="passwordlama" type="password" class="form-control" id="password" placeholder="Masukkan Password Lama" value="{{old('passwordlama')}}">
                                    <input type="checkbox" id="checkboxpasswordlama"> Tampilkan Password
                                    @if ($errors->has('passwordlama'))
                                        <span class="help-block text-danger">{{$errors->first('passwordlama')}}</span>
                                    @endif
                                </div>
                                <div class="form-group {{$errors->has('passwordbaru') ? ' has-error' : ''}}">
                                    <label for="passwordbaru">Password Baru</label>
                                    <input name="passwordbaru" type="password" class="form-control" id="passwordbaru" placeholder="Masukkan Password Baru" value="{{old('passwordbaru')}}">
                                    <input type="checkbox" id="checkboxpasswordbaru"> Tampilkan Password
                                    @if ($errors->has('passwordbaru'))
                                        <span class="help-block text-danger">{{$errors->first('passwordbaru')}}</span>
                                    @endif
                                </div>
								<div class="form-group {{$errors->has('konfirmasipassword') ? ' has-error' : ''}}">
                                    <label for="konfirmasipassword">Konfirmasi Password</label>
                                    <input name="konfirmasipassword" type="password" class="form-control" id="konfirmasipassword" placeholder="Masukkan Konfirmasi Password" value="{{old('konfirmasipassword')}}">
                                    @if ($errors->has('passwordbaru'))
                                        <span class="help-block text-danger">{{$errors->first('passwordbaru')}}</span>
                                    @endif
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
</section>
@stop

@section('footer')
<script type="text/javascript">
	$(document).ready(function(){		
		$("#checkboxpasswordlama").click(function(){
			if($(this).is(':checked')){
				$("#password").attr('type','text');
			}else{
				$("#password").attr('type','password');
			}
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){		
		$("#checkboxpasswordbaru").click(function(){
			if($(this).is(':checked')){
				$("#passwordbaru").attr('type','text');
			}else{
				$("#passwordbaru").attr('type','password');
			}
		});
	});
</script>
@stop