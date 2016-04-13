-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Mar 12 Avril 2016 à 15:10
-- Version du serveur :  5.5.42
-- Version de PHP :  5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `moviefriends`
--

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `id` varchar(4) NOT NULL,
  `date` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `events`
--

INSERT INTO `events` (`id`, `date`) VALUES
('4428', 1461071366);

-- --------------------------------------------------------

--
-- Structure de la table `events_movies`
--

CREATE TABLE `events_movies` (
  `events_id` varchar(4) NOT NULL,
  `movies_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `events_user`
--

CREATE TABLE `events_user` (
  `fbid` varchar(25) NOT NULL,
  `events_id` varchar(4) NOT NULL,
  `owner` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `events_user`
--

INSERT INTO `events_user` (`fbid`, `events_id`, `owner`) VALUES
('10208012163215004', '4428', 1);

-- --------------------------------------------------------

--
-- Structure de la table `events_vote`
--

CREATE TABLE `events_vote` (
  `events_id` varchar(4) NOT NULL,
  `fb_id` varchar(25) NOT NULL,
  `movies_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `movies`
--

CREATE TABLE `movies` (
  `id` varchar(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `genre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `movies`
--

INSERT INTO `movies` (`id`, `title`, `genre`) VALUES
('tt1', 'Test', 'test');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `events_movies`
--
ALTER TABLE `events_movies`
  ADD PRIMARY KEY (`events_id`,`movies_id`);

--
-- Index pour la table `events_user`
--
ALTER TABLE `events_user`
  ADD PRIMARY KEY (`fbid`,`events_id`);

--
-- Index pour la table `events_vote`
--
ALTER TABLE `events_vote`
  ADD PRIMARY KEY (`events_id`,`fb_id`,`movies_id`);

--
-- Index pour la table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
