<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include 'config.php';

$message = "";

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    
    if ($result && mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            header("Location: dashboard.php");
            exit;
        } else {
            $message = "Password salah!";
        }
    } else {
        $message = "Email tidak ditemukan!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login – WeCraft</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-[#020617] via-[#0b0e14] to-black flex items-center justify-center px-4">

<!-- BACK BUTTON -->
<a href="index.php" class="absolute top-6 left-6 flex items-center gap-2 text-gray-400 hover:text-white transition">
    <span class="text-xl">←</span>
    <span class="hidden sm:block">Beranda</span>
</a>

<!-- LOGO -->
<div class="absolute top-6 right-6 font-bold text-xl tracking-wide">
    <span class="text-blue-500">We</span><span class="text-white">Craft</span>
</div>

<!-- LOGIN CARD -->
<div class="w-full max-w-md bg-[#0f172a]/80 backdrop-blur-xl border border-white/10 rounded-3xl p-8 shadow-2xl animate-fadeIn">

    <h2 class="text-3xl font-extrabold text-center mb-2">Welcome Back 👋</h2>
    <p class="text-gray-400 text-center mb-6 text-sm">Masuk ke Client Portal WeCraft</p>

    <?php if($message): ?>
        <div class="mb-4 p-3 rounded-xl bg-red-500/10 border border-red-500 text-red-400 text-sm text-center">
            <?= $message ?>
        </div>
    <?php endif; ?>

    <form method="POST" class="space-y-5">
        <div>
            <label class="block text-sm mb-2 text-gray-300">Email Address</label>
            <input type="email" name="email" required
            class="w-full px-4 py-3 rounded-xl bg-[#020617] border border-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/30 outline-none transition">
        </div>

        <div>
            <label class="block text-sm mb-2 text-gray-300">Password</label>
            <input type="password" name="password" required
            class="w-full px-4 py-3 rounded-xl bg-[#020617] border border-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/30 outline-none transition">
        </div>

        <button type="submit" name="login"
        class="w-full py-3 rounded-xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 hover:scale-[1.02] hover:shadow-lg hover:shadow-blue-500/30 transition-all duration-300">
            Masuk Sekarang
        </button>
    </form>

    <p class="mt-6 text-center text-gray-400 text-sm">
        Belum punya akun?
        <a href="register.php" class="text-blue-500 hover:underline">Daftar</a>
    </p>
</div>

<style>
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}
.animate-fadeIn {
    animation: fadeIn 0.6s ease-out forwards;
}
</style>

</body>
</html>
