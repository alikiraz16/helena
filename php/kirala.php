<?php
session_start();
date_default_timezone_set('Europe/Istanbul');


if (!isset($_SESSION['user_id'])) {
    http_response_code(403);
    echo json_encode(["success" => false, "message" => "Kullanıcı oturumu bulunamadı."]);
    exit;
}

include "baglan.php";


$input = json_decode(file_get_contents("php://input"), true);
if (!isset($input['kitap_id'])) {
    http_response_code(400);
    echo json_encode(["success" => false, "message" => "Kitap ID eksik."]);
    exit;
}

$kitap_id = (int)$input['kitap_id'];
$kullanici_id = $_SESSION['user_id'];
$rezervasyon_tarihi = date('Y-m-d'); 
$iade_tarihi = date('Y-m-d', strtotime('+20 days')); 

$kitapKontrol = $conn->prepare("SELECT adet FROM kitaplar WHERE kitap_id = ?");
$kitapKontrol->bind_param("i", $kitap_id);
$kitapKontrol->execute();
$kitapKontrol->bind_result($adet);
$kitapKontrol->fetch();
$kitapKontrol->close();

if ($adet <= 0) {
    echo json_encode(["success" => false, "message" => "Kitap stokta mevcut değil."]);
    exit;
}

$rezervasyonEkle = $conn->prepare("
    INSERT INTO kitap_rezervasyonlar (kullanici_id, kitap_id, rezervasyon_tarihi, iade_tarihi) 
    VALUES (?, ?, ?, ?)
");
$rezervasyonEkle->bind_param("iiss", $kullanici_id, $kitap_id, $rezervasyon_tarihi, $iade_tarihi);

if ($rezervasyonEkle->execute()) {

    $stokGuncelle = $conn->prepare("UPDATE kitaplar SET adet = adet - 1 WHERE kitap_id = ?");
    $stokGuncelle->bind_param("i", $kitap_id);
    $stokGuncelle->execute();
    $stokGuncelle->close();

    echo json_encode(["success" => true, "message" => "Kitap başarıyla kiralandı.", "iade_tarihi" => $iade_tarihi]);
} else {
    echo json_encode(["success" => false, "message" => "Rezervasyon eklenirken bir hata oluştu."]);
}

$rezervasyonEkle->close();
$conn->close();
?>
