<?= $this->extend('frontend/layout') ?>

<?= $this->section('styles') ?>
<style>
    /* ====== HERO ====== */
    .hero {
        background: linear-gradient(135deg, #065f46 0%, #059669 40%, #0d9488 80%, #0ea5e9 100%);
        padding: 5rem 2rem;
        color: white;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .hero::before {
        content: '';
        position: absolute;
        top: -30%;
        right: -10%;
        width: 500px;
        height: 500px;
        background: rgba(255,255,255,0.06);
        border-radius: 50%;
    }

    .hero::after {
        content: '';
        position: absolute;
        bottom: -20%;
        left: -5%;
        width: 350px;
        height: 350px;
        background: rgba(255,255,255,0.04);
        border-radius: 50%;
    }

    .hero-content {
        position: relative;
        z-index: 1;
        max-width: 700px;
        margin: 0 auto;
    }

    .hero h1 {
        font-size: 2.8rem;
        font-weight: 800;
        line-height: 1.2;
        margin-bottom: 1rem;
    }

    .hero h1 .highlight {
        background: linear-gradient(to right, #fbbf24, #f59e0b);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .hero p {
        font-size: 1.15rem;
        opacity: 0.9;
        margin-bottom: 2rem;
    }

    .hero-btn {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 14px 32px;
        background: white;
        color: var(--primary);
        border-radius: var(--radius);
        font-size: 1rem;
        font-weight: 700;
        transition: var(--transition);
    }

    .hero-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        color: var(--primary-dark);
    }

    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: rgba(255,255,255,0.15);
        backdrop-filter: blur(8px);
        padding: 8px 18px;
        border-radius: 30px;
        font-size: 0.85rem;
        font-weight: 600;
        margin-bottom: 1.5rem;
    }

    /* ====== FEATURES ====== */
    .features {
        padding: 3rem 0;
    }

    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 1.5rem;
        margin-bottom: 3rem;
    }

    .feature-card {
        background: white;
        padding: 2rem;
        border-radius: var(--radius-lg);
        text-align: center;
        box-shadow: var(--shadow-sm);
        transition: var(--transition);
    }

    .feature-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-lg);
    }

    .feature-card .icon {
        width: 60px;
        height: 60px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        font-size: 1.5rem;
    }

    .feature-card:nth-child(1) .icon { background: #ecfdf5; color: #059669; }
    .feature-card:nth-child(2) .icon { background: #fef3c7; color: #d97706; }
    .feature-card:nth-child(3) .icon { background: #dbeafe; color: #2563eb; }
    .feature-card:nth-child(4) .icon { background: #fce7f3; color: #db2777; }

    .feature-card h3 {
        font-size: 1rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .feature-card p {
        font-size: 0.85rem;
        color: var(--gray-500);
        margin: 0;
    }

    /* ====== PRODUCTS SECTION ====== */
    .section-title {
        font-size: 1.5rem;
        font-weight: 800;
        margin-bottom: 0.5rem;
        color: var(--dark);
    }

    .section-subtitle {
        font-size: 0.95rem;
        color: var(--gray-500);
        margin-bottom: 2rem;
    }

    .product-grid-home {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .product-card-home {
        background: white;
        border-radius: var(--radius-lg);
        overflow: hidden;
        box-shadow: var(--shadow-sm);
        transition: var(--transition);
        display: flex;
        flex-direction: column;
    }

    .product-card-home:hover {
        transform: translateY(-6px);
        box-shadow: var(--shadow-xl);
    }

    .product-card-home .pc-image {
        height: 200px;
        background: linear-gradient(135deg, #05966911, #0ea5e911);
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .product-card-home .pc-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: var(--transition);
    }

    .product-card-home:hover .pc-image img {
        transform: scale(1.05);
    }

    .product-card-home .pc-body {
        padding: 1.25rem;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .product-card-home .pc-category {
        font-size: 0.72rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: var(--primary);
        margin-bottom: 0.5rem;
    }

    .product-card-home .pc-name {
        font-size: 1rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .product-card-home .pc-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: auto;
        padding-top: 1rem;
    }

    .product-card-home .pc-price {
        font-size: 1.1rem;
        font-weight: 800;
        color: var(--primary);
    }

    .product-card-home .pc-btn {
        padding: 8px 16px;
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
        border-radius: 8px;
        font-size: 0.8rem;
        font-weight: 600;
        transition: var(--transition);
    }

    .product-card-home .pc-btn:hover {
        box-shadow: 0 4px 12px rgba(5, 150, 105, 0.4);
    }

    .view-all-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 12px 28px;
        background: var(--primary);
        color: white;
        border-radius: var(--radius);
        font-weight: 600;
        transition: var(--transition);
    }

    .view-all-btn:hover {
        background: var(--primary-dark);
        color: white;
        transform: translateY(-2px);
    }

    /* ====== TRUST SECTION ====== */
    .trust-section {
        background: white;
        border-radius: var(--radius-lg);
        padding: 2.5rem;
        margin: 1rem 0 3rem;
        box-shadow: var(--shadow-sm);
        text-align: center;
    }

    .trust-stats {
        display: flex;
        justify-content: center;
        gap: 3rem;
        flex-wrap: wrap;
        margin-top: 1.5rem;
    }

    .trust-stat {
        text-align: center;
    }

    .trust-stat .number {
        font-size: 2rem;
        font-weight: 800;
        color: var(--primary);
    }

    .trust-stat .label {
        font-size: 0.85rem;
        color: var(--gray-500);
    }

    @media (max-width: 768px) {
        .hero h1 { font-size: 2rem; }
        .hero { padding: 3rem 1rem; }
        .trust-stats { gap: 1.5rem; }
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Hero -->
<section class="hero">
    <div class="hero-content">
        <div class="hero-badge">
            <i class="fas fa-shield-alt"></i> Sparepart Original & Berkualitas
        </div>
        <h1>Bengkel & Sparepart <span class="highlight">Vespa</span> Terlengkap</h1>
        <p>Pusat sparepart vespa original dan aftermarket berkualitas. Dari vespa klasik hingga modern, semua tersedia di sini.</p>
        <a href="<?= base_url('produk') ?>" class="hero-btn">
            <i class="fas fa-wrench"></i> Lihat Sparepart
        </a>
    </div>
</section>

<!-- Features -->
<div class="container">
    <section class="features">
        <div class="features-grid">
            <div class="feature-card">
                <div class="icon"><i class="fas fa-cogs"></i></div>
                <h3>Sparepart Lengkap</h3>
                <p>Ribuan sparepart vespa klasik & modern, original & aftermarket</p>
            </div>
            <div class="feature-card">
                <div class="icon"><i class="fas fa-credit-card"></i></div>
                <h3>Pembayaran Mudah</h3>
                <p>Transfer bank dengan konfirmasi otomatis, aman dan cepat</p>
            </div>
            <div class="feature-card">
                <div class="icon"><i class="fas fa-shipping-fast"></i></div>
                <h3>Pengiriman Cepat</h3>
                <p>Kirim ke seluruh Indonesia dengan jasa ekspedisi terpercaya</p>
            </div>
            <div class="feature-card">
                <div class="icon"><i class="fas fa-headset"></i></div>
                <h3>Konsultasi Gratis</h3>
                <p>Tanya soal vespa kamu? Kami siap bantu via WhatsApp!</p>
            </div>
        </div>

        <!-- Trust Section -->
        <div class="trust-section">
            <h2 class="section-title"><i class="fas fa-trophy" style="color: var(--accent);"></i> Kenapa Pilih VespaPartID?</h2>
            <p class="section-subtitle">Dipercaya oleh ribuan pecinta vespa di seluruh Indonesia</p>
            <div class="trust-stats">
                <div class="trust-stat">
                    <div class="number">5K+</div>
                    <div class="label">Produk Tersedia</div>
                </div>
                <div class="trust-stat">
                    <div class="number">10K+</div>
                    <div class="label">Pesanan Selesai</div>
                </div>
                <div class="trust-stat">
                    <div class="number">4.9★</div>
                    <div class="label">Rating Pelanggan</div>
                </div>
                <div class="trust-stat">
                    <div class="number">24/7</div>
                    <div class="label">Support Online</div>
                </div>
            </div>
        </div>

        <!-- Products -->
        <h2 class="section-title"><i class="fas fa-fire" style="color: var(--danger);"></i> Sparepart Terbaru</h2>
        <p class="section-subtitle">Koleksi sparepart terbaru yang siap untuk vespa kesayangan kamu</p>

        <?php if (empty($products)): ?>
            <div style="text-align: center; padding: 3rem; color: var(--gray-400);">
                <i class="fas fa-box-open" style="font-size: 3rem; margin-bottom: 1rem; opacity: 0.5;"></i>
                <h3 style="color: var(--gray-500);">Belum ada produk</h3>
            </div>
        <?php else: ?>
            <div class="product-grid-home">
                <?php foreach (array_slice($products, 0, 6) as $product): ?>
                <a href="<?= base_url('produk/' . $product['slug']) ?>" class="product-card-home">
                    <div class="pc-image">
                        <?php if ($product['gambar'] && file_exists(FCPATH . 'uploads/products/' . $product['gambar'])): ?>
                            <img src="<?= base_url('uploads/products/' . $product['gambar']) ?>" alt="<?= esc($product['nama_produk']) ?>">
                        <?php else: ?>
                            <i class="fas fa-image" style="font-size: 3rem; color: var(--gray-300);"></i>
                        <?php endif; ?>
                    </div>
                    <div class="pc-body">
                        <div class="pc-category"><?= esc($product['nama_kategori']) ?></div>
                        <div class="pc-name"><?= esc($product['nama_produk']) ?></div>
                        <div class="pc-footer">
                            <span class="pc-price">Rp <?= number_format($product['harga'], 0, ',', '.') ?></span>
                            <span class="pc-btn">Detail <i class="fas fa-arrow-right"></i></span>
                        </div>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>

            <div style="text-align: center; margin: 2rem 0 3rem;">
                <a href="<?= base_url('produk') ?>" class="view-all-btn">
                    Lihat Semua Sparepart <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        <?php endif; ?>
    </section>
</div>
<?= $this->endSection() ?>
