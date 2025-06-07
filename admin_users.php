<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
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
            max-width: 700px;
            margin: 60px auto;
            background-color: #fff0f5;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            text-align: center;
        }
        .dashboard h2 {
            color: #d63384;
            margin-bottom: 30px;
        }
        .dashboard .btn {
            margin: 10px;
            padding: 12px 30px;
            font-size: 16px;
            background-color: #ff85c1;
            border: none;
            color: white;
            border-radius: 8px;
        }
        .dashboard .btn:hover {
            background-color: #ff5ba1;
        }
    </style>
</head>
<body>

<div class="dashboard">
    <h2>Welcome, Admin</h2>
    <a href="manage_users.php" class="btn">👥 Manage Users</a>
    <a href="reports.php" class="btn">📊 View Reports</a>
    <a href="index.php" class="btn">🏠 Go to Homepage</a>
    <a href="logout.php" class="btn">🚪 Logout</a>
</div>

</body>
</html>
