<?php

namespace App\Controllers;

use App\Models\PesertaModel;
use App\Models\KodeQRModel;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use App\Libraries\QRCodeHelper;
use Dompdf\Dompdf;
use Dompdf\Options;

// use App\Libraries\TiketImageGenerator;
use App\Libraries\TiketPDFGenerator;


use CodeIgniter\Email\Email;

class AdminPesertaController extends BaseController
{
    protected $pesertaModel;

    public function __construct()
    {
        $this->pesertaModel = new PesertaModel();
    }

    // Peserta yang mendaftar dan masih menunggu konfirmasi
    public function menunggu()
    {
        $kategori_lari = $this->request->getGet('kategori_lari');
        $search = $this->request->getGet('search');
        $currentPage = $this->request->getVar('page_peserta') ?? 1;

        $this->pesertaModel
            ->where('status_pendaftaran', 'Menunggu');

        if ($kategori_lari) {
            $this->pesertaModel->where('kategori_lari', $kategori_lari);
        }

        if ($search) {
            $this->pesertaModel->groupStart()
                ->like('nama_peserta', $search)
                ->orLike('username', $search)
                ->orLike('email', $search)
                ->groupEnd();
        }

        $data['peserta'] = $this->pesertaModel
            ->orderBy('tanggal_daftar', 'DESC')
            ->paginate(10, 'peserta'); // currentPage tidak perlu, CI4 handle otomatis

        $data['pager'] = $this->pesertaModel->pager;
        $data['title'] = 'Peserta Mendaftar';
        $data['kategori_lari'] = $kategori_lari;
        $data['search'] = $search;

        return view('admin/peserta/peserta_mendaftar', $data);
    }


    // Peserta yang sudah terkonfirmasi
    public function terkonfirmasi()
    {
        $kategori_lari = $this->request->getGet('kategori_lari');
        $search = $this->request->getGet('search');
        $currentPage = $this->request->getVar('page_peserta') ?? 1;

        // Reset query builder
        $this->pesertaModel->resetQuery();

        $this->pesertaModel->where('status_pendaftaran', 'Terkonfirmasi');

        if ($kategori_lari) {
            $this->pesertaModel->where('kategori_lari', $kategori_lari);
        }

        if ($search) {
            $this->pesertaModel->groupStart()
                ->like('nama_peserta', $search)
                ->orLike('username', $search)
                ->orLike('email', $search)
                ->groupEnd();
        }

        $data['peserta'] = $this->pesertaModel
            ->orderBy('tanggal_daftar', 'DESC')
            ->paginate(2, 'peserta'); // 10 peserta per halaman

        $data['pager'] = $this->pesertaModel->pager;
        $data['title'] = 'Peserta Terkonfirmasi';
        $data['kategori_lari'] = $kategori_lari;
        $data['search'] = $search;

        return view('admin/peserta/peserta_terkonfirmasi', $data);
    }


    public function buktiBayar($filename)
    {
        $path = WRITEPATH . '../public/uploads/' . $filename;

        if (!file_exists($path)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("File tidak ditemukan.");
        }

        return response()
            ->download($path, null)
            ->setFileName($filename)
            ->setContentType(mime_content_type($path));
    }

    public function konfirmasi($id)
    {
        $peserta = $this->pesertaModel->find($id);

        if (!$peserta) {
            return redirect()->back()->with('error', 'Peserta tidak ditemukan.');
        }

        // 1. Generate kode QR jika belum ada
        $kodeQR = 'QR-' . strtoupper(bin2hex(random_bytes(4))); // Contoh: QR-1A2B3C4D
        $filename = $kodeQR . '.png';

        // 2. Buat gambar QR code
        $qrPath = QRCodeHelper::generate($kodeQR, $filename); // simpan di public/qrcodes/$filename

        // 3. Simpan data QR ke tabel kode_qr
        $db = \Config\Database::connect();
        $db->table('kode_qr')->insert([
            'id_peserta' => $id,
            'kode_qr' => $kodeQR,
            'qr_code_path' => $qrPath // Path relatif
        ]);

        // 4. Generate nomor peserta jika belum ada
        if (!$peserta['nomor_peserta']) {
            $nomor = $this->pesertaModel->generateNomorPeserta($peserta['kategori_lari']);
            $this->pesertaModel->update($id, [
                'status_pendaftaran' => 'Terkonfirmasi',
                'nomor_peserta' => $nomor
            ]);
        } else {
            $this->pesertaModel->update($id, ['status_pendaftaran' => 'Terkonfirmasi']);
        }

        // Ambil ulang data peserta yang sudah diperbarui dari database
        $peserta = $this->pesertaModel->find($id);
        $peserta['kode_qr'] = $kodeQR;

        // 5. Generate tiket dalam format PDF
        $tiketOutputPath = 'tiket/tiket_' . $peserta['nomor_peserta'] . '.pdf';
        TiketPDFGenerator::generate($peserta, FCPATH . $qrPath, FCPATH . $tiketOutputPath);

        // Menentukan path relatif tiket untuk email
        $tiketRelativePath = 'tiket/tiket_' . $peserta['nomor_peserta'] . '.pdf';

        // Menentukan path relatif QR untuk email
        $qrRelativePath = 'qrcodes/' . $filename; // Path relatif ke folder qrcodes

        // 6. Kirim tiket melalui email
        $this->sendEmailTiket($peserta, $qrRelativePath, $tiketRelativePath); // Kirim email dengan path QR dan tiket

        return redirect()->back()->with('success', 'Peserta berhasil dikonfirmasi & tiket terkirim.');        
        // session()->setFlashdata('peserta_terkonfirmasi', [
        //     'nomor_peserta' => $peserta['nomor_peserta'],
        //     'nik' => $peserta['nik'],
        //     'nama_peserta' => $peserta['nama_peserta'],
        //     'alamat' => $peserta['alamat'],
        //     'ukuran_baju' => $peserta['ukuran_baju'],
        //     'riwayat_penyakit' => $peserta['riwayat_penyakit']
        // ]);

        // return redirect()->back();   
    }



    public function tolak($id)
    {
        $this->pesertaModel->delete($id); 
        return redirect()->back()->with('success', 'Data peserta berhasil dihapus.');
    }



    public function sendEmailTiket($peserta, $qrRelativePath, $tiketRelativePath)
    {
        require_once APPPATH . '../vendor/autoload.php'; // pastikan PHPMailer autoload
        

        $mail = new PHPMailer(true);

        try {
            // Konfigurasi server SMTP Gmail
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'festivalrunsangatta@gmail.com'; // Ganti dengan email pengirim
            // $mail->Username   = 'festivalrunsangatta@gmail.com'; // Ganti dengan email pengirim
            $mail->Password   = 'qhzjrspyzhktiaqp';      // App password Gmail
            // $mail->Password   = 'qhzjrspyzhktiaqp';      // App password Gmail
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = 465;

            // Pengirim dan penerima
            $mail->setFrom('festivalrunsangatta@gmail.com', 'Sangatta Festival Run 2025');
            $mail->addAddress($peserta['email'], $peserta['nama_peserta']);

            // Isi email
            $mail->isHTML(true);
            $mail->Subject = 'Tiket Anda untuk Sangatta Festival Run 2025';

            $qrUrl = base_url($qrRelativePath);
            $tiketUrl = base_url($tiketRelativePath); // Path tiket untuk email

            $mail->Body = 'Halo ' . esc($peserta['nama_peserta']) . ',<br><br>' .
                'Terima kasih telah mendaftar untuk event lari. Berikut adalah tiket Anda:<br>' .
                'Nomor Peserta: ' . esc($peserta['nomor_peserta']) . '<br>' .
                'Kategori Lari: ' . esc($peserta['kategori_lari']) . '<br>' .
                'Ukuran Baju: ' . esc($peserta['ukuran_baju']) . '<br><br>' .
                'Berikut adalah QR Code Anda:<br>' .
                '<img src="' . base_url($qrRelativePath) . '" alt="QR Code" style="max-width:200px;"><br>' .
                'Silakan membawa QR Code saat mengambil nomor peserta dan baju.<br><br>' .
                'Berikut juga terlampir tiket Anda dalam format PDF.<br><br>' .
                'Terima kasih.';

            // Lampirkan tiket dalam format PDF
            $mail->addAttachment(FCPATH . $tiketRelativePath, 'Tiket_Sangatta_' . $peserta['nomor_peserta'] . '.pdf');

            $mail->send();

            session()->setFlashdata('success', 'Email berhasil dikirim ke ' . $peserta['email']);
            return true;

        } catch (Exception $e) {
            log_message('error', 'Email gagal dikirim. Error: ' . $mail->ErrorInfo);
            session()->setFlashdata('error', 'Email gagal dikirim ke ' . $peserta['email']);
            return false;
        }
    }



    // public function kirimEmailTes()
    // {

    //         //Create an instance; passing `true` enables exceptions
    //         $mail = new PHPMailer(true);
    
    //         try {
    //             //Server settings
    //             $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    //             $mail->isSMTP();  
    //             // Konfigurasi pengirim email
    //             $mail->isSMTP();
    //             $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    //             $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    //             $mail->Username   = 'aldiyahyap@gmail.com';                     //SMTP username
    //             $mail->Password   = 'jdnyhxvphotnrvqm';                               //SMTP password
    //             $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    //             $mail->Port       = 465;
    //             $mail->setFrom('aldiyahyap@gmail.com', 'Aldi Yahya');
    //             $mail->addAddress('aldi79473@gmail.com', 'aldi ajah'); // Email penerima
    //             $mail->Subject = 'link soal karyawan';
    //             $mail->Body = 'localhost/pilihanGanda';
    //             $mail->isHTML(true);

    //             // Kirim email
    //             $mail->send();        
                
    //             echo 'Email berhasil dikirim ke:';
    //         } catch (Exception $e) {
    //             echo 'Email gagal dikirim ke: ';
    //         }   
    // }

}
