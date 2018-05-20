
DROP TABLE IF EXISTS `bono_module_polls_answers`;
CREATE TABLE `bono_module_polls_answers` (
    
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`lang_id` INT NOT NULL,
	`category_id` INT NOT NULL COMMENT 'Associciated category id',
	`title` varchar(50) NOT NULL COMMENT 'Answer title`',
	`order` INT NOT NULL COMMENT 'Sorting order',
	`published` varchar(1) NOT NULL COMMENT 'Boolean value indicated published state',
    `votes` INT NOT NULL COMMENT 'Vote count'
	
) DEFAULT CHARSET=UTF8;

DROP TABLE IF EXISTS `bono_module_polls_web_page_answers`;
CREATE TABLE `bono_module_polls_web_page_answers` (

    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `lang_id` INT NOT NULL,
    `web_page_id` INT NOT NULL COMMENT 'Attached Web Page ID',
    `title` varchar(50) NOT NULL COMMENT 'Answer title',
    `order` INT NOT NULL COMMENT 'Sorting order',
    `published` BOOLEAN NOT NULL COMMENT 'Boolean value indicated published state',
    `votes` INT NOT NULL COMMENT 'Vote count',

    FOREIGN KEY (lang_id) REFERENCES bono_module_cms_languages(id) ON DELETE CASCADE,
    FOREIGN KEY (web_page_id) REFERENCES bono_module_cms_webpages(id) ON DELETE CASCADE

) DEFAULT CHARSET=UTF8 ENGINE = InnoDB;


DROP TABLE IF EXISTS `bono_module_polls_web_page_votes`;
CREATE TABLE `bono_module_polls_web_page_votes` (

    `web_page_id` INT NOT NULL COMMENT 'Attached Web Page ID',
    `user_ip` varchar(30) NOT NULL,

    FOREIGN KEY (web_page_id) REFERENCES bono_module_cms_webpages(id) ON DELETE CASCADE

) DEFAULT CHARSET=UTF8 ENGINE = InnoDB;


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
    `active` varchar(1) NOT NULL,
    `class` varchar(50) NOT NULL
	
) DEFAULT CHARSET = UTF8;
