<?php
$host = "localhost";
$database = "kursusku";
$username = "root";
$password = ""; 
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    exit("Koneksi database gagal. Pastikan MySQL aktif dan database kursusku sudah diimpor.");
}
?>
