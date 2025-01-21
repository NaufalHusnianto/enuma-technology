<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enuma Technology</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="<?= base_url('/img/enumatech.png')?>">

    <!-- Bootstrap CSS -->
    <link href="<?= base_url('css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        /* Apply Source Sans Pro to the entire page */
        body {
            font-family: 'Source Sans Pro', sans-serif;
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center gap-3 mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
            <img src="<?= base_url('/img/enumatech.png') ?>" alt="enuma" width="32" height="32">
            <span class="fs-4">Enuma Technology</span>
        </a>

        <ul class="nav nav-pills">
            <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Features</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Pricing</a></li>
            <li class="nav-item"><a href="#" class="nav-link">FAQs</a></li>
            <li class="nav-item"><a href="#" class="nav-link">About</a></li>
        </ul>
        </header>
    </div>

    <div class="container col-xxl-8 px-4 py-2">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6 text-center">
            <img src="<?= base_url('/img/hero-img.png') ?>" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
        </div>
        <div class="col-lg-6">
            <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3 text-center text-lg-start">Solusi Masa Depan Pengembangan Produk IT</h1>
            <p class="lead text-center text-lg-start">Kami terdiri dari teknisi handal yang siap membantu mewujudkan produk IT impian anda</p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
            <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Primary</button>
            <button type="button" class="btn btn-outline-secondary btn-lg px-4">Default</button>
            </div>
        </div>
        </div>
    </div>



    <!-- Bootstrap JavaScript Bundle (termasuk Popper.js) -->
    <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>

    <!-- jQuery 3.7.1 -->
    <script src="<?= base_url('js/jquery-3.7.1.min.js') ?>"></script>
</body>
</html>
