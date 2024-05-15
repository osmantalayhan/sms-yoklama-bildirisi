-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 15 May 2024, 16:35:24
-- Sunucu sürümü: 10.4.24-MariaDB
-- PHP Sürümü: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `attendance_log`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `attendance_log`
--

CREATE TABLE `attendance_log` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `attendance_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `attendance_log`
--

INSERT INTO `attendance_log` (`id`, `name`, `phone`, `attendance_status`) VALUES
(1, 'Ahmet', '0000000000', 0),
(2, 'Mehmet', '0000000000', 1);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `attendance_log`
--
ALTER TABLE `attendance_log`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `attendance_log`
--
ALTER TABLE `attendance_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
