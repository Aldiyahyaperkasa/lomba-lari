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

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
            color: #fff !important;
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
            background: url("<?= base_url('assets/gambar/maskot-withbg.jpeg') ?>") center center/cover no-repeat;
            color: white;
            padding: 120px 0;
            text-align: center;
            position: relative;
        }

        .hero::after {
            content: "";
            position: absolute;
            top: 0; left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom right, #001F3F, #003366);
            /* background: linear-gradient(135deg, #5ce1e6, #00b3e6); */
            /* background: rgba(0, 31, 63, 0.6); */
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
    <nav class="navbar navbar-expand-lg fixed-top">
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
            <li class="nav-item">
                <a class="nav-link active fw-bold" aria-current="page" href="<?= base_url('/'); ?>">Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link fw-bold" href="#semua-peserta">Daftar Lengkap Peserta</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>

    <!-- Hero -->
    <section class="hero" id="home">
        <div class="container" data-aos="fade-up">
            <h1>Daftar Lengkap Peserta Terkonfirmasi</h1>
                <p>cek nama anda dalam daftar ini !</p>
        </div>
    </section>

    <section id="semua-peserta" class="bg-white py-5">
        <div class="container">
            <?php
                $judul = (!empty($umum) && empty($pelajar)) ? 'Kategori Umum' :
                        ((empty($umum) && !empty($pelajar)) ? 'Kategori Pelajar' : 'Semua Peserta');
            ?>

            <h2 class="text-center mb-4 display-5 fw-bold" style="color:#007bff;" data-aos="fade-down">
                <?= $judul ?> <span class="color-span">Terkonfirmasi</span>
            </h2>


            <div class="table-responsive mt-3" style="font-size:0.6rem;">
            <table class="table table-striped table-bordered">
                <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nomor Peserta</th>
                    <th>Nomor HP</th>
                </tr>
                </thead>
                <tbody>
                <?php if (!empty($umum) || !empty($pelajar)) : ?>
                    <?php $no = 1; foreach (array_merge($umum, $pelajar) as $row) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= esc($row['nama_peserta']) ?></td>
                        <td><?= esc($row['nomor_peserta']) ?></td>
                        <td><?= esc($row['no_telepon']) ?></td>
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

    <!-- Footer -->
    <footer class="footer-banner pt-5 pb-3 mt-5 mb-5">
        <div class="container footer-content">
        <div class="row text-center text-md-start">
            
            <!-- Logo & Deskripsi -->
            <div class="col-md-4 mb-4">
            <h4 class="fw-bold">Sangatta Festival Run 2025</h4>
            <p class="small mt-2">Berlari bersama merayakan semangat sehat dan kebersamaan di Sangatta!</p>
            <p class="small">Tanggal: <strong>22 Juni 2025</strong></p>
            </div>

            <!-- Navigasi -->
            <div class="col-md-4 mb-4">
            <h5 class="fw-semibold">Navigasi</h5>
            <ul class="list-unstyled mt-3">
                <li><a href="<?= base_url('/'); ?>" class="text-white text-decoration-none d-block mb-1">Beranda</a></li>
                <li><a href="<?= base_url('/'); ?>/#tentang" class="text-white text-decoration-none d-block mb-1">Informasi Lomba</a></li>
                <li><a href="<?= base_url('/'); ?>/#peserta" class="text-white text-decoration-none d-block mb-1">peserta lomba</a></li>
                <li><a href="<?= base_url('/'); ?>#juknis" class="text-white text-decoration-none d-block">juknis</a></li>
            </ul>
            </div>

            <!-- Sosial Media & Kontak -->
            <div class="col-md-4 mb-4">
            <h5 class="fw-semibold">Ikuti Kami</h5>
            <div class="d-flex justify-content-center justify-content-md-start gap-3 mt-3">
                <a href="#"><i class="bi bi-instagram text-white fs-5"></i></a>
                <a href="#"><i class="bi bi-facebook text-white fs-5"></i></a>
                <a href="#"><i class="bi bi-youtube text-white fs-5"></i></a>
            </div>
            <p class="small mt-3 mb-1">Email: <a href="mailto:info@sfr2025.com" class="text-white">info@sfr2025.com</a></p>
            <p class="small">Telepon: <a href="tel:+6281234567890" class="text-white">+62 812-3456-7890</a></p>
            </div>

        </div>

        <hr class="border-light" />
        <p class="text-center small mb-0">&copy; 2025 Sangatta Festival Run. All rights reserved.</p>
        </div>
    </footer>


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
</body>

</html>
