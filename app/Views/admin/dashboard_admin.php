<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= base_url('assets/gambar/logo.png') ?>" type="image/x-icon">
    <title>Dashboard Admin - Sangatta Festival Run 2025</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Vendor CSS Files -->
    <link
      href="<?= base_url() ?>assets/assets/vendor/bootstrap/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="<?= base_url() ?>assets/assets/vendor/bootstrap-icons/bootstrap-icons.css"
      rel="stylesheet"
    />

    <!-- Template Main CSS File -->
    <link href="<?= base_url() ?>assets/assets/css/style.css" rel="stylesheet" />
    
  </head>

  <body style="background-color: white;">
    <header id="header" class="header fixed-top d-flex align-items-center" style="background-color:#FFD700;">
      <div class="d-flex align-items-center justify-content-between">
        <a href="#" class="logo d-flex align-items-center">
        <img src="<?= base_url('assets/gambar/logo.png') ?>" alt="Logo">
            <span class="d-none d-lg-block fw-bold"
                style="color:#003366;">
                    Festival Run 2025
            </span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
      </div>      
    </header>

    <aside id="sidebar" class="sidebar" style="background-color:#003366;"> 
    <!-- pink = #f72585 -->
    <!-- biru muda = #0095D9 -->
    <!-- biru tua = #003366 -->
    <!-- kuning = #FFD700 -->
      <ul class="sidebar-nav" id="sidebar-nav">
        
        <li class="nav-heading text-light">Menu</li>

        <li class="nav-item" >
          <a class="nav-link" style="background-color:#003366;" href="<?= site_url('/AdminController/index') ?>" >
            <i class="bi bi-grid text-light"></i>
            <span class="text-light">Dashboard</span>
          </a>
        </li>

        <li class="nav-item">
          <a
            class="nav-link collapsed " 
            style="background-color:#003366;"
            data-bs-target="#peserta-nav"
            data-bs-toggle="collapse"
            href="#"
          >
            <i class="bi bi-database-add text-light"></i><span class="text-light">Peserta</span
            ><i class="bi bi-chevron-down ms-auto text-light"></i>
          </a>
          <ul
            id="peserta-nav"
            class="nav-content collapse"
            data-bs-parent="#sidebar-nav"
          >
            <li>
              <a href="<?= base_url('AdminPesertaController/menunggu') ?>">
                <i class="bi bi-circle text-light"></i><span class="text-light">Mendaftar</span>
              </a>
            </li>                       
            <li>
              <a href="<?= base_url('AdminPesertaController/terkonfirmasi') ?>">
                <i class="bi bi-circle text-light"></i><span class="text-light">Terkonfirmasi</span>
              </a>
            </li>                       
          </ul>
        </li>


        <li class="nav-item">
          <a
            class="nav-link collapsed " 
            style="background-color:#003366;"
            data-bs-target="#ambilbaju-nav"
            data-bs-toggle="collapse"
            href="#"
          >
            <i class="bi bi-tags text-light"></i><span class="text-light">Pengambilan Baju</span
            ><i class="bi bi-chevron-down ms-auto text-light"></i>
          </a>
          <ul
            id="ambilbaju-nav"
            class="nav-content collapse"
            data-bs-parent="#sidebar-nav"
          >
            <li>
              <a href="../kelas/tampil_kelas.php">
                <i class="bi bi-circle text-light"></i><span class="text-light">Scan Kode QR</span>
              </a>
            </li>                       
            <li>
              <a href="../kelas/tampil_kelas.php">
                <i class="bi bi-circle text-light"></i><span class="text-light">Manual</span>
              </a>
            </li>                       
          </ul>
        </li>


        <li class="nav-item">
          <a
            class="nav-link collapsed " 
            style="background-color:#003366;"
            data-bs-target="#laporan-nav"
            data-bs-toggle="collapse"
            href="#"
          >
            <i class="bi bi-file-earmark-zip-fill text-light"></i><span class="text-light">Laporan</span
            ><i class="bi bi-chevron-down ms-auto text-light"></i>
          </a>
          <ul
            id="laporan-nav"
            class="nav-content collapse"
            data-bs-parent="#sidebar-nav"
          >
            <li>
              <a href="<?= base_url('LaporanController/terkonfirmasi') ?>">
                <i class="bi bi-circle text-light"></i><span class="text-light">Peserta Terkonfirmasi</span>
              </a>
            </li>                       
            <li>
              <a href="<?= base_url('LaporanController/sudahAmbilBaju') ?>">
                <i class="bi bi-circle text-light"></i><span class="text-light">Sudah Ambil Baju</span>
              </a>
            </li>                       
          </ul>
        </li>

        <li class="nav-heading text-light">sistem</li>

        <li class="nav-item">
          <a class="nav-link collapsed" style="background-color:#003366;" href="<?= base_url('LoginController/logout') ?>">
            <i class="bi bi-box-arrow-in-right text-light"></i>
            <span class="text-light">logout</span>
          </a>
        </li>
      </ul>
    </aside>

    <main id="main" class="main">

      <section class="section dashboard">
        <div class="row">

          <!-- Kategori Umum -->
          <div class="col-lg-6">
            <div class="card" style="border-top: 5px solid #0095D9;">
              <div class="card-body">
                <h5 class="card-title" style="color: #003366;">
                  <i class="bi bi-people-fill me-2" style="color: #0095D9;"></i>
                  Pendaftar Terbaru | <span style="color: #0095D9;">Umum</span>
                </h5>

                <?php if (!empty($terbaruUmum)) : ?>
                  <div class="table-responsive">
                    <table class="table table-stripped align-middle">
                      <thead class="">
                        <tr>
                          <th>#</th>
                          <th>Nama</th>
                          <th>Email</th>
                          <th>No. Telepon</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1;
                        foreach ($terbaruUmum as $peserta) : ?>
                          <tr>
                            <td><?= $no++ ?></td>
                            <td><?= esc($peserta['nama_peserta']) ?></td>
                            <td><?= esc($peserta['email']) ?></td>
                            <td><?= esc($peserta['no_telepon']) ?></td>
                            <td>
                              <span class="badge 
                                <?= $peserta['status_pendaftaran'] === 'Terkonfirmasi' ? 'bg-success' : 
                                    ($peserta['status_pendaftaran'] === 'Menunggu' ? 'bg-warning text-dark' : 'bg-danger') ?>">
                                <?= esc($peserta['status_pendaftaran']) ?>
                              </span>
                            </td>
                          </tr>
                        <?php endforeach ?>
                      </tbody>
                    </table>
                  </div>
                <?php else : ?>
                  <p class="text-muted">Belum ada pendaftar di kategori ini.</p>
                <?php endif; ?>
              </div>
            </div>
          </div>

          <!-- Kategori Pelajar -->
          <div class="col-lg-6">
            <div class="card" style="border-top: 5px solid #f72585;">
              <div class="card-body">
                <h5 class="card-title" style="color: #f72585;">
                  <i class="bi bi-mortarboard-fill me-2" style="color: #f72585;"></i>
                  Pendaftar Terbaru | <span style="color: #f72585;">Pelajar</span>
                </h5>

                <?php if (!empty($terbaruPelajar)) : ?>
                  <div class="table-responsive">
                    <table class="table table-hover align-middle">
                      <thead class="table-light">
                        <tr>
                          <th>#</th>
                          <th>Nama</th>
                          <th>Email</th>
                          <th>No. Telepon</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1;
                        foreach ($terbaruPelajar as $peserta) : ?>
                          <tr>
                            <td><?= $no++ ?></td>
                            <td><?= esc($peserta['nama_peserta']) ?></td>
                            <td><?= esc($peserta['email']) ?></td>
                            <td><?= esc($peserta['no_telepon']) ?></td>
                            <td>
                              <span class="badge 
                                <?= $peserta['status_pendaftaran'] === 'Terkonfirmasi' ? 'bg-success' : 
                                    ($peserta['status_pendaftaran'] === 'Menunggu' ? 'bg-warning text-dark' : 'bg-danger') ?>">
                                <?= esc($peserta['status_pendaftaran']) ?>
                              </span>
                            </td>
                          </tr>
                        <?php endforeach ?>
                      </tbody>
                    </table>
                  </div>
                <?php else : ?>
                  <p class="text-muted">Belum ada pendaftar di kategori ini.</p>
                <?php endif; ?>
              </div>
            </div>
          </div>

        </div>
      </section>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php if (session()->getFlashdata('success')) : ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: '<?= session()->getFlashdata('success'); ?>',
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    <?php endif; ?>

    <!-- Vendor JS Files -->
    <script src="<?= base_url() ?>assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url() ?>assets/assets/js/main.js"></script>
  </body>
</html>
