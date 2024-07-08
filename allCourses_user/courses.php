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

    // Mencatat aktivitas ketika mengunjungi halaman course
    log_activity($conn, $user_id, 'visit', 'Mengunjungi halaman course');

    // Query untuk mengambil data kursus dari database
    $course_query = "SELECT * FROM courses";
    $course_result = mysqli_query($conn, $course_query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses | DevSkills</title>
        <link rel="icon" href="../assets/favicon.ico" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
        <link rel="stylesheet" href="courses.css">
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
                        <a href="#" class="flex active">
                            <span class="material-symbols-outlined">
                            grid_view
                            </span>
                            <h3>All Courses</h3>
                        </a>
                        <a href="../report/report.php" class="flex">
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

                <div class="search-container">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="Search...">
                </div>
                <div class="user-account flex">
                    <a href="../user_account/user_account.php" class="flex">
                        <h3><?php echo $_SESSION['username'] ?></h3>
                        <img src="../uploads/<?php echo $user['profile_pic']; ?>" alt="User Profile Picture">
                    </a>
                </div>
            </div>

            <div class="main-content">
                <div class="courses-header">
                    <h1>Your Courses</h1>
                </div>

                <div class="courses-card grid">
                    <?php while($course = mysqli_fetch_assoc($course_result)) { ?>
                        <a href="../materi_page1/materi1.php?id_course=<?php echo $course['id_course']; ?>">
                            <div class="card">
                                <img src="../uploads/<?php echo $course['img']; ?>" alt="">
                                <div class="card-content">
                                    <h3><?php echo $course['course_name']; ?></h3>
                                    <p>DevSkills</p>
                                    <p class="clasess flex">
                                        <span class="material-symbols-outlined">
                                        menu_book
                                        </span>
                                        4 Classes
                                    </p>
                                </div>
                            </div>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </main>
    </div>

    <script src="courses.js"></script>
    <?php } ?>
</body>
</html>
