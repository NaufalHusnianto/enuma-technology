<?= $this->extend('layout/admin_layout'); ?>

<?= $this->section('content'); ?>
<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= esc(session()->getFlashdata('success')) ?>
    </div>
<?php endif; ?>
    
<div class="d-flex justify-content-between align-items-center">
    <a href="<?= base_url('admin/news/create'); ?>" class="btn btn-primary mb-3 d-flex align-items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path><polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon></svg>
        Create News
    </a>
</div>
<div class="card shadow">
    <div class="table-responsive small card-body">
        <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>Id</th>
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
                    <td><?= esc(substr($berita['description'], 0, 100)); ?>...</td>
                    <td><?= esc($berita['created_at']); ?></td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="<?= base_url('admin/news/show/' . $berita['id']); ?>" class="btn btn-info">Detail</a>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?= $berita['id']; ?>" data-title="<?= esc($berita['title']); ?>">
                                Hapus
                            </button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus berita ini?</p>
                <strong id="newsTitle"></strong>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a id="confirmDeleteButton" href="#" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteModal = document.getElementById('deleteModal');
        const confirmDeleteButton = document.getElementById('confirmDeleteButton');
        const newsTitle = document.getElementById('newsTitle');

        deleteModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const newsId = button.getAttribute('data-id');
            const title = button.getAttribute('data-title');

            confirmDeleteButton.href = `<?= base_url('admin/news/delete'); ?>/${newsId}`;

            newsTitle.textContent = title;
        });
    });
</script>
<?= $this->endSection(); ?>
