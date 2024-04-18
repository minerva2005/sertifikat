<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Sertifikat</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        select,
        input[type="text"] {
            width: calc(100% - 20px);
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 3px;
            transition: border-color 0.3s;
            box-sizing: border-box;
        }

        select:focus,
        input[type="text"]:focus {
            border-color: #80bdff;
            outline: none;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
    
</head>
<body>
    <h2>Generate Sertifikat</h2>
    <form action="process_generate.php" method="POST">
        <label for="user">Pilih Pengguna:</label><br>
        <select name="user" id="user">
            <option value="" selected disabled>Choose User</option>
            <?php
            // Koneksi ke database
            $host = "localhost";
            $username = "root";
            $password = "";
            $database = "sertifikat_online";

            $conn = new mysqli($host, $username, $password, $database);

            // Periksa koneksi
            if ($conn->connect_error) {
                die("Koneksi gagal: " . $conn->connect_error);
            }

            // Query untuk mengambil data pengguna
            $sql = "SELECT user_id, full_name FROM users"; // Sesuaikan dengan nama tabel dan kolom Anda

            // Jalankan query
            $result = $conn->query($sql);

            // Periksa apakah ada hasil yang dikembalikan
            if ($result->num_rows > 0) {
                // Loop melalui setiap baris hasil
                while ($row = $result->fetch_assoc()) {
                    // Tampilkan opsi untuk setiap baris
                    echo "<option value='" . $row['user_id'] . "'>" . $row['full_name'] . "</option>";
                }
            } else {
                echo "<option value='' disabled>Data pengguna tidak ditemukan</option>";
            }

            // Tutup koneksi database
            $conn->close();
            ?>
        </select><br>




        <label for="certificate">Pilih Sertifikat:</label><br>
        <select name="certificate" id="certificate">
            <option value="" selected disabled>Choose Certificate</option>
            <?php
            
            // Koneksi ke database
            $host = "localhost";
            $username = "root";
            $password = "";
            $database = "sertifikat_online";

            $conn = new mysqli($host, $username, $password, $database);

            // Periksa koneksi
            if ($conn->connect_error) {
                die("Koneksi gagal: " . $conn->connect_error);
            }

            // Query untuk mengambil data pengguna
            $sql = "SELECT certificate_id, participant_name FROM certificate"; // Sesuaikan dengan nama tabel dan kolom Anda

            // Jalankan query
            $result = $conn->query($sql);

            // Periksa apakah ada hasil yang dikembalikan
            if ($result->num_rows > 0) {
                // Loop melalui setiap baris hasil
                while ($row = $result->fetch_assoc()) {
                    // Tampilkan opsi untuk setiap baris
                    echo "<option value='" . $row['certificate_id'] . "'>" . $row['participant_name'] . "</option>";
                }
            } else {
                echo "<option value='' disabled>Data pengguna tidak ditemukan</option>";
            }

            // Tutup koneksi database
            $conn->close();

            ?>
        </select><br>


        <label for="event">Pilih Event:</label><br>
        <select name="event" id="event">
            <option value="" selected disabled>Choose Event</option>
            <?php
            
            // Koneksi ke database
            $host = "localhost";
            $username = "root";
            $password = "";
            $database = "sertifikat_online";

            $conn = new mysqli($host, $username, $password, $database);

            // Periksa koneksi
            if ($conn->connect_error) {
                die("Koneksi gagal: " . $conn->connect_error);
            }

            // Query untuk mengambil data pengguna
            $sql = "SELECT 	event_id, event_name FROM events"; // Sesuaikan dengan nama tabel dan kolom Anda

            // Jalankan query
            $result = $conn->query($sql);

            // Periksa apakah ada hasil yang dikembalikan
            if ($result->num_rows > 0) {
                // Loop melalui setiap baris hasil
                while ($row = $result->fetch_assoc()) {
                    // Tampilkan opsi untuk setiap baris
                    echo "<option value='" . $row['event_id'] . "'>" . $row['event_name'] . "</option>";
                }
            } else {
                echo "<option value='' disabled>Data pengguna tidak ditemukan</option>";
            }

            // Tutup koneksi database
            $conn->close();


            ?>
        </select><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
