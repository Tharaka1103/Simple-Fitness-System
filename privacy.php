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
    <link rel="stylesheet" href="css/privacy.css">
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

    <section class="privacy-policy">
        <h1>Privacy Policy</h1>
        <div class="policy-container">
            <div class="policy-item">
                <h2>Information We Collect</h2>
                <p>We collect personal information that you provide to us, such as your name, email address, and payment information when you register for our services.</p>
            </div>
            <div class="policy-item">
                <h2>How We Use Your Information</h2>
                <p>We use your information to provide and improve our services, communicate with you, and process payments. We may also use your information for marketing purposes with your consent.</p>
            </div>
            <div class="policy-item">
                <h2>Data Security</h2>
                <p>We implement appropriate technical and organizational measures to protect your personal information against unauthorized or unlawful processing, accidental loss, destruction, or damage.</p>
            </div>
            <div class="policy-item">
                <h2>Your Rights</h2>
                <p>You have the right to access, correct, or delete your personal information. You can also object to processing of your information or request data portability.</p>
            </div>
            <div class="policy-item">
                <h2>Changes to This Policy</h2>
                <p>We may update this privacy policy from time to time. We will notify you of any changes by posting the new policy on this page.</p>
            </div>
        </div>
        <div class="policy-agreement">
            <label for="agree-checkbox">
                <input type="checkbox" id="agree-checkbox">
                I have read and agree to the Privacy Policy
            </label>
            <button id="agree-button" disabled>Accept</button>
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
            const agreeCheckbox = document.getElementById('agree-checkbox');
            const agreeButton = document.getElementById('agree-button');

            agreeCheckbox.addEventListener('change', function() {
                agreeButton.disabled = !this.checked;
            });

            agreeButton.addEventListener('click', function() {
                alert('Thank you for accepting our Privacy Policy!');
            });
        });

    </script>
</body>
</html>
