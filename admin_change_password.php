<?php
session_start();

// Check if logged in, else redirect to login
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: admin_login.php");
    exit;
}

// Current hardcoded credentials (update this when changing password)
$admin_username = "admin";
$admin_password_file = 'password.txt';

// Read current password from file or fallback
if (file_exists($admin_password_file)) {
    $admin_password = trim(file_get_contents($admin_password_file));
} else {
    $admin_password = "admin123"; // default initial password
}

// Initialize message
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $current_password = $_POST['current_password'] ?? '';
    $new_password = $_POST['new_password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    if ($current_password !== $admin_password) {
        $message = "Current password is incorrect.";
    } elseif ($new_password !== $confirm_password) {
        $message = "New password and confirm password do not match.";
    } elseif (empty($new_password)) {
        $message = "New password cannot be empty.";
    } else {
        // Save new password to file
        file_put_contents($admin_password_file, $new_password);
        $message = "Password updated successfully.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Change Password</title>
  <style>
    /* Reset some default */
    * {
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f0f4f8;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      color: #333;
    }

    .container {
      background: #fff;
      padding: 30px 40px;
      border-radius: 12px;
      box-shadow: 0 8px 24px rgba(0,0,0,0.1);
      width: 100%;
      max-width: 420px;
    }

    h2 {
      margin-bottom: 25px;
      font-weight: 700;
      font-size: 1.8rem;
      color: #004080;
      text-align: center;
    }

    form {
      display: flex;
      flex-direction: column;
    }

    label {
      font-weight: 600;
      margin-bottom: 8px;
      color: #555;
    }

    input[type="password"] {
      padding: 12px 15px;
      margin-bottom: 20px;
      border: 1.8px solid #ccc;
      border-radius: 8px;
      font-size: 1rem;
      transition: border-color 0.3s ease;
    }

    input[type="password"]:focus {
      border-color: #0073e6;
      outline: none;
      box-shadow: 0 0 5px #0073e6aa;
    }

    button {
      padding: 14px;
      background-color: #0073e6;
      color: white;
      font-weight: 700;
      font-size: 1.1rem;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.3s ease;
      margin-top: 10px;
    }

    button:hover {
      background-color: #005bb5;
    }

    .message {
      margin-top: 20px;
      font-weight: 600;
      text-align: center;
      padding: 12px;
      border-radius: 8px;
    }

    .success {
      background-color: #d4edda;
      color: #155724;
      border: 1px solid #c3e6cb;
    }

    .error {
      background-color: #f8d7da;
      color: #721c24;
      border: 1px solid #f5c6cb;
    }

    p.back-link {
      margin-top: 30px;
      text-align: center;
    }

    p.back-link a {
      text-decoration: none;
      color: #0073e6;
      font-weight: 600;
      transition: color 0.3s ease;
    }

    p.back-link a:hover {
      color: #005bb5;
      text-decoration: underline;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Change Password</h2>

  <form method="POST">
    <label for="current_password">Current Password</label>
    <input type="password" id="current_password" name="current_password" required>

    <label for="new_password">New Password</label>
    <input type="password" id="new_password" name="new_password" required>

    <label for="confirm_password">Confirm New Password</label>
    <input type="password" id="confirm_password" name="confirm_password" required>

    <button type="submit">Change Password</button>
  </form>

  <?php if ($message): ?>
    <p class="message <?= strpos($message, 'successfully') !== false ? 'success' : 'error' ?>">
      <?= htmlspecialchars($message) ?>
    </p>
  <?php endif; ?>

  <p class="back-link"><a href="admin.php">&larr; Back to Admin Home</a></p>
</div>

</body>
</html>
