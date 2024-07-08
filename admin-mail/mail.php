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

    // Ambil data laporan dari tabel reports
    $query_reports = "SELECT * FROM reports";
    $result_reports = mysqli_query($conn, $query_reports);
    
    // Fungsi hapus data
    if (isset($_GET['delete_id'])) {
        $delete_id = $_GET['delete_id'];
        $query_delete = "DELETE FROM reports WHERE id = $delete_id";
        if (mysqli_query($conn, $query_delete)) {
            $success_message = "Data berhasil dihapus";
        } else {
            $error_message = "Gagal menghapus data: " . mysqli_error($conn);
        }
    }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail | Admin DevSkills</title>
    <link rel="icon" href="../assets/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link rel="stylesheet" href="mail.css">
    <link rel="icon" href="../assets/favicon.ico" type="image/x-icon">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php if($_SESSION['type'] == 'admin'){ ?>
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
                        <a href="../dashboard_admin/dashboard_admin.php" class="flex">
                            <span class="material-symbols-outlined">
                                dashboard
                            </span>
                            <h3>Dashboard</h3>
                        </a>
                        <a href="../allCourses_admin/input_courses.php" class="flex">
                            <span class="material-symbols-outlined">
                            grid_view
                            </span>
                            <h3>All Courses</h3>
                        </a>
                        <a href="#" class=" active flex">
                            <span class="material-symbols-outlined">
                            mail
                            </span>
                            <h3>Mail</h3>
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

                <div class="search-container">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="Search...">
                </div>
                <div class="user-account flex">
                    <a href="../admin_account/admin_account.php" class="flex">
                        <div class="admin-name">
                            <h3><?php echo $_SESSION['username'] ?></h3>
                            <p>Admin</p>
                        </div>
                        <img src="../uploads/<?php echo $user['profile_pic']; ?>" alt="Profile Picture">
                    </a>
                </div>
            </div>

            <div class="main-content">
                <div class="courses-header flex">
                    <h1>Mail</h1>
                </div>

                <div class="main-content">
                    <div class="comentar-content">
                    <?php while($row = mysqli_fetch_assoc($result_reports)) { ?>
                        <div class="comentar grid">
                            <div class="left-side grid">
                                <div class="comentar-profile flex">
                                    <?php
                                        $user_result = mysqli_query($conn, "SELECT username, img FROM users WHERE id_user = " . $row['id_user']);
                                        $user_data = mysqli_fetch_assoc($user_result);
                                        $username = $user_data['username'];
                                        $user_img = $user_data['img'];
                                    ?>
                                <img src="../uploads/<?php echo $user_img; ?>" alt="User Profile Picture">
                                    <div class="detail-profile">
                                        <h3><?php echo $row['username']; ?></h3>
                                        <a href="?delete_id=<?php echo $row['id']; ?>">Delete</a>
                                    </div>
                                </div>
                                <div class="comentar-ril">
                                    <p><?php echo $row['message']; ?></p>
                                </div>
                            </div>
                            <div class="right-side">
                                <p><?php echo date('Y-m-d h:i A', strtotime($row['report_time'])); ?></p>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                </div>
                
            </div>
            
        </main>
    </div>
    <?php } ?>
    <script src="mail.js"></script>
    <script>
        // Cek jika ada pesan sukses atau error, kemudian alert dan refresh halaman
        <?php if (isset($success_message) || isset($error_message)) { ?>
            alert("<?php echo isset($success_message) ? $success_message : $error_message; ?>");
            window.location.href = window.location.href.split('?')[0]; // Redirect ke halaman yang sama
        <?php } ?>
    </script>
    <?php 
        if (isset($success_message)) {
            echo "<script>alert('$success_message');</script>";
        }
        if (isset($error_message)) {
            echo "<script>alert('$error_message');</script>";
        }
        
    ?>
</body>
</html>
