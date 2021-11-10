@extends('layouts.master')
@section('title')
<title>Prestasi - SIMS</title>
@stop
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Prestasi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item"><a href="/prestasi">Prestasi</a></li>
                    <li class="breadcrumb-item active">Monitoring Prestasi</li>
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
                <h3 class="card-title">Data Prestasi</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-tambahprestasi" title="Menambah Prestasi Santri">
                        <i class="fa far fa-plus-square"></i> Tambah Prestasi
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div id="prestasi_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="data_prestasi" class="table table-hover table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <tr role="row">
                                        <th class="text-center"></th>
                                        <th class="text-center">Tanggal Prestasi</th>
                                        <th class="text-center">Nama Santri</th>
                                        <th class="text-center">Nama Prestasi</th>
                                        <th class="text-center">Jenis Prestasi</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0;?>
                                    @foreach($prestasi as $pre)
                                    <?php $no++ ;?>
                                    <tr role="row">
                                        <td class="text-center">{{$no}}</td>
                                        <td class="text-center">{{$pre->tanggalprestasi}}</td>
                                        <td class="text-center">{{$pre->santri->namasantri}}</td>
                                        <td class="text-center">{{$pre->namaprestasi}}</td>
                                        <td class="text-center">{{$pre->jenisprestasi}}</td>
                                        <td class=" actions text-center">
                                            <div class="btn-group">
                                                <a class="btn btn-info btn-xs ng-scope" href="/prestasi/bukti/{{$pre->id}}" target="_blank" title="Melihat Bukti Prestasi Santri">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a class="btn btn-warning btn-xs ng-scope text-white" href="/prestasi/edit/{{$pre->id}}" title="Mengedit Prestasi Santri">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a class="btn btn-danger btn-xs ng-scope" href="/prestasi/hapus/{{$pre->id}}" onclick="return confirm ('Yakin ingin menghapus data?')" title="Menghapus Prestasi Santri">
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
                    <a href="/prestasi/exportprestasi_excel" class="btn btn-default btn-sm" ng-click="add()" title="Mengekspor Data Prestasi Menjadi Excel">
                        <i class="far fa-file-excel"></i> Export Excel
                    </a>
                    <a href="/prestasi/cetakprestasi_pdf" class="btn btn-default btn-sm" target="_blank" ng-click="add()" title="Mencetak Data Prestasi Menjadi Pdf">
                        <i class="far fa-file-pdf"></i> Cetak PDF
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-tambahprestasi">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Prestasi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/prestasi/store" role="form" method="POST" enctype="multipart/form-data">
                    <div class="modal-body"> 
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group {{$errors->has('pilihsantri') ? ' has-error' : ''}}">
                                    <label for="pilihsantri">Pilih Santri</label>
                                    <select name="pilihsantri" class="form-control select2bs4" style="width: 100%;">
                                        @foreach($santri as $s)
                                        <option value="{{$s->id}}" {{(old('pilihsantri') == '') ? ' selected' : ''}}>{{$s->nomorinduk}} - {{$s->namasantri}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group {{$errors->has('kelas') ? ' has-error' : ''}}">
                                    <label for="kelas">Kelas</label>
                                    <select name="kelas" class="form-control">
                                        @foreach($kelas as $k)
                                        <option value="{{$k->kelas}}" {{(old('kelas') == '') ? ' selected' : ''}}>{{$k->kelas}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group {{$errors->has('tanggalprestasi') ? ' has-error' : ''}}">
                                    <label for="tempatprestasi">Tanggal Prestasi</label>
                                    <input name="tanggalprestasi" type="date" class="form-control" id="tanggalprestasi" placeholder="Masukkan Tanggal Prestasi" value="{{old('tanggalprestasi')}}">
                                    @if ($errors->has('tanggalprestasi'))
                                        <span class="help-block text-danger">{{$errors->first('tanggalprestasi')}}</span>
                                    @endif
                                </div>
                                <div class="form-group {{$errors->has('namaprestasi') ? ' has-error' : ''}}">
                                    <label for="namaprestasi">Nama Prestasi</label>
                                    <textarea name="namaprestasi" class="form-control" rows="3" id="namaprestasi" placeholder="Masukkan Nama Prestasi">{{old('namaprestasi')}}</textarea>
                                    @if ($errors->has('namaprestasi'))
                                        <span class="help-block text-danger">{{$errors->first('namaprestasi')}}</span>
                                    @endif
                                </div>
                                <div class="form-group {{$errors->has('jenisprestasi') ? ' has-error' : ''}}">
                                    <label for="jenisprestasi">Jenis Prestasi</label>
                                    <select name="jenisprestasi" class="form-control">
                                        <option value="Internal" {{(old('jenisprestasi') == 'Internal') ? ' selected' : ''}}>Internal</option>
                                        <option value="Eksternal" {{(old('jenisprestasi') == 'Eksternal') ? ' selected' : ''}}>Eksternal</option>
                                    </select>
                                </div>
                                <div class="form-group {{$errors->has('buktiprestasi') ? ' has-error' : ''}}">
                                    <label for="buktiprestasi">Bukti Prestasi</label>
                                    <input name="buktiprestasi" type="file" class="form-control" id="buktiprestasi" value="{{old('buktiprestasi')}}">
                                    @if ($errors->has('buktiprestasi'))
                                        <span class="help-block text-danger">{{$errors->first('buktiprestasi')}}</span>
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
</section>
@stop 

@section('footer')
<script>
    $(function () {
        $("#data_prestasi").DataTable({
        "responsive": true,
        "autoWidth": false,
        });

        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });
    });
</script>
@stop