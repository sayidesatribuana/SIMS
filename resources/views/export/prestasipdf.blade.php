<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cetak Prestasi Santri - SIMS</title>
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
                <h2 class="page-header text-center">Data Prestasi Santri Pondok Modern Asy-Syifa Balikpapan.</h2>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-body">
                                <h4>Data Prestasi Santri</h4>
                                    <div class="table-responsive">
                                        <table id="tablePrestasi" class="table table-hover table-striped dataTable" role="grid" aria-describedby="example1_info">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nomor Induk</th>
                                                    <th>Nama Santri</th>
                                                    <th>Kelas</th>
                                                    <th>Tanggal Prestasi</th>
                                                    <th>Nama Prestasi</th>
                                                    <th>Jenis Prestasi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 0;?>
                                                @foreach($prestasi as $pre)
                                                <?php $no++ ;?>
                                                <tr>
                                                    <td>{{$no}}</td>
                                                    <td>{{$pre->santri->nomorinduk}}</td>
                                                    <td>{{$pre->santri->namasantri}}</td>
                                                    <td>{{$pre->kelas}}</td>
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