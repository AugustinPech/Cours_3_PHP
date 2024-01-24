CREATE TABLE `Articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `importance_level` int(10) unsigned zerofill NOT NULL,
  `Authors_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`,`Authors_id`),
  UNIQUE KEY `title_UNIQUE` (`title`),
  UNIQUE KEY `body_UNIQUE` (`body`) USING HASH,
  KEY `fk_Articles_Authors1_idx` (`Authors_id`),
  CONSTRAINT `Articles_ibfk_1` FOREIGN KEY (`Authors_id`) REFERENCES `Authors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;


CREATE TABLE `Articles_has_categories` (
  `Articles_id` int(10) unsigned NOT NULL,
  `categories_id` int(11) NOT NULL,
  PRIMARY KEY (`Articles_id`,`categories_id`),
  KEY `fk_Articles_has_categories_categories1_idx` (`categories_id`),
  KEY `fk_Articles_has_categories_Articles1_idx` (`Articles_id`),
  CONSTRAINT `fk_Articles_has_categories_Articles1` FOREIGN KEY (`Articles_id`) REFERENCES `Articles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Articles_has_categories_categories1` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;


CREATE TABLE `Authors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(45) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`pseudo`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;


CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;


CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `body` text NOT NULL,
  `date` timestamp(1) NOT NULL DEFAULT current_timestamp(1) ON UPDATE current_timestamp(1),
  `Authors_id` int(10) unsigned NOT NULL,
  `Articles_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`,`Authors_id`,`Articles_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `body_UNIQUE` (`body`) USING HASH,
  KEY `fk_comments_Authors1_idx` (`Authors_id`),
  KEY `fk_comments_Articles1_idx` (`Articles_id`),
  CONSTRAINT `fk_comments_Articles1` FOREIGN KEY (`Articles_id`) REFERENCES `Articles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_comments_Authors1` FOREIGN KEY (`Authors_id`) REFERENCES `Authors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
