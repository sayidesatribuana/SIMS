<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cetak Detail Santri - SIMS</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 4 -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('assets/dist/css/adminlte.min.css')}}">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
<div class="wrapper">
    <section class="content">
        <div class="row">
            <div class="col-12">
                <h2 class="page-header text-center">Detail Santri Pondok Modern Asy-Syifa Balikpapan.</h2>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12">
                    @foreach($santri as $s)
                        <div class="text-center">
                            <h3>{{$s->namasantri}}</h3>
                            <b>{{$s->nomorinduk}}</b>
                            <p>{{$s->kelas}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-md-3">
                            <strong class="text-center">
                                <i class="fas fa-restroom"></i> 
                                Jenis Kelamin
                            </strong>
                            <p class="text-muted">
                                {{$s->jeniskelamin}}
                            </p>
                            <strong>
                                <i class="fas fa-calendar"></i> 
                                Tahun Ajaran
                            </strong>
                            <p class="text-muted">
                                {{$s->tahunajaran}}
                            </p>
                        </div>
                        <div class="col-md-3">
                            <strong>
                                <i class="fas fa-map-marked-alt"></i> 
                                Tempat Lahir
                            </strong>
                            <p class="text-muted">
                                {{$s->tempatlahir}}
                            </p>
                            <strong>
                                <i class="fas fa-birthday-cake"></i> 
                                Tanggal Lahir
                            </strong>
                            <p class="text-muted">
                                {{$s->tanggallahir}}
                            </p>
                        </div>
                        <div class="col-md-3">
                            <strong>
                                <i class="fas fa-map-marked-alt"></i> 
                                Alamat
                            </strong>
                            <p class="text-muted">
                                {{$s->alamat}}
                            </p>
                            <strong>
                                <i class="fas fa-mobile-alt"></i> 
                                Nomor HP
                            </strong>
                            <p class="text-muted">
                                {{$s->nomorhp}}
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        @endforeach
                                <div class="card card-body">
                                <h4>Prestasi Santri</h4>
                                    <div class="table-responsive">
                                        <table id="tablePrestasi" class="table table-hover table-striped dataTable" role="grid" aria-describedby="example1_info">
                                            <thead>
                                                <tr role="row">
                                                    <td>No</td>
                                                    <td>Tanggal Prestasi</td>
                                                    <td>Nama Prestasi</td>
                                                    <td>Jenis Prestasi</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 0;?>
                                                @foreach($prestasi as $pre)
                                                <?php $no++ ;?>
                                                <tr>
                                                    <td>{{$no}}</td>
                                                    <td>{{$pre->tanggalprestasi}}</td>
                                                    <td>{{$pre->namaprestasi}}</td>
                                                    <td>{{$pre->jenisprestasi}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <medium class="float-right">Jumlah Prestasi: {{$jumlahprestasi}}</medium>
                                    </div>
                                </div>
                                <div class="card card-body">
                                <h4>Pelanggaran Santri</h4>
                                    <div class="table-responsive">
                                        <table id="tablePelanggaran" class="table table-hover table-striped dataTable" role="grid" aria-describedby="example1_info">
                                            <thead>
                                                <tr role="row">
                                                    <td>No</td>
                                                    <td>Tanggal Pelanggaran</td>
                                                    <td>Nama Pelanggaran</td>
                                                    <td>Jenis Pelanggaran</td>
                                                    <td>Sanksi Pelanggaran</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 0;?>
                                                @foreach($pelanggaran as $pel)
                                                <?php $no++ ;?>
                                                <tr>
                                                    <td>{{$no}}</td>
                                                    <td>{{$pel->tanggalpelanggaran}}</td>
                                                    <td>{{$pel->namapelanggaran}}</td>
                                                    <td>{{$pel->jenispelanggaran}}</td>
                                                    <td>{{$pel->sanksipelanggaran}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <medium class="float-right">Jumlah Pelanggaran: {{$jumlahpelanggaran}}</medium>
                                    </div>
                                </div>
                                <div class="card card-body">
                                    <h4>Perizinan Santri</h4>
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-hover table-striped dataTable" role="grid" aria-describedby="example1_info">
                                            <thead>
                                                <tr role="row">
                                                    <td>No</td>
                                                    <td>Tanggal Perizinan</td>
                                                    <td>Tanggal Kembali</td>
                                                    <td>Perihal Perizinan</td>
                                                    <td>Keterangan Kembali</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 0;?>
                                                @foreach($perizinan as $per)
                                                <?php $no++ ;?>
                                                <tr>
                                                    <td>{{$no}}</td>
                                                    <td>{{$per->tanggalperizinan}}</td>
                                                    <td>{{$per->tanggalkembali}}</td>
                                                    <td>{{$per->perihalperizinan}}</td>
                                                    <td>{{$per->keterangankembali}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <medium class="float-right">Jumlah Perizinan: {{$jumlahperizinan}}</medium>
                                    </div>
                                </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <small class="float-right">Date/Time: {{$now}}</small>
        </div>
    </section>
</div>

<script type="text/javascript"> 
    window.addEventListener("load", window.print());
</script>
</body>
</html>