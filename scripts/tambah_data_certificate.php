<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Form</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        form {
            width: 300px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="date"] {
            width: calc(100% - 12px);
            padding: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        select {
    width: calc(100% - 12px);
    padding: 5px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

select option {
    padding: 5px;
}

    </style>
</head>
<body>


<form action="process_input_sertifikat.php" method="POST">
    <h2 style="text-align: center;">Input Data Event</h2>

    <label for="participant_name">Participant Name:</label>
    <input type="text" id="participant_name" name="participant_name" required>

    <label for="event_name">pilih event:</label><br>
        <select name="event_name" id="event_name">
            <option value="" selected disabled>Choose Program</option>
            <?php
            // Koneksi ke database
            $host = "localhost";
            $username = "root";
            $password = "";
            $database = "sertifikat_online"; // Ganti dengan nama database Anda

            $conn = new mysqli($host, $username, $password, $database);

            // Periksa koneksi
            if ($conn->connect_error) {
                die("Koneksi gagal: " . $conn->connect_error);
            }

            // Query untuk mengambil data program
            $sql = "SELECT event_id, event_name FROM events "; // Ganti dengan nama tabel dan kolom Anda

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
                echo "<option value='' disabled>Data program tidak ditemukan</option>";
            }

            // Tutup koneksi database
            $conn->close();
            ?>
        </select><br>
    
    <label for="event_date">Event Date:</label>
    <input type="date" id="event_date" name="event_date" required>

    <label for="certificate_text">Certificate Text:</label>
    <input type="text" id="certificate_text" name="certificate_text" required>

    <br><br>
    <input type="submit" value="Submit">

</form>

</body>
</html>
