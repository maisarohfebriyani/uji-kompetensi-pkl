<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
    </style>
</head>
<body>
    <h3><?= $title ?></h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach ($barang as $b): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $b['nama'] ?></td>
                <td><?= $b['kategori_nama'] ?? '-' ?></td>
                <td><?= number_format($b['harga']) ?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>
