<?php

namespace App\Controllers;
use App\Models\BarangModel;
use App\Models\KategoriModel;
use Dompdf\Dompdf;
use Dompdf\Options;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;


class Barang extends BaseController
{
    protected $barang, $kategori;
    public function __construct()
    {
        $this->barang = new BarangModel();
        $this->kategori = new KategoriModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Barang',
            'barang' => $this->barang->getWithKategori()
        ];
        return view('barang/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Barang',
            'kategori' => $this->kategori->findAll()
        ];
        return view('barang/form', $data);
    }

    public function store()
    {
        $this->barang->save($this->request->getPost());
        return redirect()->to('/barang');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Barang',
            'barang' => $this->barang->find($id),
            'kategori' => $this->kategori->findAll()
        ];
        return view('barang/form', $data);
    }

    public function update($id)
    {
        $this->barang->update($id, $this->request->getPost());
        return redirect()->to('/barang');
    }

    public function delete($id)
    {
        $this->barang->delete($id);
        return redirect()->to('/barang');
    }

public function exportExcel()
{
    $barangModel = new \App\Models\BarangModel();
    $dataBarang = $barangModel->getWithKategori(); // pastikan method ini ada

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Header kolom
    $sheet->setCellValue('A1', 'No');
    $sheet->setCellValue('B1', 'Nama Barang');
    $sheet->setCellValue('C1', 'Kategori');
    $sheet->setCellValue('D1', 'Harga');

    $row = 2;
    $no = 1;
    foreach ($dataBarang as $barang) {
        $sheet->setCellValue('A' . $row, $no++);
        $sheet->setCellValue('B' . $row, $barang['nama']);
        $sheet->setCellValue('C' . $row, $barang['kategori_nama'] ?? '-');
        $sheet->setCellValue('D' . $row, $barang['harga']);
        $row++;
    }

    // Buat file Excel
    $writer = new Xlsx($spreadsheet);

    // Output tanpa karakter tambahan
    ob_clean(); // bersihkan output buffer agar tidak merusak file
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Data_Barang.xlsx"');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');
    exit;
}


public function importExcel()
{
    $file = $this->request->getFile('file_excel');
    if ($file->isValid() && !$file->hasMoved()) {
        $newName = $file->getRandomName();
        $file->move(WRITEPATH . 'uploads', $newName);

        $spreadsheet = IOFactory::load(WRITEPATH . 'uploads/' . $newName);
        $sheet = $spreadsheet->getActiveSheet()->toArray();

        // Ambil semua kategori dari database
        $kategoriList = $this->kategori->findAll();
        $kategoriNamaToID = [];
        foreach ($kategoriList as $kat) {
            $kategoriNamaToID[strtolower($kat['nama'])] = $kat['id'];
        }

        foreach ($sheet as $key => $row) {
            if ($key == 0) continue; // Skip baris header

            $namaBarang = trim($row[1] ?? '');
            $namaKategori = strtolower(trim($row[2] ?? ''));
            $harga = (int)($row[3] ?? 0);

            // Konversi nama kategori ke ID
            $kategori_id = $kategoriNamaToID[$namaKategori] ?? null;

            if ($namaBarang !== '' && $kategori_id) {
                $this->barang->save([
                    'nama' => $namaBarang,
                    'harga' => $harga,
                    'stok' => 0, // default karena tidak tersedia di Excel
                    'kategori_id' => $kategori_id
                ]);
            }
        }
    }

    return redirect()->to('/barang')->with('success', 'Data berhasil diimport');
}



public function listImportedFiles()
{
    $uploadPath = WRITEPATH . 'uploads';
    $files = array_diff(scandir($uploadPath), ['.', '..']);

    $fileList = [];

    foreach ($files as $file) {
        $fileList[] = [
            'name' => $file,
            'url'  => base_url('barang/downloadFile/' . $file),
            'time' => date('Y-m-d H:i:s', filemtime($uploadPath . '/' . $file))
        ];
    }

    return view('barang/list_imported_files', ['files' => $fileList, 'title' => 'File Excel yang Telah Diimport']);
}


public function downloadFile($filename)
{
    $path = WRITEPATH . 'uploads/' . $filename;
    if (file_exists($path)) {
        return $this->response->download($path, null);
    } else {
        return redirect()->to('/barang')->with('error', 'File tidak ditemukan.');
    }
}


public function exportPDF()
{
    $dompdf = new \Dompdf\Dompdf();

    $data = [
        'title' => 'Laporan Data Barang',
        'barang' => $this->barang->getWithKategori() // <-- GUNAKAN METHOD YANG BENAR
    ];

    $html = view('barang/pdf', $data);
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream('laporan-barang.pdf');
}



public function sendEmail()
{
    $email = \Config\Services::email();
    $email->setTo('maisarohfebri@email.com');
    $email->setSubject('Laporan Barang');
    $email->setMessage('Ini adalah laporan barang terkini.');

    if ($email->send()) {
        return redirect()->to('/barang')->with('success', 'Email berhasil dikirim');
    } else {
        return redirect()->to('/barang')->with('error', $email->printDebugger(['headers']));
    }
}


public function printPdf()
{
    $barang = $this->barang->getWithKategori(); // Ganti 'barangModel' jadi 'barang'

    $data = [
        'title' => 'Laporan Data Barang',
        'barang' => $barang
    ];

    $html = view('barang/pdf', $data); // Pastikan view ini ada

    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);

    $dompdf = new Dompdf($options);
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    $dompdf->stream('laporan-barang.pdf', ['Attachment' => false]);
}

}
?>

