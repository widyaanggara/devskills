<?php
session_start();
require_once "../connect.php";

if (!isset($_SESSION['username'])) {
    exit;
}

$username = $_SESSION['username'];

// Fetch user details
$query = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

// Fetch total users
$result = mysqli_query($conn, "SELECT COUNT(*) as total_users FROM users");
$row = mysqli_fetch_assoc($result);
$total_users = $row['total_users'];

// Fetch all users
$users_result = mysqli_query($conn, "SELECT * FROM users");
$users = [];
while ($row = mysqli_fetch_assoc($users_result)) {
    $users[] = $row;
}

// Ensure 'institution' exists in the result
$institution = isset($user['institution']) ? $user['institution'] : 'Institution not available';

// Fetch total courses
$result = mysqli_query($conn, "SELECT COUNT(*) as total_courses FROM courses");
$row = mysqli_fetch_assoc($result);
$total_courses = $row['total_courses'];

// Fetch total site visits
$result = mysqli_query($conn, "SELECT COUNT(*) as total_visits FROM site_visits");
$row = mysqli_fetch_assoc($result);
$total_visits = $row['total_visits'];

// Fetch total incompleted courses
$result = mysqli_query($conn, "SELECT COUNT(*) as total_incompleted FROM incompleted_courses");
$row = mysqli_fetch_assoc($result);
$total_incompleted = $row['total_incompleted'];

// Fetch total completed courses
$result = mysqli_query($conn, "SELECT COUNT(*) as total_completed FROM completed_courses");
$row = mysqli_fetch_assoc($result);
$total_completed = $row['total_completed'];

// Fetch recent activities
$result = mysqli_query($conn, "SELECT * FROM activities ORDER BY activity_time DESC LIMIT 5");
$activities = [];
while ($row = mysqli_fetch_assoc($result)) {
    $activities[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Admin DevSkills</title>
    <link rel="icon" href="../assets/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link rel="stylesheet" href="dashboard_admin.css">
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
                        <a href="#" class="flex active">
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
                        <a href="../admin-mail/mail.php" class="flex">
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
                        <img src="../uploads/<?php echo $user['img']; ?>" alt="Profile Picture">
                    </a>
                </div>
            </div>

            <div class="main-content">

                <!-- general report -->
                <div class="general-report">
                    <div class="courses-header flex">
                        <h1>General Report</h1>
                    </div>
                    <div class="general-report-main grid">
                        <div class="total flex">
                            <span class="material-symbols-outlined">
                            groups
                            </span>
                            <div class="keterangan">
                                <h2><?php echo $total_users; ?></h2>
                                <p>Total User</p>
                            </div>
                        </div>
                        <div class="total flex">
                            <span class="material-symbols-outlined">
                            menu_book
                            </span>
                            <div class="keterangan">
                                <h2><?php echo $total_courses; ?></h2>
                                <p>Total Courses</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- analytic -->
                <div class="analytic">
                    <div class="courses-header flex">
                        <h1>Analytic</h1>
                    </div>
                    <div class="analytic-main grid">
                        <div class="total flex">
                            <span class="material-symbols-outlined">
                            language
                            </span>
                            <div class="keterangan">
                                <h2><?php echo $total_visits; ?></h2>
                                <p>Site Visit</p>
                            </div>
                        </div>
                        <div class="total flex">
                            <span class="material-symbols-outlined">
                            clock_loader_10
                            </span>
                            <div class="keterangan">
                                <h2><?php echo $total_incompleted; ?></h2>
                                <p>Incompleted Courses</p>
                            </div>
                        </div>
                        <div class="total flex">
                            <span class="material-symbols-outlined">
                            check_circle
                            </span>
                            <div class="keterangan">
                                <h2><?php echo $total_completed; ?></h2>
                                <p>Courses Completed</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- recent activities -->
                <div class="recent-activities">
                    <div class="courses-header flex">
                            <h1>Recent Activities</h1>
                        </div>
                        <div class="recent-activities-main grid">
                        <div class="left flex">
                            <?php 
                            // Fungsi untuk membandingkan waktu aktivitas
                            function compareActivityTime($a, $b) {
                                return strtotime($b['activity_time']) - strtotime($a['activity_time']);
                            }

                            // Mengurutkan array $activities berdasarkan waktu paling baru
                            usort($activities, 'compareActivityTime');

                            // Menampilkan aktivitas dengan urutan terbaru di atas
                            foreach ($activities as $activity): 
                                // Mendapatkan data pengguna berdasarkan id_user dari activity
                                $user_id = $activity['id_user'];
                                $user_result = mysqli_query($conn, "SELECT username, img FROM users WHERE id_user = $user_id");
                                $user_data = mysqli_fetch_assoc($user_result);
                                $username = $user_data['username'];
                                $user_img = $user_data['img'];
                            ?>
                            <div class="user-activities flex">
                                <img src="../uploads/<?php echo $user_img; ?>" alt="User Profile Picture">
                                <div class="keterangan-detail flex">
                                    <div class="keterangan-activity">
                                        <h3><?php echo $username; ?> <?php echo $activity['activity_description']; ?></h3>
                                        <p><?php echo $activity['activity_type']; ?></p>
                                    </div>
                                    <div class="keterangan-time">
                                        <p><?php echo date('h:i A', strtotime($activity['activity_time'])); ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="right flex">
                            <!-- users contact -->
                            <div class="user-profiles-container">
                                <?php foreach ($users as $user) : ?>
                                    <?php if ($user['type'] !== 'admin') : ?>
                                        <div class="user-profile flex">
                                            <div class="user-profile-identity flex">
                                                <img src="../uploads/<?php echo $user['img']; ?>" alt="User Profile Picture">
                                                <div class="user-profile-details">
                                                    <h3><?php echo $user['username']; ?></h3>
                                                    <p><?php echo isset($user['institution']) && !empty($user['institution']) ? $user['institution'] : 'Institution not available'; ?></p>
                                                </div>
                                            </div>
                                            <div class="user-profile-contact flex">
                                                <a href="user_profile.php?email=<?php echo $user['email']; ?>">
                                                    <div class="contact">
                                                        <span class="material-symbols-outlined">person</span>
                                                    </div>
                                                </a>
                                                <a href="mailto:<?php echo $user['email']; ?>">
                                                    <div class="contact">
                                                        <span class="material-symbols-outlined">mail</span>
                                                    </div>
                                                </a>
                                                <a href="tel:<?php echo $user['phone']; ?>">
                                                    <div class="contact">
                                                        <span class="material-symbols-outlined">call</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- weekly top courses -->
                <div class="weekly-courses">
                    <div class="courses-header flex">
                        <h1>Weekly Top Courses</h1>
                    </div>
                    <div class="weekly-courses-header grid">
                        <div class="sub-header">
                            <h3>IMAGE</h3>
                        </div>
                        <div class="sub-header">
                            <h3>COURSE NAME</h3>
                        </div>
                        <div class="sub-header">
                            <h3>ATTEMPTED</h3>
                        </div>
                        <div class="sub-header">
                            <h3>STATUS</h3>
                        </div>
                        <div class="sub-header">
                            <h3>ACTIONS</h3>
                        </div>
                    </div>
                    <div class="weekly-courses-container grid">
                        <div class="img-courses">
                            <img src="../assets/weekly-top.png" alt="">
                        </div>
                        <div class="courses-name">
                            <h3>React JS Development</h3>
                            <p>DevSkills</p>
                        </div>
                        <div class="attempted">
                            <p>187</p>
                        </div>
                        <div class="status">
                            <p>Active</p>
                        </div>
                        <div class="actions flex">
                            <div class="edit flex">
                                <button class="flex edit-btn">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    <p>Edit</p>
                                </button>
                            </div>
                            <div class="delete flex">
                                <button class="flex delete-btn">
                                    <i class="fa-solid fa-trash"></i>
                                    <p>Delete</p>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <a href="../allCourses_admin/input_courses.php" class="all-btn">See all courses</a>
                </div>
            </div>
        </main>
    </div>

    <script src="dashboard_admin.js"></script>
<?php } ?>
</body>
</html>
