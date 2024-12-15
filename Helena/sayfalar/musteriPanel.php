<?php
session_start();
date_default_timezone_set('Europe/Istanbul');


if (!isset($_SESSION['username'])) {
    header("Location: musteriGiris.php"); 
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anasayfa</title>
    <link rel="stylesheet" href="../css/musteriPanel.css">

</head>

<body>

    <header>
        <div class="navbar">
            <div class="logo-islemler">
                <div class="logo">
                    <a href=""><img src="../dosyalar/LogoIcon/logo.png" alt="Helena"></a>
                </div>
                <div class="islemler">
                    <a href="#">Anasayfa</a>
                    <a href="siparisVer.php">Sipariş Ver</a>
                    <a href="rezervasyonYap.php">Rezervasyon Yap</a>
                    <a href="kitapkirala.php">Kitap Kirala</a>
                </div>
            </div>
            <div class="account-menu">
                <button class="account-button">Hesabım</button>
                <div class="dropdown-menu">
                    <a href="musteriProfil.php" class="menu-item">Profil</a>
                    <a href="siparislerim.php" class="menu-item">Siparişlerim</a>
                    <a href="rezervasyonlarim.php" class="menu-item">Rezervasyonlarım</a>
                    <a href="kiralamalarim.php" class="menu-item">Kiralamalarım</a>
                    <a href="../php/musteriLogout.php" class="menu-item">Çıkış Yap</a>
                </div>
            </div>
        </div>
    </header>
    <main>
        <section id="welcome">
            <div class="welcome-logo-text">
                <h1>Helena Cafe&Kütüphane</h1>
                <h2>Yeni Nesil Kütüphane Cafe</h2>
                <img src="../dosyalar/LogoIcon/logo.png" alt="Helena">
            </div>
            <div class="social-media">
                <a href="https://www.facebook.com/helenacafekutuphane/" target="_blank">
                    <img src="../dosyalar/LogoIcon/facebook-brands-solid.svg" id="facebook">
                </a>
                <a href="https://www.instagram.com/helenacafekutuphane/" target="_blank">
                    <img src="../dosyalar/LogoIcon/instagram-brands-solid.svg" id="instagram">
                </a>
            </div>
        </section>
    </main>
    <footer>
        <h3>İletişim</h3>
        <p>Telefon: <a href="tel:+905011021946" style="color: #ffce45; text-decoration: none;">0501 102 19 46</a></p>
        <p>Adres: <a href="https://maps.app.goo.gl/48QJct4EwZsC7iaK9" target="_blank">Atatürk, 63. Sk. No: 52/1, 35390 Buca/İzmir</a></p>
    </footer>

    <script src="../js/musteriPanel.js"></script>
</body>

</html>