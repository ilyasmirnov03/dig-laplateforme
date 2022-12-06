-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 06 2022 г., 19:34
-- Версия сервера: 10.4.25-MariaDB
-- Версия PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `laplateforme`
--

-- --------------------------------------------------------

--
-- Структура таблицы `entreprises`
--

CREATE TABLE `entreprises` (
  `idEnt` int(100) NOT NULL,
  `nomEnt` varchar(100) NOT NULL,
  `labels` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `entreprises`
--

INSERT INTO `entreprises` (`idEnt`, `nomEnt`, `labels`) VALUES
(1, 'foodCharente', 'AB'),
(2, 'nourriture16', ''),
(3, 'vêtement16', 'Max Havelaar Fair Trade'),
(4, 'lesfringuesdu16', 'BioRe'),
(5, 'cosmé16', ''),
(6, 'cosmetiqueCharente', 'cosmebio'),
(7, 'laboîteatrucs16', ''),
(8, 'meubles16', 'ecolabel europpéen'),
(9, 'meublesCharente', ''),
(10, 'proprete16', 'ecolabel europpéen'),
(11, 'maroquinerie16', ''),
(12, 'maroCharente', 'ecolabel europpéen');

-- --------------------------------------------------------

--
-- Структура таблицы `produits`
--

CREATE TABLE `produits` (
  `id` int(10) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `idEnt` int(100) NOT NULL,
  `categorie` varchar(100) NOT NULL,
  `provenance` varchar(50) NOT NULL,
  `bio` varchar(20) NOT NULL,
  `impactAnimal` varchar(50) NOT NULL,
  `recup` varchar(20) NOT NULL,
  `leafScore` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `entreprises`
--
ALTER TABLE `entreprises`
  ADD PRIMARY KEY (`idEnt`);

--
-- Индексы таблицы `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idEnt` (`idEnt`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `entreprises`
--
ALTER TABLE `entreprises`
  MODIFY `idEnt` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `idEnt` FOREIGN KEY (`idEnt`) REFERENCES `entreprises` (`idEnt`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
