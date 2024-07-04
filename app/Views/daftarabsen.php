<?= $this->extend('dashboard/halaman'); ?>

<?= $this->section('konten'); ?>

<div class="container">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Foto</th>
        <th scope="col">Nama</th>
        <th scope="col">Kelas</th>
        <th scope="col">Jam</th>
        <th scope="col">Tanggal</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($absen as $index => $b) : ?>
        <tr>
          <th scope="row"><?= $index + 1; ?></th>
          <td><img src="<?= base_url('images/' . $b['foto']); ?>" alt="Foto Siswa" width="100" height="100"></td>
          <td><?= $b['name']; ?></td>
          <td><?= $b['kelas']; ?></td>
          <td><?= date('H:i:s', strtotime($b['created_at'])); ?></td>
          <td><?= date('d-m-Y', strtotime($b['created_at'])); ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?= $this->endSection(); ?>