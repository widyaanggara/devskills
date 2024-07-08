<?php
session_start();
include('../connect.php');

if (!isset($_SESSION['username'])) {
    exit;
}

$user_id = $_SESSION['id_user'];
$username = $_SESSION['username'];
$query = "SELECT *, users.img as profile_pic FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

// Fungsi untuk mencatat aktivitas pengguna
function log_activity($conn, $user_id, $activity_type, $activity_description) {
    global $username; 
    $full_activity_description = $activity_description;
    $activity_time = date('Y-m-d H:i:s');
    $stmt = $conn->prepare("INSERT INTO activities (id_user, activity_type, activity_description, activity_time) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $user_id, $activity_type, $full_activity_description, $activity_time);
    $stmt->execute();
}

// Mencatat aktivitas ketika memulai kursus
log_activity($conn, $user_id, 'course', "Memulai course materi 3");

$course_id = $_GET['id_course'];

$query = "SELECT * FROM matter WHERE id_course = '$course_id' AND no_matter = 2";
$result = mysqli_query($conn, $query);
$matter = mysqli_fetch_assoc($result);

if (!$matter) {
    echo "Materi tidak ditemukan.";
    exit;
}

$judul_materi = $matter['name_matter'];
$link_materi = $matter['link_matter'];
$deskripsi_materi = $matter['description'];

// Extract video ID from link_materi

function extractYouTubeID($url) {
    $pattern = '/^(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/';
    preg_match($pattern, $url, $matches);
    return isset($matches[1]) ? $matches[1] : null;
}

$video_id = extractYouTubeID($link_materi);

if ($video_id) {
    $embed_link = "https://www.youtube.com/embed/" . $video_id;
} else {
    $embed_link = ""; 
}

$check = "SELECT * FROM completed_courses WHERE id_course = '$course_id' AND id_user = $user_id";
    $check_result = mysqli_query($conn, $check);
    $checktrue = mysqli_fetch_assoc($check_result);
    $progres = "50";
    if ($checktrue["progres"] < $progres){
        $sql_progres = "UPDATE completed_courses SET progres = '$progres' WHERE id_course = $course_id AND id_user = $user_id";
        if (mysqli_query($conn, $sql_progres)) {
            $completed_courses_id = mysqli_insert_id($conn);
            // Insert logic for matters and post_test similar to your original code
        }
    }
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses | DevSkills</title>
        <link rel="icon" href="../assets/favicon.ico" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
        <link rel="stylesheet" href="materi2.css">
        <link rel="icon" href="../assets/favicon.ico" type="image/x-icon">

        <!-- font awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
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
                        <a href="#" class="flex">
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
                    <a href="" class="flex">
                        <h3><?php echo htmlspecialchars($_SESSION['username']); ?></h3>
                        <img src="../uploads/<?php echo htmlspecialchars($user['profile_pic']); ?>" alt="User Profile Picture">
                    </a>
                </div>
            </div>

            <div class="main-content grid">
                <div class="main-side">
                    <div class="main-side-header">
                        <h1><?php echo htmlspecialchars($judul_materi); ?></h1>
                        <p>Devskills</p>
                    </div>
                    <div class="main-video">
                    <iframe src="<?php echo htmlspecialchars($embed_link); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                    <div class="main-desc">
                        <h2>About This Course</h2>
                        <p>
                            <?php echo nl2br(htmlspecialchars($deskripsi_materi)); ?>
                        </p>
                    </div>
                </div>
                <div class="right-side">
                    <h2>Content</h2>
                    <div class="right-level">

                        <a href="../materi_page1/materi1.php?id_course=<?php echo $course_id; ?>">
                            <div class="level  flex">
                                <p>1. Introduction</p>
                                <span class="material-symbols-outlined">
                                    play_arrow
                                </span>
                            </div>
                        </a>

                        <a href="#">
                            <div class="level active flex">
                                <p>2. Component Architecture</p>
                                <span class="material-symbols-outlined">
                                    play_arrow
                                </span>
                            </div>
                        </a>

                        <a href="../materi_page3/materi3.php?id_course=<?php echo $course_id; ?>">
                            <div class="level flex">
                                <p>3. Routing & State</p>
                                <span class="material-symbols-outlined">
                                    play_arrow
                                </span>
                            </div>
                        </a>

                        <a href="#">
                            <div class="level flex">
                                <p>4. Post Test</p>
                                <span class="material-symbols-outlined">
                                    lock
                                </span>
                            </div>
                        </a>

                    </div>
                </div>
            </div>
            
        </main>
    </div>

    <script src="materi2.js"></script>
</body>
</html>