-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Янв 29 2017 г., 16:14
-- Версия сервера: 5.7.14
-- Версия PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mvc_site`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `public_date` datetime NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content` text NOT NULL,
  `preview` text NOT NULL,
  `link` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `public_date`, `upload_date`, `content`, `preview`, `link`) VALUES
(1527, 'Abell 3411 and Abell 3412: Astronomers Discover Powerful Cosmic Double Whammy', '2017-01-05 15:30:00', '2017-01-29 10:32:53', 'Astronomers have discovered what happens when the eruption from a supermassive black hole is swept up by the collision and merger of two galaxy clusters.', 'http://www.nasa.gov/sites/default/files/thumbnails/image/a3411.jpg', 'http://www.nasa.gov/mission_pages/chandra/abell-3411-and-abell-3412-astronomers-discover-powerful-cosmic-double-whammy.html'),
(1526, 'Your Home Planet, as Seen From Mars', '2017-01-06 18:00:00', '2017-01-29 10:32:53', 'Here is a view of Earth and its moon, as seen from Mars. It combines two images acquired on Nov. 20, 2016, by the HiRISE camera on NASA\'s Mars Reconnaissance Orbiter, with brightness adjusted separately for Earth and the moon to show details on both bodies.', 'http://www.nasa.gov/sites/default/files/thumbnails/image/pia21260.jpg', 'http://www.nasa.gov/feature/jpl/earth-and-its-moon-as-seen-from-mars'),
(1525, 'Breaking Boundaries in New Engine Designs', '2017-01-09 12:52:00', '2017-01-29 10:32:53', 'In an effort to improve fuel efficiency, NASA and the aircraft industry are rethinking aircraft design.', 'http://www.nasa.gov/sites/default/files/thumbnails/image/bli_grc.jpg', 'http://www.nasa.gov/image-feature/breaking-boundaries-in-new-engine-designs'),
(1520, 'NASA Astronaut Shane Kimbrough on Jan. 13 Spacewalk', '2017-01-17 16:29:00', '2017-01-29 10:32:53', 'Expedition 50 Commander Shane Kimbrough of NASA at work outside the International Space Station on Jan. 13, 2017, in a photo taken by fellow spacewalker Thomas Pesquet of ESA. The two astronauts successfully installed three new adapter plates and hooked up electrical connections for three of the six new lithium-ion batteries on the station.', 'http://www.nasa.gov/sites/default/files/thumbnails/image/32260740536_2866cf4065_o.jpg', 'http://www.nasa.gov/image-feature/nasa-astronaut-shane-kimbrough-on-jan-13-spacewalk'),
(1524, 'Rocky Mountains From Orbit', '2017-01-10 15:35:00', '2017-01-29 10:32:53', 'Expedition 50 Flight Engineer Thomas Pesquet of the European Space Agency photographed the Rocky Mountains from his vantage point in low Earth orbit aboard the International Space Station. He shared the image with his social media followers on Jan. 9, 2017, writing, "the Rocky mountains are a step too high – even for the clouds to cross."', 'http://www.nasa.gov/sites/default/files/thumbnails/image/31946589405_deb63e02d6_o.jpg', 'http://www.nasa.gov/image-feature/rocky-mountains-from-orbit'),
(1523, 'NASA Astronaut Peggy Whitson\'s 7th Spacewalk', '2017-01-11 15:08:00', '2017-01-29 10:32:53', 'Flight Engineer Peggy Whitson along with Expedition 50 Commander Shane Kimbrough successfully installed three new adapter plates and hooked up electrical connections for three of the six new lithium-ion batteries on the International Space Station during last week\'s spacewalk.', 'http://www.nasa.gov/sites/default/files/thumbnails/image/peggyw_spacewalk.jpg', 'http://www.nasa.gov/image-feature/nasa-astronaut-peggy-whitsons-7th-spacewalk'),
(1522, 'Well-Preserved Impact Ejecta on Mars', '2017-01-12 20:28:00', '2017-01-29 10:32:53', 'This image of a well-preserved unnamed elliptical crater in Terra Sabaea, is illustrative of the complexity of ejecta deposits forming as a by-product of the impact process that shapes much of the surface of Mars.', 'http://www.nasa.gov/sites/default/files/thumbnails/image/pia13078.jpg', 'http://www.nasa.gov/image-feature/jpl/well-preserved-impact-ejecta-on-mars'),
(1521, 'Crescent Jupiter with the Great Red Spot', '2017-01-13 18:00:00', '2017-01-29 10:32:53', 'This image of a crescent Jupiter and the iconic Great Red Spot was created by a citizen scientist (Roman Tkachenko) using data from Juno\'s JunoCam instrument.', 'http://www.nasa.gov/sites/default/files/thumbnails/image/pia21376d.jpg', 'http://www.nasa.gov/image-feature/jpl/crescent-jupiter-with-the-great-red-spot'),
(1513, 'Apollo 1 Crew Honored', '2017-01-27 15:58:00', '2017-01-29 10:32:53', 'Astronauts, from the left, Gus Grissom, Ed White II and Roger Chaffee stand near Cape Kennedy\'s Launch Complex 34 during training for Apollo 1 in January 1967.', 'http://www.nasa.gov/sites/default/files/thumbnails/image/s67-19766.jpg', 'http://www.nasa.gov/image-feature/apollo-1-crew-honored'),
(1514, 'January 1986 - Voyager 2 Flyby of Miranda', '2017-01-26 17:34:00', '2017-01-29 10:32:53', 'Uranus\' moon Miranda is shown in a computer-assembled mosaic of images obtained Jan. 24, 1986, by the Voyager 2 spacecraft. Miranda is the innermost and smallest of the five major Uranian satellites, just 480 kilometers (about 300 miles) in diameter. Nine images were combined to obtain this full-disc, south-polar view.', 'http://www.nasa.gov/sites/default/files/thumbnails/image/9464656357_dcd9554a40_o.jpg', 'http://www.nasa.gov/image-feature/january-1986-voyager-2-flyby-of-miranda'),
(1515, 'Juno’s Close Look at a Little Red Spot', '2017-01-25 20:39:00', '2017-01-29 10:32:53', 'The JunoCam imager on NASA’s Juno spacecraft snapped this shot of Jupiter’s northern latitudes.', 'http://www.nasa.gov/sites/default/files/thumbnails/image/pia21378.jpg', 'http://www.nasa.gov/image-feature/jpl/pia21378/juno-s-close-look-at-a-little-red-spot'),
(1516, 'NASA Simulates Orion Spacecraft Launch Conditions for Crew', '2017-01-24 14:52:00', '2017-01-29 10:32:53', 'In a lab at NASA’s Johnson Space Center in Houston, engineers simulated conditions that astronauts in space suits would experience when the Orion spacecraft is vibrating during launch atop the agency’s powerful Space Launch System rocket on its way to deep space destinations.', 'http://www.nasa.gov/sites/default/files/thumbnails/image/p1010154.jpg', 'http://www.nasa.gov/image-feature/nasa-simulates-orion-spacecraft-launch-conditions-for-crew'),
(1517, 'New Weather Satellite Sends First Images of Earth', '2017-01-23 16:02:00', '2017-01-29 10:32:53', 'The release of the first images today from NOAA’s newest satellite, GOES-16, is the latest step in a new age of weather satellites. This composite color full-disk visible image is from 1:07 p.m. EDT on Jan. 15, 2017, and was created using several of the 16 spectral channels available on the GOES-16 Advanced Baseline Imager (ABI) instrument.', 'http://www.nasa.gov/sites/default/files/thumbnails/image/abi_full_disk_low_res_jan_15_2017.jpg', 'http://www.nasa.gov/image-feature/new-weather-satellite-sends-first-images-of-earth'),
(1518, 'Daphnis Up Close', '2017-01-19 13:20:00', '2017-01-29 10:32:53', 'The wavemaker moon, Daphnis, is featured in this view, taken as NASA\'s Cassini spacecraft made one of its ring-grazing passes over the outer edges of Saturn\'s rings on Jan. 16, 2017.', 'http://www.nasa.gov/sites/default/files/thumbnails/image/pia21056_deblurred.jpg', 'http://www.nasa.gov/image-feature/jpl/pia21056/daphnis-up-close'),
(1519, 'Possible Signs of Ancient Drying in Martian Rock', '2017-01-18 14:30:00', '2017-01-29 10:32:53', 'A grid of small polygons on the Martian rock surface near the right edge of this view may have originated as cracks in drying mud more than 3 billion years ago.', 'http://www.nasa.gov/sites/default/files/thumbnails/image/pia21263.jpg', 'http://www.nasa.gov/image-feature/jpl/pia21263/possible-signs-of-ancient-drying-in-martian-rock');

--
-- Триггеры `news`
--
DELIMITER $$
CREATE TRIGGER `auto_del` BEFORE DELETE ON `news` FOR EACH ROW BEGIN
DELETE FROM comments WHERE news_id = OLD.id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `admin`) VALUES
(3, 'Alexey', 'alex@mail.com', '111111', NULL),
(4, 'Viktor', 'fomenko@gmail.com', '111111', NULL),
(5, 'Sergey', 'serg@mail.com', '111111', NULL),
(7, 'Nikolay', 'nikolay@dsag.re', '111111', NULL),
(8, 'Gennadiy', 'gena@mail.com', '111111', NULL),
(9, 'Anatoly', 'ananas@mail.com', '111111', NULL),
(10, 'dunkan', 'mclaud@mail.com', '111111', NULL),
(11, 'vasiliy', 'pupkin@mail.com', '111111', NULL),
(12, 'Admin', '4nv@mail.com', '222222', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1528;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
