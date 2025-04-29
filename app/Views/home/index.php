<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Lomba Lari</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- AOS Animate on Scroll -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <!-- Custom CSS Inline -->
    <style>
        body {
            font-family: 'Bebas Neue', poppins;
        }
        /* Navbar */
        .navbar {
            background-color: #0095D9;
        }

        .navbar-brand, .navbar-nav .nav-link {
            color: white !important;
        }

        .navbar-nav .nav-link:hover {
            color: #fff !important;
        }

        /* Hero Section */
        .hero {
            height: 100vh;
            background: linear-gradient(135deg, #0095D9, #00b3e6);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .hero h1 {
            font-size: 4rem;
            font-weight: bold;
        }

        .hero .btn-custom {
            background-color: #0095D9;
            color: #fff;
            padding: 15px 30px;
            font-size: 1.25rem;
            border-radius: 30px;
            border: none;
        }

        .hero .btn-custom:hover {
            background-color: #0088b1;
        }

        /* Daftar Peserta */
        .daftar-peserta {
            background-color: #f0f8ff;
            padding: 50px 0;
        }

        .daftar-peserta h2 {
            color: #0095D9;
            font-weight: bold;
            text-align: center;
            margin-bottom: 40px;
        }

        .daftar-peserta table {
            width: 100%;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .daftar-peserta th, .daftar-peserta td {
            padding: 15px;
            text-align: center;
        }

        .informasi {
            background-color: #f0f8ff;
            padding: 50px 0;
        }

        /* Footer */
        footer {
            background-color: #f0f8ff;
            color: black;
            padding: 20px;
            text-align: center;
        }
        
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#">Lomba Orienteering</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
            <a class="nav-link" href="#home">Home</a>
            </li>
            <!-- <li class="nav-item">
            <a class="nav-link" href="#juknis"></a>
            </li> -->
            <li class="nav-item">
                <a class="btn btn-light text-primary ms-2" href="<?= base_url('Login'); ?>">Daftar/Login</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div>
            <h1 class="display-4">Lomba Lari Nasional 2025</h1>
            <p class="lead">Daftar dan buktikan kecepatanmu! Total hadiah 80 juta rupiah!</p>
            <a href="#pendaftaran" class="btn btn-custom btn-lg">Daftar Sekarang</a>
        </div>
    </section>

    <!-- Tentang Lomba -->
    <section class="tentang py-5" id="tentang">
        <div class="container">
            <div class="row align-items-center" data-bs-aos="fade-up">
                <div class="col-md-6">
                    <img src="https://source.unsplash.com/600x400/?running,sport" alt="Lari" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <h2 class="mb-3">Tentang Lomba</h2>
                    <p>Lomba Lari Nasional 2025 terbuka untuk umum dari seluruh Indonesia. Jalur penuh tantangan, hadiah menggiurkan, dan pengalaman tak terlupakan menantimu. Yuk gabung!</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Daftar Peserta Terkonfirmasi -->
    <section class="daftar-peserta" id="peserta">
        <div class="container">
            <h2>Daftar Peserta Terkonfirmasi</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Asal</th>
                            <th>Nomor HP</th>
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

    <!-- Informasi Lomba -->
    <section class="informasi py-5 bg-light" id="informasi">
        <div class="container">
            <h2 class="text-center mb-4" data-bs-aos="fade-up">Informasi Penting</h2>
            <div class="accordion" id="infoAccordion" data-bs-aos="fade-up">
                <!-- Item 1 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                            🎯 Total Hadiah
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show">
                        <div class="accordion-body">
                            Rp. 80.000.000 untuk pemenang dari berbagai kategori!
                        </div>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                            🔗 Alur Pendaftaran
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            1. Daftar akun ➔ 2. Upload pembayaran ➔ 3. Konfirmasi ➔ 4. Ikut lomba!
                        </div>
                    </div>
                </div>

                <!-- Item 3 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                            📝 Ketentuan Peserta
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            - Usia minimal 17 tahun<br>
                            - Sehat jasmani<br>
                            - Membawa peralatan pribadi
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
      <div class="container">
        <div class="row">
          <!-- Kolom 1: Tentang Perusahaan -->
          <div class="col-md-4 mb-4">
            <h4 class="text-uppercase">Tentang Kami</h4>
            <p>
              lorem ipsum.
            </p>
          </div>

          <!-- Kolom 2: Navigasi Singkat -->
          <div class="col-md-4 mb-4">
            <h4 class="text-uppercase">Navigasi</h4>
            <ul class="list-unstyled">
              <li>
                <a href="#home" class="text-dark text-decoration-none"
                  >home</a
                >
              </li>              
            </ul>
          </div>

          <!-- Kolom 3: Kontak -->
          <div class="col-md-4 mb-4">
            <h4 class="text-uppercase">Kontak</h4>
            <p>
              <i class="fas fa-map-marker-alt"></i> Jl.
            </p>
            <p><i class="fas fa-phone"></i> +62 </p>
            <p><i class="fas fa-envelope"></i> .com</p>
          </div>
        </div>

        <!-- Garis Pembatas -->
        <hr class="bg-light" />

        <!-- Bagian Bawah Footer -->
        <div class="row">
          <div class="col-md-12 text-center">
            <p class="mb-0">
              <!-- &copy; 2025 CV. Imani Jaya Teknindo. Semua hak cipta dilindungi. -->
            </p>
          </div>
        </div>
      </div>
    </footer>


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


    <!-- Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- AOS Animate -->
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

</body>
</html>
