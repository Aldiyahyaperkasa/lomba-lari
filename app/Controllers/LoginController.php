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
        $pesertaModel = new \App\Models\PesertaModel();
        $adminModel = new \App\Models\AdminModel(); // Pastikan kamu sudah buat model untuk admin

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Cek apakah username ada di tabel peserta
        $peserta = $pesertaModel->where('username', $username)->first();
        if ($peserta) {
            if (password_verify($password, $peserta['password'])) {
                $session->set([
                    'id_peserta' => $peserta['id_peserta'],
                    'username' => $peserta['username'],
                    'nama_peserta' => $peserta['nama_peserta'],
                    'kategori_lari' => $peserta['kategori_lari'],
                    'role' => 'peserta',
                    'logged_in' => true
                ]);
                $session->setFlashdata('success', 'Berhasil login sebagai peserta');
                return redirect()->to('/PesertaController/index');
            } else {
                return redirect()->back()->with('error', 'Password salah');
            }
        }

        // Jika tidak ditemukan di peserta, cek di admin
        $admin = $adminModel->where('username', $username)->first();
        if ($admin) {
            if (password_verify($password, $admin['password'])) {
                $session->set([
                    'id_admin' => $admin['id_admin'],
                    'username' => $admin['username'],
                    'nama' => $admin['nama'],
                    'role' => 'admin',
                    'logged_in' => true
                ]);
                return redirect()->to('/AdminController/index');
            } else {
                return redirect()->back()->with('error', 'Password salah');
            }
        }

        return redirect()->back()->with('error', 'Akun tidak ditemukan');
    }


    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }

}
