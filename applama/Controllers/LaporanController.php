<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PesertaModel;
use App\Models\KodeQRModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class LaporanController extends BaseController
{
    protected $PesertaModel;
    protected $KodeQRModel;


    public function __construct()
    {
        $this->PesertaModel = new PesertaModel();
        $this->KodeQRModel = new KodeQRModel();
    }

    public function terkonfirmasi()
    {
        $PesertaModel = new \App\Models\PesertaModel();

        // Ambil parameter filter dan search
        $kategori = $this->request->getGet('kategori');
        $search = $this->request->getGet('search');
        $perPage = $this->request->getGet('perPage') ?? 10;

        // Query builder
        $builder = $PesertaModel->where('status_pendaftaran', 'Terkonfirmasi');

        if ($kategori) {
            $builder->where('kategori_lari', $kategori);
        }

        if ($search) {
            $builder->groupStart()
                ->like('nama_peserta', $search)
                ->orLike('email', $search)
                ->groupEnd();
        }

        // Get paginated result
        $data['peserta'] = $builder->paginate($perPage);
        $data['pager'] = $PesertaModel->pager;

        // Untuk form
        $data['kategoriList'] = $PesertaModel->select('kategori_lari')->distinct()->findColumn('kategori_lari');
        $data['filterKategori'] = $kategori;
        $data['search'] = $search;
        $data['perPage'] = $perPage;

        return view('admin/laporan/laporan_terkonfirmasi', $data);
    }

public function sudahAmbilBaju()
{
    $PesertaModel = new \App\Models\PesertaModel();
    $KodeQRModel = new \App\Models\KodeQRModel();

    // Ambil parameter filter dan search
    $kategori = $this->request->getGet('kategori');
    $search = $this->request->getGet('search');
    $perPage = $this->request->getGet('perPage') ?? 10;

    // Query builder untuk mencari peserta yang status pengambilannya "Sudah Diambil"
    $builder = $PesertaModel->select('peserta.*, kode_qr.status_pengambilan')
                            ->join('kode_qr', 'kode_qr.id_peserta = peserta.id_peserta')
                            ->where('kode_qr.status_pengambilan', 'Sudah Diambil');

    if ($kategori) {
        $builder->where('peserta.kategori_lari', $kategori);
    }

    if ($search) {
        $builder->groupStart()
                ->like('peserta.nama_peserta', $search)
                ->orLike('peserta.email', $search)
                ->groupEnd();
    }

    // Get paginated result
    $data['peserta'] = $builder->paginate($perPage);
    $data['pager'] = $PesertaModel->pager;

    // Untuk form
    $data['kategoriList'] = $PesertaModel->select('kategori_lari')->distinct()->findColumn('kategori_lari');
    $data['filterKategori'] = $kategori;
    $data['search'] = $search;
    $data['perPage'] = $perPage;

    return view('admin/laporan/laporan_sudah_ambil_baju', $data);
}


    public function exportPesertaTerkonfirmasiExcel()
    {
        $kategori = $this->request->getGet('kategori');
        $search = $this->request->getGet('search');

        $query = $this->PesertaModel->where('status_pendaftaran', 'Terkonfirmasi');

        if ($kategori) {
            $query = $query->where('kategori_lari', $kategori);
        }

        if ($search) {
            $query = $query->groupStart()
                ->like('nama_peserta', $search)
                ->orLike('email', $search)
                ->groupEnd();
        }

        $dataPeserta = $query->findAll();

        // Buat Spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama Peserta');
        $sheet->setCellValue('C1', 'No Telepon');
        $sheet->setCellValue('D1', 'Alamat');
        $sheet->setCellValue('E1', 'NIK');
        $sheet->setCellValue('F1', 'Email');
        $sheet->setCellValue('G1', 'Jenis Kelamin');
        $sheet->setCellValue('H1', 'Kategori');
        $sheet->setCellValue('I1', 'Ukuran Baju');
        $sheet->setCellValue('J1', 'Darurat 1');
        $sheet->setCellValue('K1', 'Darurat 2');
        $sheet->setCellValue('L1', 'Status');

        // Isi Data
        $row = 2;
        $no = 1;
        foreach ($dataPeserta as $peserta) {
            $sheet->setCellValue('A' . $row, $no++);
            $sheet->setCellValue('B' . $row, $peserta['nama_peserta']);
            $sheet->setCellValue('C' . $row, $peserta['no_telepon']);
            $sheet->setCellValue('D' . $row, $peserta['alamat']);
            $sheet->setCellValue('E' . $row, $peserta['nik']);
            $sheet->setCellValue('F' . $row, $peserta['email']);
            $sheet->setCellValue('G' . $row, $peserta['jenis_kelamin']);
            $sheet->setCellValue('H' . $row, $peserta['kategori_lari']);
            $sheet->setCellValue('I' . $row, $peserta['ukuran_baju']);
            $sheet->setCellValue('J' . $row, $peserta['no_telepon_darurat_1']);
            $sheet->setCellValue('K' . $row, $peserta['no_telepon_darurat_2']);
            $sheet->setCellValue('L' . $row, $peserta['status_pendaftaran']);
            $row++;
        }

        // Buat file Excel
        $filename = 'laporan_peserta_terkonfirmasi_' . date('Ymd_His') . '.xlsx';
        $writer = new Xlsx($spreadsheet);

        // Download response
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }

    public function exportSudahAmbilBajuExcel()
{
    $kategori = $this->request->getGet('kategori');
    $search = $this->request->getGet('search');

    $builder = $this->PesertaModel->select('peserta.*, kode_qr.status_pengambilan')
                                  ->join('kode_qr', 'kode_qr.id_peserta = peserta.id_peserta')
                                  ->where('kode_qr.status_pengambilan', 'Sudah Diambil');

    if ($kategori) {
        $builder->where('peserta.kategori_lari', $kategori);
    }

    if ($search) {
        $builder->groupStart()
                ->like('peserta.nama_peserta', $search)
                ->orLike('peserta.email', $search)
                ->groupEnd();
    }

    $dataPeserta = $builder->findAll();

    // Buat Spreadsheet
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Header
    $sheet->setCellValue('A1', 'No');
    $sheet->setCellValue('B1', 'Nama Peserta');
    $sheet->setCellValue('C1', 'No Telepon');
    $sheet->setCellValue('D1', 'Alamat');
    $sheet->setCellValue('E1', 'Email');
    $sheet->setCellValue('F1', 'Jenis Kelamin');
    $sheet->setCellValue('G1', 'Kategori');
    $sheet->setCellValue('H1', 'Ukuran Baju');
    $sheet->setCellValue('I1', 'Status Pengambilan');

    // Isi Data
    $row = 2;
    $no = 1;
    foreach ($dataPeserta as $peserta) {
        $sheet->setCellValue('A' . $row, $no++);
        $sheet->setCellValue('B' . $row, $peserta['nama_peserta']);
        $sheet->setCellValue('C' . $row, $peserta['no_telepon']);
        $sheet->setCellValue('D' . $row, $peserta['alamat']);
        $sheet->setCellValue('E' . $row, $peserta['email']);
        $sheet->setCellValue('F' . $row, $peserta['jenis_kelamin']);
        $sheet->setCellValue('G' . $row, $peserta['kategori_lari']);
        $sheet->setCellValue('H' . $row, $peserta['ukuran_baju']);
        $sheet->setCellValue('I' . $row, $peserta['status_pengambilan']);
        $row++;
    }

    // Buat file Excel
    $filename = 'laporan_peserta_sudah_ambil_baju_' . date('Ymd_His') . '.xlsx';
    $writer = new Xlsx($spreadsheet);

    // Download response
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header("Content-Disposition: attachment; filename=\"$filename\"");
    header('Cache-Control: max-age=0');

    $writer->save('php://output');
    exit;
}

}
