<?= $this->extend('layout/admin_layout'); ?>

<?= $this->section('content'); ?>
<div class="container col-xxl-11 px-4">
    <div class="row flex-lg-row-reverse align-items-center g-5">
      <div class="col-10 col-sm-8 col-lg-6">
        <img src="<?= base_url('/img/hero-img.png') ?>" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="400" height="200" loading="lazy">
      </div>
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Dashboard Landing Page Enuma Technology</h1>
        <p class="lead">Kami terdiri dari teknisi handal yang siap membantu mewujudkan produk IT impian anda</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
          <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Landing Page</button>
          <button type="button" class="btn btn-outline-secondary btn-lg px-4">News</button>
        </div>
      </div>
    </div>
  </div>
<?= $this->endSection(); ?>