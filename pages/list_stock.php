<?php
require '../includes/db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_stock'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM stocks WHERE id='$id' AND user_id='$user_id'";
    if ($conn->query($sql) === FALSE) {
        echo "Error: " . $conn->error;
    }
}

// Proses pencarian
$search_query = "";
if (isset($_GET['search'])) {
    $search_query = $_GET['search'];
    $stocks = $conn->query("SELECT * FROM stocks WHERE user_id='$user_id' AND item_name LIKE '%$search_query%'");
} else {
    $stocks = $conn->query("SELECT * FROM stocks WHERE user_id='$user_id'");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Stocked - Daftar Stok Barang</title>
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
        .search-form {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 20px;
        }
        .search-form input {
            margin-left: 10px;
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

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Daftar Stok Barang</h2>
                    <form class="search-form" method="GET" action="">
                        <input type="text" class="form-control" name="search" placeholder="Cari barang..." value="<?php echo $search_query; ?>">
                        <button type="submit" class="btn btn-secondary">Cari</button>
                    </form>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Berat (gr)</th>
                            <th>Tanggal Pembelian</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = $stocks->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['item_name']; ?></td>
                                <td><?php echo $row['quantity']; ?></td>
                                <td><?php echo $row['weight']; ?></td>
                                <td><?php echo $row['date_added']; ?></td>
                                <td>
                                    <a href="edit_stock.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                                </td>
                                <td>
                                    <form method="POST" action="" style="display:inline;">
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" class="btn btn-danger" name="delete_stock">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
