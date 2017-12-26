-- phpMyAdmin SQL Dump
-- version 4.0.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 08 2014 г., 20:29
-- Версия сервера: 5.6.13-log
-- Версия PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+04:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `pi125`
--

-- --------------------------------------------------------

--
-- Структура таблицы `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `name` text NOT NULL,
  `birthday` date,
  `mobtel` text NOT NULL,
  `email` text NOT NULL,
  `hometel` text,
  `mailru` text,
  `gmail` text,
  `microsoft` text,
  `yahoo` text,
  `skype` text,
  `icq` text,
  `fb` text,
  `gplus` text,
  `ok` text,
  `vk` text,
  `twitter` text,
  `youtube` text,
  `instagram` text,
  `lj` text,
  `org` text NOT NULL,
  `url` text NOT NULL,
  `local` text NOT NULL,
  `note` text NOT NULL,
  `id` int(255) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `contacts`
--

INSERT INTO `contacts`     (`name`, `birthday`, `mobtel`, `email`, `hometel`, `mailru`, `gmail`, `microsoft`, `yahoo`, `skype`, `icq`, `fb`, `gplus`, `ok`, `vk`, `twitter`, `youtube`, `instagram`, `lj` `org`, `url`, `local`, `note`, `id`) VALUES
('Пушкин Александр Сергеевич', '1799-06-01', '+7-111-222-22-22', 'alex@pushkin.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'http://pushkin.com', 'Минеральные воды, Кавказ', 'Поэт', 1),
('Сысолятин Артём Александрович', '1900-01-01', '', 'me@pingvi.org','', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'RusFrag', 'http://pingvi.org', 'СПб', 'Web-разработчик', 2),
('Денисов Юрий Александрович', '1969-05-31', '+79047071125', 'yudenisov@yandex.ru', '20-74-77', 'yudenisov@mail.ru', 'yudenisov@gmail.com', 'yudenisov@hotmail.com', 'yudenisov1969@yahoo.com', 'yudenisov1969', '120105414', 'yudenisov', '', '', '', 'yudenisov', '', 'yudenisov', 'yudenisov',  'Freelance', 'http://yudenis.ucoz.ru', 'Саратров', 'Веб-разработчик', 3),
('Петров Иван Иванович', '1900-01-01', '+7-555-333-22-11', 'petrov@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'СПбГУ', 'http://petrov.com', 'СПб', 'Препод в универе', 4),
('Сергеев Юрий васильевич', '1900-01-01', '+1-589-789-45-69', 'sergeev@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'США', 'Вместе учились', 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
