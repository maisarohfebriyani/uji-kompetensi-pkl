<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $title ?? 'Aplikasi' ?></title>
  <link rel="stylesheet" href="<?= base_url('assets/AdminLTE/plugins/fontawesome-free/css/all.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/AdminLTE/dist/css/adminlte.min.css') ?>">
  <script src="<?= base_url('assets/AdminLTE/plugins/jquery/jquery.min.js') ?>"></script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <?= $this->include('layouts/header') ?>

  <div class="content-wrapper">
    <section class="content pt-3 px-3">
      <?= $this->renderSection('content') ?>
    </section>
  </div>

  <?= $this->include('layouts/footer') ?>
</div>

<script src="<?= base_url('assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/AdminLTE/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/AdminLTE/dist/js/adminlte.min.js') ?>"></script>
</body>
</html>
