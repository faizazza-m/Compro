<?= $this->extend('frontend/layout') ?>

<?= $this->section('styles') ?>
<style>
    .payment-wrapper {
        max-width: 800px;
        margin: 1rem auto 3rem;
    }

    .payment-header {
        background: linear-gradient(135deg, var(--primary) 0%, #0d9488 100%);
        border-radius: var(--radius-lg) var(--radius-lg) 0 0;
        padding: 2rem;
        color: white;
        text-align: center;
    }

    .payment-header h1 {
        font-size: 1.6rem;
        font-weight: 800;
        margin-bottom: 0.5rem;
    }

    .payment-header p {
        opacity: 0.9;
        font-size: 0.9rem;
    }

    .payment-body {
        background: white;
        border-radius: 0 0 var(--radius-lg) var(--radius-lg);
        padding: 2rem;
        box-shadow: var(--shadow);
    }

    /* Order summary */
    .order-summary-box {
        background: linear-gradient(135deg, #ecfdf5, #d1fae5);
        border: 1px solid #a7f3d0;
        border-radius: var(--radius);
        padding: 1.5rem;
        margin-bottom: 2rem;
    }

    .order-summary-box h3 {
        font-size: 0.85rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #065f46;
        margin-bottom: 1rem;
    }

    .order-info-row {
        display: flex;
        justify-content: space-between;
        padding: 6px 0;
        font-size: 0.9rem;
    }

    .order-info-row .label { color: #047857; }
    .order-info-row .value { font-weight: 600; color: #065f46; }
    .order-info-row.total {
        border-top: 2px solid #a7f3d0;
        margin-top: 8px;
        padding-top: 12px;
        font-weight: 800;
        font-size: 1.1rem;
    }
    .order-info-row.total .value { color: var(--primary-dark); font-size: 1.2rem; }

    /* Bank info */
    .bank-info {
        background: var(--gray-100);
        border-radius: var(--radius);
        padding: 1.5rem;
        margin-bottom: 2rem;
    }

    .bank-info h3 {
        font-size: 0.85rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: var(--gray-500);
        margin-bottom: 1rem;
    }

    .bank-account {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1rem;
        background: white;
        border-radius: var(--radius);
        margin-bottom: 0.75rem;
        border: 1px solid var(--gray-200);
    }

    .bank-account .bank-logo {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #1e40af, #3b82f6);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.2rem;
        font-weight: 800;
    }

    .bank-account .bank-logo.bca { background: linear-gradient(135deg, #003399, #0055cc); }
    .bank-account .bank-logo.bri { background: linear-gradient(135deg, #003366, #0066cc); }
    .bank-account .bank-logo.mandiri { background: linear-gradient(135deg, #003d7a, #0066cc); }

    .bank-account .bank-detail { flex: 1; }
    .bank-account .bank-name { font-weight: 700; font-size: 0.9rem; }
    .bank-account .bank-number { font-size: 1rem; font-weight: 800; color: var(--primary); letter-spacing: 1px; }
    .bank-account .bank-holder { font-size: 0.8rem; color: var(--gray-500); }

    .bank-account .btn-copy {
        padding: 6px 14px;
        background: var(--gray-100);
        border: 1px solid var(--gray-200);
        border-radius: 6px;
        font-size: 0.78rem;
        font-weight: 600;
        cursor: pointer;
        transition: var(--transition);
        color: var(--gray-600);
    }

    .bank-account .btn-copy:hover {
        background: var(--primary);
        color: white;
        border-color: var(--primary);
    }

    /* Form */
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

    .form-group label .required { color: var(--danger); }

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
        box-shadow: 0 0 0 4px rgba(5, 150, 105, 0.1);
    }

    select.form-control {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath d='M6 8L1 3h10z' fill='%2394a3b8'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 12px center;
        padding-right: 36px;
    }

    .file-upload {
        position: relative;
        border: 2px dashed var(--gray-300);
        border-radius: var(--radius);
        padding: 2rem;
        text-align: center;
        cursor: pointer;
        transition: var(--transition);
    }

    .file-upload:hover { border-color: var(--primary); background: #f0fdf4; }
    .file-upload input { position: absolute; inset: 0; opacity: 0; cursor: pointer; }
    .file-upload i { font-size: 2rem; color: var(--gray-400); margin-bottom: 0.5rem; }
    .file-upload p { font-size: 0.85rem; color: var(--gray-500); margin: 0; }
    .file-upload .file-name { font-weight: 600; color: var(--primary); margin-top: 0.5rem; font-size: 0.85rem; }

    textarea.form-control {
        resize: vertical;
        min-height: 80px;
    }

    .btn-submit-payment {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        width: 100%;
        padding: 16px;
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

    .btn-submit-payment:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(5, 150, 105, 0.4);
    }

    /* Already paid notice */
    .paid-notice {
        text-align: center;
        padding: 2rem;
    }

    .paid-notice i {
        font-size: 3rem;
        color: var(--success);
        margin-bottom: 1rem;
    }

    .paid-notice h3 { font-size: 1.2rem; margin-bottom: 0.5rem; }
    .paid-notice p { color: var(--gray-500); font-size: 0.9rem; }

    .btn-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 20px;
        margin-top: 1rem;
        background: var(--gray-100);
        color: var(--gray-600);
        border-radius: var(--radius);
        font-weight: 600;
        font-size: 0.85rem;
        transition: var(--transition);
    }
    .btn-link:hover { background: var(--gray-200); }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="payment-wrapper">
        <div class="payment-header">
            <i class="fas fa-credit-card" style="font-size: 2rem; margin-bottom: 0.5rem;"></i>
            <h1>Konfirmasi Pembayaran</h1>
            <p>Silakan transfer ke rekening di bawah lalu upload bukti transfer</p>
        </div>

        <div class="payment-body">
            <!-- Order Summary -->
            <div class="order-summary-box">
                <h3><i class="fas fa-receipt"></i> Ringkasan Pesanan</h3>
                <div class="order-info-row">
                    <span class="label">No. Order</span>
                    <span class="value"><?= esc($order['nomor_order']) ?></span>
                </div>
                <div class="order-info-row">
                    <span class="label">Nama</span>
                    <span class="value"><?= esc($order['nama_customer']) ?></span>
                </div>
                <div class="order-info-row total">
                    <span class="label">Total Bayar</span>
                    <span class="value">Rp <?= number_format($order['total_harga'], 0, ',', '.') ?></span>
                </div>
            </div>

            <!-- Bank Accounts -->
            <div class="bank-info">
                <h3><i class="fas fa-university"></i> Rekening Tujuan</h3>

                <div class="bank-account">
                    <div class="bank-logo bca">BCA</div>
                    <div class="bank-detail">
                        <div class="bank-name">Bank BCA</div>
                        <div class="bank-number">1234567890</div>
                        <div class="bank-holder">a.n. VespaPartID</div>
                    </div>
                    <button class="btn-copy" onclick="copyText('1234567890')"><i class="fas fa-copy"></i> Salin</button>
                </div>

                <div class="bank-account">
                    <div class="bank-logo bri">BRI</div>
                    <div class="bank-detail">
                        <div class="bank-name">Bank BRI</div>
                        <div class="bank-number">0987654321</div>
                        <div class="bank-holder">a.n. VespaPartID</div>
                    </div>
                    <button class="btn-copy" onclick="copyText('0987654321')"><i class="fas fa-copy"></i> Salin</button>
                </div>

                <div class="bank-account">
                    <div class="bank-logo mandiri">MDR</div>
                    <div class="bank-detail">
                        <div class="bank-name">Bank Mandiri</div>
                        <div class="bank-number">1122334455</div>
                        <div class="bank-holder">a.n. VespaPartID</div>
                    </div>
                    <button class="btn-copy" onclick="copyText('1122334455')"><i class="fas fa-copy"></i> Salin</button>
                </div>
            </div>

            <?php if ($payment && $payment['status'] !== 'rejected'): ?>
                <div class="paid-notice">
                    <i class="fas fa-check-circle"></i>
                    <h3>Bukti Pembayaran Sudah Dikirim</h3>
                    <p>Pembayaran Anda sedang diverifikasi oleh admin. Mohon tunggu 1x24 jam.</p>
                    <a href="<?= base_url('payment/status/' . $order['nomor_order']) ?>" class="btn-link">
                        <i class="fas fa-eye"></i> Lihat Status Pembayaran
                    </a>
                </div>
            <?php else: ?>
                <!-- Payment Form -->
                <?php if ($payment && $payment['status'] === 'rejected'): ?>
                    <div class="alert alert-danger" style="margin-bottom: 1.5rem;">
                        <i class="fas fa-exclamation-triangle"></i>
                        Pembayaran sebelumnya ditolak. Silakan kirim ulang bukti transfer yang benar.
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('payment/store') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <input type="hidden" name="order_id" value="<?= $order['id'] ?>">

                    <div class="form-group">
                        <label>Nama Pengirim <span class="required">*</span></label>
                        <input type="text" name="nama_pengirim" class="form-control"
                               placeholder="Nama sesuai rekening pengirim"
                               value="<?= old('nama_pengirim', $order['nama_customer']) ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Bank Pengirim <span class="required">*</span></label>
                        <select name="bank_pengirim" class="form-control" required>
                            <option value="">— Pilih Bank —</option>
                            <option value="BCA" <?= old('bank_pengirim') === 'BCA' ? 'selected' : '' ?>>BCA</option>
                            <option value="BRI" <?= old('bank_pengirim') === 'BRI' ? 'selected' : '' ?>>BRI</option>
                            <option value="BNI" <?= old('bank_pengirim') === 'BNI' ? 'selected' : '' ?>>BNI</option>
                            <option value="Mandiri" <?= old('bank_pengirim') === 'Mandiri' ? 'selected' : '' ?>>Mandiri</option>
                            <option value="BSI" <?= old('bank_pengirim') === 'BSI' ? 'selected' : '' ?>>BSI</option>
                            <option value="CIMB Niaga" <?= old('bank_pengirim') === 'CIMB Niaga' ? 'selected' : '' ?>>CIMB Niaga</option>
                            <option value="Dana" <?= old('bank_pengirim') === 'Dana' ? 'selected' : '' ?>>Dana</option>
                            <option value="GoPay" <?= old('bank_pengirim') === 'GoPay' ? 'selected' : '' ?>>GoPay</option>
                            <option value="OVO" <?= old('bank_pengirim') === 'OVO' ? 'selected' : '' ?>>OVO</option>
                            <option value="Lainnya" <?= old('bank_pengirim') === 'Lainnya' ? 'selected' : '' ?>>Lainnya</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Jumlah Transfer <span class="required">*</span></label>
                        <input type="number" name="jumlah_transfer" class="form-control"
                               placeholder="Masukkan jumlah yang ditransfer"
                               value="<?= old('jumlah_transfer', $order['total_harga']) ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Bukti Transfer <span class="required">*</span></label>
                        <div class="file-upload" id="fileUploadArea">
                            <input type="file" name="bukti_transfer" id="buktiFile" accept="image/*" required>
                            <i class="fas fa-cloud-upload-alt"></i>
                            <p>Klik atau seret gambar bukti transfer ke sini</p>
                            <p style="font-size: 0.75rem; color: var(--gray-400);">JPG, PNG, WebP — Maks. 3MB</p>
                            <div class="file-name" id="fileName"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Catatan (opsional)</label>
                        <textarea name="catatan" class="form-control"
                                  placeholder="Catatan tambahan (contoh: transfer dari rekening bersama)"><?= old('catatan') ?></textarea>
                    </div>

                    <button type="submit" class="btn-submit-payment">
                        <i class="fas fa-paper-plane"></i> Kirim Bukti Pembayaran
                    </button>
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    // Copy to clipboard
    function copyText(text) {
        navigator.clipboard.writeText(text).then(() => {
            // Simple toast
            const toast = document.createElement('div');
            toast.textContent = '✅ Nomor rekening disalin!';
            toast.style.cssText = 'position:fixed;top:20px;right:20px;background:#065f46;color:white;padding:12px 24px;border-radius:8px;font-size:0.85rem;font-weight:600;z-index:9999;animation:slideDown 0.3s ease;';
            document.body.appendChild(toast);
            setTimeout(() => toast.remove(), 2000);
        });
    }

    // File upload preview
    document.getElementById('buktiFile')?.addEventListener('change', function() {
        const name = this.files[0]?.name;
        if (name) {
            document.getElementById('fileName').textContent = '📎 ' + name;
        }
    });
</script>
<?= $this->endSection() ?>
