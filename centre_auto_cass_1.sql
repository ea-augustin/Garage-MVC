-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 12 mai 2021 à 09:20
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
-- Base de données : `centre auto'cass`
--

-- --------------------------------------------------------

--
-- Structure de la table `ad`
--

CREATE TABLE `ad` (
  `ref_ad` int(10) UNSIGNED NOT NULL,
  `title_ad` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `price_ad` decimal(8,2) NOT NULL,
  `description_ad` text COLLATE utf8_unicode_ci NOT NULL,
  `id_g` int(10) UNSIGNED NOT NULL,
  `id_vl` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `brand`
--

CREATE TABLE `brand` (
  `id_b` int(10) UNSIGNED NOT NULL,
  `name_b` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `city`
--

CREATE TABLE `city` (
  `id_city` int(10) UNSIGNED NOT NULL,
  `name_city` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fuel`
--

CREATE TABLE `fuel` (
  `id_fuel` int(10) UNSIGNED NOT NULL,
  `type_fuel` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `garage`
--

CREATE TABLE `garage` (
  `id_g` int(10) UNSIGNED NOT NULL,
  `name_g` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `adress_g` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_pro` int(10) UNSIGNED NOT NULL,
  `id_city` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `model`
--

CREATE TABLE `model` (
  `id_model` int(10) UNSIGNED NOT NULL,
  `name_model` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_b` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `picture`
--

CREATE TABLE `picture` (
  `id_pic` int(10) UNSIGNED NOT NULL,
  `link_pic` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `description_pic` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ref_ad` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `professionnel`
--

CREATE TABLE `professionnel` (
  `id_pro` int(10) UNSIGNED NOT NULL,
  `name_pro` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `surname_pro` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mail_pro` varchar(320) COLLATE utf8_unicode_ci NOT NULL,
  `tel_pro` int(10) UNSIGNED ZEROFILL NOT NULL,
  `siret_pro` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `vehicle`
--

CREATE TABLE `vehicle` (
  `id_vl` int(10) UNSIGNED NOT NULL,
  `year_vl` year(4) NOT NULL,
  `km_vl` mediumint(9) NOT NULL,
  `id_fuel` int(10) UNSIGNED NOT NULL,
  `id_b` int(10) UNSIGNED NOT NULL,
  `id_model` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ad`
--
ALTER TABLE `ad`
  ADD PRIMARY KEY (`ref_ad`),
  ADD KEY `AD_Garage_FK` (`id_g`),
  ADD KEY `AD_vehicle_FK` (`id_vl`);

--
-- Index pour la table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id_b`);

--
-- Index pour la table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id_city`);

--
-- Index pour la table `fuel`
--
ALTER TABLE `fuel`
  ADD PRIMARY KEY (`id_fuel`);

--
-- Index pour la table `garage`
--
ALTER TABLE `garage`
  ADD PRIMARY KEY (`id_g`),
  ADD KEY `Garage_Pro_FK` (`id_pro`),
  ADD KEY `Garage_CITY0_FK` (`id_city`);

--
-- Index pour la table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id_model`),
  ADD KEY `Model_Brand_FK` (`id_b`);

--
-- Index pour la table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`id_pic`),
  ADD KEY `Picture_AD_FK` (`ref_ad`);

--
-- Index pour la table `professionnel`
--
ALTER TABLE `professionnel`
  ADD PRIMARY KEY (`id_pro`),
  ADD UNIQUE KEY `siret_pro` (`siret_pro`);

--
-- Index pour la table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id_vl`),
  ADD KEY `VEHICLE_Fuel_FK` (`id_fuel`),
  ADD KEY `VEHICLE_Brand0_FK` (`id_b`),
  ADD KEY `VEHICLE_Model1_FK` (`id_model`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `brand`
--
ALTER TABLE `brand`
  MODIFY `id_b` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `city`
--
ALTER TABLE `city`
  MODIFY `id_city` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `fuel`
--
ALTER TABLE `fuel`
  MODIFY `id_fuel` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `garage`
--
ALTER TABLE `garage`
  MODIFY `id_g` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `model`
--
ALTER TABLE `model`
  MODIFY `id_model` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `picture`
--
ALTER TABLE `picture`
  MODIFY `id_pic` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `professionnel`
--
ALTER TABLE `professionnel`
  MODIFY `id_pro` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id_vl` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ad`
--
ALTER TABLE `ad`
  ADD CONSTRAINT `AD_Garage_FK` FOREIGN KEY (`id_g`) REFERENCES `garage` (`id_g`),
  ADD CONSTRAINT `AD_vehicle_FK` FOREIGN KEY (`id_vl`) REFERENCES `vehicle` (`id_vl`);

--
-- Contraintes pour la table `garage`
--
ALTER TABLE `garage`
  ADD CONSTRAINT `Garage_CITY0_FK` FOREIGN KEY (`id_city`) REFERENCES `city` (`id_city`),
  ADD CONSTRAINT `Garage_Pro_FK` FOREIGN KEY (`id_pro`) REFERENCES `professionnel` (`id_pro`);

--
-- Contraintes pour la table `model`
--
ALTER TABLE `model`
  ADD CONSTRAINT `Model_Brand_FK` FOREIGN KEY (`id_b`) REFERENCES `brand` (`id_b`);

--
-- Contraintes pour la table `picture`
--
ALTER TABLE `picture`
  ADD CONSTRAINT `Picture_AD_FK` FOREIGN KEY (`ref_ad`) REFERENCES `ad` (`ref_ad`);

--
-- Contraintes pour la table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `VEHICLE_Brand0_FK` FOREIGN KEY (`id_b`) REFERENCES `brand` (`id_b`),
  ADD CONSTRAINT `VEHICLE_Fuel_FK` FOREIGN KEY (`id_fuel`) REFERENCES `fuel` (`id_fuel`),
  ADD CONSTRAINT `VEHICLE_Model1_FK` FOREIGN KEY (`id_model`) REFERENCES `model` (`id_model`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
