<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-tags mr-2"></i>Daftar Kategori Produk</h3>
        <div class="card-tools">
            <a href="<?= base_url('admin/kategori/create') ?>" class="btn btn-primary btn-sm">
                <i class="fas fa-plus mr-1"></i> Tambah Kategori
            </a>
        </div>
    </div>
    <div class="card-body">
        <table id="kategoriTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th>Nama Kategori</th>
                    <th>Slug</th>
                    <th>Deskripsi</th>
                    <th width="10%">Produk</th>
                    <th width="15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $i => $cat): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><strong><?= esc($cat['nama_kategori']) ?></strong></td>
                    <td><code><?= esc($cat['slug']) ?></code></td>
                    <td><?= esc($cat['deskripsi'] ?? '-') ?></td>
                    <td><span class="badge badge-info"><?= $cat['total_produk'] ?? 0 ?></span></td>
                    <td>
                        <a href="<?= base_url('admin/kategori/edit/' . $cat['id']) ?>" class="btn btn-warning btn-sm" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="<?= base_url('admin/kategori/delete/' . $cat['id']) ?>" method="post" style="display: inline;" onsubmit="return confirm('Yakin hapus kategori ini?')">
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
        $('#kategoriTable').DataTable({
            responsive: true,
            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ data",
                info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
                emptyTable: "Belum ada data kategori",
                zeroRecords: "Data tidak ditemukan",
                paginate: { previous: "Sebelumnya", next: "Selanjutnya" }
            }
        });
    });
</script>
<?= $this->endSection() ?>
