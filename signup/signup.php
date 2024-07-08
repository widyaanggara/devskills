<?php
session_start();
require_once "../connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | DevSkills</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="signup.css">
    <link rel="icon" href="../assets/favicon.ico" type="image/x-icon">
</head>
<body>
    <div class="container">
        <div class="left-side">
            <h1>Welcome Back!</h1>
            <p>Untuk tetap terhubung dengan kami, silakan login dengan informasi pribadi anda</p>
            <form method="POST" action="../login/login.php">
                <button type="submit" class="login-btn">LOGIN</button>
            </form>
        </div>
        <div class="right-side">
            <img src="../assets/devskills.jpg" alt="DevSkills Logo" class="logo">
            <h2>Create Account</h2>
            <p>Jelajahi Beragam Kursus Pemrograman Kami Sekarang!</p>
            <?php
            // Cek apakah ada data yang disubmit dari form
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
                $username = htmlspecialchars($_POST['username']);
                $email = htmlspecialchars($_POST['email']);
                $password = htmlspecialchars($_POST['password']);
                $type = 'student';
                $profile_picture = 'avatar-base.svg'; // Gambar profil default

                // Prepare the SQL query to prevent SQL injection
                $stmt = $conn->prepare("INSERT INTO users (username, email, password, type, img) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param("sssss", $username, $email, $password, $type, $profile_picture);

                if ($stmt->execute()) {
                    echo "<p>Account created successfully for $username with email $email</p>";
                } else {
                    echo "<p>Error: " . $stmt->error . "</p>";
                }

                $stmt->close();
                $conn->close();
            }
            ?>
            <form method="POST" action="">
                <div class="input-group">
                    <img src="../assets/nameicon.png" alt="Name Icon">
                    <input type="text" name="username" placeholder="Username" required>
                </div>
                <div class="input-group">
                    <img src="../assets/emailicon.png" alt="Email Icon">
                    <input type="email" name="email" placeholder="Your Email" required>
                </div>
                <div class="input-group">
                    <img src="../assets/passwordicon.png" alt="Password Icon">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <p class="disable">Sudah punya akun? <a href="../login/login.php">Login</a></p>
                <button type="submit" name="submit" class="signup-btn">Register</button>
            </form>
        </div>
    </div>
</body>
</html>
