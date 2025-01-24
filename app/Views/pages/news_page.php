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
                  <a href="/news/<?= esc($item['id']); ?>" class="btn btn-primary">Read More</a>
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

    <div>

    </div>
<?= $this->endSection('content'); ?>

