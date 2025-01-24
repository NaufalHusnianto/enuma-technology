<?= $this->extend('layout/main_layout'); ?>

<?= $this->section('content'); ?>
<div id="newsCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
        <?php $isActive = true; ?>
        <?php foreach ($news as $item): ?>
            <div class="carousel-item <?= $isActive ? 'active' : ''; ?>">
                <img src="<?= base_url('uploads/news/' . esc($item['image_url'])); ?>" style="width: 100%; object-fit: cover; height: 500px; filter: brightness(0.6);" alt="<?= esc($item['title']); ?>">
                <div class="carousel-caption d-none d-md-block">
                    <h5><?= esc($item['title']); ?></h5>
                    <p><?= esc($item['description']); ?></p>
                    <a href="/<?= esc($item['id']); ?>" class="btn btn-primary">Selengkapnya</a>
                </div>
            </div>
            <?php $isActive = false; ?>
        <?php endforeach; ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#newsCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#newsCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden"></span>
    </button>
</div>

<div class="album py-5 bg-body-tertiary">
    <div class="container">
      <div class="section-title">
        <h2>Berita Terkini</h2>
      </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php foreach ($news as $item): ?>
                <div class="col">
                    <div class="card shadow-sm h-100">
                        <img src="<?= base_url('uploads/news/' . esc($item['image_url'])); ?>" class="card-img-top" alt="<?= esc($item['title']); ?>" style="height: 200px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?= esc($item['title']); ?></h5>
                            <p class="card-text flex-grow-1"><?= esc(substr($item['description'], 0, 100)); ?>...</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="/<?= esc($item['id']); ?>" class="btn btn-sm btn-primary">Selengkapnya</a>
                                <small class="text-body-secondary"><?= date('d M Y', strtotime($item['created_at'])); ?></small>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>
