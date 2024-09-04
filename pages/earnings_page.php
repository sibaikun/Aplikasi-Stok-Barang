<?php

require '../includes/db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_earning'])) {
    $date = $_POST['date'];
    $amount = $_POST['amount'];

    $sql = "INSERT INTO earnings (date, amount, user_id) VALUES ('$date', '$amount', '$user_id')";
    $conn->query($sql);
}

$earnings = $conn->query("SELECT * FROM earnings WHERE user_id='$user_id'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Stocked - Jumlah Penghasilan</title>
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
            padding-bottom: 30px; /* Add padding at the bottom for spacing */
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
    </div>
    <div class="content">
        <div class="container">
            <form method="POST" action="">
                <h2>Tambah Penghasilan</h2>
                <div class="mb-3">
                    <label for="date" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>
                <div class="mb-3">
                    <label for="amount" class="form-label">Jumlah Penghasilan</label>
                    <input type="number" step="0.01" class="form-control" id="amount" name="amount" required>
                </div>
                <button type="submit" class="btn btn-primary" name="add_earning">Tambah Penghasilan</button>
            </form>
            <hr>
            <h2>Data Jumlah Penghasilan</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tanggal</th>
                        <th>Jumlah Penghasilan (IDR)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $earnings->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td>Rp <?php echo number_format($row['amount'], 3, '.', ','); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
