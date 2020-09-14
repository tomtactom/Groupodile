CREATE TABLE IF NOT EXISTS `group` (
	`id` bigint unsigned NOT NULL AUTO_INCREMENT,
	`title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
	`description` text COLLATE utf8_unicode_ci DEFAULT NULL,
	`invite` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
	`category` int,
	`age` int,
	`date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
	`join` int,
	`joindate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
	`vote` int,
	PRIMARY KEY (`id`), UNIQUE (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `faq` (
	`id` bigint unsigned NOT NULL AUTO_INCREMENT,
	`question` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
	`questiondate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
	`answer` text COLLATE utf8_unicode_ci DEFAULT NULL,
	`answerdate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
	`email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
	PRIMARY KEY (`id`), UNIQUE (`id`), UNIQUE (`question`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;