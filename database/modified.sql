/*dummy values inserted on 07-05-2013*/
INSERT INTO `test_scheduler`.`validate_users` (`id`, `username`, `password`, `user_type`, `terms_conditions`, `status`, `session_id`, `created_on`, `updated_on`, `created_by`, `updated_by`) VALUES (NULL, 'parveen', 'parveen', '1', '1', '0', '1234', CURRENT_TIMESTAMP, '0000-00-00 00:00:00', NULL, NULL), (NULL, 'jasleen', 'jasleen', '1', '1', '0', '12345', CURRENT_TIMESTAMP, '0000-00-00 00:00:00', NULL, NULL),(NULL, 'nancy', 'nancy', '0', '0', '0', '12345', CURRENT_TIMESTAMP, '0000-00-00 00:00:00', NULL, NULL),(NULL, 'saurabh', 'saurabh', '1', '0', '1', '12345', CURRENT_TIMESTAMP, '0000-00-00 00:00:00', NULL, NULL),(NULL, 'gourav', 'gourav', '0', '1', '1', '12345', CURRENT_TIMESTAMP, '0000-00-00 00:00:00', NULL, NULL);


/* Table Descriptions on 07-05-2013*/
ALTER TABLE  `category` COMMENT =  'for storing category of the questions';
ALTER TABLE  `certificate` COMMENT =  'for issuing certificates';
ALTER TABLE  `master` COMMENT =  'for constant column types and column values';
ALTER TABLE  `question` COMMENT =  'for storing questions';
ALTER TABLE  `question_options` COMMENT =  'for storing options and answers of the questions';
ALTER TABLE  `test` COMMENT =  'for storing test details';
ALTER TABLE  `test_category` COMMENT =  'for storing link between test and category of questions';
ALTER TABLE  `test_link` COMMENT =  'for storing link and other details of the test';
ALTER TABLE  `test_taker` COMMENT =  'for storing details of test_taker';
ALTER TABLE  `test_taker_ques` COMMENT =  'for storing questions attempted and answers given by test taker';
ALTER TABLE  `user_profile` COMMENT =  'for storing details of the registered user'; 
ALTER TABLE  `validate_users` COMMENT =  'for validating username and password';


/*Altering session_id in validate_users on 07-05-2013*/
 ALTER TABLE  `validate_users` modify  `session_id` VARCHAR( 30 ) DEFAULT '0' COMMENT  'this field will be used to store session id';


/*For modifying tinyint to enum in test_link table on 07-05-2013*/
ALTER TABLE  `test_link` modify `random` enum ('0','1') NOT NULL DEFAULT  '0';
ALTER TABLE  `test_link` modify `feedback` enum ('0','1') NOT NULL DEFAULT  '0';
ALTER TABLE  `test_link` modify `score` enum ('0','1') NOT NULL DEFAULT  '0';
ALTER TABLE  `test_link` modify `email_results` enum ('0','1') NOT NULL DEFAULT  '0';
ALTER TABLE  `test_link` modify `collect_firstname` enum ('0','1') NOT NULL DEFAULT  '0';
ALTER TABLE  `test_link` modify `collect_lastname` enum ('0','1') NOT NULL DEFAULT  '0';
ALTER TABLE  `test_link` modify `collect_email_enroll` enum ('0','1') NOT NULL DEFAULT  '0';
ALTER TABLE  `test_link` modify `test_avail_opt1` enum ('0','1') NOT NULL DEFAULT  '0';
ALTER TABLE  `test_link` modify `test_avail_opt2` enum ('0','1') NOT NULL DEFAULT  '0';
ALTER TABLE  `test_link` modify `display_result_id` enum ('0','1') NOT NULL DEFAULT  '0';
ALTER TABLE  `test_link` modify `certificate` enum ('0','1') NOT NULL DEFAULT  '0';
ALTER TABLE  `test_link` modify `select_answer` enum ('0','1') NOT NULL DEFAULT  '0';
ALTER TABLE `question_options` CHANGE `correct` `correct` ENUM( '0', '1' ) NOT NULL DEFAULT '0' COMMENT '''0'' for incorrect and ''1'' for correct';


/* For removing feedback from question and adding feedback to test_taker_ques on 07-05-2013*/
alter table `question` drop column `feedback`;
alter table `test_taker_ques` add `feedback` varchar(100);


/*Dropped unrequired fields from user_profile on 07-05-2013*/
alter table `user_profile` drop column `date_of_birth`;
alter table `user_profile` drop column `phone`;
alter table `user_profile` drop column `address`;
alter table `user_profile` drop foreign key user_profile_ibfk_3;
alter table `user_profile` drop column `gender_id`;


/*Adding status fields to multiple tables on 07-05-2013*/
alter table test add status enum('0','1','2') default '0' comment "0 for active, 1 for deleted, 2 for inactive";
alter table question  add status enum('0','1','2') default '0' comment "0 for active, 1 for deleted, 2 for inactive";
alter table test_link  add status enum('0','1') default '0' comment "0 for active, 1 for deleted";
alter table question_options  add status enum('0','1') default '0' comment "0 for active, 1 for deleted";

/*Adding ip_address field to user_profile table on 07-05-2013*/
alter table user_profile add ip_address varchar(40);

/*Altering user_type in validate_users on 07-05-2013*/
alter table validate_users modify `user_type` enum('0','1') DEFAULT '1' NOT NULL COMMENT '0 is for admin & 1 is for user';

/*Altering the collations on 08-05-2013*/

ALTER TABLE `category` CHANGE `name` `name` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;
ALTER TABLE `question` CHANGE `status` `status` ENUM( '0', '1', '2' ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0' COMMENT '0 for active, 1 for deleted, 2 for inactive';
ALTER TABLE `question_options` CHANGE `option` `option` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
CHANGE `status` `status` ENUM( '0', '1' ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0' COMMENT '0 for active, 1 for deleted';
ALTER TABLE `test` CHANGE `name` `name` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
CHANGE `status` `status` ENUM( '0', '1', '2' ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0' COMMENT '0 for active, 1 for deleted, 2 for inactive';
ALTER TABLE `test_link` CHANGE `link` `link` VARCHAR(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, CHANGE `random` `random` ENUM('0','1') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0', CHANGE `feedback` `feedback` ENUM('0','1') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0', CHANGE `score` `score` ENUM('0','1') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0', CHANGE `email_results` `email_results` ENUM('0','1') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0', CHANGE `collect_firstname` `collect_firstname` ENUM('0','1') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0', CHANGE `collect_lastname` `collect_lastname` ENUM('0','1') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0', CHANGE `collect_email_enroll` `collect_email_enroll` ENUM('0','1') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0', CHANGE `test_avail_opt1` `test_avail_opt1` ENUM('0','1') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0', CHANGE `test_avail_opt2` `test_avail_opt2` ENUM('0','1') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0', CHANGE `display_result_id` `display_result_id` ENUM('0','1') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0', CHANGE `certificate` `certificate` ENUM('0','1') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0', CHANGE `select_answer` `select_answer` ENUM('0','1') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0', CHANGE `status` `status` ENUM('0','1') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0' COMMENT '0 for active, 1 for deleted';
ALTER TABLE `test_taker` CHANGE `email_enroll_no` `email_enroll_no` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;
ALTER TABLE `test_taker_ques` CHANGE `answer_given` `answer_given` VARCHAR( 150 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
CHANGE `feedback` `feedback` VARCHAR( 100 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ;
ALTER TABLE `question` CHANGE `question` `question` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'question asked by the person';
ALTER TABLE `question_options` CHANGE `correct` `correct` ENUM( '0', '1' ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '''0'' for incorrect and ''1'' for correct';

/*Inserting dummy data into various tables on 08-05-2013 */

INSERT INTO `category` ( `id` , `name` , `created_on` , `updated_on` , `created_by` , `updated_by` )
VALUES (
NULL , 'PHP',
CURRENT_TIMESTAMP , '0000-00-00 00:00:00', '1', '1'
);

INSERT INTO `question` ( `id` , `question` , `ques_type_id` , `category_id` , `created_by` , `created_on` , `updated_on` , `updated_by` , `status` )
VALUES (
NULL , 'what is the full form of PHP?', '5', '1', '1',
CURRENT_TIMESTAMP , '0000-00-00 00:00:00', '1', '0'
);

INSERT INTO `question_options` ( `id` , `ques_id` , `option` , `correct` , `created_on` , `updated_on` , `created_by` , `updated_by` , `status` )
VALUES (
NULL , '1', 'Personal Home Page', '1',
CURRENT_TIMESTAMP , '0000-00-00 00:00:00', '1', '1', '0'
);

INSERT INTO `question_options` ( `id` , `ques_id` , `option` , `correct` , `created_on` , `updated_on` , `created_by` , `updated_by` , `status` )
VALUES (
NULL , '1', 'PHP page', '0',
CURRENT_TIMESTAMP , '0000-00-00 00:00:00', '1', '1', '0'
);

INSERT INTO `user_profile` ( `id` , `user_id` , `first_name` , `last_name` , `email` , `type_of_org_id` , `created_on` , `updated_on` , `created_by` , `updated_by` , `ip_address` )
VALUES (
NULL , '1', 'Parveen', 'Badoni', 'parveen.badoni@osscube.com', '4',
CURRENT_TIMESTAMP , '0000-00-00 00:00:00', '1', NULL , NULL
);

INSERT INTO `user_profile` ( `id` , `user_id` , `first_name` , `last_name` , `email` , `type_of_org_id` , `created_on` , `updated_on` , `created_by` , `updated_by` , `ip_address` )
VALUES (
NULL , '2', 'Jasleen', 'Kaur', 'jasleen.kaur@osscube.com', '4',
CURRENT_TIMESTAMP , '0000-00-00 00:00:00', '2', NULL , NULL
);

INSERT INTO `category` ( `id` , `name` , `created_on` , `updated_on` , `created_by` , `updated_by` )
VALUES (
NULL , 'MySql',
CURRENT_TIMESTAMP , '0000-00-00 00:00:00', '2', NULL
);

INSERT INTO `test` ( `id` , `name` , `total_ques` , `created_on` , `updated_on` , `created_by` , `updated_by` , `status` )
VALUES (
NULL , 'Test1', '10',
CURRENT_TIMESTAMP , '0000-00-00 00:00:00', '2', NULL , '0'
);

INSERT INTO `test_category` ( `id` , `test_id` , `cat_id` , `no_of_ques` , `created_on` , `updated_on` , `created_by` , `updated_by` )
VALUES (
NULL , '1', '1', '6',
CURRENT_TIMESTAMP , '0000-00-00 00:00:00', '2', NULL
), (
NULL , '1', '2', '4',
CURRENT_TIMESTAMP , '0000-00-00 00:00:00', '2', NULL
);

INSERT INTO `master` ( `id` , `code_type` , `code_value` )
VALUES (
NULL , 'certificate', 'MySql certificate'
), (
NULL , 'certificate', 'certificate for 1st ranker'
);

/*altering certificate table on 08-05-2013*/
ALTER TABLE `certificate` ADD `certificate_id` INT NOT NULL AFTER `id` ;

/*altering test_link table on 08-05-2013*/

ALTER TABLE `test_link` CHANGE `no_of_attempts` `no_of_attempts` TINYINT( 3 ) NULL ,
CHANGE `certificate_id` `certificate_id` INT( 11 ) NULL ;

ALTER TABLE test_link DROP FOREIGN KEY `test_link_ibfk_3` ;

ALTER TABLE test_link ADD FOREIGN KEY ( `certificate_id` ) REFERENCES `master` ( `id` ) ON DELETE RESTRICT ON UPDATE RESTRICT ;

/*Inserting dummy data into various tables on 08-05-2013 */

INSERT INTO `test_link` ( `id` , `test_id` , `start_time` , `end_time` , `link` , `random` , `per_page_ques` , `feedback` , `score` , `email_results` , `collect_firstname` , `collect_lastname` , `collect_email_enroll` , `test_avail_opt1` , `test_avail_opt2` , `display_result_id` , `certificate` , `no_of_attempts` , `certificate_id` , `time_limit` , `select_answer` , `pass_marks` , `created_on` , `updated_on` , `created_by` , `updated_by` , `status` )
VALUES (
NULL , '1', '2013-05-08 20:20:02', '2013-05-08 22:08:10', 'gikjhkjkjlklllhhfddsfgjukjk', '1', '8', '0', '1', '0', '1', '1', '1', '0', '0', '1', '1', '2', '19', '60', '1', '50',
CURRENT_TIMESTAMP , '0000-00-00 00:00:00', '2', NULL , '0'
);

INSERT INTO `test_taker` ( `id` , `test_link_id` , `email_enroll_no` , `start_time` , `end_time` , `test_id` , `ques_attempted` , `score` , `created_on` , `updated_on` , `created_by` , `updated_by` )
VALUES (
NULL , '1', '1111', '2013-05-08 20:10:31', '2013-05-08 21:10:36', '1', '5', '30',
CURRENT_TIMESTAMP , '0000-00-00 00:00:00', '2', NULL
);

/*altering `test_taker_ques` table on 08-05-2013*/
ALTER TABLE `test_taker_ques` CHANGE `answer_given` `answer_given` INT NULL ;
ALTER TABLE `test_taker_ques` ADD FOREIGN KEY ( `answer_given` ) REFERENCES `question_options` ( `id` ) ON DELETE CASCADE ON UPDATE CASCADE ;

/*Inserting dummy data into various tables on 08-05-2013 */

INSERT INTO `test_taker_ques` ( `id` , `test_taker_id` , `ques_id` , `answer_given` , `created_on` , `updated_on` , `created_by` , `updated_by` , `feedback` )
VALUES (
NULL , '1', '1', '1',
CURRENT_TIMESTAMP , '0000-00-00 00:00:00', '2', NULL , NULL
);
/*altering `test_category` table on 08-05-2013*/
ALTER TABLE `test_category` DROP FOREIGN KEY `test_category_ibfk_2` ,
ADD FOREIGN KEY ( `cat_id` ) REFERENCES `test_scheduler`.`category` (
`id`
) ON DELETE CASCADE ON UPDATE CASCADE ;
/*creating `certificate_master` table on 09-05-2013*/
CREATE TABLE `certificate_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `upload_path` varchar(200) NOT NULL,
  `status` enum('0','1') DEFAULT '0' NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='for the name of the certificates and its path';

/*altering `certificate_master` table on 09-05-2013*/
ALTER TABLE `certificate_master` ADD `updated_on` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
ADD `created_on` TIMESTAMP NOT NULL ,
ADD `created_by` INT  NOT NULL ,
ADD `updated_by` INT  NULL ;


ALTER TABLE `certificate_master` ADD FOREIGN KEY ( `created_by` ) REFERENCES `test_scheduler`.`validate_users` (
`id`
) ON DELETE CASCADE ON UPDATE CASCADE ;


ALTER TABLE `certificate_master` ADD FOREIGN KEY ( `updated_by` ) REFERENCES `test_scheduler`.`validate_users` (
`id`
) ON DELETE CASCADE ON UPDATE CASCADE ;

/*Inserting dummy data into various tables on 09-05-2013 */
INSERT INTO `test_scheduler`.`certificate_master` (
`id` ,
`name` ,
`upload_path` ,
`status` ,
`updated_on` ,
`created_on` ,
`created_by` ,
`updated_by`
)
VALUES (
NULL , 'MySql Certificate', '/var/www/upload/c1', '0',
CURRENT_TIMESTAMP , '0000-00-00 00:00:00', '2', NULL
), (
NULL , 'Certificate for 1st ranker', '/var/www/upload/c1', '0',
CURRENT_TIMESTAMP , '0000-00-00 00:00:00', '1', NULL
);

/*altering various tables on 09-05-2013*/
ALTER TABLE `test_link` DROP FOREIGN KEY `test_link_ibfk_46` ;
UPDATE `test_scheduler`.`test_link` SET `certificate_id` = '1' WHERE `test_link`.`id` =1;

ALTER TABLE `certificate` ADD FOREIGN KEY ( `certificate_id` ) REFERENCES `test_scheduler`.`certificate_master` (
`id`
) ON DELETE CASCADE ON UPDATE CASCADE ;

ALTER TABLE `test_link` ADD FOREIGN KEY ( `certificate_id` ) REFERENCES `test_scheduler`.`certificate_master` (
`id`
) ON DELETE RESTRICT ON UPDATE RESTRICT ;


ALTER TABLE `certificate` CHANGE `issued` `issued` ENUM( '0', '1' ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '0 is issued before ,1 is not issued before';

ALTER TABLE `master` ADD `status` ENUM( '0', '1' ) NOT NULL DEFAULT '0',
ADD `created_on` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
ADD `updated_on` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
ADD `created_by` INT NOT NULL ,
ADD `updated_by` INT NULL DEFAULT NULL ;

/*altering and updating `master` table on 09-05-2013*/
UPDATE `test_scheduler`.`master` SET `created_by` = '1' WHERE `master`.`id` = 1; UPDATE `test_scheduler`.`master` SET `created_by` = '1' WHERE `master`.`id` = 2; UPDATE `test_scheduler`.`master` SET `created_by` = '1' WHERE `master`.`id` = 3; UPDATE `test_scheduler`.`master` SET `created_by` = '1' WHERE `master`.`id` = 4; UPDATE `test_scheduler`.`master` SET `created_by` = '1' WHERE `master`.`id` = 5; UPDATE `test_scheduler`.`master` SET `created_by` = '1' WHERE `master`.`id` = 6; UPDATE `test_scheduler`.`master` SET `created_by` = '1' WHERE `master`.`id` = 7; UPDATE `test_scheduler`.`master` SET `created_by` = '1' WHERE `master`.`id` = 8; UPDATE `test_scheduler`.`master` SET `created_by` = '1' WHERE `master`.`id` = 9; UPDATE `test_scheduler`.`master` SET `created_by` = '1' WHERE `master`.`id` = 10; UPDATE `test_scheduler`.`master` SET `created_by` = '1' WHERE `master`.`id` = 11; UPDATE `test_scheduler`.`master` SET `created_by` = '1' WHERE `master`.`id` = 12; UPDATE `test_scheduler`.`master` SET `created_by` = '1' WHERE `master`.`id` = 13; UPDATE `test_scheduler`.`master` SET `created_by` = '1' WHERE `master`.`id` = 14; UPDATE `test_scheduler`.`master` SET `created_by` = '1' WHERE `master`.`id` = 15; UPDATE `test_scheduler`.`master` SET `created_by` = '1' WHERE `master`.`id` = 16; UPDATE `test_scheduler`.`master` SET `created_by` = '1' WHERE `master`.`id` = 17; UPDATE `test_scheduler`.`master` SET `created_by` = '1' WHERE `master`.`id` = 18; UPDATE `test_scheduler`.`master` SET `created_by` = '1' WHERE `master`.`id` = 19;

ALTER TABLE `master` ADD FOREIGN KEY ( `created_by` ) REFERENCES `test_scheduler`.`validate_users` (
`id`
) ON DELETE CASCADE ON UPDATE CASCADE ;

ALTER TABLE `master` ADD FOREIGN KEY ( `updated_by` ) REFERENCES `test_scheduler`.`validate_users` (
`id`
) ON DELETE CASCADE ON UPDATE CASCADE ;

 UPDATE `test_scheduler`.`master` SET `status` = '1' WHERE `master`.`id` =1;

UPDATE `test_scheduler`.`master` SET `status` = '1' WHERE `master`.`id` =2;

UPDATE `test_scheduler`.`master` SET `status` = '1' WHERE `master`.`id` =18;

UPDATE `test_scheduler`.`master` SET `status` = '1' WHERE `master`.`id` =19;
/*altering various tables on 09-05-2013*/
ALTER TABLE `test_taker` CHANGE `created_on` `created_on` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
CHANGE `updated_on` `updated_on` TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ;
ALTER TABLE `category` CHANGE `created_on` `created_on` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
CHANGE `updated_on` `updated_on` TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ;
ALTER TABLE `certificate` CHANGE `created_on` `created_on` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
CHANGE `updated_on` `updated_on` TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ;
ALTER TABLE `question` CHANGE `created_on` `created_on` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
CHANGE `updated_on` `updated_on` TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ;
ALTER TABLE `question_options` CHANGE `created_on` `created_on` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
CHANGE `updated_on` `updated_on` TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ;
ALTER TABLE `test` CHANGE `created_on` `created_on` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
CHANGE `updated_on` `updated_on` TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ;
ALTER TABLE `test_category` CHANGE `created_on` `created_on` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
CHANGE `updated_on` `updated_on` TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ;
ALTER TABLE `test_link` CHANGE `created_on` `created_on` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
CHANGE `updated_on` `updated_on` TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ;
ALTER TABLE `test_taker` CHANGE `created_on` `created_on` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
CHANGE `updated_on` `updated_on` TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ;
ALTER TABLE `test_taker_ques` CHANGE `created_on` `created_on` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
CHANGE `updated_on` `updated_on` TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ;
ALTER TABLE `user_profile` CHANGE `created_on` `created_on` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
CHANGE `updated_on` `updated_on` TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ;
ALTER TABLE `validate_users` CHANGE `created_on` `created_on` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
CHANGE `updated_on` `updated_on` TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ;
/*altering `test_taker` table on 09-05-2013*/
ALTER TABLE `test_taker` ADD `ip_address` VARCHAR( 40 ) NOT NULL ;
/*altering `category` table on 09-05-2013*/
ALTER TABLE `category` ADD `status` ENUM( '0', '1', '2' ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '''0 for active,1 for deleted,2 for inactive''';
/*creating `test_question` table on 09-05-2013*/
CREATE TABLE `test_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0 for active,1 for deleted,2 for inactive',
  PRIMARY KEY (`id`),
  KEY `test_id` (`test_id`),
  KEY `question_id` (`question_id`),
  CONSTRAINT `test_question_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `test` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `test_question1_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='stores the reletionship between test and questions';
ALTER TABLE `test_taker` CHANGE `ip_address` `ip_address` VARCHAR( 40 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL; 
 ALTER TABLE `test_taker` ADD `first_name` VARCHAR( 100 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL AFTER `test_link_id` ,
ADD `last_name` VARCHAR( 100 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL AFTER `first_name` ;


ALTER TABLE `category` CHANGE `created_by` `created_by` INT( 11 ) NOT NULL ;
ALTER TABLE `certificate` CHANGE `created_by` `created_by` INT( 11 ) NOT NULL ;
ALTER TABLE `question_options` CHANGE `created_by` `created_by` INT( 11 ) NOT NULL ;
ALTER TABLE `test` CHANGE `created_by` `created_by` INT( 11 ) NOT NULL ;
ALTER TABLE `test_category` CHANGE `created_by` `created_by` INT( 11 ) NOT NULL ;
ALTER TABLE `test_link` CHANGE `created_by` `created_by` INT( 11 ) NOT NULL ;
ALTER TABLE `test_taker` CHANGE `created_by` `created_by` INT( 11 ) NOT NULL ;
ALTER TABLE `test_taker_ques` CHANGE `created_by` `created_by` INT( 11 ) NOT NULL ;
ALTER TABLE `user_profile` CHANGE `created_by` `created_by` INT( 11 ) NOT NULL ;
ALTER TABLE `validate_users` CHANGE `created_by` `created_by` INT( 11 ) NOT NULL ;
INSERT INTO `test_scheduler`.`test_question` (
`id` ,
`test_id` ,
`question_id` ,
`status`
)
VALUES (
NULL , '1', '1', '0');

/*altering email_id in user_profile table on 09-05-2013*/
alter table user_profile modify email varchar(100) unique;

/*altering certificate_master on 09-05-2013*/
ALTER TABLE `certificate_master` ADD `certificate_title` VARCHAR( 100 ) NOT NULL AFTER `upload_path` ,
ADD `certificate_body` TEXT NOT NULL AFTER `certificate_title` ;
/*creating contact_us table on 09-05-2013*/
CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='contact us table';

/*altering category table on 15-05-2013*/
alter table category modify name varchar(50) unique not null;


/*altering validate_users table on 15-05-2013*/
alter table validate_users drop foreign key validate_users_ibfk_42;

alter table validate_users drop foreign key validate_users_ibfk_1;

alter table validate_users drop column terms_conditions;

alter table validate_users drop column created_by;

alter table validate_users drop column updated_by;

/*altering user_profile table on 15-05-2013*/
alter table user_profile drop foreign key user_profile_ibfk_10;

alter table user_profile drop foreign key user_profile_ibfk_45;

alter table user_profile drop column created_by;

alter table user_profile drop column updated_by;

/*altering category table on 15-05-2013*/
alter table category drop index `name`;

alter table category add constraint unique_name_createdby unique(name,created_by);

/*altering status table on 15-05-2013*/
alter table contact_us add status enum('0','1') not null default '0';

ALTER TABLE `contact_us` CHANGE `status` `status` ENUM( '0', '1' ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '0 is Active and 1 is Inactive';
