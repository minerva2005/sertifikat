<!DOCTYPE html>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/Sertifikat/scripts/koneksi.php'; ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Akun</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>

<header>
    <div class="container">
        <h1>Sertifikat Online SMK YAJ</h1>

        <form action="proses_pendaftaran.php" method="post">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="text" id="password" name="password" required>

            <label for="full_name">Full Name:</label>
            <input type="text" id="full_name" name="full_name" required>

            <label for="user_password">User Password:</label>
            <input type="password" id="user_password" name="user_password" required>

            <button type="submit" class="btn success">Daftar</button>
        </form>

        <p>Sudah punya akun? <a href="index.php">Login</a></p>
    </div>
</header>

</body>
</html>