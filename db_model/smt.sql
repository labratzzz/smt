DROP DATABASE IF EXISTS `smt_db`;
CREATE DATABASE IF NOT EXISTS `smt_db`
	DEFAULT CHARSET = utf8mb4
	DEFAULT COLLATE = utf8mb4_unicode_ci;

USE `smt_db`;

DROP TABLE IF EXISTS `smt_db`.`pages`;
CREATE TABLE IF NOT EXISTS 	`smt_db`.`pages` (
	page_id INT(11) NOT NULL AUTO_INCREMENT,
	page_alias VARCHAR(255) NULL,
	page_title VARCHAR(255) NOT NULL,
	page_meta_d VARCHAR(255) NULL,
	page_meta_k VARCHAR(255) NULL,
	PRIMARY KEY (`page_id`)
);

DROP TABLE IF EXISTS `smt_db`.`categories`;
CREATE TABLE IF NOT EXISTS 	`smt_db`.`categories` (
	`id` 						INT NOT NULL AUTO_INCREMENT,
	`name` 						VARCHAR(255) NULL,
	`id_parent`					INT NULL,
	PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `smt_db`.`manufacterers`;
CREATE TABLE IF NOT EXISTS 	`smt_db`.`manufacterers` (
	`id` 						INT NOT NULL AUTO_INCREMENT,
	`name` 						VARCHAR(255) NULL,
	PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `smt_db`.`products`;
CREATE TABLE IF NOT EXISTS 	`smt_db`.`products` (
	`id` 						INT NOT NULL AUTO_INCREMENT,
	`name` 						VARCHAR(255) NOT NULL,
	`description`				TEXT NULL,
	`rating`					DOUBLE DEFAULT 0,
	`id_category`				INT NOT NULL,
	`id_manufacterer`			INT NULL,
	`price`						DOUBLE NOT NULL,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`id_category`) REFERENCES `smt_db`.`categories` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	FOREIGN KEY (`id_manufacterer`) REFERENCES `smt_db`.`manufacterers` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
);

DROP TABLE IF EXISTS `smt_db`.`comments`;
CREATE TABLE IF NOT EXISTS 	`smt_db`.`comments` (
	`id` 						INT NOT NULL AUTO_INCREMENT,
	`id_product` 				INT NOT NULL,
	`text` 						TEXT NOT NULL,
	`rating`					INT NOT NULL DEFAULT 5,
	`publish`					DATETIME NOT NULL,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`id_product`) REFERENCES `smt_db`.`products` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
);

DROP TABLE IF EXISTS `smt_db`.`images`;
CREATE TABLE IF NOT EXISTS 	`smt_db`.`images` (
	`id` 						INT NOT NULL AUTO_INCREMENT,
	`id_product` 				INT NOT NULL,
	`image_path` 				VARCHAR(255) NOT NULL DEFAULT 'img/products_default.jpg',
	PRIMARY KEY (`id`),
	FOREIGN KEY (`id_product`) REFERENCES `smt_db`.`products` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
);

DROP TABLE IF EXISTS `smt_db`.`users`;
CREATE TABLE IF NOT EXISTS 	`smt_db`.`users` (
	`id` 						INT NOT NULL AUTO_INCREMENT,
	`firstname`					VARCHAR(255) NOT NULL,
	`lastname`					VARCHAR(255) NOT NULL,
	`sex`						INT NOT NULL DEFAULT 1,
	`birthday`					DATE NULL,
	`email`						VARCHAR(255) NOT NULL UNIQUE KEY,
	`password`					VARCHAR(255)  NOT NULL,
	CONSTRAINT PK_users PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `smt_db`.`cart`;
CREATE TABLE IF NOT EXISTS 	`smt_db`.`cart` (
	`id_user`					INT NOT NULL,
	`id_product`				INT NOT NULL,
	`count`						INT NOT NULL,
	CONSTRAINT PK_cart PRIMARY KEY (`id_user`, `id_product`),
	FOREIGN KEY (`id_user`) REFERENCES `smt_db`.`users` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	FOREIGN KEY (`id_product`) REFERENCES `smt_db`.`products` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
);

INSERT INTO `smt_db`.`categories` VALUES 
(1, '????????????????', NULL),
(2, '???????????????? ?? ????????????????', NULL),
	(11, '???????????????? ?? ????????????????????', 2),
		(14, '????????????????', 11), -- end
		(15, '?????????????????????????? ?????? ??????????????????', 11),
			(17, '???????????????????? ?????????????? ?????? ??????????????????', 15), -- end
			(18, '?????????????? ?? HDD ?????? ??????????????????', 15), -- end
			(19, 'SSD ????????????????????', 15), -- end
			(20, '?????????????? ?????????? ??????????????????', 15), -- end
			(21, '?????????????? ???????????????????? ??????????????', 15), -- end
		(16, '???????????????????? ?????? ??????????????????', 11),
			(22, '?????????????????? ?????? ??????????????????', 16), -- end
			(23, '?????????? ?????? ??????????????????', 16), -- end
			(24, '?????????????? ?????? ??????????????????', 16), -- end
			(25, '?????????? ?????? ??????????????????', 16), -- end
			(26, '?????????? ?????????????? ?????? ??????????????????', 16), -- end
			(27, '?????? ?????????????? ?????? ??????????????????', 16), -- end
	(12, '????????????????, ?????????????????????? ?????????? ?? ????????????????????', 2),
	(13, '???????????????? ?? ???? ?????? ?????????????????? ?? ??????????????????', 2),
(3, '???????????????????? ?? ??????????????????', NULL),
	(28, '???????????????????????? ??????????????', 3),
		(31, '?????????????????? ??????????', 28), -- end
		(32, '??????????????????', 28), -- end
		(33, '?????????????? ?? ????????????????????-????????????', 28), -- end
		(34, '??????????????????', 28), -- end
		(35, '??????????????', 28), -- end
		(36, '??????????????????????????????', 28), -- end
		(37, '????????????????????', 28), -- end
	(29, '??????????????????', 3),
		(38, '????????????????', 29), -- end
		(39, '????????????????????', 29), -- end
		(40, '????????', 29), -- end
		(41, '?????????????? ?????? ????????', 29), -- end
		(42, '?????????????????????? ????????????????', 29), -- end
		(43, '?????????????? ???????????????????? ????????????', 29), -- end
		(44, '??????-????????????', 29), -- end
		(45, 'USB-????????????????????????', 29), -- end
	(30, '???? ?? ????????????????????', 3),
(4, '?????????????????????????? ?????? ??????????????????????', NULL),
	(46, '???????????????? ????????????????????????', 4),
		(49, '?????????????????????? ??????????', 46),  -- end
		(50, '????????????????????', 46), -- end
		(51, '????????????????????', 46), -- end
		(52, '?????????????????????? ????????????', 46), -- end
		(53, '?????????? ??????????????', 46), -- end
		(54, '??????????????', 46), -- end
	(47, '???????????????? ???????????? ?? ????????????????????', 4),
		(55, '???????????????????? ????????????????????', 47),
			(59, '??????????????????????????????', 55), -- end
			(60, '???????????? ?????? ??????????????????????', 55), -- end
			(61, '?????????????????????? ?? ??????????????', 55), -- end
			(62, '???????????????????? ?????????????? ????????????????????', 55), -- end
			(63, '???????????????????? ??????', 55), -- end
		(56, '?????????????? ??????????', 47), -- end
		(57, 'SSD-????????????????????', 47), -- end
		(58, '???????????????????? ?????? ??????????????????????', 47),
			(64, '?????????????? ?????????? ?????? ??????????????????????', 58), -- end
			(65, '??????-?????????????? ?????? ??????????????????????', 58), -- end
			(66, '?????????????? ?????? ??????????????????????', 58), -- end
	(48, '???????????????????? ???????????????????? ?? ??????????????', 4),
		(67, '???????????????????? ??????????????', 48), -- end
		(68, '???????????????? ??????????', 48), -- end
		(69, '?????????? ????????????????????????', 48), -- end
		(70, '??????????????????????', 48), -- end
		(71, '??????????????', 48), -- end
(5, '????????????????', NULL),
(6, '???????????????????? ?? ??????????', NULL),
(7, '???????? ?? ??????????????????', NULL),
(8, '????????????????????????', NULL),
(9, '????????- ?? ??????????????????????????????', NULL),
(10, '?????????????? ??????????????', NULL);

INSERT INTO `smt_db`.`categories` VALUES 
(1 , '????????????????', NULL),
(2 , '??????????????????', NULL),
(3 , '????????????????', NULL),
(4 , '????????????????', NULL),
(5 , '????????????????????', NULL),
(6 , '?????????????? ??????????????????', NULL),
(7 , '????????????????', NULL),
(8 , '????????????????????????', NULL),
(9 , '???????????????????? ????????????', NULL),
(10, '?????????????????????????? ????????', NULL);

INSERT INTO `smt_db`.`manufacterers` (`name`) VALUES
('Apple'),
('Samsung'),
('Acer'),
('ASUS'),
('HP'),
('Huawei'),
('Toshiba'),
('Xiaomi'),
('Lenovo'),
('Miezu'),
('LG'),
('NOKIA'),
('Sony'),
('Philips'),
('Dell'),
('MSI');


INSERT INTO `smt_db`.`products` 
(`name`, `description`, `id_category`, `id_manufacterer` `price`) VALUES
('15.6" ?????????????? ASUS VivoBook X540MA-DM298 ????????????', 'ASUS Laptop X540MA ??? ?????? ?????????????? ?????? ?????????????????????? ?????????????????????????? ?????? ????????, ?????? ?? ?? ??????????. ?????? ???????????? ???????????????????? ????????????????????????, ?? ?????????????? ???????????? ?????????????????? Intel ?????????????????? ???????????????????? ???????????????? ???????????? ?????? ?????????????? ???????????????????????? ??????????.', 14, 4, 16999),
('15.6" ?????????????? Acer Aspire 3 A315-33-C9B2 ????????????', 14, 17999),
('15.6" ?????????????? Asus VivoBook D540MA-GQ251T ????????????', 14, 20999),
('?????????????????????? ?????????? GIGABYTE GA-E3000N', 49, 2650),
('?????????????????????? ?????????? MSI A68HM-P33 V2', 49, 2650),
('???????????? Zalman T2 PLUS ????????????', 54, 1999),
('???????????????????? Defender HM-830 RU', 39, 420),
('18.5" ?????????????? HP V197 [V5J61AA]', 38, 6199);

INSERT INTO `smt_db`.`images` (`id_product`, `image_path`) VALUES
(1, 'img/prod1.jpg'),
(2, 'img/prod2.jpg'),
(3, 'img/prod3.jpg'),	
(4, 'img/prod4.jpg'),
(5, 'img/prod5.jpg'),
(6, 'img/prod6.jpg'),
(7, 'img/prod7.jpg');