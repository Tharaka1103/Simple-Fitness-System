<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Handle form submission for updating user details
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_user'])) {
    $new_username = trim($_POST['username']);
    $new_email = trim($_POST['email']);
    $new_first_name = trim($_POST['first_name']);
    $new_last_name = trim($_POST['last_name']);
    $new_age = intval($_POST['age']);
    $new_gender = $_POST['gender'];
    $new_weight = floatval($_POST['weight']);
    $new_height = intval($_POST['height']);

    $update_sql = "UPDATE users SET username = ?, email = ?, first_name = ?, last_name = ?, age = ?, gender = ?, weight = ?, height = ? WHERE id = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("ssssissdi", $new_username, $new_email, $new_first_name, $new_last_name, $new_age, $new_gender, $new_weight, $new_height, $user_id);
    
    if ($update_stmt->execute()) {
        $user['username'] = $new_username;
        $user['email'] = $new_email;
        $user['first_name'] = $new_first_name;
        $user['last_name'] = $new_last_name;
        $user['age'] = $new_age;
        $user['gender'] = $new_gender;
        $user['weight'] = $new_weight;
        $user['height'] = $new_height;
        $success_message = "User details updated successfully!";
    } else {
        $error_message = "Error updating user details. Please try again.";
    }
}


// Handle user deletion
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_user'])) {
    $delete_sql = "DELETE FROM users WHERE id = ?";
    $delete_stmt = $conn->prepare($delete_sql);
    $delete_stmt->bind_param("i", $user_id);
    
    if ($delete_stmt->execute()) {
        session_destroy();
        header("Location: index.php");
        exit();
    } else {
        $error_message = "Error deleting user account. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - FlexFit Online</title>
    <link rel="stylesheet" href="css/userProfile.css">
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
    <div class="container">
        <main>
            <section class="user-info">
                <h2>Your Profile</h2>
                <?php
                if (isset($success_message)) {
                    echo "<p class='success-message'>$success_message</p>";
                }
                if (isset($error_message)) {
                    echo "<p class='error-message'>$error_message</p>";
                }
                ?>
                <div class="profile-card">
                    <div class="avatar">
                        <i class="fas fa-user-circle"></i>
                    </div>
                    <div class="info">
                        <p><strong>Username:</strong> <?php echo htmlspecialchars($user['username']); ?></p>
                        <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
                        <p><strong>First Name:</strong> <?php echo htmlspecialchars($user['first_name']); ?></p>
                        <p><strong>Last Name:</strong> <?php echo htmlspecialchars($user['last_name']); ?></p>
                        <p><strong>Age:</strong> <?php echo htmlspecialchars($user['age']); ?></p>
                        <p><strong>Gender:</strong> <?php echo htmlspecialchars($user['gender']); ?></p>
                        <p><strong>Weight:</strong> <?php echo htmlspecialchars($user['weight']); ?> kg</p>
                        <p><strong>Height:</strong> <?php echo htmlspecialchars($user['height']); ?> cm</p>
                        <p><strong>Member since:</strong> <?php echo date('F j, Y', strtotime($user['created_at'])); ?></p>
                    </div>
                </div>

                <div class="user-actions">
                    <button id="edit-user-btn" class="btn btn-primary">Edit Details</button>
                    <button id="delete-user-btn" class="btn btn-danger">Delete Account</button>
                </div>
                <div id="edit-user-form" style="display: none;">
                    <h3>Edit User Details</h3>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="first_name">First Name:</label>
                            <input type="text" id="first_name" name="first_name" value="<?php echo htmlspecialchars($user['first_name']); ?>">
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name:</label>
                            <input type="text" id="last_name" name="last_name" value="<?php echo htmlspecialchars($user['last_name']); ?>">
                        </div>
                        <div class="form-group">
                            <label for="age">Age:</label>
                            <input type="number" id="age" name="age" value="<?php echo htmlspecialchars($user['age']); ?>">
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender:</label>
                            <select id="gender" name="gender">
                                <option value="Male" <?php echo $user['gender'] == 'Male' ? 'selected' : ''; ?>>Male</option>
                                <option value="Female" <?php echo $user['gender'] == 'Female' ? 'selected' : ''; ?>>Female</option>
                                <option value="Other" <?php echo $user['gender'] == 'Other' ? 'selected' : ''; ?>>Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="weight">Weight (kg):</label>
                            <input type="number" id="weight" name="weight" step="0.1" value="<?php echo htmlspecialchars($user['weight']); ?>">
                        </div>
                        <div class="form-group">
                            <label for="height">Height (cm):</label>
                            <input type="number" id="height" name="height" value="<?php echo htmlspecialchars($user['height']); ?>">
                        </div>
                        <button type="submit" name="update_user" class="btn btn-primary">Update Details</button>
                        <button type="button" class="btn btn-secondary cancel-btn">Cancel</button>
                    </form>
                </div>

                <div id="delete-user-form" style="display: none;">
                    <h3>Delete Account</h3>
                    <p>Are you sure you want to delete your account? This action cannot be undone.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <button type="submit" name="delete_user" class="btn btn-danger">Confirm Delete</button>
                        <button type="button" class="btn btn-secondary cancel-btn">Cancel</button>
                    </form>
                </div>
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
    </div>
    <script>
        document.getElementById('edit-user-btn').addEventListener('click', function() {
            document.getElementById('edit-user-form').style.display = 'block';
            document.getElementById('delete-user-form').style.display = 'none';
        });

        document.getElementById('delete-user-btn').addEventListener('click', function() {
            document.getElementById('delete-user-form').style.display = 'block';
            document.getElementById('edit-user-form').style.display = 'none';
        });

        document.querySelectorAll('.cancel-btn').forEach(function(btn) {
            btn.addEventListener('click', function() {
                document.getElementById('edit-user-form').style.display = 'none';
                document.getElementById('delete-user-form').style.display = 'none';
            });
        });
    </script>

</body>
</html>
