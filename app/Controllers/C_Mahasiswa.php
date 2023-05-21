<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Spreadsheet;
use Dompdf\Options;
use PhpOffice\PhpSpreadsheet\Spreadsheet as PhpSpreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class C_Mahasiswa extends BaseController
{

    protected $model_mahasiswa, $spreadsheet;

    public function __construct()
    {
        $this->spreadsheet = new Spreadsheet();
        $this->model_mahasiswa = new \App\Models\Mahasiswa();
    }

    public function index()
    {
        $data = [
            'title' => 'Mahasiswa',
            'mahasiswa' => $this->model_mahasiswa->findAll(),
        ];
        return view('mahasiswa/index', $data);
    }

    public function saveExcel()
    {
        if (!$this->validate([
            'excel_file' => [
                'label' => 'File Excel',
                'rules' => 'uploaded[excel_file]|ext_in[excel_file,xls,xlsx]',
                'errors' => [
                    'uploaded' => '{field} Harus diisi',
                    'ext_in' => '{field} harus format xls atau xlsx'
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            return view('mahasiswa/index', [
                'title' => 'Mahasiswa',
                'validation' => $validation->getErrors(),
                'mahasiswa' => $this->model_mahasiswa->findAll()
            ]);
        }

        $file_excel = $this->request->getFile('excel_file');

        $ext = $file_excel->getClientExtension();
        if ($ext == 'xls') {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        } else {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }
        $spreadsheet = $render->load($file_excel);

        $data = $spreadsheet->getActiveSheet()->toArray();

        foreach ($data as $x => $row) {
            if ($x == 0) {
                continue;
            }

            $nim = $row[0];
            $nama = $row[1];
            $nilai_uts = $row[2];
            $nilai_uas = $row[3];

            $db = \Config\Database::connect();

            $ceknim = $db->table('mahasiswa')->getWhere(['nim' => $nim])->getResult();

            if (count($ceknim) > 0) {
                session()->setFlashdata('message_error', 'Data mahasiswa Gagal di Import karena NIM ada yang sama');
            } else {

                $simpandata = [
                    'nim' => $nim,
                    'nama' => $nama,
                    'nilai_uts' => $nilai_uts,
                    'nilai_uas' => $nilai_uas,
                    'nilai_final' => ($nilai_uts * 0.45) + ($nilai_uas * 0.55),
                ];

                $db->table('mahasiswa')->insert($simpandata);
                session()->setFlashdata('message', 'Berhasil import excel');
            }
        }

        return redirect()->to('/mahasiswa');
    }


    public function exportExcel()
    {
        $mahasiswa = $this->model_mahasiswa->findAll();

        // jika data kosong maka tampilkan pesan error
        if (count($mahasiswa) == 0) {
            session()->setFlashdata('message_error', 'Data mahasiswa kosong tidak dapat di export');
            return redirect()->to('/mahasiswa');
        }

        $spreadsheet = new PhpSpreadsheet();

        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'NIM');
        $sheet->setCellValue('B1', 'NAMA LENGKAP');
        $sheet->setCellValue('C1', 'UTS');
        $sheet->setCellValue('D1', 'UAS');
        $sheet->setCellValue('E1', 'NILAI FINAL');

        $rows = 2;

        foreach ($mahasiswa as $mhs) {
            $sheet->setCellValue('A' . $rows, $mhs['nim']);
            $sheet->setCellValue('B' . $rows, $mhs['nama']);
            $sheet->setCellValue('C' . $rows, $mhs['nilai_uts']);
            $sheet->setCellValue('D' . $rows, $mhs['nilai_uas']);
            $sheet->setCellValue('E' . $rows, $mhs['nilai_final']);
            $rows++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save('data-mahasiswa.xlsx');
        return $this->response->download('data-mahasiswa.xlsx', null)->setFileName('data-mahasiswa.xlsx');
    }

    public function readExcel()
    {
        return view('mahasiswa/read-excel', [
            'title' => 'Read Excel Test',
        ]);
    }

    public function readExcelData()
    {

        $file_excel = $this->request->getFile('excel_file');

        $data_excel = $this->spreadsheet->readExcel($file_excel);
        $data = [
            'title' => 'Read Excel Test',
            'data_excel' => $data_excel
        ];
        return view('mahasiswa/read-excel', $data);
    }

    public function exportPdf()
    {
        $mahasiswa = $this->model_mahasiswa->findAll();

        // jika data kosong maka tampilkan pesan error
        if (count($mahasiswa) == 0) {
            session()->setFlashdata('message_error', 'Data mahasiswa kosong tidak dapat di export');
            return redirect()->to('/mahasiswa');
        }

        $options = new Options();
        $options->set('chroot', realpath(''));
        $dompdf = new \Dompdf\Dompdf($options);
        $dompdf->setOptions($options);

        $html =  view('mahasiswa/export', [
            'title' => 'Export PDF',
            'mahasiswa' => $mahasiswa,
        ]);
        $dompdf->loadHtml($html, 'UTF-8');

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'potrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream('data-mahasiswa.pdf', ['Attachment' => true, 'Title' => 'Daftar Mahasiswa']);

        exit(0);
    }

    public function pdfView()
    {
        $mahasiswa = $this->model_mahasiswa->findAll();
        return view('mahasiswa/export', [
            'title' => 'Export PDF',
            'mahasiswa' => $mahasiswa,
        ]);
    }
}
