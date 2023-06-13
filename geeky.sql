-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 17 jan. 2023 à 08:39
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `geeky`
--

-- --------------------------------------------------------

--
-- Structure de la table `opinion`
--

DROP TABLE IF EXISTS `opinion`;
CREATE TABLE IF NOT EXISTS `opinion` (
  `ID_opinion` int(11) NOT NULL AUTO_INCREMENT,
  `title_opinion` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment_opinion` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note1_opinion` int(5) DEFAULT NULL,
  `img1_opinion` int(5) DEFAULT NULL,
  `img2_opinion` int(5) DEFAULT NULL,
  `img3_opinion` int(5) DEFAULT NULL,
  `note5_opinion` int(5) DEFAULT NULL,
  `ID_user` int(11) NOT NULL,
  `ID_prd` int(11) NOT NULL,
  PRIMARY KEY (`ID_opinion`),
  KEY `ID_user` (`ID_user`),
  KEY `ID_prd` (`ID_prd`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `opinion`
--

INSERT INTO `opinion` (`ID_opinion`, `title_opinion`, `comment_opinion`, `note1_opinion`, `img1_opinion`, `img2_opinion`, `img3_opinion`, `note5_opinion`, `ID_user`, `ID_prd`) VALUES
(59, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, 95),
(60, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 25, 96),
(61, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, 97),
(62, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, 98),
(63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, 99),
(64, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, 100),
(65, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, 101),
(66, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, 102),
(67, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, 103),
(68, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, 104),
(69, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, 105),
(70, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, 106),
(71, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, 107),
(72, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, 108),
(73, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 26, 109),
(74, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 23, 110),
(75, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 23, 111),
(78, 'super', 'conforme a la description', 5, NULL, NULL, NULL, NULL, 23, 95),
(81, 'Produit comme neuf', 'Super produit', 5, NULL, NULL, NULL, NULL, 23, 95);

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `ID_order` int(11) NOT NULL AUTO_INCREMENT,
  `ID_prd` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ID_user` int(11) NOT NULL,
  `numero_ord` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `quantity_ord` int(15) NOT NULL,
  `price_ord` float NOT NULL,
  `status_ord` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `date_ord` date DEFAULT NULL,
  `activate_ord` int(11) NOT NULL,
  PRIMARY KEY (`ID_order`),
  KEY `ID_prd` (`ID_prd`),
  KEY `ID_user` (`ID_user`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`ID_order`, `ID_prd`, `ID_user`, `numero_ord`, `quantity_ord`, `price_ord`, `status_ord`, `date_ord`, `activate_ord`) VALUES
(1, '97', 23, 'GK-v1-231', 1, 79.99, '0', '2022-06-01', 1),
(2, '97', 23, 'GK-v1-232', 1, 79.99, '1', '2022-06-01', 1),
(3, '98', 23, 'GK-v1-232', 1, 89.99, '1', '2022-06-01', 1),
(4, '97', 27, 'GK-v1-271', 1, 79.99, '0', '2022-06-02', 1),
(5, '97', 27, 'GK-v1-272', 1, 79.99, '0', '2022-06-02', 1),
(6, '95', 27, 'GK-v1-272', 1, 150, '0', '2022-06-02', 1),
(7, '104', 27, 'GK-v1-272', 1, 32.99, '0', '2022-06-02', 1),
(8, '97', 27, 'GK-v1-273', 1, 79.99, '0', '2022-06-02', 1),
(9, '95', 27, 'GK-v1-273', 1, 150, '0', '2022-06-02', 1),
(10, '95', 28, 'GK-v1-281', 1, 150, '0', '2022-06-03', 1),
(11, '95', 28, 'GK-v1-282', 21, 3150, '0', '2022-06-03', 1),
(12, '95', 28, 'GK-v1-283', 75, 11250, '0', '2022-06-03', 1);

-- --------------------------------------------------------

--
-- Structure de la table `passwords`
--

DROP TABLE IF EXISTS `passwords`;
CREATE TABLE IF NOT EXISTS `passwords` (
  `ID_password` int(11) NOT NULL AUTO_INCREMENT,
  `password_pwd` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_user` int(11) NOT NULL,
  PRIMARY KEY (`ID_password`),
  KEY `ID_user` (`ID_user`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `passwords`
--

INSERT INTO `passwords` (`ID_password`, `password_pwd`, `ID_user`) VALUES
(14, '36a5c7c99a1888e1caf3ecf404096860c7be885f', 28),
(17, '42cb5bdbc995a774d6eeb522d746a3aa108479d5', 28),
(18, '93979150096b365b5ab4db6853edaf053936b11d', 28),
(19, 'fe41dcabaa6add448470372e0809447715b110bd', 28),
(20, '8efd86fb78a56a5145ed7739dcb00c78581c5375', 28),
(21, 'c19830e765c9644043544ada077f06bf0b0f2e64', 28),
(22, '4dc7c9ec434ed06502767136789763ec11d2c4b7', 28),
(23, '7a38d8cbd20d9932ba948efaa364bb62651d5ad4', 28);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `ID_prd` int(11) NOT NULL AUTO_INCREMENT,
  `title_prd` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description_prd` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `category_prd` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `subcategory_prd` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `game_prd` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `figurine_prd` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `newold_prd` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `condition_prd` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity_prd` int(11) DEFAULT NULL,
  `price_prd` float DEFAULT NULL,
  `ref_prd` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword_prd` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image1_prd` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image2_prd` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image3_prd` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image4_prd` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ID_user` int(11) NOT NULL,
  `activate_prd` int(11) NOT NULL,
  PRIMARY KEY (`ID_prd`),
  KEY `ID_user` (`ID_user`)
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`ID_prd`, `title_prd`, `description_prd`, `category_prd`, `subcategory_prd`, `game_prd`, `figurine_prd`, `newold_prd`, `condition_prd`, `quantity_prd`, `price_prd`, `ref_prd`, `keyword_prd`, `image1_prd`, `image2_prd`, `image3_prd`, `image4_prd`, `ID_user`, `activate_prd`) VALUES
(95, 'Playstation 4 quasiment neuve', 'Bonjour je vend ma playstation 4 quasiment neuve avec cable d alimentation et HDMI.', 'console', 'playstation_4', NULL, NULL, 'occasion', '1', 2, 150, '', 'PS4, Playstation 4', 'products/IMG_1_console_playstation_4_occasion_95.png', 'products/IMG_2_console_playstation_4_occasion_95.png', NULL, NULL, 24, 1),
(96, 'Figurines Mickey Collector 15 exemplaires', 'Bonjour je vend 15 figurine mickey collector toute neuve.', 'figurines', 'collector', NULL, NULL, 'new', '0', 15, 1099.5, 'MICKEYCOLLECTOR', 'collector, mickey', 'products/IMG_1_figurines_collector_new_96.png', 'products/IMG_2_figurines_collector_new_96.png', 'products/IMG_3_figurines_collector_new_96.png', NULL, 25, 1),
(97, 'FIFA 2022 - PS4', 'Jeu fifa 2022 sur Playstation 4', 'game', 'adventure_game', NULL, NULL, 'new', '0', 146, 79.99, 'FIFA2022', 'FIFA 2022, FIFA 22', 'products/IMG_1_game_adventure_game_new_97.png', 'products/IMG_2_game_adventure_game_new_97.png', 'products/IMG_3_game_adventure_game_new_97.png', NULL, 26, 1),
(98, 'GTA V - PS5', 'GTA V sur Playstation 5', 'game', 'role_playing_game', NULL, NULL, 'new', '0', 149, 89.99, 'GTAVPS5', 'GTA V', 'products/IMG_1_game_role_playing_game_new_98.png', 'products/IMG_2_game_role_playing_game_new_98.png', 'products/IMG_3_game_role_playing_game_new_98.png', NULL, 26, 1),
(99, 'Modern Warfare - PS4', 'Modern Warfare sur PS4', 'game', 'shooting_game', NULL, NULL, 'new', '0', 150, 29.99, 'MW', 'modern warfare', 'products/IMG_1_game_shooting_game_new_99.png', 'products/IMG_2_game_shooting_game_new_99.png', 'products/IMG_3_game_shooting_game_new_99.png', NULL, 26, 1),
(100, 'Jump force - PS4', 'Jump force sur Playstation 4', 'game', 'battle_game', NULL, NULL, 'new', '0', 150, 16.99, 'JUMPFORCE', 'Jump force', 'products/IMG_1_game_battle_game_new_100.png', 'products/IMG_2_game_battle_game_new_100.png', 'products/IMG_3_game_battle_game_new_100.png', NULL, 26, 0),
(101, 'Jump force - PS4', 'Jump force sur Playstation 4', 'game', 'battle_game', NULL, NULL, 'new', '0', 150, 16.99, 'JUMPFORCE', 'Jump force', 'products/IMG_1_game_battle_game_new_101.png', 'products/IMG_2_game_battle_game_new_101.png', 'products/IMG_3_game_battle_game_new_101.png', NULL, 26, 0),
(102, 'Jump force - PS4', 'Jump force sur Playstation 4', 'game', 'battle_game', NULL, NULL, 'new', '0', 150, 15.99, 'JUMPFORCE', 'Jump force', 'products/IMG_1_game_battle_game_new_102.png', 'products/IMG_2_game_battle_game_new_102.png', 'products/IMG_3_game_battle_game_new_102.png', NULL, 26, 0),
(103, 'Jump force - PS4', 'Jump force sur Playstation 4', 'game', 'battle_game', NULL, NULL, 'new', '0', 150, 15.99, 'JUMPFORCE', 'Jump force', 'products/IMG_1_game_battle_game_new_103.png', 'products/IMG_2_game_battle_game_new_103.png', 'products/IMG_3_game_battle_game_new_103.png', 'products/IMG_4_game_battle_game_new_103.png', 26, 1),
(104, 'Kao the Kangaroo - PS4', 'Kao the Kangaroo sur Playstation 4', 'game', 'platform_game', NULL, NULL, 'new', '0', 149, 32.99, 'KTK', 'Kao the Kangaroo', 'products/IMG_1_game_platform_game_new_104.png', 'products/IMG_2_game_platform_game_new_104.png', 'products/IMG_3_game_platform_game_new_104.png', 'products/IMG_4_game_platform_game_new_104.png', 26, 1),
(105, 'Puyo puyo Tetris 2 - PS4', 'Puyo puyo tetris 2 sur Playstation 4', 'game', 'reflection_game', NULL, NULL, 'new', '0', 150, 15.99, 'PPT', 'Puyo puyo tetris 2', 'products/IMG_1_game_reflection_game_new_105.png', 'products/IMG_2_game_reflection_game_new_105.png', 'products/IMG_3_game_reflection_game_new_105.png', 'products/IMG_4_game_reflection_game_new_105.png', 26, 1),
(106, 'Playstation 5', 'Playstation 5', 'console', 'playstation_5', NULL, NULL, 'new', '0', 10, 499.99, 'PS5', 'PS5, Playstation 5, playstation 5', 'products/IMG_1_console_playstation_5_new_106.png', 'products/IMG_2_console_playstation_5_new_106.png', 'products/IMG_3_console_playstation_5_new_106.png', 'products/IMG_4_console_playstation_5_new_106.png', 26, 1),
(107, 'Playstation 5 Digital', 'Playstation 5 digital', 'console', 'playstation_5_digital', NULL, NULL, 'new', '0', 10, 399.99, 'PS5DG', 'PS5 digital, playstation 5 digital', 'products/IMG_1_console_playstation_5_digital_new_107.png', 'products/IMG_2_console_playstation_5_digital_new_107.png', 'products/IMG_3_console_playstation_5_digital_new_107.png', NULL, 26, 1),
(108, 'XBOX series X', 'XBOX SERIES X', 'console', 'xbox_serie_x', NULL, NULL, 'new', '0', 100, 499.99, 'XBOXSERIESX', 'XBOX series X, XBOX SERIES X, xbox series x', 'products/IMG_1_console_xbox_serie_x_new_108.png', 'products/IMG_2_console_xbox_serie_x_new_108.png', 'products/IMG_3_console_xbox_serie_x_new_108.png', 'products/IMG_4_console_xbox_serie_x_new_108.png', 26, 1),
(109, 'XBOX series S', 'XBOX series S', 'console', 'xbox_serie_s', NULL, NULL, 'new', '0', 100, 299.99, 'XBOXSERIESS', 'XBOX series s, XBOX SERIES S', 'products/IMG_1_console_xbox_serie_s_new_109.png', 'products/IMG_2_console_xbox_serie_s_new_109.png', 'products/IMG_3_console_xbox_serie_s_new_109.png', 'products/IMG_4_console_xbox_serie_s_new_109.png', 26, 1),
(110, 'GTA', 'gta neuf', 'game', 'adventure_game', NULL, NULL, 'new', '0', 10, 90.99, '', 'GTA, jeu PS4', 'products/IMG_1_game_adventure_game_new_110.png', 'products/IMG_2_game_adventure_game_new_110.png', 'products/IMG_3_game_adventure_game_new_110.png', 'products/IMG_4_game_adventure_game_new_110.png', 23, 1),
(111, 'GTA 5 ', 'GTA 5 ONLINE', 'game', 'adventure_game', NULL, NULL, 'new', '0', 15, 89.99, '', 'GTA, JEU', 'products/IMG_1_game_adventure_game_new_111.png', 'products/IMG_2_game_adventure_game_new_111.png', 'products/IMG_3_game_adventure_game_new_111.png', NULL, 23, 1);

-- --------------------------------------------------------

--
-- Structure de la table `shopping_basket`
--

DROP TABLE IF EXISTS `shopping_basket`;
CREATE TABLE IF NOT EXISTS `shopping_basket` (
  `ID_sb` int(11) NOT NULL AUTO_INCREMENT,
  `quantity_sb` int(11) DEFAULT NULL,
  `total_price_sb` float DEFAULT NULL,
  `ID_prd` int(11) NOT NULL,
  `ID_user` int(11) NOT NULL,
  PRIMARY KEY (`ID_sb`),
  KEY `shopping_basket_products_FK` (`ID_prd`),
  KEY `shopping_basket_users0_FK` (`ID_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID_user` int(11) NOT NULL AUTO_INCREMENT,
  `username_user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `firstname_user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lastname_user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email_user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `birthday_user` date NOT NULL,
  `password_user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sex_user` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `tel_number_user` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_address_user` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `delivery_address_user` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status_user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `activate_user` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ID_user`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`ID_user`, `username_user`, `firstname_user`, `lastname_user`, `email_user`, `birthday_user`, `password_user`, `sex_user`, `tel_number_user`, `billing_address_user`, `delivery_address_user`, `status_user`, `activate_user`) VALUES
(23, 'admin', 'admin', 'admin', 'admin@gmail.com', '2003-01-01', '664819d8c5343676c9225b5ed00a5cdc6f3a1ff3', 'man', NULL, NULL, NULL, 'admin', 1),
(24, 'filipe75', 'Filippe', 'Testeur', 'filippe.testeur@gmail.com', '1992-09-10', '4238304fdae9c819a7e002e538a3419c1b87bedf', 'man', NULL, NULL, NULL, 'membre', 1),
(25, 'jess19', 'Jessica', 'Fial', 'jessica.fial@gmail.com', '2003-06-19', '05bf33c787e61ebf1e62efa4557e2c93a409ef11', 'women', NULL, NULL, NULL, 'membre', 1),
(26, 'Geekycom', 'Geeky', 'Geeky', 'geeky@gmail.com', '2003-01-01', 'ec5344e43fe69a9d94e62a4f05b560e4b78df76b', 'man', NULL, NULL, NULL, 'admin', 1),
(27, 'NomDutilisateur', 'VotrePrenom', 'VotreNom', 'votreadresseemail@gmail.com', '2000-01-01', 'be717978df750151ee3a1225291c47581d74e91a', 'man', NULL, NULL, '110 rue des fleurs Paris 75001', 'membre', 1),
(28, 'EpreuveBTS', 'Adrien', 'BTS', 'bts@gmail.com', '2000-01-01', '0df72d13f70bbf28358f8bd73aec6c683e93dff4', 'women', NULL, NULL, '110 rue du BTS Paris 75001', 'membre', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `opinion`
--
ALTER TABLE `opinion`
  ADD CONSTRAINT `opinion_produit` FOREIGN KEY (`ID_prd`) REFERENCES `products` (`ID_prd`),
  ADD CONSTRAINT `opinion_user` FOREIGN KEY (`ID_user`) REFERENCES `users` (`ID_user`);

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`ID_user`) REFERENCES `users` (`ID_user`);

--
-- Contraintes pour la table `passwords`
--
ALTER TABLE `passwords`
  ADD CONSTRAINT `passwords_ibfk_1` FOREIGN KEY (`ID_user`) REFERENCES `users` (`ID_user`);

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`ID_user`) REFERENCES `users` (`ID_user`);

--
-- Contraintes pour la table `shopping_basket`
--
ALTER TABLE `shopping_basket`
  ADD CONSTRAINT `shopping_basket_products_FK` FOREIGN KEY (`ID_prd`) REFERENCES `products` (`ID_prd`),
  ADD CONSTRAINT `shopping_basket_users0_FK` FOREIGN KEY (`ID_user`) REFERENCES `users` (`ID_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
