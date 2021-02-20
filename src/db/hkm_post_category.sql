CREATE TABLE `hkm_post_category` (
  `postId` BIGINT NOT NULL,
  `categoryId` BIGINT NOT NULL,
  PRIMARY KEY (`postId`, `categoryId`),
  INDEX `idx_pc_category` (`categoryId` ASC),
  INDEX `idx_pc_post` (`postId` ASC),
  CONSTRAINT `fk_pc_post`
    FOREIGN KEY (`postId`)
    REFERENCES `hkm_post` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pc_category`
    FOREIGN KEY (`categoryId`)
    REFERENCES `hkm_category` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);