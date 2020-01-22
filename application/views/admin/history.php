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
                        
                        <th scope="col">Total Bayar</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $jumlah = 0; $i = 1; 
                    foreach ($history as $hr) : ?>
                        <tr>
                            <th scope="row"><?= $hr['id_transaksi']; ?></th>
                            <td><?= $hr['nama_user']; ?></td>
                            <td><?= $hr['tanggal']; ?></td>
                            <td>
                                Rp. <?= number_format($hr['total_bayar']); ?>
                            </td>
                            <td>
                                <a href="detail_history/<?= $hr['id_transaksi'] ?>" class="badge badge-primary">Detail</a>
                                <a href="cetakpdf/<?= $hr['id_transaksi'] ?>" class="badge badge-warning" target="_blank">cetak pdf</a>
                                <a href="print" class="badge badge-warning" target="_blank">print</a>
                            </td>
                        </tr>
                        <?php $jumlah = $jumlah += $hr['total_bayar'];

                         ?>
                    <?php $i++;
                    endforeach; ?>
                </tbody>
            </table>
            Total Semua Rp. <?= number_format($jumlah); ?>
        </div>
    </div>

</div>
