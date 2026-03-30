-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 27 mars 2026 à 18:26
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
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `author` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` text,
  `cover` varchar(255) DEFAULT NULL,
  `status` enum('available','unavailable') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'available',
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
(2, 'Cent ans de solitude', 'Gabriel Garcia Marquez', 'Cent ans de solitude - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut enim ad minim veniam, quis nostrud exercitation.', '2.jpg', 'available', 2, '2026-03-02 18:57:29', '2026-03-18 17:00:38'),
(3, 'Lolita', 'Vladimir Nabokov', 'Lolita - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis aute irure dolor in reprehenderit.', '3.jpg', 'unavailable', 3, '2026-03-02 18:57:29', '2026-03-17 18:28:41'),
(4, 'Les Hauts de Hurle-Vent', 'Emily Brontë', 'Les Hauts de Hurle-Vent - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Excepteur sint occaecat cupidatat non proident.', '4.jpg', 'available', 4, '2026-03-02 18:57:29', '2026-03-03 10:05:41'),
(5, 'Orgueil et Préjugés', 'Jane Austen', 'Orgueil et Préjugés - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut perspiciatis unde omnis iste natus error.', '5.jpg', 'unavailable', 5, '2026-03-02 18:57:29', '2026-03-17 18:28:45'),
(6, 'Gatsby le Magnifique', 'Francis Scott Fitzgerald', 'Gatsby le Magnifique - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nemo enim ipsam voluptatem.', '6.jpg', 'available', 1, '2026-03-02 18:57:29', '2026-03-03 10:06:32'),
(7, 'L\'attrape-coeurs2', 'J. D. Salinger2', 'L\'attrape-coeurs - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Neque porro quisquam est sdfsqui dolorem.2', '69bac22e00a36.jpg', 'unavailable', 2, '2026-03-02 18:57:29', '2026-03-19 18:32:08'),
(8, 'Les Misérables', 'Victor Hugo', 'Les Misérables - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quis autem vel eum iure reprehenderit.', '8.jpg', 'available', 3, '2026-03-02 18:57:29', '2026-03-03 10:06:05'),
(9, 'Ulysse', 'James Joyce', 'Ulysse - Lorem ipsum dolor sit amet, consectetur adipiscing elit. At vero eos et accusamus et iusto odio.', '9.jpg', 'unavailable', 4, '2026-03-02 18:57:29', '2026-03-17 18:29:00'),
(10, 'L\'étranger', 'Albert Camus', 'L\'étranger - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Et harum quidem rerum facilis est.', '10.jpg', 'available', 5, '2026-03-02 18:57:29', '2026-03-03 11:01:08'),
(11, 'Les raisins de la colère', 'John Steinbeck', 'Les raisins de la colère - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam libero tempore.', '11.jpg', 'unavailable', 1, '2026-03-02 18:57:29', '2026-03-17 18:29:04'),
(13, 'Le Meilleur des Mondes', 'Aldous Huxley', 'Le Meilleur des Mondes - Lorem ipsum dolor sit amet, consectetur adipiscing elit. Itaques earum rerum.', '13.jpg', 'unavailable', 3, '2026-03-02 18:57:29', '2026-03-17 18:29:08'),
(14, 'Ne tirez pas sur l\'oiseau moqueur', 'Harper Lee', 'Ne tirez pas sur l\'oiseau moqueur - Lorem ipsum dolor sit amet, consectetur adipiscing elit. On the other hand.', '14.jpg', 'available', 4, '2026-03-02 18:57:29', '2026-03-03 11:01:24'),
(15, 'Alice au pays des merveilles', 'Lewis Carroll', 'Alice au pays des merveilles - Lorem ipsum dolor sit amet, consectetur adipiscing elit. But I must explain to you.', '15.jpg', 'unavailable', 5, '2026-03-02 18:57:29', '2026-03-17 18:29:12');

-- --------------------------------------------------------

--
-- Structure de la table `chats`
--

DROP TABLE IF EXISTS `chats`;
CREATE TABLE IF NOT EXISTS `chats` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `chats`
--

INSERT INTO `chats` (`id`, `created_at`, `updated_at`) VALUES
(1, '2026-03-24 22:41:24', '2026-03-24 22:41:24'),
(2, '2026-03-25 11:04:52', '2026-03-25 11:04:52'),
(3, '2026-03-25 11:05:25', '2026-03-25 11:05:25'),
(4, '2026-03-25 11:06:08', '2026-03-25 11:06:08'),
(5, '2026-03-25 11:12:14', '2026-03-25 11:12:14'),
(6, '2026-03-25 11:24:41', '2026-03-25 11:24:41'),
(7, '2026-03-26 10:48:42', '2026-03-26 10:48:42');

-- --------------------------------------------------------

--
-- Structure de la table `chat_users`
--

DROP TABLE IF EXISTS `chat_users`;
CREATE TABLE IF NOT EXISTS `chat_users` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `chat_id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `last_read_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `chat_id` (`chat_id`,`user_id`),
  KEY `chat_users_ibfk_2` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `chat_users`
--

INSERT INTO `chat_users` (`id`, `chat_id`, `user_id`, `last_read_at`) VALUES
(1, 6, 2, '2026-03-27 17:47:56'),
(2, 6, 3, '2026-03-27 16:44:34'),
(3, 7, 4, '2026-03-27 19:25:28'),
(4, 7, 2, '2026-03-27 19:25:42');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `chat_id` int UNSIGNED DEFAULT NULL,
  `author_id` int UNSIGNED DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `viewed_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `chat_id` (`chat_id`),
  KEY `author_id` (`author_id`),
  KEY `chat_id_2` (`chat_id`,`created_at`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `chat_id`, `author_id`, `content`, `created_at`, `viewed_at`) VALUES
(1, 6, 2, 'salut', '2026-03-25 17:05:16', NULL),
(2, 6, 2, 'salut', '2026-03-25 17:06:46', NULL),
(3, 6, 2, 'salut?', '2026-03-25 17:08:12', NULL),
(4, 6, 3, 'ça va?', '2026-03-25 18:39:42', '2026-03-27 12:12:05'),
(5, 6, 2, 'oui et toi?', '2026-03-25 18:40:16', NULL),
(6, 6, 3, 'ça va bien', '2026-03-25 18:40:35', '2026-03-27 12:12:06'),
(7, 7, 4, 'salut je suis le user 3', '2026-03-26 10:48:42', NULL),
(8, 7, 4, 'salut', '2026-03-26 18:34:46', NULL),
(9, 7, 2, 'ça va?', '2026-03-26 18:35:00', NULL),
(10, 7, 4, 'oui et toi?', '2026-03-27 16:43:48', NULL),
(11, 6, 3, 'yes', '2026-03-27 16:44:34', NULL),
(12, 7, 2, 'ça va, merci', '2026-03-27 18:04:47', NULL),
(13, 7, 4, 'et sinon?', '2026-03-27 19:25:28', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `email`, `password`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@tomtroc.com', '$2y$10$0THelWUCqSuKPdLF67YrBeLZhJDtYOyBuSxvPub31CiSmpaP8k9XW', '', '2026-03-02 18:14:10', NULL),
(2, 'user1', 'user1@tomtroc.com', '$2y$10$4iu5H67jIMjhAGIwuxhM2uELrL3Lt1r7FpBKnWN8UaAkzFyu7c/.C', '', '2026-03-02 18:14:10', NULL),
(3, 'user2', 'user2@tomtroc.com', '$2y$10$J.Yi0W7YL1m6YLOYTI/RUOAuQtk88JUNVuNQZiDn.zXgIRIfX/2bi', '', '2025-01-02 18:14:10', '2026-03-10 18:29:26'),
(4, 'user3', 'user3@tomtroc.com', '$2y$10$xsVdbr41UZDBlEhPHfJfO.muXlBU2dTbOO7ccNB6aIyUAKTbWU5aW', '69c50b3613ed7.jpg', '2026-03-02 18:14:10', '2026-03-26 11:32:22'),
(5, 'user4', 'user4@tomtroc.com', '$2y$10$hCj/QJuamDAKVPQ9KDPALOkjqqjlBBDS3g4MwG2uaDhHf/iTU9NwG', '', '2026-03-02 18:14:10', NULL),
(6, 'user5', 'user5@tomtroc.com', '$2y$10$3AKHjNLmSBXehsB75J2Ak.8e3wAuwj/fH.dtmUkYHqx5SoBb8Urjm', '', '2026-03-02 18:14:10', NULL),
(12, 'sylvain', 'snielchevallier@gmail.com', '$2y$10$hzFKiI5CtgOOqKdBZKN0GeVx4xBWRJHC.g/lasQ0C7fmfOqThJ.Fe', '69b43ef01e820.jpg', '2026-03-12 15:16:44', '2026-03-13 18:49:44'),
(13, 'toto', 'toto@toto.com', '$2y$10$OeGralnYn5fkaQQL39YU9unDOJX7AKTnObAc1SMzTTiuGfSl.dXGG', NULL, '2026-03-12 18:37:24', NULL),
(14, 'titi', 'titi@titi.com', '$2y$10$uGKbE5X1kPVHRB0qn8QOi.nf40UykBGO9/r5E66DAHd7qhIDAZQCm', '69b456b88acc9.jpg', '2026-03-13 18:59:24', '2026-03-13 19:26:00');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `fk_owner` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `chat_users`
--
ALTER TABLE `chat_users`
  ADD CONSTRAINT `chat_users_ibfk_1` FOREIGN KEY (`chat_id`) REFERENCES `chats` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chat_users_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`chat_id`) REFERENCES `chats` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
