-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 23 jan. 2024 à 21:33
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `nextCami`
--

-- --------------------------------------------------------

--
-- Structure de la table `AGENT`
--

CREATE TABLE `AGENT` (
  `MATRICULE` int(11) NOT NULL,
  `NOM` varchar(255) NOT NULL,
  `CODE_DIVISION` varchar(255) NOT NULL,
  `PRENOM` varchar(255) NOT NULL,
  `GENRE` varchar(255) NOT NULL,
  `PHOTO` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `FONCTION` varchar(255) NOT NULL,
  `TYPE` varchar(255) NOT NULL,
  `PSEUDO` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `ADRESSE_PHYSIQUE` varchar(255) NOT NULL,
  `TELEPHONE` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `AGENT`
--

INSERT INTO `AGENT` (`MATRICULE`, `NOM`, `CODE_DIVISION`, `PRENOM`, `GENRE`, `PHOTO`, `remember_token`, `FONCTION`, `TYPE`, `PSEUDO`, `EMAIL`, `PASSWORD`, `ADRESSE_PHYSIQUE`, `TELEPHONE`, `created_at`, `updated_at`) VALUES
(100000, 'NOMENJANAHARY', 'BACK-END', 'Pierre Andrianajoro', 'M', '', NULL, 'Gestion de comptes utilisateurs', 'Super Admin', 'Najoro', 'xandrianajorobanadz@gmail.com', '$2y$10$RPXeLUBUnn2KWP2tgTvwm.NBzPod/4H7KUa500vuo3HOZdeKUp.TW', 'Andrainjato Fianarantsoa', '+261 34 38 079 86', '2023-11-21 09:52:04', '2023-11-21 09:52:04'),
(222486, 'RAVONIARIMANANA', 'BAG', ' Hantaharilala', 'F', '', NULL, 'VERIFICATEUR DU VISA', 'User', 'RAVONIARIMANANA', 'mananahanta@yahoo.fr', '$2y$10$0.cAJatflnEhYxmE0B6kpud7irFeHV/L4QK/xv6RVpVXktCmnfpTi', 'Lot 309 IV/3706 Cité des Professeurs ISAHA FIANARANTSOA', '034 05 540 88', '2024-01-16 03:48:52', '2024-01-16 03:48:52'),
(257461, 'RASAMIMANANA', 'BAG', 'Pierson Xavier William', 'M', '', NULL, 'Archiviste / Dépositaire', 'Admin', 'William', 'piersonrasamimanana@gmail.com', '$2y$10$z0YoHI7/sOSDY76TCtkkeOciaSqWMCKYre..bQSswWhfniXX7Fz.G', 'Lot Iik179 Sahalava Nord Fianarantsoa', '0347962472', '2023-11-21 11:07:02', '2023-11-21 11:07:02'),
(437319, 'RAJAONIMARIA', 'CAC', 'Abelson Nirilanto', 'M', '', NULL, 'Coordonateur charge d\'appui et de coordination', 'User', 'Nirilanto', 'rajaonimaria@gmail.com', '$2y$10$HDHOZG5ZNcB2LptaKcOe1OBWAVyxylkDOCnvnUhDRIa4B5IGYJPNm', 'Talatamaty Fianarantsoa', '0340255550', '2023-11-22 11:14:15', '2023-11-22 11:14:32');

-- --------------------------------------------------------

--
-- Structure de la table `ARTICLE`
--

CREATE TABLE `ARTICLE` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `DESIGNATION` varchar(255) NOT NULL,
  `SPECIFICATION` varchar(255) NOT NULL,
  `UNITE` varchar(255) NOT NULL,
  `EFFECTIF` int(11) NOT NULL,
  `DISPONIBLE` tinyint(1) NOT NULL,
  `CODE_SERVICE` varchar(255) NOT NULL,
  `id_categorie` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ARTICLE`
--

INSERT INTO `ARTICLE` (`id`, `DESIGNATION`, `SPECIFICATION`, `UNITE`, `EFFECTIF`, `DISPONIBLE`, `CODE_SERVICE`, `id_categorie`, `created_at`, `updated_at`) VALUES
(1, 'Agrafe PM', '(Trombone)', 'Boîte de 50', 0, 1, 'SRSPHM', 1, '2023-11-21 16:35:41', '2023-11-21 16:35:41'),
(2, 'Agrafeuse GM', 'B 7A 24/6 marque  NOVUS', 'Nombre', 50, 1, 'SRSPHM', 2, '2023-12-04 04:26:26', '2023-12-04 04:42:58'),
(3, 'Bande collante', '1,8*30 m Couleur blanc C-126', 'Nombre', 50, 1, 'SRSPHM', 3, '2023-12-04 04:27:15', '2023-12-04 04:42:58'),
(4, 'Blanco pen', 'Forme de stylo; 8ml   PELIKAN', 'Nombre', 50, 1, 'SRSPHM', 4, '2023-12-04 04:28:00', '2023-12-04 04:42:58'),
(5, 'Blanco correcteur', 'Double flacon; 20ml', 'Nombre', 0, 1, 'SRSPHM', 4, '2023-12-04 04:28:58', '2023-12-04 04:28:58'),
(6, 'Règle graduée', 'Plastique souple et transparent; 50 cm', 'Nombre', 0, 1, 'SRSPHM', 33, '2024-01-16 06:19:18', '2024-01-16 06:19:18');

-- --------------------------------------------------------

--
-- Structure de la table `CATEGORIE`
--

CREATE TABLE `CATEGORIE` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `LABEL_CATEGORIE` varchar(255) NOT NULL,
  `COMPTE` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `CATEGORIE`
--

INSERT INTO `CATEGORIE` (`id`, `LABEL_CATEGORIE`, `COMPTE`, `created_at`, `updated_at`) VALUES
(1, 'Agrafe', 6111, '2023-11-21 11:29:37', '2023-11-21 11:29:37'),
(2, 'Agrafeuse', 6111, '2023-11-21 11:29:37', '2023-11-21 11:29:37'),
(3, 'Bande', 6111, '2023-11-21 11:29:37', '2023-11-21 11:29:37'),
(4, 'Blanco', 6111, '2023-11-21 11:29:37', '2023-11-21 11:29:37'),
(5, 'Bloc note', 6111, '2023-11-21 11:29:37', '2023-11-21 11:29:37'),
(6, 'Boîte d\'archive', 6111, '2023-11-21 11:29:37', '2023-11-21 11:29:37'),
(7, 'Cahier', 6111, '2023-11-21 11:29:37', '2023-11-21 11:29:37'),
(8, 'Carbonne à main', 6111, '2023-11-21 11:29:38', '2023-11-21 11:29:38'),
(9, 'Chemise cartonnée', 6111, '2023-11-21 11:29:38', '2023-11-21 11:29:38'),
(10, 'Ciseaux de bureau', 6111, '2023-11-21 11:29:38', '2023-11-21 11:29:38'),
(11, 'Classeur', 6111, '2023-11-21 11:29:38', '2023-11-21 11:29:38'),
(12, 'Colle', 6111, '2023-11-21 11:29:38', '2023-11-21 11:29:38'),
(13, 'Crayon de bois', 6111, '2023-11-21 11:29:38', '2023-11-21 11:29:38'),
(14, 'Cutter', 6111, '2023-11-21 11:29:38', '2023-11-21 11:29:38'),
(15, 'Emballage', 6111, '2023-11-21 11:29:38', '2023-11-21 11:29:38'),
(16, 'Encre à tampon', 6111, '2023-11-21 11:29:38', '2023-11-21 11:29:38'),
(17, 'Enveloppe', 6111, '2023-11-21 11:29:38', '2023-11-21 11:29:38'),
(18, 'Ficelle de bureau', 6111, '2023-11-21 11:29:38', '2023-11-21 11:29:38'),
(19, 'Gomme', 6111, '2023-11-21 11:29:38', '2023-11-21 11:29:38'),
(20, 'Machine à calculer', 6111, '2023-11-21 11:29:38', '2023-11-21 11:29:38'),
(21, 'Marqueur Permanent', 6111, '2023-11-21 11:29:38', '2023-11-21 11:29:38'),
(22, 'Ote agrafe', 6111, '2023-11-21 11:29:38', '2023-11-21 11:29:38'),
(23, 'Papier', 6111, '2023-11-21 11:29:38', '2023-11-21 11:29:38'),
(24, 'Parapheur', 6111, '2023-11-21 11:29:39', '2023-11-21 11:29:39'),
(25, 'Perforateur', 6111, '2023-11-21 11:29:39', '2023-11-21 11:29:39'),
(26, 'Plaque carton simple onde', 6111, '2023-11-21 11:29:39', '2023-11-21 11:29:39'),
(27, 'Pochettes de plastification', 6111, '2023-11-21 11:29:39', '2023-11-21 11:29:39'),
(28, 'Porte badge', 6111, '2023-11-21 11:29:39', '2023-11-21 11:29:39'),
(29, 'Porte bloc', 6111, '2023-11-21 11:29:39', '2023-11-21 11:29:39'),
(30, 'Post-it', 6111, '2023-11-21 11:29:39', '2023-11-21 11:29:39'),
(31, 'Punaise', 6111, '2023-11-21 11:29:39', '2023-11-21 11:29:39'),
(32, 'Recharge bloc memo', 6111, '2023-11-21 11:29:39', '2023-11-21 11:29:39'),
(33, 'Règle graduée', 6111, '2023-11-21 11:29:39', '2023-11-21 11:29:39'),
(34, 'Scotch', 6111, '2023-11-21 11:29:39', '2023-11-21 11:29:39'),
(35, 'Sous-chemise', 6111, '2023-11-21 11:29:39', '2023-11-21 11:29:39'),
(36, 'Sous-main', 6111, '2023-11-21 11:29:39', '2023-11-21 11:29:39'),
(37, 'Stylo', 6111, '2023-11-21 11:29:39', '2023-11-21 11:29:39'),
(38, 'Surligneur', 6111, '2023-11-21 11:29:39', '2023-11-21 11:29:39'),
(39, 'Tampon encreur', 6111, '2023-11-21 11:29:39', '2023-11-21 11:29:39'),
(40, 'Timbre date', 6111, '2023-11-21 11:29:39', '2023-11-21 11:29:39'),
(41, 'Table', 100000, '2023-11-21 11:32:12', '2023-11-21 11:32:12'),
(42, 'Chaise', 100000, '2023-11-21 11:32:19', '2023-11-21 11:32:19'),
(43, 'Armoire', 100000, '2023-11-21 11:32:30', '2023-11-21 11:32:30'),
(44, 'Ordinateur', 100000, '2023-11-21 11:32:41', '2023-11-21 11:32:41'),
(45, 'Imprimante', 100000, '2023-11-21 11:32:57', '2023-11-21 11:32:57'),
(46, 'Projecteur', 100000, '2023-11-21 11:33:25', '2023-11-21 11:33:25');

-- --------------------------------------------------------

--
-- Structure de la table `COMPTE`
--

CREATE TABLE `COMPTE` (
  `COMPTE` int(11) NOT NULL,
  `LABEL_COMPTE` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `COMPTE`
--

INSERT INTO `COMPTE` (`COMPTE`, `LABEL_COMPTE`, `created_at`, `updated_at`) VALUES
(6111, 'Fournitures et articles de bureau', '2023-11-21 09:52:48', '2023-11-21 09:52:48'),
(6112, 'Imprimes, cachet et documents administratifs', '2023-11-21 09:52:48', '2023-11-21 09:52:48'),
(6113, 'Consomptibles informatiques', '2023-11-21 09:52:48', '2023-11-21 09:52:48'),
(6114, 'Produits, pétits matériels et menues dépenses d\'entretien', '2023-11-21 09:52:48', '2023-11-21 09:52:48'),
(6211, ' Entretien de batiments ', '2023-11-21 09:52:48', '2023-11-21 09:52:48'),
(6213, 'Entretien de matériel de  transports', '2023-11-21 09:52:48', '2023-11-21 09:52:48'),
(6215, 'Entretien et réparation des matériels  et mobiliers de  Bureau', '2023-11-21 09:52:49', '2023-11-21 09:52:49'),
(6216, 'Maintenance des matériels informatiques, électriques, électroniques et téléphoniques', '2023-11-21 09:52:49', '2023-11-21 09:52:49'),
(6217, 'Maintenance des réseaux, logiciels et systèmes informatiques', '2023-11-21 09:52:49', '2023-11-21 09:52:49'),
(6224, 'Impression, reliures, insertions, publicités et promotions', '2023-11-21 09:52:49', '2023-11-21 09:52:49'),
(100000, 'Exemple', '2023-11-21 11:31:52', '2023-11-21 11:31:52');

-- --------------------------------------------------------

--
-- Structure de la table `DEMANDE`
--

CREATE TABLE `DEMANDE` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `REF_DEMANDE` varchar(255) NOT NULL,
  `id_article` bigint(20) UNSIGNED NOT NULL,
  `QUANTITE` int(11) NOT NULL,
  `STOCK` int(11) NOT NULL,
  `UNITE` varchar(255) NOT NULL,
  `ETAT_DEMANDE` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `DEMANDE`
--

INSERT INTO `DEMANDE` (`id`, `REF_DEMANDE`, `id_article`, `QUANTITE`, `STOCK`, `UNITE`, `ETAT_DEMANDE`, `created_at`, `updated_at`) VALUES
(1, '2023/0001', 2, 2, 50, 'Nombre', 'En attente', '2023-12-04 04:45:11', '2023-12-04 04:45:11'),
(2, '2023/0001', 4, 1, 50, 'Nombre', 'En attente', '2023-12-04 04:45:11', '2023-12-04 04:45:11'),
(3, '2023/0001', 3, 1, 50, 'Nombre', 'En attente', '2023-12-04 04:45:11', '2023-12-04 04:45:11'),
(4, '2023/0002', 2, 2, 50, 'Nombre', 'En attente', '2023-12-11 03:10:25', '2023-12-11 03:10:25'),
(5, '2023/0002', 2, 1, 50, 'Nombre', 'En attente', '2023-12-11 03:10:25', '2023-12-11 03:10:25'),
(6, '2024/0003', 2, 1, 50, 'Nombre', 'En attente', '2024-01-22 05:23:12', '2024-01-22 05:23:12'),
(7, '2024/0003', 3, 2, 50, 'Nombre', 'En attente', '2024-01-22 05:23:12', '2024-01-22 05:23:12');

-- --------------------------------------------------------

--
-- Structure de la table `DIVISION`
--

CREATE TABLE `DIVISION` (
  `CODE_DIVISION` varchar(255) NOT NULL,
  `LABEL_DIVISION` varchar(255) NOT NULL,
  `CODE_SERVICE` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `DIVISION`
--

INSERT INTO `DIVISION` (`CODE_DIVISION`, `LABEL_DIVISION`, `CODE_SERVICE`, `created_at`, `updated_at`) VALUES
('BACK-END', 'Développeur Web', 'ADMIN', '2023-11-21 09:52:04', '2023-11-21 09:52:04'),
('BAG', 'Bureau des Affaires Générales', 'SRSPHM', '2023-11-21 11:03:26', '2023-11-21 11:03:26'),
('CAC', 'Cellule d\'Appuie et de Coordination', 'SRSPHM', '2023-11-21 11:03:55', '2023-11-21 11:03:55');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `HISTORIQUE`
--

CREATE TABLE `HISTORIQUE` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `MATRICULE` int(11) DEFAULT NULL,
  `ETAT_MAT` varchar(255) DEFAULT NULL,
  `DATE_DEB` datetime NOT NULL,
  `DATE_FIN` datetime NOT NULL,
  `id_materiel` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `HISTORIQUE`
--

INSERT INTO `HISTORIQUE` (`id`, `MATRICULE`, `ETAT_MAT`, `DATE_DEB`, `DATE_FIN`, `id_materiel`, `created_at`, `updated_at`) VALUES
(1, NULL, 'BON', '2023-11-21 14:44:36', '2023-11-26 20:44:59', 9, '2023-11-26 17:44:59', '2023-11-26 17:44:59'),
(2, NULL, 'BON', '2023-11-21 14:44:36', '2023-11-26 20:47:47', 3, '2023-11-26 17:47:47', '2023-11-26 17:47:47'),
(3, 257461, NULL, '2023-11-26 20:47:34', '2023-11-26 20:47:34', 3, '2023-11-26 17:48:36', '2023-11-26 17:48:36'),
(4, NULL, 'BON', '2023-11-21 14:44:36', '2023-11-26 20:50:03', 4, '2023-11-26 17:50:03', '2023-11-26 17:50:03'),
(9, NULL, 'BON', '2023-11-21 14:44:36', '2023-11-23 12:54:20', 5, '2023-11-27 09:54:20', '2023-11-27 09:54:20'),
(10, NULL, 'MOYEN', '2023-11-23 12:54:20', '2023-11-27 13:03:41', 5, '2023-11-27 10:03:41', '2023-11-27 10:03:41'),
(11, 437319, NULL, '2023-11-25 13:02:47', '2023-11-27 13:03:56', 5, '2023-11-27 10:04:18', '2023-11-27 10:04:18');

-- --------------------------------------------------------

--
-- Structure de la table `MATERIEL`
--

CREATE TABLE `MATERIEL` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `REF_MAT` varchar(255) DEFAULT NULL,
  `DESIGN_MAT` varchar(255) NOT NULL,
  `SPEC_MAT` varchar(255) NOT NULL,
  `ETAT_MAT` varchar(255) NOT NULL,
  `DATE_DEB` datetime NOT NULL,
  `MATRICULE` int(11) DEFAULT NULL,
  `CODE_SERVICE` varchar(255) NOT NULL,
  `id_nomenclature` bigint(20) UNSIGNED NOT NULL,
  `id_categorie` bigint(20) UNSIGNED NOT NULL,
  `id_origine` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `MATERIEL`
--

INSERT INTO `MATERIEL` (`id`, `REF_MAT`, `DESIGN_MAT`, `SPEC_MAT`, `ETAT_MAT`, `DATE_DEB`, `MATRICULE`, `CODE_SERVICE`, `id_nomenclature`, `id_categorie`, `id_origine`, `created_at`, `updated_at`) VALUES
(3, 'SRSP-HM/2023/TAB5', 'Table en bois de pin', '90cm x 60cm x 120cm. Avec 3 tiroirs.', 'CONDAMNE', '2023-11-27 08:22:07', NULL, 'SRSPHM', 1, 41, 3, '2023-11-21 11:44:36', '2023-11-27 05:23:09'),
(4, NULL, 'Table en bois de pin', '90cm x 60cm x 120cm. Avec 3 tiroirs.', 'BON', '2023-11-21 14:44:36', NULL, 'SRSPHM', 1, 41, 3, '2023-11-21 11:44:36', '2023-11-26 17:50:03'),
(5, 'SRSP-HM/2023/TAB8', 'Table en bois de pin', '90cm x 60cm x 120cm. Avec 3 tiroirs.', 'MAUVAIS', '2023-11-27 13:03:56', 257461, 'SRSPHM', 1, 41, 3, '2023-11-21 11:44:36', '2023-11-27 10:04:18'),
(6, 'SRSP-HM/2023/CHS6', 'Chaise en mélamine', 'Roullante, retrecibles. Pliables.', 'BON', '2023-11-23 06:44:30', 257461, 'SRSPHM', 1, 42, 4, '2023-11-21 11:44:36', '2023-11-23 03:45:06'),
(7, NULL, 'Chaise en mélamine', 'Roullante, retrecibles. Pliables.', 'BON', '2023-11-21 14:44:36', NULL, 'SRSPHM', 1, 42, 4, '2023-11-21 11:44:36', '2023-11-21 11:44:36'),
(8, NULL, 'Chaise en mélamine', 'Roullante, retrecibles. Pliables.', 'BON', '2023-11-21 14:44:36', NULL, 'SRSPHM', 1, 42, 4, '2023-11-21 11:44:36', '2023-11-21 11:44:36'),
(9, 'SRSP-HM/2023/CHS7', 'Chaise en mélamine', 'Roullante, retrecibles. Pliables.', 'MOYEN', '2023-11-26 19:55:41', 437319, 'SRSPHM', 1, 42, 4, '2023-11-21 11:44:36', '2023-11-26 17:44:59'),
(10, NULL, 'Chaise en mélamine', 'Roullante, retrecibles. Pliables.', 'BON', '2023-11-21 14:44:37', NULL, 'SRSPHM', 1, 42, 4, '2023-11-21 11:44:37', '2023-11-21 11:44:37'),
(11, NULL, 'Chaise en mélamine', 'Roullante, retrecibles. Pliables.', 'BON', '2023-11-21 14:44:37', NULL, 'SRSPHM', 1, 42, 4, '2023-11-21 11:44:37', '2023-11-21 11:44:37'),
(12, NULL, 'Chaise en mélamine', 'Roullante, retrecibles. Pliables.', 'BON', '2023-11-21 14:44:37', NULL, 'SRSPHM', 1, 42, 4, '2023-11-21 11:44:37', '2023-11-21 11:44:37'),
(13, NULL, 'Chaise en mélamine', 'Roullante, retrecibles. Pliables.', 'BON', '2023-11-21 14:44:37', NULL, 'SRSPHM', 1, 42, 4, '2023-11-21 11:44:37', '2023-11-21 11:44:37'),
(14, NULL, 'Chaise en mélamine', 'Roullante, retrecibles. Pliables.', 'BON', '2023-11-21 14:44:37', NULL, 'SRSPHM', 1, 42, 4, '2023-11-21 11:44:37', '2023-11-21 11:44:37');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_08_22_075806_create_sessions_table', 1),
(7, '2023_09_20_113216_create_table_service', 1),
(8, '2023_09_20_121653_create_table_division', 1),
(9, '2023_09_20_122147_create_table_agent', 1),
(10, '2023_09_24_154746_create_table_compte', 1),
(11, '2023_09_24_155610_create_table_categorie', 1),
(12, '2023_09_25_055032_create_table_article', 1),
(13, '2023_10_07_042333_create_table_ref_demande', 1),
(14, '2023_10_07_042420_create_table_demande', 1),
(15, '2023_10_08_030904_create_table_ref_origine', 1),
(16, '2023_10_08_030917_create_table_origine', 1),
(17, '2023_11_19_061248_create_table_nomenclature', 1),
(18, '2023_11_19_065909_create_table_origine_mat', 1),
(19, '2023_11_19_074853_create_table_materiel', 1),
(22, '2023_11_26_182814_create_table_historique', 2),
(24, '2023_11_26_220057_create_table_sortie', 3);

-- --------------------------------------------------------

--
-- Structure de la table `NOMENCLATURE`
--

CREATE TABLE `NOMENCLATURE` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `NOMENCLATURE` varchar(255) NOT NULL,
  `DETAIL_NOM` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `NOMENCLATURE`
--

INSERT INTO `NOMENCLATURE` (`id`, `NOMENCLATURE`, `DETAIL_NOM`, `created_at`, `updated_at`) VALUES
(1, '03', 'Budget de Fonctionnement', '2023-11-21 09:52:48', '2023-11-21 09:52:48'),
(2, '05', 'Investissement type (Immobilisation corporelle)', '2023-11-21 09:52:48', '2023-11-21 09:52:48');

-- --------------------------------------------------------

--
-- Structure de la table `ORIGINE`
--

CREATE TABLE `ORIGINE` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `REF_ORIGINE` varchar(255) NOT NULL,
  `id_article` bigint(20) UNSIGNED NOT NULL,
  `QUANTITE` int(11) NOT NULL,
  `STOCK` int(11) NOT NULL,
  `PRIX` int(11) NOT NULL,
  `MONTANT` int(11) NOT NULL,
  `UNITE` varchar(255) NOT NULL,
  `ORIGINE` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ORIGINE`
--

INSERT INTO `ORIGINE` (`id`, `REF_ORIGINE`, `id_article`, `QUANTITE`, `STOCK`, `PRIX`, `MONTANT`, `UNITE`, `ORIGINE`, `created_at`, `updated_at`) VALUES
(1, 'ORG/2023/0002', 2, 50, 0, 7500, 375000, 'Nombre', 'SRSPHM', '2023-12-04 04:42:58', '2023-12-04 04:42:58'),
(2, 'ORG/2023/0002', 3, 50, 0, 2000, 100000, 'Nombre', 'SRSPHM', '2023-12-04 04:42:58', '2023-12-04 04:42:58'),
(3, 'ORG/2023/0002', 4, 50, 0, 2600, 130000, 'Nombre', 'SRSPHM', '2023-12-04 04:42:58', '2023-12-04 04:42:58');

-- --------------------------------------------------------

--
-- Structure de la table `ORIGINE_MAT`
--

CREATE TABLE `ORIGINE_MAT` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `REF_ORIGINE` varchar(255) NOT NULL,
  `QUANTITE` int(11) NOT NULL,
  `PRIX` int(11) NOT NULL,
  `MONTANT` int(11) NOT NULL,
  `ORIGINE` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ORIGINE_MAT`
--

INSERT INTO `ORIGINE_MAT` (`id`, `REF_ORIGINE`, `QUANTITE`, `PRIX`, `MONTANT`, `ORIGINE`, `created_at`, `updated_at`) VALUES
(3, 'ORG/2023/0001', 3, 75000, 225000, 'SRSPHM', '2023-11-21 11:44:36', '2023-11-21 11:44:36'),
(4, 'ORG/2023/0001', 9, 25000, 225000, 'SRSPHM', '2023-11-21 11:44:36', '2023-11-21 11:44:36');

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `REF_DEMANDE`
--

CREATE TABLE `REF_DEMANDE` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `REFERENCE` varchar(255) NOT NULL,
  `MATRICULE` int(11) NOT NULL,
  `ETAT` varchar(255) NOT NULL,
  `DATE_DEMANDE` datetime NOT NULL,
  `VALIDATION` datetime DEFAULT NULL,
  `LIVRAISON` datetime DEFAULT NULL,
  `CODE_SERVICE` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `REF_DEMANDE`
--

INSERT INTO `REF_DEMANDE` (`id`, `REFERENCE`, `MATRICULE`, `ETAT`, `DATE_DEMANDE`, `VALIDATION`, `LIVRAISON`, `CODE_SERVICE`, `created_at`, `updated_at`) VALUES
(1, '2023/0001', 257461, 'En attente', '2023-12-04 07:45:11', NULL, NULL, 'SRSPHM', '2023-12-04 04:45:11', '2023-12-04 04:45:11'),
(2, '2023/0002', 257461, 'En attente', '2023-12-11 06:10:25', NULL, NULL, 'SRSPHM', '2023-12-11 03:10:25', '2023-12-11 03:10:25'),
(3, '2024/0003', 257461, 'En attente', '2024-01-22 08:23:12', NULL, NULL, 'SRSPHM', '2024-01-22 05:23:12', '2024-01-22 05:23:12');

-- --------------------------------------------------------

--
-- Structure de la table `REF_ORIGINE`
--

CREATE TABLE `REF_ORIGINE` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `REFERENCE` varchar(255) NOT NULL,
  `CODE_SERVICE` varchar(255) NOT NULL,
  `FACTURE` varchar(255) DEFAULT NULL,
  `PRIX_TOTAL` varchar(255) DEFAULT NULL,
  `DATE_ORIGINE` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `REF_ORIGINE`
--

INSERT INTO `REF_ORIGINE` (`id`, `REFERENCE`, `CODE_SERVICE`, `FACTURE`, `PRIX_TOTAL`, `DATE_ORIGINE`, `created_at`, `updated_at`) VALUES
(3, 'ORG/2023/0001', 'SRSPHM', 'ORG/2023/0001', '450000', '2023-11-21 14:44:36', '2023-11-21 11:44:36', '2023-11-21 11:44:36'),
(4, 'ORG/2023/0002', 'SRSPHM', 'ORG/2023/0002', '605000', '2023-12-04 07:42:58', '2023-12-04 04:42:58', '2023-12-04 04:42:58');

-- --------------------------------------------------------

--
-- Structure de la table `SERVICE`
--

CREATE TABLE `SERVICE` (
  `CODE_SERVICE` varchar(255) NOT NULL,
  `LABEL_SERVICE` varchar(255) NOT NULL,
  `ENTETE1` varchar(255) NOT NULL,
  `ENTETE2` varchar(255) NOT NULL,
  `ENTETE3` varchar(255) NOT NULL,
  `ENTETE4` varchar(255) NOT NULL,
  `ENTETE5` varchar(255) NOT NULL,
  `SIGLE_SERVICE` varchar(255) NOT NULL,
  `VILLE_SERVICE` varchar(255) NOT NULL,
  `ADRESSE_SERVICE` varchar(255) NOT NULL,
  `CONTACT_SERVICE` varchar(255) NOT NULL,
  `ADRESSE_MAIL` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `SERVICE`
--

INSERT INTO `SERVICE` (`CODE_SERVICE`, `LABEL_SERVICE`, `ENTETE1`, `ENTETE2`, `ENTETE3`, `ENTETE4`, `ENTETE5`, `SIGLE_SERVICE`, `VILLE_SERVICE`, `ADRESSE_SERVICE`, `CONTACT_SERVICE`, `ADRESSE_MAIL`, `created_at`, `updated_at`) VALUES
('ADMIN', 'SERVICE ADMINISTRATEUR', 'Entête 1', 'Entête 2', 'Entête 3', 'Entête 4', 'Entête 5', 'Sigle 1', 'FIANARANTSOA', 'Fianarantsoa 301', '+261 34 38 079 86', 'xandrianajorobanadz@gmail.com', '2023-11-21 09:52:04', '2023-11-21 09:52:04'),
('SRBHM', 'Service Régional du Budget Haute Matsiatra', 'MINISTERE DE L\'ECONOMIE ET DES FINANCES', 'SECRETARIAT GENERAL', 'DIRECTION GENERALE DES FINANCES ET DU BUDGET', 'DIRECTION DU BUDGET', 'Service Régional du Budget Haute Matsiatra', 'N°    /SRB-HM/2023', 'Fianarantsoa', 'Ambozontany, Fianarantsoa', '+261 34 76 472 12', 'srb.hautematsiatra@mef.gov.mg', '2023-11-21 11:02:40', '2023-11-21 11:02:40'),
('SRSPHM', 'Service Régional de la Solde et des Pensions Haute Matsiatra', 'MINISTERE DE L\'ECONOMIE ET DES FINANCES', 'SECRETARIAT GENERAL', 'DIRECTION GENERALE DES FINANCES ET DU BUDGET', 'DIRECTION DE LA SOLDE ET DES PENSIONS', 'Service Régional de la Solde et des Pensions Haute Matsiatra', 'N°    /SRSP-HM/2023', 'Fianarantsoa', 'Andohanantady, Fianarantsoa', '+261 34 76 472 73', 'srsp.hautematsiatra@mef.gov.mg', '2023-11-21 11:01:23', '2023-11-21 11:01:23');

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('cnyg7CxmpXOqvjsNgc1AI6x0A8ntM4uxbIqBOdgc', 100000, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:121.0) Gecko/20100101 Firefox/121.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiaXdWc1lQdzdRQTI2OGJEQzBEeXF6Rmo5b2Z3dWdnRlhjZkowNGxacSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9yZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NToiYWxlcnQiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjEwMDAwMDt9', 1706041948);

-- --------------------------------------------------------

--
-- Structure de la table `SORTIE`
--

CREATE TABLE `SORTIE` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `REF_SORTIE` varchar(255) NOT NULL,
  `OBJET` varchar(255) NOT NULL,
  `STATUT` varchar(255) NOT NULL,
  `DATE` datetime NOT NULL,
  `id_materiel` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `SORTIE`
--

INSERT INTO `SORTIE` (`id`, `REF_SORTIE`, `OBJET`, `STATUT`, `DATE`, `id_materiel`, `created_at`, `updated_at`) VALUES
(2, 'SRT/2023/0001', 'Perdu lors de l\'inauguration du noveau Hotel de Fincance à Beravina, Fianarantsoa.', 'PERTE', '2023-11-27 08:22:07', 3, '2023-11-27 05:23:09', '2023-11-27 05:23:09');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `AGENT`
--
ALTER TABLE `AGENT`
  ADD PRIMARY KEY (`MATRICULE`),
  ADD KEY `agent_code_division_foreign` (`CODE_DIVISION`);

--
-- Index pour la table `ARTICLE`
--
ALTER TABLE `ARTICLE`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_code_service_foreign` (`CODE_SERVICE`),
  ADD KEY `article_id_categorie_foreign` (`id_categorie`);

--
-- Index pour la table `CATEGORIE`
--
ALTER TABLE `CATEGORIE`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categorie_compte_foreign` (`COMPTE`);

--
-- Index pour la table `COMPTE`
--
ALTER TABLE `COMPTE`
  ADD PRIMARY KEY (`COMPTE`);

--
-- Index pour la table `DEMANDE`
--
ALTER TABLE `DEMANDE`
  ADD PRIMARY KEY (`id`),
  ADD KEY `demande_id_article_foreign` (`id_article`),
  ADD KEY `demande_ref_demande_foreign` (`REF_DEMANDE`);

--
-- Index pour la table `DIVISION`
--
ALTER TABLE `DIVISION`
  ADD PRIMARY KEY (`CODE_DIVISION`),
  ADD KEY `division_code_service_foreign` (`CODE_SERVICE`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `HISTORIQUE`
--
ALTER TABLE `HISTORIQUE`
  ADD PRIMARY KEY (`id`),
  ADD KEY `historique_id_materiel_foreign` (`id_materiel`),
  ADD KEY `historique_matricule_foreign` (`MATRICULE`);

--
-- Index pour la table `MATERIEL`
--
ALTER TABLE `MATERIEL`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `materiel_ref_mat_unique` (`REF_MAT`),
  ADD KEY `materiel_id_nomenclature_foreign` (`id_nomenclature`),
  ADD KEY `materiel_id_categorie_foreign` (`id_categorie`),
  ADD KEY `materiel_id_origine_foreign` (`id_origine`),
  ADD KEY `materiel_matricule_foreign` (`MATRICULE`),
  ADD KEY `materiel_code_service_foreign` (`CODE_SERVICE`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `NOMENCLATURE`
--
ALTER TABLE `NOMENCLATURE`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ORIGINE`
--
ALTER TABLE `ORIGINE`
  ADD PRIMARY KEY (`id`),
  ADD KEY `origine_id_article_foreign` (`id_article`),
  ADD KEY `origine_origine_foreign` (`ORIGINE`),
  ADD KEY `origine_ref_origine_foreign` (`REF_ORIGINE`);

--
-- Index pour la table `ORIGINE_MAT`
--
ALTER TABLE `ORIGINE_MAT`
  ADD PRIMARY KEY (`id`),
  ADD KEY `origine_mat_origine_foreign` (`ORIGINE`),
  ADD KEY `origine_mat_ref_origine_foreign` (`REF_ORIGINE`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `REF_DEMANDE`
--
ALTER TABLE `REF_DEMANDE`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ref_demande_reference_unique` (`REFERENCE`),
  ADD KEY `ref_demande_code_service_foreign` (`CODE_SERVICE`),
  ADD KEY `ref_demande_matricule_foreign` (`MATRICULE`);

--
-- Index pour la table `REF_ORIGINE`
--
ALTER TABLE `REF_ORIGINE`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ref_origine_reference_unique` (`REFERENCE`),
  ADD KEY `ref_origine_code_service_foreign` (`CODE_SERVICE`);

--
-- Index pour la table `SERVICE`
--
ALTER TABLE `SERVICE`
  ADD PRIMARY KEY (`CODE_SERVICE`),
  ADD UNIQUE KEY `service_label_service_unique` (`LABEL_SERVICE`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `SORTIE`
--
ALTER TABLE `SORTIE`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sortie_ref_sortie_unique` (`REF_SORTIE`),
  ADD KEY `sortie_id_materiel_foreign` (`id_materiel`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ARTICLE`
--
ALTER TABLE `ARTICLE`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `CATEGORIE`
--
ALTER TABLE `CATEGORIE`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT pour la table `DEMANDE`
--
ALTER TABLE `DEMANDE`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `HISTORIQUE`
--
ALTER TABLE `HISTORIQUE`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `MATERIEL`
--
ALTER TABLE `MATERIEL`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `NOMENCLATURE`
--
ALTER TABLE `NOMENCLATURE`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `ORIGINE`
--
ALTER TABLE `ORIGINE`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `ORIGINE_MAT`
--
ALTER TABLE `ORIGINE_MAT`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `REF_DEMANDE`
--
ALTER TABLE `REF_DEMANDE`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `REF_ORIGINE`
--
ALTER TABLE `REF_ORIGINE`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `SORTIE`
--
ALTER TABLE `SORTIE`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `AGENT`
--
ALTER TABLE `AGENT`
  ADD CONSTRAINT `agent_code_division_foreign` FOREIGN KEY (`CODE_DIVISION`) REFERENCES `DIVISION` (`CODE_DIVISION`) ON DELETE CASCADE;

--
-- Contraintes pour la table `ARTICLE`
--
ALTER TABLE `ARTICLE`
  ADD CONSTRAINT `article_code_service_foreign` FOREIGN KEY (`CODE_SERVICE`) REFERENCES `SERVICE` (`CODE_SERVICE`) ON DELETE CASCADE,
  ADD CONSTRAINT `article_id_categorie_foreign` FOREIGN KEY (`id_categorie`) REFERENCES `CATEGORIE` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `CATEGORIE`
--
ALTER TABLE `CATEGORIE`
  ADD CONSTRAINT `categorie_compte_foreign` FOREIGN KEY (`COMPTE`) REFERENCES `COMPTE` (`COMPTE`) ON DELETE CASCADE;

--
-- Contraintes pour la table `DEMANDE`
--
ALTER TABLE `DEMANDE`
  ADD CONSTRAINT `demande_id_article_foreign` FOREIGN KEY (`id_article`) REFERENCES `ARTICLE` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `demande_ref_demande_foreign` FOREIGN KEY (`REF_DEMANDE`) REFERENCES `REF_DEMANDE` (`REFERENCE`) ON DELETE CASCADE;

--
-- Contraintes pour la table `DIVISION`
--
ALTER TABLE `DIVISION`
  ADD CONSTRAINT `division_code_service_foreign` FOREIGN KEY (`CODE_SERVICE`) REFERENCES `SERVICE` (`CODE_SERVICE`) ON DELETE CASCADE;

--
-- Contraintes pour la table `HISTORIQUE`
--
ALTER TABLE `HISTORIQUE`
  ADD CONSTRAINT `historique_id_materiel_foreign` FOREIGN KEY (`id_materiel`) REFERENCES `MATERIEL` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `historique_matricule_foreign` FOREIGN KEY (`MATRICULE`) REFERENCES `AGENT` (`MATRICULE`) ON DELETE CASCADE;

--
-- Contraintes pour la table `MATERIEL`
--
ALTER TABLE `MATERIEL`
  ADD CONSTRAINT `materiel_code_service_foreign` FOREIGN KEY (`CODE_SERVICE`) REFERENCES `SERVICE` (`CODE_SERVICE`) ON DELETE CASCADE,
  ADD CONSTRAINT `materiel_id_categorie_foreign` FOREIGN KEY (`id_categorie`) REFERENCES `CATEGORIE` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `materiel_id_nomenclature_foreign` FOREIGN KEY (`id_nomenclature`) REFERENCES `NOMENCLATURE` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `materiel_id_origine_foreign` FOREIGN KEY (`id_origine`) REFERENCES `ORIGINE_MAT` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `materiel_matricule_foreign` FOREIGN KEY (`MATRICULE`) REFERENCES `AGENT` (`MATRICULE`) ON DELETE CASCADE;

--
-- Contraintes pour la table `ORIGINE`
--
ALTER TABLE `ORIGINE`
  ADD CONSTRAINT `origine_id_article_foreign` FOREIGN KEY (`id_article`) REFERENCES `ARTICLE` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `origine_origine_foreign` FOREIGN KEY (`ORIGINE`) REFERENCES `SERVICE` (`CODE_SERVICE`) ON DELETE CASCADE,
  ADD CONSTRAINT `origine_ref_origine_foreign` FOREIGN KEY (`REF_ORIGINE`) REFERENCES `REF_ORIGINE` (`REFERENCE`) ON DELETE CASCADE;

--
-- Contraintes pour la table `ORIGINE_MAT`
--
ALTER TABLE `ORIGINE_MAT`
  ADD CONSTRAINT `origine_mat_origine_foreign` FOREIGN KEY (`ORIGINE`) REFERENCES `SERVICE` (`CODE_SERVICE`) ON DELETE CASCADE,
  ADD CONSTRAINT `origine_mat_ref_origine_foreign` FOREIGN KEY (`REF_ORIGINE`) REFERENCES `REF_ORIGINE` (`REFERENCE`) ON DELETE CASCADE;

--
-- Contraintes pour la table `REF_DEMANDE`
--
ALTER TABLE `REF_DEMANDE`
  ADD CONSTRAINT `ref_demande_code_service_foreign` FOREIGN KEY (`CODE_SERVICE`) REFERENCES `SERVICE` (`CODE_SERVICE`) ON DELETE CASCADE,
  ADD CONSTRAINT `ref_demande_matricule_foreign` FOREIGN KEY (`MATRICULE`) REFERENCES `AGENT` (`MATRICULE`) ON DELETE CASCADE;

--
-- Contraintes pour la table `REF_ORIGINE`
--
ALTER TABLE `REF_ORIGINE`
  ADD CONSTRAINT `ref_origine_code_service_foreign` FOREIGN KEY (`CODE_SERVICE`) REFERENCES `SERVICE` (`CODE_SERVICE`) ON DELETE CASCADE;

--
-- Contraintes pour la table `SORTIE`
--
ALTER TABLE `SORTIE`
  ADD CONSTRAINT `sortie_id_materiel_foreign` FOREIGN KEY (`id_materiel`) REFERENCES `MATERIEL` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
