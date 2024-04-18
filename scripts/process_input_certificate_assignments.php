<?php
// Koneksi ke database
$host = "localhost";
$username = "root";
$password = "";
$database = "sertifikat_online";

$conn = new mysqli($host, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Pastikan metode request adalah POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Periksa apakah semua kolom telah diisi
    if (!empty($_POST['full_name']) && !empty($_POST['participant_name']) && !empty($_POST['event_name'])) {
        // Escape data yang diterima dari formulir untuk menghindari SQL Injection
        $user_id = $conn->real_escape_string($_POST['full_name']);
        $certificate_id = $conn->real_escape_string($_POST['participant_name']);
        $event_id = $conn->real_escape_string($_POST['event_name']);
        
        // Query untuk menyimpan data ke database
        $query = "INSERT INTO certificate_assignments (user_id, certificate_id, event_id) VALUES ('$user_id', '$certificate_id', '$event_id')";

        // Jalankan query
        if ($conn->query($query) === TRUE) {
            header("Location: Generate_home.php"); // Ganti dengan nama halaman yang sesuai
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
