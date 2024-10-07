<?php
session_start();
require_once 'config.php';

$success_message = '';
$error_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $message = trim($_POST['message']);

    if (empty($name) || empty($email) || empty($phone) || empty($message)) {
        $error_message = "All fields are required.";
    } else {
        $sql = "INSERT INTO contact_us_form (name, email, phone, message) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $name, $email, $phone, $message);

        if ($stmt->execute()) {
            $success_message = "Thank you for your message. We'll get back to you soon!";
        } else {
            $error_message = "Oops! Something went wrong. Please try again later.";
        }

        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - FlexFit Online</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/contact.css">
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
                <li><a href="about.php">About Us</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="services.php">Services</a></li>
                <li><a href="programs.php">Programs</a></li>
                <li><a href="pricing.php">Pricing</a></li>
                <li><a class='active' href="contact.php">Contact Us</a></li>
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

    <section class="contact-us">
        <div class="contact-form">
            <h2>Get in Touch</h2>
            <?php
            if (!empty($success_message)) {
                echo "<p class='success-message'>$success_message</p>";
            }
            if (!empty($error_message)) {
                echo "<p class='error-message'>$error_message</p>";
            }
            ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Contact Number:</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" required></textarea>
                </div>
                <button type="submit" class="submit-btn">Send Message</button>
            </form>
        </div>
        <div class="contact-info">
            <div class="company-details">
                <h2>Contact Information</h2>
                <p><i class="fas fa-phone"></i> Hotline: +1 (555) 123-4567</p>
                <p><i class="fas fa-map-marker-alt"></i> Address: 123 Fitness Street, Healthy City, HC 12345</p>
                <p><i class="fas fa-envelope"></i> Email: info@flexfitonline.com</p>
                <p><i class="fas fa-globe"></i> Website: www.flexfitonline.com</p>
            </div>
            <div class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9518.86040538501!2d80.220615749821!3d6.915415684737204!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae3a9e844b2473b%3A0xf38d6f72efaf94e2!2sTharu!5e0!3m2!1ssi!2slk!4v1727354583788!5m2!1ssi!2slk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>    </section>

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
