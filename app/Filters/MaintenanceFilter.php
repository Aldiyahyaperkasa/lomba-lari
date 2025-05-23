<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class MaintenanceFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!env('app.maintenance')) {
            return; // Maintenance mode tidak aktif, lanjutkan request
        }
        
        $uri = trim(service('uri')->getPath(), '/'); // buang slash awal/akhir agar lebih akurat

        // Rute yang diizinkan
        $allowedRoutes = [
            '', // ini untuk sangattafestivalrun.com/
            'home/maintenance',
        ];

        if (
            !in_array($uri, $allowedRoutes) &&
            strpos($uri, 'assets/') !== 0 &&
            strpos($uri, 'css/') !== 0 &&
            strpos($uri, 'js/') !== 0 &&
            strpos($uri, 'images/') !== 0 &&
            strpos($uri, 'fonts/') !== 0
        ) {
            echo view('home/maintenance');
            exit();
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak perlu apa-apa di sini
    }
}
