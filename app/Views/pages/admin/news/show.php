<?= $this->extend('layout/admin_layout'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="d-flex justify-content-start gap-2 align-items-center">
        <a href="<?= base_url('admin/news'); ?>" class="btn btn-primary mb-3 d-flex align-items-center gap-2">
            Back
        </a>
        <a href="<?= base_url('admin/news/edit/' . $news['id']); ?>" class="btn btn-warning mb-3 d-flex align-items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path><polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon></svg>
            Edit
        </a>
    </div>
        <div class="card shadow-lg rounded-3">
            <div class="card-body">
                <h1 class="card-title mb-4"><?= esc($news['title']); ?></h1>
                <p class="card-text text-muted mb-4"><?= esc($news['description']); ?></p>

                <!-- Gambar Berita -->
                <?php if ($news['image_url']): ?>
                    <img src="<?= base_url('uploads/news/' . esc($news['image_url'])); ?>" alt="News Image" class="img-fluid mb-4">
                <?php endif; ?>

                <!-- Content Berita -->
                <div class="content text-dark">
                    <?= $news['content']; ?>
                </div>

                <!-- Tanggal Berita -->
                <div class="text-muted mt-4">
                    <span>Posted on: <?= date('d M Y', strtotime($news['created_at'])); ?></span>
                </div>
            </div>
        </div>
</div>
<?= $this->endSection(); ?>
