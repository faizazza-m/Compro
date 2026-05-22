<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<!-- Status Filter -->
<div class="mb-3">
    <div class="btn-group">
        <a href="<?= base_url('admin/pesanan') ?>" class="btn btn-<?= !$currentStatus ? 'primary' : 'outline-primary' ?> btn-sm">
            Semua
        </a>
        <a href="<?= base_url('admin/pesanan?status=pending') ?>" class="btn btn-<?= $currentStatus === 'pending' ? 'warning' : 'outline-warning' ?> btn-sm">
            <i class="fas fa-clock mr-1"></i> Pending
        </a>
        <a href="<?= base_url('admin/pesanan?status=diproses') ?>" class="btn btn-<?= $currentStatus === 'diproses' ? 'info' : 'outline-info' ?> btn-sm">
            <i class="fas fa-spinner mr-1"></i> Diproses
        </a>
        <a href="<?= base_url('admin/pesanan?status=selesai') ?>" class="btn btn-<?= $currentStatus === 'selesai' ? 'success' : 'outline-success' ?> btn-sm">
            <i class="fas fa-check mr-1"></i> Selesai
        </a>
        <a href="<?= base_url('admin/pesanan?status=batal') ?>" class="btn btn-<?= $currentStatus === 'batal' ? 'danger' : 'outline-danger' ?> btn-sm">
            <i class="fas fa-times mr-1"></i> Batal
        </a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-shopping-cart mr-2"></i>Daftar Pesanan</h3>
    </div>
    <div class="card-body">
        <table id="orderTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th>No. Order</th>
                    <th>Customer</th>
                    <th>WhatsApp</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th width="10%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $i => $order): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><strong><?= esc($order['nomor_order']) ?></strong></td>
                    <td><?= esc($order['nama_customer']) ?></td>
                    <td>
                        <a href="https://wa.me/<?= preg_replace('/^0/', '62', $order['no_whatsapp']) ?>" target="_blank" class="text-success">
                            <i class="fab fa-whatsapp"></i> <?= esc($order['no_whatsapp']) ?>
                        </a>
                    </td>
                    <td>Rp <?= number_format($order['total_harga'], 0, ',', '.') ?></td>
                    <td>
                        <span class="badge badge-<?= $order['status'] ?>">
                            <?= ucfirst($order['status']) ?>
                        </span>
                    </td>
                    <td><?= date('d/m/Y H:i', strtotime($order['created_at'])) ?></td>
                    <td>
                        <a href="<?= base_url('admin/pesanan/detail/' . $order['id']) ?>" class="btn btn-info btn-sm" title="Detail">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    $(function() {
        $('#orderTable').DataTable({
            responsive: true,
            order: [[6, 'desc']],
            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ data",
                info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
                emptyTable: "Belum ada pesanan",
                zeroRecords: "Data tidak ditemukan",
                paginate: { previous: "Sebelumnya", next: "Selanjutnya" }
            }
        });
    });
</script>
<?= $this->endSection() ?>
