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
                <h2 class="page-header text-center">Data Santri Pondok Modern Asy-Syifa Balikpapan.</h2>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-body">
                                <h4>Data Santri</h4>
                                    <div class="table-responsive">
                                        <table id="tablePrestasi" class="table table-hover table-striped dataTable" role="grid" aria-describedby="example1_info">
                                            <thead>
                                                <tr role="row">
                                                    <td>No</td>
                                                    <td>Nomor Induk</td>
                                                    <td>Nama Santri</td>
                                                    <td>Jenis Kelamin</td>
                                                    <td>Tempat Lahir</td>
                                                    <td>Tanggal Lahir</td>
                                                    <td>Alamat</td>
                                                    <td>Nomor HP</td>
                                                    <td>Kelas</td>
                                                    <td>Tahun Masuk</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 0;?>
                                                @foreach($santri as $s)
                                                <?php $no++ ;?>
                                                <tr>
                                                    <td>{{$no}}</td>
                                                    <td>{{$s->nomorinduk}}</td>
                                                    <td>{{$s->namasantri}}</td>
                                                    <td>{{$s->jeniskelamin}}</td>
                                                    <td>{{$s->tempatlahir}}</td>
                                                    <td>{{$s->tanggallahir}}</td>
                                                    <td>{{$s->alamat}}</td>
                                                    <td>{{$s->nomorhp}}</td>
                                                    <td>{{$s->kelas}}</td>
                                                    <td>{{$s->tahunajaran}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <medium class="float-right">Jumlah Santri: {{$totalsantri}}</medium>
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