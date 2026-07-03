<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><i class="fas fa-credit-card text-success"></i> Verifikasi Pembayaran</h1>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <!-- Filter Buttons -->
        <div class="mb-3">
            <a href="<?= base_url('admin/pembayaran') ?>" class="btn btn-sm <?= !$currentStatus ? 'btn-primary' : 'btn-outline-primary' ?>">
                Semua
            </a>
            <a href="<?= base_url('admin/pembayaran?status=pending') ?>" class="btn btn-sm <?= $currentStatus === 'pending' ? 'btn-warning' : 'btn-outline-warning' ?>">
                <i class="fas fa-clock"></i> Pending
            </a>
            <a href="<?= base_url('admin/pembayaran?status=verified') ?>" class="btn btn-sm <?= $currentStatus === 'verified' ? 'btn-success' : 'btn-outline-success' ?>">
                <i class="fas fa-check"></i> Verified
            </a>
            <a href="<?= base_url('admin/pembayaran?status=rejected') ?>" class="btn btn-sm <?= $currentStatus === 'rejected' ? 'btn-danger' : 'btn-outline-danger' ?>">
                <i class="fas fa-times"></i> Rejected
            </a>
        </div>

        <?php if (empty($payments)): ?>
            <div class="card">
                <div class="card-body text-center py-5">
                    <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">Belum ada data pembayaran</h5>
                </div>
            </div>
        <?php else: ?>
            <div class="row">
                <?php foreach ($payments as $payment): ?>
                <div class="col-md-6 col-lg-4 mb-3">
                    <div class="card h-100">
                        <div class="card-header bg-light d-flex justify-content-between align-items-center">
                            <strong class="text-primary"><?= esc($payment['nomor_order']) ?></strong>
                            <?php
                                $badgeClass = 'badge-secondary';
                                if ($payment['status'] === 'pending') $badgeClass = 'badge-warning';
                                elseif ($payment['status'] === 'verified') $badgeClass = 'badge-success';
                                elseif ($payment['status'] === 'rejected') $badgeClass = 'badge-danger';
                            ?>
                            <span class="badge <?= $badgeClass ?>"><?= ucfirst($payment['status']) ?></span>
                        </div>

                        <div class="card-body">
                            <table class="table table-sm table-borderless mb-2">
                                <tr>
                                    <td class="text-muted" width="120">Pengirim</td>
                                    <td><strong><?= esc($payment['nama_pengirim']) ?></strong></td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Bank</td>
                                    <td><?= esc($payment['bank_pengirim']) ?></td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Transfer</td>
                                    <td><strong class="text-success">Rp <?= number_format($payment['jumlah_transfer'], 0, ',', '.') ?></strong></td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Total Order</td>
                                    <td><strong>Rp <?= number_format($payment['order_total'], 0, ',', '.') ?></strong></td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Tanggal</td>
                                    <td><?= date('d/m/Y H:i', strtotime($payment['created_at'])) ?></td>
                                </tr>
                            </table>

                            <?php if ($payment['bukti_transfer'] && file_exists(FCPATH . 'uploads/payments/' . $payment['bukti_transfer'])): ?>
                                <div class="text-center mb-3">
                                    <a href="<?= base_url('uploads/payments/' . $payment['bukti_transfer']) ?>" target="_blank">
                                        <img src="<?= base_url('uploads/payments/' . $payment['bukti_transfer']) ?>"
                                             alt="Bukti Transfer"
                                             class="img-fluid rounded border"
                                             style="max-height: 200px; object-fit: contain;">
                                    </a>
                                    <br>
                                    <small class="text-muted">Klik untuk memperbesar</small>
                                </div>
                            <?php endif; ?>

                            <?php if ($payment['catatan']): ?>
                                <div class="alert alert-light py-2 mb-2">
                                    <small class="text-muted"><i class="fas fa-sticky-note"></i> <?= esc($payment['catatan']) ?></small>
                                </div>
                            <?php endif; ?>
                        </div>

                        <?php if ($payment['status'] === 'pending'): ?>
                        <div class="card-footer bg-white">
                            <div class="d-flex gap-2">
                                <form action="<?= base_url('admin/pembayaran/verify/' . $payment['id']) ?>" method="post" class="flex-fill">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="action" value="verify">
                                    <button type="submit" class="btn btn-success btn-sm btn-block" onclick="return confirm('Verifikasi pembayaran ini?')">
                                        <i class="fas fa-check"></i> Verifikasi
                                    </button>
                                </form>
                                <form action="<?= base_url('admin/pembayaran/verify/' . $payment['id']) ?>" method="post" class="flex-fill">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="action" value="reject">
                                    <button type="submit" class="btn btn-danger btn-sm btn-block" onclick="return confirm('Tolak pembayaran ini?')">
                                        <i class="fas fa-times"></i> Tolak
                                    </button>
                                </form>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<?= $this->endSection() ?>
