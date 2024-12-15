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
    <title>Admin Paneli</title>
    <link rel="stylesheet" href="../css/adminPanel.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>

        .chart-container {
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-wrap: wrap;
            margin: 20px 0;
        }

        .chart-item {
            width: 45%;
        }

        .text-center {
            text-align: center;
        }

        #welcome .text-center {
            margin: 0px;
        }

    </style>
</head>

<body>
    <header>
        <div class="navbar">
            <div class="logo">
                <a href="#"><img src="../dosyalar/LogoIcon/logo.png" alt="Helena"></a>
            </div>
            <div class="menu">
                <a href="adminSiparisler.php">Siparişler</a>
                <a href="adminRezervasyonlar.php">Rezervasyonlar</a>
                <a href="adminkitaplar.php">Kitap Yönetimi</a>
            </div>
            <div class="logout">
                <a href="../php/adminLogout.php">Çıkış Yap</a>
            </div>
        </div>
    </header>
    <main>
        <section id="welcome">
            <h1 class="text-center">Doluluk Oranı ve En Çok Satılan Ürünler</h1>
            <div class="chart-container">
                <div class="chart-item">
                    <canvas id="reservationsChart"></canvas>
                </div>
                <div class="chart-item">
                    <canvas id="topProductsChart"></canvas>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Helena Cafe & Kütüphane. Tüm Hakları Saklıdır.</p>
    </footer>

    <script>
        fetch('../php/adminDashboardData.php')
            .then(response => response.json())
            .then(data => {
                const chartDataDolulukOrani = {
                    labels: ['Dolu Sandalyeler', 'Boş Sandalyeler'],
                    datasets: [{
                        data: [data.doluSandalye, data.bosSandalye],
                        backgroundColor: ['#f44336', '#4caf50']
                    }]
                };

                new Chart(document.getElementById('reservationsChart'), {
                    type: 'pie',
                    data: chartDataDolulukOrani,
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top'
                            },
                            title: {
                                display: true,
                                text: 'Doluluk Oranı'
                            }
                        }
                    }
                });

                const chartDataTopProducts = {
                    labels: data.urunler,
                    datasets: [{
                        data: data.satislar,
                        backgroundColor: ['#2196f3', '#4caf50', '#ff9800', '#f44336', '#9c27b0']
                    }]
                };

                new Chart(document.getElementById('topProductsChart'), {
                    type: 'bar',
                    data: chartDataTopProducts,
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                display: false
                            },
                            title: {
                                display: true,
                                text: 'En Çok Satılan Ürünler'
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            })
            .catch(error => console.error('Hata:', error));
    </script>
</body>

</html>