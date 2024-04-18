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

// Tangkap data dari formulir pendaftaran
$email = clean_input($_POST['email']);
$password = clean_input($_POST['password']);
$full_name = clean_input($_POST['full_name']);
$level = "member"; // Atur level pengguna

// Validasi input (contoh sederhana)
if (empty($email) || empty($password)) {
    die("Mohon lengkapi semua kolom pendaftaran.");
}

// Hash password
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

// Query untuk menambahkan data pengguna ke dalam tabel
$query = "INSERT INTO users (email, password, full_name, level) VALUES ('$email', '$hashed_password', '$full_name', '$level')";

// Eksekusi query
if ($conn->query($query) === TRUE) {
    // Set sesi pengguna dan langsung arahkan ke halaman member_dashboard
    session_start();
    $_SESSION['email'] = $email;
    $_SESSION['full_name'] = $full_name;
    $_SESSION['level'] = $level;
    header("Location: login.php"); // Ganti dengan halaman member_dashboard Anda
    exit(); // Pastikan untuk keluar setelah melakukan redirect
} else {
    echo "Pendaftaran gagal. Silakan coba lagi.";
}

// Tutup koneksi database
$conn->close();
?>
