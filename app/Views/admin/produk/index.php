<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-box mr-2"></i>Daftar Produk</h3>
        <div class="card-tools">
            <a href="<?= base_url('admin/produk/create') ?>" class="btn btn-primary btn-sm">
                <i class="fas fa-plus mr-1"></i> Tambah Produk
            </a>
        </div>
    </div>
    <div class="card-body">
        <table id="produkTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th width="8%">Gambar</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Status</th>
                    <th width="15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $i => $product): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td>
                        <?php if ($product['gambar'] && file_exists(FCPATH . 'uploads/products/' . $product['gambar'])): ?>
                            <img src="<?= base_url('uploads/products/' . $product['gambar']) ?>" alt="" style="width: 50px; height: 50px; object-fit: cover; border-radius: 6px;">
                        <?php else: ?>
                            <div style="width: 50px; height: 50px; background: #f0f0f0; border-radius: 6px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-image text-muted"></i>
                            </div>
                        <?php endif; ?>
                    </td>
                    <td><strong><?= esc($product['nama_produk']) ?></strong></td>
                    <td><span class="badge badge-info"><?= esc($product['nama_kategori']) ?></span></td>
                    <td>Rp <?= number_format($product['harga'], 0, ',', '.') ?></td>
                    <td>
                        <?php if ($product['stok'] > 0): ?>
                            <span class="badge badge-success"><?= $product['stok'] ?></span>
                        <?php else: ?>
                            <span class="badge badge-danger">Habis</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if ($product['status'] === 'aktif'): ?>
                            <span class="badge badge-success">Aktif</span>
                        <?php else: ?>
                            <span class="badge badge-secondary">Nonaktif</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?= base_url('admin/produk/edit/' . $product['id']) ?>" class="btn btn-warning btn-sm" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="<?= base_url('admin/produk/delete/' . $product['id']) ?>" method="post" style="display: inline;" onsubmit="return confirm('Yakin hapus produk ini?')">
                            <?= csrf_field() ?>
                            <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
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
        $('#produkTable').DataTable({
            responsive: true,
            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ data",
                info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
                emptyTable: "Belum ada data produk",
                zeroRecords: "Data tidak ditemukan",
                paginate: { previous: "Sebelumnya", next: "Selanjutnya" }
            }
        });
    });
</script>
<?= $this->endSection() ?>
