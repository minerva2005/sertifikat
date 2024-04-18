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

// Pastikan metode request adalah POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Periksa apakah semua kolom telah diisi
    if (!empty($_POST['participant_name']) && !empty($_POST['event_name']) && !empty($_POST['event_date']) && !empty($_POST['certificate_text'])) {
        // Escape data yang diterima dari formulir untuk menghindari SQL Injection
        $participant_name = $conn->real_escape_string($_POST['participant_name']);
        $program = $conn->real_escape_string($_POST['event_name']);
        $event_date = $conn->real_escape_string($_POST['event_date']);
        $certificate_text = $conn->real_escape_string($_POST['certificate_text']);
        
        // Query untuk menyimpan data ke database
        $query = "INSERT INTO certificate (participant_name, event_name, event_date, certificate_text) VALUES ('$participant_name', '$program', '$event_date', '$certificate_text')";

        // Jalankan query
        if ($conn->query($query) === TRUE) {
            header("Location: Sertifikat.php"); // Ganti dengan nama halaman yang sesuai
            exit(); // Pastikan untuk keluar setelah melakukan redirect
        } else {
            echo "Pendaftaran Sertifikat gagal: " . $conn->error;
        }
    } else {
        // Jika ada kolom yang tidak diisi, tampilkan pesan kesalahan
        echo "Mohon lengkapi semua kolom pendaftaran.";
    }
}
?>
