<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'seller') {
    header("Location: login.php");
    exit();
}

$seller_id = $_SESSION['user_id'];

// Handle delete request
if (isset($_GET['delete'])) {
    $delete_id = (int)$_GET['delete'];
    $conn->query("DELETE FROM products WHERE product_id = $delete_id AND seller_id = $seller_id");
}

// Get seller's products
$products = $conn->query("SELECT * FROM products WHERE seller_id = $seller_id");
?>

<!DOCTYPE html>
<html>
<head>
  <title>My Inventory</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-5">
  <h3 class="mb-4">Your Inventory</h3>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price (R)</th>
        <th>Stock</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row = $products->fetch_assoc()): ?>
      <tr>
        <td><img src="uploads/<?= htmlspecialchars($row['image']) ?>" width="50"></td>
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td><?= htmlspecialchars($row['description']) ?></td>
        <td><?= number_format($row['price'], 2) ?></td>
        <td><?= $row['stock'] ?></td>
        <td>
          <a href="?delete=<?= $row['product_id'] ?>" class="btn btn-danger btn-sm"
             onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
  <a href="seller_dashboard.php" class="btn btn-secondary">← Back to Dashboard</a>
</div>
</body>
</html>

