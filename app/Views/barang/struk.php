<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Struk Barang</title>
    <style>
        body { font-size: 12px; font-family: Arial; }
        table { width: 100%; border-collapse: collapse; }
    </style>
</head>
<body>
    <h4>Struk Barang</h4>
    <table>
        <tr><td>Nama</td><td>: <?= $barang['nama'] ?></td></tr>
        <tr><td>Harga</td><td>: <?= number_format($barang['harga']) ?></td></tr>
        <tr><td>Stok</td><td>: <?= $barang['stok'] ?></td></tr>
    </table>
</body>
</html>
