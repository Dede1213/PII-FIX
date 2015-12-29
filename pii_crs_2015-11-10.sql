# ************************************************************
# Sequel Pro SQL dump
# Version 4135
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.5.42)
# Database: pii_crs
# Generation Time: 2015-11-10 03:54:47 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table m_division
# ------------------------------------------------------------

DROP TABLE IF EXISTS `m_division`;

CREATE TABLE `m_division` (
  `division_id` varchar(100) NOT NULL DEFAULT '',
  `division_name` varchar(100) DEFAULT NULL,
  `created_by` varchar(200) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`division_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `m_division` WRITE;
/*!40000 ALTER TABLE `m_division` DISABLE KEYS */;

INSERT INTO `m_division` (`division_id`, `division_name`, `created_by`, `created_date`)
VALUES
	('Human Resource','Human Resource','admin','2015-10-25 20:54:51'),
	('IT','Information Technology & Network Support','admin','2015-10-25 20:55:06'),
	('Marketing','Marketing','admin','2015-10-25 20:55:25'),
	('Sales','Sales','admin','2015-10-25 20:55:17');

/*!40000 ALTER TABLE `m_division` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table m_division_hist
# ------------------------------------------------------------

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



# Dump of table m_likelihood
# ------------------------------------------------------------

DROP TABLE IF EXISTS `m_likelihood`;

CREATE TABLE `m_likelihood` (
  `l_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `l_key` varchar(100) DEFAULT NULL,
  `l_title` varchar(100) DEFAULT NULL,
  `l_desc` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`l_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `m_likelihood` WRITE;
/*!40000 ALTER TABLE `m_likelihood` DISABLE KEYS */;

INSERT INTO `m_likelihood` (`l_id`, `l_key`, `l_title`, `l_desc`)
VALUES
	(1,'VERY LOW','Sangat Rendah','0% - 10% kemungkinan resiko dapat terjadi dalam 1 tahun dalam setiap acara / kegiatan yang mengakibatkan resiko'),
	(2,'LOW','Rendah','10% - 30% kemungkinan resiko dapat terjadi dalam 1 tahun dalam setiap acara / kegiatan yang mengakibatkan resiko'),
	(3,'MEDIUM','Sedang','30% - 50% kemungkinan resiko dapat terjadi dalam 1 tahun dalam setiap acara / kegiatan yang mengakibatkan resiko'),
	(4,'HIGH','Tinggi','50% - 70% kemungkinan resiko dapat terjadi dalam 1 tahun dalam setiap acara / kegiatan yang mengakibatkan resiko'),
	(5,'VERY HIGH','Sangat Tinggi','70% - 100% kemungkinan resiko dapat terjadi dalam 1 tahun dalam setiap acara / kegiatan yang mengakibatkan resiko');

/*!40000 ALTER TABLE `m_likelihood` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table m_menu
# ------------------------------------------------------------

DROP TABLE IF EXISTS `m_menu`;

CREATE TABLE `m_menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(200) NOT NULL,
  `menu_module` varchar(200) NOT NULL,
  `menu_parent` int(11) NOT NULL,
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `menu_icon` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `m_menu` WRITE;
/*!40000 ALTER TABLE `m_menu` DISABLE KEYS */;

INSERT INTO `m_menu` (`menu_id`, `menu_name`, `menu_module`, `menu_parent`, `menu_order`, `menu_icon`)
VALUES
	(0,'','',0,0,NULL),
	(1,'Dashboard','main',0,0,'icon-home'),
	(5,'Division','user/division',39,3,NULL),
	(6,'Dashboard RAC','main/rac',0,1,'icon-home'),
	(7,'Periodic','',0,2,'icon-clock'),
	(8,'Adhoc','',0,3,'icon-hourglass'),
	(9,'Modify User','user/modify',0,4,'icon-users'),
	(10,'Housekeeping','',0,6,'icon-layers'),
	(11,'Help & Policy','pages/help',0,7,'icon-info'),
	(12,'Change Request','',0,5,'icon-book-open'),
	(13,'Risk Register','risk/RiskRegister',7,1,NULL),
	(14,'Risk Treatment','',7,2,NULL),
	(15,'Risk Action','',7,3,NULL),
	(16,'KRI','',7,4,NULL),
	(17,'Entry Periode','admin/periode',7,5,NULL),
	(18,'Risk Register','',8,1,NULL),
	(19,'Risk Treatment','',8,2,NULL),
	(20,'Risk Action','',8,3,NULL),
	(21,'KRI','',8,4,NULL),
	(23,'Home - User','main',0,100,'icon-home'),
	(24,'Transaction','',0,101,'icon-book-open'),
	(25,'Regular Exercise','',24,1,NULL),
	(26,'Risk Register Exercise','risk/RiskRegister',25,0,''),
	(27,'Q & A','main/qna',24,2,''),
	(28,'News','main/news',0,102,'icon-feed'),
	(29,'User Manual','pages/help',0,103,'icon-info'),
	(30,'Home - PIC','main/mainpic',0,100,'icon-home'),
	(32,'Settings','',0,300,'icon-settings'),
	(33,'Entry Regular Period','',32,0,NULL),
	(34,'Risk Register Exercise','admin/periode',33,0,NULL),
	(35,'Action Plan Execution','admin/periode/actplan',33,0,NULL),
	(36,'Entry Category','',32,0,NULL),
	(37,'User Access Settings','user/modify',32,0,NULL),
	(38,'Home - RAC','main/mainrac',0,100,'icon-home'),
	(39,'Administration','',0,400,'icon-settings'),
	(40,'User','user',39,1,''),
	(41,'Role','user/role',39,2,''),
	(42,'Reference','admin/reference',39,4,''),
	(43,'Manage News','admin/news',32,0,NULL);

/*!40000 ALTER TABLE `m_menu` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table m_periode
# ------------------------------------------------------------

DROP TABLE IF EXISTS `m_periode`;

CREATE TABLE `m_periode` (
  `periode_id` int(11) NOT NULL AUTO_INCREMENT,
  `periode_name` varchar(200) DEFAULT NULL,
  `periode_start` date DEFAULT NULL,
  `periode_end` date DEFAULT NULL,
  `created_by` varchar(200) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`periode_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `m_periode` WRITE;
/*!40000 ALTER TABLE `m_periode` DISABLE KEYS */;

INSERT INTO `m_periode` (`periode_id`, `periode_name`, `periode_start`, `periode_end`, `created_by`, `created_date`)
VALUES
	(1,'Periode September','2015-09-01','2015-09-30','admin','2015-10-31 16:57:47'),
	(2,'Period Oktober','2015-10-01','2015-10-31','admin','2015-10-31 22:23:20'),
	(6,'Periode November','2015-11-01','2015-11-30','admin','2015-11-01 05:28:07');

/*!40000 ALTER TABLE `m_periode` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table m_periode_hist
# ------------------------------------------------------------

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

LOCK TABLES `m_periode_hist` WRITE;
/*!40000 ALTER TABLE `m_periode_hist` DISABLE KEYS */;

INSERT INTO `m_periode_hist` (`periode_id`, `periode_name`, `periode_start`, `periode_end`, `created_by`, `created_date`, `update_status`, `update_by`, `update_date`)
VALUES
	(3,'wewes','2015-10-09','2015-11-20','admin','2015-10-31 12:48:16','D','admin','2015-10-31 12:49:26'),
	(2,'wewes','2015-10-09','2015-11-20','admin','2015-10-31 12:47:21','D','admin','2015-10-31 12:49:31'),
	(4,'Periode I','2015-10-01','2015-10-31','admin','2015-10-31 12:49:50','U','admin','2015-10-31 16:57:19'),
	(4,'Periode II','2015-10-01','2015-10-31','admin','2015-10-31 16:57:19','U','admin','2015-10-31 16:57:47'),
	(2,'Period Oktober','2015-10-01','2015-10-31','admin','2015-10-31 16:58:03','U','admin','2015-10-31 22:04:01'),
	(2,'Period Oktober','2015-10-01','2015-10-30','admin','2015-10-31 22:04:02','U','admin','2015-10-31 22:22:48'),
	(2,'Period Oktober','2020-10-31','2015-10-31','admin','2015-10-31 22:22:48','U','admin','2015-10-31 22:23:20');

/*!40000 ALTER TABLE `m_periode_hist` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table m_periode_plan
# ------------------------------------------------------------

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

LOCK TABLES `m_periode_plan` WRITE;
/*!40000 ALTER TABLE `m_periode_plan` DISABLE KEYS */;

INSERT INTO `m_periode_plan` (`periode_id`, `periode_name`, `periode_start`, `periode_end`, `created_by`, `created_date`)
VALUES
	(1,'Plan Periode I','2015-10-01','2015-10-31','admin','2015-10-31 13:02:13');

/*!40000 ALTER TABLE `m_periode_plan` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table m_periode_plan_hist
# ------------------------------------------------------------

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

LOCK TABLES `m_periode_plan_hist` WRITE;
/*!40000 ALTER TABLE `m_periode_plan_hist` DISABLE KEYS */;

INSERT INTO `m_periode_plan_hist` (`periode_id`, `periode_name`, `periode_start`, `periode_end`, `created_by`, `created_date`, `update_status`, `update_by`, `update_date`)
VALUES
	(1,'Plan Periode s','2015-10-01','2015-10-31','admin','2015-10-31 13:01:48','U','admin','2015-10-31 13:02:13');

/*!40000 ALTER TABLE `m_periode_plan_hist` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table m_reference
# ------------------------------------------------------------

DROP TABLE IF EXISTS `m_reference`;

CREATE TABLE `m_reference` (
  `ref_context` varchar(100) NOT NULL DEFAULT '',
  `ref_key` varchar(100) NOT NULL DEFAULT '',
  `ref_value` varchar(200) DEFAULT NULL,
  `created_by` varchar(200) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`ref_context`,`ref_key`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `m_reference` WRITE;
/*!40000 ALTER TABLE `m_reference` DISABLE KEYS */;

INSERT INTO `m_reference` (`ref_context`, `ref_key`, `ref_value`, `created_by`, `created_date`)
VALUES
	('impact.display','CATASTROPHIC','Berbahaya',NULL,NULL),
	('impact.display','INSIGNIFICANT','Tidak Signifikan',NULL,NULL),
	('impact.display','MAJOR','Mayor',NULL,NULL),
	('impact.display','MINOR','Minor',NULL,NULL),
	('impact.display','MODERATE','Sedang',NULL,NULL),
	('impact.display','NA','N/A',NULL,NULL),
	('risk.status.user','0','Draft','admin','2015-11-05 05:59:53'),
	('risk.status.user','1','Confirm',NULL,NULL),
	('risk.status.user','2','Submited to RAC',NULL,NULL),
	('risk.status.user','3','Verified by RAC',NULL,NULL),
	('risk.status.user','4','on Risk Treatment Process',NULL,NULL),
	('risk.status.user','5','on Action Plan Process',NULL,NULL),
	('risk.status.user','6','Action Plan Has Been Executed and Verified',NULL,NULL),
	('risklevel.display','HIGH','Tinggi',NULL,NULL),
	('risklevel.display','LOW','Rendah',NULL,NULL),
	('risklevel.display','MODERATE','Sedang',NULL,NULL),
	('treatment.status','ACCEPT','Accept',NULL,NULL),
	('treatment.status','MITIGATE','Mitigate',NULL,NULL),
	('treatment.status','TRANSFER','Transfer',NULL,NULL);

/*!40000 ALTER TABLE `m_reference` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table m_risk_category
# ------------------------------------------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `m_risk_category` WRITE;
/*!40000 ALTER TABLE `m_risk_category` DISABLE KEYS */;

INSERT INTO `m_risk_category` (`cat_id`, `cat_code`, `cat_name`, `cat_desc`, `cat_parent`, `created_by`, `created_date`)
VALUES
	(1,'A','Risiko-risiko Strategis','Risiko yang dihasilkan dari ketidak-akuratan penetapan dan pelaksanaan strategi bisnis PII, ketidak-tepatan keputusan bisnis, atau ketidak-tanggapan terhadap perubahan-perubahan eksternal.',0,NULL,NULL),
	(2,'B','Risiko Finansial','Kategori ini mengklasifikasikan risiko yang pada umumnya terjadi karena ketidak-mampuan PII untuk mencapai target penerimaannya, kerugian dari penempatan dana investasi, dan ketidak-mampuan PII untuk memperoleh pendanaan / pembiayaan  baru, baik dari para kreditor maupun dari para pemegang saham.',0,NULL,NULL),
	(3,'C','Risiko Operasional','Kategori risiko ini pada umumnya muncul dari pelaksanaan fungsi bisnis PII. Karena hal ini merupakan sebuah konsep yang sangat luas yang berfokus pada risiko-risiko yang timbul dari orang, sistem dan proses dimana perusahaan beroperasi (termasuk dari kegiatan penyediaan penjaminan sebagai bisnis utama PII).',0,NULL,NULL),
	(4,'A.1','Kelas Risiko Perencanaan dan Strategi','Risiko yang dihasilkan dari lemahnya konteks strategi dan isu perencanaan dari PII yang mungkin berdampak kepada nilai-nilai strategis PII dan performa sebagai sebuah organisasi.',1,NULL,NULL),
	(5,'B.1','Kelas Risiko Pasar (contoh. tingkat bunga, mata uang)','Kelas ini menyatukan risiko yang dihasilkan dari pergerakan faktor-faktor pasar yang merugikan yang mencakup tingkat bunga dan pertukaran mata uang asing dan harga ekuitas.',2,NULL,NULL),
	(6,'B.2','Kelas Risiko Likuiditas dan Kredit','Risiko-risiko finansial dalam kelas ini berhubungan dengan isu-isu likuiditas dan kelayakan kredit yang berhubungan dengan aset-aset dan pendapatan PII.',2,NULL,NULL),
	(7,'C.1','Kelas Risiko Operasional Umum','Risiko operasional umum biasanya berhubungan dengan ketidak-mampuan PII untuk mengoperasikan fungsi-fungsi bisnisnys secara efisien, yang menyebabkan kerugian operasional dari kegiatan-kegiatan diluar penyediaan penjaminan.',3,NULL,NULL),
	(8,'C.2','Kelas Risiko Penyediaan Penjaminan','Kelompok risiko ini mengklasifikasikan risiko-risiko operasional yang berhubungan dengan peran PII sebagai Badan Usaha Penjaminan Infrastruktur atau BUPI.',3,NULL,NULL),
	(9,'C.3','Kelas Risiko Hukum dan Kepatuhan','Kelompok risiko ini berhubungan dengan yang tidak patuh kepada PII sebagai sebuah organisasi terhadap hukum atau standar regulasi yang dapat berdampak terhadap nilai-nilai strategis PII dan kinerjanya sebagai sebuah organisasi.',3,NULL,NULL),
	(10,'A.1.1','Risiko Perencanaan Strategis/Strategic planning risk','Sebuah proses perencanaan strategis yang tidak dapat diimajinasikan dan rumit dapat mengakibatkan informasi yang tidak relevan yang mengancam kapasitas PII dalam merumuskan rencana bisnis yang berkelanjutan atau menghasilkan sasaran dan tujuan yang tidak sesuai.',4,NULL,NULL),
	(11,'A.1.2','Risiko Anggaran/Budget Risk','Tidak ada, tidak nyata, tidak relevan atau tidak dapat diandalkannya  informasi anggaran dan perencanaan dapat menyebabkan kesimpulan dan keputusan keuangan yang tidak tepat oleh manajemen PII.',4,NULL,NULL),
	(12,'A.1.3','Risiko Lingkungan Bisnis/Business environment risk','Kegagalan untuk mengawasi lingkungan eksternal atau formulasi dari asumsi yang tidak nyata/realistis atau salah mengenai risiko-risiko lingkungan bisnis dapat menyebabkan keputusan strategis yang tidak tepat oleh manajemen PII.',4,NULL,NULL),
	(13,'A.1.4','Risiko Model Bisnis/Business model risk','Risiko yang timbul akibat memiliki model bisnis yang usang dan PII tidak menyadarinya dan/atau kekurangan informasi yang diperlukan untuk membuat penilaian terbaru dan membangun suatu kemasan bisnis yang menarik untuk memodifikasi model tersebut pada waktunya.',4,NULL,NULL),
	(14,'A.1.5','Risiko Pengukuran/Measurement risk','Pengukuran performa dan financial yang tidak ada, tidak relevan atau tidak dapat diandalkan yang mungkin dapat mengancam kemampuan PII untuk melaksanakan strategi-strategi dan operasinya dan dapat mengakibatkan kegiatan yang saling bertentangan dan tidak terkoordinir di seluruh PII.',4,NULL,NULL),
	(15,'A.1.6','Risiko Struktur Organisasi/Organizational structure risk','Risiko yang dihasilkan dari struktur organisasi PII yang tidak efektif, yang mengancam kapasitasnya dalam mencapai tujuan jangka panjangnya',4,NULL,NULL),
	(16,'A.1.7','Risiko Sumber Daya Manusia/Human resource risk','Perencanaan/pengelolaan kinerja sumber daya manusia yang tidak mencukupi atau gagal dapat mencegah PII dalam mencapai visi dan misi strategisnya.',4,NULL,NULL),
	(17,'A.1.8','Risiko Manajemen dan Kepemimpinan/Leadership and management risk','Kekurangan/ketidak-cukupan keterampilan kepemimpinan dan manajemen dari manajemen senior PII yang dapat menghalangi perusahaan dalam menjalankan visi dan misi strategisnya',4,NULL,NULL),
	(18,'A.1.9','Risiko Tata Kelola Perusahaan/Corporate governance risk','Risiko yang datang dari potensi struktur tata kelola yang tidak tepat (termasuk delegasi kewenangan) antara para direktur, manajemen senior, dan staf, yang mengarah kepada pengambilan keputusan yang tidak tepat.',4,NULL,NULL),
	(19,'A.1.10','Risiko Informasi bagi Pengambilan Keputusan/Information for decision-making risk','Informasi yang tidak relevan atau tidak dapat diandalkan atau berkualitas rendah yang digunakan untuk mendukung pelaksanaan model bisnis PII, pelaporan internal dan eksternal atas kinerja dan evaluasi berkelanjutan terhadap keefektifan bisnis PII.',4,NULL,NULL),
	(20,'A.1.11','Risiko Informasi Keuangan/Accounting information risk','Penekanan yang terlalu berlebihan atas informasi akuntansi keuangan dalam mengelola bisnis dapat mengakibatkan manipulasi hasil/keluaran untuk mencapai target finansial dengan mengorbankan kepuasan pelanggan, kualitas dan efisiensi.',4,NULL,NULL),
	(21,'A.1.12','Risiko Manfaat yang Dirasakan/Perceived benefit risk','Manfaat hasil kerja dari PII dapat dirasakan secara berbeda oleh pelanggan disebabkan karena proses bisnis yang tidak efisien dan tidak fleksibel yang dapat mengarah pada ketidakberlangsungan permintaan bisnis.',4,NULL,NULL),
	(22,'A.1.13','Risiko Pemegang Saham/Shareholder risk','Pengharapan yang tidak realistis atau kesalahpahaman dari para pemegang saham dapat memberikan beban tambahan terhadap pencapaian visi dan misi korporat oleh manajemen PII. Risiko ini juga dapat dipicu oleh ketidak-efektifan dalam mengkomunikasikan struktur tata kelola, rencana strategis, kegiatan operasional, dan kinerja korporasi kepada para pemegang saham.',4,NULL,NULL),
	(23,'A.1.14','Risiko Stakeholder/Stakeholder risk','Para stakeholder yang tidak kompeten atau tidak cakap atau kurang-informasi dapat menghalangi PII dalam melaksanakan peran strategisnya sebagaimana diharapkan. Hal ini juga disebabkan oleh tantangan yang dihadapi oleh PII dalam menghadapi lingkungan birokratis dan dapat juga dipicu oleh ketidakefektifan dalam mengkomunikasikan informasi yang relevan kepada para stakeholder terkait.',4,NULL,NULL),
	(24,'A.1.15','Risiko Reputasi/Reputational risk','Risiko yang dihasilkan dari publikasi negatif sehubungan kegiatan bisnis PII atau persepsi negatif terhadap PII. Risiko ini berhubungan dengan kepercayaan terhadap binis dan mungkin dipicu oleh faktor internal atau eksternal. Rusaknya reputasi PII dapat mengakibatkan kehilangan pendapatan atau penghancuran nilai pemegang saham, bahkan jika PII tidak terbukti bersalah atas suatu kejahatan atau berada dalam situasi yang buruk.',4,NULL,NULL),
	(25,'B.1.1','Risiko Tingkat Bunga/Interest rate risk','Risiko yang memiliki tingkat variabilitas dalam nilai yang terdapat pada asset berbunga (contoh. pinjaman atau obligasi) yang berdampak pada kinerja keuangan PII (contoh: investasi obligasi bernilai rendah, meningkatnya hutang), yang disebabkan oleh variabilitas tingkat bunga.',5,NULL,NULL),
	(26,'B.1.2','Risiko Mata Uang/Currency risk','Risiko harga nilai tukar mata uang asing dan/atau volatilitas yang tersirat akan berubah, yang dapat mempengaruhi nilai asset milik PII yang mengunakan mata uang tersebut.',5,NULL,NULL),
	(27,'B.1.3','Risiko Ekuitas/Equity risk','Risiko dimana investasi PII akan terdepresiasi karena dinamika pasar saham yang menyebabkan seseorang kehilangan uangnya.\rB.1.4	Risiko Kesulitan Keuangan/Financial distress risk	Risiko yang disebabkan oleh runtuhnya seluruh sistem keuangan atau seluruh pasar (contoh. resiko sistemik) yang dapat memberikan dampak catastrophic bagi PII.',5,NULL,NULL),
	(28,'B.1.4','Risiko Kesulitan Keuangan/Financial distress risk','Risiko yang disebabkan oleh runtuhnya seluruh sistem keuangan atau seluruh pasar (contoh. resiko sistemik) yang dapat memberikan dampak catastrophic bagi PII.',5,NULL,NULL),
	(29,'B.1.5','Risiko Komoditas/Commodity risk','Risiko dari penurunan nilai pemasukan atau asset PII yang disebabkan oleh volatilitas biaya dan volume komoditas (contoh: batu bara)\rB.1.6	Risiko Premi Asuransi/Insurance premium risk	Risiko dari resiko-resiko PII manapun yang dapat diasuransikan pada tanggal penandatanganan asuransi yang disetujui namun kemudian menjadi tidak dapat diasuransikan atau menghadapi kenaikan harga yang tinggi pada rate di mana premi asuransi tersebut dihitung.',5,NULL,NULL),
	(30,'B.1.6','Risiko Premi Asuransi/Insurance premium risk','Risiko dari resiko-resiko PII manapun yang dapat diasuransikan pada tanggal penandatanganan asuransi yang disetujui namun kemudian menjadi tidak dapat diasuransikan atau menghadapi kenaikan harga yang tinggi pada rate di mana premi asuransi tersebut dihitung.',5,NULL,NULL),
	(31,'B.2.1','Risiko Kecukupan Modal/Capital adequacy risk','Risiko PII mungkin tidak memiliki cadangan modal untuk mengoperasikan bisnisnya atau untuk menyerap kerugian-kerugian tidak terduga yang muncul dari klaim penjaminan, risiko-risiko investasi dan operasional.',6,NULL,NULL),
	(32,'B.2.2','Risiko Pencadangan Modal/Capital provisioning risk','Risiko ini dipicu oleh pengaturan cadangan modal yang tidak tepat (contoh. kekurangan cadangan atau kelebihan cadangan) yang dapat berdampak pada ketidak-efisiensian dalam kinerja keuangan dan operasional PII.',6,NULL,NULL),
	(33,'B.2.3','Risiko Konsentrasi/Concentration risk','Distribusi yang tidak merata dari exposure jaminan PII dan/atau portofolio investasi yang dapat meningkatkan potensi kerugian atau kemungkinan default dari portofolio.',6,NULL,NULL),
	(34,'B.2.4','Risiko Penetapan Harga/Pricing risk','Risiko yang berakar pada penetapan harga yang terlalu rendah atau terlalu tinggi atas penjaminan yang disebabkan oleh kerangka kerja penetapan harga yang tidak tepat atau tidak akurat, yang dapat berdampak pada kinerja pendapatan PII.',6,NULL,NULL),
	(35,'B.2.5','Risiko Likuiditas/Liquidity risk','Risiko yang mungkin muncul di mana PII tidak dapat memenuhi kewajibannya disebabkan oleh ketidak-mampuan PII untuk memenuhi likuiditas yang diperlukan di dalam suatu jangka waktu tertentu (contoh. resiko likuiditas arus uang), atau ketidak-mampuan PII untuk melikuidasi instrument keuangan yang diperlukan tanpa mengalami kerugian keuangan yang tidak normal pada sebuah transaksi (contoh. resiko likuiditas pasar).',6,NULL,NULL),
	(36,'B.2.6','Risiko Kredit Investasi/Investment?s Credit Risk','Risiko kerugian investasi PII yang disebabkan oleh kegagalan penerbit obligasi untuk membayar kewajibannya (contoh. kupon bunga dan/atau bunga utama) atau kegagalan bank untuk memenuhi kewajibannya atas deposito (contoh. bunga dan bunga utama) yang disebabkan default, masalah likuiditas atau kebangkrutan.',6,NULL,NULL),
	(37,'C.1.1','Risiko Personil Utama/Key personnel risk','Risiko ini berasal dari kegagalan key management untuk menjalankan tugas resmi mereka sebagai akibat dari berbagai alasan, seperti gesekan yang tinggi, sakit yang terlalu lama, etc.',7,NULL,NULL),
	(38,'C.1.2','Risiko Fraud Internal/Internal fraud risk','Risiko ini dapat berasal dari penyalahgunaan aset, penghindaran pajak, salah penempatan jabatan yang disengaja, penyuapan, etc.',7,NULL,NULL),
	(39,'C.1.3','Risiko Fraud Eksternal/External fraud risk','Risiko ini berasal dari pencurian informasi, kerusakan peretasan, pencurian pihak ketiga, pemalsuan, etc.',7,NULL,NULL),
	(40,'C.1.4','Risiko Praktek Ketenagakerjaan/Employment practices risk','Risiko ini berasal dari kegagalan PII sebagai perusahaan yang memberikan kesempatan yang sama dalam mencegah diskriminasi jenis kelamin, ras, warna kulit, dll.',7,NULL,NULL),
	(41,'C.1.5','Risiko Kerusakan Aset Fisik/Damage to physical assets risk','Risiko ini berhubungan dengan kerusakan aset fisik yang disebabkan oleh bencana alam, terorisme, perusakan, dll.',7,NULL,NULL),
	(42,'C.1.6','Risiko Gangguan Bisnis/Business disruptions risk','Risiko ini berhubungan dengan gangguan dalam kegiatan bisnis sebagai akibat dari gangguan utilitas, kegagalan perangkat lunak, dan perangkat keras.',7,NULL,NULL),
	(43,'C.1.7','Risiko Pelaksanaan dan Proses/Delivery and process risk','Risiko yang dihasilkan dari kegagalan atau pelanggaran dalam prosedur internal, orang-orang dan sistem yang mungkin berhubungan dengan kesalahan karena kelalaian (contoh. kesalahan pemasukan data, kesalahan akunting,  kegagalan memberikan laporan yang diwajibkan / diperintahkan, kerugian asset karena kelalaian, dll) menyebabkan kegagalan atau kerugian operasional bagi PII sebagai sebuah perusahaan.',7,NULL,NULL),
	(44,'C.1.8','Risiko Keselamatan di Tempat Kerja/Workplace safety risk','Risiko ini berhubungan dengan kegagalan PII dalam memberikan lingkungan kerja yang aman dan kondusif yang dapat menyebabkan kegagalan atau kerugian operasional bagi PII sebagai sebuah perusahaan.',7,NULL,NULL),
	(45,'C.1.9','Risiko Pengadaan Pihak Ketiga/Procurement of 3rd party risk','Risiko ini berhubungan dengan kegagalan untuk mempertahankan kredibilitas dan daya saing dari proses pengadaan  pemasok/konsulan pihak ketiga yang disebabkan oleh kurangnya pemahaman akan persyaratan layanan, kondisi pasar dan metode/dokumentasi pengadaan yang relevan.',7,NULL,NULL),
	(46,'C.2.1','Risiko Klaim Penjaminan (diluar kendali CA)/Guarantee claim risk (beyond CA control)','Terjadinya klaim jaminan yang terduga maupun tidak terduga yang dipicu oleh lingkup dan tingkat risiko bawaan dari masing-masing proyek yang dijamin yang dapat berdampak goncangan besar terhadap posisi modal dan kinerja operasional PII.',8,NULL,NULL),
	(47,'C.2.2','Risiko Kelebihan Biaya atau Waktu/Cost or time overruns risk','Risiko proyek memerlukan waktu lebih lama untuk diselesaikan atau diimplementasikan, atau menghabiskan dana lebih banyak dari yang telah diantisipasi yang dapat mengakibatkan rusaknya reputasi PII (atau pemerintah).',8,NULL,NULL),
	(48,'C.2.3','Risiko Proyek Pipeline/Project pipeline risk','Risiko tidak tercapainya kinerja operasional PII karena faktor eksternal/ketidakpastian yang tinggi dari proyek pipeline yang dipengaruhi oleh in (action) PJPK dan lembaga Pemerintahan.',8,NULL,NULL),
	(49,'C.2.4','Risiko Pre-Appraisal (termasuk TGA)/Pre-appraisal risk (including TGA)','Risiko sumber daya yang dialokasikan PII untuk mempersiapkan proyek yang mengajukan untuk dijamin oleh PII tidak memberikan hasil seperti yang diharapkan (contoh. GAP tidak siap untuk diserahkan), yang disebabkan oleh in (action)  PJPK dan lembaga Pemerintahan.',8,NULL,NULL),
	(50,'C.2.5','Risiko Evaluasi Penjaminan/Guarantee appraisal risk','Risiko hasil evaluasi penjaminan menyatakan bahwa proyek gagal untuk memenuhi kriteria evaluasi, sedangkan alokasi sumber daya PII telah dilakukan.',8,NULL,NULL),
	(51,'C.2.6','Risiko Kesalahan Pembayaran Klaim/False claim payment risk','Pembayaran klaim yang didasarkan pada dokumentasi klaim yang terbukti salah atau pada proses penafsiran klaim yang tidak dapat diandalkan dapat berdampak pada kegagalan mekanisme recourse dan kerugian besar pada modal PII.',8,NULL,NULL),
	(52,'C.2.7','Risiko Mekanisme Recourse/Recourse mechanism risk','Mekanisme recourse yang gagal atau yang tidak dapat diandalkan atas jaminan yang diberikan oleh PII sebagai jalur pemulihan pembayaran klaim yang dilakukan terhadap penerima jaminan.',8,NULL,NULL),
	(53,'C.2.8','Kemitraan Kredit/Credit counterparty','Risiko dari kemitraan tidak akan memenuhi kewajiban sesuai kontrak. Kemitraan harus dipertimbangkan pada saat meleakukan evaluasi kontrak.',8,NULL,NULL),
	(54,'C.2.9','Transaksi Proyek Gagal/Failed project transaction','Risiko dari kegagalan proyek untuk mencapai Financial Close/ mencapai implementasi yang disebabkan oleh kurangnya/tidak adanya ketertarikan dari (pemodal) selera pasar terhadap proyek tersebut.',8,NULL,NULL),
	(55,'C.3.1','Risiko Kepatuhan/Compliance risk','Risiko yang dihasilkan dari pelanggaran atau ketidak-patuhan terhadap regulasi internal dan eksternal termasuk standar regulasi (contoh. standar akunting) yang dapat berdampak terhadap nilai-nilai strategis PII dan kinerjanya sebagai sebuah organisasi.',9,NULL,NULL),
	(56,'C.3.2','Risiko Regulasi/Regulatory risk','Risiko akibatnya kurangnya kualitas hukum dan regulasi yang ada, termasuk lemahnya penerapan hukum dan regulasi yang ada oleh pemerintah atau  pihak regulator lainnya, dan perubahan hukum dan regulasi yang dapat berdampak material terhadap kegiatan operasional PII.',9,NULL,NULL),
	(57,'C.3.3','Risiko Hukum/Legal risk','Risiko yang dihasilkan dari aspek yuridis yang lemah yang dapat diakibatkan oleh klaim hukum, tidak adanya regulasi legislatif pendukung, atau perjanjian yang kurang baik, seperti, persyaratan kontrak yang tidak lengkap. Risiko ini juga muncul ketika kemitraan tidak dapat berkontrak secara hukum akibat tindakan hukum atau ketidakpastian dalam penerapan atau interpretasi kontrak, hukum dan regulasi.',9,NULL,NULL),
	(58,'C.3.4','Risiko Kode Etik/Code of Conducts risk','Risiko ini dipicu oleh praktek atau kegiatan bisnis illegal atau bisnis yang tidak pantas dilakukan oleh PII atau karyawannya.',9,NULL,NULL);

/*!40000 ALTER TABLE `m_risk_category` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table m_risk_control
# ------------------------------------------------------------

DROP TABLE IF EXISTS `m_risk_control`;

CREATE TABLE `m_risk_control` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `control_desc` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table m_risk_impact
# ------------------------------------------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `m_risk_impact` WRITE;
/*!40000 ALTER TABLE `m_risk_impact` DISABLE KEYS */;

INSERT INTO `m_risk_impact` (`impact_id`, `impact_category`, `lvl_1_value`, `lvl_1_desc`, `lvl_2_value`, `lvl_2_desc`, `lvl_3_value`, `lvl_3_desc`, `lvl_4_value`, `lvl_4_desc`, `lvl_5_value`, `lvl_5_desc`)
VALUES
	(1,'Kerugian Finansial - Operasi*','INSIGNIFICANT','< Rp 2,5juta','MINOR','Rp 2 juta - 50 juta','MODERATE','Rp 50 juta - 100 juta','MAJOR','Rp 100 juta - 10 miliar','CATASTROPHIC','> Rp 10 miliar'),
	(2,'Kerugian Finansial - Investasi, Jaminan','INSIGNIFICANT','< Rp 2 miliar','MINOR','Rp 2 miliar - 9 miliar','MODERATE','Rp 9 miliar - 14 miliar','MAJOR','Rp 14 miliar - 20 miliar','CATASTROPHIC','> Rp 20 miliar'),
	(3,'Rasio Modal terhadap Paparan jaminan','INSIGNIFICANT','> 1.5','MINOR','1.0 - 1.5','MODERATE','0.8 - 1.0','MAJOR','0.5 - 0.8','CATASTROPHIC','0.5'),
	(4,'Likuiditas','INSIGNIFICANT','> 1.5 tahun biaya operasioal','MINOR','1 - 1.5 tahun biaya operasioal','MODERATE','6 bulan - 1 tahun biaya operasioal','MAJOR','6 - 3 bulan biaya operasioal','CATASTROPHIC','< 3 bulan tahun biaya operasioal'),
	(5,'Reputasi','INSIGNIFICANT','Persepsi negatif dalam lingkungan internal dan tidak berhubungan dengan integritas','MINOR','Paparan negatif dalam cakupan wilayah dan tidak berhubungan dengan integritas','MODERATE','Paparan negatif dalam cakupan nasional dan tidak berhubungan dengan integritas','MAJOR','Paparan negatif dalam cakupan nasional dan terkait dengan integritas','CATASTROPHIC','Paparan negatif dalam cakupan nasional dan terkait dengan integritas diikuti dengan tindakan hukum'),
	(6,'Kepatuhan','INSIGNIFICANT','Pelanggaran Peraturan yang dapat dikoreksi langsung','MINOR','Pelanggaran peraturan yang dikenakan surat peringatan','MODERATE','Pelanggaran peraturan yang dikenakan denda atau hukuman','MAJOR','Pelanggaran peraturan yang dapat mengakibatkan hukuman penjara','CATASTROPHIC','Pencabutan izin usaha'),
	(7,'Kesehatan, keselamatan dan lingkungan','INSIGNIFICANT','Menyebabkan cedera minor yang membutuhkan pertolongan pertama','MINOR','Menyebabkan cedera yang membutuhkan perawatan medis intensif','MODERATE','Menyebabkan cedera tubuh dan/atau cacat permanen','MAJOR','Menyebabkan kematian','CATASTROPHIC','Menyebabkan kematian lebih dari 1 orang');

/*!40000 ALTER TABLE `m_risk_impact` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table m_risklevel_matrix
# ------------------------------------------------------------

DROP TABLE IF EXISTS `m_risklevel_matrix`;

CREATE TABLE `m_risklevel_matrix` (
  `impact_value` varchar(100) NOT NULL DEFAULT '',
  `likelihood_key` varchar(100) NOT NULL DEFAULT '',
  `risk_level` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`impact_value`,`likelihood_key`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `m_risklevel_matrix` WRITE;
/*!40000 ALTER TABLE `m_risklevel_matrix` DISABLE KEYS */;

INSERT INTO `m_risklevel_matrix` (`impact_value`, `likelihood_key`, `risk_level`)
VALUES
	('CATASTROPHIC','HIGH','HIGH'),
	('CATASTROPHIC','LOW','MODERATE'),
	('CATASTROPHIC','MEDIUM','HIGH'),
	('CATASTROPHIC','VERY HIGH','HIGH'),
	('CATASTROPHIC','VERY LOW','MODERATE'),
	('INSIGNIFICANT','HIGH','MODERATE'),
	('INSIGNIFICANT','LOW','LOW'),
	('INSIGNIFICANT','MEDIUM','LOW'),
	('INSIGNIFICANT','VERY HIGH','MODERATE'),
	('INSIGNIFICANT','VERY LOW','LOW'),
	('MAJOR','HIGH','HIGH'),
	('MAJOR','LOW','MODERATE'),
	('MAJOR','MEDIUM','HIGH'),
	('MAJOR','VERY HIGH','HIGH'),
	('MAJOR','VERY LOW','LOW'),
	('MINOR','HIGH','MODERATE'),
	('MINOR','LOW','LOW'),
	('MINOR','MEDIUM','MODERATE'),
	('MINOR','VERY HIGH','HIGH'),
	('MINOR','VERY LOW','LOW'),
	('MODERATE','HIGH','HIGH'),
	('MODERATE','LOW','MODERATE'),
	('MODERATE','MEDIUM','MODERATE'),
	('MODERATE','VERY HIGH','HIGH'),
	('MODERATE','VERY LOW','LOW');

/*!40000 ALTER TABLE `m_risklevel_matrix` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table m_role
# ------------------------------------------------------------

DROP TABLE IF EXISTS `m_role`;

CREATE TABLE `m_role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(200) NOT NULL,
  `created_by` varchar(200) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `m_role` WRITE;
/*!40000 ALTER TABLE `m_role` DISABLE KEYS */;

INSERT INTO `m_role` (`role_id`, `role_name`, `created_by`, `created_date`)
VALUES
	(1,'Administrator',NULL,NULL),
	(2,'RAC Team',NULL,NULL),
	(3,'User',NULL,NULL),
	(4,'Division Head','admin','2015-10-25 13:35:03'),
	(5,'PIC','admin','2015-10-29 03:28:10');

/*!40000 ALTER TABLE `m_role` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table m_role_hist
# ------------------------------------------------------------

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



# Dump of table m_role_menu
# ------------------------------------------------------------

DROP TABLE IF EXISTS `m_role_menu`;

CREATE TABLE `m_role_menu` (
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  KEY `m_role` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `m_role_menu` WRITE;
/*!40000 ALTER TABLE `m_role_menu` DISABLE KEYS */;

INSERT INTO `m_role_menu` (`role_id`, `menu_id`)
VALUES
	(4,24),
	(4,26),
	(4,25),
	(4,27),
	(4,30),
	(4,28),
	(4,29),
	(5,30),
	(5,26),
	(5,25),
	(5,27),
	(5,24),
	(5,28),
	(5,29),
	(3,23),
	(3,24),
	(3,26),
	(3,25),
	(3,27),
	(3,28),
	(3,29),
	(2,38),
	(2,34),
	(2,35),
	(2,33),
	(2,36),
	(2,37),
	(2,32),
	(2,43);

/*!40000 ALTER TABLE `m_role_menu` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table m_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `m_user`;

CREATE TABLE `m_user` (
  `username` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL,
  `display_name` varchar(200) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `division_id` varchar(100) DEFAULT NULL,
  `created_by` varchar(200) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `m_user` WRITE;
/*!40000 ALTER TABLE `m_user` DISABLE KEYS */;

INSERT INTO `m_user` (`username`, `password`, `display_name`, `role_id`, `division_id`, `created_by`, `created_date`)
VALUES
	('admin','$2y$10$l.mQPD1fGe4QrkSIXnZv7ueyD.nReClhW43DEho3rSn0kKsKuVNau','Administrator',1,'No Division',NULL,NULL),
	('head_hr','$2y$10$bQbrcvMWSDVr25gyD/8sQ.YuPCcVO14QTlFJYpHTPKYXydV6R58H2','Head of HR',4,'Human Resource','admin','2015-10-25 23:23:46'),
	('head_it','$2y$10$fiPd.I.KgpmFt6RNqUD1TuUuHow.MuQHReruRCQ380Ol1EF9enREe','Head Of IT',4,'IT','admin','2015-10-29 03:22:22'),
	('pic_it','$2y$10$RLzKKF47fA2tlOPxyYiXauKlGowFDjRRa7cAjJxjw6CsSNmfHLD9u','PIC for IT Division',5,'IT','admin','2015-11-05 05:57:42'),
	('user_hr','$2y$10$FnnVpf0xLpkaNpYSEUJlIOxgR1LOKSTJJP.kHZ7NXIjjIHvFaATLC','Normal User HR',3,'Human Resource','admin','2015-10-26 00:18:37'),
	('user_it','$2y$10$X5oANBRP5E50SYK3cauRoO1Za.5woI0ukcnMyhIJX9h38I97kV1AO','Normal User IT',3,'IT','admin','2015-10-26 02:01:22'),
	('user_rac','$2y$10$CtjsRxnPpHwqG2.ZPSTZjuMzD7dovVMwSmDWjT77BwXAOXvkGIiua','User Admin RAC',2,'Human Resource','admin','2015-11-02 16:19:25');

/*!40000 ALTER TABLE `m_user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table m_user_hist
# ------------------------------------------------------------

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

LOCK TABLES `m_user_hist` WRITE;
/*!40000 ALTER TABLE `m_user_hist` DISABLE KEYS */;

INSERT INTO `m_user_hist` (`username`, `password`, `display_name`, `role_id`, `division_id`, `created_by`, `created_date`, `update_status`, `update_by`, `update_date`)
VALUES
	('user','$2y$10$.9B4U9hLSsjtbrSLZCdcd.u7At8H8pVpTMU8J30uYGY7AW3Q7jL4G','Normal User HR',2,'Human Resource','admin','2015-10-25 21:20:39','D','admin','2015-10-25 21:22:56'),
	('user_it','$2y$10$HjL5.gWyqq1Vx85VCaGIy.Z7O5Mf5m2x3vf1YxEcD5pqRf3RylN1a','Normal User IT',2,'IT','admin','2015-10-25 21:21:43','U','admin','2015-10-25 23:24:39'),
	('user_it','$2y$10$HjL5.gWyqq1Vx85VCaGIy.Z7O5Mf5m2x3vf1YxEcD5pqRf3RylN1a','Normal User IT',2,'IT','admin','2015-10-25 21:21:43','U','admin','2015-10-25 23:26:37'),
	('user_it','$2y$10$HjL5.gWyqq1Vx85VCaGIy.Z7O5Mf5m2x3vf1YxEcD5pqRf3RylN1a','Normal User IT',2,'IT','admin','2015-10-25 21:21:43','U','admin','2015-10-25 23:29:19'),
	('user_it','$2y$10$HjL5.gWyqq1Vx85VCaGIy.Z7O5Mf5m2x3vf1YxEcD5pqRf3RylN1a','Normal User IT',2,'IT','admin','2015-10-25 21:21:43','U','admin','2015-10-25 23:29:52'),
	('user_it','$2y$10$HjL5.gWyqq1Vx85VCaGIy.Z7O5Mf5m2x3vf1YxEcD5pqRf3RylN1a','Normal User IT',2,'IT','admin','2015-10-25 21:21:43','U','admin','2015-10-25 23:30:53'),
	('user_it','$2y$10$HjL5.gWyqq1Vx85VCaGIy.Z7O5Mf5m2x3vf1YxEcD5pqRf3RylN1a','Normal User IT',2,'IT','admin','2015-10-25 21:21:43','U','admin','2015-10-25 23:34:08'),
	('user_it','$2y$10$HjL5.gWyqq1Vx85VCaGIy.Z7O5Mf5m2x3vf1YxEcD5pqRf3RylN1a','Normal User IT',2,'IT','admin','2015-10-25 21:21:43','U','admin','2015-10-25 23:59:09'),
	('user_it','$2y$10$HjL5.gWyqq1Vx85VCaGIy.Z7O5Mf5m2x3vf1YxEcD5pqRf3RylN1a','Normal User IT',2,'IT','admin','2015-10-25 21:21:43','U','admin','2015-10-26 00:01:35'),
	('user_it','$2y$10$HjL5.gWyqq1Vx85VCaGIy.Z7O5Mf5m2x3vf1YxEcD5pqRf3RylN1a','Normal User IT',2,'IT','admin','2015-10-25 21:21:43','U','admin','2015-10-26 00:03:21'),
	('user_hr','$2y$10$uQKKkihs0QLze3YbSZymrOPybXfeDwac.Mw5dl0kfL8LnIWV8CZpu','Normal User HR',2,'Human Resource','admin','2015-10-25 21:23:17','U','admin','2015-10-26 00:11:19'),
	('admin','$2y$10$l.mQPD1fGe4QrkSIXnZv7ueyD.nReClhW43DEho3rSn0kKsKuVNau','admin',1,'No Division',NULL,NULL,'D','user_hr','2015-10-26 00:15:39'),
	('user_hr','$2y$10$mKBEGCEDJY.SBPCZCa7oeOWUmzgcHjxdg85Bqb4FILytpWLnnv7Ii','Normal User HR',1,'Human Resource','admin','2015-10-26 00:11:19','U','admin','2015-10-26 00:17:48'),
	('user_it','$2y$10$HjL5.gWyqq1Vx85VCaGIy.Z7O5Mf5m2x3vf1YxEcD5pqRf3RylN1a','Normal User IT',1,'Human Resource','admin','2015-10-26 00:03:21','U','admin','2015-10-26 00:17:58'),
	('user_hr','$2y$10$mKBEGCEDJY.SBPCZCa7oeOWUmzgcHjxdg85Bqb4FILytpWLnnv7Ii','Normal User HR',2,'Human Resource','admin','2015-10-26 00:17:48','U','admin','2015-10-26 00:18:37'),
	('user_it','$2y$10$HjL5.gWyqq1Vx85VCaGIy.Z7O5Mf5m2x3vf1YxEcD5pqRf3RylN1a','Normal User IT',2,'IT','admin','2015-10-26 00:17:58','U','admin','2015-10-26 00:18:45'),
	('user_it','$2y$10$X5oANBRP5E50SYK3cauRoO1Za.5woI0ukcnMyhIJX9h38I97kV1AO','Normal User IT',2,'IT','admin','2015-10-26 00:18:45','U','admin','2015-10-26 02:01:12'),
	('user_it','$2y$10$X5oANBRP5E50SYK3cauRoO1Za.5woI0ukcnMyhIJX9h38I97kV1AO','Normal User IT',2,'Marketing','admin','2015-10-26 02:01:12','U','admin','2015-10-26 02:01:22');

/*!40000 ALTER TABLE `m_user_hist` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table t_cat_sequence
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_cat_sequence`;

CREATE TABLE `t_cat_sequence` (
  `cat_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `seq` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `t_cat_sequence` WRITE;
/*!40000 ALTER TABLE `t_cat_sequence` DISABLE KEYS */;

INSERT INTO `t_cat_sequence` (`cat_id`, `seq`)
VALUES
	(14,1),
	(33,2);

/*!40000 ALTER TABLE `t_cat_sequence` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table t_news
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_news`;

CREATE TABLE `t_news` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(500) DEFAULT NULL,
  `filename` varchar(200) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table t_risk
# ------------------------------------------------------------

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
  `created_by` varchar(200) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`risk_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `t_risk` WRITE;
/*!40000 ALTER TABLE `t_risk` DISABLE KEYS */;

INSERT INTO `t_risk` (`risk_id`, `risk_code`, `risk_date`, `risk_status`, `periode_id`, `risk_input_by`, `risk_input_division`, `risk_owner`, `risk_division`, `risk_library_id`, `risk_event`, `risk_description`, `risk_category`, `risk_sub_category`, `risk_2nd_sub_category`, `risk_cause`, `risk_impact`, `existing_control_id`, `risk_existing_control`, `risk_evaluation_control`, `risk_control_owner`, `risk_level`, `risk_impact_level`, `risk_likelihood_key`, `suggested_risk_treatment`, `risk_treatment_owner`, `created_by`, `created_date`)
VALUES
	(1,'B.2.3-1','2015-11-10 06:00:37',0,6,'user_it','IT','Human Resource','Human Resource',NULL,'A','B',2,6,33,'C','D',NULL,NULL,NULL,NULL,'HIGH','MODERATE','HIGH','MITIGATE',NULL,'user_it','2015-11-10 06:03:37');

/*!40000 ALTER TABLE `t_risk` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table t_risk_action_plan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_risk_action_plan`;

CREATE TABLE `t_risk_action_plan` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `risk_id` int(11) DEFAULT NULL,
  `action_plan_status` int(11) DEFAULT NULL,
  `action_plan` varchar(300) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `division` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `t_risk_action_plan` WRITE;
/*!40000 ALTER TABLE `t_risk_action_plan` DISABLE KEYS */;

INSERT INTO `t_risk_action_plan` (`id`, `risk_id`, `action_plan_status`, `action_plan`, `due_date`, `division`)
VALUES
	(1,1,0,'A','2015-11-13','Marketing');

/*!40000 ALTER TABLE `t_risk_action_plan` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table t_risk_action_plan_change
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_risk_action_plan_change`;

CREATE TABLE `t_risk_action_plan_change` (
  `risk_id` int(11) DEFAULT NULL,
  `action_plan_status` int(11) DEFAULT NULL,
  `action_plan` varchar(300) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `division` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table t_risk_change
# ------------------------------------------------------------

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
  `created_by` varchar(200) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table t_risk_control
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_risk_control`;

CREATE TABLE `t_risk_control` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `risk_id` int(11) DEFAULT NULL,
  `existing_control_id` int(11) DEFAULT NULL,
  `risk_existing_control` varchar(200) DEFAULT NULL,
  `risk_evaluation_control` varchar(200) DEFAULT NULL,
  `risk_control_owner` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `t_risk_control` WRITE;
/*!40000 ALTER TABLE `t_risk_control` DISABLE KEYS */;

INSERT INTO `t_risk_control` (`id`, `risk_id`, `existing_control_id`, `risk_existing_control`, `risk_evaluation_control`, `risk_control_owner`)
VALUES
	(1,1,0,'X','Y','Z');

/*!40000 ALTER TABLE `t_risk_control` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table t_risk_hist
# ------------------------------------------------------------

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
  `created_by` varchar(200) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `update_status` varchar(1) DEFAULT NULL,
  `update_by` varchar(200) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `t_risk_hist` WRITE;
/*!40000 ALTER TABLE `t_risk_hist` DISABLE KEYS */;

INSERT INTO `t_risk_hist` (`risk_id`, `risk_code`, `risk_date`, `risk_status`, `periode_id`, `risk_input_by`, `risk_input_division`, `risk_owner`, `risk_division`, `risk_library_id`, `risk_event`, `risk_description`, `risk_category`, `risk_sub_category`, `risk_2nd_sub_category`, `risk_cause`, `risk_impact`, `existing_control_id`, `risk_existing_control`, `risk_evaluation_control`, `risk_control_owner`, `risk_level`, `risk_impact_level`, `risk_likelihood_key`, `suggested_risk_treatment`, `risk_treatment_owner`, `created_by`, `created_date`, `update_status`, `update_by`, `update_date`)
VALUES
	(1,'B.2.3-1','2015-11-10 06:00:37',0,6,'user_it','IT','Human Resource','Human Resource',NULL,'A','B',2,6,33,'C','D',NULL,NULL,NULL,NULL,'HIGH','MODERATE','HIGH','MITIGATE',NULL,'user_it','2015-11-10 06:00:37','U','user_it','2015-11-10 06:03:31'),
	(1,'B.2.3-1','2015-11-10 06:00:37',1,6,'user_it','IT','Human Resource','Human Resource',NULL,'A','B',2,6,33,'C','D',NULL,NULL,NULL,NULL,'HIGH','MODERATE','HIGH','MITIGATE',NULL,'user_it','2015-11-10 06:03:31','U','user_it','2015-11-10 06:03:37');

/*!40000 ALTER TABLE `t_risk_hist` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table t_risk_impact
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_risk_impact`;

CREATE TABLE `t_risk_impact` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `risk_id` int(11) DEFAULT NULL,
  `impact_id` int(11) DEFAULT NULL,
  `impact_level` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `t_risk_impact` WRITE;
/*!40000 ALTER TABLE `t_risk_impact` DISABLE KEYS */;

INSERT INTO `t_risk_impact` (`id`, `risk_id`, `impact_id`, `impact_level`)
VALUES
	(1,1,1,'MODERATE'),
	(2,1,2,'NA'),
	(3,1,3,'NA'),
	(4,1,4,'NA'),
	(5,1,5,'NA'),
	(6,1,6,'NA'),
	(7,1,7,'NA');

/*!40000 ALTER TABLE `t_risk_impact` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table t_risk_impact_change
# ------------------------------------------------------------

DROP TABLE IF EXISTS `t_risk_impact_change`;

CREATE TABLE `t_risk_impact_change` (
  `risk_id` int(11) DEFAULT NULL,
  `impact_id` int(11) DEFAULT NULL,
  `impact_level` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
