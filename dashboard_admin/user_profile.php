<?php 
session_start();
require_once "../connect.php";

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    echo "Access denied";
    exit;
}

// Cek apakah email diberikan
if (!isset($_GET['email'])) {
    echo "Email not provided.";
    exit;
}

// Ambil data pengguna dari database berdasarkan email yang dipilih
$email = mysqli_real_escape_string($conn, $_GET['email']);
$query = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

if (!$user) {
    echo "User not found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account | DevSkills</title>
    <link rel="icon" href="../assets/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link rel="stylesheet" href="user_profile.css">
    <link rel="icon" href="../assets/favicon.ico" type="image/x-icon">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container grid">
        <!-- sidebar -->
        <aside>
            <div class="account-profile flex">
                <img src="../uploads/<?php echo $user['img']; ?>" alt="">
                <h3><?php echo $user['username']; ?></h3>
            </div>
        </aside>

        <main>
            <div class="main-header">
                <h1>Profile of <?php echo $user['username']; ?></h1>
                <p>Informasi mengenai profil pengguna yang dipilih.</p>
            </div>
            <div class="main-form">
                <form>
                    <div class="form">
                        <label for="username">Nama</label>
                        <input type="text" name="username" value="<?php echo $user['username']; ?>" placeholder="Masukkan nama anda.." disabled>
                    </div>
                    <div class="telp-email grid form">
                        <div class="birthday">
                            <label for="birthday">Tanggal Lahir</label>
                            <input type="date" name="birthday" value="<?php echo $user['birthday']; ?>" disabled>
                        </div>
                        <div class="hp">
                            <label for="phone">Nomor HP</label>
                            <input type="tel" name="phone" value="<?php echo $user['phone']; ?>" placeholder="Nomor HP anda.." disabled>
                        </div>
                    </div>
                    <div class="telp-email grid form">
                        <div class="birthday">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="<?php echo $user['email']; ?>" placeholder="Email anda.." disabled>
                        </div>
                        <div class="password">
                            <label for="password">Password</label>
                            <input type="password" name="password" value="<?php echo $user['password']; ?>" disabled>
                        </div>
                    </div>
                    <div class="form">
                        <label for="institution">institution</label>
                        <?php if (!empty($user['institution'])): ?>
                            <input type="text" name="institution" value="<?php echo $user['institution']; ?>" placeholder="Nama sekolah/kampus/universitas" disabled>
                        <?php else: ?>
                            <input type="text" name="institution" value="Institution not available" disabled>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <script src="user_account.js"></script>
</body>
</html>
