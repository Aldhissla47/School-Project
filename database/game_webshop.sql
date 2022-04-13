-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2016 at 09:24 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `game_webshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `title` varchar(40) NOT NULL,
  `description` text,
  `genre` varchar(20) NOT NULL,
  `price` float NOT NULL,
  `developer` varchar(40) NOT NULL,
  `release_date` date NOT NULL,
  `image_path` varchar(225) DEFAULT NULL,
  `multiplayer` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`title`, `description`, `genre`, `price`, `developer`, `release_date`, `image_path`, `multiplayer`) VALUES
('Amnesia: The Dark Descent', 'A first person survival horror. A game about immersion, discovery and living through a nightmare. An experience that will chill you to the core.', 'Horror', 199, 'Frictional Games', '2010-09-08', 'images/games/amnesia.png', 0),
('Civilization V', 'The Flagship Turn-Based Strategy Game Returns. Become Ruler of the World by establishing and leading a civilization from the dawn of man into the space age: Wage war, conduct diplomacy, discover new technologies, go head-to-head with some of history\'s greatest leaders and build the most powerful empire the world has ever known.', 'TBS', 299, 'Firaxis Games', '2010-09-23', 'images/games/civ5.png', 1),
('Counter-Strike: GO', 'The game expands upon the team-based action gameplay that it pioneered when it was launched 14 years ago. CS: GO features new maps, characters, and weapons and delivers updated versions of the classic CS content (de_dust, etc.).', 'FPS', 139, 'Valve', '2012-08-21', 'images/games/cs-go.png', 1),
('DOOM', 'Returns as a brutally fun and challenging modern-day shooter experience. Relentless demons, impossibly destructive guns, and fast, fluid movement provide the foundation for intense, first-person combat.', 'FPS', 599, 'id Software', '2016-05-13', 'images/games/doom.png', 1),
('Dota 2', 'A competitive game of action and strategy, played both professionally and casually by millions of passionate fans worldwide. Players pick from a pool of over a hundred heroes, forming two teams of five players.', 'MOBA', 99, 'Valve', '2013-07-09', 'images/games/dota2.png', 1),
('F1 2016', 'Create your own legend in F1â„¢ 2016. Get ready to go deeper into the world of the most prestigious motorsport than ever before. Work with your agent, engineer and team to develop your car in the deepest ever career experience, spanning up to ten seasons.', 'Racing', 499, 'Codemasters', '2016-08-19', 'images/games/f1-2016.png', 1),
('Grey Goo', 'A real-time strategy (RTS) game that combines classic strategy mechanics and a balanced combat system with an emphasis on large-scale decision-making.', 'RTS', 279, 'Petroglyph', '2015-01-23', 'images/games/grey-goo.png', 1),
('Mortal Kombat X', 'Experience the Next Generation of the #1 Fighting Franchise. Mortal Kombat X combines unparalleled, cinematic presentation with all new gameplay.', 'Fighting', 299, 'NetherRealm Studios', '2015-04-14', 'images/games/mortal-kombat-x.png', 1),
('Plague Inc: Evolved', 'A unique mix of high strategy and terrifyingly realistic simulation. Your pathogen has just infected \'Patient Zero\' - now you must bring about the end of human history by evolving a deadly, global Plague whilst adapting against everything humanity can do to defend itself.', 'Casual', 79, 'Ndemic Creations', '2016-02-18', 'images/games/plague-inc-evolved.png', 0),
('Rocket League', 'Soccer meets driving once again in the long-awaited, physics-based sequel to the beloved arena classic, Supersonic Acrobatic Rocket-Powered Battle-Cars! \r\n\r\nA futuristic Sports-Action game, Rocket League, equips players with booster-rigged vehicles that can be crashed into balls for incredible goals or epic saves across multiple, highly-detailed arenas. Using an advanced physics system to simulate realistic interactions, Rocket League relies on mass and momentum to give players a complete sense of intuitive control in this unbelievable, high-octane re-imagining of association football.', 'Sport', 239, 'Psyonix, Inc', '2015-07-07', 'images/games/rocket-legue.png', 1),
('Super Meat Boy', 'Super Meat Boy is a tough as nails platformer where you play as an animated cube of meat who\'s trying to save his girlfriend (who happens to be made of bandages) from an evil fetus in a jar wearing a tux.\r\n\r\nOur meaty hero will leap from walls, over seas of buzz saws, through crumbling caves and pools of old needles. Sacrificing his own well being to save his damsel in distress. Super Meat Boy brings the old school difficulty of classic NES titles like Mega Man 2, Ghost and Goblins and Super Mario Bros. 2 (The Japanese one) and stream lines them down to the essential no BS straight forward twitch reflex platforming.', 'Platform', 139, 'Team Meat', '2010-11-30', 'images/games/super-meat-boy.png', 0),
('The Elder Scrolls V: Skyrim', 'Epic Fantasy Reborn. The next chapter in the highly anticipated Elder Scrolls saga arrives from the makers of the 2006 and 2008 Games of the Year, Bethesda Game Studios. Skyrim reimagines and revolutionizes the open-world fantasy epic, bringing to life a complete virtual world open for you to explore any way you choose.', 'RPG', 149, 'Bethseda Game Studios', '2011-11-11', 'images/games/skyrim.png', 0),
('The Witcher 3: Wild Hunt', 'A story-driven, next-generation open world role-playing game, set in a visually stunning fantasy universe, full of meaningful choices and impactful consequences. In The Witcher, you play as Geralt of Rivia, a monster hunter tasked with finding a child from an ancient prophecy.', 'RPG', 299, 'CD Projekt Red', '2015-05-18', 'images/games/the-witcher-3.png', 0),
('Unreal Tournament', 'The original King of the Hill in the frag-or-be-fragged multiplayer gaming world. As the undisputed 1999 Game of the Year, Unreal Tournament grabbed the first person shooter genre by the soiled seat of its pants and knocked it around the room with its never-before-seen graphics, brutal edge-of-your-seat gameplay and a massive and varied feature list that gave gamers more than they ever expected. ', 'FPS', 99, 'Epic Games, Inc', '2000-10-25', 'images/games/unreal-tournament.png', 1),
('World of Warcraft: Legion', 'The sixth expansion set in the massively multiplayer online role-playing game (MMORPG) World of Warcraft, following Warlords of Draenor.', 'MMO', 299, 'Blizzard Entertainment', '2016-08-30', 'images/games/world-of-warcraft-legion.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`name`) VALUES
('Casual'),
('Fighting'),
('FPS'),
('Horror'),
('MMO'),
('MOBA'),
('Platform'),
('Racing'),
('RPG'),
('RTS'),
('Sport'),
('TBS');

-- --------------------------------------------------------

--
-- Table structure for table `hot`
--

CREATE TABLE `hot` (
  `game` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hot`
--

INSERT INTO `hot` (`game`) VALUES
('DOOM'),
('Dota 2'),
('The Elder Scrolls V: Skyrim');

-- --------------------------------------------------------

--
-- Table structure for table `owned_game`
--

CREATE TABLE `owned_game` (
  `user` varchar(20) NOT NULL,
  `game` varchar(40) NOT NULL,
  `price` float NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owned_game`
--

INSERT INTO `owned_game` (`user`, `game`, `price`, `date`) VALUES
('Erik', 'Plague Inc: Evolved', 79, '2016-11-09'),
('Fredrik', 'Amnesia: The Dark Descent', 199, '2016-11-09'),
('Rasmus', 'Amnesia: The Dark Descent', 199, '2016-11-09'),
('Rasmus', 'DOOM', 599, '2016-11-09'),
('Rasmus', 'World of Warcraft: Legion', 299, '2016-11-09');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `registered` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `password`, `email`, `registered`) VALUES
('admin', 'pass', 'admin@theking.com', '2016-11-03'),
('Erik', 'eri', 'Erik@gameshop.com', '2016-11-09'),
('Fredrik', 'fre', 'Fredrik@gameshop.com', '2016-11-08'),
('Rasmus', 'ras', 'Rasmus@gameshop.com', '2016-11-03');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `user` varchar(20) NOT NULL,
  `game` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`user`, `game`) VALUES
('Erik', 'Mortal Kombat X'),
('Rasmus', 'The Elder Scrolls V: Skyrim');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`title`),
  ADD KEY `fk_game_genre` (`genre`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `hot`
--
ALTER TABLE `hot`
  ADD PRIMARY KEY (`game`);

--
-- Indexes for table `owned_game`
--
ALTER TABLE `owned_game`
  ADD PRIMARY KEY (`user`,`game`),
  ADD KEY `game` (`game`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`user`,`game`),
  ADD KEY `game` (`game`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `fk_game_genre` FOREIGN KEY (`genre`) REFERENCES `genre` (`name`);

--
-- Constraints for table `hot`
--
ALTER TABLE `hot`
  ADD CONSTRAINT `fk_hotTitle` FOREIGN KEY (`game`) REFERENCES `game` (`title`);

--
-- Constraints for table `owned_game`
--
ALTER TABLE `owned_game`
  ADD CONSTRAINT `owned_game_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`name`),
  ADD CONSTRAINT `owned_game_ibfk_2` FOREIGN KEY (`game`) REFERENCES `game` (`title`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`name`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`game`) REFERENCES `game` (`title`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
