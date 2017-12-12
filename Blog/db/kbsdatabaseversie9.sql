-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 11 dec 2017 om 16:00
-- Serverversie: 10.1.26-MariaDB
-- PHP-versie: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_vindbaarin`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `artikel`
--

CREATE TABLE `artikel` (
  `artikelnr` int(11) NOT NULL,
  `titel` varchar(45) NOT NULL,
  `tekst` varchar(10000) NOT NULL,
  `thumbnail` varchar(45) NOT NULL DEFAULT 'thumbnail.jpg',
  `auteur` int(11) NOT NULL,
  `datum` date NOT NULL,
  `afbeelding` varchar(45) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `test` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bezoeker`
--

CREATE TABLE `bezoeker` (
  `bezoekernr` int(11) NOT NULL,
  `voornaam` varchar(45) NOT NULL,
  `tussenvoegsel` varchar(10) DEFAULT NULL,
  `achternaam` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `comment`
--

CREATE TABLE `comment` (
  `commentnr` int(11) NOT NULL,
  `ratingnr` int(11) NOT NULL,
  `tekst` varchar(1000) NOT NULL,
  `auteur` int(11) NOT NULL,
  `test` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `medewerker`
--

CREATE TABLE `medewerker` (
  `mnr` int(11) NOT NULL,
  `voornaam` varchar(45) NOT NULL,
  `achternaam` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `functie` int(1) NOT NULL DEFAULT '0',
  `wwhash` varchar(1000) NOT NULL,
  `emailstatus` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `medewerker`
--

INSERT INTO `medewerker` (`mnr`, `voornaam`, `achternaam`, `email`, `functie`, `wwhash`, `emailstatus`) VALUES
(1, 'wim', 'palland', 'wimpal@hotmail.com', 2, '$2y$12$xuk8sfC.5XwGHQIyapVEA.lyXVMqjp54Yl.bcAhvic1mXMi2yI4RO', 0),
(2, 'peter', 'pakkert', 'peter.pakkert@solcon.nl', 2, '$2y$12$p1cx9KTfNJSAz.T0aWYQSuyBnu3D1vM.uFbgTMSK6mJa0JQTr8Zwe', 0),
(3, 'test', 'account', 'testaccount@email.com', 2, '$2y$12$sPYjSkA8sAW955mOIb8Z3ewg645NLYXRVr7Kj3VqAEhPEQdQ.d29.', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `rating`
--

CREATE TABLE `rating` (
  `ratingnr` int(11) NOT NULL,
  `artikelnr` int(11) NOT NULL,
  `bezoekernr` int(11) NOT NULL,
  `tekst` varchar(1000) DEFAULT NULL,
  `rating` varchar(45) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`artikelnr`),
  ADD KEY `fk_artikel_medewerker1_idx` (`auteur`);

--
-- Indexen voor tabel `bezoeker`
--
ALTER TABLE `bezoeker`
  ADD PRIMARY KEY (`bezoekernr`);

--
-- Indexen voor tabel `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`commentnr`),
  ADD KEY `fk_comment_medewerker1_idx` (`auteur`),
  ADD KEY `reviewnr` (`ratingnr`);

--
-- Indexen voor tabel `medewerker`
--
ALTER TABLE `medewerker`
  ADD PRIMARY KEY (`mnr`);

--
-- Indexen voor tabel `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`ratingnr`),
  ADD KEY `fk_review_artikel_idx` (`artikelnr`),
  ADD KEY `bezoekersnr` (`bezoekernr`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `artikelnr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT voor een tabel `bezoeker`
--
ALTER TABLE `bezoeker`
  MODIFY `bezoekernr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT voor een tabel `comment`
--
ALTER TABLE `comment`
  MODIFY `commentnr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `medewerker`
--
ALTER TABLE `medewerker`
  MODIFY `mnr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT voor een tabel `rating`
--
ALTER TABLE `rating`
  MODIFY `ratingnr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `fk_artikel_medewerker1` FOREIGN KEY (`auteur`) REFERENCES `medewerker` (`mnr`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_comment_medewerker1` FOREIGN KEY (`auteur`) REFERENCES `medewerker` (`mnr`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ratingnr` FOREIGN KEY (`ratingnr`) REFERENCES `rating` (`ratingnr`);

--
-- Beperkingen voor tabel `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `bezoeker` FOREIGN KEY (`bezoekernr`) REFERENCES `bezoeker` (`bezoekernr`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`artikelnr`) REFERENCES `artikel` (`artikelnr`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
