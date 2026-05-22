<?= $this->extend('frontend/layout') ?>

<?= $this->section('styles') ?>
<style>
    .success-wrapper {
        max-width: 680px;
        margin: 2rem auto;
    }

    /* ====== SUCCESS HERO ====== */
    .success-hero {
        background: white;
        border-radius: var(--radius-lg);
        padding: 3rem 2rem;
        text-align: center;
        box-shadow: var(--shadow);
        margin-bottom: 1.5rem;
    }

    .success-icon {
        width: 90px;
        height: 90px;
        background: linear-gradient(135deg, var(--success), #059669);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        animation: scaleIn 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    @keyframes scaleIn {
        from { transform: scale(0); opacity: 0; }
        to { transform: scale(1); opacity: 1; }
    }

    .success-icon i {
        font-size: 2.5rem;
        color: white;
    }

    .success-hero h1 {
        font-size: 1.8rem;
        font-weight: 800;
        color: var(--dark);
        margin-bottom: 0.5rem;
    }

    .success-hero p {
        color: var(--gray-500);
        font-size: 0.95rem;
    }

    .order-number {
        display: inline-block;
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
        padding: 10px 24px;
        border-radius: var(--radius);
        font-size: 1.2rem;
        font-weight: 800;
        letter-spacing: 1px;
        margin: 1.5rem 0;
    }

    /* ====== ORDER DETAILS ====== */
    .order-details-card {
        background: white;
        border-radius: var(--radius-lg);
        padding: 1.5rem 2rem;
        box-shadow: var(--shadow-sm);
        margin-bottom: 1.5rem;
    }

    .order-details-card h3 {
        font-size: 0.85rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: var(--gray-400);
        margin-bottom: 1rem;
    }

    .detail-row {
        display: flex;
        justify-content: space-between;
        padding: 10px 0;
        border-bottom: 1px solid var(--gray-100);
        font-size: 0.9rem;
    }

    .detail-row:last-child {
        border-bottom: none;
    }

    .detail-row .label {
        color: var(--gray-500);
        font-weight: 500;
    }

    .detail-row .value {
        font-weight: 600;
        color: var(--dark);
        text-align: right;
        max-width: 60%;
    }

    .item-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 0;
        border-bottom: 1px solid var(--gray-100);
    }

    .item-row:last-child { border-bottom: none; }

    .item-name {
        font-weight: 600;
        font-size: 0.9rem;
    }

    .item-qty {
        font-size: 0.8rem;
        color: var(--gray-400);
    }

    .item-subtotal {
        font-weight: 700;
        color: var(--primary);
    }

    .total-row {
        display: flex;
        justify-content: space-between;
        padding: 1rem 0 0;
        margin-top: 0.5rem;
        border-top: 2px solid var(--gray-200);
        font-weight: 800;
        font-size: 1.1rem;
    }

    .total-row .total-value {
        color: var(--primary);
        font-size: 1.2rem;
    }

    /* ====== STATUS BADGE ====== */
    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 0.78rem;
        font-weight: 600;
    }

    .status-pending {
        background: #fef3c7;
        color: #92400e;
    }

    /* ====== ACTIONS ====== */
    .action-buttons {
        display: flex;
        gap: 1rem;
        margin-top: 1.5rem;
    }

    .btn-wa {
        flex: 1;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 16px 24px;
        background: linear-gradient(135deg, #25D366, #128C7E);
        color: white;
        border-radius: var(--radius);
        font-size: 1rem;
        font-weight: 700;
        transition: var(--transition);
    }

    .btn-wa:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(37, 211, 102, 0.4);
        color: white;
    }

    .btn-catalog {
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

    .btn-catalog:hover {
        background: var(--gray-200);
    }

    /* ====== TIPS ====== */
    .tips-card {
        background: linear-gradient(135deg, #eff6ff, #dbeafe);
        border: 1px solid #bfdbfe;
        border-radius: var(--radius-lg);
        padding: 1.5rem 2rem;
        margin-bottom: 1.5rem;
    }

    .tips-card h4 {
        font-size: 0.9rem;
        font-weight: 700;
        color: #1e40af;
        margin-bottom: 0.75rem;
    }

    .tips-card ul {
        margin: 0;
        padding-left: 20px;
        font-size: 0.85rem;
        color: #1e40af;
        line-height: 1.8;
    }

    @media (max-width: 600px) {
        .success-hero { padding: 2rem 1rem; }
        .success-hero h1 { font-size: 1.4rem; }
        .order-number { font-size: 1rem; }
        .action-buttons { flex-direction: column; }
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="success-wrapper">
        <!-- Success Hero -->
        <div class="success-hero">
            <div class="success-icon">
                <i class="fas fa-check"></i>
            </div>
            <h1>Pesanan Berhasil! 🎉</h1>
            <p>Terima kasih, pesanan Anda telah kami terima dan sedang diproses.</p>
            <div class="order-number"><?= esc($order['nomor_order']) ?></div>
            <p><span class="status-badge status-pending"><i class="fas fa-clock"></i> Menunggu Konfirmasi</span></p>
        </div>

        <!-- Customer Info -->
        <div class="order-details-card">
            <h3><i class="fas fa-user"></i> Informasi Pemesan</h3>
            <div class="detail-row">
                <span class="label">Nama</span>
                <span class="value"><?= esc($order['nama_customer']) ?></span>
            </div>
            <div class="detail-row">
                <span class="label">WhatsApp</span>
                <span class="value"><?= esc($order['no_whatsapp']) ?></span>
            </div>
            <div class="detail-row">
                <span class="label">Alamat</span>
                <span class="value"><?= esc($order['alamat']) ?></span>
            </div>
            <?php if ($order['catatan']): ?>
            <div class="detail-row">
                <span class="label">Catatan</span>
                <span class="value"><?= esc($order['catatan']) ?></span>
            </div>
            <?php endif; ?>
        </div>

        <!-- Order Items -->
        <div class="order-details-card">
            <h3><i class="fas fa-shopping-bag"></i> Produk Dipesan</h3>
            <?php foreach ($details as $detail): ?>
            <div class="item-row">
                <div>
                    <div class="item-name"><?= esc($detail['nama_produk']) ?></div>
                    <div class="item-qty"><?= $detail['jumlah'] ?> x Rp <?= number_format($detail['harga'], 0, ',', '.') ?></div>
                </div>
                <div class="item-subtotal">Rp <?= number_format($detail['subtotal'], 0, ',', '.') ?></div>
            </div>
            <?php endforeach; ?>

            <div class="total-row">
                <span>Total Pembayaran</span>
                <span class="total-value">Rp <?= number_format($order['total_harga'], 0, ',', '.') ?></span>
            </div>
        </div>

        <!-- Tips -->
        <div class="tips-card">
            <h4><i class="fas fa-lightbulb"></i> Langkah Selanjutnya</h4>
            <ul>
                <li>Simpan nomor pesanan Anda: <strong><?= esc($order['nomor_order']) ?></strong></li>
                <li>Klik tombol WhatsApp di bawah untuk konfirmasi pesanan ke admin</li>
                <li>Admin akan menghubungi Anda untuk konfirmasi dan detail pembayaran</li>
            </ul>
        </div>

        <!-- Action Buttons -->
        <div class="action-buttons">
            <a href="<?= base_url('produk') ?>" class="btn-catalog">
                <i class="fas fa-arrow-left"></i> Kembali ke Katalog
            </a>
            <a href="<?= $waLink ?>" target="_blank" class="btn-wa">
                <i class="fab fa-whatsapp"></i> Hubungi via WhatsApp
            </a>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
