<?php
session_start();

$admin_username = "admin";
$admin_password_file = 'password.txt';
if (file_exists($admin_password_file)) {
    $admin_password = trim(file_get_contents($admin_password_file));
} else {
    $admin_password = "admin123";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === $admin_username && $password === $admin_password) {
        $_SESSION['loggedin'] = true;
        header('Location: admin.php');
        exit;
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Admin Login</title>
  <style>
    /* Basic reset */
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    body {
      background: #f0f4f8;
      display: flex;
      height: 100vh;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }
    .login-container {
      background: white;
      padding: 40px 30px;
      border-radius: 10px;
      box-shadow: 0 6px 15px rgba(0,0,0,0.1);
      width: 100%;
      max-width: 400px;
      text-align: center;
    }
    h2 {
      margin-bottom: 25px;
      color: #003366;
    }
    form {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }
    input[type="text"],
    input[type="password"] {
      padding: 12px 15px;
      font-size: 16px;
      border: 1.5px solid #ccc;
      border-radius: 6px;
      transition: border-color 0.3s ease;
    }
    input[type="text"]:focus,
    input[type="password"]:focus {
      outline: none;
      border-color: #0066cc;
      box-shadow: 0 0 5px rgba(0,102,204,0.5);
    }
    button {
      background-color: #0066cc;
      color: white;
      border: none;
      padding: 14px;
      font-size: 18px;
      border-radius: 6px;
      cursor: pointer;
      font-weight: bold;
      transition: background-color 0.3s ease;
    }
    button:hover {
      background-color: #004a99;
    }
    .error-message {
      color: #cc0000;
      margin-bottom: 15px;
      font-weight: 600;
    }
  </style>
</head>
<body>

<div class="login-container">
  <h2>Admin Login</h2>
  <?php if (!empty($error)) echo "<div class='error-message'>$error</div>"; ?>
  <form method="POST" action="">
    <input type="text" name="username" placeholder="Username" required autofocus>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
  </form>
</div>

</body>
</html>
