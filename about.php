<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlexFit Online - Your Personal Fitness Journey</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/about.css">
    <link rel="stylesheet" href="css/header.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/20f08145b4.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <nav id="main-nav">
            <div class="logo">FlexFit Online</div>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a class='active' href="about.php">About Us</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="programs.php">Programs</a></li>
                <li><a href="pricing.php">Pricing</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <?php
                if (isset($_SESSION['user_name'])) {
                    echo '<li class="dropdown">';
                    echo '<a href="#" class="dropbtn">' . $_SESSION['user_name'] . '</a>';
                    echo '<div class="dropdown-content">';
                    echo '<a href="userProfile.php">Profile</a>';
                    echo '<a href="logout.php">Logout</a>';
                    echo '</div>';
                    echo '</li>';
                } else {
                    echo '<li><a href="login.php" class="login-btn">Login</a></li>';
                    echo '<li><a href="register.php" class="register-btn">Register</a></li>';
                }
                ?>
            </ul>
            <div class="burger">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
        </nav>
    </header>

    
    
    <section class="about-us">
        <div class="about-content">
            <h2>About FlexFit Online</h2>
            <p>FlexFit Online is your premier destination for personalized fitness training and nutrition guidance. Founded in 2023, we've been helping people transform their lives through accessible, effective, and enjoyable fitness programs.</p>
            <p>Our team of expert trainers and nutritionists are dedicated to creating customized plans that fit your unique needs and lifestyle. Whether you're a beginner or an experienced athlete, we're here to support you every step of the way.</p>
            <p>At FlexFit Online, we believe that fitness should be accessible to everyone, anywhere, anytime. That's why we've developed a state-of-the-art platform that brings the gym experience right to your home or office.</p>
            <a href="#" class="cta-button">Join Our Community</a>
        </div>
        <div class="about-image">
            <img src="images/about.jpg" alt="FlexFit Online Team">
        </div>
    </section>

    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>FlexFit Online</h3>
                <p>Your personal fitness journey starts here.</p>
            </div>
            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="programs.php">Programs</a></li>
                    <li><a href="shop.php">Shop</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Know About Us</h3>
                <ul>
                    <li><a href="faq.php">FAQ</a></li>
                    <li><a href="privacy.php">Privacy & Policies</a></li>
                    <li><a href="terms.php">Terms & Conditions</a></li>
                    <li><a href="about.php">About Us</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Connect With Us</h3>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                    <a href="#"><i class="fab fa-tiktok"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 FlexFit Online. All rights reserved.</p>
        </div>
    </footer>

    <script src="js/index.js"></script>
</body>
</html>
