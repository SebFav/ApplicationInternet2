-- phpMyAdmin SQL Dump
-- version 4.4.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1:3306
-- Généré le :  Ven 25 Décembre 2015 à 20:38
-- Version du serveur :  5.5.44
-- Version de PHP :  5.4.43

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bakeblogapartments`
--

-- --------------------------------------------------------

--
-- Structure de la table `apartments`
--

CREATE TABLE `apartments` (
  `id` int(11) unsigned NOT NULL,
  `apt_number` text COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `building_id` int(11) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `apartments`
--

INSERT INTO `apartments` (`id`, `apt_number`, `content`, `building_id`, `created`, `modified`) VALUES
(3, '6', 'Very nice place, a bit on the yellow side.', 4, '2015-10-06', '2015-10-07'),
(4, '69', 'D-elicious.', 5, '2015-09-11', '2015-10-07'),
(5, '10', 'Pretty standard.', 6, '2015-09-17', '2015-10-06');

-- --------------------------------------------------------

--
-- Structure de la table `apartments_tags`
--

CREATE TABLE `apartments_tags` (
  `id` int(11) NOT NULL,
  `apartment_id` int(11) DEFAULT NULL,
  `tag_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `apartments_tags`
--

INSERT INTO `apartments_tags` (`id`, `apartment_id`, `tag_id`) VALUES
(1, 3, 1),
(2, 3, 4),
(3, 3, 8),
(4, 3, 8),
(5, 4, 3),
(6, 4, 5),
(7, 4, 7),
(8, 4, 8),
(9, 5, 1),
(10, 5, 4);

-- --------------------------------------------------------

--
-- Structure de la table `associations`
--

CREATE TABLE `associations` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `associations`
--

INSERT INTO `associations` (`id`, `nom`) VALUES
(1, 'Remax'),
(2, 'Duproprio'),
(3, 'Century21'),
(4, 'Sutton'),
(5, 'Other');

-- --------------------------------------------------------

--
-- Structure de la table `buildings`
--

CREATE TABLE `buildings` (
  `id` int(11) unsigned NOT NULL,
  `building_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `building_description` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `building_address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `building_manager` enum('John','Jack','Joel','Jason') COLLATE utf8_unicode_ci NOT NULL,
  `building_phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `building_img` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `buildings`
--

INSERT INTO `buildings` (`id`, `building_name`, `building_description`, `building_address`, `building_manager`, `building_phone`, `building_img`, `user_id`, `created`, `modified`) VALUES
(4, 'Bananarama', 'Very yellow.', '33 Rue du Fruit', 'Joel', '3333333333', 'uploads/Yellow.jpg', 3, '0000-00-00', '0000-00-00'),
(5, 'D Palace', 'Too much D.', '69 Ickmore st', 'Jack', '6666666969', 'uploads/D.jpg', 3, '0000-00-00', '0000-00-00'),
(6, 'The Other Place', 'Not that one.', '123 Fake st', 'John', '1234567890', 'uploads/Other.jpg', 3, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) unsigned NOT NULL,
  `apartment_id` int(255) NOT NULL,
  `association_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` (`id`, `apartment_id`, `association_id`, `name`, `email`, `text`, `created`, `modified`) VALUES
(1, 3, 1, 'visiteur1', 'visiteur@bakeblog.com', 'ok....', '2015-09-17', '2015-09-17'),
(2, 3, 1, 'visiteur2', 'visiteur2@bakeblog.com', 'what?', '2015-09-17', '2015-09-17');

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `tags`
--

INSERT INTO `tags` (`id`, `name`) VALUES
(1, '1 bedroom'),
(2, '2 bedrooms'),
(3, '3 bedrooms'),
(4, '1 bathroom'),
(5, '2 bathrooms'),
(6, '3 bathroom'),
(7, 'washer/dryer'),
(8, 'parking');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL,
  `confirm` varchar(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `email`, `created`, `modified`, `confirm`) VALUES
(3, 'admin', '$2a$10$QIfQAz6hOEo.yIibVONBmOixxVkKqc8x0mdPTvg9lg.89Xl1xtvLa', 'admin', 'admin@baketuto.com', '2015-09-10', '2015-09-10', ''),
(4, 'auteur1', '$2a$10$9cPH4M93Hl9g1My/TDiDhefoaSDjTVQg/IYCkAWkLvCm./34L2EM2', 'author', 'auteur1@baketuto.com', '2015-09-10', '2015-09-10', ''),
(5, 'auteur2', '$2a$10$QecJLASteveuu2EXvVKzQ.Nw2irKW0v3ar8QDDZQdXf0ZSoFGa.v2', 'author', 'auteur2@baketuto.com', '2015-09-10', '2015-09-10', '');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `apartments`
--
ALTER TABLE `apartments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `buildings`
--
ALTER TABLE `buildings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `apartments`
--
ALTER TABLE `apartments`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `buildings`
--
ALTER TABLE `buildings`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
