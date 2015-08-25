ALTER TABLE  `catalog` CHANGE  `memo`  `memo` LONGTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT  '栏目描述';
ALTER TABLE  `archive` CHANGE  `memo`  `memo` LONGTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT  '正文';
ALTER TABLE  `department` ADD  `memo` LONGTEXT NOT NULL COMMENT  '部门简介';
