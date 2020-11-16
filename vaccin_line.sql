-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 16 nov. 2020 à 09:19
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `vaccin_line`
--

-- --------------------------------------------------------

--
-- Structure de la table `vl_contacts`
--

CREATE TABLE `vl_contacts` (
  `id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `lu` varchar(3) NOT NULL DEFAULT 'non',
  `object` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `vl_contacts`
--

INSERT INTO `vl_contacts` (`id`, `email`, `message`, `created_at`, `lu`, `object`, `status`) VALUES
(1, 'michelle.obama@gmail.com', 'Bonjours Je vous envoie ce mail car j\'aimerais avoir plus d\'information a propos de ce vaccin : Pfizer', '2020-11-12 11:45:00', 'oui', 'Information Vaccin', 1),
(2, 'bernard.ermite@gmail.com', 'bonjours bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla', '2020-10-21 12:00:00', 'oui', 'bla bla bla bla bla ', 1),
(3, 'michel.michel@gmail.com', 'bla bla bla bla bla bla bla bla ', '2020-11-12 12:55:54', 'oui', 'Enorme', 1),
(4, 'bernard-ermite@gmail.com', 'spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam ', '2020-11-12 16:12:35', 'oui', 'spam spam ', 1),
(5, 'bernard-ermite@gmail.com', 'spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam ', '2020-11-12 16:12:35', 'oui', 'spam spam ', 1),
(6, 'bernard-ermite@gmail.com', 'spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam ', '2020-11-12 16:12:35', 'oui', 'spam spam ', 1),
(7, 'bernard-ermite@gmail.com', 'spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam ', '2020-11-12 16:12:35', 'oui', 'spam spam ', 0),
(8, 'bernard-ermite@gmail.com', 'spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam ', '2020-11-12 16:12:35', 'oui', 'spam spam ', 1),
(9, 'bernard-ermite@gmail.com', 'spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam ', '2020-11-12 16:12:35', 'oui', 'spam spam ', 1),
(10, 'bernard-ermite@gmail.com', 'spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam ', '2020-11-12 16:12:35', 'oui', 'spam spam ', 1),
(11, 'bernard-ermite@gmail.com', 'spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam spam ', '2020-11-12 16:12:35', 'oui', 'spam spam ', 1);

-- --------------------------------------------------------

--
-- Structure de la table `vl_reset_mdp`
--

CREATE TABLE `vl_reset_mdp` (
  `id` int(11) NOT NULL,
  `email_user` varchar(150) NOT NULL,
  `token` varchar(255) NOT NULL,
  `time_token` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `vl_users`
--

CREATE TABLE `vl_users` (
  `id` int(11) NOT NULL,
  `nom` varchar(150) NOT NULL,
  `prenom` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(120) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `token` varchar(255) DEFAULT NULL,
  `token_at` datetime DEFAULT NULL,
  `date_naissance` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `civilite` varchar(100) NOT NULL,
  `role` varchar(10) NOT NULL,
  `age` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `vl_users`
--

INSERT INTO `vl_users` (`id`, `nom`, `prenom`, `password`, `email`, `status`, `token`, `token_at`, `date_naissance`, `created_at`, `civilite`, `role`, `age`) VALUES
(1, 'Lamy', 'Valentin', 'valentin_admin', 'lamy.valentin76770@gmail.com', 1, NULL, NULL, '0000-00-00', '2020-11-10 14:32:17', 'Homme', 'role_admin', 20),
(2, 'Bellier', 'Lucas', '$2y$10$0GpweYHAZy/r65CGFcOSvObtC0genZ1nxQlz88y71pdgbhFvkRGSe', 'contact@lucasbellier.fr', 1, '5fe5c802d424d2c6a6cbea78f6445b94', '2020-11-13 16:40:49', '17-11-2001', '2020-11-11 13:28:58', 'monsieur', 'role_admin', 19),
(3, 'Vitorino', 'Enzo', 'enzo_admin', 'juleenzo41@gmail.com', 1, NULL, NULL, '0000-00-00', '2020-11-10 14:39:06', 'Femme', 'role_admin', 19),
(4, 'Vannarath', 'Quentin', 'quentin_admin', 'qvannarath@gmail.com', 1, NULL, NULL, '0000-00-00', '2020-11-10 14:41:22', 'Homme', 'role_admin', 25),
(5, 'Galvani', 'Florian', '$2y$10$xdd2C/gFTnRmKP9TJ6vukuUU86ioUjjsgiKRpfCzTyI92dPMphySW', 'florian.galvani@gmail.com', 1, NULL, NULL, '0000-00-00', '2020-11-10 14:41:22', 'Homme', 'role_user', 23),
(22, 'hrtrhrthrt', 'rthrhrthrther', '$2y$10$xdd2C/gFTnRmKP9TJ6vukuUU86ioUjjsgiKRpfCzTyI92dPMphySW', 'azerty@zerty.aq', 0, 'fd76fb8febcaac2917a1206f884d2518', NULL, '02-05-2000', '2020-11-10 23:23:28', 'monsieur', 'role_user', 20),
(24, 'Obama', 'michelle', '$2y$10$bYbQKUfDWNYDDZYUCBzQa.19OX1t3TQb54jaVjcegWXxo5mQPg14C', 'michelle.obama@gmail.com', 1, 'e636126c84c04318e37ec221b88b397c', NULL, '16-07-1970', '2020-11-12 11:00:20', 'madame', 'role_user', 50),
(25, 'obama', 'barack', '$2y$10$ppoz4pfAS48NHLLfnL9WHepE3bm7sGHQSE6sViA1zEmFIQqs4jt.u', 'barack.obama@maisonblanche.usa', 1, '8e83f8174c669fb94c9ac584f02e3d36', NULL, '18-06-1973', '2020-11-13 11:41:51', 'monsieur', 'role_user', 47),
(26, 'Crinon', 'Julien', '$2y$10$Rlt/sNKQ1WN.hqmCcOIjPOobvE8hN8Gnmxc8EP71vHDN1So//fMjy', 'julien@gmail.com', 1, '', '2020-11-13 17:25:15', '06-09-2001', '2020-11-13 17:21:36', 'monsieur', 'role_user', 19);

-- --------------------------------------------------------

--
-- Structure de la table `vl_vaccins`
--

CREATE TABLE `vl_vaccins` (
  `id` int(11) NOT NULL,
  `maladie` varchar(255) NOT NULL,
  `descriptif` varchar(255) NOT NULL,
  `renouveler_le` datetime NOT NULL,
  `expiration` datetime NOT NULL,
  `obligatoire` varchar(20) NOT NULL,
  `dangerosité` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `vl_vaccins`
--

INSERT INTO `vl_vaccins` (`id`, `maladie`, `descriptif`, `renouveler_le`, `expiration`, `obligatoire`, `dangerosité`) VALUES
(1, 'hepatite A', 'virus provoquant une infection du foie', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'oui', 'mortelle'),
(2, 'méningites a Haemophilus influenzae de type b', 'bactérie très répandue, provoque otite et infections et peut être a l\'origine de méningite ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'non', 'modéré'),
(3, 'méningites et septicémies a méningocoques', 'bactéries infectieuses qui peuvent être l\'origine de méningites et septicémies', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'non', 'modéré'),
(4, 'diphtérie', 'Bactéries très contagieuse provoquant fièvre angine et autre maladies', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'non', 'benin'),
(5, 'tetanos', 'maladie aiguë grave provoqué par la toxine d\'une bacterie mortelle, provoque contractions des muscles intense', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'oui', 'mortelle'),
(6, 'poliomyelite', 'maladie due a un poilovirus, asymptomatique dans 75% des cas mais peut etre accompagnée de fievre et maux de tete, mortelle si elle atteint la moelle epiniere', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'non', 'modéré'),
(7, 'coqueluche', 'maladie se manifestant par une grosse toux durable, peut meme provoqué  jusqu\'au vomissement', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'oui', 'benin'),
(8, 'infections a papillomavirus humains (hpv)', 'maladie asymptomatique et sans consequences dans la majorité des cas, dans certains cas des verrues genitales peuvent apparaitre, l\'infection persistante est rare mais peut provoqué des lesions precancereuses dans le col de l\'uterus', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'non', 'benin'),
(9, 'encéphalite a tiques', 'virus transmis par la piqure de tiques infectés, maladie qui ce manifeste brutalement comme une grippe apres deux semaine d\'incubation, peut etre mortelle dans certains cas', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'non', 'modéré'),
(10, 'hépatite B', 'virus qui ce transmet essentiellement par les fluides corporels, et provoquant sur le long termes une infections du foie', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'oui', 'mortelle'),
(11, 'grippe', 'infection respiratoire aiguë due a un virus, apparait brutalement sous forme de fievre, maux de tete, courbatures, fatigue intense etc..', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'oui', 'modéré'),
(12, 'rougeole', 'virus contagieux se manifestant par une fievre montant rapidement, grosse toux, nez qui coule, yeux rouge et autres symptomes', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'oui', 'benin'),
(13, 'oreillons', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et d', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'oui', 'benin'),
(14, 'rubeole', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et d', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'oui', 'benin'),
(15, 'rage', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et d', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'oui', 'mortelle'),
(16, 'gastro-entérite a rotavirus', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et d', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'non', 'benin'),
(17, 'leptospirose', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et d', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'non', 'modéré'),
(18, 'fièvre jaune', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et d', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'non', 'mortelle'),
(19, 'zona', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et d', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'non', 'mortelle'),
(20, 'varicelle', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et d', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'oui', 'benin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `vl_contacts`
--
ALTER TABLE `vl_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vl_reset_mdp`
--
ALTER TABLE `vl_reset_mdp`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vl_users`
--
ALTER TABLE `vl_users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vl_vaccins`
--
ALTER TABLE `vl_vaccins`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `vl_contacts`
--
ALTER TABLE `vl_contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `vl_reset_mdp`
--
ALTER TABLE `vl_reset_mdp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `vl_users`
--
ALTER TABLE `vl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `vl_vaccins`
--
ALTER TABLE `vl_vaccins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
