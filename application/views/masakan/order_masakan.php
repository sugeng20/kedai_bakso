
	<!-- Menu Favorit -->
	<div class="container mt-5">
		<div class="row">
			<div class="col-lg text-center">
				<h2 class="mt-5" >Daftar Menu Favorit</h2>
				<hr>
			</div>
		</div>
		<div class="row mt-3">
			<?php foreach($favorit as $fv) : ?>
				<div class="col-lg">
					<div class="card shadow-sm p-3 mb-5 bg-white rounded">
						<img src="<?= base_url('assets/img/') ?><?= $fv['gambar'] ?>" class="card-img-top rounded-pill" alt="...">
						<div class="card-body text-center">
							<h5 class="card-title"><?= $fv['nama_masakan'] ?></h5>
							<h6 class="card-subtitle mb-2 text-muted">Rp. <?= number_format( $fv['harga']); ?></h6>
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
							<a href="<?= base_url('masakan/cart/') ?><?= str_replace(" ", "-", $bi['nama_masakan']); ?>" class="btn btn-outline-warning text-dark">Pesan Sekarang</a>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
	<!-- Akhir Menu lainya -->

	