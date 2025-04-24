<?php
session_start();
if (!isset($_SESSION['studentId'])) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Homepage | Basic Cashiering School</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="login-container">
    <h2>Welcome to Basic Cashiering School</h2>
    <p style="text-align: center;">Access your dashboard below:</p>
    <a href="dashboard.php">
      <button style="margin-top: 20px;">Go to Dashboard</button>
    </a>
  </div>
</body>
</html>
