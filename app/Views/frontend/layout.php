<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Bengkel Vespa' ?> | VespaPartID</title>
    <meta name="description" content="Bengkel Vespa & Sparepart Original - Jual beli sparepart vespa berkualitas, servis vespa terpercaya.">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #059669;
            --primary-dark: #047857;
            --primary-light: #34d399;
            --secondary: #0ea5e9;
            --accent: #f59e0b;
            --success: #10b981;
            --danger: #ef4444;
            --warning: #f59e0b;
            --dark: #0f172a;
            --dark-2: #1e293b;
            --gray-100: #f1f5f9;
            --gray-200: #e2e8f0;
            --gray-300: #cbd5e1;
            --gray-400: #94a3b8;
            --gray-500: #64748b;
            --gray-600: #475569;
            --gray-700: #334155;
            --white: #ffffff;
            --radius: 12px;
            --radius-lg: 16px;
            --shadow-sm: 0 1px 2px rgba(0,0,0,0.05);
            --shadow: 0 4px 6px -1px rgba(0,0,0,0.1), 0 2px 4px -2px rgba(0,0,0,0.1);
            --shadow-lg: 0 10px 15px -3px rgba(0,0,0,0.1), 0 4px 6px -4px rgba(0,0,0,0.1);
            --shadow-xl: 0 20px 25px -5px rgba(0,0,0,0.1), 0 8px 10px -6px rgba(0,0,0,0.1);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--gray-100);
            color: var(--dark);
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* ====== NAVBAR ====== */
        .navbar {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--gray-200);
            padding: 0 2rem;
            position: sticky;
            top: 0;
            z-index: 1000;
            transition: var(--transition);
        }

        .navbar.scrolled {
            box-shadow: var(--shadow);
        }

        .navbar-inner {
            max-width: 1280px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 70px;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 800;
            font-size: 1.35rem;
            color: var(--primary);
        }

        .navbar-brand .brand-icon {
            width: 42px;
            height: 42px;
            background: linear-gradient(135deg, var(--primary), #065f46);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
        }

        .navbar-nav {
            display: flex;
            align-items: center;
            gap: 6px;
            list-style: none;
        }

        .navbar-nav a {
            padding: 8px 18px;
            border-radius: 8px;
            font-weight: 500;
            font-size: 0.9rem;
            color: var(--gray-600);
            transition: var(--transition);
        }

        .navbar-nav a:hover,
        .navbar-nav a.active {
            background: var(--primary);
            color: white;
        }

        .navbar-nav .btn-admin {
            background: linear-gradient(135deg, var(--dark), var(--dark-2));
            color: white;
            padding: 8px 20px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.85rem;
        }

        .navbar-nav .btn-admin:hover {
            opacity: 0.9;
            transform: translateY(-1px);
        }

        /* User dropdown */
        .user-dropdown {
            position: relative;
        }

        .user-dropdown-toggle {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 6px 14px;
            border-radius: 50px;
            cursor: pointer;
            transition: var(--transition);
            background: var(--gray-100);
        }

        .user-dropdown-toggle:hover {
            background: var(--gray-200);
        }

        .user-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--primary-light);
        }

        .user-avatar-placeholder {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.8rem;
            font-weight: 700;
        }

        .user-dropdown-name {
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--dark);
            max-width: 120px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .user-dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            right: 0;
            margin-top: 8px;
            background: white;
            border-radius: var(--radius);
            box-shadow: var(--shadow-xl);
            min-width: 200px;
            z-index: 1001;
            overflow: hidden;
            border: 1px solid var(--gray-200);
        }

        .user-dropdown-menu.show {
            display: block;
            animation: dropDown 0.2s ease;
        }

        @keyframes dropDown {
            from { opacity: 0; transform: translateY(-8px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .user-dropdown-menu a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 18px;
            font-size: 0.85rem;
            color: var(--gray-600);
            transition: var(--transition);
        }

        .user-dropdown-menu a:hover {
            background: var(--gray-100);
            color: var(--dark);
        }

        .user-dropdown-menu a.danger {
            color: var(--danger);
        }

        .user-dropdown-menu a.danger:hover {
            background: #fef2f2;
        }

        .user-dropdown-divider {
            height: 1px;
            background: var(--gray-200);
            margin: 0;
        }

        /* Google login button */
        .btn-google {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 18px;
            background: white;
            color: var(--dark);
            border: 2px solid var(--gray-200);
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.85rem;
            transition: var(--transition);
        }

        .btn-google:hover {
            border-color: var(--primary);
            background: #f0fdf4;
            color: var(--primary-dark);
            transform: translateY(-1px);
        }

        .btn-google img {
            width: 18px;
            height: 18px;
        }

        /* Mobile menu toggle */
        .menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.4rem;
            color: var(--dark);
            cursor: pointer;
        }

        /* ====== CONTAINER ====== */
        .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        /* ====== ALERTS ====== */
        .alert {
            padding: 14px 20px;
            border-radius: var(--radius);
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 10px;
            animation: slideDown 0.3s ease;
        }

        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .alert-success {
            background: #ecfdf5;
            color: #065f46;
            border: 1px solid #a7f3d0;
        }

        .alert-danger {
            background: #fef2f2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

        /* ====== MAIN CONTENT ====== */
        main {
            flex: 1;
            padding: 2rem 0;
        }

        /* ====== FOOTER ====== */
        .footer {
            background: var(--dark);
            color: var(--gray-400);
            padding: 2.5rem 2rem;
            text-align: center;
            font-size: 0.85rem;
        }

        .footer a {
            color: var(--primary-light);
        }

        .footer-content {
            max-width: 1280px;
            margin: 0 auto;
        }

        .footer-brand {
            font-size: 1.2rem;
            font-weight: 800;
            color: var(--primary-light);
            margin-bottom: 0.5rem;
        }

        /* ====== RESPONSIVE ====== */
        @media (max-width: 768px) {
            .navbar { padding: 0 1rem; }
            .container { padding: 0 1rem; }

            .menu-toggle { display: block; }

            .navbar-nav {
                display: none;
                position: absolute;
                top: 70px;
                left: 0;
                right: 0;
                background: white;
                flex-direction: column;
                padding: 1rem;
                box-shadow: var(--shadow-lg);
                border-bottom-left-radius: var(--radius);
                border-bottom-right-radius: var(--radius);
            }

            .navbar-nav.show {
                display: flex;
            }

            .navbar-nav a {
                width: 100%;
                text-align: center;
            }

            .user-dropdown-name { display: none; }
        }
    </style>
    <?= $this->renderSection('styles') ?>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar" id="mainNavbar">
        <div class="navbar-inner">
            <a href="<?= base_url('/') ?>" class="navbar-brand">
                <div class="brand-icon">
                    <i class="fas fa-motorcycle"></i>
                </div>
                VespaPartID
            </a>

            <button class="menu-toggle" id="menuToggle" aria-label="Toggle Menu">
                <i class="fas fa-bars"></i>
            </button>

            <ul class="navbar-nav" id="navbarNav">
                <li><a href="<?= base_url('/') ?>" class="<?= current_url() == base_url('/') ? 'active' : '' ?>">Beranda</a></li>
                <li><a href="<?= base_url('produk') ?>" class="<?= strpos(current_url(), '/produk') !== false ? 'active' : '' ?>">Sparepart</a></li>

                <?php if (session()->get('isLoggedIn')): ?>
                    <?php if (session()->get('role') === 'admin'): ?>
                        <li><a href="<?= base_url('admin') ?>" class="btn-admin"><i class="fas fa-cog"></i> Admin Panel</a></li>
                    <?php endif; ?>
                    <li class="user-dropdown">
                        <div class="user-dropdown-toggle" onclick="toggleUserMenu()">
                            <?php if (session()->get('avatar')): ?>
                                <img src="<?= session()->get('avatar') ?>" alt="avatar" class="user-avatar">
                            <?php else: ?>
                                <div class="user-avatar-placeholder">
                                    <?= strtoupper(substr(session()->get('nama_lengkap'), 0, 1)) ?>
                                </div>
                            <?php endif; ?>
                            <span class="user-dropdown-name"><?= esc(session()->get('nama_lengkap')) ?></span>
                            <i class="fas fa-chevron-down" style="font-size: 0.7rem; color: var(--gray-400);"></i>
                        </div>
                        <div class="user-dropdown-menu" id="userDropdownMenu">
                            <a href="<?= base_url('pesanan-saya') ?>">
                                <i class="fas fa-receipt"></i> Pesanan Saya
                            </a>
                            <div class="user-dropdown-divider"></div>
                            <a href="<?= base_url('logout') ?>" class="danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                <?php else: ?>
                    <li>
                        <a href="<?= base_url('auth/google') ?>" class="btn-google">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="18" height="18">
                                <path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"/>
                                <path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"/>
                                <path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"/>
                                <path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"/>
                            </svg>
                            Login
                        </a>
                    </li>
                    <li><a href="<?= base_url('login') ?>" class="btn-admin"><i class="fas fa-lock"></i> Admin</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <!-- Flash Messages -->
    <main>
        <div class="container">
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success" style="margin-top: 1rem;">
                    <i class="fas fa-check-circle"></i> <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger" style="margin-top: 1rem;">
                    <i class="fas fa-exclamation-circle"></i> <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('errors')): ?>
                <div class="alert alert-danger" style="margin-top: 1rem;">
                    <div>
                        <i class="fas fa-exclamation-circle"></i>
                        <ul style="margin: 0; padding-left: 20px;">
                            <?php foreach (session()->getFlashdata('errors') as $err): ?>
                                <li><?= esc($err) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <?= $this->renderSection('content') ?>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-brand"><i class="fas fa-motorcycle"></i> VespaPartID</div>
            <p>&copy; <?= date('Y') ?> <strong>VespaPartID</strong> — Bengkel & Sparepart Vespa Terpercaya</p>
            <p style="margin-top: 0.5rem; font-size: 0.78rem; opacity: 0.7;">Jl. Vespa Klasik No. 17, Jakarta | <i class="fab fa-whatsapp"></i> 081234567890</p>
        </div>
    </footer>

    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            document.getElementById('mainNavbar').classList.toggle('scrolled', window.scrollY > 10);
        });

        // Mobile menu toggle
        document.getElementById('menuToggle').addEventListener('click', () => {
            document.getElementById('navbarNav').classList.toggle('show');
        });

        // User dropdown toggle
        function toggleUserMenu() {
            const menu = document.getElementById('userDropdownMenu');
            if (menu) menu.classList.toggle('show');
        }

        // Close dropdown on outside click
        document.addEventListener('click', function(e) {
            const dropdown = document.querySelector('.user-dropdown');
            const menu = document.getElementById('userDropdownMenu');
            if (dropdown && menu && !dropdown.contains(e.target)) {
                menu.classList.remove('show');
            }
        });
    </script>
    <?= $this->renderSection('scripts') ?>
</body>
</html>
