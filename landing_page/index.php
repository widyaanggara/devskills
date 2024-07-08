<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DevSkills</title>
        <link rel="icon" href="../assets/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="index.css">
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

        <!-- font awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Jquery -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    </head>
    <body>
        <!-- Navbar -->
        <header>
            <div class="navbar">
                <div class="nav-logo">
                    <a href="#">
                        <img src="../assets/Logo.png" alt="">
                        DevSkills
                    </a>
                </div>
                <ul class="links">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#features">Features</a></li>
                    <li><a href="#testimonials">Testimonials</a></li>
                </ul>
                <a href="../login/login.php" class="nav-btn button">Get Started</a>
                <div class="toggler-btn show">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>

            <div class="dropdown-nav">
                <div class="close-btn">
                    <i class="fa-solid fa-xmark"></i>
                </div>
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#features">Features</a></li>
                <li><a href="#testimonials">Testimonials</a></li>
                <li><a href="../login/login.php" class="nav-btn button">Get Started</a></li>
            </div>
        </header>

        <section class="home section" id="home">
            <div class="container home-content">
                <div class="text-content">
                    <h1>Grow Your Programming Skills to Advance Your Career Path</h1>
                    <p>Jelajahi, Pelajari, Kuasai. Tingkatkan kemampuan pemrograman Anda bersama DevSkills, platform pembelajaran online terpercaya.</p>
                    <a href="../login/login.php" class="button home-btn">Get Started</a>
                </div>
                <div class="image-content">
                    <img src="../assets/home_img.png" alt="Home Img">
                </div>
            </div>
        </section>

        <section class="about section" id="about">
            <div class="container about-content">
                <div class="about-img">
                    <img src="../assets/about.png" alt="">
                </div>
                <div class="about-text-content">
                    <p class="span">Get to know us</p>
                    <h1>Improve your programming skills with <span>DevSkills</span></h1>
                    <p>Kembangkan potensi pemrograman Anda dan tingkatkan perjalanan karier Anda dengan kursus pemrograman kami yang dipimpin oleh para ahli di DevSkills, tempat terbaik untuk mengasah keterampilan Anda dalam dunia teknologi.</p>
                    <div class="about-features grid">
                        <div class="checklist flex">
                            <div class="icon"><i class="fa-solid fa-check"></i></div>
                            <p>Online Learning</p>
                        </div>
                        <div class="checklist flex">
                            <div class="icon"><i class="fa-solid fa-check"></i></div>
                            <p>24/7 Live Support</p>
                        </div>
                        <div class="checklist flex">
                            <div class="icon"><i class="fa-solid fa-check"></i></div>
                            <p>Free Access</p>
                        </div>
                        <div class="checklist flex">
                            <div class="icon"><i class="fa-solid fa-check"></i></div>
                            <p>Quality Learning</p>
                        </div>
                    </div>
                    <a href="../login/login.php" class="about-btn button">Discover More</a>
                </div>
            </div>
        </section>

        <section class="features section" id="features">
            <div class="container features-content">
                <div class="features-header flex">
                    <h1>Most Popular Courses</h1>
                    <a href="../login/login.php">Explore courses</a>
                </div>

                <div class="features-cards grid" id="features-cards">

                    <!-- card1 -->
                    <a href="../login/login.php">
                        <div class="card">
                            <img src="../assets/card1.png" id="card1-img">
                            <div class="card-content">
                                <span class="category flex"> 
                                    <i class="fa-solid fa-circle-dot card-icon"></i>
                                    <p id="card1-category">Computer Science</p>
                                    </span>
                                <h3 id="card1-title">Learning Python</h3>
                                <p class="clasess flex">
                                    <i class="fa-solid fa-book-open book-card"></i>
                                    4 Classes</p>
                            </div>
                        </div>
                    </a>

                    <!-- card2 -->
                    <a href="../login/login.php">
                        <div class="card">
                            <img src="../assets/card2.png" id="card2-img">
                            <div class="card-content">
                                <span class="category flex"> 
                                    <i class="fa-solid fa-circle-dot card-icon"></i>
                                    <p id="card2-category">Web Programming</p></span>
                                <h3 id="card2-title">Learn JS</h3>
                                <p class="clasess flex">
                                    <i class="fa-solid fa-book-open book-card"></i>
                                    4 Classes</p>
                            </div>
                        </div>
                    </a>

                    <!-- card3 -->
                    <a href="../login/login.php">
                        <div class="card">
                            <img src="../assets/card3.png" id="card3-img">
                            <div class="card-content">
                                <span class="category flex"> 
                                    <i class="fa-solid fa-circle-dot card-icon"></i>
                                    <p id="card3-category">Web Programming</p></span>
                                <h3 id="card3-title">Learn ReactJS</h3>
                                <p class="clasess flex">
                                    <i class="fa-solid fa-book-open book-card"></i>
                                    4 Classes</p>
                            </div>
                        </div>
                    </a>

                    <!-- card4 -->
                    <a href="../login/login.php">
                        <div class="card">
                            <img src="../assets/card4.png" id="card4-img">
                            <div class="card-content">
                                <span class="category flex"> 
                                    <i class="fa-solid fa-circle-dot card-icon"></i>
                                    <p id="card4-category">Machine Learning</p></span>
                                <h3 id="card4-title">Artificial Intelligence</h3>
                                <p class="clasess flex">
                                    <i class="fa-solid fa-book-open book-card"></i>
                                    4 Classes</p>
                            </div>
                        </div>
                    </a>

                    <!-- card5 -->
                    <a href="../login/login.php">
                        <div class="card">
                            <img src="../assets/card5.png" id="card5-img">
                            <div class="card-content">
                                <span class="category flex"> 
                                    <i class="fa-solid fa-circle-dot card-icon"></i>
                                    <p id="card5-category">Web Programming</p></span>
                                <h3 id="card5-title">Boostrap Basic</h3>
                                <p class="clasess flex">
                                    <i class="fa-solid fa-book-open book-card"></i>
                                    4 Classes</p>
                            </div>
                        </div>
                    </a>

                    <!-- card6 -->
                    <a href="../login/login.php">
                        <div class="card">
                            <img src="../assets/card6.png" id="card6-img">
                            <div class="card-content">
                                <span class="category flex"> 
                                    <i class="fa-solid fa-circle-dot card-icon"></i>
                                    <p id="card6-category">Web Programming</p></span>
                                <h3 id="card6-title">Basic Portofolio</h3>
                                <p class="clasess flex">
                                    <i class="fa-solid fa-book-open book-card"></i>
                                    4 Classes</p>
                            </div>
                        </div>
                    </a>

                    <!-- card7 -->
                    <a href="../login/login.php">
                        <div class="card">
                            <img src="../assets/card7.png" id="card7-img">
                            <div class="card-content">
                                <span class="category flex"> 
                                    <i class="fa-solid fa-circle-dot card-icon"></i>
                                    <p id="card7-category">Web Programming</p></span>
                                <h3 id="card7-title">Front-End Dev</h3>
                                <p class="clasess flex">
                                    <i class="fa-solid fa-book-open book-card"></i>
                                    4 Classes</p>
                            </div>
                        </div>
                    </a>
                    
                    <!-- card8 -->
                    <a href="../login/login.php">
                        <div class="card">
                            <img src="../assets/card8.png" id="card8-img">
                            <div class="card-content">
                                <span class="category flex"> 
                                    <i class="fa-solid fa-circle-dot card-icon"></i>
                                    <p id="card7-category">Machine Learning</p></span>
                                <h3 id="card7-title">Machine Learning</h3>
                                <p class="clasess flex">
                                    <i class="fa-solid fa-book-open book-card"></i>
                                    4 Classes</p>
                            </div>
                        </div>
                    </a>

                    <!--  -->

                </div>
            </div>
        </section>

        <section class="testimonials section" id="testimonials">
            <div class="container testimonials-content">
                <div class="testimonials-header">
                    <h1>Student’s Testimonials</h1>
                    <p>Giliran Kamu untuk Mencoba DevSkills dan Meningkatkan Keterampilan Kamu!</p>
                </div>

                <div class="carousel">
                    <div class="testimonials-card owl-carousel">
                        <div class="t-card">
                            <img src="../assets/testi.svg" alt="">
                            <p>Saya sangat terkesan dengan keragaman pilihan kursus di website ini. Materi yang disajikan dengan jelas dan mudah dipahami, membuat belajar pemrograman menjadi menyenangkan dan efektif.</p>
                            <div class="testimonials-user">
                                <div class="user-img">
                                    <img src="../assets/testi1.jpg" alt="">
                                </div>
                                <div class="testimonials-user-status">
                                    <h3>Yamuna</h3>
                                    <div class="stars flex">
                                        <i class="fa-solid fa-star"></i> 5.0
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="t-card">
                            <img src="../assets/testi.svg" alt="">
                            <p>Website kursus programming ini luar biasa! Materi yang terstruktur dan praktis sangat membantu dalam meningkatkan keterampilan pemrograman saya.</p>
                            <div class="testimonials-user">
                                <div class="user-img">
                                    <img src="../assets/testi2.jpg" alt="">
                                </div>
                                <div class="testimonials-user-status">
                                    <h3>Adi</h3>
                                    <div class="stars flex">
                                        <i class="fa-solid fa-star"></i> 4.8
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="t-card">
                            <img src="../assets/testi.svg" alt="">
                            <p>Situs kursus programming ini hebat! Materi yang praktis dan jelas, membuat belajar pemrograman menjadi menyenangkan dan efisien. Direkomendasikan untuk semua level pemrograman.</p>
                            <div class="testimonials-user">
                                <div class="user-img">
                                    <img src="../assets/testi3.jpg" alt="">
                                </div>
                                <div class="testimonials-user-status">
                                    <h3>Sabdha</h3>
                                    <div class="stars flex">
                                        <i class="fa-solid fa-star"></i> 4.9
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="t-card">
                            <img src="../assets/testi.svg" alt="">
                            <p>Tampilan website kursus pemrograman sangat menarik dan mudah dinavigasi. Pengalaman pengguna yang intuitif membuat belajar menjadi menyenangkan dan efisien. Sangat direkomendasikan!</p>
                            <div class="testimonials-user">
                                <div class="user-img">
                                    <img src="../assets/testi4.jpg" alt="">
                                </div>
                                <div class="testimonials-user-status">
                                    <h3>GungAris</h3>
                                    <div class="stars flex">
                                        <i class="fa-solid fa-star"></i> 4.9
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="t-card">
                            <img src="../assets/testi.svg" alt="">
                            <p>DevSkills, benar-benar membantu banget! Pembelajaran programing jadi lebih mudah. Antarmuka yang user-friendly bikin belajar jadi lebih efektif dan menyenangkan. Luar biasa!</p>
                            <div class="testimonials-user">
                                <div class="user-img">
                                    <img src="../assets/testi5.jpg" alt="">
                                </div>
                                <div class="testimonials-user-status">
                                    <h3>Dede</h3>
                                    <div class="stars flex">
                                        <i class="fa-solid fa-star"></i> 4.9
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                    
                    <div class="carousel-navigation">
                        <button class="prev-btn">
                            <span class="material-symbols-outlined">
                            chevron_left
                            </span>
                        </button>
                        <button class="next-btn">
                            <span class="material-symbols-outlined">
                                chevron_right
                            </span>
                        </button>
                    </div>
                </div>

            </div>
        </section>

        <footer class="footer section">
            <div class="container footer-content">
                <div class="footer-desc flex">
                    <div class="left">
                        <h1>The Learning <br class="brbr">
                        Community Directory</h1>
                        <div class="support flex">
                            <p>Powered By</p>
                            <div class="logo flex">
                                <img src="../assets/Logo.png" alt="">
                                DevSkills
                            </div>
                        </div>
                    </div>
                    <div class="right">
                        <div class="footer-nav">
                            <ul class="footer-links flex">
                                <li><a href="#home">Home</a></li>
                                <li><a href="#about">About</a></li>
                                <li><a href="#features">Features</a></li>
                                <li><a href="#testimonials">Testimonials</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr class="footer-line">
                <div class="footer-bottom">
                    <div class="bottom-content flex">
                        <p>Looking for the modern Website to build and grow your learning community? <span class="footer-span"><a href="">Try DevSkills</a></span></p>
                        <div class="footer-socials flex">
                            <a href="#"><i class="fa-brands fa-instagram"></i></a>
                            <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                            <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <script src="index.js"></script>
    </body>
</html>
