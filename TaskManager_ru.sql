-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 14 2023 г., 16:56
-- Версия сервера: 8.0.30
-- Версия PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `TaskManager.ru`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Users`
--

CREATE TABLE `Users` (
  `id` int NOT NULL,
  `username` varchar(16) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `permission` char(16) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_reg` datetime DEFAULT '1001-01-01 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `Users`
--

INSERT INTO `Users` (`id`, `username`, `password`, `permission`, `date_reg`) VALUES
(1, '73ddy', 'mrblue', 'admin', '2023-02-03 17:24:13'),
(2, 'HanselMcdonald', '12345', 'member', '2023-02-03 19:03:54'),
(3, 'DerekZoolander', '12345', 'member', '2023-02-03 19:03:54'),
(4, 'burlak', '12345', 'member', '1001-01-01 00:00:00'),
(5, 'Farmer', 'qwerty73', 'member', '1001-01-01 00:00:00'),
(6, 'maaan', '12345', 'member', '1001-01-01 00:00:00'),
(7, 'giiiiirl', '12345', 'member', '1001-01-01 00:00:00'),
(8, 'Satoru', '12345', 'member', '1001-01-01 00:00:00'),
(9, 'Monster', '666666', 'member', '2023-02-09 01:19:49'),
(10, 'Hero', '137137', 'member', '2023-02-09 02:23:41'),
(11, 'WayneRooney', '19971997', 'member', '2023-02-14 21:02:55'),
(12, 'AlanShearer', '12345', 'member', '1001-01-01 00:00:00'),
(13, 'RyanGiggs', '12345', 'member', '1001-01-01 00:00:00'),
(14, 'FrankLampard', '12345', 'member', '1001-01-01 00:00:00'),
(15, 'PaulScholes', '12345', 'member', '1001-01-01 00:00:00'),
(16, 'DavidBeckham', '12345', 'member', '1001-01-01 00:00:00'),
(17, 'ShadowShaman', '12345', 'member', '1001-01-01 00:00:00'),
(18, 'Rubick', '12345', 'member', '1001-01-01 00:00:00'),
(19, 'SkywrathMage', '12345', 'member', '1001-01-01 00:00:00'),
(20, 'ShadowDemon', '12345', 'member', '1001-01-01 00:00:00'),
(21, 'Lion', '12345', 'member', '1001-01-01 00:00:00'),
(22, 'DarkWillow', '12345', 'member', '1001-01-01 00:00:00'),
(23, 'Hoodwink', '12345', 'member', '1001-01-01 00:00:00'),
(24, 'Zeus', '12345', 'member', '1001-01-01 00:00:00'),
(25, 'Poseidon', '12345', 'member', '1001-01-01 00:00:00'),
(26, 'Persephone', '12345', 'member', '1001-01-01 00:00:00'),
(27, 'Helios', '12345', 'member', '1001-01-01 00:00:00'),
(28, 'Apollo', '12345', 'member', '1001-01-01 00:00:00'),
(29, 'Hephaestus', '12345', 'member', '1001-01-01 00:00:00'),
(30, 'Pan', '12345', 'member', '1001-01-01 00:00:00');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
