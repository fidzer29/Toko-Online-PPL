<?php

namespace App\Libraries;

use PhpOffice\PhpSpreadsheet\IOFactory;

class Spreadsheet
{
    public function readExcel($filename)
    {
        // Load file Excel
        $reader = IOFactory::createReader('Xlsx');
        $spreadsheet = $reader->load($filename);

        // Ambil data dari sheet pertama
        $worksheet = $spreadsheet->getActiveSheet();
        $highestRow = $worksheet->getHighestRow(); // Ambil jumlah baris
        $highestColumn = $worksheet->getHighestColumn(); // Ambil jumlah kolom
        $data = [];

        // Looping untuk membaca data pada setiap sel
        for ($row = 1; $row <= $highestRow; $row++) {
            $rowData = [];
            for ($col = 'A'; $col <= $highestColumn; $col++) {
                $cellValue = $worksheet->getCell($col . $row)->getValue();
                $rowData[] = $cellValue;
            }
            $data[] = $rowData;
        }

        return $data;
    }
}
