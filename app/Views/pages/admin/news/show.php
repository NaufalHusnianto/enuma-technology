<?= $this->extend('layout/admin_layout'); ?>

<?= $this->section('content'); ?>
    <div class="container">
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
