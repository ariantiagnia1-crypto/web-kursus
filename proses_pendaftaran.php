<?php
require_once "koneksi.php";
if ($_SERVER["REQUEST_METHOD"] !== "POST") { header("Location: pendaftaran.php"); exit; }
$nama = trim($_POST["nama"] ?? "");
$nim = trim($_POST["nim"] ?? "");
$jeniskelamin = trim($_POST["JenisKelamin"] ?? "");
$email = trim($_POST["email"] ?? "");
$no_hp = trim($_POST["no_hp"] ?? "");
$alamat = trim($_POST["alamat"] ?? "");
$kursus = trim($_POST["kursus"] ?? "");
$allowed = ["HTML dan CSS", "JavaScript", "PHP dan MySQL"];
if ($nama === "" || !filter_var($email, FILTER_VALIDATE_EMAIL) || $no_hp === "" || $alamat === "" || !in_array($kursus, $allowed, true)) {
    header("Location: pendaftaran.php?status=gagal"); exit;
}
try {
    $stmt = $pdo->prepare("INSERT INTO peserta (nama,email,no_hp,alamat,kursus) VALUES (:nama,:email,:no_hp,:alamat,:kursus)");
    $stmt->execute([":nama"=>$nama, ":email"=>$email, ":no_hp"=>$no_hp, ":alamat"=>$alamat, ":kursus"=>$kursus]);
    header("Location: pendaftaran.php?status=berhasil"); exit;
} catch (PDOException $e) { header("Location: pendaftaran.php?status=gagal"); exit; }
?>
