<?= $this->extend('dashboard/halaman'); ?>

<?= $this->section('konten'); ?>

<div class="container">

  <div class="row">
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <div class="mb-3">
            <a href="" class="btn btn-primary">Tambah Siswa</a>
          </div>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">NIS</th>
                <!-- <th scope="col">Foto</th> -->
                <th scope="col">Nama Siswa</th>
                <th scope="col">Kelas</th>
                <th scope="col">Aksi</th>

              </tr>
            </thead>
            <tbody>
              <?php foreach ($daftar as $index => $d) : ?>
                <tr>
                  <th scope="row"><?= $index + 1; ?></th>
                  <td><?= $d['nis']; ?></td>
                  <!-- <td><img src="<?= base_url('images/' . $d['foto']); ?>" alt="Foto Siswa" width="50" height="50"></td> -->
                  <td><?= $d['nama']; ?></td>
                  <td><?= $d['kelas']; ?></td>
                  <td>
                    <a href="" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                    <a href="" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></a></a>
                  </td>
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