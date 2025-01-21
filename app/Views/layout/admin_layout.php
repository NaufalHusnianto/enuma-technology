<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="The small framework with powerful features">
    <title>Enuma Technology</title>
    <link rel="shortcut icon" type="image/png" href="<?= base_url("/img/enumatech.png") ?>">

    <!-- Bootstrap CSS -->
    <link href="<?= base_url('css/bootstrap.min.css') ?>" rel="stylesheet">
</head>
<body>
    
    <!-- Konten Halaman -->
    <?= $this->renderSection('content') ?>

    <!-- Bootstrap JavaScript Bundle (termasuk Popper.js) -->
    <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>

    <!-- jQuery 3.7.1 -->
    <script src="<?= base_url('js/jquery-3.7.1.min.js') ?>"></script>
</body>
</html>
