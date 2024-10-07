<?php
session_start();
require_once 'config.php';

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if (empty($username)) {
        $errors[] = "Username is required";
    }
    if (empty($email)) {
        $errors[] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }
    if (empty($password)) {
        $errors[] = "Password is required";
    } elseif (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters long";
    }
    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match";
    }

    if (empty($errors)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $username, $email, $hashed_password);
        
        if ($stmt->execute()) {
            $_SESSION['success_message'] = "Registration successful! Please log in.";
            header("Location: login.php");
            exit();
        } else {
            $errors[] = "Registration failed. Please try again.";
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
    <title>Register - FlexFit Online</title>
    <link rel="stylesheet" href="css/register.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/20f08145b4.js" crossorigin="anonymous"></script></head>
<body>
    <div class="container">
        <h1>Join FlexFit Online</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <?php
            if (!empty($errors)) {
                echo '<div class="error-messages">';
                foreach ($errors as $error) {
                    echo '<p>' . $error . '</p>';
                }
                echo '</div>';
            }
            ?>
            <div class="form-group">
                <i class="fas fa-user"></i>
                <input type="text" id="username" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <i class="fas fa-envelope"></i>
                <input type="email" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <i class="fas fa-lock"></i>
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <i class="fas fa-lock"></i>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
            </div>
            <button type="submit" class="register-btn">Register</button>
        </form>
        <p class="login-link">Already have an account? <a href="login.php">Log in</a></p>
    </div>
    <script src="js/register.js"></script>
</body>
</html>
