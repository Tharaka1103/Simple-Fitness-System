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
    <link rel="stylesheet" href="css/terms.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/20f08145b4.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <nav id="main-nav">
            <div class="logo">FlexFit Online</div>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="programs.php">Programs</a></li>
                <li><a  href="pricing.php">Pricing</a></li>
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

    <section class="terms-conditions">
        <h1>Terms and Conditions</h1>
        <div class="terms-container">
            <div class="terms-item">
                <h2>1. Acceptance of Terms</h2>
                <p>By accessing and using our services, you agree to be bound by these Terms and Conditions.</p>
            </div>
            <div class="terms-item">
                <h2>2. User Responsibilities</h2>
                <p>You are responsible for maintaining the confidentiality of your account and password. You agree to accept responsibility for all activities that occur under your account.</p>
            </div>
            <div class="terms-item">
                <h2>3. Service Usage</h2>
                <p>Our services are for personal, non-commercial use only. You may not modify, copy, distribute, transmit, display, perform, reproduce, publish, license, create derivative works from, transfer, or sell any information obtained from our services.</p>
            </div>
            <div class="terms-item">
                <h2>4. Payment and Refunds</h2>
                <p>All payments are non-refundable unless otherwise stated. We reserve the right to change our pricing at any time.</p>
            </div>
            <div class="terms-item">
                <h2>5. Termination</h2>
                <p>We reserve the right to terminate or suspend your account and access to our services at our sole discretion, without notice, for conduct that we believe violates these Terms and Conditions or is harmful to other users, us, or third parties, or for any other reason.</p>
            </div>
        </div>
        <div class="terms-agreement">
            <label for="terms-checkbox">
                <input type="checkbox" id="terms-checkbox">
                I have read and agree to the Terms and Conditions
            </label>
            <button id="terms-agree-button" disabled>Accept</button>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const termsCheckbox = document.getElementById('terms-checkbox');
            const termsAgreeButton = document.getElementById('terms-agree-button');

            termsCheckbox.addEventListener('change', function() {
                termsAgreeButton.disabled = !this.checked;
            });

            termsAgreeButton.addEventListener('click', function() {
                alert('Thank you for accepting our Terms and Conditions!');
            });
        });

    </script>
</body>
</html>
