-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июн 22 2013 г., 16:55
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `tm`
--

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `title`, `text`) VALUES
(1, 'Какой-нибудь крутой заголовок!', 'Много текста ниочем, картинки, графики, что бы завлечь читателя! \r\n<div class="row">\r\n<div class="span2">\r\n<img src="http://cs410927.vk.me/v410927997/6d5f/5NSHydUom9Q.jpg" class="img-circle">\r\n</div>\r\n<div class="span2">\r\n<img  src="http://cs421131.vk.me/v421131091/31c8/9TQMjLa7PJ0.jpg" class="img-circle">\r\n</div>\r\n</div>');

-- --------------------------------------------------------

--
-- Структура таблицы `subscribers`
--

CREATE TABLE IF NOT EXISTS `subscribers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `name` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `email_2` (`email`),
  KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Дамп данных таблицы `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `name`) VALUES
(1, 'aero.artem@gmail.com', 'Artem Erofeev'),
(6, 'catch.the.wind.17@gmail.com', 'valentina'),
(23, 'aero.artem@gmail.comer', 'Artem'),
(25, 'artem@gmail.com', 'Artem'),
(26, 'ivanivanov@mail.ru', 'Ivan'),
(27, 'pert.nalich@gmail.com', 'Pert Nalich'),
(28, 'nimblegirl@mail.ru', 'Валя'),
(30, 'aero.artem@mail.ru', 'jfuij'),
(31, 'vasilii@gmail.com', 'Vasily Babich');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
