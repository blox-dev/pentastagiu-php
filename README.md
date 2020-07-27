# pentastagiu-php
# Calin Crainiciuc
## Creare si populare tabele tema 2

```
DROP TABLE `books`;
DROP TABLE `authors`;
DROP TABLE `publishers`;


CREATE TABLE `books` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `title` varchar(100) NOT NULL,
 `author_id` int(11) NOT NULL,
 `publisher_id` int(11) NOT NULL,
 `publish_year` int(11) NOT NULL,
 `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
 `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
 PRIMARY KEY (`id`),
 KEY `fk_author` (`author_id`),
 KEY `fk_publisher` (`publisher_id`),
 CONSTRAINT `fk_author` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`),
 CONSTRAINT `fk_publisher` FOREIGN KEY (`publisher_id`) REFERENCES `publishers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1

CREATE TABLE `authors` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(100) NOT NULL,
 `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
 `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1

CREATE TABLE `publishers` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(100) NOT NULL,
 `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
 `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1
```

```
INSERT INTO `authors`(`id`, `name`, `created_at`, `updated_at`) VALUES (null,'Eminescu',now(),now());

INSERT INTO `authors`(`id`, `name`, `created_at`, `updated_at`) VALUES (null,'Creanga',now(),now());

INSERT INTO `authors`(`id`, `name`, `created_at`, `updated_at`) VALUES (null,'Sadoveanu',now(),now());

INSERT INTO `publishers`(`id`, `name`, `created_at`, `updated_at`) VALUES (null,'Humanitas',now(),now());

INSERT INTO `publishers`(`id`, `name`, `created_at`, `updated_at`) VALUES (null,'Nemira',now(),now());

INSERT INTO `publishers`(`id`, `name`, `created_at`, `updated_at`) VALUES (null,'Dacia Literara',now(),now());
```

