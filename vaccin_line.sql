-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 20 nov. 2020 à 11:23
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
(2, 'florian.galvani@gmail.com', 'dkldklmklmghslkhlkmflm', '2020-11-12 14:15:38', 'oui', 'DFL%DFLDFL%DB%LDBL%', 1),
(3, 'florian.galvani@gmail.com', 'dflmgflmkdkldfhlmkhlù', '2020-11-12 14:20:07', 'oui', 'dfglksklmhmklfglmklmkmlkglmkglmkg', 1),
(4, 'florian.galvani@gmail.com', 'dblkqdblmkgklngqlkùqngùl', '2020-11-12 14:22:33', 'oui', 'xfgblm,xfgnm,fgn,fng', 1),
(5, 'florian.galvani@gmail.com', 'tmklfhslmkhklmhflmkhstlmlmlhmlmlkthklklmtrhlkth', '2020-11-12 20:13:03', 'oui', 'azeklmgrlkmhlkmhl', 1),
(6, 'florian.galvani@gmail.com', 'tmklfhslmkhklmhflmkhstlmlmlhmlmlkthklklmtrhlkth', '2020-11-12 20:14:29', 'oui', 'azeklmgrlkmhlkmhl', 0),
(7, 'florian.galvani@gmail.com', 'Voila un beau test !', '2020-11-13 09:33:15', 'oui', 'ceci est un test', 1),
(8, 'theo@gmail.com', 'super c\'est fou', '2020-11-18 22:26:50', 'oui', 'important', 1),
(9, 'contact@lucasbellier.fr', 'AH OUAIS CA MARCHE SUPER', '2020-11-19 09:13:03', 'oui', 'Enorme', 1);

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
(1, 'Lamy', 'Valentin', 'valentin_admin', 'lamy.valentin76770@gmail.com', 1, NULL, NULL, '0000-00-00', '2020-11-10 14:32:17', 'Homme', 'role_admin', 0),
(3, 'Vitorino', 'Enzo', 'enzo_admin', 'juleenzo41@gmail.com', 1, NULL, NULL, '0000-00-00', '2020-11-10 14:39:06', 'Femme', 'role_admin', 0),
(4, 'Vannarath', 'Quentin', 'quentin_admin', 'qvannarath@gmail.com', 1, NULL, NULL, '0000-00-00', '2020-11-10 14:41:22', 'Homme', 'role_admin', 0),
(5, 'Galvani', 'Florian', '$2y$10$5ijgisx1pRAB7J9x/4b6ueJmGMmyzAq3/pO4UheMcJVgw9Wqf6Egi', 'florian.galvani@gmail.com', 1, NULL, NULL, '0000-00-00', '2020-11-10 14:41:22', 'monsieur', 'role_user', 24),
(22, 'hrtrhrthrt', 'rthrhrthrther', '$2y$10$xdd2C/gFTnRmKP9TJ6vukuUU86ioUjjsgiKRpfCzTyI92dPMphySW', 'azerty@zerty.aq', 1, 'fd76fb8febcaac2917a1206f884d2518', NULL, '02-05-2000', '2020-11-10 23:23:28', 'monsieur', 'role_user', 20),
(24, 'John', 'Doe', '$2y$10$WZ9U3Qucu5QKLR.Ll4tyU./E4zxZhjiZVlvlkypQtexRiZMuzDUL6', 'test@test.com', 1, 'aacdb890d7dc7eb3c2248da2f45656ce', NULL, '12-02-1975', '2020-11-11 12:42:45', 'monsieur', 'role_user', 45),
(25, 'Crinon', 'Julien', '$2y$10$MiFIB3ccMHsuffm3CUwGtuuMOfITOz2d.9LYxjrDGH5kbwq6QmKMW', 'julien@gmail.com', 1, '', '2020-11-16 09:52:39', '06-09-2001', '2020-11-16 09:52:21', 'monsieur', 'role_user', 19),
(26, 'bellier', 'lucas', '$2y$10$P0amjSFed2U5HrY4G5MEn.1uhhyUg5Y4g.wvOSwzhGj.NQB711cbm', 'contact@lucasbellier.fr', 1, 'ffcb144bdeda76b3868b2f75f7c26f58', NULL, '17-11-2001', '2020-11-16 10:40:39', 'monsieur', 'role_admin', 19),
(27, 'Vayne', 'Shauna', '$2y$10$brk.XJLSPKm4FoyvSNht.uIP4OFK/Cy1shDTKGZk94wKtQgxnhW22', 'shauna.vayne@demacia.lol', 1, '9Xxj6ZKnKzaQsdzcR2OgHCwuVwKLWS4KmtGAk0DyXVV4XOamTLPdxhTZjyeqzQ3gGOQ0DiCLUEkdnAXR', '2020-11-18 09:05:52', '17-11-2001', '2020-11-16 14:38:42', 'madame', 'role_admin', 19),
(28, 'uzumaki', 'naruto', '$2y$10$YWqOnVNn5HWoQywPKFDNluSg6c8FI.7Ka2tap773.AqyT8oMhLYLK', 'naruto@ninja.lol', 1, 'on46qSdmRtApwWFPyj33TvJzxOaspd5FQYQ8d96ZwW0kqhIldEoCTqbbBa2x4SA9nGrcPbNPAq4VsRiC', '2020-11-16 16:34:35', '16-06-2012', '2020-11-16 16:24:40', 'monsieur', 'role_user', 8),
(29, 'maudet', 'théo', '$2y$10$9ZkEymLc78UhxWynF03J4.c3Cd5aRh.81RcZrHQ0NbPR0KfYOWtDW', 'theo@gmail.com', 1, 'AUz1FVPJarIjilvMPBiHBbsYfFqMI88KJR0QxOxgcL3y3hKRXaJWDJ9q63vm5sxaqGoZNWHkOoKaD7FS', '2020-11-18 22:24:41', '03-03-2001', '2020-11-18 22:23:06', 'monsieur', 'role_user', 19);

-- --------------------------------------------------------

--
-- Structure de la table `vl_user_settings`
--

CREATE TABLE `vl_user_settings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `relance` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `vl_user_settings`
--

INSERT INTO `vl_user_settings` (`id`, `user_id`, `relance`) VALUES
(1, 5, 'on'),
(2, 26, 'on');

-- --------------------------------------------------------

--
-- Structure de la table `vl_user_vaccin`
--

CREATE TABLE `vl_user_vaccin` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_vaccin` int(11) NOT NULL,
  `fait_le` date NOT NULL,
  `renouveler_le` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `vl_user_vaccin`
--

INSERT INTO `vl_user_vaccin` (`id`, `id_user`, `id_vaccin`, `fait_le`, `renouveler_le`) VALUES
(9, 5, 1, '2020-11-11', NULL),
(10, 5, 7, '2020-11-07', NULL),
(11, 5, 18, '2020-11-03', NULL),
(12, 5, 6, '2020-11-01', NULL),
(13, 5, 13, '2020-11-16', NULL),
(14, 26, 11, '2020-11-17', NULL),
(15, 26, 15, '2020-02-20', NULL),
(16, 29, 11, '2020-06-18', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `vl_vaccins`
--

CREATE TABLE `vl_vaccins` (
  `id` int(11) NOT NULL,
  `maladie` varchar(255) NOT NULL,
  `descriptif` varchar(255) NOT NULL,
  `renouveler_le` datetime DEFAULT NULL,
  `expiration` int(10) NOT NULL,
  `obligatoire` varchar(20) NOT NULL,
  `danger` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `vl_vaccins`
--

INSERT INTO `vl_vaccins` (`id`, `maladie`, `descriptif`, `renouveler_le`, `expiration`, `obligatoire`, `danger`) VALUES
(1, 'hepatite A', 'virus provoquant une infection du foie', '0000-00-00 00:00:00', 31557600, 'oui', 'mortelle'),
(2, 'méningites a Haemophilus influenzae de type b', 'bactérie très répandue, provoque otite et infections et peut être a l\'origine de méningite ', '0000-00-00 00:00:00', 31557600, 'non', 'modéré'),
(3, 'méningites et septicémies a méningocoques', 'bactéries infectieuses qui peuvent être l\'origine de méningites et septicémies', '0000-00-00 00:00:00', 31557600, 'non', 'modéré'),
(4, 'diphtérie', 'Bactéries très contagieuse provoquant fièvre angine et autre maladies', '0000-00-00 00:00:00', 631152000, 'non', 'benin'),
(5, 'tetanos', 'maladie aiguë grave provoqué par la toxine d\'une bacterie mortelle, provoque contractions des muscles intense', '0000-00-00 00:00:00', 631152000, 'oui', 'mortelle'),
(6, 'poliomyelite', 'maladie due a un poilovirus, asymptomatique dans 75% des cas mais peut etre accompagnée de fievre et maux de tete, mortelle si elle atteint la moelle epiniere', '0000-00-00 00:00:00', 631152000, 'non', 'modéré'),
(7, 'coqueluche', 'maladie se manifestant par une grosse toux durable, peut meme provoqué  jusqu\'au vomissement', '0000-00-00 00:00:00', 31557600, 'oui', 'benin'),
(8, 'infections a papillomavirus humains (hpv)', 'maladie asymptomatique et sans consequences dans la majorité des cas, dans certains cas des verrues genitales peuvent apparaitre, l\'infection persistante est rare mais peut provoqué des lesions precancereuses dans le col de l\'uterus', '0000-00-00 00:00:00', 315576000, 'non', 'benin'),
(9, 'encéphalite a tiques', 'virus transmis par la piqure de tiques infectés, maladie qui ce manifeste brutalement comme une grippe apres deux semaine d\'incubation, peut etre mortelle dans certains cas', '0000-00-00 00:00:00', 15778800, 'non', 'modéré'),
(10, 'hépatite B', 'virus qui ce transmet essentiellement par les fluides corporels, et provoquant sur le long termes une infections du foie', '0000-00-00 00:00:00', 31557600, 'oui', 'mortelle'),
(11, 'grippe', 'infection respiratoire aiguë due a un virus, apparait brutalement sous forme de fievre, maux de tete, courbatures, fatigue intense etc..', '0000-00-00 00:00:00', 15778800, 'oui', 'modéré'),
(12, 'rougeole', 'virus contagieux se manifestant par une fievre montant rapidement, grosse toux, nez qui coule, yeux rouge et autres symptomes', '0000-00-00 00:00:00', 15778800, 'oui', 'benin'),
(13, 'oreillons', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et d', '0000-00-00 00:00:00', 63115200, 'oui', 'benin'),
(14, 'rubeole', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et d', '0000-00-00 00:00:00', 63115200, 'oui', 'benin'),
(15, 'rage', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et d', '0000-00-00 00:00:00', 15778800, 'oui', 'mortelle'),
(16, 'gastro-entérite a rotavirus', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et d', '0000-00-00 00:00:00', 31557600, 'non', 'benin'),
(17, 'leptospirose', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et d', '0000-00-00 00:00:00', 15778800, 'non', 'modéré'),
(18, 'fièvre jaune', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et d', '0000-00-00 00:00:00', 315576000, 'non', 'mortelle'),
(19, 'zona', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et d', '0000-00-00 00:00:00', 0, 'non', 'mortelle'),
(20, 'varicelle', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et d', '0000-00-00 00:00:00', 157788000, 'oui', 'benin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `vl_contacts`
--
ALTER TABLE `vl_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vl_users`
--
ALTER TABLE `vl_users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vl_user_settings`
--
ALTER TABLE `vl_user_settings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vl_user_vaccin`
--
ALTER TABLE `vl_user_vaccin`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `vl_users`
--
ALTER TABLE `vl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `vl_user_settings`
--
ALTER TABLE `vl_user_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `vl_user_vaccin`
--
ALTER TABLE `vl_user_vaccin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `vl_vaccins`
--
ALTER TABLE `vl_vaccins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
