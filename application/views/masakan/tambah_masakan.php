<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Tambah Masakan</h1>
	</div>

	<!-- Content Row -->
	<div class="row">
		<div class="col-lg-6">
			<?= $this->session->flashdata('message') ?>
			<form action="" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="nama_masakan">Nama Masakan :</label>
					<input type="text" name="nama_masakan" id="nama_masakan" class="form-control"
						placeholder="Masukan Nama Masakan" value="<?= set_value('nama_masakan') ?>">
					<?= form_error('nama_masakan', '<small class="text-danger">', '</small>'); ?>
				</div>
				<div class="form-group">
					<label for="harga">Harga :</label>
					<input type="number" name="harga" id="harga" class="form-control" placeholder="Masukan Harga"
						value="<?= set_value('harga') ?>">
					<?= form_error('harga', '<small class="text-danger">', '</small>'); ?>
				</div>
				<div class="form-group">
					<label for="stok">Stok :</label>
					<input type="number" name="stok" id="stok" class="form-control" value="<?= set_value('stok') ?>" >
					<?= form_error('stok', '<small class="text-danger">', '</small>'); ?>
				</div>
				<div class="form-group">
					<label for="kategori">Kategori :</label>
					<select name="kategori" id="kategori" class="form-control">
						<option value="biasa">biasa</option>
						<option value="favorit">favorit</option>
					</select>
				</div>
				<div class="form-group">
					<label for="deskripsi">Deskripsi : </label>
					<textarea name="deskripsi" id="deskripsi" cols="10" rows="2" class="form-control" ><?= set_value('deskripsi') ?></textarea>
					<?= form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
				</div>
				<div class="form-group">
					<input type="file" name="gambar" id="gambar" required value="<?= set_value('gambar') ?>">
				</div>
				<div class="form-group">
					<button class="btn btn-primary" type="submit">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
