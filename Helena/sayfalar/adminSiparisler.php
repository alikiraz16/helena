<?php
session_start();

if (!isset($_SESSION['admin_email'])) {
    header("Location: adminGiris.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siparişler</title>
    <link rel="stylesheet" href="../css/adminPanel.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            color: #10375C;
        }

        .logo-container {
            display: flex;
            align-items: center;
            position: absolute;
            top: 10px;
            left: 10px;
        }

        .logo-container a {
            display: block;
        }

        .logo {
            height: 50px;
            cursor: pointer;
        }

        .d-flex {
            display: flex;
            flex-direction: column;
            text-align: center;
            color: #10375C;
            margin-top: 80px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #10375C;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="logo-container">
        <a href="adminPanel.php">
            <img src="../dosyalar/LogoIcon/logo.png" alt="Helena Logo" class="logo" style="width: 80px; height:auto" />
        </a>
    </div>
    <div class="d-flex justify-content-center align-items-center" style="margin-top: 0px">
        <div style="width: 100%;" class="siparisler">
            <h1 class="mb-4" style="font-size: 2.5rem; text-align: center;">Siparişler</h1>
            <table class="table" style="background-color: #ece6db; border: 1px solid #10375C; border-collapse: separate; border-spacing: 10px; margin: 0 auto;">
                <thead>
                    <tr style="border-bottom: 2px solid #10375C;">
                        <th style="padding: 10px; text-align: center;">Sipariş ID</th>
                        <th style="padding: 10px; text-align: center;">Kullanıcı ID</th>
                        <th style="padding: 10px; text-align: center;">Ürün ID</th>
                        <th style="padding: 10px; text-align: center;">Miktar</th>
                        <th style="padding: 10px; text-align: center;">Toplam Fiyat</th>
                        <th style="padding: 10px; text-align: center;">Sipariş Zamanı</th>
                        <th style="padding: 10px; text-align: center;">Sipariş Durumu</th>
                        <th style="padding: 10px; text-align: center;">Aksiyon</th>
                    </tr>
                </thead>
                <tbody id="siparis-table-body">
                    <tr style="border-bottom: 1px solid #10375C;">
                        <td colspan="8" class="text-center" style="color: #10375C; padding: 10px;">Yükleniyor...</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            fetchSiparisler();
        });

        function fetchSiparisler() {
            $.ajax({
                url: '../php/get_admin_siparisler.php',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    let rows = '';
                    if (data.message) {
                        rows = `<tr style="border-bottom: 1px solid #10375C;"><td colspan="8" class="text-center" style="color: #10375C; padding: 10px;">${data.message}</td></tr>`;
                    } else {
                        data.forEach(function(siparis) {
                            rows += `                                 
                                <tr style="border-bottom: 1px solid #10375C;">                                     
                                    <td style="padding: 10px; text-align: center;">${siparis.siparis_id}</td>                                     
                                    <td style="padding: 10px; text-align: center;">${siparis.kullanici_id}</td>                                     
                                    <td style="padding: 10px; text-align: center;">${siparis.urun_id}</td>                                     
                                    <td style="padding: 10px; text-align: center;">${siparis.miktar}</td>                                     
                                    <td style="padding: 10px; text-align: center;">${siparis.toplam_fiyat}</td>                                     
                                    <td style="padding: 10px; text-align: center;">${siparis.siparis_zamani}</td>                                     
                                    <td style="padding: 10px; text-align: center;">${siparis.siparis_durumu == 1 ? 'Tamamlandı' : 'Beklemede'}</td>                                     
                                    <td style="padding: 10px; text-align: center;">                                         

                                        <button class="btn" style="padding: 5px 10px; ${siparis.siparis_durumu == 1 ? 'background-color: #28a745; color: white;' : 'background-color: #005bb5; color: white;'}" onclick="siparisOnayla(this, ${siparis.siparis_id})" ${siparis.siparis_durumu == 1 ? 'disabled' : ''}>${siparis.siparis_durumu == 1 ? 'Onaylandı' : 'Onayla'}</button>                                     
                                    </td>                                 
                                </tr>                             
                            `;
                        });
                    }
                    $('#siparis-table-body').html(rows);
                },
                error: function() {
                    $('#siparis-table-body').html('<tr style="border-bottom: 1px solid #10375C;"><td colspan="8" class="text-center" style="color: #10375C; padding: 10px;">Veri alınamadı</td></tr>');
                }
            });
        }

        function siparisOnayla(button, siparis_id) {
            $.ajax({
                url: '../php/onayla_siparis.php',
                method: 'POST',
                data: {
                    siparis_id: siparis_id
                },
                success: function(response) {
                    if (response.success) {
                        $(button).css({
                            'background-color': '#28a745',
                            'color': 'white'
                        }).text('Onaylandı').prop('disabled', true);
                    } else {
                        alert('Bir hata oluştu.');
                    }
                },
                error: function() {
                    alert('Sipariş onayı sırasında bir hata oluştu.');
                }
            });
        }
    </script>
</body>

</html>