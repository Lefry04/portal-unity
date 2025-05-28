<?php
include 'config/koneksi.php';
if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

$id = $_GET['id'] ?? 0;
$query = mysqli_query($conn, "SELECT * FROM kegiatan WHERE id=$id");
$row = mysqli_fetch_assoc($query);

if (!$row) {
  echo "Data tidak ditemukan.";
  exit;
}

if (isset($_POST['update'])) {
  $judul = $_POST['judul'];
  $deskripsi = $_POST['deskripsi'];
  $tanggal = $_POST['tanggal'];
  $lokasi = $_POST['lokasi'];

  mysqli_query($conn, "UPDATE kegiatan SET judul='$judul', deskripsi='$deskripsi', tanggal='$tanggal', lokasi='$lokasi' WHERE id=$id");
  header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Kegiatan</title>
  <link rel="stylesheet" href="style/style.css">
</head>
<body>
  <header>
    <h1>Edit Kegiatan</h1>
    <nav>
      <a href="dashboard.php">Kembali ke Dashboard</a>
    </nav>
  </header>

  <main class="form-section">
    <form method="POST">
      <input type="text" name="judul" value="<?= htmlspecialchars($row['judul']) ?>" required>
      <textarea name="deskripsi" required><?= htmlspecialchars($row['deskripsi']) ?></textarea>
      <input type="date" name="tanggal" value="<?= $row['tanggal'] ?>" required>
      <input type="text" name="lokasi" value="<?= htmlspecialchars($row['lokasi']) ?>" required>
      <button type="submit" name="update">Update</button>
    </form>
  </main>
</body>
</html>
