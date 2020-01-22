<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-3">
		<h1 class="h3 mb-0 text-gray-800">Transaksi</h1>
	</div>

	<!-- Content Row -->

	<div class="row">
		<div class="col" id="alert-transaksi">
		</div>
	</div>
	<div class="row">
		<div class="col-lg-1">
			<div class="form-group">
				<label for="id_transaksi">No</label>
				<input type="text" class="form-control" disabled required name="id_transaksi" id="id_transaksi" value="<?= $no_transaksi + 1 ?>" >
			</div>
		</div>
		<div class="col-lg-2">
			<div class="form-group">
				<label for="id_transaksi">User</label>
				<input type="hidden" value="<?= $user['id_user'] ?>" name="id_user" id="id_user">
				<input type="text" value="<?= $user['nama_user'] ?>" class="form-control" disabled>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="form-group">
				<label for="id_transaksi">Tanggal</label>
				<input type="text" value="<?= date('Y-m-d H:i:s') ?>" class="form-control" disabled>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="form-group">
				<label for="total_bayar">Total Bayar (Rp. )</label>
				<input type="text" class="form-control" name="total_bayar" disabled id="bayar">
			</div>
		</div>
	</div>

	<div class="row justify-content-left">
		<div class="col text-left">
			<div id="batal_transaksi" name="batal_transaksi" class="btn btn-danger mb-2" style="cursor: pointer;">Batal</div>
		</div>
		<div class="col text-left">
			<div id="bayar_transaksi" name="bayar_transaksi" class="btn btn-success mb-2" style="cursor: pointer;">Bayar</div>
		</div>
	</div>


	<div>
		<h5 class="text-gray-800">Tambah Pesanan</h5>
	</div>

	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
				<label for="nama_masakan">Nama Masakan</label>
				<select name="nama_masakan" id="nama_masakan" class="form-control">
					<option>-- Pilih Masakan --</option>
					<?php foreach($masakan as $ms) : ?>
					<option value="<?= $ms['id_masakan'] ?>" data="<?= $ms['nama_masakan'] ?>">
						<?= $ms['nama_masakan'] ?> - Stok <?= $ms['stok'] ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group">
				<label for="harga_satuan">Harga Satuan (Rp. )</label>
				<input type="text" name="harga_satuan" id="harga_satuan" class="form-control" disabled>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="form-group">
				<label for="jumlah_pesan">Jumlah Pesan :</label>
				<input type="number" name="jumlah_pesan" id="jumlah_pesan" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="total">Total (Rp. )</label>
				<input type="number" name="total" id="total" class="form-control" disabled>
			</div>
		</div>
	</div>
	<div class="text-center">
		<button class="btn btn-primary" id="tambah_pesanan">Tambah Pesanan</button>
	</div>

	<div>
		<h5 class="text-gray-800">List Pesanan</h5>
	</div>
	<div class="row">
		<div class="col">
			<table class="table table-striped">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th>Nama Masakan</th>
						<th>Harga Satuan</th>
						<th>Jumlah Pesan</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody id="list_pesan">

				</tbody>
			</table>
		</div>
	</div>

</div>
