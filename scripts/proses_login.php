<?php
// Mendefinisikan koneksi ke database
$host = "localhost";
$username = "root";
$password = "";
$database = "sertifikat_online";

// Membuat koneksi ke database
$conn = new mysqli($host, $username, $password, $database);

// Memeriksa apakah koneksi berhasil
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Memeriksa apakah data 'username' dan 'password' terkirim
if(isset($_POST['username']) && isset($_POST['password'])) {
    // Tangkap data dari formulir login
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk mendapatkan data pengguna berdasarkan username/email
    $query = "SELECT * FROM users WHERE email = '$username'";
    $result = $conn->query($query);

    if ($result && $result->num_rows == 1) {
        // Jika data pengguna ditemukan, verifikasi password
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];

        if (password_verify($password, $hashed_password)) {
            // Password cocok, atur sesi dan redirect ke halaman berdasarkan level akun
            session_start();
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['full_name'] = $row['full_name'];
            $_SESSION['level'] = $row['level']; // Menyimpan level akun dalam sesi

            // Redirect ke halaman sesuai dengan level akun
            if ($_SESSION['level'] == 'Admin') {
                header("Location: home.php");
            } else if ($_SESSION['level'] == 'member') {
                header("Location: member_dashboard.php");
            }
            exit(); // Pastikan untuk keluar setelah melakukan redirect
        } else {
            // Password tidak cocok
            echo "Password salah. Silakan coba lagi.";
        }
    } else {
        // Data pengguna tidak ditemukan
        echo "Akun tidak ditemukan.";
    }
} else {
    // Jika 'username' atau 'password' tidak terkirim
    echo "Mohon lengkapi semua kolom.";
}

// Tutup koneksi database
$conn->close();
?>
