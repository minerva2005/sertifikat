<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Sertifikat</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Generate Sertifikat</h2>
    <form action="process_generate.php" method="POST">
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" required><br>

        <label for="nomor_sertifikat">Nomor Sertifikat:</label><br>
        <input type="text" id="nomor_sertifikat" name="nomor_sertifikat" required><br>

        <input type="submit" value="Generate">
    </form>

    <h2>Daftar Sertifikat</h2>
    <table>
        <tr>
            <th>Nama</th>
            <th>Nomor Sertifikat</th>
        </tr>
        <!-- Tempat untuk menampilkan sertifikat yang telah digenerate -->
    </table>
</body>
</html>