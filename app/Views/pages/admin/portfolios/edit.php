<?= $this->extend('layout/admin_layout'); ?>

<?= $this->section('content'); ?>

<div class="card shadow">
    <h3 class="text-center fw-bold pt-4">Edit Portfolio</h3>

    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
            <?= implode('<br>', session()->getFlashdata('errors')) ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('admin/portfolio/update/' . $portfolio['id']); ?>" method="post" enctype="multipart/form-data" class="card-body">
        <?= csrf_field(); ?>
        <div class="form-group">
            <label for="title">Portfolio's Title</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= old('title', $portfolio['title']); ?>" required>
        </div>

        <div class="form-group mt-2">
            <label for="image">Portfolio's Image</label>
            <input type="file" name="image" id="image" class="form-control">
            <?php if (!empty($portfolio['image'])): ?>
                <p class="mt-2">Current Image:</p>
                <img src="<?= base_url('uploads/portfolio/' . $portfolio['image']); ?>" alt="Portfolio Image" class="img-thumbnail" style="max-width: 150px;">
            <?php endif; ?>
        </div>

        <div class="form-group mt-2">
            <label for="description">Portfolio's Description</label>
            <textarea name="description" id="description" class="form-control" rows="4"><?= old('description', $portfolio['description']); ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update Portfolio</button>
    </form>
</div>

<?= $this->endSection(); ?>