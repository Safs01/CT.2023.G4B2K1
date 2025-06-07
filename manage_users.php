<?php
session_start();
include 'db.php';

if ($_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $conn->query("DELETE FROM users WHERE user_id = $id");
}

$users = $conn->query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Manage Users</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <h3 class="mb-3">User Management</h3>
    <table class="table table-bordered">
      <thead>
        <tr><th>Name</th><th>Email</th><th>Role</th><th>Action</th></tr>
      </thead>
      <tbody>
        <?php while($row = $users->fetch_assoc()): ?>
        <tr>
          <td><?= $row['name'] ?></td>
          <td><?= $row['email'] ?></td>
          <td><?= $row['role'] ?></td>
          <td>
            <?php if ($row['role'] !== 'admin'): ?>
              <a href="?delete=<?= $row['user_id'] ?>" onclick="return confirm('Delete user?')" class="btn btn-danger btn-sm">Delete</a>
            <?php endif; ?>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
    <a href="admin_dashboard.php" class="btn btn-secondary">Back</a>
  </div>
</body>
</html>
