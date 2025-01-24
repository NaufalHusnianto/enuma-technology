<?= $this->extend('layout/admin_layout'); ?>

<?= $this->section('content'); ?>
    <h1>Clients List</h1>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= esc(session()->getFlashdata('success')) ?>
        </div>
    <?php endif; ?>

    <a href="<?= base_url('/admin/clients/create'); ?>" class="btn btn-primary float-end mb-3">Add New Clients</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image Logo</th>
                <th>Affiliated Link</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clients as $client): ?>
                <tr>
                    <td><?= esc($client['id']); ?></td>
                    <td><?= esc($client['name']); ?></td>
                    <td><img src="<?=base_url('uploads/clients/'. $client['image']); ?>" alt="" style="height: 85px"></td>
                    <td><?= esc($client['link']); ?></td>
                    <td>
                        <a href="<?= base_url('admin/clients/edit/' . $client['id']); ?>" class="btn btn-warning">Edit</a>
                        <a href="<?= base_url('admin/clients/delete/' . $client['id']); ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus Client?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<?= $this->endSection(); ?>
