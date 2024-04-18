<?php
require_once('../tcpdf/tcpdf.php');

// Ambil ID sertifikat dari parameter URL
$certificate_id = $_GET['id'];

// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sertifikat_online";

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query untuk mendapatkan detail sertifikat berdasarkan ID
$sql_certificate_detail = "SELECT * FROM certificates WHERE certificate_id = $certificate_id";
$result_certificate_detail = $conn->query($sql_certificate_detail);

// Periksa apakah sertifikat ditemukan
if ($result_certificate_detail->num_rows > 0) {
    // Sertifikat ditemukan, ambil detailnya
    $certificate = $result_certificate_detail->fetch_assoc();

    // Buat objek TCPDF
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // Atur informasi dokumen
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Your Name');
    $pdf->SetTitle('Certificate');
    $pdf->SetSubject('Certificate');
    $pdf->SetKeywords('Certificate, TCPDF, PHP');

    // Atur margin
    $pdf->SetMargins(10, 10, 10);
    $pdf->SetHeaderMargin(0);
    $pdf->SetFooterMargin(0);

    // Atur font utama
    $pdf->SetFont('helvetica', '', 12);

    // Tambahkan halaman
    $pdf->AddPage();

    // Tambahkan konten sertifikat
    $content = '
    <h1>Certificate</h1>
    <p><strong>Participant Name:</strong> ' . $certificate['participant_name'] . '</p>
    <p><strong>Event Name:</strong> ' . $certificate['event_name'] . '</p>
    <p><strong>Event Date:</strong> ' . $certificate['event_date'] . '</p>
    <p><strong>Certificate Text:</strong></p>
    <p>' . $certificate['certificate_text'] . '</p>
    ';

    // Tambahkan konten ke PDF
    $pdf->writeHTML($content, true, false, true, false, '');

    // Output PDF ke browser
    $pdf->Output('certificate.pdf', 'I');

} else {
    // Sertifikat tidak ditemukan
    echo "Certificate not found.";
}

$conn->close();
?>
