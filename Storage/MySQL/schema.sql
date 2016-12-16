
DROP TABLE IF EXISTS `bono_module_polls_answers`;
CREATE TABLE `bono_module_polls_answers` (
    
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`lang_id` INT NOT NULL,
	`category_id` INT NOT NULL COMMENT 'Associciated category id',
	`title` varchar(50) NOT NULL COMMENT 'Answer title`',
	`order` INT NOT NULL COMMENT 'Sorting order',
    `votes` INT NOT NULL COMMENT 'Vote count'
	
) DEFAULT CHARSET=UTF8;


DROP TABLE IF EXISTS `bono_module_polls_votes`;
CREATE TABLE `bono_module_polls_votes` (

    `category_id` INT NOT NULL,
    `user_ip` varchar(30) NOT NULL

) DEFAULT CHARSET=UTF8;


DROP TABLE IF EXISTS `bono_module_polls_categories`;
CREATE TABLE `bono_module_polls_categories` (

	`id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`lang_id` INT NOT NULL,
	`name` varchar(254) NOT NULL,
    `class` varchar(50) NOT NULL
	
) DEFAULT CHARSET = UTF8;
