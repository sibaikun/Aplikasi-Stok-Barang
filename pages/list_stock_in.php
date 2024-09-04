<?php
require '../includes/db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$stocks = $conn->query("SELECT * FROM stocks WHERE user_id='$user_id'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Stocked - Daftar Barang Masuk</title>
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
                <h2>Daftar Barang Masuk</h2>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Berat(gr)</th>
                        <th>Tanggal Ditambahkan</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php while ($row = $stocks->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['item_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['quantity']); ?></td>
                            <td><?php echo htmlspecialchars($row['weight']); ?></td>
                            <td><?php echo htmlspecialchars($row['date_added']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
