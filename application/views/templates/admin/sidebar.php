<?php $id_level = $this->session->userdata('id_level'); ?>

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">KB Admin</sup></div>
      </a>

      <!-- Divider -->
      
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?php if($title == 'Dashboard') echo 'active'; ?>">
        <a class="nav-link" href="<?= base_url('admin/') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
       
      

      <?php if( $id_level == 2) : ?>
      <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Heading -->
      <div class="sidebar-heading">
        Transaksi
      </div>

      <li class="nav-item <?php if($title == 'Transaksi') echo 'active'; ?>">
        <a class="nav-link" href="<?= base_url('transaksi/') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Tambah Transaksi</span></a>
      </li>

      <li class="nav-item <?php if($title == 'History') echo 'active'; ?>">
        <a class="nav-link" href="<?= base_url('transaksi/history') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>History Transaksi</span></a>
      </li>
      <?php endif; ?>


      
      
      <?php if($id_level == 1) : ?>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Menu Item
      </div>
      <!-- Nav Item -  Collapse User -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#masakanUtilities" aria-expanded="true" aria-controls="masakanUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Masakan</span>
        </a>
        <div id="masakanUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Pilih Menu:</h6>
            <a class="collapse-item <?php if($title == 'Masakan') echo 'active'; ?>" href="<?= base_url('masakan/') ?>index">Daftar Masakan</a>
            <a class="collapse-item <?php if($title == 'Tambah Masakan') echo 'active'; ?>" href="<?= base_url('masakan/') ?>tambah_masakan">Tambah Masakan</a>
          </div>
        </div>
      </li>
      <?php endif; ?>
      
      <?php if($id_level == 1) : ?>
      <!-- Nav Item -  Collapse User -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#userUtilities" aria-expanded="true" aria-controls="userUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>User</span>
        </a>
        <div id="userUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Pilih Menu:</h6>
            <a class="collapse-item <?php if($title == 'User') echo 'active'; ?>" href="<?= base_url('user/') ?>index">User</a>
            <a class="collapse-item <?php if($title == 'Registrasi') echo 'active'; ?>" href="<?= base_url('user/') ?>registrasi">Registrasi</a>
          </div>
        </div>
      </li>
      <?php endif; ?>

      <?php if($id_level == 1 || $id_level == 3) : ?>
      <!-- Heading -->
      <div class="sidebar-heading">
        Laporan
      </div>

      <li class="nav-item <?php if($title == 'Laporan') echo 'active'; ?>">
        <a class="nav-link" href="<?= base_url('admin/laporan') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Cetak Laporan</span></a>
      </li>

      <?php endif; ?>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - logout -->
      <li class="nav-item">
          <a class="nav-link" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
              <i class="fas fa-fw fa-sign-out-alt"></i>
              <span>Logout</span></a>
      </li>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->