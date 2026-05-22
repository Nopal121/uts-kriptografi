# Super App Kriptografi PHP 🔐

Aplikasi Web Tools Kriptografi berbasis PHP yang menggabungkan berbagai algoritma kriptografi dan matematika ke dalam satu halaman web modern (Single File Application).

Project ini dibuat untuk memenuhi tugas praktikum Mata Kuliah Kriptografi dengan konsep **Project Based Learning (PjBL)** dan **Outcome-Based Education**.

---

# ✨ Fitur Utama

## 1. Caesar Cipher

* Enkripsi teks
* Dekripsi teks
* Menggunakan metode pergeseran huruf (shift)

### Contoh

```text id="t4n6k9"
HALO → KDOR
```

---

## 2. XOR Cipher

* Enkripsi XOR
* Dekripsi XOR
* Output menggunakan Hexadecimal (Bin2Hex)

### Contoh

```text id="q8p1f3"
Text: kriptografi
Key : 123
```

---

## 3. SHA-256 Hash Generator

* Membuat hash SHA-256
* Digunakan untuk integritas data dan keamanan password

### Contoh

```text id="j3w8m0"
password123
```

---

## 4. RSA Encrypt (OpenSSL)

* Generate Public Key
* Generate Private Key
* Encrypt text menggunakan RSA

### Output

* Encrypted Text
* Public Key
* Private Key

---

## 5. Digital Signature

* Sign dokumen digital
* Verify keaslian dokumen
* Menggunakan algoritma RSA + SHA256

### Output

```text id="y2d9q4"
✅ Signature VALID
❌ Signature TIDAK VALID
```

---

## 6. FPB Euclidean

* Menghitung Faktor Persekutuan Terbesar
* Menggunakan Algoritma Euclidean

---

# 🛠️ Teknologi Yang Digunakan

* PHP Native
* HTML5
* CSS3
* Font Awesome
* OpenSSL PHP Extension

---

# 📂 Struktur Project

```text id="f0m5v7"
uts-kriptografi/
│
├── index.php
└── README.md
```

---

# ⚙️ Persyaratan Sistem

* PHP 7 atau lebih baru
* XAMPP / Laragon
* OpenSSL aktif pada PHP

---

# 🔧 Cara Menjalankan Project

## 1. Clone Repository

```bash id="u1h9x2"
git clone https://github.com/USERNAME/uts-kriptografi.git
```

---

## 2. Pindahkan ke Folder htdocs

Contoh:

```text id="r7k4n1"
C:\xampp\htdocs\uts-kriptografi
```

---

## 3. Aktifkan Apache di XAMPP

---

## 4. Jalankan di Browser

```text id="d5p8w0"
http://localhost/uts-kriptografi
```

---

# 🔐 Konfigurasi OpenSSL

Tambahkan konfigurasi berikut di bagian atas file `index.php`:

```php id="m8v2k6"
define('OPENSSL_CONF', 'C:\\xampp\\php\\extras\\ssl\\openssl.cnf');

putenv('OPENSSL_CONF=C:\xampp\php\extras\ssl\openssl.cnf');
```

Pastikan file berikut tersedia:

```text id="w4q7j3"
C:\xampp\php\extras\ssl\openssl.cnf
```

---

# 📖 Cara Menggunakan

# Caesar Cipher

### Encrypt

1. Masukkan teks
2. Masukkan shift
3. Klik Encrypt

### Decrypt

1. Masukkan cipher text
2. Masukkan shift
3. Klik Decrypt

---

# XOR Cipher

### Encrypt

1. Masukkan teks
2. Masukkan key
3. Klik Encrypt

### Decrypt

1. Masukkan hasil hexadecimal
2. Masukkan key
3. Klik Decrypt

---

# SHA-256

1. Masukkan teks
2. Klik Generate Hash

---

# RSA Encrypt

1. Masukkan teks
2. Klik Generate RSA

Output:

* Encrypted Text
* Public Key
* Private Key

---

# Digital Signature

## Sign

1. Masukkan dokumen
2. Klik Sign
3. Copy signature yang muncul

## Verify

1. Paste signature
2. Klik Verify

---

# FPB Euclidean

1. Masukkan dua angka
2. Klik Hitung FPB

---

# 🎨 Tampilan

Fitur UI:

* Responsive Design
* Modern Interface
* User Friendly
* Single Page Application
* Icon Navigation

---

# 👨‍💻 Identitas Mahasiswa

Nama : Muhammad Naufal Welendra
NIM : 231220066
Mata Kuliah : Kriptografi

---

# 📌 Catatan

Project ini dibuat untuk keperluan pembelajaran dan tugas praktikum kriptografi.

---

# 📄 License

Project ini bebas digunakan untuk pembelajaran dan pengembangan lebih lanjut.
