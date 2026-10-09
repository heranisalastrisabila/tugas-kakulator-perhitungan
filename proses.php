
<?php
if (!isset($_POST['submit'])) {
    header("Location: index.php");
    exit;
}

$nama = trim($_POST['nama'] ?? '');
$email = trim($_POST['email'] ?? '');
$hargamobil = trim($_POST['hargamobil'] ?? '');
$tenor = $_POST['tenor'] ?? '';
$dp = $_POST['dp'] ?? '';

$data = http_build_query([
    'nama' => $nama,
    'email' => $email,
    'hargamobil' => $hargamobil,
    'tenor' => $tenor,
    'dp' => $dp
]);

function kembali($pesan, $data) {
    header("Location: index.php?pesan=" . urlencode($pesan) . "&" . $data);
    exit;
}

if ($nama == '') {
    kembali('Nama kosong! Silakan isi nama.', $data);
}

if ($email == '') {
    kembali('Email kosong! Silakan isi email.', $data);
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    kembali('Format email tidak valid!', $data);
}

if ($hargamobil == '' || !is_numeric($hargamobil) || $hargamobil <= 0) {
    kembali('Harga mobil kosong atau tidak valid!', $data);
}

if (!in_array($tenor, ['1','2','3','4','5'])) {
    kembali('Tenor kosong! Silakan pilih tenor.', $data);
}

if (!in_array($dp, ['10','20','30','40','50','60'])) {
    kembali('DP kosong! Silakan pilih DP.', $data);
}

$hargadpmobil = ($dp / 100) * $hargamobil;
$lamaangsuran = $tenor * 12;
$bunga = 0.20 * $hargamobil;
$jumlahangsuran = (($hargamobil + $bunga) - $hargadpmobil) / $lamaangsuran;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Perhitungan</title>
</head>
<body>
    <h1>Hasil Perhitungan</h1>

    Nama = <?php echo htmlspecialchars($nama); ?><br>
    Email = <?php echo htmlspecialchars($email); ?><br>
    Harga mobil = Rp<?php echo number_format($hargamobil, 0, ',', '.'); ?><br>
    Tenor = <?php echo $tenor; ?> Tahun<br>
    Lama angsuran = <?php echo $lamaangsuran; ?> Bulan<br>
    DP = <?php echo $dp; ?>%<br>
    Harga DP mobil = Rp<?php echo number_format($hargadpmobil, 0, ',', '.'); ?><br>
    Bunga = Rp<?php echo number_format($bunga, 0, ',', '.'); ?><br><br>
    Angsuran per bulan = Rp<?php echo number_format($jumlahangsuran, 0, ',', '.'); ?><br><br>

    <a href="index.php">Kembali ke Form</a>
</body>
</html>
