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
(1, 'Тестовая', NULL),
(2, 'Ноутбуки и планшеты', NULL),
	(11, 'Ноутбуки и аксессуары', 2),
		(14, 'Ноутбуки', 11), -- end
		(15, 'Комплектующие для ноутбуков', 11),
			(17, 'Внутренние приводы для ноутбуков', 15), -- end
			(18, 'Салазки к HDD для ноутбуков', 15), -- end
			(19, 'SSD накопители', 15), -- end
			(20, 'Жесткие диски мобильные', 15), -- end
			(21, 'Внешние оптические приводы', 15), -- end
		(16, 'Аксессуары для ноутбуков', 11),
			(22, 'Подставки для ноутбуков', 16), -- end
			(23, 'Сумки для ноутбуков', 16), -- end
			(24, 'Рюкзаки для ноутбуков', 16), -- end
			(25, 'Чехлы для ноутбуков', 16), -- end
			(26, 'Блоки питания для ноутбуков', 16), -- end
			(27, 'Док станции для ноутбуков', 16), -- end
	(12, 'Планшеты, электронные книги и аксессуары', 2),
	(13, 'Запчасти и ПО для ноутбуков и планшетов', 2),
(3, 'Компьютеры и переферия', NULL),
	(28, 'Компьютерные системы', 3),
		(31, 'Системные блоки', 28), -- end
		(32, 'Моноблоки', 28), -- end
		(33, 'Неттопы и компьютеры-флешки', 28), -- end
		(34, 'Платформы', 28), -- end
		(35, 'Серверы', 28), -- end
		(36, 'Микрокомпьютеры', 28), -- end
		(37, 'Аксессуары', 28), -- end
	(29, 'Периферия', 3),
		(38, 'Мониторы', 29), -- end
		(39, 'Клавиатуры', 29), -- end
		(40, 'Мыши', 29), -- end
		(41, 'Коврики для мыши', 29), -- end
		(42, 'Графические планшеты', 29), -- end
		(43, 'Внешние накопители данных', 29), -- end
		(44, 'Веб-камеры', 29), -- end
		(45, 'USB-разветвители', 29), -- end
	(30, 'ПО и аксессуары', 3),
(4, 'Комплектующие для компьютеров', NULL),
	(46, 'Основные комплектущие', 4),
		(49, 'Материнские платы', 46),  -- end
		(50, 'Процессоры', 46), -- end
		(51, 'Видеокарты', 46), -- end
		(52, 'Оперативная память', 46), -- end
		(53, 'Блоки питания', 46), -- end
		(54, 'Корпуса', 46), -- end
	(47, 'Хранение данных и охлаждение', 4),
		(55, 'Охлаждение компьютера', 47),
			(59, 'Термоинтерфейсы', 55), -- end
			(60, 'Кулеры для процессоров', 55), -- end
			(61, 'Вентиляторы и корпуса', 55), -- end
			(62, 'Жидкостные системы охлаждения', 55), -- end
			(63, 'Компоненты СВО', 55), -- end
		(56, 'Жесткие диски', 47), -- end
		(57, 'SSD-накопители', 47), -- end
		(58, 'Аксессуары для накопителей', 47),
			(64, 'Внешние боксы для накопителей', 58), -- end
			(65, 'Док-станции для накопителей', 58), -- end
			(66, 'Салазки для накопителей', 58), -- end
	(48, 'Устройства расширения и апгрейд', 4),
		(67, 'Оптические приводы', 48), -- end
		(68, 'Звуковые карты', 48), -- end
		(69, 'Платы видеозахвата', 48), -- end
		(70, 'Контроллеры', 48), -- end
		(71, 'Моддинг', 48), -- end
(5, 'Смарфоны', NULL),
(6, 'Телевизоры и медиа', NULL),
(7, 'Игры и приставки', NULL),
(8, 'Аудиотехника', NULL),
(9, 'Фото- и видеоаппаратура', NULL),
(10, 'Бытовая техника', NULL);

INSERT INTO `smt_db`.`categories` VALUES 
(1 , 'Ноутбуки', NULL),
(2 , 'Смартфоны', NULL),
(3 , 'Телефоны', NULL),
(4 , 'Планшеты', NULL),
(5 , 'Телевизоры', NULL),
(6 , 'Игровые приставки', NULL),
(7 , 'Пылесосы', NULL),
(8 , 'Холодильники', NULL),
(9 , 'Стиральные машины', NULL),
(10, 'Микроволновые печи', NULL);

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
('15.6" Ноутбук ASUS VivoBook X540MA-DM298 черный', 'ASUS Laptop X540MA – это ноутбук для ежедневного использования как дома, так и в офисе. Его мощная аппаратная конфигурация, в которую входит процессор Intel обеспечит стабильную скорость работы для решения повседневных задач.', 14, 4, 16999),
('15.6" Ноутбук Acer Aspire 3 A315-33-C9B2 черный', 14, 17999),
('15.6" Ноутбук Asus VivoBook D540MA-GQ251T черный', 14, 20999),
('Материнская плата GIGABYTE GA-E3000N', 49, 2650),
('Материнская плата MSI A68HM-P33 V2', 49, 2650),
('Корпус Zalman T2 PLUS черный', 54, 1999),
('Клавиатура Defender HM-830 RU', 39, 420),
('18.5" Монитор HP V197 [V5J61AA]', 38, 6199);

INSERT INTO `smt_db`.`images` (`id_product`, `image_path`) VALUES
(1, 'img/prod1.jpg'),
(2, 'img/prod2.jpg'),
(3, 'img/prod3.jpg'),	
(4, 'img/prod4.jpg'),
(5, 'img/prod5.jpg'),
(6, 'img/prod6.jpg'),
(7, 'img/prod7.jpg');