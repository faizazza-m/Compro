<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Company Profile' ?> | Compro</title>
    <meta name="description" content="Website Company Profile dengan katalog produk dan pemesanan online.">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --primary-light: #818cf8;
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
            width: 38px;
            height: 38px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.1rem;
        }

        .navbar-nav {
            display: flex;
            align-items: center;
            gap: 8px;
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
                    <i class="fas fa-cube"></i>
                </div>
                Compro
            </a>

            <button class="menu-toggle" id="menuToggle" aria-label="Toggle Menu">
                <i class="fas fa-bars"></i>
            </button>

            <ul class="navbar-nav" id="navbarNav">
                <li><a href="<?= base_url('/') ?>" class="<?= current_url() == base_url('/') ? 'active' : '' ?>">Beranda</a></li>
                <li><a href="<?= base_url('produk') ?>" class="<?= strpos(current_url(), '/produk') !== false ? 'active' : '' ?>">Produk</a></li>
                <li><a href="<?= base_url('login') ?>" class="btn-admin"><i class="fas fa-lock mr-1"></i> Admin</a></li>
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
        <p>&copy; <?= date('Y') ?> <strong>Compro</strong>. Dibuat dengan <i class="fas fa-heart" style="color: var(--danger);"></i> menggunakan CodeIgniter 4.</p>
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
    </script>
    <?= $this->renderSection('scripts') ?>
</body>
</html>
