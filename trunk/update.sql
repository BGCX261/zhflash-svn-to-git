ALTER TABLE  `catalog` CHANGE  `memo`  `memo` LONGTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT  '��Ŀ����';
ALTER TABLE  `archive` CHANGE  `memo`  `memo` LONGTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT  '����';
ALTER TABLE  `department` ADD  `memo` LONGTEXT NOT NULL COMMENT  '���ż��';
