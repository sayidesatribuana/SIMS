@extends('layouts.master')
@section('title')
<title>Edit Prestasi - SIMS</title>
@stop
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Prestasi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item"><a href="/prestasi">Prestasi</a></li>
                    <li class="breadcrumb-item active">Edit Prestasi</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Form Edit Prestasi</h3>
            </div>
            @foreach($prestasi as $pre)
            <form role="form" action="/prestasi/update" method="POST">
                <div class="card-body">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" name="id" value="{{ $pre->id }}">
                            <div class="row">
                                <div class="col-md-9 form-group">
                                    <input name="pilihsantri" type="text" class="form-control text-center" id="pilihsantri" value="{{$pre->santri->nomorinduk}} - {{$pre->santri->namasantri}}" readonly>
                                </div>
                                <div class="col-md-3 form-group">
                                    <input name="kelas" type="text" class="form-control text-center" id="kelas" value="{{$pre->kelas}}" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tanggalprestasi">Tanggal Prestasi</label>
                                <input name="tanggalprestasi" type="date" class="form-control" id="tanggalprestasi" value="{{$pre->tanggalprestasi}}">
                            </div>
                            <div class="form-group">
                                <label for="namaprestasi">Nama Prestasi</label>
                                <textarea name="namaprestasi" class="form-control" rows="3" id="namaprestasi" value="{{$pre->namaprestasi}}">{{$pre->namaprestasi}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="jenisprestasi">Jenis Prestasi</label>
                                <select name="jenisprestasi" class="form-control">
                                    <option value="Internal" @if($pre->jenisprestasi == 'Internal') selected @endif>Internal</option>
                                    <option value="Eksternal" @if($pre->jenisprestasi == 'Eksternal') selected @endif>Eksternal</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="buktiprestasi">Bukti Prestasi</label>
                                <input name="buktiprestasi" type="file" class="form-control" id="buktiprestasi" value="{{$pre->buktiprestasi}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="/prestasi" class="btn btn-default" ng-click="add()">Close</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            @endforeach
        </div>
    </div>
</section>
@stop