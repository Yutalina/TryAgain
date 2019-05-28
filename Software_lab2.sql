-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 28 2019 г., 21:48
-- Версия сервера: 5.6.38
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `Software_lab2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Applications`
--

CREATE TABLE `Applications` (
  `id` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `Id_service` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Applications`
--

INSERT INTO `Applications` (`id`, `id_client`, `Id_service`) VALUES
(1, 2, 1),
(2, 1, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `Clientele`
--

CREATE TABLE `Clientele` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Clientele`
--

INSERT INTO `Clientele` (`id`, `name`) VALUES
(1, 'Сидоров'),
(2, 'Петров');

-- --------------------------------------------------------

--
-- Структура таблицы `Services`
--

CREATE TABLE `Services` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Services`
--

INSERT INTO `Services` (`id`, `name`) VALUES
(1, 'услуга1'),
(2, 'услуга2'),
(3, 'услуга3');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Applications`
--
ALTER TABLE `Applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `Id_service` (`Id_service`);

--
-- Индексы таблицы `Clientele`
--
ALTER TABLE `Clientele`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `Services`
--
ALTER TABLE `Services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Applications`
--
ALTER TABLE `Applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `Clientele`
--
ALTER TABLE `Clientele`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `Services`
--
ALTER TABLE `Services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Applications`
--
ALTER TABLE `Applications`
  ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `Clientele` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `applications_ibfk_2` FOREIGN KEY (`Id_service`) REFERENCES `Services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
