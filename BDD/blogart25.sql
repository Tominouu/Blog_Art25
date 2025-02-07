-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 07 fév. 2025 à 20:09
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blogart25`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `numArt` int NOT NULL AUTO_INCREMENT,
  `dtCreaArt` datetime DEFAULT CURRENT_TIMESTAMP,
  `dtMajArt` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `libTitrArt` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `libChapoArt` text COLLATE utf8mb3_unicode_ci,
  `libAccrochArt` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `parag1Art` text COLLATE utf8mb3_unicode_ci,
  `libSsTitr1Art` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `parag2Art` text COLLATE utf8mb3_unicode_ci,
  `libSsTitr2Art` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `parag3Art` text COLLATE utf8mb3_unicode_ci,
  `libConclArt` text COLLATE utf8mb3_unicode_ci,
  `urlPhotArt` varchar(70) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `numThem` int NOT NULL,
  PRIMARY KEY (`numArt`),
  KEY `ARTICLE_FK` (`numArt`),
  KEY `FK_ASSOCIATION_1` (`numThem`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`numArt`, `dtCreaArt`, `dtMajArt`, `libTitrArt`, `libChapoArt`, `libAccrochArt`, `parag1Art`, `libSsTitr1Art`, `parag2Art`, `libSsTitr2Art`, `parag3Art`, `libConclArt`, `urlPhotArt`, `numThem`) VALUES
(1, '2019-02-24 16:08:30', '2025-02-07 11:42:27', 'La surprenante reconversion de la base sous-marine', 'Un bâtiment unique chargé d&#039;histoire qui a survécu à l&#039;emprise des Allemands en 1943, et qui est aujourd&#039;hui l&#039;un des symboles d&#039;art de notre ville bordelaise. Comment ce bloc de béton armé a-t-il pu surpasser son obscure origine ?', 'La grande immergée du port de la Lune n’a pas toujours été celle que l’on connaît aujourd’hui', 'La grande immergée du port de la Lune, éclairée de son immense néon bleu « something strange happened here » n’a pas toujours été celle que l’on connaît aujourd’hui. Oui, notre base sous-marine est notre héritage nazi. En 1943, le bloc de béton, que nous connaissons tous, voit le jour après 22 mois de travaux forcés par des prisonniers. Une légende urbaine raconte que plus d’une centaine de ces travailleurs se seraient noyés d&#039;épuisement et même que certain auraient été coulés dans le béton. 235 mètres de long, 160 mètres de large, 19 mètres de hauteur, et une superficie de plus de 41 000 m2, cette base aux quatre sœurs se situant le long des côtes forment à la perfection le « Mur de l’Atlantique » érigé par les nazis fous. Le bâtiment de guerre a été pensé pour vivre des siècles, composé de 11 bassins, il peut accueillir quinze grands sous-marins. Tout ceci surplombé d&#039;une tour bunker abritant des magasins et des ateliers. L&#039;ensemble est couvert d&#039;un toit en béton armé de plus de 5 mètres d&#039;épaisseur, renforcé en 1943 par un dispositif de pare-bombes, capable de provoquer l&#039;explosion d&#039;une bombe avant d&#039;atteindre le toit. Un bijou nazi de 600 000 m3 de béton prêt pour résister.', 'Quel avenir pour cet amas de béton ?', 'Après la destruction et le sabotage du matériel nazis par les Alliés en août 1944, il a fallu se demander que deviendrait ce bâtiment. Raser l’édifice bétonné est la première idée à avoir vu le jour. Elle fut rapidement abandonnée, dû à son coup et sa logistique trop complexe. Mais petit-à-petit, elle va renaître dans les esprits après avoir servi de décor pour le film « Le Coup de Grâce » en 1964. Plus tard sous l’impulsion du batteur Jean-François Buisson, un studio d’enregistrement est aménagé pour son groupe dans l&#039;alvéole 9. Le bunker commence à attirer et interpeler les artistes qui y voient un lieu charismatique. En septembre 1998, l&#039;association Art AttAcks réalise la première exposition d’art contemporain « Sous le béton la plage » mêlant arts visuels et architecture. Tout ceci annonce subtilement la vocation artistique du lieu. Quelques mois plus tard, la première grande rénovation du vieux bâtiment a lieu pour permettre le renouveau de la base sous-marine. Lors de l’été 1999, la montagne de métal s’ouvre enfin au public leur proposant des expositions permanentes ou temporaires. Depuis la base a accueilli de nombreuses exhibitions artistiques et plus de 110 000 visiteurs.', 'Peau neuve, colorée et numérique pour la base bordelaise.', 'Aujourd&#039;hui la base sous-marine occupe une place incontournable dans le paysage culturel bordelais. Mais en 2020 elle se refait une beauté ! Passée de l&#039;ombre à la lumière voilà le nouvel objectif du monument. Culturespaces cherche à attirer tous les regards bordelais vers le bâtiment bétonné. Son projet ? Faire de la base sous-marine bordelaise le plus grand centre d&#039;art numérique au monde. Plusieurs défis ont dû être relevés en raison de l&#039;historique de la base, ancien bâtiment bombardé et de la présence de l&#039;eau avec une profondeur de 16 m (création de nouvelles passerelles, ajout d&#039;un bâtiment annexe future billetterie). Mais tout est fait pour transformer cet amas de béton en « Bassin des Lumières ». Après une nouvelle rénovation la grande immergée devient innovante et atypique grâce à une nouvelle expérience visuelle et sonore avec la projection de la première exposition depuis la rénovation en l&#039;honneur des tableaux de Gustave Klimt qui épouseront les formes de l&#039;édifice et se refléteront sur les courbes de l&#039;eau. Près de 70 ans plus tard, la base sous-marine s&#039;est métamorphosée en symbole d&#039;art comme si elle voulait prendre une revanche sur l&#039;origine de sa construction.', 'Pour le mot de la fin : Bruno Monnier, président de Culturespace, affirme que ses équipes et lui ont travaillé d’arrache-pied pour imaginer et concevoir la nouvelle base sous marine. Il confie à AquitaineOnline que « C’est une installation unique au monde qui s’intègre aux dimensions gigantesques du lieu ». Chez Gavé Bleu, nous trouvons le projet fantastique ! Et nous espérons que comme nous, vous serez au rendez-vous pour (re)découvrir ce monument bordelais qui revit !', 'base_sous_marine.jpg', 1),
(3, '2019-11-09 10:34:20', '2025-02-07 11:39:37', 'Le Lion bleu de Bordeaux, star des réseaux sociaux', 'Surplombant la place Stalingrad, anciennement place du Pont, et faisant fièrement face au pont de Pierre, le Lion bleu de Xavier Veilhan fait depuis 2005 l’objet de toutes les convoitises.', 'En France, toute construction d’un bâtiment public a pour but d’accueillir du monde', 'En France, depuis 1951 et l’arrêté des « 1% artistique », toute construction d’un bâtiment public ayant pour but d’accueillir du monde doit prévoir 1% de son budget total pour financer des œuvres d’art aux abords du bâtiment. En construisant les lignes de tramway, la ville de Bordeaux et sa métropole ont donc mis en place le programme « L’art dans la ville ». Supervisé par le directeur du Centre Georges-Pompidou, cette initiative a pu débloquer plusieurs millions d’euros depuis 2000 pour la réalisation d’une quinzaine d’œuvres. Parmi ces œuvres, nous pouvons noter « La maison aux personnages » place Amélie Raba Léon, les affiches « Aux bord’eaux » présentes dans toutes les stations ou bien le fameux Lion bleu bordelais. Mise en place et vissée sur les pavés de la rive droite le 30 juin 2005, cette sculpture en plastique mesure 6 mètres de haut. Elle va de pair avec la mise en service de la première ligne de tramway dans Bordeaux, la ligne A, qui traverse le pont de Pierre et la place Stalingrad. En décalage total par rapport au style architectural très XVIIIème de la ville, cette œuvre a d’abord été massivement rejetée par les habitants du quartier, mais ils l’ont désormais adoptée.', 'Un symbole de la rive droite', 'On n’imagine pas la place Stalingrad sans cet imposant félin coloré. Ce lion bleu est devenu l&#039;emblème de cette place et, pour les habitants de la rive gauche, c’est le symbole de « l’autre rive », c’est la première chose que l’on voit en traversant la Garonne depuis le quartier de Saint-Michel. Ce lion bleu, on s’y abrite, on s’y donne rendez-vous, on s’en sert de repère et les écoliers y prennent souvent leur premier cours d’art contemporain. Ce lion bleu n’est pour certain qu’un gros point azur pixelisé à l’horizon, mais pour d’autres c’est un symbole, un mirage, comme un gros jouet qu&#039;on ne perd jamais. Et ce gros jouet, des centaines d’internautes se le sont attribué et en parlent sur Instagram via le #lionbleu. Ils postent régulièrement des photos de lui, toujours dans la même posture, veillant sur la ville de Bordeaux. D’objet d’art à star du net, il n’y a qu’un pas. Et ce pas, le Lion de Veilhan l’a franchi comme il franchirait la Garonne pour rejoindre le centre-ville bordelais. En plus de son esthétique remarquable, son créateur n’a pas omis de lui donner un sens propre en prenant en compte l’environnement qui entoure cette statue bestiale.', 'Un tremplin pour Xavier Veilhan', 'L&#039;artiste plasticien à l’origine du Lion bleu, diplômé de l&#039;EnsAD-Paris (École Nationale Supérieure des Arts Décoratifs) et officier de l’Ordre des Arts et des Lettres, n’a pas choisi une figure animalière pour rien. La place Stalingrad est un hommage à la victoire de l’armée soviétique durant la Seconde Guerre Mondiale. Xavier Veilhan souhaitait donc offrir à ce lieu une œuvre monumentale qui renforce son identité. À l’instar du Lion de Belfort de Bartholdi, il a donc choisi cet animal pour ses valeurs de force tranquille, se battant pour la justice avec puissance mais intelligence. Il déclarait, avant sa construction, vouloir quelque chose de totémique, à la fois dominant et protecteur. Il ne reste plus qu’à espérer qu’il seconde Bordeaux et ses habitants dans leur quotidien futur. Le sculpteur du Lion a vu sa côte mondiale grimper suite à la réalisation de cette œuvre. Il a, depuis, pu exposer un Carrosse violet à Versailles en 2009, un Skateur bleu en Corée du Sud en 2014, ou encore Romy, une femme jaune, devant la gare de Lille en 2019.', 'Espérons que cet élan de créativité se poursuive et que, par la suite, Xavier Veilhan réutilise cette couleur qui nous est si chère, le bleu.', 'lion_bleu.png', 4),
(7, '2025-02-07 11:31:31', NULL, 'Le pont Simone Veil, un lien entre les habitants bordelais', 'Plus qu’un passage, le pont Simone Veil unit les rives et les cœurs. Son inauguration marque la naissance d’un nouvel espace, symbole de rencontres et de partage.', 'Un trait d’union suspendu', 'Le fleuve a toujours été une frontière, une ligne naturelle séparant les quartiers et les vies. Longtemps, les habitants ont observé l’autre rive comme une terre lointaine, familière et pourtant inaccessible. Aujourd’hui, le pont Simone Veil efface cette séparation. Inauguré le 6 Juillet 2024, il se dresse comme un fil d’acier et de béton tendu entre les berges. Une passerelle suspendue au-dessus des flots. L’architecte Rem Koolhaas nous a laissé une architecture légère semblant flotter dans l’air, portée par une énergie invisible. Sous nos pas, les 4 piliers en acier vibrent doucement, comme s’ils respiraient avec la ville. Chaque traversée devient une expérience, un instant suspendu où l’on oublie la hâte du quotidien. Ce pont est plus qu’un passage, il est un lien vivant entre Bègles, Bordeaux et Floirac, un fil qui tisse une nouvelle histoire collective. Il est le témoin silencieux des conversations échangées, des regards croisés, des rencontres fortuites qui n’auraient jamais eu lieu sans lui. Il est un lieu de mémoire et d’avenir, un espace où chaque pas renforce un sentiment d’appartenance à Bordeaux.', 'Un espace de rencontres et de partages', 'Dès les premiers jours, le pont Simone Veil devient un lieu de vie à part entière. Il n’est pas qu’un axe de circulation, du haut de ses 60 mètres, et du large de ses 44 mètres il est une place suspendue entre ciel et eau. Ici, les pas se croisent, les vies se frôlent et s’entrelacent. Les cyclistes glissent en silence, les familles s’arrêtent un instant sur les bancs pour admirer la vue, les étudiants s’y retrouvent après les cours pour respirer. Les promeneurs prennent le temps de ralentir, de contempler la ville sous un nouvel angle. On échange un sourire, quelques mots, un regard complice. Il y a quelque chose de magique dans cette proximité nouvelle, dans ces rencontres spontanées que seul un tel lieu peut offrir. Le pont devient une scène où chacun joue son rôle, un théâtre à ciel ouvert où les différences s’estompent, où l’anonymat de Bordeaux se brise. Ce n’est plus seulement une infrastructure, c’est un cœur battant, un espace de dialogue et de partage. Sous la lumière du matin ou les reflets dorés du soir, il est ce trait d’union qui rapproche les âmes autant que les rives.', 'Un héritage tourné vers l’avenir', 'Porter le nom de Simone Veil n’est pas anodin. Ce pont incarne les valeurs de cette femme d’exception : la résilience, l’humanité, l’unité. Il est le reflet de Bordeaux qui se transforme, qui cherche à rassembler plutôt qu’à diviser. Son inauguration n’est pas qu’un événement urbain, c’est un symbole fort. Il rappelle que les ponts ne sont pas que des ouvrages d’ingénierie, ils sont aussi des marqueurs de notre époque, des témoins de notre volonté de bâtir ensemble. C&#039; est un lieu de passage, mais aussi un lieu de mémoire. Chaque pierre, chaque câble, chaque plaque de métal porte en lui l’histoire d’un projet pensé pour les générations futures. Dans quelques années, on ne se souviendra peut-être plus du jour de son inauguration, mais il sera toujours là, solide et immuable, inscrivant dans l’espace la promesse d’un avenir commun. Ce pont, comme le nom qu’il porte, est un message d’espoir. Il nous invite à regarder vers l’autre, à avancer ensemble, à créer un monde où les liens sont plus forts que les distances.', 'Le pont Simone Veil est bien plus qu’un ouvrage d’ingénierie ; il est une passerelle vers l’autre, un espace où se tissent des liens invisibles entre les habitants. À travers son architecture aérienne et son rôle fédérateur, il redessine la géographie humaine de Bordeaux en rapprochant les rives et les cœurs. Symbole d’unité et d’avenir, il incarne les valeurs de partage et de mémoire portées par Simone Veil. Demain, il sera toujours là, témoin silencieux des rencontres et des histoires qui s’y écrivent chaque jour, rappelant que les ponts, au-delà de leur fonction, sont avant tout des promesses d’avenir et de cohésion.', 'simone veil.jpg', 1),
(8, '2025-02-07 11:36:27', NULL, 'Le Pont Simone Veil : Un lien entre les Bordelais et leur histoire.', 'Ce pont qui traverse la Garonne n’est pas juste un passage entre deux rives. Il représente un symbole de mémoire et de rencontre. Claire Malua, habitante de Bordeaux et témoin de son inauguration, nous partage son ressenti et son admiration pour ce lieu devenu essentiel dans la ville.', 'Un Pont qui Relie le Passé au Présent', 'Quand je traverse ce pont, je me sens plus calme, plus détendu. Étant une personne qui apprécie Simone Veil, pour son courage et ses combats, j’aime bien passer du temps sur ce pont construit en reconnaissance de cette femme. J’apprécie encore plus le fait de savoir que la ville de Bordeaux tient à honorer ces personnalités. \r\nLe jour de l’inauguration, le 6 juillet 2024, je me souviens être présent avec mes enfants. Voir ce pont prendre forme, pour moi il s’agissait d’un hommage à Simone Veil, une femme qui a marqué l’histoire de la France. Selon ce pont n’est pas seulement un lien entre les quartiers, il s’agit d’un symbole représentant une histoire collective et un avenir commun. Il relie en effet Bordeaux et Floirac, mais aussi les générations et les mémoires. Chaque traversée de ce pont me rappelle donc qu’il est important de préserver la mémoire (de Simone Veil) et de transmettre les valeurs de la justice, du courage et de l’unité aux générations futures.', 'Un lieu de rencontre et de partage.', 'À chaque passage sur ce pont, la ville semble adopter un autre visage. Ce n’est pas seulement une rivière que l’on traverse, mais aussi des histoires et souvenirs qui s’entrelacent. Ce pont est devenu un véritable lieu de rencontre. Il n’est pas uniquement réservé aux cyclistes ou aux piétons, il offre également un espace de contemplation où chacun peut prendre un moment pour observer Bordeaux sous un autre angle. Les familles s’y arrêtent pour discuter, les étudiants y trouvent un havre de calme après les cours, et les promeneurs profitent du paysage. Il invite à la lenteur, à la pause, à l’échange.\r\nCe qui peut frapper également, c’est la manière dont ce pont est devenu un point de ralliement, un endroit où les gens se croisent, échangent un sourire, un regard. Il ne s’agit plus uniquement d’un passage, mais d’un espace vivant, où les passants peuvent discuter et profiter tout en admirant la beauté de Bordeaux. Cet ouvrage incarne l’idée d’une ville plus humaine, plus connectée. Chaque traversée, chaque moment passé dessus devient un moment de plaisir.', 'Un Héritage à Partager', 'Ce qui rend ce pont encore plus spécial, c’est son nom, celui de Simone Veil. Il n’y à pas de hasard. En choisissant de lui rendre hommage, la ville de Bordeaux offre une opportunité de se connecter à une mémoire commune, de se rappeler ce que incarne Simone Veil : la lutte contre l’oubli, l’unité et la résilience. Mais ce n’est pas juste un hommage figé dans le passé. Ce pont rappelle que les luttes et les valeurs de Simone Veil, sont toujours d’actualité. Le pont est là pour rappeler qu’il reste encore du travail à accomplir pour construire une société plus juste et plus unie.\r\nCe pont pourrait devenir un véritable lieu culturel, un espace où l’histoire de Simone Veil, la Shoah, et toutes ces valeurs seraient transmises aux générations futures. Il s’agit d’un véritable lieu à Bordeaux vivant de mémoire, un espace de partage et d’échange. Ce pont est bien plus qu’un simple ouvrage en acier et en béton. C’est un message d’espoir, un symbole d’unité, un phare pour l’avenir.', 'Le Pont Simone Veil est bien plus qu’une simple structure reliant deux rives de Bordeaux. C’est un hommage vivant à une grande figure de l’histoire, mais aussi un lieu de rencontre, de partage et de mémoire. En traversant ce pont, on se sent plus proche des autres, mais aussi de notre histoire. Ce pont est un lieu où chaque pas nous rappelle que nous sommes tous connectés, que les distances entre les êtres, qu’elles soient géographiques ou humaines, peuvent être effacées. Dans quelques années, ce pont sera toujours là, solide, immuable, et ce sera un lieu de mémoire, de culture, et d’unité entre les peuples.', 'pont.jpg', 2);

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `numCom` int NOT NULL AUTO_INCREMENT,
  `dtCreaCom` datetime DEFAULT CURRENT_TIMESTAMP,
  `libCom` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `dtModCom` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `attModOK` tinyint(1) DEFAULT '0',
  `notifComKOAff` text COLLATE utf8mb3_unicode_ci,
  `dtDelLogCom` datetime DEFAULT NULL,
  `delLogiq` tinyint(1) DEFAULT '0',
  `numArt` int NOT NULL,
  `numMemb` int NOT NULL,
  PRIMARY KEY (`numCom`),
  KEY `COMMENT_FK` (`numCom`),
  KEY `FK_ASSOCIATION_2` (`numArt`),
  KEY `FK_ASSOCIATION_3` (`numMemb`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `likeart`
--

DROP TABLE IF EXISTS `likeart`;
CREATE TABLE IF NOT EXISTS `likeart` (
  `numMemb` int NOT NULL,
  `numArt` int NOT NULL,
  `likeA` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`numMemb`,`numArt`),
  KEY `LIKEART_FK` (`numMemb`,`numArt`),
  KEY `FK_LIKEART1` (`numArt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

DROP TABLE IF EXISTS `membre`;
CREATE TABLE IF NOT EXISTS `membre` (
  `numMemb` int NOT NULL AUTO_INCREMENT,
  `prenomMemb` varchar(70) COLLATE utf8mb3_unicode_ci NOT NULL,
  `nomMemb` varchar(70) COLLATE utf8mb3_unicode_ci NOT NULL,
  `pseudoMemb` varchar(70) COLLATE utf8mb3_unicode_ci NOT NULL,
  `passMemb` varchar(70) COLLATE utf8mb3_unicode_ci NOT NULL,
  `eMailMemb` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `dtCreaMemb` datetime DEFAULT CURRENT_TIMESTAMP,
  `dtMajMemb` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `accordMemb` tinyint(1) DEFAULT '1',
  `cookieMemb` varchar(70) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `numStat` int NOT NULL,
  PRIMARY KEY (`numMemb`),
  KEY `MEMBRE_FK` (`numMemb`),
  KEY `FK_ASSOCIATION_4` (`numStat`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`numMemb`, `prenomMemb`, `nomMemb`, `pseudoMemb`, `passMemb`, `eMailMemb`, `dtCreaMemb`, `dtMajMemb`, `accordMemb`, `cookieMemb`, `numStat`) VALUES
(9, 'Admin', 'Admin', 'Admin99', '$2y$10$lWWY2cL2cqxfIvuxkpWuDeyYQfRLicG36q2jpUhYN9GMKXZo64Zre', 'Admin@gmail.com', '2025-02-07 20:46:02', '2025-02-07 20:47:44', 1, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `motcle`
--

DROP TABLE IF EXISTS `motcle`;
CREATE TABLE IF NOT EXISTS `motcle` (
  `numMotCle` int NOT NULL AUTO_INCREMENT,
  `libMotCle` varchar(60) COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`numMotCle`),
  KEY `MOTCLE_FK` (`numMotCle`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `motcle`
--

INSERT INTO `motcle` (`numMotCle`, `libMotCle`) VALUES
(8, 'lien'),
(9, 'rencontre'),
(10, 'passage'),
(11, 'symbole'),
(12, 'mémoire'),
(13, 'histoire'),
(14, 'unité'),
(15, 'hommage');

-- --------------------------------------------------------

--
-- Structure de la table `motclearticle`
--

DROP TABLE IF EXISTS `motclearticle`;
CREATE TABLE IF NOT EXISTS `motclearticle` (
  `numArt` int NOT NULL,
  `numMotCle` int NOT NULL,
  PRIMARY KEY (`numArt`,`numMotCle`),
  KEY `MOTCLEARTICLE_FK` (`numArt`),
  KEY `MOTCLEARTICLE2_FK` (`numMotCle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `motclearticle`
--

INSERT INTO `motclearticle` (`numArt`, `numMotCle`) VALUES
(7, 8),
(7, 9),
(7, 10),
(7, 11),
(8, 9),
(8, 13),
(8, 14),
(8, 15);

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

DROP TABLE IF EXISTS `statut`;
CREATE TABLE IF NOT EXISTS `statut` (
  `numStat` int NOT NULL AUTO_INCREMENT,
  `libStat` varchar(25) COLLATE utf8mb3_unicode_ci NOT NULL,
  `dtCreaStat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`numStat`),
  KEY `STATUT_FK` (`numStat`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `statut`
--

INSERT INTO `statut` (`numStat`, `libStat`, `dtCreaStat`) VALUES
(1, 'Administrateur', '2023-02-19 15:15:59'),
(2, 'Modérateur', '2023-02-19 15:19:12'),
(3, 'Membre', '2023-02-20 08:43:24');

-- --------------------------------------------------------

--
-- Structure de la table `thematique`
--

DROP TABLE IF EXISTS `thematique`;
CREATE TABLE IF NOT EXISTS `thematique` (
  `numThem` int NOT NULL AUTO_INCREMENT,
  `libThem` varchar(60) COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`numThem`),
  KEY `THEMATIQUE_FK` (`numThem`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `thematique`
--

INSERT INTO `thematique` (`numThem`, `libThem`) VALUES
(1, 'L\'événement'),
(2, 'L\'acteur-clé'),
(4, 'L\'insolite / le clin d\'œil');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `FK_ASSOCIATION_1` FOREIGN KEY (`numThem`) REFERENCES `thematique` (`numThem`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_ASSOCIATION_2` FOREIGN KEY (`numArt`) REFERENCES `article` (`numArt`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_ASSOCIATION_3` FOREIGN KEY (`numMemb`) REFERENCES `membre` (`numMemb`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `likeart`
--
ALTER TABLE `likeart`
  ADD CONSTRAINT `FK_LIKEART1` FOREIGN KEY (`numArt`) REFERENCES `article` (`numArt`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_LIKEART2` FOREIGN KEY (`numMemb`) REFERENCES `membre` (`numMemb`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `membre`
--
ALTER TABLE `membre`
  ADD CONSTRAINT `FK_ASSOCIATION_4` FOREIGN KEY (`numStat`) REFERENCES `statut` (`numStat`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `motclearticle`
--
ALTER TABLE `motclearticle`
  ADD CONSTRAINT `FK_MotCleArt1` FOREIGN KEY (`numMotCle`) REFERENCES `motcle` (`numMotCle`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FK_MotCleArt2` FOREIGN KEY (`numArt`) REFERENCES `article` (`numArt`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
