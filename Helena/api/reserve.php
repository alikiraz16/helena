<?php
session_start();
date_default_timezone_set('Europe/Istanbul');
// Kullanıcı giriş kontrolü
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Kullanıcı giriş yapmamış.']);
    exit();
}
$userId = $_SESSION['user_id'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "helena";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

$data = json_decode(file_get_contents("php://input"), true);

$sandalyeId = $data['sandalyeId'] ?? null;
$reservationDate = $data['reservationDate'] ?? null;
$duration = $data['duration'] ?? null;

if (!$sandalyeId || !$reservationDate || !$duration) {
    echo json_encode(['success' => false, 'message' => 'Eksik rezervasyon bilgileri.']);
    exit();
}

$userCheck = $conn->query("SELECT * FROM kullanicilar WHERE kullanici_id = '$userId'");
if ($userCheck->num_rows === 0) {
    echo json_encode(['success' => false, 'message' => 'Kullanıcı bulunamadı.']);
    exit();
}

$baslangicSaati = date('H:i:s');
$bitisSaati = date('H:i:s', strtotime("+$duration hours"));

$kullaniciKontrol = $conn->query("
    SELECT * FROM rezervasyonlar 
    WHERE kullanici_id = '$userId'
    AND rezervasyon_tarihi = '$reservationDate'
    AND (bitis_saati > '$baslangicSaati' OR bitis_saati IS NULL)
");

if ($kullaniciKontrol->num_rows > 0) {
    echo json_encode(['success' => false, 'message' => 'Devam eden bir rezervasyonunuz var. Rezervasyon süresi tamamlanmadan yeni rezervasyon yapamazsınız.']);
    exit();
}

$doluKontrol = $conn->query("
    SELECT * FROM rezervasyonlar 
    WHERE sandalye_id = '$sandalyeId' 
    AND rezervasyon_tarihi = '$reservationDate'
    AND ('$baslangicSaati' BETWEEN baslangic_saati AND bitis_saati 
        OR '$bitisSaati' BETWEEN baslangic_saati AND bitis_saati)
");

if ($doluKontrol->num_rows > 0) {
    echo json_encode(['success' => false, 'message' => 'Bu saat aralığında sandalye zaten rezerve edilmiş.']);
    exit();
}

$sql = "INSERT INTO rezervasyonlar (kullanici_id, sandalye_id, rezervasyon_tarihi, baslangic_saati, bitis_saati) 
        VALUES ('$userId', '$sandalyeId', '$reservationDate', '$baslangicSaati', '$bitisSaati')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => $conn->error]);
}

$conn->close();
