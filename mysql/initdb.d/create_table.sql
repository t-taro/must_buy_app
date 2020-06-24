CREATE TABLE IF NOT EXISTS `must_buy_app_db`.`items`
(
  `id`          INT(20) AUTO_INCREMENT NOT NULL,
  `item_name`   VARCHAR(100) NOT NULL,
  `state`       INT(20) DEFAULT 0,
  `user_id`     INT(20) NOT NULL,
  `created_at`  datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at`  datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
)  DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
CREATE TABLE IF NOT EXISTS `must_buy_app_db`.`users`
(
  `id`            INT(20) AUTO_INCREMENT NOT NULL,
  `user_name`     VARCHAR(100) NOT NULL,
  `email`         VARCHAR(100) NOT NULL UNIQUE,
  `password`      VARCHAR(100) NOT NULL,
  `image`         VARCHAR(100),
  `created_at`    datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at`    datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
)  DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
CREATE TABLE IF NOT EXISTS `must_buy_app_db`.`share`
(
  `id`            INT(20) AUTO_INCREMENT NOT NULL,
  `user_id`       INT(20) NOT NULL,
  `sharing_with`  INT(20) NOT NULL,
  `request_state` INT(20) DEFAULT 0,
  `created_at`    datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at`    datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
)  DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
CREATE TABLE IF NOT EXISTS `must_buy_app_db`.`tags`
(
  `id`          INT(20) AUTO_INCREMENT NOT NULL,
  `shop_name`   VARCHAR(100) NOT NULL,
  `item_id`     INT(20) NOT NULL,
  `created_at`  datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at`  datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
)  DEFAULT CHARSET=utf8 COLLATE=utf8_bin;