-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 03 mars 2026 à 10:02
-- Version du serveur : 8.4.7
-- Version de PHP : 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ocr_projet4`
--

-- --------------------------------------------------------

--
-- Structure de la table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `author` varchar(150) NOT NULL,
  `description` text,
  `cover` varchar(255) DEFAULT NULL,
  `status` enum('available','borrowed','archived') DEFAULT 'available',
  `owner_id` int UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_owner` (`owner_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `description`, `cover`, `status`, `owner_id`, `created_at`, `updated_at`) VALUES
(1, '1984', 'George Orwell', '1984 - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '1.jpg', 'available', 1, '2026-03-02 18:57:29', '2026-03-03 10:03:30'),
(2, 'Cent ans de solitude', 'Gabriel Garcia Marquez', 'Cent ans de solitude - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut enim ad minim veniam, quis nostrud exercitation.', '2.jpg', 'borrowed', 2, '2026-03-02 18:57:29', '2026-03-03 10:03:36'),
(3, 'Lolita', 'Vladimir Nabokov', 'Lolita - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis aute irure dolor in reprehenderit.', '3.jpg', 'archived', 3, '2026-03-02 18:57:29', '2026-03-03 10:05:28'),
(4, 'Les Hauts de Hurle-Vent', 'Emily Brontë', 'Les Hauts de Hurle-Vent - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Excepteur sint occaecat cupidatat non proident.', '4.jpg', 'available', 4, '2026-03-02 18:57:29', '2026-03-03 10:05:41'),
(5, 'Orgueil et Préjugés', 'Jane Austen', 'Orgueil et Préjugés - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut perspiciatis unde omnis iste natus error.', '5.jpg', 'borrowed', 5, '2026-03-02 18:57:29', '2026-03-03 10:05:57'),
(6, 'Gatsby le Magnifique', 'Francis Scott Fitzgerald', 'Gatsby le Magnifique - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nemo enim ipsam voluptatem.', '6.jpg', 'available', 1, '2026-03-02 18:57:29', '2026-03-03 10:06:32'),
(7, 'L\'attrape-coeurs', 'J. D. Salinger', 'L\'attrape-coeurs - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Neque porro quisquam est qui dolorem.', '7.jpg', 'archived', 2, '2026-03-02 18:57:29', '2026-03-03 10:06:17'),
(8, 'Les Misérables', 'Victor Hugo', 'Les Misérables - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quis autem vel eum iure reprehenderit.', '8.jpg', 'available', 3, '2026-03-02 18:57:29', '2026-03-03 10:06:05'),
(9, 'Ulysse', 'James Joyce', 'Ulysse - Lorem ipsum dolor sit amet, consectetur adipiscing elit. At vero eos et accusamus et iusto odio.', '9.jpg', 'borrowed', 4, '2026-03-02 18:57:29', '2026-03-03 11:01:02'),
(10, 'L\'étranger', 'Albert Camus', 'L\'étranger - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Et harum quidem rerum facilis est.', '10.jpg', 'available', 5, '2026-03-02 18:57:29', '2026-03-03 11:01:08'),
(11, 'Les raisins de la colère', 'John Steinbeck', 'Les raisins de la colère - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam libero tempore.', '11.jpg', 'archived', 1, '2026-03-02 18:57:29', '2026-03-03 11:01:14'),
(12, 'Crime et Châtiment', 'Fiodor Dostoïevski', 'Crime et Châtiment - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Temporibus autem quibusdam.', '12.jpg', 'available', 2, '2026-03-02 18:57:29', '2026-03-03 11:01:34'),
(13, 'Le Meilleur des Mondes', 'Aldous Huxley', 'Le Meilleur des Mondes - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Itaques earum rerum.', '13.jpg', 'borrowed', 3, '2026-03-02 18:57:29', '2026-03-03 11:01:41'),
(14, 'Ne tirez pas sur l\'oiseau moqueur', 'Harper Lee', 'Ne tirez pas sur l\'oiseau moqueur - Lorem ipsum dolor sit amet, consectetur adipiscing elit. On the other hand.', '14.jpg', 'available', 4, '2026-03-02 18:57:29', '2026-03-03 11:01:24'),
(15, 'Alice au pays des merveilles', 'Lewis Carroll', 'Alice au pays des merveilles - Lorem ipsum dolor sit amet, consectetur adipiscing elit. But I must explain to you.', '15.jpg', 'archived', 5, '2026-03-02 18:57:29', '2026-03-03 11:01:50');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pseudo` (`pseudo`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `email`, `password`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@tomtroc.com', '$2y$10$0THelWUCqSuKPdLF67YrBeLZhJDtYOyBuSxvPub31CiSmpaP8k9XW', '', '2026-03-02 18:14:10', NULL),
(2, 'user1', 'user1@tomtroc.com', '$2y$10$4iu5H67jIMjhAGIwuxhM2uELrL3Lt1r7FpBKnWN8UaAkzFyu7c/.C', '', '2026-03-02 18:14:10', NULL),
(3, 'user2', 'user2@tomtroc.com', '$2y$10$J.Yi0W7YL1m6YLOYTI/RUOAuQtk88JUNVuNQZiDn.zXgIRIfX/2bi', '', '2026-03-02 18:14:10', NULL),
(4, 'user3', 'user3@tomtroc.com', '$2y$10$xsVdbr41UZDBlEhPHfJfO.muXlBU2dTbOO7ccNB6aIyUAKTbWU5aW', '', '2026-03-02 18:14:10', NULL),
(5, 'user4', 'user4@tomtroc.com', '$2y$10$hCj/QJuamDAKVPQ9KDPALOkjqqjlBBDS3g4MwG2uaDhHf/iTU9NwG', '', '2026-03-02 18:14:10', NULL),
(6, 'user5', 'user5@tomtroc.com', '$2y$10$3AKHjNLmSBXehsB75J2Ak.8e3wAuwj/fH.dtmUkYHqx5SoBb8Urjm', '', '2026-03-02 18:14:10', NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `fk_owner` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
