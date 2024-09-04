<?php
require '../includes/db.php';
session_start();

$error_message = "";
$username = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $remind_me = isset($_POST['remind_me']);

    $sql = "SELECT id, username, password FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            
            if ($remind_me) {
                setcookie('username', $username, time() + (86400 * 30), "/");
            } else {
                setcookie('username', '', time() - 3600, "/");
            }

            header("Location: ../public/index.php");
        } else {
            $error_message = "Invalid password";
        }
    } else {
        $error_message = "No user found";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
        }
        .login-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .password-container {
            position: relative;
        }
        .password-container input {
            padding-right: 40px;
        }
        .toggle-password {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 50%;
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <?php if ($error_message): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>" required>
            </div>
            <div class="mb-3 password-container">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
                <span class="toggle-password" onclick="togglePassword()">👁️</span>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remind_me" name="remind_me">
                <label class="form-check-label" for="remind_me">Remind Me</label>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
        <p class="mt-3 text-center">Tidak punya akun? <a href="register.php">Register</a></p>
    </div>
    <script>
        function togglePassword() {
            const passwordField = document.getElementById('password');
            const passwordToggle = document.querySelector('.toggle-password');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                passwordToggle.textContent = '🙈';
            } else {
                passwordField.type = 'password';
                passwordToggle.textContent = '👁️';
            }
        }
    </script>
</body>
</html>
