<?= $this->include('layouts/header'); ?>

<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">Kirim Email</div>
        <div class="card-body">
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
            <?php elseif (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>

            <form action="<?= base_url('kirim-email') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <label>Email Tujuan</label>
                    <input type="email" name="to" class="form-control" required value="<?= old('to') ?>">
                </div>
                <div class="form-group">
                    <label>Subjek</label>
                    <input type="text" name="subject" class="form-control" required value="<?= old('subject') ?>">
                </div>
                <div class="form-group">
                    <label>Isi Pesan</label>
                    <textarea name="message" rows="5" class="form-control" required><?= old('message') ?></textarea>
                </div>
                <div class="form-group">
                    <label>Lampiran (opsional)</label>
                    <input type="file" name="attachment" class="form-control-file">
                </div>
                <button class="btn btn-success mt-2">Kirim Email</button>
            </form>
        </div>
    </div>
</div>

<?= $this->include('layouts/footer'); ?>
