<?php
session_start();
date_default_timezone_set('Europe/Istanbul');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "helena";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

function updatePastReservations($conn)
{
    date_default_timezone_set('Europe/Istanbul');
    $current_time = date('H:i:s');
    $today = date('Y-m-d');

    $updateQuery = "
        UPDATE rezervasyonlar 
        SET durum = 'Geçmiş Rezervasyon' 
        WHERE rezervasyon_tarihi <= '$today' 
        AND bitis_saati <= '$current_time'
        AND durum != 'Geçmiş Rezervasyon'
    ";

    if ($conn->query($updateQuery) === TRUE) {
        return true;
    } else {
        error_log("Rezervasyon durumu güncelleme hatası: " . $conn->error);
        return false;
    }
}


updatePastReservations($conn);

$current_time = date('H:i:s');
$today = date('Y-m-d');

$query = "SELECT sandalye_id FROM rezervasyonlar 
          WHERE rezervasyon_tarihi = '$today' AND bitis_saati > '$current_time'";
$result = $conn->query($query);

$doluSandalyeler = [];
while ($row = $result->fetch_assoc()) {
    $doluSandalyeler[] = $row['sandalye_id'];
}

echo json_encode($doluSandalyeler);

$conn->close();