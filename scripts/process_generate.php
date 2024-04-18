

<?php
$user_id = isset($_POST['user_id']) ? $_POST['user_id'] : '';
$certificate_id = isset($_POST['certificate_id']) ? $_POST['certificate_id'] : '';
$event_id = isset($_POST['event_id']) ? $_POST['event_id'] : '';

// Lakukan koneksi ke database
$host = "localhost";
$username = "root";
$password = "";
$database = "sertifikat_online";

$conn = new mysqli($host, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query SQL untuk menambahkan data sertifikat
$sql = "INSERT INTO certificate_assignments (user_id, certificate_id, event_id) 
        VALUES ('$user_id', '$certificate_id', '$event_id')";

// Jalankan query
if ($conn->query($sql) === TRUE) {
    echo "Sertifikat berhasil digenerate";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi database
$conn->close();
?>
