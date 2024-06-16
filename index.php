<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BaoChuong</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Trirong" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/4dd88e3847.js" crossorigin="anonymous"></script>
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    session_start();
   
 
    include "./DBUtils.php";
    function isLoggedIn() {
        return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
    }
    
    // Sử dụng isLoggedIn để kiểm tra người dùng đã đăng nhập hay chưa
    if (!isLoggedIn()) {
        // Nếu người dùng chưa đăng nhập, chuyển hướng họ đến trang đăng nhập
        header("Location: login.php");
        exit;
    }
    
 
 
?>

    <header>
        <div class="container">
            <div class="logo">
                <a style="text-decoration: none" href="index.html"><span class="bis">TB</span><span class="lite">Chuong</span></a>
            </div>
            <nav>
                <ul>
                    <li>

                    </li>
                    <li><a href="index.html">HOME</a></li>
                    <li><a href="#">ABOUT US</a></li>
                    <li class="dropdown">
                        <a href="#">SERVICES <i class="fa-solid fa-chevron-down"></i> </a>
                        <div class="dropdown-content1">
                            <a href="#">Web design</a>
                            <a href="#">Wordpress Design</a>
                            <a href="#">Mobile App Development</a>
                            <a href="#">Internet Marketing</a>
                            <a href="#">Social Media Management</a>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="product.php?search">Product <i class="fa-solid fa-chevron-down"></i>
                        </a>
                        <div class="dropdown-content">
                            <a href="addproduct.php">Addproducts</a>
                            <a href="#">Websites</a>
                            <a href="#">Wordpress</a>
                            <a href="#">Mobile Apps</a>
                            <a href="#">Icons</a>
                            <a href="#">Logos</a>
                            <a href="#">Graphics</a>
                            <a href="#">Social Media Management</a>
                        </div>
                    </li>
                    <li><a href="blog.html">BLOG</a></li>
                    <li><a href="contact.php">CONTACT US</a></li>
                    <li class="dropdown">
                        <a href="#">ACCOUNT
                        </a>
                        <div class="dropdown-content">
                            <a href="usermanager.php">User Manager</a></a>
                            <a href="#">Change Password</a>
                            <a href="adress.php">Input your address</a>
                            <a href="logout.php">Log Out</a>
                            <a>
                                <?php
                                if (isset($_SESSION['username'])) {
                                    $username = htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8');
                                    echo "<p>$username</p>";
                                } else {
                                    echo 'Please login';
                                }
                                ?>
                            </a>
                        </div>

                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <img width="1420px" ; height="504px" src="img/image.png" alt="" />
        <div class="col">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-3">
                        <h6>
                            <img width="40px" ;height:="40px" src="img/pen.webp" alt="" />
                            CLEAN THEME
                        </h6>
                        <p>
                            Vivamus convallis feugiat mauris sed posuere. Nam rutrum, quam
                            quis euismod commodo, elit est porta quam, non placerat eros
                            neque porta ante. Fusce quis odio urna.
                        </p>
                        <a href="#">▸Read More</a>
                    </div>
                    <div class="col-sm-3">
                        <h6>
                            <img width="40px" ;height:="40px" src="img/screen.png" alt="" />
                            RESPONSIVE DESIGN
                        </h6>
                        <p>
                            Vivamus convallis feugiat mauris sed posuere. Nam rutrum, quam
                            quis euismod commodo, elit est porta quam, non placerat eros
                            neque porta ante. Fusce quis odio urna.
                        </p>
                        <a href="#">▸Read More</a>
                    </div>
                    <div class="col-sm-3">
                        <h6>
                            <img width="40px" ;height:="40px" src="/img/menu.jpg" alt="" />
                            FULLY LAYERED PSD
                        </h6>
                        <p>
                            Vivamus convallis feugiat mauris sed posuere. Nam rutrum, quam
                            quis euismod commodo, elit est porta quam, non placerat eros
                            neque porta ante. Fusce quis odio urna.
                        </p>
                        <a href="#">▸Read More</a>
                    </div>
                    <div class="col-sm-3">
                        <h6>
                            <img width="40px" ;height:="40px" src="img/telegram.png" alt="" />
                            READY FOR CODING
                        </h6>
                        <p>
                            Vivamus convallis feugiat mauris sed posuere. Nam rutrum, quam
                            quis euismod commodo, elit est porta quam, non placerat eros
                            neque porta ante. Fusce quis odio urna.
                        </p>
                        <a href="#">▸Read More</a>
                    </div>
                </div>
            </div>
        </div>
       

        <!-- gallery -->
        <div class="gallery">
            <div class="gallery-item">
                <img src="img/pic1.jpg" alt="Item 1" />
                <div class="overlay">
                    <div class="icons">
                        <a href="#"><span class="icon"><i class="fa-regular fa-eye"></i></span></a>
                        <a href="#"><span class="icon"><i class="fa-solid fa-link"></i></span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="gallery-item">
                <img src="img/pic2.jpg" alt="Item 1" />
                <div class="overlay">
                    <div class="icons">
                        <a href="#"><span class="icon"><i class="fa-regular fa-eye"></i></span></a>
                        <a href="#"><span class="icon"><i class="fa-solid fa-link"></i></span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="gallery-item">
                <img src="img/pic3.jpg" alt="Item 1" />
                <div class="overlay">
                    <div class="icons">
                        <a href="#"><span class="icon"><i class="fa-regular fa-eye"></i></span></a>
                        <a href="#"><span class="icon"><i class="fa-solid fa-link"></i></span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="gallery-item">
                <img src="img/pic4.jpg" alt="Item 1" />
                <div class="overlay">
                    <div class="icons">
                        <a href="#"><span class="icon"><i class="fa-regular fa-eye"></i></span></a>
                        <a href="#"><span class="icon"><i class="fa-solid fa-link"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <hr />
        <br /><br />
        <!-- testimonial -->

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h6>
                        <img width="40px" height="40px" src="img/message.jpg" alt="IMG messaged" />
                        TESTIMONIALS
                    </h6>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas
                        ut nulla sapien, at aliquam erat. Sed vitae massa tellus. Aliquam
                        commodo aliquam metus,
                    </p>
                    <strong>John Travis, CEO, DomainName.com</strong>
                </div>

                <div class="col-md-6">
                    <h6>
                        <img width="40px" height="40px" src="img/human.jpg" alt="IMG messaged" />
                        OUR CLIENTS
                    </h6>
                    <img src="img/human2.jpg" alt="" />
                </div>
            </div>
        </div>
    </main>
    <br /><br /><br /><br />

    <!-- download  -->
    <div class="download">
        <p>
            This is a clean and modern, four column website PSD template. You can
            code it into a Wordpress website, HTML5 responsive website for your
            personal or client works. So ahead and download this wonderful PSD
            template!
        </p>

        <a href="#">
            <button>
                <img width="50px" ; height="50px" src="img/imgDownload.png" alt="" />
                DOWNLOAD PSD
            </button></a>
    </div>
    <br />
    <br />
    <!-- footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h5>ABOUT US</h5>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi
                        euismod placerat dui et tincidunt. Sed sollicitudin posuere
                        auctor. Phasellus at ultricies nisl. Integer at leo eros. Ut nec
                        lorem id orci convallis porta. Donec pharetra neque eu velit
                        dictum molestie.
                    </p>
                </div>
                <div class="col-md-2">
                    <h5>EXPLORE</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Portfolio</a></li>
                        <li><a href="#">Blog</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h5>BROWSE</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Press & Media</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Terms Of Service</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>CONTACT US</h5>
                    <p>BisLite Inc.<br />Always Street 265<br />0X - 125 - Canada</p>
                    <p>Phone: 987-6543-210<br />Fax: 987-6543-210</p>
                </div>
                <div class="col-md-2">
                    <h5>CONNECT WITH US</h5>
                    <div class="social-icons">
                        <a href="#"><img width="25%" ; height="25%" src="img/imageFacebook.png" alt="Facebook" />
                            Facebook</a><br /><br />
                        <a href="#"><img width="25%" ; height="25%" src="img/imgLinkedin.avif" alt="LinkedIn" />
                            LinkedIn</a><br /><br />
                        <a href="#"><img width="25%" ; height="25%" src="img/imgPinterest.jpg" alt="Pinterest" />
                            Pinterest</a><br /><br />
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center">
                    <div class="bottom-text">
                        © Copyright 2012 - BisLite Inc. All rights reserved. Some free
                        icons used here are created by Brankic1979.com.<br />
                        Client Logos are copyright and trademark of the respective owners
                        / companies.
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <div class="logo">
                        <a style="text-decoration: none" href="index.html">
                            <span class="bis">TB</span><span class="lite">Chuong</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>