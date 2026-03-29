<?php
// reading existing cookies safely
$lasttime = isset($_COOKIE['LAST_VISIT']) ? $_COOKIE['LAST_VISIT'] : '';
$visitcount = isset($_COOKIE['VISIT_NUMBER']) ? (int) $_COOKIE['VISIT_NUMBER'] : 0;
$firstvisit = isset($_COOKIE['FIRST_VISIT']) ? $_COOKIE['FIRST_VISIT'] : '';

// building new timestamp for this visit
$LAST_VISIT = date('l, F j, Y') . ' at ' . date('g:i A');

// writing cookies before any HTML output
setcookie('LAST_VISIT', $LAST_VISIT, time() + 3600 * 24 * 14);
setcookie('VISIT_NUMBER', $visitcount + 1, time() + 3600 * 24 * 14);

// only store the very first visit once
if ($firstvisit === '') {
  setcookie('FIRST_VISIT', $LAST_VISIT, time() + 3600 * 24 * 365);
}

// this cookie is for step 11
setcookie('random_number', rand(1, 100), time() + 86400 * 30, '/');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lab 1 | Cookies</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, Helvetica, sans-serif;
      background: linear-gradient(135deg, #1e1f22, #2b2d31, #313338);
      color: #f2f3f5;
      min-height: 100vh;
    }

    .page {
      max-width: 980px;
      margin: 40px auto;
      padding: 24px;
    }

    .card {
      background: rgba(49, 51, 56, 0.96);
      border: 1px solid #3f4147;
      border-radius: 18px;
      padding: 24px;
      box-shadow: 0 14px 30px rgba(0, 0, 0, 0.28);
      margin-bottom: 22px;
    }

    h1, h2 {
      margin-top: 0;
      color: #ffffff;
    }

    .subtext {
      color: #b5bac1;
      margin-bottom: 20px;
    }

    .stats {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 16px;
      margin-top: 20px;
    }

    .stat-box {
      background: #2b2d31;
      border: 1px solid #404249;
      border-radius: 14px;
      padding: 18px;
    }

    .label {
      color: #949ba4;
      font-size: 14px;
      margin-bottom: 8px;
    }

    .value {
      color: #ffffff;
      font-size: 18px;
      font-weight: bold;
      line-height: 1.4;
    }

    .welcome {
      margin-top: 18px;
      padding: 14px 16px;
      background: rgba(88, 101, 242, 0.14);
      border: 1px solid rgba(88, 101, 242, 0.45);
      border-radius: 12px;
      color: #dfe3ff;
    }

    form {
      display: flex;
      flex-wrap: wrap;
      gap: 12px;
      margin-top: 14px;
    }

    input[type="text"] {
      flex: 1;
      min-width: 240px;
      padding: 13px 14px;
      border-radius: 10px;
      border: 1px solid #4e5058;
      background: #1e1f22;
      color: #f2f3f5;
      outline: none;
    }

    input[type="text"]:focus {
      border-color: #5865f2;
      box-shadow: 0 0 0 3px rgba(88, 101, 242, 0.18);
    }

    button,
    .button-link {
      display: inline-block;
      padding: 12px 16px;
      border-radius: 10px;
      border: none;
      background: #5865f2;
      color: #ffffff;
      text-decoration: none;
      font-weight: bold;
      cursor: pointer;
      transition: transform 0.15s ease, background 0.15s ease;
    }

    button:hover,
    .button-link:hover {
      background: #4752c4;
      transform: translateY(-1px);
    }

    .button-row {
      display: flex;
      flex-wrap: wrap;
      gap: 12px;
      margin-top: 18px;
    }

    .button-secondary {
      background: #3ba55c;
    }

    .button-secondary:hover {
      background: #2d7d46;
    }

    .button-muted {
      background: #4e5058;
    }

    .button-muted:hover {
      background: #5d6068;
    }

    .footer-note {
      color: #949ba4;
      font-size: 14px;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <div class="page">
    <div class="card">
      <h1>Lab 1 — Cookies</h1>
      <p class="subtext">
        This page tracks your visit history using browser cookies and also starts the login flow for the session lab.
      </p>

      <div class="stats">
        <div class="stat-box">
          <div class="label">Visit Number</div>
          <div class="value"><?php echo $visitcount + 1; ?></div>
        </div>

        <div class="stat-box">
          <div class="label">Last Visit</div>
          <div class="value"><?php echo $lasttime === '' ? 'No previous visit recorded yet' : htmlspecialchars($lasttime); ?></div>
        </div>

        <div class="stat-box">
          <div class="label">First Visit</div>
          <div class="value"><?php echo $firstvisit === '' ? htmlspecialchars($LAST_VISIT) : htmlspecialchars($firstvisit); ?></div>
        </div>

        <div class="stat-box">
          <div class="label">Random Number Cookie</div>
          <div class="value">
            <?php echo isset($_COOKIE['random_number']) ? (int) $_COOKIE['random_number'] : 'Refresh to see it persist'; ?>
          </div>
        </div>
      </div>

      <?php if ($visitcount > 0): ?>
        <div class="welcome">
          Welcome back! Your browser sent cookie data to PHP, and the page updated your visit history.
        </div>
      <?php endif; ?>
    </div>

    <div class="card">
      <h2>Login Demo</h2>
      <p class="subtext">
        Enter the password <strong>Test</strong> to continue to Lab 2 and create the authorization session.
      </p>

      <form method="post" action="session-cookies-2.php">
        <input type="text" name="password" placeholder="Enter password">
        <button type="submit">Log In &amp; Go to Lab 2</button>
      </form>

      <div class="button-row">
        <a class="button-link button-muted" href="session-cookies-3.php">Try Lab 3 Without Login</a>
        <a class="button-link button-secondary" href="logout.php">Log Out / Reset</a>
      </div>

      <p class="footer-note">
        Hint: the correct password starts with a capital T.
      </p>
    </div>
  </div>
</body>
</html>
