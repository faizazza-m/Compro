<?= $this->extend('frontend/layout') ?>

<?= $this->section('styles') ?>
<style>
    .order-wrapper {
        display: grid;
        grid-template-columns: 1fr 380px;
        gap: 2rem;
        margin: 2rem 0;
        align-items: start;
    }

    /* ====== FORM ====== */
    .order-form-card {
        background: white;
        border-radius: var(--radius-lg);
        padding: 2rem;
        box-shadow: var(--shadow);
    }

    .order-form-card h2 {
        font-size: 1.4rem;
        font-weight: 800;
        margin-bottom: 0.5rem;
        color: var(--dark);
    }

    .order-form-card .subtitle {
        font-size: 0.9rem;
        color: var(--gray-400);
        margin-bottom: 2rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: block;
        font-size: 0.85rem;
        font-weight: 600;
        color: var(--gray-700);
        margin-bottom: 6px;
    }

    .form-group label .required {
        color: var(--danger);
    }

    .form-control {
        width: 100%;
        padding: 12px 16px;
        border: 2px solid var(--gray-200);
        border-radius: var(--radius);
        font-size: 0.9rem;
        font-family: 'Inter', sans-serif;
        color: var(--dark);
        transition: var(--transition);
        background: white;
    }

    .form-control:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
    }

    .form-control::placeholder {
        color: var(--gray-400);
    }

    textarea.form-control {
        resize: vertical;
        min-height: 100px;
    }

    .form-help {
        font-size: 0.78rem;
        color: var(--gray-400);
        margin-top: 4px;
    }

    .quantity-input {
        display: flex;
        align-items: center;
        gap: 0;
    }

    .quantity-btn {
        width: 44px;
        height: 44px;
        border: 2px solid var(--gray-200);
        background: var(--gray-100);
        font-size: 1.2rem;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: var(--transition);
        color: var(--dark);
    }

    .quantity-btn:first-child { border-radius: var(--radius) 0 0 var(--radius); }
    .quantity-btn:last-child { border-radius: 0 var(--radius) var(--radius) 0; }

    .quantity-btn:hover {
        background: var(--primary);
        color: white;
        border-color: var(--primary);
    }

    .quantity-input input {
        width: 70px;
        text-align: center;
        border: 2px solid var(--gray-200);
        border-left: none;
        border-right: none;
        padding: 10px;
        font-size: 1rem;
        font-weight: 700;
        font-family: 'Inter', sans-serif;
    }

    .quantity-input input:focus {
        outline: none;
        border-color: var(--gray-200);
    }

    /* ====== PRODUCT SUMMARY ====== */
    .product-summary {
        background: white;
        border-radius: var(--radius-lg);
        padding: 1.5rem;
        box-shadow: var(--shadow);
        position: sticky;
        top: 90px;
    }

    .product-summary h3 {
        font-size: 0.85rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: var(--gray-400);
        margin-bottom: 1.25rem;
    }

    .summary-product {
        display: flex;
        gap: 1rem;
        padding-bottom: 1.25rem;
        margin-bottom: 1.25rem;
        border-bottom: 1px solid var(--gray-200);
    }

    .summary-product .sp-image {
        width: 80px;
        height: 80px;
        border-radius: var(--radius);
        background: linear-gradient(135deg, #667eea11, #764ba211);
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        flex-shrink: 0;
    }

    .summary-product .sp-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .summary-product .sp-info {
        flex: 1;
    }

    .summary-product .sp-name {
        font-size: 0.9rem;
        font-weight: 700;
        margin-bottom: 0.25rem;
    }

    .summary-product .sp-category {
        font-size: 0.78rem;
        color: var(--gray-400);
        margin-bottom: 0.5rem;
    }

    .summary-product .sp-price {
        font-size: 1.05rem;
        font-weight: 800;
        color: var(--primary);
    }

    .summary-line {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 8px 0;
        font-size: 0.9rem;
        color: var(--gray-600);
    }

    .summary-total {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 0 0;
        margin-top: 0.5rem;
        border-top: 2px solid var(--gray-200);
        font-weight: 800;
        font-size: 1.1rem;
        color: var(--dark);
    }

    .summary-total .total-price {
        color: var(--primary);
        font-size: 1.3rem;
    }

    .btn-submit-order {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        width: 100%;
        padding: 16px;
        margin-top: 1.5rem;
        background: linear-gradient(135deg, var(--success), #059669);
        color: white;
        border: none;
        border-radius: var(--radius);
        font-size: 1rem;
        font-weight: 700;
        cursor: pointer;
        transition: var(--transition);
        font-family: 'Inter', sans-serif;
    }

    .btn-submit-order:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(16, 185, 129, 0.4);
    }

    .secure-badge {
        text-align: center;
        margin-top: 1rem;
        font-size: 0.78rem;
        color: var(--gray-400);
    }

    .secure-badge i {
        color: var(--success);
    }

    /* ====== RESPONSIVE ====== */
    @media (max-width: 900px) {
        .order-wrapper {
            grid-template-columns: 1fr;
        }

        .product-summary {
            position: static;
            order: -1;
        }
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="order-wrapper">
        <!-- Order Form -->
        <div class="order-form-card">
            <h2><i class="fas fa-clipboard-list" style="color: var(--primary);"></i> Form Pemesanan</h2>
            <p class="subtitle">Lengkapi data di bawah untuk melakukan pemesanan</p>

            <form action="<?= base_url('order/store') ?>" method="post" id="orderForm">
                <?= csrf_field() ?>
                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">

                <div class="form-group">
                    <label>Nama Lengkap <span class="required">*</span></label>
                    <input type="text" name="nama_customer" class="form-control"
                           placeholder="Masukkan nama lengkap"
                           value="<?= old('nama_customer') ?>" required>
                </div>

                <div class="form-group">
                    <label>Nomor WhatsApp <span class="required">*</span></label>
                    <input type="tel" name="no_whatsapp" class="form-control"
                           placeholder="Contoh: 081234567890"
                           value="<?= old('no_whatsapp') ?>" required>
                    <p class="form-help">Masukkan nomor WhatsApp aktif untuk konfirmasi pesanan</p>
                </div>

                <div class="form-group">
                    <label>Alamat Pengiriman <span class="required">*</span></label>
                    <textarea name="alamat" class="form-control"
                              placeholder="Masukkan alamat lengkap" required><?= old('alamat') ?></textarea>
                </div>

                <div class="form-group">
                    <label>Jumlah Pesanan <span class="required">*</span></label>
                    <div class="quantity-input">
                        <button type="button" class="quantity-btn" onclick="changeQty(-1)">−</button>
                        <input type="number" name="jumlah" id="qtyInput" value="<?= old('jumlah', 1) ?>"
                               min="1" max="<?= $product['stok'] ?>" required>
                        <button type="button" class="quantity-btn" onclick="changeQty(1)">+</button>
                    </div>
                    <p class="form-help">Stok tersedia: <?= $product['stok'] ?> unit</p>
                </div>

                <div class="form-group">
                    <label>Catatan (opsional)</label>
                    <textarea name="catatan" class="form-control"
                              placeholder="Catatan tambahan untuk pesanan (warna, ukuran, dll)"><?= old('catatan') ?></textarea>
                </div>
            </form>
        </div>

        <!-- Product Summary -->
        <div class="product-summary">
            <h3><i class="fas fa-receipt"></i> Ringkasan Pesanan</h3>

            <div class="summary-product">
                <div class="sp-image">
                    <?php if ($product['gambar'] && file_exists(FCPATH . 'uploads/products/' . $product['gambar'])): ?>
                        <img src="<?= base_url('uploads/products/' . $product['gambar']) ?>" alt="<?= esc($product['nama_produk']) ?>">
                    <?php else: ?>
                        <i class="fas fa-image" style="font-size: 1.5rem; color: var(--gray-300);"></i>
                    <?php endif; ?>
                </div>
                <div class="sp-info">
                    <div class="sp-name"><?= esc($product['nama_produk']) ?></div>
                    <div class="sp-category"><?= esc($product['nama_kategori']) ?></div>
                    <div class="sp-price">Rp <?= number_format($product['harga'], 0, ',', '.') ?></div>
                </div>
            </div>

            <div class="summary-line">
                <span>Harga</span>
                <span>Rp <?= number_format($product['harga'], 0, ',', '.') ?></span>
            </div>
            <div class="summary-line">
                <span>Jumlah</span>
                <span id="summaryQty">1</span>
            </div>

            <div class="summary-total">
                <span>Total</span>
                <span class="total-price" id="summaryTotal">Rp <?= number_format($product['harga'], 0, ',', '.') ?></span>
            </div>

            <button type="submit" form="orderForm" class="btn-submit-order">
                <i class="fas fa-paper-plane"></i> Kirim Pesanan
            </button>

            <div class="secure-badge">
                <i class="fas fa-shield-alt"></i> Data Anda aman dan terenkripsi
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    const price = <?= $product['harga'] ?>;
    const maxStock = <?= $product['stok'] ?>;
    const qtyInput = document.getElementById('qtyInput');
    const summaryQty = document.getElementById('summaryQty');
    const summaryTotal = document.getElementById('summaryTotal');

    function formatRupiah(num) {
        return 'Rp ' + num.toLocaleString('id-ID');
    }

    function updateSummary() {
        let qty = parseInt(qtyInput.value) || 1;
        if (qty < 1) qty = 1;
        if (qty > maxStock) qty = maxStock;
        qtyInput.value = qty;
        summaryQty.textContent = qty;
        summaryTotal.textContent = formatRupiah(price * qty);
    }

    function changeQty(delta) {
        let qty = parseInt(qtyInput.value) || 1;
        qty += delta;
        if (qty < 1) qty = 1;
        if (qty > maxStock) qty = maxStock;
        qtyInput.value = qty;
        updateSummary();
    }

    qtyInput.addEventListener('input', updateSummary);
    updateSummary();
</script>
<?= $this->endSection() ?>
