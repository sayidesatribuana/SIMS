@extends('layouts.master')
@section('title')
<title>Edit Santri - SIMS</title>
@stop
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Santri</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item"><a href="/santri">Santri</a></li>
                    <li class="breadcrumb-item active">Edit Santri</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Form Edit Santri</h3>
            </div>
            @foreach($santri as $s)
            <form role="form" action="/santri/update" method="POST">
                <div class="card-body">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" name="id" value="{{ $s->id }}">
                            <div class="form-group">
                                <label for="nomorinduk">Nomor Induk</label>
                                <input name="nomorinduk" type="text" class="form-control" id="nomorinduk" value="{{$s->nomorinduk}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="namasantri">Nama Santri</label>
                                <input name="namasantri" type="text" class="form-control" id="namasantri" value="{{$s->namasantri}}">
                            </div>
                            <div class="form-group">
                                <label for="jeniskelamin">Jenis Kelamin</label>
                                <select name="jeniskelamin" class="form-control">
                                    <option value="Laki-laki" @if($s->jeniskelamin == 'Laki-laki') selected @endif>Laki-laki</option>
                                    <option value="Perempuan" @if($s->jeniskelamin == 'Perempuan') selected @endif>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tempatlahir">Tempat Lahir</label>
                                <input name="tempatlahir" type="text" class="form-control" id="tempatlahir" value="{{$s->tempatlahir}}">
                            </div>
                            <div class="form-group">
                                <label for="tempatlahir">Tanggal Lahir</label>
                                <input name="tanggallahir" type="date" class="form-control" id="tanggallahir" value="{{$s->tanggallahir}}">
                            </div>
                            <div class="form-group">
                                <label for="nomorhp">Nomor HP</label>
                                <input name="nomorhp" type="text" class="form-control" id="nomorhp" value="{{$s->nomorhp}}">
                            </div>
                            <div class="form-group">
                                <label for="kelas">Kelas</label>
                                <select name="kelas" class="form-control">
                                    @foreach($kelas as $k)
                                    <option value="{{$k->kelas}}">{{$k->kelas}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tahunajaran">Tahun Ajaran</label>
                                <select name="tahunajaran" class="form-control">
                                    @foreach($tahunajaran as $t)
                                    <option value="{{$t->tahunajaran}}">{{$t->tahunajaran}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" class="form-control" rows="3" id="alamat">{{$s->alamat}}</textarea>
                            </div>
                        </div>  
                    </div>
                </div>
                <div class="card-footer">
                    <a href="/santri" class="btn btn-default" ng-click="add()">Close</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            @endforeach
        </div>
    </div>
</section>
@stop