<?php
include 'config/koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>UKM Kampus</title>
  <link rel="stylesheet" href="style/style.css">
</head>
<body>
  <header>
    <h1>Portal Unity</h1>
    <nav>
      <a href="index.php">Beranda</a>
      <a href="about.php">Tentang Kami</a>
      <a href="profil.php">Profil UKM</a>
      <a href="login.php">Login Admin</a>
    </nav>
  </header>

  <main>
    <h2>Daftar Kegiatan UKM</h2>
    <div class="kegiatan-container">
      <?php
      $query = mysqli_query($conn, "SELECT * FROM kegiatan ORDER BY tanggal DESC");
      if (mysqli_num_rows($query) > 0) {
        while ($data = mysqli_fetch_assoc($query)) {
          echo "<div class='kegiatan-card'>";
          echo "<h3>" . htmlspecialchars($data['judul']) . "</h3>";
          echo "<p>" . htmlspecialchars($data['deskripsi']) . "</p>";
          echo "<p><strong>Tanggal:</strong> " . $data['tanggal'] . "</p>";
          echo "<p><strong>Lokasi:</strong> " . htmlspecialchars($data['lokasi']) . "</p>";
          echo "</div>";
        }
      } else {
        echo "<p>Belum ada kegiatan yang terdaftar.</p>";
      }
      ?>
    </div>
  </main>

  <footer>
    <p>&copy; <?php echo date("Y"); ?> Unity</p>
  </footer>
</body>
</html>
