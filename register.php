<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'config.php';
$message = "";

if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check_email = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
    
    if (mysqli_num_rows($check_email) > 0) {
        $message = "Email sudah terdaftar!";
    } else {
        $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        if (mysqli_query($conn, $query)) {
            header("Location: login.php?status=sukses");
            exit();
        } else {
            die("Gagal simpan ke Database: " . mysqli_error($conn));
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar – WeCraft</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-[#0b0e14] via-[#0f172a] to-black flex items-center justify-center px-4">

<!-- BACK BUTTON -->
<a href="index.php" class="absolute top-6 left-6 flex items-center gap-2 text-gray-400 hover:text-white transition">
    <span class="text-xl">←</span>
    <span class="hidden sm:block">Kembali</span>
</a>

<!-- LOGO -->
<div class="absolute top-6 right-6 font-bold text-xl tracking-wide">
    <span class="text-blue-500">We</span><span class="text-white">Craft</span>
</div>

<!-- CARD -->
<div class="w-full max-w-md bg-[#0f172a]/80 backdrop-blur-xl border border-white/10 rounded-3xl p-8 shadow-2xl animate-fadeIn">
    <h2 class="text-3xl font-extrabold text-center mb-2">Buat Akun Baru</h2>
    <p class="text-gray-400 text-center mb-6 text-sm">Mulai bangun sesuatu yang keren 🚀</p>

    <?php if($message): ?>
        <div class="mb-4 p-3 rounded-xl bg-red-500/10 border border-red-500 text-red-400 text-sm text-center">
            <?= $message ?>
        </div>
    <?php endif; ?>

    <form method="POST" class="space-y-4">
        <div>
            <input type="text" name="username" placeholder="Username" required
            class="w-full px-4 py-3 rounded-xl bg-[#020617] border border-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/30 outline-none transition">
        </div>

        <div>
            <input type="email" name="email" placeholder="Email" required
            class="w-full px-4 py-3 rounded-xl bg-[#020617] border border-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/30 outline-none transition">
        </div>

        <div>
            <input type="password" name="password" placeholder="Password" required
            class="w-full px-4 py-3 rounded-xl bg-[#020617] border border-gray-700 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/30 outline-none transition">
        </div>

        <button type="submit" name="register"
        class="w-full py-3 rounded-xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 hover:scale-[1.02] hover:shadow-lg hover:shadow-blue-500/30 transition-all duration-300">
            Daftar Sekarang
        </button>
    </form>

    <p class="text-center text-sm text-gray-400 mt-6">
        Sudah punya akun?
        <a href="login.php" class="text-blue-500 hover:underline">Login</a>
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
