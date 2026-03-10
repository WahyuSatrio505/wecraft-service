<?php
// Pastikan ID ditangkap dengan aman
$order_id = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '-';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Berhasil - WeCraft</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body {
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            /* Background Image Keren dari Unsplash */
            background: url('https://images.unsplash.com/photo-1497215728101-856f4ea42174?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80') no-repeat center center/cover;
            position: relative;
        }

        /* Lapisan Gelap di atas Foto biar Teks Terbaca */
        body::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0, 0, 0, 0.6); /* Hitam transparan 60% */
            z-index: 0;
        }

        .success-card {
            position: relative;
            z-index: 1;
            background: rgba(255, 255, 255, 0.95); /* Putih agak transparan dikit */
            backdrop-filter: blur(10px); /* Efek kaca buram */
            width: 90%;
            max-width: 450px;
            padding: 40px 30px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
            animation: popUp 0.6s cubic-bezier(0.68, -0.55, 0.27, 1.55) forwards;
        }

        /* Animasi Icon Centang */
        .icon-container {
            width: 80px;
            height: 80px;
            background: #d4edda;
            color: #28a745;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 40px;
            box-shadow: 0 0 0 10px rgba(40, 167, 69, 0.1);
        }

        h1 { color: #333; font-size: 24px; margin-bottom: 5px; }
        p.subtitle { color: #666; font-size: 14px; margin-bottom: 25px; }

        .invoice-box {
            background: #f8f9fa;
            border: 2px dashed #dde2e6;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 25px;
        }

        .invoice-box h3 { color: #007bff; font-size: 20px; margin-bottom: 5px; letter-spacing: 1px; }
        .invoice-box span { display: block; font-size: 12px; color: #888; text-transform: uppercase; letter-spacing: 1px; }

        .payment-instruction {
            text-align: left;
            margin-bottom: 20px;
        }
        .payment-instruction p { font-size: 13px; color: #555; margin-bottom: 8px; }
        .dummy-rek {
            background: #e3f2fd;
            color: #0d47a1;
            padding: 10px;
            border-radius: 6px;
            font-weight: bold;
            font-size: 18px;
            text-align: center;
            letter-spacing: 2px;
        }

        .btn-home {
            display: inline-block;
            background: #333;
            color: white;
            text-decoration: none;
            padding: 12px 30px;
            border-radius: 50px;
            font-size: 14px;
            transition: all 0.3s;
        }
        .btn-home:hover { background: #000; transform: translateY(-3px); box-shadow: 0 5px 15px rgba(0,0,0,0.2); }

        /* Animasi Masuk */
        @keyframes popUp {
            from { opacity: 0; transform: scale(0.8) translateY(20px); }
            to { opacity: 1; transform: scale(1) translateY(0); }
        }
    </style>
</head>
<body>

    <div class="success-card">
        <div class="icon-container">
            ✓
        </div>

        <h1>Pesanan Berhasil!</h1>
        <p class="subtitle">Terima kasih, langkah selanjutnya adalah pembayaran.</p>

        <div class="invoice-box">
            <span>Order ID Anda</span>
            <h3><?php echo $order_id; ?></h3>
        </div>

        <div class="payment-instruction">
            <p>Silakan transfer (Simulasi) ke nomor berikut:</p>
            <div class="dummy-rek">
                123-456-7890
            </div>
            <p style="text-align: center; margin-top: 5px; font-size: 11px; color: #999;">
                A/N: WeCraft Official (Bank Dummy)
            </p>
        </div>

        <a href="index.php" class="btn-home">Kembali ke Beranda</a>
    </div>

</body>
</html>