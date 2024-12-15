<?php
session_start();
date_default_timezone_set('Europe/Istanbul');

include '../php/baglan.php';

if (!isset($_SESSION['username'])) {
    header("Location: musteriGiris.php");
    exit();
}

$username = $_SESSION['username'];

$sql = "SELECT * FROM kullanicilar WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    header("Location: musteriGiris.php");
    exit();
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Ayarları</title>
    <link rel="stylesheet" href="../css/musteriProfil.css">
</head>

<body>
    <div class="profile-container">
        <h1>Profil Ayarları</h1>
        <form id="profile-form" method="POST" action="../php/profilGuncelle.php">
            <div class="form-group">
                <label for="full-name">Ad ve Soyad</label>
                <input type="text" id="full-name" name="fullName" value="<?php echo isset($user['ad']) && isset($user['soyad']) ? $user['ad'] . ' ' . $user['soyad'] : ''; ?>" readonly>
            </div>

            <div class="form-group">
                <label for="email">Güncel E-posta</label>
                <input type="email" id="email" name="email" value="<?php echo isset($user['email']) ? $user['email'] : ''; ?>" readonly>
            </div>

            <div class="form-group">
                <label for="update-email">Yeni E-posta</label>
                <input type="email" id="update-email" name="updateEmail" placeholder="Yeni e-posta adresinizi girin">
            </div>

            <div class="form-group">
                <label for="phone">Güncel Telefon Numarası</label>
                <input type="tel" id="phone" name="phone" value="<?php echo isset($user['telefon']) ? $user['telefon'] : ''; ?>" readonly>
            </div>

            <div class="form-group">
                <label for="update-phone">Yeni Telefon Numarası</label>
                <input type="tel" id="update-phone" name="updatePhone" placeholder="+90 555 555 55 55">
            </div>

            <div class="form-group">
                <label for="password">Yeni Şifre</label>
                <input type="password" id="password" name="password" placeholder="Yeni şifrenizi girin">
            </div>

            <div class="form-group">
                <label for="confirm-password">Şifreyi Onayla</label>
                <input type="password" id="confirm-password" name="confirmPassword" placeholder="Şifrenizi tekrar girin">
            </div>

            <div class="form-group">
                <button type="submit">Bilgileri Kaydet</button>
            </div>
        </form>
    </div>
    <script src="../js/musteriProfil.js"></script>
</body>

</html>