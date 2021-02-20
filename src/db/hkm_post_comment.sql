CREATE TABLE `hkm_post_comment` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `postId` BIGINT NOT NULL,
  `parentId` BIGINT NULL DEFAULT NULL,
  `title` VARCHAR(100) NOT NULL,
  `published` TINYINT(1) NOT NULL DEFAULT 0,
  `createdAt` DATETIME NOT NULL,
  `publishedAt` DATETIME NULL DEFAULT NULL,
  `content` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `idx_comment_post` (`postId` ASC),
  CONSTRAINT `fk_comment_post`
    FOREIGN KEY (`postId`)
    REFERENCES `hkm_post` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

ALTER TABLE `hkm_post_comment` 
ADD INDEX `idx_comment_parent` (`parentId` ASC);
ALTER TABLE `hkm_post_comment` 
ADD CONSTRAINT `fk_comment_parent`
  FOREIGN KEY (`parentId`)
  REFERENCES `hkm_post_comment` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;