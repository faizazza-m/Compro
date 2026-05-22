<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-8">
        <!-- Order Info -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-receipt mr-2"></i>Detail Pesanan</h3>
                <div class="card-tools">
                    <span class="badge badge-<?= $order['status'] ?> p-2" style="font-size: 0.9rem;">
                        <?= ucfirst($order['status']) ?>
                    </span>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-sm table-borderless">
                            <tr>
                                <td class="text-muted" width="40%">No. Order</td>
                                <td><strong><?= esc($order['nomor_order']) ?></strong></td>
                            </tr>
                            <tr>
                                <td class="text-muted">Tanggal</td>
                                <td><?= date('d F Y, H:i', strtotime($order['created_at'])) ?></td>
                            </tr>
                            <tr>
                                <td class="text-muted">Status</td>
                                <td>
                                    <span class="badge badge-<?= $order['status'] ?>">
                                        <?= ucfirst($order['status']) ?>
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-sm table-borderless">
                            <tr>
                                <td class="text-muted" width="40%">Customer</td>
                                <td><strong><?= esc($order['nama_customer']) ?></strong></td>
                            </tr>
                            <tr>
                                <td class="text-muted">WhatsApp</td>
                                <td>
                                    <a href="https://wa.me/<?= preg_replace('/^0/', '62', $order['no_whatsapp']) ?>" target="_blank" class="text-success">
                                        <i class="fab fa-whatsapp"></i> <?= esc($order['no_whatsapp']) ?>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-muted">Alamat</td>
                                <td><?= esc($order['alamat']) ?></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <?php if ($order['catatan']): ?>
                <div class="callout callout-info">
                    <h5><i class="fas fa-sticky-note"></i> Catatan Customer</h5>
                    <p class="mb-0"><?= esc($order['catatan']) ?></p>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Order Items -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-shopping-bag mr-2"></i>Produk yang Dipesan</h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Produk</th>
                            <th class="text-right">Harga</th>
                            <th class="text-center">Jumlah</th>
                            <th class="text-right">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($details as $detail): ?>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <?php if ($detail['gambar'] && file_exists(FCPATH . 'uploads/products/' . $detail['gambar'])): ?>
                                        <img src="<?= base_url('uploads/products/' . $detail['gambar']) ?>" alt="" style="width: 40px; height: 40px; object-fit: cover; border-radius: 6px; margin-right: 10px;">
                                    <?php endif; ?>
                                    <strong><?= esc($detail['nama_produk']) ?></strong>
                                </div>
                            </td>
                            <td class="text-right">Rp <?= number_format($detail['harga'], 0, ',', '.') ?></td>
                            <td class="text-center"><?= $detail['jumlah'] ?></td>
                            <td class="text-right"><strong>Rp <?= number_format($detail['subtotal'], 0, ',', '.') ?></strong></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr class="bg-light">
                            <td colspan="3" class="text-right"><strong>Total Pembayaran</strong></td>
                            <td class="text-right">
                                <strong style="font-size: 1.2rem; color: #6366f1;">
                                    Rp <?= number_format($order['total_harga'], 0, ',', '.') ?>
                                </strong>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <!-- Update Status -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-exchange-alt mr-2"></i>Update Status</h3>
            </div>
            <div class="card-body">
                <form action="<?= base_url('admin/pesanan/status/' . $order['id']) ?>" method="post" onsubmit="return confirm('Yakin ubah status pesanan ini?')">
                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label>Ubah Status Pesanan</label>
                        <select name="status" class="form-control">
                            <option value="pending" <?= $order['status'] === 'pending' ? 'selected' : '' ?>>⏳ Pending</option>
                            <option value="diproses" <?= $order['status'] === 'diproses' ? 'selected' : '' ?>>🔄 Diproses</option>
                            <option value="selesai" <?= $order['status'] === 'selesai' ? 'selected' : '' ?>>✅ Selesai</option>
                            <option value="batal" <?= $order['status'] === 'batal' ? 'selected' : '' ?>>❌ Batal</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="fas fa-save mr-1"></i> Update Status
                    </button>
                </form>
            </div>
        </div>

        <!-- WhatsApp -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="fab fa-whatsapp mr-2"></i>Hubungi Customer</h3>
            </div>
            <div class="card-body">
                <?php
                    $waNumber = preg_replace('/^0/', '62', $order['no_whatsapp']);
                    $waMsg = "Halo " . $order['nama_customer'] . ", pesanan Anda #" . $order['nomor_order'] . " sedang kami proses. Terima kasih!";
                    $waLink = "https://wa.me/" . $waNumber . "?text=" . urlencode($waMsg);
                ?>
                <a href="<?= $waLink ?>" target="_blank" class="btn btn-success btn-block">
                    <i class="fab fa-whatsapp mr-1"></i> Chat WhatsApp
                </a>
                <p class="text-muted small mt-2 mb-0">
                    <i class="fas fa-phone mr-1"></i> <?= esc($order['no_whatsapp']) ?>
                </p>
            </div>
        </div>

        <!-- Actions -->
        <a href="<?= base_url('admin/pesanan') ?>" class="btn btn-secondary btn-block">
            <i class="fas fa-arrow-left mr-1"></i> Kembali ke Daftar
        </a>
    </div>
</div>
<?= $this->endSection() ?>
