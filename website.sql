-- Adminer 4.7.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `panier`;
CREATE TABLE `panier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `idPost` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idPost` (`idPost`),
  KEY `idUser` (`idUser`),
  CONSTRAINT `panier_ibfk_2` FOREIGN KEY (`idPost`) REFERENCES `post` (`idPost`),
  CONSTRAINT `panier_ibfk_3` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `panier` (`id`, `idUser`, `idPost`, `quantity`) VALUES
(13,	2,	24,	1);

DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `idPost` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `commentaire` text,
  `price` int(11) DEFAULT NULL,
  `photo` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `date_upload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`idPost`),
  KEY `idUser` (`idUser`),
  CONSTRAINT `post_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `post` (`idPost`, `title`, `commentaire`, `price`, `photo`, `date_upload`, `idUser`) VALUES
(1,	'Good doggo',	'Dog, disponible immÃ©diatement.\r\n\r\nAttention , stock trÃ¨s limitÃ©.',	21,	'dog.jpg',	'2019-09-04 12:33:51',	2),
(2,	'Plage paradisiaque',	'Une des plage du Satellite TITAN disponible Ã  la vente.\r\n\r\n( Prevoyez des gÃ©lules anti-radiation indice 200 REM )',	250,	'azerty.jpg',	'2019-09-03 12:38:56',	2),
(15,	'Trou Noir de Poche',	'Parfait pour vider les poubelles ! (Ne pas laisser Ã  la portÃ©e des enfants)',	1000,	'imageTest.jpg',	'2019-09-03 12:39:02',	2),
(24,	'Girafe de compagnie jaune Ã  pois',	'Parfait pour les balades en hauteur et jouer avec les enfants de touts Ã¢ges.\r\n\r\n(LivrÃ© sans collier)',	26,	'image.jpeg',	'2019-09-04 15:46:37',	1),
(26,	'chien qui bouge',	'il bouge bien',	87,	'cabriolle.jpg',	'2019-09-05 15:14:07',	1);

DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `idType` int(11) NOT NULL AUTO_INCREMENT,
  `type` tinytext NOT NULL,
  PRIMARY KEY (`idType`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `role` (`idType`, `type`) VALUES
(1,	'admin'),
(2,	'modo'),
(3,	'user');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `idType` int(11) NOT NULL,
  PRIMARY KEY (`idUser`),
  KEY `idType` (`idType`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`idType`) REFERENCES `role` (`idType`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`idUser`, `username`, `password`, `idType`) VALUES
(1,	'admin',	'21232f297a57a5a743894a0e4a801fc3',	1),
(2,	'wissem',	'506afd0a7498bf8ceb0635667398ebbc',	3),
(16,	'test',	'098f6bcd4621d373cade4e832627b4f6',	3),
(22,	'a',	'0cc175b9c0f1b6a831c399e269772661',	3),
(23,	'victor',	'19c3a38a2c7d67e935ce94ebe183c84f',	3);

-- 2019-09-05 15:14:33
