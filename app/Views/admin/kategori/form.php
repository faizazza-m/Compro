<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-<?= isset($category) ? 'edit' : 'plus' ?> mr-2"></i>
                    <?= isset($category) ? 'Edit Kategori' : 'Tambah Kategori Baru' ?>
                </h3>
            </div>
            <form action="<?= isset($category) ? base_url('admin/kategori/update/' . $category['id']) : base_url('admin/kategori/store') ?>" method="post">
                <?= csrf_field() ?>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_kategori">Nama Kategori <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori"
                               placeholder="Masukkan nama kategori"
                               value="<?= old('nama_kategori', $category['nama_kategori'] ?? '') ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4"
                                  placeholder="Deskripsi kategori (opsional)"><?= old('deskripsi', $category['deskripsi'] ?? '') ?></textarea>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save mr-1"></i> <?= isset($category) ? 'Update' : 'Simpan' ?>
                    </button>
                    <a href="<?= base_url('admin/kategori') ?>" class="btn btn-secondary">
                        <i class="fas fa-arrow-left mr-1"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
