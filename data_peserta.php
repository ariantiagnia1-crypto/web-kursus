<?php
require_once "koneksi.php";
$peserta = $pdo->query("SELECT id,nama,email,no_hp,alamat,kursus,tanggal_daftar FROM peserta ORDER BY tanggal_daftar DESC")->fetchAll();
function aman($v) { return htmlspecialchars((string)$v, ENT_QUOTES, "UTF-8"); }
?>
<!DOCTYPE html><html lang="id"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Data Peserta - KursusKu</title><link rel="stylesheet" href="css/style.css"></head><body>
<header><h1>KursusKu</h1><p>Sistem Informasi Pendaftaran Kursus</p></header><nav><a href="index.php">Beranda</a><a href="pendaftaran.php">Pendaftaran</a><a href="data_peserta.php">Data Peserta</a></nav>
<main class="container"><section class="panel"><h2>Data Peserta Kursus</h2><div class="table-wrap"><table><thead><tr><th>No.</th><th>Nama</th><th>Email</th><th>Nomor HP</th><th>Alamat</th><th>Kursus</th><th>Tanggal Daftar</th></tr></thead><tbody>
<?php if ($peserta): foreach ($peserta as $i=>$p): ?><tr><td><?= $i+1 ?></td><td><?= aman($p["nama"]) ?></td><td><?= aman($p["email"]) ?></td><td><?= aman($p["no_hp"]) ?></td><td><?= aman($p["alamat"]) ?></td><td><?= aman($p["kursus"]) ?></td><td><?= aman($p["tanggal_daftar"]) ?></td></tr><?php endforeach; else: ?><tr><td colspan="7">Belum ada peserta yang mendaftar.</td></tr><?php endif; ?>
</tbody></table></div><a class="button" href="pendaftaran.php">Tambah Peserta</a></section></main><footer>&copy; 2026 KursusKu.</footer></body></html>
