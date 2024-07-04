<?= $this->extend('dashboard/halaman'); ?>

<?= $this->section('konten'); ?>

<div class="comtainer">


  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <!-- <h1 class="h3 mb-0 text-gray-800">Dashboard</h1> -->
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                jumlah siswa</div>

              <!-- tolong rubah agar menampilkan jumlah siswa -->
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahsiswa; ?></div>


            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                Jumlah Guru</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">20</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Ruangan
              </div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">15</div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Content Row -->

  <div class="row">
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">NIS</th>
                <!-- <th scope="col">Foto</th> -->
                <th scope="col">Nama Siswa</th>
                <th scope="col">Kelas</th>

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
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<?= $this->endSection(); ?>