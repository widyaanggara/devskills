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

// Contoh mencatat aktivitas ketika mengunjungi halaman dashboard
log_activity($conn, $user_id, 'login', 'Mengunjungi halaman dashboard');

// Mengambil jumlah kursus yang sedang diikuti dan yang telah diselesaikan
$query_inprogress = "SELECT COUNT(*) as count FROM user_courses WHERE id_user = $user_id AND status = 'in_progress'";
$result_inprogress = mysqli_query($conn, $query_inprogress);
$inprogress_count = mysqli_fetch_assoc($result_inprogress)['count'];

$query_completed = "SELECT COUNT(*) as count FROM user_courses WHERE id_user = $user_id AND status = 'completed'";
$result_completed = mysqli_query($conn, $query_completed);
$completed_count = mysqli_fetch_assoc($result_completed)['count'];

// Mengambil data kursus yang sedang diikuti
$query_courses = "SELECT courses.* FROM user_courses
                  JOIN courses ON user_courses.id_course = courses.id_course
                  WHERE user_courses.id_user = $user_id";
$result_courses = mysqli_query($conn, $query_courses);
$courses = [];
while($row = mysqli_fetch_assoc($result_courses)) {
    $courses[] = $row;
}

    $progres_query1 = "SELECT * FROM completed_courses WHERE id_user = $user_id";
    $progres_result1 = mysqli_query($conn, $progres_query1);

    $progres_query2 = "SELECT * FROM completed_courses WHERE id_user = $user_id";
    $progres_result2 = mysqli_query($conn, $progres_query2);

    $progres_query3 = "SELECT * FROM completed_courses WHERE id_user = $user_id";
    $progres_result3 = mysqli_query($conn, $progres_query3);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | DevSkills</title>
    <link rel="icon" href="../assets/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link rel="stylesheet" href="dashboard_user.css">
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
                        <a href="#" class="flex active">
                            <span class="material-symbols-outlined">
                                dashboard
                            </span>
                            <h3>Dashboard</h3>
                        </a>
                        <a href="../allCourses_user/courses.php" class="flex">
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
                        <img src="../uploads/<?php echo $user['img']; ?>" alt="User Profile Picture">
                    </a>
                </div>
            </div>

            <div class="main-content">
                <div class="courses-header">
                    <h1>Your Courses</h1>
                </div>

                <div class="courses-status grid">
                    <div class="inprogress flex">
                        <div class="inprogress-logo">
                            <span class="material-symbols-outlined">
                            schedule
                            </span>
                        </div>
                        <div class="stat">
                            <h3>In Progress</h3>
                            <?php $count_inprogress = 0; 
                            while($inprogress = mysqli_fetch_assoc($progres_result1)) { 
                                if ($inprogress["progres"] < 100){
                                    $count_inprogress = $count_inprogress+1;
                                }
                                 } ?>
                            <p><?php echo $count_inprogress; ?> Courses</p>
                        </div>
                    </div>
                    <div class="completed flex">
                        <div class="completed-logo">
                            <span class="material-symbols-outlined">
                            verified
                            </span>
                        </div>
                        <div class="stat">
                            <h3>Completed</h3>
                            <?php $count_com_progress = 0; 
                            while($com_progress = mysqli_fetch_assoc($progres_result2)) { 
                                if ($com_progress["progres"] == 100){
                                    $count_com_progress = $count_com_progress+1;
                                }
                                 } ?>
                            <p><?php echo $count_com_progress; ?> Courses</p>
                        </div>
                    </div>
                </div>

                <div class="courses-card grid">
                    <?php while($progres = mysqli_fetch_assoc($progres_result3)) {
                        $course_id = $progres['id_course'];
                        $course_query = "SELECT * FROM courses WHERE id_course = $course_id";
                        $course_result = mysqli_query($conn, $course_query);
                        $course = mysqli_fetch_assoc($course_result); ?>
                        <a href="../materi_page1/materi1.php?id_course=<?php echo $course['id_course']; ?>">
                            <div class="card">
                                <img src="../uploads/<?php echo $course['img']; ?>" alt="">
                                <div class="card-content">
                                    <h3><?php echo $course['course_name']; ?></h3>
                                    <p>DevSkills</p>
                                    <div class="bar-progress">
                                        <div class="bar" style="width: <?php echo $progres['progres']; ?>%;"></div>
                                    </div>
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

    <script src="dashboard_user.js"></script>
    <?php } ?>
</body>
</html>
