
DROP TABLE IF EXISTS `bono_module_polls_answers`;
CREATE TABLE `bono_module_polls_answers` (
	
	`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`lang_id` INT NOT NULL,
	`category_id` INT NOT NULL,
	`title` varchar(50) NOT NULL,
	`order` INT NOT NULL,
	`published` varchar(1) NOT NULL
	
) DEFAULT CHARSET=UTF8;


DROP TABLE IF EXISTS `bono_module_polls_categories`;
CREATE TABLE `bono_module_polls_categories` (

	`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`lang_id` INT NOT NULL,
	`name` varchar(254) NOT NULL,
    `class` varchar(50) NOT NULL
	
) DEFAULT CHARSET = UTF8;
