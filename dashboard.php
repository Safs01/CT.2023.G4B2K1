<?php
session_start();
if (!isset($_SESSION["user_id"])) {
  header("Location: login.php");
  exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <style>
    body {
      background-color: #ffeef2;
      font-family: 'Comic Sans MS', cursive;
    }
    .card-box {
      max-width: 500px;
      margin: 60px auto;
      background-color: #fff0f5;
      border: 2px solid #f8bbd0;
      border-radius: 15px;
      padding: 30px;
      text-align: center;
    }
    .btn-custom {
      margin: 10px 0;
    }
  </style>
</head>
<body>
  <div class="card-box">
    <h2 class="text-danger">Welcome, <?= ucfirst($_SESSION['role']) ?></h2>
    <a href="index.php" class="btn btn-outline-primary btn-custom">🏠 Go to Home</a><br>
    <?php if ($_SESSION["role"] == "admin"): ?>
      <a href="admin_users.php" class="btn btn-info btn-custom">Manage Users</a>
      <a href="reports.php" class="btn btn-secondary btn-custom">View Reports</a>
    <?php elseif ($_SESSION["role"] == "seller"): ?>
      <a href="add_product.php" class="btn btn-success btn-custom">Add Product</a>
      <a href="inventory.php" class="btn btn-warning btn-custom">Manage Inventory</a>
    <?php endif; ?>
    <br><a href="logout.php" class="btn btn-danger btn-custom">Logout</a>
  </div>
</body>
</html>
