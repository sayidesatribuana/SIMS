<!DOCTYPE HTML>
<html>
	<head>
		<title>Bukti Prestasi - SIMS</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
		<link rel="stylesheet" href="{{url('assets/plugins/fontawesome-free/css/all.min.css')}}">
		<link rel="stylesheet" href="{{url('assets/dist/css/adminlte.min.css')}}">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<div class="card">
						<div class="card-body text-center">
							@foreach($prestasi as $pre)
							<img class="img-fluid" src="{{ url('/data_file/'.$pre->buktiprestasi) }}"></img>
							@endforeach
						</div>
					</div>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
	</body>
</html>