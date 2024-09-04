<?php
require '../includes/db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['update_profile'])) {
        $username = $_POST['username'];
        $alamat = $_POST['alamat'];
        $nama_umkm = $_POST['nama_umkm'];
        $password = $_POST['password'];
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        if (!empty($password)) {
            $sql = "UPDATE users SET username='$username', password='$hashed_password', alamat='$alamat', nama_umkm='$nama_umkm' WHERE id='$user_id'";
        } else {
            $sql = "UPDATE users SET username='$username', alamat='$alamat', nama_umkm='$nama_umkm' WHERE id='$user_id'";
        }

        if ($conn->query($sql) === FALSE) {
            echo "Error updating record: " . $conn->error;
        } else {
            echo "Profile updated successfully!";
        }
    } elseif (isset($_POST['delete_account'])) {
        $sql = "DELETE FROM users WHERE id='$user_id'";

        if ($conn->query($sql) === FALSE) {
            echo "Error deleting account: " . $conn->error;
        } else {
            session_destroy();
            header("Location: goodbye.php");
            exit();
        }
    }
}

$result = $conn->query("SELECT * FROM users WHERE id='$user_id'");
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Stocked - Profile</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        .wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .content {
            flex: 1;
            padding-bottom: 30px;
        }
        .navbar-brand {
            font-size: 35px;
            font-weight: bold;
            color: aqua;
        }
        .navbar-brand:hover {
            color: aquamarine;
        }
        .header {
            background-color: #343a40;
            padding: 10px 0;
            margin-bottom: 20px;
        }
        .header .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .menu {
            display: flex;
            gap: 15px;
        }
        .menu a {
            color: #ffffff;
            text-decoration: none;
            padding: 10px 15px;
            background-color: #17a2b8;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .menu a:hover {
            background-color: #138496;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <div class="container">
                <a href="dashboard.php" class="navbar-brand">Stocked</a>
                <div class="menu">
                    <a href="../public/logout.php">Log Out</a>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container">
                <h2>Profil User</h2>
                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?php echo $user['username']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $user['alamat']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_umkm" class="form-label">Nama UMKM</label>
                        <input type="text" class="form-control" id="nama_umkm" name="nama_umkm" value="<?php echo $user['nama_umkm']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password Baru</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary" name="update_profile">Update Profile</button>
                    <button type="submit" class="btn btn-danger" name="delete_account" onclick="return confirm('Are you sure you want to delete your account?');">Delete Account</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
