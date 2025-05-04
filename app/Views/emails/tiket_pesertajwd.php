<h2>Tiket Sangatta Festival Run 2025</h2>
<p>Berikut adalah detail pendaftaran Anda:</p>

<ul>
  <li><strong>Nama:</strong> <?= esc($peserta['nama_peserta']) ?></li>
  <li><strong>NIK:</strong> <?= esc($peserta['nik']) ?></li>
  <li><strong>Ukuran Baju:</strong> <?= esc($peserta['ukuran_baju']) ?></li>
  <li><strong>Nomor Peserta:</strong> <?= esc($peserta['nomor_peserta']) ?></li>
</ul>

<p><strong>Kode QR:</strong></p>
<img src="<?= $qr_path ?>" alt="QR Code Tiket" width="250">

<p>Tunjukkan email ini saat pengambilan baju dan perlengkapan.</p>
