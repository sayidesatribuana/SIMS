@extends('layouts.master')
@section('title')
<title>Perizinan - SIMS</title>
@stop
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Perizinan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item"><a href="/perizinan">Perizinan</a></li>
                    <li class="breadcrumb-item active">Monitoring Perizinan</li>
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
                <h3 class="card-title">Data Perizinan</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-tambahperizinan" title="Menambah Perizinan Santri">
                        <i class="fa far fa-plus-square"></i> Tambah Perizinan
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div id="perizinan_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="data_perizinan" class="table table-hover table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <tr role="row">
                                        <th class="text-center"></th>
                                        <th class="text-center">Tanggal Perizinan</th>
                                        <th class="text-center">Tanggal Kembali</th>
                                        <th class="text-center">Nama Santri</th>
                                        <th class="text-center">Perihal Perizinan</th>
                                        <th class="text-center">Keterangan Kembali</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0;?>
                                    @foreach($perizinan as $per)
                                    <?php $no++ ;?>
                                    <tr role="row">
                                        <td class="text-center">{{$no}}</td>
                                        <td class="text-center">{{$per->tanggalperizinan}}</td>
                                        <td class="text-center">{{$per->tanggalkembali}}</td>
                                        <td class="text-center">{{$per->santri->namasantri}}</td>
                                        <td class="text-center">{{$per->perihalperizinan}}</td>
                                        <td class="text-center">{{$per->keterangankembali}}</td>
                                        <td class=" actions text-center">
                                            <div class="btn-group">
                                                <a class="btn btn-warning btn-xs ng-scope text-white" href="/perizinan/edit/{{$per->id}}" title="Mengedit Perizinan Santri">   
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a class="btn btn-danger btn-xs ng-scope" href="/perizinan/hapus/{{$per->id}}" onclick="return confirm ('Yakin ingin menghapus data?')" title="Menghapus Perizinan Santri">   
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
                    <a href="/perizinan/exportperizinan_excel" class="btn btn-default btn-sm" ng-click="add()" title="Mengekspor Data Perizinan Menjadi Excel">
                    <i class="far fa-file-excel"></i> Export Excel
                </a>
                    <a href="/perizinan/cetakperizinan_pdf" class="btn btn-default btn-sm" target="_blank" ng-click="add()" title="Mencetak Data Perizinan Menjadi Pdf">
                    <i class="far fa-file-pdf"></i> Cetak PDF
                </a>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-tambahperizinan">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Perizinan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/perizinan/store" role="form" method="POST">
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
                                    <div class="form-group {{$errors->has('tanggalperizinan') ? ' has-error' : ''}}">
                                        <label for="tempatperizinan">Tanggal Perizinan</label>
                                        <input name="tanggalperizinan" type="date" class="form-control" id="tanggalperizinan" placeholder="Masukkan Tanggal Perizinan" value="{{old('tanggalperizinan')}}">
                                        @if ($errors->has('tanggalperizinan'))
                                            <span class="help-block text-danger">{{$errors->first('tanggalperizinan')}}</span>
                                        @endif
                                    </div>
                                    <div class="form-group {{$errors->has('tanggalkembali') ? ' has-error' : ''}}">
                                        <label for="tempatkembali">Tanggal Kembali</label>
                                        <input name="tanggalkembali" type="date" class="form-control" id="tanggalkembali" placeholder="Masukkan Tanggal Kembali" value="{{old('tanggalkembali')}}">
                                        @if ($errors->has('tanggalkembali'))
                                            <span class="help-block text-danger">{{$errors->first('tanggalkembali')}}</span>
                                        @endif
                                    </div>
                                    <div class="form-group {{$errors->has('perihalperizinan') ? ' has-error' : ''}}">
                                        <label for="perihalperizinan">Perihal Perizinan</label>
                                        <textarea name="perihalperizinan" class="form-control" rows="3" id="perihalperizinan" placeholder="Masukkan Perihal Perizinan">{{old('perihalperizinan')}}</textarea>
                                        @if ($errors->has('perihalperizinan'))
                                            <span class="help-block text-danger">{{$errors->first('perihalperizinan')}}</span>
                                        @endif
                                    </div>
                                    <div class="form-group {{$errors->has('perihalperizinan') ? ' has-error' : ''}}">
                                        <label for="keterangankembali">Keterangan Kembali</label>
                                        <select name="keterangankembali" class="form-control">
                                            <option value="Tepat Waktu" {{(old('keterangankembali') == 'Tepat Waktu') ? ' selected' : ''}}>Tepat Waktu</option>
                                            <option value="Terlambat" {{(old('keterangankembali') == 'Terlambat') ? ' selected' : ''}}>Terlambat</option>
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
    </div>
</section>
@stop

@section('footer')
<script>
  $(function () {
    $("#data_perizinan").DataTable({
      "responsive": true,
      "autoWidth": false,
    });

    $('.select2bs4').select2({
        theme: 'bootstrap4'
    });
  });
</script>
@stop