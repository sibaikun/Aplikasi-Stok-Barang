<?php
require '../includes/db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$username = $_SESSION['username']; // Assuming you store the username in session

// Check if it's the first login
if (!isset($_SESSION['first_login_shown'])) {
    $_SESSION['first_login_shown'] = true;
    $show_welcome_alert = true;
} else {
    $show_welcome_alert = false;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Stocked - Tentang Kami</title>
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
        .footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 10px;
            width: 100%;
        }
        .footer a {
            color: #f8f9fa;
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }
        .alert {
            margin-top: 20px;
        }
        @media (max-width: 768px) {
            .header .container {
                flex-direction: column;
            }
            .menu {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <div class="container">
                <a href="dashboard.php" class="navbar-brand">Stocked</a>
                <div class="menu">
                    <a href="profile.php">Profile</a>
                    <a href="../public/logout.php">Log Out</a>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container">
                <h1>Nama Kelompok:</h1>

                <h2>Ketua:</h2>
                <p>Rakastyo Bagasworo            (G.111.22.0004)</p>

                <h2>Anggota:</h2>
                <p>1. ⁠Asiwa Nura Izzati          (G.111.22.0020)</p>
                <p>2. Achmad Fadhoil             (G.111.22.0028)</P>
                <p>3. Aldino Putra Edhitya       (G.111.22.0033)</p>
                <p>4. Fransiskus Chrisma Eka P   (G.111.22.0036)</p>
                <p>5. Riyan Wahyu Ramadhani      (G.111.22.0039)</p>
                <p>6. Farhan Nailu Syam          (G.111.22.0048)</p>
            </div>
        </div>
        <div class="footer">
            <p>&copy; 2024 - StockedUMKM by <a href="https://www.sibaikun.com">Sibaikun</a></p>
        </div>
    </div>
</body>
</html>
