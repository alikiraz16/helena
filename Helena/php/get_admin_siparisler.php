<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "helena";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Bağlantı hatası: " . $e->getMessage());
}

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

try {
    $query = "SELECT siparis_id, kullanici_id, urun_id, miktar, toplam_fiyat, siparis_zamani, siparis_durumu 
              FROM siparisler";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    $siparisler = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($siparisler)) {
        echo json_encode(['message' => 'Sipariş bulunamadı.']);
    } else {
        echo json_encode($siparisler);
    }
} catch (PDOException $e) {
    echo json_encode(['error' => 'Bir hata oluştu: ' . $e->getMessage()]);
}
