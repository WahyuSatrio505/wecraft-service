<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$message = "";
if (isset($_POST['submit_request'])) {
    $user_id = $_SESSION['user_id'];
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $budget = mysqli_real_escape_string($conn, $_POST['budget']);

    $query = "INSERT INTO project_requests (user_id, judul_proyek, deskripsi_proyek, budget_range) 
              VALUES ('$user_id', '$judul', '$deskripsi', '$budget')";

    if (mysqli_query($conn, $query)) {
        $message = "Permintaan berhasil dikirim! Tim kami akan segera menghubungi Anda.";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Ajukan Proyek - WeCraft</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#0b0e14] text-white min-h-screen p-8">
    <div class="max-w-2xl mx-auto bg-[#161b22] p-8 rounded-2xl border border-gray-800">
        <a href="dashboard.php" class="text-blue-500 text-sm mb-6 inline-block">← Kembali ke Dashboard</a>
        <h2 class="text-2xl font-bold mb-2">Mulai Proyek Baru</h2>
        <p class="text-gray-400 mb-8">Beritahu kami apa yang ingin Anda bangun.</p>

        <?php if($message): ?>
            <div class="bg-blue-500/10 border border-blue-500 text-blue-500 p-4 rounded-xl mb-6 text-sm">
                <?= $message ?>
            </div>
        <?php endif; ?>

        <form action="" method="POST" class="space-y-6">
            <div>
                <label class="block text-sm font-medium mb-2 text-gray-300">Nama/Judul Proyek</label>
                <input type="text" name="judul" required placeholder="Contoh: Web E-Commerce Sepatu" 
                       class="w-full px-4 py-3 rounded-xl bg-[#0b0e14] border border-gray-700 focus:border-blue-500 outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium mb-2 text-gray-300">Deskripsi Kebutuhan</label>
                <textarea name="deskripsi" rows="4" required placeholder="Jelaskan fitur-fitur yang Anda inginkan..." 
                          class="w-full px-4 py-3 rounded-xl bg-[#0b0e14] border border-gray-700 focus:border-blue-500 outline-none"></textarea>
            </div>
            <div>
                <label class="block text-sm font-medium mb-2 text-gray-300">Estimasi Anggaran</label>
                <select name="budget" class="w-full px-4 py-3 rounded-xl bg-[#0b0e14] border border-gray-700 focus:border-blue-500 outline-none">
                    <option value="1jt - 5jt">Rp 1.000.000 - Rp 5.000.000</option>
                    <option value="5jt - 15jt">Rp 5.000.000 - Rp 15.000.000</option>
                    <option value="> 15jt">> Rp 15.000.000</option>
                </select>
            </div>
            <button type="submit" name="submit_request" class="w-full py-3 bg-blue-600 hover:bg-blue-700 rounded-xl font-bold transition">
                Kirim Permintaan Proyek
            </button>
        </form>
    </div>
</body>
</html>