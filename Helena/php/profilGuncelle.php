<?php
session_start();
date_default_timezone_set('Europe/Istanbul');

include '../php/baglan.php';

if (!isset($_SESSION['username'])) {
    header("Location: musteriGiris.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_SESSION['username'];
    $newEmail = $_POST['updateEmail'];
    $newPhone = $_POST['updatePhone'];
    $newPassword = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    $hashedPassword = null;
    $phoneToUpdate = null;
    $emailToUpdate = null;
    $isPasswordUpdated = false;

    if (!empty($newEmail)) {
        $emailToUpdate = $newEmail;
    }

    if (!empty($newPhone)) {
        $phoneToUpdate = $newPhone;
    }

    if (!empty($newPassword) && $newPassword === $confirmPassword) {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $isPasswordUpdated = true;
    }

    $sql = "UPDATE kullanicilar SET ";
    $params = [];
    $types = '';

    if ($emailToUpdate) {
        $sql .= "email = ?, ";
        $params[] = $emailToUpdate;
        $types .= 's';
    }

    if ($phoneToUpdate) {
        $sql .= "telefon = ?, ";
        $params[] = $phoneToUpdate;
        $types .= 's';
    }

    if ($hashedPassword) {
        $sql .= "sifre = ? ";
        $params[] = $hashedPassword;
        $types .= 's';
    }

    $sql = rtrim($sql, ', ');
    $sql .= " WHERE email = ?";
    $params[] = $username;
    $types .= 's';

    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Hata: " . $conn->error);
    }

    $stmt->bind_param($types, ...$params);

    if ($stmt->execute()) {
        if ($isPasswordUpdated) {
            session_destroy();
            header("Location: ../sayfalar/musteriGiris.php");
            exit();
        } else {
            header("Location: ../sayfalar/musteriProfil.php");
            exit();
        }
    } else {
        echo "Hata: Güncelleme başarısız oldu.";
    }

    $stmt->close();
    $conn->close();
}
