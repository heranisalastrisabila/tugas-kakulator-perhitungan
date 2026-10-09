<?php
$nama = $_GET['nama'] ?? '';
$email = $_GET['email'] ?? '';
$hargamobil = $_GET['hargamobil'] ?? '';
$tenor = $_GET['tenor'] ?? '';
$dp = $_GET['dp'] ?? '';
$pesan = $_GET['pesan'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet"
       href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <title>angsuran mobil mini cooper</title>
</head>
<body>
     <nav>
    <div class="logo">
        <img src="https://images.seeklogo.com/logo-png/22/1/mini-cooper-logo-png_seeklogo-224659.png" alt="Logo">
    </div>

    <div class="nama">
        <h3>Mini Velora</h3>
    </div>
    <ul>
        <li><a href="#beranda">Beranda</a></li>
        <li><a href="#tentang">Tentang</a></li>
        <li><a href="#kakulator">Kakulator</a></li>
        <li><a href="#kontak">Kontak</a></li>
    </ul>
</nav>

<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="https://imgd.aeplcdn.com/1920x1080/n/cw/ec/180421/cooper-exterior-right-front-three-quarter-16.png?isig=0&q=80&q=80" class="d-block w-100" alt="gambar 1">
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="https://moladin.com/wp-content/uploads/2026/02/Mini-Cooper.webp" class="d-block w-100" alt="gambar 2">
    </div>
    <div class="carousel-item">
      <img src="https://files.belanjamobil.co.id/media/items/None/20251203005436sejarah_mini_cooper.webp" class="d-block w-100" alt="gambar 3">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<section class="perusahaan">
    <div class="tentang">
        <h2>Tentang Perusahaan</h2>
        <p>Perusahaan kami bergerak dalam bidang penjualan mobil
            dan menyediakan berbagai pilihan mobil berkualitas.
        </p>
    </div>

    <div class="gambar">
        <img src="https://www.blackxperience.com/assets/content/blackauto/autonews/2023-mini-plant-oxford-1536x864.jpg" alt="Gambar Perusahaan">
    </div>
</section>

</section> <!-- penutup Tentang Perusahaan -->

<!-- KODE HTML KALKULATOR DI SINI -->
<section class="kalkulator" id="kakulator">
    <h2>Kredit Angsuran Mobil</h2>
    <?php
if ($pesan != '') {
    echo "<p style='color:red;'>$pesan</p>";
}
    if (isset($_POST['submit'])) {
        if ($nama == '') echo "<p style='color:red;'>Nama kosong!</p>";
        if ($email == '') echo "<p style='color:red;'>Email kosong!</p>";
        if ($hargamobil == '') echo "<p style='color:red;'>Harga mobil kosong!</p>";
        if ($tenor == '') echo "<p style='color:red;'>Tenor kosong!</p>";
        if ($dp == '') echo "<p style='color:red;'>DP kosong!</p>";
    }
    ?>
    <form action="proses.php" method="POST">
        <label>Nama:</label>
        <input type="text" name="nama" value="<?php echo $nama; ?>">
        <br><br>
        <label>Email:</label>
        <input type="text" name="email" value="<?php echo $email; ?>">
        <br><br>
        <label>Harga Mobil:</label>
        <input type="number" name="hargamobil" value="<?php echo $hargamobil; ?>">
        <br><br>
        <label>Tenor:</label>
        <input type="radio" name="tenor" value="1" <?php if ($tenor == 1) echo "checked"; ?>> 1 Tahun
        <input type="radio" name="tenor" value="2" <?php if ($tenor == 2) echo "checked"; ?>> 2 Tahun
        <input type="radio" name="tenor" value="3"<?php if ($tenor == 3) echo "checked"; ?>> 3 Tahun
        <input type="radio" name="tenor" value="4"<?php if ($tenor == 4) echo "checked"; ?>> 4 Tahun
        <input type="radio" name="tenor" value="5"<?php if ($tenor == 5) echo "checked"; ?>> 5 Tahun
        <br><br>
        <label>DP:</label>
        <select name="dp">
    <option value="">-- Pilih DP --</option>
    <option value="10" <?php if ($dp == 10) echo "selected"; ?>>10%</option>
    <option value="20" <?php if ($dp == 20) echo "selected"; ?>>20%</option>
    <option value="30" <?php if ($dp == 30) echo "selected"; ?>>30%</option>
    <option value="40" <?php if ($dp == 40) echo "selected"; ?>>40%</option>
    <option value="50" <?php if ($dp == 50) echo "selected"; ?>>50%</option>
    <option value="60" <?php if ($dp == 60) echo "selected"; ?>>60%</option>
</select>
        <br><br>
        <button  name="submit" type="submit">Hitung</button>

    </form>
</section>

<br>
<h2>Kakulator</br>
<?php 
if (isset($_POST['submit'])) {
    $hargamobil = $_POST['hargamobil']; 
    $nama = $_POST['nama']; 
    $tenor = $_POST['tenor']; 
    $dp = $_POST['dp']; 
    $hargadpmobil = 0; 


    if ($dp == 10) { 
        $hargadpmobil = ($dp/100) * $hargamobil; 
    } elseif ($dp == 20){ 
        $hargadpmobil = ($dp/100) * $hargamobil; 
    } elseif ($dp == 30){ 
        $hargadpmobil = ($dp/100) * $hargamobil; 
    } elseif ($dp == 40){ 
        $hargadpmobil = ($dp/100) * $hargamobil; 
    } elseif ($dp == 50){ 
        $hargadpmobil = ($dp/100) * $hargamobil; 
    } elseif ($dp == 60){ 
        $hargadpmobil = ($dp/100) * $hargamobil; 
    } 
 
    $lamaangsuran = 0; 

    if ($tenor == 1){ 
        $lamaangsuran = $tenor * 12; 
    } elseif ($tenor == 2){ 
        $lamaangsuran = $tenor * 12; 
    } elseif ($tenor == 3){ 
        $lamaangsuran = $tenor * 12; 
    } elseif ($tenor == 4){ 
        $lamaangsuran = $tenor * 12; 
    } elseif ($tenor == 5){ 
        $lamaangsuran = $tenor * 12; 
    } 
 
    $bunga = 20/100 * $hargamobil; 

    // mencari nominal angsuran
    if ($lamaangsuran > 0){ 
        $jumlahangsuran = (($hargamobil + $bunga) - $hargadpmobil) / $lamaangsuran; 
    } 

    echo "<br>";
    echo "Nama = " . $nama . "<br>";
    echo "Harga mobil = " . $hargamobil . "<br>";
    echo "Tenor = " . $tenor . " Tahun<br>";
    echo "Lama angsuran = " . $lamaangsuran . " Bulan<br>";
    echo "DP = " . $dp . "%<br>";
    echo "Harga DP mobil = " . $hargadpmobil . "<br>";
    echo "Bunga = Rp" . $bunga . "<br><br>";
    echo "Angsuran = Rp" . $jumlahangsuran . "<br>";
} 
?>
</br>
<footer class="footer">
    <p><strong>Hubungi Kami:</strong> 0895392846400 | info@minivelora.com</p>
    <small>&copy; 2026 Mini Velora. All rights reserved.</small>
  </footer>

</body>
</html>