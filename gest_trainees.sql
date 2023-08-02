-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 23 août 2021 à 12:11
-- Version du serveur :  5.7.24
-- Version de PHP : 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gest_trainees`
--

-- --------------------------------------------------------

--
-- Structure de la table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `id_trainee` int(11) NOT NULL,
  `date` date NOT NULL,
  `state` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `attendance`
--

INSERT INTO `attendance` (`id`, `id_trainee`, `date`, `state`) VALUES
(1, 1, '2021-08-13', 'p'),
(2, 2, '2021-08-13', 'p'),
(3, 1, '2021-08-14', 'p'),
(4, 2, '2021-08-14', 'p'),
(5, 1, '2021-08-22', 'a'),
(6, 2, '2021-08-22', 'p'),
(7, 1, '2021-08-23', 'a'),
(8, 2, '2021-08-23', 'p'),
(9, 3, '2021-08-23', 'a'),
(10, 4, '2021-08-23', 'a');

-- --------------------------------------------------------

--
-- Structure de la table `attribution_internship`
--

CREATE TABLE `attribution_internship` (
  `id` int(11) NOT NULL,
  `id_trainee` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '0',
  `id_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `attribution_internship`
--

INSERT INTO `attribution_internship` (`id`, `id_trainee`, `date_start`, `date_end`, `state`, `id_type`) VALUES
(1, 1, '2021-08-13', '2021-08-31', 1, 2),
(2, 2, '2021-08-13', '2021-08-31', 1, 1),
(3, 4, '2021-07-24', '2021-07-31', 1, 2),
(4, 3, '2021-08-23', '2021-08-31', 1, 1),
(5, 4, '2021-08-23', '2021-08-31', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `certificates_templates`
--

CREATE TABLE `certificates_templates` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `template_content` longtext NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '0',
  `pubdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `certificates_templates`
--

INSERT INTO `certificates_templates` (`id`, `title`, `template_content`, `state`, `pubdate`) VALUES
(1, 'ModÃ¨le d\\&#039;Attestation de Stage', '&lt;h1 style=\\&quot;text-align: center;\\&quot;&gt;&lt;span style=\\&quot;text-decoration: underline;\\&quot;&gt;Attestation de Stage&lt;/span&gt;&lt;/h1&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;Je soussign&amp;eacute;&amp;nbsp;&lt;strong&gt;div.fname&amp;nbsp;div.lname,&amp;nbsp;&lt;/strong&gt;div.function &amp;agrave; la Compagnie des Phosphates de Gafsa, certifie par la pr&amp;eacute;sente que&amp;nbsp;&lt;strong&gt;t.lname&amp;nbsp;t.fname&amp;nbsp;&lt;/strong&gt;a effectu&amp;eacute;(e) un stage au sein de&amp;nbsp;notre soci&amp;eacute;t&amp;eacute; et ce durant la p&amp;eacute;riode&amp;nbsp; allant de&amp;nbsp;&lt;strong&gt;s.date_start&lt;/strong&gt;&amp;nbsp;&amp;agrave;&amp;nbsp;&lt;strong&gt;s.date_end&lt;/strong&gt;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&lt;strong&gt;Signature&amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp; &amp;nbsp;Gafsa le @currentdate&lt;/strong&gt;&lt;/p&gt;', 1, '2021-08-21');

-- --------------------------------------------------------

--
-- Structure de la table `config_certificate`
--

CREATE TABLE `config_certificate` (
  `div_fname` varchar(250) NOT NULL,
  `div_lname` varchar(250) NOT NULL,
  `div_post` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `config_certificate`
--

INSERT INTO `config_certificate` (`div_fname`, `div_lname`, `div_post`) VALUES
('Noureddine', 'Belgacem', 'Chef Division Informatique');

-- --------------------------------------------------------

--
-- Structure de la table `internship_types`
--

CREATE TABLE `internship_types` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `internship_types`
--

INSERT INTO `internship_types` (`id`, `type`) VALUES
(1, 'Ouvrier'),
(2, 'Technicien');

-- --------------------------------------------------------

--
-- Structure de la table `scolar_establishment`
--

CREATE TABLE `scolar_establishment` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `tel1` varchar(8) DEFAULT NULL,
  `tel2` varchar(8) DEFAULT NULL,
  `fax` varchar(8) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `adress` longtext,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `scolar_establishment`
--

INSERT INTO `scolar_establishment` (`id`, `name`, `tel1`, `tel2`, `fax`, `email`, `adress`, `type`) VALUES
(1, 'Faculté des sciences de Gafsa', '76211024', '76211701', '76211026', 'webmasterfsgf@gmail.com', 'Campus Universitaire Sidi Ahmed Zarroug - 2112 Gafsa', 2),
(2, 'ISET Gafsa', '76211081', '76211041', '76211080', '', 'Campus Universitaire Sidi Ahmed Zarrouk - 2112 Gafsa', 2);

-- --------------------------------------------------------

--
-- Structure de la table `scolar_establishment_types`
--

CREATE TABLE `scolar_establishment_types` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `scolar_establishment_types`
--

INSERT INTO `scolar_establishment_types` (`id`, `type`) VALUES
(1, 'Centre de Formation'),
(2, 'Université');

-- --------------------------------------------------------

--
-- Structure de la table `trainees`
--

CREATE TABLE `trainees` (
  `id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `cin` varchar(8) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tel` varchar(8) NOT NULL,
  `institute` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `account_state` tinyint(1) NOT NULL DEFAULT '0',
  `role` varchar(15) NOT NULL DEFAULT 'trainee'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `trainees`
--

INSERT INTO `trainees` (`id`, `fname`, `lname`, `gender`, `cin`, `email`, `tel`, `institute`, `username`, `password`, `account_state`, `role`) VALUES
(1, 'John', 'Doe', '0', '12345678', 'john@gmail.com', '12345678', 2, 'john', 'MmJBaE9VYzNyRWlLR2k0Vk9aOE92dz09', 1, 'trainee'),
(2, 'Jane', 'Doe', '1', '32145678', 'jane@gmail.com', '32145678', 1, 'jane', 'MmJBaE9VYzNyRWlLR2k0Vk9aOE92dz09', 1, 'trainee'),
(3, 'mohammed', 'ahmed', '0', '10247859', 'mohamed@gmail.com', '45784102', 1, 'mohammed', 'blRBWHN6azMxRlhJMkQ0VmN5di9LUT09', 1, 'trainee'),
(4, 'test', 'test', '0', '32165478', 'a@test.com', '52145632', 1, 'test', 'MmJBaE9VYzNyRWlLR2k0Vk9aOE92dz09', 1, 'trainee');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `username`, `password`, `role`) VALUES
(1, 'Amir', 'Ali Salah', 'codeurx@gmail.com', 'codeurx', 'YWt4UmRuRjc4MGNsRXVaK2tSQmlkdz09', 'webmaster'),
(2, 'aajina', 'bourawi', 'ezfzefzefzefze', 'bourawi', 'YWt4UmRuRjc4MGNsRXVaK2tSQmlkdz09', 'webmaster');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_trainee` (`id_trainee`);

--
-- Index pour la table `attribution_internship`
--
ALTER TABLE `attribution_internship`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_trainee` (`id_trainee`),
  ADD KEY `fk_id_type` (`id_type`);

--
-- Index pour la table `certificates_templates`
--
ALTER TABLE `certificates_templates`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `internship_types`
--
ALTER TABLE `internship_types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `scolar_establishment`
--
ALTER TABLE `scolar_establishment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_type` (`type`);

--
-- Index pour la table `scolar_establishment_types`
--
ALTER TABLE `scolar_establishment_types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `trainees`
--
ALTER TABLE `trainees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_intitue` (`institute`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `attribution_internship`
--
ALTER TABLE `attribution_internship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `certificates_templates`
--
ALTER TABLE `certificates_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `internship_types`
--
ALTER TABLE `internship_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `scolar_establishment`
--
ALTER TABLE `scolar_establishment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `scolar_establishment_types`
--
ALTER TABLE `scolar_establishment_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `trainees`
--
ALTER TABLE `trainees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`id_trainee`) REFERENCES `trainees` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `attribution_internship`
--
ALTER TABLE `attribution_internship`
  ADD CONSTRAINT `fk_id_trainee` FOREIGN KEY (`id_trainee`) REFERENCES `trainees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_id_type` FOREIGN KEY (`id_type`) REFERENCES `internship_types` (`id`);

--
-- Contraintes pour la table `scolar_establishment`
--
ALTER TABLE `scolar_establishment`
  ADD CONSTRAINT `fk_type` FOREIGN KEY (`type`) REFERENCES `scolar_establishment_types` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `trainees`
--
ALTER TABLE `trainees`
  ADD CONSTRAINT `fk_intitue` FOREIGN KEY (`institute`) REFERENCES `scolar_establishment` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
