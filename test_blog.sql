-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 23 2022 г., 07:02
-- Версия сервера: 8.0.24
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test_blog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int NOT NULL,
  `author` varchar(15) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `text` text,
  `categorie_id` int DEFAULT NULL,
  `pubdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `views` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `author`, `title`, `image`, `text`, `categorie_id`, `pubdate`, `views`) VALUES
(1, 'QzAwYiUP', 'The Beach Boys', 'test1.jpg', 'Успех группе принесли гармоничные песни, описывающие море, солнечные пляжи и спортивные автомобили. Пик популярности The Beach Boys в Америке пришёлся на середину 1960-х годов, когда вышли такие хиты, как «Fun, Fun, Fun», «I Get Around», «California Girls», рассказывающие о жизни калифорнийской молодёжи.', 1, '2022-06-29 03:52:15', 515),
(2, 'Gv3ypz9L', 'Tom a la ferme', 'test2.jpg', '\"Юноша с волосами цвета соломы продирается сквозь стройные ряды кукурузных стеблей, больно рассекая кожу на лице и на руках о листья, которые в октябре остры, как бритва. В последнее время вся его жизнь превратилась в бег мечтателя по кукурузному полю: воспоминания и действительность ранят без ножа. Но дальше будет еще хуже.\"', 2, '2022-06-29 03:55:58', 3472),
(3, 'JNhbvvoz', 'Trainspotting', 'test3.jpg', '\"Выбери жизнь. Выбери работу. Выбери карьеру. Выбери семью. Выбери телеящик на полстены. Стиральные машины, тачки, музыкальные центры и электрооткрывалки.\r\n\r\nВыбери здоровье, еду без холестерина, медицинскую страховку. Выбери низкие ставки на недвижимость. Выбери свой первый дом. Выбери друзей.\r\nВыбери шмотки для отдыха. Выбери костюм-тройку в рассрочку из охренительно дорогой ткани. Выбери набор \"Сделай сам\" и похмельную рожу воскресным утром.\r\n\r\nВыбери диван и смотри на нем отупляющие и опустошающие телеигры.\r\n\r\nВыбери смерть в собственной постели по уши в дерьме и моче под присмотром эгоистичных, испорченных ублюдков, которых ты же и произвел на свет.\r\n\r\nВыбери жизнь. Только на кой чёрт мне это надо? Я не стал выбирать жизнь. Я выбрал кое-что другое. По какой причине? А ни по какой. Какие могут быть причины, когда есть героин?\"', 2, '2022-06-29 04:00:53', 1261),
(4, 'QzAwYiUP', 'The Velvet Underground', 'test6.jpg', '\"Мало кто покупал пластинки Velvet Underground в то время, когда они выходили, но каждый, кто купил, основал свою собственную группу\".', 1, '2022-06-29 04:07:33', 11105),
(5, 'QzAwYiUP', 'The Cure', 'test7.jpg', 'Мало кто (кроме, наверное, самых верных и старых фанатов группы) помнит, что в начале карьеры Смит, один из отцов-основателей субкультуры готов и образец для подражания для предающихся черной меланхолии подростков всех возрастов, обходился вовсе без небрежного макияжа и фирменной всклокоченной шевелюры. Трое коротко стриженых парней из провинциального Кроли в Западном Суссексе с демонстративным «анти-имиджем» — в пику господствовавшей тогда на британской сцене эстетике «новых романтиков». Да и песни с первого их альбома Three Imaginary Boys, хотя и не весьма жизнерадостны, всё же не были столь беспросветными, как последовавшие. Но настоящую, сперва «альтернативную», а к концу 1980-х годов логически переросшую в стадионную славу Смиту и довольно часто менявшейся вокруг него компании принесли мрачные экзистенциальные сочинения — и придуманный им образ замогильного зомби-клоуна с потекшими тенями вокруг глаз и ярко-красной помадой на губах (неизменно MAC Ruby Woo — информация для любителей точности и юных подражателей, число которых, кажется, не уменьшается с годами). В 1980-е обилием мейкапа на рок-сцене трудно было кого-нибудь удивить, но аляповатый макияж лидера The Cure был исключительно удобен для копирования: не такой сложный, как у Kiss, и не столь вызывающе-андрогинный, как у Бой Джорджа.', 1, '2022-06-29 04:11:46', 5136),
(6, 'eqEP0Yb7', 'Ed Templeton', 'test8.jpg', 'Ed Templeton (born July 28, 1972) is an American professional skateboarder, contemporary artist, and photographer. He is the founder of the skateboard company, Toy Machine, a company that he continues to own and manage. He is based in Huntington Beach, California.\r\n\r\nTempleton was inducted into the Skateboard Hall of Fame in 2016.', 4, '2022-06-29 04:14:50', 8615),
(7, 'Gv3ypz9L', 'Jack Bridgland', 'test9.jpg', ' ', 4, '2022-06-29 04:17:07', 11),
(8, 'eqEP0Yb7', 'xuhxyn', 'test10.jpg', '\"Напитай свои глаза чудом. Живи так, как если через десять секунд умрешь на месте. Открой глаза на мир. Он более фантастичен, чем любая греза, сделанная и оплаченная на фабрике.\"', 3, '2022-06-29 04:23:06', 7752),
(9, 'eqEP0Yb7', 'Fahrenheit 451', 'test11.jpg', '\"Мы живем в такое время, когда цветы пытаются жить за счет других цветов, вместо того чтобы жить за счет доброго дождя и черной плодородной земли.\"', 3, '2022-06-29 04:26:27', 9092),
(10, 'Gv3ypz9L', '«1984»', 'test12.jpg', '\"Лучшие книги, понял он, говорят тебе то, что ты уже сам знаешь.\"', 3, '2022-06-29 04:28:34', 10982),
(11, 'IyCAv6Uy', ' 獣兵衛忍風帖', '1657789990.jpg', 'Везде люди есть люди, а небо есть небо. Все одно и тоже.', 3, '2022-06-29 03:30:00', 63);

-- --------------------------------------------------------

--
-- Структура таблицы `articles_categories`
--

CREATE TABLE `articles_categories` (
  `id` int NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `articles_categories`
--

INSERT INTO `articles_categories` (`id`, `title`) VALUES
(1, 'Музыка'),
(2, 'Кино'),
(3, 'Искусство'),
(4, 'Фотография');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `author` varchar(100) DEFAULT NULL,
  `text` text NOT NULL,
  `pubdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `articles_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `author`, `text`, `pubdate`, `articles_id`) VALUES
(9, 'JNhbvvoz', 'Lu Rid is cool!!', '2022-07-13 01:10:32', 4),
(12, 'QzAwYiUP ', 'Yea, I am', '2022-08-23 01:41:45', 4),
(13, 'Gv3ypz9L', 'This is great, but my daughter is better', '2022-08-23 01:57:33', 2),
(15, 'IyCAv6Uy', 'This is my article!', '2022-08-23 04:23:33', 11);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(255) NOT NULL,
  `pass` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name` varchar(111) DEFAULT NULL,
  `img` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `descr` text CHARACTER SET utf8 COLLATE utf8_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `name`, `img`, `descr`) VALUES
(1, '2qu0P5zI', '202cb962ac59075b964b07152d234b70', 'Sonya Occultist', '1.jpg', 'Придёт день, и ливень смоет с улиц всю эту падаль. Когда-нибудь пойдёт дождь и смоет с улиц всю эту мерзость. Всю жизнь меня преследовало одиночество. Повсюду: в барах, в машинах, на тротуарах, в магазинах — повсюду.'),
(2, 'eqEP0Yb7', '202cb962ac59075b964b07152d234b70', 'Nastya', '1658217159.jpg', 'Придёт день, и ливень смоет с улиц всю эту падаль.'),
(3, 'Gv3ypz9L', '202cb962ac59075b964b07152d234b70', 'Julia', '1661205839.jpg', 'Лучшая женщина в мире'),
(5, 'jeT9O76z', '202cb962ac59075b964b07152d234b70', 'Geuqtor', '1658244420.jpg', 'Я не знаю, что из этого правильно и не могу тебе посоветовать. Не важно, по какому принципу ты выбираешь, никто не скажет о правильности твоего выбора.'),
(6, 'JNhbvvoz', '202cb962ac59075b964b07152d234b70', 'Sonya', '1554654546.jpg', 'Описание'),
(8, 'QzAwYiUP', '202cb962ac59075b964b07152d234b70', 'Lou Reed', '1661208371.JPG', 'True ROCK Star'),
(10, 'IyCAv6Uy', '202cb962ac59075b964b07152d234b70', 'Flock', '1661214189.jpg', 'My name is human');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `articles_categories`
--
ALTER TABLE `articles_categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
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
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `articles_categories`
--
ALTER TABLE `articles_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
