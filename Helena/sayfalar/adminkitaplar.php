<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Kiralanan Kitaplar</title>
    <link rel="stylesheet" href="../css/adminPanel.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .logo-container {
            position: absolute;
            top: 20px;
            left: 20px;
        }

        .logo {
            width: 80px;
            height: 80px;
            cursor: pointer;
        }

        h1 {
            text-align: center;
            font-size: 2rem;
            color: #10375C;
            margin: 20px 0;
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

        tr:hover {
            background-color: #e9e9e9;
        }

        footer {
            text-align: center;
            margin-top: 20px;
            padding: 10px;
            background-color: #10375C;
            color: white;
        }
    </style>
</head>

<body>
    <div class="logo-container">
        <a href="adminPanel.php">
            <img src="../dosyalar/LogoIcon/logo.png" alt="Helena Logo" class="logo" />
        </a>
    </div>

    <main>
        <h1>Kiralama Yönetimi</h1>
        <table>
            <thead>
                <tr>
                    <th>Rezervasyon ID</th>
                    <th>Kullanıcı ID</th>
                    <th>Kullanıcı Adı</th>
                    <th>Kitap ID</th>
                    <th>Kitap Adı</th>
                    <th>Rezervasyon Tarihi</th>
                    <th>İade Tarihi</th>
                </tr>
            </thead>
            <tbody id="reservationTable">
            </tbody>
        </table>
    </main>

    <footer>
        <p>&copy; 2024 Tüm hakları saklıdır. Admin Paneli</p>
    </footer>

    <script>
        fetch('../php/get_admin_kitaplar.php')
            .then(response => response.json())
            .then(data => {
                const tableBody = document.getElementById('reservationTable');
                data.forEach(row => {
                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                        <td>${row.kitap_rezervasyon_id}</td>
                        <td>${row.kullanici_id}</td>
                        <td>${row.ad || 'Bilinmiyor'}</td>
                        <td>${row.kitap_id}</td>
                        <td>${row.kitap_adi}</td>
                        <td>${row.rezervasyon_tarihi}</td>
                        <td>${row.iade_tarihi || 'Belirtilmedi'}</td>
                    `;
                    tableBody.appendChild(tr);
                });
            })
            .catch(error => console.error('Hata:', error));
    </script>
</body>

</html>