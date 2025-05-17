<?php

// routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfContorller;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;




Route::get('/generate-pdf', [PdfContorller::class, 'generatePdf']);


Route::get('/qrcode', function () {


    return QrCode::size(300)->generate('A basic example of QR code!');


    // return QrCode::size(300)->email('umairabideen@gmail.com');


    // Generate a QR code that opens a website URL
    // return QrCode::size(300)->generate('https://youtube.com');


    // Manually create the vCard string
    // $vCard = "BEGIN:VCARD\n";
    // $vCard .= "VERSION:3.0\n";
    // $vCard .= "FN:John Doe\n";
    // $vCard .= "EMAIL:johndoe@example.com\n";
    // $vCard .= "TEL:+1234567890\n";
    // $vCard .= "ADR:;;123 Street Name;City;Country;;\n";
    // $vCard .= "URL:https://example.com\n";
    // $vCard .= "NOTE:This is a note\n";
    // $vCard .= "END:VCARD";

    // return QrCode::size(300)->generate($vCard);


    // Generate a QR code that opens a geo location
    // return QrCode::size(300)->geo(24.932152, 67.086014);

});



Route::get('barcode', function () {

    // Create a new instance of the BarcodeGeneratorPNG class
    $generatePng = new \Picqer\Barcode\BarcodeGeneratorPNG();

    // Generate a barcode image for the given string using the CODE 128 barcode type
    $image = $generatePng->getBarcode('0008202323121', $generatePng::TYPE_CODE_128);

    // Store the generated barcode image in the 'barcodes/demo.png' path
    Storage::put('barcodes/demo.png', $image);

    // Return the barcode image as a response with the appropriate image header
    return response($image)->header('Content-type', 'image/png');
});
