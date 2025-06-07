<?php
include 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
  $role = $_POST["role"];
  $stmt = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $name, $email, $password, $role);
  $stmt->execute();
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body style="background-color:#ffeef2; font-family:'Comic Sans MS', cursive;">
  <div class="container mt-5" style="max-width: 450px;">
    <a href="index.php" class="btn btn-outline-danger mb-3">← Back to Home</a>
    <h2 class="text-center text-danger">Create Account</h2>
    <form method="POST">
      <div class="mb-3"><input name="name" class="form-control" placeholder="Full Name" required></div>
      <div class="mb-3"><input name="email" type="email" class="form-control" placeholder="Email" required></div>
      <div class="mb-3"><input name="password" type="password" class="form-control" placeholder="Password" required></div>
      <div class="mb-3">
        <select name="role" class="form-select">
          <option value="buyer">Buyer</option>
          <option value="seller">Seller</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary w-100">Register</button>
    </form>
  </div>
</body>
</html>
