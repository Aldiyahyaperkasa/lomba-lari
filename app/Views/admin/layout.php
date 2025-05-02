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
              <a href="../kelas/tampil_kelas.php">
                <i class="bi bi-circle text-light"></i><span class="text-light">Peserta Terkonfirmasi</span>
              </a>
            </li>                       
            <li>
              <a href="../kelas/tampil_kelas.php">
                <i class="bi bi-circle text-light"></i><span class="text-light">Sudah Ambil Baju</span>
              </a>
            </li>                       
          </ul>
        </li>

        <li class="nav-heading text-light">sistem</li>

        <li class="nav-item">
          <a class="nav-link collapsed" style="background-color:#003366;" href="../login.php">
            <i class="bi bi-box-arrow-in-right text-light"></i>
            <span class="text-light">logout</span>
          </a>
        </li>
      </ul>
    </aside>

    <main id="main" class="main">

    <section class="section dashboard">
        <div class="row">
            <?= $this->renderSection('content'); ?>
        </div>
    </section>

      
    </main>

    <!-- Vendor JS Files -->
    <script src="<?= base_url() ?>assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url() ?>assets/assets/js/main.js"></script>
  </body>
</html>
