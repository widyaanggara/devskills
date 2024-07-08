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

    // Query untuk mengambil data courses
    $query_courses = "SELECT * FROM courses";
    $result_courses = mysqli_query($conn, $query_courses);

    $course_id = isset($_GET['id_course']) ? $_GET['id_course'] : null;
    $course = null;

    if ($course_id) {
        $query = "SELECT * FROM courses WHERE id = '$id_course'";
        $result = mysqli_query($conn, $query);
        $course = mysqli_fetch_assoc($result);
    }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses | Admin DevSkills</title>
    <link rel="icon" href="../assets/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link rel="stylesheet" href="input_courses.css">
    <link rel="icon" href="../assets/favicon.ico" type="image/x-icon">
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
                        <a href="#" class="flex active">
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
                <div class="courses-header flex">
                    <h1>Your Courses</h1>
                    <div class="add-courses-btn flex">
                        <a href="../add_courses/add_courses.php" class="flex add-btn">
                            <span class="material-symbols-outlined">
                                add
                            </span>
                            <p>Add a New Course</p>
                        </a>
                    </div>
                </div>

                <div class="courses-card grid">
                <?php while ($course = mysqli_fetch_assoc($result_courses)) : ?>
                    <a href="../add_courses/add_courses.php?course_id=<?php echo $course['id_course']; ?>">
                        <div class="card">
                            <img src="../uploads/<?php echo $course['img']; ?>" alt="">
                            <div class="card-content">
                                <h3><?php echo $course['course_name']; ?></h3>
                                <p>DevSkills</p>
                                <p class="clasess flex">
                                    <i class="fa-solid fa-book-open book-card"></i>
                                    4 Classes
                                </p>
                            </div>
                        </div>
                    </a>
                <?php endwhile; ?>

                    <!-- Card untuk menambahkan course baru -->
                    <a href="../add_courses/add_courses.php" class="input-courses-card">
                        <div class="card">
                            <img src="../assets/input-courses.png" alt="">
                            <div class="card-content">
                                <h3>Add Courses</h3>
                                <p>DevSkills</p>
                                <p class="clasess flex">
                                    <i class="fa-solid fa-book-open book-card"></i>
                                </p>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
            
        </main>
    </div>

    <script src="input_courses.js"></script>
<?php } ?>
</body>
</html>
