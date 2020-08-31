-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2020 at 09:40 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr13_paulina_biszta_bigevents`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` int(11) NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `name`, `date`, `description`, `img`, `capacity`, `email`, `phone`, `street`, `zipcode`, `city`, `url`, `type`) VALUES
(1, 'Hundertwasser - Schiele', '2020-08-10 19:30:00', 'Painting Exhibition', 'https://images.pexels.com/photos/1257890/pexels-photo-1257890.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940', 75, 'hundertwasser@info.at', '765433212', 'Museumsplatz 1', 1070, 'Vienna', 'https://events.wien.info/en/11ad/hundertwasser-schiele/', 'Art'),
(2, 'Richard Neutra', '2020-07-01 20:00:00', 'California Living - photography', 'https://events.wien.info/media/full/RichardNeutra.jpg', 100, 'hundertwasser@info.at', '8876654321', 'Felderstraße 6-8', 1010, 'Vienna', 'https://events.wien.info/en/10s9/richard-neutra/', 'Art'),
(3, 'Yuja Wang - concert', '2020-09-09 18:45:00', 'Classical Music, piano', 'https://images.pexels.com/photos/1293563/pexels-photo-1293563.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940', 800, 'opera@info.com', '765433212', 'Musikvereinsplatz 1', 1010, 'Vienna', 'https://musik2020.wien.info/en-us/yuja-wang', 'Music'),
(4, 'Vienna Boys\' Choir', '2020-09-23 15:30:00', '100 voices in the Augarten', 'https://images.pexels.com/photos/3420517/pexels-photo-3420517.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940', 1000, 'concert@info.com', '765432190', 'Am Augartenspitz 1', 1020, 'Vienna', 'https://www.wien.info/en/music-stage-shows/opera-operetta/boys-choir', 'Music'),
(5, 'Vienna State Ballet', '2020-12-09 20:00:00', 'Under the direction of Martin Schläpfer.', 'https://images.pexels.com/photos/358010/pexels-photo-358010.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940', 500, 'info@events.com', '765433212', 'Opernring 2', 1010, 'Vienna', 'https://www.wien.info/en/music-stage-shows/dance/vienna-state-ballet', 'Dance'),
(6, 'Vienna Opera Ball', '2021-01-01 19:00:00', 'The world’s most famous ballroom.', 'https://images.pexels.com/photos/548083/pexels-photo-548083.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940', 1000, 'opera@info.com', '765433212', 'Opernring 2', 1010, 'Vienna', 'https://www.wien.info/en/music-stage-shows/dance/vienna-opera-ball', 'Dance'),
(7, 'Cats', '2020-11-07 19:45:00', 'Musicall', 'https://www.wien.info/media/images/cats-london-palladium-demeter-bomablurina-jellylorium-ronacher-3to2.jpeg/image_imageblock_thumb-4x', 500, 'opera@info.com', '765433212', 'Seilerstätte 9', 1010, 'Vienna', 'https://www.wien.info/en/music-stage-shows/musicals/cats-musical', 'Music'),
(8, 'The Hahnloser Collection', '2021-01-01 10:00:00', 'From Cézanne to Matisse and Van Gogh', 'https://images.pexels.com/photos/2956376/pexels-photo-2956376.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940', 350, 'albertina@info.at', '765433212', 'Albertinaplatz 1', 1010, 'Vienna', 'https://www.wien.info/en/sightseeing/museums-exhibitions/albertina-hahnloser-collection', 'Art'),
(9, 'Dancing on impulse', '2020-09-10 20:30:00', 'Europe’s largest dance festival', 'https://images.pexels.com/photos/690597/pexels-photo-690597.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940', 200, 'dance@info.at', '654321898', 'Museumsplatz 1', 1070, 'Vienna', 'https://www.wien.info/en/music-stage-shows/dance/dancing-on-impulse', 'Dance'),
(12, 'Philharmonic Summer Night Concert', '2020-09-12 18:00:00', 'Concert at Park at Schönbrunn Palace', 'https://www.wien.info/media/images/sommernachtskonzert-schoenbrunn-2019-wiener-philharmoniker-blick-auf-neptunbrunnen-park-schloss-3to2.jpeg/image_gallery', 2000, 'info@info.at', '123456789', 'Maxingstraße', 1130, 'Vienna', 'https://www.wien.info/en/music-stage-shows/classic/vienna-philharmonic-summer-night-concert', 'Music'),
(13, 'Where misfitting fits', '2020-08-10 10:00:00', 'Very special exhibition at the mumok', 'https://www.wien.info/media/images/misfitting-together-mumok-2020.jpg/image_gallery', 200, 'info@info.at', '123456789', 'Maxingstraße', 1130, 'Vienna', 'https://www.wien.info/en/sightseeing/museums-exhibitions/misfitting-together-mumok', 'Art'),
(14, 'Naturally on a large scale', '2021-01-01 08:00:00', 'Nature dominates the work of Herbert Brandl.', 'https://www.wien.info/media/images/herbert-brandl-belvedere-21-2020.jpg/image_gallery', 100, 'info@info.at', '123456789', 'Maxingstraße', 1130, 'Vienna', 'https://www.wien.info/en/sightseeing/museums-exhibitions/contemporary-art/herbert-brandl-belvedere21', 'Art');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
