<?php
session_start();
session_destroy();

// optional: clear cookies
setcookie('LAST_VISIT', '', time() - 3600);
setcookie('VISIT_NUMBER', '', time() - 3600);
setcookie('FIRST_VISIT', '', time() - 3600);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Logout</title>
</head>
<body>

<h1>You have been logged out</h1>
<a href="session-cookies-1.php">Go Back</a>

</body>
</html>
