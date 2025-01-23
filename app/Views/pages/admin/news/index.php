<?= $this->extend('layout/admin_layout'); ?>

<?= $this->section('content'); ?>
    <h1>News List</h1>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= esc(session()->getFlashdata('success')) ?>
        </div>
    <?php endif; ?>

    <a href="<?= base_url('/admin/news/create'); ?>" class="btn btn-primary">Create News</a>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
                <th>Published At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($news as $berita): ?>
                <tr>
                    <td><?= $berita['id']; ?></td>
                    <td><?= esc($berita['title']); ?></td>
                    <td><?= esc(substr($berita['description'], 0, 50)); ?>...</td>
                    <td><?= esc($berita['created_at']); ?></td>
                    <td>
                        <a href="<?= base_url('berita/show/' . $berita['id']); ?>" class="btn btn-info">Lihat</a>
                        <a href="<?= base_url('berita/edit/' . $berita['id']); ?>" class="btn btn-warning">Edit</a>
                        <a href="<?= base_url('berita/delete/' . $berita['id']); ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus berita ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<?= $this->endSection(); ?>
