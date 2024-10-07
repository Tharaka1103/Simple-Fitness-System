<?php
session_start();
require_once 'config.php';

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (empty($username)) {
        $errors[] = "Username is required";
    }
    if (empty($password)) {
        $errors[] = "Password is required";
    }

    if (empty($errors)) {
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['username'];
                header("Location: index.php");
                exit();
            } else {
                $errors[] = "Invalid username or password";
            }
        } else {
            $errors[] = "Invalid username or password";
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
    <title>Login - FlexFit Online</title>
    <link rel="stylesheet" href="css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/20f08145b4.js" crossorigin="anonymous"></script></head>
</head>
<body>
    <div class="container">
        <h1>Welcome Back to FlexFit Online</h1>
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
                <i class="fas fa-lock"></i>
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="login-btn">Login</button>
        </form>
        <p class="register-link">Don't have an account? <a href="register.php">Register</a></p>
    </div>
    <script src="js/login.js"></script>
</body>
</html>
