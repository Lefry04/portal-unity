<?php
include 'config/koneksi.php';

if (isset($_POST['login'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = md5($_POST['password']); // hash untuk membandingkan

  $query = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
  if (mysqli_num_rows($query) > 0) {
    $_SESSION['login'] = true;
    header("Location: dashboard.php");
    exit;
  } else {
    $error = "Username atau password salah!";
  }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login Admin</title>
  <link rel="stylesheet" href="style/style.css">
</head>
<body>
  <main class="login-container">
    <h2>Login Admin</h2>
    <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
    <form method="POST">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit" name="login">Login</button>
    </form>
  </main>
</body>
</html>
