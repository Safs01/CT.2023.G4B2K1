<?php
session_start();
include 'db.php';
$id = $_GET["id"];
$product = $conn->query("SELECT * FROM products WHERE product_id=$id")->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
  <title>View Product</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <style>
    body {
      background-color: #ffeef2;
      font-family: 'Comic Sans MS', cursive;
    }
    .product-container {
      max-width: 700px;
      margin: 50px auto;
      background-color: #fff0f5;
      border: 2px solid #ffc0cb;
      padding: 30px;
      border-radius: 15px;
    }
    .btn {
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <div class="product-container">
    <h1><?= $product["name"] ?></h1>
    <img src="uploads/<?= $product["image"] ?>" class="img-fluid rounded mb-3" style="max-height:300px"><br>
    <p><strong>Description:</strong> <?= $product["description"] ?></p>
    <p><strong>Price:</strong> R <?= $product["price"] ?></p>

    <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'buyer'): ?>
    <form method="POST" action="cart.php?action=add">
      <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
      <input type="hidden" name="name" value="<?= $product['name'] ?>">
      <input type="hidden" name="price" value="<?= $product['price'] ?>">
      <button type="submit" class="btn btn-success">🛒 Add to Basket</button>
    </form>
    <a href="complaint.php?product_id=<?= $product['product_id'] ?>" class="btn btn-warning">Report Issue</a>
    <?php endif; ?>

    <a href="index.php" class="btn btn-outline-primary">← Back to Home</a>
  </div>
</body>
</html>
