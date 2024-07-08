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

$course = null;
$matters = [];
$post_test = [];
if (isset($_GET['id_course'])) {
    $course_id = $_GET['id_course'];
    $course_query = "SELECT * FROM courses WHERE id_course = $course_id";
    $course_result = mysqli_query($conn, $course_query);
    $course = mysqli_fetch_assoc($course_result);
    
    $matter_query = "SELECT * FROM matter WHERE id_course = $course_id";
    $matter_result = mysqli_query($conn, $matter_query);
    while ($row = mysqli_fetch_assoc($matter_result)) {
        $matters[] = $row;
    }

    $post_test_query = "SELECT * FROM post_test WHERE id_course = $course_id";
    $post_test_result = mysqli_query($conn, $post_test_query);
    $post_test = mysqli_fetch_assoc($post_test_result);

    if ($post_test) {
        $questions_query = "SELECT * FROM questions WHERE id_test = " . $post_test['id_test'];
        $questions_result = mysqli_query($conn, $questions_query);
        while ($row = mysqli_fetch_assoc($questions_result)) {
            $post_test['questions'][] = $row;
        }

        foreach ($post_test['questions'] as &$question) {
            $answers_query = "SELECT * FROM answers WHERE id_question = " . $question['id_question'];
            $answers_result = mysqli_query($conn, $answers_query);
            $question['answers'] = mysqli_fetch_assoc($answers_result);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle the form submission for creating or updating a course
    // Sanitize and validate input data
    $judul_courses = mysqli_real_escape_string($conn, $_POST['judul-courses']);
    $courses_img = $_FILES['courses-img']['name'];

    // Handle file upload for courses-img
    if (isset($_FILES['courses-img']) && $_FILES['courses-img']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['courses-img']['tmp_name'];
        $fileName = $_FILES['courses-img']['name'];
        $fileSize = $_FILES['courses-img']['size'];
        $fileType = $_FILES['courses-img']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $newFileName = str_replace(' ', '-', strtolower($judul_courses)) . '-' . basename($fileNameCmps[0]) . '.' . $fileExtension;

        $uploadFileDir = '../uploads/';
        $dest_path = $uploadFileDir . $newFileName;

        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            $courses_img = $newFileName;
        }
    } else {
        $courses_img = $default_course_img; // Set this variable as needed if the image is not uploaded
    }

    if (isset($course_id)) {
        // Update existing course
        $sql_course = "UPDATE courses SET course_name = '$judul_courses', img = '$courses_img' WHERE id_course = $course_id";
        mysqli_query($conn, $sql_course);

        for ($i = 1; $i <= 3; $i++) {
            $no_matter = $i;
            $judul_materi = mysqli_real_escape_string($conn, $_POST["judul-materi-$i"]);
            $link_materi = mysqli_real_escape_string($conn, $_POST["link-materi-$i"]);
            $deskripsi_materi = mysqli_real_escape_string($conn, $_POST["deskripsi-materi-$i"]);

            if (isset($matters[$i - 1])) {
                $matter_id = $matters[$i - 1]['id_matter'];
                $sql_matter = "UPDATE matter SET name_matter = '$judul_materi', link_matter = '$link_materi', description = '$deskripsi_materi' WHERE id_matter = $matter_id";
            } else {
                $sql_matter = "INSERT INTO matter (id_course, no_matter, name_matter, link_matter, description) VALUES ('$course_id', '$no_matter', '$judul_materi', '$link_materi', '$deskripsi_materi')";
            }
            mysqli_query($conn, $sql_matter);
        }

        // Update post test
        $sql_post_test = "UPDATE post_test SET id_course = '$course_id' WHERE id_course = $course_id";
        mysqli_query($conn, $sql_post_test);

        for ($i = 1; $i <= 5; $i++) {
            $question = mysqli_real_escape_string($conn, $_POST["question-$i"]);
            $a_answer = mysqli_real_escape_string($conn, $_POST["objective-$i-a"]);
            $b_answer = mysqli_real_escape_string($conn, $_POST["objective-$i-b"]);
            $c_answer = mysqli_real_escape_string($conn, $_POST["objective-$i-c"]);
            $d_answer = mysqli_real_escape_string($conn, $_POST["objective-$i-d"]);
            $correct_answer = mysqli_real_escape_string($conn, $_POST["correct-answer-$i"]);

            if (isset($post_test['questions'][$i - 1])) {
                $question_id = $post_test['questions'][$i - 1]['id_question'];
                $sql_question = "UPDATE questions SET question = '$question' WHERE id_question = $question_id";

                if (mysqli_query($conn, $sql_question)) {
                    $sql_answer = "UPDATE answers SET a_answer = '$a_answer', b_answer = '$b_answer', c_answer = '$c_answer', d_answer = '$d_answer' WHERE id_question = $question_id";
                    mysqli_query($conn, $sql_answer);

                    $sql_cheatcode = "UPDATE cheatcodes SET correct_answer = '$correct_answer' WHERE id_question = $question_id";
                    mysqli_query($conn, $sql_cheatcode);
                }
            } else {
                $sql_question = "INSERT INTO questions (id_test, question) VALUES ('$post_test_id', '$question')";
                if (mysqli_query($conn, $sql_question)) {
                    $question_id = mysqli_insert_id($conn);
                    $sql_answer = "INSERT INTO answers (id_question, a_answer, b_answer, c_answer, d_answer) VALUES ('$question_id', '$a_answer', '$b_answer', '$c_answer', '$d_answer')";
                    if (mysqli_query($conn, $sql_answer)) {
                        $answer_id = mysqli_insert_id($conn);
                        $sql_cheatcode = "INSERT INTO cheatcodes (id_test, id_answer, id_question, correct_answer) VALUES ('$post_test_id', '$answer_id', '$question_id', '$correct_answer')";
                        mysqli_query($conn, $sql_cheatcode);
                    }
                }
            }
        }
    } else {
        // Insert new course
        $sql_course = "INSERT INTO courses (course_name, img) VALUES ('$judul_courses', '$courses_img')";
        if (mysqli_query($conn, $sql_course)) {
            $course_id = mysqli_insert_id($conn);
            
            for ($i = 1; $i <= 3; $i++) {
                $no_matter = $i;
                $judul_materi = mysqli_real_escape_string($conn, $_POST["judul-materi-$i"]);
                $link_materi = mysqli_real_escape_string($conn, $_POST["link-materi-$i"]);
                $deskripsi_materi = mysqli_real_escape_string($conn, $_POST["deskripsi-materi-$i"]);
                //Insert new MATERI bukan Matter, Iya sih bahasa inggris Materi tu Matter, tapi buka materi (fisika) ini kan materi (pelajaran)
                $sql_matter = "INSERT INTO matter (id_course, no_matter, name_matter, link_matter, description) VALUES ('$course_id', '$no_matter', '$judul_materi', '$link_materi', '$deskripsi_materi')";
                mysqli_query($conn, $sql_matter);
            }
            //Insert new post_test, answers, and cheatcodes
            $sql_post_test = "INSERT INTO post_test (id_course) VALUES ('$course_id')";
            if (mysqli_query($conn, $sql_post_test)) {
                $post_test_id = mysqli_insert_id($conn);

                for ($i = 1; $i <= 5; $i++) {
                    $question = mysqli_real_escape_string($conn, $_POST["question-$i"]);
                    $a_answer = mysqli_real_escape_string($conn, $_POST["objective-$i-a"]);
                    $b_answer = mysqli_real_escape_string($conn, $_POST["objective-$i-b"]);
                    $c_answer = mysqli_real_escape_string($conn, $_POST["objective-$i-c"]);
                    $d_answer = mysqli_real_escape_string($conn, $_POST["objective-$i-d"]);
                    $correct_answer = mysqli_real_escape_string($conn, $_POST["correct-answer-$i"]);

                    $sql_question = "INSERT INTO questions (id_test, question) VALUES ('$post_test_id', '$question')";
                    if (mysqli_query($conn, $sql_question)) {
                        $question_id = mysqli_insert_id($conn);
                        $sql_answer = "INSERT INTO answers (id_question, a_answer, b_answer, c_answer, d_answer) VALUES ('$question_id', '$a_answer', '$b_answer', '$c_answer', '$d_answer')";
                        if (mysqli_query($conn, $sql_answer)) {
                            $answer_id = mysqli_insert_id($conn);
                            $sql_cheatcode = "INSERT INTO cheatcodes (id_test, id_answer, id_question, correct_answer) VALUES ('$post_test_id', '$answer_id', '$question_id', '$correct_answer')";
                            mysqli_query($conn, $sql_cheatcode);
                        }
                    }
                }
            }
        }
    }
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Courses | Admin DevSkills</title>
    <link rel="icon" href="../assets/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link rel="stylesheet" href="add_courses.css">
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
                <div class="upload-materi-header">
                    <h2>Upload Courses</h2>
                </div>
                <div class="input-courses-form">
                    <form action="add_courses.php" method="POST" enctype="multipart/form-data">
                        <div class="form">
                            <label for="title">Judul Courses</label>
                            <input type="text" name="judul-courses" placeholder="Masukkan judul courses.." required>
                        </div>
                        <div class="input-img form ">
                            <label for="courses-img">Courses Image</label>
                            <input type="file" name="courses-img" required>
                        </div>
                        <div class="upload-materi">
                            <div class="upload-materi-header">
                                <h2>Upload Materi Courses</h2>
                            </div>
                            <div class="upload-materi-btn flex">
                                <button type="button" class="materi-btn active" data-content="content-a">Materi 1</button>
                                <button type="button" class="materi-btn" data-content="content-b">Materi 2</button>
                                <button type="button" class="materi-btn" data-content="content-c">Materi 3</button>
                                <button type="button" class="materi-btn" data-content="content-d">Post Test</button>
                            </div>
                            <div id="content-a" class="materi-content">
                                <div class="form">
                                    <label for="judul-materi-1">Judul Materi</label>
                                    <input type="text" name="judul-materi-1" placeholder="Masukkan judul materi.." required>
                                </div>
                                <div class="form">
                                    <label for="link-materi-1">Link Materi</label>
                                    <input type="url" name="link-materi-1" placeholder="Masukkan link materi.." required>
                                </div>
                                <div class="form">
                                    <label for="deskripsi-materi-1">Deskripsi Materi</label>
                                    <input type="text" name="deskripsi-materi-1" placeholder="Masukkan deskripsi materi.." required>
                                </div>
                            </div>
                            <div id="content-b" class="materi-content hidden">
                                <div class="form">
                                    <label for="judul-materi-2">Judul Materi</label>
                                    <input type="text" name="judul-materi-2" placeholder="Masukkan judul materi.." required>
                                </div>
                                <div class="form">
                                    <label for="link-materi-2">Link Materi</label>
                                    <input type="url" name="link-materi-2" placeholder="Masukkan link materi.." required>
                                </div>
                                <div class="form">
                                    <label for="deskripsi-materi-2">Deskripsi Materi</label>
                                    <input type="text" name="deskripsi-materi-2" placeholder="Masukkan deskripsi materi.." required>
                                </div>
                            </div>
                            <div id="content-c" class="materi-content hidden">
                                <div class="form">
                                    <label for="judul-materi-3">Judul Materi</label>
                                    <input type="text" name="judul-materi-3" placeholder="Masukkan judul materi.." required>
                                </div>
                                <div class="form">
                                    <label for="link-materi-3">Link Materi</label>
                                    <input type="url" name="link-materi-3" placeholder="Masukkan link materi.." required>
                                </div>
                                <div class="form">
                                    <label for="deskripsi-materi-3">Deskripsi Materi</label>
                                    <input type="text" name="deskripsi-materi-3" placeholder="Masukkan deskripsi materi.." required>
                                </div>
                            </div>
                            <div id="content-d" class="materi-content hidden">
                                <div class="pertanyaan-ril">
                                    <div class="form pertanyaan">
                                        <label for="question-1">Pertanyaan 1</label>
                                        <input type="text" name="question-1" placeholder="Masukkan pertanyaan.." required>
                                    </div>
                                    <div class="jawaban">
                                        <h4>Jawaban</h4>
                                        <div class="question-objective form grid">
                                            <input type="text" name="objective-1-a" placeholder="Masukkan jawaban A.." required>
                                            <input type="text" name="objective-1-b" placeholder="Masukkan jawaban B.." required>
                                            <input type="text" name="objective-1-c" placeholder="Masukkan jawaban C.." required>
                                            <input type="text" name="objective-1-d" placeholder="Masukkan jawaban D.." required>
                                        </div>
                                        <div class="form pertanyaan">
                                            <label for="correct-answer-1">Jawaban Benar</label>
                                            <select name="correct-answer-1">
                                                <option value="a">A</option>
                                                <option value="b">B</option>
                                                <option value="c">C</option>
                                                <option value="d">D</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form pertanyaan">
                                        <label for="question-2">Pertanyaan 2</label>
                                        <input type="text" name="question-2" placeholder="Masukkan pertanyaan.." required>
                                    </div>
                                    <div class="jawaban">
                                        <h4>Jawaban</h4>
                                        <div class="question-objective form grid">
                                            <input type="text" name="objective-2-a" placeholder="Masukkan jawaban A.." required>
                                            <input type="text" name="objective-2-b" placeholder="Masukkan jawaban B.." required>
                                            <input type="text" name="objective-2-c" placeholder="Masukkan jawaban C.." required>
                                            <input type="text" name="objective-2-d" placeholder="Masukkan jawaban D.." required>
                                        </div>
                                        <div class="form pertanyaan">
                                            <label for="correct-answer-2">Jawaban Benar</label>
                                            <select name="correct-answer-2">
                                                <option value="a">A</option>
                                                <option value="b">B</option>
                                                <option value="c">C</option>
                                                <option value="d">D</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form pertanyaan">
                                        <label for="question-3">Pertanyaan 3</label>
                                        <input type="text" name="question-3" placeholder="Masukkan pertanyaan.." required>
                                    </div>
                                    <div class="jawaban">
                                        <h4>Jawaban</h4>
                                        <div class="question-objective form grid">
                                            <input type="text" name="objective-3-a" placeholder="Masukkan jawaban A.." required>
                                            <input type="text" name="objective-3-b" placeholder="Masukkan jawaban B.." required>
                                            <input type="text" name="objective-3-c" placeholder="Masukkan jawaban C.." required>
                                            <input type="text" name="objective-3-d" placeholder="Masukkan jawaban D.." required>
                                        </div>
                                        <div class="form pertanyaan">
                                            <label for="correct-answer-3">Jawaban Benar</label>
                                            <select name="correct-answer-3">
                                                <option value="a">A</option>
                                                <option value="b">B</option>
                                                <option value="c">C</option>
                                                <option value="d">D</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form pertanyaan">
                                        <label for="question-4">Pertanyaan 4</label>
                                        <input type="text" name="question-4" placeholder="Masukkan pertanyaan.." required>
                                    </div>
                                    <div class="jawaban">
                                        <h4>Jawaban</h4>
                                        <div class="question-objective form grid">
                                            <input type="text" name="objective-4-a" placeholder="Masukkan jawaban A.." required>
                                            <input type="text" name="objective-4-b" placeholder="Masukkan jawaban B.." required>
                                            <input type="text" name="objective-4-c" placeholder="Masukkan jawaban C.." required>
                                            <input type="text" name="objective-4-d" placeholder="Masukkan jawaban D.." required>
                                        </div>
                                        <div class="form pertanyaan">
                                            <label for="correct-answer-4">Jawaban Benar</label>
                                            <select name="correct-answer-4">
                                                <option value="a">A</option>
                                                <option value="b">B</option>
                                                <option value="c">C</option>
                                                <option value="d">D</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form pertanyaan">
                                        <label for="question-5">Pertanyaan 5</label>
                                        <input type="text" name="question-5" placeholder="Masukkan pertanyaan.." required>
                                    </div>
                                    <div class="jawaban">
                                        <h4>Jawaban</h4>
                                        <div class="question-objective form grid">
                                            <input type="text" name="objective-5-a" placeholder="Masukkan jawaban A.." required>
                                            <input type="text" name="objective-5-b" placeholder="Masukkan jawaban B.." required>
                                            <input type="text" name="objective-5-c" placeholder="Masukkan jawaban C.." required>
                                            <input type="text" name="objective-5-d" placeholder="Masukkan jawaban D.." required>
                                        </div>
                                        <div class="form pertanyaan">
                                            <label for="correct-answer-5">Jawaban Benar</label>
                                            <select name="correct-answer-5">
                                                <option value="a">A</option>
                                                <option value="b">B</option>
                                                <option value="c">C</option>
                                                <option value="d">D</option>
                                            </select>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="upload-btn">Upload</button>
                    </form>
                </div>
            </div>
        </main>
    </div>

    <script src="add_courses.js"></script>
    <?php } ?>
</body>
</html>
