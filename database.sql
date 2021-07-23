-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 23 Tem 2021, 19:02:35
-- Sunucu sürümü: 5.7.31
-- PHP Sürümü: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `demo_database`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blog`
--

DROP TABLE IF EXISTS `blog`;
CREATE TABLE IF NOT EXISTS `blog` (
  `BlogId` int(11) NOT NULL AUTO_INCREMENT,
  `BlogTitle` varchar(256) NOT NULL,
  `BlogDescription` longtext NOT NULL,
  `BlogCreatedTime` datetime NOT NULL,
  `BlogImagePath` varchar(256) NOT NULL,
  `CategoryId` int(11) NOT NULL,
  `CreatorId` int(11) NOT NULL,
  `ViewCount` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`BlogId`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `blog`
--

INSERT INTO `blog` (`BlogId`, `BlogTitle`, `BlogDescription`, `BlogCreatedTime`, `BlogImagePath`, `CategoryId`, `CreatorId`, `ViewCount`) VALUES
(3, 'What is Lorem Ipsum?\r\n', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2021-07-14 18:00:01', '', 1, 1, 177),
(4, 'Why do we use it?', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n', '2021-07-14 18:01:04', '', 2, 1, 64),
(5, 'Where does it come from?\r\n', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2021-07-14 18:48:51', '', 2, 2, 16),
(6, 'Where can I get some?\r\n', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '2021-07-14 19:09:30', '', 2, 1, 98),
(7, 'The standard Lorem Ipsum passage, used since the 1500s', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"\r\n\r\nSection 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC\r\n\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"', '2021-07-18 17:00:51', '', 1, 1, 50);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `CategoryId` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(128) NOT NULL,
  `CategoryColor` varchar(128) NOT NULL,
  PRIMARY KEY (`CategoryId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `category`
--

INSERT INTO `category` (`CategoryId`, `CategoryName`, `CategoryColor`) VALUES
(1, 'Example ', '#FF5733'),
(2, 'Example 2', '#900C3F');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `CommentId` int(11) NOT NULL AUTO_INCREMENT,
  `BlogId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `CommentDescription` varchar(256) NOT NULL,
  `CreateDate` datetime NOT NULL,
  PRIMARY KEY (`CommentId`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `comments`
--

INSERT INTO `comments` (`CommentId`, `BlogId`, `UserId`, `CommentDescription`, `CreateDate`) VALUES
(20, 7, 6, 'merhaba', '2021-07-19 14:16:19'),
(19, 7, 5, 'sa as', '2021-07-19 14:08:02'),
(18, 7, 3, '123', '2021-07-18 17:20:04'),
(17, 7, 3, 'first comment.', '2021-07-18 17:01:57'),
(16, 4, 3, 'as', '2021-07-18 16:59:30'),
(15, 4, 3, 'as', '2021-07-18 16:59:28'),
(14, 4, 3, 'sa', '2021-07-18 16:59:27'),
(21, 6, 6, '<h1><b>Bold</b> </h1>', '2021-07-19 14:17:12'),
(22, 5, 5, 'adada', '2021-07-19 18:02:59'),
(23, 7, 5, 'abc', '2021-07-19 18:03:25'),
(24, 3, 5, 'That\'s a huge information thanks for that sir.', '2021-07-19 18:10:43'),
(25, 7, 7, 'as', '2021-07-19 18:16:40'),
(26, 3, 5, 'adadada', '2021-07-19 19:28:01');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `ContactId` int(11) NOT NULL AUTO_INCREMENT,
  `ContactName` varchar(128) NOT NULL,
  `ContactEmail` varchar(128) NOT NULL,
  `ContactPhone` varchar(128) NOT NULL,
  `ContactSubject` varchar(128) NOT NULL,
  `ContactMessage` text NOT NULL,
  PRIMARY KEY (`ContactId`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `contact`
--

INSERT INTO `contact` (`ContactId`, `ContactName`, `ContactEmail`, `ContactPhone`, `ContactSubject`, `ContactMessage`) VALUES
(48, 'Mert Can', 'cetinokmertcan@gmail.com', '(535) 576-5499', 'Example', 'Demo');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `creator`
--

DROP TABLE IF EXISTS `creator`;
CREATE TABLE IF NOT EXISTS `creator` (
  `CreatorId` int(11) NOT NULL AUTO_INCREMENT,
  `CreatorName` varchar(128) NOT NULL,
  `CreatorDescription` varchar(256) NOT NULL,
  PRIMARY KEY (`CreatorId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `creator`
--

INSERT INTO `creator` (`CreatorId`, `CreatorName`, `CreatorDescription`) VALUES
(1, 'MERT CAN ', 'Demo description'),
(2, 'BERKCAN', 'Example Description');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `userEmail` (`userEmail`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`userId`, `userName`, `userEmail`, `userPass`) VALUES
(5, 'Mert Can Cetinok', 'cetinokmertcan@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92'),
(6, 'Berk Can Cetinok', 'cetinokberkcan@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(7, 'abc', 'abc@gmail.com', '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
