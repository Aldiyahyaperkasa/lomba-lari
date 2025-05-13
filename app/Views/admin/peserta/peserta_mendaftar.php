<?= $this->extend('admin/layout'); ?>
<?= $this->section('content'); ?>

<div class="col-12">
  <div class="card shadow border-0">
    <div class="card-body">
      <h5 class="card-title text-dark">Peserta Mendaftar (Menunggu Konfirmasi)</h5>

      <!-- Form Filter Kategori Lari -->
      <form method="get" action="<?= base_url('AdminPesertaController/menunggu'); ?>" class="mb-3">
        <div class="row">
          <div class="col-md-3">
            <select name="kategori_lari" class="form-select">
              <option value="">-- Pilih Kategori Lari --</option>
              <option value="Umum" <?= ($kategori_lari == 'Umum') ? 'selected' : ''; ?>>Umum</option>
              <option value="Pelajar" <?= ($kategori_lari == 'Pelajar') ? 'selected' : ''; ?>>Pelajar</option>
            </select>
          </div>
          <div class="col-md-4">
            <input type="text" name="search" class="form-control" placeholder="Cari nama, username, email" value="<?= esc($search); ?>">
          </div>
          <div class="col-md-3">
            <button type="submit" class="btn btn-primary">Filter & Cari</button>
            <a href="<?= base_url('AdminPesertaController/menunggu'); ?>" class="btn btn-secondary">Reset</a>
          </div>
        </div>
      </form>


      <div class="table-responsive">
        <table class="table table-sm table-striped table-hover align-middle text-nowrap" style="font-size: 0.85rem;">
          <thead class=" text-center align-middle">
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Username</th>
              <th>Email</th>
              <th>No. Telepon</th>
              <th>Kategori</th>
              <th>Jenis Kelamin</th>
              <th>Ukuran Baju</th>
              <th>Tgl Lahir</th>
              <th>Usia</th>
              <th>Alamat</th>
              <th>NIK</th>
              <th>Telp Darurat 1</th>
              <th>Telp Darurat 2</th>
              <th>Riwayat Penyakit</th>
              <th>Bukti Bayar</th>
              <th>Status</th>
              <th>Tanggal Daftar</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($peserta)) : ?>
              <?php $no = 1; foreach ($peserta as $p) : ?>
                <tr class="text-center" style="background-color: <?= ($no % 2 == 0) ? '#f8f9fa' : '#ffffff'; ?>;">
                  <td><?= $no++; ?></td>
                  <td><?= esc($p['nama_peserta']); ?></td>
                  <td><?= esc($p['username']); ?></td>
                  <td><?= esc($p['email']); ?></td>
                  <td><?= esc($p['no_telepon']); ?></td>
                  <td><?= esc($p['kategori_lari']); ?></td>
                  <td><?= esc($p['jenis_kelamin']); ?></td>
                  <td><?= esc($p['ukuran_baju']); ?></td>
                  <td><?= date('d-m-Y', strtotime($p['tanggal_lahir'])); ?></td>
                  <td><?= esc($p['usia']); ?></td>
                  <td><?= esc($p['alamat']); ?></td>
                  <td><?= esc($p['nik']); ?></td>
                  <td><?= esc($p['no_telepon_darurat_1']); ?></td>
                  <td><?= esc($p['no_telepon_darurat_2']); ?></td>
                  <td><?= esc($p['riwayat_penyakit']) ?: '-'; ?></td>
                  <td class="text-center">
                    <?php if (!empty($p['bukti_pembayaran'])) : ?>
                      <a href="<?= base_url('bukti_bayar/' . $p['bukti_pembayaran']); ?>" target="_blank" class="btn btn-sm btn-info">
                        Lihat
                      </a>
                    <?php else : ?>
                      <span class="text-danger">Belum Upload</span>
                    <?php endif; ?>
                  </td>
                  <td class="text-center">
                    <span class="badge bg-warning text-dark"><?= esc($p['status_pendaftaran']); ?></span>
                  </td>
                  <td><?= date('d-m-Y H:i', strtotime($p['tanggal_daftar'])); ?></td>
                  <td class="text-center">
                    <a href="<?= base_url('AdminPesertaController/konfirmasi/' . $p['id_peserta']); ?>" class="btn btn-success btn-sm btn-konfirmasi">Konfirmasi</a>
                    <a href="<?= base_url('AdminPesertaController/tolak/' . $p['id_peserta']); ?>" class="btn btn-danger btn-sm btn-tolak">Tolak</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else : ?>
              <tr>
                <td colspan="19" class="text-center text-muted">Belum ada peserta yang mendaftar.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
      <div class="d-flex justify-content-end mt-3">
        <?= $pager->links('peserta', 'default_full'); ?>
      </div>
    </div>
  </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  // Konfirmasi
  document.querySelectorAll('.btn-konfirmasi').forEach(function(button) {
    button.addEventListener('click', function(e) {
      e.preventDefault();
      const href = this.getAttribute('href');

      Swal.fire({
        title: 'Yakin ingin menyetujui peserta ini?',
        text: "Status akan menjadi 'Terkonfirmasi'!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#0095D9',
        cancelButtonColor: '#f72585',
        confirmButtonText: 'Ya, Konfirmasi!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = href;
        }
      });
    });
  });

  // Tolak
  document.querySelectorAll('.btn-tolak').forEach(function(button) {
    button.addEventListener('click', function(e) {
      e.preventDefault();
      const href = this.getAttribute('href');

      Swal.fire({
        title: 'Yakin ingin menolak peserta ini?',
        text: "Status akan menjadi 'Ditolak'!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#003366',
        cancelButtonColor: '#f72585',
        confirmButtonText: 'Ya, Tolak!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = href;
        }
      });
    });
  });
</script>


    <?php if (session()->getFlashdata('success')) : ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: '<?= session()->getFlashdata('success'); ?>',
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    <?php endif; ?>



<!-- <?php if (session()->getFlashdata('peserta_terkonfirmasi')): 
  $data = session()->getFlashdata('peserta_terkonfirmasi');
?>
<script>
Swal.fire({
    title: 'Peserta Terkonfirmasi!',
    html: `
        <strong>Nomor Peserta:</strong> <?= $data['nomor_peserta']; ?><br>
        <strong>NIK:</strong> <?= $data['nik']; ?><br>
        <strong>Nama:</strong> <?= $data['nama_peserta']; ?><br>
        <strong>Alamat:</strong> <?= $data['alamat']; ?><br>
        <strong>Ukuran Baju:</strong> <?= $data['ukuran_baju']; ?><br>
        <strong>Riwayat Penyakit:</strong> <?= $data['riwayat_penyakit']; ?><br>
        <hr>
        Tiket & QR telah berhasil dikirim ke email peserta.
    `,
    icon: 'success',
    confirmButtonText: 'Tutup',
    customClass: {
        popup: 'text-start'
    }
});
</script>
<?php endif; ?> -->
<?= $this->endSection(); ?>
