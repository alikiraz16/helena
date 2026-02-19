<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt Ekranı</title>
    <link rel="stylesheet" href="../css/giris.css">
    <style>
        .form-group {
            margin-bottom: 4px;
        }

        .login-container button {
            margin-top: 10px;
        }

        #button {
            background-color: #b68401;
            color: white;
            border: none;
            padding: 0.7rem;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 1rem;
        }

        #button:hover {
            background-color: #8a6800;
            transition-duration: 0.5s;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <img src="../dosyalar/LogoIcon/logo.png" alt="helena">
        <h1>Müşteri Kayıt</h1>
        <form id="login-form" method="POST" action="../php/register.php">
            <div class="form-group">
                <label for="name">Ad</label>
                <input type="text" id="name" name="name" placeholder="Adınızı girin" required>
            </div>
            <div class="form-group">
                <label for="surname">Soyad</label>
                <input type="text" id="surname" name="surname" placeholder="Soyadınızı girin" required>
            </div>
            <div class="form-group">
                <label for="phone">Telefon</label>
                <input type="tel" id="phone" name="phone" placeholder="Numaranızı girin" required>
            </div>
            <div class="form-group">
                <label for="username">E-posta</label>
                <input type="email" id="username" name="username" placeholder="E-postanızı girin" required>
            </div>
            <div class="form-group">
                <label for="password">Şifre</label>
                <input type="password" id="password" name="password" placeholder="Şifrenizi girin" required>
            </div>
            <input type="submit" id="button" value="Kayıt Ol"></input>
        </form>
    </div>
</body>

</html>