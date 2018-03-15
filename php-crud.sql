SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `users` (
	`user_id` int AUTO_INCREMENT,
	`role_id` int,
	`token` TEXT(512),
	`name` varchar(32),
	`email` varchar(32),
	`password` TEXT(512),
	PRIMARY KEY (`user_id`)
);

CREATE TABLE `roles` (
	`role_id` int NOT NULL AUTO_INCREMENT,
	`name` varchar(32) NOT NULL,
	PRIMARY KEY (`role_id`)
);

CREATE TABLE `posts` (
	`post_id` int NOT NULL AUTO_INCREMENT,
	`user_id` int NOT NULL,
	`img` TEXT(512),
	`title` varchar(128) NOT NULL,
	`body` TEXT(512) NOT NULL,
	PRIMARY KEY (`post_id`)
);

CREATE TABLE `comments` (
	`comment_id` int NOT NULL AUTO_INCREMENT,
	`post_id` int NOT NULL,
	`user_id` int NOT NULL,
	`comment` varchar(512) NOT NULL,
	PRIMARY KEY (`comment_id`)
);

ALTER TABLE `users` ADD CONSTRAINT `users_fk0` FOREIGN KEY (`role_id`) REFERENCES `roles`(`role_id`);

ALTER TABLE `posts` ADD CONSTRAINT `posts_fk0` FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`);

ALTER TABLE `comments` ADD CONSTRAINT `comments_fk0` FOREIGN KEY (`post_id`) REFERENCES `posts`(`post_id`);

ALTER TABLE `comments` ADD CONSTRAINT `comments_fk1` FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`);
