<div class="container">
    <div class="row">
        <div class="col text-left">
            <h3 class="mt-3" >Menu Kasir</h3>
            <p class="mt-2">
                <?= $this->session->flashdata('message'); ?>
            </p>
        </div>
    </div>
    <div class="row mt-3">
        <?php foreach($order as $or) : ?>
            <form action="" method="POST" >
                <div class="col">
                    <div class="card shadow-sm p-3 mb-5 bg-white rounded">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= $or['jumlah']; ?> x <?= $or['nama_masakan']; ?></h5>
                            <h5 class="card-title">Meja <?= $or['no_meja']; ?></h5>
                            <h5 class="card-title">Total : Rp. <?= number_format($or['jumlah'] * $or['harga']); ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?= $or['keterangan']; ?></h6>
                            <input type="hidden" name="id_user" id="id_user" value="<?= $or['id_user'] ?>" >
                            <input type="hidden" name="id_order" id="id_order" value="<?= $or['id_order'] ?>" >
                            <input type="hidden" name="total_bayar" id="total_bayar" value="<?= $or['jumlah'] * $or['harga'] ?>" >
                            <input type="number" placeholder="Jumlah Pembayaran" class="form-control" name="jumlah" id="jumlah" required >
                            <?= form_error('jumlah', '<small class="text-danger">', '</small>'); ?>
                            <button type="submit" class="btn btn-outline-warning text-dark mt-2">Bayar</button>
                        </div>
                    </div>
                </div>
            </form>
        <?php endforeach; ?>
    </div>
</div>