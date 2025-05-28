<?php
include 'config/koneksi.php';
if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

// Tambah kegiatan
if (isset($_POST['tambah'])) {
  $judul = $_POST['judul'];
  $deskripsi = $_POST['deskripsi'];
  $tanggal = $_POST['tanggal'];
  $lokasi = $_POST['lokasi'];
  mysqli_query($conn, "INSERT INTO kegiatan (judul, deskripsi, tanggal, lokasi) VALUES ('$judul', '$deskripsi', '$tanggal', '$lokasi')");
  header("Location: dashboard.php");
}

// Hapus kegiatan
if (isset($_GET['hapus'])) {
  $id = $_GET['hapus'];
  mysqli_query($conn, "DELETE FROM kegiatan WHERE id=$id");
  header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin</title>
  <link rel="stylesheet" href="style/style.css">
</head>
<body>
  <header>
    <h1>Admin</h1>
    <nav>
      <a href="logout.php">Logout</a>
    </nav>
  </header>

  <main>
    <section class="form-section">
      <h2>Tambah Kegiatan</h2>
      <form method="POST">
        <input type="text" name="judul" placeholder="Judul kegiatan" required>
        <textarea name="deskripsi" placeholder="Deskripsi kegiatan" required></textarea>
        <input type="date" name="tanggal" required>
        <input type="text" name="lokasi" placeholder="Lokasi kegiatan" required>
        <button type="submit" name="tambah">Simpan</button>
      </form>
    </section>

    <section class="table-section">
      <h2>Daftar Kegiatan</h2>
      <table>
        <tr>
          <th>Judul</th>
          <th>Deskripsi</th>
          <th>Tanggal</th>
          <th>Lokasi</th>
          <th>Aksi</th>
        </tr>
        <?php
        $data = mysqli_query($conn, "SELECT * FROM kegiatan ORDER BY tanggal DESC");
        while ($row = mysqli_fetch_assoc($data)) {
          echo "<tr>
                  <td>".htmlspecialchars($row['judul'])."</td>
                  <td>".htmlspecialchars($row['deskripsi'])."</td>
                  <td>{$row['tanggal']}</td>
                  <td>".htmlspecialchars($row['lokasi'])."</td>
                  <td>
                        <a href='edit.php?id={$row['id']}'>Edit</a> |
                        <a href='dashboard.php?hapus={$row['id']}' onclick='return confirm('Hapus?')'>Hapus</a>
                  </td>
                </tr>";
        }
        ?>
      </table>
    </section>
  </main>
</body>
</html>
