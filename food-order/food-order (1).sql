-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 17 mai 2021 à 23:05
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `food-order`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `full_name`, `username`, `password`) VALUES
(35, 'Angelica Flynn', 'jylymumuro', 'f3ed11bbdb94fd9ebdefbaf646ab94d3'),
(36, 'Phelan Prince', 'maripify', 'f3ed11bbdb94fd9ebdefbaf646ab94d3'),
(37, 'Lucas Horton', 'gipowa', 'f3ed11bbdb94fd9ebdefbaf646ab94d3'),
(40, 'eya', 'eya', 'a268b63a775153432e5538c32154fb85');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(22, 'snaks', 'Food_Category_927.jpg', 'No', 'Yes'),
(19, 'Pizza', 'Food_Category_195.jpg', 'Yes', 'Yes'),
(20, 'Pasta', 'Food_Category_116.jpg', 'Yes', 'Yes'),
(21, 'Drinks', 'Food_Category_914.jpg', 'No', 'Yes'),
(25, 'Burgers', 'Food_Category_249.jpg', 'Yes', 'Yes'),
(24, 'salade', 'Food_Category_254.jpg', 'No', 'Yes');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `food_id` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `food_id` (`food_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `food_id`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(4, 11, 2, '40.00', '2021-05-10 07:14:09', 'Dilevred', 'Eya Rabah', '123456', 'eyarabah20@gmail.com', 'Tunis Ariana Essafa 9\r\nEnnozha '),
(5, 12, 38, '380.00', '2021-05-10 08:35:40', 'Cancelled', 'Leonard Hoover', '+1 (639) 618-1312', 'hyselytawa@mailinator.com', 'Anim deserunt eiusmo   '),
(6, 29, 1, '9.00', '2021-05-17 11:00:14', 'Dilevred', 'Carla Hobbs', '+1 (487) 288-6976', 'zucehymuly@mailinator.com', 'Ea obcaecati molliti   ');

-- --------------------------------------------------------

--
-- Structure de la table `food`
--

DROP TABLE IF EXISTS `food`;
CREATE TABLE IF NOT EXISTS `food` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `food`
--

INSERT INTO `food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(24, ' pizza', 'Pizza Quattro Formaggi (4 fromages) comme en Italie', '15.00', 'Food_8042.jpg', 19, 'Yes', 'Yes'),
(25, 'Spaghetti', 'Creamy Pasta Sauce Without the Guilt', '20.00', 'Food_2456.jpg', 20, 'Yes', 'Yes'),
(26, 'pizza Margherita', 'La vraie recette de la pizza Napolitaine Margherita', '15.00', 'Food_9985.jpg', 19, 'Yes', 'Yes'),
(27, 'Pizza Regina', 'Pizza Regina (jambon, fromage, champignons)', '15.00', 'Food_1686.jpg', 19, 'Yes', 'Yes'),
(28, 'Burger', 'Healthy tomate, concombre, chou rouge', '10.00', 'Food_5142.jpg', 25, 'Yes', 'Yes'),
(29, 'salade', 'Healthy Bowl : Avocat, quinoa, tomate, concombre, chou rouge', '9.00', 'Food_8822.jpg', 24, 'Yes', 'Yes');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
