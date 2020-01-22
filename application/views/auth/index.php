<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="og:title" property="og:title" content="Kedai Bakso Pintar">
    <meta property="og:image" content="<?= base_url('assets/img/') ?>slide/bakso-04.jpg" />
    <meta property="og:url" content="<?= base_url() ?>" />
    <meta property="og:site_name" content="Kedai Bakso" />
    <meta property="og:type" content="blog" />
    <meta name="description" content="Website ini untuk belajar menempuh uji Kompetensi di tahun 2020">
	<!-- Bootstrap CSS -->
	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
	<link rel="stylesheet" href="<?= base_url('assets/css/') ?>bootstrap.min.css">

	<!-- Font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

	<!-- CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/css/') ?>style.css">


	<title>Kedai Bakso</title>
</head>

<body>
	<!-- navbar -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-warning fixed-top">
		<div class="container">
			<a class="navbar-brand" href="#">Kedai Bakso</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
				aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="#">Daftar Menu</a>
					</li>
					<li class="nav-item mr-3">
						<a class="nav-link" href="#">Contact</a>
					</li>
				</ul>
				<form class="form-inline my-2 my-lg-0">
					<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
				</form>
				<a href="<?= base_url('auth/login') ?>" class="btn btn-outline-light ml-5">Log In</a>
			</div>
		</div>
	</nav>
	<!-- Akhir Navbar -->

	<!-- Carousel -->
	<div class="bd-example">
		<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
				<li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
				<li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="<?= base_url('assets/img/') ?>slide/bakso-04.jpg" class="d-block w-100" alt="...">
					<div class="carousel-caption d-none d-md-block">
						<h1 class="c1">Bakso Bakar</h1>

					</div>
				</div>
				<div class="carousel-item">
					<img src="<?= base_url('assets/img/') ?>slide/bakso-05.jpg" class="d-block w-100" alt="...">
					<div class="carousel-caption d-none d-md-block">
						<h5 class="c1">Bakso Ikan</h5>
					</div>
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
	<!-- Akhir Carousel -->

	<!-- Menu Favorit -->
	<div class="container mt-5">
		<div class="row">
			<div class="col-lg text-center">
				<h2>Daftar Menu Favorit</h2>
				<hr>
			</div>
		</div>
		<div class="row mt-3">
			<?php foreach($favorit as $fv) : ?>
				<div class="col-lg">
					<div class="card shadow-sm p-3 mb-5 bg-white rounded">
						<img src="<?= base_url('assets/img/') ?><?= $fv['gambar'] ?>" class="card-img-top rounded-pill" alt="...">
						<div class="card-body text-center">
							<h5 class="card-title"><?= $fv['nama_masakan']; ?></h5>
							<h6 class="card-subtitle mb-2 text-muted">Rp. <?= number_format($fv['harga']) ?></h6>
							<p class="card-text"><?= $fv['deskripsi']; ?></p>
							<a href="<?= base_url('masakan/cart/') ?><?= str_replace(" ", "-", $fv['nama_masakan']); ?>" class="btn btn-outline-warning text-dark">Pesan Sekarang</a>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
	<!-- Akhir Menu Favorit -->

	<!-- Menu Lainya -->
	<div class="container mt-5">
		<div class="row">
			<div class="col-lg text-center">
				<h2>Daftar Menu Lainya</h2>
				<hr>
			</div>
		</div>
		<div class="row mt-3">
			<?php foreach($biasa as $bi) : ?>
				<div class="col-lg">
					<div class="card shadow-sm p-3 mb-5 bg-white rounded">
						<img src="<?= base_url('assets/img/') ?><?= $bi['gambar'] ?>" class="card-img-top rounded-pill" alt="...">
						<div class="card-body text-center">
							<h5 class="card-title"><?= $bi['nama_masakan'] ?></h5>
							<h6 class="card-subtitle mb-2 text-muted">Rp. <?= number_format($bi['harga']); ?></h6>
							<p class="card-text"><?= $bi['deskripsi'] ?></p>
							<a href="<?= base_url('masakan/cart/') ?><?= str_replace(" ", "-", $bi['nama_masakan']); ?>" class="btn btn-outline-warning text-dark">Pesan Sekarang</a>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
	<!-- Akhir Menu lainya -->

	<!-- Contact -->
	<div class="container mt-5">

		<div class="row">
			<div class="col text-center">
				<h2>Kontak</h2>
				<hr>
			</div>
		</div>

		<div class="row justify-content-center mt-4">

			<div class="col-lg-4">
				<div class="card text-white bg-warning mb-3">
					<div class="card-body">
						<h5 class="card-title">Contact Us</h5>
						<p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Error,
							aspernatur?</p>
					</div>
				</div>
				<ul class="list-group">
					<li class="list-group-item">
						<h1>Lokasi</h1>
					</li>
					<li class="list-group-item">
						<p>Kantor Saya</p>
					</li>
					<li class="list-group-item">
						<p>Jl. wanantara no.239 Indramayu</p>
					</li>
					<li class="list-group-item">Jawa barat, Indonesia</li>
				</ul>
			</div>
			<div class="col-lg-4">
				<form>
					<div class="form-group">
						<label for="nama">Nama :</label>
						<input type="text" class="form-control" id="nama" placeholder="Masukan Nama">
					</div>
					<div class="form-group">
						<label for="email">Email :</label>
						<input type="text" class="form-control" id="email" placeholder="Masukan Email">
					</div>
					<div class="form-group">
						<label for="telp">Telepon :</label>
						<input type="telp" class="form-control" id="telp" placeholder="Masukan Nomor Telepon">
					</div>
					<div class="form-group">
						<label for="pesan">Pesan :</label>
						<textarea name="pesan" id="pesan" class="form-control" placeholder="Masukan Pesan"></textarea>
					</div>
					<div class="form-group">
						<button type="button" class="btn btn-outline-warning text-dark">Kirim</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Akhir Contact -->

	<!-- footer -->
	<footer class="bg-warning text-white pt-3">
		<div class="container">
            <p>Login Sekarang :</p>
            <div class="row">
                
                <div class="col-3">
                    <form action="<?= base_url('auth/login') ?>" method="post" >
                        <div class="form-group">
                            <label for="username">Username :</label>
                            <input type="text" name="username" id="username" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="password">password :</label>
                            <input type="password" name="password" id="password" class="form-control" >
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">
								Login!
							</button>
						</div>
                    </form>
                </div>
            </div>
			<div class="row">
				<div class="col text-center">
					<p>&copy; 2019 by Sugeng</p>
				</div>
			</div>
		</div>
	</footer>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
		integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
		integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script> -->
    <script src="<?= base_url('assets/js/') ?>jquery-3.3.1.slim.min.js" ></script>
    <script src="<?= base_url('assets/js/') ?>popper.min.js" ></script>
    <script src="<?= base_url('assets/js/') ?>bootstrap.min.js" ></script>

</html>
