<?php
require '../includes/db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];

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
    <title>Stocked - Main</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <style>
        body, html {
            height: 100%;
            /* margin: 0;
            padding: 0; */
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
        .card {
            margin-bottom: 1.5rem;
        }
        .card h3 {
            font-size: 1.5rem;
        }
        .card p {
            font-size: 1rem;
        }
        .mt-3 {
            margin-top: 1.5rem !important;
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
        @media (max-width: 576px) {
            .navbar-brand {
                font-size: 25px;
            }
            .menu a {
                padding: 8px 10px;
                font-size: 0.9rem;
            }
            .card h3 {
                font-size: 1.2rem;
            }
            .card p {
                font-size: 0.9rem;
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
                    <a href="aboutme.php">Tentang Kami</a>
                    <a href="profile.php">Profile</a>
                    <a href="../public/logout.php">Log Out</a>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container">
                <?php if ($show_welcome_alert): ?>
                    <div class="alert alert-success" id="welcome-alert">
                        Selamat Datang <?php echo htmlspecialchars($username); ?>
                    </div>
                <?php endif; ?>
                
                <h2>Usaha UMKM</h2>
                <p>Selamat datang di Halaman UMKM Anda. Website ini hanyalah tugas untuk membantu UMKM yang ada di sekitar Semarang, khususnya di daerah Tlogosari. Berikut adalah usaha-usaha yang dikelola:</p>
                <div class="card mb-3">
                    <div class="card-body">
                        <h3 class="card-title">Roti Bakar</h3>
                        <p class="card-text">Usaha Roti Bakar kami menyediakan berbagai jenis roti bakar dengan berbagai rasa dan topping yang menarik.</p>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-body">
                        <h3 class="card-title">Martabak</h3>
                        <p class="card-text">Usaha Martabak kami menawarkan martabak manis dan martabak telur dengan berbagai variasi isian yang lezat.</p>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-body">
                        <h3 class="card-title">Kebab</h3>
                        <p class="card-text">Usaha Kebab kami menyediakan kebab dengan daging pilihan dan sayuran segar yang menggugah selera.</p>
                    </div>
                </div>

                <div class="mt-3">
                    <h2>Barang Masuk</h2>
                    <a href="input_barang_masuk.php" class="btn btn-success">Input Barang Masuk</a>
                </div>

                <div class="mt-3">
                    <h2>Barang Keluar</h2>
                    <a href="input_barang_keluar.php" class="btn btn-warning">Input Barang Keluar</a>
                </div>

                <div class="mt-3">
                    <h2>Daftar Barang Masuk</h2>
                    <a href="list_stock_in.php" class="btn btn-info">Lihat Daftar Barang Masuk</a>
                </div>

                <div class="mt-3">
                    <h2>Daftar Barang Keluar</h2>
                    <a href="list_stock_out.php" class="btn btn-danger">Lihat Daftar Barang Keluar</a>
                </div>
            </div>
        </div>
        <div class="footer">
            <p>&copy; 2024 - StockedUMKM by <a href="https://www.sibaikun.com">Sibaikun</a></p>
        </div>
    </div>
    <script>
        // Auto-hide the welcome alert after 5 seconds
        window.onload = function() {
            setTimeout(function() {
                var alert = document.getElementById('welcome-alert');
                if (alert) {
                    alert.style.display = 'none';
                }
            }, 5000);
        };
    </script>
</body>
</html>
