<?php
$pilihan = $_GET["kursus"] ?? "";
$allowed = ["HTML dan CSS", "JavaScript", "PHP dan MySQL"];
if (!in_array($pilihan, $allowed, true)) $pilihan = "";
$status = $_GET["status"] ?? "";
?>
<!DOCTYPE html><html lang="id"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Pendaftaran - KursusKu</title><link rel="stylesheet" href="css/style.css"></head><body>
<header><h1>KursusKu</h1><p>Sistem Informasi Pendaftaran Kursus</p></header><nav><a href="index.php">Beranda</a><a href="pendaftaran.php">Pendaftaran</a><a href="data_peserta.php">Data Peserta</a></nav>
<main class="container narrow"><section class="panel"><h2>Formulir Pendaftaran</h2><p>Isi data berikut dengan benar.</p>
<?php if ($status === "berhasil"): ?><p class="success">Pendaftaran berhasil disimpan!</p><?php elseif ($status === "gagal"): ?><p class="error">Pendaftaran gagal. Periksa data dan pastikan database sudah diimpor.</p><?php endif; ?>
<form action="proses_pendaftaran.php" method="post">
<label for="nama">Nama lengkap</label><input id="nama" name="nama" maxlength="100" required>
<label for="nim">NIM</label><input id="nim" name="nim" maxlength="20" required>
<label for="JenisKelamin">Jenis Kelamin</label><select id="JenisKelamin" name="JenisKelamin" required><option value=""> Jenis Kelamin </option>
<option value="Pria" <?= $pilihan === "Pria" ? "selected" : "" ?>>Pria</option>
<option value="Wanita" <?= $pilihan === "Wanita" ? "selected" : "" ?>>Wanita</option></select>
<label for="email">Email</label><input id="email" name="email" type="email" maxlength="120" required>
<label for="no_hp">Nomor HP</label><input id="no_hp" name="no_hp" maxlength="25" required>
<label for="alamat">Alamat</label><textarea id="alamat" name="alamat" rows="3" maxlength="255" required></textarea>
<label for="kursus">Pilihan kursus</label><select id="kursus" name="kursus" required><option value="">-- Pilih kursus --</option>
<option value="HTML dan CSS" <?= $pilihan === "HTML dan CSS" ? "selected" : "" ?>>HTML dan CSS - Rp200.000</option>
<option value="JavaScript" <?= $pilihan === "JavaScript" ? "selected" : "" ?>>JavaScript - Rp250.000</option>
<option value="PHP dan MySQL" <?= $pilihan === "PHP dan MySQL" ? "selected" : "" ?>>PHP dan MySQL - Rp300.000</option></select>
<button class="button" type="submit">Kirim Pendaftaran</button></form></section></main><footer>&copy; 2026 KursusKu.</footer></body></html>
