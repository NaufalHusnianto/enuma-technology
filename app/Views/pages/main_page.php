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

<!-- ======= About Us Section ======= -->
<section id="about" class="about">
  <div class="container aos-init aos-animate" data-aos="fade-up">

    <div class="section-title">
      <h2>Tentang Kami</h2>
    </div>

    <div class="row content">
      <div class="col-lg-6">
        <p>
          Enuma Technology merupakan sebuah perusahaan yang bergerak di bidang teknologi informasi dengan menyediakan jasa perancangan, pengelolaan, pengembangan dan penelitian terkait IT. Adapun cakupan jasa kami meliputi di bawah ini :  
        </p>
        <ul>
          <li><i class="ri--check-double-line"></i>Internet of Things</li>
          <li><i class="ri--check-double-line"></i>Multimedia : Desain grafis dan animasi</li>
          <li><i class="ri--check-double-line"></i>Pengembangan Aplikasi Android</li>
          <li><i class="ri--check-double-line"></i>Pengembangan Game</li>
          <li><i class="ri--check-double-line"></i>Sistemasi Robotika</li>
        </ul>
      </div>
      <div class="col-lg-6 pt-4 pt-lg-0">
        <p>
          Tim kami terdiri dari berbagai macam bidang IT mulai dari multimedia, jaringan, pemrograman, dan robotika. Kombinasi dari keempat bidang tersebut membuat perusahaan kami siap untuk membantu anda mewujudkan produk impian anda. Mulai dari perancangan hingga pada pengelolaan produk dapat anda serahkan kepada kami
        </p>
        <a href="https://enumatechnology.com/about.html" class="btn-learn-more">Pelajari lanjut</a>
      </div>
    </div>

  </div>
</section><!-- End About Us Section -->

<section class="album py-5 bg-body-tertiary" style="background-color: #f3f5fa;" id="news">
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
</section>

 <!-- ======= Services Section ======= -->
 <section id="services" class="services">
  <div class="container aos-init aos-animate" data-aos="fade-up">

    <div class="section-title">
      <h2>Jasa Kami</h2>
      <p>Kami menawarkan 4 jenis jasa yang dapat memfasilitasi terwujudnya produk impian anda</p>
    </div>

    <div class="row">
      <div class="col-xl-3 col-md-6 d-flex align-items-stretch aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100">
        <div class="icon-box">
          <div class="icon"><i class="bxl--dribbble"></i></div>
          <h4><a href="">Konsultasi IT</a></h4>
          <p>Menyediakan layanan konsultasi 24 jam terkait dengan IT</p>
        </div>
      </div>

      <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="200">
        <div class="icon-box">
          <div class="icon"><i class="bx--file"></i></div>
          <h4><a href="">Perancangan Sistem</a></h4>
          <p>Punya ide untuk membuat sebuah sistem yang kompleks namun terkendala perancangan ? serahkan kepada kami untuk masalah perancangan sistem</p>
        </div>
      </div>

      <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="300">
        <div class="icon-box">
          <div class="icon"><i class="bx--tachometer"></i></div>
          <h4><a href="">Pengembangan Produk</a></h4>
          <p>Berikan rancangan anda, maka akan kami kembangkan produk impian anda</p>
        </div>
      </div>

      <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="400">
        <div class="icon-box">
          <div class="icon"><i class="bx--layer"></i></div>
          <h4><a href="">Pengelolaan Produk</a></h4>
          <p>Pengelolaan produk meliputi perawatan, peningkatan, dan pemeliharaan</p>
        </div>
      </div>

    </div>

  </div>
</section><!-- End Services Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio section-bg">
      <div class="container aos-init aos-animate" data-aos="fade-up">

        <div class="section-title">
          <h2>Portfolio</h2>
          <p>Puluhan produk, sistem, dan rancangan telah kami kembangkankan</p>
        </div>

        <div class="row portfolio-container aos-init aos-animate" data-aos="fade-up" data-aos-delay="200" style="position: relative; height: 1646.83px;">

        <?php foreach ($portfolios as $portfolio): ?>
        <div class="col-lg-4 col-md-6 portfolio-item filter-app" style="position: absolute; left: 0px; top: 0px;">
            <div class="portfolio-img">
                <img src="<?= base_url('uploads/portfolios/' . $portfolio['image']); ?>" class="img-fluid" alt="<?= esc($portfolio['title']); ?>">
            </div>
            <div class="portfolio-info">
                <h4><?= esc($portfolio['title']); ?></h4>
                <p><?= esc($portfolio['description']); ?></p>
                <a href="<?= base_url('uploads/portfolios/' . $portfolio['image']); ?>" data-gall="portfolioGallery" class="venobox preview-link vbox-item" title="<?= esc($portfolio['title']); ?>">
                    <i class="bx bx-plus"></i>
                </a>
                <a href="<?= base_url('portfolio-details/' . $portfolio['id']); ?>" class="details-link" title="More Details">
                    <i class="bx bx-link"></i>
                </a>
            </div>
        </div>
        <?php endforeach; ?>

        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container aos-init aos-animate" data-aos="fade-up">

        <div class="section-title">
          <h2>Hubungi Kami</h2>
          <p>Tertarik dengan jasa dan layanan kami ? atau ada keluhan ? Komunikasi dengan kami lewat form pesan di bawah ini, akan kami tanggapi melalui email secapat mungkin</p>
        </div>

        <div class="row">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="simple-icons--googlemaps"></i>
                <h4>Lokasi :</h4>
                <p>Daratan, RT 002/RW 006, Tohudan, Colomadu, Karanganyar, Jawa Tengah, Indonesia</p>
              </div>

              <div class="email">
                <i class="fa--envelope"></i>
                <h4>Email:</h4>
                <p>support@enumatech.com</p>
              </div>

              <div class="phone">
                <i class="ph--phone-fill"></i>
                <h4>Telepon:</h4>
                <p>+62 821-3649-0192</p>
              </div>

              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.371523982358!2d110.76814031042097!3d-7.534396092447484!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a1476ffffffff%3A0x4fefce7d4aab5646!2sEnuma%20Technology!5e0!3m2!1sid!2sid!4v1737436918520!5m2!1sid!2sid"
                frameborder="0" style="border:0; width: 100%; height: 290px;"
                allowfullscreen=""
                data-ruffle-polyfilled=""
              ></iframe>
            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form id="contactForm" action="<?= base_url('contact'); ?>" method="post" role="form" class="php-email-form">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="name">Nama Anda</label>
                <input type="text" name="name" class="form-control" id="name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                <div class="validate"></div>
              </div>
              <div class="form-group col-md-6">
                <label for="name">Email Anda</label>
                <input type="email" class="form-control" name="email" id="email" data-rule="email" data-msg="Please enter a valid email">
                <div class="validate"></div>
              </div>
            </div>
            <div class="form-group">
              <label for="name">Judul Pesan</label>
              <input type="text" class="form-control" name="subject" id="subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject">
              <div class="validate"></div>
            </div>
            <div class="form-group">
              <label for="name">Pesan</label>
              <textarea class="form-control" name="message" rows="10" data-rule="required" data-msg="Please write something for us"></textarea>
              <div class="validate"></div>
            </div>
            <div class="mb-3">
              <div class="loading">Memuat</div>
              <div class="sent-message">Pesan anda telah terkirim</div>
            </div>
            <div class="text-center"><button type="submit">Kirim Pesan</button></div>
          </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->


    <script>
  document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('contactForm');
    const successMessage = document.querySelector('.sent-message');
    const loadingMessage = document.querySelector('.loading');
    
    form.addEventListener('submit', function (event) {
      event.preventDefault();

      loadingMessage.style.display = 'block';
      successMessage.style.display = 'none';

      fetch(form.action, {
        method: 'POST',
        body: new FormData(form)
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          successMessage.style.display = 'block';
        } else {
          alert('Terjadi kesalahan, coba lagi nanti.');
        }
      })
      .catch(() => {
        alert('Terjadi kesalahan dalam pengiriman data.');
      })
      .finally(() => {
        loadingMessage.style.display = 'none';
        form.reset();
      });
    });
  });
</script>


<?= $this->endSection('content'); ?>
