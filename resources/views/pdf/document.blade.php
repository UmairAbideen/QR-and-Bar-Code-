<!DOCTYPE html>
<html>
<head>
    <title>PDF Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .content {
            text-align: center;
            margin: 20px;
        }
        .qr-code, .barcode {
            margin: 20px auto;
        }
    </style>
</head>
<body>
    <div class="content">
        <h1>Document with QR Code and Barcode</h1>

        <div class="qr-code">
            <h2>QR Code:</h2>
            <img src="{{ $qrCode }}" alt="QR Code">
        </div>

        <div class="barcode">
            <h2>Barcode:</h2>
            <img src="{{ $barcode }}" alt="Barcode">
        </div>
    </div>
</body>
</html>
