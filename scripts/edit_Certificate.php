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

// Tangkap parameter id sertifikat yang akan diedit
$certificate_id = $_GET['id'];

// Query untuk mengambil data sertifikat berdasarkan certificate_id
$query = "SELECT * FROM certificate WHERE certificate_id = $certificate_id";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $participant_name = $row['participant_name'];
    $event_name = $row['event_name'];
    $event_date = $row['event_date'];
    $certificate_text = $row['certificate_text'];
} else {
    echo "Data Sertifikat tidak ditemukan.";
    exit(); // Hentikan eksekusi skrip jika data tidak ditemukan
}

// Tutup koneksi database
$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Sertifikat</title>
    <link rel="stylesheet" type="text/css" href="../style1.css">
</head>
<body>
    <div class="container">
        <h1>Edit Sertifikat</h1>

        <form action="process_edit_certificate.php" method="POST">
            <input type="hidden" name="certificate_id" value="<?php echo $certificate_id; ?>">

            <label for="participant_name">Nama Peserta:</label>
            <input type="text" id="participant_name" name="participant_name" value="<?php echo $participant_name; ?>"><br>

            <label for="event_name">Nama Acara:</label>
            <input type="text" id="event_name" name="event_name" value="<?php echo $event_name; ?>"><br>

            <label for="event_date">Tanggal Acara:</label>
            <input type="date" id="event_date" name="event_date" value="<?php echo $event_date; ?>"><br>

            <label for="certificate_text">Teks Sertifikat:</label>
            <input type="text" id="certificate_text" name="certificate_text" value="<?php echo $certificate_text; ?>"><br><br>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
