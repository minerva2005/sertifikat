<?php
// Koneksi ke database
$host = "localhost";
$username = "root";
$password = "";
$database = "sertifikat_online";

$conn = new mysqli($host, $username, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Fungsi untuk membersihkan dan memvalidasi input
function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Tangkap data dari formulir pengeditan event
$certificate_id = clean_input($_POST['certificate_id']);
$participant_name = clean_input($_POST['participant_name']);
$event_name = clean_input($_POST['event_name']);
$event_date = clean_input($_POST['event_date']);
$certificate_text = clean_input($_POST['certificate_text']);

// Validasi input (contoh sederhana)
if (empty($certificate_id) || empty($participant_name) || empty($event_name) || empty($event_date) || empty($certificate_text)) {
    die("Mohon lengkapi semua kolom.");
}

// Query untuk mengupdate data event di tabel
$query = "UPDATE certificate 
          SET participant_name = '$participant_name', event_name = '$event_name', event_date = '$event_date', certificate_text = '$certificate_text'
          WHERE certificate_id = $certificate_id";

// Eksekusi query
if ($conn->query($query) === TRUE) {
    // Redirect kembali ke halaman events.php setelah berhasil diupdate
    header("Location: sertifikat.php");
    exit(); // Pastikan untuk keluar setelah melakukan redirect
} else {
    echo "Update event gagal. Silakan coba lagi.";
}

// Tutup koneksi database
$conn->close();
?>
