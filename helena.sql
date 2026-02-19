-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 15 Oca 2026, 12:06:14
-- Sunucu sürümü: 8.0.31
-- PHP Sürümü: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `helena`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

DROP TABLE IF EXISTS `kategoriler`;
CREATE TABLE IF NOT EXISTS `kategoriler` (
  `kategori_id` int NOT NULL AUTO_INCREMENT,
  `kategori_adi` varchar(100) COLLATE utf8mb3_turkish_ci NOT NULL,
  PRIMARY KEY (`kategori_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `kategoriler`
--

INSERT INTO `kategoriler` (`kategori_id`, `kategori_adi`) VALUES
(1, 'Soğuk İçecekler'),
(2, 'Atıştırmalıklar'),
(3, 'Sıcak İçecekler'),
(4, 'Soğuk Kahveler');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kitaplar`
--

DROP TABLE IF EXISTS `kitaplar`;
CREATE TABLE IF NOT EXISTS `kitaplar` (
  `kitap_id` int NOT NULL AUTO_INCREMENT,
  `kitap_adi` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `yazar` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci DEFAULT NULL,
  `tur` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci DEFAULT NULL,
  `adet` int NOT NULL,
  PRIMARY KEY (`kitap_id`)
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `kitaplar`
--

INSERT INTO `kitaplar` (`kitap_id`, `kitap_adi`, `yazar`, `tur`, `adet`) VALUES
(1, 'Sefiller', 'Victor Hugo', 'Roman', 0),
(2, 'Küçük Prens', 'Antoine de Saint-Exupéry', 'Çocuk', 0),
(3, '1984', 'George Orwell', 'Bilim Kurgu', 2),
(4, 'Suç ve Ceza', 'Fyodor Dostoyevski', 'Roman', 4),
(5, 'Zamanın Kısa Tarihi', 'Stephen Hawking', 'Bilim', 4),
(6, 'Harry Potter ve Felsefe Taşı', 'J.K. Rowling', 'Fantastik', 0),
(7, 'Simyacı', 'Paulo Coelho', 'Roman', 2),
(8, 'Nutuk', 'Mustafa Kemal Atatürk', 'Tarih', 4),
(9, 'Kayıp Sembol', 'Dan Brown', 'Gerilim', 3),
(10, 'Dönüşüm', 'Franz Kafka', 'Roman', 2),
(11, 'Şeker Portakalı', 'José Mauro de Vasconcelos', 'Çocuk', 3),
(12, 'Beyaz Geceler', 'Fyodor Dostoyevski', 'Roman', 2),
(13, 'Cesur Yeni Dünya', 'Aldous Huxley', 'Bilim Kurgu', 0),
(14, 'Fareler ve İnsanlar', 'John Steinbeck', 'Roman', 5),
(15, 'Körlük', 'José Saramago', 'Roman', 4),
(16, 'Uçurtma Avcısı', 'Khaled Hosseini', 'Roman', 2),
(17, 'Ben, Robot', 'Isaac Asimov', 'Bilim Kurgu', 4),
(18, 'Saatleri Ayarlama Enstitüsü', 'Ahmet Hamdi Tanpınar', 'Roman', 2),
(19, 'Yüzyıllık Yalnızlık', 'Gabriel García Márquez', 'Roman', 1),
(20, 'Kırmızı Pazartesi', 'Gabriel García Márquez', 'Roman', 2),
(21, 'İnce Memed', 'Yaşar Kemal', 'Roman', 4),
(22, 'Aşk', 'Elif Şafak', 'Roman', 3),
(23, 'Kar', 'Orhan Pamuk', 'Roman', 1),
(24, 'Masumiyet Müzesi', 'Orhan Pamuk', 'Roman', 1),
(25, 'Bir İdam Mahkumunun Son Günü', 'Victor Hugo', 'Roman', 3),
(26, 'Alchemist', 'Paulo Coelho', 'Roman', 4),
(27, 'Ermiş', 'Halil Cibran', 'Felsefe', 4),
(28, 'Eylül', 'Mehmet Rauf', 'Roman', 5),
(29, 'Çalıkuşu', 'Reşat Nuri Güntekin', 'Roman', 5),
(30, 'Yaban', 'Yakup Kadri Karaosmanoğlu', 'Roman', 1),
(31, 'Savaş ve Barış', 'Lev Tolstoy', 'Roman', 2),
(32, 'Anna Karenina', 'Lev Tolstoy', 'Roman', 3),
(33, 'Yeraltından Notlar', 'Fyodor Dostoyevski', 'Roman', 4),
(34, 'Zülfü Livaneli', 'Engereğin Gözündeki Kamaşma', 'Roman', 4),
(35, 'Huzur', 'Ahmet Hamdi Tanpınar', 'Roman', 5),
(36, 'Kuyucaklı Yusuf', 'Sabahattin Ali', 'Roman', 5),
(37, 'İçimizdeki Şeytan', 'Sabahattin Ali', 'Roman', 5),
(38, 'Kürk Mantolu Madonna', 'Sabahattin Ali', 'Roman', 3),
(39, 'Frankenstein', 'Mary Shelley', 'Korku', 1),
(40, 'Dracula', 'Bram Stoker', 'Korku', 0),
(41, 'Goriot Baba', 'Honoré de Balzac', 'Roman', 0),
(42, 'Notre Dame’ın Kamburu', 'Victor Hugo', 'Roman', 1),
(43, 'İki Şehrin Hikayesi', 'Charles Dickens', 'Tarih', 4),
(44, 'Oliver Twist', 'Charles Dickens', 'Roman', 3),
(45, 'Robinson Crusoe', 'Daniel Defoe', 'Macera', 0),
(46, 'Gulliver’in Gezileri', 'Jonathan Swift', 'Macera', 3),
(47, 'Don Kişot', 'Miguel de Cervantes', 'Macera', 0),
(48, 'Sineklerin Tanrısı', 'William Golding', 'Roman', 3),
(49, 'Otomatik Portakal', 'Anthony Burgess', 'Bilim Kurgu', 2),
(50, 'Açlık', 'Knut Hamsun', 'Roman', 1),
(51, 'Ateşten Gömlek', 'Halide Edib Adıvar', 'Roman', 0),
(52, 'Tutsaklık', 'Franz Kafka', 'Roman', 4),
(53, 'Kimya Hatun', 'Saide Kuds', 'Biyografi', 3),
(54, 'Olasılıksız', 'Adam Fawer', 'Gerilim', 5),
(55, 'Empati', 'Adam Fawer', 'Gerilim', 4),
(56, 'Puslu Kıtalar Atlası', 'İhsan Oktay Anar', 'Fantastik', 3),
(57, 'Kitab-ül Hiyel', 'İhsan Oktay Anar', 'Fantastik', 1),
(58, 'Araba Sevdası', 'Recaizade Mahmut Ekrem', 'Roman', 3),
(59, 'Siyah İnci', 'John Steinbeck', 'Roman', 3),
(60, 'Martin Eden', 'Jack London', 'Roman', 1),
(61, 'Bilinmeyen Bir Kadının Mektubu', 'Stefan Zweig', 'Roman', 5),
(62, 'Satranç', 'Stefan Zweig', 'Roman', 2),
(63, 'Amok Koşucusu', 'Stefan Zweig', 'Roman', 0),
(64, 'Momo', 'Michael Ende', 'Fantastik', 2),
(65, 'Bitmeyen Öykü', 'Michael Ende', 'Fantastik', 0),
(66, 'Çocuk Kalbi', 'Edmondo De Amicis', 'Çocuk', 3),
(67, 'Küçük Kara Balık', 'Samed Behrengi', 'Çocuk', 1),
(68, 'Alice Harikalar Diyarında', 'Lewis Carroll', 'Çocuk', 0),
(69, 'Peter Pan', 'J.M. Barrie', 'Çocuk', 2),
(70, 'Pollyanna', 'Eleanor H. Porter', 'Çocuk', 0),
(71, 'Pinokyo', 'Carlo Collodi', 'Çocuk', 3),
(72, 'Ölü Canlar', 'Nikolay Gogol', 'Roman', 3),
(73, 'Pal Sokağı Çocukları', 'Ferenc Molnár', 'Çocuk', 0),
(74, 'Denizler Altında Yirmi Bin Fersah', 'Jules Verne', 'Macera', 5),
(75, 'Dünyanın Merkezine Yolculuk', 'Jules Verne', 'Macera', 5),
(76, 'Ay’a Yolculuk', 'Jules Verne', 'Bilim Kurgu', 4),
(77, 'Esrarengiz Ada', 'Jules Verne', 'Macera', 2),
(78, 'Monte Kristo Kontu', 'Alexandre Dumas', 'Macera', 3),
(79, 'Üç Silahşörler', 'Alexandre Dumas', 'Macera', 1),
(80, 'Vadideki Zambak', 'Honoré de Balzac', 'Roman', 1),
(81, 'Bir Delinin Hatıra Defteri', 'Nikolay Gogol', 'Roman', 3),
(82, 'Zehra', 'Nabizade Nazım', 'Roman', 2),
(83, 'Mor Salkımlı Ev', 'Halide Edib Adıvar', 'Anı', 1),
(84, 'Karabibik', 'Nabizade Nazım', 'Roman', 3),
(85, 'Efsuncu Baba', 'Hüseyin Rahmi Gürpınar', 'Roman', 3),
(86, 'Şıpsevdi', 'Hüseyin Rahmi Gürpınar', 'Roman', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kitap_rezervasyonlar`
--

DROP TABLE IF EXISTS `kitap_rezervasyonlar`;
CREATE TABLE IF NOT EXISTS `kitap_rezervasyonlar` (
  `kitap_rezervasyon_id` int NOT NULL AUTO_INCREMENT,
  `kullanici_id` int NOT NULL,
  `kitap_id` int NOT NULL,
  `rezervasyon_tarihi` date NOT NULL,
  `iade_tarihi` date DEFAULT NULL,
  PRIMARY KEY (`kitap_rezervasyon_id`),
  KEY `kullanici_id` (`kullanici_id`),
  KEY `kitap_id` (`kitap_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `kitap_rezervasyonlar`
--

INSERT INTO `kitap_rezervasyonlar` (`kitap_rezervasyon_id`, `kullanici_id`, `kitap_id`, `rezervasyon_tarihi`, `iade_tarihi`) VALUES
(9, 137, 3, '2025-06-19', '2025-07-09'),
(10, 138, 3, '2025-10-23', '2025-11-12');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

DROP TABLE IF EXISTS `kullanicilar`;
CREATE TABLE IF NOT EXISTS `kullanicilar` (
  `kullanici_id` int NOT NULL AUTO_INCREMENT,
  `ad` varchar(255) COLLATE utf8mb3_turkish_ci NOT NULL,
  `soyad` varchar(255) COLLATE utf8mb3_turkish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb3_turkish_ci NOT NULL,
  `telefon` varchar(20) COLLATE utf8mb3_turkish_ci DEFAULT NULL,
  `sifre` varchar(255) COLLATE utf8mb3_turkish_ci NOT NULL,
  `kayit_tarihi` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`kullanici_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`kullanici_id`, `ad`, `soyad`, `email`, `telefon`, `sifre`, `kayit_tarihi`) VALUES
(137, 'Ali', 'Kiraz', 'ali@gmail.com', '05315652371', '$2y$10$Axx41bioIOnjMqpITv306OW5NLB9jivcEaVU5y5/Zk.NjvY5YlP9y', '2025-06-19 16:32:16'),
(138, 'kadir', 'yurt', 'kadir@gmail.com', '123', '$2y$10$IaT2kNwsqBM3qYpa2Fl6wOaZNjfWuWnz6WEIV3s1WXExAcWDEzWZi', '2025-10-23 23:38:41');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `masalar`
--

DROP TABLE IF EXISTS `masalar`;
CREATE TABLE IF NOT EXISTS `masalar` (
  `masa_id` int NOT NULL AUTO_INCREMENT,
  `masa_adi` varchar(50) COLLATE utf8mb3_turkish_ci NOT NULL,
  `kapasite` int NOT NULL,
  `konum` varchar(100) COLLATE utf8mb3_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`masa_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `masalar`
--

INSERT INTO `masalar` (`masa_id`, `masa_adi`, `kapasite`, `konum`) VALUES
(1, 'Masa 1', 8, 'Sesli Alan'),
(2, 'Masa 2', 2, 'Sesli Alan'),
(3, 'Masa 3', 6, 'Sesli Alan'),
(4, 'Masa 4', 6, 'Sesli Alan'),
(5, 'Masa 5', 4, 'Sesli Alan'),
(6, 'Masa 6', 16, 'Sesli Alan'),
(7, 'Masa 7', 6, 'Sesli Alan'),
(8, 'Masa 8', 6, 'Sesli Alan'),
(9, 'Masa 9', 6, 'Sesli Alan'),
(10, 'Masa 10', 6, 'Sesli Alan'),
(11, 'Masa 11', 2, 'Sesli Alan'),
(12, 'Masa 12', 2, 'Sesli Alan'),
(14, 'Masa 14', 8, 'Sessiz Alan'),
(15, 'Masa 15', 8, 'Sessiz Alan'),
(16, 'Masa 16', 8, 'Sessiz Alan'),
(17, 'Masa 17', 8, 'Sessiz Alan'),
(18, 'Masa 18', 8, 'Sessiz Alan'),
(19, 'Masa 19', 2, 'Sessiz Alan'),
(20, 'Masa 20', 2, 'Sessiz Alan'),
(21, 'Masa 21', 4, 'Sessiz Alan'),
(22, 'Masa 22', 2, 'Sessiz Alan');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `rezervasyonlar`
--

DROP TABLE IF EXISTS `rezervasyonlar`;
CREATE TABLE IF NOT EXISTS `rezervasyonlar` (
  `rezervasyon_id` int NOT NULL AUTO_INCREMENT,
  `kullanici_id` int NOT NULL,
  `sandalye_id` int NOT NULL,
  `rezervasyon_tarihi` date NOT NULL,
  `baslangic_saati` time NOT NULL,
  `bitis_saati` time DEFAULT NULL,
  `durum` varchar(255) COLLATE utf8mb3_turkish_ci NOT NULL DEFAULT 'Dolu',
  PRIMARY KEY (`rezervasyon_id`),
  KEY `kullanici_id` (`kullanici_id`),
  KEY `sandalye_id` (`sandalye_id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `rezervasyonlar`
--

INSERT INTO `rezervasyonlar` (`rezervasyon_id`, `kullanici_id`, `sandalye_id`, `rezervasyon_tarihi`, `baslangic_saati`, `bitis_saati`, `durum`) VALUES
(36, 137, 84, '2025-06-19', '16:35:57', '21:35:57', 'Geçmiş Rezervasyon'),
(37, 138, 120, '2025-10-23', '23:50:01', '04:50:01', 'Geçmiş Rezervasyon'),
(38, 138, 119, '2025-10-23', '23:50:18', '01:50:18', 'Geçmiş Rezervasyon');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sandalyeler`
--

DROP TABLE IF EXISTS `sandalyeler`;
CREATE TABLE IF NOT EXISTS `sandalyeler` (
  `sandalye_id` int NOT NULL AUTO_INCREMENT,
  `masa_id` int NOT NULL,
  `sandalye_adi` varchar(255) COLLATE utf8mb3_turkish_ci NOT NULL,
  PRIMARY KEY (`sandalye_id`),
  KEY `masa_id` (`masa_id`)
) ENGINE=InnoDB AUTO_INCREMENT=151 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `sandalyeler`
--

INSERT INTO `sandalyeler` (`sandalye_id`, `masa_id`, `sandalye_adi`) VALUES
(1, 1, 'Masa 1 - 1. sandalye'),
(2, 1, 'Masa 1 - 2. sandalye'),
(3, 1, 'Masa 1 - 3. sandalye'),
(4, 1, 'Masa 1 - 4. sandalye'),
(5, 1, 'Masa 1 - 5. sandalye'),
(6, 1, 'Masa 1 - 6. sandalye'),
(7, 1, 'Masa 1 - 7. sandalye'),
(8, 1, 'Masa 1 - 8. sandalye'),
(9, 2, 'Masa 2 - 1. sandalye'),
(10, 2, 'Masa 2 - 2. sandalye'),
(11, 3, 'Masa 3 - 1. sandalye'),
(12, 3, 'Masa 3 - 2. sandalye'),
(13, 3, 'Masa 3 - 3. sandalye'),
(14, 3, 'Masa 3 - 4. sandalye'),
(15, 3, 'Masa 3 - 5. sandalye'),
(16, 3, 'Masa 3 - 6. sandalye'),
(17, 4, 'Masa 4 - 1. sandalye'),
(18, 4, 'Masa 4 - 2. sandalye'),
(19, 4, 'Masa 4 - 3. sandalye'),
(20, 4, 'Masa 4 - 4. sandalye'),
(21, 4, 'Masa 4 - 5. sandalye'),
(22, 4, 'Masa 4 - 6. sandalye'),
(23, 5, 'Masa 5 - 1. sandalye'),
(24, 5, 'Masa 5 - 2. sandalye'),
(25, 5, 'Masa 5 - 3. sandalye'),
(26, 5, 'Masa 5 - 4. sandalye'),
(27, 6, 'Masa 6 - 1. sandalye'),
(28, 6, 'Masa 6 - 2. sandalye'),
(29, 6, 'Masa 6 - 3. sandalye'),
(30, 6, 'Masa 6 - 4. sandalye'),
(31, 6, 'Masa 6 - 5. sandalye'),
(32, 6, 'Masa 6 - 6. sandalye'),
(33, 6, 'Masa 6 - 7. sandalye'),
(34, 6, 'Masa 6 - 8. sandalye'),
(35, 6, 'Masa 6 - 9. sandalye'),
(36, 6, 'Masa 6 - 10. sandalye'),
(37, 6, 'Masa 6 - 11. sandalye'),
(38, 6, 'Masa 6 - 12. sandalye'),
(39, 6, 'Masa 6 - 13. sandalye'),
(40, 6, 'Masa 6 - 14. sandalye'),
(41, 6, 'Masa 6 - 15. sandalye'),
(42, 6, 'Masa 6 - 16. sandalye'),
(43, 7, 'Masa 7 - 1. sandalye'),
(44, 7, 'Masa 7 - 2. sandalye'),
(45, 7, 'Masa 7 - 3. sandalye'),
(46, 7, 'Masa 7 - 4. sandalye'),
(47, 7, 'Masa 7 - 5. sandalye'),
(48, 7, 'Masa 7 - 6. sandalye'),
(49, 8, 'Masa 8 - 1. sandalye'),
(50, 8, 'Masa 8 - 2. sandalye'),
(51, 8, 'Masa 8 - 3. sandalye'),
(52, 8, 'Masa 8 - 4. sandalye'),
(53, 8, 'Masa 8 - 5. sandalye'),
(54, 8, 'Masa 8 - 6. sandalye'),
(55, 9, 'Masa 9 - 1. sandalye'),
(56, 9, 'Masa 9 - 2. sandalye'),
(57, 9, 'Masa 9 - 3. sandalye'),
(58, 9, 'Masa 9 - 4. sandalye'),
(59, 9, 'Masa 9 - 5. sandalye'),
(60, 9, 'Masa 9 - 6. sandalye'),
(61, 10, 'Masa 10 - 1. sandalye'),
(62, 10, 'Masa 10 - 2. sandalye'),
(63, 10, 'Masa 10 - 3. sandalye'),
(64, 10, 'Masa 10 - 4. sandalye'),
(65, 10, 'Masa 10 - 5. sandalye'),
(66, 10, 'Masa 10 - 6. sandalye'),
(67, 11, 'Masa 11 - 1. sandalye'),
(68, 11, 'Masa 11 - 2. sandalye'),
(69, 12, 'Masa 12 - 1. sandalye'),
(70, 12, 'Masa 12 - 2. sandalye'),
(71, 14, 'Masa 14 - 1. sandalye'),
(72, 14, 'Masa 14 - 2. sandalye'),
(73, 14, 'Masa 14 - 3. sandalye'),
(74, 14, 'Masa 14 - 4. sandalye'),
(75, 14, 'Masa 14 - 5. sandalye'),
(76, 14, 'Masa 14 - 6. sandalye'),
(77, 14, 'Masa 14 - 7. sandalye'),
(78, 14, 'Masa 14 - 8. sandalye'),
(79, 15, 'Masa 15 - 1. sandalye'),
(80, 15, 'Masa 15 - 2. sandalye'),
(81, 15, 'Masa 15 - 3. sandalye'),
(82, 15, 'Masa 15 - 4. sandalye'),
(83, 15, 'Masa 15 - 5. sandalye'),
(84, 15, 'Masa 15 - 6. sandalye'),
(85, 15, 'Masa 15 - 7. sandalye'),
(86, 15, 'Masa 15 - 8. sandalye'),
(87, 16, 'Masa 16 - 1. sandalye'),
(88, 16, 'Masa 16 - 2. sandalye'),
(89, 16, 'Masa 16 - 3. sandalye'),
(90, 16, 'Masa 16 - 4. sandalye'),
(91, 16, 'Masa 16 - 5. sandalye'),
(92, 16, 'Masa 16 - 6. sandalye'),
(93, 16, 'Masa 16 - 7. sandalye'),
(94, 16, 'Masa 16 - 8. sandalye'),
(95, 17, 'Masa 17 - 1. sandalye'),
(96, 17, 'Masa 17 - 2. sandalye'),
(97, 17, 'Masa 17 - 3. sandalye'),
(98, 17, 'Masa 17 - 4. sandalye'),
(99, 17, 'Masa 17 - 5. sandalye'),
(100, 17, 'Masa 17 - 6. sandalye'),
(101, 17, 'Masa 17 - 7. sandalye'),
(102, 17, 'Masa 17 - 8. sandalye'),
(103, 18, 'Masa 18 - 1. sandalye'),
(104, 18, 'Masa 18 - 2. sandalye'),
(105, 18, 'Masa 18 - 3. sandalye'),
(106, 18, 'Masa 18 - 4. sandalye'),
(107, 18, 'Masa 18 - 5. sandalye'),
(108, 18, 'Masa 18 - 6. sandalye'),
(109, 18, 'Masa 18 - 7. sandalye'),
(110, 18, 'Masa 18 - 8. sandalye'),
(111, 19, 'Masa 19 - 1. sandalye'),
(112, 19, 'Masa 19 - 2. sandalye'),
(113, 20, 'Masa 20 - 1. sandalye'),
(114, 20, 'Masa 20 - 2. sandalye'),
(115, 21, 'Masa 21 - 1. sandalye'),
(116, 21, 'Masa 21 - 2. sandalye'),
(117, 21, 'Masa 21 - 3. sandalye'),
(118, 21, 'Masa 21 - 4. sandalye'),
(119, 22, 'Masa 22 - 1. sandalye'),
(120, 22, 'Masa 22 - 2. sandalye');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparisler`
--

DROP TABLE IF EXISTS `siparisler`;
CREATE TABLE IF NOT EXISTS `siparisler` (
  `siparis_id` int NOT NULL AUTO_INCREMENT,
  `kullanici_id` int NOT NULL,
  `urun_id` int NOT NULL,
  `miktar` int NOT NULL,
  `toplam_fiyat` decimal(10,2) NOT NULL,
  `siparis_zamani` datetime DEFAULT CURRENT_TIMESTAMP,
  `siparis_durumu` tinyint(1) NOT NULL,
  PRIMARY KEY (`siparis_id`),
  KEY `oge_id` (`urun_id`),
  KEY `kullanici_id` (`kullanici_id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `siparisler`
--

INSERT INTO `siparisler` (`siparis_id`, `kullanici_id`, `urun_id`, `miktar`, `toplam_fiyat`, `siparis_zamani`, `siparis_durumu`) VALUES
(39, 137, 1, 5, '625.00', '2025-06-19 16:33:43', 1),
(40, 137, 2, 4, '500.00', '2025-06-19 16:33:43', 1),
(41, 137, 3, 2, '250.00', '2025-06-19 16:33:43', 1),
(42, 137, 12, 1, '125.00', '2025-06-19 16:33:43', 1),
(43, 137, 13, 1, '100.00', '2025-06-19 16:33:43', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

DROP TABLE IF EXISTS `urunler`;
CREATE TABLE IF NOT EXISTS `urunler` (
  `urun_id` int NOT NULL AUTO_INCREMENT,
  `kategori_id` int DEFAULT NULL,
  `urun_adi` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `icerik` text CHARACTER SET utf8mb3 COLLATE utf8mb3_turkish_ci NOT NULL,
  `fiyat` decimal(10,2) NOT NULL,
  PRIMARY KEY (`urun_id`),
  KEY `kategori_id` (`kategori_id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`urun_id`, `kategori_id`, `urun_adi`, `icerik`, `fiyat`) VALUES
(1, 1, 'Afrodit', 'Ananas Suyu, Elma Suyu, Çilek Aroması, Hindistan Cevizli Aromalı İçecek', '125.00'),
(2, 1, 'Hathor', 'Vişne Suyu, Mandalina Suyu, Münüver Çiçeği Aromalı İçecek', '125.00'),
(3, 1, 'Hera', 'Şeftali Suyu, Hindistan Cevizi Aroması, Frambuaz Aromalı İçecek', '125.00'),
(4, 1, 'Zeus', 'Ejder Meyvesi, Mango, Hindistan Cevizi Aromalı İçecek', '125.00'),
(5, 1, 'Ares', 'Ahududu, Böğürtlen, Frambuaz Aroması, Tayland Baharatlı Aromalı İçecek', '125.00'),
(6, 1, 'Ba Sing Se', 'Limonata, Naneli Yeşil Çay, Şeftali Aromalı İçecek', '125.00'),
(7, 1, 'İsis', 'Greyfurt Suyu, Taze Nane, Misket Limonu Aromalı İçecek', '125.00'),
(8, 1, 'Gyatso', 'Yeşil Elma Suyu, Karamel Tarçın Aromalı İçecek', '125.00'),
(9, 1, 'Oma Shu', 'Limonata, Böğürtlen Çayı, Vanilya Aromalı İçecek', '125.00'),
(10, 1, 'Dionisos', 'Portakal ve Mango Aromalı İçecek', '125.00'),
(11, 1, 'Poseidon', 'Böğürtlen ve Hibiscus Aromalı İçecek', '125.00'),
(12, 1, 'Cool Lime', '', '125.00'),
(13, 1, 'Limonata', '', '100.00'),
(14, 1, 'Redbull', '', '80.00'),
(15, 1, 'Soda', '', '30.00'),
(16, 1, 'Su', '', '20.00'),
(17, 2, 'Donut', '', '80.00'),
(18, 2, 'Cookie Grande', '', '80.00'),
(19, 2, 'American Muffin', '', '95.00'),
(20, 2, 'Paris Kruvasan', '', '120.00'),
(21, 2, 'Çikolata Dolgulu Berliner', '', '95.00'),
(22, 2, 'New York Cookie Pie', '', '120.00'),
(23, 2, 'Londra Jambonlu Sandwich', '', '130.00'),
(24, 2, 'Mozarella Sandwich', '', '130.00'),
(25, 2, 'Dana Füme Etli Sandwich', '', '160.00'),
(26, 2, 'Tavuk Fajita Sandwich', '', '160.00'),
(27, 2, 'Cheesecake', '', '120.00'),
(28, 2, 'Börek', '', '60.00'),
(29, 2, 'Hindi Füme Sandwich', '', '130.00'),
(30, 2, 'Cheesewich', '', '130.00'),
(31, 2, 'Texas Sandwich', '', '160.00'),
(32, 2, 'Meat Cheese Sandwich', '', '160.00'),
(33, 2, 'Baget Cheese', '', '120.00'),
(34, 3, 'Americano', '', '100.00'),
(35, 3, 'Guetemala Filtre Kahve', '', '100.00'),
(36, 3, 'Caffe Latte', '', '110.00'),
(37, 3, 'Cafe Mocha', '', '125.00'),
(38, 3, 'White Chocolate Mocha', '', '125.00'),
(39, 3, 'Karamel Latte', '', '125.00'),
(40, 3, 'Ireland Latte', '', '125.00'),
(41, 3, 'Salted Caramel Mocha', '', '125.00'),
(42, 3, 'Toffe Latte', '', '125.00'),
(43, 3, 'Gingerbread Latte', '', '125.00'),
(44, 3, 'Cookie Ccino', '', '125.00'),
(45, 3, 'Tiramisu Latte', '', '125.00'),
(46, 3, 'French Vanilla Latte', '', '125.00'),
(47, 3, 'Lotus Latte', '', '125.00'),
(48, 3, 'Sıcak Çikolata', '', '135.00'),
(49, 3, 'Pumpkin Spice Latte', '', '125.00'),
(50, 3, 'Orange Chocolate Mocha', '', '135.00'),
(51, 3, 'Cınnamon Hazelnut Mocha', '', '135.00'),
(52, 3, 'Raspberry Latte', '', '125.00'),
(53, 3, 'Popcorn Latte', '', '125.00'),
(54, 4, 'Ice Americano', '', '110.00'),
(55, 4, 'Cold Brew', '', '110.00'),
(56, 4, 'Ice Toffee Latte', '', '130.00'),
(57, 4, 'Ice Tiramisu', '', '130.00'),
(58, 4, 'Ice Latte', '', '125.00'),
(59, 4, 'Ice Caramel Latte', '', '130.00'),
(60, 4, 'Ice Mocha', '', '130.00'),
(61, 4, 'Ice White Chocolate Mocha', '', '130.00'),
(62, 4, 'Coco White Chocolate', '', '130.00'),
(63, 4, 'Cookie Frappe', '', '135.00'),
(64, 4, 'Cold Lotus Latte', '', '130.00'),
(65, 4, 'Ice Vanilla Latte', '', '130.00'),
(66, 4, 'Ice White Chocolate Pistachia', '', '130.00'),
(67, 4, 'Ballı Süt', '', '80.00'),
(68, 4, 'Bitki ve Meyve Çayları', '', '80.00');

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `kitap_rezervasyonlar`
--
ALTER TABLE `kitap_rezervasyonlar`
  ADD CONSTRAINT `kitap_rezervasyonlar_ibfk_1` FOREIGN KEY (`kullanici_id`) REFERENCES `kullanicilar` (`kullanici_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kitap_rezervasyonlar_ibfk_2` FOREIGN KEY (`kitap_id`) REFERENCES `kitaplar` (`kitap_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `rezervasyonlar`
--
ALTER TABLE `rezervasyonlar`
  ADD CONSTRAINT `rezervasyonlar_ibfk_1` FOREIGN KEY (`kullanici_id`) REFERENCES `kullanicilar` (`kullanici_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rezervasyonlar_ibfk_2` FOREIGN KEY (`sandalye_id`) REFERENCES `sandalyeler` (`sandalye_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `sandalyeler`
--
ALTER TABLE `sandalyeler`
  ADD CONSTRAINT `sandalyeler_ibfk_1` FOREIGN KEY (`masa_id`) REFERENCES `masalar` (`masa_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `siparisler`
--
ALTER TABLE `siparisler`
  ADD CONSTRAINT `siparisler_ibfk_2` FOREIGN KEY (`urun_id`) REFERENCES `urunler` (`urun_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siparisler_ibfk_3` FOREIGN KEY (`kullanici_id`) REFERENCES `kullanicilar` (`kullanici_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `urunler`
--
ALTER TABLE `urunler`
  ADD CONSTRAINT `urunler_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategoriler` (`kategori_id`) ON DELETE CASCADE ON UPDATE CASCADE;

DELIMITER $$
--
-- Olaylar
--
DROP EVENT IF EXISTS `update_gecmis_rezervasyon`$$
CREATE DEFINER=`root`@`localhost` EVENT `update_gecmis_rezervasyon` ON SCHEDULE EVERY 1 MINUTE STARTS '2024-12-15 13:01:38' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE rezervasyonlar
  SET durum = 'Geçmiş Rezervasyon'
  WHERE durum = 'Dolu'
    AND CONCAT(rezervasyon_tarihi, ' ', bitis_saati) < NOW()$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
