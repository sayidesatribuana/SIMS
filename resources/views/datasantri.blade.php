<!DOCTYPE HTML>
<html>
	<head>
		@foreach($santri as $s)
		<title>{{$s->namasantri}} - {{$s->kelas}}</title>
		@endforeach
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="{{url('assets2/css/main.css')}}" />
	</head>
	<body>
        <!-- Header -->
        <header id="header">
			<a href="/" class="logo"><strong>SIMS</strong></a>
			<nav>
                <a href="/">Home</a>
				<a href="/login">Sign In</a>
			</nav>
		</header>
		<!-- Main -->
		<section id="main">
			<div class="inner">
				@foreach($santri as $s)
				<header class="major special">
					<h1>{{$s->namasantri}}</h1>
                </header>         
                <!-- Form -->
                <section>
					<div class="row">
						<div class="6u 12u$(xsmall) row">
                            <ul>
								<li><b>Nomor Induk: </b>{{$s->nomorinduk}}</li>
								<li><b>Nama Santri: </b>{{$s->namasantri}}</li>
                                <li><b>Jenis Kelamin: </b>{{$s->jeniskelamin}}</li>
                                <li><b>Tempat Lahir: </b>{{$s->tempatlahir}}</li>
                                <li><b>Tanggal Lahir: </b>{{$s->tanggallahir}}</li>
                                <li><b>Alamat: </b>{{$s->alamat}}</li>
                                <li><b>Nomor HP: </b>{{$s->nomorhp}}</li>
                                <li><b>Kelas: </b>{{$s->kelas}}</li>
                                <li><b>Tahun Ajaran: </b>{{$s->tahunajaran}}</li>
							</ul>
						</div>
					</div>
				</section>
				@endforeach
                <!-- Table -->
				<section>
					<h3>Prestasi</h3>
					<div class="table-responsive">
						<table>
							<thead>
								<tr>
									<th>#</th>
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
									<td>{{$pre->tanggalprestasi}}</td>
									<td>{{$pre->namaprestasi}}</td>
									<td>{{$pre->jenisprestasi}}</td>
								</tr>
								@endforeach
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td><b>Jumlah Prestasi:</b> {{$jumlahprestasi}} Prestasi.</td>
								</tr>
							</tbody>
						</table>
					</div>			
                </section>
                <section>
					<h3>Pelanggaran</h3>
					<div class="table-responsive">
						<table>
							<thead>
								<tr>
									<th>#</th>
									<th>Tanggal Pelanggaran</th>
                                    <th>Nama Pelanggaran</th>
                                    <th>Jenis Pelanggaran</th>
                                    <th>Sanksi Pelanggaran</th>
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
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td><b>Jumlah Pelanggaran:</b> {{$jumlahpelanggaran}} Pelanggaran.</td>
								</tr>
							</tbody>
						</table>
					</div>			
				</section>
                <section>
					<h3>Perizinan</h3>
					<div class="table-responsive">
						<table>
							<thead>
								<tr>
									<th>#</th>
									<th>Tanggal Perizinan</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Perihal Perizinan</th>
                                    <th>Keterangan Kembali</th>
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
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td><b>Jumlah Perizinan:</b> {{$jumlahperizinan}} Perizinan.</td>
								</tr>
							</tbody>
						</table>
					</div>			
				</section>
            </div>
        </section>
		<!-- Footer -->
        <footer id="footer">
		<ul class="icons">
				<li><a href="/twitter.com" class="icon fa-twitter" target="_blank"><span class="label">Twitter</span></a></li>
				<li><a href="/facebook.com" class="icon fa-facebook" target="_blank"><span class="label">Facebook</span></a></li>
				<li><a href="/instagram.com" class="icon fa-instagram" target="_blank"><span class="label">Instagram</span></a></li>
			</ul>
			<div class="copyright">
				&copy; 2020. <a href="asy-syifa.com" target="_blank">Pondok Modern Asy-Syifa Balikpapan</a>.
			</div>
		</footer>
		<!-- Scripts -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/jquery.scrolly.min.js"></script>
		<script src="assets/js/skel.min.js"></script>
		<script src="assets/js/util.js"></script>
		<script src="assets/js/main.js"></script>
	</body>
</html>