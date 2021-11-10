@extends('layouts.master')
@section('title')
<title>Dashboard - SIMS</title>
@stop
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Dashboard {{auth()->user()->role}}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{$totalsantri}}</h3>
                        <p>Total Santri Tahun {{$year}}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <a href="/santri" class="small-box-footer" title="Menuju Halaman Santri"><i class="fas fa-user-graduate"></i> Ke Halaman Santri</a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$totalprestasi}}</h3>
                        <p>Total Prestasi Tahun {{$year}}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <a href="/prestasi" class="small-box-footer" title="Menuju Halaman Prestasi"><i class="fas fa-trophy"></i> Ke Halaman Prestasi</a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{$totalpelanggaran}}</h3>
                        <p>Total Pelanggaran Tahun {{$year}}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <a href="/pelanggaran" class="small-box-footer" title="Menuju Halaman Pelanggaran"><i class="fas fa-exclamation-triangle"></i> Ke Halaman Pelanggaran</a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$totalperizinan}}</h3>
                        <p>Total Perizinan Tahun {{$year}}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-suitcase-rolling"></i>
                    </div>
                    <a href="/perizinan" class="small-box-footer" title="Menuju Halaman Perizinan"><i class="fas fa-suitcase-rolling"></i> Ke Halaman Perizinan</a>
                </div>
            </div>
            @if(auth()->user()->role == 'Super Admin')
            <div class="col-lg-3 col-6">
                <div class="small-box bg-secondary">
                    <div class="inner">
                        <h3>{{$totalusers}}</h3>
                        <p>Total Users</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-friends"></i>
                    </div>
                    <a href="/users" class="small-box-footer" title="Menuju Halaman Perizinan"><i class="fas fa-user-friends"></i> Ke Halaman Users</a>
                </div>
            </div>
            @elseif(auth()->user()->role == 'Admin')
            <div class="col-lg-3 col-6">
                <div class="small-box bg-default"></div>
            </div>
            @endif
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <a data-toggle="collapse" href="#prestasi_santri" class="small-box-footer btn" title="Melihat Monitoring Prestasi Santri"><i class="fas fa-chart-line"></i> Monitoring Prestasi Santri</a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <a data-toggle="collapse" href="#pelanggaran_santri" class="small-box-footer btn" title="Melihat Monitoring Pelanggaran Santri"><i class="fas fa-chart-line"></i> Monitoring Pelanggaran Santri</a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <a data-toggle="collapse" href="#perizinan_santri" class="small-box-footer btn" title="Melihat Monitoring Perizinan Santri"><i class="fas fa-chart-line"></i> Monitoring Perizinan Santri</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="collapse" id="prestasi_santri">
            <div class="card">
                <div class="card-header bg-success">
                    <h3 class="card-title">Monitoring Prestasi Santri Tahun {{$year}}</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody class="text-center">
                                <tr>
                                    <td><b class="text-success">{{$totalprestasi}}</b> <i class="fas fa-trophy text-success"></td>
                                    <td><b>Jan</b></td>
                                    <td><b>Feb</b></td>
                                    <td><b>Mar</b></td>
                                    <td><b>Apr</b></td>
                                    <td><b>Mei</b></td>
                                    <td><b>Jun</b></td>
                                    <td><b>Jul</b></td>
                                    <td><b>Agu</b></td>
                                    <td><b>Sep</b></td>
                                    <td><b>Okt</b></td>
                                    <td><b>Nov</b></td>
                                    <td><b>Des</b></td>
                                </tr>             
                                <tr>
                                    <td><b>1-KMI</b></td>
                                    <td>{{$prestasi_januari_a}}</td>
                                    <td>{{$prestasi_februari_a}}</td>
                                    <td>{{$prestasi_maret_a}}</td>       
                                    <td>{{$prestasi_april_a}}</td>
                                    <td>{{$prestasi_mei_a}}</td>
                                    <td>{{$prestasi_juni_a}}</td>
                                    <td>{{$prestasi_juli_a}}</td>
                                    <td>{{$prestasi_agustus_a}}</td>
                                    <td>{{$prestasi_september_a}}</td>
                                    <td>{{$prestasi_oktober_a}}</td>
                                    <td>{{$prestasi_november_a}}</td>
                                    <td>{{$prestasi_desember_a}}</td>
                                </tr>
                                <tr>
                                    <td><b>2-KMI</b></td>
                                    <td>{{$prestasi_januari_b}}</td>
                                    <td>{{$prestasi_februari_b}}</td>
                                    <td>{{$prestasi_maret_b}}</td>       
                                    <td>{{$prestasi_april_b}}</td>
                                    <td>{{$prestasi_mei_b}}</td>
                                    <td>{{$prestasi_juni_b}}</td>
                                    <td>{{$prestasi_juli_b}}</td>
                                    <td>{{$prestasi_agustus_b}}</td>
                                    <td>{{$prestasi_september_b}}</td>
                                    <td>{{$prestasi_oktober_b}}</td>
                                    <td>{{$prestasi_november_b}}</td>
                                    <td>{{$prestasi_desember_b}}</td>
                                </tr>
                                <tr>
                                    <td><b>3-KMI</b></td>
                                    <td>{{$prestasi_januari_c}}</td>
                                    <td>{{$prestasi_februari_c}}</td>
                                    <td>{{$prestasi_maret_c}}</td>       
                                    <td>{{$prestasi_april_c}}</td>
                                    <td>{{$prestasi_mei_c}}</td>
                                    <td>{{$prestasi_juni_c}}</td>
                                    <td>{{$prestasi_juli_c}}</td>
                                    <td>{{$prestasi_agustus_c}}</td>
                                    <td>{{$prestasi_september_c}}</td>
                                    <td>{{$prestasi_oktober_c}}</td>
                                    <td>{{$prestasi_november_c}}</td>
                                    <td>{{$prestasi_desember_c}}</td>
                                </tr>
                                <tr>
                                    <td><b>4-KMI</b></td>
                                    <td>{{$prestasi_januari_d}}</td>
                                    <td>{{$prestasi_februari_d}}</td>
                                    <td>{{$prestasi_maret_d}}</td>       
                                    <td>{{$prestasi_april_d}}</td>
                                    <td>{{$prestasi_mei_d}}</td>
                                    <td>{{$prestasi_juni_d}}</td>
                                    <td>{{$prestasi_juli_d}}</td>
                                    <td>{{$prestasi_agustus_d}}</td>
                                    <td>{{$prestasi_september_d}}</td>
                                    <td>{{$prestasi_oktober_d}}</td>
                                    <td>{{$prestasi_november_d}}</td>
                                    <td>{{$prestasi_desember_d}}</td>
                                </tr>
                                <tr>
                                    <td><b>5-KMI</b></td>
                                    <td>{{$prestasi_januari_e}}</td>
                                    <td>{{$prestasi_februari_e}}</td>
                                    <td>{{$prestasi_maret_e}}</td>       
                                    <td>{{$prestasi_april_e}}</td>
                                    <td>{{$prestasi_mei_e}}</td>
                                    <td>{{$prestasi_juni_e}}</td>
                                    <td>{{$prestasi_juli_e}}</td>
                                    <td>{{$prestasi_agustus_e}}</td>
                                    <td>{{$prestasi_september_e}}</td>
                                    <td>{{$prestasi_oktober_e}}</td>
                                    <td>{{$prestasi_november_e}}</td>
                                    <td>{{$prestasi_desember_e}}</td>
                                </tr>
                                <tr>
                                    <td><b>6-KMI</b></td>
                                    <td>{{$prestasi_januari_f}}</td>
                                    <td>{{$prestasi_februari_f}}</td>
                                    <td>{{$prestasi_maret_f}}</td>       
                                    <td>{{$prestasi_april_f}}</td>
                                    <td>{{$prestasi_mei_f}}</td>
                                    <td>{{$prestasi_juni_f}}</td>
                                    <td>{{$prestasi_juli_f}}</td>
                                    <td>{{$prestasi_agustus_f}}</td>
                                    <td>{{$prestasi_september_f}}</td>
                                    <td>{{$prestasi_oktober_f}}</td>
                                    <td>{{$prestasi_november_f}}</td>
                                    <td>{{$prestasi_desember_f}}</td>
                                </tr>
                                <tr>
                                    <td><b>Total</b></td>
                                    <td>{{$totalprestasi_januari}}</td>
                                    <td>{{$totalprestasi_februari}}</td>
                                    <td>{{$totalprestasi_maret}}</td>       
                                    <td>{{$totalprestasi_april}}</td>
                                    <td>{{$totalprestasi_mei}}</td>
                                    <td>{{$totalprestasi_juni}}</td>
                                    <td>{{$totalprestasi_juli}}</td>
                                    <td>{{$totalprestasi_agustus}}</td>
                                    <td>{{$totalprestasi_september}}</td>
                                    <td>{{$totalprestasi_oktober}}</td>
                                    <td>{{$totalprestasi_november}}</td>
                                    <td>{{$totalprestasi_desember}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="collapse" id="pelanggaran_santri">
            <div class="card">
                <div class="card-header bg-danger">
                    <h3 class="card-title">Monitoring Pelanggaran Santri Tahun {{$year}}</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody class="text-center">
                                <tr>
                                    <td><b class="text-danger">{{$totalpelanggaran}}</b> <i class="fas fa-exclamation-triangle text-danger"></td>
                                    <td><b>Jan</b></td>
                                    <td><b>Feb</b></td>
                                    <td><b>Mar</b></td>
                                    <td><b>Apr</b></td>
                                    <td><b>Mei</b></td>
                                    <td><b>Jun</b></td>
                                    <td><b>Jul</b></td>
                                    <td><b>Agu</b></td>
                                    <td><b>Sep</b></td>
                                    <td><b>Okt</b></td>
                                    <td><b>Nov</b></td>
                                    <td><b>Des</b></td>
                                </tr>             
                                <tr>
                                    <td><b>1-KMI</b></td>
                                    <td>{{$pelanggaran_januari_a}}</td>
                                    <td>{{$pelanggaran_februari_a}}</td>
                                    <td>{{$pelanggaran_maret_a}}</td>       
                                    <td>{{$pelanggaran_april_a}}</td>
                                    <td>{{$pelanggaran_mei_a}}</td>
                                    <td>{{$pelanggaran_juni_a}}</td>
                                    <td>{{$pelanggaran_juli_a}}</td>
                                    <td>{{$pelanggaran_agustus_a}}</td>
                                    <td>{{$pelanggaran_september_a}}</td>
                                    <td>{{$pelanggaran_oktober_a}}</td>
                                    <td>{{$pelanggaran_november_a}}</td>
                                    <td>{{$pelanggaran_desember_a}}</td>
                                </tr>
                                <tr>
                                    <td><b>2-KMI</b></td>
                                    <td>{{$pelanggaran_januari_b}}</td>
                                    <td>{{$pelanggaran_februari_b}}</td>
                                    <td>{{$pelanggaran_maret_b}}</td>       
                                    <td>{{$pelanggaran_april_b}}</td>
                                    <td>{{$pelanggaran_mei_b}}</td>
                                    <td>{{$pelanggaran_juni_b}}</td>
                                    <td>{{$pelanggaran_juli_b}}</td>
                                    <td>{{$pelanggaran_agustus_b}}</td>
                                    <td>{{$pelanggaran_september_b}}</td>
                                    <td>{{$pelanggaran_oktober_b}}</td>
                                    <td>{{$pelanggaran_november_b}}</td>
                                    <td>{{$pelanggaran_desember_b}}</td>
                                </tr>
                                <tr>
                                    <td><b>3-KMI</b></td>
                                    <td>{{$pelanggaran_januari_c}}</td>
                                    <td>{{$pelanggaran_februari_c}}</td>
                                    <td>{{$pelanggaran_maret_c}}</td>       
                                    <td>{{$pelanggaran_april_c}}</td>
                                    <td>{{$pelanggaran_mei_c}}</td>
                                    <td>{{$pelanggaran_juni_c}}</td>
                                    <td>{{$pelanggaran_juli_c}}</td>
                                    <td>{{$pelanggaran_agustus_c}}</td>
                                    <td>{{$pelanggaran_september_c}}</td>
                                    <td>{{$pelanggaran_oktober_c}}</td>
                                    <td>{{$pelanggaran_november_c}}</td>
                                    <td>{{$pelanggaran_desember_c}}</td>
                                </tr>
                                <tr>
                                    <td><b>4-KMI</b></td>
                                    <td>{{$pelanggaran_januari_d}}</td>
                                    <td>{{$pelanggaran_februari_d}}</td>
                                    <td>{{$pelanggaran_maret_d}}</td>       
                                    <td>{{$pelanggaran_april_d}}</td>
                                    <td>{{$pelanggaran_mei_d}}</td>
                                    <td>{{$pelanggaran_juni_d}}</td>
                                    <td>{{$pelanggaran_juli_d}}</td>
                                    <td>{{$pelanggaran_agustus_d}}</td>
                                    <td>{{$pelanggaran_september_d}}</td>
                                    <td>{{$pelanggaran_oktober_d}}</td>
                                    <td>{{$pelanggaran_november_d}}</td>
                                    <td>{{$pelanggaran_desember_d}}</td>
                                </tr>
                                <tr>
                                    <td><b>5-KMI</b></td>
                                    <td>{{$pelanggaran_januari_e}}</td>
                                    <td>{{$pelanggaran_februari_e}}</td>
                                    <td>{{$pelanggaran_maret_e}}</td>       
                                    <td>{{$pelanggaran_april_e}}</td>
                                    <td>{{$pelanggaran_mei_e}}</td>
                                    <td>{{$pelanggaran_juni_e}}</td>
                                    <td>{{$pelanggaran_juli_e}}</td>
                                    <td>{{$pelanggaran_agustus_e}}</td>
                                    <td>{{$pelanggaran_september_e}}</td>
                                    <td>{{$pelanggaran_oktober_e}}</td>
                                    <td>{{$pelanggaran_november_e}}</td>
                                    <td>{{$pelanggaran_desember_e}}</td>
                                </tr>
                                <tr>
                                    <td><b>6-KMI</b></td>
                                    <td>{{$pelanggaran_januari_f}}</td>
                                    <td>{{$pelanggaran_februari_f}}</td>
                                    <td>{{$pelanggaran_maret_f}}</td>       
                                    <td>{{$pelanggaran_april_f}}</td>
                                    <td>{{$pelanggaran_mei_f}}</td>
                                    <td>{{$pelanggaran_juni_f}}</td>
                                    <td>{{$pelanggaran_juli_f}}</td>
                                    <td>{{$pelanggaran_agustus_f}}</td>
                                    <td>{{$pelanggaran_september_f}}</td>
                                    <td>{{$pelanggaran_oktober_f}}</td>
                                    <td>{{$pelanggaran_november_f}}</td>
                                    <td>{{$pelanggaran_desember_f}}</td>
                                </tr>
                                <tr>
                                    <td><b>Total</b></td>
                                    <td>{{$totalpelanggaran_januari}}</td>
                                    <td>{{$totalpelanggaran_februari}}</td>
                                    <td>{{$totalpelanggaran_maret}}</td>       
                                    <td>{{$totalpelanggaran_april}}</td>
                                    <td>{{$totalpelanggaran_mei}}</td>
                                    <td>{{$totalpelanggaran_juni}}</td>
                                    <td>{{$totalpelanggaran_juli}}</td>
                                    <td>{{$totalpelanggaran_agustus}}</td>
                                    <td>{{$totalpelanggaran_september}}</td>
                                    <td>{{$totalpelanggaran_oktober}}</td>
                                    <td>{{$totalpelanggaran_november}}</td>
                                    <td>{{$totalpelanggaran_desember}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="collapse" id="perizinan_santri">
            <div class="card">
                <div class="card-header bg-info">
                    <h3 class="card-title">Monitoring Perizinan Santri Tahun {{$year}}</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody class="text-center">
                                <tr>
                                    <td><b class="text-info">{{$totalperizinan}}</b> <i class="fas fa-suitcase-rolling text-info"></td>
                                    <td><b>Jan</b></td>
                                    <td><b>Feb</b></td>
                                    <td><b>Mar</b></td>
                                    <td><b>Apr</b></td>
                                    <td><b>Mei</b></td>
                                    <td><b>Jun</b></td>
                                    <td><b>Jul</b></td>
                                    <td><b>Agu</b></td>
                                    <td><b>Sep</b></td>
                                    <td><b>Okt</b></td>
                                    <td><b>Nov</b></td>
                                    <td><b>Des</b></td>
                                </tr>             
                                <tr>
                                    <td><b>1-KMI</b></td>
                                    <td>{{$perizinan_januari_a}}</td>
                                    <td>{{$perizinan_februari_a}}</td>
                                    <td>{{$perizinan_maret_a}}</td>       
                                    <td>{{$perizinan_april_a}}</td>
                                    <td>{{$perizinan_mei_a}}</td>
                                    <td>{{$perizinan_juni_a}}</td>
                                    <td>{{$perizinan_juli_a}}</td>
                                    <td>{{$perizinan_agustus_a}}</td>
                                    <td>{{$perizinan_september_a}}</td>
                                    <td>{{$perizinan_oktober_a}}</td>
                                    <td>{{$perizinan_november_a}}</td>
                                    <td>{{$perizinan_desember_a}}</td>
                                </tr>
                                <tr>
                                    <td><b>2-KMI</b></td>
                                    <td>{{$perizinan_januari_b}}</td>
                                    <td>{{$perizinan_februari_b}}</td>
                                    <td>{{$perizinan_maret_b}}</td>       
                                    <td>{{$perizinan_april_b}}</td>
                                    <td>{{$perizinan_mei_b}}</td>
                                    <td>{{$perizinan_juni_b}}</td>
                                    <td>{{$perizinan_juli_b}}</td>
                                    <td>{{$perizinan_agustus_b}}</td>
                                    <td>{{$perizinan_september_b}}</td>
                                    <td>{{$perizinan_oktober_b}}</td>
                                    <td>{{$perizinan_november_b}}</td>
                                    <td>{{$perizinan_desember_b}}</td>
                                </tr>
                                <tr>
                                    <td><b>3-KMI</b></td>
                                    <td>{{$perizinan_januari_c}}</td>
                                    <td>{{$perizinan_februari_c}}</td>
                                    <td>{{$perizinan_maret_c}}</td>       
                                    <td>{{$perizinan_april_c}}</td>
                                    <td>{{$perizinan_mei_c}}</td>
                                    <td>{{$perizinan_juni_c}}</td>
                                    <td>{{$perizinan_juli_c}}</td>
                                    <td>{{$perizinan_agustus_c}}</td>
                                    <td>{{$perizinan_september_c}}</td>
                                    <td>{{$perizinan_oktober_c}}</td>
                                    <td>{{$perizinan_november_c}}</td>
                                    <td>{{$perizinan_desember_c}}</td>
                                </tr>
                                <tr>
                                    <td><b>4-KMI</b></td>
                                    <td>{{$perizinan_januari_d}}</td>
                                    <td>{{$perizinan_februari_d}}</td>
                                    <td>{{$perizinan_maret_d}}</td>       
                                    <td>{{$perizinan_april_d}}</td>
                                    <td>{{$perizinan_mei_d}}</td>
                                    <td>{{$perizinan_juni_d}}</td>
                                    <td>{{$perizinan_juli_d}}</td>
                                    <td>{{$perizinan_agustus_d}}</td>
                                    <td>{{$perizinan_september_d}}</td>
                                    <td>{{$perizinan_oktober_d}}</td>
                                    <td>{{$perizinan_november_d}}</td>
                                    <td>{{$perizinan_desember_d}}</td>
                                </tr>
                                <tr>
                                    <td><b>5-KMI</b></td>
                                    <td>{{$perizinan_januari_e}}</td>
                                    <td>{{$perizinan_februari_e}}</td>
                                    <td>{{$perizinan_maret_e}}</td>       
                                    <td>{{$perizinan_april_e}}</td>
                                    <td>{{$perizinan_mei_e}}</td>
                                    <td>{{$perizinan_juni_e}}</td>
                                    <td>{{$perizinan_juli_e}}</td>
                                    <td>{{$perizinan_agustus_e}}</td>
                                    <td>{{$perizinan_september_e}}</td>
                                    <td>{{$perizinan_oktober_e}}</td>
                                    <td>{{$perizinan_november_e}}</td>
                                    <td>{{$perizinan_desember_e}}</td>
                                </tr>
                                <tr>
                                    <td><b>6-KMI</b></td>
                                    <td>{{$perizinan_januari_f}}</td>
                                    <td>{{$perizinan_februari_f}}</td>
                                    <td>{{$perizinan_maret_f}}</td>       
                                    <td>{{$perizinan_april_f}}</td>
                                    <td>{{$perizinan_mei_f}}</td>
                                    <td>{{$perizinan_juni_f}}</td>
                                    <td>{{$perizinan_juli_f}}</td>
                                    <td>{{$perizinan_agustus_f}}</td>
                                    <td>{{$perizinan_september_f}}</td>
                                    <td>{{$perizinan_oktober_f}}</td>
                                    <td>{{$perizinan_november_f}}</td>
                                    <td>{{$perizinan_desember_f}}</td>
                                </tr>
                                <tr>
                                    <td><b>Total</b></td>
                                    <td>{{$totalperizinan_januari}}</td>
                                    <td>{{$totalperizinan_februari}}</td>
                                    <td>{{$totalperizinan_maret}}</td>       
                                    <td>{{$totalperizinan_april}}</td>
                                    <td>{{$totalperizinan_mei}}</td>
                                    <td>{{$totalperizinan_juni}}</td>
                                    <td>{{$totalperizinan_juli}}</td>
                                    <td>{{$totalperizinan_agustus}}</td>
                                    <td>{{$totalperizinan_september}}</td>
                                    <td>{{$totalperizinan_oktober}}</td>
                                    <td>{{$totalperizinan_november}}</td>
                                    <td>{{$totalperizinan_desember}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop

@section('footer')
<script>
var ctx = document.getElementById('prestasiChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: ['Jan', 'Feb'],
        datasets: [{
            label: '1-KMI',
            backgroundColor: '#dc3545',
            borderColor: '#dc3545',
            data: [15, 10, 5, 2, 20, 30, 25, 7, 35, 32, 23, 12]
        }, {
            label: '2-KMI',
            backgroundColor: '#28a745',
            borderColor: '#28a745',
            data: [12, 8, 5, 9, 12, 15, 17, 8, 9, 13, 19, 28]
        }, {
            label: '3-KMI',
            backgroundColor: '#ffc107',
            borderColor: '#ffc107',
            data: [22, 10, 17, 22, 27, 17, 21, 19, 10, 6, 10, 18]
        }, {
            label: '4-KMI',
            backgroundColor: '#3c8dbc',
            borderColor: '#3c8dbc',
            data: [19, 8, 15, 29, 14, 11, 10, 25, 21, 11, 28, 20]
        }, {
            label: '5-KMI',
            backgroundColor: '#605ca8',
            borderColor: '#605ca8',
            data: [14, 29, 19, 10, 19, 20, 28, 27, 20, 26, 25, 26]
        }, {
            label: '6-KMI',
            backgroundColor: '#ff851b',
            borderColor: '#ff851b',
            data: [13, 5, 22, 9, 30, 8, 15, 28, 19, 6, 10, 5]
        }]
    },

    // Configuration options go here
    options: {}
});

var ctx = document.getElementById('pelanggaranChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
        datasets: [{
            label: '1-KMI',
            backgroundColor: '#dc3545',
            borderColor: '#dc3545',
            data: [15, 10, 5, 2, 20, 30, 25, 7, 35, 32, 23, 12]
        }, {
            label: '2-KMI',
            backgroundColor: '#28a745',
            borderColor: '#28a745',
            data: [12, 8, 5, 9, 12, 15, 17, 8, 9, 13, 19, 28]
        }, {
            label: '3-KMI',
            backgroundColor: '#ffc107',
            borderColor: '#ffc107',
            data: [22, 10, 17, 22, 27, 17, 21, 19, 10, 6, 10, 18]
        }, {
            label: '4-KMI',
            backgroundColor: '#3c8dbc',
            borderColor: '#3c8dbc',
            data: [19, 8, 15, 29, 14, 11, 10, 25, 21, 11, 28, 20]
        }, {
            label: '5-KMI',
            backgroundColor: '#605ca8',
            borderColor: '#605ca8',
            data: [14, 29, 19, 10, 19, 20, 28, 27, 20, 26, 25, 26]
        }, {
            label: '6-KMI',
            backgroundColor: '#ff851b',
            borderColor: '#ff851b',
            data: [13, 5, 22, 9, 30, 8, 15, 28, 19, 6, 10, 5]
        }]
    },

    // Configuration options go here
    options: {}
});

var ctx = document.getElementById('perizinanChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
        datasets: [{
            label: '1-KMI',
            backgroundColor: '#dc3545',
            borderColor: '#dc3545',
            data: [15, 10, 5, 2, 20, 30, 25, 7, 35, 32, 23, 12]
        }, {
            label: '2-KMI',
            backgroundColor: '#28a745',
            borderColor: '#28a745',
            data: [12, 8, 5, 9, 12, 15, 17, 8, 9, 13, 19, 28]
        }, {
            label: '3-KMI',
            backgroundColor: '#ffc107',
            borderColor: '#ffc107',
            data: [22, 10, 17, 22, 27, 17, 21, 19, 10, 6, 10, 18]
        }, {
            label: '4-KMI',
            backgroundColor: '#3c8dbc',
            borderColor: '#3c8dbc',
            data: [19, 8, 15, 29, 14, 11, 10, 25, 21, 11, 28, 20]
        }, {
            label: '5-KMI',
            backgroundColor: '#605ca8',
            borderColor: '#605ca8',
            data: [14, 29, 19, 10, 19, 20, 28, 27, 20, 26, 25, 26]
        }, {
            label: '6-KMI',
            backgroundColor: '#ff851b',
            borderColor: '#ff851b',
            data: [13, 5, 22, 9, 30, 8, 15, 28, 19, 6, 10, 5]
        }]
    },

    // Configuration options go here
    options: {}
});
</script>
@stop