<?= $this->extend('layout/admin_layout'); ?>

<?= $this->section('content'); ?>

<div class="card shadow">
    <h3 class="text-center fw-bold pt-4">Create Portfolio</h3>

    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
            <?= implode('<br>', session()->getFlashdata('errors')) ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('admin/portfolios/store'); ?>" method="post" enctype="multipart/form-data" class="card-body">
        <?= csrf_field(); ?>
        
        <div class="form-group">
            <label for="title">Portfolio's Title</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= old('title'); ?>" required>
        </div>

        <div class="form-group mt-2">
            <label for="description">Portfolio's Description</label>
            <textarea name="description" id="description" class="form-control" required><?= old('description'); ?></textarea>
        </div>

        <div class="form-group mt-2">
            <label for="image">Portfolio Display Image</label>
            <input type="file" name="image" id="image" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Add Portfolio</button>
    </form>
</div>

<?= $this->endSection(); ?>
