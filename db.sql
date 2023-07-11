/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.5.8-MariaDB : Database - manager
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`manager` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `manager`;

/*Table structure for table `admins` */

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `admins` */

insert  into `admins`(`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values 
(1,'Admin','admin@gmail.com',NULL,'$2y$10$IoMIgRlKHlT6LoW8dEV56u58N2MFiSDEvbjtWT9k.g0rl64kCEoMq',NULL,'2023-06-29 15:31:47','2023-06-29 15:31:47');

/*Table structure for table `agents` */

DROP TABLE IF EXISTS `agents`;

CREATE TABLE `agents` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level_id` bigint(20) DEFAULT NULL,
  `upper_id` bigint(20) DEFAULT NULL,
  `tree_list` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_holder` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nickname` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `balance` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alert_on_balance` bigint(20) DEFAULT NULL,
  `cash` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commission_rate` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail_callback` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `callback_token` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `callback_url` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail_callback_url` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domain_line` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gbn` int(11) DEFAULT NULL,
  `login_at` timestamp NULL DEFAULT NULL,
  `login_ip` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_oct` tinyint(4) DEFAULT NULL,
  `provider_pg` tinyint(4) DEFAULT NULL,
  `request_balance` bigint(20) DEFAULT NULL,
  `state` tinyint(4) DEFAULT NULL,
  `transfer_wallet` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `agents` */

insert  into `agents`(`id`,`uuid`,`level_id`,`upper_id`,`tree_list`,`account`,`account_number`,`account_holder`,`nickname`,`phone`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`,`balance`,`bank_name`,`alert_on_balance`,`cash`,`commission_rate`,`detail_callback`,`token`,`callback_token`,`callback_url`,`detail_callback_url`,`domain_line`,`gbn`,`login_at`,`login_ip`,`provider_oct`,`provider_pg`,`request_balance`,`state`,`transfer_wallet`) values 
(1,NULL,1,0,'(0)','User','111','ㅇㄴ','우주','phone','user@gmail.com',NULL,'$2y$10$oJeFCDicQb78fJCAZz.TLeJF9HwZTElo2a37Ez/uiZ0oD44t9icKi',NULL,'2023-06-29 15:31:17','2023-07-10 20:17:20','10000','hana',5,'300000','1',NULL,'92865cf3-d8f6-48d9-938c-564c9b447486','5c8f22aa-25e8-40ec-847f-f15ae776ebb1','http://www.google.com','http://www.google.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1),
(2,'',2,1,'(0)(1)','Test','2345','홍길동','지구',NULL,'test@gmail.com',NULL,'$2y$10$Md7/yBy2Zpo.N2NDaif/.ej6RPWH05NJ6TSXPzje/wRpzDZTqqgRe',NULL,'2023-06-29 15:31:17','2023-06-29 15:31:17','20000','새마을금고',0,'400000','2',NULL,'2d2267b1-2990-46f2-bd69-e24da7de3ac4','2d2267b1-2990-46f2-bd69-e24da7de3ac7','http://www.bing.com','http://www.google.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,0),
(4,'',3,2,'(0)(1)(2)','Test1','3456','일지매','달',NULL,'test1@gmail.com',NULL,'$2y$10$Md7/yBy2Zpo.N2NDaif/.ej6RPWH05NJ6TSXPzje/wRpzDZTqqgRe',NULL,'2023-06-29 15:31:17','2023-06-29 15:31:17','30000','우리은행',0,'500000','3',NULL,'2d2267b1-2990-46f2-bd69-e24da7de3ac3','2d2267b1-2990-46f2-bd69-e24da7de3ac6','http://www.freelancer.com','http://www.google.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,1);

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2021_01_10_084155_create_admins_table',1);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `sp_bet_casino` */

DROP TABLE IF EXISTS `sp_bet_casino`;

CREATE TABLE `sp_bet_casino` (
  `transaction_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `game_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `round_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `sort` enum('BET','WIN','CANCEL') COLLATE utf8_unicode_ci NOT NULL,
  `money` int(11) NOT NULL,
  `request_datetime` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`transaction_id`),
  KEY `game_id` (`game_id`,`round_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `sp_bet_casino` */

/*Table structure for table `sp_user_casino` */

DROP TABLE IF EXISTS `sp_user_casino`;

CREATE TABLE `sp_user_casino` (
  `user_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_nickname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `money` int(11) NOT NULL DEFAULT 0,
  `token` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `status` enum('Active','Drop') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`user_id`),
  KEY `token` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `sp_user_casino` */

/*Table structure for table `tbl_agent_cash_transactions` */

DROP TABLE IF EXISTS `tbl_agent_cash_transactions`;

CREATE TABLE `tbl_agent_cash_transactions` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `agent_id` bigint(20) DEFAULT NULL,
  `balance` bigint(20) DEFAULT NULL,
  `after_balance` bigint(20) DEFAULT NULL,
  `before_balance` bigint(20) DEFAULT NULL,
  `on_agent_id` bigint(20) DEFAULT NULL,
  `request_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transaction_id` bigint(20) DEFAULT NULL,
  `type` enum('deposit','withdraw') COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_type` enum('m_withdraw','m_deposit','a_deposit','a_withdraw') COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_agent_cash_transactions` */

insert  into `tbl_agent_cash_transactions`(`id`,`agent_id`,`balance`,`after_balance`,`before_balance`,`on_agent_id`,`request_id`,`transaction_id`,`type`,`sub_type`,`description`,`created_at`,`updated_at`) values 
(1,1,12000,12000,10000,1,'123111',12311,'deposit','a_deposit','1','2023-07-06 19:12:17','2023-07-06 19:12:17');

/*Table structure for table `tbl_agent_level` */

DROP TABLE IF EXISTS `tbl_agent_level`;

CREATE TABLE `tbl_agent_level` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ename` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `key` enum('A','B','C','D','E','F','G','H') COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_agent_level` */

insert  into `tbl_agent_level`(`id`,`name`,`ename`,`key`) values 
(1,'에이전트A','AgentA',NULL),
(2,'에이전트B','AgentB',NULL),
(3,'에이전트C','AgentC',NULL),
(4,'에이전트D','AgentD',NULL),
(5,'에이전트E','AgentE',NULL),
(6,'에이전트F','AgentF',NULL),
(7,'에이전트G','AgentG',NULL),
(8,'에이전트H','AgentH',NULL);

/*Table structure for table `tbl_agent_point_transactions` */

DROP TABLE IF EXISTS `tbl_agent_point_transactions`;

CREATE TABLE `tbl_agent_point_transactions` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `agent_id` bigint(20) DEFAULT NULL,
  `balance` bigint(20) DEFAULT NULL,
  `after_balance` bigint(20) DEFAULT NULL,
  `before_balance` bigint(20) DEFAULT NULL,
  `on_agent_id` bigint(20) DEFAULT NULL,
  `request_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transaction_id` bigint(20) DEFAULT NULL,
  `type` enum('deposit','withdraw') COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_type` enum('m_withdraw','m_deposit','a_deposit','a_withdraw') COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_agent_point_transactions` */

insert  into `tbl_agent_point_transactions`(`id`,`agent_id`,`balance`,`after_balance`,`before_balance`,`on_agent_id`,`request_id`,`transaction_id`,`type`,`sub_type`,`description`,`created_at`,`updated_at`) values 
(1,1,12000,12000,0,1,'121212',2323232,'deposit','a_deposit','1','2023-07-06 22:13:35','2023-07-06 22:13:35');

/*Table structure for table `tbl_companies` */

DROP TABLE IF EXISTS `tbl_companies`;

CREATE TABLE `tbl_companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `key` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maintenance` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_companies` */

insert  into `tbl_companies`(`id`,`name`,`key`,`maintenance`) values 
(1,'직영사','direct',0),
(2,'스페이드','spade',0),
(3,'골드','gold',0),
(4,'아너링크','honorlink',0);

/*Table structure for table `tbl_game_history` */

DROP TABLE IF EXISTS `tbl_game_history`;

CREATE TABLE `tbl_game_history` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `agent_id` bigint(20) DEFAULT NULL,
  `transaction_id` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` bigint(20) DEFAULT NULL,
  `before` bigint(20) DEFAULT NULL,
  `vendor` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vendor_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `game` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `game_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `game_type` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `action_id` bigint(20) DEFAULT NULL,
  `is_bonus` tinyint(4) DEFAULT 0,
  `is_free_game` tinyint(4) DEFAULT 0,
  `is_jackpot` tinyint(4) DEFAULT 0,
  `is_promo` tinyint(4) DEFAULT 0,
  `match_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `original_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `original_at` timestamp NULL DEFAULT NULL,
  `processed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `provider` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `referer_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `round_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `detail` blob DEFAULT NULL,
  `type` enum('balance_withdraw','balance_deposit') COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`,`created_at`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
 PARTITION BY RANGE (unix_timestamp(`created_at`))
(PARTITION `p202306` VALUES LESS THAN (1688137200) ENGINE = InnoDB,
 PARTITION `p202307` VALUES LESS THAN (1690815600) ENGINE = InnoDB,
 PARTITION `p999999` VALUES LESS THAN MAXVALUE ENGINE = InnoDB);

/*Data for the table `tbl_game_history` */

insert  into `tbl_game_history`(`id`,`uuid`,`agent_id`,`transaction_id`,`amount`,`before`,`vendor`,`vendor_id`,`game`,`game_id`,`game_type`,`created_at`,`updated_at`,`action_id`,`is_bonus`,`is_free_game`,`is_jackpot`,`is_promo`,`match_id`,`original_id`,`original_at`,`processed_at`,`provider`,`referer_id`,`round_id`,`state`,`status`,`timestamp`,`detail`,`type`) values 
(1,'4ulicv645gnxx8l',1,'1231111',12000,12000,NULL,'1',NULL,'1',1,'2023-06-07 11:36:37','2023-07-10 11:36:37',NULL,0,0,0,0,NULL,NULL,NULL,'2023-07-10 11:36:37',NULL,NULL,NULL,NULL,NULL,'2023-07-10 11:36:37',NULL,NULL),
(2,'4ulicv645gnxx8l',1,'12313333',12000,12000,NULL,'1',NULL,'1',NULL,'2023-07-10 11:36:37','2023-07-10 11:36:37',NULL,0,0,0,0,NULL,NULL,NULL,'2023-07-10 11:36:37',NULL,NULL,NULL,NULL,NULL,'2023-07-10 11:36:37',NULL,NULL);

/*Table structure for table `tbl_game_types` */

DROP TABLE IF EXISTS `tbl_game_types`;

CREATE TABLE `tbl_game_types` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `vendor_key` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_game_types` */

insert  into `tbl_game_types`(`id`,`vendor_key`,`type`) values 
(1,'evolution_casino','americanroulette'),
(2,'evolution_casino','andarbahar'),
(3,'evolution_casino','bacbo'),
(4,'evolution_casino','baccarat'),
(5,'evolution_casino','blackjack'),
(6,'evolution_casino','cashorcrash'),
(7,'evolution_casino','classicfreebet'),
(8,'evolution_casino','craps'),
(9,'evolution_casino','crazycoinflip'),
(10,'evolution_casino','crazytime'),
(11,'evolution_casino','csp'),
(12,'evolution_casino','deadoralivesaloon'),
(13,'evolution_casino','dealnodeal'),
(14,'evolution_casino','dhp'),
(15,'evolution_casino','dragontiger'),
(16,'evolution_casino','eth'),
(17,'evolution_casino','extrachilliepicspins'),
(18,'evolution_casino','fantan'),
(19,'evolution_casino','freebetblackjack'),
(20,'evolution_casino','funkytime'),
(21,'evolution_casino','gonzotreasurehunt'),
(22,'evolution_casino','holdem'),
(23,'evolution_casino','instantroulette'),
(24,'evolution_casino','lightningdice'),
(25,'evolution_casino','lightningscalablebj'),
(26,'evolution_casino','lobby'),
(27,'evolution_casino','megaball'),
(28,'evolution_casino','moneywheel'),
(29,'evolution_casino','monopoly'),
(30,'evolution_casino','monopolybigballer'),
(31,'evolution_casino','powerscalableblackjack'),
(32,'evolution_casino','rngamericanroulette'),
(33,'evolution_casino','rng-baccarat'),
(34,'evolution_casino','rngblackjack'),
(35,'evolution_casino','rng-craps'),
(36,'evolution_casino','rng-dealnodeal'),
(37,'evolution_casino','rng-dragontiger'),
(38,'evolution_casino','rngeuropeanroulette'),
(39,'evolution_casino','rng-lightningscalablebj'),
(40,'evolution_casino','rng-megaball'),
(41,'evolution_casino','rngmoneywheel'),
(42,'evolution_casino','rng-topcard'),
(43,'evolution_casino','roulette'),
(44,'evolution_casino','scalableblackjack'),
(45,'evolution_casino','sicbo'),
(46,'evolution_casino','sidebetcity'),
(47,'evolution_casino','teenpatti'),
(48,'evolution_casino','thb'),
(49,'evolution_casino','topcard'),
(50,'evolution_casino','topdice'),
(51,'evolution_casino','trp');

/*Table structure for table `tbl_games` */

DROP TABLE IF EXISTS `tbl_games`;

CREATE TABLE `tbl_games` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ko_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `en_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vendor_key` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `game_key` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `game_provider` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_main_game` tinyint(1) DEFAULT NULL,
  `pg_uuid` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `provider` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` tinyint(4) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `image` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_games` */

insert  into `tbl_games`(`id`,`ko_name`,`en_name`,`vendor_key`,`game_key`,`game_provider`,`is_main_game`,`pg_uuid`,`provider`,`state`,`type`,`image`) values 
(1,'미라클','Miracle','qwe','qwe','qwe',1,'21231',NULL,1,1,NULL);

/*Table structure for table `tbl_limits` */

DROP TABLE IF EXISTS `tbl_limits`;

CREATE TABLE `tbl_limits` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `agent_id` bigint(20) DEFAULT NULL,
  `type` enum('global','vendor','game') COLLATE utf8_unicode_ci DEFAULT NULL,
  `vendor_key` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `game_key` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `game_info` blob DEFAULT NULL,
  `max_bet` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_limits` */

insert  into `tbl_limits`(`id`,`agent_id`,`type`,`vendor_key`,`game_key`,`game_info`,`max_bet`,`created_at`,`updated_at`) values 
(1,1,'global','evolution','qwe',NULL,120000,'2023-07-10 16:48:44','2023-07-10 16:48:44');

/*Table structure for table `tbl_transactions` */

DROP TABLE IF EXISTS `tbl_transactions`;

CREATE TABLE `tbl_transactions` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `agent_id` bigint(20) DEFAULT NULL,
  `transaction_id` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` bigint(20) DEFAULT NULL,
  `before` bigint(20) DEFAULT NULL,
  `vendor` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `game` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `game_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `game_type` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `action_id` bigint(20) DEFAULT NULL,
  `is_bonus` tinyint(4) DEFAULT 0,
  `is_free_game` tinyint(4) DEFAULT 0,
  `is_jackpot` tinyint(4) DEFAULT 0,
  `is_promo` tinyint(4) DEFAULT 0,
  `match_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `original_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `original_at` timestamp NULL DEFAULT NULL,
  `processed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `provider` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `referer_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `round_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `detail` blob DEFAULT NULL,
  `type` enum('balance_withdraw','balance_deposit') COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_transactions` */

insert  into `tbl_transactions`(`id`,`uuid`,`agent_id`,`transaction_id`,`amount`,`before`,`vendor`,`game`,`game_id`,`game_type`,`created_at`,`updated_at`,`action_id`,`is_bonus`,`is_free_game`,`is_jackpot`,`is_promo`,`match_id`,`original_id`,`original_at`,`processed_at`,`provider`,`referer_id`,`round_id`,`state`,`status`,`timestamp`,`detail`,`type`) values 
(1,'eonwlgv9zhj2368',1,NULL,720,720,NULL,NULL,NULL,NULL,'2023-07-03 18:11:08','2023-07-03 18:11:08',NULL,0,0,0,0,NULL,NULL,NULL,'2023-07-03 18:11:08','transfer',NULL,NULL,NULL,NULL,'2023-07-03 18:11:08',NULL,'balance_withdraw'),
(2,'eonwlgv9zhj2368',1,NULL,720,720,NULL,NULL,NULL,NULL,'2023-06-03 18:11:08','2023-07-03 18:11:08',NULL,0,0,0,0,NULL,NULL,NULL,'2023-07-03 18:11:08','transfer',NULL,NULL,NULL,NULL,'2023-07-03 18:11:08',NULL,'balance_withdraw');

/*Table structure for table `tbl_users` */

DROP TABLE IF EXISTS `tbl_users`;

CREATE TABLE `tbl_users` (
  `uuid` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `agent_id` bigint(20) DEFAULT NULL,
  `account` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nickname` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `token` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `balance` bigint(20) DEFAULT 0,
  `login_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `login_ip` varchar(30) COLLATE utf8_unicode_ci DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_users` */

insert  into `tbl_users`(`uuid`,`agent_id`,`account`,`nickname`,`password`,`token`,`balance`,`login_at`,`login_ip`,`created_at`,`updated_at`) values 
('4ulicv645gnxx8l',1,'txttest02','test02','DMdxI0Xb424l0VS','b8ecf6e1d474eb8282f1fde042cdad21e0b919a521844200510b516b234eadf3',200000,'2023-07-01 05:16:36','221.163.82.114','2023-07-01 05:16:05','2023-07-01 05:16:05'),
('eonwlgv9zhj2368',1,'txttest01','test01','DMdxI0Xb424l0VS','b8ecf6e1d474eb8282f1fde042cdad21e0b919a521844200510b516b234eadf4',1000000,'2023-07-09 11:04:29','221.163.82.113','2023-03-13 05:47:41','2023-03-14 18:20:07');

/*Table structure for table `tbl_vendors` */

DROP TABLE IF EXISTS `tbl_vendors`;

CREATE TABLE `tbl_vendors` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `vendor_key` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maintenance` tinyint(4) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `zero_win` tinyint(4) DEFAULT NULL,
  `category` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_vendors` */

insert  into `tbl_vendors`(`id`,`vendor_key`,`name`,`maintenance`,`sort`,`zero_win`,`category`) values 
(1,'evolution_casino','에볼루션 카지노',0,1,1,'casino');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
