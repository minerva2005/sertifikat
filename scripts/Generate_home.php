<?php include '../includes/header.php'; ?>
<main>
    <div class="main">
        <header>
            <h1>Aplikasi Sertifikat</h1>
        </header>

        <table border='1'>
            <tr>
                <th>assignment id </th>
                <th>ID Sertifikat</th>
                <th>ID User</th>
                <th>ID Event</th>
                <th>Action</th>
            </tr>

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
            $query = "SELECT * FROM certificate_assignments";
            $result = $conn->query($query);

            // Tampilkan data dalam bentuk tabel HTML
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['assignment_id'] . "</td>";
                    echo "<td>" . $row['certificate_id'] . "</td>";
                    echo "<td>" . $row['user_id'] . "</td>";
                    echo "<td>" . $row['event_id'] . "</td>";
                    echo "<td><a href='Generate Sertifikat.php?id=" . "'>Generate</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Tidak ada data</td></tr>";
            }
            ?>
        </table>

        <!-- Tombol "Tambah" -->
        <form action="tambah_generate.php" method="GET">
            <button type="submit" class="btn success">Tambah</button>
        </form>
    </div>
</main>
