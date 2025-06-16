<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/sidebar') ?>

<section class="content">
  <div class="container-fluid">
    <h1><?= $title ?></h1>

    <!-- Tombol Import & Export -->
    <div class="mb-3">
      <form action="<?= base_url('barang/importExcel') ?>" method="post" enctype="multipart/form-data" class="form-inline d-inline">
        <div class="form-group mr-2">
          <input type="file" name="file_excel" class="form-control-file" required>
        </div>
        <button type="submit" class="btn btn-sm btn-primary">Import Excel</button>
      </form>

      <a href="<?= base_url('barang/create') ?>" class="btn btn-sm btn-success ml-2">+ Tambah Barang</a>
      <a href="<?= base_url('barang/exportExcel') ?>" class="btn btn-sm btn-success ml-2">Export Excel</a>
      <a href="<?= base_url('barang/exportPdf') ?>" class="btn btn-sm btn-danger ml-2">Export PDF</a>
      <a href="<?= base_url('barang/printPdf') ?>" class="btn btn-sm btn-secondary ml-2" target="_blank">Cetak PDF</a>
    </div>

    <!-- Tabel Data -->
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Barang</th>
          <th>Kategori</th>
          <th>Type Barang</th>
          <th>Harga</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; foreach ($barang as $b): ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $b['nama'] ?></td>
          <td><?= $b['kategori_nama'] ?? '-' ?></td>
          <td><?= $b['Type_barang'] ?? '-' ?></td>
          <td><?= number_format($b['harga']) ?></td>
          <td>
            <a href="<?= base_url('barang/edit/' . $b['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
            <a href="<?= base_url('barang/delete/' . $b['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus?')">Delete</a>
          </td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</section>

<?= $this->include('layouts/footer') ?>
