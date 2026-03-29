<?php
session_start();

// clear all session data first
session_unset();
session_destroy();

// clear the lab cookies by expiring them
setcookie('LAST_VISIT', '', time() - 3600, '/');
setcookie('VISIT_NUMBER', '', time() - 3600, '/');
setcookie('FIRST_VISIT', '', time() - 3600, '/');
setcookie('random_number', '', time() - 3600, '/');
setcookie(session_name(), '', time() - 3600, '/');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Logout | Reset</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, Helvetica, sans-serif;
      background: linear-gradient(135deg, #1e1f22, #2b2d31, #313338);
      color: #f2f3f5;
      min-height: 100vh;
    }

    .page {
      max-width: 820px;
      margin: 60px auto;
      padding: 24px;
    }

    .card {
      background: rgba(49, 51, 56, 0.96);
      border: 1px solid #3f4147;
      border-radius: 18px;
      padding: 26px;
      box-shadow: 0 14px 30px rgba(0, 0, 0, 0.28);
      text-align: center;
    }

    h1 {
      margin-top: 0;
      color: #ffffff;
    }

    p {
      color: #c9ccd1;
      line-height: 1.7;
    }

    .button-link {
      display: inline-block;
      margin-top: 16px;
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
  </style>
</head>
<body>
  <div class="page">
    <div class="card">
      <h1>You Have Been Logged Out</h1>
      <p>
        The session was destroyed and the lab cookies were cleared so the activity can be tested again from the beginning.
      </p>
      <a class="button-link" href="session-cookies-1.php">Return to Lab 1</a>
    </div>
  </div>
</body>
</html>
