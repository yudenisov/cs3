-- phpMyAdmin SQL Dump
-- version 4.6.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Апр 19 2017 г., 11:12
-- Версия сервера: 5.7.12-log
-- Версия PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `pi125`
--

-- --------------------------------------------------------

--
-- Структура таблицы `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `name` text NOT NULL,
  `birthday` date DEFAULT NULL,
  `mobtel` text NOT NULL,
  `email` text NOT NULL,
  `hometel` text NOT NULL,
  `mailru` text NOT NULL,
  `gmail` text NOT NULL,
  `microsoft` text NOT NULL,
  `yahoo` text NOT NULL,
  `skype` text NOT NULL,
  `icq` text NOT NULL,
  `fb` text NOT NULL,
  `gplus` text NOT NULL,
  `ok` text NOT NULL,
  `vk` text NOT NULL,
  `twitter` text NOT NULL,
  `youtube` text NOT NULL,
  `instagram` text NOT NULL,
  `lj` text NOT NULL,
  `org` text NOT NULL,
  `url` text NOT NULL,
  `local` text NOT NULL,
  `note` text NOT NULL,
  `id` int(255) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Очистить таблицу перед добавлением данных `contacts`
--

TRUNCATE TABLE `contacts`;
--
-- Дамп данных таблицы `contacts`
--

INSERT INTO `contacts` (`name`, `birthday`, `mobtel`, `email`, `hometel`, `mailru`, `gmail`, `microsoft`, `yahoo`, `skype`, `icq`, `fb`, `gplus`, `ok`, `vk`, `twitter`, `youtube`, `instagram`, `lj`, `org`, `url`, `local`, `note`, `id`) VALUES
('Сысолятин Артём Александрович', '1900-01-01', '', 'me@pingvi.org', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'RusFrag', 'http://pingvi.org', 'Санкт-Петербург', 'Веб-разработчик', 1),
('Денисов Юрий Александрович', '1969-05-31', '+79047071125', 'yudenisov@yandex.ru', '20-74-77', 'yudenisov@mail.ru', 'yudenisov@gmail.com', 'yudenisov@hotmail.com', 'yudenisov1969@yahoo.com', 'yudenisov1969', '120105414', 'yudenisov', '', '', '', '@yudenisov', '', '@yudenisov', 'yudenisov', 'Freelance', 'http://yudenis.ucoz.ru/', 'ул. Мичурина И.В., 19/27, Саратов, Россия, 410056', 'Веб-разработчик', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
