CREATE TABLE `xyz_books` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `price` FLOAT,
  `book_name` TEXT,
  `img` VARCHAR(255),
  `content` TEXT,
  `visible` ENUM('0','1'),
  PRIMARY KEY  (`id`)
);

CREATE TABLE `xyz_authors` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `name` TEXT,
  PRIMARY KEY  (`id`)
);

CREATE TABLE `xyz_genre` (
  `genre_id` INT(10),
  `genre_name` TEXT
);

CREATE TABLE `xyz_book_a` (
  `author_id` INT(10),
  `book_id` INT(10)
);

CREATE TABLE `xyz_book_g` (
  `genre_id` INT(10),
  `book_id` INT(10)
);

CREATE TABLE `xyz_users` (
  `discount` INT(10),
  `user_id` INT(10) NOT NULL AUTO_INCREMENT,
  `password` INT(10),
  `name` INT(10),
  PRIMARY KEY  (`user_id`)
);

CREATE TABLE `xyz_cart` (
  `book_id` INT(10),
  `quantity` INT(10),
  `user_id` INT(10),
  PRIMARY KEY  (`order_id`)
);

CREATE TABLE `xyz_orders` (
  `date` TIMESTAMP,
  `order_id` INT(100) NOT NULL AUTO_INCREMENT,
  `payment_id` TINYINT(10),
  `price` FLOAT,
  `user_id` INT(10),
  `pay_status` ENUM('0','1')
);

CREATE TABLE `xyz_payment` (
  `pay_id` TINYINT(10) NOT NULL AUTO_INCREMENT,
  `date` TIMESTAMP,
  `pay_name` TEXT,
  PRIMARY KEY  (`pay_id`)
);

