CREATE TABLE `hkm_post_tag` (
  `postId` BIGINT NOT NULL,
  `tagId` BIGINT NOT NULL,
  PRIMARY KEY (`postId`, `tagId`),
  INDEX `idx_pc_tag` (`tagId` ASC),
  INDEX `idx_pc_post` (`postId` ASC),
  CONSTRAINT `fk_pc_post`
    FOREIGN KEY (`postId`)
    REFERENCES `hkm_post` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pc_tag`
    FOREIGN KEY (`tagId`)
    REFERENCES `hkm_tag` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);