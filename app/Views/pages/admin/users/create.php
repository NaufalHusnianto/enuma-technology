<?= $this->extend('layout/admin_layout'); ?>

<?= $this->section('content'); ?>
<div class="card shadow">
    <h3 class="text-center fw-bold pt-4">Create Admin User</h3>
    <form action="<?= base_url('admin/admin-users/store'); ?>" method="post" class="card-body px-4 pb-4">
        <?= csrf_field(); ?>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<?= $this->endSection(); ?>