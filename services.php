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
    <link rel="stylesheet" href="css/services.css">
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
                <li><a class='active' href="services.php">Services</a></li>
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

    <section class="fitness-articles">
        <div class="category-cards">
            <div class="category-card" data-category="training">
                <img src="images/training.jpg" alt="Training">
                <h3>Training</h3>
            </div>
            <div class="category-card" data-category="nutrition">
                <img src="images/nutrition.jpg" alt="Nutrition">
                <h3>Nutrition</h3>
            </div>
            <div class="category-card" data-category="workouts">
                <img src="images/workouts.jpg" alt="Workouts">
                <h3>Workouts</h3>
            </div>
        </div>

        <div class="articles-grid">
            <div class="article-card" data-category="training">
                <h4>Mastering Proper Form</h4>
                <p>Learn the importance of proper form and techniques to maximize your workout efficiency.</p>
            </div>
            <div class="article-card" data-category="nutrition">
                <h4>Balanced Diet for Muscle Gain</h4>
                <p>Discover the best foods and meal plans to support muscle growth and recovery.</p>
            </div>
            <div class="article-card" data-category="workouts">
                <h4>HIIT vs. Steady-State Cardio</h4>
                <p>Compare the benefits of high-intensity interval training and traditional cardio exercises.</p>
            </div>
            <div class="article-card" data-category="training">
                <h4>Progressive Overload Explained</h4>
                <p>Understand the principle of progressive overload and how to apply it to your training routine.</p>
            </div>
            <div class="article-card" data-category="nutrition">
                <h4>Pre and Post-Workout Nutrition</h4>
                <p>Learn what to eat before and after your workouts to optimize performance and recovery.</p>
            </div>
            <div class="article-card" data-category="workouts">
                <h4>Full-Body vs. Split Routines</h4>
                <p>Explore the pros and cons of full-body workouts and split training routines.</p>
            </div>
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
            const categoryCards = document.querySelectorAll('.category-card');
            const articleCards = document.querySelectorAll('.article-card');

            categoryCards.forEach(card => {
                card.addEventListener('click', function() {
                    const category = this.dataset.category;
                    filterArticles(category);
                });
            });

            function filterArticles(category) {
                articleCards.forEach(card => {
                    if (category === 'all' || card.dataset.category === category) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            }
        });

    </script>
</body>
</html>
