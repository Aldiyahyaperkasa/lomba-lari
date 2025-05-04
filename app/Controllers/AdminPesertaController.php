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
use App\Libraries\TiketImageGenerator;


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
        
        // Jika kategori lari dipilih, filter berdasarkan kategori tersebut
        if ($kategori_lari) {
            $data['peserta'] = $this->pesertaModel
                ->where('status_pendaftaran', 'Menunggu')
                ->where('kategori_lari', $kategori_lari)
                ->orderBy('tanggal_daftar', 'DESC')
                ->findAll();
        } else {
            // Jika tidak ada kategori lari yang dipilih, tampilkan semua peserta yang menunggu
            $data['peserta'] = $this->pesertaModel
                ->where('status_pendaftaran', 'Menunggu')
                ->orderBy('tanggal_daftar', 'DESC')
                ->findAll();
        }

        $data['title'] = 'Peserta Mendaftar';
        
        return view('admin/peserta/peserta_mendaftar', $data);
    }

    // Peserta yang sudah terkonfirmasi
    public function terkonfirmasi()
    {
        $kategori_lari = $this->request->getGet('kategori_lari');
        
        // Jika kategori lari dipilih, filter berdasarkan kategori tersebut
        if ($kategori_lari) {
            $data['peserta'] = $this->pesertaModel
                ->where('status_pendaftaran', 'Terkonfirmasi')
                ->where('kategori_lari', $kategori_lari)
                ->orderBy('tanggal_daftar', 'DESC')
                ->findAll();
        } else {
            // Jika tidak ada kategori lari yang dipilih, tampilkan semua peserta yang terkonfirmasi
            $data['peserta'] = $this->pesertaModel
                ->where('status_pendaftaran', 'Terkonfirmasi')
                ->orderBy('tanggal_daftar', 'DESC')
                ->findAll();
        }

        $data['title'] = 'Peserta Terkonfirmasi';
        
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
        $peserta['nomor_peserta'] = $nomor;
    } else {
        $this->pesertaModel->update($id, ['status_pendaftaran' => 'Terkonfirmasi']);
    }

    // 5. Generate tiket gambar
    $tiketOutputPath = 'tiket/tiket_' . $peserta['nomor_peserta'] . '.png';
    TiketImageGenerator::generate($peserta, FCPATH . $qrPath, FCPATH . $tiketOutputPath);

    // Menentukan path relatif tiket untuk email
    $tiketRelativePath = 'tiket/tiket_' . $peserta['nomor_peserta'] . '.png';

    // Menentukan path relatif QR untuk email
    $qrRelativePath = 'qrcodes/' . $filename; // Path relatif ke folder qrcodes

    // 6. Kirim tiket melalui email
    $this->sendEmailTiket($peserta, $qrRelativePath, $tiketRelativePath); // Kirim email dengan path QR dan tiket

    return redirect()->back()->with('success', 'Peserta berhasil dikonfirmasi & tiket terkirim.');
}



    public function tolak($id)
    {
        $this->pesertaModel->update($id, ['status_pendaftaran' => 'Ditolak']);
        return redirect()->back()->with('success', 'Peserta berhasil ditolak.');
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
        $mail->Username   = 'aldiyahyap@gmail.com'; // Ganti dengan email pengirim
        $mail->Password   = 'jdnyhxvphotnrvqm';      // App password Gmail
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;

        // Pengirim dan penerima
        $mail->setFrom('aldiyahyap@gmail.com', 'Sangatta Festival Run 2025');
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
    'Berikut juga terlampir tiket Anda.<br><br>' .
    'Terima kasih.';


        // Lampirkan QR code
        $mail->addEmbeddedImage(FCPATH . $qrRelativePath, 'qrcodeimage', 'qr_code.png', 'base64', 'image/png');
        // Lampirkan gambar tiket
        $mail->addAttachment(FCPATH . $tiketRelativePath, 'Tiket_Sangatta_' . $peserta['nomor_peserta'] . '.png');

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
