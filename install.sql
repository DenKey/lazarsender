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

CREATE TABLE `reset_password_log` (
`id` int(11) NOT NULL,
  `login` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `request` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `admins` (`id`, `login`, `email`, `password`, `group`, `notes`) VALUES
(1, 'admin', 'admin@lazarsender.com', 'adpexzg3FUZAk', 0, 'Successful mailing !\n\nLazar Sender 0.1.2 26.10.2014 18:12\n- Added the possibility of gradual mailing campaigns\n- Bug fixed, editing user''s\n.\nLazar Sender 0.1.1 23.10.2014 21:15\n- The opportunity to view the logs directly from the control panel \n- Script is transferred to work with the database via PDO \n- Script works using Smarty templating \n- Added ability to set the type of encryption for SMTP \n- Added ability to test the SMTP settings \n- Added ability to edit the date of the last distribution to account \n- Fixed bug with sending a test email campaigns \n- Other minor fixes\n\nLazar Sender 0.1  16.10.2014  4:16\n');

ALTER TABLE `admins`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `admins`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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

 ALTER TABLE `reset_password_log`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `campaings`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `groups`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `recepients`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `senders`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `services`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `reset_password_log`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

