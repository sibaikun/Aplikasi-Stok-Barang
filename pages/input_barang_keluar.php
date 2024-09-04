<?php
require '../includes/db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $item_name = $_POST['item_name'];
    $quantity = $_POST['quantity'];
    $weight = $_POST['weight'];
    $date_out = date('Y-m-d H:i:s');

    // Get current stock
    $result = $conn->query("SELECT * FROM stocks WHERE user_id='$user_id' AND item_name='$item_name'");
    $stock = $result->fetch_assoc();

    if ($stock && $stock['quantity'] >= $quantity && $stock['weight'] >= $weight) {
        // Reduce stock
        $new_quantity = $stock['quantity'] - $quantity;
        $new_weight = $stock['weight'] - $weight;
        $conn->query("UPDATE stocks SET quantity='$new_quantity', weight='$new_weight' WHERE id='" . $stock['id'] . "'");

        // Insert into stock_out
        $conn->query("INSERT INTO stock_out (user_id, item_name, quantity, weight, date_out) VALUES ('$user_id', '$item_name', '$quantity', '$weight', '$date_out')");

        $message = "Barang keluar berhasil diinput!";
    } else {
        $message = "Stok atau berat tidak mencukupi!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Stocked - Barang Keluar</title>
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
        .alert {
            margin-top: 20px;
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
                <?php if(isset($message)): ?>
                    <div class="alert alert-warning">
                        <?php echo $message; ?>
                    </div>
                <?php endif; ?>

                <form method="POST" action="">
                    <div class="mb-3">
                        <h2>Barang Keluar</h2>
                        <label for="item_name" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="item_name" name="item_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Jumlah</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" required>
                    </div>
                    <div class="mb-3">
                        <label for="weight" class="form-label">Berat (gr)</label>
                        <input type="number" step="0.01" class="form-control" id="weight" name="weight" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Tambah Barang Keluar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
