INSERT INTO `kwf_pools` (`id`, `pool`, `pos`, `value`, `visible`) VALUES
(1, 'Languages', 1, 'English', 1),
(2, 'Languages', 2, 'German', 1),
(3, 'Languages', 3, 'French', 1),
(4, 'Languages', 4, 'Italian', 1),
(5, 'Languages', 5, 'Spanish', 1),
(7, 'Branches', 1, 'Education', 1),
(8, 'Branches', 2, 'IT', 1),
(9, 'Branches', 3, 'Medicine', 1),
(10, 'Branches', 4, 'Tourism', 1),
(11, 'Branches', 5, 'Forschung', 1);

INSERT INTO `kwf_users` (`id`, `role`, `language`, `email`, `password`, `password_salt`, `gender`, `title`, `firstname`, `lastname`, `created`, `deleted`, `locked`, `logins`, `last_login`) VALUES
(9, 'admin', 'en', 'demo@koala-framework.org', 'b2c5ae6bb7bec6021e3224f316d8a0c0', '684e86989d', 'male', '', 'Koala', 'Framework', '2011-10-25 10:06:07', 0, 0, 2, '2011-10-25 10:50:59');

INSERT INTO `kwf_users` (`id`, `role`, `language`, `email`, `password`, `password_salt`, `gender`, `title`, `firstname`, `lastname`, `created`, `deleted`, `locked`, `logins`, `last_login`) VALUES
(10, 'user', 'en', 'demo@gmail.com', 'b2c5ae6bb7bec6021e3224f316d8a0c0', '684e86989d', 'male', '', 'Framework', 'Koala', '2011-10-25 10:06:07', 0, 0, 2, '2011-10-25 10:50:59');

CREATE TABLE IF NOT EXISTS `tasks` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `userId` int NOT NULL,
    `title` varchar(300) COLLATE utf8_unicode_ci,
    `description` varchar(1000) COLLATE utf8_unicode_ci,
    `startDate` date,
    `endDate` date,
    `status` int NOT NULL DEFAULT '0',
    `typeId` int NOT NULL,
    PRIMARY KEY (`id`),
    KEY `userId` (`userId`)
)  ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `lang_clubs` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `title` varchar(300) COLLATE utf8_unicode_ci,
    PRIMARY KEY (`id`)
)  ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `lang_club_groups` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `userId` int NOT NULL,
    `clubId` int NOT NULL,
    `langId` int NOT NULL,
    PRIMARY KEY (`id`),
    KEY `userId` (`userId`)
)  ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) NOT NULL DEFAULT '',
  `lastname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `visible` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `birth_date` date DEFAULT NULL,
  `birth_place` varchar(255) DEFAULT NULL,
  `sex` enum('male','female') NOT NULL DEFAULT 'male',
  `external` tinyint(3) unsigned NOT NULL,
  `spouse_firstname` varchar(255) DEFAULT NULL,
  `spouse_title` varchar(255) DEFAULT NULL,
  `spouse_lastname` varchar(255) DEFAULT NULL,
  `spouse_birth_date` date DEFAULT NULL,
  `spouse_job` varchar(255) DEFAULT NULL,
  `spouse_email` varchar(255) DEFAULT NULL,
  `branch_id` smallint(5) unsigned DEFAULT NULL,
  `subbranch` varchar(255) DEFAULT NULL,
  `branch_note` varchar(255) NOT NULL,
  `business_title` varchar(170) NOT NULL,
  `club_role` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `company_address` varchar(255) DEFAULT NULL,
  `company_country` varchar(5) DEFAULT NULL,
  `company_postcode` varchar(255) DEFAULT NULL,
  `company_city` varchar(50) DEFAULT NULL,
  `company_telephone_country` varchar(5) DEFAULT NULL,
  `company_telephone_pre` varchar(10) DEFAULT NULL,
  `company_telephone` varchar(255) DEFAULT NULL,
  `company_mobile_country` varchar(5) DEFAULT NULL,
  `company_mobile_pre` varchar(10) DEFAULT NULL,
  `company_mobile` varchar(255) DEFAULT NULL,
  `company_fax_country` varchar(5) DEFAULT NULL,
  `company_fax_pre` varchar(10) DEFAULT NULL,
  `company_fax` varchar(255) DEFAULT NULL,
  `company_email` varchar(255) DEFAULT NULL,
  `company_url` varchar(255) DEFAULT NULL,
  `private_address` varchar(50) DEFAULT NULL,
  `private_country` varchar(5) DEFAULT NULL,
  `private_postcode` varchar(255) DEFAULT NULL,
  `private_city` varchar(255) DEFAULT NULL,
  `private_telephone_country` varchar(5) DEFAULT NULL,
  `private_telephone_pre` varchar(10) DEFAULT NULL,
  `private_telephone` varchar(255) DEFAULT NULL,
  `private_mobile_country` varchar(5) DEFAULT NULL,
  `private_mobile_pre` varchar(10) DEFAULT NULL,
  `private_mobile` varchar(255) DEFAULT NULL,
  `private_fax_country` varchar(5) DEFAULT NULL,
  `private_fax_pre` varchar(10) DEFAULT NULL,
  `private_fax` varchar(255) DEFAULT NULL,
  `private_email` varchar(255) DEFAULT NULL,
  `private_url` varchar(255) DEFAULT NULL,
  `miscellaneous` text,
  `picture_id` int(11) DEFAULT NULL,
  `position` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `external` (`external`),
  KEY `branch_id` (`branch_id`),
  KEY `visible` (`visible`),
  KEY `picture_id` (`picture_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

INSERT INTO `members` (`id`, `title`, `firstname`, `lastname`, `visible`, `birth_date`, `birth_place`, `sex`, `external`, `spouse_firstname`, `spouse_title`, `spouse_lastname`, `spouse_birth_date`, `spouse_job`, `spouse_email`, `branch_id`, `subbranch`, `branch_note`, `business_title`, `club_role`, `company`, `company_address`, `company_country`, `company_postcode`, `company_city`, `company_telephone_country`, `company_telephone_pre`, `company_telephone`, `company_mobile_country`, `company_mobile_pre`, `company_mobile`, `company_fax_country`, `company_fax_pre`, `company_fax`, `company_email`, `company_url`, `private_address`, `private_country`, `private_postcode`, `private_city`, `private_telephone_country`, `private_telephone_pre`, `private_telephone`, `private_mobile_country`, `private_mobile_pre`, `private_mobile`, `private_fax_country`, `private_fax_pre`, `private_fax`, `private_email`, `private_url`, `miscellaneous`, `picture_id`, `position`) VALUES
(1, '', 'John', 'Doe', 0, NULL, '', 'male', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, 'asdf', 'asdf', NULL, '0815', 'asdfsadf', NULL, '', '', NULL, '', '', NULL, '', '', 'asdf@asdf.com', 'http://xxx.com', '', NULL, '', '', NULL, '', '', NULL, '', '', NULL, '', '', '', '', NULL, 15596, ''),
(2, '', 'Lorem', 'Ipsum', 0, NULL, '', 'male', 0, NULL, NULL, NULL, NULL, NULL, NULL, 35, '', '', '', NULL, '', '', 'AG', '', '', NULL, '', '', NULL, '', '', NULL, '', '', '', '', '', NULL, '', '', NULL, '', '', NULL, '', '', NULL, '', '', '', '', NULL, NULL, ''),
(3, '', 'Jane', 'Miller', 1, NULL, NULL, 'female', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(4, '', 'Dolor', 'Sit', 1, NULL, NULL, 'female', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '');

CREATE TABLE IF NOT EXISTS `member_contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) unsigned NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `text` text NOT NULL,
  `subject` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `member_id` (`member_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `member_languages` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `pos` tinyint(3) unsigned NOT NULL,
  `language_id` int(5) unsigned DEFAULT NULL,
  `member_id` int(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `member_id` (`member_id`),
  KEY `language_id` (`language_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `links` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
PRIMARY KEY (`id`),
KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `link_data` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`link_id` int(11) unsigned NOT NULL,
`name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
`value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
`desc` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
PRIMARY KEY (`id`),
KEY `link_id` (`link_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `links` (`id`, `name`) VALUES
(1, 'Types');

INSERT INTO `link_data` (`id`, `link_id`, `name`, `value`, `desc`) VALUES
(1, 1, 'Types', 'one', 'one'),
(2, 1, 'Types', 'two', 'two'),
(3, 1, 'Types', 'three', 'three');

