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
    <link rel="stylesheet" href="css/faq.css">
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

    <section class="faq-section">
        <h2>Frequently Asked Questions</h2>
        <div class="faq-container">
            <div class="faq-item">
                <div class="faq-question">
                    <h3>What types of fitness programs do you offer?</h3>
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    <p>We offer a variety of programs including strength training, cardio, yoga, and specialized programs for weight loss and muscle gain.</p>
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question">
                    <h3>How often should I work out?</h3>
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    <p>We recommend 3-5 workouts per week, depending on your fitness level and goals. Our trainers can help you create a personalized schedule.</p>
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question">
                    <h3>Do I need any special equipment for the online classes?</h3>
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    <p>Most of our classes require minimal equipment. Basic items like a yoga mat, resistance bands, and light dumbbells are recommended for a full experience.</p>
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question">
                    <h3>Can I cancel my subscription at any time?</h3>
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    <p>Yes, you can cancel your subscription at any time. There are no long-term commitments required.</p>
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question">
                    <h3>Are your trainers certified?</h3>
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    <p>All our trainers are certified professionals with extensive experience in their respective fields of fitness.</p>
                </div>
            </div>
        </div>
        <div class="contact-button-container">
            <a href="contact.php" class="contact-button">Still have questions? Contact Us</a>
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
            const faqItems = document.querySelectorAll('.faq-item');

            faqItems.forEach(item => {
                const question = item.querySelector('.faq-question');
                question.addEventListener('click', () => {
                    item.classList.toggle('active');
                });
            });
        });

    </script>
</body>
</html>
