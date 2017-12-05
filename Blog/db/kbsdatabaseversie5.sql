-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 05 dec 2017 om 13:07
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
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `artikel`
--

INSERT INTO `artikel` (`artikelnr`, `titel`, `tekst`, `thumbnail`, `auteur`, `datum`, `afbeelding`, `status`) VALUES
(1, 'hopenlijk doet ie het', '&lt;p&gt;haha doei&lt;/p&gt;', '963', 123, '2017-12-05', 'hfhfh', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bezoeker`
--

CREATE TABLE `bezoeker` (
  `reviewnr` int(11) NOT NULL,
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
  `reviewnr` int(11) NOT NULL,
  `tekst` varchar(1000) NOT NULL,
  `auteur` int(11) NOT NULL
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
  `wwhash` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `medewerker`
--

INSERT INTO `medewerker` (`mnr`, `voornaam`, `achternaam`, `email`, `functie`, `wwhash`) VALUES
(1, 'klaas', 'gering', 'pp@gmail.com', 2, 'galkldkflaskdgal'),
(2, 'piet', 'pietjes', 'piet@hotmail.nl', 2, 'galkldkflaskdgal'),
(123, 'Vindbaar In', 'Vindbaar In', 'test@test.nl', 2, 'wwhashisalgeheim');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `rating`
--

CREATE TABLE `rating` (
  `artikelnr` int(11) NOT NULL,
  `reviewnr` int(11) NOT NULL,
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
  ADD PRIMARY KEY (`reviewnr`);

--
-- Indexen voor tabel `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`commentnr`),
  ADD KEY `fk_comment_medewerker1_idx` (`auteur`),
  ADD KEY `fk_comment_review1_idx` (`reviewnr`);

--
-- Indexen voor tabel `medewerker`
--
ALTER TABLE `medewerker`
  ADD PRIMARY KEY (`mnr`);

--
-- Indexen voor tabel `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`reviewnr`),
  ADD KEY `fk_review_artikel_idx` (`artikelnr`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `artikelnr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `comment`
--
ALTER TABLE `comment`
  MODIFY `commentnr` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `medewerker`
--
ALTER TABLE `medewerker`
  MODIFY `mnr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
--
-- AUTO_INCREMENT voor een tabel `rating`
--
ALTER TABLE `rating`
  MODIFY `reviewnr` int(11) NOT NULL AUTO_INCREMENT;
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
  ADD CONSTRAINT `fk_comment_medewerker1` FOREIGN KEY (`auteur`) REFERENCES `medewerker` (`mnr`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `maakt` FOREIGN KEY (`reviewnr`) REFERENCES `bezoeker` (`reviewnr`),
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`reviewnr`) REFERENCES `comment` (`reviewnr`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`artikelnr`) REFERENCES `artikel` (`artikelnr`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
