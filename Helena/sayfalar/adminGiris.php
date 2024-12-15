<?php
session_start();
date_default_timezone_set('Europe/Istanbul');

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email === 'admin@gmail.com' && $password === 'admin') {
        $_SESSION['admin_email'] = $email;
        header("Location: adminPanel.php"); 
        exit();
    } else {
        $error_message = "Geçersiz e-posta veya şifre!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Giriş</title>
    <link rel="stylesheet" href="../css/giris.css">
</head>

<body>
    <div class="login-container">
        <img src="../dosyalar/LogoIcon/logo.png" alt="Helena">
        <h1>Admin Giriş</h1>
        <form id="login-form" method="post" action="adminGiris.php">
            <div class="form-group">
                <label for="email">E-posta</label>
                <input type="email" id="email" name="email" placeholder="E-postanızı girin" required>
            </div>
            <div class="form-group">
                <label for="password">Şifre</label>
                <input type="password" id="password" name="password" placeholder="Şifrenizi girin" required>
            </div>
            <button type="submit">Giriş Yap</button>
            <?php if (isset($error_message)): ?>
                <p id="error-message" class="error-message"><?php echo $error_message; ?></p>
            <?php endif; ?>
        </form>
    </div>
</body>

</html>