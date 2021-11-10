<!DOCTYPE HTML>
<html>
	<head>
		<title>Bukti Pelanggaran - SIMS</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<div class="card">
						<div class="card-body text-center">
							@foreach($pelanggaran as $pel)
							<img class="img-fluid" src="{{ url('/data_file2/'.$pel->buktipelanggaran) }}"></img>
							@endforeach
						</div>
					</div>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
	</body>
</html>