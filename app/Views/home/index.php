<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= base_url('assets/gambar/logo.png') ?>" type="image/x-icon">
    <title>Sangatta Festival Run 2025</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">


    <!-- AOS Animate on Scroll -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
        }

        .navbar {
            transition: background-color 0.3s ease;
            background-color: transparent;
        }

        .navbar-brand, .navbar-nav .nav-link {
            color: #000 !important;
            font-weight: 500;
        }

        .nav-link:hover {
            color: #f72585 !important;
        }

        .navbar.navbar-scrolled {
            background-color: #fff !important;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .navbar.navbar-scrolled .navbar-brand,
        .navbar.navbar-scrolled .nav-link {
            color: #0095D9 !important;
        }

        .navbar.navbar-scrolled .navbar-brand,
        .navbar.navbar-scrolled .nav-link:hover {
            color: #f72585 !important;
        }

        .btn-login {
            background-color: #f72585;
            color: #fff;
            font-weight: 600;
        }

        .btn-login:hover {
            background-color: transparent;
            color:  #FFD700;
            border: 3px solid #FFD700;
        }

        .hero {
            background: url("<?= base_url('assets/gambar/banner-memanjang.png') ?>") center center / cover no-repeat;
            color: white;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            text-align: center;
        }

        .hero::after {
            content: "";
            position: absolute;
            top: 0; left: 0;
            width: 100%;
            height: 100%;
            /* background: linear-gradient(to bottom right, #001F3F, #003366); */
            background: rgba(0, 0, 0, 0.7);
        }

        .hero .container {
            position: relative;
            z-index: 1;
        }

        .hero h1 {
            font-size: 2rem;
            font-weight: bold;
            color: white;
            text-shadow: 2px 2px 5px #000;
        }
        .hero p {
            font-size: 1rem;
            color: #fff;
        }

        .btn-cta {
            background: #FFD700;
            color: #3a0ca3;
            border-radius: 30px;
            padding: 12px 30px;
            font-weight: 600;
            border: none;
            transition: 0.3s;
        }

        .btn-cta:hover {
            background: #f72585;
            color: white;
        }

        section {
            padding: 80px 0;
        }

        table {
            background: white;
            border-radius: 10px;
            overflow: hidden;
        }

        th {
            background: #007bff !important;
            color: #fff;
        }
        
        .color-span {
            color: #f72585;            
        }

        .text-gradient {
            color: #007bff;

        }

        .juknis-card {
            border: 2px solid transparent;
            border-radius: 15px;
            background: #f8f9fa;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .juknis-card:hover {
            border-color: #003366;
            background: linear-gradient(135deg, #ffffff, #f0f8ff);
            transform: translateY(-4px);
        }

        .icon-circle {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }

        .text-primary { color: #003366 !important; }
        .bg-primary { background-color: #003366 !important; }

        .text-pink { color: #f72585 !important; }
        .bg-pink { background-color: #f72585 !important; }

        .text-warning { color: #FFD700 !important; }
        .bg-warning { background-color: #FFD700 !important; }


        .footer-banner {
          background: url('<?= base_url('assets/gambar/banner-memanjang.png') ?>') no-repeat center center;
          background-size: cover;
          position: relative;
          color: white;
        }

        .footer-banner::before {
          content: "";
          position: absolute;
          inset: 0;
          background-color: rgba(0, 0, 0, 0.8); /* overlay gelap */
          z-index: 1;
        }

        .footer-banner .footer-content {
          position: relative;
          z-index: 2;
        }

        footer a {
            color: #fff;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg fixed-top bg-light">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="#">
          <img src="<?= base_url('assets/gambar/logo.png') ?>" alt="Logo" width="60" class="me-2">
          <!-- Sangatta Festival Run 2025 -->
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link fw-bold" href="#home">Home</a></li>
          <li class="nav-item"><a class="nav-link fw-bold" href="#tentang">Tentang</a></li>
          <li class="nav-item"><a class="nav-link fw-bold" href="#peserta">Peserta</a></li>
          <li class="nav-item"><a class="nav-link fw-bold" href="#juknis">Juknis</a></li>
          <a class="btn btn-login ms-2" href="<?= base_url('LoginController'); ?>">
              <i class="bi bi-box-arrow-in-right me-1"></i> Daftar/Login
          </a>

        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero -->
  <section class="hero" id="home">
    <div class="container" >
      <h1 data-aos="fade-left">Ayo rasakan dan meriahkan sensasi berlari di Sangatta Festival Run 2025</h1>
      <p data-aos="fade-right">Salah satu event fun run terbesar di sangatta yang banyak menghadirkan konsep yang berbeda</p>
      <a href="#juknis" class="btn btn-cta mt-3" data-aos="fade-up">Informasi Detail</a>
    </div>
  </section>

  <!-- Tentang -->
  <section id="tentang" class="bg-white">
    <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="col-md-6 text-center" data-aos="">
          <img src="<?= base_url() ?>assets/gambar/maskot.png" alt="Lomba" class="img-fluid rounded w-50">
        </div>
        <div class="col-md-6 mt-4 mt-md-0" data-aos="">
          <h2 class="display-5 fw-bold" style="color:#007bff;">Tentang Sangatta <span class="color-span">Festival Run</span></h2>
          <p>Salah satu event fun run terbesar yang di adakan di kota sangatta di tahun 2025, yang di buka untuk seluruh masyarakat kalimantan timur. Dengan jalur yang menantang dengan pengalaman yang tak terlupakan. Sangatta festival run 2025 banyak menghadirkan konsep yang berbeda dan pastinya seru untuk di ikuti para pecinta lari untuk merasakan sensasi lari dengan penuh warna.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Peserta -->
  <section id="peserta" class="bg-white py-5">
    <div class="container">
      <h2 class="text-center mb-4 display-5 fw-bold" style="color:#007bff;" data-aos="fade-down">
        Peserta <span class="color-span">Terkonfirmasi</span>
      </h2>

      <!-- Tabs -->
      <ul class="nav nav-tabs mb-3" id="kategoriTabs" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="umum-tab" data-bs-toggle="tab" data-bs-target="#umum" type="button" role="tab">Kategori Umum</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="pelajar-tab" data-bs-toggle="tab" data-bs-target="#pelajar" type="button" role="tab">Kategori Pelajar</button>
        </li>
      </ul>

      <!-- Tab Content -->
      <div class="tab-content" id="kategoriTabsContent">
        <!-- Kategori Umum -->
        <div class="tab-pane fade show active" id="umum" role="tabpanel" aria-labelledby="umum-tab">
          <?= view('home/partials_peserta_table', ['peserta' => $umum]) ?>
          <div class="text-center mt-3">
            <a href="<?= site_url('home/semuaPeserta?kategori=Umum') ?>" class="btn btn-primary">Lihat Lainnya</a>
          </div>
        </div>

        <!-- Kategori Pelajar -->
        <div class="tab-pane fade" id="pelajar" role="tabpanel" aria-labelledby="pelajar-tab">
          <?= view('home/partials_peserta_table', ['peserta' => $pelajar]) ?>
          <div class="text-center mt-3">
            <a href="<?= site_url('home/semuaPeserta?kategori=Pelajar') ?>" class="btn btn-primary">Lihat Lainnya</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Juknis -->
  <section class="py-5 text-dark mb-5" id="juknis">
    <div class="container">
      <div class="text-center mb-4" data-aos="fade-up">
        <h2 class="display-5 fw-bold text-gradient">Juknis <span class="color-span">Lomba</span></h2>
        <p class="lead text-muted">Informasi penting terkait <strong>Sangatta Festival Run 2025</strong></p>
      </div>

      <div class="accordion" id="juknisAccordion">
        <!-- Kategori -->
        <div class="accordion-item juknis-card mb-3" data-aos="fade-up" data-aos-delay="50">
          <h2 class="accordion-header" id="kategoriHeading">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kategoriCollapse">
              <i class="bi bi-tags me-2"></i> Kategori
            </button>
          </h2>
          <div id="kategoriCollapse" class="accordion-collapse collapse" data-bs-parent="#juknisAccordion">
            <div class="accordion-body">
              <div class="row g-4">
                <!-- Umum -->
                <div class="col-md-6">
                  <div class="p-3 border rounded bg-light h-100 shadow-sm">
                    <div class="d-flex align-items-center mb-2">
                      <div class="icon-circle bg-primary text-white me-3">
                        <i class="bi bi-people-fill fs-4"></i>
                      </div>
                      <div>
                        <h5 class="mb-0 text-primary">Kategori Umum</h5>
                      </div>
                    </div>
                    <p class="mb-1 text-muted">Kuota: <strong>2.000 peserta</strong></p>
                    <p class="mb-0 text-muted">Biaya Registrasi: <span class="fw-bold text-primary">Rp 180.000</span></p>
                  </div>
                </div>

                <!-- Pelajar -->
                <div class="col-md-6">
                  <div class="p-3 border rounded bg-light h-100 shadow-sm">
                    <div class="d-flex align-items-center mb-2">
                      <div class="icon-circle bg-pink text-white me-3">
                        <i class="bi bi-mortarboard-fill fs-4"></i>
                      </div>
                      <div>
                        <h5 class="mb-0 text-pink">Kategori Pelajar</h5>
                      </div>
                    </div>
                    <p class="mb-1 text-muted">Kuota: <strong>200 peserta</strong></p>
                    <p class="mb-0 text-muted">Biaya Registrasi: <span class="fw-bold text-pink">Rp 150.000</span></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Pembayaran -->
        <div class="accordion-item juknis-card mb-3" data-aos="fade-up" data-aos-delay="250">
          <h2 class="accordion-header" id="pembayaranHeading">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pembayaranCollapse">
              <i class="bi bi-wallet2 me-2"></i> Pembayaran
            </button>
          </h2>
          <div id="pembayaranCollapse" class="accordion-collapse collapse" data-bs-parent="#juknisAccordion">
            <div class="accordion-body">
              <p>Silakan lakukan pembayaran ke salah satu rekening atau e-wallet berikut:</p>
              <ul class="mb-3">
                <li><strong>BRI:</strong> 056301069405502 a.n. <strong>Mayasari</strong></li>
                <li><strong>BCA:</strong> 7995030829 a.n. <strong>Mayasari</strong></li>
                <li><strong>Dana:</strong> 082259419842 a.n <strong>Mayasari</strong></li>
              </ul>
              <p>Pastikan untuk menyimpan bukti pembayaran dan unggah saat melakukan pendaftaran.</p>
            </div>
          </div>
        </div>

        <!-- Pendaftaran -->
        <div class="accordion-item juknis-card mb-3" data-aos="fade-up" data-aos-delay="150">
          <h2 class="accordion-header" id="pendaftaranHeading">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pendaftaranCollapse">
              <i class="bi bi-calendar2-week me-2"></i> Pendaftaran
            </button>
          </h2>
          <div id="pendaftaranCollapse" class="accordion-collapse collapse" data-bs-parent="#juknisAccordion">
            <div class="accordion-body">
              Pendaftaran dibuka dari <strong>14 Mei 2025</strong> hingga <strong>02 Juni 2025</strong>.
            </div>
          </div>
        </div>
                
        <!-- Fasilitas -->
        <div class="accordion-item juknis-card mb-3" data-aos="fade-up" data-aos-delay="100">
          <h2 class="accordion-header" id="fasilitasHeading">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#fasilitasCollapse">
              <i class="bi bi-gift me-2"></i> Fasilitas
            </button>
          </h2>
          <div id="fasilitasCollapse" class="accordion-collapse collapse" data-bs-parent="#juknisAccordion">
            <div class="accordion-body">
              Setiap peserta akan mendapatkan kaos eksklusif Sangatta Festival Run 2025.
            </div>
          </div>
        </div>

        <!-- Tahap Pendaftaran -->
        <div class="accordion-item juknis-card mb-3" data-aos="fade-up" data-aos-delay="200">
          <h2 class="accordion-header" id="tahapHeading">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tahapCollapse">
              <i class="bi bi-clipboard-check me-2"></i> Tahap Pendaftaran
            </button>
          </h2>
          <div id="tahapCollapse" class="accordion-collapse collapse" data-bs-parent="#juknisAccordion">
            <div class="accordion-body">
              <div class="row g-4">
                <div class="col-md-4 text-center">
                  <div class="icon-circle bg-primary text-white mb-3">
                    <i class="bi bi-person-plus fs-3"></i>
                  </div>
                  <h5 class="fw-semibold text-primary">1. Isi Formulir Pendaftaran</h5>
                  <p class="text-muted">Lengkapi seluruh data peserta dan data akun, lalu unggah bukti pembayaran.</p>
                </div>
                <div class="col-md-4 text-center">
                  <div class="icon-circle bg-info text-white mb-3">
                    <i class="bi bi-exclamation-circle fs-3"></i>
                  </div>
                  <h5 class="fw-semibold text-info">2. Simpan Data Akun</h5>
                  <p class="text-muted">Pastikan Anda mencatat username dan password untuk login sebagai peserta.</p>
                </div>
                <div class="col-md-4 text-center">
                  <div class="icon-circle bg-pink text-white mb-3">
                    <i class="bi bi-shield-check fs-3"></i>
                  </div>
                  <h5 class="fw-semibold text-pink">3. Verifikasi</h5>
                  <p class="text-muted">Admin memverifikasi dalam 1x24 jam.</p>
                </div>
                <div class="col-md-6 text-center">
                  <div class="icon-circle bg-warning text-white mb-3">
                    <i class="bi bi-envelope-paper fs-3"></i>
                  </div>
                  <h5 class="fw-semibold text-warning">4. Terima Tiket</h5>
                  <p class="text-muted">Tiket dikirim ke email dalam bentuk QR Code.</p>
                </div>
                <div class="col-md-6 text-center">
                  <div class="icon-circle bg-success text-white mb-3">
                    <i class="bi bi-box-arrow-in-right fs-3"></i>
                  </div>
                  <h5 class="fw-semibold text-success">5. Akses Tiket</h5>
                  <p class="text-muted">Tiket juga dapat diakses melalui halaman dashboard peserta setelah login.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- Footer -->
  <footer class="footer-banner pt-5 pb-3 mt-5 mb-5">
    <div class="container footer-content">
      <div class="row text-center text-md-start">
        
        <!-- Logo & Deskripsi -->
        <div class="col-md-4 mb-4">          
          <h4 class="fw-bold">Sangatta Festival Run 2025</h4>
          <p class="small mt-2">Salah satu event fun run terbesar yang di adakan di kota sangatta di tahun 2025, yang di buka untuk seluruh masyarakat kalimantan timur. Dengan jalur yang menantang dengan pengalaman yang tak terlupakan. Sangatta festival run 2025 banyak menghadirkan konsep yang berbeda dan pastinya seru untuk di ikuti para pecinta lari untuk merasakan sensasi lari dengan penuh warna</p>
          <p class="small">Tanggal: <strong>22 Juni 2025</strong></p>
        </div>

        <!-- Navigasi -->
        <div class="col-md-4 mb-4 text-center">
          <h5 class="fw-semibold">Navigasi</h5>
          <ul class="list-unstyled mt-3">
            <li><a href="#home" class="text-white text-decoration-none d-block mb-1">Beranda</a></li>
            <li><a href="#tentang" class="text-white text-decoration-none d-block mb-1">Informasi Lomba</a></li>
            <li><a href="#peserta" class="text-white text-decoration-none d-block mb-1">peserta lomba</a></li>
            <li><a href="#juknis" class="text-white text-decoration-none d-block">juknis</a></li>
          </ul>
        </div>

        <!-- Sosial Media & Kontak -->
        <div class="col-md-4 mb-4">
          <h5 class="fw-semibold">Ikuti Kami</h5>
          <div class="d-flex justify-content-center justify-content-md-start gap-3 mt-3">
            <a href="https://www.instagram.com/sangattafestivalrun?igsh=MTg5dHd0NWpuZmRodg==" target="_blank">
              <i class="bi bi-instagram text-white fs-5" target="_blank"></i>
              <p class="small mt-1" target="_blank">Instagram : <a href="https://www.instagram.com/sangattafestivalrun?igsh=MTg5dHd0NWpuZmRodg==" class="text-white">Sangatta Festival Run</a></p>
            </a>          
          </div>          
          <div class="d-flex justify-content-center justify-content-md-start gap-3 mt-3">
            <a href="https://wa.me/628115913939" target="_blank" class="text-white d-flex align-items-center gap-2">
              <i class="bi bi-whatsapp fs-5"></i>
              <p class="small mb-0">Contact Person: 0811 5913 939</p>
            </a>
          </div>        
          <div class="my-5">
            <img src="<?= base_url('assets/gambar/logo.png') ?>" alt="Logo EO" class="mb-3" style="max-width: 80px;">
            <img src="<?= base_url('assets/gambar/EO.jpeg') ?>" alt="Logo EO" class="mb-3" style="max-width: 80px;">
          </div>
        </div>
      </div>

      <hr class="border-light" />
      <!-- <p class="text-center small mb-0">&copy; 2025 Sangatta Festival Run.</p> -->
    </div>
  </footer>


  <!-- Script -->
  <!-- navbar scroll -->
  <script>
    window.addEventListener('scroll', function () {
      const navbar = document.querySelector('.navbar');
      if (window.scrollY > 50) {
        navbar.classList.add('navbar-scrolled');
      } else {
        navbar.classList.remove('navbar-scrolled');
      }
    });
  </script>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
      <?php if (session()->getFlashdata('validation_errors')): ?>
          let errorMessages = <?= json_encode(session()->getFlashdata('validation_errors')) ?>;
          let combinedErrors = Object.values(errorMessages).join('<br>');
          Swal.fire({
              icon: 'error',
              title: 'Validasi Gagal',
              html: combinedErrors,
              confirmButtonText: 'OK'
          });
      <?php elseif (session()->getFlashdata('error')): ?>
          Swal.fire({
              icon: 'error',
              title: 'Gagal',
              text: '<?= session()->getFlashdata('error') ?>'
          });
      <?php elseif (session()->getFlashdata('success')): ?>
          Swal.fire({
              icon: 'success',
              title: 'Sukses',
              text: '<?= session()->getFlashdata('success') ?>'
          });
      <?php endif; ?>
  </script>
</body>
</html>
