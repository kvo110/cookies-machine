<?php
session_start();

$processingOK = 'not yet';
$message = '';

// if already authorized, keep the user logged in
if (isset($_SESSION['authorized'])) {
  $processingOK = $_SESSION['authorized'];
  $message = 'An existing session was found, so access is already authorized.';
} else {
  $password = trim($_POST['password'] ?? '');

  if ($password === 'Test') {
    $processingOK = 'ok';
    $_SESSION['authorized'] = 'ok';
    $message = 'The password matched and the session variable was created successfully.';
  } elseif ($password === '') {
    $message = 'You arrived here without submitting the login form. No password was received.';
  } else {
    $message = 'The password was received, but it did not match the required value.';
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lab 2 | Login Processing</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, Helvetica, sans-serif;
      background: linear-gradient(135deg, #1e1f22, #2b2d31, #313338);
      color: #f2f3f5;
      min-height: 100vh;
    }

    .page {
      max-width: 900px;
      margin: 50px auto;
      padding: 24px;
    }

    .card {
      background: rgba(49, 51, 56, 0.96);
      border: 1px solid #3f4147;
      border-radius: 18px;
      padding: 26px;
      box-shadow: 0 14px 30px rgba(0, 0, 0, 0.28);
    }

    h1 {
      margin-top: 0;
      color: #ffffff;
    }

    .status {
      padding: 16px;
      border-radius: 12px;
      margin: 18px 0;
      font-weight: bold;
    }

    .success {
      background: rgba(59, 165, 92, 0.14);
      border: 1px solid rgba(59, 165, 92, 0.45);
      color: #d7ffe1;
    }

    .failure {
      background: rgba(237, 66, 69, 0.14);
      border: 1px solid rgba(237, 66, 69, 0.45);
      color: #ffd8d8;
    }

    p {
      color: #c9ccd1;
      line-height: 1.7;
    }

    .button-row {
      display: flex;
      flex-wrap: wrap;
      gap: 12px;
      margin-top: 20px;
    }

    .button-link {
      display: inline-block;
      padding: 12px 16px;
      border-radius: 10px;
      background: #5865f2;
      color: #ffffff;
      text-decoration: none;
      font-weight: bold;
      transition: transform 0.15s ease, background 0.15s ease;
    }

    .button-link:hover {
      background: #4752c4;
      transform: translateY(-1px);
    }

    .button-muted {
      background: #4e5058;
    }

    .button-muted:hover {
      background: #5d6068;
    }

    code {
      background: #1e1f22;
      padding: 2px 6px;
      border-radius: 6px;
      color: #a5b3ff;
    }
  </style>
</head>
<body>
  <div class="page">
    <div class="card">
      <h1>Lab 2 — Session Login Result</h1>

      <?php if ($processingOK === 'ok'): ?>
        <div class="status success">Authorization Succeeded</div>
      <?php else: ?>
        <div class="status failure">Authorization Failed</div>
      <?php endif; ?>

      <p><?php echo htmlspecialchars($message); ?></p>

      <p>
        This page uses <code>session_start()</code> and checks whether
        <code>$_SESSION['authorized']</code> exists. If the password is correct,
        the session variable is stored on the server and the browser gets the session ID cookie.
      </p>

      <div class="button-row">
        <?php if ($processingOK === 'ok'): ?>
          <a class="button-link" href="session-cookies-3.php">Go to Lab 3</a>
        <?php endif; ?>
        <a class="button-link button-muted" href="session-cookies-1.php">Back to Lab 1</a>
      </div>
    </div>
  </div>
</body>
</html>
