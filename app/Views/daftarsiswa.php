<?= $this->extend('dashboard/halaman'); ?>

<?= $this->section('konten'); ?>

<div class="container">

  <div class="row">
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">NIS</th>
                <th scope="col">Foto</th>
                <th scope="col">Nama Siswa</th>
                <th scope="col">Kelas</th>
                <th scope="col">Aksi</th>

              </tr>
            </thead>
            <tbody>
              <?php foreach ($daftar as $d) : ?>
                <tr>
                  <th scope="row"><?= $index + 1; ?></th>
                  <td><?= $d['nis']; ?></td>
                  <td><?= $d['foto']; ?></td>
                  <td><?= $d['nama']; ?></td>
                  <td><?= $d['kelas']; ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>



<?= $this->endSection(); ?>