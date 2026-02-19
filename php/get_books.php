<?php
include "baglan.php";

if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

$sql = "SELECT kitap_id, kitap_adi, yazar, tur, adet FROM kitaplar";
$result = $conn->query($sql);

$books = [];

if ($result->num_rows > 0) {
    // Her bir kaydı diziye ekle
    while ($row = $result->fetch_assoc()) {
        $books[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($books);

$conn->close();
?>
