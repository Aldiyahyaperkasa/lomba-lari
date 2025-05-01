<?php
namespace App\Controllers;
use App\Models\PesertaModel;

class LoginController extends BaseController
{
    public function index()
    {
        return view('home/login');
    }

    public function submit()
    {
        $session = session();
        $model = new PesertaModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $peserta = $model->where('username', $username)->first();

        if ($peserta) {
            // Verifikasi password
            if (password_verify($password, $peserta['password'])) {
                // Simpan data ke session
                $session->set([
                    'id_peserta' => $peserta['id_peserta'],
                    'username' => $peserta['username'],
                    'nama_peserta' => $peserta['nama_peserta'],
                    'kategori_lari' => $peserta['kategori_lari'],
                    'logged_in' => true
                ]);
                return redirect()->to('/PesertaController/index');
            } else {
                return redirect()->back()->with('error', 'Password salah');
            }
        } else {
            return redirect()->back()->with('error', 'Akun tidak ditemukan');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/LoginController');
    }

}
