<!DOCTYPE HTML>
<html>
	<head>
		<title>Sign In - SIMS</title>
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
				<header class="major special">
					<h1>Halaman Login</h1>
					@if(session('error'))
					<p>{{session('error')}} Silahkan isi kolom kembali untuk melakukan login.</p>
					@else
					<p>Silahkan isi kolom di bawah untuk melakukan Login.</p>
					@endif
        		</header>         
        		<!-- Form -->
				<section>
					<form action="/postlogin" method="POST">
						{{csrf_field()}}
						<div class="row uniform 50%">
							<div class="6u$">
								<input type="text" name="username" id="username" placeholder="Username" />
							</div>
							<div class="6u$">
								<input type="password" name="password" id="password" placeholder="Password" />
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
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/jquery.scrolly.min.js"></script>
		<script src="assets/js/skel.min.js"></script>
		<script src="assets/js/util.js"></script>
		<script src="assets/js/main.js"></script>
	</body>
</html>