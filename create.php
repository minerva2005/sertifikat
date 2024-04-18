<?php include '../includes/header.php'; ?>
<?php
include '../scripts/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $jenis_kelamin = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin']);
    $tanggal = mysqli_real_escape_string($koneksi, $_POST['tanggal']);

    $query = "INSERT INTO sertifikat_data (nama, jenis_kelamin, tanggal) VALUES ('$nama', '$jenis_kelamin', '$tanggal')";
    $result = $koneksi->query($query);

    if ($result) {
        echo 'Data berhasil ditambahkan.';
    } else {
        echo 'Gagal menambahkan data: ' . $koneksi->error;
    }
}
?>

    <h2>Input Sertifikat</h2>
    <form method="post" action="../pages/create.php">
        Nama: <input type="text" name="nama" required><br>
        Jenis Kelamin:
        <input type="radio" name="jenis_kelamin" value="Laki-laki" required> Laki-laki
        <input type="radio" name="jenis_kelamin" value="Perempuan" required> Perempuan<br>
        Tanggal: <input type="date" name="tanggal" required><br>
        <input type="submit" value="Tambahkan">
    </form>

<?php include '../includes/footer.php'; ?>
