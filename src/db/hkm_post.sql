CREATE TABLE `hkm_post` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `authorId` BIGINT NOT NULL,
  `parentId` BIGINT NULL DEFAULT NULL,
  `title` VARCHAR(75) NOT NULL,
  `metaTitle` VARCHAR(100) NULL,
  `slug` VARCHAR(100) NOT NULL,
  `summary` TINYTEXT NULL,
  `published` TINYINT(1) NOT NULL DEFAULT 0,
  `createdAt` DATETIME NOT NULL,
  `updatedAt` DATETIME NULL DEFAULT NULL,
  `publishedAt` DATETIME NULL DEFAULT NULL,
  `content` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `uq_slug` (`slug` ASC),
  INDEX `idx_post_user` (`authorId` ASC),
  CONSTRAINT `fk_post_user`
    FOREIGN KEY (`authorId`)
    REFERENCES `hkm_users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
ENGINE = InnoDB;

ALTER TABLE `hkm_post` 
ADD INDEX `idx_post_parent` (`parentId` ASC);
ALTER TABLE `hkm_post` 
ADD CONSTRAINT `fk_post_parent`
  FOREIGN KEY (`parentId`)
  REFERENCES `hkm_post` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;