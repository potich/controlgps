CREATE TABLE `server_video` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`server_id` INT NOT NULL DEFAULT '0',
	`video_id` INT NOT NULL DEFAULT '0',
	PRIMARY KEY (`id`),
	CONSTRAINT `FKVideoServerId` FOREIGN KEY (`server_id`) REFERENCES `server` (`id`),
	CONSTRAINT `FKVideoVideoId` FOREIGN KEY (`video_id`) REFERENCES `video` (`id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;

SET GLOBAL FOREIGN_KEY_CHECKS=0;
ALTER TABLE `video`
	DROP COLUMN `server_id`,
	DROP FOREIGN KEY `FKServerVideoId_ServerId`;
SET GLOBAL FOREIGN_KEY_CHECKS=1;
