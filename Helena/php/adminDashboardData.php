<?php
session_start();

if (!isset($_SESSION['admin_email'])) {
    header("Location: adminGiris.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "helena";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Veritabanına bağlanılamadı: " . $conn->connect_error);
}

$toplamSandalyeQuery = "SELECT COUNT(*) AS toplam_sandalye FROM sandalyeler;";
$toplamSandalyeResult = $conn->query($toplamSandalyeQuery);
$toplamSandalye = $toplamSandalyeResult->fetch_assoc()['toplam_sandalye'];

$doluSandalyeQuery = "SELECT COUNT(*) AS dolu_sandalye FROM rezervasyonlar WHERE durum = 'dolu';";
$doluSandalyeResult = $conn->query($doluSandalyeQuery);
$doluSandalye = $doluSandalyeResult->fetch_assoc()['dolu_sandalye'];

$bosSandalye = $toplamSandalye - $doluSandalye;

$topProductsQuery = "
    SELECT urunler.urun_adi, SUM(siparisler.miktar) AS toplam_satis
    FROM siparisler 
    JOIN urunler ON siparisler.urun_id = urunler.urun_id 
    GROUP BY urunler.urun_id 
    ORDER BY toplam_satis DESC 
    LIMIT 5;";
$topProductsResult = $conn->query($topProductsQuery);

$urunler = [];
$satislar = [];
while ($row = $topProductsResult->fetch_assoc()) {
    $urunler[] = $row['urun_adi'];
    $satislar[] = $row['toplam_satis'];
}

$conn->close();

echo json_encode([
    "doluSandalye" => $doluSandalye,
    "bosSandalye" => $bosSandalye,
    "urunler" => $urunler,
    "satislar" => $satislar
]);
