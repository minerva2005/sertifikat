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

// Query untuk mengambil data dari tabel
$query = "SELECT * FROM events";
$result = $conn->query($query);

// Tampilkan data dalam bentuk tabel HTML
echo "<table border='1'>
<tr>
<th>Event ID</th>
<th>Event Name</th>
<th>Event Date</th>
<th>Location</th>
<th>Organizer</th>
<th>Created At</th>
</tr>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['event_id'] . "</td>";
        echo "<td>" . $row['event_name'] . "</td>";
        echo "<td>" . $row['event_date'] . "</td>";
        echo "<td>" . $row['location'] . "</td>";
        echo "<td>" . $row['organizer'] . "</td>";
        echo "<td>" . $row['created_at'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>Tidak ada data</td></tr>";
}
echo "</table>";

// Tutup koneksi database
$conn->close();
?>
