<?php include '../includes/header.php'; ?>
<?php
include '../scripts/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM sertifikat_data WHERE id=$id";
    $result = $koneksi->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo '<h2>Detail Sertifikat</h2>';
        echo '<p>ID: ' . $row['id'] . '</p>';
        echo '<p>Nama: ' . $row['nama'] . '</p>';
        echo '<p>Jenis Kelamin: ' . $row['jenis_kelamin'] . '</p>';
        echo '<p>Tanggal: ' . $row['tanggal'] . '</p>';
    } else {
        echo 'Sertifikat tidak ditemukan.';
    }
} else {
    echo 'ID sertifikat tidak valid.';
}
?>

<?php include '../includes/footer.php'; ?>
