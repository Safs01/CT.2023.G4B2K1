<?php
session_start();
include 'db.php';
if ($_SESSION["role"] !== "seller") {
  echo "Access denied!";
  exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $desc = $_POST["description"];
  $price = $_POST["price"];
  $image = $_FILES["image"]["name"];

  move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/" . $image);
  $seller = $_SESSION["user_id"];

  $stmt = $conn->prepare("INSERT INTO products (seller_id, name, description, price, image) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("issds", $seller, $name, $desc, $price, $image);
  $stmt->execute();
  echo "<div class='alert alert-success'>Product added successfully!</div>";
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Product - SA E-Commerce</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <style>
    body {
      background-color: #ffeef2;
      font-family: 'Comic Sans MS', cursive, sans-serif;
    }
    .add-container {
      max-width: 600px;
      margin: 50px auto;
      background-color: #fff0f5;
      padding: 30px;
      border-radius: 15px;
      border: 2px solid #ffc0cb;
    }
    h2 {
      text-align: center;
      color: #ff69b4;
    }
  </style>
</head>
<body>
  <div class="add-container">
    <h2>Add Product</h2>

    <div class="text-end mb-3">
      <a href="index.php" class="btn btn-outline-danger">← Back to Home</a>
    </div>

    <form method="POST" enctype="multipart/form-data">
      <div class="mb-3">
        <input name="name" class="form-control" placeholder="Product Name" required>
      </div>
      <div class="mb-3">
        <textarea name="description" class="form-control" placeholder="Description" required></textarea>
      </div>
      <div class="mb-3">
        <input name="price" type="number" step="0.01" class="form-control" placeholder="Price" required>
      </div>
      <div class="mb-3">
        <input name="image" type="file" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-primary w-100">Add Product</button>
    </form>
  </div>
</body>
</html>
