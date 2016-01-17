# Host: localhost  (Version: 5.5.27)
# Date: 2016-01-17 10:51:22
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES latin1 */;

#
# Structure for table "m_menu"
#

DROP TABLE IF EXISTS `m_menu`;
CREATE TABLE `m_menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(200) NOT NULL,
  `menu_module` varchar(200) NOT NULL,
  `menu_parent` int(11) NOT NULL,
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `menu_icon` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=578 DEFAULT CHARSET=latin1;

#
# Data for table "m_menu"
#

INSERT INTO `m_menu` VALUES (1,'Dashboard','main',0,0,'icon-home'),(5,'Division','user/division',39,3,NULL),(6,'Dashboard RAC','main/rac',0,1,'icon-home'),(7,'Periodic','',0,2,'icon-clock'),(8,'Adhoc','',0,3,'icon-hourglass'),(9,'Modify User','user/modify',0,4,'icon-users'),(10,'Housekeeping','',0,6,'icon-layers'),(11,'Help & Policy','pages/help',0,7,'icon-info'),(12,'Change Request','',0,5,'icon-book-open'),(13,'Risk Register','risk/RiskRegister',7,1,NULL),(14,'Risk Treatment','',7,2,NULL),(15,'Risk Action','',7,3,NULL),(16,'KRI','',7,4,NULL),(17,'Entry Periode','admin/periode',7,5,NULL),(18,'Risk Register','',8,1,NULL),(19,'Risk Treatment','',8,2,NULL),(20,'Risk Action','',8,3,NULL),(21,'KRI','',8,4,NULL),(23,'Home','main',0,100,'icon-home'),(24,'Transaction','',0,101,'icon-book-open'),(25,'Regular Exercise','',24,1,NULL),(26,'Risk Register Exercise','risk/RiskRegister',25,0,''),(27,'Q & A','main/qna',24,2,''),(28,'News','main/news',0,102,'icon-feed'),(29,'User Manual','main/usermanual',0,103,'icon-info'),(30,'Home','main/mainpic',0,100,'icon-home'),(32,'Settings','',0,300,'icon-settings'),(33,'Entry Regular Period','',32,0,NULL),(34,'Risk Register Exercise','admin/periode',33,0,NULL),(35,'Action Plan Execution','admin/periode/actplan',33,0,NULL),(36,'Entry Category','admin/category',32,0,NULL),(37,'User Access Settings','user/modify',32,0,NULL),(38,'Home','main/mainrac',0,100,'icon-home'),(39,'Administration','',0,400,'icon-settings'),(40,'User','user',39,1,''),(41,'Role','user/role',39,2,''),(42,'Reference','admin/reference',39,4,''),(43,'Manage News','admin/news',32,0,NULL),(44,'KRI Designation','',24,0,NULL),(45,'KRI Setting','risk/kri/krisetting',44,0,NULL),(46,'Entry KRI','risk/kri/krientry',44,0,NULL),(47,'Q & A Management','admin/qna',24,0,NULL),(48,'Manage User Manual','admin/usermanual',39,0,NULL),(49,'Banner Setting','admin/banner',32,0,NULL),(50,'Report','report/risk/getallrisk',0,102,'icon-folder'),(60,'asdasd','aasd',51,0,NULL),(61,'IIFG Corporate Risk Register','#',50,1,NULL),(62,'List of Risk Event','report/risk/listofrisk',61,1,NULL),(63,'List of Risk Identified during this periode','report/risk/listofrisketc',61,2,NULL),(64,'Risk Treatment Report','report/risk/risktreatmentreport',50,2,NULL),(65,'Action Plan Execution','#',50,3,NULL),(66,'List of All Action Plan Execution with Status','report/risk/listofall',65,1,NULL),(67,'List of All Action Plan Execution','report/risk/listofall1',65,2,NULL),(68,'Risk Table','report/risk_table',50,4,NULL),(69,'Comparison Risk beetween Periode','report/risk/comparison1',68,1,NULL),(70,'Comparison 2nd sub category beetwen periode','report/risk/comparison2',68,2,NULL),(71,'Top Ten Risk','report/risk/topten',50,5,NULL),(72,'Top Ten 2nd Sub Category','report/risk/topten2',50,6,NULL),(73,'Comparison of outcome','',50,7,NULL),(74,'by Risk ','report/risk/getcomparison1',73,1,NULL),(75,'by 2nd sub category','report/risk/getcomparison2',73,2,NULL),(77,'KRI Monitoring','report/risk/KRI_monitoring',50,9,NULL),(78,'Library Management','',0,103,'icon-settings'),(79,'Risk','Risk',78,1,NULL),(80,'List Risk','library/list_risk',79,1,NULL),(81,'List of Action Plan','library/list_ap',79,2,NULL),(82,'List of Existing Control','library/list_ec',79,3,NULL),(83,'Taksonomi 2nd Sub Category','library/taksonomi',78,2,NULL),(84,'KRI','library/kri',78,3,NULL),(85,'Under Maintenance','risk/RiskRegister/undermaintenance',24,0,NULL),(551,'List of All Risks-','report/risk/getallrisk',50,0,NULL),(552,'List of All Risk (Periode)','report/risk/getallriskperiode',50,2,NULL),(553,'Action Plan','report/risk/getactionplan',50,3,NULL),(554,'Risk Treatment','report/risk/gettreatment',50,4,NULL),(555,'Risk Table','report/risk/gettable',50,5,NULL),(556,'Top Ten Risk','report/risk/gettopten',50,6,NULL),(557,'KRI','report/risk/getkri',50,7,NULL),(558,'Comparison Of Outcome','report/risk/getcomparison',50,8,NULL),(559,'List of 2nd Sub Category','report/risk/get2ndcategory',50,9,NULL),(576,'KRI','',50,8,NULL),(577,'Recover Deleted Risk','risk/RiskRegister/recover',32,0,NULL);
