<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Müşteri Giriş</title>
    <link rel="stylesheet" href="../css/giris.css">
    <style>
        .login-container button {
            margin-top: 5px;
        }

        .login-container button a {
            text-decoration: none;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <img src="../dosyalar/LogoIcon/logo.png" alt="helena">
        <h1>Müşteri Giriş</h1>

        <form id="login-form" method="POST" action="../php/login.php">
            <div class="form-group">
                <label for="username">E-posta</label>
                <input type="email" id="username" name="username" placeholder="E-postanızı girin" required>
            </div>
            <div class="form-group">
                <label for="password">Şifre</label>
                <input type="password" id="password" name="password" placeholder="Şifrenizi girin" required>
            </div>
            <button type="submit">Giriş Yap</button>
        </form>

        <a href="musteriKayit.php"><button>Hesap Oluştur</button></a>
    </div>
</body>

</html>