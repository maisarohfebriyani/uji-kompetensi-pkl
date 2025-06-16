<?= $this->include('layouts/header') ?>

<div class="container mt-4">
    <h2><?= $title ?></h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama File</th>
                <th>Tanggal Upload</th>
                <th>Download</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($files as $file): ?>
                <tr>
                    <td><?= esc($file['name']) ?></td>
                    <td><?= esc($file['time']) ?></td>
                    <td><a href="<?= $file['url'] ?>" class="btn btn-sm btn-success">Download</a></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?= $this->include('layouts/footer') ?>
