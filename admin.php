<?php
session_start();
include 'config.php';

// --- LOGIKA 1: PROTEKSI HALAMAN ---
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$message = "";

// --- LOGIKA 2: MENANGANI REQUEST PROJECT (TERIMA / TOLAK) ---
if (isset($_POST['action'])) {
    $request_id = $_POST['request_id'];
    $action = $_POST['action'];

    if ($action == 'approve') {
        $query_get = "SELECT * FROM project_requests WHERE id = '$request_id'";
        $result_get = mysqli_query($conn, $query_get);
        $data_req = mysqli_fetch_assoc($result_get);

        if ($data_req) {
            $user_id = $data_req['user_id'];
            $judul = $data_req['judul_proyek'];
            $deadline = date('Y-m-d', strtotime('+30 days'));
            
            // OPSI 2: Saat insert, kolom p_design dll otomatis 0 karena DEFAULT di DB
            $query_insert = "INSERT INTO projects (user_id, nama_proyek, status_proyek, deadline, fase_aktif) 
                             VALUES ('$user_id', '$judul', 'Design UI/UX', '$deadline', 0)";
            
            if (mysqli_query($conn, $query_insert)) {
                mysqli_query($conn, "UPDATE project_requests SET status = 'Approved' WHERE id = '$request_id'");
                $message = "Proyek berhasil disetujui & aktif!";
            }
        }
    } elseif ($action == 'reject') {
        mysqli_query($conn, "UPDATE project_requests SET status = 'Rejected' WHERE id = '$request_id'");
        $message = "Permintaan proyek ditolak.";
    }
}

// --- LOGIKA 3: MENANGANI UPDATE PROGRESS (OPSI 2: KOLOM TERPISAH) ---
if (isset($_POST['update_proyek'])) {
    $p_id = $_POST['project_id'];
    $input_fase = (int)$_POST['fase_aktif']; 
    $final_progress = (int)$_POST['final_progress']; 

    // Mapping fase ke kolom database
    $columns = ["p_design", "p_frontend", "p_backend", "p_deploy"];
    $target_col = $columns[$input_fase];

    $fase_list_names = ["Design UI/UX", "Frontend Dev", "Backend Integration", "Server Deploy"];
    $status_text = $fase_list_names[$input_fase];

    if ($final_progress == 100) {
        $status_text = $status_text . " (Selesai)";
    }

    // UPDATE: Merubah kolom spesifik fase dan kolom fase_aktif
    $q_update = "UPDATE projects SET 
                $target_col = '$final_progress', 
                fase_aktif = '$input_fase', 
                status_proyek = '$status_text' 
                WHERE id = '$p_id'";
    
    if (mysqli_query($conn, $q_update)) {
        $message = "Update Berhasil: $status_text ($final_progress%)";
    }
}

// --- LOGIKA 4: AMBIL DATA REQUEST ---
$query_list = "SELECT r.*, u.username, u.email 
               FROM project_requests r 
               JOIN users u ON r.user_id = u.id 
               ORDER BY r.created_at DESC";
$requests = mysqli_query($conn, $query_list);

// --- LOGIKA 5: AMBIL DATA PROYEK AKTIF ---
$query_active = "SELECT p.*, u.username FROM projects p JOIN users u ON p.user_id = u.id ORDER BY p.id DESC";
$active_projects = mysqli_query($conn, $query_active);

$fase_options = ["Design UI/UX", "Frontend Dev", "Backend Integration", "Server Deploy"];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Command Center - WeCraft</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .modal { transition: opacity 0.25s ease; }
        body.modal-active { overflow: hidden; }
        .glass-effect { background: rgba(22, 27, 34, 0.9); backdrop-filter: blur(10px); }
        .progress-bar { transition: width 0.3s ease-in-out; }
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: #0d1117; }
        ::-webkit-scrollbar-thumb { background: #30363d; border-radius: 3px; }
    </style>
</head>
<body class="bg-[#0b0e14] text-white min-h-screen font-sans text-sm">

    <?php
    $project_map = [];
    while($p = mysqli_fetch_assoc($active_projects)) {
        $project_map[$p['user_id']] = $p;
    }
    ?>

    <?php if($message): ?>
    <div id="toastNotification" class="fixed bottom-6 right-6 z-[100] transform transition-all duration-700 translate-y-20 opacity-0">
        <div class="glass-effect border border-green-500/30 text-white px-4 py-3 rounded-lg shadow-[0_0_20px_rgba(34,197,94,0.1)] flex items-center gap-3 min-w-[280px]">
            <div class="bg-gradient-to-br from-green-500 to-emerald-700 w-8 h-8 rounded flex items-center justify-center shadow-lg shadow-green-900/50">
                <i class="fa-solid fa-check text-white text-xs"></i>
            </div>
            <div class="flex-1">
                <h4 class="font-bold text-xs tracking-wide text-green-400">Berhasil!</h4>
                <p class="text-[10px] text-gray-300 leading-snug opacity-80"><?= $message ?></p>
            </div>
            <button onclick="hideToast()" class="text-gray-500 hover:text-white transition p-1">
                <i class="fa-solid fa-xmark text-sm"></i>
            </button>
        </div>
    </div>
    <?php endif; ?>

    <nav class="bg-[#161b22] border-b border-gray-800 px-6 py-3 flex justify-between items-center sticky top-0 z-50">
        <div class="flex items-center gap-3">
            <div class="bg-red-600 w-8 h-8 rounded flex items-center justify-center font-bold text-lg shadow-red-500/20 shadow-lg">A</div>
            <div>
                <h1 class="font-bold text-sm tracking-wide">WeCraft <span class="text-red-500">Admin</span></h1>
                <p class="text-[10px] text-gray-500">Command Center</p>
            </div>
        </div>
        <div class="flex items-center gap-4">
            <a href="dashboard.php" class="text-xs text-gray-400 hover:text-white transition">Lihat Client</a>
            <a href="logout.php" class="bg-red-500/10 text-red-500 px-3 py-1.5 rounded text-xs font-bold hover:bg-red-500 hover:text-white transition">Logout</a>
        </div>
    </nav>

    <main class="p-4 max-w-7xl mx-auto space-y-4">
        <div>
            <div class="flex justify-between items-end mb-2 px-1">
                <h2 class="text-lg font-bold border-l-4 border-blue-500 pl-3 leading-none">Daftar Proyek</h2>
                <span class="text-[10px] text-gray-500 italic">Klik nama klien untuk update</span>
            </div>
            
            <div class="bg-[#161b22] rounded-xl border border-gray-800 overflow-hidden shadow-xl">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs text-gray-400">
                        <thead class="bg-[#0d1117] text-gray-200 uppercase font-bold text-[10px] tracking-wider">
                            <tr>
                                <th class="px-4 py-2 w-1/4">Klien</th>
                                <th class="px-4 py-2 w-1/4">Proyek</th>
                                <th class="px-4 py-2 w-1/3">Timeline Independen</th> 
                                <th class="px-4 py-2 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-800">
                            <?php while($row = mysqli_fetch_assoc($requests)): 
                                $uid = $row['user_id'];
                                $is_active = isset($project_map[$uid]);
                                $proj_data = $is_active ? $project_map[$uid] : null;
                            ?>
                            <tr class="transition hover:bg-[#1c2128]">
                                <td class="px-4 py-3 align-top">
                                    <?php if($row['status'] == 'Approved' && $proj_data): ?>
                                        <div onclick="openModal('<?= $proj_data['id'] ?>', '<?= htmlspecialchars($row['username']) ?>', '<?= htmlspecialchars($proj_data['nama_proyek']) ?>', '<?= $proj_data['fase_aktif'] ?>', '<?= $proj_data['p_design'] ?>,<?= $proj_data['p_frontend'] ?>,<?= $proj_data['p_backend'] ?>,<?= $proj_data['p_deploy'] ?>')" 
                                             class="cursor-pointer group">
                                            <div class="flex items-center gap-2">
                                                <div class="w-7 h-7 rounded-full bg-blue-500/20 text-blue-500 flex items-center justify-center font-bold text-xs">
                                                    <?= substr($row['username'], 0, 1) ?>
                                                </div>
                                                <div>
                                                    <div class="font-bold text-blue-400 group-hover:text-blue-300 transition">
                                                        <?= htmlspecialchars($row['username']) ?>
                                                        <i class="fa-solid fa-pen-to-square text-[10px] ml-1 opacity-50 group-hover:opacity-100"></i>
                                                    </div>
                                                    <div class="text-[10px] text-gray-500"><?= htmlspecialchars($row['email']) ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <div class="flex items-center gap-2">
                                            <div class="w-7 h-7 rounded-full bg-gray-700 text-gray-400 flex items-center justify-center font-bold text-xs">?</div>
                                            <div>
                                                <div class="font-bold text-white"><?= htmlspecialchars($row['username']) ?></div>
                                                <div class="text-[10px] text-gray-500"><?= htmlspecialchars($row['email']) ?></div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </td>

                                <td class="px-4 py-3 align-top">
                                    <div class="font-bold text-white mb-0.5 truncate max-w-[150px]"><?= htmlspecialchars($row['judul_proyek']) ?></div>
                                    <div class="text-[10px] bg-gray-700/50 border border-gray-600 px-1.5 rounded text-gray-300 inline-block"><?= htmlspecialchars($row['budget_range']) ?></div>
                                </td>

                                <td class="px-4 py-3 align-top">
                                    <?php if($row['status'] == 'Approved' && $proj_data): ?>
                                        <div class="space-y-1"> 
                                            <?php 
                                            $prog_array = [$proj_data['p_design'], $proj_data['p_frontend'], $proj_data['p_backend'], $proj_data['p_deploy']];
                                            foreach($fase_options as $index => $label): 
                                                $val = $prog_array[$index];
                                                $icon = ($val == 100) ? "fa-circle-check text-green-500" : (($val > 0) ? "fa-spinner fa-spin text-blue-500" : "fa-circle text-gray-800");
                                                $bar_bg = ($val == 100) ? "bg-green-500" : "bg-blue-500";
                                            ?>
                                            <div class="flex items-center gap-2">
                                                <div class="w-4 text-center"><i class="fa-solid <?= $icon ?> text-[10px]"></i></div>
                                                <div class="w-24 truncate text-[10px] <?= ($val > 0) ? 'text-white font-bold' : 'text-gray-600' ?>"><?= $label ?></div>
                                                <div class="flex-1 h-1 bg-gray-800 rounded-full overflow-hidden">
                                                    <div class="<?= $bar_bg ?> h-full rounded-full progress-bar" style="width: <?= $val ?>%"></div>
                                                </div>
                                                <div class="w-8 text-right text-[9px] font-mono text-gray-500"><?= $val ?>%</div>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php else: ?>
                                        <span class="text-gray-600 text-[10px] italic">Menunggu persetujuan...</span>
                                    <?php endif; ?>
                                </td>

                                <td class="px-4 py-3 text-center align-middle">
                                    <?php if($row['status'] == 'Pending'): ?>
                                        <div class="flex gap-1 justify-center">
                                            <form method="POST">
                                                <input type="hidden" name="request_id" value="<?= $row['id'] ?>"><input type="hidden" name="action" value="approve">
                                                <button class="w-7 h-7 rounded bg-green-600 hover:bg-green-500 text-white flex items-center justify-center transition"><i class="fa-solid fa-check"></i></button>
                                            </form>
                                            <form method="POST">
                                                <input type="hidden" name="request_id" value="<?= $row['id'] ?>"><input type="hidden" name="action" value="reject">
                                                <button class="w-7 h-7 rounded bg-red-600/20 border border-red-600/50 text-red-500 hover:text-white flex items-center justify-center transition"><i class="fa-solid fa-xmark"></i></button>
                                            </form>
                                        </div>
                                    <?php else: ?>
                                        <span class="px-2 py-0.5 rounded text-[10px] font-bold border <?= ($row['status'] == 'Approved' ? 'bg-green-500/10 text-green-500 border-green-500/20' : 'bg-red-500/10 text-red-500 border-red-500/20') ?>">
                                            <?= $is_active ? $proj_data['status_proyek'] : $row['status'] ?>
                                        </span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <div id="manageModal" class="modal opacity-0 pointer-events-none fixed inset-0 z-50 flex items-center justify-center">
        <div class="absolute inset-0 bg-black/80 backdrop-blur-sm transition-opacity" onclick="closeModal()"></div>
        <div class="relative bg-[#161b22] w-full max-w-sm mx-4 rounded-xl shadow-2xl border border-gray-700 transform scale-95 transition-transform duration-300" id="modalContainer">
            <div class="flex justify-between items-center px-5 py-4 border-b border-gray-700">
                <div>
                    <h3 class="text-sm font-bold text-white">Update Progress</h3>
                    <p id="modalClientName" class="text-xs text-blue-400 font-bold"></p>
                </div>
                <button onclick="closeModal()" class="text-gray-400 hover:text-white"><i class="fa-solid fa-xmark text-lg"></i></button>
            </div>

            <form method="POST" class="px-5 py-4 space-y-4">
                <input type="hidden" name="project_id" id="modalProjectId">
                <input type="hidden" name="final_progress" id="hiddenFinalProgress" value="0">

                <div class="bg-[#0d1117] p-3 rounded-lg border border-gray-800 text-center">
                    <p id="modalProjectName" class="text-white font-bold text-xs mb-2 truncate"></p>
                    <div class="bg-gray-800/40 rounded p-2">
                        <div class="flex justify-between items-end mb-1">
                            <span class="text-gray-500 text-[10px]">Baseline: <span id="modalCurrentProgress">0%</span></span>
                            <span id="modalNewProgress" class="text-blue-400 font-bold text-xl">0%</span>
                        </div>
                        <div class="h-1.5 w-full bg-gray-700 rounded-full overflow-hidden">
                            <div id="previewBar" class="bg-blue-500 h-full progress-bar"></div>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-[10px] text-gray-400 font-bold mb-1 uppercase">Pilih Fase</label>
                    <select name="fase_aktif" id="modalFase" class="w-full bg-[#0b0e14] border border-gray-600 text-white text-xs rounded-lg p-2" onchange="syncFase()">
                        <option value="0">Design UI/UX</option>
                        <option value="1">Frontend Dev</option>
                        <option value="2">Backend Integration</option>
                        <option value="3">Server Deploy</option>
                    </select>
                </div>

                <div>
                    <div class="grid grid-cols-2 gap-2">
                        <div class="flex gap-1">
                            <button type="button" onclick="adjustProgress(-10)" class="flex-1 bg-red-500/10 border border-red-500/30 text-red-500 py-2 rounded text-xs font-bold">-10%</button>
                            <button type="button" onclick="adjustProgress(-5)" class="flex-1 bg-red-500/10 border border-red-500/30 text-red-500 py-2 rounded text-xs font-bold">-5%</button>
                        </div>
                        <div class="flex gap-1">
                            <button type="button" onclick="adjustProgress(5)" class="flex-1 bg-green-500/10 border border-green-500/30 text-green-500 py-2 rounded text-xs font-bold">+5%</button>
                            <button type="button" onclick="adjustProgress(10)" class="flex-1 bg-green-500/10 border border-green-500/30 text-green-500 py-2 rounded text-xs font-bold">+10%</button>
                        </div>
                    </div>
                </div>
                
                <button type="submit" name="update_proyek" class="w-full bg-blue-600 hover:bg-blue-500 text-white font-bold py-2 rounded-lg text-sm transition">
                    Simpan Perubahan
                </button>
            </form>
        </div>
    </div>

    <script>
        let historyProg = [0,0,0,0]; // Menyimpan progress Design, Frontend, Backend, Deploy
        const modal = document.getElementById('manageModal');
        const modalContainer = document.getElementById('modalContainer');

        function openModal(id, client, project, fase, allProgress) {
            document.getElementById('modalProjectId').value = id;
            document.getElementById('modalClientName').innerText = client;
            document.getElementById('modalProjectName').innerText = project;
            document.getElementById('modalFase').value = fase;
            
            // Konversi string "10,0,0,0" menjadi array [10, 0, 0, 0]
            historyProg = allProgress.split(',').map(Number);
            
            syncFase();

            modal.classList.remove('opacity-0', 'pointer-events-none');
            document.body.classList.add('modal-active');
            setTimeout(() => { modalContainer.classList.remove('scale-95'); modalContainer.classList.add('scale-100'); }, 10);
        }

        function closeModal() {
            modalContainer.classList.add('scale-95');
            setTimeout(() => { modal.classList.add('opacity-0', 'pointer-events-none'); document.body.classList.remove('modal-active'); }, 300);
        }

        function syncFase() {
            let f = document.getElementById('modalFase').value;
            let val = historyProg[f];
            
            document.getElementById('modalCurrentProgress').innerText = val + "%";
            document.getElementById('modalNewProgress').innerText = val + "%";
            document.getElementById('previewBar').style.width = val + "%";
            document.getElementById('hiddenFinalProgress').value = val;
            
            document.getElementById('previewBar').className = (val === 100) ? "h-full bg-green-500 progress-bar" : "h-full bg-blue-500 progress-bar";
        }

        function adjustProgress(amt) {
            let f = document.getElementById('modalFase').value;
            let current = historyProg[f];
            let newVal = current + amt;
            
            if(newVal > 100) newVal = 100;
            if(newVal < 0) newVal = 0;
            
            historyProg[f] = newVal;
            syncFase();
        }

        function hideToast() {
            const t = document.getElementById('toastNotification');
            if(t) { t.classList.add('translate-y-20', 'opacity-0'); setTimeout(() => { t.style.display = 'none'; }, 700); }
        }
    </script>
</body>
</html>