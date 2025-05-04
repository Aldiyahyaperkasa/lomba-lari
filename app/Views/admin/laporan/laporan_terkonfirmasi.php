<?= $this->extend('admin/layout'); ?>
<?= $this->section('content'); ?>

<div class="container mt-5">
    <div class="card" style="border-top: 5px solid #0095D9;">
        <div class="card-body">
            <h5 class="card-title" style="color: #003366;">
                <i class="bi bi-people-fill me-2" style="color: #0095D9;"></i>
                Laporan Peserta Terkonfirmasi | <span style="color: #0095D9;">Umum</span>
            </h5>

            <div class="table-responsive">
                <table class="table table-sm table-stripped table-hover align-middle text-center">
                <thead class="">
                    <tr>
                    <th>No</th>
                    <th>Nama Peserta</th>
                    <th>Email</th>
                    <th>No Telepon</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($peserta)) : ?>
                    <?php $no = 1; foreach ($peserta as $row) : ?>
                        <tr>
                        <td><?= $no++; ?></td>
                        <td class="text-start"><?= esc($row['nama_peserta']); ?></td>
                        <td><?= esc($row['email']); ?></td>
                        <td><?= esc($row['no_telepon']); ?></td>
                        <td class="text-start"><?= esc($row['alamat']); ?></td>
                        <td><?= esc($row['jenis_kelamin']); ?></td>
                        <td>
                            <span class="badge bg-info text-dark">
                            <i class="bi bi-flag-fill me-1"></i><?= esc($row['kategori_lari']); ?>
                            </span>
                        </td>
                        <td>
                            <span class="badge bg-success">
                            <i class="bi bi-check-circle-fill me-1"></i><?= esc($row['status_pendaftaran']); ?>
                            </span>
                        </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php else : ?>
                    <tr>
                        <td colspan="8" class="text-center text-muted">Belum ada peserta yang terkonfirmasi.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
