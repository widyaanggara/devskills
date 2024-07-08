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

    // Mencatat aktivitas ketika memulai kursus
    log_activity($conn, $user_id, 'post-test', "Memulai course post test");

    $course_id = $_GET['id_course'];
    $course_query = "SELECT * FROM courses WHERE id_course = $course_id";
    $course_result = mysqli_query($conn, $course_query);
    $course = mysqli_fetch_assoc($course_result);

    $test_query = "SELECT * FROM post_test WHERE id_course = $course_id";
    $test_result = mysqli_query($conn, $test_query);
    $test = mysqli_fetch_assoc($test_result);
    $test_id = $test['id_test'];

    $quest_query = "SELECT * FROM questions WHERE id_test = $test_id";
    $quest_result = mysqli_query($conn, $quest_query);

    $check = "SELECT * FROM completed_courses WHERE id_course = '$course_id' AND id_user = $user_id";
    $check_result = mysqli_query($conn, $check);
    $checktrue = mysqli_fetch_assoc($check_result);
    $progres = "100";
    if ($checktrue["progres"] < $progres){
        $sql_progres = "UPDATE completed_courses SET progres = '$progres' WHERE id_course = $course_id AND id_user = $user_id";
        if (mysqli_query($conn, $sql_progres)) {
            $completed_courses_id = mysqli_insert_id($conn);
            // Insert logic for matters and post_test similar to your original code
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses | DevSkills</title>
        <link rel="icon" href="../assets/favicon.ico" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
        <link rel="stylesheet" href="materi4.css">
        <link rel="icon" href="../assets/favicon.ico" type="image/x-icon">

        <!-- font awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<?php if ($_SESSION['type'] == 'student') { ?>
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
                        <h1>Post Test <?php echo $course['course_name'] ?></h1>
                        <p>Devskills</p>
                    </div>
                    <?php $no = 0;
                    while($question = mysqli_fetch_assoc($quest_result)) { 
                        $no ++;
                        $id_question = $question['id_question'];
                        $answers_query = "SELECT * FROM answers WHERE id_question = $id_question";
                        $answers_result = mysqli_query($conn, $answers_query);
                        $answers = mysqli_fetch_assoc($answers_result);
                        ?>
                    <!-- pertanyaan 1 -->
                    <div class="question">
                        <div class="question-header">
                            <h3>Pertanyaan <?php echo $no ?></h3>
                            <p><?php echo $question['question'] ?></p>
                        </div>
                        <div class="question-objective grid">
                            <button class="answer flex" id="answer">
                                <div class="objective">
                                        A
                                </div>
                                <div class="keterangan">
                                    <p><?php echo $answers['a_answer'] ?></p>
                                </div>
                            </button>

                            <button class="answer flex" id="answer">
                                <div class="objective">
                                    B
                                </div>
                                <div class="keterangan">
                                    <p><?php echo $answers['b_answer'] ?></p>
                                </div>
                            </button>

                            <button class="answer flex" id="answer">
                                <div class="objective">
                                    C
                                </div>
                                <div class="keterangan">
                                    <p><?php echo $answers['c_answer'] ?></p>
                                </div>
                            </button>

                            <button class="answer flex" id="answer">
                                <div class="objective">
                                    D
                                </div>
                                <div class="keterangan">
                                    <p><?php echo $answers['d_answer'] ?></p>
                                </div>
                            </button>

                        </div>
                    </div>
                    <?php } ?>
                    <div class="question-btn flex">
                        <div class="reset-answer">
                            <button class="reset">Reset Jawaban</button>
                        </div>
                        <div class="submit-answer">
                            <button class="kirim">Kirim</button>
                        </div>
                    </div>

                </div>
                
                <div class="right-side">
                    <h2>Content</h2>
                    <div class="right-level">

                        <a href="../materi_page1/materi1.php?id_course=<?php echo $course_id; ?>">
                            <div class="level flex">
                                <p>1. Introduction</p>
                                <span class="material-symbols-outlined">
                                    play_arrow
                                </span>
                            </div>
                        </a>

                        <a href="../materi_page2/materi2.php?id_course=<?php echo $course_id; ?>">
                            <div class="level flex">
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
                            <div class="level active flex">
                                <p>4. Post Test</p>
                                <span class="material-symbols-outlined">
                                    play_arrow
                                </span>
                            </div>
                        </a>

                    </div>
                </div>
            </div>
            
        </main>
    </div>

    <script src="materi4.js"></script>
    <?php } ?>
</body>
</html>