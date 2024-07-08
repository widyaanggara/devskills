<?php
session_start();
require_once "../connect.php";

$error_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Check for user in the database
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['type'] = $data['type'];

        if ($data['type'] == 'student') {
            header('Location: ../dashboard_user/dashboard_user.php');
        } else if ($data['type'] == 'admin') {
            header('Location: ../dashboard_admin/dashboard_admin.php');
        }
        exit();
    } else {
        $error_message = 'Email atau password salah.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | DevSkills</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="login.css">
    <link rel="icon" href="../assets/favicon.ico" type="image/x-icon">
</head>
<body>
    <div class="container">
        <div class="left-side">
            <img src="../assets/devskills.jpg" alt="DevSkills Logo" class="logo">
            <h2>Log in to DevSkills</h2>
            <p>Selamat Datang kembali! Silahkan masuk ke akun anda</p>

            <form method="POST" action="">
                <?php if ($error_message): ?>
                    <p class="error-message"><?php echo $error_message; ?></p>
                <?php endif; ?>
                <div class="input-group">
                    <img src="../assets/emailicon.png" alt="Email Icon">
                    <input type="email" name="email" placeholder="Your Email" required>
                </div>
                <div class="input-group">
                    <img src="../assets/passwordicon.png" alt="Password Icon">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="login-dtl">
                    <p class="reg-btn disable">Belum punya akun? <a href="../signup/signup.php">Register</a></p>
                    <a href="#" class="forgot-password">Lupa password?</a>
                </div>
                <button type="submit" name="submit" class="login-btn">LOGIN</button>
            </form>
        </div>
        <div class="right-side">
            <h2>Hello, Friend!</h2>
            <p>Masukkan detail pribadi Anda dan mulailah perjalanan bersama kami</p>
            <form method="POST" action="../signup/signup.php">
                <button type="submit" class="sign-up-btn">SIGN UP</button>
            </form>
        </div>
    </div>
</body>
</html>
