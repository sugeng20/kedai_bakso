<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Cetak laporan</h1>
    </div>

    <!-- Content Row -->
    <form action="" method="POST">
    
        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    <label for="kasir">Pilih Kasir</label>
                    <select name="kasir" id="kasir" class="form-control" >
                        <option value="">Pilih Semua</option>
                        <?php foreach($kasir as $ka) :  ?>
                        <option value="<?= $ka['id_user'] ?>"><?= $ka['nama_user'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('kasir', '<small class="text-danger">', '</small>') ?>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="tanggal_awal">Pilih Tanggal Awal</label>
                    <input type="date" class="form-control" name="tanggal_awal" id="tanggal_awal" value="<?= set_value('tanggal_awal') ?>" > 
                    <?= form_error('tanggal_awal', '<small class="text-danger">', '</small>') ?>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="tanggal_akhir">Pilih Tanggal Akhir</label>
                    <input type="date" class="form-control" name="tanggal_akhir" id="tanggal_akhir" value="<?= set_value('tanggal_akhir') ?>" >
                    <?= form_error('tanggal_akhir', '<small class="text-danger">', '</small>') ?>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mb-5">Cetak Laporan</button>
    </form>

</div>
