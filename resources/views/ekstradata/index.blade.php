@extends('layouts.master')
@section('title')
<title>Ekstra Data - SIMS</title>
@stop
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Ekstra Data</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Ekstra Data</li>
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

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Tahun Ajaran</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-tambahtahunajaran" title="Menambah Tahun Ajaran">
                            <i class="fa far fa-plus-square"></i> Tambah Tahun Ajaran
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div id="santri_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="data_tahunajaran" class="table table-hover table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="text-center"></th>
                                            <th class="text-center">Tahun Ajaran</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 0;?>
                                        @foreach($tahunajaran as $t)
                                        <?php $no++ ;?>
                                        <tr role="row">
                                            <td class="text-center">{{$no}}</td>
                                            <td class="text-center">{{$t->tahunajaran}}</td>
                                            <td class="actions text-center">
                                                <a class="btn btn-danger btn-xs ng-scope" href="/ekstradata/tahunajaran/hapus/{{$t->id}}" onclick="return confirm ('Yakin ingin menghapus data?')" title="Menghapus Tahun Ajaran">   
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
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
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Kelas</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-tambahkelas" title="Menambah Kelas">
                            <i class="fa far fa-plus-square"></i> Tambah Kelas
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div id="santri_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="data_kelas" class="table table-hover table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="text-center"></th>
                                            <th class="text-center">Kelas</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 0;?>
                                        @foreach($kelas as $k)
                                        <?php $no++ ;?>
                                        <tr role="row">
                                            <td class="text-center">{{$no}}</td>
                                            <td class="text-center">{{$k->kelas}}</td>
                                            <td class="actions text-center">
                                                <a class="btn btn-danger btn-xs ng-scope" href="/ekstradata/kelas/hapus/{{$k->id}}" onclick="return confirm ('Yakin ingin menghapus data?')" title="Menghapus Kelas">   
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
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
        </div>

        <div class="modal fade" id="modal-tambahtahunajaran">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Tahun Ajaran</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/ekstradata/storetahunajaran" role="form" method="POST">
                        <div class="modal-body">
                            {{csrf_field()}}
                            <div class="col-md-12">
                                <div class="form-group {{$errors->has('tahunajaran') ? ' has-error' : ''}}">
                                    <label for="tahunajaran">Tahun Ajaran</label>
                                    <input name="tahunajaran" type="text" class="form-control" id="tahunajaran" placeholder="Masukkan Tahun Ajaran" value="{{old('tahunajaran')}}">
                                    @if ($errors->has('tahunajaran'))
                                        <span class="help-block text-danger">{{$errors->first('tahunajaran')}}</span>
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
        <div class="modal fade" id="modal-tambahkelas">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Kelas</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/ekstradata/storekelas" role="form" method="POST">
                        <div class="modal-body">
                            {{csrf_field()}}
                            <div class="col-md-12">
                                <div class="form-group {{$errors->has('kelas') ? ' has-error' : ''}}">
                                    <label for="kelas">Kelas</label>
                                    <input name="kelas" type="text" class="form-control" id="kelas" placeholder="Masukkan Kelas" value="{{old('kelas')}}">
                                    @if ($errors->has('kelas'))
                                        <span class="help-block text-danger">{{$errors->first('kelas')}}</span>
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
    </div>
</section>
@stop

@section('footer')
<script>
  $(function () {
    $("#data_tahunajaran").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $("#data_kelas").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
</script>
@stop