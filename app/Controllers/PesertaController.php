<?php
namespace App\Controllers;
use App\Models\PesertaModel;
use Dompdf\Dompdf;
use Dompdf\Options;

class PesertaController extends BaseController
{
    public function index()
    {
        $id_peserta = session()->get('id_peserta');
        if (!$id_peserta) {
            return redirect()->to('/login');
        }

        $pesertaModel = new PesertaModel();
        $peserta = $pesertaModel->getPesertaWithKodeQR($id_peserta);


        return view('peserta/dashboard_peserta', ['peserta' => $peserta]);
    }


    public function exportToPDF()
{
    ob_start();

    $id_peserta = session()->get('id_peserta');
    if (!$id_peserta) {
        return redirect()->to('/login');
    }

    $pesertaModel = new \App\Models\PesertaModel();
    $peserta = $pesertaModel->getPesertaWithKodeQR($id_peserta);

    $html = view('peserta/tiket_pdf', ['peserta' => $peserta]);

    $dompdf = new \Dompdf\Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->set_option('isHtml5ParserEnabled', true);
    $dompdf->set_option('isPhpEnabled', true);
    
    $dompdf->render();

    ob_end_clean(); // penting agar tidak ada output sebelum stream

    // Optional: header manual jika stream tidak otomatis mengatur
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="tiket_peserta.pdf"');
    header('Cache-Control: private, max-age=0, must-revalidate');
    header('Pragma: public');

    $dompdf->stream('tiket_peserta.pdf', ['Attachment' => false]); // false = tampil di tab baru
    exit();
}


public function uploadBuktiBayar()
{
    $id_peserta = session()->get('id_peserta');
    if (!$id_peserta) {
        return redirect()->to('/login');
    }

    $file = $this->request->getFile('bukti_pembayaran');

    if ($file->isValid() && !$file->hasMoved()) {
        $newName = $file->getRandomName();
        $file->move('bukti_bayar', $newName);

        $pesertaModel = new \App\Models\PesertaModel();
        $pesertaModel->update($id_peserta, [
            'bukti_pembayaran' => $newName
        ]);

        return redirect()->to('/PesertaController/index')->with('success', 'Bukti pembayaran berhasil diupload.');
    } else {
        return redirect()->to('/PesertaController/index')->with('error', 'Gagal upload bukti pembayaran.');
    }
}



public function edit()
{
    $id_peserta = session()->get('id_peserta');
    if (!$id_peserta) {
        return redirect()->to('/login');
    }

    $pesertaModel = new \App\Models\PesertaModel();
    $peserta = $pesertaModel->getPesertaWithKodeQR($id_peserta);

    if ($peserta['status_pendaftaran'] !== 'Menunggu') {
        return redirect()->to('PesertaController/index')->with('error', 'Data tidak bisa diedit karena sudah dikonfirmasi.');
    }

    return view('peserta/edit_peserta', ['peserta' => $peserta]);
}


public function update($id)
{
    $pesertaModel = new PesertaModel();
    $peserta = $pesertaModel->find($id);

    if (!$peserta) {
        return redirect()->to('/dashboard-peserta')->with('error', 'Peserta tidak ditemukan.');
    }

    $data = $this->request->getPost();

    $validationRules = [
        'nama_peserta' => 'required',
        'tanggal_lahir' => 'required|valid_date',
        'no_telepon' => [
            'label' => 'Nomor Telepon',
            'rules' => 'required|numeric|min_length[11]|max_length[13]|is_unique[peserta.no_telepon,id_peserta,' . $id . ']',
        ],
        'alamat' => 'required',
        'nik' => [
            'label' => 'NIK',
            'rules' => 'required|numeric|exact_length[16]|is_unique[peserta.nik,id_peserta,' . $id . ']',
        ],
        'email' => [
            'label' => 'Email',
            'rules' => 'required|valid_email|is_unique[peserta.email,id_peserta,' . $id . ']',
        ],
        'jenis_kelamin' => 'required',
        'kategori_lari' => 'required',
        'ukuran_baju' => 'required',
        'no_telepon_darurat_1' => 'permit_empty|numeric|min_length[11]|max_length[13]',
        'no_telepon_darurat_2' => 'permit_empty|numeric|min_length[11]|max_length[13]',
    ];


    if (!$this->validate($validationRules)) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    // Proses file upload jika ada
    $file = $this->request->getFile('bukti_pembayaran');
    $buktiBaru = $peserta['bukti_pembayaran'];

    if ($file && $file->isValid() && !$file->hasMoved()) {
        $newName = $file->getRandomName();
        $file->move('bukti_bayar', $newName);
        $buktiBaru = $newName;
    }

    $updateData = [
        'nama_peserta' => $data['nama_peserta'],
        'tanggal_lahir' => $data['tanggal_lahir'],
        'no_telepon' => $data['no_telepon'],
        'alamat' => $data['alamat'],
        'nik' => $data['nik'],
        'email' => $data['email'],
        'jenis_kelamin' => $data['jenis_kelamin'],
        'kategori_lari' => $data['kategori_lari'],
        'ukuran_baju' => $data['ukuran_baju'],
        'riwayat_penyakit' => $data['riwayat_penyakit'] ?? null,
        'no_telepon_darurat_1' => $data['no_telepon_darurat_1'] ?? null,
        'no_telepon_darurat_2' => $data['no_telepon_darurat_2'] ?? null,
        'bukti_pembayaran' => $buktiBaru,
    ];

    $pesertaModel->update($id, $updateData);

    return redirect()->to('/PesertaController/index')->with('success', 'Data peserta berhasil diperbarui.');
}

}