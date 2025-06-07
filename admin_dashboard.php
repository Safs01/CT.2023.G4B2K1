<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <style>
    body {
      background-color: #ffeef2;
      font-family: 'Comic Sans MS', cursive;
    }
    .dashboard {
      max-width: 500px;
      margin: 80px auto;
      background-color: #fff0f5;
      padding: 30px;
      border-radius: 12px;
      border: 2px solid #ffc0cb;
      text-align: center;
    }
    .dashboard a {
      display: block;
      margin: 10px 0;
      color: white;
      background-color: #ff69b4;
      padding: 10px;
      border-radius: 8px;
      text-decoration: none;
    }
    .dashboard a:hover {
      background-color: #ff85c1;
    }
  </style>
</head>
<body>
<div class="dashboard">
  <h2>Welcome Admin 👩‍💼</h2>
  <a href="manage_users.php">Manage Users</a>
  <a href="reports.php">View Reports</a>
  <a href="index.php">Go to Homepage</a>
  <a href="logout.php">Logout</a>
</div>
</body>
</html>
