<div class="container mt-5">
	<div class="row">
		<div class="col">
			<img src="<?= base_url('assets/img/') ?><?= $masakan['gambar'] ?>" alt="" class="img-thumbnail mt-5">
		</div>
		<div class="col">
			<h3 class="mt-5" ><?= $masakan['nama_masakan']; ?></h3>
			<p class="text-muted">Rp. <?= number_format($masakan['harga']); ?></p>
			<p><?= $masakan['deskripsi']; ?></p>
            <?php if($status > 0) : ?>
            <form action="" method="POST" >
                <input type="hidden" name="id_masakan" id="id_masakan" value="<?= $masakan['id_masakan'] ?>" >
                <input type="hidden" name="id_user" id="id_user" value="<?= $user['id_user'] ?>" >
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="meja">Pilih Meja :</label>
                            <select name="no_meja" id="no_meja" class="form-control">
                                <?php foreach($meja as $me) : ?>
                                    <option value="<?= $me['no_meja'] ?>">Meja <?= $me['no_meja'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" name="jumlah" id="jumlah" class="form-control" placeholder="Jumlah Masakan" >
                            <?= form_error('jumlah', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" cols="10" rows="2" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <button class="btn btn-success" type="submit">Pesan Sekarang</button>
                </div>
            </form>
            <?php else : ?>
                <b>
                <h3>Ma'af Meja Penuh</h3>
                </b>
            <?php endif; ?>
		</div>
	</div>


</div>
