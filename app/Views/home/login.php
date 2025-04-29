<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Lomba Lari</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    


    <style>
        body {
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            background-color: #f8f9fa;
        }

        .hero-section {
            background: linear-gradient(135deg, #0095D9, #00b3e6);
            color: white;
            padding: 100px 0;
            text-align: center;
            border-bottom: 5px solid #0095D9;
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


        .footer {
            background-color: #333;
            color: white;
            padding: 20px 0;
            text-align: center;
            font-size: 0.9rem;
        }

        .footer a {
            color: #007bff;
            text-decoration: none;
        }

        .navbar-custom {
            background-color: #0095D9;
        }

        .navbar-custom .navbar-brand {
            font-family: 'Roboto', sans-serif;
            /* font-size: 1.8rem; */
            /* font-weight: 600; */
            color: white;
        }

        .navbar-custom .navbar-nav .nav-link {
            color: white;
            font-size: 1.1rem;
        }

        .navbar-custom .navbar-nav .nav-link:hover {
            color: #ffd700;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">Lomba Lari 2025</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= base_url('/'); ?>">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#daftarLogin">Daftar/Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <h1>Selamat Datang di Lomba Lari</h1>
        <p>Daftarkan diri Anda untuk lomba lari yang menyenangkan dan menantang!</p>
        <a href="#daftarLogin" class="btn btn-light text-primary btn-lg mt-3">Daftar/Login</a>
    </section>

    <!-- Daftar/Login Section -->
    <section id="daftarLogin" class="container py-5">
        <div class="row justify-content-center form-section">
            <!-- Left: Form Pendaftaran -->
            <div class="col-md-5 ">
                <div class="card">
                    <div class="card-body">
                        <h3>Form Pendaftaran Peserta Lomba Lari</h3>

                        <!-- Form Pemilihan Kategori Lari -->
                        <div class="form-group mb-4">
                            <label for="kategoriLari">Pilih Kategori Lari</label>
                            <select id="kategoriLari" name="kategori_lari" class="form-select" aria-label="Pilih Kategori Lari">
                                <!-- opsi default dari js -->
                                <option value="" selected>--Pilih Kategori--</option>
                            </select>                            
                        </div>
                        <!-- Form Input Data Diri Peserta -->
                        <form action="<?= base_url('PendaftaranController/store'); ?>" method="POST" id="formPeserta" style="display: none;" enctype="multipart/form-data">
                            <input type="hidden" id="kategoriTerpilih" name="kategori_lari">

                            <div class="form-group mb-3">
                                <label for="username">Username</label>
                                <input type="text" id="username" name="username" class="form-control" value="<?= old('username') ?>" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control" value="<?= old('password') ?>" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="namaPeserta">Nama Peserta</label>
                                <input type="text" id="namaPeserta" name="nama_peserta" class="form-control" value="<?= old('nama_peserta') ?>" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="noTelepon">Nomor Telepon</label>
                                <input type="text" id="noTelepon" name="no_telepon" class="form-control" value="<?= old('no_telepon') ?>" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="nik">NIK</label>
                                <input type="text" id="nik" name="nik" class="form-control" value="<?= old('nik') ?>" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control" value="<?= old('email') ?>" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="jenisKelamin">Jenis Kelamin</label>
                                <select id="jenisKelamin" name="jenis_kelamin" class="form-select" value="<?= old('jenis_kelamin') ?>" required>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="buktiBayar">Bukti Pembayaran</label>
                                <input type="file" id="buktiBayar" name="bukti_pembayaran" class="form-control" value="<?= old('bukti_bayar') ?>" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="ukuranBaju">Ukuran Baju</label>
                                <select id="ukuranBaju" name="ukuran_baju" class="form-select" value="<?= old('ukuran_baju') ?>" required>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                    <option value="XXL">XXL</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="asalDaerah">Asal Daerah</label>
                                <input type="text" id="asalDaerah" name="asal_daerah" class="form-control" value="<?= old('asal_daerah') ?>" required>
                            </div>
                            <button type="submit" class="btn btn-custom">Daftar Sekarang</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Right: Form Login -->
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h3>Form Login</h3>
                        <form action="<?= base_url('LoginController'); ?>" method="POST">
                            <div class="form-group mb-3">
                                <label for="loginUsername">Username</label>
                                <input type="text" id="loginUsername" name="username" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="loginPassword">Password</label>
                                <input type="password" id="loginPassword" name="password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-custom">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2025 Lomba Lari | <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
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
