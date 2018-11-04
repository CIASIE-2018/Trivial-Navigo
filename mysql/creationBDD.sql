DROP DATABASE IF EXISTS `TrivialNavigo`;
CREATE DATABASE TrivialNavigo CHARACTER SET utf8;

USE TrivialNavigo;

DROP TABLE IF EXISTS `THEME`;
CREATE TABLE THEME (
    idTheme INT(8) NOT NULL AUTO_INCREMENT,
	nomTheme TEXT(100),
	couleurTheme TEXT(50),
	PRIMARY KEY(idTheme)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `CARTE`;
CREATE TABLE CARTE (
    idCarte INT(8) NOT NULL AUTO_INCREMENT,
    question TEXT(750),
    reponse TEXT(100),
    idTheme INT(8),
    PRIMARY KEY(idCarte),
	FOREIGN KEY(idTheme) REFERENCES THEME(idTheme)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `SALON`;
CREATE TABLE SALON(
    idSalon INT(8) NOT NULL AUTO_INCREMENT,
	nomSalon TEXT(500),
	visible BOOLEAN,
	PRIMARY KEY(idSalon)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `JOUEUR`;
CREATE TABLE IF NOT EXISTS JOUEUR (
  idJoueur int(8) NOT NULL AUTO_INCREMENT,
  role int(1) DEFAULT NULL,
  pseudoJoueur text,
  adresseMail text,
  password text,
  nbTotalQuestions int(10) DEFAULT '0',
  nbBonnesReponses int(10) DEFAULT '0',
  idSalon int(8) DEFAULT NULL,
  PRIMARY KEY (idJoueur),
  KEY idSalon (idSalon)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `GAME`;
CREATE TABLE GAME (
    idGame VARCHAR(50) NOT NULL,
    board JSON,
    PRIMARY KEY(idGame)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO THEME VALUES('1', 'Geographie', 'Bleu');
INSERT INTO THEME VALUES('2', 'Divertissements', 'Rose');
INSERT INTO THEME VALUES('3', 'Histoire', 'Jaune');
INSERT INTO THEME VALUES('4', 'Sports & Loisirs', 'Orange');
INSERT INTO THEME VALUES('5', 'Informatique', 'Vert');
INSERT INTO THEME VALUES('6', 'Personnalites', 'Violet');

INSERT INTO CARTE
VALUES(1, 'Quel est le numéro de la nationale chantée par Charles Trenet, et qui reliait Paris à Menton ?', '7', '1');
INSERT INTO CARTE
VALUES(2, 'Quel est le numéro de la route historique reliant Chicago à Los Angeles ?', '66', '1');
INSERT INTO CARTE
VALUES(3, 'Quel est le numéro de la zone du Nevada célèbre pour ses supposées activités extraterrestres ?', '51', '1');
INSERT INTO CARTE
VALUES(4, 'Dans quelle ville le personnage de bande dessinée Iznogoud habite-t-il ?', 'Bagdad', '1');
INSERT INTO CARTE
VALUES(5, 'Dans quelle ville le personnage de bande dessinée Bart Simpson habite-t-il ?', 'Springfield', '1');
INSERT INTO CARTE
VALUES(6, 'Dans quelle ville le capitaine Haddock, célèbre personnage d''une bande dessinée habite-t-il ?', 'Moulinsart', '1');
INSERT INTO CARTE
VALUES(7, 'Dans quelle ville des États-Unis se déroule la série Sur écoute (The Wire) ?', 'Baltimore', '1');
INSERT INTO CARTE
VALUES(8, 'Dans quelle ville des États-Unis se déroule la série Dexter ?', 'Miami', '1');
INSERT INTO CARTE
VALUES(9, 'Dans quelle ville des États-Unis se déroule la série Urgences ?', 'Chicago', '1');
INSERT INTO CARTE
VALUES(10, 'De quel pays est issue la devise suivante : In God We Trust ?', 'États-Unis', '1');
INSERT INTO CARTE
VALUES(11, 'De quel pays est issue la devise suivante : Dieu est mon droit ?', 'Royaume-Uni', '1');
INSERT INTO CARTE
VALUES(12, 'De quel pays est issue la devise suivante : Je maintiendrai ?', 'Pays-Bas', '1');
INSERT INTO CARTE
VALUES(13, 'Combien y a-t-il d''étoiles sur le drapeau des États-Unis ?', '50', '1');
INSERT INTO CARTE
VALUES(14, 'Combien y a-t-il d''étoiles sur le drapeau de la Chine ?', '5', '1');
INSERT INTO CARTE
VALUES(15, 'Combien y a-t-il d''étoiles sur le drapeau de la Turquie ?', '1', '1');
INSERT INTO CARTE
VALUES(16, 'À quel aéroport correspond ce code : NRT ?', 'Narita', '1');
INSERT INTO CARTE
VALUES(17, 'À quel aéroport correspond ce code : LHR ?', 'Heathrow', '1');
INSERT INTO CARTE
VALUES(18, 'À quel aéroport correspond ce code : ORY ?', 'Orly', '1');
INSERT INTO CARTE
VALUES(19, 'De quel pays le vin Rioja est-il originaire ?', 'Espagne', '1');
INSERT INTO CARTE
VALUES(20, 'De quel pays le vin Prosecco (ou glera) est-il originaire ?', 'Italie', '1');
INSERT INTO CARTE
VALUES(21, 'De quel pays le vin Tokaji est-il originaire ?', 'Hongrie', '1');
INSERT INTO CARTE
VALUES(22, 'De quel pays le bibimbap est-il une spécialité culinaire ?', 'Corée', '1');
INSERT INTO CARTE
VALUES(23, 'De quel pays le lassi est-il une spécialité culinaire ?', 'Inde', '1');
INSERT INTO CARTE
VALUES(24, 'De quel pays le haggis est-il une spécialité culinaire ?', 'Écosse', '1');
INSERT INTO CARTE
VALUES(25, 'À quel pays appartient le lieu de rêve appelé Bali ?', 'Indonésie', '1');
INSERT INTO CARTE
VALUES(26, 'À quel pays appartient le lieu de rêve appelé Zanzibar ?', 'Tanzanie', '1');
INSERT INTO CARTE
VALUES(27, 'Sur quelle ville du Nouveau-Mexique un OVNI se serait-il écrasé en 1947 ?', 'Roswell', '1');
INSERT INTO CARTE
VALUES(28, 'De quelle planète Superman est-il issu ?', 'Krypton', '1');
INSERT INTO CARTE
VALUES(29, 'Dans quel pays ont été tracés les premiers agroglyphes ?', 'Royaume-Uni', '1');
INSERT INTO CARTE
VALUES(30, 'Dans quel état des États-Unis la plupart des romans de Stephen King se déroutent-ils ?', 'Maine', '1');
INSERT INTO CARTE
VALUES(31, 'Dans quel pays se trouve la Transylvanie, terre natale de Dracula ?', 'Roumanie', '1');
INSERT INTO CARTE
VALUES(32, 'Quelle capitale européenne possède de profondes catacombes abritant les ossements de quelques 6 millions d''anciens habitants ?', 'Paris', '1');
INSERT INTO CARTE
VALUES(33, 'Dans quelle ville peut-on visiter une ancienne basilique chrétienne, devenue une mosquée puis un musée ?', 'Istanbul', '1');
INSERT INTO CARTE
VALUES(34, 'Quel mausolée de marbre blanc a un nom signifiant : Palais de la Couronne ?', 'Taj Mahal', '1');
INSERT INTO CARTE
VALUES(35, 'Dans quelle ville se trouve la nécropole des rois de France ?', 'Saint-Denis', '1');
INSERT INTO CARTE
VALUES(36, 'Quelle monnaie est utilisée par la Russie ?', 'Le rouble', '1');
INSERT INTO CARTE
VALUES(37, 'Quelle monnaie est utilisée par la Suède ?', 'La couronne', '1');
INSERT INTO CARTE
VALUES(38, 'Quelle monnaie est utilisée par l''Inde ?', 'La roupie', '1');
INSERT INTO CARTE
VALUES(39, 'À quel pays appartient l''île Java ?', 'Indonésie', '1');
INSERT INTO CARTE
VALUES(40, 'À quel pays appartient l''île Honshu ?', 'Japon', '1');
INSERT INTO CARTE
VALUES(41, 'Dans quelle ville le festival des Vieilles Charrues a-t-il lieu ?', 'Carhaix', '1');
INSERT INTO CARTE
VALUES(42, 'Dans quelle ville le festival, appelé Les Transmusicales, a-t-il lieu ?', 'Rennes', '1');
INSERT INTO CARTE
VALUES(43, 'Dans quelle ville le festival, appelé les Eurockéennes, a-t-il lieu ?', 'Belfort', '1');
INSERT INTO CARTE
VALUES(44, 'Quel fleuve ou quelle rivière arrose la ville de Limoges ?', 'La Vienne', '1');
INSERT INTO CARTE
VALUES(45, 'Quel fleuve ou quelle rivière arrose la ville de Toulouse ?', 'La Garonne', '1');
INSERT INTO CARTE
VALUES(46, 'Quel fleuve ou quelle rivière arrose la ville de Rouen ?', 'La Seine', '1');
INSERT INTO CARTE
VALUES(47, 'Dans quelle région la Pietra est-elle produite ?', 'Corse', '1');
INSERT INTO CARTE
VALUES(48, 'Dans quelle région le vin de paille est-il produit ?', 'Franche-Comté', '1');
INSERT INTO CARTE
VALUES(49, 'Dans quelle région le Grand Marnier est-il produit ?', 'Île-de-France', '1');
INSERT INTO CARTE
VALUES(50, 'Dans quelle ville se trouve la statue appelée Le Christ rédempteur ?', 'Rio de Janeiro', '1');
INSERT INTO CARTE
VALUES(51, 'Dans quelle ville se trouve la statue appelée La Petite Sirène ?', 'Conpenhague', '1');
INSERT INTO CARTE
VALUES(52, 'Dans quelle ville se trouve la statue appelée Le Manneken-Pis ?', 'Bruxelles', '1');
INSERT INTO CARTE
VALUES(53, 'Dans quelle ville se trouve la salle de spectacle, appelée Royal Albert Hall ?', 'Londres', '1');
INSERT INTO CARTE
VALUES(54, 'Dans quelle ville se trouve la salle de spectacle, appelée Halle Tony-Garnier ?', 'Lyon', '1');
INSERT INTO CARTE
VALUES(55, 'Dans quelle ville se trouve la salle de spectacle, appelée Carnegie Hall ?', 'New York', '1');
INSERT INTO CARTE
VALUES(56, 'Quel est le pays d''origine de la marque de voiture Seat ?', 'Espagne', '1');
INSERT INTO CARTE
VALUES(57, 'Quel est le pays d''origine de la marque automobile Rolls Royce ?', 'Royaume-Uni', '1');
INSERT INTO CARTE
VALUES(58, 'Quel est le pays d''origine de la marque automobile Chrysler ?', 'États-Unis', '1');
INSERT INTO CARTE
VALUES(59, 'De quel pays la marque de jouets Lego est-elle originaire ?', 'Danemark', '1');
INSERT INTO CARTE
VALUES(60, 'Quel est le pays d''origine de la marque Nintendo DSi ?', 'Japon', '1');
INSERT INTO CARTE
VALUES(61, 'Quel est le pays de naissance du sportif Didier Drogba ?', 'Côte d''Ivoire', '1');
INSERT INTO CARTE
VALUES(62, 'Quel est le pays de naissance de Yannick Noah ?', 'France', '1');
INSERT INTO CARTE
VALUES(63, 'De quel pays provient la bière Heineken ?', 'Pays-Bas', '1');
INSERT INTO CARTE
VALUES(64, 'De quel pays provient la bière Corona ?', 'Mexique', '1');

INSERT INTO CARTE
VALUES(65, 'Quel est l''artiste qui interprète l''album, Dans ma bulle ?', 'Diam''s', '2');
INSERT INTO CARTE
VALUES(66, 'Quel est l''artiste qui interprète l''album, Relapse ?', 'Eminem', '2');
INSERT INTO CARTE
VALUES(67, 'Quelle émission de téléréalité peut être décrite par : Une éducatrice chevronnée vient en aide à des parents débordés ?', 'Super Nanny', '2');
INSERT INTO CARTE
VALUES(68, 'Quelle émission de téléréalité peut être décrite par : Des candidats coupés du monde tentent de protéger leur secret ?', 'Secret Story', '2');
INSERT INTO CARTE
VALUES(69, 'Quelle émission de téléréalité peut être décrite par : Des couples testent leur solidité face à de séduisants célibataires ?', 'L''île de la tentation', '2');
INSERT INTO CARTE
VALUES(70, 'Qui interprète la chanson Dieu m''a donné la foi ?', 'Ophélie Winter', '2');
INSERT INTO CARTE
VALUES(71, 'Qui interprète la chanson Quand je vois tes yeux ?', 'Dany Brillant', '2');
INSERT INTO CARTE
VALUES(72, 'Qui interprète la chanson Mambo n°5 ?', 'Lou Bega', '2');
INSERT INTO CARTE
VALUES(73, 'Quel est le titre du film où Leonardo DiCaprio joue le rôle de Jack Dawson ?', 'Titanic', '2');
INSERT INTO CARTE
VALUES(74, 'Quel est le titre du film où Leonardo DiCaprio joue le rôle de Billy Costigan ?', 'Les Infiltrés', '2');
INSERT INTO CARTE
VALUES(75, 'Quel est le titre du film où Leonardo DiCaprio joue le rôle de Richard ?', 'La Plage', '2');
INSERT INTO CARTE
VALUES(76, 'Quel est le nom du personnage roux dans la série, Les Experts Miami ?', 'Horatio Caine', '2');
INSERT INTO CARTE
VALUES(77, 'Quel est le nom du personnage roux dans la série, X-Files ?', 'Dana Scully', '2');
INSERT INTO CARTE
VALUES(78, 'Quelle la marque vantée par ce slogan : En avant les histoires ?', 'Playmobil', '2');
INSERT INTO CARTE
VALUES(79, 'Quelle est la marque vantée par ce slogan : Par amour du goût ?', 'Amora', '2');
INSERT INTO CARTE
VALUES(80, 'Quelle est la marque vantée par le slogan : Just do it ?', 'Nike', '2');
INSERT INTO CARTE
VALUES(81, 'Sur quelle chaîne de télévision, l''émission enfantine Les Zouzous passait-elle ?', 'France 5', '2');
INSERT INTO CARTE
VALUES(82, 'Sur quelle chaîne de télévision, l''émission enfantine Tfou passe-t-elle ?', 'TF1', '2');
INSERT INTO CARTE
VALUES(83, 'De quel long métrange d''animation sont tirés les personnages de Fleur et Panpan ?', 'Bambi', '2');
INSERT INTO CARTE
VALUES(84, 'De quel long métrage d''animation sont tirés les personnage Sulli et Bob ?', 'Monstres et Cie', '2');
INSERT INTO CARTE
VALUES(85, 'Quel est le nom d''artiste de Michel Colucci ?', 'Coluche', '2');
INSERT INTO CARTE
VALUES(86, 'Quel est le nom d''artiste de Stefani Germanotta ?', 'Lady Gaga', '2');
INSERT INTO CARTE
VALUES(87, 'De quel film est issue la réplique : Quand quelqu''un est obilgé de venir vivre dans le Nord, il pleure deux fois : quand il arrive et quand il repart ?', 'Bienvenue chez les Ch''tis', '2');
INSERT INTO CARTE
VALUES(88, 'De quel film est issue la réplique : Je m''appelle Itinéris. Vous avez deux nouveaux messages ?', 'Astérix et Obélix : Mission Cléopâtre', '2');
INSERT INTO CARTE
VALUES(89, 'De quel film est issue la réplique : Donnez-moi la même chose qu''elle ?', 'Quand Harry rencontre Sally', '2');
INSERT INTO CARTE
VALUES(90, 'Quels sont les prénoms des frères jumeaux Bogdanoff ?', 'Igor et Grichka', '2');
INSERT INTO CARTE
VALUES(91, 'Quels sont les prénoms des soeurs jumelles Olsen ?', 'Mary-Kate et Ashley', '2');
INSERT INTO CARTE
VALUES(92, 'Quels sont les prénoms des frères jumeaux Sirkis ?', 'Nicola et Stéphane', '2');
INSERT INTO CARTE
VALUES(93, 'Quel est le nom du groupe auquel appartenait Beyoncé, avant d''entamer une carrière solo ?', 'Destiny''s Child', '2');
INSERT INTO CARTE
VALUES(94, 'Quel est le nom du groupe auquel appartenait Justin Timberlake, avant d''entamer une carrière solo ?', '*NSYNC', '2');
INSERT INTO CARTE
VALUES(95, 'Quel est le nom du groupe auquel appartenait Jean-Louis Aubert, avant d''entamer une carrière solo ?', 'Téléphone', '2');
INSERT INTO CARTE
VALUES(96, 'Quel est le prénom de la petite soeur de Titeuf ?', 'Zizie', '2');
INSERT INTO CARTE
VALUES(97, 'Quel est le prénom de la jeune fille dont Titeuf est (secrètement) amoureux ?', 'Nadia', '2');
INSERT INTO CARTE
VALUES(98, 'Quel est le surnom de l''ami de Titeuf qui a souvent la nausée ?', 'Vomito', '2');

INSERT INTO CARTE
VALUES(99, 'À quelle date célébrons-nous la victoire des Alliés sur l''Allemagne nazie, en France ?', '8 mai', '3');
INSERT INTO CARTE
VALUES(100, 'À quelle date célébrons-nous la déclaration d''indépendance des États-Unis, en 1776 ?', '4 juillet', '3');
INSERT INTO CARTE
VALUES(101, 'À quelle date célébrons-nous la fin de la Première Guerre mondiale, en France ?', '11 novembre', '3');
INSERT INTO CARTE
VALUES(102, 'Quel gangster américain était surnommé Scarface ?', 'Al Capone', '3');
INSERT INTO CARTE
VALUES(103, 'Comment appelle-t-on un membre du crime organisé au Japon ?', 'Yakuza', '3');
INSERT INTO CARTE
VALUES(104, 'De quel pays, la mafia est-elle appelée triade ?', 'En Chine', '3');
INSERT INTO CARTE
VALUES(105, 'En quelle décennie, l''évènement historique, Le premier bébé-éprouvette est né, a-t-il eu lieu ?', '1970', '3');
INSERT INTO CARTE
VALUES(106, 'En quelle décennie, l''évènement historique, Un petit pas pour l''homme un grand pas pour l''humanité !, a-t-il eu lieu ?', '1960', '3');
INSERT INTO CARTE
VALUES(107, 'En quelle année, l''évènement historique, Dolly première brebis clonée!, a-t-il eu lieu ?', '1990', '3');
INSERT INTO CARTE
VALUES(108, 'Où a été filmée la première vidéo diffusée sur Youtube : dans un festival, une salle de bains ou un zoo ?', 'Dans un zoo', '3');
INSERT INTO CARTE
VALUES(109, 'Quel peuple fut le premier à maîtriser la boussole ?', 'Les Chinois', '3');
INSERT INTO CARTE
VALUES(110, 'Quelle entreprise a racheté YouTube en 2006 ?', 'Google', '3');
INSERT INTO CARTE
VALUES(111, 'De quel site de e-commerce venaient les trois employés qui ont créé YouTube ?', 'PayPal', '3');
INSERT INTO CARTE
VALUES(112, 'Quelle épice est régulièrement utilisée lors des mariages hindous, pour illuminer les saris ou enduire le visage des futurs époux ?', 'Le cucurma', '3');
INSERT INTO CARTE
VALUES(113, 'Au bout de combien d''années de mariage célèbre-ton ses noces de diamant ?', '60 ans', '3');
INSERT INTO CARTE
VALUES(114, 'Quelle grande découverte médicale a été réalisée par Alexander Fleming ?', 'La péniciline', '3');
INSERT INTO CARTE
VALUES(115, 'Quelle grande découverte médicale a été réalisée par Laennec ?', 'Le stéthoscope', '3');
INSERT INTO CARTE
VALUES(116, 'Quelle grande découverte médicale a été réalisée par Wilhelm Röntgen ?', 'Les rayons X', '3');
INSERT INTO CARTE
VALUES(117, 'Pour quel continent la chanson We are the world a-t-elle été enregistrée ?', 'L''Afrique', '3');
INSERT INTO CARTE
VALUES(118, 'Quel artiste a été ajouté numériquement au clip de la chanson We Are the world: 25 for Haiti ?', 'Michael Jackson', '3');
INSERT INTO CARTE
VALUES(119, 'Qui devient la marraine des Restos du coeur en 2007 ?', 'Mimie Mathy', '3');
INSERT INTO CARTE
VALUES(120, 'Dans quel jeu de hasard les numéros gagnants sont-ils tirés toutes les 4 minutes approximativement ?', 'Keno', '3');
INSERT INTO CARTE
VALUES(121, 'Comment s''appelle l''entreprise publique française qui gère le Loto ?', 'Française des Jeux', '3');
INSERT INTO CARTE
VALUES(122, 'Quel prix Nobel Barack Obama a-t-il reçu ?', 'Paix', '3');
INSERT INTO CARTE
VALUES(123, 'Quel réseau social crée par Tom Anderson et Chis DeWolfe a été d''emblée plébiscité par les musiciens ?', 'MySpace', '3');
INSERT INTO CARTE
VALUES(124, 'Quel réseau social pour adolescents s''appuie sur la métaphore d''un hôtel virtuel ?', 'Habbo Hotel', '3');
INSERT INTO CARTE
VALUES(125, 'Quel site français fondé au début des années 2000 permet de retrouver d''anciens amis en fonction de photos de classes et d''anciens établissements fréquentés ?', 'Copains d''avant', '3');
INSERT INTO CARTE
VALUES(126, 'Sous quel nom, Vladimir Ilitch Oulianov, est-il mieux connu ?', 'Lénine', '3');
INSERT INTO CARTE
VALUES(127, 'Sous quel nom, Siddhartha Gautama, est-il mieux connu ?', 'Bouddha', '3');
INSERT INTO CARTE
VALUES(128, 'Quelle pizza a été créée à la fin du XIXe siècle en l''honneur de la reine d''Italie ?', 'Pizza Margherita', '3');
INSERT INTO CARTE
VALUES(129, 'À quel conflit attribue-t-on le début du succès des pizzas ?', 'Seconde Guerre mondiale', '3');
INSERT INTO CARTE
VALUES(130, 'De quelle couleur étaient les pizzas avant l''introduction de la tomate dans la cuisine napolitaine ?', 'Blanches', '3');
INSERT INTO CARTE
VALUES(131, 'Quel est le nom du paquebot transatlantique torpillé par un sous-marin allemand en 1915 ?', 'Le Lusitania', '3');
INSERT INTO CARTE
VALUES(132, 'Quel est le nom d''un célèbre vaisseau fantôme, célèbré par un opéra de Wagner et évoqué dans le film Pirates des Caraïbes ?', 'Le Hollandais volant', '3');
INSERT INTO CARTE
VALUES(133, 'Quel est le nom du paquebot transatlantique désarmé au début des années 1970 et chanté par Michel Sardou ?', 'Le France', '3');

INSERT INTO CARTE
VALUES(134, 'Quels sont les principaux ingrédients du cocktail Cuba Libre ?', 'Rhum blanc, cola, jus de citron', '4');
INSERT INTO CARTE
VALUES(135, 'Quels sont les principaux ingrédients du cocktail Cosmopolitain ?', 'Vodka, triple sec, jus de canneberge, jus de citron vert', '4');
INSERT INTO CARTE
VALUES(136, 'Quel sportif a comme surnom Spice Boy ?', 'David Beckham', '4');
INSERT INTO CARTE
VALUES(137, 'Quel sportif a comme surnom La Guêpe ?', 'Laura Flessel', '4');
INSERT INTO CARTE
VALUES(138, 'Quel alcool tire sa saveur des grains et des baies du genévrier ?', 'Le gin', '4');
INSERT INTO CARTE
VALUES(139, 'Quelle eau-de-vie est traditionnellement produite à partir de la canne à sucre ?', 'Le rhum', '4');
INSERT INTO CARTE
VALUES(140, 'Quelle liqueur est produite à partir de noyaux de pêches ou d''abricots ?', 'L''amaretto', '4');
INSERT INTO CARTE
VALUES(141, 'Au Monopoly (édition classique), de quelle couleur est la Place Pigalle ?', 'Orange', '4');
INSERT INTO CARTE
VALUES(142, 'Au Monopoly (édition classique), de quelle couleur est l''Avenue Foch ?', 'Vert', '4');
INSERT INTO CARTE
VALUES(143, 'Au Monopoly (édition classique), de quelle couleur est la Rue de la Paix ?', 'Bleu', '4');
INSERT INTO CARTE
VALUES(144, 'De quelle couleur est le maillot du meilleur grimpeur du Tour de France ?', 'Blanc à pois rouges', '4');
INSERT INTO CARTE
VALUES(145, 'Dans quelle ville se termine chaque année le Tour de France ?', 'À Paris', '4');
INSERT INTO CARTE
VALUES(146, 'Au polo, combien de joueurs s''affrontent sur le terrain ?', '8', '4');
INSERT INTO CARTE
VALUES(147, 'Avec quoi les joueurs de polo frappent-ils la balle ?', 'Avec un maillet', '4');
INSERT INTO CARTE
VALUES(148, 'Combien de temps dure un match de rugby (mi-temps non comprise) ?', '80 minutes', '4');
INSERT INTO CARTE
VALUES(149, 'Combien de temps dure un match d''handball (mi-temps non comprise) ?', '60 minutes', '4');
INSERT INTO CARTE
VALUES(150, 'Combien de temps dure un match de basket-ball FIBA (mi-temps non comprise) ?', '40 minutes', '4');
INSERT INTO CARTE
VALUES(151, 'Quel est le nom du boxeur né Cassius Marcellus Clay, qui a allumé la flamme lors des Jeux Olympiques de 1996 ?', 'Mohamed Ali', '4');
INSERT INTO CARTE
VALUES(152, 'Quel est le nom du footballeur français d''origine italienne, trois fois ballon d''or, qui a allumé la flamme des Jeux Olympiques de 1992 ?', 'Michel Platini', '4');
INSERT INTO CARTE
VALUES(153, 'Quel est le groupe ou le chanteur à l''origine de cet hymne sportif : We Will Rock You ?', 'Queen', '4');
INSERT INTO CARTE
VALUES(154, 'Quel est le chanteur ou le groupe à l''origine de cet hymne sportif : I Will Survive ?', 'Gloria Gaynor', '4');
INSERT INTO CARTE
VALUES(155, 'Quel est le chanteur ou le groupe à l''origine de cet hymne sportif : Eye of the Tiger ?', 'Survivor', '4');
INSERT INTO CARTE
VALUES(156, 'Quel est le signe astrologique associé au 1er mars ?', 'Poissons', '4');
INSERT INTO CARTE
VALUES(157, 'Quel est le signe astrologique associé au 1er juin ?', 'Gémeaux', '4');
INSERT INTO CARTE
VALUES(158, 'Quel est le signe astrologique associé au 1er septembre ?', 'Vierge', '4');
INSERT INTO CARTE
VALUES(159, 'Quelle est la valeur de la lettre M au SCRABBLE ?', '2 points', '4');
INSERT INTO CARTE
VALUES(160, 'Quelle est la valeur de la lettre V au SCRABBLE ?', '4 points', '4');
INSERT INTO CARTE
VALUES(161, 'Quelle est la valeur de la lettre J au SCRABBLE ?', '8 points', '4');
INSERT INTO CARTE
VALUES(162, 'Quel est le sport pratiqué par les frèers Ralf et Michael Schumacher ?', 'Course automobile', '4');
INSERT INTO CARTE
VALUES(163, 'Quel est le sport pratiqué par les frères Andy et Jamie Murray ?', 'Tennis', '4');
INSERT INTO CARTE
VALUES(164, 'Quel est le sport pratiqué par les frères Patrice et Tony Estanguet ?', 'Canoë-kayak', '4');
INSERT INTO CARTE
VALUES(165, 'Quel est le nombre de joueurs présents sur le terrain pour un match de football ?', '22', '4');
INSERT INTO CARTE
VALUES(166, 'Quel esr le nombre de joueurs présents sur le terrain pour un match de handball ?', '14', '4');
INSERT INTO CARTE
VALUES(167, 'Quel est le nombre de joueurs présents sur le terrain pour un match de basketball ?', '10', '4');
INSERT INTO CARTE
VALUES(168, 'Quel est le sport à l''honneur dans le film Point Break ?', 'Surf', '4');
INSERT INTO CARTE
VALUES(169, 'Quel est le sport à l''honneur dans le film Million Dolar Baby ?', 'Boxe', '4');
INSERT INTO CARTE
VALUES(170, 'Quel est le sport qui est à l''honneur dans le film Invictus ?', 'Rugby', '4');
INSERT INTO CARTE
VALUES(171, 'À quel jeu ancien le tennis doit-il sa manière particulière de compter les points ?', 'Jeu de paume', '4');
INSERT INTO CARTE
VALUES(172, 'Sur quelle surface les joueurs évoluent-ils à Roland-Garros ?', 'Terre battue', '4');
INSERT INTO CARTE
VALUES(173, 'Quels sont les 4 tournois de tennis du Grand Chelem ?', 'Open d''Australie, Roland-Garros, Wimbledon, US Open', '4');
INSERT INTO CARTE
VALUES(174, 'Comment appelle-t-on le vin produit à partir de raisins vendangés gelés ?', 'Le vin de glace', '4');
INSERT INTO CARTE
VALUES(175, 'Quelle substance naturelle est à l''origine de l''hydromel ?', 'Le miel', '4');
INSERT INTO CARTE
VALUES(176, 'Quel objet, très utilisé pendant les cours de fitness, a été créé par Gin Miller dans les années 1980 ?', 'Le step', '4');
INSERT INTO CARTE
VALUES(177, 'Quelle émission télévisée a introduit le fitness en France, au son de toutouyoutou ?', 'Gym Tonic', '4');
INSERT INTO CARTE
VALUES(178, 'Quels sont les noms des 4 styles de nage aux Jeux Olympiques ?', 'Papillon, dos, brasse, nage libre', '4');
INSERT INTO CARTE
VALUES(179, 'Combien de médailles Michael Phelps a-t-il remporté aux Jeux Olympiques de 2008 ?', '8', '4');
INSERT INTO CARTE
VALUES(180, 'Quelle est la longueur officielle d''un bassin olympique ?', '50 mètres', '4');
INSERT INTO CARTE
VALUES(181, 'Dans quel sport, Gaël Monfils s''illustre-t-il particulièrement ?', 'Tennis', '4');
INSERT INTO CARTE
VALUES(182, 'Dans quel sportif, Didier Drogba s''illustre-t-il particulièrement ?', 'Football', '4');
INSERT INTO CARTE
VALUES(183, 'Dans quel sport, Jean-Philippe Gatien s''illustre-t-il particulièrement ?', 'Tennis de table', '4');
INSERT INTO CARTE
VALUES(184, 'Dans quelle équipe de NBA Tony Parker s''est-il illustré dans ces débuts ?', 'San Antonio Spurs', '4');
INSERT INTO CARTE
VALUES(185, 'Combien de titres de Roland Garros Raphaël Nadal a-t-il remporté ?', '11', '4');

INSERT INTO CARTE VALUES(186, 'Quel est le langage informatique le plus courant utilisé pour écrire les pages web ?', 'HTML', '5');
INSERT INTO CARTE VALUES(187, 'À quoi est égal 1 octet ?', '8 bits', '5');
INSERT INTO CARTE VALUES(188, 'Qu’est-ce qu’un CPU ?', 'processeur', '5');
INSERT INTO CARTE VALUES(189, 'Que signifie les trois lettres "www" ?', 'world wide web', '5');
INSERT INTO CARTE VALUES(190, 'Quelle est l’extension d’un programme ?', 'exe', '5');
INSERT INTO CARTE VALUES(191, 'Quel langage de programmation très connu a comme nom celui d’un serpent ?', 'Python', '5');
INSERT INTO CARTE VALUES(192, 'Quel est le nom du nouveau langage de programmation lancé par Apple en 2014?', 'Swift', '5');
INSERT INTO CARTE VALUES(193, 'En quelle année Google a-t-il été créé ?', '1998', '5');
INSERT INTO CARTE VALUES(194, 'Quelle année a vu la naissance de l''Internet ?', '1969', '5');
INSERT INTO CARTE VALUES(195, 'Comment s''appelait l''ancêtre de l''Internet, créé par le département américain de la défense ?', 'Arpanet', '5');
INSERT INTO CARTE VALUES(196, 'Qu’est-ce qui contient les données de formulaire ainsi que les identifiants et mots de passe enregistrés sur son navigateur web ?', 'L’historique de navigation', '5');
INSERT INTO CARTE VALUES(197, 'Quel protocole est utilisé pour transférer des fichiers sur Internet ?', 'FTP', '5');
INSERT INTO CARTE VALUES(198, 'Quel est le format de fichier idéal et le plus utilisé par les professionnels pour transmettre un document ?', 'PDF', '5');
INSERT INTO CARTE VALUES(199, 'Comment s’appelle la technologie permettant de se connecter à internet sur une borne sans fil ?', 'Wifi', '5');
INSERT INTO CARTE VALUES(200, 'Que vaut le nombre binaire 1011 en décimal ?', '11', '5');
INSERT INTO CARTE VALUES(201, 'Quelle est l’erreur envoyée par le serveur lorsque tout s’est bien déroulé ?', '200', '5');
INSERT INTO CARTE VALUES(202, 'Quelle est l’erreur envoyée par le serveur lorsque la ressource n’existe pas ?', '404', '5');
INSERT INTO CARTE VALUES(203, 'Quelle commande permet de vérifier le temps de réponse d''une machine distante ?', 'ping', '5');

INSERT INTO CARTE VALUES(204, 'Avec Steve Wozniak, qui a créé Apple ?', 'Steve Jobs', '6');
INSERT INTO CARTE VALUES(205, 'Qu’est-ce que Bill Gates et Paul Allen ont fondé ?', 'Microsoft', '6');
INSERT INTO CARTE VALUES(206, 'Qui est le père de l’informatique moderne ?', 'Alan Turing', '6');
INSERT INTO CARTE VALUES(207, 'Qui a créé Linux ?', 'Linus Torvalds', '6');
INSERT INTO CARTE VALUES(208, 'Qui dirige Apple en 2018 ?', 'Tim Cook', '4');
INSERT INTO CARTE VALUES(209, 'Avec Larry Page, qui a créé Google ?', 'Sergeï Brin', '6');
INSERT INTO CARTE VALUES(210, 'A l’origine, pour quelle université Mark Zuckerberg a-t-il créé Facebook ?', 'Harvard', '6');
