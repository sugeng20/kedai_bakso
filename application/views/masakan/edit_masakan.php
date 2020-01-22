<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Edit Masakan</h1>
	</div>

	<!-- Content Row -->
	<div class="row">
		<div class="col-lg-6">
			<?= $this->session->flashdata('message') ?>
			<form action="" method="post" enctype="multipart/form-data">
				<input type="hidden" name="id" id="id" value="<?= $masakan['id_masakan'] ?>" >
				<input type="hidden" name="gambarlama" id="gambarlama" value="<?= $masakan['gambar'] ?>" >
				<div class="form-group">
					<label for="nama_masakan">Nama Masakan :</label>
					<input type="text" name="nama_masakan" id="nama_masakan" class="form-control"
						placeholder="Masukan Nama Masakan" value="<?= $masakan['nama_masakan'] ?>">
					<?= form_error('nama_masakan', '<small class="text-danger">', '</small>'); ?>
				</div>
				<div class="form-group">
					<label for="harga">Harga :</label>
					<input type="number" name="harga" id="harga" class="form-control" placeholder="Masukan Harga"
						value="<?= $masakan['harga'] ?>">
					<?= form_error('harga', '<small class="text-danger">', '</small>'); ?>
				</div>
				<div class="form-group">
					<label for="stok">Stok :</label>
					<input type="number" name="stok" id="stok" class="form-control" value="<?= $masakan['stok'] ?>" >
					<?= form_error('stok', '<small class="text-danger">', '</small>'); ?>
				</div>
				<div class="form-group">
					<label for="kategori">Kategori :</label>
					<select name="kategori" id="kategori" class="form-control">
						<option value="biasa" <?php if($masakan['kategori'] == 'biasa') echo "selected" ?> >biasa</option>
						<option value="favorit" <?php if($masakan['kategori'] == 'favorit') echo "selected" ?> >favorit</option>
					</select>
				</div>
				<div class="form-group">
					<label for="deskripsi">Deskripsi : </label>
					<textarea name="deskripsi" id="deskripsi" cols="10" rows="2" class="form-control" ><?= $masakan['deskripsi'] ?></textarea>
					<?= form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
				</div>
				<div class="form-group">
                    <img src="<?= base_url('assets/img/') ?><?= $masakan['gambar'] ?>" alt="" class="img-thumbnail" width="100" height="100" >
					<input type="file" name="gambar" id="gambar">
				</div>
				<div class="form-group">
					<button class="btn btn-primary" type="submit">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
