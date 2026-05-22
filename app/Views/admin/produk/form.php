<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-<?= isset($product) ? 'edit' : 'plus' ?> mr-2"></i>
                    <?= isset($product) ? 'Edit Produk' : 'Tambah Produk Baru' ?>
                </h3>
            </div>
            <form action="<?= isset($product) ? base_url('admin/produk/update/' . $product['id']) : base_url('admin/produk/store') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_produk">Nama Produk <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                               placeholder="Masukkan nama produk"
                               value="<?= old('nama_produk', $product['nama_produk'] ?? '') ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="category_id">Kategori <span class="text-danger">*</span></label>
                        <select class="form-control" id="category_id" name="category_id" required>
                            <option value="">-- Pilih Kategori --</option>
                            <?php foreach ($categories as $cat): ?>
                                <option value="<?= $cat['id'] ?>" <?= old('category_id', $product['category_id'] ?? '') == $cat['id'] ? 'selected' : '' ?>>
                                    <?= esc($cat['nama_kategori']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="harga">Harga (Rp) <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="harga" name="harga"
                                       placeholder="0"
                                       value="<?= old('harga', $product['harga'] ?? '') ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="stok">Stok <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="stok" name="stok"
                                       placeholder="0"
                                       value="<?= old('stok', $product['stok'] ?? '') ?>" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5"
                                  placeholder="Deskripsi produk"><?= old('deskripsi', $product['deskripsi'] ?? '') ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="gambar">Gambar Produk</label>
                        <?php if (isset($product) && $product['gambar'] && file_exists(FCPATH . 'uploads/products/' . $product['gambar'])): ?>
                            <div class="mb-2">
                                <img src="<?= base_url('uploads/products/' . $product['gambar']) ?>" alt="" style="max-width: 200px; border-radius: 8px;">
                                <p class="text-muted small mt-1">Gambar saat ini</p>
                            </div>
                        <?php endif; ?>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="gambar" name="gambar" accept="image/*">
                            <label class="custom-file-label" for="gambar">Pilih gambar...</label>
                        </div>
                        <small class="text-muted">Format: JPG, PNG, WebP. Maks: 2MB</small>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="aktif" <?= old('status', $product['status'] ?? 'aktif') == 'aktif' ? 'selected' : '' ?>>Aktif</option>
                            <option value="nonaktif" <?= old('status', $product['status'] ?? '') == 'nonaktif' ? 'selected' : '' ?>>Nonaktif</option>
                        </select>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save mr-1"></i> <?= isset($product) ? 'Update' : 'Simpan' ?>
                    </button>
                    <a href="<?= base_url('admin/produk') ?>" class="btn btn-secondary">
                        <i class="fas fa-arrow-left mr-1"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    // Show selected filename
    document.getElementById('gambar').addEventListener('change', function(e) {
        var fileName = e.target.files[0] ? e.target.files[0].name : 'Pilih gambar...';
        e.target.nextElementSibling.textContent = fileName;
    });
</script>
<?= $this->endSection() ?>
