<?php
session_start();
if (!isset($_SESSION['studentId'])) {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['student_search'])) {
  $entered_id = $_POST['student_id'];

  // Simulate a DB search
  if ($entered_id == '12345') {
      $student = [
          'id' => '12345',
          'first_name' => 'John',
          'last_name' => 'Doe',
          'course' => 'BSIT',
          'year_level' => '2nd Year',
          'balance' => 1200.00,
      ];
  } else {
      $_SESSION['message'] = "Student ID not found.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard | Student Info</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <!-- Student ID Search Bar -->
  <form class="top-bar" method="POST" action="dashboard.php">
    <input type="text" name="student_id" placeholder="Enter Student ID" required>
    <button type="submit" name="student_search">Search</button>
  </form>

  <?php if (isset($_SESSION['message'])): ?>
    <div class="message"><?= $_SESSION['message']; unset($_SESSION['message']); ?></div>
  <?php endif; 
  ?>


  <nav class="navbar">
    <h1>Basic Cashiering School</h1>
    <ul>
      <li><a href="homepage.php">Home</a></li>
      <li><a href="dashboard.php">Dashboard</a></li>
      <li><a href="index.php?logout=true">Logout</a></li>
    </ul>
  </nav>

  <div class="dashboard-container">

<!-- Student Info (Left Column) -->
<div class="dashboard-section">
  <div class="section-title">Student Information</div>
  <div class="section-content">
    <p><span class="bold">ID:</span> <?= $student['id'] ?? 'N/A'; ?></p>
    <p><span class="bold">Name:</span> <?= $student['first_name'] ?? ''; ?> <?= $student['last_name'] ?? ''; ?></p>
    <p><span class="bold">Course:</span> <?= $student['course'] ?? 'N/A'; ?></p>
    <p><span class="bold">Year Level:</span> <?= $student['year_level'] ?? 'N/A'; ?></p>

    <p class="section-title">Current Balance</p>
    <p><span class="bold">Outstanding Balance:</span> ₱<?= number_format($student['balance'] ?? 0, 2); ?></p>
  </div>
</div>

<!-- School Necessities (Right Column) -->
<div class="dashboard-section">
  <div class="section-title">School Necessities</div>
  <div class="section-content">
    <form method="POST" action="dashboard.php">
      <label for="necessity">Choose Item:</label>
      <select name="necessity" id="necessity" required>
        <option value="">Select item</option>
        <option value="notebook">Notebook</option>
        <option value="pen">Pen</option>
        <option value="uniform">Uniform</option>
      </select>
      <button type="submit" name="add_item">Add to My Necessities</button>
    </form>
  </div>
</div>

</div>

  <!-- RIGHT: Selected Necessities Summary Panel -->
  <div class="side-panel">
    <section class="card">
      <h2>My Selected Necessities</h2>
      <ul id="necessitiesList"></ul>
      <p id="totalPrice" style="margin-top: 15px; font-weight: bold; font-size: 1.1rem;">
  Total: ₱0.00
</p>
    </section>
  </div>
</div>
</body>
</html>
