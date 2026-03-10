<?php
$host = "localhost";
$user = "root"; // Sesuaikan dengan user hosting nanti
$pass = "";     // Sesuaikan dengan password hosting nanti
$db   = "wecraft";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>