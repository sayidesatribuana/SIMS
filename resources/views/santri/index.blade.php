@extends('layouts.master')
@section('title')
<title>Santri - SIMS</title>
@stop
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Santri</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Santri</li>
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
                <h3 class="card-title">Data Santri</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-tambahsantri" title="Menambah Santri">
                        <i class="fa far fa-plus-square"></i> Tambah Santri
                    </button>
                    @if(auth()->user()->role == 'Super Admin')
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-importexcel" title="Mengimport Santri Dari Excel">
                        <i class="fas fa-file-excel"></i> Import Excel
                    </button>
                    <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-kenaikankelas" title="Menaikan Kelas Santri">
                        <i class="fas fa-user-tie"></i> Kenaikan Kelas
                    </button>
                    <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-kelulusan" title="Meluluskan Santri">
                        <i class="fas fa-user-graduate"></i> Kelulusan
                    </button>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <div id="santri_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="data_santri" class="table table-hover table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <tr role="row">
                                        <th class="text-center"></th>
                                        <th class="text-center">Nomor Induk</th>
                                        <th class="text-center">Nama Santri</th>
                                        <th class="text-center">Jenis Kelamin</th>
                                        <th class="text-center">Kelas</th>
                                        <th class="text-center">Tahun Masuk</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0;?>
                                    @foreach($santri as $s)
                                    <?php $no++ ;?>
                                    <tr role="row">
                                        <td class="text-center">{{$no}}</td>
                                        <td class="text-center">{{$s->nomorinduk}}</td>
                                        <td class="text-center">{{$s->namasantri}}</td>
                                        <td class="text-center">{{$s->jeniskelamin}}</td>
                                        <td class="text-center">
                                            @if($s->kelas == 'LULUS (MTs)')
                                            <span class="badge badge-info">{{$s->kelas}}</span>
                                            @elseif ($s->kelas == 'LULUS (MA)')
                                            <span class="badge badge-info">{{$s->kelas}}</span>
                                            @else
                                            {{$s->kelas}}
                                            @endif
                                        </td>
                                        <td class="text-center">{{$s->tahunajaran}}</td>
                                        <td class="actions text-center">
                                            <div class="btn-group">
                                                <a class="btn btn-info btn-xs ng-scope" href="/santri/detail/{{$s->id}}" title="Melihat Detail Santri">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a class="btn btn-warning btn-xs ng-scope text-white" href="/santri/edit/{{$s->id}}" title="Mengedit Santri">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a class="btn btn-danger btn-xs ng-scope" href="/santri/hapus/{{$s->id}}" onclick="return confirm ('Yakin ingin menghapus data?')" title="Menghapus Santri">
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
            <div class="card-footer">
                <div class="card-tools text-center">
                    <a href="/santri/export_excel" class="btn btn-default btn-sm" ng-click="add()" title="Mengekspor Data Santri Menjadi Excel">
                        <i class="far fa-file-excel"></i> Export Excel
                    </a>
                    <a href="/santri/cetak_pdf" target="_blank" class="btn btn-default btn-sm" ng-click="add()" title="Mencetak Data Santri Menjadi Pdf">
                        <i class="far fa-file-pdf"></i> Cetak PDF
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-tambahsantri" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Santri</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/santri/store" role="form" method="POST" id="formTambahSantri">
                    <div class="modal-body">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group {{$errors->has('nomorinduk') ? ' has-error' : ''}}">
                                    <label for="nomorinduk">Nomor Induk</label>
                                    <input name="nomorinduk" type="text" class="form-control" id="nomorinduk" placeholder="Masukkan Nomor Induk" value="{{old('nomorinduk')}}">
                                    @if ($errors->has('nomorinduk'))
                                        <span class="help-block text-danger">{{$errors->first('nomorinduk')}}</span>
                                    @endif
                                </div>
                                <div class="form-group {{$errors->has('namasantri') ? ' has-error' : ''}}">
                                    <label for="namasantri">Nama Santri</label>
                                    <input name="namasantri" type="text" class="form-control" id="namasantri" placeholder="Masukkan Nama Santri" value="{{old('namasantri')}}">
                                    @if ($errors->has('namasantri'))
                                        <span class="help-block text-danger">{{$errors->first('namasantri')}}</span>
                                    @endif
                                </div>
                                <div class="form-group {{$errors->has('jeniskelamin') ? ' has-error' : ''}}">
                                    <label for="jeniskelamin">Jenis Kelamin</label>
                                    <select name="jeniskelamin" class="form-control">
                                        <option value="Laki-laki" {{(old('jeniskelamin') == 'Laki-laki') ? ' selected' : ''}}>Laki-laki</option>
                                        <option value="Perempuan" {{(old('jeniskelamin') == 'Perempuan') ? ' selected' : ''}}>Perempuan</option>
                                    </select>
                                    @if ($errors->has('jeniskelamin'))
                                        <span class="help-block text-danger">{{$errors->first('jeniskelamin')}}</span>
                                    @endif
                                </div>
                                <div class="form-group {{$errors->has('tempatlahir') ? ' has-error' : ''}}">
                                    <label for="tempatlahir">Tempat Lahir</label>
                                    <input name="tempatlahir" type="text" class="form-control" id="tempatlahir" placeholder="Masukkan Tempat Lahir" value="{{old('tempatlahir')}}">
                                    @if ($errors->has('tempatlahir'))
                                        <span class="help-block text-danger">{{$errors->first('tempatlahir')}}</span>
                                    @endif
                                </div>
                                <div class="form-group {{$errors->has('tanggallahir') ? ' has-error' : ''}}">
                                    <label for="tempatlahir">Tanggal Lahir</label>
                                    <input name="tanggallahir" type="date" class="form-control" id="tanggallahir" placeholder="Masukkan Tanggal Lahir" value="{{old('tanggallahir')}}">
                                    @if ($errors->has('tanggallahir'))
                                        <span class="help-block text-danger">{{$errors->first('tanggallahir')}}</span>
                                    @endif
                                </div>
                                <div class="form-group {{$errors->has('alamat') ? ' has-error' : ''}}">
                                    <label for="alamat">Alamat</label>
                                    <textarea name="alamat" class="form-control" rows="4" id="alamat" placeholder="Masukkan Alamat">{{old('alamat')}}</textarea>
                                    @if ($errors->has('alamat'))
                                        <span class="help-block text-danger">{{$errors->first('alamat')}}</span>
                                    @endif
                                </div>
                                <div class="form-group {{$errors->has('nomorhp') ? ' has-error' : ''}}">
                                    <label for="nomorhp">Nomor HP</label>
                                    <input name="nomorhp" type="text" class="form-control" id="nomorhp" placeholder="Masukkan Nomor HP" value="{{old('nomorhp')}}">
                                    @if ($errors->has('nomorhp'))
                                        <span class="help-block text-danger">{{$errors->first('nomorhp')}}</span>
                                    @endif
                                </div>
                                <div class="form-group {{$errors->has('kelas') ? ' has-error' : ''}}">
                                    <label for="kelas">Kelas</label>
                                    <select name="kelas" class="form-control">
                                        @foreach($kelas as $k)
                                        <option value="{{$k->kelas}}" {{(old('kelas') == '') ? ' selected' : ''}}>{{$k->kelas}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('kelas'))
                                        <span class="help-block text-danger">{{$errors->first('kelas')}}</span>
                                    @endif
                                </div>
                                <div class="form-group {{$errors->has('tahunajaran') ? ' has-error' : ''}}">
                                    <label for="tahunajaran">Tahun Ajaran</label>
                                    <select name="tahunajaran" class="form-control">
                                        @foreach($tahunajaran as $t)
                                        <option value="{{$t->tahunajaran}}" {{(old('tahunajaran') == '') ? ' selected' : ''}}>{{$t->tahunajaran}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('tahunajaran'))
                                        <span class="help-block text-danger">{{$errors->first('tahunajaran')}}</span>
                                    @endif
                                </div>
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
    
    <div class="modal fade" id="modal-importexcel" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Import Excel</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="/santri/import_excel" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <p>Silahkan memilih file yang akan diinput.</p>
                        <div class="form-group {{$errors->has('file') ? ' has-error' : ''}}">
                            <input name="file" type="file" id="file" placeholder="Masukkan File" value="{{old('file')}}">
                            <div>
                                @if ($errors->has('file'))
                                    <span class="help-block text-danger">{{$errors->first('file')}}</span>
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

    <div class="modal fade" id="modal-kenaikankelas" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Kenaikan Kelas</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/santri/kenaikankelas" role="form" method="POST">
                    <div class="modal-body">
                        {{csrf_field()}}
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="kelassaatini">Kelas Saat Ini</label>
                                <select name="kelassaatini" class="form-control">
                                    @foreach($kelas as $k)
                                    <option value="{{$k->kelas}}">{{$k->kelas}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kenaikankelas">Kenaikan Kelas</label>
                                <select name="kenaikankelas" class="form-control">
                                    @foreach($kelas as $k)
                                    <option value="{{$k->kelas}}">{{$k->kelas}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <p class="text-danger">*Silahkan melakukan kenaikan kelas dimulai dari kelas dengan tingkatan yang tertinggi dahulu.</p>
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

    <div class="modal fade" id="modal-kelulusan" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Kelulusan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/santri/kelulusan" role="form" method="POST">
                    <div class="modal-body">
                        {{csrf_field()}}
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="kelassaatini">Kelas Saat Ini</label>
                                <select name="kelassaatini" class="form-control">
                                    @foreach($kelas as $k)
                                    <option value="{{$k->kelas}}">{{$k->kelas}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kelulusan">Kelulusan</label>
                                <select name="kelulusan" class="form-control">
                                    <option value="LULUS (MTs)">LULUS (MTs)</option>
                                    <option value="LULUS (MA)">LULUS (MA)</option>
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
</section>
@stop

@section('footer')
<script>
    $(function () {
        $("#data_santri").DataTable({
        "responsive": true,
        "autoWidth": false,
        });
    });
</script>
@stop