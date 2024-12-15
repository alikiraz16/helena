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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['siparis_id'])) {
        $siparis_id = $_POST['siparis_id'];

        try {
            $query = "UPDATE siparisler SET siparis_durumu = 1 WHERE siparis_id = :siparis_id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':siparis_id', $siparis_id, PDO::PARAM_INT);
            $stmt->execute();

            echo json_encode(['success' => true]);
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'message' => 'Bir hata oluştu: ' . $e->getMessage()]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Sipariş ID eksik.']);
    }
}
?>
