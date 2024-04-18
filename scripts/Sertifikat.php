<?php include '../includes/header.php'; ?>
<main>
    <div class="main">
        <header>
            <h1>Aplikasi Sertifikat</h1>
        </header>

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
        $query = "SELECT * FROM certificate";
        $result = $conn->query($query);

        // Tampilkan data dalam bentuk tabel HTML
        echo "<table border='1'>
        <tr>
        <th>Certificate ID</th>
        <th>Participant Name</th>
        <th>Event Name</th>
        <th>Event Date</th>
        <th>Certificate Text</th>
        <th>Created At</th>
        <th>Action</th>
        </tr>";
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['certificate_id'] . "</td>";
                echo "<td>" . $row['participant_name'] . "</td>";
                echo "<td>" . $row['event_name'] . "</td>";
                echo "<td>" . $row['event_date'] . "</td>";
                echo "<td>" . $row['certificate_text'] . "</td>";
                echo "<td>" . $row['created_at'] . "</td>";
                echo "<td>";
                echo "<a href='edit_certificate.php?id=" . $row['certificate_id'] . "'>Edit</a> | ";
                echo "<a href='delete_certificate.php?id=" . $row['certificate_id'] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus event ini?\")'>Hapus</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>Tidak ada data</td></tr>";
        }
        echo "</table>";

        // Tutup koneksi database
        $conn->close();
        ?>


        <!-- Tombol "Tambah" -->
        <button type="button" onclick="tambahData()" class="btn success">Tambah</button>
        </form>

        <script>
            function tambahData() {
                // Navigasi ke halaman tambah_data.php
                window.location.href = "tambah_data_certificate.php";
            }
        </script>

    </div>
</main>
