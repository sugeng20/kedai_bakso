<div class="container">
    <div class="row">
        <div class="col text-left">
            <h3 class="mt-3" >List Order</h3>
            <p class="mt-2">
                <?= $this->session->flashdata('message'); ?>
            </p>
        </div>
    </div>
    <div class="row mt-3">
        <?php foreach($order as $or) : ?>
            <div class="col-3">
                <div class="card shadow-sm p-3 mb-5 bg-white rounded">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?= $or['jumlah']; ?> x <?= $or['nama_masakan']; ?></h5>
                        <h5 class="card-title">Meja <?= $or['no_meja']; ?></h5>
                        <h5 class="card-title">Total : Rp. <?= number_format($or['jumlah'] * $or['harga']); ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?= $or['keterangan']; ?></h6>
                        <form action="<?= base_url('masakan/update_order') ?>" method="POST" >
                            <input type="hidden" name="id_order" id="id_order" value="<?= $or['id_order'] ?>" >
                            <button type="submit" class="btn btn-outline-warning text-dark">Selesai</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>