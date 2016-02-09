# Host: localhost  (Version: 5.5.27)
# Date: 2016-02-09 10:45:29
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES latin1 */;

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

INSERT INTO `m_menu_i` VALUES (0,'','',0,0,NULL),(1,'Dashboard','maini',0,0,'icon-home'),(5,'Division','user/division',39,3,NULL),(6,'Dashboard RAC','main/rac',0,1,'icon-home'),(7,'Periodic','',0,2,'icon-clock'),(8,'Adhoc','',0,3,'icon-hourglass'),(9,'Modify User','useri/modify',0,4,'icon-users'),(10,'Housekeeping','',0,6,'icon-layers'),(11,'Help & Policy','pages/help',0,7,'icon-info'),(12,'Change Request','',0,5,'icon-book-open'),(13,'Risk Register','riski/RiskRegister',7,1,NULL),(14,'Risk Treatment','',7,2,NULL),(15,'Risk Action','',7,3,NULL),(16,'KRI','',7,4,NULL),(17,'Entri Periode','admini/periode',7,5,NULL),(18,'Risk Register','',8,1,NULL),(19,'Risk Treatment','',8,2,NULL),(20,'Risk Action','',8,3,NULL),(21,'KRI','',8,4,NULL),(23,'Beranda','maini',0,100,'icon-home'),(24,'Transaksi','',0,101,'icon-book-open'),(25,'Pelaksanaan Berkala','',24,1,NULL),(26,'Risk Register Berkala','riski/RiskRegister',25,0,''),(27,'Tanya & Jawab','maini/qna',24,2,''),(28,'Berita','maini/news',0,102,'icon-feed'),(29,'Panduan Pengguna','maini/usermanual',0,103,'icon-info'),(30,'Beranda','maini/mainpic',0,100,'icon-home'),(32,'Pengaturan','',0,300,'icon-settings'),(33,'Entri Periode Berkala','',32,0,NULL),(34,'Risk Register Berkala','admini/periode',33,0,NULL),(35,'Pelaksanaan Action Plan','admini/periode/actplan',33,0,NULL),(36,'Entri Kategori','admini/category',32,0,NULL),(37,'Pengaturan Hak Akses Pengguna','useri/modify',32,0,NULL),(38,'Beranda','maini/mainrac',0,100,'icon-home'),(39,'Administration','',0,400,'icon-settings'),(40,'Pengguna','useri',39,1,''),(41,'Peran','useri/role',39,2,''),(42,'Referensi','admini/reference',39,4,''),(43,'Mengelola Berita','admini/news',32,0,NULL),(44,'Penetapan KRI','',24,0,NULL),(45,'Pengaturan KRI','riski/kri/krisetting',44,0,NULL),(46,'Entri KRI','riski/kri/krientry',44,0,NULL),(47,'Q & A Management','admini/qna',24,0,NULL),(48,'Mengelola Panduan Pengguna','admini/usermanual',39,1,NULL),(49,'Pengaturan Banner','admini/banner',32,0,NULL),(50,'Laporan','reporti/risk/getallrisk',0,102,'icon-folder'),(61,'IIFG Corporate Risk Register','',50,1,NULL),(62,'List of Risk Event','reporti/risk/listofrisk',61,1,NULL),(63,'List of Risk Identified during this periode','reporti/risk/listofrisketc',61,2,NULL),(64,'Risk Treatment Report','reporti/risk/risktreatmentreport',50,2,NULL),(65,'Action Plan Execution','',50,3,NULL),(66,'Daftar Semua Action Plan Execution dengan Status','reporti/risk/listofall',65,1,NULL),(67,'Daftar Semua Action Plan Execution','reporti/risk/listofall1',65,2,NULL),(68,'Tabel Resiko','reporti/risk_table',50,4,NULL),(69,'Perbandingan Resiko Antar Periode','reporti/risk/comparison1',68,1,NULL),(70,'Comparison 2nd sub category beetwen periode','reporti/risk/comparison2',68,2,NULL),(71,'Top 10 Resiko','reporti/risk/topten',50,5,NULL),(72,'Top 10 2nd Sub Kategori','reporti/risk/topten2',50,6,NULL),(73,'Comparison of outcome','',50,7,NULL),(74,'berdasarkan Risk ','reporti/risk/getcomparison1',73,1,NULL),(75,'berdasarkan 2nd sub category','reporti/risk/getcomparison2',73,2,NULL),(77,'KRI Monitoring','reporti/risk/KRI_monitoring',50,9,NULL),(78,'Library Management','',0,103,'icon-settings'),(79,'Risk','Risk',78,1,''),(80,'List Risk','library/list_risk',79,1,''),(81,'List of Action Plan','library/list_ap',79,2,''),(82,'List of Existing Control','library/list_ec',79,3,''),(83,'Taksonomi 2nd Sub Category','library/taksonomi',78,2,''),(84,'KRI','library/kri',78,3,''),(86,'Eksekusi Action Plan','maini/mainpic/actionplan_adt',24,2,''),(88,'List of Objective','library/list_objective',79,3,''),(551,'Daftar Semua Risiko','reporti/risk/getallrisk',50,1,''),(552,'Daftar Semua Risiko (Periode)','reporti/risk/getallriskperiode',50,2,NULL),(553,'Action Plan','reporti/risk/getactionplan',50,3,NULL),(554,'Pananganan Risiko','reporti/risk/gettreatment',50,4,NULL),(555,'Table Risiko','reporti/risk/gettable',50,5,NULL),(556,'Top Ten Risiko','reporti/risk/gettopten',50,6,NULL),(557,'KRI ','reporti/risk/getkri',50,7,NULL),(558,'Comparison Of Outcome','reporti/risk/getcomparison',50,8,NULL),(559,'Daftar 2nd Sub Category','reporti/risk/get2ndcategory',50,9,NULL),(577,'Pengembalian Risiko','risk/RiskRegister/recover',32,0,NULL),(578,'Report','admin/periode/periode_r',33,0,NULL),(600,'Dalam Perbaikan','risk/RiskRegister/undermaintenance',24,0,NULL);
