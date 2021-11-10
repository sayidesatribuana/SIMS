<!DOCTYPE HTML>
<html>
	<head>
		<title>Sistem Informasi Monitoring Santri</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="{{url('assets2/css/main.css')}}"/>
		<link rel="stylesheet" href="{{url('assets/plugins/select2/css/select2.min.css')}}">
  		<link rel="stylesheet" href="{{url('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
	</head>
	<body>
		<!-- Header -->
		<header id="header">
			<a href="/" class="logo"><strong>SIMS</strong></a>
			<nav>
				<a href="#banner">Home</a>
				<a href="#main">Pencarian</a>
				<a href="/login">Sign In</a>
			</nav>
		</header>
		<!-- Banner -->
		<section id="banner">
			<div class="inner">
                <h1>Sistem Informasi Monitoring Santri <br>
                Pondok Modern Asy Syifa Balikpapan</h1>
				<ul class="actions">
					<li><a href="#main" class="button alt scrolly big">Pencarian</a></li>
					<li><a href="/login" class="button alt scrolly big">Sign In</a></li>
				</ul>
			</div>
		</section>
		<!-- One -->
		<section id="main">
			<div class="inner">
				<header class="major special">
					<h1>Pencarian Data Santri</h1>
					<p>Silahkan isi kolom di bawah dengan Nama Santri atau NIS (Nomor Induk Santri) untuk melakukan pencarian Data Santri.</p>
				</header>
				<!-- Form -->
				<section>
					<form action="/datasantri" method="GET">
					{{csrf_field()}}
						<div class="row uniform 50%">
							<div class="form-group 6u$">
								<select class="form-control select2bs4" name="datasantri" style="width: 100%;">
									@foreach($santri as $s)
									<option value="{{$s->id}}" {{(old('pilihsantri') == '') ? ' selected' : ''}}>{{$s->nomorinduk}} - {{$s->namasantri}}</option>
									@endforeach
								</select>
							</div>
							<div class="12u$">
								<input type="submit" class="button special" />
							</div>
						</div>
					</form>
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
		<script src="{{url('assets2/js/jquery.min.js')}}"></script>
		<script src="{{url('assets2/js/jquery.scrolly.min.js')}}"></script>
		<script src="{{url('assets2/js/skel.min.js')}}"></script>
		<script src="{{url('assets2/js/util.js')}}"></script>
		<script src="{{url('assets2/js/main.js')}}"></script>
		<script src="{{url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
		<script src="{{url('assets/plugins/select2/js/select2.full.min.js')}}"></script>
		<script>
			$(function () {
				$('.select2bs4').select2({
      				theme: 'bootstrap4'
    			});
			});
		</script>
	</body>
</html>