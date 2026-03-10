<?php
session_start();
include 'config.php';

// Cek Login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
$msg = "";
$active_tab = isset($_GET['tab']) ? $_GET['tab'] : 'profile';

// --- LOGIKA PENYIMPANAN DATA (SIMULASI) ---
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['update_profile'])) {
        // Logika update username
        $new_username = mysqli_real_escape_string($conn, $_POST['username']);
        // Query update (pastikan tabel user kamu benar)
        // $query = "UPDATE users SET username = '$new_username' WHERE id = '$user_id'";
        // mysqli_query($conn, $query);
        $_SESSION['username'] = $new_username; // Update session
        $username = $new_username;
        $msg = "<div class='bg-green-500/10 border border-green-500/50 text-green-400 p-3 rounded-lg mb-6 flex items-center gap-2'><i class='fa-solid fa-check-circle'></i> Username berhasil diperbarui!</div>";
    }
    if (isset($_POST['update_password'])) {
        // Logika update password
        $msg = "<div class='bg-blue-500/10 border border-blue-500/50 text-blue-400 p-3 rounded-lg mb-6 flex items-center gap-2'><i class='fa-solid fa-info-circle'></i> Password berhasil diubah!</div>";
    }
    if (isset($_POST['update_photo'])) {
        // Logika upload foto
        $msg = "<div class='bg-purple-500/10 border border-purple-500/50 text-purple-400 p-3 rounded-lg mb-6 flex items-center gap-2'><i class='fa-solid fa-camera'></i> Foto profil diperbarui!</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil - WeCraft</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-[#0b0e14] text-white font-sans min-h-screen flex items-center justify-center p-6">

    <div class="max-w-5xl w-full grid grid-cols-1 md:grid-cols-4 gap-8">
        
        <div class="md:col-span-1 space-y-4">
            <div class="mb-6">
                <a href="dashboard.php" class="text-gray-400 hover:text-white transition flex items-center gap-2 text-sm font-bold">
                    <i class="fa-solid fa-arrow-left"></i> KEMBALI
                </a>
                <h1 class="text-2xl font-bold mt-4">Pengaturan</h1>
            </div>

            <nav class="space-y-2">
                <a href="?tab=profile" class="flex items-center gap-3 px-4 py-3 rounded-xl transition font-medium <?= $active_tab == 'profile' ? 'bg-blue-600 text-white shadow-lg shadow-blue-900/50' : 'bg-[#161b22] text-gray-400 hover:bg-gray-800' ?>">
                    <i class="fa-solid fa-user-pen w-5 text-center"></i> Profil Saya
                </a>
                <a href="?tab=password" class="flex items-center gap-3 px-4 py-3 rounded-xl transition font-medium <?= $active_tab == 'password' ? 'bg-blue-600 text-white shadow-lg shadow-blue-900/50' : 'bg-[#161b22] text-gray-400 hover:bg-gray-800' ?>">
                    <i class="fa-solid fa-lock w-5 text-center"></i> Keamanan
                </a>
                <a href="?tab=photo" class="flex items-center gap-3 px-4 py-3 rounded-xl transition font-medium <?= $active_tab == 'photo' ? 'bg-blue-600 text-white shadow-lg shadow-blue-900/50' : 'bg-[#161b22] text-gray-400 hover:bg-gray-800' ?>">
                    <i class="fa-solid fa-image w-5 text-center"></i> Foto Profil
                </a>
                <a href="logout.php" class="flex items-center gap-3 px-4 py-3 rounded-xl transition font-medium text-red-400 hover:bg-red-500/10 hover:text-red-300 mt-8">
                    <i class="fa-solid fa-right-from-bracket w-5 text-center"></i> Logout
                </a>
            </nav>
        </div>

        <div class="md:col-span-3">
            <div class="bg-[#161b22] border border-gray-800 rounded-3xl p-8 shadow-2xl relative overflow-hidden">
                <div class="absolute top-0 right-0 p-12 opacity-5 pointer-events-none">
                    <i class="fa-solid fa-gear text-9xl text-white"></i>
                </div>

                <?= $msg ?>

                <?php if ($active_tab == 'profile'): ?>
                    <h2 class="text-xl font-bold mb-1">Informasi Pribadi</h2>
                    <p class="text-gray-500 text-sm mb-6">Perbarui detail akun Anda di sini.</p>
                    <form method="POST">
                        <div class="mb-5">
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Username</label>
                            <input type="text" name="username" value="<?= htmlspecialchars($username) ?>" class="w-full bg-[#0b0e14] border border-gray-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition placeholder-gray-600">
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" name="update_profile" class="bg-blue-600 hover:bg-blue-500 text-white px-8 py-3 rounded-xl font-bold transition shadow-lg shadow-blue-900/20">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                <?php endif; ?>

                <?php if ($active_tab == 'password'): ?>
                    <h2 class="text-xl font-bold mb-1">Ganti Password</h2>
                    <p class="text-gray-500 text-sm mb-6">Pastikan password Anda kuat dan aman.</p>
                    <form method="POST">
                        <div class="mb-4">
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Password Baru</label>
                            <input type="password" name="password" placeholder="••••••••" class="w-full bg-[#0b0e14] border border-gray-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition">
                        </div>
                        <div class="mb-5">
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Konfirmasi Password</label>
                            <input type="password" name="confirm_password" placeholder="••••••••" class="w-full bg-[#0b0e14] border border-gray-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-blue-500 transition">
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" name="update_password" class="bg-blue-600 hover:bg-blue-500 text-white px-8 py-3 rounded-xl font-bold transition shadow-lg shadow-blue-900/20">
                                Update Password
                            </button>
                        </div>
                    </form>
                <?php endif; ?>

                <?php if ($active_tab == 'photo'): ?>
                    <h2 class="text-xl font-bold mb-1">Foto Profil</h2>
                    <p class="text-gray-500 text-sm mb-6">Tampilkan wajah terbaik Anda.</p>
                    <form method="POST" enctype="multipart/form-data" class="text-center py-8">
                        <div class="w-32 h-32 bg-gradient-to-tr from-blue-600 to-purple-600 rounded-full mx-auto p-1 mb-6">
                            <div class="w-full h-full bg-[#161b22] rounded-full flex items-center justify-center overflow-hidden relative group cursor-pointer">
                                <i class="fa-solid fa-user text-4xl text-gray-600"></i>
                                <div class="absolute inset-0 bg-black/50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                                    <i class="fa-solid fa-camera text-white"></i>
                                </div>
                            </div>
                        </div>
                        
                        <input type="file" name="photo" id="photo_input" class="hidden">
                        <label for="photo_input" class="cursor-pointer bg-[#0b0e14] border border-gray-600 hover:border-blue-500 text-gray-300 px-6 py-2 rounded-lg text-sm transition inline-block mb-4">
                            Pilih File Foto
                        </label>
                        <p class="text-xs text-gray-600 mb-8">Format JPG, PNG, GIF. Maks 2MB.</p>

                        <div class="flex justify-end border-t border-gray-800 pt-6">
                            <button type="submit" name="update_photo" class="bg-blue-600 hover:bg-blue-500 text-white px-8 py-3 rounded-xl font-bold transition shadow-lg shadow-blue-900/20">
                                Upload Foto
                            </button>
                        </div>
                    </form>
                <?php endif; ?>

            </div>
        </div>
    </div>
</body>
</html>