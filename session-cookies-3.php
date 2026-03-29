<?php
session_start();

$processingOK = 'not yet';

if (isset($_SESSION['authorized'])) {
  $processingOK = $_SESSION['authorized'];
}

$authorized = ($processingOK === 'ok');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lab 3 | Protected Page</title>
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

    h1, h2 {
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

    ul {
      color: #c9ccd1;
      line-height: 1.8;
      padding-left: 20px;
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

    .button-secondary {
      background: #3ba55c;
    }

    .button-secondary:hover {
      background: #2d7d46;
    }
  </style>
</head>
<body>
  <div class="page">
    <div class="card">
      <h1>Lab 3 — Protected Content</h1>

      <?php if ($authorized): ?>
        <div class="status success">Authorization Success — Access Granted</div>
        <p>
          This page was able to read <strong>$_SESSION['authorized']</strong> and confirm that its value is <strong>ok</strong>.
        </p>

        <h2>Protected Area</h2>
        <ul>
          <li>You logged in correctly in Lab 2.</li>
          <li>The session persisted across page navigation.</li>
          <li>No password had to be typed again on this page.</li>
        </ul>

        <div class="button-row">
          <a class="button-link button-secondary" href="logout.php">Log Out</a>
          <a class="button-link" href="session-cookies-1.php">Back to Lab 1</a>
        </div>
      <?php else: ?>
        <div class="status failure">Authorization Failure — Access Denied</div>
        <p>
          This page checked <strong>$_SESSION['authorized']</strong> and did not find a valid authorized session.
          You need to complete the login flow first.
        </p>

        <div class="button-row">
          <a class="button-link" href="session-cookies-1.php">Go to Lab 1</a>
        </div>
      <?php endif; ?>
    </div>
  </div>
</body>
</html>
