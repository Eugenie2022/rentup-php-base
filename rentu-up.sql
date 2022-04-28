-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 28 avr. 2022 à 21:06
-- Version du serveur : 5.7.36
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `rentu-up`
--

-- --------------------------------------------------------

--
-- Structure de la table `property`
--

DROP TABLE IF EXISTS `property`;
CREATE TABLE IF NOT EXISTS `property` (
  `id_property` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postal_code` varchar(100) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `price` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `Seller_id` int(11) NOT NULL,
  `PropertyType_id` int(11) NOT NULL,
  PRIMARY KEY (`id_property`),
  KEY `fk_Property_Seller_idx` (`Seller_id`),
  KEY `fk_Property_PropertyType1_idx` (`PropertyType_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `property`
--

INSERT INTO `property` (`id_property`, `name`, `street`, `city`, `postal_code`, `state`, `country`, `price`, `status`, `created_at`, `image`, `Seller_id`, `PropertyType_id`) VALUES
(1, 'Red Carpet Real Estate', '210 Zirak Road', 'Vancouver', 'V5Y 1V4', 'British Columbia', 'Canada', '$3,700', 'A louer', '2022-01-24', 'p-1.png', 1, 2),
(2, 'Fairmount Properties', '5698 Zirak Road', 'NewYork', '10001', 'NewYork', 'USA', '$9,750', 'A vendre', '2022-01-10', 'p-2.png', 2, 2),
(3, 'The Real Estate Corner', '5624 Mooker Market', 'NewYork', '10001', 'NewYork', 'NewYork', '$5,860', 'A louer', '2022-04-28', 'pexels-ron-lach-8286101.jpg', 2, 4),
(4, 'Herringbone Realty', '5621 Liverpool', 'London', 'SW10', 'Greater London', 'UK', '$7,540', 'A vendre', '2022-02-05', 'p-5.png', 3, 3),
(5, 'Brick Lane Realty', '210 Montreal Road', 'Vancouver', 'V5Y 1V4', 'British Columbia', 'Canada', '$4,850', 'Loué', '2022-03-26', 'p-6.png', 1, 4),
(6, 'Banyon Tree Realty', '210 Zirak Road', 'Montreal', 'H2Y1B5', 'Quebec', 'Canada', '$2,742', 'Vendu', '2022-01-01', 'p-3.png', 1, 2),
(20, 'Excepturi assumenda ', 'Velit dicta corporis', 'Obcaecati', '53368', 'Fugiat', 'Fugiat', '$5.377', 'A vendre', '2022-04-28', 'pexels-cottonbro-4918150.jpg', 1, 3),
(21, 'Excepturi assumenda', 'Ipsam dolor voluptat', 'Magnam consequatur ', 'Eum maxime quam in s', 'Nemo placeat numqua', 'Nemo placeat numqua', '661', 'Vendu', '2022-04-28', 'pexels-ksenia-chernaya-8987430.jpg', 2, 2),
(22, 'Ethan Mccullough', 'Autem est aut volupt', 'Rerum dolores enim e', 'Aute ipsum nisi obca', 'Nulla qui dolore bla', 'Nulla qui dolore bla', '291', 'A louer', '2022-04-28', 'pexels-ceyda-çiftci-7670334.jpg', 3, 4),
(23, 'Aspen Cruz', 'Fugiat in qui occae', 'Dolores est pariatur', 'Voluptates praesenti', 'Explicabo Laborum ', 'Explicabo Laborum ', '973', 'A louer', '2022-04-28', 'pexels-anna-nekrashevich-8989497.jpg', 3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `propertytype`
--

DROP TABLE IF EXISTS `propertytype`;
CREATE TABLE IF NOT EXISTS `propertytype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` int(11) NOT NULL,
  `picto` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `propertytype`
--

INSERT INTO `propertytype` (`id`, `value`, `picto`, `type`) VALUES
(1, 122, '<i class=\"fa fa-home\" aria-hidden=\"true\"></i>', 'Maison'),
(2, 300, '<i class=\"fa fa-building\" aria-hidden=\"true\"></i>', 'Appartement'),
(3, 155, '<i class=\"fa fa-home\" aria-hidden=\"true\"></i>', 'Villa'),
(4, 80, '<i class=\"fa fa-briefcase\" aria-hidden=\"true\"></i>', 'Office'),
(5, 80, '<i class=\"fa fa-sun-o\" aria-hidden=\"true\"></i>', 'Maison secondaire');

-- --------------------------------------------------------

--
-- Structure de la table `seller`
--

DROP TABLE IF EXISTS `seller`;
CREATE TABLE IF NOT EXISTS `seller` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `profil_picture` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `seller`
--

INSERT INTO `seller` (`id`, `firstname`, `lastname`, `location`, `email`, `telephone`, `profil_picture`) VALUES
(1, 'Anne', 'Young', '2272 Briarwood Drive', 'anne.young@gmail.com', '0632587419', 'team-2.jpg'),
(2, 'Harijeet', 'Siller', 'Montreal Canada', 'h.siller@gmail.com', '0264889735', 'team-1.jpg'),
(3, 'Sargam', 'Singh', 'Liverpool Canada ', '3s.agent@gmail.com', '0415978533', 'team-4.jpg');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `property`
--
ALTER TABLE `property`
  ADD CONSTRAINT `fk_Property_PropertyType1` FOREIGN KEY (`PropertyType_id`) REFERENCES `propertytype` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Property_Seller` FOREIGN KEY (`Seller_id`) REFERENCES `seller` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
