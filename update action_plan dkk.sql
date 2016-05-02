# Host: localhost  (Version: 5.5.27)
# Date: 2016-05-03 00:38:39
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES latin1 */;

#
# Structure for table "t_cr_action_plan"
#

DROP TABLE IF EXISTS `t_cr_action_plan`;
CREATE TABLE `t_cr_action_plan` (
  `cr_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `change_id` int(11) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `risk_id` int(11) DEFAULT NULL,
  `action_plan_status` int(11) DEFAULT NULL,
  `action_plan` varchar(300) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `division` varchar(100) DEFAULT NULL,
  `assigned_to` varchar(200) DEFAULT NULL,
  `execution_status` varchar(100) DEFAULT NULL,
  `execution_explain` varchar(1000) DEFAULT NULL,
  `execution_evidence` varchar(1000) DEFAULT NULL,
  `execution_reason` varchar(1000) DEFAULT NULL,
  `revised_date` date DEFAULT NULL,
  `switch_flag` varchar(1) DEFAULT NULL,
  `change_flag` varchar(100) DEFAULT NULL,
  `data_flag` varchar(100) DEFAULT NULL,
  `status_act` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`cr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "t_cr_action_plan"
#


#
# Structure for table "t_cr_action_plan_change"
#

DROP TABLE IF EXISTS `t_cr_action_plan_change`;
CREATE TABLE `t_cr_action_plan_change` (
  `cr_id` int(11) unsigned NOT NULL,
  `change_id` int(11) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `risk_id` int(11) DEFAULT NULL,
  `action_plan_status` int(11) DEFAULT NULL,
  `action_plan` varchar(300) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `division` varchar(100) DEFAULT NULL,
  `assigned_to` varchar(200) DEFAULT NULL,
  `execution_status` varchar(100) DEFAULT NULL,
  `execution_explain` varchar(1000) DEFAULT NULL,
  `execution_evidence` varchar(1000) DEFAULT NULL,
  `execution_reason` varchar(1000) DEFAULT NULL,
  `revised_date` date DEFAULT NULL,
  `switch_flag` varchar(1) DEFAULT NULL,
  `change_flag` varchar(100) DEFAULT NULL,
  `data_flag` varchar(100) DEFAULT NULL,
  `status_act` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "t_cr_action_plan_change"
#


#
# Structure for table "t_risk_action_plan"
#

DROP TABLE IF EXISTS `t_risk_action_plan`;
CREATE TABLE `t_risk_action_plan` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `risk_id` int(11) DEFAULT NULL,
  `action_plan_status` int(11) DEFAULT NULL,
  `action_plan` varchar(300) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `division` varchar(100) DEFAULT NULL,
  `assigned_to` varchar(200) DEFAULT NULL,
  `execution_status` varchar(100) DEFAULT NULL,
  `execution_explain` varchar(1000) DEFAULT NULL,
  `execution_evidence` varchar(1000) DEFAULT NULL,
  `execution_reason` varchar(1000) DEFAULT NULL,
  `revised_date` date DEFAULT NULL,
  `switch_flag` varchar(100) DEFAULT NULL,
  `status_act` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "t_risk_action_plan"
#


#
# Structure for table "t_risk_action_plan_change"
#

DROP TABLE IF EXISTS `t_risk_action_plan_change`;
CREATE TABLE `t_risk_action_plan_change` (
  `id` int(11) DEFAULT NULL,
  `risk_id` int(11) DEFAULT NULL,
  `action_plan_status` int(11) DEFAULT NULL,
  `action_plan` varchar(300) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `division` varchar(100) DEFAULT NULL,
  `assigned_to` varchar(200) DEFAULT NULL,
  `execution_status` varchar(100) DEFAULT NULL,
  `execution_explain` varchar(1000) DEFAULT NULL,
  `execution_evidence` varchar(1000) DEFAULT NULL,
  `execution_reason` varchar(1000) DEFAULT NULL,
  `revised_date` date DEFAULT NULL,
  `switch_flag` varchar(100) DEFAULT NULL,
  `status_act` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "t_risk_action_plan_change"
#


#
# Structure for table "t_risk_action_plan_hist"
#

DROP TABLE IF EXISTS `t_risk_action_plan_hist`;
CREATE TABLE `t_risk_action_plan_hist` (
  `id` int(11) unsigned NOT NULL,
  `risk_id` int(11) DEFAULT NULL,
  `action_plan_status` int(11) DEFAULT NULL,
  `action_plan` varchar(300) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `division` varchar(100) DEFAULT NULL,
  `assigned_to` varchar(200) DEFAULT NULL,
  `execution_status` varchar(100) DEFAULT NULL,
  `execution_explain` varchar(1000) DEFAULT NULL,
  `execution_evidence` varchar(1000) DEFAULT NULL,
  `execution_reason` varchar(1000) DEFAULT NULL,
  `revised_date` date DEFAULT NULL,
  `switch_flag` varchar(1) DEFAULT NULL,
  `update_status` varchar(100) DEFAULT NULL,
  `update_by` varchar(200) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `status_act` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "t_risk_action_plan_hist"
#

INSERT INTO `t_risk_action_plan_hist` VALUES (12,1,NULL,'asdf','2016-01-30','Human Resource',NULL,NULL,NULL,NULL,NULL,NULL,'P','CHANGE_REQUEST-VERIFY','head_hr','2016-01-31 10:27:38',NULL),(12,1,NULL,'asdf','2016-01-30','Human Resource',NULL,NULL,NULL,NULL,NULL,NULL,'P','CHANGE_REQUEST-VERIFY','head_hr','2016-01-31 10:29:17',NULL),(12,1,NULL,'asdf','2016-01-30','Human Resource',NULL,NULL,NULL,NULL,NULL,NULL,'P','CHANGE_REQUEST-VERIFY','head_hr','2016-01-31 10:31:54',NULL),(3,1,4,'AP user_it to human resorch','2016-02-01','IT','head_it','EXTEND',NULL,NULL,'tes extend','2016-02-02','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-03 13:42:22',NULL),(3,1,4,'AP user_it to human resorch','2016-02-01','IT','head_it','EXTEND',NULL,NULL,'tes extend','2016-02-02','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-03 16:02:24',NULL),(3,1,4,'AP user_it to human resorch','2016-02-01','IT','head_it','EXTEND',NULL,NULL,'tes extend','2016-02-02','P','CHANGE_REQUEST-VERIFY','head_hr','2016-02-03 16:49:34',NULL),(3,1,4,'AP user_it to human resorch','2016-02-01','IT','head_it','EXTEND',NULL,NULL,'tes extend','2016-02-02','P','CHANGE_REQUEST-VERIFY','head_it','2016-02-03 22:35:21',NULL),(3,1,4,'AP user_it to human resorch','2016-02-01','IT','head_it','EXTEND',NULL,NULL,'tes extend','2016-02-02','P','CHANGE_REQUEST-VERIFY','head_it','2016-02-03 22:55:38',NULL),(2,1,NULL,'Ini risk pertama user_it','2016-02-05','Human Resource',NULL,NULL,NULL,NULL,NULL,NULL,'P','CHANGE_REQUEST-VERIFY','user_it','2016-02-05 15:25:49',NULL),(2,1,NULL,'Ini risk pertama user_it','2016-02-05','Human Resource',NULL,NULL,NULL,NULL,NULL,NULL,'P','CHANGE_REQUEST-VERIFY','user_it','2016-02-05 15:36:46',NULL),(1,1,0,'Trisk baru user it','2016-02-07','Human Resource',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'CHANGE_REQUEST-VERIFY','user_it','2016-02-07 13:35:09',NULL),(2,1,NULL,'asd','2016-04-01','Human Resource',NULL,NULL,NULL,NULL,NULL,NULL,'P','CHANGE_REQUEST-VERIFY','user_it','2016-02-07 16:03:45',NULL),(2,1,NULL,'asd','2016-04-01','Human Resource',NULL,NULL,NULL,NULL,NULL,NULL,'P','CHANGE_REQUEST-VERIFY','user_it','2016-02-07 16:09:41',NULL),(8,3,NULL,'user hr','2016-02-08','Human Resource',NULL,NULL,NULL,NULL,NULL,NULL,'P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 00:37:40',NULL),(2,1,4,'Bismillah PII user it','2016-02-08','Human Resource','head_hr',NULL,NULL,NULL,NULL,NULL,'P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 10:12:25',NULL),(2,1,4,'Bismillah PII user it','2016-02-08','Human Resource','head_hr',NULL,NULL,NULL,NULL,NULL,'P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 10:25:13',NULL),(2,1,4,'Bismillah PII user it primary','2016-02-08','Human Resource','head_hr',NULL,NULL,NULL,NULL,NULL,'P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 10:30:59',NULL),(2,1,4,'Bismillah PII user it primary','2016-02-08','Human Resource','head_hr',NULL,NULL,NULL,NULL,NULL,'P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 10:33:19',NULL),(2,1,4,'Bismillah PII user it primary changes dari owner','2016-02-08','Human Resource','head_hr',NULL,NULL,NULL,NULL,NULL,'P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 10:43:39',NULL),(2,1,4,'Bismillah PII user it primary changes dari owner','2016-02-08','Human Resource','head_hr',NULL,NULL,NULL,NULL,NULL,'P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 10:49:26',NULL),(1,1,0,'baru ','2016-02-08','Human Resource',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 17:26:31',NULL),(2,1,6,'asdf','2016-02-10','Human Resource','head_hr','EXTEND',NULL,NULL,'asd','2016-02-10','P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-10 17:22:36',NULL),(2,1,6,'asdf','2016-02-10','Human Resource','head_hr','EXTEND',NULL,NULL,'asd','2016-02-10','P','CHANGE_REQUEST-VERIFY','head_hr','2016-02-11 16:19:31',NULL),(2,1,4,'ini baru user it','2016-02-16','Human Resource','head_hr','ONGOING','on goink','',NULL,NULL,'P','CHANGE_REQUEST-VERIFY','user_it','2016-02-16 11:34:28',NULL),(4,2,NULL,'tes','2016-02-16','Human Resource',NULL,NULL,NULL,NULL,NULL,NULL,'P','CHANGE_REQUEST-VERIFY','head_hr','2016-02-16 11:52:02',NULL),(2,1,4,'ini baru user it','2016-02-16','Human Resource','head_hr','ONGOING','on goink','',NULL,NULL,'P','CHANGE_REQUEST-VERIFY','head_hr','2016-02-16 12:51:52',NULL),(3,1,1,'asda','2016-02-19','Human Resource','head_hr',NULL,NULL,NULL,NULL,NULL,'P','CHANGE_REQUEST-VERIFY','head_hr','2016-02-21 23:29:55',NULL),(4,1,1,'asdasd','2016-02-19','Human Resource','head_hr',NULL,NULL,NULL,NULL,NULL,'P','CHANGE_REQUEST-VERIFY','head_hr','2016-02-21 23:29:55',NULL),(3,1,1,' Bissmillah revisi 3 piix','2016-04-18','Human Resource','head_hr',NULL,NULL,NULL,NULL,NULL,'P','CHANGE_REQUEST-VERIFY','head_hr','2016-04-18 14:26:53',NULL),(13,1,NULL,' updateRisk','2016-04-19','Human Resource',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'CHANGE_REQUEST-VERIFY','user_hr','2016-04-20 11:10:58',NULL),(4,1,1,' bismillah revisi 3','2016-04-20','Human Resource','head_hr',NULL,NULL,NULL,NULL,NULL,'P','CHANGE_REQUEST-VERIFY','user_hr','2016-04-26 15:46:10',NULL),(5,1,1,' bismillah revisi 3','2016-04-20','Human Resource','head_hr',NULL,NULL,NULL,NULL,NULL,'P','CHANGE_REQUEST-VERIFY','user_hr','2016-04-26 15:46:10',NULL),(4,1,1,' bismillah revisi 3','2016-04-20','Human Resource','head_hr',NULL,NULL,NULL,NULL,NULL,'P','CHANGE_REQUEST-VERIFY','user_hr','2016-04-26 15:50:55',NULL),(5,1,1,' bismillah revisi 3','2016-04-20','Human Resource','head_hr',NULL,NULL,NULL,NULL,NULL,'P','CHANGE_REQUEST-VERIFY','user_hr','2016-04-26 15:50:55',NULL),(4,1,1,' bismillah revisi 3','2016-04-20','Human Resource','head_hr',NULL,NULL,NULL,NULL,NULL,'P','CHANGE_REQUEST-VERIFY','user_hr','2016-04-26 16:05:26',NULL),(5,1,1,' bismillah revisi 3','2016-04-20','Human Resource','head_hr',NULL,NULL,NULL,NULL,NULL,'P','CHANGE_REQUEST-VERIFY','user_hr','2016-04-26 16:05:26',NULL),(9,2,NULL,' asdasd','2016-05-02','Human Resource',NULL,NULL,NULL,NULL,NULL,NULL,'P','berkala','CHANGE_REQUEST-VERIFY','0000-00-00 00:00:00','2016-05-02 23:56:52');
