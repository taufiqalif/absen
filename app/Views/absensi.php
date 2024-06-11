<?= $this->extend('dashboard/halaman'); ?>

<?= $this->section('konten'); ?>


<div class="container">
  <h1>Absen Siswa</h1>
  <form id="attendanceForm" action="save_attendance.php" method="POST" enctype="multipart/form-data">
    <label for="name">Nama Siswa:</label>
    <input type="text" id="name" name="name" required>
    <div id="cameraContainer">
      <video id="camera" width="320" height="240" autoplay></video>
      <button type="button" id="captureButton">Capture Photo</button>
      <canvas id="photoCanvas" width="320" height="240" style="display: none;"></canvas>
    </div>
    <input type="hidden" id="photoData" name="photoData">
    <button type="submit">Submit Attendance</button>
  </form>
</div>






<?= $this->endSection(); ?>