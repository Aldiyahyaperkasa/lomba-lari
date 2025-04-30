<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= base_url('assets/gambar/logo.jpeg') ?>" type="image/x-icon">
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
            background-color: #FFD700;
        }

        .navbar-brand {
            font-weight: bold;
            color: #003366 !important;
        }

        .navbar-brand, .navbar-nav .nav-link {
            color: black !important;
            font-weight: 500;
        }

        .nav-link:hover {
            color: #f72585 !important;
        }

        .btn-warning {
            background-color: #003366;
            color: #fff;
            font-weight: 600;
        }

        .btn-warning:hover {
            background-color: #f72585;
            color:  #fff;
        }

        .hero {
            background: url("<?= base_url('assets/gambar/maskot-withbg.jpeg') ?>") center center / cover no-repeat;
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
            background: linear-gradient(to bottom right, #001F3F, #003366);
            /* background: rgba(0, 31, 63, 0.6); */
        }

        .hero .container {
            position: relative;
            z-index: 1;
        }

        .hero h1 {
            font-size: 48px;
            font-weight: bold;
            color: white;
            text-shadow: 2px 2px 5px #000;
        }
        .hero p {
            font-size: 20px;
            color: #f1f1f1;
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

        .text-success { color: #f72585 !important; }
        .bg-success { background-color: #f72585 !important; }

        .text-warning { color: #FFD700 !important; }
        .bg-warning { background-color: #FFD700 !important; }


        footer {
            background: #FFD700;
            color: #003366;
            padding: 20px 0;
        }

        footer a {
            color: #003366;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="#">
        <img src="<?= base_url('assets/gambar/logo.jpeg') ?>" alt="Logo" width="40" class="me-2">
        Sangatta Festival Run 2025
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#tentang">Tentang</a></li>
        <li class="nav-item"><a class="nav-link" href="#peserta">Peserta</a></li>
        <li class="nav-item"><a class="nav-link" href="#juknis">Juknis</a></li>
        <a class="btn btn-warning ms-2" href="<?= base_url('Login'); ?>">
            <i class="bi bi-box-arrow-in-right me-1"></i> Daftar/Login
        </a>

      </ul>
    </div>
  </div>
</nav>

<!-- Hero -->
<section class="hero" id="home">
  <div class="container" data-aos="fade-up">
    <h1>Gabung dan Rasakan Sensasi Berlari di Sangatta Festival Run 2025!</h1>
    <p>Acara lari terbesar di Sangatta dengan kategori Umum & Pelajar</p>
    <a href="#tentang" class="btn btn-cta mt-3">Lihat Detail</a>
  </div>
</section>

<!-- Tentang -->
<section id="tentang" class="bg-white">
  <div class="container">
    <div class="row justify-content-center align-items-center">
      <div class="col-md-6">
        <img src="<?= base_url() ?>assets/gambar/maskot.png" alt="Lomba" class="img-fluid rounded w-75">
      </div>
      <div class="col-md-6 mt-4 mt-md-0">
        <h2 class="display-5 fw-bold" style="color:#007bff;">Tentang <span class="color-span">Lomba</span></h2>
        <p>Lomba Lari Nasional 2025 terbuka untuk seluruh masyarakat Indonesia. Jalur menantang, hadiah besar, dan pengalaman tak terlupakan menanti Anda. Yuk gabung dan jadi bagian dari sejarah lomba lari terbesar tahun ini!</p>
      </div>
    </div>
  </div>
</section>

<!-- Peserta -->
<section id="peserta" class="bg-white">
  <div class="container" data-aos="fade-up">
    <h2 class="text-center mb-4 display-5 fw-bold" style="color:#007bff;">Peserta <span class="color-span">Terkonfirmasi</span></h2>
    <div class="table-responsive">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th class="text-light">No</th>
            <th class="text-light">Nama</th>
            <th class="text-light">Asal</th>
            <th class="text-light">Nomor HP</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($peserta)) : ?>
            <?php $no = 1; foreach ($peserta as $row) : ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= esc($row['nama']) ?></td>
                <td><?= esc($row['asal']) ?></td>
                <td><?= esc($row['no_hp']) ?></td>
              </tr>
            <?php endforeach; ?>
          <?php else : ?>
            <tr>
              <td colspan="4" class="text-center">Belum ada peserta terkonfirmasi.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>

<!-- Juknis -->
<section class="py-5 text-dark" id="juknis">
  <div class="container">
    <div class="text-center mb-4">
      <h2 class="display-5 fw-bold text-gradient">Juknis <span class="color-span">Lomba</span></h2>
      <p class="lead text-muted">Informasi penting terkait <strong>Sangatta Festival Run 2025</strong></p>
    </div>

    <div class="accordion" id="juknisAccordion">
      <!-- Kategori -->
      <div class="accordion-item juknis-card mb-3">
        <h2 class="accordion-header" id="kategoriHeading">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kategoriCollapse">
            <i class="bi bi-tags me-2"></i> Kategori
          </button>
        </h2>
        <div id="kategoriCollapse" class="accordion-collapse collapse" data-bs-parent="#juknisAccordion">
          <div class="accordion-body">
            <ul>
              <li>Umum: 2.000 kuota</li>
              <li>Pelajar: 200 kuota</li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Fasilitas -->
      <div class="accordion-item juknis-card mb-3">
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

      <!-- Pendaftaran -->
      <div class="accordion-item juknis-card mb-3">
        <h2 class="accordion-header" id="pendaftaranHeading">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pendaftaranCollapse">
            <i class="bi bi-calendar2-week me-2"></i> Pendaftaran
          </button>
        </h2>
        <div id="pendaftaranCollapse" class="accordion-collapse collapse" data-bs-parent="#juknisAccordion">
          <div class="accordion-body">
            Pendaftaran dibuka dari <strong>1 Mei 2025</strong> hingga <strong>30 Mei 2025</strong>.
          </div>
        </div>
      </div>

      <!-- Tahap Pendaftaran -->
      <div class="accordion-item juknis-card mb-3">
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
                <h5 class="fw-semibold text-primary">1. Daftar Akun</h5>
                <p class="text-muted">Isi data diri dan unggah bukti pembayaran.</p>
              </div>
              <div class="col-md-4 text-center">
                <div class="icon-circle bg-success text-white mb-3">
                  <i class="bi bi-shield-check fs-3"></i>
                </div>
                <h5 class="fw-semibold text-success">2. Verifikasi</h5>
                <p class="text-muted">Admin memverifikasi dalam 1x24 jam.</p>
              </div>
              <div class="col-md-4 text-center">
                <div class="icon-circle bg-warning text-white mb-3">
                  <i class="bi bi-envelope-paper fs-3"></i>
                </div>
                <h5 class="fw-semibold text-warning">3. Terima Tiket</h5>
                <p class="text-muted">Tiket dikirim ke email dalam bentuk QR Code.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- Footer -->
<footer class="footer mt-5">
  <div class="container text-center">
    <div class="row">
      <div class="col-md-4 mb-3">
        <h5>Tentang Kami</h5>
        <p>Panitia resmi lomba lari nasional 2025 yang berkomitmen menyelenggarakan event berkualitas, sehat, dan kompetitif.</p>
      </div>
      <div class="col-md-4 mb-3">
        <h5>Navigasi</h5>
        <ul class="list-unstyled">
          <li><a href="#home">Beranda</a></li>
          <li><a href="#tentang">Tentang</a></li>
          <li><a href="#peserta">Peserta</a></li>
          <li><a href="#juknis">Juknis</a></li>
        </ul>
      </div>
      <div class="col-md-4 mb-3">
        <h5>Kontak</h5>
        <p>Email: info@sfr2025.id</p>
        <p>WhatsApp: 0812-3456-7890</p>
      </div>
    </div>
    <hr style="border-color: #ccff66;">
    <p>&copy; 2025 Sangatta Festival Run. All rights reserved.</p>
  </div>
</footer>

<!-- Script -->
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
