-- Creation of the database
DROP DATABASE IF EXISTS proyect;
CREATE DATABASE IF NOT EXISTS proyect;

-- Next lines are executed in this database
USE proyect;

-- Drops
DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `words`;
-- Create a table of users
CREATE TABLE IF NOT EXISTS `users` (
	`uid` INT(11) NOT NULL,
	`user` VARCHAR(128) NOT NULL,
	`first` VARCHAR(128) NOT NULL,
	`last` VARCHAR(128) NOT NULL,
	`pass` VARCHAR(1000) NOT NULL,
	`email` VARCHAR(128) NOT NULL,
	`type` ENUM('none', 'planta', 'maestria', 'ocacional') NOT NULL DEFAULT 'none',
	`avatar` BLOB DEFAULT NULL
) ENGINE=INNODB;
CREATE TABLE IF NOT EXISTS `words` (
	`uid` INT(11) NOT NULL,
	`word` VARCHAR(128) NOT NULL,
	`word2` VARCHAR(128) NOT NULL
) ENGINE=INNODB;
-- Alter
ALTER TABLE `users`
MODIFY COLUMN `uid` INT(11) NOT NULL  AUTO_INCREMENT PRIMARY KEY;
ALTER TABLE `words`
MODIFY COLUMN `uid` INT(11) NOT NULL  AUTO_INCREMENT PRIMARY KEY;

INSERT INTO `users` (user,first,last,pass,email,type) VALUES 
("SEG898","Sebastian","Garnica Quiroz","111asdASD","a@a.a",3),
("PED1887","Pedro","Dammy Dan","222asdASD","a@a.a",4),
("user3","first3","last3","333asdASD","a@a.a",2),
("user4","first4","last4","444asdASD","a@a.a",2);
INSERT INTO `words` (word,word2) VALUES
("palabra","palabra2"),
("1palabra","1palabra2"),
("2palabra","2palabra2"),
("3palabra","3palabra2"),
("4palabra","4palabra2");

SELECT uid,user,first,last,pass,email,type FROM users;
SELECT * from words;