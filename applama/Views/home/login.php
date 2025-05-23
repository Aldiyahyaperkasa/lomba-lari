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
                <a class="nav-link fw-bold" href="#login/daftar">Daftar/Login</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>

    <!-- Hero -->
    <section class="hero" id="home">
    <div class="container" data-aos="fade-up">
        <h1>Daftarkan Diri Anda!</h1>
        <p>Acara lari terbesar di Sangatta dengan kategori Umum & Pelajar</p>
    </div>
    </section>

    <!-- Daftar/Login Section -->
    <section class="container" id="login/daftar" style="padding-top:100px;">
        <!-- <h1 class="text-center">Silahkan Masukkan Data Anda </h1> -->
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 shadow rounded-4">
                    <div class="card-body p-5">
                        <!-- Tabs for Login & Register -->
                        <ul class="nav nav-tabs mb-4" id="formTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#loginTabContent" type="button" role="tab">Login</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#registerTabContent" type="button" role="tab">Daftar</button>
                            </li>
                        </ul>

                        <div class="tab-content" id="formTabContent">
                            <!-- Login Form -->
                            <div class="tab-pane fade show active" id="loginTabContent" role="tabpanel">
                                <form action="<?= base_url('LoginController/submit'); ?>" method="POST">
                                    <div class="mb-3">
                                        <label for="loginUsername" class="form-label">Username</label>
                                        <input type="text" class="form-control rounded-pill" id="loginUsername" name="username" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="loginPassword" class="form-label">Password</label>
                                        <input type="password" class="form-control rounded-pill" id="loginPassword" name="password" required>
                                    </div>
                                    <button type="submit" class="btn btn-success w-100 rounded-pill fw-bold">Login</button>
                                </form>
                            </div>

                            <!-- Register Form -->
                            <div class="tab-pane fade" id="registerTabContent" role="tabpanel">
                                <div class="form-group mb-4">
                                    <label for="kategoriLari">Pilih Kategori Lari</label>
                                    <select id="kategoriLari" name="kategori_lari" class="form-select" aria-label="Pilih Kategori Lari">
                                        <!-- opsi default dari js -->
                                        <option value="" selected>--Pilih Kategori--</option>
                                    </select>                            
                                </div>  

                                <form action="<?= base_url('PendaftaranController/store'); ?>" method="POST" id="formPeserta" style="display: none;" enctype="multipart/form-data">
                                    <input type="hidden" id="kategoriTerpilih" name="kategori_lari">

                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" class="form-control rounded-pill" id="username" name="username" value="<?= old('username') ?>" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" class="form-control rounded-pill" id="password" name="password" value="<?= old('password') ?>" placeholder="min 6 gabungan huruf & angka" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="namaPeserta" class="form-label">Nama Lengkap</label>
                                            <input type="text" class="form-control rounded-pill" id="namaPeserta" name="nama_peserta" value="<?= old('nama_peserta') ?>"  required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
                                            <input type="date" class="form-control rounded-pill" id="tanggalLahir" name="tanggal_lahir" value="<?= old('tanggal_lahir') ?>" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="noTelepon" class="form-label">Nomor Telepon</label>
                                            <input type="text" class="form-control rounded-pill" id="noTelepon" name="no_telepon" value="<?= old('no_telepon') ?>" placeholder="min 11 | max 13 angka" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="alamat" class="form-label">Alamat</label>
                                            <input type="text" class="form-control rounded-pill" id="alamat" name="alamat" value="<?= old('alamat') ?>" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="nik" class="form-label">NIK</label>
                                            <input type="text" class="form-control rounded-pill" id="nik" name="nik" value="<?= old('nik') ?>" placeholder="wajib 16 angka" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control rounded-pill" id="email" name="email" value="<?= old('email') ?>" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="jenisKelamin" class="form-label">Jenis Kelamin</label>
                                            <select id="jenisKelamin" name="jenis_kelamin" class="form-select rounded-pill" required>
                                                <option value="Laki-laki" <?= old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                                                <option value="Perempuan" <?= old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="ukuranBaju" class="form-label">Ukuran Baju</label>
                                            <select id="ukuranBaju" name="ukuran_baju" class="form-select rounded-pill" required>
                                                <option value="S" <?= old('ukuran_baju') == 'S' ? 'selected' : '' ?>>S</option>
                                                <option value="M" <?= old('ukuran_baju') == 'M' ? 'selected' : '' ?>>M</option>
                                                <option value="L" <?= old('ukuran_baju') == 'L' ? 'selected' : '' ?>>L</option>
                                                <option value="XL" <?= old('ukuran_baju') == 'XL' ? 'selected' : '' ?>>XL</option>
                                                <option value="XXL" <?= old('ukuran_baju') == 'XXL' ? 'selected' : '' ?>>XXL</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="usia" class="form-label">Usia</label>
                                            <input type="number" class="form-control rounded-pill" id="usia" name="usia" value="<?= old('usia') ?>" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="noDarurat1" class="form-label">Nomor Telepon Darurat 1</label>
                                            <input type="text" class="form-control rounded-pill" id="noDarurat1" name="no_telepon_darurat_1" value="<?= old('no_telepon_darurat_1') ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="noDarurat2" class="form-label">Nomor Telepon Darurat 2</label>
                                            <input type="text" class="form-control rounded-pill" id="noDarurat2" name="no_telepon_darurat_2" value="<?= old('no_telepon_darurat_2') ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="riwayatPenyakit" class="form-label">Riwayat Penyakit</label>
                                            <textarea class="form-control rounded-pill" id="riwayatPenyakit" name="riwayat_penyakit" rows="2" placeholder="Jika tidak ada, biarkan kosong"><?= old('riwayat_penyakit') ?></textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="buktiBayar" class="form-label">Upload Bukti Pembayaran</label>
                                            <input type="file" class="form-control rounded-pill" id="buktiBayar" name="bukti_pembayaran" required>
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <button type="submit" class="btn btn-success w-100 rounded-pill fw-bold">Daftar Sekarang</button>
                                    </div>
                                </form>
                            </div>
                        </div> <!-- tab content -->
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
                <a href="https://www.instagram.com/sangattafestivalrun?igsh=MTg5dHd0NWpuZmRodg==" target="_blank">
                <i class="bi bi-instagram text-white fs-5" target="_blank"></i>
                <p class="small mt-1" target="_blank">Instagram : <a href="https://www.instagram.com/sangattafestivalrun?igsh=MTg5dHd0NWpuZmRodg==" class="text-white">Sangatta Festival Run</a></p>
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
