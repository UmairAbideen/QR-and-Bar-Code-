# 📦 QR Code & Barcode Generator with PDF in Laravel

This project demonstrates how to **generate QR codes and barcodes in Laravel**, embed them into a **PDF**, and either display or download the PDF file. 

---

## ❓ Why Use QR & Barcode Generation?

QR codes and barcodes are everywhere—from product labels to contactless menus. This project shows how to dynamically generate and serve them through a Laravel app.

- ✅ QR Codes – Great for URLs, contact cards, emails, etc.  
- ✅ Barcodes – Useful for inventory, shipping, user IDs, etc.  
- ✅ PDF Export – Share or print them easily.

---

## 🧩 What This Project Contains

| Feature             | Description                                           |
|---------------------|-------------------------------------------------------|
| ✅ QR Code generation | Generate QR codes for any text or URL               |
| ✅ Barcode generation | Create barcodes in PNG format using CODE_128        |
| 🖨️ PDF embedding     | Embed both codes into a downloadable PDF             |
| 🖼️ Blade view        | To render the codes within the PDF                   |
| ⚙️ Base64 encoding    | For clean image embedding into documents            |

---

## 🛠️ Tech Stack

| Tool                  | Purpose                          |
|-----------------------|----------------------------------|
| Laravel 10            | PHP web framework                |
| Blade                 | Frontend templating engine       |
| Simple QrCode         | QR code generation               |
| Picqer Barcode        | Barcode generation               |
| Laravel DomPDF        | PDF rendering from Blade views   |

---

## 🚀 Important Steps

### 1️⃣ Install Required Packages

```bash
composer require simplesoftwareio/simple-qrcode
composer require picqer/php-barcode-generator
composer require barryvdh/laravel-dompdf
```

## 2️⃣ Define Routes in routes/web.php

```bash
Route::get('/generate-pdf', [PdfContorller::class, 'generatePdf']);

Route::get('/qrcode', function () {
    return QrCode::size(300)->generate('A basic example of QR code!');
});

Route::get('/barcode', function () {
    $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
    $image = $generator->getBarcode('0008202323121', $generator::TYPE_CODE_128);
    Storage::put('barcodes/demo.png', $image);
    return response($image)->header('Content-type', 'image/png');
});
```

## 3️⃣ Create the PDF Controller

```bash
class PdfContorller extends Controller
{
    public function generatePdf()
    {
        $qrCodeImage = QrCode::size(300)->generate('https://youtube.com');
        $qrCodeDataUri = 'data:image/png;base64,' . base64_encode($qrCodeImage);

        $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
        $barcodeImage = $generator->getBarcode('1234567890', $generator::TYPE_CODE_128);
        $barcodeDataUri = 'data:image/png;base64,' . base64_encode($barcodeImage);

        $pdf = Pdf::loadView('pdf.document', [
            'qrCode' => $qrCodeDataUri,
            'barcode' => $barcodeDataUri
        ]);

        return $pdf->stream('document.pdf');
    }
}
```

## 4️⃣ Create Blade View for PDF

```bash
<!DOCTYPE html>
<html>
<head>
    <title>QR & Barcode</title>
    <style>
        body { font-family: sans-serif; text-align: center; }
        img { margin: 20px auto; }
    </style>
</head>
<body>
    <h1>QR Code</h1>
    <img src="{{ $qrCode }}" alt="QR Code">

    <h1>Barcode</h1>
    <img src="{{ $barcode }}" alt="Barcode">
</body>
</html>
```

## 5️⃣ Access the PDF

http://localhost:8000/generate-pdf
