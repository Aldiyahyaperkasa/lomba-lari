<?php

namespace App\Controllers;
use App\Models\PesertaModel;
use CodeIgniter\Files\File;


class PendaftaranController extends BaseController
{

    protected $pesertaModel;

    public function __construct()
    {
        $this->pesertaModel = new PesertaModel();
    }

public function getKuotaSemua()
{
    $umum = $this->pesertaModel->countPesertaByKategoriAndStatus('Umum');
    $pelajar = $this->pesertaModel->countPesertaByKategoriAndStatus('Pelajar');

    return $this->response->setJSON([
        'umumCount' => $umum,
        'pelajarCount' => $pelajar
    ]);
}


public function store()
{
    $validation = \Config\Services::validation();

    $rules = [
        'username' => [
            'label' => 'Username',
            'rules' => 'required|min_length[3]|max_length[20]|is_unique[peserta.username]',
            'errors' => [
                'required' => 'Username wajib diisi.',
                'min_length' => 'Username minimal 3 karakter.',
                'max_length' => 'Username maksimal 20 karakter.',
                'is_unique' => 'Username sudah digunakan.'
            ]
        ],
        'password' => [
            'label' => 'Password',
            'rules' => 'required|min_length[6]|regex_match[/^(?=.*[a-zA-Z])(?=.*\d).+$/]',
            'errors' => [
                'required' => 'Password wajib diisi.',
                'min_length' => 'Password minimal 6 karakter.',
                'regex_match' => 'Password harus mengandung huruf dan angka.'
            ]
        ],
        'nama_peserta' => 'required',
        'no_telepon' => [
            'label' => 'Nomor Telepon',
            'rules' => 'required|numeric|min_length[11]|max_length[13]|is_unique[peserta.no_telepon]',
            'errors' => [
                'required' => 'Nomor telepon wajib diisi.',
                'numeric' => 'Nomor telepon harus berupa angka.',
                'min_length' => 'Nomor telepon minimal 12 angka.',
                'max_length' => 'Nomor telepon maksimal 13 angka.',
                'is_unique' => 'Nomor telepon sudah digunakan.'
            ]
        ],
        'nik' => [
            'label' => 'NIK',
            'rules' => 'required|numeric|exact_length[16]|is_unique[peserta.nik]',
            'errors' => [
                'required' => 'NIK wajib diisi.',
                'numeric' => 'NIK harus berupa angka.',
                'exact_length' => 'NIK harus terdiri dari 16 angka.',
                'is_unique' => 'NIK sudah digunakan.'
            ]
        ],
        'email' => [
            'label' => 'Email',
            'rules' => 'required|valid_email|is_unique[peserta.email]',
            'errors' => [
                'required' => 'Email wajib diisi.',
                'valid_email' => 'Format email tidak valid.',
                'is_unique' => 'Email sudah digunakan.'
            ]
        ],
        'jenis_kelamin' => 'required',
        'ukuran_baju' => 'required',
        'asal_daerah' => 'required',
        'kategori_lari' => 'required',
        'bukti_pembayaran' => [
            'label' => 'Bukti Pembayaran',
            'rules' => 'uploaded[bukti_pembayaran]|max_size[bukti_pembayaran,10240]|is_image[bukti_pembayaran]',
            'errors' => [
                'uploaded' => 'Bukti pembayaran wajib diunggah.',
                'max_size' => 'Ukuran file maksimal 10 MB.',
                'is_image' => 'File harus berupa gambar.'
            ]
        ]
    ];

    if (!$this->validate($rules)) {
        return redirect()->back()
            ->withInput()
            ->with('validation_errors', $validation->getErrors());
    }

    $pesertaModel = new PesertaModel();
    $file = $this->request->getFile('bukti_pembayaran');
    $fileName = time() . '_' . $file->getRandomName();

    if ($file->isValid() && !$file->hasMoved()) {
        $file->move(FCPATH . 'bukti_bayar', $fileName);
    } else {
        return redirect()->back()->withInput()->with('error', 'Gagal mengunggah bukti pembayaran.');
    }

    $data = [
        'username' => $this->request->getPost('username'),
        'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        'nama_peserta' => $this->request->getPost('nama_peserta'),
        'no_telepon' => $this->request->getPost('no_telepon'),
        'nik' => $this->request->getPost('nik'),
        'email' => $this->request->getPost('email'),
        'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
        'ukuran_baju' => $this->request->getPost('ukuran_baju'),
        'asal_daerah' => $this->request->getPost('asal_daerah'),
        'status_pendaftaran' => 'Menunggu',
        'bukti_pembayaran' => $fileName,
        'kategori_lari' => $this->request->getPost('kategori_lari'),
    ];

    if ($pesertaModel->insert($data)) {
        return redirect()->to('/')->with('success', 'Pendaftaran berhasil!');
    } else {
        return redirect()->back()->withInput()->with('error', 'Gagal menyimpan data peserta.');
    }
}


}
