<?php
$host = 'localhost';
$dbname = 'helena';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT * FROM rezervasyonlar WHERE 1";
    $conditions = [];
    $params = [];

    if (!empty($_POST['durum'])) {
        $conditions[] = "durum = :durum";
        $params[':durum'] = $_POST['durum'];
    }

    if (!empty($_POST['baslangic_tarih']) && !empty($_POST['bitis_tarih'])) {
        $conditions[] = "rezervasyon_tarihi BETWEEN :baslangic_tarih AND :bitis_tarih";
        $params[':baslangic_tarih'] = $_POST['baslangic_tarih'];
        $params[':bitis_tarih'] = $_POST['bitis_tarih'];
    }

    if ($conditions) {
        $query .= " AND " . implode(' AND ', $conditions);
    }

    $stmt = $pdo->prepare($query);
    $stmt->execute($params);

    $rezervasyonlar = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Veritabanı bağlantı hatası: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezervasyonlar</title>
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
            top: 50px;
            left: 80px;
        }

        .logo-container a {
            display: block;
        }

        .logo {
            width: 80px;
            cursor: pointer;
        }

        h1 {
            margin-top: 50px;
            text-align: center;
        }

        form {
            margin: 20px auto;
            text-align: center;
        }

        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
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
    </style>
</head>

<body>
    <div class="logo-container">
        <a href="adminPanel.php">
            <img src="../dosyalar/LogoIcon/logo.png" alt="Helena Logo" class="logo" />
        </a>
    </div>

    <h1>Rezervasyonlar</h1>
    <form method="POST">
        <label for="durum">Durum:</label>
        <select name="durum" id="durum">
            <option value="">Tümü</option>
            <option value="Dolu">Dolu</option>
            <option value="Geçmiş Rezervasyon">Geçmiş Rezervasyon</option>
        </select>

        <label for="baslangic_tarih">Başlangıç Tarihi:</label>
        <input type="date" name="baslangic_tarih" id="baslangic_tarih">

        <label for="bitis_tarih">Bitiş Tarihi:</label>
        <input type="date" name="bitis_tarih" id="bitis_tarih">

        <button type="submit">Filtrele</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Kullanıcı ID</th>
                <th>Sandalyeler ID</th>
                <th>Rezervasyon Tarihi</th>
                <th>Başlangıç Saati</th>
                <th>Bitiş Saati</th>
                <th>Durum</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($rezervasyonlar)): ?>
                <?php foreach ($rezervasyonlar as $rezervasyon): ?>
                    <tr>
                        <td><?= htmlspecialchars($rezervasyon['rezervasyon_id']) ?></td>
                        <td><?= htmlspecialchars($rezervasyon['kullanici_id']) ?></td>
                        <td><?= htmlspecialchars($rezervasyon['sandalye_id']) ?></td>
                        <td><?= htmlspecialchars($rezervasyon['rezervasyon_tarihi']) ?></td>
                        <td><?= htmlspecialchars($rezervasyon['baslangic_saati']) ?></td>
                        <td><?= htmlspecialchars($rezervasyon['bitis_saati']) ?></td>
                        <td><?= htmlspecialchars($rezervasyon['durum']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">Hiçbir rezervasyon bulunamadı.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>

</html>