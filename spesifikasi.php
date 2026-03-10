<?php
// Mendapatkan tipe layanan dari URL, contoh: spesifikasi.php?type=landing-page
$type = isset($_GET['type']) ? $_GET['type'] : 'landing-page';

// Data spesifikasi berdasarkan tipe
$services = [
    'landing-page' => [
        'title' => 'Landing Page',
        'desc' => 'Halaman tunggal fokus konversi (Sales Funnel).',
        'specs' => [
            'Performa' => ['Fast Load Speed', 'Mobile Responsive', 'SEO Friendly'],
            'Fitur' => ['Integrasi WhatsApp', 'Formulir Kontak', 'CTA Button Fokus'],
            'Bonus' => ['Free Hosting 1 Thn', 'Domain .com', 'SSL Certificate']
        ]
    ],
    'company-profile' => [
        'title' => 'Company Profile',
        'desc' => 'Wajah digital perusahaan yang profesional.',
        'specs' => [
            'Struktur' => ['Multi Page (Home, About, dll)', 'Professional Layout', 'Blog/News Section'],
            'Fitur' => ['Google Maps', 'Email Bisnis', 'Galeri Foto Proyek'],
            'Bonus' => ['Free Maintenance', 'Set Up Google Business', 'SEO Basic']
        ]
    ],
    'toko-online' => [
        'title' => 'Toko Online',
        'desc' => 'Katalog produk digital dengan sistem otomatis.',
        'specs' => [
            'Sistem' => ['Manajemen Produk', 'Sistem Checkout', 'Hitung Ongkir Otomatis'],
            'Fitur' => ['Payment Gateway', 'Laporan Penjualan', 'Manajemen Stok'],
            'Bonus' => ['Training Admin', 'Optimasi Keamanan', 'WhatsApp Notifikasi']
        ]
    ]
];

// Mengambil data sesuai tipe, jika tidak ada kembali ke landing-page
$data = isset($services[$type]) ? $services[$type] : $services['landing-page'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spesifikasi - <?php echo $data['title']; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #0f172a; color: white; font-family: 'Inter', sans-serif; }
        .glass-card { background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1); }
    </style>
</head>
<body class="p-6 md:p-12">

    <div class="max-w-4xl mx-auto">
        <a href="index.php" class="text-blue-400 hover:underline mb-8 inline-block">Kembali</a>
        
        <header class="mb-12">
            <h1 class="text-4xl font-bold mb-2"><?php echo $data['title']; ?></h1>
            <p class="text-gray-400"><?php echo $data['desc']; ?></p>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php foreach ($data['specs'] as $category => $items): ?>
                <div class="glass-card p-6 rounded-2xl">
                    <h3 class="text-blue-500 font-bold mb-4 italic uppercase text-sm"><?php echo $category; ?></h3>
                    <ul class="space-y-3">
                        <?php foreach ($items as $item): ?>
                            <li class="text-gray-300 flex items-start gap-2 text-sm">
                                <span class="text-blue-400">●</span> <?php echo $item; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="mt-12 text-center p-10 rounded-3xl border border-dashed border-gray-700">
            <h3 class="text-xl mb-4">Tertarik dengan paket <?php echo $data['title']; ?>?</h3>
            <a href="https://wa.me/6288214728116" class="bg-blue-600 hover:bg-blue-700 px-8 py-3 rounded-full font-bold transition">
                Hubungi Kami Sekarang
            </a>
        </div>
    </div>

</body>
</html>