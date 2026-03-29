<?php
session_start();

$processingOK = 'not yet';

// check if already logged in
if (isset($_SESSION['authorized'])) {
  $processingOK = $_SESSION['authorized'];
} else {
  $password = trim($_POST['password'] ?? '');

  if ($password === 'Test') {
    $processingOK = 'ok';
    $_SESSION['authorized'] = 'ok';
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Lab 2 - Login</title>
</head>
<body>

<h1>Login Result</h1>

<?php if ($processingOK === 'ok'): ?>
  <p>Authorization Succeeded</p>
  <a href="session-cookies-3.php">Go to Lab 3</a>
<?php else: ?>
  <p>Authorization Failed</p>
  <a href="session-cookies-1.php">Try Again</a>
<?php endif; ?>

</body>
</html>
