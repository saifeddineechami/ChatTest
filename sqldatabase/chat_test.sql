-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Dim 18 Novembre 2018 à 02:52
-- Version du serveur :  5.7.24-0ubuntu0.18.04.1
-- Version de PHP :  7.1.24-1+ubuntu18.04.1+deb.sury.org+1

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
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `userName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isLogged` tinyint(1) DEFAULT '0',
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `firstName`, `lastName`, `userName`, `email`, `password`, `isLogged`, `createdAt`) VALUES
(1, 'saif', 'echami', 'saifeddine', 'saifeddine.echamit@gmail.com', '$2y$10$hYjKtjgpYsO7/o2jwZYxe.jyB6cq08odu8Z4LCRr254d/hWCSTL.S', 1, '2018-11-07 12:20:00'),
(2, 'test', 'test', 'testest', 'test@test.com', '$2y$10$rfK3LK4Cus23SfZKezxbi.Zahf10xN.rN00YruOs5ZZGnFvs8HTmC', 0, '2018-11-07 13:13:00'),
(3, 'test', 'test', 'testt2', 'test@teseet.com', '$2y$10$5qX62HsE6gH.Z.H/KR.7EeTeWIQp0gMjTOOFxNc2Bvfjyf48lZMVa', 1, '2018-11-07 13:39:00'),
(4, 'fgfdg', 'derezr', 'root', 'hama.chami@hotmaail.fr', '$2y$10$x9JhqlFsMQaDOXbs1qD4HO25StXocTadIaL0pcUzWRFi21k77oequ', 0, '2018-11-07 16:53:00'),
(5, 'dfdsf', 'sdfdsfds', 'fsdfdsff', 'saifedffdine.echami1@gmail.com', '$2y$10$qUO9p3zJLCBYizlLCrjOGeQ0ovylWFhC.tt1y6BxxyeFPbNjDjhT6', 1, '2018-11-18 02:37:00');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;