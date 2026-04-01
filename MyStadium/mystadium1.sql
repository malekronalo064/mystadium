-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 11 mai 2023 à 15:20
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mystadium1`
--

-- --------------------------------------------------------

--
-- Structure de la table `centre`
--

CREATE TABLE `centre` (
  `id` int(11) NOT NULL,
  `nom_centre` varchar(50) DEFAULT NULL,
  `adresse_centre` varchar(50) DEFAULT NULL,
  `horraire_centre` datetime DEFAULT NULL,
  `email_centre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `centre`
--

INSERT INTO `centre` (`id`, `nom_centre`, `adresse_centre`, `horraire_centre`, `email_centre`) VALUES
(1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `res_id` int(11) NOT NULL,
  `res_name` varchar(50) DEFAULT NULL,
  `res_tel` varchar(50) DEFAULT NULL,
  `res_email` varchar(50) DEFAULT NULL,
  `res_date_debut` datetime DEFAULT NULL,
  `res_date_fin` varchar(50) DEFAULT NULL,
  `res_prix` varchar(50) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `id_1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`res_id`, `res_name`, `res_tel`, `res_email`, `res_date_debut`, `res_date_fin`, `res_prix`, `id`, `id_1`) VALUES
(0, 'ugyugvyug', 'uygvuygvuyg', 'vyugv@hbgb.com', '2023-05-12 08:00:00', '2023-05-12 9:00:00', '10', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `stadium_user`
--

CREATE TABLE `stadium_user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telephone` varchar(50) DEFAULT NULL,
  `login` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `stadium_user`
--

INSERT INTO `stadium_user` (`id`, `firstname`, `lastname`, `email`, `telephone`, `login`, `password`) VALUES
(1, 'ugyugvyug', 'iguyg', 'vyugv', 'uygvuygvuyg', 'mm', '$2y$10$6ev1i956heYsOJfbA7AD1ubxzw3VSJej2IIZyAnTKk00DvY48vgKm');

-- --------------------------------------------------------

--
-- Structure de la table `terrain`
--

CREATE TABLE `terrain` (
  `id` int(11) NOT NULL,
  `nom_terrain` varchar(50) DEFAULT NULL,
  `nbr_pers_terrain` varchar(50) DEFAULT NULL,
  `temps_terrain` time DEFAULT NULL,
  `prix_terrain` varchar(50) DEFAULT NULL,
  `id_1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `terrain`
--

INSERT INTO `terrain` (`id`, `nom_terrain`, `nbr_pers_terrain`, `temps_terrain`, `prix_terrain`, `id_1`) VALUES
(0, 'terrain_1', '', '00:00:00', '', 1),
(1, 'terrain_2', '', '00:00:00', '', 1),
(2, 'terrain_3', '', '00:00:00', '', 1),
(3, 'terrain_4', '', '00:00:00', '', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `centre`
--
ALTER TABLE `centre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`res_id`),
  ADD KEY `id_1` (`id_1`),
  ADD KEY `reservation_ibfk_1` (`id`);

--
-- Index pour la table `stadium_user`
--
ALTER TABLE `stadium_user`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `terrain`
--
ALTER TABLE `terrain`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_1` (`id_1`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `stadium_user`
--
ALTER TABLE `stadium_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`id`) REFERENCES `stadium_user` (`id`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`id_1`) REFERENCES `terrain` (`id`);

--
-- Contraintes pour la table `terrain`
--
ALTER TABLE `terrain`
  ADD CONSTRAINT `terrain_ibfk_1` FOREIGN KEY (`id_1`) REFERENCES `centre` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
