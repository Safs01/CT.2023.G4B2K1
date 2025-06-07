<?php
session_start();
include 'db.php';

if ($_SESSION['role'] !== 'buyer') {
    header("Location: login.php");
    exit();
}

$msg = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $message = $_POST['message'];

    $stmt = $conn->prepare("INSERT INTO complaints (user_id, message) VALUES (?, ?)");
    $stmt->bind_param("is", $user_id, $message);
    if ($stmt->execute()) {
        $msg = "Complaint submitted!";
    } else {
        $msg = "Failed to submit.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Submit Complaint</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
  <div class="container mt-5" style="max-width: 600px;">
    <h3 class="mb-4 text-center">Submit a Complaint</h3>
    <?php if ($msg): ?><div class="alert alert-info"><?= $msg ?></div><?php endif; ?>
    <form method="POST">
      <div class="mb-3">
        <label>Your Complaint</label>
        <textarea name="message" class="form-control" rows="4" required></textarea>
      </div>
      <button class="btn btn-warning">Submit</button>
      <a href="buyer_dashboard.php" class="btn btn-secondary">Back</a>
    </form>
  </div>
</body>
</html>
