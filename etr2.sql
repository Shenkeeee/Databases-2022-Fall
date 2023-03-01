-- phpMyAdmin SQL Dump
-- version 5.2.1-dev+20221120.7c8a3aee3a
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2022. Nov 27. 22:08
-- Kiszolgáló verziója: 10.4.24-MariaDB
-- PHP verzió: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `etr2`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `epulet`
--

CREATE TABLE `epulet` (
  `Epuletkod` varchar(50) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `Cim` varchar(100) COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `epulet`
--

INSERT INTO `epulet` (`Epuletkod`, `Cim`) VALUES
('BO', 'Szeged, Aradi vertanuk tere 1'),
('IR', 'Szeged, Tisza Lajos krt. 103'),
('TIK', 'Szeged, Ady ter 10');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalok`
--

CREATE TABLE `felhasznalok` (
  `EHAkod` varchar(20) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `SzuletesiDatum` date DEFAULT NULL,
  `Lakcim` varchar(100) COLLATE utf8mb4_hungarian_ci DEFAULT NULL,
  `Nev` varchar(30) COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `felhasznalok`
--

INSERT INTO `felhasznalok` (`EHAkod`, `SzuletesiDatum`, `Lakcim`, `Nev`) VALUES
('ALFALMOS.SZE', '2002-05-31', 'Szeged, Retek utca 2\r\n', 'Alfoldi Almos'),
('ARANEMIL.SZE', '1988-09-12', 'Morahalom, Dozsa Gyorgy utca 3\r\n', 'Arany Emil'),
('BORJANOS.SZE', '1997-12-23', NULL, 'Borbely Janos'),
('FULEDINA.SZE', '1997-04-23', NULL, 'Fulop Edina'),
('GALPETER.SZE', '2001-04-26', NULL, 'Gal Peter'),
('GULALMOS.SZE', '2001-11-18', NULL, 'Gulyas Almos'),
('GULGERGELY.SZE', '1997-01-07', NULL, 'Gulyas Gergely'),
('KISJANOS.SZE', '2004-09-26', NULL, 'Kis Janos'),
('KISPETER.SZE', '2000-06-05', 'Szeged, Vasarhelyi Pal ut 65', 'Kiss Peter'),
('LAKAMATE.SZE', '2000-06-11', NULL, 'Lakatos Mate'),
('LOISTVAN.SZE', '1993-08-07', 'Szeged, Dozsa Gyorgy utca 22\r\n', 'London Istvan'),
('LOPTAMAS.SZE', '1988-08-14', 'Szeged, Festo utca 10\r\n', 'Lopejszki Tamas'),
('NAGJANOS.SZE', '2001-03-05', 'Szeged, Vasarhelyi Pal ut 70\r\n', 'Nagy Janos'),
('NAGYLIZA.SZE', '1998-10-28', NULL, 'Nagy Liza'),
('NAGYMATE.SZE', '2000-03-04', NULL, 'Nagy Mate'),
('PALLIZA.SZE', '2004-01-05', NULL, 'Pal Liza'),
('PALNOEMI.SZE', '2002-04-13', 'Szeged, Vasarhelyi Pal ut 72\r\n', 'Pal Noemi'),
('SARBENCE.SZE', '1993-09-09', 'Szeged, Tapai utca 18\r\n', 'Sarga Bence'),
('SZEJANOS.SZE', '2003-03-01', NULL, 'Szegedi Janos'),
('SZEKISTVAN.SZE', '2000-08-08', NULL, 'Szekeres Istvan'),
('SZEKVINCE.SZE', '2000-05-05', NULL, 'Szekeres Vince'),
('SZOARPAD.SZE', '1989-04-27', 'Morahalom, Szolo utca 15\r\n', 'Szombathelyi Arpad'),
('TAKMENYHERT.SZE', '2000-07-30', NULL, 'Takacs Menyhert'),
('TAKRICHARD.SZE', '1997-06-11', NULL, 'Takacs Richard'),
('TOTDIANA.SZE', '2000-02-08', NULL, 'Toth Diana'),
('VASKINGA.SZE', '1999-07-04', NULL, 'Vass Kinga');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `hallgatok`
--

CREATE TABLE `hallgatok` (
  `EHAkod` varchar(30) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `atlag` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `hallgatok`
--

INSERT INTO `hallgatok` (`EHAkod`, `atlag`) VALUES
('ALFALMOS.SZE', 3.54),
('BORJANOS.SZE', 2.88),
('FULEDINA.SZE', 3.92),
('GALPETER.SZE', 3.54),
('GULALMOS.SZE', 4.14),
('GULGERGELY.SZE', 4.23),
('KISJANOS.SZE', 4.88),
('KISPETER.SZE', 4.32),
('LAKAMATE.SZE', 3.45),
('NAGJANOS.SZE', 4.96),
('NAGYLIZA.SZE', 3.08),
('NAGYMATE.SZE', 3.55),
('PALLIZA.SZE', 4.65),
('PALNOEMI.SZE', 3.42),
('SZEJANOS.SZE', 3.11),
('SZEKISTVAN.SZE', 2.88),
('SZEKVINCE.SZE', 3.44),
('TAKMENYHERT.SZE', 5.33),
('TAKRICHARD.SZE', 6.08),
('TOTDIANA.SZE', 4.04),
('VASKINGA.SZE', 4.77);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kurzus`
--

CREATE TABLE `kurzus` (
  `Kurzuskod` varchar(30) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `Mikor` time NOT NULL,
  `JelentkezettSzam` int(11) DEFAULT NULL,
  `MelyikNapon` varchar(10) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `EHAkod` varchar(20) COLLATE utf8mb4_hungarian_ci DEFAULT NULL,
  `Ajtoszam` varchar(11) COLLATE utf8mb4_hungarian_ci DEFAULT NULL,
  `Epuletkod` varchar(50) COLLATE utf8mb4_hungarian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `kurzus`
--

INSERT INTO `kurzus` (`Kurzuskod`, `Mikor`, `JelentkezettSzam`, `MelyikNapon`, `EHAkod`, `Ajtoszam`, `Epuletkod`) VALUES
('IB089e', '10:00:00', 10, 'Csutortok', 'ALFALMOS.SZE', '222', 'BO'),
('IB104L', '14:00:00', 20, 'Kedd', 'ARANEMIL.SZE', '110', NULL),
('IB153e', '10:00:00', 60, 'Kedd', 'LOPTAMAS.SZE', '227', 'IR'),
('IB153l', '09:00:00', 27, 'Kedd', 'SZOARPAD.SZE', '110', 'IR'),
('IB162E', '14:00:00', 20, 'Hetfo', 'LOISTVAN.SZE', '222', 'IR'),
('IB204E', '10:00:00', 40, 'Csutortok', 'ALFALMOS.SZE', '227', 'IR'),
('IB204L-00001', '13:00:00', 30, 'Kedd', 'SZOARPAD.SZE', '215', 'IR'),
('IB302g', '12:00:00', 30, 'Kedd', 'ARANEMIL.SZE', '215', NULL),
('IB402e', '16:00:00', 27, 'Szerda', 'LOPTAMAS.SZE', '227', 'IR'),
('IB402g', '20:00:00', 25, 'Hetfo', 'LOISTVAN.SZE', '222', NULL),
('IB407e', '13:00:00', 30, 'Hetfo', 'SZOARPAD.SZE', '215', NULL),
('IB407g', '13:00:00', 18, 'Kedd', 'ARANEMIL.SZE', '227', 'IR'),
('IB501g', '12:00:00', 20, 'Csutortok', 'SZOARPAD.SZE', '110', NULL),
('IB521G', '17:00:00', 30, 'Szerda', 'ARANEMIL.SZE', '219', NULL),
('IB714e', '20:00:00', 20, 'Kedd', 'LOPTAMAS.SZE', '222', 'IR'),
('IB714g', '19:00:00', 15, 'Hetfo', 'SZOARPAD.SZE', '222', 'IR'),
('IBK203E', '19:00:00', 20, 'Hetfo', 'ARANEMIL.SZE', '219', NULL),
('IBK203G', '17:00:00', 18, 'Szerda', 'LOPTAMAS.SZE', '110', NULL),
('IBK301E', '15:00:00', 25, 'Szerda', 'LOISTVAN.SZE', '222', 'IR'),
('IBK301G', '14:00:00', 40, 'Csutortok', 'LOPTAMAS.SZE', '227', NULL),
('IBK309G', '16:00:00', 120, 'Hetfo', 'LOPTAMAS.SZE', '219', 'IR'),
('IBK604E', '10:00:00', 30, 'Pentek', 'LOPTAMAS.SZE', '216', 'BO'),
('IBK604G', '12:00:00', 120, 'Pentek', 'LOISTVAN.SZE', '217', 'IR'),
('IBT202G', '11:00:00', 18, 'Hetfo', 'ALFALMOS.SZE', '213', 'IR'),
('MBNX363E', '15:00:00', 15, 'Csutortok', 'LOISTVAN.SZE', '217', 'IR'),
('MBNXK111E', '09:00:00', 30, 'Hetfo', 'LOPTAMAS.SZE', '111', 'IR'),
('MBNXK111G', '10:00:00', 20, 'Csutortok', 'SZOARPAD.SZE', '216', 'BO'),
('MBNXK112E', '18:00:00', 30, 'Hetfo', 'ARANEMIL.SZE', '217', NULL),
('MBNXK112G', '16:00:00', 20, 'Szerda', 'LOPTAMAS.SZE', '216', NULL),
('MBNXK114E', '19:00:00', 22, 'Kedd', 'SZOARPAD.SZE', '212', 'IR'),
('MBNXK114G', '19:00:00', NULL, 'Pentek', 'LOISTVAN.SZE', '213', 'IR'),
('MBNXK262E', '10:00:00', 22, 'Kedd', 'LOISTVAN.SZE', '213', 'IR'),
('MBNXK262G', '11:00:00', NULL, 'Hetfo', 'SZOARPAD.SZE', '217', NULL),
('MBNXK311E', '12:00:00', 30, 'Szerda', 'ARANEMIL.SZE', '216 ', 'BO'),
('MBNXK311G', '16:00:00', 100, 'Hetfo', 'ALFALMOS.SZE', '213', NULL),
('XA0021-HatTan_OnlEL_I.', '15:00:00', 14, 'Kedd', 'ARANEMIL.SZE', 'A001', 'TIK'),
('XA0021-HSUP_ I.', '09:00:00', 30, 'Szerda', 'LOPTAMAS.SZE', 'A001', 'TIK'),
('XA0021-HSUP_ II.', '13:00:00', 27, 'Csutortok', 'LOPTAMAS.SZE', 'A001', 'TIK'),
('XA0031-ALK', '10:00:00', 25, 'Kedd', 'SZOARPAD.SZE', '217', 'IR'),
('XT0011-00029', '15:00:00', 30, 'Kedd', 'LOPTAMAS.SZE', '216', 'IR');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `oktato`
--

CREATE TABLE `oktato` (
  `EHAkod` varchar(30) COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `oktato`
--

INSERT INTO `oktato` (`EHAkod`) VALUES
('ALFALMOS.SZE'),
('ARANEMIL.SZE'),
('LOISTVAN.SZE'),
('LOPTAMAS.SZE'),
('SZOARPAD.SZE');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `terem`
--

CREATE TABLE `terem` (
  `Ajtoszam` varchar(11) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `Ferohely` int(11) DEFAULT NULL,
  `Epuletkod` varchar(50) COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `terem`
--

INSERT INTO `terem` (`Ajtoszam`, `Ferohely`, `Epuletkod`) VALUES
('0002', 220, 'TIK'),
('006', 20, 'BO'),
('011', 25, 'IR'),
('012', 16, 'IR'),
('012A', 9, 'IR'),
('102', 110, 'IR'),
('103', 27, 'IR'),
('104', 20, 'IR'),
('105 ', 110, 'IR'),
('106', 45, 'IR'),
('107', 15, 'IR'),
('108', 18, 'IR'),
('109', 15, 'IR'),
('110', 15, 'IR'),
('111', 16, 'IR'),
('116', 20, 'IR'),
('212', 44, 'IR'),
('213', 30, 'IR'),
('214', 60, 'BO'),
('215 ', 29, 'IR'),
('216', 104, 'BO'),
('216', 30, 'IR'),
('217 ', 60, 'IR'),
('218', 36, 'IR'),
('219', 54, 'IR'),
('221', 25, 'IR'),
('222', 25, 'IR'),
('223', 20, 'IR'),
('224', 25, 'IR'),
('225 ', 25, 'IR'),
('226', 20, 'IR'),
('227', 18, 'IR'),
('A001', 160, 'TIK'),
('A002', 160, 'TIK');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `epulet`
--
ALTER TABLE `epulet`
  ADD PRIMARY KEY (`Epuletkod`);

--
-- A tábla indexei `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`EHAkod`);

--
-- A tábla indexei `hallgatok`
--
ALTER TABLE `hallgatok`
  ADD PRIMARY KEY (`EHAkod`) USING BTREE;

--
-- A tábla indexei `kurzus`
--
ALTER TABLE `kurzus`
  ADD PRIMARY KEY (`Kurzuskod`) USING BTREE,
  ADD KEY `MelyikNapon` (`MelyikNapon`) USING BTREE,
  ADD KEY `Mikor` (`Mikor`) USING BTREE,
  ADD KEY `EHAkod` (`EHAkod`),
  ADD KEY `Ajtoszam` (`Ajtoszam`),
  ADD KEY `Epuletkod` (`Epuletkod`);

--
-- A tábla indexei `oktato`
--
ALTER TABLE `oktato`
  ADD PRIMARY KEY (`EHAkod`);

--
-- A tábla indexei `terem`
--
ALTER TABLE `terem`
  ADD PRIMARY KEY (`Ajtoszam`,`Epuletkod`),
  ADD KEY `Epuletkod` (`Epuletkod`) USING BTREE;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `hallgatok`
--
ALTER TABLE `hallgatok`
  ADD CONSTRAINT `hallgatok_ibfk_1` FOREIGN KEY (`EHAkod`) REFERENCES `felhasznalok` (`EHAkod`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `kurzus`
--
ALTER TABLE `kurzus`
  ADD CONSTRAINT `kurzus_ibfk_1` FOREIGN KEY (`EHAkod`) REFERENCES `oktato` (`EHAkod`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `kurzus_ibfk_2` FOREIGN KEY (`Ajtoszam`) REFERENCES `terem` (`Ajtoszam`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `kurzus_ibfk_3` FOREIGN KEY (`Epuletkod`) REFERENCES `terem` (`Epuletkod`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Megkötések a táblához `oktato`
--
ALTER TABLE `oktato`
  ADD CONSTRAINT `oktato_ibfk_1` FOREIGN KEY (`EHAkod`) REFERENCES `felhasznalok` (`EHAkod`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `terem`
--
ALTER TABLE `terem`
  ADD CONSTRAINT `terem_ibfk_1` FOREIGN KEY (`Epuletkod`) REFERENCES `epulet` (`Epuletkod`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
