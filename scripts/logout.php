<?php
// Mulai atau dapatkan sesi yang sedang berlangsung
session_start();

// Hapus semua variabel sesi
session_unset();

// Hancurkan sesi
session_destroy();

// Redirect ke halaman login atau halaman lain yang diinginkan
header("Location: ../index.php"); // Sesuaikan path dengan struktur direktori Anda
exit();
?>
