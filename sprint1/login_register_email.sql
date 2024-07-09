-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2024 at 01:06 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login_register`
--

-- --------------------------------------------------------

--
-- Table structure for table `pwdreset`
--

CREATE TABLE `pwdreset` (
  `pwdResetId` int(11) NOT NULL,
  `pwdResetEmail` text NOT NULL,
  `pwdResetSelector` text NOT NULL,
  `pwdResetToken` longtext NOT NULL,
  `pwdResetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pwdreset`
--

INSERT INTO `pwdreset` (`pwdResetId`, `pwdResetEmail`, `pwdResetSelector`, `pwdResetToken`, `pwdResetExpires`) VALUES
(50, 'frndssilva24@gmail.com', '62ef9f4ccf958506', '$2y$10$vDDy5zslYngelCchIDQ.m..DaR17f6nH9ISuQfPsrnnK4ci/FQCNq', '1717024617'),
(51, 'sofiafersil32@gmail.com', 'e6052e11becf37bd', '$2y$10$qPz0dyiSdcQ174D9umcDm.TXgCaKpBWDCewcv0DZ1U09uVji8LQcW', '1717025202');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`) VALUES
(2, 'Marco  Silva', 'marco.ferreira@culturinvest.com.br', '$2y$10$JJbyGfM7VHgn658hMT3xWe6CWhaMis0C4QP74tFp2fV3GofOvweZy'),
(3, 'Sofia Fernandes Ferreira Silva ', 'sofia.fernandesfs4@gmail.com', '$2y$10$viKC97ENQNeOvgEA.pIwFu25Aey32WhY/GfGuNL8O7iSU3FU23Bdy'),
(4, 'Rebeca Nogueira', 'beca@gmail.com', '$2y$10$8S5jqG.CXr/8bU.6G17d7O8E52UPa3Xya.Ulfo4tVGxDPQwLTyG8K'),
(5, 'olavo', 'olavo@gmail.com', '$2y$10$ongmJGi6SGanYIq4hpg/1uxjlYjiIW9GU1H/Me1UtMyO4YJlewhq.'),
(6, 'amanda', 'amanda@gmail.com', '$2y$10$Tsdn0rPnlHh90qeNHUhsQ.4MWC7PH.8fpZpGoowc28QHl1U74rEdO'),
(7, 'maria', 'maria@gmail.com', '$2y$10$P4nXUKdfziCuS2AuPvCxzuUG72vGOnJGmW4ZG747Xk.6yikBGTNzG'),
(8, 'Nicollas Pereira', 'perera@gmail.com', '$2y$10$3IAcXjx3CJjqrJaMYJofSOuvQeL1/pccp/iZAS8ZEtWBGWW3ZLXlO'),
(9, 'gleison', 'gleison@gmail.com', '$2y$10$gdxxaC1f1K1vFzF.X01o5eBj0GGRI8d12cBSERu7LTUgUppNGRMJa'),
(13, 'Sofia Fernandes Ferreira Silva ', 'sofiafersil32@gmail.com', '$2y$10$8gwnlo5fTR0gzo2wbLSDheeCad5RXLoBQ.bZZZxgcxYR3bUckskQG'),
(14, 'Joao da Silva', 'joao@gmail.com', '$2y$10$Bs9kU3RFTh5JzBkohQIVBOo6DEBeHpexwoL/ZNxtBJRguqo1VsDWG'),
(15, 'julia da silva', 'julia@gmail.com', '$2y$10$sYP5fKfws9Qb2rYllmM4NuyoxmhPA57EIDYqvo8/daBBAD2Y6CeFm'),
(16, 'claudio ferreira', 'claudio@gmail.com', '$2y$10$RAPpaD7DqLEWDFFKfecZl.XckEoojra/3jw2ycbjiFvcq6Y/IbY5K'),
(17, 'roberta', 'roberta@gmail.com', '$2y$10$OhYx0KozrzBjOevd7XEcZe5fjZuPBTvhSSf21TyDaOOcMkurDbjjW'),
(18, 'teste', 'teste@gmail.com', '$2y$10$bifpWYwTtnsgNfZaGkCw3.KeHTDoUpLd9fs7DWZRaLBu/Xs2k319y'),
(19, 'Sofia ', 'frndssilva24@gmail.com', '$2y$10$LecZAcvbr4BaNq4dX5riAOynG4ga04yCii81ba0wJTKnYukAWCxfi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`pwdResetId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwdResetId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
