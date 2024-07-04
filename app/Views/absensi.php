<?= $this->extend('dashboard/halaman'); ?>

<?= $this->section('konten'); ?>

<div class="container mt-5">
  <?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success">
      <?= session()->getFlashdata('success'); ?>
    </div>
  <?php elseif (session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger">
      <?= session()->getFlashdata('error'); ?>
    </div>
  <?php endif; ?>

  <div class="row">
    <!-- Mengambil Gambar -->
    <div class="col-md-6">
      <div class="card" style="width: 18rem;">
        <div class="card-img-top" id="cameraContainer">
          <video id="camera" width="320" height="240" autoplay style="width: 100%;"></video>
          <canvas id="photoCanvas" width="320" height="240" style="display: none;"></canvas>
        </div>
        <div class="card-body">
          <h5 class="card-title">Absensi Siswa</h5>
          <form id="attendanceForm" action="<?= base_url('home/save_attendance') ?>" method="POST">
            <div class="form-group">
              <label for="name">Nama Siswa:</label>
              <input type="text" id="name" name="name" class="form-control" required>
              <label for="kelas">Kelas:</label>
              <input type="text" id="kelas" name="kelas" class="form-control" required>
            </div>
            <input type="hidden" id="photoData" name="photoData">
            <button type="button" id="captureButton" class="btn btn-secondary">Ambil Foto</button>
          </form>
        </div>
      </div>
    </div>

    <!-- Menampilkan Hasil Gambar -->
    <div class="col-md-6">
      <div class="card" style="width: 18rem;">
        <img id="capturedPhoto" src="data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=" class="card-img-top" alt="Hasil foto akan muncul di sini" style="background-color: #000;">
        <div class="card-body">
          <p class="card-text" id="studentInfo">Nama: -<br>Kelas: -</p>
        </div>
        <button type="submit" form="attendanceForm" class="btn btn-primary mt-2">Absen</button>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>
