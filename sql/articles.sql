-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Gegenereerd op: 30 sep 2024 om 17:33
-- Serverversie: 8.0.39
-- PHP-versie: 8.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `article-app`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `articles`
--

CREATE TABLE `articles` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `articles`
--

INSERT INTO `articles` (`id`, `name`, `price`) VALUES
(1, 'Wireless Mouse', 19.99),
(2, 'Bluetooth Headphones', 49.99),
(3, 'USB-C Cable', 9.99),
(4, 'Laptop Stand', 29.99),
(5, 'Mechanical Keyboard', 89.50),
(6, 'Portable Charger', 25.99),
(7, 'Smartwatch', 199.99),
(8, 'External Hard Drive', 79.99),
(9, 'HDMI Cable', 12.50),
(10, 'Gaming Chair', 149.99),
(11, 'Webcam', 39.99),
(12, 'Noise Cancelling Headphones', 129.99),
(13, 'Wireless Earbuds', 59.99),
(14, 'LED Desk Lamp', 35.00),
(15, 'Smartphone Case', 14.99);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
