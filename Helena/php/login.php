<?php
session_start();
date_default_timezone_set('Europe/Istanbul');
include '../php/baglan.php';

session_start();
$_SESSION["kullanici_id"] = $user["kullanici_id"];


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM kullanicilar WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['sifre'])) {
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $user["kullanici_id"];
            header("Location: ../sayfalar/musteriPanel.php");
            exit();
        } else {
            echo "<script>alert('Yanlış şifre!'); window.location.href='../sayfalar/musteriGiris.php';</script>";
            exit();
        }
    } else {
        echo "<script>alert('E-posta adresi bulunamadı!'); window.location.href='../sayfalar/musteriGiris.php';</script>";
        exit();
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: musteriGiris.php?error=Geçersiz istek!");
    exit();
}
