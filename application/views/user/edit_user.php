<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Registrasi</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-6">
            <form action="" method="post">
                <input type="hidden" value="<?= $user['id_user'] ?>" name="id_user" id="id_user" >
                <div class="form-group">
                    <label for="username">Username :</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Masukan Nama" value="<?= $user['username'] ?>" >
                    <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="nama_user">Nama User :</label>
                    <input type="text" name="nama_user" id="nama_user" class="form-control" placeholder="Masukan Nama User" value="<?= $user['nama_user'] ?>">
                    <?= form_error('nama_user', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="id_level">Id Level :</label>
                    <select name="id_level" id="id_level" class="form-control">
                        <?php foreach($get_level as $gl) : ?>
                            <?php if($gl['id_level'] == $user['id_level']) : ?>
                                <option value="<?= $gl['id_level'] ?>" selected><?= $gl['id_level'] ?>. <?= $gl['nama_level']; ?></option>
                            <?php else : ?>
                                <option value="<?= $gl['id_level'] ?>"><?= $gl['id_level'] ?>. <?= $gl['nama_level']; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

