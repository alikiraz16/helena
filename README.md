# Helena Kütüphane Cafe

Helena Kütüphane Cafe, müşterilerin rahat bir ortamda kitap okuyup, yiyecek ve içecek siparişi verebileceği, aynı zamanda masa ve sandalye rezervasyonu yapabileceği web tabanlı bir otomasyon sistemidir.

## Özellikler

### Müşteri Paneli
*   **Kayıt ve Giriş:** Kullanıcılar sisteme kayıt olabilir ve giriş yapabilir.
*   **Rezervasyon:** Kütüphane içerisindeki masa ve sandalyeler için belirli saat aralıklarında rezervasyon yapılabilir.
*   **Sipariş:** Menüden yiyecek ve içecek siparişi verilebilir.
*   **Profil Yönetimi:** Kullanıcı bilgileri güncellenebilir.
*   **Geçmiş Görüntüleme:** Geçmiş siparişler ve rezervasyonlar görüntülenebilir.

### Admin Paneli
*   **Admin Girişi:** Yöneticiler için özel giriş paneli.
*   **Sipariş Yönetimi:** Müşteri siparişlerini görüntüleme ve onaylama.
*   **Kitap Yönetimi:** Kütüphanedeki kitapların listelenmesi ve yönetimi.
*   **Rezervasyon Takibi:** Aktif ve geçmiş rezervasyonların kontrolü.

## Teknolojiler

*   **Backend:** PHP
*   **Veritabanı:** MySQL
*   **Frontend:** HTML, CSS, JavaScript

## Kurulum

1.  Proje dosyalarını sunucu dizinine (örneğin htdocs veya www) kopyalayın.
2.  `helena.sql` dosyasını MySQL veritabanınıza içe aktarın.
3.  `php/baglan.php` dosyasındaki veritabanı bağlantı ayarlarını kendi sunucu yapılandırmanıza göre düzenleyin:
    ```php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "helena";
    ```
4.  Tarayıcınızdan `index.php` dosyasını çalıştırarak projeyi başlatın.

## Kullanım

*   Ana sayfadan "Müşteri Girişi" veya "Admin Girişi" seçeneklerini kullanarak ilgili panellere erişebilirsiniz.
*   Müşteri girişi yaptıktan sonra menüden seçim yapabilir, "Rezervasyon Yap" sayfasından müsait masaları görüntüleyebilirsiniz.
