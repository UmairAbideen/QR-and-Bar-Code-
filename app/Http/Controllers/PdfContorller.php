<?php
// app/Http/Controllers/PdfController.php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PdfContorller extends Controller
{
    public function generatePdf()
    {
        // Generate QR Code and convert it to a Base64 data URI
        $qrCodeImage = QrCode::size(300)->generate('https://youtube.com');
        // base 64 encoding is necessary to convert binary data of image to text format which can be shown in html
        // below fomat tells how to interpret data
        $qrCodeDataUri = 'data:image/png;base64,' . base64_encode($qrCodeImage);

        // Generate Barcode and convert it to a Base64 data URI
        $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
        $barcodeImage = $generator->getBarcode('1234567890', $generator::TYPE_CODE_128);
        $barcodeDataUri = 'data:image/png;base64,' . base64_encode($barcodeImage);

        // Load the PDF view, passing the QR Code and Barcode data URIs to the view
        $pdf = Pdf::loadView('pdf.document', [
            'qrCode' => $qrCodeDataUri,
            'barcode' => $barcodeDataUri
        ]);

        // Return the generated PDF to be viewed
        return $pdf->stream('document.pdf');
    }
}

