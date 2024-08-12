<?= $this->extend('dashboard/halaman'); ?>

<?= $this->section('konten'); ?>

<?php if (session()->getFlashdata('success')) : ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <?= session()->getFlashdata('success'); ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php elseif (session()->getFlashdata('error')) : ?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <?= session()->getFlashdata('error'); ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php endif; ?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-5">
      <form action="/save_siswa" method="post">
        <?= csrf_field(); ?>
        <div class="mb-3">
          <label for="nis" class="form-label">NIS</label>
          <input type="text" class="form-control" id="nis" name="nis" value="<?= old('nis'); ?>" required>
          <?php if (isset($validation) && $validation->hasError('nis')) : ?>
            <div class="text-danger"><?= $validation->getError('nis'); ?></div>
          <?php endif; ?>
        </div>
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Siswa</label>
          <input type="text" class="form-control" id="nama" name="nama" value="<?= old('nama'); ?>" required>
          <?php if (isset($validation) && $validation->hasError('nama')) : ?>
            <div class="text-danger"><?= $validation->getError('nama'); ?></div>
          <?php endif; ?>
        </div>
        <div class="mb-3">
          <label for="kelas" class="form-label">Kelas</label>
          <select class="form-select" id="kelas" name="kelas" required>
            <option value="">Pilih Kelas</option>
            <option value="Kelas 7 A" <?= old('kelas') == 'Kelas 7 A' ? 'selected' : ''; ?>>Kelas 7 A</option>
            <option value="Kelas 7 B" <?= old('kelas') == 'Kelas 7 B' ? 'selected' : ''; ?>>Kelas 7 B</option>
            <option value="Kelas 7 C" <?= old('kelas') == 'Kelas 7 C' ? 'selected' : ''; ?>>Kelas 7 C</option>
            <option value="Kelas 8 A" <?= old('kelas') == 'Kelas 8 A' ? 'selected' : ''; ?>>Kelas 8 A</option>
            <option value="Kelas 8 B" <?= old('kelas') == 'Kelas 8 B' ? 'selected' : ''; ?>>Kelas 8 B</option>
            <option value="Kelas 8 C" <?= old('kelas') == 'Kelas 8 C' ? 'selected' : ''; ?>>Kelas 8 C</option>
            <option value="Kelas 9 A" <?= old('kelas') == 'Kelas 9 A' ? 'selected' : ''; ?>>Kelas 9 A</option>
            <option value="Kelas 9 B" <?= old('kelas') == 'Kelas 9 B' ? 'selected' : ''; ?>>Kelas 9 B</option>
            <option value="Kelas 9 C" <?= old('kelas') == 'Kelas 9 C' ? 'selected' : ''; ?>>Kelas 9 C</option>
          </select>
          <?php if (isset($validation) && $validation->hasError('kelas')) : ?>
            <div class="text-danger"><?= $validation->getError('kelas'); ?></div>
          <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Siswa</button>
      </form>
    </div>
  </div>
</div>

<!-- Add Bootstrap JS if not included -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?= $this->endSection(); ?>
