<?php
session_start();
date_default_timezone_set('Europe/Istanbul');

include '../php/baglan.php';

if (!isset($_SESSION['username'])) {
    header("Location: musteriGiris.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kiralanan Kitaplarım</title>
    <link rel="stylesheet" href="../css/kiralamalarım.css">
</head>
<body>
    <div class="container">
        <h1>Kiralanan Kitaplarım</h1>
        <table>
            <thead>
                <tr>
                    <th>Kitap Adı</th>
                    <th>Yazar</th>
                    <th>Tür</th>
                    <th>Alış Tarihi</th>
                    <th>İade Tarihi</th>
                </tr>
            </thead>
            <tbody id="kiralananlar-listesi">
            </tbody>
        </table>
    </div>
    <script>
        async function fetchKiralananlar() {
            try {
                const response = await fetch('../php/get_kiralananlar.php');
                const data = await response.json();
                const list = document.getElementById('kiralananlar-listesi');

                if (data.length === 0) {
                    list.innerHTML = '<tr><td colspan="5">Hiç kiralanan kitap yok.</td></tr>';
                } else {
                    data.forEach(item => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${item.kitap_adi}</td>
                            <td>${item.yazar}</td>
                            <td>${item.tur}</td>
                            <td>${item.rezervasyon_tarihi}</td>
                            <td>${item.iade_tarihi}</td>
                        `;
                        list.appendChild(row);
                    });
                }
            } catch (error) {
                console.error('Veriler yüklenirken hata oluştu:', error);
            }
        }

        // Sayfa yüklendiğinde kitapları çek
        document.addEventListener('DOMContentLoaded', fetchKiralananlar);
    </script>
</body>
</html>
