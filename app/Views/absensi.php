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
              <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                  Pilih Kelas
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" id="kelasDropdown">
                  <li><a class="dropdown-item" href="#" data-value="Kelas 7 A">Kelas 7 A</a></li>
                  <li><a class="dropdown-item" href="#" data-value="Kelas 7 B">Kelas 7 B</a></li>
                  <li><a class="dropdown-item" href="#" data-value="Kelas 7 C">Kelas 7 C</a></li>
                  <li><a class="dropdown-item" href="#" data-value="Kelas 8 A">Kelas 8 A</a></li>
                  <li><a class="dropdown-item" href="#" data-value="Kelas 8 B">Kelas 8 B</a></li>
                  <li><a class="dropdown-item" href="#" data-value="Kelas 8 C">Kelas 8 C</a></li>
                  <li><a class="dropdown-item" href="#" data-value="Kelas 9 A">Kelas 9 A</a></li>
                  <li><a class="dropdown-item" href="#" data-value="Kelas 9 B">Kelas 9 B</a></li>
                  <li><a class="dropdown-item" href="#" data-value="Kelas 9 C">Kelas 9 C</a></li>
                </ul>
              </div>
              <input type="hidden" id="kelas" name="kelas">
            </div>
            <input type="hidden" id="photoData" name="photoData">
            <button type="button" id="captureButton" class="btn btn-secondary mt-2">Ambil Foto</button>
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