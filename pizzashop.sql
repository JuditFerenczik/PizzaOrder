-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2021. Nov 01. 16:51
-- Kiszolgáló verziója: 10.4.19-MariaDB
-- PHP verzió: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `pizzashop`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kategoria`
--

CREATE TABLE `kategoria` (
  `kazon` int(11) NOT NULL,
  `kategorianev` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `kategoria`
--

INSERT INTO `kategoria` (`kazon`, `kategorianev`) VALUES
(3, 'feltét'),
(2, 'ital'),
(1, 'pizza');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `rendeles`
--

CREATE TABLE `rendeles` (
  `razon` int(11) NOT NULL,
  `uazon` int(11) NOT NULL,
  `idopont` datetime NOT NULL DEFAULT current_timestamp(),
  `megjegyzes` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `rendeles`
--

INSERT INTO `rendeles` (`razon`, `uazon`, `idopont`, `megjegyzes`) VALUES
(1, 25, '2021-10-31 08:51:11', 'extra sajt'),
(4, 19, '2021-10-31 09:02:18', 'extra bacon'),
(5, 19, '2021-10-31 09:02:32', 'extra szósz'),
(6, 19, '2021-10-31 09:07:46', 'extra szósz'),
(8, 19, '2021-10-31 09:12:47', 'szószos'),
(10, 19, '2021-10-31 09:15:24', 'gyorsan'),
(14, 35, '2021-10-31 09:45:16', 'extra feltét valami'),
(19, 35, '2021-10-31 21:23:32', 'hosszú'),
(27, 35, '2021-10-31 22:08:20', 'valami'),
(41, 35, '2021-11-01 12:23:51', 'kukoricával'),
(42, 35, '2021-11-01 12:24:45', 'jéghideg'),
(43, 35, '2021-11-01 12:25:15', 'party');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `termek`
--

CREATE TABLE `termek` (
  `tazon` int(11) NOT NULL,
  `nev` varchar(30) NOT NULL,
  `ar` decimal(10,0) NOT NULL,
  `kep` varchar(30) DEFAULT NULL,
  `kazon` int(11) NOT NULL COMMENT 'Kategória azonosító'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `termek`
--

INSERT INTO `termek` (`tazon`, `nev`, `ar`, `kep`, `kazon`) VALUES
(1, 'hagymas', '1200', '0.jpg', 1),
(2, 'szalamis', '1300', '1.jpg', 1),
(3, 'zoldseges', '1100', '2.jpg', 1),
(4, 'sajtos', '1000', '3.jpg', 1),
(5, 'kolbaszos', '1200', '4.jpg', 1),
(6, 'kukoricas', '1200', '5.jpg', 1),
(7, 'paradicsomos', '1200', '6.jpg', 1),
(8, 'baconos', '1500', '7.jpg', 1),
(9, 'magyaros', '1400', '8.jpg', 1),
(10, 'gombas', '1300', '9.jpg', 1),
(16, 'Capricciosa', '900', NULL, 1),
(17, 'Frutti di Mare', '1100', NULL, 1),
(18, 'Hawaii', '780', NULL, 1),
(19, 'Vesuvio', '890', NULL, 1),
(20, 'Sorrento', '990', NULL, 1),
(23, 'Coca Cola', '320', NULL, 2),
(24, 'Pepsi', '310', NULL, 2),
(25, 'Soproni Bivaly', '470', NULL, 2);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `tetel`
--

CREATE TABLE `tetel` (
  `razon` int(11) NOT NULL,
  `tazon` int(11) NOT NULL,
  `db` int(11) NOT NULL,
  `megjegyzes` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `tetel`
--

INSERT INTO `tetel` (`razon`, `tazon`, `db`, `megjegyzes`) VALUES
(1, 3, 2, 'extra sajt'),
(1, 2, 2, 'élkjhm'),
(1, 3, 4, 'extra bacon'),
(4, 3, 4, 'extra bacon'),
(5, 6, 3, 'extra szósz'),
(6, 6, 3, 'extra szósz'),
(8, 2, 3, 'szószos'),
(10, 6, 4, 'gyorsan'),
(10, 5, 4, 'élk.j,'),
(10, 7, 1, 'sok sajt'),
(10, 7, 2, 'uborkával'),
(10, 7, 2, 'uborkával'),
(10, 4, 2, 'extra saláta'),
(14, 5, 2, 'extra feltét valami'),
(19, 6, 3, 'hosszú'),
(27, 4, 4, 'valami'),
(41, 10, 4, 'kukoricával'),
(42, 20, 2, 'jéghideg'),
(43, 25, 5, 'party');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `user`
--

CREATE TABLE `user` (
  `uazon` int(11) NOT NULL,
  `loginname` varchar(40) NOT NULL,
  `vnev` varchar(30) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `cim` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `user`
--

INSERT INTO `user` (`uazon`, `loginname`, `vnev`, `phone`, `email`, `password`, `cim`) VALUES
(19, 'hapci', 'Hapci', 1263085327, 'hapci@gmail.com', '5b1c9649834273f78a897721acc3cfae', 'Bányászlak, 1. ágyikó'),
(20, 'vidor', 'Vidor', 1766534259, 'vidor@gmail.com', '5b1c9649834273f78a897721acc3cfae', 'Bányászlak, 2. ágyikó'),
(21, 'tudor', 'Tudor', 1343415345, 'tudor@gmail.com', '5b1c9649834273f78a897721acc3cfae', 'Bányászlak, 3. ágyikó'),
(22, 'kuka', 'Kuka', 1317473976, 'kuka@gmail.com', '5b1c9649834273f78a897721acc3cfae', 'Bányászlak, 4. ágyikó'),
(23, 'szende', 'Szende', 1557123872, 'szende@gmail.com', '5b1c9649834273f78a897721acc3cfae', 'Bányászlak, 5. ágyikó'),
(24, 'szundi', 'Szundi', 1033197462, 'szundi@gmail.com', '5b1c9649834273f78a897721acc3cfae', 'Bányászlak, 6. ágyikó'),
(25, 'morgó', 'Morgó', 1294615723, 'morgó@gmail.com', '5b1c9649834273f78a897721acc3cfae', 'Bányászlak, 7. ágyikó'),
(26, 'kisvillam', 'Hosszú Judit', 456789, 'lkgjjdhs@gmail.com', 'kjk', 'Ótemető 6'),
(27, 'kisgabi', 'Gábor', 123456789, 'khejg@freemail.hu', 'shjkl', 'Határ 8'),
(35, 'Doro', 'Pajkos Dorottya', 123456, 'kjffggj@gmail.com', 'sjkéjlkjg', 'kerekerdő 3'),
(37, 'nagylaci', 'Nagy László', 1234567, 'kjkhd@gmail.com', 'sfzfslhké', 'Damjanich 8'),
(42, 'Kerekes', 'Nagy Lajos', 23456, 'jgufd@gmail.com', 'dhjká', 'töltés 8');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `kategoria`
--
ALTER TABLE `kategoria`
  ADD PRIMARY KEY (`kazon`),
  ADD UNIQUE KEY `kategorianev` (`kategorianev`);

--
-- A tábla indexei `rendeles`
--
ALTER TABLE `rendeles`
  ADD PRIMARY KEY (`razon`),
  ADD KEY `fk_uazon` (`uazon`);

--
-- A tábla indexei `termek`
--
ALTER TABLE `termek`
  ADD PRIMARY KEY (`tazon`),
  ADD UNIQUE KEY `termeknev` (`nev`),
  ADD KEY `fk_kazon` (`kazon`);

--
-- A tábla indexei `tetel`
--
ALTER TABLE `tetel`
  ADD KEY `fk_razon` (`razon`),
  ADD KEY `fk_tazon` (`tazon`);

--
-- A tábla indexei `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uazon`),
  ADD UNIQUE KEY `loginname` (`loginname`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `kategoria`
--
ALTER TABLE `kategoria`
  MODIFY `kazon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `rendeles`
--
ALTER TABLE `rendeles`
  MODIFY `razon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT a táblához `termek`
--
ALTER TABLE `termek`
  MODIFY `tazon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT a táblához `user`
--
ALTER TABLE `user`
  MODIFY `uazon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `rendeles`
--
ALTER TABLE `rendeles`
  ADD CONSTRAINT `fk_uazon` FOREIGN KEY (`uazon`) REFERENCES `user` (`uazon`);

--
-- Megkötések a táblához `termek`
--
ALTER TABLE `termek`
  ADD CONSTRAINT `fk_kazon` FOREIGN KEY (`kazon`) REFERENCES `kategoria` (`kazon`);

--
-- Megkötések a táblához `tetel`
--
ALTER TABLE `tetel`
  ADD CONSTRAINT `fk_razon` FOREIGN KEY (`razon`) REFERENCES `rendeles` (`razon`),
  ADD CONSTRAINT `fk_tazon` FOREIGN KEY (`tazon`) REFERENCES `termek` (`tazon`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
