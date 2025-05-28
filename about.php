<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tentang Kami</title>
  <link rel="stylesheet" href="style/style.css">
  <style>
    .anggota-list {
      list-style: none;
      padding: 0;
      display: flex;
      gap: 30px;
      flex-wrap: wrap;
      justify-content: center;
    }
    .anggota-list li {
      text-align: center;
      max-width: 150px;
    }
    .anggota-list img {
      width: 120px;
      height: 120px;
      object-fit: cover;
      border-radius: 50%;
      border: 2px solid #555;
      margin-bottom: 10px;
      box-shadow: 0 0 5px rgba(0,0,0,0.2);
    }
  </style>
</head>
<body>
  <header>
    <h1>Developer</h1>
    <nav>
      <a href="index.php">Beranda</a>
      <a href="about.php">Tentang Kami</a>
      <a href="profil.php">Profil UKM</a>
      <a href="login.php">Login Admin</a>
    </nav>
  </header>

  <main>
    <h2>Tim Pengembang</h2>
    <ul class="anggota-list">
      <li>
        <img src="images/Lefry.jpeg" alt="Nama 1" />
        <div>Lefry Ariyo Mandang</div>
        <div>220211060014</div>
      </li>
      <li>
        <img src="images/Dita.jpeg" alt="Nama 2" />
        <div>Dita Ramadani Daun</div>
        <div>220211060051</div>
      </li>
      <li>
        <img src="images/Inayah.jpeg" alt="Nama 3" />
        <div>Inayah Puteri Salsabila</div>
        <div>220211060084</div>
      </li>
      <li>
        <img src="images/Yesaya.jpeg" alt="Nama 3" />
        <div>Yesaya Marnix Saweho</div>
        <div>220211060012</div>
      </li>
    </ul>
  </main>

  <footer>
    <p>&copy; <?php echo date("Y"); ?> Unity</p>
  </footer>
</body>
</html>
