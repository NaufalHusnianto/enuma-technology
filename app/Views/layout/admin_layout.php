<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="The small framework with powerful features">
    <title>Enuma Technology</title>
    <link rel="shortcut icon" type="image/png" href="<?= base_url('/img/enumatech.png') ?>">

    <!-- Bootstrap CSS -->
    <link href="<?= base_url('css/bootstrap.min.css') ?>" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        /* Apply Source Sans Pro to the entire page */
        body {
            font-family: 'Source Sans Pro', sans-serif;
        }
    </style>

    <style>
        /* Styling tambahan */
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            overflow-y: auto;
            background-color: #343a40;
            transition: transform 0.3s ease-in-out;
        }
        .sidebar.hidden {
            transform: translateX(-100%);
        }
        .sidebar .nav-link.active {
            background-color: #495057;
            color: #fff;
        }
        .sidebar .nav-link:hover {
            background-color: #495057;
        }
        .header {
            margin-left: 280px;
            transition: margin-left 0.3s ease-in-out;
        }
        .header.sidebar-hidden {
            margin-left: 0;
        }
        @media (max-width: 992px) {
            .sidebar {
                position: fixed;
                height: 100%;
                width: 80%;
                z-index: 1050;
            }
            .header {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column flex-shrink-0 p-3 text-bg-dark" id="sidebar" style="width: 280px;">
        <a href="/" class="d-flex align-items-center gap-2 mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <img src="<?= base_url('/img/enumatech.png') ?>" alt="Enuma Technology" width="32" height="32">
            <span class="fs-4">Enuma Technology</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="#" class="nav-link active" aria-current="page">
                    <i class="bi bi-house me-2"></i> Home
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    <i class="bi bi-table me-2"></i> Orders
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    <i class="bi bi-box me-2"></i> Products
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    <i class="bi bi-people me-2"></i> Customers
                </a>
            </li>
        </ul>
        <hr>
        <div class="d-flex justify-content-center">
            <p class="small fw-light text-center">Copyright &copy; 2023 Enuma Technology</p>
        </div>
    </div>

    <!-- Header -->
    <div class="header" id="header">
        <div class="container">
            <header class="d-flex flex-wrap align-items-center gap-4 py-3 px-3 mb-4 border-bottom">
                <div id="menuBtn" class="border-0" style="cursor: pointer;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                </div>
                <a href="/admin" class="d-flex align-items-center mb-2 mb-md-0 text-body-emphasis text-decoration-none">
                    <span class="fs-4">Dashboard</span>
                </a>
            </header>
        </div>

        <!-- Konten Halaman -->
        <div class="container">
            <?= $this->renderSection('content') ?>
        </div>
    </div>

    <!-- Bootstrap JavaScript Bundle -->
    <script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>

    <!-- jQuery 3.7.1 -->
    <script src="<?= base_url('js/jquery-3.7.1.min.js') ?>"></script>

    <script>
        const menuBtn = document.getElementById('menuBtn');
        const sidebar = document.getElementById('sidebar');
        const header = document.getElementById('header');

        const toggleSidebar = () => {
            sidebar.classList.toggle('hidden');
            header.classList.toggle('sidebar-hidden');
        };

        menuBtn.addEventListener('click', (e) => {
            e.stopPropagation(); // Mencegah event bubbling
            toggleSidebar();
        });

        document.addEventListener('click', (e) => {
            if (
                window.innerWidth <= 992 &&
                !sidebar.contains(e.target) &&
                !menuBtn.contains(e.target) &&
                !sidebar.classList.contains('hidden')
            ) {
                sidebar.classList.add('hidden');
                header.classList.add('sidebar-hidden');
            }
        });

        window.addEventListener('resize', () => {
            if (window.innerWidth > 992 && sidebar.classList.contains('hidden')) {
                sidebar.classList.remove('hidden');
                header.classList.remove('sidebar-hidden');
            }
        });
    </script>

</body>
</html>
