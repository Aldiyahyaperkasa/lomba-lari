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
        'tanggal_lahir' => 'required|valid_date',
        'no_telepon' => [
            'label' => 'Nomor Telepon',
            'rules' => 'required|numeric|min_length[11]|max_length[13]|is_unique[peserta.no_telepon]',
            'errors' => [
                'required' => 'Nomor telepon wajib diisi.',
                'numeric' => 'Nomor telepon harus berupa angka.',
                'min_length' => 'Nomor telepon minimal 11 angka.',
                'max_length' => 'Nomor telepon maksimal 13 angka.',
                'is_unique' => 'Nomor telepon sudah digunakan.'
            ]
        ],
        'alamat' => 'required',
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
        'kategori_lari' => 'required',
        'ukuran_baju' => 'required',
        'usia' => 'required|numeric',
        'no_telepon_darurat_1' => [
            'label' => 'Nomor Telepon Darurat Pertama',
            'rules' => 'permit_empty|numeric|min_length[11]|max_length[13]',
            'errors' => [
                'numeric' => 'Nomor telepon darurat pertama harus berupa angka.',
                'min_length' => 'Nomor telepon darurat pertama minimal 11 angka.',
                'max_length' => 'Nomor telepon darurat pertama maksimal 13 angka.',
            ]
        ],
        'no_telepon_darurat_2' => [
            'label' => 'Nomor Telepon Darurat Kedua',
            'rules' => 'permit_empty|numeric|min_length[11]|max_length[13]',
            'errors' => [
                'numeric' => 'Nomor telepon darurat kedua harus berupa angka.',
                'min_length' => 'Nomor telepon darurat kedua minimal 11 angka.',
                'max_length' => 'Nomor telepon darurat kedua maksimal 13 angka.',
            ]
        ]
    ];

    if (!$this->validate($rules)) {
        return redirect()->back()
            ->withInput()
            ->with('validation_errors', $validation->getErrors());
    }

    $pesertaModel = new \App\Models\PesertaModel();

    $riwayatPenyakit = $this->request->getPost('riwayat_penyakit');
    $riwayatPenyakit = $riwayatPenyakit ? $riwayatPenyakit : 'Tidak ada riwayat penyakit';

    $data = [
        'username' => $this->request->getPost('username'),
        'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        'nama_peserta' => $this->request->getPost('nama_peserta'),
        'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
        'no_telepon' => $this->request->getPost('no_telepon'),
        'alamat' => $this->request->getPost('alamat'),
        'nik' => $this->request->getPost('nik'),
        'email' => $this->request->getPost('email'),
        'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
        'kategori_lari' => $this->request->getPost('kategori_lari'),
        'ukuran_baju' => $this->request->getPost('ukuran_baju'),
        'usia' => $this->request->getPost('usia'),
        'no_telepon_darurat_1' => $this->request->getPost('no_telepon_darurat_1'),
        'no_telepon_darurat_2' => $this->request->getPost('no_telepon_darurat_2'),
        'riwayat_penyakit' => $riwayatPenyakit,
        'status_pendaftaran' => 'Menunggu',
    ];

    if ($pesertaModel->insert($data)) {
        return redirect()->to('/')->with('success', 'Pendaftaran berhasil!');
    } else {
        return redirect()->back()->withInput()->with('error', 'Gagal menyimpan data peserta.');
    }
}


}
