-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mer 07 Novembre 2018 à 17:12
-- Version du serveur :  5.7.24-0ubuntu0.18.04.1
-- Version de PHP :  7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `chat_test`
--

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `message` longtext COLLATE utf8_unicode_ci NOT NULL,
  `senderId` int(11) DEFAULT NULL,
  `receiverId` int(11) DEFAULT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`id`, `message`, `senderId`, `receiverId`, `createdAt`) VALUES
(1, 'cdfgfgfdg', 1, NULL, '2018-11-07 12:33:00'),
(2, 'jytyuytu', 1, NULL, '2018-11-07 12:33:00'),
(3, 'test test tes ', 3, NULL, '2018-11-07 13:45:00'),
(4, 'test message', 3, NULL, '2018-11-07 14:05:00');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isLogged` tinyint(1) DEFAULT '0',
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `isLogged`, `createdAt`) VALUES
(1, 'saif', 'echami', 'saifeddine', 'saifeddine.echamit@gmail.com', '$2y$10$hYjKtjgpYsO7/o2jwZYxe.jyB6cq08odu8Z4LCRr254d/hWCSTL.S', 1, '2018-11-07 12:20:00'),
(2, 'test', 'test', 'testest', 'test@test.com', '$2y$10$rfK3LK4Cus23SfZKezxbi.Zahf10xN.rN00YruOs5ZZGnFvs8HTmC', 0, '2018-11-07 13:13:00'),
(3, 'test', 'test', 'testt2', 'test@teseet.com', '$2y$10$5qX62HsE6gH.Z.H/KR.7EeTeWIQp0gMjTOOFxNc2Bvfjyf48lZMVa', 1, '2018-11-07 13:39:00'),
(4, 'fgfdg', 'derezr', 'root', 'hama.chami@hotmaail.fr', '$2y$10$x9JhqlFsMQaDOXbs1qD4HO25StXocTadIaL0pcUzWRFi21k77oequ', 0, '2018-11-07 16:53:00');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
