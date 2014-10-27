SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


DROP TABLE IF EXISTS `campaings`;
CREATE TABLE IF NOT EXISTS `campaings` (
`id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `groups` varchar(1000) DEFAULT NULL,
  `letter` mediumtext,
  `subject` varchar(300) DEFAULT NULL,
  `sentcount` int(11) NOT NULL DEFAULT '0',
  `emailscount` int(11) NOT NULL DEFAULT '0',
  `circulated` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
`id` int(11) NOT NULL,
  `group_name` varchar(100) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `recepients`;
CREATE TABLE IF NOT EXISTS `recepients` (
`id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mail_group` int(11) DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=100539 DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `senders`;
CREATE TABLE IF NOT EXISTS `senders` (
`id` int(11) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `login` varchar(200) DEFAULT NULL,
  `service` varchar(50) DEFAULT NULL,
  `lastsending` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
`id` int(11) NOT NULL,
  `server` varchar(200) DEFAULT NULL,
  `port` int(11) DEFAULT NULL,
  `crypt` varchar(20) NOT NULL DEFAULT 'ssl',
  `daylimit` int(11) DEFAULT NULL,
  `service` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
`id` int(11) NOT NULL,
  `login` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `group` int(11) NOT NULL DEFAULT '1',
  `notes` mediumtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `admins` (`id`, `login`, `email`, `password`, `group`, `notes`) VALUES
(1, 'admin', 'admin@localhost', 'adpexzg3FUZAk', 0, 'Ð£Ð´Ð°Ñ‡Ð½Ð¾Ð¹ Ñ€Ð°ÑÑÑ‹Ð»ÐºÐ¸\n\nLazar Sender 0.1.1 23.10.2014 21:15\n- Ð¿Ð¾ÑÐ²Ð¸Ð»Ð°ÑÑŒ Ð²Ð¾Ð·Ð¼Ð¾Ð¶Ð½Ð¾ÑÑ‚ÑŒ Ð¿Ñ€Ð¾ÑÐ¼Ð¾Ñ‚Ñ€Ð° Ð»Ð¾Ð³Ð¾Ð² Ð¿Ñ€ÑÐ¼Ð¾ Ð¸Ð· Ð¿Ð°Ð½ÐµÐ»Ð¸ ÑƒÐ¿Ñ€Ð°Ð²Ð»ÐµÐ½Ð¸Ñ\n- ÑÐºÑ€Ð¸Ð¿Ñ‚ Ð¿ÐµÑ€ÐµÐ²ÐµÐ´ÐµÐ½ Ð½Ð° Ñ€Ð°Ð±Ð¾Ñ‚Ñƒ Ñ Ð‘Ð” Ñ‡ÐµÑ€ÐµÐ·  PDO\n- ÑÐºÑ€Ð¸Ð¿Ñ‚ Ñ€Ð°Ð±Ð¾Ñ‚Ð°ÐµÑ‚ Ð¸ÑÐ¿Ð¾Ð»ÑŒÐ·ÑƒÑ ÑˆÐ°Ð±Ð»Ð¾Ð½Ð¸Ð·Ð°Ñ‚Ð¾Ñ€ Smarty\n- Ð´Ð¾Ð±Ð°Ð²Ð»ÐµÐ½Ð° Ð²Ð¾Ð·Ð¼Ð¾Ð¶Ð½Ð¾ÑÑ‚ÑŒ ÑƒÑÑ‚Ð°Ð½Ð¾Ð²ÐºÐ¸ Ñ‚Ð¸Ð¿Ð° ÑˆÐ¸Ñ„Ñ€Ð¾Ð²Ð°Ð½Ð¸Ñ Ð´Ð»Ñ SMTP\n- Ð´Ð¾Ð±Ð°Ð²Ð»ÐµÐ½Ð° Ð²Ð¾Ð·Ð¼Ð¾Ð¶Ð½Ð¾ÑÑ‚ÑŒ Ð¿Ñ€Ð¾Ñ‚ÐµÑÑ‚Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ Ð½Ð°ÑÑ‚Ñ€Ð¾Ð¹ÐºÐ¸ SMTP\n- Ð´Ð¾Ð±Ð°Ð²Ð»ÐµÐ½Ð° Ð²Ð¾Ð·Ð¼Ð¾Ð¶Ð½Ð¾ÑÑ‚ÑŒ Ñ€ÐµÐ´Ð°ÐºÑ‚Ð¸Ñ€Ð¾Ð²Ð°Ñ‚ÑŒ Ð´Ð°Ñ‚Ñƒ Ð¿Ð¾ÑÐ»ÐµÐ´Ð½ÐµÐ¹ Ñ€Ð°ÑÑÑ‹Ð»ÐºÐ¸ Ñ Ð°ÐºÐºÐ°ÑƒÐ½Ñ‚Ð°\n- Ð¸ÑÐ¿Ñ€Ð°Ð²Ð»ÐµÐ½ Ð±Ð°Ð³ Ñ Ð¾Ñ‚Ð¿Ñ€Ð°Ð²ÐºÐ¾Ð¹ Ñ‚ÐµÑÑ‚Ð¾Ð²Ð¾Ð³Ð¾ Ð¿Ð¸ÑÑŒÐ¼Ð° ÐºÐ°Ð¼Ð¿Ð°Ð½Ð¸Ð¸\n- Ð¿Ñ€Ð¾Ñ‡Ð¸Ðµ Ð¼ÐµÐ»ÐºÐ¸Ðµ Ð¸ÑÐ¿Ñ€Ð°Ð²Ð»ÐµÐ½Ð¸Ñ\n\nLazar Sender 0.1  16.10.2014  4:16\n');

ALTER TABLE `admins`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `admins`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;

ALTER TABLE `campaings`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `groups`
 ADD PRIMARY KEY (`id`);


ALTER TABLE `recepients`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `senders`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `services`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `campaings`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;

ALTER TABLE `groups`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=72;

ALTER TABLE `recepients`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=100539;

ALTER TABLE `senders`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;

ALTER TABLE `services`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;

