-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2018 at 09:39 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cas13`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategorije`
--

CREATE TABLE `kategorije` (
  `kategorija` varchar(5) NOT NULL,
  `opis` varchar(255) NOT NULL,
  `trajanje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategorije`
--

INSERT INTO `kategorije` (`kategorija`, `opis`, `trajanje`) VALUES
('A', 'motocikl', 5),
('B', 'automobil', 10),
('C', 'kamion', 10),
('D', 'autobus', 5);

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `idkor` int(11) NOT NULL,
  `ime` varchar(255) NOT NULL,
  `prezime` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `proizvodjac`
--

CREATE TABLE `proizvodjac` (
  `imepr` varchar(255) NOT NULL,
  `zemljaporekla` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proizvodjac`
--

INSERT INTO `proizvodjac` (`imepr`, `zemljaporekla`) VALUES
('Alfa romeo', 'Italija'),
('Audi', 'Nemacka'),
('BMW', 'Nemacka'),
('Citroen', 'Francuska'),
('Fiat', 'Italija'),
('Honda', 'Japan'),
('Toyota', 'Japan'),
('Volvo', 'Svedska');

-- --------------------------------------------------------

--
-- Table structure for table `vozac`
--

CREATE TABLE `vozac` (
  `idvoz` int(11) NOT NULL,
  `ime` varchar(100) NOT NULL,
  `prezime` varchar(100) NOT NULL,
  `godiste` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vozac`
--

INSERT INTO `vozac` (`idvoz`, `ime`, `prezime`, `godiste`) VALUES
(2, 'Pedja', 'Dragicevic', 1981),
(3, 'Nikola', 'Simonovic', 1993),
(5, 'Zile', 'Kuzminac', 1987);

-- --------------------------------------------------------

--
-- Table structure for table `vozacvozilo`
--

CREATE TABLE `vozacvozilo` (
  `idvzl` int(11) NOT NULL,
  `idvoz` int(11) NOT NULL,
  `vremedodele` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vozacvozilo`
--

INSERT INTO `vozacvozilo` (`idvzl`, `idvoz`, `vremedodele`) VALUES
(2, 5, '2018-03-20 19:49:48'),
(3, 2, '2018-03-20 19:50:48'),
(9, 3, '2018-03-20 19:50:48');

-- --------------------------------------------------------

--
-- Table structure for table `vozilo`
--

CREATE TABLE `vozilo` (
  `idvzl` int(11) NOT NULL,
  `imepro` varchar(255) NOT NULL,
  `model` varchar(50) NOT NULL,
  `kategorija` varchar(5) NOT NULL,
  `godiste` int(11) NOT NULL,
  `kubikaza` int(11) NOT NULL,
  `cena` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vozilo`
--

INSERT INTO `vozilo` (`idvzl`, `imepro`, `model`, `kategorija`, `godiste`, `kubikaza`, `cena`) VALUES
(1, 'Fiat', 'grande punto', 'B', 2007, 1400, 3000),
(2, 'Citroen', 'c5', 'B', 2008, 2000, 7000),
(3, 'Honda', 'hornet', 'A', 2003, 650, 3000),
(4, 'Volvo', 'fh', 'D', 2009, 3000, 30000),
(5, 'Volvo', 'truck', 'C', 2006, 2800, 26500),
(6, 'BMW', '320', 'B', 2003, 1900, 3500),
(9, 'Alfa romeo', '159', 'B', 2007, 900, 4500),
(10, 'BMW', 'intruder', 'A', 2004, 750, 3000),
(11, 'Audi', 'A4', 'B', 2006, 2000, 5500),
(12, 'Audi', 'A8', 'B', 2008, 4500, 16000),
(13, 'Alfa romeo', '147', 'B', 2004, 1900, 2000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategorije`
--
ALTER TABLE `kategorije`
  ADD PRIMARY KEY (`kategorija`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`idkor`);

--
-- Indexes for table `proizvodjac`
--
ALTER TABLE `proizvodjac`
  ADD PRIMARY KEY (`imepr`);

--
-- Indexes for table `vozac`
--
ALTER TABLE `vozac`
  ADD PRIMARY KEY (`idvoz`);

--
-- Indexes for table `vozacvozilo`
--
ALTER TABLE `vozacvozilo`
  ADD PRIMARY KEY (`idvzl`,`idvoz`),
  ADD KEY `idvoz` (`idvoz`);

--
-- Indexes for table `vozilo`
--
ALTER TABLE `vozilo`
  ADD PRIMARY KEY (`idvzl`),
  ADD KEY `imepro` (`imepro`),
  ADD KEY `kategorija` (`kategorija`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `idkor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vozac`
--
ALTER TABLE `vozac`
  MODIFY `idvoz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vozilo`
--
ALTER TABLE `vozilo`
  MODIFY `idvzl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `vozacvozilo`
--
ALTER TABLE `vozacvozilo`
  ADD CONSTRAINT `vozacvozilo_ibfk_1` FOREIGN KEY (`idvzl`) REFERENCES `vozilo` (`idvzl`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vozacvozilo_ibfk_2` FOREIGN KEY (`idvoz`) REFERENCES `vozac` (`idvoz`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vozilo`
--
ALTER TABLE `vozilo`
  ADD CONSTRAINT `vozilo_ibfk_1` FOREIGN KEY (`imepro`) REFERENCES `proizvodjac` (`imepr`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vozilo_ibfk_2` FOREIGN KEY (`kategorija`) REFERENCES `kategorije` (`kategorija`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
