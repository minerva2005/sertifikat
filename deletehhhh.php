<?php
include 'scripts/koneksi.php';

$id = $_GET['id'];

$query = "DELETE FROM sertifikat_data WHERE id=$id";
$result = $koneksi->query($query);

if ($result) {
    header("Location: view.php");
    exit();
} else {
    echo 'Gagal menghapus data: ' . $koneksi->error;
}
?>
<?php include 'footer.php'; ?>
