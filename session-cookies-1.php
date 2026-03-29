<?php
// reading existing cookies safely
$lasttime   = isset($_COOKIE['LAST_VISIT']) ? $_COOKIE['LAST_VISIT'] : '';
$visitcount = isset($_COOKIE['VISIT_NUMBER']) ? (int)$_COOKIE['VISIT_NUMBER'] : 0;
$firstvisit = isset($_COOKIE['FIRST_VISIT']) ? $_COOKIE['FIRST_VISIT'] : '';

// building new timestamp
$LAST_VISIT = date('l, F j, Y') . ' at ' . date('g:i A');

// writing cookies (must be before HTML)
setcookie('LAST_VISIT', $LAST_VISIT, time() + 3600 * 24 * 14);
setcookie('VISIT_NUMBER', $visitcount + 1, time() + 3600 * 24 * 14);

// first visit logic
if ($firstvisit === '') {
  setcookie('FIRST_VISIT', $LAST_VISIT, time() + 3600 * 24 * 365);
}

// step 11 cookie (required)
setcookie("random_number", rand(1,100), time() + 86400 * 30, "/");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Lab 1 - Cookies</title>
</head>
<body>

<h1>Cookie Lab</h1>

<p>Visit #: <?php echo $visitcount + 1; ?></p>
<p>Last Visit: <?php echo $lasttime; ?></p>
<p>First Visit: <?php echo $firstvisit; ?></p>

<h2>Login</h2>
<form method="post" action="session-cookies-2.php">
  <input type="text" name="password" placeholder="Enter password">
  <button type="submit">Login</button>
</form>

<br>

<a href="session-cookies-3.php">Try Lab 3 without login</a>
<br><br>
<a href="logout.php">Logout</a>

</body>
</html>
