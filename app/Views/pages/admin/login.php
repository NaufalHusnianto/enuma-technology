<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enuma Technology - Admin</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="<?= base_url('/img/enumatech.png')?>">

    <!-- Bootstrap CSS -->
    <link href="<?= base_url('css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Source Sans Pro', sans-serif;
        }
    </style>
</head>
<body>

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-lg w-100" style="max-width: 400px;">
            <div class="card-header text-white" style="background-color: #37517e;">
                <div class="d-flex align-items-center p-2 gap-4">
                    <img src="<?= base_url('/img/enumatech.png') ?>" alt="Enuma" width="100">
                    <h1 class="fw-bold">Enuma Technology</h1>
                </div>
            </div>
            <div class="card-body">
                <form action="<?= base_url('/admin/processLogin') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                    </div>
                    <?php if (session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session()->getFlashdata('error') ?>
                        </div>
                    <?php endif; ?>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center text-muted">
                <small>&copy; 2025 Enuma Technology</small>
            </div>
        </div>
    </div>

    <?php if (session()->getFlashdata('error')): ?>
        <p><?= session()->getFlashdata('error') ?></p>
    <?php endif; ?>


    <!-- Bootstrap JavaScript Bundle (termasuk Popper.js) -->
    <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>

    <!-- jQuery 3.7.1 -->
    <script src="<?= base_url('js/jquery-3.7.1.min.js') ?>"></script>
</body>
</html>
