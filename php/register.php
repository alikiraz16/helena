<?php
include '../php/baglan.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);


    $checkEmail = "SELECT * FROM kullanicilar WHERE email = '$username'";
    $result = $conn->query($checkEmail);

    if ($result->num_rows > 0) {
        echo "<script>
                alert('Bu e-posta zaten kayıtlı!');
                window.location.href = '../sayfalar/musteriKayit.php';
              </script>";
    } else {

        $sql = "INSERT INTO kullanicilar (ad, soyad, email, telefon, sifre)
                VALUES ('$name', '$surname', '$username', '$phone', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>
                    alert('Kayıt başarılı! Giriş sayfasına yönlendiriliyorsunuz.');
                    setTimeout(function() {
                        window.location.href = '../sayfalar/musteriGiris.php';
                    }, 1000); // 1000ms = 1 saniye
                  </script>";
        } else {
            echo "Hata: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
} else {
    echo "Form gönderiminde hata var.";
}
