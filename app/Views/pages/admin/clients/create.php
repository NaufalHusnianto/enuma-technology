<?= $this->extend('layout/admin_layout'); ?>

<?= $this->section('content'); ?>

<div class="card shadow">
    <h3 class="text-center fw-bold pt-4">Create Client</h3>

    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
            <?= implode('<br>', session()->getFlashdata('errors')) ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('admin/clients/store'); ?>" method="post" enctype="multipart/form-data" class="card-body">
        <?= csrf_field(); ?>
        <div class="form-group">
            <label for="name">Client's Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= old('name'); ?>" required>
        </div>

        <div class="form-group mt-2">
            <label for="image">Client's Logo</label>
            <input type="file" name="image" id="image" value="<?= old('image'); ?>" class="form-control" required>
        </div>

        <div class="form-group mt-2">
            <label for="link">Client's Link</label>
            <input name="link" id="link" value="<?= old('link'); ?>" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Add Client</button>
    </form>
</div>

<?= $this->endSection(); ?>
