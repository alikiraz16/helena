<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);


require 'baglan.php';

session_start();

header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["success" => false, "message" => "Kullanıcı oturumu bulunamadı."]);
    exit;
}

$kullanici_id = $_SESSION['user_id'];


$sepet = json_decode(file_get_contents("php://input"), true);

if (!is_array($sepet)) {
    echo json_encode(["success" => false, "message" => "Geçersiz veri formatı.", "error" => "Sepet değeri bir dizi değil."]);
    exit;
}





try {

    foreach ($sepet as $urun) {
        if (!isset($urun['urun_id'], $urun['miktar'], $urun['toplam_fiyat'])) {
            throw new Exception("Eksik veri: " . json_encode($urun));
        }

        $urun_id = (int)$urun['urun_id'];
        $miktar = (int)$urun['miktar'];
        $toplam_fiyat = (float)$urun['toplam_fiyat'];

        $stmt = $conn->prepare("INSERT INTO siparisler (kullanici_id, urun_id, miktar, toplam_fiyat, siparis_durumu) VALUES (?, ?, ?, ?, 0)");
        if (!$stmt) {
            throw new Exception("Veritabanı hatası: " . $conn->error);
        }

        $stmt->bind_param("iiid", $kullanici_id, $urun_id, $miktar, $toplam_fiyat);
        $stmt->execute();
    }

    $conn->commit();
    echo json_encode(["success" => true, "message" => "Sipariş başarıyla kaydedildi."]);
} catch (Exception $e) {
    $conn->rollBack();
    echo json_encode(["success" => false, "message" => "Sipariş oluşturulamadı.", "error" => $e->getMessage()]);
    exit;
}

?>
