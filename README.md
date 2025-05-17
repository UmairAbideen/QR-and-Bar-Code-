# 📦 Laravel 10 QR Code & Barcode Generator with PDF

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
