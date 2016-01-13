# Host: localhost  (Version: 5.5.27)
# Date: 2016-01-13 20:19:51
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

INSERT INTO `m_likelihood` VALUES (1,'VERY LOW','VERY LOW','0% - 10% probability of risk could occur within 1 year or on each event / activity that creates the risk'),(2,'LOW','LOW','10% - 30% probability of risk could occur within 1 year or on each event / activity that creates the risk'),(3,'MEDIUM','MEDIUM','30% - 50% probability of risk could occur within 1 year or on each event / activity that creates the risk'),(4,'HIGH','HIGH','50% - 70% probability of risk could occur within 1 year or on each event / activity that creates the risk'),(5,'VERY HIGH','VERY HIGH','70% - 100% probability of risk could occur within 1 year or on each event / activity that creates the risk');

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
) ENGINE=InnoDB AUTO_INCREMENT=578 DEFAULT CHARSET=latin1;

#
# Data for table "m_menu"
#

INSERT INTO `m_menu` VALUES (1,'Dashboard','main',0,0,'icon-home'),(5,'Division','user/division',39,3,NULL),(6,'Dashboard RAC','main/rac',0,1,'icon-home'),(7,'Periodic','',0,2,'icon-clock'),(8,'Adhoc','',0,3,'icon-hourglass'),(9,'Modify User','user/modify',0,4,'icon-users'),(10,'Housekeeping','',0,6,'icon-layers'),(11,'Help & Policy','pages/help',0,7,'icon-info'),(12,'Change Request','',0,5,'icon-book-open'),(13,'Risk Register','risk/RiskRegister',7,1,NULL),(14,'Risk Treatment','',7,2,NULL),(15,'Risk Action','',7,3,NULL),(16,'KRI','',7,4,NULL),(17,'Entry Periode','admin/periode',7,5,NULL),(18,'Risk Register','',8,1,NULL),(19,'Risk Treatment','',8,2,NULL),(20,'Risk Action','',8,3,NULL),(21,'KRI','',8,4,NULL),(23,'Home','main',0,100,'icon-home'),(24,'Transaction','',0,101,'icon-book-open'),(25,'Regular Exercise','',24,1,NULL),(26,'Risk Register Exercise','risk/RiskRegister',25,0,''),(27,'Q & A','main/qna',24,2,''),(28,'News','main/news',0,102,'icon-feed'),(29,'User Manual','main/usermanual',0,103,'icon-info'),(30,'Home','main/mainpic',0,100,'icon-home'),(32,'Settings','',0,300,'icon-settings'),(33,'Entry Regular Period','',32,0,NULL),(34,'Risk Register Exercise','admin/periode',33,0,NULL),(35,'Action Plan Execution','admin/periode/actplan',33,0,NULL),(36,'Entry Category','admin/category',32,0,NULL),(37,'User Access Settings','user/modify',32,0,NULL),(38,'Home','main/mainrac',0,100,'icon-home'),(39,'Administration','',0,400,'icon-settings'),(40,'User','user',39,1,''),(41,'Role','user/role',39,2,''),(42,'Reference','admin/reference',39,4,''),(43,'Manage News','admin/news',32,0,NULL),(44,'KRI Designation','',24,0,NULL),(45,'KRI Setting','risk/kri/krisetting',44,0,NULL),(46,'Entry KRI','risk/kri/krientry',44,0,NULL),(47,'Q & A Management','admin/qna',24,0,NULL),(48,'Manage User Manual','admin/usermanual',39,0,NULL),(49,'Banner Setting','admin/banner',32,0,NULL),(50,'Report','report/risk/getallrisk',0,102,'icon-folder'),(60,'asdasd','aasd',51,0,NULL),(61,'IIFG Corporate Risk Register','#',50,1,NULL),(62,'List of Risk Event','report/risk/listofrisk',61,1,NULL),(63,'List of Risk Identified during this periode','report/risk/listofrisketc',61,2,NULL),(64,'Risk Treatment Report','report/risk/risktreatmentreport',50,2,NULL),(65,'Action Plan Execution','#',50,3,NULL),(66,'List of All Action Plan Execution with Status','report/risk/listofall',65,1,NULL),(67,'List of All Action Plan Execution','report/risk/listofall1',65,2,NULL),(68,'Risk Table','report/risk_table',50,4,NULL),(69,'Comparison Risk beetween Periode','report/risk/comparison1',68,1,NULL),(70,'Comparison 2nd sub category beetwen periode','report/risk/comparison2',68,2,NULL),(71,'Top Ten Risk','report/risk/topten',50,5,NULL),(72,'Top Ten 2nd Sub Category','report/risk/topten2',50,6,NULL),(73,'Comparison of outcome','',50,7,NULL),(74,'by Risk ','report/risk/getcomparison1',73,1,NULL),(75,'by 2nd sub category','report/risk/getcomparison2',73,2,NULL),(77,'KRI Monitoring','report/risk/KRI_monitoring',50,9,NULL),(551,'List of All Risks-','report/risk/getallrisk',50,0,NULL),(552,'List of All Risk (Periode)','report/risk/getallriskperiode',50,2,NULL),(553,'Action Plan','report/risk/getactionplan',50,3,NULL),(554,'Risk Treatment','report/risk/gettreatment',50,4,NULL),(555,'Risk Table','report/risk/gettable',50,5,NULL),(556,'Top Ten Risk','report/risk/gettopten',50,6,NULL),(557,'KRI','report/risk/getkri',50,7,NULL),(558,'Comparison Of Outcome','report/risk/getcomparison',50,8,NULL),(559,'List of 2nd Sub Category','report/risk/get2ndcategory',50,9,NULL),(576,'KRI','',50,8,NULL),(577,'Recover Deleted Risk','risk/RiskRegister/recover',32,0,NULL);

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

INSERT INTO `m_menu_i` VALUES (0,'','',0,0,NULL),(1,'Dashboard','maini',0,0,'icon-home'),(5,'Division','user/division',39,3,NULL),(6,'Dashboard RAC','main/rac',0,1,'icon-home'),(7,'Periodic','',0,2,'icon-clock'),(8,'Adhoc','',0,3,'icon-hourglass'),(9,'Modify User','useri/modify',0,4,'icon-users'),(10,'Housekeeping','',0,6,'icon-layers'),(11,'Help & Policy','pages/help',0,7,'icon-info'),(12,'Change Request','',0,5,'icon-book-open'),(13,'Risk Register','riski/RiskRegister',7,1,NULL),(14,'Risk Treatment','',7,2,NULL),(15,'Risk Action','',7,3,NULL),(16,'KRI','',7,4,NULL),(17,'Entri Periode','admini/periode',7,5,NULL),(18,'Risk Register','',8,1,NULL),(19,'Risk Treatment','',8,2,NULL),(20,'Risk Action','',8,3,NULL),(21,'KRI','',8,4,NULL),(23,'Beranda','maini',0,100,'icon-home'),(24,'Transaksi','',0,101,'icon-book-open'),(25,'Pelaksanaan Berkala','',24,1,NULL),(26,'Risk Register Berkala','riski/RiskRegister',25,0,''),(27,'Tanya & Jawab','maini/qna',24,2,''),(28,'Berita','maini/news',0,102,'icon-feed'),(29,'Panduan Pengguna','maini/usermanual',0,103,'icon-info'),(30,'Beranda','maini/mainpic',0,100,'icon-home'),(32,'Pengaturan','',0,300,'icon-settings'),(33,'Entri Periode Berkala','',32,0,NULL),(34,'Risk Register Berkala','admini/periode',33,0,NULL),(35,'Pelaksanaan Action Plan','admini/periode/actplan',33,0,NULL),(36,'Entri Kategori','admini/category',32,0,NULL),(37,'Pengaturan Hak Akses Pengguna','useri/modify',32,0,NULL),(38,'Beranda','maini/mainrac',0,100,'icon-home'),(39,'Administration','',0,400,'icon-settings'),(40,'Pengguna','useri',39,1,''),(41,'Peran','useri/role',39,2,''),(42,'Referensi','admini/reference',39,4,''),(43,'Mengelola Berita','admini/news',32,0,NULL),(44,'Penetapan KRI','',24,0,NULL),(45,'Pengaturan KRI','riski/kri/krisetting',44,0,NULL),(46,'Entri KRI','riski/kri/krientry',44,0,NULL),(47,'Q & A Management','admini/qna',24,0,NULL),(48,'Mengelola Panduan Pengguna','admini/usermanual',39,1,NULL),(49,'Pengaturan Banner','admini/banner',32,0,NULL),(50,'Laporan','reporti/risk/getallrisk',0,102,'icon-folder'),(61,'IIFG Corporate Risk Register','',50,1,NULL),(62,'List of Risk Event','reporti/risk/listofrisk',61,1,NULL),(63,'List of Risk Identified during this periode','reporti/risk/listofrisketc',61,2,NULL),(64,'Risk Treatment Report','reporti/risk/risktreatmentreport',50,2,NULL),(65,'Action Plan Execution','',50,3,NULL),(66,'Daftar Semua Action Plan Execution dengan Status','reporti/risk/listofall',65,1,NULL),(67,'Daftar Semua Action Plan Execution','reporti/risk/listofall1',65,2,NULL),(68,'Tabel Resiko','reporti/risk_table',50,4,NULL),(69,'Perbandingan Resiko Antar Periode','reporti/risk/comparison1',68,1,NULL),(70,'Comparison 2nd sub category beetwen periode','reporti/risk/comparison2',68,2,NULL),(71,'Top 10 Resiko','reporti/risk/topten',50,5,NULL),(72,'Top 10 2nd Sub Kategori','reporti/risk/topten2',50,6,NULL),(73,'Comparison of outcome','',50,7,NULL),(74,'berdasarkan Risk ','reporti/risk/getcomparison1',73,1,NULL),(75,'berdasarkan 2nd sub category','reporti/risk/getcomparison2',73,2,NULL),(77,'KRI Monitoring','reporti/risk/KRI_monitoring',50,9,NULL),(551,'Daftar Semua Risiko','reporti/risk/getallrisk',50,1,''),(552,'Daftar Semua Risiko (Periode)','reporti/risk/getallriskperiode',50,2,NULL),(553,'Action Plan','reporti/risk/getactionplan',50,3,NULL),(554,'Pananganan Risiko','reporti/risk/gettreatment',50,4,NULL),(555,'Table Risiko','reporti/risk/gettable',50,5,NULL),(556,'Top Ten Risiko','reporti/risk/gettopten',50,6,NULL),(557,'KRI ','reporti/risk/getkri',50,7,NULL),(558,'Comparison Of Outcome','reporti/risk/getcomparison',50,8,NULL),(559,'Daftar 2nd Sub Category','reporti/risk/get2ndcategory',50,9,NULL),(577,'Pengembalian Risiko','',32,0,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Data for table "m_periode"
#

INSERT INTO `m_periode` VALUES (1,'Semester 1','2015-12-01','2015-12-31','user_rac','2015-12-21 16:00:00'),(2,'Semester 2','2016-01-01','2016-01-31','head_it','2015-12-21 15:54:42'),(3,'Semester 3','2016-02-01','2016-01-28','user_rac','2015-12-21 15:54:42');

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

INSERT INTO `m_periode_hist` VALUES (13,'Semester 3','2016-02-01','2016-02-29','head_it','2015-12-21 15:53:29','D','head_it','2015-12-21 15:53:42');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "m_periode_plan"
#


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


#
# Structure for table "m_periode_report"
#

DROP TABLE IF EXISTS `m_periode_report`;
CREATE TABLE `m_periode_report` (
  `periode_id` int(11) NOT NULL DEFAULT '0',
  `periode_name` varchar(200) DEFAULT NULL,
  `periode_start` date DEFAULT NULL,
  `periode_end` date DEFAULT NULL,
  PRIMARY KEY (`periode_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "m_periode_report"
#


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

INSERT INTO `m_reference` VALUES ('impact.display','CATASTROPHIC','Catastrophic',NULL,NULL,'Berbahaya'),('impact.display','INSIGNIFICANT','Insignificant',NULL,NULL,'Tidak Signifikan'),('impact.display','MAJOR','Major',NULL,NULL,'Mayor'),('impact.display','MINOR','Minor',NULL,NULL,'Minor'),('impact.display','MODERATE','Moderate',NULL,NULL,'Sedang'),('impact.display','NA','N/A',NULL,NULL,'N/A'),('risk.status.user','0','Draft','admin','2015-11-05 05:59:53',NULL),('risk.status.user','1','Confirm',NULL,NULL,NULL),('risk.status.user','2','Submited to RAC',NULL,NULL,NULL),('risk.status.user','3','Verified by RAC',NULL,NULL,NULL),('risk.status.user','4','on Risk Treatment Process',NULL,NULL,NULL),('risk.status.user','5','on Action Plan Process',NULL,NULL,NULL),('risk.status.user','6','Action Plan Has Been Executed and Verified',NULL,NULL,NULL),('risklevel.display','HIGH','Tinggi',NULL,NULL,NULL),('risklevel.display','LOW','Rendah',NULL,NULL,NULL),('risklevel.display','MODERATE','Sedang',NULL,NULL,NULL),('treatment.status','ACCEPT','Accept',NULL,NULL,NULL),('treatment.status','MITIGATE','Mitigate',NULL,NULL,NULL),('treatment.status','TRANSFER','Transfer',NULL,NULL,NULL);

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

INSERT INTO `m_risk_category` VALUES (1,'A','Risiko-risiko Strategis','Risiko yang dihasilkan dari ketidak-akuratan penetapan dan pelaksanaan strategi bisnis PII, ketidak-tepatan keputusan bisnis, atau ketidak-tanggapan terhadap perubahan-perubahan eksternal.',0,NULL,NULL),(2,'B','Risiko Finansial','Kategori ini mengklasifikasikan risiko yang pada umumnya terjadi karena ketidak-mampuan PII untuk mencapai target penerimaannya, kerugian dari penempatan dana investasi, dan ketidak-mampuan PII untuk memperoleh pendanaan / pembiayaan  baru, baik dari para kreditor maupun dari para pemegang saham.',0,NULL,NULL),(3,'C','Risiko Operasional','Kategori risiko ini pada umumnya muncul dari pelaksanaan fungsi bisnis PII. Karena hal ini merupakan sebuah konsep yang sangat luas yang berfokus pada risiko-risiko yang timbul dari orang, sistem dan proses dimana perusahaan beroperasi (termasuk dari kegiatan penyediaan penjaminan sebagai bisnis utama PII).',0,NULL,NULL),(4,'A.1','Kelas Risiko Perencanaan dan Strategi','Risiko yang dihasilkan dari lemahnya konteks strategi dan isu perencanaan dari PII yang mungkin berdampak kepada nilai-nilai strategis PII dan performa sebagai sebuah organisasi.',1,NULL,NULL),(5,'B.1','Kelas Risiko Pasar (contoh. tingkat bunga, mata uang)','Kelas ini menyatukan risiko yang dihasilkan dari pergerakan faktor-faktor pasar yang merugikan yang mencakup tingkat bunga dan pertukaran mata uang asing dan harga ekuitas.',2,NULL,NULL),(6,'B.2','Kelas Risiko Likuiditas dan Kredit','Risiko-risiko finansial dalam kelas ini berhubungan dengan isu-isu likuiditas dan kelayakan kredit yang berhubungan dengan aset-aset dan pendapatan PII.',2,NULL,NULL),(7,'C.1','Kelas Risiko Operasional Umum','Risiko operasional umum biasanya berhubungan dengan ketidak-mampuan PII untuk mengoperasikan fungsi-fungsi bisnisnys secara efisien, yang menyebabkan kerugian operasional dari kegiatan-kegiatan diluar penyediaan penjaminan.',3,NULL,NULL),(8,'C.2','Kelas Risiko Penyediaan Penjaminan','Kelompok risiko ini mengklasifikasikan risiko-risiko operasional yang berhubungan dengan peran PII sebagai Badan Usaha Penjaminan Infrastruktur atau BUPI.',3,NULL,NULL),(9,'C.3','Kelas Risiko Hukum dan Kepatuhan','Kelompok risiko ini berhubungan dengan yang tidak patuh kepada PII sebagai sebuah organisasi terhadap hukum atau standar regulasi yang dapat berdampak terhadap nilai-nilai strategis PII dan kinerjanya sebagai sebuah organisasi.',3,NULL,NULL),(10,'A.1.1','Risiko Perencanaan Strategis/Strategic planning risk','Sebuah proses perencanaan strategis yang tidak dapat diimajinasikan dan rumit dapat mengakibatkan informasi yang tidak relevan yang mengancam kapasitas PII dalam merumuskan rencana bisnis yang berkelanjutan atau menghasilkan sasaran dan tujuan yang tidak sesuai.',4,NULL,NULL),(11,'A.1.2','Risiko Anggaran/Budget Risk','Tidak ada, tidak nyata, tidak relevan atau tidak dapat diandalkannya  informasi anggaran dan perencanaan dapat menyebabkan kesimpulan dan keputusan keuangan yang tidak tepat oleh manajemen PII.',4,NULL,NULL),(12,'A.1.3','Risiko Lingkungan Bisnis/Business environment risk','Kegagalan untuk mengawasi lingkungan eksternal atau formulasi dari asumsi yang tidak nyata/realistis atau salah mengenai risiko-risiko lingkungan bisnis dapat menyebabkan keputusan strategis yang tidak tepat oleh manajemen PII.',4,NULL,NULL),(13,'A.1.4','Risiko Model Bisnis/Business model risk','Risiko yang timbul akibat memiliki model bisnis yang usang dan PII tidak menyadarinya dan/atau kekurangan informasi yang diperlukan untuk membuat penilaian terbaru dan membangun suatu kemasan bisnis yang menarik untuk memodifikasi model tersebut pada waktunya.',4,NULL,NULL),(14,'A.1.5','Risiko Pengukuran/Measurement risk','Pengukuran performa dan financial yang tidak ada, tidak relevan atau tidak dapat diandalkan yang mungkin dapat mengancam kemampuan PII untuk melaksanakan strategi-strategi dan operasinya dan dapat mengakibatkan kegiatan yang saling bertentangan dan tidak terkoordinir di seluruh PII.',4,NULL,NULL),(15,'A.1.6','Risiko Struktur Organisasi/Organizational structure risk','Risiko yang dihasilkan dari struktur organisasi PII yang tidak efektif, yang mengancam kapasitasnya dalam mencapai tujuan jangka panjangnya',4,NULL,NULL),(16,'A.1.7','Risiko Sumber Daya Manusia/Human resource risk','Perencanaan/pengelolaan kinerja sumber daya manusia yang tidak mencukupi atau gagal dapat mencegah PII dalam mencapai visi dan misi strategisnya.',4,NULL,NULL),(17,'A.1.8','Risiko Manajemen dan Kepemimpinan/Leadership and management risk','Kekurangan/ketidak-cukupan keterampilan kepemimpinan dan manajemen dari manajemen senior PII yang dapat menghalangi perusahaan dalam menjalankan visi dan misi strategisnya',4,NULL,NULL),(18,'A.1.9','Risiko Tata Kelola Perusahaan/Corporate governance risk','Risiko yang datang dari potensi struktur tata kelola yang tidak tepat (termasuk delegasi kewenangan) antara para direktur, manajemen senior, dan staf, yang mengarah kepada pengambilan keputusan yang tidak tepat.',4,NULL,NULL),(19,'A.1.10','Risiko Informasi bagi Pengambilan Keputusan/Information for decision-making risk','Informasi yang tidak relevan atau tidak dapat diandalkan atau berkualitas rendah yang digunakan untuk mendukung pelaksanaan model bisnis PII, pelaporan internal dan eksternal atas kinerja dan evaluasi berkelanjutan terhadap keefektifan bisnis PII.',4,NULL,NULL),(20,'A.1.11','Risiko Informasi Keuangan/Accounting information risk','Penekanan yang terlalu berlebihan atas informasi akuntansi keuangan dalam mengelola bisnis dapat mengakibatkan manipulasi hasil/keluaran untuk mencapai target finansial dengan mengorbankan kepuasan pelanggan, kualitas dan efisiensi.',4,NULL,NULL),(21,'A.1.12','Risiko Manfaat yang Dirasakan/Perceived benefit risk','Manfaat hasil kerja dari PII dapat dirasakan secara berbeda oleh pelanggan disebabkan karena proses bisnis yang tidak efisien dan tidak fleksibel yang dapat mengarah pada ketidakberlangsungan permintaan bisnis.',4,NULL,NULL),(22,'A.1.13','Risiko Pemegang Saham/Shareholder risk','Pengharapan yang tidak realistis atau kesalahpahaman dari para pemegang saham dapat memberikan beban tambahan terhadap pencapaian visi dan misi korporat oleh manajemen PII. Risiko ini juga dapat dipicu oleh ketidak-efektifan dalam mengkomunikasikan struktur tata kelola, rencana strategis, kegiatan operasional, dan kinerja korporasi kepada para pemegang saham.',4,NULL,NULL),(23,'A.1.14','Risiko Stakeholder/Stakeholder risk','Para stakeholder yang tidak kompeten atau tidak cakap atau kurang-informasi dapat menghalangi PII dalam melaksanakan peran strategisnya sebagaimana diharapkan. Hal ini juga disebabkan oleh tantangan yang dihadapi oleh PII dalam menghadapi lingkungan birokratis dan dapat juga dipicu oleh ketidakefektifan dalam mengkomunikasikan informasi yang relevan kepada para stakeholder terkait.',4,NULL,NULL),(24,'A.1.15','Risiko Reputasi/Reputational risk','Risiko yang dihasilkan dari publikasi negatif sehubungan kegiatan bisnis PII atau persepsi negatif terhadap PII. Risiko ini berhubungan dengan kepercayaan terhadap binis dan mungkin dipicu oleh faktor internal atau eksternal. Rusaknya reputasi PII dapat mengakibatkan kehilangan pendapatan atau penghancuran nilai pemegang saham, bahkan jika PII tidak terbukti bersalah atas suatu kejahatan atau berada dalam situasi yang buruk.',4,NULL,NULL),(25,'B.1.1','Risiko Tingkat Bunga/Interest rate risk','Risiko yang memiliki tingkat variabilitas dalam nilai yang terdapat pada asset berbunga (contoh. pinjaman atau obligasi) yang berdampak pada kinerja keuangan PII (contoh: investasi obligasi bernilai rendah, meningkatnya hutang), yang disebabkan oleh variabilitas tingkat bunga.',5,NULL,NULL),(26,'B.1.2','Risiko Mata Uang/Currency risk','Risiko harga nilai tukar mata uang asing dan/atau volatilitas yang tersirat akan berubah, yang dapat mempengaruhi nilai asset milik PII yang mengunakan mata uang tersebut.',5,NULL,NULL),(27,'B.1.3','Risiko Ekuitas/Equity risk','Risiko dimana investasi PII akan terdepresiasi karena dinamika pasar saham yang menyebabkan seseorang kehilangan uangnya.\rB.1.4\tRisiko Kesulitan Keuangan/Financial distress risk\tRisiko yang disebabkan oleh runtuhnya seluruh sistem keuangan atau seluruh pasar (contoh. resiko sistemik) yang dapat memberikan dampak catastrophic bagi PII.',5,NULL,NULL),(28,'B.1.4','Risiko Kesulitan Keuangan/Financial distress risk','Risiko yang disebabkan oleh runtuhnya seluruh sistem keuangan atau seluruh pasar (contoh. resiko sistemik) yang dapat memberikan dampak catastrophic bagi PII.',5,NULL,NULL),(29,'B.1.5','Risiko Komoditas/Commodity risk','Risiko dari penurunan nilai pemasukan atau asset PII yang disebabkan oleh volatilitas biaya dan volume komoditas (contoh: batu bara)\rB.1.6\tRisiko Premi Asuransi/Insurance premium risk\tRisiko dari resiko-resiko PII manapun yang dapat diasuransikan pada tanggal penandatanganan asuransi yang disetujui namun kemudian menjadi tidak dapat diasuransikan atau menghadapi kenaikan harga yang tinggi pada rate di mana premi asuransi tersebut dihitung.',5,NULL,NULL),(30,'B.1.6','Risiko Premi Asuransi/Insurance premium risk','Risiko dari resiko-resiko PII manapun yang dapat diasuransikan pada tanggal penandatanganan asuransi yang disetujui namun kemudian menjadi tidak dapat diasuransikan atau menghadapi kenaikan harga yang tinggi pada rate di mana premi asuransi tersebut dihitung.',5,NULL,NULL),(31,'B.2.1','Risiko Kecukupan Modal/Capital adequacy risk','Risiko PII mungkin tidak memiliki cadangan modal untuk mengoperasikan bisnisnya atau untuk menyerap kerugian-kerugian tidak terduga yang muncul dari klaim penjaminan, risiko-risiko investasi dan operasional.',6,NULL,NULL),(32,'B.2.2','Risiko Pencadangan Modal/Capital provisioning risk','Risiko ini dipicu oleh pengaturan cadangan modal yang tidak tepat (contoh. kekurangan cadangan atau kelebihan cadangan) yang dapat berdampak pada ketidak-efisiensian dalam kinerja keuangan dan operasional PII.',6,NULL,NULL),(33,'B.2.3','Risiko Konsentrasi/Concentration risk','Distribusi yang tidak merata dari exposure jaminan PII dan/atau portofolio investasi yang dapat meningkatkan potensi kerugian atau kemungkinan default dari portofolio.',6,NULL,NULL),(34,'B.2.4','Risiko Penetapan Harga/Pricing risk','Risiko yang berakar pada penetapan harga yang terlalu rendah atau terlalu tinggi atas penjaminan yang disebabkan oleh kerangka kerja penetapan harga yang tidak tepat atau tidak akurat, yang dapat berdampak pada kinerja pendapatan PII.',6,NULL,NULL),(35,'B.2.5','Risiko Likuiditas/Liquidity risk','Risiko yang mungkin muncul di mana PII tidak dapat memenuhi kewajibannya disebabkan oleh ketidak-mampuan PII untuk memenuhi likuiditas yang diperlukan di dalam suatu jangka waktu tertentu (contoh. resiko likuiditas arus uang), atau ketidak-mampuan PII untuk melikuidasi instrument keuangan yang diperlukan tanpa mengalami kerugian keuangan yang tidak normal pada sebuah transaksi (contoh. resiko likuiditas pasar).',6,NULL,NULL),(36,'B.2.6','Risiko Kredit Investasi/Investment?s Credit Risk','Risiko kerugian investasi PII yang disebabkan oleh kegagalan penerbit obligasi untuk membayar kewajibannya (contoh. kupon bunga dan/atau bunga utama) atau kegagalan bank untuk memenuhi kewajibannya atas deposito (contoh. bunga dan bunga utama) yang disebabkan default, masalah likuiditas atau kebangkrutan.',6,NULL,NULL),(37,'C.1.1','Risiko Personil Utama/Key personnel risk','Risiko ini berasal dari kegagalan key management untuk menjalankan tugas resmi mereka sebagai akibat dari berbagai alasan, seperti gesekan yang tinggi, sakit yang terlalu lama, etc.',7,NULL,NULL),(38,'C.1.2','Risiko Fraud Internal/Internal fraud risk','Risiko ini dapat berasal dari penyalahgunaan aset, penghindaran pajak, salah penempatan jabatan yang disengaja, penyuapan, etc.',7,NULL,NULL),(39,'C.1.3','Risiko Fraud Eksternal/External fraud risk','Risiko ini berasal dari pencurian informasi, kerusakan peretasan, pencurian pihak ketiga, pemalsuan, etc.',7,NULL,NULL),(40,'C.1.4','Risiko Praktek Ketenagakerjaan/Employment practices risk','Risiko ini berasal dari kegagalan PII sebagai perusahaan yang memberikan kesempatan yang sama dalam mencegah diskriminasi jenis kelamin, ras, warna kulit, dll.',7,NULL,NULL),(41,'C.1.5','Risiko Kerusakan Aset Fisik/Damage to physical assets risk','Risiko ini berhubungan dengan kerusakan aset fisik yang disebabkan oleh bencana alam, terorisme, perusakan, dll.',7,NULL,NULL),(42,'C.1.6','Risiko Gangguan Bisnis/Business disruptions risk','Risiko ini berhubungan dengan gangguan dalam kegiatan bisnis sebagai akibat dari gangguan utilitas, kegagalan perangkat lunak, dan perangkat keras.',7,NULL,NULL),(43,'C.1.7','Risiko Pelaksanaan dan Proses/Delivery and process risk','Risiko yang dihasilkan dari kegagalan atau pelanggaran dalam prosedur internal, orang-orang dan sistem yang mungkin berhubungan dengan kesalahan karena kelalaian (contoh. kesalahan pemasukan data, kesalahan akunting,  kegagalan memberikan laporan yang diwajibkan / diperintahkan, kerugian asset karena kelalaian, dll) menyebabkan kegagalan atau kerugian operasional bagi PII sebagai sebuah perusahaan.',7,NULL,NULL),(44,'C.1.8','Risiko Keselamatan di Tempat Kerja/Workplace safety risk','Risiko ini berhubungan dengan kegagalan PII dalam memberikan lingkungan kerja yang aman dan kondusif yang dapat menyebabkan kegagalan atau kerugian operasional bagi PII sebagai sebuah perusahaan.',7,NULL,NULL),(45,'C.1.9','Risiko Pengadaan Pihak Ketiga/Procurement of 3rd party risk','Risiko ini berhubungan dengan kegagalan untuk mempertahankan kredibilitas dan daya saing dari proses pengadaan  pemasok/konsulan pihak ketiga yang disebabkan oleh kurangnya pemahaman akan persyaratan layanan, kondisi pasar dan metode/dokumentasi pengadaan yang relevan.',7,NULL,NULL),(46,'C.2.1','Risiko Klaim Penjaminan (diluar kendali CA)/Guarantee claim risk (beyond CA control)','Terjadinya klaim jaminan yang terduga maupun tidak terduga yang dipicu oleh lingkup dan tingkat risiko bawaan dari masing-masing proyek yang dijamin yang dapat berdampak goncangan besar terhadap posisi modal dan kinerja operasional PII.',8,NULL,NULL),(47,'C.2.2','Risiko Kelebihan Biaya atau Waktu/Cost or time overruns risk','Risiko proyek memerlukan waktu lebih lama untuk diselesaikan atau diimplementasikan, atau menghabiskan dana lebih banyak dari yang telah diantisipasi yang dapat mengakibatkan rusaknya reputasi PII (atau pemerintah).',8,NULL,NULL),(48,'C.2.3','Risiko Proyek Pipeline/Project pipeline risk','Risiko tidak tercapainya kinerja operasional PII karena faktor eksternal/ketidakpastian yang tinggi dari proyek pipeline yang dipengaruhi oleh in (action) PJPK dan lembaga Pemerintahan.',8,NULL,NULL),(49,'C.2.4','Risiko Pre-Appraisal (termasuk TGA)/Pre-appraisal risk (including TGA)','Risiko sumber daya yang dialokasikan PII untuk mempersiapkan proyek yang mengajukan untuk dijamin oleh PII tidak memberikan hasil seperti yang diharapkan (contoh. GAP tidak siap untuk diserahkan), yang disebabkan oleh in (action)  PJPK dan lembaga Pemerintahan.',8,NULL,NULL),(50,'C.2.5','Risiko Evaluasi Penjaminan/Guarantee appraisal risk','Risiko hasil evaluasi penjaminan menyatakan bahwa proyek gagal untuk memenuhi kriteria evaluasi, sedangkan alokasi sumber daya PII telah dilakukan.',8,NULL,NULL),(51,'C.2.6','Risiko Kesalahan Pembayaran Klaim/False claim payment risk','Pembayaran klaim yang didasarkan pada dokumentasi klaim yang terbukti salah atau pada proses penafsiran klaim yang tidak dapat diandalkan dapat berdampak pada kegagalan mekanisme recourse dan kerugian besar pada modal PII.',8,NULL,NULL),(52,'C.2.7','Risiko Mekanisme Recourse/Recourse mechanism risk','Mekanisme recourse yang gagal atau yang tidak dapat diandalkan atas jaminan yang diberikan oleh PII sebagai jalur pemulihan pembayaran klaim yang dilakukan terhadap penerima jaminan.',8,NULL,NULL),(53,'C.2.8','Kemitraan Kredit/Credit counterparty','Risiko dari kemitraan tidak akan memenuhi kewajiban sesuai kontrak. Kemitraan harus dipertimbangkan pada saat meleakukan evaluasi kontrak.',8,NULL,NULL),(54,'C.2.9','Transaksi Proyek Gagal/Failed project transaction','Risiko dari kegagalan proyek untuk mencapai Financial Close/ mencapai implementasi yang disebabkan oleh kurangnya/tidak adanya ketertarikan dari (pemodal) selera pasar terhadap proyek tersebut.',8,NULL,NULL),(55,'C.3.1','Risiko Kepatuhan/Compliance risk','Risiko yang dihasilkan dari pelanggaran atau ketidak-patuhan terhadap regulasi internal dan eksternal termasuk standar regulasi (contoh. standar akunting) yang dapat berdampak terhadap nilai-nilai strategis PII dan kinerjanya sebagai sebuah organisasi.',9,NULL,NULL),(56,'C.3.2','Risiko Regulasi/Regulatory risk','Risiko akibatnya kurangnya kualitas hukum dan regulasi yang ada, termasuk lemahnya penerapan hukum dan regulasi yang ada oleh pemerintah atau  pihak regulator lainnya, dan perubahan hukum dan regulasi yang dapat berdampak material terhadap kegiatan operasional PII.',9,NULL,NULL),(57,'C.3.3','Risiko Hukum/Legal risk','Risiko yang dihasilkan dari aspek yuridis yang lemah yang dapat diakibatkan oleh klaim hukum, tidak adanya regulasi legislatif pendukung, atau perjanjian yang kurang baik, seperti, persyaratan kontrak yang tidak lengkap. Risiko ini juga muncul ketika kemitraan tidak dapat berkontrak secara hukum akibat tindakan hukum atau ketidakpastian dalam penerapan atau interpretasi kontrak, hukum dan regulasi.',9,NULL,NULL),(58,'C.3.4','Risiko Kode Etik/Code of Conducts risk','Risiko ini dipicu oleh praktek atau kegiatan bisnis illegal atau bisnis yang tidak pantas dilakukan oleh PII atau karyawannya.',9,NULL,NULL);

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

INSERT INTO `m_risk_impact` VALUES (1,'Financial Loss -  Operations (including TGA)*','INSIGNIFICANT','< Rp 2,5juta','MINOR','IDR 2 million- 50 milliion','MODERATE','IDR 50 million- 100 milliion','MAJOR','IDR 100 million - 10 billion','CATASTROPHIC','> IDR 10 billion'),(2,'Financial Loss - Investment, Guarantee Activities **','INSIGNIFICANT','< IDR 2 billion**','MINOR','IDR 2 billion- 9 billiion','MODERATE','IDR 9 billion- 14 billiion','MAJOR','IDR 14 billion- 20 billiion','CATASTROPHIC','> IDR 20 billion'),(3,'Ratio of Capital to Guarantee Exposure\r\nRatio of Capital to Guarantee Exposure','INSIGNIFICANT','> 1.5','MINOR','1.0 - 1.5','MODERATE','0.8 - 1.0','MAJOR','0.5 - 0.8','CATASTROPHIC','0.5'),(4,'Liquidity','INSIGNIFICANT','> 1.5 year operational cost','MINOR','1 - 1.5 year operational cost','MODERATE','6 months - 1 year operational cost','MAJOR','6 - 3 months operational cost','CATASTROPHIC','< 3 months operational cost'),(5,'Compliance','INSIGNIFICANT','Negative perception in internal environment and not related to integrity','MINOR','Negative exposure in region coverage and not related to integrity','MODERATE','Negative exposure in national coverage and not related to integrity','MAJOR','Negative exposure in national coverage and related to integrity','CATASTROPHIC','Negative exposure in national coverage and related to integrity followed by legal action'),(6,'Kepatuhan','INSIGNIFICANT','Regulation violation that can be corrected instantly','MINOR','Regulation violation that is subject to warning letter','MODERATE','Regulation violation that is subject to fine or penalty','MAJOR','Regulation violation that may result in ke personnel imprisonment','CATASTROPHIC','Revocation of business license'),(7,'Health, Safety and Environment','INSIGNIFICANT','Cause minor injuries that require first aid','MINOR','Cause injuries that require intensive medical care','MODERATE','Cause bodily injury and/or permanent disability','MAJOR','Cause death','CATASTROPHIC','Cause death to more than 1 people');

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

INSERT INTO `m_role_menu` VALUES (4,24),(4,26),(4,25),(4,27),(4,30),(4,28),(4,29),(5,30),(5,26),(5,25),(5,27),(5,24),(5,28),(5,29),(3,23),(3,24),(3,26),(3,25),(3,27),(3,28),(3,29),(2,38),(2,45),(2,46),(2,44),(2,47),(2,34),(2,35),(2,33),(2,36),(2,37),(2,43),(0,48),(2,32),(2,49),(2,50),(2,51),(2,52),(2,53),(2,54),(2,56),(2,57),(2,58),(2,55),(2,59),(2,60),(2,61),(2,62),(2,63),(2,64),(2,65),(2,66),(2,67),(2,68),(2,70),(2,69),(2,70),(2,71),(2,72),(2,73),(2,74),(2,75),(2,76),(2,77),(2,78),(2,79),(2,29),(2,577);

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
  `role_status` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "m_user"
#

INSERT INTO `m_user` VALUES ('admin','$2y$10$l.mQPD1fGe4QrkSIXnZv7ueyD.nReClhW43DEho3rSn0kKsKuVNau','Administrator',1,'No Division',NULL,NULL,NULL,NULL),('head_hr','$2y$10$bQbrcvMWSDVr25gyD/8sQ.YuPCcVO14QTlFJYpHTPKYXydV6R58H2','Head of HR',4,'Human Resource','admin','2015-10-25 23:23:46','HR',NULL),('head_it','$2y$10$fiPd.I.KgpmFt6RNqUD1TuUuHow.MuQHReruRCQ380Ol1EF9enREe','Head Of IT',4,'IT','admin','2015-10-29 03:22:22','HR',NULL),('pic_it','$2y$10$RLzKKF47fA2tlOPxyYiXauKlGowFDjRRa7cAjJxjw6CsSNmfHLD9u','PIC for IT Division',5,'IT','admin','2015-11-05 05:57:42','PR',NULL),('user_hr','$2y$10$FnnVpf0xLpkaNpYSEUJlIOxgR1LOKSTJJP.kHZ7NXIjjIHvFaATLC','Normal User HR',3,'Human Resource','admin','2015-10-26 00:18:37',NULL,NULL),('user_it','$2y$10$X5oANBRP5E50SYK3cauRoO1Za.5woI0ukcnMyhIJX9h38I97kV1AO','Normal User IT',3,'IT','user_it','2015-12-28 09:48:31','UR','user.irawan@gmail.com'),('user_rac','$2y$10$CtjsRxnPpHwqG2.ZPSTZjuMzD7dovVMwSmDWjT77BwXAOXvkGIiua','User Admin RAC',2,'RAC','admin','2015-11-02 16:19:25',NULL,NULL);

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
# Structure for table "t_cat_sequence"
#

DROP TABLE IF EXISTS `t_cat_sequence`;
CREATE TABLE `t_cat_sequence` (
  `cat_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `seq` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

#
# Data for table "t_cat_sequence"
#

INSERT INTO `t_cat_sequence` VALUES (10,20),(13,3),(14,4),(15,2),(19,7),(21,4),(23,4),(27,2),(32,2),(33,2),(34,4),(35,8),(37,2),(42,20),(43,2);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "t_cr_action_plan"
#

INSERT INTO `t_cr_action_plan` VALUES (1,1,21,10,0,'Melanjutkan current control secara efektif','0000-00-00','IT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'CHANGE','');

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

INSERT INTO `t_cr_action_plan_change` VALUES (1,1,21,10,0,'Melanjutkan current control secara efektif','0000-00-00','IT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'CHANGE','');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "t_cr_control"
#

INSERT INTO `t_cr_control` VALUES (1,1,10,NULL,'Telah dibuat Policy tentang company asset dan disampaikan kepada karyawan, dan dipasang Security Cam (CCTV)','Case by case','All Employee',NULL);

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

INSERT INTO `t_cr_control_change` VALUES (21,1,10,NULL,'Telah dibuat Policy tentang company asset dan disampaikan kepada karyawan, dan dipasang Security Cam (CCTV)','Case by case','All Employee',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

#
# Data for table "t_cr_impact"
#

INSERT INTO `t_cr_impact` VALUES (1,1,10,1,'NA',NULL),(2,1,10,2,'MODERATE',NULL),(3,1,10,3,'NA',NULL),(4,1,10,4,'NA',NULL),(5,1,10,5,'NA',NULL),(6,1,10,6,'NA',NULL),(7,1,10,7,'NA',NULL);

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

INSERT INTO `t_cr_impact_change` VALUES (134,1,10,1,'NA',''),(135,1,10,2,'MODERATE',''),(136,1,10,3,'NA',''),(137,1,10,4,'NA',''),(138,1,10,5,'NA',''),(139,1,10,6,'NA',''),(140,1,10,7,'NA','');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

#
# Data for table "t_cr_risk"
#

INSERT INTO `t_cr_risk` VALUES (1,'CH.000001','Risk Form',0,10,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan','MODERATE','MODERATE','LOW','TRANSFER',NULL,'user_it','2016-01-11 15:07:52'),(2,'CH.000002','KRI Form',0,1,'1','Tidak Ada','RED',NULL,NULL,NULL,NULL,'head_it','2016-03-01 15:50:47'),(45,'CH.000003','Risk Register',1,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'head_hr',NULL),(46,'CH.000004','Risk Register',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'head_hr',NULL);

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
  `created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "t_cr_risk_change"
#

INSERT INTO `t_cr_risk_change` VALUES (1,'CH.000001','Risk Form',0,10,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan','MODERATE','MODERATE','LOW','TRANSFER',NULL,'user_it','2016-01-11 15:07:52'),(2,'CH.000002','KRI Form',0,1,'1','Ada','GREEN',NULL,NULL,NULL,NULL,'head_it','2016-03-01 15:50:47');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

#
# Data for table "t_kri"
#

INSERT INTO `t_kri` VALUES (1,'KRI.000001',1,NULL,'KRI 1',3,'Treshold 1','SELECTION','2015-12-31','IT','head_it','Ada','GREEN','head_it','2015-12-28 11:20:44'),(2,'KRI.000002',1,NULL,'KRI',2,'KRI','SELECTION','2015-12-31','IT','head_it','TIDAK','RED','user_rac','2015-12-30 10:03:34'),(3,'KRI.000003',1,NULL,'TRY',0,'TRY','SELECTION','2016-01-09','IT','head_it',NULL,NULL,'head_it',NULL),(4,'KRI.000004',8,1,'KRI 1',3,'Treshold 1','SELECTION','2015-12-31','IT','head_it','Tidak Ada','RED','head_it','2015-12-30 15:00:09'),(5,'KRI.000005',1,1,'KRI 1',2,'Treshold 1','VALUE','2015-12-31','IT','head_it','101','RED','head_it','2015-12-29 14:30:51'),(6,'KRI.000006',1,NULL,'Coba',2,'Coba','VALUE','2016-01-09','IT','head_it','1','GREEN','head_it','2015-12-29 14:40:47'),(7,'KRI.000007',8,2,'KRI',2,'KRI','SELECTION','2015-12-31','IT','head_it','Ya','GREEN','user_it','2016-01-12 16:22:41');

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

INSERT INTO `t_kri_risk` VALUES (1),(8);

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

#
# Data for table "t_kri_treshold"
#

INSERT INTO `t_kri_treshold` VALUES (1,1,'EQUAL','Ada',NULL,NULL,'GREEN'),(2,1,'EQUAL','Tidak Ada',NULL,NULL,'RED'),(3,2,'EQUAL','Ya',NULL,NULL,'GREEN'),(4,2,'EQUAL','Tidak',NULL,NULL,'RED'),(5,3,'EQUAL','Y',NULL,NULL,'GREEN'),(6,3,'EQUAL','T',NULL,NULL,'RED'),(7,4,'EQUAL','Ada',NULL,NULL,'GREEN'),(8,4,'EQUAL','Tidak Ada',NULL,NULL,'RED'),(9,5,'BELOW','50',NULL,'NUMERIC','GREEN'),(10,5,'BETWEEN','51','100','NUMERIC','YELLOW'),(11,5,'ABOVE','101',NULL,'NUMERIC','RED'),(12,6,'BELOW','70',NULL,'NUMERIC','GREEN'),(13,6,'BETWEEN','71','80','NUMERIC','YELLOW'),(14,6,'ABOVE','81',NULL,'NUMERIC','RED'),(15,6,'BELOW','1',NULL,'PERCENTAGE','GREEN'),(16,6,'BETWEEN','5','10','PERCENTAGE','YELLOW'),(17,6,'ABOVE','11',NULL,'PERCENTAGE','RED'),(18,7,'EQUAL','Ya','','','GREEN'),(19,7,'EQUAL','Tidak','','','RED');

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

INSERT INTO `t_news` VALUES (14,'published','news11.pdf',1,'2015-12-28 12:57:20','user_it','2015-12-28 12:57:20'),(15,'Ini Baru Di publish dalam News','news111.pdf',1,'2015-12-28 14:03:39','user_it','2015-12-28 14:03:39'),(16,'Menguak Misteri ILahi','news1111.pdf',1,'2015-12-28 13:20:19','user_it','2015-12-28 13:20:19'),(18,'Ini No publish','news112.pdf',1,'2015-12-28 13:31:45','user_it','2015-12-28 13:21:33');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

#
# Data for table "t_qna"
#

INSERT INTO `t_qna` VALUES (1,1,'test','Waaa\r\nwaaaaaa\r\nwa\r\nawwwwwasdad','Response','2015-11-15 16:27:18','user_it'),(2,1,'wasap','sapwaaaa','Question\r\nQuestion\r\nQuestion\r\nQuestion\r\nQuestion','2015-11-15 16:46:15','user_it'),(4,0,'Subject','Question\r\nQuestion\r\nQuestion\r\nQuestion\r\nQuestion\r\nQuestion\r\nQuestion\r\nQuestion\r\nQuestion\r\nQuestion\r\nQuestion',NULL,'2015-11-15 16:51:24','user_it'),(5,1,'test','wawww','waaaa','2015-11-18 18:36:18','user_it');

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

INSERT INTO `t_report_2ndsub` VALUES ('1','10','A.1.1','Risiko Perencanaan Strategis/Strategic planning risk','LOW','LOW','LOW'),('1','42','C.1.6','Risiko Gangguan Bisnis/Business disruptions risk','MODERATE','MODERATE','MODERATE'),('2','42','C.1.6','Risiko Gangguan Bisnis/Business disruptions risk','LOW','LOW','LOW'),('3','42','C.1.6','Risiko Gangguan Bisnis/Business disruptions risk','HIGH','HIGH','HIGH');

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

INSERT INTO `t_report_risk` VALUES ('1','1'),('2','4'),('3','5');

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
  `switch_flag` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`risk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

#
# Data for table "t_risk"
#

INSERT INTO `t_risk` VALUES (1,'C.1.6-1','2015-12-21 15:57:10',20,1,'head_it','IT','IT','IT',NULL,'Kehilangan Laptop/PC Dikantor, catatan kantor, barang berharga, dll','Kehilangan Laptop/PC Dikantor',3,7,42,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,NULL,NULL,NULL,'LOW','LOW','LOW','MITIGATE','head_it','MODERATE','MODERATE','MEDIUM','LOW','LOW','LOW','head_it','2015-12-21 15:58:15',NULL),(2,'A.1.1-1','2015-12-22 12:08:06',20,1,'head_it','IT','Human Resource','Human Resource',NULL,'12321321','21412421',1,4,10,'1412','1241241',NULL,NULL,NULL,NULL,'MODERATE','MODERATE','MEDIUM','ACCEPT','head_hr',NULL,NULL,NULL,NULL,NULL,NULL,'head_hr','2015-12-30 16:34:04','C'),(3,'A.1.1-2','2016-02-19 12:53:30',1,NULL,'user_it','IT','Human Resource','Human Resource',NULL,'af','fa',1,4,10,'asdf','adf',NULL,NULL,NULL,NULL,'MODERATE','MODERATE','MEDIUM','MITIGATE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'user_it','2016-02-19 12:53:30',NULL),(4,'C.1.6-2','2015-12-25 12:07:01',6,2,'user_it','IT','IT','IT',1,'Kehilangan Laptop/PC Dikantor, catatan kantor, barang berharga, dll','Kehilangan Laptop/PC Dikantor',3,7,42,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,NULL,NULL,NULL,'Sedang','Moderate','MEDIUM','Mitigate','head_it','LOW','LOW','LOW','MODERATE','MODERATE','MEDIUM','head_it','2016-01-13 20:18:23',NULL),(5,'C.1.6-3','2015-12-25 12:36:39',3,3,'user_it','IT','IT','IT',1,'Kehilangan\' Laptop/PC Dikantor, catatan kantor, barang berharga, dll','Kehilangan Laptop/PC Dikantor',3,7,42,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,NULL,NULL,NULL,'MODERATE','MODERATE','MEDIUM','ACCEPT',NULL,'HIGH','HIGH','HIGH','HIGH','HIGH','VERY HIGH','user_it','2015-12-25 12:41:22',NULL),(6,'C.1.6-4','2015-12-28 10:13:34',10,1,'user_it','IT','IT','IT',1,'Kehilangan Laptop/PC Dikantor, catatan kantor, barang berharga, dll','Kehilangan Laptop/PC Dikantor',3,7,42,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,NULL,NULL,NULL,'MODERATE','MODERATE','LOW','MITIGATE','head_it',NULL,NULL,NULL,NULL,NULL,NULL,'head_it','2015-12-30 16:55:25','C'),(7,'C.1.6-5','2015-12-28 10:16:28',5,1,'head_it','IT','IT','IT',1,'Kehilangan Laptop/PC Dikanto','Kehilangan Laptop/PC Dikanto',3,7,42,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,NULL,NULL,NULL,'Sedang','Minor','HIGH','Mitigate','head_it',NULL,NULL,NULL,NULL,NULL,NULL,'head_it','2016-01-13 19:03:57','C'),(8,'C.1.6-6','2015-12-28 10:22:24',3,1,'head_it','IT','IT','IT',1,'Kehilangan Laptop/PC Dikantor, catatan kantor, barang berharga, dll','Kehilangan Laptop/PC Dikantor',3,7,42,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,NULL,NULL,NULL,'MODERATE','MODERATE','LOW','MITIGATE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'head_it','2015-12-28 10:23:06',NULL),(9,'C.1.6-7','2015-12-28 10:58:17',0,1,'head_it','IT','IT','IT',1,'Kehilangan Laptop/PC Dikantor, catatan kantor, barang berharga, dll','Kehilangan Laptop/PC Dikantor',3,7,42,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,NULL,NULL,NULL,'HIGH','HIGH','HIGH','MITIGATE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'head_it','2015-12-28 10:58:17',NULL),(10,'C.1.6-8','2016-01-04 09:32:36',0,1,'head_hr','Human Resource','IT','IT',8,'Kehilangan Laptop/PC Dikantor, catatan kantor, barang berharga, dll','Kehilangan Laptop/PC Dikantor',3,7,42,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',1,NULL,NULL,NULL,'MODERATE','MODERATE','LOW','TRANSFER',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'head_hr','2016-01-04 09:32:59',NULL),(11,'C.1.6-9','2016-01-11 09:36:19',2,2,'head_hr','Human Resource','IT','IT',7,'123Kehilangan Laptop/PC Dikantor, catatan kantor, barang berharga, dll','123Kehilangan Laptop/PC Dikantor',3,7,42,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,NULL,NULL,NULL,'MODERATE','MODERATE','LOW','ACCEPT','head_it',NULL,NULL,NULL,NULL,NULL,NULL,'head_hr','2016-01-13 10:32:03',NULL),(18,'C.1.6-12','2016-01-12 15:49:44',0,2,'user_it','IT','IT','IT',8,'Kehilangan Laptop/PC Dikantor, catatan kantor, barang berharga, dll','Kehilangan Laptop/PC Dikantor',3,7,42,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,NULL,NULL,NULL,'MODERATE','MODERATE','LOW','MITIGATE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'user_it','2016-01-12 15:49:44',NULL),(19,'A.1.1-4','2016-01-12 16:13:31',0,2,'user_it','IT','IT','IT',6,'Kehilangan Laptop/PC Dikantor, catatan kantor, barang berharga, dll','Kehilangan Laptop/PC Dikantor',3,4,10,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,NULL,NULL,NULL,'MODERATE','MODERATE','LOW','MITIGATE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'user_it','2016-01-12 16:13:31',NULL),(21,'C.1.6-14','2015-12-29 16:36:23',0,1,'head_it','IT','IT','IT',11,'123Kehilangan Laptop/PC Dikantor, catatan kantor, barang berharga, dll','123Kehilangan Laptop/PC Dikantor',3,7,42,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,NULL,NULL,NULL,'MODERATE','MODERATE','LOW','ACCEPT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'head_it','2015-12-29 16:36:23',NULL),(22,'A.1.1-5','2015-12-29 16:42:31',0,1,'user_it','IT','Human Resource','Human Resource',NULL,'Abc','Abc',1,4,10,'Abc','Abc',NULL,NULL,NULL,NULL,'LOW','INSIGNIFICANT','LOW','MITIGATE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'user_it','2015-12-29 16:42:31',NULL),(23,'A.1.1-6','2016-01-12 16:49:52',0,2,'user_it','IT','Human Resource','Human Resource',NULL,'Coba','Coba',1,4,10,'Coba','Coba',NULL,NULL,NULL,NULL,'MODERATE','MODERATE','MEDIUM','ACCEPT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'user_it','2016-01-12 16:49:52',NULL),(35,'A.1.1-17','2016-01-12 17:35:59',0,2,'head_it','IT','IT','IT',11,'123Kehilangan Laptop/PC Dikantor, catatan kantor, barang berharga, dll','123Kehilangan Laptop/PC Dikantor',3,4,10,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,NULL,NULL,NULL,'MODERATE','MODERATE','LOW','ACCEPT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'head_it','2016-01-12 17:35:59',NULL),(36,'A.1.1-18','2016-01-12 17:45:34',0,2,'head_it','IT','IT','IT',11,'123Kehilangan Laptop/PC Dikantor, catatan kantor, barang berharga, dll','123Kehilangan Laptop/PC Dikantor',3,4,10,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,NULL,NULL,NULL,'MODERATE','MODERATE','LOW','ACCEPT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'head_it','2016-01-12 17:45:34',NULL),(37,'C.1.6-16','2016-01-13 19:47:13',0,2,'head_it','IT','IT','IT',7,'Kehilangan Laptop/PC Dikanto','Kehilangan Laptop/PC Dikanto',3,7,42,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,NULL,NULL,NULL,'MODERATE','MODERATE','MEDIUM','ACCEPT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'head_it','2016-01-13 19:47:13',NULL),(38,'C.1.6-17','2016-01-13 19:47:42',0,2,'head_it','IT','IT','IT',7,'Kehilangan Laptop/PC Dikanto','Kehilangan Laptop/PC Dikanto',3,7,42,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,NULL,NULL,NULL,'MODERATE','MODERATE','MEDIUM','ACCEPT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'head_it','2016-01-13 19:47:42',NULL),(39,'C.1.6-18','2016-01-13 19:49:57',0,2,'head_it','IT','IT','IT',5,'Kehilangan\' Laptop/PC Dikantor, catatan kantor, barang berharga, dll','Kehilangan Laptop/PC Dikantor',3,7,42,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,NULL,NULL,NULL,'MODERATE','MODERATE','MEDIUM','ACCEPT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'head_it','2016-01-13 19:49:57',NULL),(40,'C.1.6-19','2016-01-13 19:59:01',0,2,'head_it','IT','IT','IT',5,'Kehilangan\' Laptop/PC Dikantor, catatan kantor, barang berharga, dll','Kehilangan Laptop/PC Dikantor',3,7,42,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,NULL,NULL,NULL,'MODERATE','MODERATE','MEDIUM','ACCEPT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'head_it','2016-01-13 19:59:01',NULL),(41,'A.1.1-19','2016-01-13 20:11:40',0,2,'head_it','IT','Human Resource','Human Resource',2,'12321321','21412421',1,4,10,'1412','1241241',NULL,NULL,NULL,NULL,'MODERATE','MODERATE','MEDIUM','ACCEPT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'head_it','2016-01-13 20:11:40',NULL);

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
  `switch_flag` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

#
# Data for table "t_risk_action_plan"
#

INSERT INTO `t_risk_action_plan` VALUES (2,1,7,'Melanjutkan current control secara efektif','2015-12-31','IT','head_it','COMPLETE','Ex','Ev',NULL,NULL,NULL),(4,3,0,'asfsaaf','2015-12-31','IT',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,4,1,'Melanjutkan current control secara efektif','2015-12-31','IT',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,5,NULL,'Melanjutkan current control secara efektif','0000-00-00','IT',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(15,8,NULL,'Melanjutkan current control secara efektif','0000-00-00','IT',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(16,9,0,'Percobaan 1','2015-12-31','IT',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(17,9,0,'Percobaan 2','2016-01-09','IT',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(19,2,7,'124','2015-12-31','Human Resource','head_hr','COMPLETE','A','A',NULL,NULL,'C'),(20,6,6,'Melanjutkan current control secara efektif','0000-00-00','IT','head_it','EXTEND',NULL,NULL,'asdsadad','2015-12-29','C'),(21,10,0,'Melanjutkan current control secara efektif','0000-00-00','IT',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(24,12,0,'124','2016-01-31','IT',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(26,13,NULL,'Melanjutkan current control secara efektif','0000-00-00','IT',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(27,14,3,'Melanjutkan current control secara efektif','0000-00-00','IT',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(28,15,NULL,'Melanjutkan current control secara efektif','0000-00-00','IT',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(29,11,0,'Melanjutkan current control secara efektif','0000-00-00','IT',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(30,16,0,'Melanjutkan current control secara efektif','2015-12-31','IT',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(31,17,0,'Melanjutkan current control secara efektif','2015-12-31','IT',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(32,18,0,'Melanjutkan current control secara efektif','0000-00-00','IT',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(33,19,0,'Melanjutkan current control secara efektif','0000-00-00','IT',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(34,20,0,'Melanjutkan current control secara efektif','2015-12-31','IT',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(35,21,0,'Melanjutkan current control secara efektif','0000-00-00','IT',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(36,22,0,'Melanjutkan current control secara efektif','2016-01-31','IT',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(37,23,0,'Coba','2016-01-31','IT',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(38,24,0,'124','2015-12-31','Human Resource',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(39,25,0,'124','2015-12-31','Human Resource',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(40,26,0,'124','2015-12-31','Human Resource',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(41,27,0,'124','2015-12-31','Human Resource',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(42,28,0,'lalalalal','2016-01-31','IT',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(43,29,0,'Melanjutkan current control secara efektif','0000-00-00','IT',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(44,30,0,'asfsaaf','0000-00-00','IT',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(45,31,0,'124','2015-12-31','Human Resource',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(46,32,0,'124','2015-12-31','Human Resource',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(47,33,0,'Melanjutkan current control secara efektif','2016-01-31','IT',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(48,34,0,'Melanjutkan current control secara efektif','0000-00-00','IT',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(49,35,0,'Melanjutkan current control secara efektif','0000-00-00','IT',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(50,36,0,'Melanjutkan current control secara efektif','0000-00-00','IT',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(60,7,1,'Melanjutkan current control secara efektif','0000-00-00','IT',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(61,37,0,'Melanjutkan current control secara efektif','0000-00-00','IT',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(62,38,0,'Melanjutkan current control secara efektif','0000-00-00','IT',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(63,39,0,'Melanjutkan current control secara efektif','0000-00-00','IT',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(64,40,0,'Melanjutkan current control secara efektif','0000-00-00','IT',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(65,41,0,'124','2015-12-31','Human Resource',NULL,NULL,NULL,NULL,NULL,NULL,NULL);

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
  `switch_flag` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "t_risk_action_plan_change"
#

INSERT INTO `t_risk_action_plan_change` VALUES (NULL,9,0,'Melanjutkan current control secara efektif','0000-00-00','IT',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(206,NULL,3,'Melanjutkan current control secara efektif','0000-00-00','IT',NULL,NULL,NULL,NULL,NULL,NULL,'C'),(NULL,10,0,'Melanjutkan current control secara efektif','0000-00-00','IT',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(NULL,11,0,'Melanjutkan current control secara efektif','0000-00-00','IT',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(NULL,7,0,'Melanjutkan current control secara efektif','0000-00-00','IT',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(NULL,41,0,'124','2015-12-31','Human Resource',NULL,NULL,NULL,NULL,NULL,NULL,NULL);

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
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "t_risk_action_plan_hist"
#

INSERT INTO `t_risk_action_plan_hist` VALUES (151,25,1,'Dinyalain','2015-11-30','IT','head_it',NULL,NULL,NULL,NULL,NULL,'C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 13:16:22'),(152,25,1,'DImatiin','2015-11-30','IT',NULL,NULL,NULL,NULL,NULL,NULL,'C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 13:16:22'),(153,25,1,'Dihapus','2015-11-30','IT',NULL,NULL,NULL,NULL,NULL,NULL,'C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 13:16:22'),(151,25,1,'Dinyalain','2015-11-30','IT','head_it',NULL,NULL,NULL,NULL,NULL,'C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 13:20:54'),(152,25,1,'DImatiin','2015-11-30','IT',NULL,NULL,NULL,NULL,NULL,NULL,'C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 13:20:54'),(153,25,1,'Dihapus','2015-11-30','IT',NULL,NULL,NULL,NULL,NULL,NULL,'C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 13:20:54'),(151,25,1,'Dinyalain','2015-11-30','IT','head_it',NULL,NULL,NULL,NULL,NULL,'C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 13:32:49'),(152,25,1,'DImatiin','2015-11-30','IT',NULL,NULL,NULL,NULL,NULL,NULL,'C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 13:32:49'),(153,25,1,'Dihapus','2015-11-30','IT',NULL,NULL,NULL,NULL,NULL,NULL,'C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 13:32:49'),(151,25,1,'Dinyalain','2015-11-30','IT','head_it',NULL,NULL,NULL,NULL,NULL,'C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 13:38:56'),(152,25,1,'DImatiin - Diedit - Diedit Lagi','2015-11-30','IT',NULL,NULL,NULL,NULL,NULL,NULL,'C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 13:38:56'),(154,25,1,'Ditambah','2015-11-29','IT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 13:38:56'),(155,25,1,'Ditambah Lagi','2015-11-30','IT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 13:38:56'),(151,25,1,'Dinyalain','2015-11-30','IT','head_it',NULL,NULL,NULL,NULL,NULL,'C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 14:31:51'),(152,25,1,'DImatiin','2015-11-30','IT',NULL,NULL,NULL,NULL,NULL,NULL,'C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 14:31:51'),(154,25,1,'Dihapus','2015-11-29','IT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 14:31:51'),(155,25,1,'Ditambah Lagi','2015-11-30','IT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 14:31:51'),(151,25,1,'Dinyalain','2015-11-30','IT','head_it',NULL,NULL,NULL,NULL,NULL,'C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 15:19:42'),(152,25,1,'Diedit - Diedit Lagi','2015-11-30','IT',NULL,NULL,NULL,NULL,NULL,NULL,'C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 15:19:42'),(155,25,1,'Diedit AJa','2015-11-30','IT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 15:19:42'),(158,25,1,'Ditambahkan - Diedit','2015-11-30','IT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 15:19:42'),(151,25,1,'Dinyalain','2015-11-30','IT','head_it',NULL,NULL,NULL,NULL,NULL,'C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 19:12:15'),(152,25,1,'Diedit - Diedit Lagi - Diedit head','2015-11-30','IT',NULL,NULL,NULL,NULL,NULL,NULL,'C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 19:12:15'),(158,25,1,'Ditambahkan - Diedit','2015-11-30','IT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 19:12:15'),(159,25,1,'Add by head','2015-11-30','IT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 19:12:15'),(151,25,1,'Dinyalain','2015-11-30','IT','head_it',NULL,NULL,NULL,NULL,NULL,'C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 21:16:20'),(152,25,1,'Diedit - Diedit Lagi - Diedit head','2015-11-30','IT',NULL,NULL,NULL,NULL,NULL,NULL,'C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 21:16:20'),(158,25,1,'Ditambahkan - Diedit','2015-11-30','IT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 21:16:20'),(159,25,1,'Add by head','2015-11-30','IT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 21:16:20'),(151,25,1,'Dinyalain','2015-11-30','IT','head_it',NULL,NULL,NULL,NULL,NULL,'C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 21:17:55'),(152,25,1,'Diedit - Diedit Lagi - Diedit head','2015-11-30','IT',NULL,NULL,NULL,NULL,NULL,NULL,'C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 21:17:55'),(158,25,1,'Ditambahkan - Diedit','2015-11-30','IT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 21:17:55'),(159,25,1,'Add by head','2015-11-30','IT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 21:17:55'),(51,1,7,'Network Upgrade','2015-11-29','IT','head_it','COMPLETE','WAAA','SADASDAD',NULL,NULL,'C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-30 03:06:32'),(52,1,7,'Server Upgrade','2015-11-30','IT','head_it','COMPLETE','WA','cxcxzc',NULL,NULL,'C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-30 03:06:32'),(53,1,7,'Upgrade Aja','2015-11-28','IT','pic_it','COMPLETE','wa','wt',NULL,NULL,'C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-30 03:06:32'),(51,1,7,'Network Upgrade Diedit - Diedit','2015-11-29','IT','head_it','COMPLETE','WAAA','SADASDAD',NULL,NULL,'C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-30 03:08:17'),(52,1,7,'Server Upgrade','2015-11-30','IT','head_it','COMPLETE','WA','cxcxzc',NULL,NULL,'C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-30 03:08:17'),(53,1,7,'Upgrade Aja','2015-11-28','IT','pic_it','COMPLETE','wa','wt',NULL,NULL,'C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-30 03:08:17'),(51,1,7,'Network Upgrade Diedit - Diedit','2015-11-29','IT','head_it','COMPLETE','WAAA','SADASDAD',NULL,NULL,'C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-30 03:21:02'),(52,1,7,'Server Upgrade','2015-11-30','IT','head_it','COMPLETE','WA','cxcxzc',NULL,NULL,'C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-30 03:21:02'),(53,1,7,'Upgrade Aja','2015-11-28','IT','pic_it','COMPLETE','wa','wt',NULL,NULL,'C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-30 03:21:02');

#
# Structure for table "t_risk_add_user"
#

DROP TABLE IF EXISTS `t_risk_add_user`;
CREATE TABLE `t_risk_add_user` (
  `risk_id` int(11) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `date_changed` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "t_risk_add_user"
#

INSERT INTO `t_risk_add_user` VALUES (11,'Head Of IT','2016-01-11');

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
  `switch_flag` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "t_risk_change"
#

INSERT INTO `t_risk_change` VALUES (9,'C.1.6-7','2015-12-28 10:58:18',0,1,'head_it','IT','IT','IT',8,'Kehilangan Laptop/PC Dikantor, catatan kantor, barang berharga, dll','Kehilangan Laptop/PC Dikantor',3,7,42,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,NULL,NULL,NULL,'MODERATE','MODERATE','LOW','MITIGATE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'head_it','2015-12-28 10:58:18',NULL),(10,'C.1.6-8','2016-01-04 09:32:37',0,2,'user_it','IT','IT','IT',8,'Kehilangan Laptop/PC Dikantor, catatan kantor, barang berharga, dll','Kehilangan Laptop/PC Dikantor',3,7,42,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,NULL,NULL,NULL,'MODERATE','MODERATE','LOW','MITIGATE',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'user_it','2016-01-04 09:32:37',NULL),(11,'C.1.6-9','2016-01-11 09:36:19',5,2,'head_hr','Human Resource','IT','IT',7,'Kehilangan Laptop/PC Dikantor, catatan kantor, barang berharga, dll','Kehilangan Laptop/PC Dikantor',3,7,42,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,NULL,NULL,NULL,'MODERATE','MODERATE','LOW','ACCEPT','head_it',NULL,NULL,NULL,NULL,NULL,NULL,'head_it','2016-01-11 09:52:07',NULL),(41,'A.1.1-19','2016-01-13 20:11:41',0,2,'head_it','IT','Human Resource','Human Resource',2,'12321321','21412421',1,4,10,'1412','1241241',NULL,NULL,NULL,NULL,'MODERATE','MODERATE','MEDIUM','ACCEPT',NULL,'head_it','2016-01-13 20:11:41',NULL,NULL,NULL,NULL,NULL,NULL,NULL);

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
  `switch_flag` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

#
# Data for table "t_risk_control"
#

INSERT INTO `t_risk_control` VALUES (2,1,NULL,'Telah dibuat Policy tentang company asset dan disampaikan kepada karyawan, dan dipasang Security Cam (CCTV)','Case by case','All Employee',NULL),(4,3,NULL,'af','asf','Information Technology',NULL),(6,4,NULL,'Telah dibuat Policy tentang company asset dan disampaikan kepada karyawan, dan dipasang Security Cam (CCTV)','Case by case','All Employee',NULL),(9,5,NULL,'Telah dibuat Policy tentang company asset dan disampaikan kepada karyawan, dan dipasang Security Cam (CCTV)','Case by case','All Employee',NULL),(16,8,NULL,'Telah dibuat Policy tentang company asset dan disampaikan kepada karyawan, dan dipasang Security Cam (CCTV)','Case by case','All Employee',NULL),(17,9,NULL,'Telah dibuat Policy tentang company asset dan disampaikan kepada karyawan, dan dipasang Security Cam (CCTV)','Case by case','All Employee',NULL),(19,2,NULL,'214','214','124','C'),(20,6,NULL,'Telah dibuat Policy tentang company asset dan disampaikan kepada karyawan, dan dipasang Security Cam (CCTV)','Case by case','All Employee','C'),(21,10,NULL,'Telah dibuat Policy tentang company asset dan disampaikan kepada karyawan, dan dipasang Security Cam (CCTV)','Case by case','All Employee',NULL),(24,12,16,'Telah dibuat Policy tentang company asset dan disampaikan kepada karyawan, dan dipasang Security Cam (CCTV)','Case by case','Human Resource',NULL),(26,13,NULL,'Telah dibuat Policy tentang company asset dan disampaikan kepada karyawan, dan dipasang Security Cam (CCTV)','Case by case','All Employee',NULL),(27,14,NULL,'Telah dibuat Policy tentang company asset dan disampaikan kepada karyawan, dan dipasang Security Cam (CCTV)','Case by case','All Employee','C'),(28,15,NULL,'Telah dibuat Policy tentang company asset dan disampaikan kepada karyawan, dan dipasang Security Cam (CCTV)','Case by case','All Employee',NULL),(29,11,NULL,'Telah dibuat Policy tentang company asset dan disampaikan kepada karyawan, dan dipasang Security Cam (CCTV)','Case by case','All Employee',NULL),(30,16,NULL,'Telah dibuat Policy tentang company asset dan disampaikan kepada karyawan, dan dipasang Security Cam (CCTV)','Case by case','All Employee',NULL),(31,17,NULL,'Telah dibuat Policy tentang company asset dan disampaikan kepada karyawan, dan dipasang Security Cam (CCTV)','Case by case','All Employee',NULL),(32,18,NULL,'Telah dibuat Policy tentang company asset dan disampaikan kepada karyawan, dan dipasang Security Cam (CCTV)','Case by case','All Employee',NULL),(33,19,NULL,'Telah dibuat Policy tentang company asset dan disampaikan kepada karyawan, dan dipasang Security Cam (CCTV)','Case by case','All Employee',NULL),(34,20,NULL,'Telah dibuat Policy tentang company asset dan disampaikan kepada karyawan, dan dipasang Security Cam (CCTV)','Case by case','All Employee',NULL),(35,21,NULL,'Telah dibuat Policy tentang company asset dan disampaikan kepada karyawan, dan dipasang Security Cam (CCTV)','Case by case','All Employee',NULL),(36,22,NULL,'NONE','NONE','NONE',NULL),(37,23,NULL,'NONE','NONE','NONE',NULL),(38,24,NULL,'214','214','124',NULL),(39,25,NULL,'214','214','124',NULL),(40,26,NULL,'214','214','124',NULL),(41,27,NULL,'214','214','124',NULL),(42,28,NULL,'NONE','NONE','NONE',NULL),(43,29,NULL,'Telah dibuat Policy tentang company asset dan disampaikan kepada karyawan, dan dipasang Security Cam (CCTV)','Case by case','All Employee',NULL),(44,30,NULL,'NONE','NONE','NONE',NULL),(45,30,6,'Telah dibuat Policy tentang company asset dan disampaikan kepada karyawan, dan dipasang Security Cam (CCTV)','Case by case','IT',NULL),(46,31,NULL,'214','214','124',NULL),(47,32,NULL,'214','214','124',NULL),(48,33,NULL,'NONE','NONE','NONE',NULL),(49,34,NULL,'Telah dibuat Policy tentang company asset dan disampaikan kepada karyawan, dan dipasang Security Cam (CCTV)','Case by case','All Employee',NULL),(50,35,NULL,'Telah dibuat Policy tentang company asset dan disampaikan kepada karyawan, dan dipasang Security Cam (CCTV)','Case by case','All Employee',NULL),(51,36,NULL,'Telah dibuat Policy tentang company asset dan disampaikan kepada karyawan, dan dipasang Security Cam (CCTV)','Case by case','All Employee',NULL),(61,7,NULL,'Telah dibuat Policy tentang company asset dan disampaikan kepada karyawan, dan dipasang Security Cam (CCTV)','Case by case','All Employee',NULL),(62,37,NULL,'Telah dibuat Policy tentang company asset dan disampaikan kepada karyawan, dan dipasang Security Cam (CCTV)','Case by case','All Employee',NULL),(63,38,NULL,'Telah dibuat Policy tentang company asset dan disampaikan kepada karyawan, dan dipasang Security Cam (CCTV)','Case by case','All Employee',NULL),(64,39,NULL,'Telah dibuat Policy tentang company asset dan disampaikan kepada karyawan, dan dipasang Security Cam (CCTV)','Case by case','All Employee',NULL),(65,40,NULL,'Telah dibuat Policy tentang company asset dan disampaikan kepada karyawan, dan dipasang Security Cam (CCTV)','Case by case','All Employee',NULL),(66,41,NULL,'214','214','124',NULL);

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
  `switch_flag` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "t_risk_control_change"
#

INSERT INTO `t_risk_control_change` VALUES (9,NULL,'Telah dibuat Policy tentang company asset dan disampaikan kepada karyawan, dan dipasang Security Cam (CCTV)','Case by case','All Employee',NULL),(10,NULL,'Telah dibuat Policy tentang company asset dan disampaikan kepada karyawan, dan dipasang Security Cam (CCTV)','Case by case','All Employee',NULL),(11,NULL,'Telah dibuat Policy tentang company asset dan disampaikan kepada karyawan, dan dipasang Security Cam (CCTV)','Case by case','All Employee',NULL),(7,NULL,'Telah dibuat Policy tentang company asset dan disampaikan kepada karyawan, dan dipasang Security Cam (CCTV)','Case by case','All Employee',NULL),(41,NULL,'214','214','124',NULL);

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

INSERT INTO `t_risk_hist` VALUES (1,'C.1.6-1','2015-12-21 15:57:10',0,1,'head_it','IT','IT','IT',NULL,'Kehilangan Laptop/PC Dikantor, catatan kantor, barang berharga, dll','Kehilangan Laptop/PC Dikantor',3,7,42,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,'','','','MODERATE','MODERATE','LOW','MITIGATE','',NULL,NULL,NULL,NULL,NULL,NULL,'head_it','2015-12-21 15:57:10','','RISK_REGISTER-SUBMIT_PERIODE','head_it','2015-12-21 15:57:29'),(1,'C.1.6-1','2015-12-21 15:57:10',2,1,'head_it','IT','IT','IT',NULL,'Kehilangan Laptop/PC Dikantor, catatan kantor, barang berharga, dll','Kehilangan Laptop/PC Dikantor',3,7,42,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,'','','','MODERATE','MODERATE','LOW','MITIGATE','',NULL,NULL,NULL,NULL,NULL,NULL,'head_it','2015-12-21 15:57:29','','U','head_it','2015-12-21 15:57:42'),(1,'C.1.6-1','2015-12-21 15:57:10',3,1,'head_it','IT','IT','IT',NULL,'Kehilangan Laptop/PC Dikantor, catatan kantor, barang berharga, dll','Kehilangan Laptop/PC Dikantor',3,7,42,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,'','','','MODERATE','MODERATE','LOW','MITIGATE','head_it',NULL,NULL,NULL,NULL,NULL,NULL,'head_it','2015-12-21 15:57:42','','U','head_it','2015-12-21 15:58:01'),(1,'C.1.6-1','2015-12-21 15:57:10',5,1,'head_it','IT','IT','IT',NULL,'Kehilangan Laptop/PC Dikantor, catatan kantor, barang berharga, dll','Kehilangan Laptop/PC Dikantor',3,7,42,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,'','','','MODERATE','MODERATE','LOW','MITIGATE','head_it',NULL,NULL,NULL,NULL,NULL,NULL,'head_it','2015-12-21 15:58:01','','U','head_it','2015-12-21 15:58:15'),(2,'A.1.1-1','2015-12-22 12:08:06',0,1,'head_it','IT','Human Resource','Human Resource',NULL,'12321321','21412421',1,4,10,'1412','1241241',NULL,'','','','MODERATE','MODERATE','MEDIUM','ACCEPT','',NULL,NULL,NULL,NULL,NULL,NULL,'head_it','2015-12-22 12:08:06','','RISK_REGISTER-SUBMIT_PERIODE','head_it','2015-12-22 12:45:10'),(4,'C.1.6-2','2015-12-25 12:07:01',0,1,'user_it','IT','IT','IT',1,'Kehilangan Laptop/PC Dikantor, catatan kantor, barang berharga, dll','Kehilangan Laptop/PC Dikantor',3,7,42,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,'','','','MODERATE','MODERATE','LOW','ACCEPT','',NULL,NULL,NULL,NULL,NULL,NULL,'user_it','2015-12-25 12:07:01','','RISK_REGISTER-SUBMIT_PERIODE','user_it','2015-12-25 12:07:15'),(4,'C.1.6-2','2015-12-25 12:07:01',2,1,'user_it','IT','IT','IT',1,'Kehilangan Laptop/PC Dikantor, catatan kantor, barang berharga, dll','Kehilangan Laptop/PC Dikantor',3,7,42,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,'','','','MODERATE','MODERATE','LOW','ACCEPT','',NULL,NULL,NULL,NULL,NULL,NULL,'user_it','2015-12-25 12:07:15','','U','user_it','2015-12-25 12:07:54'),(5,'C.1.6-3','2015-12-25 12:36:39',0,1,'user_it','IT','IT','IT',4,'Kehilangan Laptop/PC Dikantor, catatan kantor, barang berharga, dll','Kehilangan Laptop/PC Dikantor',3,7,42,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,'','','','MODERATE','MODERATE','LOW','ACCEPT','',NULL,NULL,NULL,NULL,NULL,NULL,'user_it','2015-12-25 12:36:39','','RISK_REGISTER-SUBMIT_PERIODE','user_it','2015-12-25 12:36:55'),(5,'C.1.6-3','2015-12-25 12:36:39',2,1,'user_it','IT','IT','IT',4,'Kehilangan Laptop/PC Dikantor, catatan kantor, barang berharga, dll','Kehilangan Laptop/PC Dikantor',3,7,42,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,'','','','MODERATE','MODERATE','LOW','ACCEPT','',NULL,NULL,NULL,NULL,NULL,NULL,'user_it','2015-12-25 12:36:55','','U','user_it','2015-12-25 12:41:22'),(6,'C.1.6-4','2015-12-28 10:13:34',0,1,'user_it','IT','IT','IT',5,'Kehilangan Laptop/PC Dikantor, catatan kantor, barang berharga, dll','Kehilangan Laptop/PC Dikantor',3,7,42,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,'','','','MODERATE','MODERATE','LOW','MITIGATE','',NULL,NULL,NULL,NULL,NULL,NULL,'user_it','2015-12-28 10:13:34','','RISK_REGISTER-SUBMIT_PERIODE','user_it','2015-12-28 10:13:45'),(6,'C.1.6-4','2015-12-28 10:13:34',2,1,'user_it','IT','IT','IT',5,'Kehilangan Laptop/PC Dikantor, catatan kantor, barang berharga, dll','Kehilangan Laptop/PC Dikantor',3,7,42,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,'','','','MODERATE','MODERATE','LOW','MITIGATE','',NULL,NULL,NULL,NULL,NULL,NULL,'user_it','2015-12-28 10:13:45','','U','user_it','2015-12-28 10:14:36'),(7,'C.1.6-5','2015-12-28 10:16:28',0,1,'head_it','IT','IT','IT',6,'Kehilangan Laptop/PC Dikantor, catatan kantor, barang berharga, dll','Kehilangan Laptop/PC Dikantor',3,7,42,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,'','','','MODERATE','MODERATE','LOW','MITIGATE','',NULL,NULL,NULL,NULL,NULL,NULL,'head_it','2015-12-28 10:16:28','','RISK_REGISTER-SUBMIT_PERIODE','head_it','2015-12-28 10:16:38'),(7,'C.1.6-5','2015-12-28 10:16:28',2,1,'head_it','IT','IT','IT',6,'Kehilangan Laptop/PC Dikantor, catatan kantor, barang berharga, dll','Kehilangan Laptop/PC Dikantor',3,7,42,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,'','','','MODERATE','MODERATE','LOW','MITIGATE','',NULL,NULL,NULL,NULL,NULL,NULL,'head_it','2015-12-28 10:16:38','','U','head_it','2015-12-28 10:19:21'),(7,'C.1.6-5','2015-12-28 10:16:28',2,1,'head_it','IT','IT','IT',6,'Kehilangan Laptop/PC Dikantor, catatan kantor, barang berharga, dll','Kehilangan Laptop/PC Dikantor',3,7,42,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,'','','','MODERATE','MODERATE','LOW','ACCEPT','',NULL,NULL,NULL,NULL,NULL,NULL,'head_it','2015-12-28 10:19:21','','U','head_it','2015-12-28 10:20:20'),(8,'C.1.6-6','2015-12-28 10:22:24',0,1,'head_it','IT','IT','IT',6,'Kehilangan Laptop/PC Dikantor, catatan kantor, barang berharga, dll','Kehilangan Laptop/PC Dikantor',3,7,42,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,'','','','MODERATE','MODERATE','LOW','ACCEPT','',NULL,NULL,NULL,NULL,NULL,NULL,'head_it','2015-12-28 10:22:24','','RISK_REGISTER-SUBMIT_PERIODE','head_it','2015-12-28 10:22:35'),(8,'C.1.6-6','2015-12-28 10:22:24',2,1,'head_it','IT','IT','IT',6,'Kehilangan Laptop/PC Dikantor, catatan kantor, barang berharga, dll','Kehilangan Laptop/PC Dikantor',3,7,42,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,'','','','MODERATE','MODERATE','LOW','ACCEPT','',NULL,NULL,NULL,NULL,NULL,NULL,'head_it','2015-12-28 10:22:35','','U','head_it','2015-12-28 10:23:06'),(2,'A.1.1-1','2015-12-22 12:08:06',2,1,'head_it','IT','Human Resource','Human Resource',NULL,'12321321','21412421',1,4,10,'1412','1241241',NULL,'','','','MODERATE','MODERATE','MEDIUM','ACCEPT','',NULL,NULL,NULL,NULL,NULL,NULL,'head_it','2015-12-22 12:45:10','','U','head_it','2015-12-30 16:19:07'),(2,'A.1.1-1','2015-12-22 12:08:06',3,1,'head_it','IT','Human Resource','Human Resource',NULL,'12321321','21412421',1,4,10,'1412','1241241',NULL,'','','','MODERATE','MODERATE','MEDIUM','ACCEPT','head_hr',NULL,NULL,NULL,NULL,NULL,NULL,'head_it','2015-12-30 16:19:07','','U','head_hr','2015-12-30 16:30:53'),(2,'A.1.1-1','2015-12-22 12:08:06',5,1,'head_it','IT','Human Resource','Human Resource',NULL,'12321321','21412421',1,4,10,'1412','1241241',NULL,'','','','MODERATE','MODERATE','MEDIUM','ACCEPT','head_hr',NULL,NULL,NULL,NULL,NULL,NULL,'head_hr','2015-12-30 16:34:02','C','U','head_it','2015-12-30 16:34:03'),(6,'C.1.6-4','2015-12-28 10:13:34',3,1,'user_it','IT','IT','IT',1,'Kehilangan Laptop/PC Dikantor, catatan kantor, barang berharga, dll','Kehilangan Laptop/PC Dikantor',3,7,42,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,'','','','MODERATE','MODERATE','LOW','MITIGATE','head_it',NULL,NULL,NULL,NULL,NULL,NULL,'user_it','2015-12-28 10:14:36','','U','head_it','2015-12-30 16:54:55'),(6,'C.1.6-4','2015-12-28 10:13:34',5,1,'user_it','IT','IT','IT',1,'Kehilangan Laptop/PC Dikantor, catatan kantor, barang berharga, dll','Kehilangan Laptop/PC Dikantor',3,7,42,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,'','','','MODERATE','MODERATE','LOW','MITIGATE','head_it',NULL,NULL,NULL,NULL,NULL,NULL,'head_it','2015-12-30 16:55:23','C','U','head_it','2015-12-30 16:55:25'),(10,'C.1.6-8','2016-01-04 09:32:36',0,2,'user_it','IT','IT','IT',8,'Kehilangan Laptop/PC Dikantor, catatan kantor, barang berharga, dll','Kehilangan Laptop/PC Dikantor',3,7,42,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,'','','','MODERATE','MODERATE','LOW','TRANSFER','',NULL,NULL,NULL,NULL,NULL,NULL,'user_it','2016-01-04 09:32:36','','RISK_REGISTER-SUBMIT_PERIODE','user_it','2016-01-04 09:32:59'),(11,'C.1.6-9','2016-01-11 09:36:19',0,2,'head_hr','Human Resource','IT','IT',7,'Kehilangan Laptop/PC Dikantor, catatan kantor, barang berharga, dll','Kehilangan Laptop/PC Dikantor',3,7,42,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,NULL,NULL,NULL,'MODERATE','MODERATE','LOW','ACCEPT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'head_hr','2016-01-11 09:36:19',NULL,'RISK_REGISTER-SUBMIT_PERIODE','head_hr','2016-01-11 09:43:59'),(11,'C.1.6-9','2016-01-11 09:36:19',2,2,'head_hr','Human Resource','IT','IT',7,'Kehilangan Laptop/PC Dikantor, catatan kantor, barang berharga, dll','Kehilangan Laptop/PC Dikantor',3,7,42,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,NULL,NULL,NULL,'MODERATE','MODERATE','LOW','ACCEPT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'head_hr','2016-01-11 09:43:59',NULL,'U','user_it','2016-01-11 09:46:29'),(11,'C.1.6-9','2016-01-11 09:36:19',3,2,'head_hr','Human Resource','IT','IT',7,'Kehilangan Laptop/PC Dikantor, catatan kantor, barang berharga, dll','Kehilangan Laptop/PC Dikantor',3,7,42,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,NULL,NULL,NULL,'MODERATE','MODERATE','LOW','ACCEPT','head_it',NULL,NULL,NULL,NULL,NULL,NULL,'head_hr','2016-01-11 09:46:29',NULL,'U','head_it','2016-01-11 09:52:07'),(12,'A.1.1-3','2016-01-11 10:25:01',0,2,'head_it','IT','IT','IT',NULL,'saf','safas',1,4,10,'sf','sf',NULL,NULL,NULL,NULL,'MODERATE','MINOR','MEDIUM','ACCEPT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'head_it','2016-01-11 10:25:01',NULL,'RISK_REGISTER-SUBMIT_PERIODE','head_it','2016-01-11 10:25:22'),(12,'A.1.1-3','2016-01-11 10:25:01',1,2,'head_it','IT','IT','IT',NULL,'saf','safas',1,4,10,'sf','sf',NULL,NULL,NULL,NULL,'MODERATE','MINOR','MEDIUM','ACCEPT',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'head_it','2016-01-11 10:25:22',NULL,'RISK_REGISTER-SUBMIT_PERIODE','head_it','2016-01-12 13:26:02'),(11,'C.1.6-9','2016-01-11 09:36:19',0,2,'head_hr','Human Resource','IT','IT',7,'123Kehilangan Laptop/PC Dikantor, catatan kantor, barang berharga, dll','123Kehilangan Laptop/PC Dikantor',3,7,42,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,NULL,NULL,NULL,'MODERATE','MODERATE','LOW','ACCEPT','head_it',NULL,NULL,NULL,NULL,NULL,NULL,'head_it','2016-01-12 11:48:21',NULL,'RISK_REGISTER-SUBMIT_PERIODE','head_hr','2016-01-12 18:09:20'),(11,'C.1.6-9','2016-01-11 09:36:19',0,2,'head_hr','Human Resource','IT','IT',7,'123Kehilangan Laptop/PC Dikantor, catatan kantor, barang berharga, dll','123Kehilangan Laptop/PC Dikantor',3,7,42,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,NULL,NULL,NULL,'MODERATE','MODERATE','LOW','ACCEPT','head_it',NULL,NULL,NULL,NULL,NULL,NULL,'head_hr','2016-01-12 18:09:20',NULL,'RISK_REGISTER-SUBMIT_PERIODE','head_hr','2016-01-12 20:22:03'),(11,'C.1.6-9','2016-01-11 09:36:19',0,2,'head_hr','Human Resource','IT','IT',7,'123Kehilangan Laptop/PC Dikantor, catatan kantor, barang berharga, dll','123Kehilangan Laptop/PC Dikantor',3,7,42,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,NULL,NULL,NULL,'MODERATE','MODERATE','LOW','ACCEPT','head_it',NULL,NULL,NULL,NULL,NULL,NULL,'head_hr','2016-01-12 20:22:03',NULL,'RISK_REGISTER-SUBMIT_PERIODE','head_hr','2016-01-13 10:17:06'),(11,'C.1.6-9','2016-01-11 09:36:19',0,2,'head_hr','Human Resource','IT','IT',7,'123Kehilangan Laptop/PC Dikantor, catatan kantor, barang berharga, dll','123Kehilangan Laptop/PC Dikantor',3,7,42,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,NULL,NULL,NULL,'MODERATE','MODERATE','LOW','ACCEPT','head_it',NULL,NULL,NULL,NULL,NULL,NULL,'head_hr','2016-01-13 10:17:06',NULL,'RISK_REGISTER-SUBMIT_PERIODE','head_hr','2016-01-13 10:32:03'),(7,'C.1.6-5','2015-12-28 10:16:28',3,1,'head_it','IT','IT','IT',1,'Kehilangan Laptop/PC Dikantor, catatan kantor, barang berharga, dll','Kehilangan Laptop/PC Dikantor',3,7,42,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,NULL,NULL,NULL,'MODERATE','MODERATE','LOW','ACCEPT','head_it',NULL,NULL,NULL,NULL,NULL,NULL,'head_it','2015-12-28 10:20:20',NULL,'U','head_it','2016-01-13 13:31:35'),(7,'C.1.6-5','2015-12-28 10:16:28',5,1,'head_it','IT','IT','IT',1,'5675Kehilangan Laptop/PC Dikantor, catatan kantor, barang berharga, dll','56757Kehilangan Laptop/PC Dikanto',3,7,42,'667567Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','56567Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,NULL,NULL,NULL,'MODERATE','MODERATE','LOW','MITIGATE','head_it',NULL,NULL,NULL,NULL,NULL,NULL,'head_it','2016-01-13 16:17:00','C','U','head_it','2016-01-13 16:40:29'),(7,'C.1.6-5','2015-12-28 10:16:28',5,1,'head_it','IT','IT','IT',1,'5675Kehilangan Laptop/PC Dikantor, catatan kantor, barang berharga, dll','56757Kehilangan Laptop/PC Dikanto',3,7,42,'667567Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','56567Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,NULL,NULL,NULL,'MODERATE','MODERATE','LOW','ACCEPT','head_it',NULL,NULL,NULL,NULL,NULL,NULL,'head_it','2016-01-13 16:40:29','C','U','head_it','2016-01-13 16:52:34'),(7,'C.1.6-5','2015-12-28 10:16:28',5,1,'head_it','IT','IT','IT',1,'5675Kehilangan Laptop/PC Dikantor, catatan kantor, barang berharga, dll','56757Kehilangan Laptop/PC Dikanto',3,7,42,'667567Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','56567Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,NULL,NULL,NULL,'MODERATE','MODERATE','LOW','ACCEPT','head_it',NULL,NULL,NULL,NULL,NULL,NULL,'head_it','2016-01-13 16:52:34','C','U','head_it','2016-01-13 16:58:09'),(7,'C.1.6-5','2015-12-28 10:16:28',5,1,'head_it','IT','IT','IT',1,'5675Kehilangan Laptop/PC Dikantor, catatan kantor, barang berharga, dll','56757Kehilangan Laptop/PC Dikanto',3,7,42,'667567Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','56567Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,NULL,NULL,NULL,'MODERATE','MODERATE','LOW','ACCEPT','head_it',NULL,NULL,NULL,NULL,NULL,NULL,'head_it','2016-01-13 16:58:09','C','U','head_it','2016-01-13 17:06:19'),(7,'C.1.6-5','2015-12-28 10:16:28',5,1,'head_it','IT','IT','IT',1,'tes','56757Kehilangan Laptop/PC Dikanto',3,7,42,'667567Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','56567Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,NULL,NULL,NULL,'MODERATE','MODERATE','LOW','ACCEPT','head_it',NULL,NULL,NULL,NULL,NULL,NULL,'head_it','2016-01-13 17:06:19','C','U','head_it','2016-01-13 17:07:53'),(7,'C.1.6-5','2015-12-28 10:16:28',5,1,'head_it','IT','IT','IT',1,'tes','56757Kehilangan Laptop/PC Dikanto',3,7,42,'667567Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','56567Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,NULL,NULL,NULL,'MODERATE','MODERATE','LOW','ACCEPT','head_it',NULL,NULL,NULL,NULL,NULL,NULL,'head_it','2016-01-13 17:07:53','C','U','head_it','2016-01-13 17:09:36'),(7,'C.1.6-5','2015-12-28 10:16:28',5,1,'head_it','IT','IT','IT',1,'tes123','56757Kehilangan Laptop/PC Dikanto',3,7,42,'667567Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','56567Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,NULL,NULL,NULL,'MODERATE','MODERATE','LOW','ACCEPT','head_it',NULL,NULL,NULL,NULL,NULL,NULL,'head_it','2016-01-13 17:09:36','C','U','head_it','2016-01-13 17:11:03'),(7,'C.1.6-5','2015-12-28 10:16:28',5,1,'head_it','IT','IT','IT',1,'123Kehilangan Laptop/PC Dikanto','123Kehilangan Laptop/PC Dikanto',3,7,42,'123Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','123Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,NULL,NULL,NULL,'MODERATE',NULL,NULL,NULL,'head_it',NULL,NULL,NULL,NULL,NULL,NULL,'head_it','2016-01-13 17:11:03','C','U','head_it','2016-01-13 17:14:01'),(7,'C.1.6-5','2015-12-28 10:16:28',5,1,'head_it','IT','IT','IT',1,'123Kehilangan Laptop/PC Dikanto','123Kehilangan Laptop/PC Dikanto',3,7,42,'123Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','123Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,NULL,NULL,NULL,'Sedang','Moderate','LOW','Accept','head_it',NULL,NULL,NULL,NULL,NULL,NULL,'head_it','2016-01-13 17:14:02','C','U','head_it','2016-01-13 17:16:40'),(7,'C.1.6-5','2015-12-28 10:16:28',5,1,'head_it','IT','IT','IT',1,'Kehilangan Laptop/PC Dikanto','Kehilangan Laptop/PC Dikanto',3,7,42,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,NULL,NULL,NULL,'HIGH','Major','HIGH','Mitigate','head_it',NULL,NULL,NULL,NULL,NULL,NULL,'head_it','2016-01-13 17:16:40','C','U','head_it','2016-01-13 17:22:02'),(7,'C.1.6-5','2015-12-28 10:16:28',5,1,'head_it','IT','IT','IT',1,'Kehilangan Laptop/PC Dikanto','Kehilangan Laptop/PC Dikanto',3,7,42,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,NULL,NULL,NULL,'Tinggi','Moderate','HIGH','Mitigate','head_it',NULL,NULL,NULL,NULL,NULL,NULL,'head_it','2016-01-13 17:22:03','C','U','head_it','2016-01-13 18:49:21'),(7,'C.1.6-5','2015-12-28 10:16:28',5,1,'head_it','IT','IT','IT',1,'Kehilangan Laptop/PC Dikanto','Kehilangan Laptop/PC Dikanto',3,7,42,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,NULL,NULL,NULL,'','Insignificant','HIGH','Mitigate','head_it',NULL,NULL,NULL,NULL,NULL,NULL,'head_it','2016-01-13 18:49:21','C','U','head_it','2016-01-13 19:00:20'),(7,'C.1.6-5','2015-12-28 10:16:28',5,1,'head_it','IT','IT','IT',1,'Kehilangan Laptop/PC Dikanto','Kehilangan Laptop/PC Dikanto',3,7,42,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,NULL,NULL,NULL,'Rendah','Minor','VERY LOW','Mitigate','head_it',NULL,NULL,NULL,NULL,NULL,NULL,'head_it','2016-01-13 19:00:20','C','U','head_it','2016-01-13 19:03:57'),(4,'C.1.6-2','2015-12-25 12:07:01',3,2,'user_it','IT','IT','IT',1,'Kehilangan Laptop/PC Dikantor, catatan kantor, barang berharga, dll','Kehilangan Laptop/PC Dikantor',3,7,42,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,NULL,NULL,NULL,'MODERATE','MODERATE','MEDIUM','ACCEPT','head_it','LOW','LOW','LOW','MODERATE','MODERATE','MEDIUM','user_it','2015-12-25 12:07:54',NULL,'U','head_it','2016-01-13 19:42:24'),(4,'C.1.6-2','2015-12-25 12:07:01',5,2,'user_it','IT','IT','IT',1,'Kehilangan Laptop/PC Dikantor, catatan kantor, barang berharga, dll','Kehilangan Laptop/PC Dikantor',3,7,42,'Tertinggal, diambil orang saat user melakukan perjalanan dinas, diambil orang saat user diperjalanan berangkat atau pulang kerja, keteledoran user, Pencurian','Data hilang, user tidak dapat melakukan pekerjaannya Kerugian oleh karyawan',NULL,NULL,NULL,NULL,'MODERATE','MODERATE','MEDIUM','ACCEPT','head_it','LOW','LOW','LOW','MODERATE','MODERATE','MEDIUM','head_it','2016-01-13 19:42:24',NULL,'U','head_it','2016-01-13 20:18:23');

#
# Structure for table "t_risk_impact"
#

DROP TABLE IF EXISTS `t_risk_impact`;
CREATE TABLE `t_risk_impact` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `risk_id` int(11) DEFAULT NULL,
  `impact_id` int(11) DEFAULT NULL,
  `impact_level` varchar(100) DEFAULT NULL,
  `switch_flag` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=442 DEFAULT CHARSET=latin1;

#
# Data for table "t_risk_impact"
#

INSERT INTO `t_risk_impact` VALUES (8,1,1,'NA',''),(9,1,2,'MODERATE',''),(10,1,3,'NA',''),(11,1,4,'NA',''),(12,1,5,'NA',''),(13,1,6,'NA',''),(14,1,7,'NA',''),(22,3,1,'MODERATE',''),(23,3,2,'NA',''),(24,3,3,'NA',''),(25,3,4,'NA',''),(26,3,5,'NA',''),(27,3,6,'NA',''),(28,3,7,'NA',''),(36,4,1,'NA',''),(37,4,2,'MODERATE',''),(38,4,3,'NA',''),(39,4,4,'NA',''),(40,4,5,'NA',''),(41,4,6,'NA',''),(42,4,7,'NA',''),(50,5,1,'NA',''),(51,5,2,'MODERATE',''),(52,5,3,'NA',''),(53,5,4,'NA',''),(54,5,5,'NA',''),(55,5,6,'NA',''),(56,5,7,'NA',''),(99,8,1,'NA',''),(100,8,2,'MODERATE',''),(101,8,3,'NA',''),(102,8,4,'NA',''),(103,8,5,'NA',''),(104,8,6,'NA',''),(105,8,7,'NA',''),(106,9,1,'NA',''),(107,9,2,'MODERATE',''),(108,9,3,'NA',''),(109,9,4,'NA',''),(110,9,5,'NA',''),(111,9,6,'NA',''),(112,9,7,'NA',''),(120,2,1,'MODERATE','C'),(121,2,2,'NA','C'),(122,2,3,'NA','C'),(123,2,4,'NA','C'),(124,2,5,'NA','C'),(125,2,6,'NA','C'),(126,2,7,'NA','C'),(127,6,1,'NA','C'),(128,6,2,'MODERATE','C'),(129,6,3,'NA','C'),(130,6,4,'NA','C'),(131,6,5,'NA','C'),(132,6,6,'NA','C'),(133,6,7,'NA','C'),(134,10,1,'NA',''),(135,10,2,'MODERATE',''),(136,10,3,'NA',''),(137,10,4,'NA',''),(138,10,5,'NA',''),(139,10,6,'NA',''),(140,10,7,'NA',''),(155,12,1,'MINOR',NULL),(156,12,2,'NA',NULL),(157,12,3,'NA',NULL),(158,12,4,'NA',NULL),(159,12,5,'NA',NULL),(160,12,6,'NA',NULL),(161,12,7,'NA',NULL),(169,13,1,'NA',''),(170,13,2,'MODERATE',''),(171,13,3,'NA',''),(172,13,4,'NA',''),(173,13,5,'NA',''),(174,13,6,'NA',''),(175,13,7,'NA',''),(176,14,1,'NA','C'),(177,14,2,'MODERATE','C'),(178,14,3,'NA','C'),(179,14,4,'NA','C'),(180,14,5,'NA','C'),(181,14,6,'NA','C'),(182,14,7,'NA','C'),(183,15,1,'NA',''),(184,15,2,'MODERATE',''),(185,15,3,'NA',''),(186,15,4,'NA',''),(187,15,5,'NA',''),(188,15,6,'NA',''),(189,15,7,'NA',''),(190,11,1,'NA',NULL),(191,11,2,'MODERATE',NULL),(192,11,3,'NA',NULL),(193,11,4,'NA',NULL),(194,11,5,'NA',NULL),(195,11,6,'NA',NULL),(196,11,7,'NA',NULL),(197,16,1,'NA',NULL),(198,16,2,'MODERATE',NULL),(199,16,3,'NA',NULL),(200,16,4,'NA',NULL),(201,16,5,'NA',NULL),(202,16,6,'NA',NULL),(203,16,7,'NA',NULL),(204,17,1,'NA',NULL),(205,17,2,'MODERATE',NULL),(206,17,3,'NA',NULL),(207,17,4,'NA',NULL),(208,17,5,'NA',NULL),(209,17,6,'NA',NULL),(210,17,7,'NA',NULL),(211,18,1,'NA',NULL),(212,18,2,'MODERATE',NULL),(213,18,3,'NA',NULL),(214,18,4,'NA',NULL),(215,18,5,'NA',NULL),(216,18,6,'NA',NULL),(217,18,7,'NA',NULL),(218,19,1,'NA',NULL),(219,19,2,'MODERATE',NULL),(220,19,3,'NA',NULL),(221,19,4,'NA',NULL),(222,19,5,'NA',NULL),(223,19,6,'NA',NULL),(224,19,7,'NA',NULL),(225,20,1,'INSIGNIFICANT',NULL),(226,20,2,'MODERATE',NULL),(227,20,3,'NA',NULL),(228,20,4,'NA',NULL),(229,20,5,'NA',NULL),(230,20,6,'NA',NULL),(231,20,7,'NA',NULL),(232,21,1,'NA',NULL),(233,21,2,'MODERATE',NULL),(234,21,3,'NA',NULL),(235,21,4,'NA',NULL),(236,21,5,'NA',NULL),(237,21,6,'NA',NULL),(238,21,7,'NA',NULL),(239,22,1,'NA',NULL),(240,22,2,'INSIGNIFICANT',NULL),(241,22,3,'NA',NULL),(242,22,4,'NA',NULL),(243,22,5,'NA',NULL),(244,22,6,'NA',NULL),(245,22,7,'NA',NULL),(246,23,1,'NA',NULL),(247,23,2,'MODERATE',NULL),(248,23,3,'NA',NULL),(249,23,4,'NA',NULL),(250,23,5,'NA',NULL),(251,23,6,'NA',NULL),(252,23,7,'NA',NULL),(253,24,1,'MODERATE',NULL),(254,24,2,'NA',NULL),(255,24,3,'NA',NULL),(256,24,4,'NA',NULL),(257,24,5,'NA',NULL),(258,24,6,'NA',NULL),(259,24,7,'NA',NULL),(260,25,1,'MODERATE',NULL),(261,25,2,'NA',NULL),(262,25,3,'NA',NULL),(263,25,4,'NA',NULL),(264,25,5,'NA',NULL),(265,25,6,'NA',NULL),(266,25,7,'NA',NULL),(267,26,1,'MODERATE',NULL),(268,26,2,'NA',NULL),(269,26,3,'NA',NULL),(270,26,4,'NA',NULL),(271,26,5,'NA',NULL),(272,26,6,'NA',NULL),(273,26,7,'NA',NULL),(274,27,1,'MODERATE',NULL),(275,27,2,'NA',NULL),(276,27,3,'NA',NULL),(277,27,4,'NA',NULL),(278,27,5,'NA',NULL),(279,27,6,'NA',NULL),(280,27,7,'NA',NULL),(281,28,1,'MODERATE',NULL),(282,28,2,'NA',NULL),(283,28,3,'NA',NULL),(284,28,4,'NA',NULL),(285,28,5,'NA',NULL),(286,28,6,'NA',NULL),(287,28,7,'NA',NULL),(288,29,1,'NA',NULL),(289,29,2,'MODERATE',NULL),(290,29,3,'NA',NULL),(291,29,4,'NA',NULL),(292,29,5,'NA',NULL),(293,29,6,'NA',NULL),(294,29,7,'NA',NULL),(295,30,1,'INSIGNIFICANT',NULL),(296,30,2,'NA',NULL),(297,30,3,'NA',NULL),(298,30,4,'NA',NULL),(299,30,5,'NA',NULL),(300,30,6,'NA',NULL),(301,30,7,'NA',NULL),(302,31,1,'MODERATE',NULL),(303,31,2,'NA',NULL),(304,31,3,'NA',NULL),(305,31,4,'NA',NULL),(306,31,5,'NA',NULL),(307,31,6,'NA',NULL),(308,31,7,'NA',NULL),(309,32,1,'MODERATE',NULL),(310,32,2,'NA',NULL),(311,32,3,'NA',NULL),(312,32,4,'NA',NULL),(313,32,5,'NA',NULL),(314,32,6,'NA',NULL),(315,32,7,'NA',NULL),(316,33,1,'CATASTROPHIC',NULL),(317,33,2,'NA',NULL),(318,33,3,'NA',NULL),(319,33,4,'NA',NULL),(320,33,5,'NA',NULL),(321,33,6,'NA',NULL),(322,33,7,'NA',NULL),(323,34,1,'NA',NULL),(324,34,2,'MODERATE',NULL),(325,34,3,'NA',NULL),(326,34,4,'NA',NULL),(327,34,5,'NA',NULL),(328,34,6,'NA',NULL),(329,34,7,'NA',NULL),(330,35,1,'NA',NULL),(331,35,2,'MODERATE',NULL),(332,35,3,'NA',NULL),(333,35,4,'NA',NULL),(334,35,5,'NA',NULL),(335,35,6,'NA',NULL),(336,35,7,'NA',NULL),(337,36,1,'NA',NULL),(338,36,2,'MODERATE',NULL),(339,36,3,'NA',NULL),(340,36,4,'NA',NULL),(341,36,5,'NA',NULL),(342,36,6,'NA',NULL),(343,36,7,'NA',NULL),(400,7,1,'NA',NULL),(401,7,2,'MODERATE',NULL),(402,7,3,'NA',NULL),(403,7,4,'NA',NULL),(404,7,5,'NA',NULL),(405,7,6,'NA',NULL),(406,7,7,'NA',NULL),(407,37,1,'MODERATE',NULL),(408,37,2,'MODERATE',NULL),(409,37,3,'NA',NULL),(410,37,4,'NA',NULL),(411,37,5,'NA',NULL),(412,37,6,'NA',NULL),(413,37,7,'NA',NULL),(414,38,1,'MODERATE',NULL),(415,38,2,'MODERATE',NULL),(416,38,3,'NA',NULL),(417,38,4,'NA',NULL),(418,38,5,'NA',NULL),(419,38,6,'NA',NULL),(420,38,7,'NA',NULL),(421,39,1,'NA',NULL),(422,39,2,'MODERATE',NULL),(423,39,3,'NA',NULL),(424,39,4,'NA',NULL),(425,39,5,'NA',NULL),(426,39,6,'NA',NULL),(427,39,7,'NA',NULL),(428,40,1,'NA',NULL),(429,40,2,'MODERATE',NULL),(430,40,3,'NA',NULL),(431,40,4,'NA',NULL),(432,40,5,'NA',NULL),(433,40,6,'NA',NULL),(434,40,7,'NA',NULL),(435,41,1,'MODERATE',NULL),(436,41,2,'NA',NULL),(437,41,3,'NA',NULL),(438,41,4,'NA',NULL),(439,41,5,'NA',NULL),(440,41,6,'NA',NULL),(441,41,7,'NA',NULL);

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
  `switch_flag` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "t_risk_impact_change"
#

INSERT INTO `t_risk_impact_change` VALUES (9,1,'NA',''),(9,2,'MODERATE',''),(9,3,'NA',''),(9,4,'NA',''),(9,5,'NA',''),(9,6,'NA',''),(9,7,'NA',''),(10,1,'NA',''),(10,2,'MODERATE',''),(10,3,'NA',''),(10,4,'NA',''),(10,5,'NA',''),(10,6,'NA',''),(10,7,'NA',''),(11,1,'NA',NULL),(11,2,'MODERATE',NULL),(11,3,'NA',NULL),(11,4,'NA',NULL),(11,5,'NA',NULL),(11,6,'NA',NULL),(11,7,'NA',NULL),(7,1,'NA',NULL),(7,2,'MODERATE',NULL),(7,3,'NA',NULL),(7,4,'NA',NULL),(7,5,'NA',NULL),(7,6,'NA',NULL),(7,7,'NA',NULL),(41,1,'MODERATE',NULL),(41,2,'NA',NULL),(41,3,'NA',NULL),(41,4,'NA',NULL),(41,5,'NA',NULL),(41,6,'NA',NULL),(41,7,'NA',NULL);

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

INSERT INTO `t_risk_impact_hist` VALUES (547,25,1,'NA','C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 13:16:22'),(548,25,2,'MODERATE','C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 13:16:22'),(549,25,3,'NA','C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 13:16:22'),(550,25,4,'NA','C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 13:16:22'),(551,25,5,'NA','C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 13:16:22'),(552,25,6,'NA','C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 13:16:22'),(553,25,7,'NA','C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 13:16:22'),(561,25,1,'NA','C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 13:20:54'),(562,25,2,'MODERATE','C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 13:20:54'),(563,25,3,'NA','C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 13:20:54'),(564,25,4,'NA','C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 13:20:54'),(565,25,5,'NA','C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 13:20:54'),(566,25,6,'NA','C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 13:20:54'),(567,25,7,'NA','C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 13:20:54'),(575,25,1,'NA','C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 13:32:49'),(576,25,2,'MODERATE','C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 13:32:49'),(577,25,3,'NA','C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 13:32:49'),(578,25,4,'NA','C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 13:32:49'),(579,25,5,'NA','C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 13:32:49'),(580,25,6,'NA','C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 13:32:49'),(581,25,7,'NA','C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 13:32:49'),(582,25,1,'MAJOR',NULL,'CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 13:38:56'),(583,25,2,'MODERATE',NULL,'CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 13:38:56'),(584,25,3,'NA',NULL,'CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 13:38:56'),(585,25,4,'NA',NULL,'CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 13:38:56'),(586,25,5,'NA',NULL,'CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 13:38:56'),(587,25,6,'NA',NULL,'CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 13:38:56'),(588,25,7,'NA',NULL,'CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 13:38:56'),(589,25,1,'MAJOR',NULL,'CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 14:31:51'),(590,25,2,'MODERATE',NULL,'CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 14:31:51'),(591,25,3,'NA',NULL,'CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 14:31:51'),(592,25,4,'NA',NULL,'CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 14:31:51'),(593,25,5,'NA',NULL,'CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 14:31:51'),(594,25,6,'NA',NULL,'CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 14:31:51'),(595,25,7,'NA',NULL,'CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 14:31:51'),(596,25,1,'MAJOR',NULL,'CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 15:19:42'),(597,25,2,'MODERATE',NULL,'CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 15:19:42'),(598,25,3,'NA',NULL,'CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 15:19:42'),(599,25,4,'NA',NULL,'CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 15:19:42'),(600,25,5,'NA',NULL,'CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 15:19:42'),(601,25,6,'NA',NULL,'CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 15:19:42'),(602,25,7,'NA',NULL,'CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 15:19:42'),(603,25,1,'MINOR','C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 19:12:15'),(604,25,2,'MODERATE','C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 19:12:15'),(605,25,3,'NA','C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 19:12:15'),(606,25,4,'NA','C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 19:12:15'),(607,25,5,'NA','C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 19:12:15'),(608,25,6,'NA','C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 19:12:15'),(609,25,7,'NA','C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 19:12:15'),(610,25,1,'MINOR','C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 21:16:20'),(611,25,2,'MODERATE','C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 21:16:20'),(612,25,3,'NA','C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 21:16:20'),(613,25,4,'NA','C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 21:16:20'),(614,25,5,'NA','C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 21:16:20'),(615,25,6,'NA','C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 21:16:20'),(616,25,7,'NA','C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 21:16:20'),(617,25,1,'MINOR','C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 21:17:55'),(618,25,2,'MODERATE','C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 21:17:55'),(619,25,3,'NA','C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 21:17:55'),(620,25,4,'NA','C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 21:17:55'),(621,25,5,'NA','C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 21:17:55'),(622,25,6,'NA','C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 21:17:55'),(623,25,7,'NA','C','CHANGE_REQUEST-VERIFY','user_rac','2015-11-29 21:17:55');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

#
# Data for table "t_user_manual"
#

INSERT INTO `t_user_manual` VALUES (2,'Cara Membuat User 12345',NULL,1,'2015-12-30 12:29:16','user_it',' </br>123Lakukan langkah-langkah berikut untuk menambahkan user : </br><ul><li>Baca bismillah terlebih dahulu</li><li>Buka Laptop Lalu Nyalakan terlebih dahulu</li></ul> ',3),(3,'Ini User Manual Head',NULL,1,'2015-11-19 12:27:39','user_rac','ini isi Head',4),(5,'Ini User Manual PIC',NULL,1,NULL,NULL,NULL,5),(7,'asdasdxxxxxxxxxxxxx','',1,'2015-12-30 13:41:41','admin','   asdasdasdxxxxxxxxxxxxxxxxxx',2),(8,'indo','',1,'2015-12-30 13:23:00','user_it','indo',3),(9,'administration','',1,'2015-12-30 13:42:13','admin','sadasdasdasd',3);
