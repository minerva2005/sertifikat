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

// Tangkap parameter id event yang akan diedit
$event_id = $_GET['id'];

// Query untuk mengambil data event berdasarkan event_id
$query = "SELECT * FROM events WHERE event_id = $event_id";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $event_name = $row['event_name'];
    $event_date = $row['event_date'];
    $location = $row['location'];
    $organizer = $row['organizer'];
} else {
    echo "Data event tidak ditemukan.";
    exit(); // Hentikan eksekusi skrip jika data tidak ditemukan
}

// Tutup koneksi database
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
    <link rel="stylesheet" type="text/css" href="../style1.css">
</head>
<body>
    <div class="container">
        <h1>Edit Event</h1>

        <form action="process_edit_event.php" method="POST">
            <input type="hidden" name="event_id" value="<?php echo $event_id; ?>">
            <label for="event_name">Event Name:</label>
            <input type="text" id="event_name" name="event_name" value="<?php echo $event_name; ?>"><br>
            <label for="event_date">Event Date:</label>
            <input type="date" id="event_date" name="event_date" value="<?php echo $event_date; ?>"><br>
            <label for="location">Location:</label>
            <input type="text" id="location" name="location" value="<?php echo $location; ?>"><br>
            <label for="organizer">Organizer:</label>
            <input type="text" id="organizer" name="organizer" value="<?php echo $organizer; ?>"><br><br>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
