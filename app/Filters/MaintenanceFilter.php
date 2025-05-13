<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class MaintenanceFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $uri = service('uri')->getPath(); // ambil path URL (tanpa domain)

        // Daftar URL yang diizinkan (jika Anda ingin ada pengecualian, misal untuk admin login)
        $allowedRoutes = [
            '',
            'home/maintenance',
            '/', // Tambahkan ini untuk mengizinkan route ke Home::index saat maintenance selesai
        ];

        // Jika bukan route yang diizinkan atau file statis
        if (
            !in_array($uri, $allowedRoutes) &&
            strpos($uri, 'assets/') !== 0 &&
            strpos($uri, 'css/') !== 0 &&
            strpos($uri, 'js/') !== 0 &&
            strpos($uri, 'images/') !== 0 &&
            strpos($uri, 'fonts/') !== 0
        ) {
            // Tampilkan view langsung, tanpa mengubah URL
            echo view('home/maintenance');
            // Hentikan proses eksekusi controller
            exit();
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak melakukan apa-apa
    }
}
