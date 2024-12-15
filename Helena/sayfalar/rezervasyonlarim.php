<?php
session_start();
date_default_timezone_set('Europe/Istanbul');

if (!isset($_SESSION['user_id'])) {
    header('Location: ./musteriGiris.php');
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "helena";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

$userId = $_SESSION['user_id'];

$query = "
    SELECT rezervasyon_tarihi, baslangic_saati, bitis_saati, durum, sandalye_id
    FROM rezervasyonlar 
    WHERE kullanici_id = '$userId'
    ORDER BY rezervasyon_tarihi DESC, baslangic_saati DESC
";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geçmiş Rezervasyonlarım</title>
    <link rel="stylesheet" href="../css/rezervasyonlarim.css">

    <style>
        body {
            display: flex;
            height: 100vh;
            margin: 0;
            background: linear-gradient(to bottom,rgb(227, 209, 170),rgb(227, 217, 199), #e8e1d5, #ece7e2);
            color: #10375C;
            box-sizing: border-box;
        }
    </style>

</head>

<body>
    <div class="container">
        <h1>Rezervasyonlarım</h1>
        <table>
            <thead>
                <tr>
                    <th>Rezervasyon Tarihi</th>
                    <th>Başlangıç Saati</th>
                    <th>Bitiş Saati</th>
                    <th>Sandalye ID</th>
                    <th>Durum</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['rezervasyon_tarihi']; ?></td>
                            <td><?php echo $row['baslangic_saati']; ?></td>
                            <td><?php echo $row['bitis_saati']; ?></td>
                            <td><?php echo $row['sandalye_id']; ?></td>
                            <td><?php echo $row['durum']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">Henüz bir rezervasyon geçmişiniz bulunmamaktadır.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>

</html>
<?php $conn->close(); ?>