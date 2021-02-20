CREATE TABLE `hkm_post_meta` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `postId` BIGINT NOT NULL,
  `key` VARCHAR(50) NOT NULL,
  `content` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `idx_meta_post` (`postId` ASC),
  UNIQUE INDEX `uq_post_meta` (`postId` ASC, `key` ASC),
  CONSTRAINT `fk_meta_post`
    FOREIGN KEY (`postId`)
    REFERENCES `hkm_post` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;