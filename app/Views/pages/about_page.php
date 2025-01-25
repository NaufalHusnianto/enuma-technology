<?php $this->extend('layout/main_layout'); ?>

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

    <main id="main">

    <button class="carousel-control-prev" type="button" data-bs-target="#newsCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#newsCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden"></span>
    </button>
</div>

    <!-- ======= Term of Service Section ======= -->
    <section id="about" class="about">
        <div class="container">
          <h2 class="section-title">TENTANG KAMI</h2>
        </div>

        <div class="container">
        <p>CV Enuma Technology adalah perusahaan yang bergerak di bidang teknologi informasi, melayani kebutuhan bisnis melalui layanan konsultasi IT, perancangan sistem, pengembangan produk, dan pengelolaan produk. Berdiri dengan tujuan membantu bisnis berkembang di era digital, kami berkomitmen untuk memberikan solusi inovatif dan berkualitas tinggi.</p>
        <h3>Visi</h3>
        <p>Menjadi mitra teknologi terpercaya yang mendukung transformasi digital bisnis di seluruh Indonesia.</p>

        <h3>Misi</h3>
        <ul>
            <li>Memberikan layanan IT yang profesional, efisien, dan inovatif.</li>
            <li>Menyediakan solusi teknologi yang relevan dengan kebutuhan industri.</li>
            <li>Membangun hubungan jangka panjang dengan pelanggan melalui layanan berkualitas.</li>
        </ul>

        <h3>Nilai-Nilai Perusahaan</h3>
        <ul>
            <li><strong>Inovasi:</strong> Selalu menghadirkan solusi kreatif untuk memenuhi kebutuhan teknologi pelanggan.</li>
            <li><strong>Komitmen:</strong> Fokus pada kualitas layanan dan kepuasan pelanggan.</li>
            <li><strong>Kolaborasi:</strong> Membangun hubungan yang saling menguntungkan dengan pelanggan dan mitra kerja.</li>
        </ul>

        <h3>Layanan Utama</h3>
        <ul>
            <li><strong>Konsultasi IT:</strong> Memberikan panduan strategis dalam penggunaan teknologi untuk bisnis Anda.</li>
            <li><strong>Perancangan Sistem:</strong> Merancang sistem teknologi yang efisien dan sesuai kebutuhan.</li>
            <li><strong>Pengembangan Produk:</strong> Menciptakan produk teknologi inovatif yang memenuhi standar industri.</li>
            <li><strong>Pengelolaan Produk:</strong> Menyediakan dukungan, pembaruan, dan pemeliharaan produk teknologi.</li>
        </ul>

        <h3>Hubungi Kami</h3>
        <p>Untuk informasi lebih lanjut, silakan hubungi kami di:</p>
        <p>CV Enuma Technology<br>Email: [email@example.com]<br>Telepon: [Nomor Telepon]<br>Alamat: [Alamat Kantor]</p>
        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

<?= $this->endSection(); ?>