<?= $this->extend('layout/admin_layout'); ?>

<?= $this->section('content'); ?>

<div class="card shadow">
    <h3 class="text-center fw-bold pt-4">Edit Client</h3>

    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
            <?= implode('<br>', session()->getFlashdata('errors')) ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('admin/clients/update/' . $client['id']); ?>" method="post" enctype="multipart/form-data" class="card-body">
        <?= csrf_field(); ?>
        <div class="form-group">
            <label for="name">Client's Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= old('name', $client['name']); ?>">
        </div>

        <div class="form-group mt-2">
            <label for="image">Client's Logo</label>
            <input type="file" name="image" id="image" class="form-control">
            <?php if (!empty($client['image'])): ?>
                <p class="mt-2">Current Logo:</p>
                <img src="<?= base_url('uploads/clients/' . $client['image']); ?>" alt="Client Logo" class="img-thumbnail" style="max-width: 150px;">
            <?php endif; ?>
        </div>

        <div class="form-group mt-2">
            <label for="link">Client's Link</label>
            <input name="link" id="link" value="<?= old('link', $client['link']); ?>" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update Client</button>
    </form>
</div>

<?= $this->endSection(); ?>
