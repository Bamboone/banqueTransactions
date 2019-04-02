-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 02 avr. 2019 à 19:05
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `banque_web`
--

-- --------------------------------------------------------

--
-- Structure de la table `balance`
--

CREATE TABLE `balance` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `solde_debit` decimal(10,2) NOT NULL,
  `solde_credit` decimal(10,2) NOT NULL,
  `id_compte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `balance`
--

INSERT INTO `balance` (`id`, `date`, `solde_debit`, `solde_credit`, `id_compte`) VALUES
(1, '2019-01-23', '2000.00', '345.00', 1),
(2, '2019-01-24', '2345.23', '100.32', 1);

-- --------------------------------------------------------

--
-- Structure de la table `comptes`
--

CREATE TABLE `comptes` (
  `id` int(11) NOT NULL,
  `type_compte` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `comptes`
--

INSERT INTO `comptes` (`id`, `type_compte`, `date`, `id_utilisateur`) VALUES
(1, 'Chèque', '2000-09-10', 1),
(2, 'Chèque', '2019-04-01', 1);

-- --------------------------------------------------------

--
-- Structure de la table `montants`
--

CREATE TABLE `montants` (
  `montant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `montants`
--

INSERT INTO `montants` (`montant`) VALUES
(15),
(20),
(25),
(30),
(35),
(40),
(50),
(60),
(80),
(100),
(125),
(150),
(200),
(250),
(300),
(350),
(400),
(500),
(550),
(600),
(700),
(800),
(900),
(1000),
(1500),
(2000),
(10);

-- --------------------------------------------------------

--
-- Structure de la table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `montant` decimal(10,2) NOT NULL,
  `type_transaction` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `destinataire` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `courrielDestinataire` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `frequence` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_compte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `transactions`
--

INSERT INTO `transactions` (`id`, `montant`, `type_transaction`, `destinataire`, `courrielDestinataire`, `frequence`, `id_compte`) VALUES
(12, '1232.00', 'Intérac', 'Sébastien', 'sebastien@gmail.com', 'Chaque mois', 1),
(13, '9000.00', 'Même banque', 'Gabriel', 'gab@gmail.com', 'Une fois', 1),
(14, '35.00', 'Intérac', 'Gabriel', 'gab9987@gmail.com', 'Chaque semaine', 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `identifiant` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mot_de_passe` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `identifiant`, `mot_de_passe`) VALUES
(1, 'Gabriel Lévesque-Duval', 'GLDuval', 'allo123');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `balance`
--
ALTER TABLE `balance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index` (`id_compte`);

--
-- Index pour la table `comptes`
--
ALTER TABLE `comptes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index` (`id_utilisateur`);

--
-- Index pour la table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index` (`id_compte`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `balance`
--
ALTER TABLE `balance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `comptes`
--
ALTER TABLE `comptes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `balance`
--
ALTER TABLE `balance`
  ADD CONSTRAINT `balance_ibfk_1` FOREIGN KEY (`id_compte`) REFERENCES `comptes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `comptes`
--
ALTER TABLE `comptes`
  ADD CONSTRAINT `comptes_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`id_compte`) REFERENCES `comptes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
