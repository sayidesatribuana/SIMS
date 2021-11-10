@extends('layouts.master')
@section('title')
<title>Pelanggaran - SIMS</title>
@stop
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Pelanggaran</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item"><a href="/pelanggaran">Pelanggaran</a></li>
                    <li class="breadcrumb-item active">Monitoring Pelanggaran</li>
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
                <h3 class="card-title">Data Pelanggaran</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-tambahpelanggaran" title="Menambah Pelanggaran Santri">
                        <i class="fa far fa-plus-square"></i> Tambah Pelanggaran
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div id="pelanggaran_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="data_pelanggaran" class="table table-hover table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <tr role="row">
                                        <th class="text-center"></th>
                                        <th class="text-center">Tanggal Pelanggaran</th>
                                        <th class="text-center">Nama Santri</th>
                                        <th class="text-center">Nama Pelanggaran</th>
                                        <th class="text-center">Jenis Pelanggaran</th>
                                        <th class="text-center">Sanksi Pelanggaran</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0;?>
                                    @foreach($pelanggaran as $pel)
                                    <?php $no++ ;?>
                                    <tr role="row">
                                        <td class="text-center">{{$no}}</td>
                                        <td class="text-center">{{$pel->tanggalpelanggaran}}</td>
                                        <td class="text-center">{{$pel->santri->namasantri}}</td>
                                        <td class="text-center">{{$pel->namapelanggaran}}</td>
                                        <td class="text-center">{{$pel->jenispelanggaran}}</td>
                                        <td class="text-center">{{$pel->sanksipelanggaran}}</td>
                                        <td class=" actions text-center">    
                                            <div class="btn-group">
                                                <a class="btn btn-info btn-xs ng-scope" href="/pelanggaran/bukti/{{$pel->id}}" target="_blank" title="Melihat Bukti Pelanggaran Santri">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a class="btn btn-warning btn-xs ng-scope text-white" href="/pelanggaran/edit/{{$pel->id}}" title="Mengedit Pelanggaran Santri">   
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a class="btn btn-danger btn-xs ng-scope" href="/pelanggaran/hapus/{{$pel->id}}" onclick="return confirm ('Yakin ingin menghapus data?')" title="Menghapus Pelanggaran Santri">   
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
                    <a href="/pelanggaran/exportpelanggaran_excel" class="btn btn-default btn-sm" ng-click="add()" title="Mengekspor Data Pelanggaran Menjadi Excel">
                        <i class="far fa-file-excel"></i> Export Excel
                    </a>
                    <a href="/pelanggaran/cetakpelanggaran_pdf" class="btn btn-default btn-sm" target="_blank" ng-click="add()" title="Mencetak Data Pelanggaran Menjadi Pdf">
                        <i class="far fa-file-pdf"></i> Cetak PDF
                    </a>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-tambahpelanggaran">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Pelanggaran</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/pelanggaran/store" role="form" method="POST" enctype="multipart/form-data">
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
                                    <div class="form-group {{$errors->has('tanggalpelanggaran') ? ' has-error' : ''}}">
                                        <label for="tempatpelanggaran">Tanggal Pelanggaran</label>
                                        <input name="tanggalpelanggaran" type="date" class="form-control" id="tanggalpelanggaran" placeholder="Masukkan Tanggal Pelanggaran" value="{{old('tanggalpelanggaran')}}">
                                        @if ($errors->has('tanggalpelanggaran'))
                                            <span class="help-block text-danger">{{$errors->first('tanggalpelanggaran')}}</span>
                                        @endif
                                    </div>
                                    <div class="form-group {{$errors->has('namapelanggaran') ? ' has-error' : ''}}">
                                        <label for="namapelanggaran">Nama Pelanggaran</label>
                                        <textarea name="namapelanggaran" class="form-control" rows="3" id="namapelanggaran" placeholder="Masukkan Nama Pelanggaran">{{old('namapelanggaran')}}</textarea>
                                        @if ($errors->has('namapelanggaran'))
                                            <span class="help-block text-danger">{{$errors->first('namapelanggaran')}}</span>
                                        @endif
                                    </div>
                                    <div class="form-group {{$errors->has('jenispelanggaran') ? ' has-error' : ''}}">
                                        <label for="jenispelanggaran">Jenis Pelanggaran</label>
                                        <select name="jenispelanggaran" class="form-control">
                                            <option value="Ringan" {{(old('jenispelanggaran') == 'Ringan') ? ' selected' : ''}}>Ringan</option>
                                            <option value="Sedang" {{(old('jenispelanggaran') == 'Sedang') ? ' selected' : ''}}>Sedang</option>
                                            <option value="Berat" {{(old('jenispelanggaran') == 'Berat') ? ' selected' : ''}}>Berat</option>
                                        </select>
                                    </div>
                                    <div class="form-group {{$errors->has('sanksipelanggaran') ? ' has-error' : ''}}">
                                        <label for="sanksipelanggaran">Sanksi Pelanggaran</label>
                                        <textarea name="sanksipelanggaran" class="form-control" rows="3" id="sanksipelanggaran" placeholder="Masukkan sanksi Pelanggaran">{{old('sanksipelanggaran')}}</textarea>
                                        @if ($errors->has('sanksipelanggaran'))
                                            <span class="help-block text-danger">{{$errors->first('sanksipelanggaran')}}</span>
                                        @endif
                                    </div>
                                    <div class="form-group {{$errors->has('buktipelanggaran') ? ' has-error' : ''}}">
                                        <label for="buktipelanggaran">Bukti Pelanggaran</label>
                                        <input name="buktipelanggaran" type="file" class="form-control" id="buktipelanggaran" value="{{old('buktipelanggaran')}}">
                                        @if ($errors->has('buktipelanggaran'))
                                            <span class="help-block text-danger">{{$errors->first('buktipelanggaran')}}</span>
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
    </div>
</section>
@stop

@section('footer')
<script>
  $(function () {
    $("#data_pelanggaran").DataTable({
      "responsive": true,
      "autoWidth": false,
    });

    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });
  });
</script>
@stop