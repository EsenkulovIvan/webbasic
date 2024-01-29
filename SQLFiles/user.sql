-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:11700
-- Время создания: Янв 29 2024 г., 14:00
-- Версия сервера: 10.8.4-MariaDB-log
-- Версия PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `list`
--

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `nickname`, `created_at`) VALUES
(6, 'qw1@mail.ru', '$2y$10$oIa.he/oYicnzMIxwl8rweWGyojwew1SHTJb/umNQeHEmKBNqNsvS', 'Iv', '2024-01-25 19:51:24'),
(8, 'protpochta.1@gmail.com', '$2y$10$SnIWy1YniP2fTeyI.K4/eOn1DoZSH0PGnb//janwJJanYEYJLPU9C', 'Nick', '2024-01-25 20:29:30'),
(9, '5@ret', '$2y$10$q2FzZYuEjMCyNmwfonL7TOZXs/iFfb7yO3eYMku8dHdsXjhFzt73O', 'Leon', '2024-01-26 12:07:21'),
(10, 'yut@gmail.com', '$2y$10$/0VudrJcIUyZEJA.A6gnHetlcfW/bhej1i8BHXQzKah5TUuAzreuq', 'Min', '2024-01-26 16:24:55'),
(11, 'jk@gmail.com', '$2y$10$9p0e7BikGtIgxGDqHkr65eQx1nihQU.4MKdTlo7XPaipsuupBmGkC', 'jk', '2024-01-26 16:34:46');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_pk2` (`email`),
  ADD UNIQUE KEY `user_pk3` (`nickname`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
