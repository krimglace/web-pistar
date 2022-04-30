<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-primary bg-white elevation-4" style="z-index: 1000000;">
<!-- Brand Logo -->
<a href="<?= base_url('Administrator/Dashboard') ?>" class="brand-link text-center text-dark">
  <b>PISTAR</b>
</a>
<?php foreach( $siswawali as $siswa ) : ?>
<!-- Sidebar -->
<div class="sidebar">

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      <li class="nav-item">
        <a href="<?= site_url('Siswa/Profil') ?>" class="nav-link">
          <i class="fa fa-user-alt nav-icon text-primary"></i>
          <p><?= $siswa->nama_lengkap_user ?></p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?= site_url('Siswa/Dashboard') ?>" class="nav-link">
          <i class="nav-icon fas fa-fire text-warning"></i>
          <p>Dashboard</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?= site_url('Siswa/Tutorial') ?>" class="nav-link">
          <i class="nav-icon fas fa-sticky-note text-success"></i>
          <p>Tutorial</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?= site_url('Siswa/Pemesanan_Les') ?>" class="nav-link">
          <i class="fas fa-chalkboard-teacher nav-icon text-danger"></i>
          <p>Pemesanan Les</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?= site_url('Siswa/Jadwal_Les') ?>" class="nav-link">
          <i class="fa fa-calendar nav-icon text-dark"></i>
          <p>Jadwal Les</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?= site_url('Siswa/Beri_Testimoni') ?>" class="nav-link">
          <i class="far fa-comment nav-icon text-success"></i>
          <p>Beri Testimoni</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?= site_url('Siswa/Beri_Ratting') ?>" class="nav-link">
          <i class="far fa-star nav-icon text-warning"></i>
          <p>Ratting Tutor</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?= site_url('Siswa/SdanK') ?>" class="nav-link">
          <i class="fa fa-list-alt nav-icon text-primary"></i>
          <p>Syarat dan Ketentuan</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?= site_url('Siswa/Kotak_Saran') ?>" class="nav-link">
          <i class="fas fa-envelope nav-icon text-warning"></i>
          <p>Kotak Saran</p>
        </a>
      </li> 
      <li class="nav-item bg-success">
        <a href="<?= site_url('Siswa/Logout') ?>" class="nav-link">
          <i class="fas fa-power-off nav-icon text-danger"></i>
          <p>Logout</p>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>
<?php endforeach; ?> 
<!-- /.sidebar -->
</aside>