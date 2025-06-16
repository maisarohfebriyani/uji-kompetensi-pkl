  </div> <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer text-center">
    <strong>&copy; <?= date('Y') ?> <a href="#">YourApp</a>.</strong> All rights reserved.
  </footer>
</div> <!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url('assets/AdminLTE/plugins/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap -->
<script src="<?= base_url('assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/AdminLTE/dist/js/adminlte.min.js') ?>"></script>
<!-- DataTables -->
<script src="<?= base_url('assets/AdminLTE/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('assets/AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('assets/AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>

<!-- DataTables Init -->
<script>
  $(function () {
    $('#example1').DataTable({
      responsive: true,
      autoWidth: false,
    });
  });
</script>

</body>
</html>
