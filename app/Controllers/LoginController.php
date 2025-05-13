<?php
namespace App\Controllers;

use App\Models\PesertaModel;
use App\Models\AdminModel;
use App\Models\AdminScanModel;

class LoginController extends BaseController
{
    public function index()
    {
        return view('home/login');
    }

    public function submit()
    {
        $session = session();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $pesertaModel = new PesertaModel();
        $adminModel = new AdminModel();
        $adminScanModel = new AdminScanModel();

        // Cek login sebagai peserta
        $peserta = $pesertaModel->where('username', $username)->first();
        if ($peserta && password_verify($password, $peserta['password'])) {
            $session->set([
                'id_peserta'     => $peserta['id_peserta'],
                'username'       => $peserta['username'],
                'nama_peserta'   => $peserta['nama_peserta'],
                'kategori_lari'  => $peserta['kategori_lari'],
                'role'           => 'peserta',
                'logged_in'      => true
            ]);
            $session->setFlashdata('success', 'Berhasil login sebagai peserta');
            return redirect()->to('/PesertaController/index');
        }

        // Cek login sebagai admin
        $admin = $adminModel->where('username', $username)->first();
        if ($admin && password_verify($password, $admin['password'])) {
            $session->set([
                'id_admin'   => $admin['id_admin'],
                'username'   => $admin['username'],
                'nama'       => $admin['nama'],
                'role'       => 'admin',
                'logged_in'  => true
            ]);
            $session->setFlashdata('success', 'Berhasil login sebagai admin');
            return redirect()->to('/AdminController/index');
        }

        // Cek login sebagai admin_scan
        $adminScan = $adminScanModel->where('username', $username)->first();
        if ($adminScan && password_verify($password, $adminScan['password'])) {
            $session->set([
                'id_admin'   => $adminScan['id_admin'],
                'username'   => $adminScan['username'],
                'nama'       => $adminScan['nama'],
                'role'       => 'admin_scan',
                'logged_in'  => true
            ]);
            $session->setFlashdata('success', 'Berhasil login sebagai admin scan');
            return redirect()->to('/AdminScanController/index');
        }

        // Jika semua gagal
        return redirect()->back()->with('error', 'Username atau password salah');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
