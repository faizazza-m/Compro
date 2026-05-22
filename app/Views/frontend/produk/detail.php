<?= $this->extend('frontend/layout') ?>

<?= $this->section('styles') ?>
<style>
    .detail-wrapper {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 2.5rem;
        margin: 2rem 0;
    }

    /* ====== IMAGE ====== */
    .detail-image {
        background: white;
        border-radius: var(--radius-lg);
        overflow: hidden;
        box-shadow: var(--shadow);
        aspect-ratio: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #667eea11, #764ba211);
    }

    .detail-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .detail-image .placeholder-icon {
        font-size: 6rem;
        color: var(--gray-300);
    }

    /* ====== INFO ====== */
    .detail-info {
        display: flex;
        flex-direction: column;
    }

    .detail-breadcrumb {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 0.85rem;
        color: var(--gray-400);
        margin-bottom: 1rem;
    }

    .detail-breadcrumb a {
        color: var(--primary);
        font-weight: 500;
    }

    .detail-breadcrumb a:hover {
        text-decoration: underline;
    }

    .detail-category {
        display: inline-block;
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
        padding: 5px 14px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 1rem;
    }

    .detail-title {
        font-size: 1.8rem;
        font-weight: 800;
        color: var(--dark);
        line-height: 1.3;
        margin-bottom: 1rem;
    }

    .detail-price {
        font-size: 2rem;
        font-weight: 800;
        color: var(--primary);
        margin-bottom: 1.5rem;
    }

    .detail-price small {
        font-size: 0.85rem;
        color: var(--gray-400);
        font-weight: 400;
    }

    .detail-meta {
        display: flex;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 10px 16px;
        background: var(--gray-100);
        border-radius: var(--radius);
        font-size: 0.85rem;
        font-weight: 500;
        color: var(--gray-600);
    }

    .meta-item i {
        color: var(--primary);
    }

    .meta-item.in-stock i { color: var(--success); }
    .meta-item.out-of-stock { background: #fef2f2; color: var(--danger); }
    .meta-item.out-of-stock i { color: var(--danger); }

    .detail-desc {
        font-size: 0.95rem;
        color: var(--gray-600);
        line-height: 1.8;
        margin-bottom: 2rem;
        flex: 1;
    }

    .detail-desc h4 {
        font-size: 0.9rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: var(--gray-400);
        margin-bottom: 0.75rem;
    }

    /* ====== ACTION ====== */
    .detail-actions {
        display: flex;
        gap: 1rem;
    }

    .btn-order-now {
        flex: 1;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 16px 30px;
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
        border: none;
        border-radius: var(--radius);
        font-size: 1rem;
        font-weight: 700;
        cursor: pointer;
        transition: var(--transition);
        font-family: 'Inter', sans-serif;
    }

    .btn-order-now:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(99, 102, 241, 0.4);
    }

    .btn-order-now:disabled {
        opacity: 0.5;
        cursor: not-allowed;
        transform: none;
        box-shadow: none;
    }

    .btn-back {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 16px 24px;
        background: var(--gray-100);
        color: var(--gray-600);
        border-radius: var(--radius);
        font-size: 0.9rem;
        font-weight: 600;
        transition: var(--transition);
    }

    .btn-back:hover {
        background: var(--gray-200);
    }

    /* ====== RELATED PRODUCTS ====== */
    .related-section {
        margin-top: 3rem;
        padding-top: 2rem;
        border-top: 2px solid var(--gray-200);
    }

    .related-section h2 {
        font-size: 1.3rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        color: var(--dark);
    }

    .related-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(230px, 1fr));
        gap: 1.25rem;
    }

    .related-card {
        background: white;
        border-radius: var(--radius);
        overflow: hidden;
        box-shadow: var(--shadow-sm);
        transition: var(--transition);
    }

    .related-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-lg);
    }

    .related-card .r-image {
        height: 140px;
        background: linear-gradient(135deg, #667eea11, #764ba211);
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .related-card .r-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .related-card .r-info {
        padding: 1rem;
    }

    .related-card .r-name {
        font-size: 0.9rem;
        font-weight: 600;
        margin-bottom: 0.4rem;
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .related-card .r-price {
        font-size: 1rem;
        font-weight: 700;
        color: var(--primary);
    }

    /* ====== RESPONSIVE ====== */
    @media (max-width: 768px) {
        .detail-wrapper {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .detail-title { font-size: 1.4rem; }
        .detail-price { font-size: 1.5rem; }
        .detail-meta { flex-wrap: wrap; }

        .detail-actions {
            flex-direction: column;
        }
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="detail-wrapper">
        <!-- Product Image -->
        <div class="detail-image">
            <?php if ($product['gambar'] && file_exists(FCPATH . 'uploads/products/' . $product['gambar'])): ?>
                <img src="<?= base_url('uploads/products/' . $product['gambar']) ?>" alt="<?= esc($product['nama_produk']) ?>">
            <?php else: ?>
                <i class="fas fa-image placeholder-icon"></i>
            <?php endif; ?>
        </div>

        <!-- Product Info -->
        <div class="detail-info">
            <div class="detail-breadcrumb">
                <a href="<?= base_url('produk') ?>">Produk</a>
                <i class="fas fa-chevron-right" style="font-size: 0.7rem;"></i>
                <a href="<?= base_url('produk/kategori/' . $product['category_slug']) ?>"><?= esc($product['nama_kategori']) ?></a>
                <i class="fas fa-chevron-right" style="font-size: 0.7rem;"></i>
                <span><?= esc($product['nama_produk']) ?></span>
            </div>

            <span class="detail-category"><?= esc($product['nama_kategori']) ?></span>

            <h1 class="detail-title"><?= esc($product['nama_produk']) ?></h1>

            <div class="detail-price">
                Rp <?= number_format($product['harga'], 0, ',', '.') ?>
                <small>/ unit</small>
            </div>

            <div class="detail-meta">
                <?php if ($product['stok'] > 0): ?>
                    <div class="meta-item in-stock">
                        <i class="fas fa-check-circle"></i>
                        Stok: <?= $product['stok'] ?> tersedia
                    </div>
                <?php else: ?>
                    <div class="meta-item out-of-stock">
                        <i class="fas fa-times-circle"></i>
                        Stok Habis
                    </div>
                <?php endif; ?>
                <div class="meta-item">
                    <i class="fas fa-tag"></i>
                    <?= esc($product['nama_kategori']) ?>
                </div>
            </div>

            <div class="detail-desc">
                <h4>Deskripsi Produk</h4>
                <?= nl2br(esc($product['deskripsi'])) ?>
            </div>

            <div class="detail-actions">
                <a href="<?= base_url('produk') ?>" class="btn-back">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <?php if ($product['stok'] > 0): ?>
                    <a href="<?= base_url('order/' . $product['slug']) ?>" class="btn-order-now">
                        <i class="fas fa-shopping-cart"></i> Pesan Sekarang
                    </a>
                <?php else: ?>
                    <button class="btn-order-now" disabled>
                        <i class="fas fa-ban"></i> Stok Habis
                    </button>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Related Products -->
    <?php if (!empty($relatedProducts)): ?>
    <div class="related-section">
        <h2><i class="fas fa-cubes" style="color: var(--primary);"></i> Produk Terkait</h2>
        <div class="related-grid">
            <?php foreach ($relatedProducts as $rp): ?>
            <a href="<?= base_url('produk/' . $rp['slug']) ?>" class="related-card">
                <div class="r-image">
                    <?php if ($rp['gambar'] && file_exists(FCPATH . 'uploads/products/' . $rp['gambar'])): ?>
                        <img src="<?= base_url('uploads/products/' . $rp['gambar']) ?>" alt="<?= esc($rp['nama_produk']) ?>">
                    <?php else: ?>
                        <i class="fas fa-image" style="font-size: 2rem; color: var(--gray-300);"></i>
                    <?php endif; ?>
                </div>
                <div class="r-info">
                    <div class="r-name"><?= esc($rp['nama_produk']) ?></div>
                    <div class="r-price">Rp <?= number_format($rp['harga'], 0, ',', '.') ?></div>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>
