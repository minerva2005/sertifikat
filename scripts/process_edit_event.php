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
$event_id = clean_input($_POST['event_id']);
$event_name = clean_input($_POST['event_name']);
$event_date = clean_input($_POST['event_date']);
$location = clean_input($_POST['location']);
$organizer = clean_input($_POST['organizer']);

// Validasi input (contoh sederhana)
if (empty($event_id) || empty($event_name) || empty($event_date) || empty($location) || empty($organizer)) {
    die("Mohon lengkapi semua kolom.");
}

// Query untuk mengupdate data event di tabel
$query = "UPDATE events 
          SET event_name = '$event_name', event_date = '$event_date', location = '$location', organizer = '$organizer'
          WHERE event_id = $event_id";

// Eksekusi query
if ($conn->query($query) === TRUE) {
    // Redirect kembali ke halaman events.php setelah berhasil diupdate
    header("Location: events.php");
    exit(); // Pastikan untuk keluar setelah melakukan redirect
} else {
    echo "Update event gagal. Silakan coba lagi.";
}

// Tutup koneksi database
$conn->close();
?>
