<?= $this->extend('admin/layout'); ?>
<?= $this->section('content'); ?>

<div class="col-12">
  <div class="card" style="border-top: 5px solid #0095D9;">
    <div class="card-body">
      <h5 class="card-title" style="color: #003366;">
        <i class="bi bi-people-fill me-2" style="color: #0095D9;"></i>
        Peserta Terkonfirmasi
      </h5>
      
      <!-- Form Filter Kategori Lari -->
      <form method="get" action="<?= base_url('AdminPesertaController/terkonfirmasi'); ?>" class="mb-3">
        <div class="row">
          <div class="col-md-3">
            <select name="kategori_lari" class="form-select">
              <option value="">-- Pilih Kategori Lari --</option>
              <option value="Umum" <?= ($kategori_lari == 'Umum') ? 'selected' : ''; ?>>Umum</option>
              <option value="Pelajar" <?= ($kategori_lari == 'Pelajar') ? 'selected' : ''; ?>>Pelajar</option>
            </select>
          </div>
          <div class="col-md-3">
            <input type="text" name="search" class="form-control" placeholder="Cari nama/email/username" value="<?= esc($search); ?>">
          </div>
          <div class="col-md-3">
            <button type="submit" class="btn btn-primary">Filter</button>
            <a href="<?= base_url('AdminPesertaController/terkonfirmasi'); ?>" class="btn btn-secondary">Reset</a>
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
              <th>Kode Unik Peserta</th>
              <th>Tanggal Daftar</th>
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
                    <span class="badge bg-success"><?= esc($p['status_pendaftaran']); ?></span>
                  </td>
                  <td><?= esc($p['nomor_peserta']) ?: '-'; ?></td>
                  <td><?= date('d-m-Y H:i', strtotime($p['tanggal_daftar'])); ?></td>
                </tr>
              <?php endforeach; ?>
            <?php else : ?>
              <tr>
                <td colspan="19" class="text-center text-muted">Belum ada peserta yang terkonfirmasi.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>        
      </div>
      <div class="d-flex justify-content-end m-3 ">
        <?= $pager->links('peserta', 'default_full'); ?>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>
