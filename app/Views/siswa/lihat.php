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
      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title"><?= esc($student['nama']); ?></h5>
          <h6 class="card-subtitle mb-2 text-muted"><?= esc($student['kelas']); ?></h6>
          <p class="card-text">NIS: <?= esc($student['nis']); ?></p>
          <!-- You can add more details here if needed -->
          <a href="/siswa" class="card-link">Back to List</a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Add Bootstrap JS if not included -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?= $this->endSection(); ?>