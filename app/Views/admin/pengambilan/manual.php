<?= $this->extend('admin/layout'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="card shadow" style="border-top: 5px solid #0095D9;">
        <div class="card-body">
            <h5 class="card-title" style="color: #003366;">
                <i class="bi bi-person-check-fill me-2" style="color: #0095D9;"></i>
                Pengambilan Baju Manual
            </h5>

            <form method="get" action="" class="row g-3 align-items-end mb-4">
                <div class="col-md-10">
                    <input type="text" name="keyword" class="form-control" placeholder="Cari nama, NIK, kategori, atau Kode Unik Peserta..." value="<?= esc($keyword) ?>">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-search me-1"></i>Cari
                    </button>
                </div>
            </form>

            <?php if (!empty($peserta)) : ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle text-nowrap table-sm mt-3">
                    <thead class="">
                        <tr>
                            <th>Nama</th>
                            <th>Kode Unik Peserta</th>
                            <th>Kategori</th>
                            <th>NIK</th>
                            <th>Status Pendaftaran</th>
                            <th>Status Pengambilan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($peserta as $p) :
                            $qr = (new \App\Models\KodeQRModel())->where('id_peserta', $p['id_peserta'])->first();
                        ?>
                        <tr>
                            <td><?= esc($p['nama_peserta']) ?></td>
                            <td><?= esc($p['nomor_peserta']) ?></td>
                            <td><span class="badge bg-warning text-dark"><?= esc($p['kategori_lari']) ?></span></td>
                            <td><?= esc($p['nik']) ?></td>
                            <td>
                                <?php if ($p['status_pendaftaran'] === 'Terkonfirmasi') : ?>
                                    <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>Terkonfirmasi</span>
                                <?php elseif ($p['status_pendaftaran'] === 'Ditolak') : ?>
                                    <span class="badge bg-danger"><i class="bi bi-x-circle me-1"></i>Ditolak</span>
                                <?php else : ?>
                                    <span class="badge bg-warning text-dark"><i class="bi bi-hourglass-split me-1"></i>Menunggu</span>
                                <?php endif ?>
                            </td>                            
                            <td>
                                <?php if (($qr['status_pengambilan'] ?? '') === 'Sudah Diambil') : ?>
                                    <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>Diambil</span>
                                <?php else : ?>
                                    <span class="badge bg-secondary">Belum</span>
                                <?php endif ?>
                            </td>
                            <td>
                                <?php if (($qr['status_pengambilan'] ?? '') !== 'Sudah Diambil') : ?>
                                    <form method="post" action="<?= base_url('admin/pengambilan/update/' . $p['id_peserta']) ?>">
                                        <?= csrf_field() ?>
                                        <button type="submit" class="btn btn-sm btn-success">
                                            <i class="bi bi-check-circle me-1"></i>Sudah Ambil
                                        </button>
                                    </form>
                                <?php else : ?>
                                    <span class="text-success fw-bold">✅</span>
                                <?php endif ?>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <?php elseif ($keyword) : ?>
                <div class="alert alert-warning text-center mt-4">
                    Tidak ada peserta ditemukan untuk pencarian: <strong><?= esc($keyword) ?></strong>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
