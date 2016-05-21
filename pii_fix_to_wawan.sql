# Host: localhost  (Version: 5.5.27)
# Date: 2016-05-21 10:18:02
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES latin1 */;

#
# Structure for table "m_banner"
#

DROP TABLE IF EXISTS `m_banner`;
CREATE TABLE `m_banner` (
  `banner_text` varchar(500) DEFAULT NULL,
  `banner_status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "m_banner"
#

INSERT INTO `m_banner` VALUES ('this is the example of banner',1);

#
# Structure for table "m_division"
#

DROP TABLE IF EXISTS `m_division`;
CREATE TABLE `m_division` (
  `division_id` varchar(100) NOT NULL DEFAULT '',
  `division_name` varchar(100) DEFAULT NULL,
  `created_by` varchar(200) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`division_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "m_division"
#

INSERT INTO `m_division` VALUES ('Human Resource','Human Resource','admin','2015-10-25 20:54:51'),('IT','Information Technology & Network Support','admin','2015-10-25 20:55:06'),('Marketing','Marketing','admin','2015-10-25 20:55:25'),('RAC','RAC','admin','2015-11-26 10:29:44'),('Sales','Sales','admin','2015-10-25 20:55:17');

#
# Structure for table "m_division_hist"
#

DROP TABLE IF EXISTS `m_division_hist`;
CREATE TABLE `m_division_hist` (
  `division_id` varchar(100) NOT NULL DEFAULT '',
  `division_name` varchar(100) DEFAULT NULL,
  `created_by` varchar(200) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `update_status` varchar(1) DEFAULT NULL,
  `update_by` varchar(200) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "m_division_hist"
#


#
# Structure for table "m_likelihood"
#

DROP TABLE IF EXISTS `m_likelihood`;
CREATE TABLE `m_likelihood` (
  `l_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `l_key` varchar(100) DEFAULT NULL,
  `l_title` varchar(100) DEFAULT NULL,
  `l_desc` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`l_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

#
# Data for table "m_likelihood"
#

INSERT INTO `m_likelihood` VALUES (1,'VERY LOW','Very Low','0% - 10% probability of risk could occur within 1 year or on each event / activity that creates the risk'),(2,'LOW','Low','10% - 30% probability of risk could occur within 1 year or on each event / activity that creates the risk'),(3,'MEDIUM','Medium','30% - 50% probability of risk could occur within 1 year or on each event / activity that creates the risk'),(4,'HIGH','High','50% - 70% probability of risk could occur within 1 year or on each event / activity that creates the risk'),(5,'VERY HIGH','Very High','70% - 100% probability of risk could occur within 1 year or on each event / activity that creates the risk');

#
# Structure for table "m_likelihood_i"
#

DROP TABLE IF EXISTS `m_likelihood_i`;
CREATE TABLE `m_likelihood_i` (
  `l_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `l_key` varchar(100) DEFAULT NULL,
  `l_title` varchar(100) DEFAULT NULL,
  `l_desc` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`l_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

#
# Data for table "m_likelihood_i"
#

INSERT INTO `m_likelihood_i` VALUES (1,'VERY LOW','Sangat Rendah','0% - 10% kemungkinan resiko dapat terjadi dalam 1 tahun dalam setiap acara / kegiatan yang mengakibatkan resiko'),(2,'LOW','Rendah','10% - 30% kemungkinan resiko dapat terjadi dalam 1 tahun dalam setiap acara / kegiatan yang mengakibatkan resiko'),(3,'MEDIUM','Sedang','30% - 50% kemungkinan resiko dapat terjadi dalam 1 tahun dalam setiap acara / kegiatan yang mengakibatkan resiko'),(4,'HIGH','Tinggi','50% - 70% kemungkinan resiko dapat terjadi dalam 1 tahun dalam setiap acara / kegiatan yang mengakibatkan resiko'),(5,'VERY HIGH','Sangat Tinggi','70% - 100% kemungkinan resiko dapat terjadi dalam 1 tahun dalam setiap acara / kegiatan yang mengakibatkan resiko');

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
) ENGINE=InnoDB AUTO_INCREMENT=579 DEFAULT CHARSET=latin1;

#
# Data for table "m_menu"
#

INSERT INTO `m_menu` VALUES (1,'Dashboard','main',0,0,'icon-home'),(5,'Division','user/division',39,3,NULL),(6,'Dashboard RAC','main/rac',0,1,'icon-home'),(7,'Periodic','',0,2,'icon-clock'),(8,'Adhoc','',0,3,'icon-hourglass'),(9,'Modify User','user/modify',0,4,'icon-users'),(10,'Housekeeping','',0,6,'icon-layers'),(11,'Help & Policy','pages/help',0,7,'icon-info'),(12,'Change Request','',0,5,'icon-book-open'),(13,'Risk Register','risk/RiskRegister',7,1,NULL),(14,'Risk Treatment','',7,2,NULL),(15,'Risk Action','',7,3,NULL),(16,'KRI','',7,4,NULL),(17,'Entry Periode','admin/periode',7,5,NULL),(18,'Risk Register','',8,1,NULL),(19,'Risk Treatment','',8,2,NULL),(20,'Risk Action','',8,3,NULL),(21,'KRI','',8,4,NULL),(23,'Home','main',0,100,'icon-home'),(24,'Transaction','',0,101,'icon-book-open'),(25,'Regular Exercise','',24,1,NULL),(26,'Risk Register Exercise','risk/RiskRegister',25,0,''),(27,'Q & A','main/qna',24,2,''),(28,'News','main/news',0,102,'icon-feed'),(29,'User Manual','main/usermanual',0,400,'icon-info'),(30,'Home','main/mainpic',0,100,'icon-home'),(32,'Settings','',0,300,'icon-settings'),(33,'Entry Regular Period','',32,0,NULL),(34,'Risk Register Exercise','admin/periode',33,0,NULL),(35,'Action Plan Execution','admin/periode/actplan',33,0,NULL),(36,'Entry Category','admin/category',32,0,NULL),(37,'User Access Settings','user/modify',32,0,NULL),(38,'Home','main/mainrac',0,100,'icon-home'),(39,'Administration','',0,400,'icon-settings'),(40,'User','user',39,1,''),(41,'Role','user/role',39,2,''),(42,'Reference','admin/reference',39,4,''),(43,'Manage News','admin/news',32,0,NULL),(44,'KRI Designation','',24,0,NULL),(45,'KRI Setting','risk/kri/krisetting',44,0,NULL),(46,'Entry KRI','risk/kri/krientry',44,0,NULL),(47,'Q & A Management','admin/qna',24,0,NULL),(48,'Manage User Manual','admin/usermanual',39,0,NULL),(49,'Banner Setting','admin/banner',32,0,NULL),(50,'Report','report/risk/getallrisk',0,102,'icon-folder'),(60,'asdasd','aasd',51,0,NULL),(61,'IIFG Corporate Risk Register','#',50,1,NULL),(62,'List of Risk Event','report/risk/listofrisk',61,1,NULL),(63,'List of Risk Identified during this Period','report/risk/listofrisketc',61,2,NULL),(64,'Risk Treatment Report','report/risk/risktreatmentreport',50,2,NULL),(65,'Action Plan Execution','#',50,3,NULL),(66,'List of All Action Plan Execution with Status','report/risk/listofall',65,1,NULL),(67,'List of All Action Plan Execution','report/risk/listofall1',65,2,NULL),(68,'Risk Table','report/risk_table',50,4,NULL),(69,'Comparison Risk between Period','report/risk/comparison1',68,1,NULL),(70,'Comparison 2nd Sub Category between Period','report/risk/comparison2',68,2,NULL),(71,'Top Ten Risk','report/risk/topten',50,5,NULL),(72,'Top Ten 2nd Sub Category','report/risk/topten2',50,6,NULL),(73,'Comparison of outcome','',50,7,NULL),(74,'by Risk ','report/risk/getcomparison1',73,1,NULL),(75,'by 2nd Sub Category','report/risk/getcomparison2',73,2,NULL),(77,'KRI Monitoring','report/risk/KRI_monitoring',50,9,NULL),(78,'Library Management','',0,103,'icon-settings'),(79,'Risk','Risk',78,1,NULL),(80,'List of Risk','library/list_risk',79,1,NULL),(81,'List of Action Plan','library/list_ap',79,2,NULL),(82,'List of Existing Control','library/list_ec',79,3,NULL),(83,'Risk Taxonomy','library/taksonomi',78,2,NULL),(84,'Key Risk Indicator','library/kri',78,3,NULL),(85,'Regular Action Plan Execution','main/mainrac/actionplan_adt',24,3,NULL),(86,'Regular Action Plan Execution','main/mainpic/actionplan_adt',24,3,NULL),(87,'Under Maintenance','risk/RiskRegister/undermaintenance',24,0,NULL),(88,'List of Objective','library/list_objective',79,3,''),(89,'Risk Map','report/risk/riskmap',50,10,''),(551,'List of All Risks-','report/risk/getallrisk',50,0,NULL),(552,'List of All Risk (Periode)','report/risk/getallriskperiode',50,2,NULL),(553,'Action Plan','report/risk/getactionplan',50,3,NULL),(554,'Risk Treatment','report/risk/gettreatment',50,4,NULL),(555,'Risk Table','report/risk/gettable',50,5,NULL),(556,'Top Ten Risk','report/risk/gettopten',50,6,NULL),(557,'KRI','report/risk/getkri',50,7,NULL),(558,'Comparison of Outcome','report/risk/getcomparison',50,8,NULL),(559,'List of 2nd Sub Category','report/risk/get2ndcategory',50,9,NULL),(576,'KRI','',50,8,NULL),(577,'Recycle Bin','risk/RiskRegister/recover',0,300,'icon-info'),(578,'Report','admin/periode/periode_r',33,0,NULL);

#
# Structure for table "m_menu_i"
#

DROP TABLE IF EXISTS `m_menu_i`;
CREATE TABLE `m_menu_i` (
  `menu_id` int(11) NOT NULL DEFAULT '0',
  `menu_name` varchar(200) NOT NULL,
  `menu_module` varchar(200) NOT NULL,
  `menu_parent` int(11) NOT NULL,
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `menu_icon` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "m_menu_i"
#

INSERT INTO `m_menu_i` VALUES (0,'','',0,0,NULL),(1,'Dashboard','maini',0,0,'icon-home'),(5,'Division','user/division',39,3,NULL),(6,'Dashboard RAC','main/rac',0,1,'icon-home'),(7,'Periodic','',0,2,'icon-clock'),(8,'Adhoc','',0,3,'icon-hourglass'),(9,'Modify User','useri/modify',0,4,'icon-users'),(10,'Housekeeping','',0,6,'icon-layers'),(11,'Help & Policy','pages/help',0,7,'icon-info'),(12,'Change Request','',0,5,'icon-book-open'),(13,'Risk Register','riski/RiskRegister',7,1,NULL),(14,'Risk Treatment','',7,2,NULL),(15,'Risk Action','',7,3,NULL),(16,'KRI','',7,4,NULL),(17,'Entri Periode','admini/periode',7,5,NULL),(18,'Risk Register','',8,1,NULL),(19,'Risk Treatment','',8,2,NULL),(20,'Risk Action','',8,3,NULL),(21,'KRI','',8,4,NULL),(23,'Beranda','maini',0,100,'icon-home'),(24,'Transaksi','',0,101,'icon-book-open'),(25,'Pelaksanaan Berkala','',24,1,NULL),(26,'Risk Register Berkala','riski/RiskRegister',25,0,''),(27,'Tanya & Jawab','maini/qna',24,2,''),(28,'Berita','maini/news',0,102,'icon-feed'),(29,'Panduan Pengguna','maini/usermanual',0,400,'icon-info'),(30,'Beranda','maini/mainpic',0,100,'icon-home'),(32,'Pengaturan','',0,300,'icon-settings'),(33,'Entri Periode Berkala','',32,0,NULL),(34,'Risk Register Berkala','admini/periode',33,0,NULL),(35,'Pelaksanaan Action Plan','admini/periode/actplan',33,0,NULL),(36,'Entri Kategori','admini/category',32,0,NULL),(37,'Pengaturan Hak Akses Pengguna','useri/modify',32,0,NULL),(38,'Beranda','maini/mainrac',0,100,'icon-home'),(39,'Administration','',0,400,'icon-settings'),(40,'Pengguna','useri',39,1,''),(41,'Peran','useri/role',39,2,''),(42,'Referensi','admini/reference',39,4,''),(43,'Mengelola Berita','admini/news',32,0,NULL),(44,'Penetapan KRI','',24,0,NULL),(45,'Pengaturan KRI','riski/kri/krisetting',44,0,NULL),(46,'Entri KRI','riski/kri/krientry',44,0,NULL),(47,'Pengaturan Tanya & Jawab','admini/qna',24,0,NULL),(48,'Mengelola Panduan Pengguna','admini/usermanual',39,1,NULL),(49,'Pengaturan Banner','admini/banner',32,0,NULL),(50,'Laporan','reporti/risk/getallrisk',0,102,'icon-folder'),(61,'IIFG Corporate Risk Register','',50,1,NULL),(62,'List of Risk Event','reporti/risk/listofrisk',61,1,NULL),(63,'List of Risk Identified during this Period','reporti/risk/listofrisketc',61,2,NULL),(64,'Risk Treatment Report','reporti/risk/risktreatmentreport',50,2,NULL),(65,'Action Plan Execution','',50,3,NULL),(66,'List of All Action Plan Execution with Status','reporti/risk/listofall',65,1,NULL),(67,'List of All Action Plan Execution','reporti/risk/listofall1',65,2,NULL),(68,'Risk Table','reporti/risk_table',50,4,NULL),(69,'Comparison Risk between Period','reporti/risk/comparison1',68,1,NULL),(70,'Comparison 2nd Sub Category between Period','reporti/risk/comparison2',68,2,NULL),(71,'Top Ten Risk','reporti/risk/topten',50,5,NULL),(72,'Top Ten 2nd Sub Category','reporti/risk/topten2',50,6,NULL),(73,'Comparison of outcome','',50,7,NULL),(74,'by Risk','reporti/risk/getcomparison1',73,1,NULL),(75,'by 2nd Sub Category','reporti/risk/getcomparison2',73,2,NULL),(77,'KRI Monitoring','reporti/risk/KRI_monitoring',50,9,NULL),(78,'Pengaturan Library','',0,103,'icon-settings'),(79,'Risiko','Risiko',78,1,''),(80,'Daftar Risiko','libraryin/library/list_risk',79,1,''),(81,'Daftar Action Plan','libraryin/library/list_ap',79,2,''),(82,'Daftar Kontrol Eksisting','libraryin/library/list_ec',79,3,''),(83,'Taksonomi Risiko','libraryin/library/taksonomi',78,2,''),(84,'Key Risk Indicator','libraryin/library/kri',78,3,''),(85,'Eksekusi Action Plan Berkala','main/mainrac/actionplan_adt',24,3,''),(86,'Eksekusi Action Plan Berkala','maini/mainpic/actionplan_adt',24,2,''),(88,'Daftar Objektif','libraryin/list_objective',79,3,''),(89,'Risk Map','reporti/risk/riskmap',50,10,''),(551,'Daftar Semua Risiko','reporti/risk/getallrisk',50,1,''),(552,'Daftar Semua Risiko (Periode)','reporti/risk/getallriskperiode',50,2,NULL),(553,'Action Plan','reporti/risk/getactionplan',50,3,NULL),(554,'Pananganan Risiko','reporti/risk/gettreatment',50,4,NULL),(555,'Table Risiko','reporti/risk/gettable',50,5,NULL),(556,'Top Ten Risiko','reporti/risk/gettopten',50,6,NULL),(557,'KRI ','reporti/risk/getkri',50,7,NULL),(558,'Comparison Of Outcome','reporti/risk/getcomparison',50,8,NULL),(559,'Daftar 2nd Sub Category','reporti/risk/get2ndcategory',50,9,NULL),(577,'Pengembalian Risiko','riski/RiskRegister/recover',32,0,NULL),(578,'Report','admini/periode/periode_r',33,0,NULL),(600,'Dalam Perbaikan','riski/RiskRegister/undermaintenance',24,0,NULL);

#
# Structure for table "m_periode"
#

DROP TABLE IF EXISTS `m_periode`;
CREATE TABLE `m_periode` (
  `periode_id` int(11) NOT NULL AUTO_INCREMENT,
  `periode_name` varchar(200) DEFAULT NULL,
  `periode_start` date DEFAULT NULL,
  `periode_end` date DEFAULT NULL,
  `created_by` varchar(200) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`periode_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

#
# Data for table "m_periode"
#

INSERT INTO `m_periode` VALUES (1,'Semester 1','2016-01-01','2016-01-31','user_rac','2015-10-08 14:20:32'),(2,'Semester 2','2016-02-01','2016-02-29','user_rac','2015-10-08 14:20:19'),(3,'Semester 3','2016-03-01','2016-03-31','user_rac','2016-03-01 14:20:32'),(4,'Semester 4','2016-04-01','2016-04-30','user_rac','2016-04-01 14:20:32'),(5,'Semester 5','2016-05-01','2016-05-30','user_rac','2016-04-01 14:20:32'),(6,'Semester 6','2016-06-01','2016-06-30','user_it','2016-06-19 14:42:08');

#
# Structure for table "m_periode_hist"
#

DROP TABLE IF EXISTS `m_periode_hist`;
CREATE TABLE `m_periode_hist` (
  `periode_id` int(11) NOT NULL,
  `periode_name` varchar(200) DEFAULT NULL,
  `periode_start` date DEFAULT NULL,
  `periode_end` date DEFAULT NULL,
  `created_by` varchar(200) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `update_status` varchar(1) DEFAULT NULL,
  `update_by` varchar(200) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "m_periode_hist"
#


#
# Structure for table "m_periode_plan"
#

DROP TABLE IF EXISTS `m_periode_plan`;
CREATE TABLE `m_periode_plan` (
  `periode_id` int(11) NOT NULL AUTO_INCREMENT,
  `periode_name` varchar(200) DEFAULT NULL,
  `periode_start` date DEFAULT NULL,
  `periode_end` date DEFAULT NULL,
  `created_by` varchar(200) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`periode_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Data for table "m_periode_plan"
#

INSERT INTO `m_periode_plan` VALUES (2,'februaury','2016-04-01','2016-05-30','user_hr','2016-05-02 22:06:25');

#
# Structure for table "m_periode_plan_hist"
#

DROP TABLE IF EXISTS `m_periode_plan_hist`;
CREATE TABLE `m_periode_plan_hist` (
  `periode_id` int(11) NOT NULL,
  `periode_name` varchar(200) DEFAULT NULL,
  `periode_start` date DEFAULT NULL,
  `periode_end` date DEFAULT NULL,
  `created_by` varchar(200) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `update_status` varchar(1) DEFAULT NULL,
  `update_by` varchar(200) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "m_periode_plan_hist"
#

INSERT INTO `m_periode_plan_hist` VALUES (1,'periode test 1','2016-03-01','2016-03-31','user_it','2016-02-22 12:56:02','D','user_it','2016-02-22 13:03:44'),(2,'februaury','2016-03-01','2016-03-29','user_it','2016-02-22 13:09:38','U','head_hr','2016-04-28 10:13:51'),(2,'februaury','2016-01-01','2016-12-01','head_hr','2016-04-28 10:13:52','U','user_hr','2016-05-02 22:06:25');

#
# Structure for table "m_periode_report"
#

DROP TABLE IF EXISTS `m_periode_report`;
CREATE TABLE `m_periode_report` (
  `periode_id` int(11) NOT NULL AUTO_INCREMENT,
  `periode_name` varchar(200) DEFAULT NULL,
  `periode_start` date DEFAULT NULL,
  `periode_end` date DEFAULT NULL,
  PRIMARY KEY (`periode_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "m_periode_report"
#

INSERT INTO `m_periode_report` VALUES (1,'1','2016-04-01','2016-05-31');

#
# Structure for table "m_reference"
#

DROP TABLE IF EXISTS `m_reference`;
CREATE TABLE `m_reference` (
  `ref_context` varchar(100) NOT NULL DEFAULT '',
  `ref_key` varchar(100) NOT NULL DEFAULT '',
  `ref_value` varchar(200) DEFAULT NULL,
  `created_by` varchar(200) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `ref_value_i` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ref_context`,`ref_key`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "m_reference"
#

INSERT INTO `m_reference` VALUES ('impact.display','CATASTROPHIC','Catastrophic',NULL,NULL,'Berbahaya'),('impact.display','INSIGNIFICANT','Insignificant',NULL,NULL,'Tidak Signifikan'),('impact.display','MAJOR','Major',NULL,NULL,'Mayor'),('impact.display','MINOR','Minor',NULL,NULL,'Minor'),('impact.display','MODERATE','Moderate',NULL,NULL,'Sedang'),('impact.display','NA','N/A',NULL,NULL,'N/A'),('risk.status.user','0','Draft','admin','2015-11-05 05:59:53',NULL),('risk.status.user','1','Confirm',NULL,NULL,NULL),('risk.status.user','2','Submited to RAC',NULL,NULL,NULL),('risk.status.user','3','Verified by RAC',NULL,NULL,NULL),('risk.status.user','4','on Risk Treatment Process',NULL,NULL,NULL),('risk.status.user','5','on Action Plan Process',NULL,NULL,NULL),('risk.status.user','6','Action Plan Has Been Executed and Verified',NULL,NULL,NULL),('risklevel.display','HIGH','High',NULL,NULL,'Tinggi'),('risklevel.display','LOW','Low',NULL,NULL,'Rendah'),('risklevel.display','MODERATE','Moderate',NULL,NULL,'Sedang'),('treatment.status','ACCEPT','Accept',NULL,NULL,NULL),('treatment.status','MITIGATE','Mitigate',NULL,NULL,NULL),('treatment.status','TRANSFER','Transfer',NULL,NULL,NULL);

#
# Structure for table "m_reference_i"
#

DROP TABLE IF EXISTS `m_reference_i`;
CREATE TABLE `m_reference_i` (
  `ref_context` varchar(100) NOT NULL DEFAULT '',
  `ref_key` varchar(100) NOT NULL DEFAULT '',
  `ref_value` varchar(200) DEFAULT NULL,
  `created_by` varchar(200) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `ref_value_i` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ref_context`,`ref_key`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "m_reference_i"
#

INSERT INTO `m_reference_i` VALUES ('impact.display','CATASTROPHIC','Catastrophic',NULL,NULL,'Berbahaya'),('impact.display','INSIGNIFICANT','Insignificant',NULL,NULL,'Tidak Signifikan'),('impact.display','MAJOR','Major',NULL,NULL,'Mayor'),('impact.display','MINOR','Minor',NULL,NULL,'Minor'),('impact.display','MODERATE','Moderate',NULL,NULL,'Sedang'),('impact.display','NA','N/A',NULL,NULL,'N/A'),('risk.status.user','0','Draft','admin','2015-11-05 05:59:53',NULL),('risk.status.user','1','Confirm',NULL,NULL,NULL),('risk.status.user','2','Submited to RAC',NULL,NULL,NULL),('risk.status.user','3','Verified by RAC',NULL,NULL,NULL),('risk.status.user','4','on Risk Treatment Process',NULL,NULL,NULL),('risk.status.user','5','on Action Plan Process',NULL,NULL,NULL),('risk.status.user','6','Action Plan Has Been Executed and Verified',NULL,NULL,NULL),('risklevel.display','HIGH','Tinggi',NULL,NULL,'Tinggi'),('risklevel.display','LOW','Rendah',NULL,NULL,'Rendah'),('risklevel.display','MODERATE','Sedang',NULL,NULL,'Sedang'),('treatment.status','ACCEPT','Accept',NULL,NULL,NULL),('treatment.status','MITIGATE','Mitigate',NULL,NULL,NULL),('treatment.status','TRANSFER','Transfer',NULL,NULL,NULL);

#
# Structure for table "m_risk_category"
#

DROP TABLE IF EXISTS `m_risk_category`;
CREATE TABLE `m_risk_category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_code` varchar(100) DEFAULT NULL,
  `cat_name` varchar(300) NOT NULL DEFAULT '',
  `cat_desc` varchar(1000) DEFAULT NULL,
  `cat_parent` int(11) DEFAULT NULL,
  `created_by` varchar(200) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

#
# Data for table "m_risk_category"
#

INSERT INTO `m_risk_category` VALUES (1,'A','Risiko-risiko Strategis','Risiko yang dihasilkan dari ketidak-akuratan penetapan dan pelaksanaan strategi bisnis PII, ketidak-tepatan keputusan bisnis, atau ketidak-tanggapan terhadap perubahan-perubahan eksternal.',0,NULL,NULL),(2,'B','Risiko Finansial','Kategori ini mengklasifikasikan risiko yang pada umumnya terjadi karena ketidak-mampuan PII untuk mencapai target penerimaannya, kerugian dari penempatan dana investasi, dan ketidak-mampuan PII untuk memperoleh pendanaan / pembiayaan  baru, baik dari para kreditor maupun dari para pemegang saham',0,NULL,NULL),(3,'C','Risiko Operasional','Kategori risiko ini pada umumnya muncul dari pelaksanaan fungsi bisnis PII. Karena hal ini merupakan sebuah konsep yang sangat luas yang berfokus pada risiko-risiko yang timbul dari orang, sistem dan proses dimana perusahaan beroperasi (termasuk dari kegiatan penyediaan penjaminan sebagai bisnis utama PII).',0,NULL,NULL),(4,'A.1','Kelas Risiko Perencanaan dan Strategi','Risiko yang dihasilkan dari lemahnya konteks strategi dan isu perencanaan dari PII yang mungkin berdampak kepada nilai-nilai strategis PII dan performa sebagai sebuah organisasi.',1,NULL,NULL),(5,'B.1','Kelas Risiko Pasar (contoh. tingkat bunga, mata uang)','Kelas ini menyatukan risiko yang dihasilkan dari pergerakan faktor-faktor pasar yang merugikan yang mencakup tingkat bunga dan pertukaran mata uang asing dan harga ekuitas.',2,NULL,NULL),(6,'B.2','Kelas Risiko Likuiditas dan Kredit','Risiko-risiko finansial dalam kelas ini berhubungan dengan isu-isu likuiditas dan kelayakan kredit yang berhubungan dengan aset-aset dan pendapatan PII.',2,NULL,NULL),(7,'C.1','Kelas Risiko Operasional Umum','Risiko operasional umum biasanya berhubungan dengan ketidak-mampuan PII untuk mengoperasikan fungsi-fungsi bisnisnys secara efisien, yang menyebabkan kerugian operasional dari kegiatan-kegiatan diluar penyediaan penjaminan.',3,NULL,NULL),(8,'C.2','Kelas Risiko Penyediaan Penjaminan','Kelompok risiko ini mengklasifikasikan risiko-risiko operasional yang berhubungan dengan peran PII sebagai Badan Usaha Penjaminan Infrastruktur atau BUPI.',3,NULL,NULL),(9,'C.3','Kelas Risiko Hukum dan Kepatuhan','Kelompok risiko ini berhubungan dengan yang tidak patuh kepada PII sebagai sebuah organisasi terhadap hukum atau standar regulasi yang dapat berdampak terhadap nilai-nilai strategis PII dan kinerjanya sebagai sebuah organisasi.',3,NULL,NULL),(10,'A.1.1','Risiko Perencanaan Strategis/Strategic planning risk','Sebuah proses perencanaan strategis yang tidak dapat diimajinasikan dan rumit dapat mengakibatkan informasi yang tidak relevan yang mengancam kapasitas PII dalam merumuskan rencana bisnis yang berkelanjutan atau menghasilkan sasaran dan tujuan yang tidak sesuai.',4,NULL,NULL),(11,'A.1.2','Risiko Anggaran/Budget Risk','Tidak ada, tidak nyata, tidak relevan atau tidak dapat diandalkannya  informasi anggaran dan perencanaan dapat menyebabkan kesimpulan dan keputusan keuangan yang tidak tepat oleh manajemen PII.',4,NULL,NULL),(12,'A.1.3','Risiko Lingkungan Bisnis/Business environment risk','Kegagalan untuk mengawasi lingkungan eksternal atau formulasi dari asumsi yang tidak nyata/realistis atau salah mengenai risiko-risiko lingkungan bisnis dapat menyebabkan keputusan strategis yang tidak tepat oleh manajemen PII.',4,NULL,NULL),(13,'A.1.4','Risiko Model Bisnis/Business model risk','Risiko yang timbul akibat memiliki model bisnis yang usang dan PII tidak menyadarinya dan/atau kekurangan informasi yang diperlukan untuk membuat penilaian terbaru dan membangun suatu kemasan bisnis yang menarik untuk memodifikasi model tersebut pada waktunya.',4,NULL,NULL),(14,'A.1.5','Risiko Pengukuran/Measurement risk','Pengukuran performa dan financial yang tidak ada, tidak relevan atau tidak dapat diandalkan yang mungkin dapat mengancam kemampuan PII untuk melaksanakan strategi-strategi dan operasinya dan dapat mengakibatkan kegiatan yang saling bertentangan dan tidak terkoordinir di seluruh PII.',4,NULL,NULL),(15,'A.1.6','Risiko Struktur Organisasi/Organizational structure risk','Risiko yang dihasilkan dari struktur organisasi PII yang tidak efektif, yang mengancam kapasitasnya dalam mencapai tujuan jangka panjangnya',4,NULL,NULL),(16,'A.1.7','Risiko Sumber Daya Manusia/Human resource risk','Perencanaan/pengelolaan kinerja sumber daya manusia yang tidak mencukupi atau gagal dapat mencegah PII dalam mencapai visi dan misi strategisnya.',4,NULL,NULL),(17,'A.1.8','Risiko Manajemen dan Kepemimpinan/Leadership and management risk','Kekurangan/ketidak-cukupan keterampilan kepemimpinan dan manajemen dari manajemen senior PII yang dapat menghalangi perusahaan dalam menjalankan visi dan misi strategisnya',4,NULL,NULL),(18,'A.1.9','Risiko Tata Kelola Perusahaan/Corporate governance risk','Risiko yang datang dari potensi struktur tata kelola yang tidak tepat (termasuk delegasi kewenangan) antara para direktur, manajemen senior, dan staf, yang mengarah kepada pengambilan keputusan yang tidak tepat.',4,NULL,NULL),(19,'A.1.10','Risiko Informasi bagi Pengambilan Keputusan/Information for decision-making risk','Informasi yang tidak relevan atau tidak dapat diandalkan atau berkualitas rendah yang digunakan untuk mendukung pelaksanaan model bisnis PII, pelaporan internal dan eksternal atas kinerja dan evaluasi berkelanjutan terhadap keefektifan bisnis PII.',4,NULL,NULL),(20,'A.1.11','Risiko Informasi Keuangan/Accounting information risk','Penekanan yang terlalu berlebihan atas informasi akuntansi keuangan dalam mengelola bisnis dapat mengakibatkan manipulasi hasil/keluaran untuk mencapai target finansial dengan mengorbankan kepuasan pelanggan, kualitas dan efisiensi.',4,NULL,NULL),(21,'A.1.12','Risiko Manfaat yang Dirasakan/Perceived benefit risk','Manfaat hasil kerja dari PII dapat dirasakan secara berbeda oleh pelanggan disebabkan karena proses bisnis yang tidak efisien dan tidak fleksibel yang dapat mengarah pada ketidakberlangsungan permintaan bisnis.',4,NULL,NULL),(22,'A.1.13','Risiko Pemegang Saham/Shareholder risk','Pengharapan yang tidak realistis atau kesalahpahaman dari para pemegang saham dapat memberikan beban tambahan terhadap pencapaian visi dan misi korporat oleh manajemen PII. Risiko ini juga dapat dipicu oleh ketidak-efektifan dalam mengkomunikasikan struktur tata kelola, rencana strategis, kegiatan operasional, dan kinerja korporasi kepada para pemegang saham.',4,NULL,NULL),(23,'A.1.14','Risiko Stakeholder/Stakeholder risk','Para stakeholder yang tidak kompeten atau tidak cakap atau kurang-informasi dapat menghalangi PII dalam melaksanakan peran strategisnya sebagaimana diharapkan. Hal ini juga disebabkan oleh tantangan yang dihadapi oleh PII dalam menghadapi lingkungan birokratis dan dapat juga dipicu oleh ketidakefektifan dalam mengkomunikasikan informasi yang relevan kepada para stakeholder terkait.',4,NULL,NULL),(24,'A.1.15','Risiko Reputasi/Reputational risk','Risiko yang dihasilkan dari publikasi negatif sehubungan kegiatan bisnis PII atau persepsi negatif terhadap PII. Risiko ini berhubungan dengan kepercayaan terhadap binis dan mungkin dipicu oleh faktor internal atau eksternal. Rusaknya reputasi PII dapat mengakibatkan kehilangan pendapatan atau penghancuran nilai pemegang saham, bahkan jika PII tidak terbukti bersalah atas suatu kejahatan atau berada dalam situasi yang buruk.',4,NULL,NULL),(25,'B.1.1','Risiko Tingkat Bunga/Interest rate risk','Risiko yang memiliki tingkat variabilitas dalam nilai yang terdapat pada asset berbunga (contoh. pinjaman atau obligasi) yang berdampak pada kinerja keuangan PII (contoh: investasi obligasi bernilai rendah, meningkatnya hutang), yang disebabkan oleh variabilitas tingkat bunga.',5,NULL,NULL),(26,'B.1.2','Risiko Mata Uang/Currency risk','Risiko harga nilai tukar mata uang asing dan/atau volatilitas yang tersirat akan berubah, yang dapat mempengaruhi nilai asset milik PII yang mengunakan mata uang tersebut.',5,NULL,NULL),(27,'B.1.3','Risiko Ekuitas/Equity risk','Risiko dimana investasi PII akan terdepresiasi karena dinamika pasar saham yang menyebabkan seseorang kehilangan uangnya.\rB.1.4\tRisiko Kesulitan Keuangan/Financial distress risk\tRisiko yang disebabkan oleh runtuhnya seluruh sistem keuangan atau seluruh pasar (contoh. resiko sistemik) yang dapat memberikan dampak catastrophic bagi PII.',5,NULL,NULL),(28,'B.1.4','Risiko Kesulitan Keuangan/Financial distress risk','Risiko yang disebabkan oleh runtuhnya seluruh sistem keuangan atau seluruh pasar (contoh. resiko sistemik) yang dapat memberikan dampak catastrophic bagi PII.',5,NULL,NULL),(29,'B.1.5','Risiko Komoditas/Commodity risk','Risiko dari penurunan nilai pemasukan atau asset PII yang disebabkan oleh volatilitas biaya dan volume komoditas (contoh: batu bara)\rB.1.6\tRisiko Premi Asuransi/Insurance premium risk\tRisiko dari resiko-resiko PII manapun yang dapat diasuransikan pada tanggal penandatanganan asuransi yang disetujui namun kemudian menjadi tidak dapat diasuransikan atau menghadapi kenaikan harga yang tinggi pada rate di mana premi asuransi tersebut dihitung.',5,NULL,NULL),(30,'B.1.6','Risiko Premi Asuransi/Insurance premium risk','Risiko dari resiko-resiko PII manapun yang dapat diasuransikan pada tanggal penandatanganan asuransi yang disetujui namun kemudian menjadi tidak dapat diasuransikan atau menghadapi kenaikan harga yang tinggi pada rate di mana premi asuransi tersebut dihitung.',5,NULL,NULL),(31,'B.2.1','Risiko Kecukupan Modal/Capital adequacy risk','Risiko PII mungkin tidak memiliki cadangan modal untuk mengoperasikan bisnisnya atau untuk menyerap kerugian-kerugian tidak terduga yang muncul dari klaim penjaminan, risiko-risiko investasi dan operasional.',6,NULL,NULL),(32,'B.2.2','Risiko Pencadangan Modal/Capital provisioning risk','Risiko ini dipicu oleh pengaturan cadangan modal yang tidak tepat (contoh. kekurangan cadangan atau kelebihan cadangan) yang dapat berdampak pada ketidak-efisiensian dalam kinerja keuangan dan operasional PII.',6,NULL,NULL),(33,'B.2.3','Risiko Konsentrasi/Concentration risk','Distribusi yang tidak merata dari exposure jaminan PII dan/atau portofolio investasi yang dapat meningkatkan potensi kerugian atau kemungkinan default dari portofolio.',6,NULL,NULL),(34,'B.2.4','Risiko Penetapan Harga/Pricing risk','Risiko yang berakar pada penetapan harga yang terlalu rendah atau terlalu tinggi atas penjaminan yang disebabkan oleh kerangka kerja penetapan harga yang tidak tepat atau tidak akurat, yang dapat berdampak pada kinerja pendapatan PII.',6,NULL,NULL),(35,'B.2.5','Risiko Likuiditas/Liquidity risk','Risiko yang mungkin muncul di mana PII tidak dapat memenuhi kewajibannya disebabkan oleh ketidak-mampuan PII untuk memenuhi likuiditas yang diperlukan di dalam suatu jangka waktu tertentu (contoh. resiko likuiditas arus uang), atau ketidak-mampuan PII untuk melikuidasi instrument keuangan yang diperlukan tanpa mengalami kerugian keuangan yang tidak normal pada sebuah transaksi (contoh. resiko likuiditas pasar).',6,NULL,NULL),(36,'B.2.6','Risiko Kredit Investasi/Investment?s Credit Risk','Risiko kerugian investasi PII yang disebabkan oleh kegagalan penerbit obligasi untuk membayar kewajibannya (contoh. kupon bunga dan/atau bunga utama) atau kegagalan bank untuk memenuhi kewajibannya atas deposito (contoh. bunga dan bunga utama) yang disebabkan default, masalah likuiditas atau kebangkrutan.',6,NULL,NULL),(37,'C.1.1','Risiko Personil Utama/Key personnel risk','Risiko ini berasal dari kegagalan key management untuk menjalankan tugas resmi mereka sebagai akibat dari berbagai alasan, seperti gesekan yang tinggi, sakit yang terlalu lama, etc.',7,NULL,NULL),(38,'C.1.2','Risiko Fraud Internal/Internal fraud risk','Risiko ini dapat berasal dari penyalahgunaan aset, penghindaran pajak, salah penempatan jabatan yang disengaja, penyuapan, etc.',7,NULL,NULL),(39,'C.1.3','Risiko Fraud Eksternal/External fraud risk','Risiko ini berasal dari pencurian informasi, kerusakan peretasan, pencurian pihak ketiga, pemalsuan, etc.',7,NULL,NULL),(40,'C.1.4','Risiko Praktek Ketenagakerjaan/Employment practices risk','Risiko ini berasal dari kegagalan PII sebagai perusahaan yang memberikan kesempatan yang sama dalam mencegah diskriminasi jenis kelamin, ras, warna kulit, dll.',7,NULL,NULL),(41,'C.1.5','Risiko Kerusakan Aset Fisik/Damage to physical assets risk','Risiko ini berhubungan dengan kerusakan aset fisik yang disebabkan oleh bencana alam, terorisme, perusakan, dll.',7,NULL,NULL),(42,'C.1.6','Risiko Gangguan Bisnis/Business disruptions risk','Risiko ini berhubungan dengan gangguan dalam kegiatan bisnis sebagai akibat dari gangguan utilitas, kegagalan perangkat lunak, dan perangkat keras.',7,NULL,NULL),(43,'C.1.7','Risiko Pelaksanaan dan Proses/Delivery and process risk','Risiko yang dihasilkan dari kegagalan atau pelanggaran dalam prosedur internal, orang-orang dan sistem yang mungkin berhubungan dengan kesalahan karena kelalaian (contoh. kesalahan pemasukan data, kesalahan akunting,  kegagalan memberikan laporan yang diwajibkan / diperintahkan, kerugian asset karena kelalaian, dll) menyebabkan kegagalan atau kerugian operasional bagi PII sebagai sebuah perusahaan.',7,NULL,NULL),(44,'C.1.8','Risiko Keselamatan di Tempat Kerja/Workplace safety risk','Risiko ini berhubungan dengan kegagalan PII dalam memberikan lingkungan kerja yang aman dan kondusif yang dapat menyebabkan kegagalan atau kerugian operasional bagi PII sebagai sebuah perusahaan.',7,NULL,NULL),(45,'C.1.9','Risiko Pengadaan Pihak Ketiga/Procurement of 3rd party risk','Risiko ini berhubungan dengan kegagalan untuk mempertahankan kredibilitas dan daya saing dari proses pengadaan  pemasok/konsulan pihak ketiga yang disebabkan oleh kurangnya pemahaman akan persyaratan layanan, kondisi pasar dan metode/dokumentasi pengadaan yang relevan.',7,NULL,NULL),(46,'C.2.1','Risiko Klaim Penjaminan (diluar kendali CA)/Guarantee claim risk (beyond CA control)','Terjadinya klaim jaminan yang terduga maupun tidak terduga yang dipicu oleh lingkup dan tingkat risiko bawaan dari masing-masing proyek yang dijamin yang dapat berdampak goncangan besar terhadap posisi modal dan kinerja operasional PII.',8,NULL,NULL),(47,'C.2.2','Risiko Kelebihan Biaya atau Waktu/Cost or time overruns risk','Risiko proyek memerlukan waktu lebih lama untuk diselesaikan atau diimplementasikan, atau menghabiskan dana lebih banyak dari yang telah diantisipasi yang dapat mengakibatkan rusaknya reputasi PII (atau pemerintah).',8,NULL,NULL),(48,'C.2.3','Risiko Proyek Pipeline/Project pipeline risk','Risiko tidak tercapainya kinerja operasional PII karena faktor eksternal/ketidakpastian yang tinggi dari proyek pipeline yang dipengaruhi oleh in (action) PJPK dan lembaga Pemerintahan.',8,NULL,NULL),(49,'C.2.4','Risiko Pre-Appraisal (termasuk TGA)/Pre-appraisal risk (including TGA)','Risiko sumber daya yang dialokasikan PII untuk mempersiapkan proyek yang mengajukan untuk dijamin oleh PII tidak memberikan hasil seperti yang diharapkan (contoh. GAP tidak siap untuk diserahkan), yang disebabkan oleh in (action)  PJPK dan lembaga Pemerintahan.',8,NULL,NULL),(50,'C.2.5','Risiko Evaluasi Penjaminan/Guarantee appraisal risk','Risiko hasil evaluasi penjaminan menyatakan bahwa proyek gagal untuk memenuhi kriteria evaluasi, sedangkan alokasi sumber daya PII telah dilakukan.',8,NULL,NULL),(51,'C.2.6','Risiko Kesalahan Pembayaran Klaim/False claim payment risk','Pembayaran klaim yang didasarkan pada dokumentasi klaim yang terbukti salah atau pada proses penafsiran klaim yang tidak dapat diandalkan dapat berdampak pada kegagalan mekanisme recourse dan kerugian besar pada modal PII.',8,NULL,NULL),(52,'C.2.7','Risiko Mekanisme Recourse/Recourse mechanism risk','Mekanisme recourse yang gagal atau yang tidak dapat diandalkan atas jaminan yang diberikan oleh PII sebagai jalur pemulihan pembayaran klaim yang dilakukan terhadap penerima jaminan.',8,NULL,NULL),(53,'C.2.8','Kemitraan Kredit/Credit counterparty','Risiko dari kemitraan tidak akan memenuhi kewajiban sesuai kontrak. Kemitraan harus dipertimbangkan pada saat meleakukan evaluasi kontrak.',8,NULL,NULL),(54,'C.2.9','Transaksi Proyek Gagal/Failed project transaction','Risiko dari kegagalan proyek untuk mencapai Financial Close/ mencapai implementasi yang disebabkan oleh kurangnya/tidak adanya ketertarikan dari (pemodal) selera pasar terhadap proyek tersebut.',8,NULL,NULL),(55,'C.3.1','Risiko Kepatuhan/Compliance risk','Risiko yang dihasilkan dari pelanggaran atau ketidak-patuhan terhadap regulasi internal dan eksternal termasuk standar regulasi (contoh. standar akunting) yang dapat berdampak terhadap nilai-nilai strategis PII dan kinerjanya sebagai sebuah organisasi.',9,NULL,NULL),(56,'C.3.2','Risiko Regulasi/Regulatory risk','Risiko akibatnya kurangnya kualitas hukum dan regulasi yang ada, termasuk lemahnya penerapan hukum dan regulasi yang ada oleh pemerintah atau  pihak regulator lainnya, dan perubahan hukum dan regulasi yang dapat berdampak material terhadap kegiatan operasional PII.',9,NULL,NULL),(57,'C.3.3','Risiko Hukum/Legal risk','Risiko yang dihasilkan dari aspek yuridis yang lemah yang dapat diakibatkan oleh klaim hukum, tidak adanya regulasi legislatif pendukung, atau perjanjian yang kurang baik, seperti, persyaratan kontrak yang tidak lengkap. Risiko ini juga muncul ketika kemitraan tidak dapat berkontrak secara hukum akibat tindakan hukum atau ketidakpastian dalam penerapan atau interpretasi kontrak, hukum dan regulasi.',9,NULL,NULL),(58,'C.3.4','Risiko Kode Etik/Code of Conducts risk','Risiko ini dipicu oleh praktek atau kegiatan bisnis illegal atau bisnis yang tidak pantas dilakukan oleh PII atau karyawannya.',9,NULL,NULL);

#
# Structure for table "m_risk_control"
#

DROP TABLE IF EXISTS `m_risk_control`;
CREATE TABLE `m_risk_control` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `control_desc` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "m_risk_control"
#


#
# Structure for table "m_risk_existing_control"
#

DROP TABLE IF EXISTS `m_risk_existing_control`;
CREATE TABLE `m_risk_existing_control` (
  `id` varchar(100) NOT NULL DEFAULT '',
  `risk_id` int(11) NOT NULL,
  `existing_control` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "m_risk_existing_control"
#

INSERT INTO `m_risk_existing_control` VALUES ('2',2,'Not Effective (2)','Kontrol secara desain tersedia namun sangat kurang berfungsi/tidak memadai'),('3',3,'Less Effective (3)','Kontrol secara desain kurang berfungsi optimal'),('4',4,'Effective (4)','Kontrol berfungsi sesuai desain dengan hasil memuaskan/optimal');

#
# Structure for table "m_risk_impact"
#

DROP TABLE IF EXISTS `m_risk_impact`;
CREATE TABLE `m_risk_impact` (
  `impact_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `impact_category` varchar(200) DEFAULT NULL,
  `lvl_1_value` varchar(100) DEFAULT 'INSIGNIFICANT',
  `lvl_1_desc` varchar(200) DEFAULT NULL,
  `lvl_2_value` varchar(100) DEFAULT 'MINOR',
  `lvl_2_desc` varchar(200) DEFAULT NULL,
  `lvl_3_value` varchar(100) DEFAULT 'MODERATE',
  `lvl_3_desc` varchar(200) DEFAULT NULL,
  `lvl_4_value` varchar(100) DEFAULT 'MAJOR',
  `lvl_4_desc` varchar(200) DEFAULT NULL,
  `lvl_5_value` varchar(100) DEFAULT 'CATASTROPHIC',
  `lvl_5_desc` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`impact_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

#
# Data for table "m_risk_impact"
#

INSERT INTO `m_risk_impact` VALUES (1,'Financial Loss -  Operations (including TGA)*','INSIGNIFICANT','< Rp 2,5juta','MINOR','IDR 2 million- 50 milliion','MODERATE','IDR 50 million- 100 milliion','MAJOR','IDR 100 million - 10 billion','CATASTROPHIC','> IDR 10 billion'),(2,'Financial Loss - Investment, Guarantee Activities **','INSIGNIFICANT','< IDR 2 billion**','MINOR','IDR 2 billion- 9 billiion','MODERATE','IDR 9 billion- 14 billiion','MAJOR','IDR 14 billion- 20 billiion','CATASTROPHIC','> IDR 20 billion'),(3,'Ratio of Capital to Guarantee Exposure\r\nRatio of Capital to Guarantee Exposure','INSIGNIFICANT','> 1.5','MINOR','1.0 - 1.5','MODERATE','0.8 - 1.0','MAJOR','0.5 - 0.8','CATASTROPHIC','0.5'),(4,'Liquidity','INSIGNIFICANT','> 1.5 year operational cost','MINOR','1 - 1.5 year operational cost','MODERATE','6 months - 1 year operational cost','MAJOR','6 - 3 months operational cost','CATASTROPHIC','< 3 months operational cost'),(5,'Reputation','INSIGNIFICANT','Negative perception in internal environment and not related to integrity','MINOR','Negative exposure in region coverage and not related to integrity','MODERATE','Negative exposure in national coverage and not related to integrity','MAJOR','Negative exposure in national coverage and related to integrity','CATASTROPHIC','Negative exposure in national coverage and related to integrity followed by legal action'),(6,'Compliance','INSIGNIFICANT','Regulation violation that can be corrected instantly','MINOR','Regulation violation that is subject to warning letter','MODERATE','Regulation violation that is subject to fine or penalty','MAJOR','Regulation violation that may result in ke personnel imprisonment','CATASTROPHIC','Revocation of business license'),(7,'Health, Safety and Environment','INSIGNIFICANT','Cause minor injuries that require first aid','MINOR','Cause injuries that require intensive medical care','MODERATE','Cause bodily injury and/or permanent disability','MAJOR','Cause death','CATASTROPHIC','Cause death to more than 1 people');

#
# Structure for table "m_risk_impact_i"
#

DROP TABLE IF EXISTS `m_risk_impact_i`;
CREATE TABLE `m_risk_impact_i` (
  `impact_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `impact_category` varchar(200) DEFAULT NULL,
  `lvl_1_value` varchar(100) DEFAULT 'INSIGNIFICANT',
  `lvl_1_desc` varchar(200) DEFAULT NULL,
  `lvl_2_value` varchar(100) DEFAULT 'MINOR',
  `lvl_2_desc` varchar(200) DEFAULT NULL,
  `lvl_3_value` varchar(100) DEFAULT 'MODERATE',
  `lvl_3_desc` varchar(200) DEFAULT NULL,
  `lvl_4_value` varchar(100) DEFAULT 'MAJOR',
  `lvl_4_desc` varchar(200) DEFAULT NULL,
  `lvl_5_value` varchar(100) DEFAULT 'CATASTROPHIC',
  `lvl_5_desc` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`impact_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "m_risk_impact_i"
#

INSERT INTO `m_risk_impact_i` VALUES (1,'Kerugian Finansial - Operasi*','INSIGNIFICANT','< Rp 2,5juta','MINOR','Rp 2 juta - 50 juta','MODERATE','Rp 50 juta - 100 juta','MAJOR','Rp 100 juta - 10 miliar','CATASTROPHIC','> Rp 10 miliar'),(2,'Kerugian Finansial - Investasi, Jaminan','INSIGNIFICANT','< Rp 2 miliar','MINOR','Rp 2 miliar - 9 miliar','MODERATE','Rp 9 miliar - 14 miliar','MAJOR','Rp 14 miliar - 20 miliar','CATASTROPHIC','> Rp 20 miliar'),(3,'Rasio Modal terhadap Paparan jaminan','INSIGNIFICANT','> 1.5','MINOR','1.0 - 1.5','MODERATE','0.8 - 1.0','MAJOR','0.5 - 0.8','CATASTROPHIC','0.5'),(4,'Likuiditas','INSIGNIFICANT','> 1.5 tahun biaya operasioal','MINOR','1 - 1.5 tahun biaya operasioal','MODERATE','6 bulan - 1 tahun biaya operasioal','MAJOR','6 - 3 bulan biaya operasioal','CATASTROPHIC','< 3 bulan tahun biaya operasioal'),(5,'Reputasi','INSIGNIFICANT','Persepsi negatif dalam lingkungan internal dan tidak berhubungan dengan integritas','MINOR','Paparan negatif dalam cakupan wilayah dan tidak berhubungan dengan integritas','MODERATE','Paparan negatif dalam cakupan nasional dan tidak berhubungan dengan integritas','MAJOR','Paparan negatif dalam cakupan nasional dan terkait dengan integritas','CATASTROPHIC','Paparan negatif dalam cakupan nasional dan terkait dengan integritas diikuti dengan tindakan hukum'),(6,'Kepatuhan','INSIGNIFICANT','Pelanggaran Peraturan yang dapat dikoreksi langsung','MINOR','Pelanggaran peraturan yang dikenakan surat peringatan','MODERATE','Pelanggaran peraturan yang dikenakan denda atau hukuman','MAJOR','Pelanggaran peraturan yang dapat mengakibatkan hukuman penjara','CATASTROPHIC','Pencabutan izin usaha'),(7,'Kesehatan, keselamatan dan lingkungan','INSIGNIFICANT','Menyebabkan cedera minor yang membutuhkan pertolongan pertama','MINOR','Menyebabkan cedera yang membutuhkan perawatan medis intensif','MODERATE','Menyebabkan cedera tubuh dan/atau cacat permanen','MAJOR','Menyebabkan kematian','CATASTROPHIC','Menyebabkan kematian lebih dari 1 orang');

#
# Structure for table "m_risklevel_matrix"
#

DROP TABLE IF EXISTS `m_risklevel_matrix`;
CREATE TABLE `m_risklevel_matrix` (
  `impact_value` varchar(100) NOT NULL DEFAULT '',
  `likelihood_key` varchar(100) NOT NULL DEFAULT '',
  `risk_level` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`impact_value`,`likelihood_key`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "m_risklevel_matrix"
#

INSERT INTO `m_risklevel_matrix` VALUES ('CATASTROPHIC','HIGH','HIGH'),('CATASTROPHIC','LOW','MODERATE'),('CATASTROPHIC','MEDIUM','HIGH'),('CATASTROPHIC','VERY HIGH','HIGH'),('CATASTROPHIC','VERY LOW','MODERATE'),('INSIGNIFICANT','HIGH','MODERATE'),('INSIGNIFICANT','LOW','LOW'),('INSIGNIFICANT','MEDIUM','LOW'),('INSIGNIFICANT','VERY HIGH','MODERATE'),('INSIGNIFICANT','VERY LOW','LOW'),('MAJOR','HIGH','HIGH'),('MAJOR','LOW','MODERATE'),('MAJOR','MEDIUM','HIGH'),('MAJOR','VERY HIGH','HIGH'),('MAJOR','VERY LOW','LOW'),('MINOR','HIGH','MODERATE'),('MINOR','LOW','LOW'),('MINOR','MEDIUM','MODERATE'),('MINOR','VERY HIGH','HIGH'),('MINOR','VERY LOW','LOW'),('MODERATE','HIGH','HIGH'),('MODERATE','LOW','MODERATE'),('MODERATE','MEDIUM','MODERATE'),('MODERATE','VERY HIGH','HIGH'),('MODERATE','VERY LOW','LOW');

#
# Structure for table "m_role"
#

DROP TABLE IF EXISTS `m_role`;
CREATE TABLE `m_role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(200) NOT NULL,
  `created_by` varchar(200) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

#
# Data for table "m_role"
#

INSERT INTO `m_role` VALUES (1,'Administrator',NULL,NULL),(2,'Admin RAC',NULL,NULL),(3,'User',NULL,NULL),(4,'Division Head','admin','2015-10-25 13:35:03'),(5,'PIC','admin','2015-10-29 03:28:10');

#
# Structure for table "m_role_hist"
#

DROP TABLE IF EXISTS `m_role_hist`;
CREATE TABLE `m_role_hist` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(200) NOT NULL,
  `created_by` varchar(200) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `update_status` varchar(1) DEFAULT NULL,
  `update_by` varchar(200) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "m_role_hist"
#


#
# Structure for table "m_role_menu"
#

DROP TABLE IF EXISTS `m_role_menu`;
CREATE TABLE `m_role_menu` (
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  KEY `m_role` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "m_role_menu"
#

INSERT INTO `m_role_menu` VALUES (4,24),(4,26),(4,25),(4,27),(4,30),(4,28),(4,29),(5,30),(5,26),(5,25),(5,27),(5,24),(5,28),(5,29),(3,23),(3,24),(3,26),(3,25),(3,27),(3,28),(3,29),(2,38),(2,45),(2,46),(2,44),(2,47),(2,34),(2,35),(2,33),(2,36),(2,37),(2,43),(0,48),(2,32),(2,49),(2,50),(2,51),(2,52),(2,53),(2,54),(2,56),(2,57),(2,58),(2,55),(2,59),(2,60),(2,61),(2,62),(2,63),(2,64),(2,65),(2,66),(2,67),(2,68),(2,70),(2,69),(2,70),(2,71),(2,72),(2,73),(2,74),(2,75),(2,76),(2,77),(2,78),(2,79),(2,29),(2,577),(2,80),(2,81),(2,82),(2,83),(2,84),(2,87),(4,86),(2,78),(2,85),(2,578),(2,88),(2,89),(5,86),(2,600);

#
# Structure for table "m_role_status"
#

DROP TABLE IF EXISTS `m_role_status`;
CREATE TABLE `m_role_status` (
  `id_role_status` int(11) NOT NULL AUTO_INCREMENT,
  `role_status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_role_status`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Data for table "m_role_status"
#

INSERT INTO `m_role_status` VALUES (1,'PR (PIC Division - RAC)'),(2,'UR (User - RAC)'),(3,'HR (Head Division - RAC)'),(4,'NONE');

#
# Structure for table "m_user"
#

DROP TABLE IF EXISTS `m_user`;
CREATE TABLE `m_user` (
  `username` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL,
  `display_name` varchar(200) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `division_id` varchar(100) DEFAULT NULL,
  `created_by` varchar(200) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `role_status` varchar(255) DEFAULT 'NONE',
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "m_user"
#

INSERT INTO `m_user` VALUES ('admin','$2y$10$l.mQPD1fGe4QrkSIXnZv7ueyD.nReClhW43DEho3rSn0kKsKuVNau','Administrator',1,'No Division',NULL,NULL,NULL,NULL),('dede','$2y$10$l.mQPD1fGe4QrkSIXnZv7ueyD.nReClhW43DEho3rSn0kKsKuVNau','Dede Irawan',2,'Human Resource','user_it','2016-05-04 11:36:30','PR (PIC Division - RAC)',''),('head_hr','$2y$10$RLzKKF47fA2tlOPxyYiXauKlGowFDjRRa7cAjJxjw6CsSNmfHLD9u','Head of HR',4,'Human Resource','head_it','2016-01-09 15:46:43','HR (Head Division - RAC)',''),('head_it','$2y$10$RLzKKF47fA2tlOPxyYiXauKlGowFDjRRa7cAjJxjw6CsSNmfHLD9u','Head Of IT',4,'IT','user_hr','2016-04-15 16:32:41','HR (Head Division - RAC)',''),('pic_it','$2y$10$RLzKKF47fA2tlOPxyYiXauKlGowFDjRRa7cAjJxjw6CsSNmfHLD9u','PIC for IT Division',5,'IT','user_hr','2016-04-15 16:32:26','PR (PIC Division - RAC)',''),('user_hr','$2y$10$RLzKKF47fA2tlOPxyYiXauKlGowFDjRRa7cAjJxjw6CsSNmfHLD9u','Normal User HR',3,'Human Resource','user_it','2016-04-15 16:29:24','UR (User - RAC)',''),('user_it','$2y$10$RLzKKF47fA2tlOPxyYiXauKlGowFDjRRa7cAjJxjw6CsSNmfHLD9u','Normal User IT',2,'IT','user_it','2016-04-29 18:39:22','UR (User - RAC)','user.irawan@gmail.com'),('user_rac','$2y$10$RLzKKF47fA2tlOPxyYiXauKlGowFDjRRa7cAjJxjw6CsSNmfHLD9u','User Admin RAC',2,'RAC','admin','2015-11-02 16:19:25','NONE',NULL);

#
# Structure for table "m_user_hist"
#

DROP TABLE IF EXISTS `m_user_hist`;
CREATE TABLE `m_user_hist` (
  `username` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL,
  `display_name` varchar(200) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `division_id` varchar(100) DEFAULT NULL,
  `created_by` varchar(200) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `update_status` varchar(1) DEFAULT NULL,
  `update_by` varchar(200) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "m_user_hist"
#

INSERT INTO `m_user_hist` VALUES ('user','$2y$10$.9B4U9hLSsjtbrSLZCdcd.u7At8H8pVpTMU8J30uYGY7AW3Q7jL4G','Normal User HR',2,'Human Resource','admin','2015-10-25 21:20:39','D','admin','2015-10-25 21:22:56'),('user_it','$2y$10$HjL5.gWyqq1Vx85VCaGIy.Z7O5Mf5m2x3vf1YxEcD5pqRf3RylN1a','Normal User IT',2,'IT','admin','2015-10-25 21:21:43','U','admin','2015-10-25 23:24:39'),('user_it','$2y$10$HjL5.gWyqq1Vx85VCaGIy.Z7O5Mf5m2x3vf1YxEcD5pqRf3RylN1a','Normal User IT',2,'IT','admin','2015-10-25 21:21:43','U','admin','2015-10-25 23:26:37'),('user_it','$2y$10$HjL5.gWyqq1Vx85VCaGIy.Z7O5Mf5m2x3vf1YxEcD5pqRf3RylN1a','Normal User IT',2,'IT','admin','2015-10-25 21:21:43','U','admin','2015-10-25 23:29:19'),('user_it','$2y$10$HjL5.gWyqq1Vx85VCaGIy.Z7O5Mf5m2x3vf1YxEcD5pqRf3RylN1a','Normal User IT',2,'IT','admin','2015-10-25 21:21:43','U','admin','2015-10-25 23:29:52'),('user_it','$2y$10$HjL5.gWyqq1Vx85VCaGIy.Z7O5Mf5m2x3vf1YxEcD5pqRf3RylN1a','Normal User IT',2,'IT','admin','2015-10-25 21:21:43','U','admin','2015-10-25 23:30:53'),('user_it','$2y$10$HjL5.gWyqq1Vx85VCaGIy.Z7O5Mf5m2x3vf1YxEcD5pqRf3RylN1a','Normal User IT',2,'IT','admin','2015-10-25 21:21:43','U','admin','2015-10-25 23:34:08'),('user_it','$2y$10$HjL5.gWyqq1Vx85VCaGIy.Z7O5Mf5m2x3vf1YxEcD5pqRf3RylN1a','Normal User IT',2,'IT','admin','2015-10-25 21:21:43','U','admin','2015-10-25 23:59:09'),('user_it','$2y$10$HjL5.gWyqq1Vx85VCaGIy.Z7O5Mf5m2x3vf1YxEcD5pqRf3RylN1a','Normal User IT',2,'IT','admin','2015-10-25 21:21:43','U','admin','2015-10-26 00:01:35'),('user_it','$2y$10$HjL5.gWyqq1Vx85VCaGIy.Z7O5Mf5m2x3vf1YxEcD5pqRf3RylN1a','Normal User IT',2,'IT','admin','2015-10-25 21:21:43','U','admin','2015-10-26 00:03:21'),('user_hr','$2y$10$uQKKkihs0QLze3YbSZymrOPybXfeDwac.Mw5dl0kfL8LnIWV8CZpu','Normal User HR',2,'Human Resource','admin','2015-10-25 21:23:17','U','admin','2015-10-26 00:11:19'),('admin','$2y$10$l.mQPD1fGe4QrkSIXnZv7ueyD.nReClhW43DEho3rSn0kKsKuVNau','admin',1,'No Division',NULL,NULL,'D','user_hr','2015-10-26 00:15:39'),('user_hr','$2y$10$mKBEGCEDJY.SBPCZCa7oeOWUmzgcHjxdg85Bqb4FILytpWLnnv7Ii','Normal User HR',1,'Human Resource','admin','2015-10-26 00:11:19','U','admin','2015-10-26 00:17:48'),('user_it','$2y$10$HjL5.gWyqq1Vx85VCaGIy.Z7O5Mf5m2x3vf1YxEcD5pqRf3RylN1a','Normal User IT',1,'Human Resource','admin','2015-10-26 00:03:21','U','admin','2015-10-26 00:17:58'),('user_hr','$2y$10$mKBEGCEDJY.SBPCZCa7oeOWUmzgcHjxdg85Bqb4FILytpWLnnv7Ii','Normal User HR',2,'Human Resource','admin','2015-10-26 00:17:48','U','admin','2015-10-26 00:18:37'),('user_it','$2y$10$HjL5.gWyqq1Vx85VCaGIy.Z7O5Mf5m2x3vf1YxEcD5pqRf3RylN1a','Normal User IT',2,'IT','admin','2015-10-26 00:17:58','U','admin','2015-10-26 00:18:45'),('user_it','$2y$10$X5oANBRP5E50SYK3cauRoO1Za.5woI0ukcnMyhIJX9h38I97kV1AO','Normal User IT',2,'IT','admin','2015-10-26 00:18:45','U','admin','2015-10-26 02:01:12'),('user_it','$2y$10$X5oANBRP5E50SYK3cauRoO1Za.5woI0ukcnMyhIJX9h38I97kV1AO','Normal User IT',2,'Marketing','admin','2015-10-26 02:01:12','U','admin','2015-10-26 02:01:22'),('user_it','$2y$10$X5oANBRP5E50SYK3cauRoO1Za.5woI0ukcnMyhIJX9h38I97kV1AO','UserBaru',3,'IT','admin','2015-12-21 20:00:00','U','user_it','2015-12-21 16:24:59');

#
# Structure for table "m_user_login"
#

DROP TABLE IF EXISTS `m_user_login`;
CREATE TABLE `m_user_login` (
  `username` varchar(100) NOT NULL,
  `status_login` varchar(255) DEFAULT 'logout',
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "m_user_login"
#

INSERT INTO `m_user_login` VALUES ('admin','logout'),('dede','logout'),('head_hr','logout'),('head_it','logout'),('pic_it','logout'),('user_hr','logout'),('user_it','login'),('user_rac','logout');

#
# Structure for table "t_cat_sequence"
#

DROP TABLE IF EXISTS `t_cat_sequence`;
CREATE TABLE `t_cat_sequence` (
  `cat_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `seq` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

#
# Data for table "t_cat_sequence"
#

INSERT INTO `t_cat_sequence` VALUES (10,248),(42,6),(43,2),(44,2),(45,2),(46,2),(47,2),(48,2),(49,2),(50,2),(51,2),(52,2),(53,2),(54,2),(55,2),(56,2),(57,2),(58,2),(59,2),(60,2),(61,2),(62,2),(63,2),(64,2),(65,2),(66,2);

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
  `data_flag` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "t_cr_action_plan_change"
#


#
# Structure for table "t_cr_control"
#

DROP TABLE IF EXISTS `t_cr_control`;
CREATE TABLE `t_cr_control` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `change_id` int(11) DEFAULT NULL,
  `risk_id` int(11) DEFAULT NULL,
  `existing_control_id` int(11) DEFAULT NULL,
  `risk_existing_control` varchar(200) DEFAULT NULL,
  `risk_evaluation_control` varchar(200) DEFAULT NULL,
  `risk_control_owner` varchar(200) DEFAULT NULL,
  `switch_flag` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "t_cr_control"
#


#
# Structure for table "t_cr_control_change"
#

DROP TABLE IF EXISTS `t_cr_control_change`;
CREATE TABLE `t_cr_control_change` (
  `id` int(11) unsigned NOT NULL,
  `change_id` int(11) DEFAULT NULL,
  `risk_id` int(11) DEFAULT NULL,
  `existing_control_id` int(11) DEFAULT NULL,
  `risk_existing_control` varchar(200) DEFAULT NULL,
  `risk_evaluation_control` varchar(200) DEFAULT NULL,
  `risk_control_owner` varchar(200) DEFAULT NULL,
  `switch_flag` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "t_cr_control_change"
#


#
# Structure for table "t_cr_impact"
#

DROP TABLE IF EXISTS `t_cr_impact`;
CREATE TABLE `t_cr_impact` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `change_id` int(11) DEFAULT NULL,
  `risk_id` int(11) DEFAULT NULL,
  `impact_id` int(11) DEFAULT NULL,
  `impact_level` varchar(100) DEFAULT NULL,
  `switch_flag` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "t_cr_impact"
#


#
# Structure for table "t_cr_impact_change"
#

DROP TABLE IF EXISTS `t_cr_impact_change`;
CREATE TABLE `t_cr_impact_change` (
  `id` int(11) unsigned NOT NULL,
  `change_id` int(11) DEFAULT NULL,
  `risk_id` int(11) DEFAULT NULL,
  `impact_id` int(11) DEFAULT NULL,
  `impact_level` varchar(100) DEFAULT NULL,
  `switch_flag` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "t_cr_impact_change"
#


#
# Structure for table "t_cr_objective"
#

DROP TABLE IF EXISTS `t_cr_objective`;
CREATE TABLE `t_cr_objective` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `risk_id` varchar(100) DEFAULT NULL,
  `objective` varchar(255) DEFAULT NULL,
  `change_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "t_cr_objective"
#


#
# Structure for table "t_cr_objective_change"
#

DROP TABLE IF EXISTS `t_cr_objective_change`;
CREATE TABLE `t_cr_objective_change` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `risk_id` varchar(100) DEFAULT NULL,
  `objective` varchar(255) DEFAULT NULL,
  `change_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "t_cr_objective_change"
#


#
# Structure for table "t_cr_risk"
#

DROP TABLE IF EXISTS `t_cr_risk`;
CREATE TABLE `t_cr_risk` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cr_code` varchar(100) DEFAULT NULL,
  `cr_type` varchar(100) DEFAULT NULL,
  `cr_status` tinyint(1) DEFAULT NULL,
  `risk_id` int(11) DEFAULT NULL,
  `risk_cause` varchar(200) DEFAULT NULL,
  `risk_impact` varchar(200) DEFAULT NULL,
  `risk_level` varchar(100) DEFAULT NULL,
  `risk_impact_level` varchar(100) DEFAULT NULL,
  `risk_likelihood_key` varchar(100) DEFAULT NULL,
  `suggested_risk_treatment` varchar(200) DEFAULT NULL,
  `switch_flag` varchar(1) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `risk_event` varchar(500) NOT NULL DEFAULT '',
  `risk_description` varchar(500) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "t_cr_risk"
#


#
# Structure for table "t_cr_risk_change"
#

DROP TABLE IF EXISTS `t_cr_risk_change`;
CREATE TABLE `t_cr_risk_change` (
  `id` int(11) unsigned NOT NULL,
  `cr_code` varchar(100) DEFAULT NULL,
  `cr_type` varchar(100) DEFAULT NULL,
  `cr_status` tinyint(1) DEFAULT NULL,
  `risk_id` int(11) DEFAULT NULL,
  `risk_cause` varchar(200) DEFAULT NULL,
  `risk_impact` varchar(200) DEFAULT NULL,
  `risk_level` varchar(100) DEFAULT NULL,
  `risk_impact_level` varchar(100) DEFAULT NULL,
  `risk_likelihood_key` varchar(100) DEFAULT NULL,
  `suggested_risk_treatment` varchar(200) DEFAULT NULL,
  `switch_flag` varchar(1) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `risk_event` varchar(500) NOT NULL DEFAULT '',
  `risk_description` varchar(500) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "t_cr_risk_change"
#


#
# Structure for table "t_kri"
#

DROP TABLE IF EXISTS `t_kri`;
CREATE TABLE `t_kri` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kri_code` varchar(100) DEFAULT NULL,
  `risk_id` int(11) DEFAULT NULL,
  `kri_library_id` int(11) DEFAULT NULL,
  `key_risk_indicator` varchar(200) DEFAULT NULL,
  `kri_status` int(11) DEFAULT NULL,
  `treshold` varchar(200) DEFAULT NULL,
  `treshold_type` varchar(20) DEFAULT NULL,
  `timing_pelaporan` date DEFAULT NULL,
  `kri_owner` varchar(200) DEFAULT NULL,
  `kri_pic` varchar(100) DEFAULT NULL,
  `owner_report` varchar(200) DEFAULT NULL,
  `kri_warning` varchar(100) DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "t_kri"
#

INSERT INTO `t_kri` VALUES (1,'KRI.000001',1,NULL,'asdfgh',2,'asdfg','VALUE','2016-02-22','Human Resource','head_hr','50','GREEN','head_hr','2016-02-22 00:25:56');

#
# Structure for table "t_kri_risk"
#

DROP TABLE IF EXISTS `t_kri_risk`;
CREATE TABLE `t_kri_risk` (
  `risk_id` int(11) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "t_kri_risk"
#

INSERT INTO `t_kri_risk` VALUES (2),(1);

#
# Structure for table "t_kri_treshold"
#

DROP TABLE IF EXISTS `t_kri_treshold`;
CREATE TABLE `t_kri_treshold` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kri_id` int(11) DEFAULT NULL,
  `operator` varchar(100) DEFAULT NULL,
  `value_1` varchar(100) DEFAULT NULL,
  `value_2` varchar(100) DEFAULT NULL,
  `value_type` varchar(100) DEFAULT NULL,
  `result` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Data for table "t_kri_treshold"
#

INSERT INTO `t_kri_treshold` VALUES (1,1,'BELOW','50',NULL,'NUMERIC','GREEN'),(2,1,'BETWEEN','51','100','NUMERIC','GREEN'),(3,1,'ABOVE','150',NULL,'NUMERIC','GREEN');

#
# Structure for table "t_news"
#

DROP TABLE IF EXISTS `t_news`;
CREATE TABLE `t_news` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(500) DEFAULT NULL,
  `filename` varchar(200) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` varchar(200) DEFAULT NULL,
  `date_publish` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

#
# Data for table "t_news"
#

INSERT INTO `t_news` VALUES (14,'published','news11.pdf',1,'2015-12-28 12:57:20','user_it','2015-12-28 12:57:20'),(15,'Ini Baru Di publish dalam News','news111.pdf',1,'2015-12-29 14:03:39','user_it','2015-12-28 14:03:39'),(18,'Ini No publish','news112.pdf',1,'2015-12-30 13:31:45','user_it','2015-12-28 13:21:33');

#
# Structure for table "t_qna"
#

DROP TABLE IF EXISTS `t_qna`;
CREATE TABLE `t_qna` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `status` tinyint(1) NOT NULL,
  `subject` varchar(200) NOT NULL DEFAULT '',
  `question` varchar(1000) DEFAULT NULL,
  `answer` varchar(1000) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "t_qna"
#


#
# Structure for table "t_report_2ndsub"
#

DROP TABLE IF EXISTS `t_report_2ndsub`;
CREATE TABLE `t_report_2ndsub` (
  `periode_id` varchar(255) NOT NULL DEFAULT '',
  `cat_id` varchar(255) NOT NULL DEFAULT '',
  `cat_code` varchar(255) DEFAULT NULL,
  `cat_name` varchar(255) DEFAULT NULL,
  `impact_level` varchar(255) DEFAULT NULL,
  `likelihood_level` varchar(255) DEFAULT NULL,
  `risk_level` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`periode_id`,`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "t_report_2ndsub"
#

INSERT INTO `t_report_2ndsub` VALUES ('1','10','A.1.1','Risiko Perencanaan Strategis/Strategic planning risk','','',NULL);

#
# Structure for table "t_report_risk"
#

DROP TABLE IF EXISTS `t_report_risk`;
CREATE TABLE `t_report_risk` (
  `periode_id` varchar(255) NOT NULL DEFAULT '',
  `risk_id` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`periode_id`,`risk_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "t_report_risk"
#

INSERT INTO `t_report_risk` VALUES ('1','1'),('1','3');

#
# Structure for table "t_risk"
#

DROP TABLE IF EXISTS `t_risk`;
CREATE TABLE `t_risk` (
  `risk_id` int(11) NOT NULL AUTO_INCREMENT,
  `risk_code` varchar(100) DEFAULT NULL,
  `risk_date` datetime DEFAULT NULL,
  `risk_status` int(11) DEFAULT NULL,
  `periode_id` int(11) DEFAULT NULL,
  `risk_input_by` varchar(200) DEFAULT NULL,
  `risk_input_division` varchar(200) DEFAULT NULL,
  `risk_owner` varchar(200) DEFAULT NULL,
  `risk_division` varchar(200) DEFAULT NULL,
  `risk_library_id` int(11) DEFAULT NULL,
  `risk_event` varchar(500) NOT NULL DEFAULT '',
  `risk_description` varchar(500) NOT NULL DEFAULT '',
  `risk_category` int(11) DEFAULT NULL,
  `risk_sub_category` int(11) DEFAULT NULL,
  `risk_2nd_sub_category` int(11) DEFAULT NULL,
  `risk_cause` varchar(200) DEFAULT NULL,
  `risk_impact` varchar(200) DEFAULT NULL,
  `existing_control_id` int(11) DEFAULT NULL,
  `risk_existing_control` varchar(500) DEFAULT NULL,
  `risk_evaluation_control` varchar(100) DEFAULT NULL,
  `risk_control_owner` varchar(100) DEFAULT NULL,
  `risk_level` varchar(100) DEFAULT NULL,
  `risk_impact_level` varchar(100) DEFAULT NULL,
  `risk_likelihood_key` varchar(100) DEFAULT NULL,
  `suggested_risk_treatment` varchar(100) DEFAULT NULL,
  `risk_treatment_owner` varchar(200) DEFAULT NULL,
  `risk_level_after_mitigation` varchar(100) DEFAULT NULL,
  `risk_impact_level_after_mitigation` varchar(100) DEFAULT NULL,
  `risk_likelihood_key_after_mitigation` varchar(100) DEFAULT NULL,
  `risk_level_after_kri` varchar(100) DEFAULT NULL,
  `risk_impact_level_after_kri` varchar(100) DEFAULT NULL,
  `risk_likelihood_key_after_kri` varchar(100) DEFAULT NULL,
  `created_by` varchar(200) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `switch_flag` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`risk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "t_risk"
#

INSERT INTO `t_risk` VALUES (1,'A.1.1-247','2016-05-20 13:36:04',10,5,'user_it','IT','Human Resource','Human Resource',NULL,'user_it','user_it',1,4,10,'user_it','user_it',NULL,NULL,NULL,NULL,'LOW','INSIGNIFICANT','VERY LOW','ACCEPT','head_hr',NULL,NULL,NULL,NULL,NULL,NULL,'user_it','2016-05-20 14:14:13','P');

#
# Structure for table "t_risk_action_plan"
#

DROP TABLE IF EXISTS `t_risk_action_plan`;
CREATE TABLE `t_risk_action_plan` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `risk_id` int(11) DEFAULT NULL,
  `action_plan_status` int(11) DEFAULT NULL,
  `action_plan` varchar(1000) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `division` varchar(100) DEFAULT NULL,
  `assigned_to` varchar(200) DEFAULT NULL,
  `execution_status` varchar(100) DEFAULT NULL,
  `execution_explain` varchar(1000) DEFAULT NULL,
  `execution_evidence` varchar(1000) DEFAULT NULL,
  `execution_reason` varchar(1000) DEFAULT NULL,
  `revised_date` date DEFAULT NULL,
  `switch_flag` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Data for table "t_risk_action_plan"
#

INSERT INTO `t_risk_action_plan` VALUES (3,1,4,' user_it','2016-05-20','Human Resource','head_hr',NULL,NULL,NULL,NULL,NULL,'P');

#
# Structure for table "t_risk_action_plan_change"
#

DROP TABLE IF EXISTS `t_risk_action_plan_change`;
CREATE TABLE `t_risk_action_plan_change` (
  `id` int(11) DEFAULT NULL,
  `risk_id` int(11) DEFAULT NULL,
  `action_plan_status` int(11) DEFAULT NULL,
  `action_plan` varchar(1000) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `division` varchar(100) DEFAULT NULL,
  `assigned_to` varchar(200) DEFAULT NULL,
  `execution_status` varchar(100) DEFAULT NULL,
  `execution_explain` varchar(1000) DEFAULT NULL,
  `execution_evidence` varchar(1000) DEFAULT NULL,
  `execution_reason` varchar(1000) DEFAULT NULL,
  `revised_date` date DEFAULT NULL,
  `switch_flag` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "t_risk_action_plan_change"
#


#
# Structure for table "t_risk_action_plan_extend"
#

DROP TABLE IF EXISTS `t_risk_action_plan_extend`;
CREATE TABLE `t_risk_action_plan_extend` (
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
  `switch_flag` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "t_risk_action_plan_extend"
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

#
# Structure for table "t_risk_add_informasi"
#

DROP TABLE IF EXISTS `t_risk_add_informasi`;
CREATE TABLE `t_risk_add_informasi` (
  `risk_input_by` varchar(255) NOT NULL DEFAULT '',
  `periode_id` int(11) NOT NULL,
  `tanggal_submit` date DEFAULT NULL,
  `note` text,
  PRIMARY KEY (`risk_input_by`,`periode_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "t_risk_add_informasi"
#

INSERT INTO `t_risk_add_informasi` VALUES ('user_it',5,'2016-05-20',NULL);

#
# Structure for table "t_risk_add_user"
#

DROP TABLE IF EXISTS `t_risk_add_user`;
CREATE TABLE `t_risk_add_user` (
  `risk_id` int(11) NOT NULL DEFAULT '0',
  `username` varchar(100) NOT NULL DEFAULT '',
  `date_changed` date DEFAULT NULL,
  `delete_status` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`risk_id`,`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "t_risk_add_user"
#

INSERT INTO `t_risk_add_user` VALUES (1,'user_it','2016-05-20',NULL);

#
# Structure for table "t_risk_change"
#

DROP TABLE IF EXISTS `t_risk_change`;
CREATE TABLE `t_risk_change` (
  `risk_id` int(11) NOT NULL,
  `risk_code` varchar(100) DEFAULT NULL,
  `risk_date` datetime DEFAULT NULL,
  `risk_status` int(11) DEFAULT NULL,
  `periode_id` int(11) DEFAULT NULL,
  `risk_input_by` varchar(200) DEFAULT NULL,
  `risk_input_division` varchar(200) DEFAULT NULL,
  `risk_owner` varchar(200) DEFAULT NULL,
  `risk_division` varchar(200) DEFAULT NULL,
  `risk_library_id` int(11) DEFAULT NULL,
  `risk_event` varchar(500) NOT NULL DEFAULT '',
  `risk_description` varchar(500) NOT NULL DEFAULT '',
  `risk_category` int(11) DEFAULT NULL,
  `risk_sub_category` int(11) DEFAULT NULL,
  `risk_2nd_sub_category` int(11) DEFAULT NULL,
  `risk_cause` varchar(200) DEFAULT NULL,
  `risk_impact` varchar(200) DEFAULT NULL,
  `existing_control_id` int(11) DEFAULT NULL,
  `risk_existing_control` varchar(500) DEFAULT NULL,
  `risk_evaluation_control` varchar(100) DEFAULT NULL,
  `risk_control_owner` varchar(100) DEFAULT NULL,
  `risk_level` varchar(100) DEFAULT NULL,
  `risk_impact_level` varchar(100) DEFAULT NULL,
  `risk_likelihood_key` varchar(100) DEFAULT NULL,
  `suggested_risk_treatment` varchar(100) DEFAULT NULL,
  `risk_treatment_owner` varchar(200) DEFAULT NULL,
  `risk_level_after_mitigation` varchar(100) DEFAULT NULL,
  `risk_impact_level_after_mitigation` varchar(100) DEFAULT NULL,
  `risk_likelihood_key_after_mitigation` varchar(100) DEFAULT NULL,
  `risk_level_after_kri` varchar(100) DEFAULT NULL,
  `risk_impact_level_after_kri` varchar(100) DEFAULT NULL,
  `risk_likelihood_key_after_kri` varchar(100) DEFAULT NULL,
  `created_by` varchar(200) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `switch_flag` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "t_risk_change"
#

INSERT INTO `t_risk_change` VALUES (1,'A.1.1-247','2016-05-20 13:36:04',10,5,'user_it','IT','Human Resource','Human Resource',NULL,'user_it','user_it',1,4,10,'user_it','user_it',NULL,NULL,NULL,NULL,'LOW','INSIGNIFICANT','VERY LOW','ACCEPT','head_hr',NULL,NULL,NULL,NULL,NULL,NULL,'user_it','2016-05-20 14:14:13','P');

#
# Structure for table "t_risk_control"
#

DROP TABLE IF EXISTS `t_risk_control`;
CREATE TABLE `t_risk_control` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `risk_id` int(11) DEFAULT NULL,
  `existing_control_id` int(11) DEFAULT NULL,
  `risk_existing_control` varchar(200) DEFAULT NULL,
  `risk_evaluation_control` varchar(200) DEFAULT NULL,
  `risk_control_owner` varchar(200) DEFAULT NULL,
  `switch_flag` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Data for table "t_risk_control"
#

INSERT INTO `t_risk_control` VALUES (3,1,NULL,'Not Available','Not Available','Not Available','P');

#
# Structure for table "t_risk_control_change"
#

DROP TABLE IF EXISTS `t_risk_control_change`;
CREATE TABLE `t_risk_control_change` (
  `risk_id` int(11) DEFAULT NULL,
  `existing_control_id` int(11) DEFAULT NULL,
  `risk_existing_control` varchar(200) DEFAULT NULL,
  `risk_evaluation_control` varchar(200) DEFAULT NULL,
  `risk_control_owner` varchar(200) DEFAULT NULL,
  `switch_flag` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "t_risk_control_change"
#

INSERT INTO `t_risk_control_change` VALUES (1,NULL,'Not Available','Not Available','Not Available','P');

#
# Structure for table "t_risk_control_hist"
#

DROP TABLE IF EXISTS `t_risk_control_hist`;
CREATE TABLE `t_risk_control_hist` (
  `id` int(11) unsigned NOT NULL,
  `risk_id` int(11) DEFAULT NULL,
  `existing_control_id` int(11) DEFAULT NULL,
  `risk_existing_control` varchar(200) DEFAULT NULL,
  `risk_evaluation_control` varchar(200) DEFAULT NULL,
  `risk_control_owner` varchar(200) DEFAULT NULL,
  `switch_flag` varchar(1) DEFAULT NULL,
  `update_status` varchar(100) DEFAULT NULL,
  `update_by` varchar(200) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "t_risk_control_hist"
#

INSERT INTO `t_risk_control_hist` VALUES (12,1,NULL,'NONE','NONE','NONE','P','CHANGE_REQUEST-VERIFY','head_hr','2016-01-31 10:27:38'),(13,1,NULL,'NONE','NONE','NONE',NULL,'CHANGE_REQUEST-VERIFY','head_hr','2016-01-31 10:29:17'),(14,1,NULL,'NONE','NONE','NONE',NULL,'CHANGE_REQUEST-VERIFY','head_hr','2016-01-31 10:31:54'),(3,1,NULL,'NONE','NONE','NONE','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-03 13:42:22'),(8,1,NULL,'NONE','NONE','NONE',NULL,'CHANGE_REQUEST-VERIFY','user_it','2016-02-03 16:02:24'),(2,1,NULL,'NONE','NONE','NONE','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-05 15:25:49'),(3,1,NULL,'NONE','NONE','NONE',NULL,'CHANGE_REQUEST-VERIFY','user_it','2016-02-05 15:36:46'),(1,1,NULL,'NONE','NONE','NONE',NULL,'CHANGE_REQUEST-VERIFY','user_it','2016-02-07 13:35:09'),(2,1,NULL,'NONE','NONE','NONE','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-07 16:03:45'),(3,1,NULL,'NONE','NONE','NONE',NULL,'CHANGE_REQUEST-VERIFY','user_it','2016-02-07 16:09:41'),(10,3,NULL,'NONE','user hr','NONE','P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 00:37:40'),(2,1,NULL,'NONE','NONE','NONE','P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 10:12:25'),(1,1,NULL,'NONE','baru ','NONE',NULL,'CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 17:26:31'),(2,1,NULL,'NONE','ini baru user it','NONE','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-16 11:34:28'),(3,1,NULL,'NONE','NONEasd','NONE','P','CHANGE_REQUEST-VERIFY','head_hr','2016-02-21 23:29:55'),(4,1,NULL,'NONE','NONE','NONE','P','CHANGE_REQUEST-VERIFY','head_hr','2016-02-21 23:29:55'),(3,1,NULL,'NONE','Bissmillah revisi 3 pii','NONE','P','CHANGE_REQUEST-VERIFY','head_hr','2016-04-18 14:26:53'),(13,1,NULL,'NONE','updateRisk','NONE',NULL,'CHANGE_REQUEST-VERIFY','user_hr','2016-04-20 11:10:57'),(4,1,NULL,'NONE','bismillah revisi 3','NONE','P','CHANGE_REQUEST-VERIFY','user_hr','2016-04-26 15:46:10'),(5,1,NULL,'NONE','bismillah revisi 3','NONE','P','CHANGE_REQUEST-VERIFY','user_hr','2016-04-26 15:46:10'),(9,1,NULL,'NONE','bismillah revisi 3','NONE',NULL,'CHANGE_REQUEST-VERIFY','user_hr','2016-04-26 15:50:55'),(10,1,NULL,'NONE','bismillah revisi 3','NONE',NULL,'CHANGE_REQUEST-VERIFY','user_hr','2016-04-26 15:50:55'),(12,1,NULL,'NONE','bismillah revisi 3','NONE',NULL,'CHANGE_REQUEST-VERIFY','user_hr','2016-04-26 16:05:26'),(13,1,NULL,'NONE','bismillah revisi 3','NONE',NULL,'CHANGE_REQUEST-VERIFY','user_hr','2016-04-26 16:05:26'),(9,2,NULL,'Not Available','Not Available','Not Available','P','CHANGE_REQUEST-VERIFY','user_it','2016-05-02 23:56:52');

#
# Structure for table "t_risk_hist"
#

DROP TABLE IF EXISTS `t_risk_hist`;
CREATE TABLE `t_risk_hist` (
  `risk_id` int(11) NOT NULL,
  `risk_code` varchar(100) DEFAULT NULL,
  `risk_date` datetime DEFAULT NULL,
  `risk_status` int(11) DEFAULT NULL,
  `periode_id` int(11) DEFAULT NULL,
  `risk_input_by` varchar(200) DEFAULT NULL,
  `risk_input_division` varchar(200) DEFAULT NULL,
  `risk_owner` varchar(200) DEFAULT NULL,
  `risk_division` varchar(200) DEFAULT NULL,
  `risk_library_id` int(11) DEFAULT NULL,
  `risk_event` varchar(500) NOT NULL DEFAULT '',
  `risk_description` varchar(500) NOT NULL DEFAULT '',
  `risk_category` int(11) DEFAULT NULL,
  `risk_sub_category` int(11) DEFAULT NULL,
  `risk_2nd_sub_category` int(11) DEFAULT NULL,
  `risk_cause` varchar(200) DEFAULT NULL,
  `risk_impact` varchar(200) DEFAULT NULL,
  `existing_control_id` int(11) DEFAULT NULL,
  `risk_existing_control` varchar(500) DEFAULT NULL,
  `risk_evaluation_control` varchar(100) DEFAULT NULL,
  `risk_control_owner` varchar(100) DEFAULT NULL,
  `risk_level` varchar(100) DEFAULT NULL,
  `risk_impact_level` varchar(100) DEFAULT NULL,
  `risk_likelihood_key` varchar(100) DEFAULT NULL,
  `suggested_risk_treatment` varchar(100) DEFAULT NULL,
  `risk_treatment_owner` varchar(200) DEFAULT NULL,
  `risk_level_after_mitigation` varchar(100) DEFAULT NULL,
  `risk_impact_level_after_mitigation` varchar(100) DEFAULT NULL,
  `risk_likelihood_key_after_mitigation` varchar(100) DEFAULT NULL,
  `risk_level_after_kri` varchar(100) DEFAULT NULL,
  `risk_impact_level_after_kri` varchar(100) DEFAULT NULL,
  `risk_likelihood_key_after_kri` varchar(100) DEFAULT NULL,
  `created_by` varchar(200) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `switch_flag` varchar(1) DEFAULT NULL,
  `update_status` varchar(100) DEFAULT NULL,
  `update_by` varchar(200) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "t_risk_hist"
#

INSERT INTO `t_risk_hist` VALUES (1,'A.1.1-232','2016-05-17 10:12:57',0,5,'user_it','IT','Human Resource','Human Resource',NULL,'many to many','many to many',1,4,10,'many to many','many to many',NULL,NULL,NULL,NULL,'LOW','INSIGNIFICANT','VERY LOW','ACCEPT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'user_it','2016-05-17 10:12:57',NULL,'RISK_REGISTER-SUBMIT_PERIODE','user_it','2016-05-17 10:37:51'),(1,'A.1.1-232','2016-05-17 10:12:57',2,5,'user_it','IT','Human Resource','Human Resource',NULL,'many to many','many to many',1,4,10,'many to many','many to many',NULL,NULL,NULL,NULL,'LOW','INSIGNIFICANT','VERY LOW','ACCEPT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'user_it','2016-05-17 10:37:51',NULL,'U','user_it','2016-05-17 10:51:45'),(1,'A.1.1-232','2016-05-17 10:12:57',3,5,'user_it','IT','Human Resource','Human Resource',NULL,'many to many','many to many',1,4,10,'many to many','many to many',NULL,NULL,NULL,NULL,'LOW','INSIGNIFICANT','VERY LOW','ACCEPT','head_hr',NULL,NULL,NULL,NULL,NULL,NULL,'user_it','2016-05-17 10:51:45','P','U','user_it','2016-05-17 10:51:47'),(1,'A.1.1-232','2016-05-17 10:12:57',2,5,'user_it','IT','Human Resource','Human Resource',NULL,'many to many','many to many',1,4,10,'many to many','many to many',NULL,NULL,NULL,NULL,'LOW','INSIGNIFICANT','VERY LOW','ACCEPT','head_hr',NULL,NULL,NULL,NULL,NULL,NULL,'user_it','2016-05-17 10:51:47','P','U','user_it','2016-05-17 10:53:17'),(1,'A.1.1-232','2016-05-17 10:12:57',3,5,'user_it','IT','Human Resource','Human Resource',NULL,'many to many','many to many',1,4,10,'many to many','many to many',NULL,NULL,NULL,NULL,'LOW','INSIGNIFICANT','VERY LOW','ACCEPT','head_hr',NULL,NULL,NULL,NULL,NULL,NULL,'user_it','2016-05-17 10:53:17','P','U','user_it','2016-05-17 10:53:38'),(1,'A.1.1-232','2016-05-17 10:12:57',2,5,'user_it','IT','Human Resource','Human Resource',NULL,'many to many','many to many',1,4,10,'many to many','many to many',NULL,NULL,NULL,NULL,'LOW','INSIGNIFICANT','VERY LOW','ACCEPT','head_hr',NULL,NULL,NULL,NULL,NULL,NULL,'user_it','2016-05-17 10:53:38','P','U','user_it','2016-05-17 11:09:47'),(1,'A.1.1-232','2016-05-17 10:12:57',2,5,'user_it','IT','Human Resource','Human Resource',NULL,'many to many','many to many',1,4,10,'many to many','many to many',NULL,NULL,NULL,NULL,'LOW','INSIGNIFICANT','VERY LOW','ACCEPT','head_hr',NULL,NULL,NULL,NULL,NULL,NULL,'user_it','2016-05-17 11:09:47','P','U','user_it','2016-05-17 11:12:11'),(1,'A.1.1-232','2016-05-17 10:12:57',3,5,'user_it','IT','Human Resource','Human Resource',NULL,'many to many','many to many',1,4,10,'many to many','many to many',NULL,NULL,NULL,NULL,'LOW','INSIGNIFICANT','VERY LOW','ACCEPT','head_hr',NULL,NULL,NULL,NULL,NULL,NULL,'user_it','2016-05-17 11:12:11','P','U','user_hr','2016-05-17 12:20:06'),(2,'A.1.1-235','2016-05-17 14:13:24',0,5,'head_it','IT','Human Resource','Human Resource',NULL,'head_it','head_it',1,4,10,'head_it','head_it',NULL,NULL,NULL,NULL,'LOW','INSIGNIFICANT','VERY LOW','ACCEPT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'head_it','2016-05-17 14:13:24',NULL,'RISK_REGISTER-SUBMIT_PERIODE','head_it','2016-05-17 14:13:50'),(1,'A.1.1-236','2016-05-19 09:26:56',0,5,'user_it','IT','Human Resource','Human Resource',NULL,'bismillah punya user_it','bismillah punya user_it',1,4,10,'bismillah punya user_it','bismillah punya user_it',NULL,NULL,NULL,NULL,'LOW','INSIGNIFICANT','VERY LOW','ACCEPT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'user_it','2016-05-19 09:26:56',NULL,'RISK_REGISTER-SUBMIT_PERIODE','user_it','2016-05-19 09:34:56'),(1,'A.1.1-236','2016-05-19 09:26:56',0,5,'user_it','IT','Human Resource','Human Resource',NULL,'bismillah punya user_it','bismillah punya user_it',1,4,10,'bismillah punya user_it','bismillah punya user_it',NULL,NULL,NULL,NULL,'LOW','INSIGNIFICANT','VERY LOW','ACCEPT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'user_it','2016-05-19 09:26:56',NULL,'RISK_REGISTER-SUBMIT_PERIODE','user_it','2016-05-19 09:35:34'),(1,'A.1.1-236','2016-05-19 09:26:56',2,5,'user_it','IT','Human Resource','Human Resource',NULL,'bismillah punya user_it','bismillah punya user_it',1,4,10,'bismillah punya user_it','bismillah punya user_it',NULL,NULL,NULL,NULL,'LOW','INSIGNIFICANT','VERY LOW','ACCEPT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'user_it','2016-05-19 09:35:34',NULL,'U','user_it','2016-05-19 10:02:29'),(1,'A.1.1-236','2016-05-19 09:26:56',3,5,'user_it','IT','Human Resource','Human Resource',NULL,'bismillah punya user_it','bismillah punya user_it',1,4,10,'bismillah punya user_it','bismillah punya user_it',NULL,NULL,NULL,NULL,'LOW','INSIGNIFICANT','VERY LOW','ACCEPT','head_hr',NULL,NULL,NULL,NULL,NULL,NULL,'user_it','2016-05-19 10:02:29','P','U','user_hr','2016-05-19 10:07:23'),(2,'A.1.1-238','2016-05-19 10:32:41',0,5,'head_it','IT','Human Resource','Human Resource',NULL,'baru','baru',1,4,10,'baru','baru',NULL,NULL,NULL,NULL,'LOW','INSIGNIFICANT','VERY LOW','ACCEPT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'head_it','2016-05-19 10:32:41',NULL,'RISK_REGISTER-SUBMIT_PERIODE','head_it','2016-05-19 10:32:56'),(3,'A.1.1-236','2016-06-19 14:42:54',1,6,'user_it','IT','Human Resource','Human Resource',1,'bismillah punya user_it','bismillah punya user_it',1,4,10,'bismillah punya user_it','bismillah punya user_it',NULL,NULL,NULL,NULL,'LOW','INSIGNIFICANT','VERY LOW','ACCEPT','head_hr',NULL,NULL,NULL,NULL,NULL,NULL,'user_it','2016-05-19 10:07:24','u','RISK_REGISTER-SUBMIT_PERIODE','user_it','2016-06-19 14:43:32'),(1,'A.1.1-242','2016-05-19 15:54:28',0,5,'user_it','IT','Human Resource','Human Resource',NULL,'bismillah 1','bismillah 1',1,4,10,'bismillah 1','bismillah 1',NULL,NULL,NULL,NULL,'LOW','INSIGNIFICANT','VERY LOW','ACCEPT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'user_it','2016-05-19 15:54:28',NULL,'RISK_REGISTER-SUBMIT_PERIODE','user_it','2016-05-19 15:54:51'),(1,'A.1.1-242','2016-05-19 15:54:28',2,5,'user_it','IT','Human Resource','Human Resource',NULL,'bismillah 1','bismillah 1',1,4,10,'bismillah 1','bismillah 1',NULL,NULL,NULL,NULL,'LOW','INSIGNIFICANT','VERY LOW','ACCEPT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'user_it','2016-05-19 15:54:51',NULL,'U','user_it','2016-05-19 15:59:46'),(1,'A.1.1-243','2016-05-19 16:01:44',0,5,'user_it','IT','Human Resource','Human Resource',NULL,'asd','asd',1,4,10,'asd','asd',NULL,NULL,NULL,NULL,'LOW','INSIGNIFICANT','VERY LOW','ACCEPT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'user_it','2016-05-19 16:01:44',NULL,'RISK_REGISTER-SUBMIT_PERIODE','user_it','2016-05-19 16:02:05'),(1,'A.1.1-243','2016-05-19 16:01:44',2,5,'user_it','IT','Human Resource','Human Resource',NULL,'asd','asd',1,4,10,'asd','asd',NULL,NULL,NULL,NULL,'LOW','INSIGNIFICANT','VERY LOW','ACCEPT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'user_it','2016-05-19 16:02:05',NULL,'U','user_it','2016-05-19 16:02:59'),(1,'A.1.1-243','2016-05-19 16:01:44',5,5,'user_it','IT','Human Resource','Human Resource',NULL,'asd','asd',1,4,10,'asd','asd',NULL,NULL,NULL,NULL,'LOW','INSIGNIFICANT','VERY LOW','ACCEPT','head_hr',NULL,NULL,NULL,NULL,NULL,NULL,'user_it','2016-05-19 16:02:59','P','U','head_hr','2016-05-19 16:36:02'),(2,'A.1.1-244','2016-05-19 22:53:02',0,5,'head_hr','Human Resource','Human Resource','Human Resource',NULL,'asd','asd',1,4,10,'asd','asd',NULL,NULL,NULL,NULL,'LOW','INSIGNIFICANT','VERY LOW','ACCEPT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'head_hr','2016-05-19 22:53:02',NULL,'RISK_REGISTER-SUBMIT_PERIODE','head_hr','2016-05-20 09:56:49'),(2,'A.1.1-244','2016-05-19 22:53:02',2,5,'head_hr','Human Resource','Human Resource','Human Resource',NULL,'asd','asd',1,4,10,'asd','asd',NULL,NULL,NULL,NULL,'LOW','INSIGNIFICANT','VERY LOW','ACCEPT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'head_hr','2016-05-20 09:56:50',NULL,'U','head_hr','2016-05-20 09:57:33'),(2,'A.1.1-244','2016-05-19 22:53:02',5,5,'head_hr','Human Resource','Human Resource','Human Resource',NULL,'asd','asd',1,4,10,'asd','asd',NULL,NULL,NULL,NULL,'LOW','INSIGNIFICANT','VERY LOW','ACCEPT','head_hr',NULL,NULL,NULL,NULL,NULL,NULL,'head_hr','2016-05-20 09:57:33','P','U','head_hr','2016-05-20 10:01:19'),(2,'A.1.1-244','2016-05-19 22:53:02',5,5,'head_hr','Human Resource','Human Resource','Human Resource',NULL,'asd','asd',1,4,10,'asd','asd',NULL,'under',NULL,NULL,'LOW','INSIGNIFICANT','VERY LOW','ACCEPT','head_hr',NULL,NULL,NULL,NULL,NULL,NULL,'head_hr','2016-05-20 09:57:33','P','U','head_hr','2016-05-20 10:03:24'),(2,'A.1.1-244','2016-05-19 22:53:02',6,5,'head_hr','Human Resource','Human Resource','Human Resource',NULL,'asd','asd',1,4,10,'asd','asd',NULL,'under',NULL,NULL,'LOW','INSIGNIFICANT','VERY LOW','ACCEPT','head_hr',NULL,NULL,NULL,NULL,NULL,NULL,'head_hr','2016-05-20 09:57:33','P','U','head_hr','2016-05-20 10:14:44'),(2,'A.1.1-244','2016-05-19 22:53:02',6,5,'head_hr','Human Resource','Human Resource','Human Resource',NULL,'asd','asd',1,4,10,'asd','asd',NULL,'under',NULL,NULL,'LOW','INSIGNIFICANT','VERY LOW','ACCEPT','head_hr',NULL,NULL,NULL,NULL,NULL,NULL,'head_hr','2016-05-20 10:14:44','P','U','head_hr','2016-05-20 10:27:01'),(1,'A.1.1-243','2016-05-19 16:01:44',6,5,'user_it','IT','Human Resource','Human Resource',NULL,'asd','asd',1,4,10,'asd xxx 123','asdxxx',NULL,NULL,NULL,NULL,'LOW','INSIGNIFICANT','VERY LOW','ACCEPT','head_hr',NULL,NULL,NULL,NULL,NULL,NULL,'user_it','2016-05-19 16:02:59','P','U','user_hr','2016-05-20 10:36:43'),(3,'A.1.1-246','2016-05-20 11:18:02',0,5,'head_it','IT','Human Resource','Human Resource',NULL,'textarea action plan','textarea action plan',1,4,10,'textarea action plan','textarea action plan',NULL,NULL,NULL,NULL,'LOW','INSIGNIFICANT','VERY LOW','ACCEPT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'head_it','2016-05-20 11:18:02',NULL,'RISK_REGISTER-SUBMIT_PERIODE','head_it','2016-05-20 11:20:35'),(3,'A.1.1-246','2016-05-20 11:18:02',2,5,'head_it','IT','Human Resource','Human Resource',NULL,'textarea action plan','textarea action plan',1,4,10,'textarea action plan','textarea action plan',NULL,NULL,NULL,NULL,'LOW','INSIGNIFICANT','VERY LOW','ACCEPT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'head_it','2016-05-20 11:20:35',NULL,'U','head_it','2016-05-20 13:30:52'),(1,'A.1.1-247','2016-05-20 13:36:04',0,5,'user_it','IT','Human Resource','Human Resource',NULL,'user_it','user_it',1,4,10,'user_it','user_it',NULL,NULL,NULL,NULL,'LOW','INSIGNIFICANT','VERY LOW','ACCEPT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'user_it','2016-05-20 13:36:04',NULL,'RISK_REGISTER-SUBMIT_PERIODE','user_it','2016-05-20 13:37:17'),(1,'A.1.1-247','2016-05-20 13:36:04',2,5,'user_it','IT','Human Resource','Human Resource',NULL,'user_it','user_it',1,4,10,'user_it','user_it',NULL,NULL,NULL,NULL,'LOW','INSIGNIFICANT','VERY LOW','ACCEPT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'user_it','2016-05-20 13:37:17',NULL,'U','user_it','2016-05-20 14:14:13'),(1,'A.1.1-247','2016-05-20 13:36:04',5,5,'user_it','IT','Human Resource','Human Resource',NULL,'user_it','user_it',1,4,10,'user_it','user_it',NULL,NULL,NULL,NULL,'LOW','INSIGNIFICANT','VERY LOW','ACCEPT','head_hr',NULL,NULL,NULL,NULL,NULL,NULL,'user_it','2016-05-20 14:14:13','P','U','head_hr','2016-05-20 15:41:45');

#
# Structure for table "t_risk_impact"
#

DROP TABLE IF EXISTS `t_risk_impact`;
CREATE TABLE `t_risk_impact` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `risk_id` int(11) DEFAULT NULL,
  `impact_id` int(11) DEFAULT NULL,
  `impact_level` varchar(100) DEFAULT NULL,
  `switch_flag` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

#
# Data for table "t_risk_impact"
#

INSERT INTO `t_risk_impact` VALUES (8,1,1,'INSIGNIFICANT','P'),(9,1,2,'NA','P'),(10,1,3,'NA','P'),(11,1,4,'NA','P'),(12,1,5,'NA','P'),(13,1,6,'NA','P'),(14,1,7,'NA','P');

#
# Structure for table "t_risk_impact_after_kri"
#

DROP TABLE IF EXISTS `t_risk_impact_after_kri`;
CREATE TABLE `t_risk_impact_after_kri` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `risk_id` int(11) DEFAULT NULL,
  `impact_id` int(11) DEFAULT NULL,
  `impact_level` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "t_risk_impact_after_kri"
#


#
# Structure for table "t_risk_impact_after_mitigation"
#

DROP TABLE IF EXISTS `t_risk_impact_after_mitigation`;
CREATE TABLE `t_risk_impact_after_mitigation` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `risk_id` int(11) DEFAULT NULL,
  `impact_id` int(11) DEFAULT NULL,
  `impact_level` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "t_risk_impact_after_mitigation"
#


#
# Structure for table "t_risk_impact_change"
#

DROP TABLE IF EXISTS `t_risk_impact_change`;
CREATE TABLE `t_risk_impact_change` (
  `risk_id` int(11) DEFAULT NULL,
  `impact_id` int(11) DEFAULT NULL,
  `impact_level` varchar(100) DEFAULT NULL,
  `switch_flag` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "t_risk_impact_change"
#

INSERT INTO `t_risk_impact_change` VALUES (1,1,'INSIGNIFICANT','P'),(1,2,'NA','P'),(1,3,'NA','P'),(1,4,'NA','P'),(1,5,'NA','P'),(1,6,'NA','P'),(1,7,'NA','P');

#
# Structure for table "t_risk_impact_hist"
#

DROP TABLE IF EXISTS `t_risk_impact_hist`;
CREATE TABLE `t_risk_impact_hist` (
  `id` int(11) unsigned NOT NULL,
  `risk_id` int(11) DEFAULT NULL,
  `impact_id` int(11) DEFAULT NULL,
  `impact_level` varchar(100) DEFAULT NULL,
  `switch_flag` varchar(1) DEFAULT NULL,
  `update_status` varchar(100) DEFAULT NULL,
  `update_by` varchar(200) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "t_risk_impact_hist"
#

INSERT INTO `t_risk_impact_hist` VALUES (78,1,1,'INSIGNIFICANT','P','CHANGE_REQUEST-VERIFY','head_hr','2016-01-31 10:27:38'),(79,1,2,'NA','P','CHANGE_REQUEST-VERIFY','head_hr','2016-01-31 10:27:38'),(80,1,3,'NA','P','CHANGE_REQUEST-VERIFY','head_hr','2016-01-31 10:27:38'),(81,1,4,'NA','P','CHANGE_REQUEST-VERIFY','head_hr','2016-01-31 10:27:38'),(82,1,5,'NA','P','CHANGE_REQUEST-VERIFY','head_hr','2016-01-31 10:27:38'),(83,1,6,'NA','P','CHANGE_REQUEST-VERIFY','head_hr','2016-01-31 10:27:38'),(84,1,7,'NA','P','CHANGE_REQUEST-VERIFY','head_hr','2016-01-31 10:27:38'),(85,1,1,'INSIGNIFICANT','P','CHANGE_REQUEST-VERIFY','head_hr','2016-01-31 10:29:17'),(86,1,2,'NA','P','CHANGE_REQUEST-VERIFY','head_hr','2016-01-31 10:29:17'),(87,1,3,'NA','P','CHANGE_REQUEST-VERIFY','head_hr','2016-01-31 10:29:17'),(88,1,4,'NA','P','CHANGE_REQUEST-VERIFY','head_hr','2016-01-31 10:29:17'),(89,1,5,'NA','P','CHANGE_REQUEST-VERIFY','head_hr','2016-01-31 10:29:17'),(90,1,6,'NA','P','CHANGE_REQUEST-VERIFY','head_hr','2016-01-31 10:29:17'),(91,1,7,'NA','P','CHANGE_REQUEST-VERIFY','head_hr','2016-01-31 10:29:17'),(92,1,1,'INSIGNIFICANT','P','CHANGE_REQUEST-VERIFY','head_hr','2016-01-31 10:31:54'),(93,1,2,'NA','P','CHANGE_REQUEST-VERIFY','head_hr','2016-01-31 10:31:54'),(94,1,3,'NA','P','CHANGE_REQUEST-VERIFY','head_hr','2016-01-31 10:31:54'),(95,1,4,'NA','P','CHANGE_REQUEST-VERIFY','head_hr','2016-01-31 10:31:54'),(96,1,5,'NA','P','CHANGE_REQUEST-VERIFY','head_hr','2016-01-31 10:31:54'),(97,1,6,'NA','P','CHANGE_REQUEST-VERIFY','head_hr','2016-01-31 10:31:54'),(98,1,7,'NA','P','CHANGE_REQUEST-VERIFY','head_hr','2016-01-31 10:31:54'),(15,1,1,'INSIGNIFICANT','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-03 13:42:22'),(16,1,2,'NA','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-03 13:42:22'),(17,1,3,'NA','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-03 13:42:22'),(18,1,4,'NA','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-03 13:42:22'),(19,1,5,'NA','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-03 13:42:22'),(20,1,6,'NA','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-03 13:42:22'),(21,1,7,'NA','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-03 13:42:22'),(50,1,1,'INSIGNIFICANT','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-03 16:02:24'),(51,1,2,'NA','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-03 16:02:24'),(52,1,3,'NA','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-03 16:02:24'),(53,1,4,'NA','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-03 16:02:24'),(54,1,5,'NA','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-03 16:02:24'),(55,1,6,'NA','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-03 16:02:24'),(56,1,7,'NA','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-03 16:02:24'),(57,1,1,'INSIGNIFICANT','P','CHANGE_REQUEST-VERIFY','head_hr','2016-02-03 16:49:33'),(58,1,2,'NA','P','CHANGE_REQUEST-VERIFY','head_hr','2016-02-03 16:49:33'),(59,1,3,'NA','P','CHANGE_REQUEST-VERIFY','head_hr','2016-02-03 16:49:33'),(60,1,4,'NA','P','CHANGE_REQUEST-VERIFY','head_hr','2016-02-03 16:49:33'),(61,1,5,'NA','P','CHANGE_REQUEST-VERIFY','head_hr','2016-02-03 16:49:33'),(62,1,6,'NA','P','CHANGE_REQUEST-VERIFY','head_hr','2016-02-03 16:49:33'),(63,1,7,'NA','P','CHANGE_REQUEST-VERIFY','head_hr','2016-02-03 16:49:33'),(8,1,1,'INSIGNIFICANT','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-05 15:25:49'),(9,1,2,'NA','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-05 15:25:49'),(10,1,3,'NA','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-05 15:25:49'),(11,1,4,'NA','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-05 15:25:49'),(12,1,5,'NA','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-05 15:25:49'),(13,1,6,'NA','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-05 15:25:49'),(14,1,7,'NA','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-05 15:25:49'),(15,1,1,'INSIGNIFICANT','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-05 15:36:46'),(16,1,2,'NA','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-05 15:36:46'),(17,1,3,'NA','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-05 15:36:46'),(18,1,4,'NA','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-05 15:36:46'),(19,1,5,'NA','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-05 15:36:46'),(20,1,6,'NA','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-05 15:36:46'),(21,1,7,'NA','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-05 15:36:46'),(1,1,1,'INSIGNIFICANT',NULL,'CHANGE_REQUEST-VERIFY','user_it','2016-02-07 13:35:09'),(2,1,2,'NA',NULL,'CHANGE_REQUEST-VERIFY','user_it','2016-02-07 13:35:09'),(3,1,3,'NA',NULL,'CHANGE_REQUEST-VERIFY','user_it','2016-02-07 13:35:09'),(4,1,4,'NA',NULL,'CHANGE_REQUEST-VERIFY','user_it','2016-02-07 13:35:09'),(5,1,5,'NA',NULL,'CHANGE_REQUEST-VERIFY','user_it','2016-02-07 13:35:09'),(6,1,6,'NA',NULL,'CHANGE_REQUEST-VERIFY','user_it','2016-02-07 13:35:09'),(7,1,7,'NA',NULL,'CHANGE_REQUEST-VERIFY','user_it','2016-02-07 13:35:09'),(8,1,1,'MINOR','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-07 16:03:45'),(9,1,2,'NA','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-07 16:03:45'),(10,1,3,'NA','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-07 16:03:45'),(11,1,4,'NA','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-07 16:03:45'),(12,1,5,'NA','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-07 16:03:45'),(13,1,6,'NA','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-07 16:03:45'),(14,1,7,'NA','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-07 16:03:45'),(15,1,1,'MINOR','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-07 16:09:41'),(16,1,2,'NA','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-07 16:09:41'),(17,1,3,'NA','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-07 16:09:41'),(18,1,4,'NA','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-07 16:09:41'),(19,1,5,'NA','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-07 16:09:41'),(20,1,6,'NA','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-07 16:09:41'),(21,1,7,'NA','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-07 16:09:41'),(64,3,1,'MODERATE','P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 00:37:40'),(65,3,2,'NA','P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 00:37:40'),(66,3,3,'NA','P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 00:37:40'),(67,3,4,'NA','P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 00:37:40'),(68,3,5,'NA','P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 00:37:40'),(69,3,6,'NA','P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 00:37:40'),(70,3,7,'NA','P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 00:37:40'),(8,1,1,'INSIGNIFICANT','P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 10:12:25'),(9,1,2,'NA','P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 10:12:25'),(10,1,3,'NA','P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 10:12:25'),(11,1,4,'NA','P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 10:12:25'),(12,1,5,'NA','P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 10:12:25'),(13,1,6,'NA','P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 10:12:25'),(14,1,7,'NA','P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 10:12:25'),(15,1,1,'INSIGNIFICANT','P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 10:25:13'),(16,1,2,'NA','P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 10:25:13'),(17,1,3,'NA','P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 10:25:13'),(18,1,4,'NA','P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 10:25:13'),(19,1,5,'NA','P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 10:25:13'),(20,1,6,'NA','P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 10:25:13'),(21,1,7,'NA','P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 10:25:13'),(22,1,1,'INSIGNIFICANT','P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 10:30:59'),(23,1,2,'NA','P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 10:30:59'),(24,1,3,'NA','P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 10:30:59'),(25,1,4,'NA','P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 10:30:59'),(26,1,5,'NA','P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 10:30:59'),(27,1,6,'NA','P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 10:30:59'),(28,1,7,'NA','P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 10:30:59'),(29,1,1,'INSIGNIFICANT','P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 10:33:19'),(30,1,2,'NA','P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 10:33:19'),(31,1,3,'NA','P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 10:33:19'),(32,1,4,'NA','P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 10:33:19'),(33,1,5,'NA','P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 10:33:19'),(34,1,6,'NA','P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 10:33:19'),(35,1,7,'NA','P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 10:33:19'),(36,1,1,'INSIGNIFICANT','P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 10:49:26'),(37,1,2,'NA','P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 10:49:26'),(38,1,3,'NA','P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 10:49:26'),(39,1,4,'NA','P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 10:49:26'),(40,1,5,'NA','P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 10:49:26'),(41,1,6,'NA','P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 10:49:26'),(42,1,7,'NA','P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 10:49:26'),(1,1,1,'INSIGNIFICANT',NULL,'CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 17:26:31'),(2,1,2,'NA',NULL,'CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 17:26:31'),(3,1,3,'NA',NULL,'CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 17:26:31'),(4,1,4,'NA',NULL,'CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 17:26:31'),(5,1,5,'NA',NULL,'CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 17:26:31'),(6,1,6,'NA',NULL,'CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 17:26:31'),(7,1,7,'NA',NULL,'CHANGE_REQUEST-VERIFY','user_rac','2016-02-08 17:26:31'),(8,1,1,'MAJOR','P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-10 17:22:35'),(9,1,2,'NA','P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-10 17:22:35'),(10,1,3,'NA','P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-10 17:22:35'),(11,1,4,'NA','P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-10 17:22:35'),(12,1,5,'NA','P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-10 17:22:35'),(13,1,6,'NA','P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-10 17:22:35'),(14,1,7,'NA','P','CHANGE_REQUEST-VERIFY','user_rac','2016-02-10 17:22:35'),(8,1,1,'INSIGNIFICANT','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-16 11:34:28'),(9,1,2,'NA','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-16 11:34:28'),(10,1,3,'NA','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-16 11:34:28'),(11,1,4,'NA','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-16 11:34:28'),(12,1,5,'NA','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-16 11:34:28'),(13,1,6,'NA','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-16 11:34:28'),(14,1,7,'NA','P','CHANGE_REQUEST-VERIFY','user_it','2016-02-16 11:34:28'),(29,2,1,'MODERATE','P','CHANGE_REQUEST-VERIFY','head_hr','2016-02-16 11:52:02'),(30,2,2,'NA','P','CHANGE_REQUEST-VERIFY','head_hr','2016-02-16 11:52:02'),(31,2,3,'NA','P','CHANGE_REQUEST-VERIFY','head_hr','2016-02-16 11:52:02'),(32,2,4,'NA','P','CHANGE_REQUEST-VERIFY','head_hr','2016-02-16 11:52:02'),(33,2,5,'NA','P','CHANGE_REQUEST-VERIFY','head_hr','2016-02-16 11:52:02'),(34,2,6,'NA','P','CHANGE_REQUEST-VERIFY','head_hr','2016-02-16 11:52:02'),(35,2,7,'NA','P','CHANGE_REQUEST-VERIFY','head_hr','2016-02-16 11:52:02'),(8,1,1,'MINOR','P','CHANGE_REQUEST-VERIFY','head_hr','2016-02-21 23:29:55'),(9,1,2,'NA','P','CHANGE_REQUEST-VERIFY','head_hr','2016-02-21 23:29:55'),(10,1,3,'NA','P','CHANGE_REQUEST-VERIFY','head_hr','2016-02-21 23:29:55'),(11,1,4,'NA','P','CHANGE_REQUEST-VERIFY','head_hr','2016-02-21 23:29:55'),(12,1,5,'NA','P','CHANGE_REQUEST-VERIFY','head_hr','2016-02-21 23:29:55'),(13,1,6,'NA','P','CHANGE_REQUEST-VERIFY','head_hr','2016-02-21 23:29:55'),(14,1,7,'NA','P','CHANGE_REQUEST-VERIFY','head_hr','2016-02-21 23:29:55'),(8,1,1,'INSIGNIFICANT','P','CHANGE_REQUEST-VERIFY','head_hr','2016-04-18 14:26:53'),(9,1,2,'NA','P','CHANGE_REQUEST-VERIFY','head_hr','2016-04-18 14:26:53'),(10,1,3,'NA','P','CHANGE_REQUEST-VERIFY','head_hr','2016-04-18 14:26:53'),(11,1,4,'NA','P','CHANGE_REQUEST-VERIFY','head_hr','2016-04-18 14:26:53'),(12,1,5,'NA','P','CHANGE_REQUEST-VERIFY','head_hr','2016-04-18 14:26:53'),(13,1,6,'NA','P','CHANGE_REQUEST-VERIFY','head_hr','2016-04-18 14:26:53'),(14,1,7,'NA','P','CHANGE_REQUEST-VERIFY','head_hr','2016-04-18 14:26:53'),(50,1,1,'INSIGNIFICANT',NULL,'CHANGE_REQUEST-VERIFY','user_hr','2016-04-20 11:10:57'),(51,1,2,'NA',NULL,'CHANGE_REQUEST-VERIFY','user_hr','2016-04-20 11:10:57'),(52,1,3,'NA',NULL,'CHANGE_REQUEST-VERIFY','user_hr','2016-04-20 11:10:57'),(53,1,4,'NA',NULL,'CHANGE_REQUEST-VERIFY','user_hr','2016-04-20 11:10:57'),(54,1,5,'NA',NULL,'CHANGE_REQUEST-VERIFY','user_hr','2016-04-20 11:10:57'),(55,1,6,'NA',NULL,'CHANGE_REQUEST-VERIFY','user_hr','2016-04-20 11:10:57'),(56,1,7,'NA',NULL,'CHANGE_REQUEST-VERIFY','user_hr','2016-04-20 11:10:57'),(15,1,1,'MINOR','P','CHANGE_REQUEST-VERIFY','user_hr','2016-04-26 15:46:10'),(16,1,2,'NA','P','CHANGE_REQUEST-VERIFY','user_hr','2016-04-26 15:46:10'),(17,1,3,'NA','P','CHANGE_REQUEST-VERIFY','user_hr','2016-04-26 15:46:10'),(18,1,4,'NA','P','CHANGE_REQUEST-VERIFY','user_hr','2016-04-26 15:46:10'),(19,1,5,'NA','P','CHANGE_REQUEST-VERIFY','user_hr','2016-04-26 15:46:10'),(20,1,6,'NA','P','CHANGE_REQUEST-VERIFY','user_hr','2016-04-26 15:46:10'),(21,1,7,'NA','P','CHANGE_REQUEST-VERIFY','user_hr','2016-04-26 15:46:10'),(43,1,1,'MINOR','P','CHANGE_REQUEST-VERIFY','user_hr','2016-04-26 15:50:55'),(44,1,2,'NA','P','CHANGE_REQUEST-VERIFY','user_hr','2016-04-26 15:50:55'),(45,1,3,'NA','P','CHANGE_REQUEST-VERIFY','user_hr','2016-04-26 15:50:55'),(46,1,4,'NA','P','CHANGE_REQUEST-VERIFY','user_hr','2016-04-26 15:50:55'),(47,1,5,'NA','P','CHANGE_REQUEST-VERIFY','user_hr','2016-04-26 15:50:55'),(48,1,6,'NA','P','CHANGE_REQUEST-VERIFY','user_hr','2016-04-26 15:50:55'),(49,1,7,'NA','P','CHANGE_REQUEST-VERIFY','user_hr','2016-04-26 15:50:55'),(50,1,1,'MINOR','P','CHANGE_REQUEST-VERIFY','user_hr','2016-04-26 16:05:26'),(51,1,2,'NA','P','CHANGE_REQUEST-VERIFY','user_hr','2016-04-26 16:05:26'),(52,1,3,'NA','P','CHANGE_REQUEST-VERIFY','user_hr','2016-04-26 16:05:26'),(53,1,4,'NA','P','CHANGE_REQUEST-VERIFY','user_hr','2016-04-26 16:05:26'),(54,1,5,'NA','P','CHANGE_REQUEST-VERIFY','user_hr','2016-04-26 16:05:26'),(55,1,6,'NA','P','CHANGE_REQUEST-VERIFY','user_hr','2016-04-26 16:05:26'),(56,1,7,'NA','P','CHANGE_REQUEST-VERIFY','user_hr','2016-04-26 16:05:26'),(50,2,1,'INSIGNIFICANT','P','CHANGE_REQUEST-VERIFY','user_it','2016-05-02 23:56:52'),(51,2,2,'NA','P','CHANGE_REQUEST-VERIFY','user_it','2016-05-02 23:56:52'),(52,2,3,'NA','P','CHANGE_REQUEST-VERIFY','user_it','2016-05-02 23:56:52'),(53,2,4,'NA','P','CHANGE_REQUEST-VERIFY','user_it','2016-05-02 23:56:52'),(54,2,5,'NA','P','CHANGE_REQUEST-VERIFY','user_it','2016-05-02 23:56:52'),(55,2,6,'NA','P','CHANGE_REQUEST-VERIFY','user_it','2016-05-02 23:56:52'),(56,2,7,'NA','P','CHANGE_REQUEST-VERIFY','user_it','2016-05-02 23:56:52');

#
# Structure for table "t_risk_objective"
#

DROP TABLE IF EXISTS `t_risk_objective`;
CREATE TABLE `t_risk_objective` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `risk_id` varchar(100) DEFAULT NULL,
  `objective` varchar(255) DEFAULT NULL,
  `switch_flag` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "t_risk_objective"
#

INSERT INTO `t_risk_objective` VALUES (2,'1','user_it','P');

#
# Structure for table "t_risk_objective_change"
#

DROP TABLE IF EXISTS `t_risk_objective_change`;
CREATE TABLE `t_risk_objective_change` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `risk_id` varchar(100) DEFAULT NULL,
  `objective` varchar(255) DEFAULT NULL,
  `switch_flag` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "t_risk_objective_change"
#

INSERT INTO `t_risk_objective_change` VALUES (2,'1','user_it','P');

#
# Structure for table "t_user_manual"
#

DROP TABLE IF EXISTS `t_user_manual`;
CREATE TABLE `t_user_manual` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(500) DEFAULT NULL,
  `filename` varchar(200) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` varchar(200) DEFAULT NULL,
  `content` text,
  `id_user` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

#
# Data for table "t_user_manual"
#

INSERT INTO `t_user_manual` VALUES (3,'<b> 1.1 LOGIN </b>','',1,'2016-01-18 10:12:34','admin','<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p style=\"text-align: justify; padding-left: 30px;\">Untuk dapat memasuki Risk Management System, user harus melakukan login terlebih dahulu. Username dan Password harus diisi sebelum click tombol login. Berikut&nbsp;merupakan user interface login.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/1.png\" alt=\"\" width=\"555\" height=\"271\" /></p>\r\n<p style=\"text-align: justify; padding-left: 30px;\">Setelah berhasil login maka akan muncul tampilan dashboard seperti berikut :</p>\r\n<p style=\"text-align: center;\"><img src=\"uploadedFile/ss2/2.png\" alt=\"\" width=\"698\" height=\"558\" /></p>\r\n<p style=\"text-align: justify; padding-left: 30px;\">Dashboard menampilkan informasi risiko yang dibutuhkan oleh user. Pada tab pertama yaitu tab my risk register akan menampilkan data seluruh risiko yang pernah&nbsp;di input oleh user tersebut. Chart menampilkan data sesuai dengan jumlah risiko yang diinput oleh user.</p>\r\n<p style=\"text-align: justify; padding-left: 30px;\">Untuk mencari risiko dapat menggunakan fungsi filter risiko bedasarkan kategori, sub-kategori dan 2<sup>nd</sup> sub kategori. Untuk mengembalikannya list seluruh risiko dapat mengclick tombol remove filter.</p>\r\n</body>\r\n</html>',3),(4,'<b> 1.2   ENTRY RISK </b>','',1,'2015-10-31 00:09:14','admin','<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p style=\"padding-left: 30px; text-align: justify;\">Untuk menginput risiko dibagi menjadi 2 (dua) :</p>\r\n<p style=\"padding-left: 30px; text-align: justify;\"><strong>1. Regular Exercise</strong></p>\r\n<p style=\"padding-left: 60px; text-align: justify;\">Entry Risk untuk Regular Exercise dilakukan ketika RAC sudah menginput periode risiko terlebih dahulu, dan dapat dilakukan melalui Menu -&gt; Transaction -&gt; Regular Exercise -&gt; Risk Register Exercise.</p>\r\n<p style=\"padding-left: 60px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/3.png\" alt=\"\" width=\"458\" height=\"48\" /></p>\r\n<p style=\"padding-left: 30px;\"><strong>2.&nbsp;Adhoc</strong></p>\r\n<p style=\"padding-left: 60px; text-align: justify;\">Jika RAC belum menginput periode risiko, atau periode risiko sudah melewati tanggalnya, maka untuk meingput sebuah risiko harus melalui Dashboard My Risk Register -&gt; Add New Risk -&gt; Risk Form.</p>\r\n<p style=\"padding-left: 60px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/4.png\" alt=\"\" width=\"657\" height=\"132\" /></p>\r\n<p style=\"padding-left: 30px;\"><strong>3. Entry New Risk</strong></p>\r\n<p style=\"padding-left: 60px;\">Pertama &ndash; tama akan muncul form Risk Register Exercise (hanya jika dibuka dari menu -&gt; Transaction -&gt; Regular Exercise &ndash; Risk Register Exercise, tidak berlaku untuk adhoc).</p>\r\n<p style=\"padding-left: 60px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/5.png\" alt=\"\" width=\"612\" height=\"428\" /></p>\r\n<p style=\"text-align: justify; padding-left: 60px;\">Maka user di sarankan untuk mengisi Roll Forward Risk Dahulu dengan click tombol confirm di sebelah kolom status pada risiko yang ingin diikutsertakan di periode ini. Atau mengclick tombol hapus risiko untuk menghapus risiko tersebut dari roll forward risk.</p>\r\n<p style=\"text-align: justify; padding-left: 60px;\">Untuk penambahan risiko diluar periode maka harus menambahkan dari dashboard atau di risk register exercise lalu click button add new risk. Setelahnya akan ada tampilan seperti ini, untuk diisi data risiko. Lalu button save untuk menyimpan.</p>\r\n<p style=\"padding-left: 60px;\">&nbsp;<img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/6.png\" alt=\"\" width=\"690\" height=\"431\" /></p>\r\n<p style=\"padding-left: 60px; text-align: justify;\">Jika ingin memilih dari library maka dapat meng-click button dengan icon search disamping Library Risk ID. Maka akan muncul tampilan sebagai berikut.</p>\r\n<p style=\"padding-left: 60px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/7.png\" alt=\"\" width=\"700\" height=\"175\" /></p>\r\n<p style=\"padding-left: 60px; text-align: justify;\">Untuk memilih risknya maka dapat meng-click button disamping kiri risiko nya.&nbsp;Setelah itu&nbsp; untuk mengisi risk impact maka harus meng-click tombol dengan icon cari disamping impact level. Setelahnya akan muncul form untuk mengisi parameter sesuai dengan category nya. Yang setelah di click tombol save maka akan otomatis menampilkan level dari impact tersebut.</p>\r\n<p style=\"padding-left: 60px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/8.png\" alt=\"\" width=\"600\" height=\"400\" /></p>\r\n<p style=\"padding-left: 60px; text-align: justify;\">Untuk mengisi likelihood maka harus meng-click tombol dengan icon cari disamping likelihood. Setelahnya akan muncul form seperti berikut.</p>\r\n<p style=\"padding-left: 60px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/9.png\" alt=\"\" width=\"600\" height=\"400\" /></p>\r\n<p style=\"padding-left: 60px; text-align: justify;\">&nbsp;</p>\r\n<p style=\"padding-left: 60px; text-align: justify;\">Setelahnya diisi dan disave maka akan otomatis menampilkan level dari likelihood dan juga level dari risiko.</p>\r\n<p style=\"padding-left: 60px; text-align: justify;\">Jika sudah menambahkan dan mengedit risiko pada periode ini maka button submit harus di click agar proses berlanjut untuk di verifikasi oleh RAC. Perlu diperhatikan bahwa submit button dilakukan untuk semua risiko yang tertera&nbsp;pada risk register exercise. Dan jika sudah mensubmit sekali maka tidak dapat melakukannya lagi, jika perlu untuk merubah data yang kebetulan salah, dapat menggunakan tombol change request untuk mengembalikan semua risiko menjadi status draft. Seperti contoh gambar dibawah ini :</p>\r\n<p style=\"padding-left: 60px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/10.png\" alt=\"\" width=\"800\" height=\"560\" /></p>\r\n<p style=\"padding-left: 60px;\">&nbsp;</p>\r\n<p style=\"padding-left: 60px;\">&nbsp;</p>\r\n</body>\r\n</html>',3),(5,'<b> 1.3   CHANGE REQUEST </b>','',1,'2015-10-31 00:09:04','admin','<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p style=\"padding-left: 30px; text-align: justify;\">Permintaan perubahan pada data yang telah diinput dapat dilakukan di dashboard pada tab yang ingin datanya dilakukan perubahan.</p>\r\n<p style=\"padding-left: 30px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/11.png\" alt=\"\" width=\"800\" height=\"655\" /></p>\r\n<p style=\"text-align: justify; padding-left: 30px;\">Pada tabel change request dapat di click icon change request untuk merubah data. Setelah itu maka akan tampil form seperti berikut.</p>\r\n<p style=\"padding-left: 30px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/12.png\" alt=\"\" width=\"800\" height=\"945\" /></p>\r\n<p style=\"padding-left: 30px;\">Isi data perubahan pada kolom changes, lalu click tombol submit.</p>\r\n<p style=\"padding-left: 30px;\">Yang nantinya setelah disubmit akan muncul di dashboard pada tab change request list.</p>\r\n<p style=\"padding-left: 30px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/13.png\" alt=\"\" width=\"800\" height=\"291\" /></p>\r\n</body>\r\n</html>',3),(6,'<b> 1.4   ENTRY Q & A  </b>','',1,'2015-10-31 00:14:27','admin','<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p style=\"padding-left: 30px;\">Fungsi Q&amp;A dapat dibuka melalui menu Transaction &gt; Q&amp;A</p>\r\n<p style=\"padding-left: 30px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/14.png\" alt=\"\" width=\"400\" height=\"60\" /></p>\r\n<p style=\"padding-left: 30px;\">Setelah itu akan terbuka form seperti berikut :</p>\r\n<p style=\"padding-left: 30px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/15.png\" alt=\"\" width=\"800\" height=\"240\" /></p>\r\n<p style=\"padding-left: 30px;\">Lalu click add new question untuk menambah pertanyaan yang ingin ditanyakan.</p>\r\n<p style=\"padding-left: 30px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/16.png\" alt=\"\" width=\"600\" height=\"200\" /></p>\r\n<p style=\"padding-left: 30px;\">Setelah itu isi subject dan question. Dan submit pertanyaannya. Namun status nya masih waiting for response hingga dijawab oleh RAC. Jika sudah dijawab maka status nya akan berganti menjadi completed.</p>\r\n<p style=\"padding-left: 30px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/17.png\" alt=\"\" width=\"800\" height=\"48\" /></p>\r\n</body>\r\n</html>',3),(7,'<b> 1.5   NEWS </b>','',1,'2015-10-31 00:14:38','admin','<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p style=\"padding-left: 30px;\">Pengumuman yang dibuat oleh RAC, nantinya dapat dilihat dari menu &gt; News.</p>\r\n<p style=\"padding-left: 30px; text-align: center;\">&nbsp;<img src=\"uploadedFile/ss2/18.png\" alt=\"\" width=\"200\" height=\"190\" /></p>\r\n<p style=\"padding-left: 30px;\">Akan muncul form dengan judul news dan published date.</p>\r\n<p style=\"padding-left: 30px;\"><br /><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/19.png\" alt=\"\" width=\"800\" height=\"145\" /></p>\r\n<p style=\"padding-left: 30px;\">Yang nantinya jika dipilih, maka akan tampil pdf viewer untuk news tersebut.</p>\r\n<p style=\"padding-left: 30px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/20.png\" alt=\"\" width=\"700\" height=\"414\" /></p>\r\n</body>\r\n</html>',3),(8,'<b> 1.6   USER MANUAL </b>','',1,'2015-10-31 00:19:05','admin','<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p style=\"padding-left: 30px;\">User manual dapat dilihat melalui menu &gt; User Manual</p>\r\n<p style=\"padding-left: 30px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/21.png\" alt=\"\" width=\"200\" height=\"213\" /></p>\r\n<p style=\"padding-left: 30px;\">Setelahnya dapat memilih sub user manual mana yang ingin dibaca</p>\r\n<p style=\"padding-left: 30px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/22.png\" alt=\"\" width=\"800\" height=\"262\" /></p>\r\n<p style=\"padding-left: 30px;\">Lalu berikut contoh tampilan yang ditampilkan jika sudah memilih salah satu dari sub user manual diatas :</p>\r\n<p style=\"padding-left: 30px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/23.png\" alt=\"\" width=\"800\" height=\"400\" /></p>\r\n</body>\r\n</html>',3),(9,'<b> 1.7   CHANGE LANGUAGE </b>','',1,'2015-10-31 00:21:02','admin','<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p style=\"padding-left: 30px; text-align: justify;\">Perubahan bahasa yang disediakan adalah Indonesia dan English. Untuk merubah bahasa yang ditampilkan dapat meng-click tombol pada kanan atas seperti berikut</p>\r\n<p style=\"padding-left: 30px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/24.png\" alt=\"\" width=\"500\" height=\"100\" /></p>\r\n</body>\r\n</html>',3),(10,'<b> 1.1   LOGIN </b>','',1,'2016-01-18 10:12:21','admin','<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p style=\"padding-left: 30px;\">Untuk dapat memasuki Risk Management System, user harus melakukan login terlebih dahulu. Username dan Password harus diisi sebelum click tombol login. Berikut&nbsp;merupakan user interface login.</p>\r\n<p style=\"padding-left: 30px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/25.png\" alt=\"\" width=\"600\" height=\"277\" /></p>\r\n<p style=\"padding-left: 30px;\">Setelah berhasil login maka akan muncul tampilan dashboard seperti berikut :</p>\r\n<p style=\"padding-left: 30px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/26.png\" alt=\"\" width=\"600\" height=\"508\" /></p>\r\n<p style=\"padding-left: 30px;\">Dashboard menampilkan informasi risiko yang dibutuhkan oleh user. Pada tab pertama yaitu tab my risk register akan menampilkan data seluruh risiko yang pernah&nbsp;di input oleh user tersebut. Tab selanjutnya yaitu risk owned by me, berisi risiko dimana pemilik risiko tersebut adalah divisi dari user tersebut. Tab my action plan menampilkan data action plan dimana pemilik action plan tersebut adalah divisi dari user tersebut. Tab my action plan execution akan menampilkan data action plan yang harus diisi status execution. Dan my kri adalah tab yang menampilkan data KRI dimana pemilik KRI tersebut adalah divisi dari user tersebut.&nbsp;Chart menampilkan data sesuai dengan jumlah risiko yang diinput oleh user.</p>\r\n<p style=\"padding-left: 30px;\">Untuk mencari risiko dapat menggunakan fungsi filter risiko bedasarkan kategori, sub-kategori dan 2<sup>nd</sup> sub kategori. Untuk mengembalikannya list seluruh risiko dapat mengclick tombol remove filter.</p>\r\n</body>\r\n</html>',4),(11,'<b> 1.2   ENTRY RISK </b>','',1,'2016-01-18 01:25:01','admin','<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p style=\"padding-left: 30px; text-align: justify;\">Untuk menginput risiko dibagi menjadi 2 (dua) :</p>\r\n<p style=\"padding-left: 30px; text-align: justify;\"><strong>1. Regular Exercise</strong></p>\r\n<p style=\"padding-left: 60px; text-align: justify;\">Entry Risk untuk Regular Exercise dilakukan ketika RAC sudah menginput periode risiko terlebih dahulu, dan dapat dilakukan melalui Menu -&gt; Transaction -&gt; Regular Exercise -&gt; Risk Register Exercise.</p>\r\n<p style=\"padding-left: 60px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/3.png\" alt=\"\" width=\"458\" height=\"48\" /></p>\r\n<p style=\"padding-left: 30px;\"><strong>2.&nbsp;Adhoc</strong></p>\r\n<p style=\"padding-left: 60px; text-align: justify;\">Jika RAC belum menginput periode risiko, atau periode risiko sudah melewati tanggalnya, maka untuk meingput sebuah risiko harus melalui Dashboard My Risk Register -&gt; Add New Risk -&gt; Risk Form.</p>\r\n<p style=\"padding-left: 60px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/4.png\" alt=\"\" width=\"657\" height=\"132\" /></p>\r\n<p style=\"padding-left: 30px;\"><strong>3. Entry New Risk</strong></p>\r\n<p style=\"padding-left: 60px;\">Pertama &ndash; tama akan muncul form Risk Register Exercise (hanya jika dibuka dari menu -&gt; Transaction -&gt; Regular Exercise &ndash; Risk Register Exercise, tidak berlaku untuk adhoc).</p>\r\n<p style=\"padding-left: 60px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/5.png\" alt=\"\" width=\"612\" height=\"428\" /></p>\r\n<p style=\"text-align: justify; padding-left: 60px;\">Maka user di sarankan untuk mengisi Roll Forward Risk Dahulu dengan click tombol confirm di sebelah kolom status pada risiko yang ingin diikutsertakan di periode ini. Atau mengclick tombol hapus risiko untuk menghapus risiko tersebut dari roll forward risk.</p>\r\n<p style=\"text-align: justify; padding-left: 60px;\">Untuk penambahan risiko diluar periode maka harus menambahkan dari dashboard atau di risk register exercise lalu click button add new risk. Setelahnya akan ada tampilan seperti ini, untuk diisi data risiko. Lalu button save untuk menyimpan.</p>\r\n<p style=\"padding-left: 60px;\">&nbsp;<img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/6.png\" alt=\"\" width=\"690\" height=\"431\" /></p>\r\n<p style=\"padding-left: 60px; text-align: justify;\">Jika ingin memilih dari library maka dapat meng-click button dengan icon search disamping Library Risk ID. Maka akan muncul tampilan sebagai berikut.</p>\r\n<p style=\"padding-left: 60px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/7.png\" alt=\"\" width=\"700\" height=\"175\" /></p>\r\n<p style=\"padding-left: 60px; text-align: justify;\">Untuk memilih risknya maka dapat meng-click button disamping kiri risiko nya.&nbsp;Setelah itu&nbsp; untuk mengisi risk impact maka harus meng-click tombol dengan icon cari disamping impact level. Setelahnya akan muncul form untuk mengisi parameter sesuai dengan category nya. Yang setelah di click tombol save maka akan otomatis menampilkan level dari impact tersebut.</p>\r\n<p style=\"padding-left: 60px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/8.png\" alt=\"\" width=\"600\" height=\"400\" /></p>\r\n<p style=\"padding-left: 60px; text-align: justify;\">Untuk mengisi likelihood maka harus meng-click tombol dengan icon cari disamping likelihood. Setelahnya akan muncul form seperti berikut.</p>\r\n<p style=\"padding-left: 60px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/9.png\" alt=\"\" width=\"600\" height=\"400\" /></p>\r\n<p style=\"padding-left: 60px; text-align: justify;\">&nbsp;</p>\r\n<p style=\"padding-left: 60px; text-align: justify;\">Setelahnya diisi dan disave maka akan otomatis menampilkan level dari likelihood dan juga level dari risiko.</p>\r\n<p style=\"padding-left: 60px; text-align: justify;\">Jika sudah menambahkan dan mengedit risiko pada periode ini maka button submit harus di click agar proses berlanjut untuk di verifikasi oleh RAC. Perlu diperhatikan bahwa submit button dilakukan untuk semua risiko yang tertera&nbsp;pada risk register exercise. Dan jika sudah mensubmit sekali maka tidak dapat melakukannya lagi, jika perlu untuk merubah data yang kebetulan salah, dapat menggunakan tombol change request untuk mengembalikan semua risiko menjadi status draft. Seperti contoh gambar dibawah ini :</p>\r\n<p style=\"padding-left: 60px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/10.png\" alt=\"\" width=\"800\" height=\"560\" /></p>\r\n<p style=\"padding-left: 60px;\">&nbsp;</p>\r\n<p style=\"padding-left: 60px;\">&nbsp;</p>\r\n</body>\r\n</html>',4),(12,'<b> 1.3   ENTRY TREATMENT </b>','',1,'2016-01-18 02:00:50','admin','<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Fungsi Entry Treatment hanya bisa dilakukan oleh PIC dan Division Head selaku risk owner dari risiko yang telah di entry dan di verifikasi oleh RAC. Berbeda dengan Division Head, seorang PIC Division hanya bisa meng-entry risk treatment hanya jika Division Head meng-assigned risiko tersebut.</p>\r\n<p>Contoh :</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/27.png\" alt=\"\" width=\"600\" height=\"436\" /></p>\r\n<p>Pada kolom assigned to dapat di click dan akan muncul popup seperti berikut.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/28.png\" alt=\"\" width=\"600\" height=\"171\" /></p>\r\n<p>Untuk memilih dapat mengclick tombol di kolom pertama. Harus memilih salah satu agar dapat menginput treatment.</p>\r\n<p>Jika sudah di assign, maka sesuai dengan siapa yang di assign dapat membukanya dengan mengclick risk id yang diinginkan. Setelahnya akan muncul tampilan seperti berikut :</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/29.png\" alt=\"\" width=\"600\" height=\"545\" /></p>\r\n<p>Jika sudah merubah sesuai dengan kebutuhan atau langsung menyetujui risiko yang dimiliki. Maka dapat mengclick tombol submit. Tombol save as draft digunakan hanya untuk menyimpan perubahan tanpa mensubmit risiko tersebut.</p>\r\n</body>\r\n</html>',4),(13,'<b> 1.4   ENTRY ACTION PLAN </b>','',1,'2016-01-18 02:06:08','admin','<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p style=\"padding-left: 30px; text-align: justify;\">Fungsi Entry Action Plan hanya bisa dilakukan oleh PIC dan Division Head selaku action plan owner dari risiko yang telah di entry dan di verifikasi oleh RAC. Berbeda dengan Division Head, seorang PIC Division hanya bisa meng-entry action plan hanya jika Division Head meng-assigned risiko tersebut.</p>\r\n<p style=\"padding-left: 30px; text-align: justify;\">Contoh :</p>\r\n<p style=\"padding-left: 30px; text-align: justify;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/30.png\" alt=\"\" width=\"600\" height=\"432\" /></p>\r\n<p style=\"padding-left: 30px; text-align: justify;\">Pada kolom assigned to dapat di click dan akan muncul popup seperti berikut.</p>\r\n<p style=\"padding-left: 30px; text-align: justify;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/31.png\" alt=\"\" width=\"600\" height=\"171\" /></p>\r\n<p style=\"padding-left: 30px; text-align: justify;\">Untuk memilih dapat meng-click tombol di kolom pertama. Harus memilih salah satu agar dapat menginput action plan.</p>\r\n<p style=\"padding-left: 30px; text-align: justify;\"><strong>&nbsp;</strong></p>\r\n<p style=\"padding-left: 30px; text-align: justify;\">Jika sudah di assign, maka sesuai dengan siapa yang di assign dapat membukanya dengan mengclick action plan id yang diinginkan. Setelahnya akan muncul tampilan seperti berikut :</p>\r\n<p style=\"padding-left: 30px; text-align: justify;\">&nbsp;<img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/32.png\" alt=\"\" width=\"600\" height=\"436\" /></p>\r\n<p style=\"padding-left: 30px; text-align: justify;\">Jika sudah merubah sesuai dengan kebutuhan atau langsung menyetujui action plan yang dimiliki. Maka dapat mengclick tombol submit. Tombol save as draft digunakan hanya untuk menyimpan perubahan tanpa mensubmit action plan tersebut.</p>\r\n<p style=\"padding-left: 30px; text-align: justify;\">Hanya jika PIC yang mensubmit data action plan. Maka action plan tersebut harus diapprove atau disubmit kembali oleh Head Division.</p>\r\n</body>\r\n</html>',4),(14,'<b> 1.5 ENTRY ACTION PLAN EXECUTION </b>','',1,'2016-01-18 02:34:42','admin','<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p style=\"padding-left: 30px;\">Fungsi Entry Action Plan Execution hanya bisa dilakukan oleh PIC atau Division Head. Tergantung siapa yang mengentry action plan sebelumnya, jika PIC maka PIC lah yang harus meng-entry Action Plan Executionnya. Action plan execution pada tab hanya bisa dilakukan pada saat adhoc, sedangkan action plan execution menu dilakukan saat periode sedang berlangsung.</p>\r\n<p style=\"padding-left: 30px;\">Pada tab akan muncul tampilan seperti berikut :</p>\r\n<p style=\"padding-left: 30px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/33.png\" alt=\"\" width=\"600\" height=\"436\" /></p>\r\n<p style=\"padding-left: 30px;\">Sedangkan pada menu Transaction &gt; Action Plan Execution, tampilannya akan seperti berikut :</p>\r\n<p style=\"padding-left: 30px; text-align: center;\"><img src=\"uploadedFile/ss2/34.png\" alt=\"\" width=\"400\" height=\"100\" /></p>\r\n<p style=\"padding-left: 30px; text-align: center;\"><img src=\"uploadedFile/ss2/35.png\" alt=\"\" width=\"800\" height=\"400\" /></p>\r\n<p style=\"padding-left: 30px;\">&nbsp;</p>\r\n<p style=\"padding-left: 30px;\">Untuk meng-entrynya dapat mengclick tombol pada kolom execution. Maka setelah itu akan muncul tampilan pop up sebagai berikut</p>\r\n<p style=\"padding-left: 30px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/36.png\" alt=\"\" width=\"600\" height=\"343\" /></p>\r\n<p style=\"padding-left: 30px;\">Jika action plan tersebut complete, isikan explanation dan evidence nya. Pada Combobox status dapat diganti dari Complete menjadi Extend atau Ongoing, yang tampilan seperti berikut jika diganti :</p>\r\n<p style=\"padding-left: 30px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/37.png\" alt=\"\" width=\"600\" height=\"343\" /></p>\r\n<p style=\"padding-left: 30px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/38.png\" alt=\"\" width=\"600\" height=\"200\" /></p>\r\n<p style=\"padding-left: 30px;\">Dengan status extend maka isilah reasond dan revised date nya dan status ongoing isilah explanationnya. Setelahnya klik save untuk menyimpan. Di dashboard maka akan berubah pada kolom execution menjadi hasil yang diinput.</p>\r\n<p style=\"padding-left: 30px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/39.png\" alt=\"\" width=\"600\" height=\"382\" /></p>\r\n<p style=\"padding-left: 30px;\">Setelahnya maka click tombol submit disebelah button execution. Jika PIC yang menginput action plan execution maka Division Head selanjutnya harus mengecek dan mensubmit action plan execution yang sudah diinput oleh PIC.</p>\r\n</body>\r\n</html>',4),(15,'<b> 1.6   ENTRY KRI REPORT BY KRI OWNER </b>','',1,'2016-01-18 03:05:12','admin','<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p style=\"padding-left: 30px;\">Setelah RAC meng-input Key Risk Indicator, maka KRI owner akan menerima KRI telah di-input oleh RAC. Yang nantinya akan muncul pada dashboard Division Head dari KRI Owner pada tab My KRI.</p>\r\n<p style=\"padding-left: 30px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/40.png\" alt=\"\" width=\"600\" height=\"382\" /></p>\r\n<p style=\"padding-left: 30px;\">Untuk menginput report pada KRI, maka diharuskan meng-assign KRI tersebut terlebih dahulu.&nbsp;Setelah di assign baru dapat meng-click KRI ID dan muncul form berikut :</p>\r\n<p style=\"padding-left: 30px;\">&nbsp;<img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/41.png\" alt=\"\" width=\"600\" height=\"327\" /></p>\r\n<p style=\"padding-left: 30px;\">Pengisian data report tergantung pada tipe threshold yang diinput oleh RAC.</p>\r\n<p style=\"padding-left: 30px;\">Jika sudah mengisi maka akan click tombol submit. Proses akan dilanjutkan kepada RAC untuk memverifikasi KRI tersebut.</p>\r\n</body>\r\n</html>',4),(16,'<b> 1.7   CHANGE REQUEST</b>','',1,'2016-01-18 09:37:38','admin','<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p style=\"padding-left: 30px;\">Permintaan perubahan pada data yang telah diinput dapat dilakukan di dashboard pada tab yang ingin datanya dilakukan perubahan.</p>\r\n<p style=\"padding-left: 30px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/42.png\" alt=\"\" width=\"700\" height=\"553\" /></p>\r\n<p style=\"padding-left: 30px;\">Change request hanya dapat dilakukan jika data tersebut minimal tidak dalam status draft.</p>\r\n<p style=\"padding-left: 30px;\">Pada tabel change request dapat di click icon change request untuk merubah data. Setelah itu maka akan tampil form sesuai dengan di tab mana change request tersebut, berikut contoh change request pada Risk Form :</p>\r\n<p style=\"padding-left: 30px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/43.png\" alt=\"\" width=\"600\" height=\"545\" /></p>\r\n<p style=\"padding-left: 30px;\">Isi data perubahan pada kolom changes, lalu click tombol submit.&nbsp;Yang nantinya setelah disubmit akan muncul di dashboard pada tab change request list.</p>\r\n<p style=\"padding-left: 30px;\">Change Request dilakukan pada tab tab yang ada icon change request nya.</p>\r\n</body>\r\n</html>',4),(17,'<b> 1.8   ENTRY Q & A </b>','',1,'2016-01-18 09:44:33','admin','<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p style=\"padding-left: 30px;\">Fungsi Q&amp;A dapat dibuka melalui menu Transaction &gt; Q&amp;A</p>\r\n<p style=\"padding-left: 30px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/14.png\" alt=\"\" width=\"400\" height=\"60\" /></p>\r\n<p style=\"padding-left: 30px;\">Setelah itu akan terbuka form seperti berikut :</p>\r\n<p style=\"padding-left: 30px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/15.png\" alt=\"\" width=\"800\" height=\"240\" /></p>\r\n<p style=\"padding-left: 30px;\">Lalu click add new question untuk menambah pertanyaan yang ingin ditanyakan.</p>\r\n<p style=\"padding-left: 30px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/16.png\" alt=\"\" width=\"600\" height=\"200\" /></p>\r\n<p style=\"padding-left: 30px;\">Setelah itu isi subject dan question. Dan submit pertanyaannya. Namun status nya masih waiting for response hingga dijawab oleh RAC. Jika sudah dijawab maka status nya akan berganti menjadi completed.</p>\r\n<p style=\"padding-left: 30px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/17.png\" alt=\"\" width=\"800\" height=\"48\" /></p>\r\n<p>&nbsp;</p>\r\n</body>\r\n</html>',4),(18,'<b> 1.9   NEWS </b>','',1,'2016-01-18 09:51:47','admin','<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p style=\"padding-left: 30px;\">Pengumuman yang dibuat oleh RAC, nantinya dapat dilihat dari menu &gt; News.</p>\r\n<p style=\"padding-left: 30px; text-align: center;\">&nbsp;<img src=\"uploadedFile/ss2/18.png\" alt=\"\" width=\"200\" height=\"190\" /></p>\r\n<p style=\"padding-left: 30px;\">Akan muncul form dengan judul news dan published date.</p>\r\n<p style=\"padding-left: 30px;\"><br /><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/19.png\" alt=\"\" width=\"800\" height=\"145\" /></p>\r\n<p style=\"padding-left: 30px;\">Yang nantinya jika dipilih, maka akan tampil pdf viewer untuk news tersebut.</p>\r\n<p style=\"padding-left: 30px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/20.png\" alt=\"\" width=\"700\" height=\"414\" /></p>\r\n<p>&nbsp;</p>\r\n</body>\r\n</html>',4),(19,'<b> 1.10   USER MANUAL </b>','',1,'2016-01-18 10:11:29','admin','<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p style=\"padding-left: 30px;\">User manual dapat dilihat melalui menu &gt; User Manual</p>\r\n<p style=\"padding-left: 30px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/21.png\" alt=\"\" width=\"200\" height=\"213\" /></p>\r\n<p style=\"padding-left: 30px;\">Setelahnya dapat memilih sub user manual mana yang ingin dibaca</p>\r\n<p style=\"padding-left: 30px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/22.png\" alt=\"\" width=\"800\" height=\"262\" /></p>\r\n<p style=\"padding-left: 30px;\">Lalu berikut contoh tampilan yang ditampilkan jika sudah memilih salah satu dari sub user manual diatas :</p>\r\n<p style=\"padding-left: 30px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/23.png\" alt=\"\" width=\"800\" height=\"400\" /></p>\r\n<p>&nbsp;</p>\r\n</body>\r\n</html>',4),(20,'<b> 1.11   CHANGE LANGUAGE </b>','',1,'2016-01-18 10:14:53','admin','<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p style=\"padding-left: 30px; text-align: justify;\">Perubahan bahasa yang disediakan adalah Indonesia dan English. Untuk merubah bahasa yang ditampilkan dapat meng-click tombol pada kanan atas seperti berikut</p>\r\n<p style=\"padding-left: 30px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/24.png\" alt=\"\" width=\"500\" height=\"100\" /></p>\r\n<p>&nbsp;</p>\r\n</body>\r\n</html>',4),(21,'<b> 1.1   LOGIN </b>','',1,'2016-01-18 10:22:14','admin','<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p style=\"padding-left: 30px;\">Untuk dapat memasuki Risk Management System, user harus melakukan login terlebih dahulu. Username dan Password harus diisi sebelum click tombol login. Berikut&nbsp;merupakan user interface login.</p>\r\n<p style=\"padding-left: 30px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/25.png\" alt=\"\" width=\"600\" height=\"277\" /></p>\r\n<p style=\"padding-left: 30px;\">Setelah berhasil login maka akan muncul tampilan dashboard seperti berikut :</p>\r\n<p style=\"padding-left: 30px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/26.png\" alt=\"\" width=\"600\" height=\"508\" /></p>\r\n<p style=\"padding-left: 30px;\">Dashboard menampilkan informasi risiko yang dibutuhkan oleh user. Pada tab pertama yaitu tab my risk register akan menampilkan data seluruh risiko yang pernah&nbsp;di input oleh user tersebut. Tab selanjutnya yaitu risk owned by me, berisi risiko dimana pemilik risiko tersebut adalah divisi dari user tersebut. Tab my action plan menampilkan data action plan dimana pemilik action plan tersebut adalah divisi dari user tersebut. Tab my action plan execution akan menampilkan data action plan yang harus diisi status execution. Dan my kri adalah tab yang menampilkan data KRI dimana pemilik KRI tersebut adalah divisi dari user tersebut.&nbsp;Chart menampilkan data sesuai dengan jumlah risiko yang diinput oleh user.</p>\r\n<p style=\"padding-left: 30px;\">Untuk mencari risiko dapat menggunakan fungsi filter risiko bedasarkan kategori, sub-kategori dan 2<sup>nd</sup> sub kategori. Untuk mengembalikannya list seluruh risiko dapat mengclick tombol remove filter.</p>\r\n</body>\r\n</html>',5),(22,'<b> 1.2   ENTRY RISK </b>','',1,'2016-01-18 10:25:16','admin','<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p style=\"padding-left: 30px; text-align: justify;\">Untuk menginput risiko dibagi menjadi 2 (dua) :</p>\r\n<p style=\"padding-left: 30px; text-align: justify;\"><strong>1. Regular Exercise</strong></p>\r\n<p style=\"padding-left: 60px; text-align: justify;\">Entry Risk untuk Regular Exercise dilakukan ketika RAC sudah menginput periode risiko terlebih dahulu, dan dapat dilakukan melalui Menu -&gt; Transaction -&gt; Regular Exercise -&gt; Risk Register Exercise.</p>\r\n<p style=\"padding-left: 60px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/3.png\" alt=\"\" width=\"458\" height=\"48\" /></p>\r\n<p style=\"padding-left: 30px;\"><strong>2.&nbsp;Adhoc</strong></p>\r\n<p style=\"padding-left: 60px; text-align: justify;\">Jika RAC belum menginput periode risiko, atau periode risiko sudah melewati tanggalnya, maka untuk meingput sebuah risiko harus melalui Dashboard My Risk Register -&gt; Add New Risk -&gt; Risk Form.</p>\r\n<p style=\"padding-left: 60px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/4.png\" alt=\"\" width=\"657\" height=\"132\" /></p>\r\n<p style=\"padding-left: 30px;\"><strong>3. Entry New Risk</strong></p>\r\n<p style=\"padding-left: 60px;\">Pertama &ndash; tama akan muncul form Risk Register Exercise (hanya jika dibuka dari menu -&gt; Transaction -&gt; Regular Exercise &ndash; Risk Register Exercise, tidak berlaku untuk adhoc).</p>\r\n<p style=\"padding-left: 60px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/5.png\" alt=\"\" width=\"612\" height=\"428\" /></p>\r\n<p style=\"text-align: justify; padding-left: 60px;\">Maka user di sarankan untuk mengisi Roll Forward Risk Dahulu dengan click tombol confirm di sebelah kolom status pada risiko yang ingin diikutsertakan di periode ini. Atau mengclick tombol hapus risiko untuk menghapus risiko tersebut dari roll forward risk.</p>\r\n<p style=\"text-align: justify; padding-left: 60px;\">Untuk penambahan risiko diluar periode maka harus menambahkan dari dashboard atau di risk register exercise lalu click button add new risk. Setelahnya akan ada tampilan seperti ini, untuk diisi data risiko. Lalu button save untuk menyimpan.</p>\r\n<p style=\"padding-left: 60px;\">&nbsp;<img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/6.png\" alt=\"\" width=\"690\" height=\"431\" /></p>\r\n<p style=\"padding-left: 60px; text-align: justify;\">Jika ingin memilih dari library maka dapat meng-click button dengan icon search disamping Library Risk ID. Maka akan muncul tampilan sebagai berikut.</p>\r\n<p style=\"padding-left: 60px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/7.png\" alt=\"\" width=\"700\" height=\"175\" /></p>\r\n<p style=\"padding-left: 60px; text-align: justify;\">Untuk memilih risknya maka dapat meng-click button disamping kiri risiko nya.&nbsp;Setelah itu&nbsp; untuk mengisi risk impact maka harus meng-click tombol dengan icon cari disamping impact level. Setelahnya akan muncul form untuk mengisi parameter sesuai dengan category nya. Yang setelah di click tombol save maka akan otomatis menampilkan level dari impact tersebut.</p>\r\n<p style=\"padding-left: 60px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/8.png\" alt=\"\" width=\"600\" height=\"400\" /></p>\r\n<p style=\"padding-left: 60px; text-align: justify;\">Untuk mengisi likelihood maka harus meng-click tombol dengan icon cari disamping likelihood. Setelahnya akan muncul form seperti berikut.</p>\r\n<p style=\"padding-left: 60px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/9.png\" alt=\"\" width=\"600\" height=\"400\" /></p>\r\n<p style=\"padding-left: 60px; text-align: justify;\">&nbsp;</p>\r\n<p style=\"padding-left: 60px; text-align: justify;\">Setelahnya diisi dan disave maka akan otomatis menampilkan level dari likelihood dan juga level dari risiko.</p>\r\n<p style=\"padding-left: 60px; text-align: justify;\">Jika sudah menambahkan dan mengedit risiko pada periode ini maka button submit harus di click agar proses berlanjut untuk di verifikasi oleh RAC. Perlu diperhatikan bahwa submit button dilakukan untuk semua risiko yang tertera&nbsp;pada risk register exercise. Dan jika sudah mensubmit sekali maka tidak dapat melakukannya lagi, jika perlu untuk merubah data yang kebetulan salah, dapat menggunakan tombol change request untuk mengembalikan semua risiko menjadi status draft. Seperti contoh gambar dibawah ini :</p>\r\n<p style=\"padding-left: 60px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/10.png\" alt=\"\" width=\"800\" height=\"560\" /></p>\r\n<p style=\"padding-left: 60px;\">&nbsp;</p>\r\n<p style=\"padding-left: 60px;\">&nbsp;</p>\r\n</body>\r\n</html>',5),(23,'<b> 1.3   ENTRY TREATMENT </b>','',1,'2016-01-18 10:25:56','admin','<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Fungsi Entry Treatment hanya bisa dilakukan oleh PIC dan Division Head selaku risk owner dari risiko yang telah di entry dan di verifikasi oleh RAC. Berbeda dengan Division Head, seorang PIC Division hanya bisa meng-entry risk treatment hanya jika Division Head meng-assigned risiko tersebut.</p>\r\n<p>Contoh :</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/27.png\" alt=\"\" width=\"600\" height=\"436\" /></p>\r\n<p>Pada kolom assigned to dapat di click dan akan muncul popup seperti berikut.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/28.png\" alt=\"\" width=\"600\" height=\"171\" /></p>\r\n<p>Untuk memilih dapat mengclick tombol di kolom pertama. Harus memilih salah satu agar dapat menginput treatment.</p>\r\n<p>Jika sudah di assign, maka sesuai dengan siapa yang di assign dapat membukanya dengan mengclick risk id yang diinginkan. Setelahnya akan muncul tampilan seperti berikut :</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/29.png\" alt=\"\" width=\"600\" height=\"545\" /></p>\r\n<p>Jika sudah merubah sesuai dengan kebutuhan atau langsung menyetujui risiko yang dimiliki. Maka dapat mengclick tombol submit. Tombol save as draft digunakan hanya untuk menyimpan perubahan tanpa mensubmit risiko tersebut.</p>\r\n</body>\r\n</html>',5),(24,'<b> 1.4   ENTRY ACTION PLAN </b>','',1,'2016-01-18 10:27:57','admin','<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p style=\"padding-left: 30px; text-align: justify;\">Fungsi Entry Action Plan hanya bisa dilakukan oleh PIC dan Division Head selaku action plan owner dari risiko yang telah di entry dan di verifikasi oleh RAC. Berbeda dengan Division Head, seorang PIC Division hanya bisa meng-entry action plan hanya jika Division Head meng-assigned risiko tersebut.</p>\r\n<p style=\"padding-left: 30px; text-align: justify;\">Contoh :</p>\r\n<p style=\"padding-left: 30px; text-align: justify;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/30.png\" alt=\"\" width=\"600\" height=\"432\" /></p>\r\n<p style=\"padding-left: 30px; text-align: justify;\">Pada kolom assigned to dapat di click dan akan muncul popup seperti berikut.</p>\r\n<p style=\"padding-left: 30px; text-align: justify;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/31.png\" alt=\"\" width=\"600\" height=\"171\" /></p>\r\n<p style=\"padding-left: 30px; text-align: justify;\">Untuk memilih dapat meng-click tombol di kolom pertama. Harus memilih salah satu agar dapat menginput action plan.</p>\r\n<p style=\"padding-left: 30px; text-align: justify;\"><strong>&nbsp;</strong></p>\r\n<p style=\"padding-left: 30px; text-align: justify;\">Jika sudah di assign, maka sesuai dengan siapa yang di assign dapat membukanya dengan mengclick action plan id yang diinginkan. Setelahnya akan muncul tampilan seperti berikut :</p>\r\n<p style=\"padding-left: 30px; text-align: justify;\">&nbsp;<img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/32.png\" alt=\"\" width=\"600\" height=\"436\" /></p>\r\n<p style=\"padding-left: 30px; text-align: justify;\">Jika sudah merubah sesuai dengan kebutuhan atau langsung menyetujui action plan yang dimiliki. Maka dapat mengclick tombol submit. Tombol save as draft digunakan hanya untuk menyimpan perubahan tanpa mensubmit action plan tersebut.</p>\r\n<p style=\"padding-left: 30px; text-align: justify;\">Hanya jika PIC yang mensubmit data action plan. Maka action plan tersebut harus diapprove atau disubmit kembali oleh Head Division.</p>\r\n</body>\r\n</html>',5),(25,'<b> 1.5 ENTRY ACTION PLAN EXECUTION </b>','',1,'2016-01-18 10:28:21','admin','<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p style=\"padding-left: 30px;\">Fungsi Entry Action Plan Execution hanya bisa dilakukan oleh PIC atau Division Head. Tergantung siapa yang mengentry action plan sebelumnya, jika PIC maka PIC lah yang harus meng-entry Action Plan Executionnya. Action plan execution pada tab hanya bisa dilakukan pada saat adhoc, sedangkan action plan execution menu dilakukan saat periode sedang berlangsung.</p>\r\n<p style=\"padding-left: 30px;\">Pada tab akan muncul tampilan seperti berikut :</p>\r\n<p style=\"padding-left: 30px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/33.png\" alt=\"\" width=\"600\" height=\"436\" /></p>\r\n<p style=\"padding-left: 30px;\">Sedangkan pada menu Transaction &gt; Action Plan Execution, tampilannya akan seperti berikut :</p>\r\n<p style=\"padding-left: 30px; text-align: center;\"><img src=\"uploadedFile/ss2/34.png\" alt=\"\" width=\"400\" height=\"100\" /></p>\r\n<p style=\"padding-left: 30px; text-align: center;\"><img src=\"uploadedFile/ss2/35.png\" alt=\"\" width=\"800\" height=\"400\" /></p>\r\n<p style=\"padding-left: 30px;\">&nbsp;</p>\r\n<p style=\"padding-left: 30px;\">Untuk meng-entrynya dapat mengclick tombol pada kolom execution. Maka setelah itu akan muncul tampilan pop up sebagai berikut</p>\r\n<p style=\"padding-left: 30px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/36.png\" alt=\"\" width=\"600\" height=\"343\" /></p>\r\n<p style=\"padding-left: 30px;\">Jika action plan tersebut complete, isikan explanation dan evidence nya. Pada Combobox status dapat diganti dari Complete menjadi Extend atau Ongoing, yang tampilan seperti berikut jika diganti :</p>\r\n<p style=\"padding-left: 30px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/37.png\" alt=\"\" width=\"600\" height=\"343\" /></p>\r\n<p style=\"padding-left: 30px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/38.png\" alt=\"\" width=\"600\" height=\"200\" /></p>\r\n<p style=\"padding-left: 30px;\">Dengan status extend maka isilah reasond dan revised date nya dan status ongoing isilah explanationnya. Setelahnya klik save untuk menyimpan. Di dashboard maka akan berubah pada kolom execution menjadi hasil yang diinput.</p>\r\n<p style=\"padding-left: 30px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/39.png\" alt=\"\" width=\"600\" height=\"382\" /></p>\r\n<p style=\"padding-left: 30px;\">Setelahnya maka click tombol submit disebelah button execution. Jika PIC yang menginput action plan execution maka Division Head selanjutnya harus mengecek dan mensubmit action plan execution yang sudah diinput oleh PIC.</p>\r\n</body>\r\n</html>',5),(26,'<b> 1.6   ENTRY KRI REPORT BY KRI OWNER </b>','',1,'2016-01-18 10:27:07','admin','<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p style=\"padding-left: 30px;\">Setelah RAC meng-input Key Risk Indicator, maka KRI owner akan menerima KRI telah di-input oleh RAC. Yang nantinya akan muncul pada dashboard Division Head dari KRI Owner pada tab My KRI.</p>\r\n<p style=\"padding-left: 30px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/40.png\" alt=\"\" width=\"600\" height=\"382\" /></p>\r\n<p style=\"padding-left: 30px;\">Untuk menginput report pada KRI, maka diharuskan meng-assign KRI tersebut terlebih dahulu.&nbsp;Setelah di assign baru dapat meng-click KRI ID dan muncul form berikut :</p>\r\n<p style=\"padding-left: 30px;\">&nbsp;<img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/41.png\" alt=\"\" width=\"600\" height=\"327\" /></p>\r\n<p style=\"padding-left: 30px;\">Pengisian data report tergantung pada tipe threshold yang diinput oleh RAC.</p>\r\n<p style=\"padding-left: 30px;\">Jika sudah mengisi maka akan click tombol submit. Proses akan dilanjutkan kepada RAC untuk memverifikasi KRI tersebut.</p>\r\n</body>\r\n</html>',5),(27,'<b> 1.7   CHANGE REQUEST</b>','',1,'2016-01-18 10:28:53','admin','<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p style=\"padding-left: 30px;\">Permintaan perubahan pada data yang telah diinput dapat dilakukan di dashboard pada tab yang ingin datanya dilakukan perubahan.</p>\r\n<p style=\"padding-left: 30px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/42.png\" alt=\"\" width=\"700\" height=\"553\" /></p>\r\n<p style=\"padding-left: 30px;\">Change request hanya dapat dilakukan jika data tersebut minimal tidak dalam status draft.</p>\r\n<p style=\"padding-left: 30px;\">Pada tabel change request dapat di click icon change request untuk merubah data. Setelah itu maka akan tampil form sesuai dengan di tab mana change request tersebut, berikut contoh change request pada Risk Form :</p>\r\n<p style=\"padding-left: 30px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/43.png\" alt=\"\" width=\"600\" height=\"545\" /></p>\r\n<p style=\"padding-left: 30px;\">Isi data perubahan pada kolom changes, lalu click tombol submit.&nbsp;Yang nantinya setelah disubmit akan muncul di dashboard pada tab change request list.</p>\r\n<p style=\"padding-left: 30px;\">Change Request dilakukan pada tab tab yang ada icon change request nya.</p>\r\n</body>\r\n</html>',5),(28,'<b> 1.8   ENTRY Q & A </b>','',1,'2016-01-18 10:29:11','admin','<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p style=\"padding-left: 30px;\">Fungsi Q&amp;A dapat dibuka melalui menu Transaction &gt; Q&amp;A</p>\r\n<p style=\"padding-left: 30px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/14.png\" alt=\"\" width=\"400\" height=\"60\" /></p>\r\n<p style=\"padding-left: 30px;\">Setelah itu akan terbuka form seperti berikut :</p>\r\n<p style=\"padding-left: 30px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/15.png\" alt=\"\" width=\"800\" height=\"240\" /></p>\r\n<p style=\"padding-left: 30px;\">Lalu click add new question untuk menambah pertanyaan yang ingin ditanyakan.</p>\r\n<p style=\"padding-left: 30px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/16.png\" alt=\"\" width=\"600\" height=\"200\" /></p>\r\n<p style=\"padding-left: 30px;\">Setelah itu isi subject dan question. Dan submit pertanyaannya. Namun status nya masih waiting for response hingga dijawab oleh RAC. Jika sudah dijawab maka status nya akan berganti menjadi completed.</p>\r\n<p style=\"padding-left: 30px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/17.png\" alt=\"\" width=\"800\" height=\"48\" /></p>\r\n<p>&nbsp;</p>\r\n</body>\r\n</html>',5),(29,'<b> 1.9   NEWS </b>','',1,'2016-01-18 10:29:29','admin','<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p style=\"padding-left: 30px;\">Pengumuman yang dibuat oleh RAC, nantinya dapat dilihat dari menu &gt; News.</p>\r\n<p style=\"padding-left: 30px; text-align: center;\">&nbsp;<img src=\"uploadedFile/ss2/18.png\" alt=\"\" width=\"200\" height=\"190\" /></p>\r\n<p style=\"padding-left: 30px;\">Akan muncul form dengan judul news dan published date.</p>\r\n<p style=\"padding-left: 30px;\"><br /><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/19.png\" alt=\"\" width=\"800\" height=\"145\" /></p>\r\n<p style=\"padding-left: 30px;\">Yang nantinya jika dipilih, maka akan tampil pdf viewer untuk news tersebut.</p>\r\n<p style=\"padding-left: 30px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/20.png\" alt=\"\" width=\"700\" height=\"414\" /></p>\r\n<p>&nbsp;</p>\r\n</body>\r\n</html>',5),(30,'<b> 1.10   USER MANUAL </b>','',1,'2016-01-18 10:30:13','admin','<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p style=\"padding-left: 30px;\">User manual dapat dilihat melalui menu &gt; User Manual</p>\r\n<p style=\"padding-left: 30px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/21.png\" alt=\"\" width=\"200\" height=\"213\" /></p>\r\n<p style=\"padding-left: 30px;\">Setelahnya dapat memilih sub user manual mana yang ingin dibaca</p>\r\n<p style=\"padding-left: 30px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/22.png\" alt=\"\" width=\"800\" height=\"262\" /></p>\r\n<p style=\"padding-left: 30px;\">Lalu berikut contoh tampilan yang ditampilkan jika sudah memilih salah satu dari sub user manual diatas :</p>\r\n<p style=\"padding-left: 30px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/23.png\" alt=\"\" width=\"800\" height=\"400\" /></p>\r\n<p>&nbsp;</p>\r\n</body>\r\n</html>',5),(31,'<b> 1.11   CHANGE LANGUAGE </b>','',1,'2016-01-18 10:30:31','admin','<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p style=\"padding-left: 30px; text-align: justify;\">Perubahan bahasa yang disediakan adalah Indonesia dan English. Untuk merubah bahasa yang ditampilkan dapat meng-click tombol pada kanan atas seperti berikut</p>\r\n<p style=\"padding-left: 30px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/24.png\" alt=\"\" width=\"500\" height=\"100\" /></p>\r\n<p>&nbsp;</p>\r\n</body>\r\n</html>',5),(32,'<b> 1.1   LOGIN </b>','',1,'2016-01-18 12:07:52','admin','<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p style=\"padding-left: 30px;\">Untuk dapat memasuki Risk Management System, user harus melakukan login terlebih dahulu. Username dan Password harus diisi sebelum click tombol login. Berikut&nbsp;merupakan user interface login.</p>\r\n<p style=\"padding-left: 30px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/25.png\" alt=\"\" width=\"600\" height=\"277\" /></p>\r\n<p style=\"padding-left: 30px;\">Setelah berhasil login maka akan muncul tampilan dashboard seperti berikut :</p>\r\n<p style=\"padding-left: 30px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/44.png\" alt=\"\" width=\"600\" height=\"508\" /></p>\r\n<p style=\"padding-left: 30px;\">Dashboard menampilkan informasi risiko yang dibutuhkan oleh user. Pada tab pertama yaitu tab risk list&nbsp;akan menampilkan data seluruh risiko. Tab selanjutnya yaitu risk register list untuk melakukan verify risk register yagn sudah di ajukan oleh user. Tab my treatment digunakan untuk memverify risk owner form, Tab action plan list untuk memverifikasi action plan dan action plan execution untuk memverifikasi status execution yang dilakukan oleh action plan owner. tab KRI list menampilkan data KRI yang sudah diinput beserta dengan data dan warning nya. Tab change request untuk menampilkan list change request yang diajukan oleh user. Chart menampilkan data sesuai dengan jumlah risiko atau action plan yang harus diverifikasi.</p>\r\n</body>\r\n</html>',2),(33,'<b> 1.2 VERIFY RISK </b>','',1,'2016-01-18 13:24:47','admin','<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p style=\"text-align: justify; padding-left: 30px;\">Verify Risk Treatment hanya dapat dilakukan oleh Divisi RAC dengan mengganti role menjadi admin. Risiko yang telah disubmit oleh user akan muncul pada Dashboard di Tab Risk List dan Risk Register List. Risk Register List dipergunakan untuk memverifikasi risiko per user yang mensubmitnya.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/45.png\" alt=\"\" width=\"600\" height=\"420\" /></p>\r\n<p style=\"padding-left: 30px;\">Setelah meng-click user yang di inginkan dan memilih mana risiko yang ingin diverifikasi. Maka akan muncul 2 tampilan yang berbeda tegantung dari risiko yang telah diinput. Apakah risiko tersebut diambil dari library atau merupakan risiko yang baru diinput.</p>\r\n<p style=\"padding-left: 30px;\">Jika risiko baru maka berikut tampilan nya :</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/46.png\" alt=\"\" width=\"700\" height=\"636\" /></p>\r\n<p style=\"padding-left: 30px;\">Button Save di-click hanya untuk menyimpan perubahan yang dilakukan.</p>\r\n<p style=\"padding-left: 30px;\">Button Verify di-click untuk memverifikasi risiko tersebut.</p>\r\n<p style=\"padding-left: 30px;\">Button Delete di-click untuk menghapus risiko tersebut</p>\r\n<p style=\"padding-left: 30px;\">Button Cancel untuk membatalkan proses yang baru saja dilakukan.</p>\r\n<p style=\"padding-left: 30px;\">Jika risiko nya merupakan risiko yang diambil dari library maka akan tampil :</p>\r\n<p style=\"padding-left: 30px;\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"uploadedFile/ss2/47.png\" alt=\"\" width=\"700\" height=\"827\" /></p>\r\n<p style=\"padding-left: 30px;\">Primary merupakan data risiko dari library sedangkan changes merupakan data risiko yang baru diinput oleh user.</p>\r\n<p style=\"padding-left: 30px;\">Tombol set as primary akan mengganti data risiko pada primary. Oleh karena itu jika hanya ingin menyimpan perubahan dapat meng-click tombol save. Karena tombol set as primary akan menghilangkan data risiko yang lama dan menggantinya dengan yang baru.</p>\r\n<p style=\"padding-left: 30px;\">Tombol verify digunakan untuk memverifikasi data risiko.</p>\r\n</body>\r\n</html>',2);