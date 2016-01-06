/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 5.6.26 : Database - pii_fix
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`pii_fix` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `pii_fix`;

/*Table structure for table `m_menu` */

DROP TABLE IF EXISTS `m_menu`;

CREATE TABLE `m_menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(200) NOT NULL,
  `menu_module` varchar(200) NOT NULL,
  `menu_parent` int(11) NOT NULL,
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `menu_icon` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=577 DEFAULT CHARSET=latin1;

/*Data for the table `m_menu` */

insert  into `m_menu`(`menu_id`,`menu_name`,`menu_module`,`menu_parent`,`menu_order`,`menu_icon`) values (0,'','',0,0,NULL),(1,'Dashboard','main',0,0,'icon-home'),(5,'Division','user/division',39,3,NULL),(6,'Dashboard RAC','main/rac',0,1,'icon-home'),(7,'Periodic','',0,2,'icon-clock'),(8,'Adhoc','',0,3,'icon-hourglass'),(9,'Modify User','user/modify',0,4,'icon-users'),(10,'Housekeeping','',0,6,'icon-layers'),(11,'Help & Policy','pages/help',0,7,'icon-info'),(12,'Change Request','',0,5,'icon-book-open'),(13,'Risk Register','risk/RiskRegister',7,1,NULL),(14,'Risk Treatment','',7,2,NULL),(15,'Risk Action','',7,3,NULL),(16,'KRI','',7,4,NULL),(17,'Entry Periode','admin/periode',7,5,NULL),(18,'Risk Register','',8,1,NULL),(19,'Risk Treatment','',8,2,NULL),(20,'Risk Action','',8,3,NULL),(21,'KRI','',8,4,NULL),(23,'Home','main',0,100,'icon-home'),(24,'Transaction','',0,101,'icon-book-open'),(25,'Regular Exercise','',24,1,NULL),(26,'Risk Register Exercise','risk/RiskRegister',25,0,''),(27,'Q & A','main/qna',24,2,''),(28,'News','main/news',0,102,'icon-feed'),(29,'User Manual','main/usermanual',0,103,'icon-info'),(30,'Home','main/mainpic',0,100,'icon-home'),(32,'Settings','',0,300,'icon-settings'),(33,'Entry Regular Period','',32,0,NULL),(34,'Risk Register Exercise','admin/periode',33,0,NULL),(35,'Action Plan Execution','admin/periode/actplan',33,0,NULL),(36,'Entry Category','admin/category',32,0,NULL),(37,'User Access Settings','user/modify',32,0,NULL),(38,'Home','main/mainrac',0,100,'icon-home'),(39,'Administration','',0,400,'icon-settings'),(40,'User','user',39,1,''),(41,'Role','user/role',39,2,''),(42,'Reference','admin/reference',39,4,''),(43,'Manage News','admin/news',32,0,NULL),(44,'KRI Designation','',24,0,NULL),(45,'KRI Setting','risk/kri/krisetting',44,0,NULL),(46,'Entry KRI','risk/kri/krientry',44,0,NULL),(47,'Q & A Management','admin/qna',24,0,NULL),(48,'Manage User Manual','admin/usermanual',32,0,NULL),(49,'Banner Setting','admin/banner',32,0,NULL),(50,'Report','report/risk/getallrisk',0,102,'icon-folder'),(60,'asdasd','aasd',51,0,NULL),(61,'IIFG Corporate Risk Register','#',50,1,NULL),(62,'List of Risk Event','report/risk/listofrisk',61,1,NULL),(63,'List of Risk Identified during this periode','report/risk/listofrisketc',61,2,NULL),(64,'Risk Treatment Report','report/risk/risktreatmentreport',50,2,NULL),(65,'Action Plan Execution','#',50,3,NULL),(66,'List of All Action Plan Execution with Status','report/risk/listofall',65,1,NULL),(67,'List of All Action Plan Execution','report/risk/listofall1',65,2,NULL),(68,'Risk Table','report/risk_table',50,4,NULL),(69,'Comparison Risk beetween Periode','report/risk/comparison1',68,1,NULL),(70,'Comparison 2nd sub category beetwen periode','report/risk/comparison2',68,2,NULL),(71,'Top Ten Risk','report/risk/topten',50,5,NULL),(72,'Top Ten 2nd Sub Category','report/risk/topten2',50,6,NULL),(73,'Comparison of outcome','',50,7,NULL),(74,'by Risk ','report/risk/getcomparison1',73,1,NULL),(75,'by 2nd sub category','report/risk/getcomparison2',73,2,NULL),(77,'KRI Monitoring','report/risk/KRI_monitoring',50,9,NULL),(551,'List of All Risks-','report/risk/getallrisk',50,0,NULL),(552,'List of All Risk (Periode)','report/risk/getallriskperiode',50,2,NULL),(553,'Action Plan','report/risk/getactionplan',50,3,NULL),(554,'Risk Treatment','report/risk/gettreatment',50,4,NULL),(555,'Risk Table','report/risk/gettable',50,5,NULL),(556,'Top Ten Risk','report/risk/gettopten',50,6,NULL),(557,'KRI','report/risk/getkri',50,7,NULL),(558,'Comparison Of Outcome','report/risk/getcomparison',50,8,NULL),(559,'List of 2nd Sub Category','report/risk/get2ndcategory',50,9,NULL),(576,'KRI','',50,8,NULL);

/*Table structure for table `m_menu_i` */

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

/*Data for the table `m_menu_i` */

insert  into `m_menu_i`(`menu_id`,`menu_name`,`menu_module`,`menu_parent`,`menu_order`,`menu_icon`) values (0,'','',0,0,NULL),(1,'Dashboard','maini',0,0,'icon-home'),(5,'Division','user/division',39,3,NULL),(6,'Dashboard RAC','main/rac',0,1,'icon-home'),(7,'Periodic','',0,2,'icon-clock'),(8,'Adhoc','',0,3,'icon-hourglass'),(9,'Modify User','useri/modify',0,4,'icon-users'),(10,'Housekeeping','',0,6,'icon-layers'),(11,'Help & Policy','pages/help',0,7,'icon-info'),(12,'Change Request','',0,5,'icon-book-open'),(13,'Risk Register','riski/RiskRegister',7,1,NULL),(14,'Risk Treatment','',7,2,NULL),(15,'Risk Action','',7,3,NULL),(16,'KRI','',7,4,NULL),(17,'Entri Periode','admini/periode',7,5,NULL),(18,'Risk Register','',8,1,NULL),(19,'Risk Treatment','',8,2,NULL),(20,'Risk Action','',8,3,NULL),(21,'KRI','',8,4,NULL),(23,'Beranda','maini',0,100,'icon-home'),(24,'Transaksi','',0,101,'icon-book-open'),(25,'Pelaksanaan Berkala','',24,1,NULL),(26,'Risk Register Berkala','riski/RiskRegister',25,0,''),(27,'Tanya & Jawab','maini/qna',24,2,''),(28,'Berita','maini/news',0,102,'icon-feed'),(29,'Panduan Pengguna','maini/usermanual',0,103,'icon-info'),(30,'Beranda','maini/mainpic',0,100,'icon-home'),(32,'Pengaturan','',0,300,'icon-settings'),(33,'Entri Periode Berkala','',32,0,NULL),(34,'Risk Register Berkala','admini/periode',33,0,NULL),(35,'Pelaksanaan Action Plan','admini/periode/actplan',33,0,NULL),(36,'Entri Kategori','admini/category',32,0,NULL),(37,'Pengaturan Hak Akses Pengguna','useri/modify',32,0,NULL),(38,'Beranda','maini/mainrac',0,100,'icon-home'),(39,'Administration','',0,400,'icon-settings'),(40,'Pengguna','useri',39,1,''),(41,'Peran','useri/role',39,2,''),(42,'Referensi','admini/reference',39,4,''),(43,'Mengelola Berita','admini/news',32,0,NULL),(44,'Penetapan KRI','',24,0,NULL),(45,'Pengaturan KRI','riski/kri/krisetting',44,0,NULL),(46,'Entri KRI','riski/kri/krientry',44,0,NULL),(47,'Q & A Management','admini/qna',24,0,NULL),(48,'Mengelola Panduan Pengguna','admini/usermanual',39,1,NULL),(49,'Pengaturan Banner','admini/banner',32,0,NULL),(50,'Laporan','reporti/risk/getallrisk',0,102,'icon-folder'),(61,'IIFG Corporate Risk Register','',50,1,NULL),(62,'List of Risk Event','reporti/risk/listofrisk',61,1,NULL),(63,'List of Risk Identified during this periode','reporti/risk/listofrisketc',61,2,NULL),(64,'Risk Treatment Report','reporti/risk/risktreatmentreport',50,2,NULL),(65,'Action Plan Execution','',50,3,NULL),(66,'Daftar Semua Action Plan Execution dengan Status','reporti/risk/listofall',65,1,NULL),(67,'Daftar Semua Action Plan Execution','reporti/risk/listofall1',65,2,NULL),(68,'Tabel Resiko','reporti/risk_table',50,4,NULL),(69,'Perbandingan Resiko Antar Periode','reporti/risk/comparison1',68,1,NULL),(70,'Comparison 2nd sub category beetwen periode','reporti/risk/comparison2',68,2,NULL),(71,'Top 10 Resiko','reporti/risk/topten',50,5,NULL),(72,'Top 10 2nd Sub Kategori','reporti/risk/topten2',50,6,NULL),(73,'Comparison of outcome','',50,7,NULL),(74,'berdasarkan Risk ','reporti/risk/getcomparison1',73,1,NULL),(75,'berdasarkan 2nd sub category','reporti/risk/getcomparison2',73,2,NULL),(77,'KRI Monitoring','reporti/risk/KRI_monitoring',50,9,NULL),(551,'Daftar Semua Risiko','reporti/risk/getallrisk',50,1,''),(552,'Daftar Semua Risiko (Periode)','reporti/risk/getallriskperiode',50,2,NULL),(553,'Action Plan','reporti/risk/getactionplan',50,3,NULL),(554,'Pananganan Risiko','reporti/risk/gettreatment',50,4,NULL),(555,'Table Risiko','reporti/risk/gettable',50,5,NULL),(556,'Top Ten Risiko','reporti/risk/gettopten',50,6,NULL),(557,'KRI ','reporti/risk/getkri',50,7,NULL),(558,'Comparison Of Outcome','reporti/risk/getcomparison',50,8,NULL),(559,'Daftar 2nd Sub Category','reporti/risk/get2ndcategory',50,9,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
