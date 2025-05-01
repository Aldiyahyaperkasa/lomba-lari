<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= base_url('assets/gambar/logo.png') ?>" type="image/x-icon">
    <title>Sangatta Festival Run 2025</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <!-- AOS Animate on Scroll -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

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

    <!-- chart -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


  </head>

  <body style="background-color: white;">
    <header id="header" class="header fixed-top d-flex align-items-center" style="background-color:#FFD700;">
      <div class="d-flex align-items-center justify-content-between">
        <a href="#" class="logo d-flex align-items-center">
        <img src="<?= base_url('assets/gambar/logo.png') ?>" alt="Logo">
            <span class="d-none d-lg-block fw-bold"
                style="color:#000;">
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
          <a class="nav-link" style="background-color:#003366;" href="../admin/admin_dashboard.php">
            <i class="bi bi-grid text-light"></i>
            <span class="text-light">Dashboard</span>
          </a>
        </li>

        <li class="nav-item">
          <a
            class="nav-link collapsed " 
            style="background-color:#003366;"
            data-bs-target="#datamaster-nav"
            data-bs-toggle="collapse"
            href="#"
          >
            <i class="bi bi-database-add text-light"></i><span class="text-light">Data Master</span
            ><i class="bi bi-chevron-down ms-auto text-light"></i>
          </a>
          <ul
            id="datamaster-nav"
            class="nav-content collapse"
            data-bs-parent="#sidebar-nav"
          >
            <li>
              <a href="../kelas/tampil_kelas.php">
                <i class="bi bi-circle text-light"></i><span class="text-light">Kelas</span>
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
      <div class="pagetitle">
        <h1 class="text-center">SELAMAT DATANG, ADMIN</h1>
        <h1>Dashboard</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="admin_dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </nav>
      </div>
      <!-- End Page Title -->

      <section class="section dashboard">
        <div class="row">          
          <div class="col-xxl-4 col-md-4">
            <div class="card info-card sales-card">                  
              <div class="card-body">
                <h5 class="card-title">Jumlah Siswa</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person-circle"></i>
                    </div>
                    <div class="ps-3">
                    </div>
                  </div>
              </div>
            </div>
          </div>          
          <div class="col-xxl-4 col-md-4">
            <div class="card info-card sales-card">                  
              <div class="card-body">
                <h5 class="card-title">Siswa Laki-laki</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person-circle"></i>
                    </div>
                    <div class="ps-3">
                    </div>
                  </div>
              </div>
            </div>
          </div>          
          <div class="col-xxl-4 col-md-4">
            <div class="card info-card sales-card">                  
              <div class="card-body">
                <h5 class="card-title">Siswa Perempuan</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person-circle"></i>
                    </div>
                    <div class="ps-3">
                    </div>
                  </div>
              </div>
            </div>
          </div>                               
        </div>
      </section>
    </main>


    <footer id="footer" class="footer">
      <div class="copyright">
        &copy; Copyright <strong><span>NiceAdmin</span></strong
        >. All Rights Reserved
      </div>      
    </footer>

    <!-- Vendor JS Files -->



    <script src="<?= base_url() ?>assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url() ?>assets/assets/js/main.js"></script>
  </body>
</html>
