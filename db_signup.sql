-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 13 2020 г., 11:08
-- Версия сервера: 5.7.15
-- Версия PHP: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `signup`
--

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `trip` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `dates` varchar(255) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `img`, `title`, `trip`, `duration`, `dates`, `price`) VALUES
(1, 'img/main/main-photo_1.png', 'Тур "В гости к троллям"​', 'Германия - Дания - Норвегия - Германия', '12-14 дней', '07.07.2021 - 19.07.2021', 1000),
(2, 'img/main/main-photo_2.png', 'Тур "Альпы"', 'Германия - Италия - Австрия - Швейцария', '13-17 дней', '14.09.2021 - 28.09.2021', 1500),
(3, 'img/main/main-photo_3.png', 'Тур "Сердце Африки"', 'Кения - Уганда - Руанда - Танзания', '13 дней', '05.09.2021 - 18.09.2021', 2000);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(191) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `name`, `surname`, `tel`, `country`, `city`, `email`, `password`) VALUES
(1, 'Светлана', 'Светлана', 'Петрова', '+79991111111', 'Россия', 'Москва', 'test@test.ru', '12345'),
(3, 'Татьяна', 'Татьяна', 'Иванова', '+79645555555', 'Россия', 'Ростов', 'tatiana@mail.ru', '111111'),
(7, 'Борис', 'Борис', 'Дмитриев', '+79882221144', 'Россия', 'Пенза', 'boris@boris.ru', '12345'),
(15, 'Ната', 'Наталия', 'Сидорова', '+79648888888', 'Россия', 'Москва', 'nata@yandex.ru', '2222'),
(16, 'Наталия', 'Наталия', 'Сосновская', '+79634441122', 'Россия', 'Тверь', 'natali@yandex.ru', '2222'),
(18, 'Lana', 'Светлана', 'Дегтярева', '+78451234563', 'России', 'Санкт-Петербург', 'lana@lana.ru', '7878'),
(21, 'Ольга', 'Ольга', 'Чистякова', '+79031254789', 'Россия', 'Тула', 'olga@olga.ru', '555555'),
(26, 'Геннадий', 'Геннадий', 'Ветров', '+78546332563', 'Россия', 'Суздаль', 'gena@gena.ru', '1111'),
(27, 'Фаина', 'Фаина', 'Ветрова', '+78965446358', 'Россия', 'Суздаль', 'faina@faina.ru', '2222'),
(30, 'Марина', 'Марина', 'Октябрьская', '+78569554477', 'Россия', 'Нижний Новгород', 'marina@marina.ru', '5555'),
(31, 'Боня', 'Бонита', 'Соколова', '+78889645269', 'Россия', 'Москва', 'bonya@bonya.ru', '111'),
(32, 'Лисичка', 'Олеся', 'Вальтер', '+79643215648', 'Россия', 'Москва', 'olesya@olesya.ru', '123456'),
(33, 'Lena255', 'Елена', 'Горелова', '+79554112356', 'Россия', 'Псков', 'lena21@lena.ru', '1245'),
(34, 'Lena2555', 'Елена', 'Горелова', '+79554112356', 'Россия', 'Псков', 'lena21@lena.ru', '1245'),
(35, 'Valery', 'Валерия', 'Ткачева', '+79645558899', 'Россия', 'Псков', 'lera@lera.ru', '124578'),
(36, 'Beauty', 'Тата', 'Григорян', '+79185442356', 'Россия', 'Тверь', 'tata@tata.ru', '789'),
(37, 'Tamara', 'Тамара', 'Петрова', '+79645558899', 'Россия', 'Москва', 'tamara@tamara.ru', '11111'),
(38, 'Tamara91', 'Тамара', 'Петрова', '+79645558899', 'Россия', 'Москва', 'tamara@tamara.ru', '11111');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
