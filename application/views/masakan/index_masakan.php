<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Masakan</h1>
	</div>

	<!-- Content Row -->
	<div class="row">
		<div class="col-lg">
			<a href="<?= base_url('masakan/tambah_masakan') ?>" class="btn btn-primary mb-3">Tambah Masakan</a>
			<?= $this->session->flashdata('message') ?>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<table class="table table-striped">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Nama</th>
						<th scope="col">Harga</th>
						<th scope="col">Stok</th>
						<th scope="col">Kategori</th>
						<th scope="col">Gambar</th>
						<th scope="col">Aksi</th>
					</tr>
				</thead>
				<tbody>
                    <?php $no = 1; foreach($masakan as $ma) : ?>
                        <tr>
                            <th scope="row"><?= $no; ?></th>
                            <td><?= $ma['nama_masakan']; ?></td>
                            <td>Rp. <?= $ma['harga']; ?></td>
                            <td><?= $ma['stok']; ?></td>
                            <td><?= $ma['kategori']; ?></td>
                            <td>
                                <img src="<?= base_url('assets/img/') ?><?= $ma['gambar'] ?>" alt="" class="img-thumbnail" width="100" height="100">
                            </td>
                            <td>
                                <a href="<?= base_url('masakan/') ?>edit_masakan/<?= $ma['id_masakan'] ?>" class="badge badge-warning">edit</a>
                                <a href="<?= base_url('masakan/') ?>hapus_masakan/<?= $ma['id_masakan'] ?>" class="badge badge-danger" onclick="return confirm('Apakah anda yakin?')">hapus</a>
                            </td>
                        </tr>
                    <?php $no++; endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
