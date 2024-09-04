<?php
require '../includes/db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_stock'])) {
    $id = $_POST['id'];
    $item_name = $_POST['item_name'];
    $quantity = $_POST['quantity'];
    $weight = $_POST['weight']; // Tambahkan ini

    // Modifikasi kueri SQL untuk memperbarui nama barang, jumlah, dan berat
    $sql = "UPDATE stocks SET item_name='$item_name', quantity='$quantity', weight='$weight' WHERE id='$id' AND user_id='$user_id'";
    if ($conn->query($sql) === FALSE) {
        echo "Error: " . $conn->error;
    } else {
        header("Location: list_stock.php");
        exit();
    }
}

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM stocks WHERE id='$id' AND user_id='$user_id'");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Stocked - Edit Stok Barang</title>
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
                    <a href="profile.php">Profile</a>
                    <a href="../public/logout.php">Log Out</a>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container">
                <h2>Edit Stock</h2>
                <form method="POST" action="">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <div class="mb-3">
                        <label for="item_name" class="form-label">Nama Barang Baru</label>
                        <input type="text" class="form-control" id="item_name" name="item_name" value="<?php echo $row['item_name']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Jumlah Barang Baru</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" value="<?php echo $row['quantity']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="weight" class="form-label">Berat Barang Baru (gr)</label>      
                        <input type="number" step="0.01" class="form-control" id="weight" name="weight" value="<?php echo $row['weight']; ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="update_stock">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>