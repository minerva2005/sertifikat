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

// Tangkap parameter id event yang ingin dihapus
$event_id = $_GET['id'];

// Query untuk menghapus data event dari tabel
$query = "DELETE FROM events WHERE event_id = $event_id";

// Eksekusi query
if ($conn->query($query) === TRUE) {
    echo "Data event berhasil dihapus.";
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}

// Tutup koneksi database
$conn->close();

// Redirect kembali ke halaman utama setelah menghapus
header("Location: events.php"); // Ganti dengan halaman yang sesuai
exit();
?>
