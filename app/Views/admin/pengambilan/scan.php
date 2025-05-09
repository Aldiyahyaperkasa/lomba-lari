<?= $this->extend('admin/layout'); ?>
<?= $this->section('content'); ?>

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
                <div id="preview-container" style="width: 100%; max-width: 400px; margin: 0 auto; border: 3px solid #FFD700; border-radius: 10px; position: relative;">
                    <div id="preview" style="width: 100%; height: 300px; border-radius: 10px;"></div>
                    <div id="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(255,255,255,0.6); border-radius: 10px; display: none; z-index: 10;"></div>
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

            <form id="formScan" method="post" action="<?= base_url('admin/pengambilan/scan') ?>">
                <input type="hidden" name="kode_qr" id="kode_qr_input">
            </form>
        </div>
    </div>
</div>

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


<?php if (session()->getFlashdata('success')) : ?>
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: '<?= session()->getFlashdata('success') ?>',
        confirmButtonColor: '#0095D9'
    });
</script>
<?php elseif (session()->getFlashdata('error')) : ?>
<script>
    Swal.fire({
        icon: 'error',
        title: 'Gagal!',
        text: '<?= session()->getFlashdata('error') ?>',
        confirmButtonColor: '#f72585'
    });
</script>
<?php endif; ?>

<?= $this->endSection(); ?>
