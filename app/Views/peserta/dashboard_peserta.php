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

        .container {
            max-width: 1100px;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 25px;
        }

        .form-section h3 {
            color: #007bff;
            font-weight: bold;
            text-align: center;
            font-size: 1.2rem;
        }

        .form-section label {
            font-size: 0.8rem;
        }

        .form-control, .form-select {
            border-radius: 30px;
        }

        .btn-custom {
            background-color: #007bff;
            color: white;
            border-radius: 30px;
            padding: 15px 25px;
            border: none;
            width: 100%;
            font-size: 1.1rem;
        }

        .btn-custom:hover {
            background-color: #0056b3;
        }

        /* form */
        .form-control,
        .form-select {
            border-radius: 50px;
            padding-left: 20px;
        }

        .btn-warning {
            background-color: #FFD700;
            color: #003366;
        }

        .btn-warning:hover {
            background-color: #f72585;
            color: white;
        }
    
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
            <img src="<?= base_url('assets/gambar/logo.png') ?>" alt="Logo" width="60" class="me-2">
            <!-- Sangatta Festival Run 2025 -->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link fw-bold" href="<?= base_url('LoginController/logout');?>">Logout</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>

    <!-- Hero -->
    <section class="hero" id="home">
    <div class="container" data-aos="fade-up">
        <h1>Selamat Datang Di Dashboard Peserta</h1>
        <p>silahkan cek kembali data anda</p>
    </div>
    </section>


<!-- Dashboard Peserta -->
<section class="py-5" style="background-color: #f5f7fa; min-height: 100vh;">
    <div class="container" data-aos="fade-up">
        <div class="row justify-content-center mb-4">
            <div class="col-lg-8 text-center">
                <h2 class="fw-bold">Dashboard Peserta</h2>
                <p class="text-muted">Cek kembali data pendaftaran Anda sebelum dikonfirmasi oleh admin.</p>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow rounded-4 border-0">
                    <div class="card-body p-5">
                        <h5 class="fw-bold mb-4 text-primary">Data Diri Peserta</h5>
                        <div class="row g-3">
                            <div class="col-md-12 mt-3">
                                <p class="mb-1 fw-semibold">Status Pendaftaran :
                                  <span class="badge p-2 bg-<?= $peserta['status_pendaftaran'] === 'Terkonfirmasi' ? 'success' : ($peserta['status_pendaftaran'] === 'Ditolak' ? 'danger' : 'warning'); ?>">
                                      <?= $peserta['status_pendaftaran']; ?>
                                  </span>
                                </p>
                            </div>
                            <div class="col-md-12 mt-3">
                                <p class="mb-1 fw-semibold">Nomor Peserta :
                                    <span class="badge p-2 bg-<?= $peserta['status_pendaftaran'] === 'Terkonfirmasi' ? 'success' : ($peserta['status_pendaftaran'] === 'Ditolak' ? 'danger' : 'warning'); ?>">
                                        <?= $peserta['status_pendaftaran'] === 'Terkonfirmasi' ? $peserta['nomor_peserta'] : '-'; ?>
                                    </span>
                                </p>
                            </div>
                            <hr>                          
                            <div class="col-md-6">
                                <p class="mb-1 fw-semibold">Nama Lengkap</p>
                                <div class="form-control bg-light"><?= $peserta['nama_peserta']; ?></div>
                            </div>
                            <div class="col-md-6">
                                <p class="mb-1 fw-semibold">Username</p>
                                <div class="form-control bg-light"><?= $peserta['username']; ?></div>
                            </div>
                            <div class="col-md-6">
                                <p class="mb-1 fw-semibold">Tanggal Lahir</p>
                                <div class="form-control bg-light"><?= date('d-m-Y', strtotime($peserta['tanggal_lahir'])); ?></div>
                            </div>
                            <div class="col-md-6">
                                <p class="mb-1 fw-semibold">Usia</p>
                                <div class="form-control bg-light"><?= $peserta['usia']; ?> tahun</div>
                            </div>
                            <div class="col-md-6">
                                <p class="mb-1 fw-semibold">Nomor Telepon</p>
                                <div class="form-control bg-light"><?= $peserta['no_telepon']; ?></div>
                            </div>
                            <div class="col-md-6">
                                <p class="mb-1 fw-semibold">Email</p>
                                <div class="form-control bg-light"><?= $peserta['email']; ?></div>
                            </div>
                            <div class="col-md-6">
                                <p class="mb-1 fw-semibold">Jenis Kelamin</p>
                                <div class="form-control bg-light"><?= $peserta['jenis_kelamin']; ?></div>
                            </div>
                            <div class="col-md-6">
                                <p class="mb-1 fw-semibold">Ukuran Baju</p>
                                <div class="form-control bg-light"><?= $peserta['ukuran_baju']; ?></div>
                            </div>
                            <div class="col-md-6">
                                <p class="mb-1 fw-semibold">NIK</p>
                                <div class="form-control bg-light"><?= $peserta['nik']; ?></div>
                            </div>
                            <div class="col-md-6">
                                <p class="mb-1 fw-semibold">Alamat</p>
                                <div class="form-control bg-light"><?= $peserta['alamat']; ?></div>
                            </div>
                            <div class="col-md-6">
                                <p class="mb-1 fw-semibold">Kategori Lari</p>
                                <div class="form-control bg-light"><?= $peserta['kategori_lari']; ?></div>
                            </div>
                            <div class="col-md-6">
                                <p class="mb-1 fw-semibold">Riwayat Penyakit</p>
                                <div class="form-control bg-light"><?= $peserta['riwayat_penyakit'] ?: 'Tidak ada'; ?></div>
                            </div>
                            <div class="col-md-6">
                                <p class="mb-1 fw-semibold">No. Darurat 1</p>
                                <div class="form-control bg-light"><?= $peserta['no_telepon_darurat_1']; ?></div>
                            </div>
                            <div class="col-md-6">
                                <p class="mb-1 fw-semibold">No. Darurat 2</p>
                                <div class="form-control bg-light"><?= $peserta['no_telepon_darurat_2'] ?: '-'; ?></div>
                            </div>
                            <div class="col-md-12">
                                <p class="mb-1 fw-semibold">Bukti Pembayaran</p>
                                <img src="<?= base_url('bukti_bayar/' . $peserta['bukti_pembayaran']); ?>" alt="Bukti Pembayaran" class="img-thumbnail" style="max-height: 300px;">
                            </div>
                        </div>

                        <div class="mt-4 text-end">
                            <a href="<?= base_url('LoginController/logout'); ?>" class="btn btn-outline-danger rounded-pill">Logout</a>
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        window.onload = function () {
            let select = document.getElementById('kategoriLari');

        fetch('<?= base_url('PendaftaranController/getKuotaSemua'); ?>')
            .then(response => response.json())
            .then(data => {
                const kuotaUmum = data.umumCount ?? 0;    // fallback 0 jika undefined
                const kuotaPelajar = data.pelajarCount ?? 0;

                const maxUmum = 2000;
                const maxPelajar = 200;

                let select = document.getElementById('kategoriLari');
                select.innerHTML = '<option value="">--Pilih Kategori--</option>'; // clear existing

                // Opsi Umum
                let optionUmum = document.createElement('option');
                optionUmum.value = 'Umum';
                optionUmum.textContent = `Umum ${kuotaUmum}/${maxUmum}`;
                optionUmum.disabled = kuotaUmum >= maxUmum;
                select.appendChild(optionUmum);

                // Opsi Pelajar
                let optionPelajar = document.createElement('option');
                optionPelajar.value = 'Pelajar';
                optionPelajar.textContent = `Pelajar ${kuotaPelajar}/${maxPelajar}`;
                optionPelajar.disabled = kuotaPelajar >= maxPelajar;
                select.appendChild(optionPelajar);

                // Simpan kuota ke atribut data
                select.dataset.kuotaUmum = kuotaUmum;
                select.dataset.kuotaPelajar = kuotaPelajar;
            })
            .catch(error => {
                console.error('❌ Gagal ambil kuota:', error);
            });

        };

        document.getElementById('kategoriLari').addEventListener('change', function () {
            let kategori = this.value;
            let hiddenKategori = document.getElementById('kategoriTerpilih');
            let form = document.getElementById('formPeserta');

            const kuotaUmum = parseInt(this.dataset.kuotaUmum);
            const kuotaPelajar = parseInt(this.dataset.kuotaPelajar);

            const maxUmum = 2000;
            const maxPelajar = 200;

            if (kategori === 'Umum' && kuotaUmum >= maxUmum) {
                alert('❌ Kuota kategori Umum sudah penuh!');
                this.value = '';
                hiddenKategori.value = '';
                form.style.display = 'none';
                return;
            }

            if (kategori === 'Pelajar' && kuotaPelajar >= maxPelajar) {
                alert('❌ Kuota kategori Pelajar sudah penuh!');
                this.value = '';
                hiddenKategori.value = '';
                form.style.display = 'none';
                return;
            }

            if (kategori !== '') {
                hiddenKategori.value = kategori;
                form.style.display = 'block';
            } else {
                hiddenKategori.value = '';
                form.style.display = 'none';
            }
        });
    </script>

</body>

</html>
