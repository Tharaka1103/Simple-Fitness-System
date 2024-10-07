<?php
session_start();
include 'config.php'; // Make sure to create this file with your database connection details

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subscription_type = $_POST['subscription_type'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $address = $_POST['address'];
    $nic = $_POST['nic'];
    $contact = $_POST['contact'];
    $card_type = $_POST['card_type'];
    $card_number = $_POST['card_number'];
    $exp_month = $_POST['exp_month'];
    $exp_year = $_POST['exp_year'];
    $cvv = $_POST['cvv'];

    // Prepare SQL statement
    $sql = "INSERT INTO subscriptions (subscription_type, name, age, height, weight, address, nic, contact, card_type, card_number, exp_month, exp_year, cvv) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssiisssssssis", $subscription_type, $name, $age, $height, $weight, $address, $nic, $contact, $card_type, $card_number, $exp_month, $exp_year, $cvv);

    if ($stmt->execute()) {
        echo "New subscription registered successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
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
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/pricing.css">
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
                <li><a class='active' href="pricing.php">Pricing</a></li>
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

    <section id="pricing" class="pricing">
        <h2>Choose Your Plan</h2>
        <div class="pricing-container">
            <div class="pricing-card basic" data-tier="basic">
                <h3>Basic</h3>
                <ul class="features">
                    <li>Access to basic workout videos</li>
                    <li>Weekly meal plans</li>
                    <li>Community forum access</li>
                    <li>Email support</li>
                </ul>
                <hr>
                <div class="price">LKR 999.99<span>/month</span></div>
                <button class="cta-button">Get Started</button>
            </div>
            <div class="pricing-card pro" data-tier="pro">
                <div class="pro-badge">Pro</div>
                <h3>Pro</h3>
                <ul class="features">
                    <li>All Basic features</li>
                    <li>Personalized workout plans</li>
                    <li>Live online classes</li>
                    <li>Nutrition consultation</li>
                    <li>24/7 chat support</li>
                </ul>
                <hr>
                <div class="price">LKR 2999.99<span>/month</span></div>
                <button class="cta-button">Get Started</button>
            </div>
            <div class="pricing-card premium" data-tier="premium">
                <div class="premium-badge">Premium</div>
                <h3>Premium</h3>
                <ul class="features">
                    <li>All Pro features</li>
                    <li>1-on-1 personal training sessions</li>
                    <li>Advanced performance tracking</li>
                    <li>Exclusive premium content</li>
                    <li>Priority support</li>
                </ul>
                <hr>
                <div class="price">LKR 4999.99<span>/month</span></div>
                <button class="cta-button">Get Started</button>
            </div>
        </div>
    </section>


    <!-- Popup Window -->
    <div id="popup" class="popup">
    <div class="popup-content">
        <span class="close">&times;</span>
        <h2>Register for <span id="plan-name"></span></h2>
        <form id="registration-form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="hidden" id="subscription-type" name="subscription_type">
            <div class="form-section">
                <h3>Customer Details</h3>
                <div class="form-group">
                    <i class="fas fa-user"></i>
                    <input type="text" name="name" placeholder="Full Name" required>
                </div>
                <div class="form-group">
                    <i class="fas fa-birthday-cake"></i>
                    <input type="number" name="age" placeholder="Age" required>
                </div>
                <div class="form-group">
                    <i class="fas fa-ruler-vertical"></i>
                    <input type="number" name="height" placeholder="Height (cm)" required>
                </div>
                <div class="form-group">
                    <i class="fas fa-weight"></i>
                    <input type="number" name="weight" placeholder="Weight (kg)" required>
                </div>
                <div class="form-group">
                    <i class="fas fa-home"></i>
                    <input type="text" name="address" placeholder="Address" required>
                </div>
                <div class="form-group">
                    <i class="fas fa-id-card"></i>
                    <input type="text" name="nic" placeholder="NIC" required>
                </div>
                <div class="form-group">
                    <i class="fas fa-phone"></i>
                    <input type="tel" name="contact" placeholder="Contact Number" required>
                </div>
            </div>
            <div class="form-section">
                <h3>Payment Details</h3>
                <div class="form-group">
                    <i class="fas fa-credit-card"></i>
                    <select name="card_type" required>
                        <option value="">Select Card Type</option>
                        <option value="visa">Visa</option>
                        <option value="mastercard">Mastercard</option>
                        <option value="amex">American Express</option>
                    </select>
                </div>
                <div class="form-group">
                    <i class="fas fa-credit-card"></i>
                    <input type="text" name="card_number" placeholder="Card Number" required>
                </div>
                <div class="form-group">
                    <i class="fas fa-calendar-alt"></i>
                    <select name="exp_month" required>
                        <option value="">Expiry Month</option>
                        <?php for($i=1; $i<=12; $i++) echo "<option value='$i'>$i</option>"; ?>
                    </select>
                    <select name="exp_year" required>
                        <option value="">Expiry Year</option>
                        <?php for($i=date('Y'); $i<=date('Y')+10; $i++) echo "<option value='$i'>$i</option>"; ?>
                    </select>
                </div>
                <div class="form-group">
                    <i class="fas fa-lock"></i>
                    <input type="text" name="cvv" placeholder="CVV" required>
                </div>
            </div>
            <button type="submit" class="submit-btn">Register</button>
        </form>
    </div>
</div>

<div id="popup" class="popup">
    <div class="dot1"></div>
    <div class="dot2"></div>
    <!-- Rest of your popup content -->
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

    <script>
    // Pricing card hover effect
    const pricingCards = document.querySelectorAll('.pricing-card');

    pricingCards.forEach(card => {
        card.addEventListener('mouseover', () => {
            pricingCards.forEach(c => c.classList.remove('active'));
            card.classList.add('active');
        });

        card.addEventListener('mouseout', () => {
            card.classList.remove('active');
            const featuredCard = document.querySelector('.pricing-card.featured');
            if (featuredCard) {
                featuredCard.classList.add('active');
            }
        });
    });

    // Popup functionality
    document.addEventListener('DOMContentLoaded', function() {
        const popup = document.getElementById('popup');
        const closeBtn = document.querySelector('.close');
        const ctaButtons = document.querySelectorAll('.cta-button');

        function openPopup(tier) {
            popup.style.display = 'block';
            popup.className = 'popup ' + tier;
            document.getElementById('plan-name').textContent = tier.charAt(0).toUpperCase() + tier.slice(1) + ' Plan';
            document.getElementById('subscription-type').value = tier;
        }

        function closePopup() {
            popup.style.display = 'none';
        }

        ctaButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const tier = this.closest('.pricing-card').getAttribute('data-tier');
                openPopup(tier);
            });
        });

        closeBtn.addEventListener('click', closePopup);

        window.addEventListener('click', function(event) {
            if (event.target == popup) {
                closePopup();
            }
        });
    });


    closeButton.addEventListener('click', closePopup);

    window.addEventListener('click', (e) => {
        if (e.target === popup) {
            closePopup();
        }
    });
</script>


</body>
</html>
