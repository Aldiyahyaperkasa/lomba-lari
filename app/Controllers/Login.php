<?php
namespace App\Controllers;
use App\Models\PesertaModel;

class Login extends BaseController
{
    public function index()
    {
        return view('home/login');
    }

    public function submit()
    {
        // Ambil data dari form
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $email = $this->request->getPost('email');
        $no_hp = $this->request->getPost('no_hp');
        $kategori = $this->request->getPost('kategori');

        // Model untuk menyimpan data peserta
        $pesertaModel = new PesertaModel();

        $data = [
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT), // pastikan password ter-hash
            'email' => $email,
            'no_telepon' => $no_hp,
            'kategori_lari' => $kategori,
            'status_pendaftaran' => 'Menunggu',
            'tanggal_daftar' => date('Y-m-d H:i:s')
        ];

        $pesertaModel->insert($data);

        return redirect()->to('/login')->with('message', 'Pendaftaran berhasil! Silakan login.');
    }
}
