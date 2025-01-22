<?= $this->extend('layout/admin_layout'); ?>

<?= $this->section('content'); ?>
    <div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Updated at</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($users) && is_array($users)): ?>
                    <?php foreach ($users as $index => $user): ?>
                        <tr>
                            <td><?= $index + 1; ?></td>
                            <td><?= esc($user['username']); ?></td>
                            <td><?= esc($user['email']); ?></td>
                            <td><?= esc($user['created_at']); ?></td>
                            <td><?= esc($user['updated_at']); ?></td>
                            <td>
                                <a href="<?= base_url('admin/users/edit/' . $user['id']); ?>" class="btn btn-sm btn-primary">Edit</a>
                                <a href="<?= base_url('admin/users/delete/' . $user['id']); ?>" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">No data available</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
<?= $this->endSection(); ?>
