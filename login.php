<?php
require __DIR__ . '/includes/config.php';
if (is_logged_in()) {
    header('Location: ' . (is_admin() ? 'admin/index.php' : 'index.php')); exit;
}
$pageTitle = 'Login';
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $stmt = $conn->prepare("SELECT id,nama,email,password,role FROM users WHERE email = ? LIMIT 1");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();
    if ($user && password_verify($password, $user['password'])) {
        session_regenerate_id(true);
        $_SESSION['user_id'] = (int)$user['id'];
        $_SESSION['nama'] = $user['nama'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];
        header('Location: ' . ($user['role'] === 'admin' ? 'admin/index.php' : 'index.php')); exit;
    }
    $error = 'Email atau kata sandi tidak sesuai.';
}
include __DIR__ . '/includes/header.php';
?>
<div class="auth-wrap"><aside class="auth-art"><span class="art-kicker">PERPUSTAKAAN KITA</span><div class="art-book-stack"><i></i><i></i><i></i></div><h2>Satu buku, sejuta inspirasi.</h2><p>Temukan pengetahuan baru dan mulai perjalanan membaca kamu hari ini.</p><div class="art-dots">● ● ●</div></aside><section class="auth-card"><div class="auth-logo">▣</div><span class="eyebrow">SELAMAT DATANG KEMBALI</span><h1>Login</h1><p class="muted">Masuk ke akun perpustakaan Anda.</p>
<?php if (isset($_GET['registered'])): ?><div class="alert alert-success">Pendaftaran berhasil. Silakan login.</div><?php endif; ?>
<?php if ($error): ?><div class="alert alert-error"><?= e($error) ?></div><?php endif; ?>
<form method="post" class="stack-form"><label>Email<input type="email" name="email" required autocomplete="username" value="<?= e($_POST['email'] ?? '') ?>"></label><label>Kata sandi<input type="password" name="password" required autocomplete="current-password"></label><button class="btn btn-wide" type="submit">Login</button></form><p class="auth-foot">Belum punya akun? <a href="register.php">Daftar di sini</a></p></section></div>
<?php include __DIR__ . '/includes/footer.php'; ?>
