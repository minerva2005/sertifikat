<?php
// Cek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pastikan bahwa semua input telah diisi dengan benar
    if (isset($_POST['event_name']) && isset($_POST['event_date']) && isset($_POST['location']) && isset($_POST['organizer'])) {
        // Ambil nilai dari form
        $event_name = $_POST['event_name'];
        $event_date = $_POST['event_date'];
        $location = $_POST['location'];
        $organizer = $_POST['organizer'];

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

        // Query SQL untuk menambahkan data event ke dalam tabel
        $sql = "INSERT INTO events (event_name, event_date, location, organizer) 
                VALUES ('$event_name', '$event_date', '$location', '$organizer')";

        // Jalankan query
        if ($conn->query($sql) === TRUE) {
            // Jika data berhasil ditambahkan, arahkan pengguna kembali ke halaman utama
            header("Location: events.php"); // Ganti halaman_utama.php dengan nama halaman utama Anda
            exit(); // Pastikan untuk keluar setelah melakukan redirect
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Tutup koneksi database
        $conn->close();
    } else {
        echo "Mohon lengkapi semua kolom event.";
    }
}
?>
