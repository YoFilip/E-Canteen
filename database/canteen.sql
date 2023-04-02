-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 02 Kwi 2023, 21:14
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `canteen`
--

-- ------------------------
-- Utworzenie bazy canteen
CREATE DATABASE canteen;
USE canteen;
-- ------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(255) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_polish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_polish_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_polish_ci NOT NULL,
  `card` int(255) NOT NULL DEFAULT 0,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `recovercode` varchar(6) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `recovercodeexpiretime` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT;

DELIMITER $$
--
-- Zdarzenia
--
CREATE DEFINER=`root`@`localhost` EVENT `recovercodehandler` ON SCHEDULE EVERY 1 SECOND STARTS '2023-04-02 16:54:53' ON COMPLETION NOT PRESERVE ENABLE DO update users set recovercode = '000000' where recovercodeexpiretime = 0$$

CREATE DEFINER=`root`@`localhost` EVENT `recovercodetimer` ON SCHEDULE EVERY 1 SECOND STARTS '2023-04-02 17:01:48' ON COMPLETION NOT PRESERVE ENABLE DO update users set recovercodeexpiretime = recovercodeexpiretime -1 where recovercodeexpiretime > 0$$


-- -------------------------------
-- Włączenie eventów
set global event_scheduler = ON;
-- -------------------------------
DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
