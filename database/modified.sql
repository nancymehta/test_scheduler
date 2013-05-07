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


