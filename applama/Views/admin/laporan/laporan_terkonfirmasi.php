<?= $this->extend('admin/layout'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="card" style="border-top: 5px solid #0095D9;">
        <div class="card-body">
            <h5 class="card-title" style="color: #003366;">
                <i class="bi bi-people-fill me-2" style="color: #0095D9;"></i>
                Laporan Peserta Terkonfirmasi
            </h5>
            <!-- Filter Form -->
            <form method="get" class="row g-3 align-items-end mb-4">
                <div class="col-md-4">
                    <label for="kategori" class="form-label">Kategori Lari</label>
                    <select name="kategori" class="form-select">
                        <option value="">Semua Kategori</option>
                        <?php foreach ($kategoriList as $kategori) : ?>
                            <option value="<?= $kategori ?>" <?= ($kategori == $filterKategori) ? 'selected' : '' ?>>
                                <?= $kategori ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="search" class="form-label">Pencarian</label>
                    <input type="text" name="search" class="form-control" placeholder="Nama atau email" value="<?= esc($search) ?>">
                </div>                
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-search me-1"></i>Tampilkan
                    </button>
                </div>
                <div class="col-md-2">
                    <a href="<?= base_url('LaporanController/exportPesertaTerkonfirmasiExcel?kategori=' . $filterKategori . '&search=' . $search) ?>" class="btn btn-success w-100" target="_blank">
                        <i class="bi bi-file-earmark-excel me-1"></i>Export Excel
                    </a>
                </div>
            </form>

            <!-- Tabel Data -->
            <div class="table-responsive">
                <table class="table table-sm table-striped table-hover align-middle text-nowrap">
                    <thead class="">
                        <tr>
                            <th>No</th>
                            <th>Nama Peserta</th>
                            <th>No Telepon</th>
                            <th>Alamat</th>
                            <th>NIK</th>
                            <th>Email</th>
                            <th>Jenis Kelamin</th>
                            <th>Kategori</th>
                            <th>Ukuran Baju</th>
                            <th>Darurat 1</th>
                            <th>Darurat 2</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($peserta)) : ?>
                            <?php $no = 1 + ($pager->getCurrentPage() - 1) * $pager->getPerPage(); ?>
                            <?php foreach ($peserta as $row) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td class="text-start"><?= esc($row['nama_peserta']); ?></td>
                                    <td><?= esc($row['no_telepon']); ?></td>
                                    <td class="text-start"><?= esc($row['alamat']); ?></td>
                                    <td><?= esc($row['nik']); ?></td>
                                    <td><?= esc($row['email']); ?></td>
                                    <td><?= esc($row['jenis_kelamin']); ?></td>
                                    <td>
                                        <span class="badge bg-info text-dark">
                                            <i class="bi bi-flag-fill me-1"></i><?= esc($row['kategori_lari']); ?>
                                        </span>
                                    </td>
                                    <td><?= esc($row['ukuran_baju']); ?></td>
                                    <td><?= esc($row['no_telepon_darurat_1']); ?></td>
                                    <td><?= esc($row['no_telepon_darurat_2']); ?></td>
                                    <td>
                                        <span class="badge bg-success">
                                            <i class="bi bi-check-circle-fill me-1"></i><?= esc($row['status_pendaftaran']); ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="12" class="text-center text-muted">Tidak ada data yang sesuai.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-end mt-3">
                <?= $pager->links() ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
