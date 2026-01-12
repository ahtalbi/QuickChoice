-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 11 août 2024 à 18:13
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `restaurant-menu`
--

-- --------------------------------------------------------

--
-- Structure de la table `activation_code`
--

CREATE TABLE `activation_code` (
  `id` int(11) NOT NULL,
  `code` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `image` varchar(90) NOT NULL DEFAULT 'profil_admin.png',
  `couleur` varchar(55) NOT NULL DEFAULT 'default',
  `Date_registration` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `activation_code` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `phone`, `image`, `couleur`, `Date_registration`, `activation_code`) VALUES
(1, 'ahmed', 'ahmed', 'd@gmail.com', '56156522', 'logo-menu.png', 'light-theme', '2024-08-11 14:48:20', 1234),
(2, 'driss', 'drissX', 'driss@gmail.com', '056505', 'dkhalfao.jpg', 'light-theme', '2024-08-11 14:48:20', 1234),
(3, 'admin', 'admin', 'admin@gmail.com', '0681005669', 'SID LOGO xs.png', 'light-theme', '2024-08-11 15:00:44', 1234);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `id_from_admin` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `id_from_admin`) VALUES
(1, 'Appetizers', 1),
(2, 'Main Courses', 1),
(3, 'Desserts', 1),
(4, 'Beverages', 1),
(5, 'Salads', 1),
(10, 'salad', 2),
(11, 'MEAT', 2),
(13, 'HOTDOGS', 2),
(14, 'BURGER', 2),
(16, 'DRINK', 2),
(17, 'PIZZA', 2);

-- --------------------------------------------------------

--
-- Structure de la table `meals`
--

CREATE TABLE `meals` (
  `id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `discretion` varchar(255) NOT NULL,
  `categorie` int(11) NOT NULL,
  `prix` varchar(25) NOT NULL,
  `id_from_admin` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `meals`
--

INSERT INTO `meals` (`id`, `img`, `name`, `discretion`, `categorie`, `prix`, `id_from_admin`) VALUES
(1, 'qrcode.png', 'Spring Rolls', 'Crispy spring rolls with a sweet and sour dip', 1, '5.99', 1),
(2, 'logo-menu.png', 'Grilled Chicken', 'Succulent grilled chicken with herbs', 2, '12.99', 1),
(3, 'https://via.placeholder.com/150', 'Chocolate Cake', 'Rich and moist chocolate cake', 3, '6.50', 1),
(4, 'https://via.placeholder.com/150', 'Fresh Lemonade', 'Refreshing homemade lemonade', 4, '3.00', 1),
(5, 'https://via.placeholder.com/150', 'Caesar Salad', 'Crisp romaine lettuce with Caesar dressing', 5, '7.25', 1),
(6, 'https://via.placeholder.com/150', 'Stuffed Mushrooms', 'Mushrooms stuffed with cheese and herbs', 1, '7.99', 1),
(7, 'https://via.placeholder.com/150', 'Steak', 'Grilled steak with garlic butter', 2, '18.99', 1),
(8, 'https://via.placeholder.com/150', 'Cheesecake', 'Creamy cheesecake with a graham cracker crust', 3, '7.00', 1),
(9, 'https://via.placeholder.com/150', 'Iced Coffee', 'Cold brew coffee served over ice', 4, '4.50', 104),
(10, 'https://via.placeholder.com/150', 'Greek Salad', 'Tomatoes, cucumbers, and feta cheese', 5, '8.50', 105),
(14, 'download.jpeg', 'Salad Fruit', 'best Salad Fruit', 10, '12', 2),
(15, 'images.jpeg', 'Cured Meat', 'Best Cured Meat', 11, '25', 2),
(16, 'images (1).jpeg', 'Corn Dog', 'Best Corn Dog.', 13, '18', 2),
(17, 'images (2).jpeg', 'Chicago Dog', 'Best Chicago Dog', 13, '20', 2),
(18, 'images (3).jpeg', 'Puka Dog', 'Best Puka Dog', 13, '24', 2),
(19, 'images (4).jpeg', 'Sonoran Dog', 'Best Sonoran Dog', 13, '30', 2),
(20, 'images (5).jpeg', 'Lamb Burger', 'Best Lamb Burger', 14, '30', 2),
(21, 'urdaburger-FT-RECIPE0621-f8488fae404d4ae686d612a7bb201fe3.jpg', 'Specialty Burger', 'Best Specialty Burger', 14, '35', 2),
(22, 'images (6).jpeg', 'Hawaii', 'hawaii Canetta', 16, '7', 2),
(23, 'images (7).jpeg', 'Pepsi', 'Pepsi Canetta', 16, '7', 2),
(24, 'pizza-romana-768x512-1.jpeg', 'Roman Pizza', 'Best Roman Pizza', 17, '35', 2);

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `ip` varchar(55) NOT NULL,
  `id_from_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`id`, `ip`, `id_from_admin`) VALUES
(5, '::1', 2),
(6, '::1', 1),
(7, '192.168.1.13', 1),
(8, '192.168.1.52', 2),
(9, '192.168.1.5', 2),
(10, '192.168.1.20', 2),
(11, '192.168.1.6', 2),
(12, '192.168.1.52', 3),
(13, '::1', 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `activation_code`
--
ALTER TABLE `activation_code`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categorie` (`categorie`);

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_from_admin` (`id_from_admin`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `activation_code`
--
ALTER TABLE `activation_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `meals`
--
ALTER TABLE `meals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `meals`
--
ALTER TABLE `meals`
  ADD CONSTRAINT `meals_ibfk_1` FOREIGN KEY (`categorie`) REFERENCES `categories` (`id`);

--
-- Contraintes pour la table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`id_from_admin`) REFERENCES `admin` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
