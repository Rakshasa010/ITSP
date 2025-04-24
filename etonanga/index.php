<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['studentId'] = $_POST['studentId'];
    header('Location: homepage.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login | Basic Cashiering School</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="login-container">
    <h2>Student Login</h2>
    <form method="POST" action="">
      <div class="form-group">
        <label for="studentId">Student ID</label>
        <input type="text" id="studentId" name="studentId" placeholder="Enter your ID" required />
      </div>
      <div class="form-group">
        <label for="studentPass">Password</label>
        <input type="password" id="studentPass" placeholder="Enter your password" required />
      </div>
      <button type="submit">Login</button>
    </form>
  </div>
</body>
</html>
