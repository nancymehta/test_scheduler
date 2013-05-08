/*dummy values inserted on 07-05-2013*/
INSERT INTO `test_scheduler`.`validate_users` (`id`, `username`, `password`, `user_type`, `terms_conditions`, `status`, `session_id`, `created_on`, `updated_on`, `created_by`, `updated_by`) VALUES (NULL, 'parveen', 'parveen', '1', '1', '0', '1234', CURRENT_TIMESTAMP, '0000-00-00 00:00:00', NULL, NULL), (NULL, 'jasleen', 'jasleen', '1', '1', '0', '12345', CURRENT_TIMESTAMP, '0000-00-00 00:00:00', NULL, NULL),(NULL, 'nancy', 'nancy', '0', '0', '0', '12345', CURRENT_TIMESTAMP, '0000-00-00 00:00:00', NULL, NULL),(NULL, 'saurabh', 'saurabh', '1', '0', '1', '12345', CURRENT_TIMESTAMP, '0000-00-00 00:00:00', NULL, NULL),(NULL, 'gourav', 'gourav', '0', '1', '1', '12345', CURRENT_TIMESTAMP, '0000-00-00 00:00:00', NULL, NULL);


/* Table Descriptions */
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


/*Altering session_id in validate_users*/
 ALTER TABLE  `validate_users` modify  `session_id` VARCHAR( 30 ) DEFAULT '0' COMMENT  'this field will be used to store session id';


/*For modifying tinyint to enum in test_link table*/
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


/* For removing feedback from question and adding feedback to test_taker_ques*/
alter table `question` drop column `feedback`;
alter table `test_taker_ques` add `feedback` varchar(100);


/*Dropped unrequired fields from user_profile*/
alter table `user_profile` drop column `date_of_birth`;
alter table `user_profile` drop column `phone`;
alter table `user_profile` drop column `address`;
alter table `user_profile` drop foreign key user_profile_ibfk_3;
alter table `user_profile` drop column `gender_id`;


/*Adding status fields to multiple tables*/
alter table test add status enum('0','1','2') default '0' comment "0 for active, 1 for deleted, 2 for inactive";
alter table question  add status enum('0','1','2') default '0' comment "0 for active, 1 for deleted, 2 for inactive";
alter table test_link  add status enum('0','1') default '0' comment "0 for active, 1 for deleted";
alter table question_options  add status enum('0','1') default '0' comment "0 for active, 1 for deleted";

/*Adding ip_address field to user_profile table*/
alter table user_profile add ip_address varchar(40);

/*Altering user_type in validate_users*/
alter table validate_users modify `user_type` enum('0','1') DEFAULT '1' NOT NULL COMMENT '0 is for admin & 1 is for user';

/*Altering the collations*/

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

/*Inserting dummy data into various tables */

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

/*altering certificate table*/
ALTER TABLE `certificate` ADD `certificate_id` INT NOT NULL AFTER `id` ;

/*altering test_link table*/

ALTER TABLE `test_link` CHANGE `no_of_attempts` `no_of_attempts` TINYINT( 3 ) NULL ,
CHANGE `certificate_id` `certificate_id` INT( 11 ) NULL ;

ALTER TABLE test_link DROP FOREIGN KEY `test_link_ibfk_3` ;

ALTER TABLE test_link ADD FOREIGN KEY ( `certificate_id` ) REFERENCES `master` ( `id` ) ON DELETE RESTRICT ON UPDATE RESTRICT ;

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

ALTER TABLE `test_taker_ques` CHANGE `answer_given` `answer_given` INT NULL ;
ALTER TABLE test_taker_ques ADD FOREIGN KEY ( `answer_given` ) REFERENCES `question_options` ( `id` ) ON DELETE CASCADE ON UPDATE CASCADE ;

INSERT INTO `test_taker_ques` ( `id` , `test_taker_id` , `ques_id` , `answer_given` , `created_on` , `updated_on` , `created_by` , `updated_by` , `feedback` )
VALUES (
NULL , '1', '1', '1',
CURRENT_TIMESTAMP , '0000-00-00 00:00:00', '2', NULL , NULL
);