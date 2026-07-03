<?= $this->extend('frontend/layout') ?>

<?= $this->section('styles') ?>
<style>
    .status-wrapper {
        max-width: 680px;
        margin: 1rem auto 3rem;
    }

    .status-card {
        background: white;
        border-radius: var(--radius-lg);
        overflow: hidden;
        box-shadow: var(--shadow);
    }

    .status-header {
        padding: 2rem;
        text-align: center;
    }

    .status-header.pending {
        background: linear-gradient(135deg, #fef3c7, #fde68a);
    }

    .status-header.verified {
        background: linear-gradient(135deg, #d1fae5, #a7f3d0);
    }

    .status-header.rejected {
        background: linear-gradient(135deg, #fecaca, #fca5a5);
    }

    .status-header.no-payment {
        background: linear-gradient(135deg, var(--gray-100), var(--gray-200));
    }

    .status-icon {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        font-size: 2rem;
    }

    .status-icon.pending { background: #f59e0b; color: white; }
    .status-icon.verified { background: #10b981; color: white; }
    .status-icon.rejected { background: #ef4444; color: white; }
    .status-icon.no-payment { background: var(--gray-400); color: white; }

    .status-header h2 {
        font-size: 1.4rem;
        font-weight: 800;
        margin-bottom: 0.5rem;
    }

    .status-header p {
        font-size: 0.9rem;
        opacity: 0.8;
    }

    .status-body {
        padding: 2rem;
    }

    .info-section {
        margin-bottom: 1.5rem;
    }

    .info-section h3 {
        font-size: 0.85rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: var(--gray-400);
        margin-bottom: 1rem;
    }

    .info-row {
        display: flex;
        justify-content: space-between;
        padding: 8px 0;
        border-bottom: 1px solid var(--gray-100);
        font-size: 0.9rem;
    }

    .info-row:last-child { border-bottom: none; }
    .info-row .label { color: var(--gray-500); }
    .info-row .value { font-weight: 600; color: var(--dark); text-align: right; }

    .bukti-image {
        width: 100%;
        max-height: 400px;
        object-fit: contain;
        border-radius: var(--radius);
        border: 2px solid var(--gray-200);
        margin-top: 1rem;
    }

    .action-buttons {
        display: flex;
        gap: 1rem;
        margin-top: 1.5rem;
    }

    .btn-primary-action {
        flex: 1;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 14px 24px;
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
        border-radius: var(--radius);
        font-weight: 700;
        font-size: 0.9rem;
        transition: var(--transition);
    }

    .btn-primary-action:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(5, 150, 105, 0.4);
        color: white;
    }

    .btn-secondary-action {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 14px 24px;
        background: var(--gray-100);
        color: var(--gray-600);
        border-radius: var(--radius);
        font-weight: 600;
        font-size: 0.9rem;
        transition: var(--transition);
    }

    .btn-secondary-action:hover { background: var(--gray-200); }

    /* Timeline */
    .timeline {
        margin-top: 1.5rem;
    }

    .timeline-item {
        display: flex;
        gap: 1rem;
        padding-bottom: 1.5rem;
        position: relative;
    }

    .timeline-item:last-child { padding-bottom: 0; }

    .timeline-item::before {
        content: '';
        position: absolute;
        left: 15px;
        top: 30px;
        bottom: 0;
        width: 2px;
        background: var(--gray-200);
    }

    .timeline-item:last-child::before { display: none; }

    .timeline-dot {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.8rem;
        flex-shrink: 0;
        z-index: 1;
    }

    .timeline-dot.done { background: var(--success); color: white; }
    .timeline-dot.active { background: var(--accent); color: white; }
    .timeline-dot.waiting { background: var(--gray-200); color: var(--gray-400); }

    .timeline-content h4 {
        font-size: 0.9rem;
        font-weight: 600;
        margin-bottom: 2px;
    }

    .timeline-content p {
        font-size: 0.8rem;
        color: var(--gray-400);
        margin: 0;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="status-wrapper">
        <div class="status-card">
            <?php
                $statusClass = 'no-payment';
                $statusText = 'Belum Ada Pembayaran';
                $statusDesc = 'Silakan lakukan pembayaran dan upload bukti transfer.';
                $statusIcon = 'fas fa-clock';

                if ($payment) {
                    $statusClass = $payment['status'];
                    if ($payment['status'] === 'pending') {
                        $statusText = 'Menunggu Verifikasi';
                        $statusDesc = 'Bukti transfer sedang diperiksa oleh admin.';
                        $statusIcon = 'fas fa-hourglass-half';
                    } elseif ($payment['status'] === 'verified') {
                        $statusText = 'Pembayaran Terverifikasi ✅';
                        $statusDesc = 'Pembayaran telah dikonfirmasi. Pesanan sedang diproses.';
                        $statusIcon = 'fas fa-check';
                    } elseif ($payment['status'] === 'rejected') {
                        $statusText = 'Pembayaran Ditolak';
                        $statusDesc = 'Bukti transfer tidak valid. Silakan kirim ulang.';
                        $statusIcon = 'fas fa-times';
                    }
                }
            ?>

            <div class="status-header <?= $statusClass ?>">
                <div class="status-icon <?= $statusClass ?>">
                    <i class="<?= $statusIcon ?>"></i>
                </div>
                <h2><?= $statusText ?></h2>
                <p><?= $statusDesc ?></p>
            </div>

            <div class="status-body">
                <!-- Order Info -->
                <div class="info-section">
                    <h3><i class="fas fa-receipt"></i> Informasi Pesanan</h3>
                    <div class="info-row">
                        <span class="label">No. Order</span>
                        <span class="value"><?= esc($order['nomor_order']) ?></span>
                    </div>
                    <div class="info-row">
                        <span class="label">Total Bayar</span>
                        <span class="value" style="color: var(--primary); font-size: 1.1rem;">Rp <?= number_format($order['total_harga'], 0, ',', '.') ?></span>
                    </div>
                    <div class="info-row">
                        <span class="label">Status Pesanan</span>
                        <span class="value"><?= ucfirst($order['status']) ?></span>
                    </div>
                </div>

                <?php if ($payment): ?>
                    <!-- Payment Info -->
                    <div class="info-section">
                        <h3><i class="fas fa-credit-card"></i> Detail Pembayaran</h3>
                        <div class="info-row">
                            <span class="label">Nama Pengirim</span>
                            <span class="value"><?= esc($payment['nama_pengirim']) ?></span>
                        </div>
                        <div class="info-row">
                            <span class="label">Bank Pengirim</span>
                            <span class="value"><?= esc($payment['bank_pengirim']) ?></span>
                        </div>
                        <div class="info-row">
                            <span class="label">Jumlah Transfer</span>
                            <span class="value">Rp <?= number_format($payment['jumlah_transfer'], 0, ',', '.') ?></span>
                        </div>
                        <div class="info-row">
                            <span class="label">Dikirim Pada</span>
                            <span class="value"><?= date('d M Y, H:i', strtotime($payment['created_at'])) ?></span>
                        </div>
                        <?php if ($payment['verified_at']): ?>
                        <div class="info-row">
                            <span class="label">Diverifikasi Pada</span>
                            <span class="value"><?= date('d M Y, H:i', strtotime($payment['verified_at'])) ?></span>
                        </div>
                        <?php endif; ?>
                    </div>

                    <?php if ($payment['bukti_transfer'] && file_exists(FCPATH . 'uploads/payments/' . $payment['bukti_transfer'])): ?>
                        <div class="info-section">
                            <h3><i class="fas fa-image"></i> Bukti Transfer</h3>
                            <img src="<?= base_url('uploads/payments/' . $payment['bukti_transfer']) ?>"
                                 alt="Bukti Transfer" class="bukti-image">
                        </div>
                    <?php endif; ?>

                    <!-- Timeline -->
                    <div class="info-section">
                        <h3><i class="fas fa-stream"></i> Status Timeline</h3>
                        <div class="timeline">
                            <div class="timeline-item">
                                <div class="timeline-dot done"><i class="fas fa-check"></i></div>
                                <div class="timeline-content">
                                    <h4>Pesanan Dibuat</h4>
                                    <p><?= date('d M Y, H:i', strtotime($order['created_at'])) ?></p>
                                </div>
                            </div>
                            <div class="timeline-item">
                                <div class="timeline-dot done"><i class="fas fa-check"></i></div>
                                <div class="timeline-content">
                                    <h4>Bukti Transfer Dikirim</h4>
                                    <p><?= date('d M Y, H:i', strtotime($payment['created_at'])) ?></p>
                                </div>
                            </div>
                            <div class="timeline-item">
                                <div class="timeline-dot <?= $payment['status'] === 'verified' ? 'done' : ($payment['status'] === 'pending' ? 'active' : 'waiting') ?>">
                                    <i class="fas fa-<?= $payment['status'] === 'verified' ? 'check' : ($payment['status'] === 'pending' ? 'hourglass-half' : 'times') ?>"></i>
                                </div>
                                <div class="timeline-content">
                                    <h4><?= $payment['status'] === 'verified' ? 'Pembayaran Terverifikasi' : ($payment['status'] === 'pending' ? 'Menunggu Verifikasi' : 'Pembayaran Ditolak') ?></h4>
                                    <p><?= $payment['verified_at'] ? date('d M Y, H:i', strtotime($payment['verified_at'])) : 'Menunggu admin...' ?></p>
                                </div>
                            </div>
                            <?php if ($payment['status'] === 'verified'): ?>
                            <div class="timeline-item">
                                <div class="timeline-dot <?= $order['status'] === 'selesai' ? 'done' : 'active' ?>">
                                    <i class="fas fa-<?= $order['status'] === 'selesai' ? 'check' : 'box' ?>"></i>
                                </div>
                                <div class="timeline-content">
                                    <h4><?= $order['status'] === 'selesai' ? 'Pesanan Selesai' : 'Pesanan Diproses' ?></h4>
                                    <p><?= $order['status'] === 'selesai' ? 'Selesai' : 'Pesanan sedang disiapkan...' ?></p>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Actions -->
                <div class="action-buttons">
                    <a href="<?= base_url('produk') ?>" class="btn-secondary-action">
                        <i class="fas fa-arrow-left"></i> Katalog
                    </a>
                    <?php if (!$payment || $payment['status'] === 'rejected'): ?>
                        <a href="<?= base_url('payment/' . $order['nomor_order']) ?>" class="btn-primary-action">
                            <i class="fas fa-upload"></i> Upload Bukti Transfer
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
