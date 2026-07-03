<?= $this->extend('frontend/layout') ?>

<?= $this->section('styles') ?>
<style>
    .my-orders-wrapper {
        margin: 1rem 0 3rem;
    }

    .my-orders-header {
        margin-bottom: 2rem;
    }

    .my-orders-header h1 {
        font-size: 1.8rem;
        font-weight: 800;
        color: var(--dark);
    }

    .my-orders-header p {
        color: var(--gray-500);
        font-size: 0.95rem;
    }

    .order-card {
        background: white;
        border-radius: var(--radius-lg);
        overflow: hidden;
        box-shadow: var(--shadow-sm);
        margin-bottom: 1rem;
        transition: var(--transition);
    }

    .order-card:hover {
        box-shadow: var(--shadow);
    }

    .order-card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 1rem 1.5rem;
        background: var(--gray-100);
        border-bottom: 1px solid var(--gray-200);
    }

    .order-number-link {
        font-weight: 700;
        color: var(--primary);
        font-size: 0.95rem;
    }

    .order-date {
        font-size: 0.8rem;
        color: var(--gray-400);
    }

    .order-card-body {
        padding: 1.25rem 1.5rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
    }

    .order-info .order-total {
        font-size: 1.2rem;
        font-weight: 800;
        color: var(--primary);
    }

    .order-info .order-method {
        font-size: 0.8rem;
        color: var(--gray-400);
    }

    .order-actions {
        display: flex;
        gap: 0.5rem;
        align-items: center;
    }

    .badge-status {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .badge-pending { background: #fef3c7; color: #92400e; }
    .badge-diproses { background: #dbeafe; color: #1e40af; }
    .badge-selesai { background: #d1fae5; color: #065f46; }
    .badge-batal { background: #fecaca; color: #991b1b; }

    .badge-payment-pending { background: #fef3c7; color: #92400e; }
    .badge-payment-verified { background: #d1fae5; color: #065f46; }
    .badge-payment-rejected { background: #fecaca; color: #991b1b; }

    .btn-sm-action {
        padding: 6px 14px;
        border-radius: 6px;
        font-size: 0.78rem;
        font-weight: 600;
        transition: var(--transition);
    }

    .btn-pay {
        background: var(--primary);
        color: white;
    }
    .btn-pay:hover { background: var(--primary-dark); color: white; }

    .btn-status {
        background: var(--gray-100);
        color: var(--gray-600);
    }
    .btn-status:hover { background: var(--gray-200); }

    .empty-orders {
        text-align: center;
        padding: 4rem 2rem;
        color: var(--gray-400);
    }

    .empty-orders i {
        font-size: 4rem;
        margin-bottom: 1rem;
        opacity: 0.5;
    }

    .empty-orders h3 { font-size: 1.2rem; color: var(--gray-500); margin-bottom: 0.5rem; }

    .empty-orders .btn-shop {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin-top: 1rem;
        padding: 12px 24px;
        background: var(--primary);
        color: white;
        border-radius: var(--radius);
        font-weight: 600;
        transition: var(--transition);
    }
    .empty-orders .btn-shop:hover { background: var(--primary-dark); color: white; }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="my-orders-wrapper">
        <div class="my-orders-header">
            <h1><i class="fas fa-receipt" style="color: var(--primary);"></i> Pesanan Saya</h1>
            <p>Riwayat pesanan Anda di VespaPartID</p>
        </div>

        <?php if (empty($orders)): ?>
            <div class="empty-orders">
                <i class="fas fa-shopping-bag"></i>
                <h3>Belum ada pesanan</h3>
                <p>Ayo belanja sparepart vespa impianmu!</p>
                <a href="<?= base_url('produk') ?>" class="btn-shop">
                    <i class="fas fa-wrench"></i> Belanja Sekarang
                </a>
            </div>
        <?php else: ?>
            <?php foreach ($orders as $order): ?>
            <div class="order-card">
                <div class="order-card-header">
                    <div>
                        <span class="order-number-link"><?= esc($order['nomor_order']) ?></span>
                        <span class="order-date">— <?= date('d M Y, H:i', strtotime($order['created_at'])) ?></span>
                    </div>
                    <span class="badge-status badge-<?= $order['status'] ?>">
                        <i class="fas fa-<?= $order['status'] === 'selesai' ? 'check-circle' : ($order['status'] === 'batal' ? 'times-circle' : ($order['status'] === 'diproses' ? 'spinner' : 'clock')) ?>"></i>
                        <?= ucfirst($order['status']) ?>
                    </span>
                </div>
                <div class="order-card-body">
                    <div class="order-info">
                        <div class="order-total">Rp <?= number_format($order['total_harga'], 0, ',', '.') ?></div>
                        <div class="order-method">
                            <?php if (isset($order['payment']) && $order['payment']): ?>
                                Pembayaran:
                                <span class="badge-status badge-payment-<?= $order['payment']['status'] ?>">
                                    <?= ucfirst($order['payment']['status']) ?>
                                </span>
                            <?php else: ?>
                                <span style="color: var(--danger);">Belum bayar</span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="order-actions">
                        <?php if (!isset($order['payment']) || !$order['payment'] || $order['payment']['status'] === 'rejected'): ?>
                            <?php if ($order['status'] !== 'batal'): ?>
                            <a href="<?= base_url('payment/' . $order['nomor_order']) ?>" class="btn-sm-action btn-pay">
                                <i class="fas fa-credit-card"></i> Bayar
                            </a>
                            <?php endif; ?>
                        <?php else: ?>
                            <a href="<?= base_url('payment/status/' . $order['nomor_order']) ?>" class="btn-sm-action btn-status">
                                <i class="fas fa-eye"></i> Status
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection() ?>
