<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= base_url('assets/gambar/logo.png') ?>" type="image/x-icon">
    <title>Admin Scan - Sangatta Festival Run 2025</title>

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


    <style>
        #preview {
            position: relative;
            width: 100%;
            padding-top: 100%;
            border-radius: 10px;
            overflow: hidden;
        }

        #preview video {
            position: absolute !important;
            top: 0;
            left: 0;
            width: 100% !important;
            height: 100% !important;
            object-fit: cover;
            border-radius: 10px;
        }

        #overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255,255,255,0.6);
            border-radius: 10px;
            display: none;
            z-index: 10;
        }

        .scanner-container {
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
            border: 3px solid #FFD700;
            border-radius: 10px;
            position: relative;
        }        
    </style>
    
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
          <a class="nav-link" style="background-color:#003366;" href="<?= site_url('/AdminScanController/index') ?>" >
            <i class="bi bi-grid text-light"></i>
            <span class="text-light">Scan</span>
          </a>
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
            <div class="container">
                <div class="card shadow" style="border-top: 5px solid #f72585;">
                    <div class="card-body">
                        <h5 class="card-title" style="color: #003366;">
                            <i class="bi bi-qr-code-scan me-2" style="color: #f72585;"></i>
                            Scan QR Code Pengambilan Baju
                        </h5>

                        <div class="alert alert-info mb-4" style="background-color: #0095D9; color: white;">
                            Pilih perangkat kamera, lalu klik "Mulai Scan" dan arahkan ke QR Code peserta.
                        </div>

                        <!-- Dropdown kamera -->
                        <div class="mb-3 text-center">
                            <select id="cameraSelect" class="form-select w-50 mx-auto">
                                <option value="" disabled selected>Pilih Kamera</option>
                            </select>
                        </div>

                        <!-- Preview box -->
                        <div class="text-center mb-3">
                            <div id="preview-container" class="scanner-container">
                                <div id="preview"></div>
                                <div id="overlay"></div>
                            </div>
                        </div>

                        <!-- Tombol kontrol -->
                        <div class="text-center mb-4">
                            <button id="startScanBtn" class="btn btn-success me-2" style="background-color: #0095D9; border: none;">
                                <i class="bi bi-play-circle me-1"></i> Mulai Scan
                            </button>
                            <button id="stopScanBtn" class="btn btn-danger" style="background-color: #f72585; border: none;" disabled>
                                <i class="bi bi-stop-circle me-1"></i> Hentikan Scan
                            </button>
                        </div>

                        <form id="formScan" method="post" action="<?= base_url('AdminScanController/prosesScan') ?>">
                            <input type="hidden" name="kode_qr" id="kode_qr_input">
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </section>
    </main>


<script src="https://unpkg.com/html5-qrcode"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    const html5QrCode = new Html5Qrcode("preview");
    let isScanning = false;

    const startBtn = document.getElementById("startScanBtn");
    const stopBtn = document.getElementById("stopScanBtn");
    const overlay = document.getElementById("overlay");
    const cameraSelect = document.getElementById("cameraSelect");

    let cameras = [];

    // Ambil semua kamera
    Html5Qrcode.getCameras().then(devices => {
        cameras = devices;
        if (devices.length > 0) {
            devices.forEach(device => {
                const option = document.createElement("option");
                option.value = device.id;
                option.text = device.label || `Kamera ${cameraSelect.length}`;
                cameraSelect.appendChild(option);
            });
        }
    }).catch(err => {
        console.error("Camera error:", err);
        alert("Tidak bisa mengakses kamera.");
    });

    startBtn.addEventListener("click", () => {
        const selectedCameraId = cameraSelect.value;
        if (!selectedCameraId) {
            alert("Silakan pilih kamera terlebih dahulu.");
            return;
        }

        if (!isScanning) {
            html5QrCode.start(
                selectedCameraId,
                { fps: 10, qrbox: 250 },
                qrCodeMessage => {
                    html5QrCode.stop().then(() => {
                        isScanning = false;
                        toggleButtons();
                        showOverlay(true);
                        document.getElementById('kode_qr_input').value = qrCodeMessage;
                        document.getElementById('formScan').submit();
                    });
                },
                errorMessage => {
                    // silent error
                }
            ).then(() => {
                isScanning = true;
                toggleButtons();
                showOverlay(false);
            });
        }
    });

    stopBtn.addEventListener("click", () => {
        if (isScanning) {
            html5QrCode.stop().then(() => {
                isScanning = false;
                toggleButtons();
                showOverlay(true);
            });
        }
    });

    function toggleButtons() {
        startBtn.disabled = isScanning;
        stopBtn.disabled = !isScanning;
    }

    function showOverlay(show) {
        overlay.style.display = show ? "block" : "none";
    }

    // Tampilkan overlay di awal
    showOverlay(true);
</script>


<?php if (session()->getFlashdata('success_detail')) :
    $detail = session()->getFlashdata('success_detail'); ?>
<script>
    Swal.fire({
        icon: 'success',
        title: 'Pengambilan Baju Berhasil!',
        html: `
            <strong>Kode Unik Peserta:</strong> <?= esc($detail['nomor_peserta']) ?><br>
            <strong>NIK:</strong> <?= esc($detail['nik']) ?><br>
            <strong>Nama:</strong> <?= esc($detail['nama_peserta']) ?><br>
            <strong>Alamat:</strong> <?= esc($detail['alamat']) ?><br>
            <strong>Ukuran Baju:</strong> <?= esc($detail['ukuran_baju']) ?><br>
            <strong>Riwayat Penyakit:</strong> <?= esc($detail['riwayat_penyakit']) ?>
        `,
        confirmButtonColor: '#0095D9'
    });
</script>
<?php endif; ?>

<?php if (session()->getFlashdata('sudah_diambil')) :
    $peserta = session()->getFlashdata('sudah_diambil'); ?>
<script>
    Swal.fire({
        icon: 'warning',
        title: 'Baju Sudah Pernah Diambil!',
        html: `
            <strong>Kode Unik Peserta:</strong> <?= esc($peserta['nomor_peserta']) ?><br>
            <strong>Nama:</strong> <?= esc($peserta['nama_peserta']) ?><br>
            Anda sudah mengambil baju sebelumnya.
        `,
        confirmButtonColor: '#ffa500'
    });
</script>
<?php endif; ?>


<?php if (session()->getFlashdata('error')) : ?>
<script>
    Swal.fire({
        icon: 'error',
        title: 'Gagal!',
        text: '<?= session()->getFlashdata('error') ?>',
        confirmButtonColor: '#f72585'
    });
</script>
<?php endif; ?>
  </body>
</html>
