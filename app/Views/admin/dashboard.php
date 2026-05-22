<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?= $totalProduk ?></h3>
                <p>Total Produk</p>
            </div>
            <div class="icon">
                <i class="fas fa-box"></i>
            </div>
            <a href="<?= base_url('admin/produk') ?>" class="small-box-footer">
                Lihat Produk <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3><?= $totalOrder ?></h3>
                <p>Total Pesanan</p>
            </div>
            <div class="icon">
                <i class="fas fa-shopping-cart"></i>
            </div>
            <a href="<?= base_url('admin/pesanan') ?>" class="small-box-footer">
                Lihat Pesanan <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3><?= $orderPending ?></h3>
                <p>Pesanan Pending</p>
            </div>
            <div class="icon">
                <i class="fas fa-clock"></i>
            </div>
            <a href="<?= base_url('admin/pesanan?status=pending') ?>" class="small-box-footer">
                Lihat Pending <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3><?= $totalKategori ?></h3>
                <p>Kategori</p>
            </div>
            <div class="icon">
                <i class="fas fa-tags"></i>
            </div>
            <a href="<?= base_url('admin/kategori') ?>" class="small-box-footer">
                Lihat Kategori <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>

<!-- Stats Row -->
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-list mr-2"></i>Pesanan Terbaru
                </h3>
                <div class="card-tools">
                    <a href="<?= base_url('admin/pesanan') ?>" class="btn btn-tool">
                        Lihat Semua <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No. Order</th>
                            <th>Customer</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($recentOrders)): ?>
                            <tr><td colspan="5" class="text-center text-muted py-4">Belum ada pesanan</td></tr>
                        <?php else: ?>
                            <?php foreach ($recentOrders as $order): ?>
                            <tr>
                                <td>
                                    <a href="<?= base_url('admin/pesanan/detail/' . $order['id']) ?>">
                                        <strong><?= esc($order['nomor_order']) ?></strong>
                                    </a>
                                </td>
                                <td><?= esc($order['nama_customer']) ?></td>
                                <td>Rp <?= number_format($order['total_harga'], 0, ',', '.') ?></td>
                                <td>
                                    <span class="badge badge-<?= $order['status'] ?>">
                                        <?= ucfirst($order['status']) ?>
                                    </span>
                                </td>
                                <td><?= date('d/m/Y H:i', strtotime($order['created_at'])) ?></td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-chart-pie mr-2"></i>Ringkasan Pesanan
                </h3>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span><i class="fas fa-circle text-warning mr-2"></i>Pending</span>
                    <span class="badge badge-warning"><?= $orderPending ?></span>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span><i class="fas fa-circle text-primary mr-2"></i>Diproses</span>
                    <span class="badge badge-primary"><?= $orderDiproses ?></span>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span><i class="fas fa-circle text-success mr-2"></i>Selesai</span>
                    <span class="badge badge-success"><?= $orderSelesai ?></span>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-circle text-danger mr-2"></i>Batal</span>
                    <span class="badge badge-danger"><?= $orderBatal ?></span>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-info-circle mr-2"></i>Info Login
                </h3>
            </div>
            <div class="card-body">
                <p class="mb-1"><strong>Username:</strong> <?= session()->get('username') ?></p>
                <p class="mb-1"><strong>Email:</strong> <?= session()->get('email') ?></p>
                <p class="mb-0"><strong>Role:</strong> <?= ucfirst(session()->get('role')) ?></p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
