<?php
// Tangkap data paket dari URL
// Pastikan tidak ada celah XSS sederhana dengan htmlspecialchars saat output nanti
$paket = isset($_GET['paket']) ? $_GET['paket'] : 'Paket Default';
$harga = isset($_GET['harga']) ? $_GET['harga'] : 0;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - WeCraft</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* Reset & Base Styles */
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        /* Container dengan Animasi Masuk */
        .checkout-card {
            background: #ffffff;
            width: 100%;
            max-width: 480px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            overflow: hidden;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.8s forwards;
        }

        /* Header Gaya */
        .card-header {
            background: #007bff; /* Bisa diganti warna brand WeCraft */
            background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
            color: white;
            padding: 25px;
            text-align: center;
        }
        .card-header h2 { font-size: 24px; font-weight: 600; margin-bottom: 5px; }
        .card-header p { font-size: 14px; opacity: 0.9; }

        /* Body Kartu */
        .card-body { padding: 30px; }

        /* Section Ringkasan Paket */
        .order-summary {
            background: #f8f9fa;
            border-left: 5px solid #007bff;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .paket-info h3 { font-size: 16px; color: #333; font-weight: 700; }
        .paket-info span { font-size: 13px; color: #666; }
        .price-tag { font-size: 18px; color: #007bff; font-weight: bold; }

        /* Form Styling */
        .form-group { margin-bottom: 20px; }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #444;
            font-size: 14px;
        }
        
        /* Input & Select yang Modern */
        input[type="text"], select {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e1e1e1;
            border-radius: 10px;
            font-family: inherit;
            font-size: 14px;
            transition: all 0.3s ease;
            background-color: #fff;
        }
        
        input[type="text"]:focus, select:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 0 3px rgba(0,123,255,0.1);
        }

        /* Tombol Bayar Keren */
        .btn-bayar {
            display: block;
            width: 100%;
            padding: 15px;
            background: #007bff;
            color: white;
            font-weight: 600;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
            transition: transform 0.2s, background 0.3s, box-shadow 0.3s;
            box-shadow: 0 5px 15px rgba(0,123,255,0.3);
        }

        .btn-bayar:hover {
            background: #0056b3;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0,123,255,0.4);
        }

        .btn-bayar:active {
            transform: scale(0.98);
        }

        /* Animasi Keyframes */
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>

<div class="checkout-card">
    <div class="card-header">
        <h2>Konfirmasi Pesanan</h2>
        <p>Lengkapi data untuk memproses pesananmu</p>
    </div>

    <div class="card-body">
        
        <div class="order-summary">
            <div class="paket-info">
                <span>Paket Dipilih:</span>
                <h3><?php echo htmlspecialchars($paket); ?></h3>
            </div>
            <div class="price-tag">
                Rp <?php echo number_format($harga, 0, ',', '.'); ?>
            </div>
        </div>

        <form action="proses_bayar.php" method="POST">
            <input type="hidden" name="paket" value="<?php echo htmlspecialchars($paket); ?>">
            <input type="hidden" name="harga" value="<?php echo htmlspecialchars($harga); ?>">

            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" id="nama" name="nama_user" placeholder="Contoh: Wahyu Eucalyptus" required autocomplete="off">
            </div>

            <div class="form-group">
                <label for="metode">Pilih Metode Pembayaran</label>
                <select id="metode" name="metode" required>
                    <option value="" disabled selected>-- Pilih Salah Satu --</option>
                    <option value="bca_dummy">🏦 Transfer Bank BCA (Simulasi)</option>
                    <option value="qris_dummy">📱 QRIS Instan (Simulasi)</option>
                    <option value="cod_dummy">⏳ Bayar Nanti (Invoice)</option>
                </select>
            </div>

            <button type="submit" class="btn-bayar" id="payBtn">
                Bayar Sekarang &rarr;
            </button>
        </form>
    </div>
</div>

<script>
    const form = document.querySelector('form');
    const btn = document.getElementById('payBtn');

    form.addEventListener('submit', function() {
        btn.innerHTML = 'Memproses... ⏳';
        btn.style.opacity = '0.7';
        btn.style.cursor = 'not-allowed';
        // Biarkan form submit secara natural
    });
</script>

</body>
</html>