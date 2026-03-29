<?php
session_start();

$processingOK = 'not yet';

if (isset($_SESSION['authorized'])) {
  $processingOK = $_SESSION['authorized'];
}

// block access if not authorized
if ($processingOK !== 'ok') {
  echo "<h1>Access Denied</h1>";
  echo "<a href='session-cookies-1.php'>Go Login</a>";
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Lab 3 - Protected</title>
</head>
<body>

<h1>Protected Page</h1>
<p>You are logged in!</p>

<a href="logout.php">Logout</a>

</body>
</html>
