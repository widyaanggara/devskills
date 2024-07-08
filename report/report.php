<?php 
    session_start();
    require_once "../connect.php";
    
    if (!isset($_SESSION['username'])) {
        exit;
    }
    
    $user_id = $_SESSION['id_user'];
    $username = $_SESSION['username']; // Menyimpan username dari sesi
    $query = "SELECT *, users.img as profile_pic FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);
    
    // Fungsi untuk mencatat aktivitas pengguna
    function log_activity($conn, $user_id, $activity_type, $activity_description) {
        global $username; // Menggunakan variabel global untuk mengakses username
        
        // Buat deskripsi aktivitas dengan menyertakan username
        $full_activity_description = $activity_description;
        
        // Waktu aktivitas diambil dari waktu nyata saat ini
        $activity_time = date('Y-m-d H:i:s');
        
        // Masukkan aktivitas ke dalam database
        $stmt = $conn->prepare("INSERT INTO activities (id_user, activity_type, activity_description, activity_time) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $user_id, $activity_type, $full_activity_description, $activity_time);
        $stmt->execute();
    }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report | DevSkills</title>
    <link rel="icon" href="../assets/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link rel="stylesheet" href="report.css">
    <link rel="icon" href="../assets/favicon.ico" type="image/x-icon">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php if($_SESSION['type'] == 'student'){ ?>
    <div class="container grid">
        <!-- sidebar -->
        <aside>
            <div class="sidebar">
                <div class="side-toggle">
                    <div class="toggle flex">
                        <div class="logo flex">
                            <img src="../assets/Logo.png" alt="">
                            <h2>DevSkills</h2>
                        </div>
                        <div class="close" id="close-btn">
                            <i class="fa-solid fa-xmark"></i>
                        </div>
                    </div>
                </div>
                <div class="nav">
                    <div class="side-nav flex">
                        <a href="../dashboard_user/dashboard_user.php" class="flex">
                            <span class="material-symbols-outlined">
                                dashboard
                            </span>
                            <h3>Dashboard</h3>
                        </a>
                        <a href="../allCourses_user/courses.php" class="flex ">
                            <span class="material-symbols-outlined">
                            grid_view
                            </span>
                            <h3>All Courses</h3>
                        </a>
                        <a href="#" class="flex active">
                            <span class="material-symbols-outlined">
                            report
                            </span>
                            <h3>Report</h3>
                        </a>
                        <a href="../logout.php" class="flex">
                            <span class="material-symbols-outlined">
                            logout
                            </span>
                            <h3>Log Out</h3>
                        </a>
                    </div>
                </div>
            </div>
        </aside>

        <main>
            <div class="main-top flex">
                <button id="menu-btn">
                    <i class="fa-solid fa-bars"></i>
                </button>

                <div class="user-account flex">
                    <a href="../user_account/user_account.php" class="flex">
                        <h3><?php echo $_SESSION['username'] ?></h3>
                        <img src="../uploads/<?php echo $user['img']; ?>" alt="User Profile Picture">
                    </a>
                </div>
            </div>

            <div class="main-content-wrapper">
                <div class="main-content">
                    <div class="report-header">
                        <h1>Welcome, <br class="disable"><?php echo $_SESSION['username'] ?>!</h1>
                        <p>Laporkan Masalah Anda dan Bantu Kami Meningkatkan DevSkills!</p><br>
                    <?php
                    // Fungsi untuk menyimpan laporan ke dalam database
                    function save_report($conn, $user_id, $username, $nomorhp, $email, $message) {
                        // Waktu laporan diambil dari waktu nyata saat ini
                        $report_time = date('Y-m-d H:i:s');
                        
                        // Masukkan laporan ke dalam database
                        $stmt = $conn->prepare("INSERT INTO reports (id_user, username, nomorhp, email, message, report_time) VALUES (?, ?, ?, ?, ?, ?)");
                        $stmt->bind_param("isssss", $user_id, $username, $nomorhp, $email, $message, $report_time);
                        $stmt->execute();

                        // Tampilkan peringatan berhasil
                        echo "<p class='success-message'>Laporan Anda berhasil dikirim!</p>";
                    }

                    // Contoh menyimpan laporan ketika tombol Kirim ditekan
                    if (isset($_POST['submit'])) {
                        $nama = $_POST['username'];
                        $nomorhp = $_POST['nomorhp'];
                        $email = $_POST['email'];
                        $pesan = $_POST['message'];

                        // Panggil fungsi untuk menyimpan laporan ke dalam database
                        save_report($conn, $user_id, $nama, $nomorhp, $email, $pesan);

                        // Log aktivitas pengguna
                        log_activity($conn, $user_id, 'report', 'Melaporkan masalah');
                    }
                    ?>
                    </div>
                    <div class="report-form">
                        <!-- Form untuk mengirimkan laporan -->
                        <form method="POST" action="">
                            <div class="form">
                                <label for="username">Nama</label>
                                <input type="text" name="username" placeholder="Masukkan nama anda.." required>
                            </div>
                            <div class="telp-email grid form">
                                <div class="telp">
                                    <label for="nomorhp">Nomor HP</label>
                                    <input type="number" name="nomorhp" placeholder="Masukkan nomor hp anda.." required>
                                </div>
                                <div class="email">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" placeholder="Masukkan email anda.." required>
                                </div>
                            </div>
                            <div class="form">
                                <label for="message">Pesan</label>
                                <textarea name="message" placeholder="Masukkan pesan anda.." required></textarea>
                            </div>
                            <button type="submit" name="submit" class="report-btn">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
            
        </main>
    </div>
    <?php } ?>
    <script src="report.js"></script>
</body>
</html>
