<?php
session_start();
include 'config.php';

// 1. Proteksi Halaman
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];

// 2. Ambil Data Proyek Asli dari Database (Termasuk kolom p_ opsi 2)
$query = "SELECT * FROM projects WHERE user_id = '$user_id' LIMIT 1";
$result = mysqli_query($conn, $query);
$project = mysqli_fetch_assoc($result);

// 3. Logika untuk Tampilan Fase (Milestones)
$fase_list = ["Design UI/UX", "Frontend Dev", "Backend Integration", "Server Deploy"];
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - WeCraft Client</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        .dropdown-menu { z-index: 100; }
        .hidden-dropdown { display: none; }
        .show-dropdown { display: block; animation: fadeIn 0.2s ease-out; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(-10px); } to { opacity: 1; transform: translateY(0); } }
        
        /* Desain Baru untuk Fase Card yang Aktif */
        .fase-card.active { 
            border-color: #3b82f6; 
            background: rgba(59, 130, 246, 0.1); 
            box-shadow: 0 0 15px rgba(59, 130, 246, 0.2);
            transform: translateY(-5px);
        }

        /* Munculkan persen hanya saat aktif */
        .fase-card.active .persen-badge { opacity: 1; transform: scale(1); }
        .persen-badge { opacity: 0; transform: scale(0.8); transition: all 0.3s ease; }

        /* Icon Transition */
        .fase-card.active .icon-container { border-color: #3b82f6; background: #0b0e14; }
        .fase-card.active i { color: #60a5fa; }
        
        .fase-card { transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); }
    </style>
</head>
<body class="bg-[#0b0e14] text-white font-sans min-h-screen">

    <nav class="bg-[#161b22] border-b border-gray-800 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center font-bold text-xl">W</div>
                    <span class="font-bold text-xl tracking-wide">WeCraft<span class="text-blue-500">.</span></span>
                </div>

                <div class="flex items-center gap-4">
                    
                    <div class="hidden md:flex flex-col text-right">
                        <span class="text-sm font-medium text-white"><?= htmlspecialchars($username) ?></span>
                        <span class="text-xs text-gray-400">Client Account</span>
                    </div>
                    
                    <div class="relative">
                        <button id="profileBtn" class="h-10 w-10 rounded-full bg-gradient-to-tr from-blue-500 to-purple-600 p-0.5 focus:outline-none hover:scale-105 transition cursor-pointer">
                            <div class="h-full w-full rounded-full bg-[#161b22] flex items-center justify-center overflow-hidden">
                                <i class="fa-solid fa-user text-gray-300"></i>
                            </div>
                        </button>

                        <div id="dropdownMenu" class="hidden-dropdown absolute right-0 mt-3 w-56 bg-[#161b22] border border-gray-700 rounded-xl shadow-2xl py-2 dropdown-menu origin-top-right">
                            <div class="px-4 py-3 border-b border-gray-700 md:hidden">
                                <p class="text-sm font-bold text-white"><?= htmlspecialchars($username) ?></p>
                                <p class="text-xs text-gray-500">Client Account</p>
                            </div>

                            <a href="edit_profile.php?tab=profile" class="block px-4 py-2.5 text-sm text-gray-300 hover:bg-gray-800 hover:text-white transition flex items-center gap-3">
                                <i class="fa-solid fa-user-pen w-4 text-center"></i> Edit Profil
                            </a>

                            <div class="border-t border-gray-700 my-1"></div>
                            
                            <a href="logout.php" class="block px-4 py-2.5 text-sm text-red-400 hover:bg-red-500/10 transition flex items-center gap-3">
                                <i class="fa-solid fa-right-from-bracket w-4 text-center"></i> Logout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        <div class="mb-8">
            <h1 class="text-2xl md:text-3xl font-bold">Selamat Datang, <?= htmlspecialchars($username) ?>! 👋</h1>
            <p class="text-gray-400 mt-1">Berikut adalah perkembangan proyek digital Anda.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-2 space-y-6">
                <?php if ($project): ?>
                <div class="bg-[#161b22] rounded-2xl p-6 border border-gray-800 shadow-xl relative overflow-hidden">
                    <div class="absolute top-0 right-0 p-4 opacity-10">
                        <i class="fa-solid fa-code text-9xl text-blue-500"></i>
                    </div>
                    
                    <div class="relative z-10">
                        <div class="flex justify-between items-start mb-6">
                            <div>
                                <span class="bg-blue-500/10 text-blue-400 text-xs font-bold px-3 py-1 rounded-full border border-blue-500/20">ACTIVE PROJECT</span>
                                <h2 class="text-2xl font-bold mt-3"><?= htmlspecialchars($project['nama_proyek']) ?></h2>
                                <p class="text-gray-400 text-sm mt-1">Status: <span id="statusDisplay" class="text-yellow-400"><?= htmlspecialchars($project['status_proyek']) ?></span></p>
                            </div>
                            <div class="text-right">
                                <p class="text-gray-400 text-xs text-nowrap">Estimasi Selesai</p>
                                <p class="font-bold text-white"><?= date('d M Y', strtotime($project['deadline'])) ?></p>
                            </div>
                        </div>

                        <div class="mb-2 flex justify-between text-sm font-medium">
                            <span id="labelFaseAktif">Progress (Design UI/UX)</span>
                            <span id="persenFaseAktif"><?= $project['p_design'] ?>%</span>
                        </div>
                        <div class="w-full bg-gray-700 rounded-full h-3 mb-6">
                            <div id="progressBarDinamis" class="bg-gradient-to-r from-blue-600 to-purple-600 h-3 rounded-full shadow-[0_0_10px_rgba(59,130,246,0.5)] transition-all duration-700" style="width: <?= $project['p_design'] ?>%"></div>
                        </div>

                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-6">
                            <?php 
                            $progress_data = [
                                $project['p_design'], 
                                $project['p_frontend'], 
                                $project['p_backend'], 
                                $project['p_deploy']
                            ];

                            foreach($fase_list as $index => $step): 
                                $current_val = $progress_data[$index];
                                $isActiveFase = ($index == $project['fase_aktif']) ? "active" : "";
                                
                                // LOGIKA IKON: Jika sedang Aktif ATAU sudah 100%, tampilkan Check-Circle
                                $isDone = ($current_val == 100);
                                $displayIcon = ($isDone || $isActiveFase == "active") ? "fa-solid fa-circle-check" : "fa-regular fa-circle";
                                $iconColor = ($isDone) ? "text-green-500" : "text-gray-600";
                            ?>
                            <div onclick="updateDashboardView(<?= $index ?>, '<?= $step ?>', <?= $current_val ?>)" 
                                 class="fase-card border border-gray-700 rounded-xl p-4 flex flex-col items-center text-center transition cursor-pointer <?= $isActiveFase ?>"
                                 id="card-fase-<?= $index ?>">
                                
                                <div class="icon-container w-10 h-10 rounded-full flex items-center justify-center mb-3 bg-[#0b0e14] border border-gray-700 transition-all duration-300">
                                    <i class="<?= $displayIcon ?> <?= $iconColor ?> text-xl" id="icon-<?= $index ?>"></i>
                                </div>

                                <span class="text-xs font-bold tracking-tight"><?= $step ?></span>
                                
                                <div class="persen-badge mt-2 px-2 py-0.5 rounded-full bg-blue-500/10 border border-blue-500/30">
                                     <span class="text-[9px] font-mono text-blue-400 font-bold"><?= $current_val ?>%</span>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <?php else: ?>
                <div class="bg-[#161b22] rounded-2xl p-12 border border-dashed border-gray-700 text-center">
                    <div class="bg-blue-500/10 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 text-blue-500">
                        <i class="fa-solid fa-rocket text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Belum ada Proyek Aktif</h3>
                    <p class="text-gray-400 mb-6">Mulai konsultasi proyek pertama Anda dengan tim ahli kami sekarang.</p>
                    <a href="request_project.php" class="bg-blue-600 px-6 py-2 rounded-lg font-bold hover:bg-blue-700 transition inline-block">
                        Mulai Proyek
                    </a>
                </div>
                <?php endif; ?>
            </div>

            <div class="space-y-6">
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-[#161b22] p-4 rounded-xl border border-gray-800 text-center hover:border-blue-500/50 transition">
                        <i class="fa-solid fa-folder-open text-2xl text-purple-500 mb-2"></i>
                        <div class="text-2xl font-bold"><?= $project ? '1' : '0' ?></div>
                        <div class="text-xs text-gray-400">Active Project</div>
                    </div>
                    <div class="bg-[#161b22] p-4 rounded-xl border border-gray-800 text-center hover:border-blue-500/50 transition">
                        <i class="fa-solid fa-file-invoice-dollar text-2xl text-green-500 mb-2"></i>
                        <div class="text-2xl font-bold">0</div>
                        <div class="text-xs text-gray-400">Unpaid Invoice</div>
                    </div>
                </div>

                <div class="bg-[#161b22] rounded-2xl p-6 border border-gray-800">
                    <h3 class="font-bold text-lg mb-4">Quick Actions</h3>
                    <div class="space-y-3">
                        <button class="w-full flex items-center gap-3 p-3 rounded-lg bg-[#0b0e14] hover:bg-gray-800 transition text-sm text-left border border-gray-700">
                            <i class="fa-solid fa-cloud-arrow-up text-blue-500"></i>
                            Upload Aset / File
                        </button>
                        <button class="w-full flex items-center gap-3 p-3 rounded-lg bg-[#0b0e14] hover:bg-gray-800 transition text-sm text-left border border-gray-700">
                            <i class="fa-brands fa-whatsapp text-green-500"></i>
                            Hubungi Developer
                        </button>
                        <button class="w-full flex items-center gap-3 p-3 rounded-lg bg-[#0b0e14] hover:bg-gray-800 transition text-sm text-left border border-gray-700">
                            <i class="fa-solid fa-bug text-red-500"></i>
                            Lapor Bug / Revisi
                        </button>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-blue-900 to-[#161b22] rounded-2xl p-6 border border-blue-500/20 text-center">
                    <p class="text-sm text-blue-200 mb-3">Butuh fitur tambahan?</p>
                    <button class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold py-2 px-4 rounded-lg shadow-lg transition">
                        Upgrade Paket
                    </button>
                </div>
            </div>
        </div>
    </main>

    <script>
        const profileBtn = document.getElementById('profileBtn');
        const dropdownMenu = document.getElementById('dropdownMenu');

        profileBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            if (dropdownMenu.classList.contains('hidden-dropdown')) {
                dropdownMenu.classList.remove('hidden-dropdown');
                dropdownMenu.classList.add('show-dropdown');
            } else {
                dropdownMenu.classList.add('hidden-dropdown');
                dropdownMenu.classList.remove('show-dropdown');
            }
        });

        document.addEventListener('click', (e) => {
            if (!profileBtn.contains(e.target) && !dropdownMenu.contains(e.target)) {
                dropdownMenu.classList.add('hidden-dropdown');
                dropdownMenu.classList.remove('show-dropdown');
            }
        });

        // LOGIKA INTERAKTIF PROGRESS FASE
        function updateDashboardView(index, namaFase, nilaiPersen) {
            document.getElementById('labelFaseAktif').innerText = "Progress (" + namaFase + ")";
            document.getElementById('persenFaseAktif').innerText = nilaiPersen + "%";
            document.getElementById('progressBarDinamis').style.width = nilaiPersen + "%";

            // 1. Reset Semua Card & Icon
            const cards = document.querySelectorAll('.fase-card');
            const icons = document.querySelectorAll('.fase-card i');
            
            cards.forEach((card, i) => {
                card.classList.remove('active');
                // Kembalikan ikon ke lingkaran regular kecuali yang sudah 100%
                if(!icons[i].classList.contains('text-green-500')) {
                    icons[i].className = "fa-regular fa-circle text-gray-600 text-xl";
                }
            });

            // 2. Aktifkan Card yang Dipilih
            const selectedCard = document.getElementById('card-fase-' + index);
            const selectedIcon = document.getElementById('icon-' + index);
            
            selectedCard.classList.add('active');
            
            // Ubah ikon menjadi centang saat dipilih (jika bukan hijau, beri warna biru)
            if(!selectedIcon.classList.contains('text-green-500')) {
                selectedIcon.className = "fa-solid fa-circle-check text-blue-400 text-xl";
            }
        }
    </script>
</body>
</html>