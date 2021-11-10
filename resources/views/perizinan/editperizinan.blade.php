@extends('layouts.master')
@section('title')
<title>Edit Perizinan - SIMS</title>
@stop
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Perizinan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item"><a href="/perizinan">Perizinan</a></li>
                    <li class="breadcrumb-item active">Edit Perizinan</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Form Edit Perizinan</h3>
            </div>
            @foreach($perizinan as $per)
            <form role="form" action="/perizinan/update" method="POST">
                <div class="card-body">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-sm-12">
                            <input type="hidden" name="id" value="{{ $per->id }}">
                            <div class="row">
                                <div class="col-md-9 form-group">
                                    <input name="pilihsantri" type="text" class="form-control text-center" id="pilihsantri" value="{{$per->santri->nomorinduk}} - {{$per->santri->namasantri}}" readonly>
                                </div>
                                <div class="col-md-3 form-group">
                                    <input name="kelas" type="text" class="form-control text-center" id="kelas" value="{{$per->kelas}}" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tanggalperizinan">Tanggal Perizinan</label>
                                <input name="tanggalperizinan" type="date" class="form-control" id="tanggalperizinan" value="{{$per->tanggalperizinan}}">
                            </div>
                            <div class="form-group">
                                <label for="tanggalkembali">Tanggal Kembali</label>
                                <input name="tanggalkembali" type="date" class="form-control" id="tanggalkembali" value="{{$per->tanggalkembali}}">
                            </div>
                            <div class="form-group">
                                <label for="perihalperizinan">Perihal Perizinan</label>
                                <textarea name="perihalperizinan" class="form-control" rows="3" id="perihalperizinan">{{$per->perihalperizinan}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="keterangankembali">Keterangan Kembali</label>
                                <select name="keterangankembali" class="form-control">
                                    <option value="Tepat Waktu" @if($per->keterangankembali == 'Tepat Waktu') selected @endif>Tepat Waktu</option>
                                    <option value="Terlambat" @if($per->keterangankembali == 'Terlambat') selected @endif>Terlambat</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="/perizinan" class="btn btn-default" ng-click="add()">Close</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            @endforeach 
        </div>
    </div>
</section>
@stop