<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$totalUsers = $conn->query("SELECT COUNT(*) AS total FROM users")->fetch_assoc()['total'];
$totalSellers = $conn->query("SELECT COUNT(*) AS total FROM users WHERE role='seller'")->fetch_assoc()['total'];
$totalBuyers = $conn->query("SELECT COUNT(*) AS total FROM users WHERE role='buyer'")->fetch_assoc()['total'];
$totalProducts = $conn->query("SELECT COUNT(*) AS total FROM products")->fetch_assoc()['total'];
$totalComplaints = $conn->query("SELECT COUNT(*) AS total FROM complaints")->fetch_assoc()['total'];
?>

<!DOCTYPE html>
<html>
<head>
  <title>Platform Reports</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-5">
  <h3 class="mb-4">Admin Reports</h3>
  <ul class="list-group">
    <li class="list-group-item">👥 Total Users: <strong><?= $totalUsers ?></strong></li>
    <li class="list-group-item">🛍️ Total Sellers: <strong><?= $totalSellers ?></strong></li>
    <li class="list-group-item">🛒 Total Buyers: <strong><?= $totalBuyers ?></strong></li>
    <li class="list-group-item">📦 Total Products: <strong><?= $totalProducts ?></strong></li>
    <li class="list-group-item">❗ Total Complaints: <strong><?= $totalComplaints ?></strong></li>
  </ul>
  <a href="admin_dashboard.php" class="btn btn-secondary mt-4">← Back to Dashboard</a>
</div>
</body>
</html>
