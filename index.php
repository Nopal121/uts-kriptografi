<?php

define('OPENSSL_CONF', 'C:\\xampp\\php\\extras\\ssl\\openssl.cnf');

putenv('OPENSSL_CONF=C:\xampp\php\extras\ssl\openssl.cnf');

$tool = $_GET['tool'] ?? 'home';


// ======================================
// CAESAR CIPHER
// ======================================

function caesarEncrypt($text, $shift){

    $result = '';

    for($i = 0; $i < strlen($text); $i++){

        $char = $text[$i];

        if(ctype_alpha($char)){

            $ascii = ctype_upper($char) ? 65 : 97;

            $result .= chr(
                (ord($char) - $ascii + $shift) % 26 + $ascii
            );

        } else {

            $result .= $char;
        }
    }

    return $result;
}

function caesarDecrypt($text, $shift){

    return caesarEncrypt($text, 26 - $shift);
}



// ======================================
// XOR CIPHER
// ======================================

function xorEncrypt($text, $key){

    $output = '';

    for($i = 0; $i < strlen($text); $i++){

        $output .= chr(
            ord($text[$i]) ^
            ord($key[$i % strlen($key)])
        );
    }

    return bin2hex($output);
}

function xorDecrypt($hex, $key){

    $text = hex2bin($hex);

    if($text === false){

        return "Hexadecimal tidak valid!";
    }

    $output = '';

    for($i = 0; $i < strlen($text); $i++){

        $output .= chr(
            ord($text[$i]) ^
            ord($key[$i % strlen($key)])
        );
    }

    return $output;
}



// ======================================
// FPB EUCLIDEAN
// ======================================

function gcdEuclidean($a, $b){

    while($b != 0){

        $temp = $b;

        $b = $a % $b;

        $a = $temp;
    }

    return $a;
}

?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Super App Kriptografi</title>

<link rel="preconnect" href="https://fonts.googleapis.com">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{

    font-family:'Poppins', sans-serif;

    background:linear-gradient(135deg,#f8f4f6,#ece7ea);

    min-height:100vh;

    color:#2b2b2b;
}

.container{

    width:92%;

    max-width:1200px;

    margin:30px auto;
}

.header{

    background:linear-gradient(135deg,#80011F,#a0002b);

    color:white;

    padding:45px;

    border-radius:25px;

    text-align:center;

    margin-bottom:25px;

    box-shadow:0 12px 35px rgba(128,1,31,0.25);
}

.header h1{

    font-size:2.5rem;

    margin-bottom:10px;
}

.menu{

    display:grid;

    grid-template-columns:repeat(auto-fit,minmax(170px,1fr));

    gap:15px;

    margin-bottom:25px;
}

.menu a{

    background:white;

    text-decoration:none;

    padding:16px;

    border-radius:18px;

    color:#80011F;

    font-weight:600;

    display:flex;

    align-items:center;

    justify-content:center;

    gap:10px;

    transition:0.3s;

    box-shadow:0 8px 18px rgba(0,0,0,0.06);
}

.menu a:hover{

    background:#80011F;

    color:white;

    transform:translateY(-4px);
}

.card{

    background:white;

    border-radius:25px;

    padding:35px;

    box-shadow:0 12px 30px rgba(0,0,0,0.08);
}

h2{

    color:#80011F;

    margin-bottom:20px;
}

.hero-grid{

    display:grid;

    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));

    gap:18px;

    margin-top:25px;
}

.hero-item{

    background:#fafafa;

    border-radius:18px;

    padding:22px;

    transition:0.3s;

    box-shadow:0 6px 15px rgba(0,0,0,0.06);
}

.hero-item:hover{

    transform:translateY(-5px);
}

.hero-item i{

    font-size:28px;

    color:#80011F;

    margin-bottom:12px;
}

.hero-item h3{

    margin-bottom:10px;
}

.hero-item p{

    line-height:1.7;
}

.form-group{

    margin-bottom:18px;
}

label{

    display:block;

    margin-bottom:8px;

    font-weight:500;
}

input,
textarea{

    width:100%;

    padding:14px 16px;

    border-radius:14px;

    border:1px solid #ddd;

    font-family:'Poppins', sans-serif;

    font-size:14px;
}

textarea{

    min-height:140px;

    resize:vertical;
}

.button-group{

    display:flex;

    flex-wrap:wrap;

    gap:12px;

    margin-top:15px;
}

button{

    border:none;

    padding:14px 22px;

    border-radius:14px;

    font-weight:600;

    font-family:'Poppins', sans-serif;

    cursor:pointer;

    transition:0.3s;
}

.btn-primary{

    background:#80011F;

    color:white;
}

.btn-primary:hover{

    background:#5f0017;
}

.btn-secondary{

    background:#ececec;
}

.result{

    margin-top:25px;

    background:#f9f9f9;

    border-left:5px solid #80011F;

    padding:22px;

    border-radius:18px;

    overflow:auto;
}

.result textarea{

    margin-top:10px;
}

.footer{

    margin-top:25px;

    background:white;

    padding:25px;

    border-radius:20px;

    text-align:center;

    line-height:1.8;

    box-shadow:0 6px 15px rgba(0,0,0,0.06);
}

hr{

    margin:20px 0;
}

@media(max-width:768px){

    .button-group{
        flex-direction:column;
    }

    button{
        width:100%;
    }

    .header h1{
        font-size:1.8rem;
    }
}

</style>

</head>

<body>

<div class="container">

<div class="header">

    <h1>🔐 Super App Kriptografi</h1>

    <p>
        Web Tools Kriptografi Berbasis PHP
    </p>

</div>

<div class="menu">

    <a href="?tool=home">
        <i class="fa-solid fa-house"></i>
        Home
    </a>

    <a href="?tool=caesar">
        <i class="fa-solid fa-key"></i>
        Caesar Cipher
    </a>

    <a href="?tool=xor">
        <i class="fa-solid fa-shield-halved"></i>
        XOR Cipher
    </a>

    <a href="?tool=sha">
        <i class="fa-solid fa-fingerprint"></i>
        SHA-256
    </a>

    <a href="?tool=rsa">
        <i class="fa-solid fa-lock"></i>
        RSA Encrypt
    </a>

    <a href="?tool=signature">
        <i class="fa-solid fa-file-signature"></i>
        Digital Signature
    </a>

    <a href="?tool=fpb">
        <i class="fa-solid fa-calculator"></i>
        FPB Euclidean
    </a>

</div>

<div class="card">

<?php

switch($tool){

// ======================================
// HOME
// ======================================

case 'home':

?>

<h2>Selamat Datang 👋</h2>

<p>
Aplikasi ini merupakan Super App Kriptografi berbasis PHP
yang menggabungkan berbagai algoritma keamanan data
dan matematika kriptografi ke dalam satu halaman web modern.
</p>

<div class="hero-grid">

<div class="hero-item">

<i class="fa-solid fa-key"></i>

<h3>Caesar Cipher</h3>

<p>
Enkripsi dan dekripsi teks menggunakan metode pergeseran huruf.
</p>

</div>

<div class="hero-item">

<i class="fa-solid fa-shield-halved"></i>

<h3>XOR Cipher</h3>

<p>
Enkripsi menggunakan operasi XOR dengan output hexadecimal.
</p>

</div>

<div class="hero-item">

<i class="fa-solid fa-fingerprint"></i>

<h3>SHA-256</h3>

<p>
Membuat hash SHA-256 untuk keamanan dan integritas data.
</p>

</div>

<div class="hero-item">

<i class="fa-solid fa-lock"></i>

<h3>RSA Encrypt</h3>

<p>
Kriptografi asimetris menggunakan public key dan private key.
</p>

</div>

<div class="hero-item">

<i class="fa-solid fa-file-signature"></i>

<h3>Digital Signature</h3>

<p>
Menandatangani dan memverifikasi dokumen digital.
</p>

</div>

<div class="hero-item">

<i class="fa-solid fa-calculator"></i>

<h3>FPB Euclidean</h3>

<p>
Menghitung FPB menggunakan algoritma Euclidean.
</p>

</div>

</div>

<?php

break;


// ======================================
// CAESAR
// ======================================

case 'caesar':

$result = '';

if(isset($_POST['encrypt'])){
    $result = caesarEncrypt($_POST['text'], $_POST['shift']);
}

if(isset($_POST['decrypt'])){
    $result = caesarDecrypt($_POST['text'], $_POST['shift']);
}

?>

<h2>Caesar Cipher</h2>

<form method="POST">

<div class="form-group">

<label>Teks</label>

<textarea name="text" required></textarea>

</div>

<div class="form-group">

<label>Shift</label>

<input type="number" name="shift" required>

</div>

<div class="button-group">

<button class="btn-primary" name="encrypt">
Encrypt
</button>

<button class="btn-secondary" name="decrypt">
Decrypt
</button>

</div>

</form>

<div class="result">

<strong>Hasil:</strong>

<br><br>

<?= htmlspecialchars($result) ?>

</div>

<?php

break;


// ======================================
// XOR
// ======================================

case 'xor':

$result = '';

if(isset($_POST['encrypt'])){
    $result = xorEncrypt($_POST['text'], $_POST['key']);
}

if(isset($_POST['decrypt'])){
    $result = xorDecrypt($_POST['text'], $_POST['key']);
}

?>

<h2>XOR Cipher</h2>

<form method="POST">

<div class="form-group">

<label>Teks / Hexadecimal</label>

<textarea name="text" required></textarea>

</div>

<div class="form-group">

<label>Key</label>

<input type="text" name="key" required>

</div>

<div class="button-group">

<button class="btn-primary" name="encrypt">
Encrypt
</button>

<button class="btn-secondary" name="decrypt">
Decrypt
</button>

</div>

</form>

<div class="result">

<strong>Hasil:</strong>

<br><br>

<?= htmlspecialchars($result) ?>

</div>

<?php

break;


// ======================================
// SHA-256
// ======================================

case 'sha':

$hash = '';

if(isset($_POST['generate'])){
    $hash = hash('sha256', $_POST['text']);
}

?>

<h2>SHA-256 Hash Generator</h2>

<form method="POST">

<div class="form-group">

<label>Teks</label>

<textarea name="text" required></textarea>

</div>

<div class="button-group">

<button class="btn-primary" name="generate">
Generate Hash
</button>

</div>

</form>

<div class="result">

<strong>Hash SHA-256:</strong>

<br><br>

<?= htmlspecialchars($hash) ?>

</div>

<?php

break;


// ======================================
// RSA
// ======================================

case 'rsa':

$encrypted = '';
$privateKey = '';
$publicKey = '';
$error = '';

if(isset($_POST['generate'])){

    $config = [

        "config" => "C:\\xampp\\php\\extras\\ssl\\openssl.cnf",

        "digest_alg" => "sha256",

        "private_key_bits" => 2048,

        "private_key_type" => OPENSSL_KEYTYPE_RSA,
    ];

    $res = openssl_pkey_new($config);

    if($res === false){

        $error = "Gagal Generate RSA Key";

    } else {

        $export = openssl_pkey_export(
            $res,
            $privateKey,
            "12345",
            $config
        );

        if(!$export){

            $error = "Gagal Export Private Key";

        } else {

            $keyDetails = openssl_pkey_get_details($res);

            $publicKey = $keyDetails['key'];

            $text = $_POST['text'];

            $encryptSuccess = openssl_public_encrypt(
                $text,
                $encryptedData,
                $publicKey
            );

            if($encryptSuccess){

                $encrypted = base64_encode($encryptedData);

            } else {

                $error = "Gagal Encrypt Data";
            }
        }
    }
}

?>

<h2>RSA Encrypt</h2>

<form method="POST">

<div class="form-group">

<label>Masukkan Teks</label>

<textarea name="text" required></textarea>

</div>

<div class="button-group">

<button class="btn-primary" name="generate">
Generate RSA
</button>

</div>

</form>

<div class="result">

<?php if($error != ''): ?>

<strong style="color:red;">

<?= $error ?>

</strong>

<?php else: ?>

<strong>Encrypted Text:</strong>

<br><br>

<?= htmlspecialchars($encrypted) ?>

<hr>

<strong>Private Key:</strong>

<textarea><?= htmlspecialchars($privateKey) ?></textarea>

<br>

<strong>Public Key:</strong>

<textarea><?= htmlspecialchars($publicKey) ?></textarea>

<?php endif; ?>

</div>

<?php

break;


// ======================================
// DIGITAL SIGNATURE
// ======================================

case 'signature':

$signature = '';
$verifyResult = '';
$error = '';

$privateKey = $_POST['private_key'] ?? '';
$publicKey = $_POST['public_key'] ?? '';

$config = [

    "config" => "C:\\xampp\\php\\extras\\ssl\\openssl.cnf",

    "digest_alg" => "sha256",

    "private_key_bits" => 2048,

    "private_key_type" => OPENSSL_KEYTYPE_RSA,
];

// GENERATE KEY JIKA BELUM ADA
if($privateKey == '' || $publicKey == ''){

    $res = openssl_pkey_new($config);

    if($res){

        openssl_pkey_export(
            $res,
            $privateKey,
            "12345",
            $config
        );

        $publicKey = openssl_pkey_get_details($res)['key'];

    } else {

        $error = "Gagal Generate Key";
    }
}

// SIGN
if(isset($_POST['sign'])){

    $privateKeyResource = openssl_pkey_get_private(
        $privateKey,
        "12345"
    );

    if($privateKeyResource){

        openssl_sign(
            $_POST['text'],
            $rawSignature,
            $privateKeyResource,
            OPENSSL_ALGO_SHA256
        );

        $signature = base64_encode($rawSignature);

    } else {

        $error = "Gagal membaca Private Key";
    }
}

// VERIFY
if(isset($_POST['verify'])){

    $verify = openssl_verify(
        $_POST['text'],
        base64_decode($_POST['signature']),
        $publicKey,
        OPENSSL_ALGO_SHA256
    );

    if($verify == 1){

        $verifyResult = "✅ Signature VALID";

    } else {

        $verifyResult = "❌ Signature TIDAK VALID";
    }
}

?>

<h2>Digital Signature</h2>

<form method="POST">

<input
    type="hidden"
    name="private_key"
    value="<?= htmlspecialchars($privateKey) ?>"
>

<input
    type="hidden"
    name="public_key"
    value="<?= htmlspecialchars($publicKey) ?>"
>

<div class="form-group">

<label>Dokumen</label>

<textarea name="text" required><?= $_POST['text'] ?? '' ?></textarea>

</div>

<div class="form-group">

<label>Signature</label>

<textarea name="signature"><?= $_POST['signature'] ?? '' ?></textarea>

</div>

<div class="button-group">

<button class="btn-primary" name="sign">
Sign
</button>

<button class="btn-secondary" name="verify">
Verify
</button>

</div>

</form>

<div class="result">

<?php if($error != ''): ?>

<strong style="color:red;">

<?= $error ?>

</strong>

<hr>

<?php endif; ?>

<strong>Digital Signature:</strong>

<br><br>

<textarea><?= htmlspecialchars($signature) ?></textarea>

<hr>

<strong>Public Key:</strong>

<textarea><?= htmlspecialchars($publicKey) ?></textarea>

<hr>

<strong>Verifikasi:</strong>

<br><br>

<?= htmlspecialchars($verifyResult) ?>

</div>

<?php

break;


// ======================================
// FPB
// ======================================

case 'fpb':

$hasil = '';

if(isset($_POST['hitung'])){

    $hasil = gcdEuclidean(
        $_POST['angka1'],
        $_POST['angka2']
    );
}

?>

<h2>FPB Euclidean</h2>

<form method="POST">

<div class="form-group">

<label>Angka Pertama</label>

<input type="number" name="angka1" required>

</div>

<div class="form-group">

<label>Angka Kedua</label>

<input type="number" name="angka2" required>

</div>

<div class="button-group">

<button class="btn-primary" name="hitung">
Hitung FPB
</button>

</div>

</form>

<div class="result">

<strong>Hasil FPB:</strong>

<br><br>

<?= htmlspecialchars($hasil) ?>

</div>

<?php

break;

}

?>

</div>

<div class="footer">

<strong>Nama :</strong> Muhammad Naufal Welendra
<br>

<strong>NIM :</strong> 231220066
<br>

<strong>Mata Kuliah :</strong> Kriptografi

</div>

</div>

</body>
</html>