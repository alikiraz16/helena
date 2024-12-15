<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siparişlerim</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        body {
            display: flex;
            height: 100vh;
            margin: 0;
            background: linear-gradient(to bottom, #f3e2be, #ece6db, #e8e1d5, #ece7e2);
            color: #10375C;
            box-sizing: border-box;
        }

        .mt-5 {
            display: flex;
            text-align: center;
            flex-direction: column;
        }

    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Siparişlerim</h1>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Sipariş ID</th>
                    <th>Kullanıcı ID</th>
                    <th>Ürün ID</th>
                    <th>Miktar</th>
                    <th>Toplam Fiyat</th>
                    <th>Sipariş Zamanı</th>
                    <th>Sipariş Durumu</th>
                </tr>
            </thead>
            <tbody id="siparis-table-body">
                <tr>
                    <td colspan="7" class="text-center">Yükleniyor...</td>
                </tr>
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            fetchSiparisler();
        });

        function fetchSiparisler() {
            $.ajax({
                url: '../php/get_siparislerim.php',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    let rows = '';
                    data.forEach(function(siparis) {
                        rows += `
                            <tr>
                                <td>${siparis.siparis_id}</td>
                                <td>${siparis.kullanici_id}</td>
                                <td>${siparis.urun_id}</td>
                                <td>${siparis.miktar}</td>
                                <td>${siparis.toplam_fiyat}</td>
                                <td>${siparis.siparis_zamani}</td>
                                <td>${siparis.siparis_durumu == 1 ? 'Tamamlandı' : 'Beklemede'}</td>
                            </tr>
                        `;
                    });
                    $('#siparis-table-body').html(rows);
                },
                error: function() {
                    $('#siparis-table-body').html('<tr><td colspan="7" class="text-center">Veri alınamadı</td></tr>');
                }
            });
        }
    </script>
</body>

</html>