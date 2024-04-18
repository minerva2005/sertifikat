<?php
require_once('tcpdf/tcpdf.php');

// Function to generate certificate PDF
function generateCertificateFromDatabase($certificateId) {
    // Create new PDF document
    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

    // Set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Your Name');
    $pdf->SetTitle('Certificates');

    // Set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 011', PDF_HEADER_STRING);

    // Set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    // Set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    // Set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    // Set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    // Set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    // ---------------------------------------------------------

    // Add a page
    $pdf->AddPage();

    // Fetch certificate information from the database
    $certificateInfo = fetchCertificateInfoFromDatabase($certificateId);

    // Set font
    $pdf->SetFont('times', 'B', 20);

    // Title
    $pdf->Cell(0, 10, 'Certificate of Participation', 0, 1, 'C');

    // Line break
    $pdf->Ln(10);

    // Set font
    $pdf->SetFont('times', '', 14);

    // Participant's name
    $pdf->Cell(0, 10, 'This certificate is awarded to ' . $certificateInfo['participant_name'] . ' for participation in', 0, 1, 'C');

    // Event name
    $pdf->Cell(0, 10, '"' . $certificateInfo['event_name'] . '"', 0, 1, 'C');

    // Event date
    $pdf->Cell(0, 10, 'held on ' . $certificateInfo['event_date'], 0, 1, 'C');

    // Line break
    $pdf->Ln(10);

    // Certificate text
    $pdf->MultiCell(0, 10, $certificateInfo['certificate_text'], 0, 'C');

    // ---------------------------------------------------------

    // Close and output PDF document
    // This method has several options, check the documentation for more info.
    $pdf->Output('certificate.pdf', 'I');
}

// Example usage:
$certificateId = 1; // ID sertifikat yang ingin Anda cetak
generateCertificateFromDatabase($certificateId);

// Function to fetch certificate information from database
function fetchCertificateInfoFromDatabase($certificateId) {
    // Lakukan kueri ke database untuk mendapatkan informasi sertifikat berdasarkan ID
    // Di sini saya menggunakan contoh koneksi ke database dan kueri dengan PDO
    $dbhost = 'localhost';
    $dbname = 'sertifikat_online';
    $username = 'root';
    $password = '';

    // Buat koneksi PDO
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $username, $password);

    // Set mode error PDO menjadi Exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Kueri SQL untuk mengambil informasi sertifikat berdasarkan ID
    $stmt = $conn->prepare("SELECT participant_name, event_name, event_date, certificate_text FROM certificates WHERE certificate_id = :certificate_id");

    // Bind parameter
    $stmt->bindParam(':certificate_id', $certificateId);

    // Eksekusi kueri
    $stmt->execute();

    // Ambil hasil kueri
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}
?>
