<?php
session_start();  // Pastikan session dimulai di awal file

include "config.php";
include "template/mainheader.php";

// Memeriksa apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    // Jika pengguna tidak login, redirect ke halaman login
    header("Location: login.php?msg=" . urlencode("Anda harus login untuk mengakses halaman ini."));
    exit;
}
?>

<h1>Selamat Datang, <?= $_SESSION['username']; ?>!</h1>
<p>Hanya pengguna yang login yang dapat mengakses halaman ini.</p>

<?php
include "template/mainfooter.php";
?>