<?= $this->extend('frontend/layout') ?>

<?= $this->section('styles') ?>
<style>
    /* ====== PAGE HEADER ====== */
    .page-header {
        background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        padding: 3rem 2rem;
        color: white;
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
    }

    .page-header::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 400px;
        height: 400px;
        background: rgba(255,255,255,0.08);
        border-radius: 50%;
    }

    .page-header::after {
        content: '';
        position: absolute;
        bottom: -30%;
        left: -5%;
        width: 250px;
        height: 250px;
        background: rgba(255,255,255,0.05);
        border-radius: 50%;
    }

    .page-header-inner {
        max-width: 1280px;
        margin: 0 auto;
        position: relative;
        z-index: 1;
    }

    .page-header h1 {
        font-size: 2rem;
        font-weight: 800;
        margin-bottom: 0.5rem;
    }

    .page-header p {
        font-size: 1rem;
        opacity: 0.9;
    }

    /* ====== LAYOUT ====== */
    .catalog-layout {
        display: grid;
        grid-template-columns: 280px 1fr;
        gap: 2rem;
        align-items: start;
    }

    /* ====== SIDEBAR ====== */
    .sidebar {
        background: white;
        border-radius: var(--radius-lg);
        padding: 1.5rem;
        box-shadow: var(--shadow-sm);
        position: sticky;
        top: 90px;
    }

    .sidebar h3 {
        font-size: 0.85rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: var(--gray-400);
        margin-bottom: 1rem;
    }

    .sidebar-nav {
        list-style: none;
    }

    .sidebar-nav li a {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px 14px;
        border-radius: 8px;
        font-size: 0.9rem;
        font-weight: 500;
        color: var(--gray-600);
        transition: var(--transition);
        margin-bottom: 4px;
    }

    .sidebar-nav li a:hover,
    .sidebar-nav li a.active {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
    }

    .sidebar-nav li a .badge {
        background: rgba(255,255,255,0.2);
        padding: 2px 8px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .sidebar-nav li a:not(.active) .badge {
        background: var(--gray-200);
        color: var(--gray-600);
    }

    /* ====== PRODUCT GRID ====== */
    .product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
        gap: 1.5rem;
    }

    .product-card {
        background: white;
        border-radius: var(--radius-lg);
        overflow: hidden;
        box-shadow: var(--shadow-sm);
        transition: var(--transition);
        display: flex;
        flex-direction: column;
    }

    .product-card:hover {
        transform: translateY(-6px);
        box-shadow: var(--shadow-xl);
    }

    .product-card .product-image {
        height: 200px;
        background: linear-gradient(135deg, #667eea22, #764ba222);
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        position: relative;
    }

    .product-card .product-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: var(--transition);
    }

    .product-card:hover .product-image img {
        transform: scale(1.05);
    }

    .product-card .product-image .placeholder-icon {
        font-size: 3rem;
        color: var(--gray-300);
    }

    .product-card .product-image .category-badge {
        position: absolute;
        top: 12px;
        left: 12px;
        background: rgba(99, 102, 241, 0.9);
        backdrop-filter: blur(8px);
        color: white;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.7rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .product-card .product-image .stock-badge {
        position: absolute;
        top: 12px;
        right: 12px;
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 0.7rem;
        font-weight: 600;
    }

    .stock-badge.in-stock {
        background: rgba(16, 185, 129, 0.9);
        color: white;
    }

    .stock-badge.out-of-stock {
        background: rgba(239, 68, 68, 0.9);
        color: white;
    }

    .product-card .product-info {
        padding: 1.25rem;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .product-card .product-name {
        font-size: 1rem;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 0.5rem;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .product-card .product-desc {
        font-size: 0.82rem;
        color: var(--gray-500);
        margin-bottom: 1rem;
        flex: 1;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .product-card .product-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-top: 0.75rem;
        border-top: 1px solid var(--gray-100);
    }

    .product-card .price {
        font-size: 1.15rem;
        font-weight: 800;
        color: var(--primary);
    }

    .product-card .btn-detail {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 8px 16px;
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
        border-radius: 8px;
        font-size: 0.8rem;
        font-weight: 600;
        transition: var(--transition);
    }

    .product-card .btn-detail:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(99, 102, 241, 0.4);
    }

    /* ====== EMPTY STATE ====== */
    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        color: var(--gray-400);
    }

    .empty-state i {
        font-size: 4rem;
        margin-bottom: 1rem;
        opacity: 0.5;
    }

    .empty-state h3 {
        font-size: 1.2rem;
        margin-bottom: 0.5rem;
        color: var(--gray-500);
    }

    /* ====== RESPONSIVE ====== */
    @media (max-width: 900px) {
        .catalog-layout {
            grid-template-columns: 1fr;
        }

        .sidebar {
            position: static;
        }
    }

    @media (max-width: 600px) {
        .product-grid {
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        }

        .page-header { padding: 2rem 1rem; }
        .page-header h1 { font-size: 1.5rem; }
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Page Header -->
<div class="page-header">
    <div class="page-header-inner">
        <h1><i class="fas fa-store"></i> <?= $title ?></h1>
        <p><?= isset($activeCategory) && $activeCategory ? 'Menampilkan produk dalam kategori "' . esc($activeCategory['nama_kategori']) . '"' : 'Temukan produk terbaik untuk kebutuhan Anda' ?></p>
    </div>
</div>

<div class="container">
    <div class="catalog-layout">
        <!-- Sidebar -->
        <aside class="sidebar">
            <h3><i class="fas fa-filter"></i> Kategori</h3>
            <ul class="sidebar-nav">
                <li>
                    <a href="<?= base_url('produk') ?>" class="<?= !$activeCategory ? 'active' : '' ?>">
                        <span><i class="fas fa-th-large"></i> Semua Produk</span>
                    </a>
                </li>
                <?php foreach ($categories as $cat): ?>
                <li>
                    <a href="<?= base_url('produk/kategori/' . $cat['slug']) ?>"
                       class="<?= ($activeCategory && $activeCategory['id'] == $cat['id']) ? 'active' : '' ?>">
                        <span><?= esc($cat['nama_kategori']) ?></span>
                        <span class="badge"><?= $cat['total_produk'] ?? 0 ?></span>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </aside>

        <!-- Product Grid -->
        <div>
            <?php if (empty($products)): ?>
                <div class="empty-state">
                    <i class="fas fa-box-open"></i>
                    <h3>Belum ada produk</h3>
                    <p>Produk dalam kategori ini belum tersedia.</p>
                </div>
            <?php else: ?>
                <div class="product-grid">
                    <?php foreach ($products as $product): ?>
                    <div class="product-card">
                        <div class="product-image">
                            <?php if ($product['gambar'] && file_exists(FCPATH . 'uploads/products/' . $product['gambar'])): ?>
                                <img src="<?= base_url('uploads/products/' . $product['gambar']) ?>" alt="<?= esc($product['nama_produk']) ?>">
                            <?php else: ?>
                                <i class="fas fa-image placeholder-icon"></i>
                            <?php endif; ?>
                            <span class="category-badge"><?= esc($product['nama_kategori']) ?></span>
                            <?php if ($product['stok'] > 0): ?>
                                <span class="stock-badge in-stock">Stok: <?= $product['stok'] ?></span>
                            <?php else: ?>
                                <span class="stock-badge out-of-stock">Habis</span>
                            <?php endif; ?>
                        </div>
                        <div class="product-info">
                            <h3 class="product-name"><?= esc($product['nama_produk']) ?></h3>
                            <p class="product-desc"><?= esc($product['deskripsi']) ?></p>
                            <div class="product-footer">
                                <span class="price">Rp <?= number_format($product['harga'], 0, ',', '.') ?></span>
                                <a href="<?= base_url('produk/' . $product['slug']) ?>" class="btn-detail">
                                    Detail <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
