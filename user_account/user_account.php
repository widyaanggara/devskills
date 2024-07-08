<?php 
session_start();
require_once "../connect.php";

if (!isset($_SESSION['username'])) {
    exit;
}

// Ambil data pengguna dari database
$username = $_SESSION['username'];
$query = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

// Proses form ketika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_profile'])) {
    $new_username = $_POST['username'];
    $birthday = $_POST['birthday'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $institution = $_POST['institution'];

    // Menangani unggahan file foto profil
    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['profile_picture']['tmp_name'];
        $fileName = $_FILES['profile_picture']['name'];
        $fileSize = $_FILES['profile_picture']['size'];
        $fileType = $_FILES['profile_picture']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $newFileName = $username . '-profile.' . $fileExtension;

        $uploadFileDir = '../uploads/';
        $dest_path = $uploadFileDir . $newFileName;

        if(move_uploaded_file($fileTmpPath, $dest_path)) {
            $profile_picture = $newFileName;
        }
    } else {
        $profile_picture = $user['img'];
    }

    // Perbarui data pengguna di database
    $update_query = "UPDATE users SET username = '$new_username', birthday = '$birthday', phone = '$phone', email = '$email', password = '$password', institution = '$institution', img = '$profile_picture' WHERE username = '$username'";
    mysqli_query($conn, $update_query);

    // Perbarui sesi username
    $_SESSION['username'] = $new_username;

    // Refresh halaman
    header("Location: ".$_SERVER['PHP_SELF']);
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
    <link rel="stylesheet" href="user_account.css">
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
                <h3>Hi, <?php echo $_SESSION['username'] ?>!</h3>
                <div class="logout-btn">
                    <form method="post" action="../logout.php">
                        <button type="submit">Log Out</button>
                    </form>
                </div>
            </div>
        </aside>

        <main>
            <div class="main-header">
                <h1>Welcome, <?php echo $_SESSION['username'] ?>!</h1>
                <p>Informasi mengenai profil dan preferensi kamu di seluruh layanan DevSkills.</p>
            </div>
            <div class="main-form">
                <form method="POST" action="" enctype="multipart/form-data">
                    <input type="hidden" name="update_profile" value="1">
                    <div class="form">
                        <label for="username">Nama</label>
                        <input type="text" name="username" value="<?php echo $user['username']; ?>" placeholder="Masukkan nama anda.." required>
                    </div>
                    <div class="telp-email grid form">
                        <div class="birthday">
                            <label for="birthday">Tanggal Lahir</label>
                            <input type="date" name="birthday" value="<?php echo $user['birthday']; ?>" required>
                        </div>
                        <div class="hp">
                            <label for="phone">Nomor HP</label>
                            <input type="tel" name="phone" value="<?php echo $user['phone']; ?>" placeholder="Nomor HP anda.." required>
                        </div>
                    </div>
                    <div class="telp-email grid form">
                        <div class="birthday">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="<?php echo $user['email']; ?>" placeholder="Email anda.." required>
                        </div>
                        <div class="password">
                            <label for="password">Password</label>
                            <input type="password" name="password" value="<?php echo $user['password']; ?>" required>
                        </div>
                    </div>
                    <div class="form">
                        <label for="institution">Institut</label>
                        <input type="text" name="institution" value="<?php echo $user['institution']; ?>" placeholder="Nama sekolah/kampus/universitas" required>
                    </div>
                    <div class="form">
                        <label for="profile_picture">Unggah Foto Profil</label>
                        <input type="file" name="profile_picture" accept="image/*">
                    </div>
                    <div class="submit-btn flex">
                        <button type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <script src="user_account.js"></script>
</body>
</html>
