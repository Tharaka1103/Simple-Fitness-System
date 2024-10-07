<?php
session_start();
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $program_name = $_POST['program_name'];
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_phone = $_POST['user_phone'];

    $sql = "INSERT INTO program_enrollments (program_name, user_name, user_email, user_phone) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $program_name, $user_name, $user_email, $user_phone);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Enrollment successful!"]);
    } else {
        echo json_encode(["success" => false, "message" => "Error enrolling. Please try again."]);
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlexFit Online - Your Personal Fitness Journey</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/programs.css">
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
                <li><a class='active' href="programs.php">Programs</a></li>
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
    
    <section class="training-programs">
        <h2>Our Training Programs</h2>
        <div class="program-cards">
            <div class="program-card"  data-program="3-Month Program" data-description="Kickstart your fitness journey with our intensive 3-month program. Perfect for beginners and those looking for a quick transformation.">
                <div class="card-image">
                    <img src="images/3.jpg" alt="3-Month Program">
                </div>
                <div class="card-content">
                    <h3>3-Month Program</h3>
                    <p>Kickstart your fitness journey with our intensive 3-month program. Perfect for beginners and those looking for a quick transformation.</p>
                    <button class="book-now">Register Now</button>
                </div>
            </div>
            <div class="program-card" data-program="6-Month Program" data-description="Take your fitness to the next level with our comprehensive 6-month program. Ideal for intermediate fitness enthusiasts.">
                <div class="card-image">
                    <img src="images/6.jpg" alt="6-Month Program">
                </div>
                <div class="card-content">
                    <h3>6-Month Program</h3>
                    <p>Take your fitness to the next level with our comprehensive 6-month program. Ideal for intermediate fitness enthusiasts.</p>
                    <button class="book-now">Register Now</button>
                </div>
            </div>
            <div class="program-card" data-program="12-Month Program" data-description="Commit to a year of transformation with our 12-month program. Designed for those serious about long-term fitness goals.">
                <div class="card-image">
                    <img src="images/12.jpg" alt="12-Month Program">
                </div>
                <div class="card-content">
                    <h3>12-Month Program</h3>
                    <p>Commit to a year of transformation with our 12-month program. Designed for those serious about long-term fitness goals.</p>
                    <button class="book-now">Register Now</button>
                </div>
            </div>
        </div>
    </section>
    <div id="popup-overlay" class="popup-overlay">
        <div class="popup-content">
            <span class="close-popup">&times;</span>
            <div class="popup-left">
                <h3 id="popup-program-name"></h3>
                <p id="popup-program-description"></p>
            </div>
            <div class="popup-right">
                <form id="enrollment-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <input type="hidden" id="program-name" name="program_name">
                    <div class="form-group">
                        <label for="user-name">Name:</label>
                        <input type="text" id="user-name" name="user_name" required>
                    </div>
                    <div class="form-group">
                        <label for="user-email">Email:</label>
                        <input type="email" id="user-email" name="user_email" required>
                    </div>
                    <div class="form-group">
                        <label for="user-phone">Phone:</label>
                        <input type="tel" id="user-phone" name="user_phone" required>
                    </div>
                    <button type="submit" class="enroll-btn">Enroll Now</button>
                </form>
            </div>
        </div>
    </div>

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
            const bookButtons = document.querySelectorAll('.book-now');
            const popupOverlay = document.getElementById('popup-overlay');
            const closePopup = document.querySelector('.close-popup');
            const popupProgramName = document.getElementById('popup-program-name');
            const popupProgramDescription = document.getElementById('popup-program-description');
            const programNameInput = document.getElementById('program-name');

            bookButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const card = this.closest('.program-card');
                    const programName = card.dataset.program;
                    const programDescription = card.dataset.description;

                    popupProgramName.textContent = programName;
                    popupProgramDescription.textContent = programDescription;
                    programNameInput.value = programName;

                    popupOverlay.style.display = 'flex';
                });
            });

            closePopup.addEventListener('click', function() {
                popupOverlay.style.display = 'none';
            });

            window.addEventListener('click', function(event) {
                if (event.target == popupOverlay) {
                    popupOverlay.style.display = 'none';
                }
            });
        });

    </script>
</body>
</html>
