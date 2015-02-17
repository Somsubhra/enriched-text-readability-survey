DROP DATABASE IF EXISTS ETRS;

CREATE DATABASE IF NOT EXISTS ETRS;
USE ETRS;

CREATE TABLE IF NOT EXISTS `user` (
  `id` BIGINT AUTO_INCREMENT NOT NULL,
  `name` TEXT NOT NULL,
  `age` INT NOT NULL,
  `gender` TEXT NOT NULL,
  `creation_time` TIMESTAMP NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `passage_set` (
  `id` INT NOT NULL,
  `creation_time` TIMESTAMP NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `user_set` (
  `user_id` BIGINT NOT NULL,
  `set_id` INT NOT NULL,
  `creation_time` TIMESTAMP NOT NULL,
  PRIMARY KEY (`user_id`),
  FOREIGN KEY (`user_id`) REFERENCES user(`id`),
  FOREIGN KEY (`set_id`) REFERENCES passage_set(`id`)
);

CREATE TABLE IF NOT EXISTS `passage` (
  `id` INT NOT NULL,
  `content` TEXT NOT NULL,
  `set_id` INT NOT NULL,
  `creation_time` TIMESTAMP NOT NULL,
  PRIMARY KEY (`id`, `set_id`),
  FOREIGN KEY (`set_id`) REFERENCES passage_set(`id`)
);

CREATE TABLE IF NOT EXISTS `passage_click` (
  `passage_id` INT NOT NULL,
  `set_id` INT NOT NULL,
  `user_id` BIGINT NOT NULL,
  `creation_time` TIMESTAMP NOT NULL,
  FOREIGN KEY (`passage_id`, `set_id`) REFERENCES passage(`id`, `set_id`),
  FOREIGN KEY (`user_id`) REFERENCES user(`id`)
);

CREATE TABLE IF NOT EXISTS `question` (
  `id` INT NOT NULL,
  `content` TEXT NOT NULL,
  `passage_id` INT NOT NULL,
  `set_id` INT NOT NULL,
  `creation_time` TIMESTAMP NOT NULL,
  `res_type` VARCHAR(4) NOT NULL DEFAULT 'mcq',
  PRIMARY KEY (`id`, `passage_id`, `set_id`),
  FOREIGN KEY (`passage_id`, `set_id`) REFERENCES passage(`id`, `set_id`)
);

CREATE TABLE IF NOT EXISTS `choice` (
  `id` INT NOT NULL,
  `content` TEXT NOT NULL,
  `question_id` INT NOT NULL,
  `passage_id` INT NOT NULL,
  `set_id` INT NOT NULL,
  `creation_time` TIMESTAMP NOT NULL,
  PRIMARY KEY (`id`, `question_id`, `passage_id`, `set_id`),
  FOREIGN KEY (`question_id`, `passage_id`, `set_id`) REFERENCES question(`id`, `passage_id`, `set_id`)
);

CREATE TABLE IF NOT EXISTS `response` (
  `question_id` INT NOT NULL,
  `passage_id` INT NOT NULL,
  `set_id` INT NOT NULL,
  `choice_id` INT NOT NULL,
  `user_id` BIGINT NOT NULL,
  `creation_time` TIMESTAMP NOT NULL,
  FOREIGN KEY (`question_id`, `passage_id`, `set_id`, `choice_id`)
  REFERENCES choice(`question_id`, `passage_id`, `set_id`, `id`),
  FOREIGN KEY (`user_id`) REFERENCES user(`id`)
);

CREATE TABLE IF NOT EXISTS `response_text` (
  `question_id` INT NOT NULL,
  `passage_id` INT NOT NULL,
  `set_id` INT NOT NULL,
  `content` TEXT NOT NULL,
  `user_id` BIGINT NOT NULL,
  `creation_time` TIMESTAMP NOT NULL,
  FOREIGN KEY (`question_id`, `passage_id`, `set_id`)
  REFERENCES question(`id`, `passage_id`, `set_id`),
  FOREIGN KEY (`user_id`) REFERENCES user(`id`)
);

CREATE TABLE IF NOT EXISTS `reference` (
  `id` BIGINT AUTO_INCREMENT NOT NULL,
  `content` TEXT NOT NULL,
  `creation_time` TIMESTAMP NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `reference_click` (
  `reference_id` BIGINT NOT NULL,
  `user_id` BIGINT NOT NULL,
  `creation_time` TIMESTAMP NOT NULL,
  FOREIGN KEY (`reference_id`) REFERENCES reference(`id`),
  FOREIGN KEY (`user_id`) REFERENCES user(`id`)
);
