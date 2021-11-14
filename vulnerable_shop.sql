-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gép: localhost
-- Létrehozás ideje: 2021. Nov 14. 15:31
-- Kiszolgáló verziója: 10.6.4-MariaDB
-- PHP verzió: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `vulnerable_shop`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `categories`
--

CREATE TABLE `categories` (
  `id` smallint(6) UNSIGNED NOT NULL,
  `category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_icelandic_ci;

--
-- A tábla adatainak kiíratása `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'Bogyós'),
(2, 'Magyaros');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `products`
--

CREATE TABLE `products` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `category_id` smallint(6) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `price` mediumint(9) NOT NULL,
  `stock` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `picture`, `price`, `stock`) VALUES
(1, 1, 'Málna', 'Kézzel termelt egészség', 'malna.jpg', 3800, 500),
(2, 1, 'Áfonya', 'Az erdő kincse az otthonodba', 'afonya.jpg', 3250, 120),
(3, 1, 'Szeder', 'A hagyományos csemege', 'szeder.jpg', 1700, 40),
(4, 1, 'Eper', 'Egy tavaszi harapás', 'eper.jpg', 1440, 0),
(5, 1, 'Homoktövis', 'Mezei csemege', 'homoktovis.jpg', 3200, 100),
(6, 1, 'Som', 'A fanyar gyönyör', 'som.jpg', 900, 10),
(7, 1, 'Fanyarka', 'Édes mint a méz', 'fanyarka.jpg', 990, 25),
(8, 1, 'Piszke', 'Egres', 'piszke.jpg', 750, 100),
(9, 1, 'Ribizli', 'Fanyar, vasban gazdag', 'ribizli.jpg', 1300, 170),
(10, 2, 'Meggy', 'A falusi kincs', 'meggy.jpg', 600, 300),
(11, 2, 'Cseresznye', 'A falusi kincs', 'cseresznye.jpg', 900, 300),
(12, 2, 'Szilva', 'A falusi kincs', 'szilva.jpg', 770, 200);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `pass` varchar(36) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `role` varchar(12) COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `email`, `pass`, `role`) VALUES
(1, 'rrd@webmania.cc', 'HűDeTitkos!', 'admin'),
(4, 'senki@sehol.se', 'Gauranga', 'user');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_products_categories_idx` (`category_id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `categories`
--
ALTER TABLE `categories`
  MODIFY `id` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `products`
--
ALTER TABLE `products`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
