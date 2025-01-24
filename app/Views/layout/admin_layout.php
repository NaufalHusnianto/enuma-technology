<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="The small framework with powerful features">
    <title>
        Enuma Technology |
        <?= $title ?>
        | Admin
    </title>
    <link rel="shortcut icon" type="image/png" href="<?= base_url('/img/icon/enumatech.png') ?>">

    <!-- News Content Css -->
    <link href="<?= base_url('css/news-content.css') ?>" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="<?= base_url('css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700&display=swap" rel="stylesheet">
    <script src="<?= base_url('js/ckeditor.js') ?>"></script>

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
            margin-left: 240px;
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
    <div class="sidebar d-flex flex-column flex-shrink-0 p-3 text-bg-dark shadow-lg" id="sidebar" style="width: 240px;">
        <a href="/" class="d-flex align-items-center gap-3 mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <img src="<?= base_url('/img/icon/enumatech.png') ?>" alt="Enuma Technology" width="32" height="32">
            <span class="fs-6">Enuma Technology</span>
        </a>
        <hr>
        <?php $uri = service('uri'); ?>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="<?= base_url('/admin') ?>" 
                class="nav-link d-flex align-items-center gap-2 <?= ($uri->getSegment(1) == 'admin' && $uri->getSegment(2) == '') ? 'active' : 'text-white' ?>" 
                aria-current="page">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/news') ?>" 
                class="nav-link d-flex align-items-center gap-2 <?= ($uri->getSegment(1) == 'admin' && $uri->getSegment(2) == 'news') ? 'active' : 'text-white' ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path><polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon></svg>
                    News
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/clients') ?>" 
                class="nav-link d-flex align-items-center gap-2 <?= ($uri->getSegment(1) == 'admin' && $uri->getSegment(2) == 'clients') ? 'active' : 'text-white' ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="butt" stroke-linejoin="bevel"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>
                    Clients
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/portfolios') ?>" 
                class="nav-link d-flex align-items-center gap-2 <?= ($uri->getSegment(1) == 'admin' && $uri->getSegment(2) == 'portfolios') ? 'active' : 'text-white' ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="butt" stroke-linejoin="bevel"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
                    portfolios
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/contacts') ?>" 
                class="nav-link d-flex align-items-center gap-2 <?= ($uri->getSegment(1) == 'admin' && $uri->getSegment(2) == 'contacts') ? 'active' : 'text-white' ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>                    
                    Contact Message
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/admin-users') ?>" 
                class="nav-link d-flex align-items-center gap-2 <?= ($uri->getSegment(1) == 'admin' && $uri->getSegment(2) == 'admin-users') ? 'active' : 'text-white' ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                    Admin Users
                </a>
            </li>
        </ul>
        <hr>
        <div class="d-flex justify-content-center">
            <p class="small fw-lighter text-center">Copyright &copy; 2023 Enuma Technology</p>
        </div>
    </div>

    <!-- Header -->
    <div class="header fixed" id="header">
        <div class="container">
            <header class="d-flex flex-wrap align-items-center justify-content-between gap-4 py-3 px-3 mb-4 border-bottom">
                <div id="menuBtn" class="border-0" style="cursor: pointer;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                </div>
                <a href="<?= base_url('admin') ?>" class="d-flex align-items-center mb-2 mb-md-0 text-body-emphasis text-decoration-none">
                    <span class="fs-6"><?= $title ?></span>
                </a>
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?= session()->get('email') ?>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= base_url('admin/profile') ?>">Profile</a></li>
                        <li><a href="<?= base_url('admin/logout') ?>" class="dropdown-item">Logout</a></li>
                    </ul>
                </div>
            </header>
        </div>

        <!-- Konten Halaman -->
        <div class="container py-2 px-4">
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
