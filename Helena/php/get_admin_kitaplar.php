<?php
$servername = "localhost"; 
$username = "root";       
$password = "";            
$dbname = "helena";        

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Bağlantı başarısız: " . $conn->connect_error);
}

$sql = "
    SELECT 
        kullanicilar.ad, 
        kitap_rezervasyonlar.kitap_rezervasyon_id,
        kitap_rezervasyonlar.kullanici_id,
        kitap_rezervasyonlar.kitap_id,
        kitap_rezervasyonlar.rezervasyon_tarihi,
        kitap_rezervasyonlar.iade_tarihi,
        kitaplar.kitap_adi
    FROM 
        kitap_rezervasyonlar
    JOIN 
        kullanicilar ON kullanicilar.kullanici_id = kitap_rezervasyonlar.kullanici_id
    JOIN 
        kitaplar ON kitap_rezervasyonlar.kitap_id = kitaplar.kitap_id
"; 

$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($data);

$conn->close();
?>
