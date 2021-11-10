@extends('layouts.master')
@section('title')
<title>Edit Pelanggaran - SIMS</title>
@stop
@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Pelanggaran</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item"><a href="/pelanggaran">Pelanggaran</a></li>
                    <li class="breadcrumb-item active">Edit Pelanggaran</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Form Edit Pelanggaran</h3>
            </div>
            @foreach($pelanggaran as $pel)
            <form role="form" action="/pelanggaran/update" method="POST">
                <div class="card-body">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" name="id" value="{{ $pel->id }}">
                            <div class="row">
                                <div class="col-md-9 form-group">
                                    <input name="pilihsantri" type="text" class="form-control text-center" id="pilihsantri" value="{{$pel->santri->nomorinduk}} - {{$pel->santri->namasantri}}" readonly>
                                </div>
                                <div class="col-md-3 form-group">
                                    <input name="kelas" type="text" class="form-control text-center" id="kelas" value="{{$pel->kelas}}" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tanggalpelanggaran">Tanggal Pelanggaran</label>
                                <input name="tanggalpelanggaran" type="date" class="form-control" id="tanggalpelanggaran" value="{{$pel->tanggalpelanggaran}}">
                            </div>
                            <div class="form-group">
                                <label for="namapelanggaran">Nama Pelanggaran</label>
                                <textarea name="namapelanggaran" class="form-control" rows="3" id="namapelanggaran" value="{{$pel->namapelanggaran}}">{{$pel->namapelanggaran}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="jenispelanggaran">Jenis Pelanggaran</label>
                                <select name="jenispelanggaran" class="form-control">
                                    <option value="Ringan" @if($pel->jenispelanggaran == 'Ringan') selected @endif>Ringan</option>
                                    <option value="Sedang" @if($pel->jenispelanggaran == 'Sedang') selected @endif>Sedang</option>
                                    <option value="Berat" @if($pel->jenispelanggaran == 'Berat') selected @endif>Berat</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sanksipelanggaran">Sanksi Pelanggaran</label>
                                <textarea name="sanksipelanggaran" class="form-control" rows="3" id="sanksipelanggaran" value="{{$pel->sanksipelanggaran}}">{{$pel->sanksipelanggaran}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="buktipelanggaran">Bukti Pelanggaran</label>
                                <input name="buktipelanggaran" type="file" class="form-control" id="buktipelanggaran" value="{{$pel->buktipelanggaran}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="/pelanggaran" class="btn btn-default" ng-click="add()">Close</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            @endforeach
        </div>
    </div>
</section>
@stop