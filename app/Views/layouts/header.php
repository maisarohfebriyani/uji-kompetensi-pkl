<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $title ?? 'Dashboard' ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/AdminLTE/plugins/fontawesome-free/css/all.min.css') ?>">
  <!-- AdminLTE -->
  <link rel="stylesheet" href="<?= base_url('assets/AdminLTE/dist/css/adminlte.min.css') ?>">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="<?= base_url('assets/AdminLTE/plugins/bootstrap/css/bootstrap.min.css') ?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url('assets/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">

  <!-- Optional custom CSS -->
  <style>
    .content-wrapper { padding: 20px; }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item"><a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a></li>
      <li class="nav-item d-none d-sm-inline-block"><a href="<?= base_url('/') ?>" class="nav-link">Home</a></li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?= base_url('/') ?>" class="brand-link">
      <span class="brand-text font-weight-light ml-3">CI4 + AdminLTE 3</span>
    </a>
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column">
          <li class="nav-item">
            <a href="<?= base_url('/barang') ?>" class="nav-link">
              <i class="nav-icon fas fa-box"></i>
              <p>Data Barang</p>
            </a>
          </li>
          <!-- Tambah menu lainnya di sini -->
        </ul>
      </nav>
    </div>
  </aside>

  <!-- Content Wrapper -->
  <div class="content-wrapper">
