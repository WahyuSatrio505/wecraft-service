<?php
$order_id = $_GET['id'];
?>

<!DOCTYPE html>
<html>
<body>
    <div style="text-align: center; margin-top: 50px;">
        <h1>Pesanan Berhasil Dibuat!</h1>
        <h3>Order ID: <?php echo $order_id; ?></h3>
        <p>Silakan selesaikan pembayaran simulasi Anda.</p>
        
        <div style="background: #e1f5fe; padding: 20px; display: inline-block; border: 1px solid #81d4fa;">
            <p><strong>Transfer ke Rekening (DUMMY):</strong></p>
            <h2>123-456-7890</h2>
            <p>A/N: WeCraft Simulasi</p>
        </div>

        <p><small>*Ini hanya simulasi, jangan transfer uang beneran ya!</small></p>
        
        <br>
        <a href="index.php">Kembali ke Beranda</a>
    </div>
</body>
</html>