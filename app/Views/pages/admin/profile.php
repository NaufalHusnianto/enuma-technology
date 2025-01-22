<?= $this->extend('layout/admin_layout'); ?>

<?= $this->section('content'); ?>
<div class="card shadow">
    <h3 class="text-center fw-bold pt-4">Edit Profile</h3>
    <form action="<?= base_url('admin/profile/update'); ?>" method="post" class="card-body px-4 pb-4">
        <?= csrf_field(); ?>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?= esc($user['username']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= esc($user['email']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password (Leave blank to keep current password)</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
<?= $this->endSection(); ?>
