-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 15 Janvier 2020 à 01:42
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `banquedupeuple`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `cni` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `etatClient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id`, `cni`, `nom`, `prenom`, `adresse`, `tel`, `etatClient`) VALUES
(1, '22081996SN', 'fgdf', 'babacar', 'Parcelle', '7788986454', 0),
(2, '08038', '', 'rama', 'rufisque', '768934578', 0),
(3, '12051972SN', 'DIEME', 'ousmane', 'Cite avion', '65643', 1),
(4, 'sdfsdf', 'ndiaye', 'fatou', 'THIES', '234214', 1),
(5, '19921201884565', 'ronaldo', 'cristiano', 'juventus', '778945612', 1),
(6, '1975df86246', 'benzema', 'karim', 'real', '765482563', 1),
(7, 'gfd4512115f515', 'dembele', 'moussa', 'lyon', '2314154122', 1),
(8, 'sdfdsfsdc', 'drogba', 'didier', 'chelsea', '77896523', 1),
(9, 'kdbfdjkds', 'griezzman', 'antoine', 'barcelona', '702501256', 1),
(10, ' sdbsdjkknjl', 'pogba', 'paul', 'manchester', '774587652', 1);

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `id` int(11) NOT NULL,
  `numero` varchar(25) NOT NULL,
  `dateCreation` varchar(10) NOT NULL,
  `solde` int(11) NOT NULL DEFAULT '0',
  `idClient` int(11) NOT NULL,
  `idGestCompte` int(11) NOT NULL,
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `compte`
--

INSERT INTO `compte` (`id`, `numero`, `dateCreation`, `solde`, `idClient`, `idGestCompte`, `etat`) VALUES
(1, 'FSN_03122019_C1', '03-12-2019', 501, 1, 4, 1),
(2, 'FSN_03122019_C2', '03-12-2019', 20501, 1, 4, 1),
(3, 'FSN_04122019_C3', '04-12-2019', 501, 2, 4, 1),
(4, 'FSN_04122019_C4', '04-12-2019', 501, 3, 4, 1),
(5, 'FSN_04122019_C5', '04-12-2019', 1000, 4, 4, 1),
(6, 'FSN_03012020_C6', '03-01-2020', 505, 1, 4, 1),
(7, 'FSN_14012020_C7', '14-01-2020', 1000000, 5, 4, 1),
(8, 'FSN_14012020_C8', '14-01-2020', 250000000, 6, 4, 1),
(9, 'FSN_14012020_C9', '14-01-2020', 502, 7, 4, 1),
(10, 'FSN_14012020_C10', '14-01-2020', 20000000, 8, 4, 1),
(11, 'FSN_14012020_C11', '14-01-2020', 5000000, 9, 4, 1),
(12, 'FSN_14012020_C12', '14-01-2020', 4500000, 10, 4, 1),
(13, 'FSN_14012020_C13', '14-01-2020', 1250, 1, 4, 1),
(14, 'FSN_14012020_C14', '14-01-2020', 15000, 9, 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `operation`
--

CREATE TABLE `operation` (
  `id` int(11) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `dateOperation` varchar(10) NOT NULL,
  `montant` int(11) NOT NULL,
  `idCompte` int(11) NOT NULL,
  `idTypeOpe` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `etatOperation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `operation`
--

INSERT INTO `operation` (`id`, `numero`, `dateOperation`, `montant`, `idCompte`, `idTypeOpe`, `idUser`, `etatOperation`) VALUES
(1, 'FSN_03122019_OP1', '03-12-2019', 501, 1, 1, 4, 1),
(2, 'FSN_03122019_OP2', '03-12-2019', 2000, 2, 1, 4, 0),
(3, 'FSN_04122019_OP3', '04-12-2019', 505, 1, 1, 4, 0),
(4, 'FSN_04122019_OP4', '04-12-2019', 1000, 3, 1, 4, 0),
(5, 'FSN_04122019_OP5', '04-12-2019', 501, 4, 1, 4, 1),
(6, 'FSN_04122019_OP6', '04-12-2019', 501, 5, 1, 4, 0),
(7, 'FSN_04122019_OP7', '04-12-2019', 501, 2, 1, 4, 1),
(8, 'FSN_04122019_OP8', '04-12-2019', 501, 3, 1, 4, 1),
(9, 'FSN_04122019_OP9', '04-12-2019', 505, 2, 1, 4, 0),
(10, 'FSN_04122019_OP10', '04-12-2019', 500, 5, 1, 4, 0),
(11, 'FSN_04122019_OP11', '04-12-2019', 500, 5, 2, 4, 0),
(12, 'FSN_04122019_OP12', '04-12-2019', 500, 5, 1, 4, 1),
(13, 'FSN_04122019_OP13', '04-12-2019', 500, 5, 1, 4, 0),
(14, 'FSN_04122019_OP14', '04-12-2019', 500, 5, 1, 4, 1),
(15, 'FSN_04122019_OP15', '04-12-2019', 500, 5, 2, 4, 0),
(16, 'FSN_03012020_OP16', '03-01-2020', 505, 6, 1, 4, 1),
(17, 'FSN_03012020_OP17', '03-01-2020', 1000, 1, 1, 4, 0),
(18, 'FSN_14012020_OP18', '14-01-2020', 1000000, 7, 1, 4, 1),
(19, 'FSN_14012020_OP19', '14-01-2020', 250000000, 8, 1, 4, 1),
(20, 'FSN_14012020_OP20', '14-01-2020', 502, 9, 1, 4, 1),
(21, 'FSN_14012020_OP21', '14-01-2020', 20000000, 10, 1, 4, 1),
(22, 'FSN_14012020_OP22', '14-01-2020', 5000000, 11, 1, 4, 1),
(23, 'FSN_14012020_OP23', '14-01-2020', 4500000, 12, 1, 4, 1),
(24, 'FSN_14012020_OP24', '14-01-2020', 1250, 13, 1, 4, 1),
(25, 'FSN_14012020_OP25', '14-01-2020', 15000, 14, 1, 4, 1),
(26, 'FSN_14012020_OP26', '14-01-2020', 500, 2, 1, 4, 1),
(27, 'FSN_14012020_OP27', '14-01-2020', 500, 2, 1, 4, 1),
(28, 'FSN_14012020_OP28', '14-01-2020', 1000, 2, 2, 4, 1),
(29, 'FSN_14012020_OP29', '14-01-2020', 20000, 2, 1, 4, 1),
(30, 'FSN_14012020_OP30', '14-01-2020', 500, 2, 2, 4, 0);

-- --------------------------------------------------------

--
-- Structure de la table `typeoperation`
--

CREATE TABLE `typeoperation` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `typeoperation`
--

INSERT INTO `typeoperation` (`id`, `nom`) VALUES
(1, 'depot'),
(2, 'retrait');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profil` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `login`, `password`, `profil`) VALUES
(4, 'yade', 'fallou', 'louffa', 'passer', 'admin'),
(5, 'doumbia', 'ousseynou', 'ouz', '8cb2237d0679ca88db6464eac60da96345513964', 'admin'),
(6, 'mbow', 'momar', 'momzo', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'admin');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cni` (`cni`);

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numero` (`numero`),
  ADD KEY `idClient` (`idClient`),
  ADD KEY `idGestCompte` (`idGestCompte`);

--
-- Index pour la table `operation`
--
ALTER TABLE `operation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numero` (`numero`),
  ADD KEY `idCompte` (`idCompte`),
  ADD KEY `idTypeOpe` (`idTypeOpe`),
  ADD KEY `idUser` (`idUser`);

--
-- Index pour la table `typeoperation`
--
ALTER TABLE `typeoperation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `compte`
--
ALTER TABLE `compte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `operation`
--
ALTER TABLE `operation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT pour la table `typeoperation`
--
ALTER TABLE `typeoperation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `compte`
--
ALTER TABLE `compte`
  ADD CONSTRAINT `compte_ibfk_1` FOREIGN KEY (`idClient`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `compte_ibfk_2` FOREIGN KEY (`idGestCompte`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `operation`
--
ALTER TABLE `operation`
  ADD CONSTRAINT `operation_ibfk_1` FOREIGN KEY (`idCompte`) REFERENCES `compte` (`id`),
  ADD CONSTRAINT `operation_ibfk_3` FOREIGN KEY (`idUser`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `operation_ibfk_4` FOREIGN KEY (`idTypeOpe`) REFERENCES `typeoperation` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
