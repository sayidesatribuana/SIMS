@extends('layouts.master')
@section('title')
<title>Detail Santri - SIMS</title>
@stop
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Detail Santri</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
					<li class="breadcrumb-item"><a href="/santri">Santri</a></li>
                    <li class="breadcrumb-item active">Detail Santri</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<div class="col-md-12">
				@foreach($santri as $s)
					<div class="text-center">
						<h3>{{$s->namasantri}}</h3>
						<p>{{$s->nomorinduk}} ({{$s->kelas}})</p>
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
					<div class="col-lg-4 col-6">
						<div class="small-box bg-success">
							<div class="inner">
								<h3>{{$jumlahprestasi}}</h3>
								<p>Prestasi</p>
							</div>
							<div class="icon">
								<i class="fas fa-trophy"></i>
							</div>
							<a data-toggle="collapse" href="#prestasi_santri" class="small-box-footer btn" title="Melihat Prestasi Santri"><i class="fa fa-search"></i> Lihat Prestasi Santri</a>
						</div>
					</div>
					<div class="col-lg-4 col-6">
						<div class="small-box bg-danger">
							<div class="inner">
								<h3>{{$jumlahpelanggaran}}</h3>
								<p>Pelanggaran</p>
							</div>
							<div class="icon">
								<i class="fas fa-exclamation-triangle"></i>
							</div>
							<a data-toggle="collapse" href="#pelanggaran_santri" class="small-box-footer btn" title="Melihat Pelanggaran Santri"><i class="fa fa-search"></i> Lihat Pelanggaran Santri</a>
						</div>
					</div>
					<div class="col-lg-4 col-6">
						<div class="small-box bg-info">
							<div class="inner">
								<h3>{{$jumlahperizinan}}</h3>
								<p>Perizinan</p>
							</div>
							<div class="icon">
								<i class="fas fa-suitcase-rolling"></i>
							</div>
							<a data-toggle="collapse" href="#perizinan_santri" class="small-box-footer btn" title="Melihat Perizinan Santri"><i class="fa fa-search"></i> Lihat Perizinan Santri</a>
						</div>
					</div>
					<div class="col-md-12">
					@endforeach
						<div class="collapse" id="prestasi_santri">
							<div class="card card-body">
								<div class="table-responsive">
									<table id="tablePrestasi" class="table table-hover table-striped dataTable" role="grid" aria-describedby="example1_info">
										<thead>
											<tr role="row">
												<td>No</td>
												<td>Tanggal Prestasi</td>
												<td>Nama Prestasi</td>
												<td>Jenis Prestasi</td>
												<td>Bukti Prestasi</td>
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
												<td class="action">
													<a class="btn btn-default btn-xs ng-scope" href="/prestasi/bukti/{{$pre->id}}" target="_blank" title="Melihat Bukti Prestasi Santri">
                                                    	Lihat Bukti
                                                	</a>
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="collapse" id="pelanggaran_santri">
							<div class="card card-body">
								<div class="table-responsive">
									<table id="tablePelanggaran" class="table table-hover table-striped dataTable" role="grid" aria-describedby="example1_info">
										<thead>
											<tr role="row">
												<td>No</td>
												<td>Tanggal Pelanggaran</td>
												<td>Nama Pelanggaran</td>
												<td>Jenis Pelanggaran</td>
												<td>Sanksi Pelanggaran</td>
												<td>Bukti Pelanggaran</td>
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
												<td class="action">
													<a class="btn btn-default btn-xs ng-scope" href="/pelanggaran/bukti/{{$pel->id}}" target="_blank" title="Melihat Bukti Pelanggaran Santri">
                                                    	Lihat Bukti
                                                	</a>
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="collapse" id="perizinan_santri">
							<div class="card card-body">
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
								</div>
							</div>
						</div>
					</div> 
				</div>
			</div>
			<div class="card-footer">
				<div class="text-center">
					<a href="/santri" class="btn btn-default btn-sm" ng-click="add()">Close</a>
					<a href="/santri/edit/{{$s->id}}" class="btn btn-default btn-sm" title="Mengedit Santri">
						<i class="fa fa-edit"></i> Edit Santri
					</a>
					<a class="btn btn-default btn-sm" ng-click="add()" href="/santri/detail/{{$s->id}}/cetakdetail_pdf" target="_blank" title="Mencetak Detail Santri Menjadi PDF">
						<i class="fa fa-print"></i> Cetak PDF
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
@stop