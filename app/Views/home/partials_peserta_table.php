<div class="table-responsive mt-3" style="font-size:0.7rem;">
  <table class="table table-striped table-bordered">
    <thead class="table-primary">
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>asal</th>
      </tr>
    </thead>
    <tbody>
      <?php if (!empty($peserta)) : ?>
        <?php $no = 1; foreach ($peserta as $row) : ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= esc($row['nama_peserta']) ?></td>
            <td><?= esc($row['alamat']) ?></td>
          </tr>
        <?php endforeach; ?>
      <?php else : ?>
        <tr>
          <td colspan="4" class="text-center">Belum ada peserta terkonfirmasi.</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>
