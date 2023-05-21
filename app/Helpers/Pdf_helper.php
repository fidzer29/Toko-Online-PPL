<?php

namespace App\Helpers;

use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Dompdf as PdfDompdf;

class Pdf_helper
{
    public static function create_pdf($html, $filename = '', $paper = 'A4', $orientation = 'portrait')
    {
        $dompdf = new PdfDompdf();

        $dompdf->setPaper($paper, $orientation);

        $dompdf->loadHtml($html);

        $dompdf->render();

        $dompdf->stream($filename . '.pdf', ['Attachment' => false]);

        exit(0);
    }
}
