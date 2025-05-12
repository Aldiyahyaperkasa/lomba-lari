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
        $id_peserta = session()->get('id_peserta');
        if (!$id_peserta) {
            return redirect()->to('/login');
        }

        $pesertaModel = new PesertaModel();
        $peserta = $pesertaModel->getPesertaWithKodeQR($id_peserta);

        // Load the HTML view into PDF
        $html = view('peserta/tiket_pdf', ['peserta' => $peserta]);

        // Initialize Dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Set paper size
        $dompdf->setPaper('A4', 'potrait');
         $dompdf->set_option('isHtml5ParserEnabled', true); // Mengaktifkan HTML5 Parser
        $dompdf->set_option('isPhpEnabled', true); // Mengaktifkan PHP jika diperlukan
        $dompdf->render();
        $dompdf->render();
        

        // Render PDF (first pass)
        $dompdf->render();

        // Stream the PDF to browser
        $dompdf->stream('peserta_info.pdf', array('Attachment' => 0)); // 0 means to display in browser
    }

}