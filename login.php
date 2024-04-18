<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <!-- Menambahkan CSS eksternal -->
    <link rel="stylesheet" href="style1.css">
</head>

<body>

<header>
    <div class="container">
        <h1>Sertifikat Online SMK YAJ</h1>

        <form action="scripts/proses_login.php" method="post">
            <label for="username">Email:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" class="btn success">MASUK</button>
        </form>

        <p>Belum punya akun? <a href="/Sertifikat/bikin_akun.php">Buat akun</a></p>
    </div>
</header>

</body>
</html>