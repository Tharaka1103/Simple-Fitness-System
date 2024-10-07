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
    <link rel="stylesheet" href="css/header.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/20f08145b4.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <nav id="main-nav">
            <div class="logo">FlexFit Online</div>
            <ul class="nav-links">
                <li><a class='active' href="index.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
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
        </nav>
    </header>

    <main>
        <section id="home" class="hero">
            <div class='left'>
                <img src="images/home.jpg" alt="">
            </div>
            <div class="right">
                <h1>Transform Your Life with FlexFit Online</h1>
                <p>Your one-stop shop for life-friendly fitness training, anytime, anywhere.</p>
                <a href="#" class="cta-button">Start Your Journey</a>
            </div>
        </section>

        <section id="features" class="features">
            <h2>Our Features</h2>
            <div class="feature-grid">
                <div class="feature-item">
                    <i class="fas fa-dumbbell"></i>
                    <h3>Custom Training Routines</h3>
                    <p>Personalized workouts tailored to your goals and fitness level.</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-apple-alt"></i>
                    <h3>Dietary Guidance</h3>
                    <p>Expert-crafted meal plans to support your fitness journey.</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-video"></i>
                    <h3>Extensive Video Library</h3>
                    <p>Access a wide range of fitness videos anytime, anywhere.</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-users"></i>
                    <h3>Supportive Community</h3>
                    <p>Connect with like-minded individuals on the same path.</p>
                </div>
            </div>
        </section>

        <section id="testimonials" class="testimonials">
            <h2>What Our Members Say</h2>
            <div class="testimonial-slider">
                <div class="testimonial">
                    <p>"FlexFit Online transformed my approach to fitness. I've never felt better!"</p>
                    <cite>- Sarah J.</cite>
                </div>
                <div class="testimonial">
                    <p>"The personalized plans and video library make working out at home so easy and effective."</p>
                    <cite>- Mike T.</cite>
                </div>
                <div class="testimonial">
                    <p>"I love the community aspect. It keeps me motivated and accountable."</p>
                    <cite>- Emma L.</cite>
                </div>
            </div>
        </section>

        <section id="contact" class="contact">
            <h2>Ready to Get Started?</h2>
            <p>Join FlexFit Online today and start your journey to a stronger, healthier you.</p>
            <a href="#" class="cta-button">Sign Up Now</a>
        </section>
    </main>

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
