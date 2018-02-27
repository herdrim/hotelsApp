-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 14 Sty 2018, 18:39
-- Wersja serwera: 10.1.26-MariaDB
-- Wersja PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `hotele`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `hotel`
--

CREATE TABLE `hotel` (
  `id` int(11) NOT NULL,
  `miasto` varchar(50) NOT NULL,
  `ulica` varchar(50) NOT NULL,
  `numer` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `hotel`
--

INSERT INTO `hotel` (`id`, `miasto`, `ulica`, `numer`) VALUES
(1, 'Krakow', 'StarowiÅ›lna', '60'),
(2, 'Katowice', 'Aleja Korfantego', '34');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pokoje`
--

CREATE TABLE `pokoje` (
  `id` int(11) NOT NULL,
  `komfort` int(11) NOT NULL,
  `liczbaOsob` int(11) NOT NULL,
  `lozka` int(11) NOT NULL,
  `idHotelu` int(11) NOT NULL,
  `cena` float NOT NULL,
  `zdjecie` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `pokoje`
--

INSERT INTO `pokoje` (`id`, `komfort`, `liczbaOsob`, `lozka`, `idHotelu`, `cena`, `zdjecie`) VALUES
(2, 5, 2, 1, 2, 280, NULL),
(3, 4, 2, 2, 1, 700, '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rezerwacja`
--

CREATE TABLE `rezerwacja` (
  `id` int(11) NOT NULL,
  `idPokoju` int(11) NOT NULL,
  `idUzytkownika` int(11) NOT NULL,
  `dataPoczatek` date NOT NULL,
  `dataKoniec` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `rezerwacja`
--

INSERT INTO `rezerwacja` (`id`, `idPokoju`, `idUzytkownika`, `dataPoczatek`, `dataKoniec`) VALUES
(1, 2, 5, '2018-01-15', '2018-01-16'),
(2, 2, 5, '2018-01-18', '2018-01-20');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownik`
--

CREATE TABLE `uzytkownik` (
  `id` int(11) NOT NULL,
  `imie` varchar(30) NOT NULL,
  `nazwisko` varchar(30) NOT NULL,
  `dataUrodzenia` date NOT NULL,
  `nrDowodu` varchar(15) NOT NULL,
  `rola` varchar(20) NOT NULL,
  `idRezerwacji` int(11) DEFAULT NULL,
  `login` varchar(30) NOT NULL,
  `haslo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `uzytkownik`
--

INSERT INTO `uzytkownik` (`id`, `imie`, `nazwisko`, `dataUrodzenia`, `nrDowodu`, `rola`, `idRezerwacji`, `login`, `haslo`) VALUES
(5, 'Marcin', 'Pindel', '1997-12-13', 'ABC 123456', 'admin', NULL, 'root', '50bff59d88163cc0804dfd865d424505170fb9cf'),
(7, 'Abcd', 'Efgh', '1990-05-05', 'Abc 123488', 'user', NULL, 'uzytkownik', '50bff59d88163cc0804dfd865d424505170fb9cf');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pokoje`
--
ALTER TABLE `pokoje`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rezerwacja`
--
ALTER TABLE `rezerwacja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uzytkownik`
--
ALTER TABLE `uzytkownik`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `pokoje`
--
ALTER TABLE `pokoje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `rezerwacja`
--
ALTER TABLE `rezerwacja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
