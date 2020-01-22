<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">User</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-4">
            <?= $this->session->flashdata('message') ?>
            <a href="<?= base_url('masakan/tambah_meja') ?>" class="btn btn-primary my-3" data-toggle="modal" data-target="#addMejaModal" >Tambah Meja</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No Meja</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($meja as $me) : ?>
                        <tr>
                            <th scope="row"><?= $me['no_meja']; ?></th>
                            <td><?= $me['status']; ?></td>
                        </tr>
                    <?php
                    endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- Logout Modal-->
  <div class="modal fade" id="addMejaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Meja</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="" method="POST" >
            <div class="modal-body"> 
                <div class="form-group">
                    <label for="no_meja">No Meja</label>
                    <input type="text" name="no_meja" id="no_meja" class="form-control" required >
                </div>  
            </div>
            <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button class="btn btn-primary" type="submit" >Tambah Meja</button>
            </div>
        </form>
      </div>
    </div>
  </div>