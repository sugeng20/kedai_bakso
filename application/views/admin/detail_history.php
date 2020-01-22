<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">User</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id Transaksi</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Nama Masakan</th>
                        <th scope="col">Harga Satuan</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $jumlah = 0; $i = 1; 
                    foreach ($history as $hr) : ?>
                        <tr>
                            <th scope="row"><?= $hr['id_transaksi']; ?></th>
                            <td><?= $hr['nama_user']; ?></td>
                            <td><?= $hr['tanggal']; ?></td>
                            <td><?= $hr['nama_masakan']; ?></td>
                            <td>Rp. <?= number_format($hr['harga']); ?></td>
                            <td><?= $hr['qty']; ?></td>


                            <td>
                                Rp. <?= number_format($hr['total']); ?>
                            </td>
                        </tr>
                        <?php $jumlah = $jumlah += $hr['total'];

                         ?>
                    <?php $i++;
                    endforeach; ?>
                </tbody>
            </table>
            <div class="alert alert-warning">
                Total Bayar Rp. <?= number_format($jumlah); ?>
            </div>
        </div>
    </div>

</div>
