<?php 
      $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
			<a class="navbar-brand" href="<?= base_url('masakan/order') ?>">Kedai Bakso</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
				aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link" href="<?= base_url('masakan/order') ?>">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="<?= base_url('admin') ?>">Dashboard</span></a>
					</li>
                    <li class="nav-item">
						<a class="nav-link" href="#"><?= $user['nama_user']; ?></a>
					</li>
				</ul>
				<a href="<?= base_url('auth/logout') ?>" class="btn btn-outline-light ml-5">Log Out</a>
			</div>
		</div>
	</nav>
	<!-- Akhir Navbar -->