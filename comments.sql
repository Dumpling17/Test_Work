-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 24 2019 г., 00:18
-- Версия сервера: 5.7.25
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `testdb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(12) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_birth` timestamp NOT NULL,
  `text` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '2019-10-23 07:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '2019-10-23 07:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `name`, `date_birth`, `text`, `created_at`, `updated_at`) VALUES
(1, 'First', '0000-00-00 00:00:00', 'Комментарий1', '2019-10-23 07:00:00', '2019-10-23 07:00:00'),
(2, 'Second', '0000-00-00 00:00:00', 'Комментарий2', '2019-10-23 07:00:00', '2019-10-23 07:00:00'),
(4, 'Test', '2000-09-15 21:00:00', 'Тестовый комментарий', '2019-10-23 21:16:45', '2019-10-23 21:16:45');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
