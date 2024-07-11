<?= $this->extend('dashboard/halaman'); ?>

<?= $this->section('konten'); ?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-5">
      <form action="/register/submit" method="post">
        <div class="mb-3">
          <label for="role" class="form-label">Role</label>
          <select class="form-select" id="role" name="role" required>
            <option value="admin">Admin</option>
            <option value="siswa">Siswa</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="nisn" class="form-label">NISN</label>
          <input type="text" class="form-control" id="nisn" name="nisn" required>
        </div>
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Siswa</label>
          <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="mb-3">
          <label for="kelas" class="form-label">Kelas</label>
          <select class="form-select" id="kelas" name="kelas" required>
            <option value="Kelas 7 A">Kelas 7 A</option>
            <option value="Kelas 7 B">Kelas 7 B</option>
            <option value="Kelas 7 C">Kelas 7 C</option>
            <option value="Kelas 8 A">Kelas 8 A</option>
            <option value="Kelas 8 B">Kelas 8 B</option>
            <option value="Kelas 8 C">Kelas 8 C</option>
            <option value="Kelas 9 A">Kelas 9 A</option>
            <option value="Kelas 9 B">Kelas 9 B</option>
            <option value="Kelas 9 C">Kelas 9 C</option>
            <option value="Admin">Admin</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3">
          <label for="confirm_password" class="form-label">Confirm Password</label>
          <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
        </div>
        <button type="submit" class="btn btn-primary">Daftar</button>
      </form>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>