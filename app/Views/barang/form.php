<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<form method="post" action="<?= isset($barang) ? base_url('barang/update/'.$barang['id']) : base_url('barang/store') ?>">
  <div class="form-group">
    <label>Nama Barang</label>
    <input type="text" name="nama" value="<?= $barang['nama'] ?? '' ?>" class="form-control" required>
  </div>
  <div class="form-group">
    <label>Kategori</label>
    <select name="kategori_id" class="form-control">
      <?php foreach ($kategori as $k): ?>
        <option value="<?= $k['id'] ?>" <?= isset($barang) && $barang['kategori_id'] == $k['id'] ? 'selected' : '' ?>>
          <?= $k['nama'] ?>
        </option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group">
    <label>Harga</label>
    <input type="number" name="harga" value="<?= $barang['harga'] ?? '' ?>" class="form-control" required>
  </div>
  <div class="form-group">
    <label>Stok</label>
    <input type="number" name="stok" value="<?= $barang['stok'] ?? '' ?>" class="form-control" required>
  </div>
  
  <button type="submit" class="btn btn-success">Simpan</button>
</form>
<?= $this->endSection() ?>
  