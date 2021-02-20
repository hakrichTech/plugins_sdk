CREATE TABLE `hkm_category` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `parentId` BIGINT NULL DEFAULT NULL,
  `title` VARCHAR(75) NOT NULL,
  `metaTitle` VARCHAR(100) NULL DEFAULT NULL,
  `slug` VARCHAR(100) NOT NULL,
  `content` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`id`));

ALTER TABLE `hkm_category` 
ADD INDEX `idx_category_parent` (`parentId` ASC);
ALTER TABLE `hkm_category` 
ADD CONSTRAINT `fk_category_parent`
  FOREIGN KEY (`parentId`)
  REFERENCES `hkm_category` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;