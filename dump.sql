
CREATE TABLE `musics` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `artists` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `music_artist_relation` (
     `id` INT NOT NULL AUTO_INCREMENT,
	`music_id` INT NOT NULL,
	`artist_id` INT NOT NULL
);

