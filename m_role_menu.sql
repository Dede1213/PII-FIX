# Host: localhost  (Version: 5.5.27)
# Date: 2015-12-30 15:03:19
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES latin1 */;

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

INSERT INTO `m_role_menu` VALUES (4,24),(4,26),(4,25),(4,27),(4,30),(4,28),(4,29),(5,30),(5,26),(5,25),(5,27),(5,24),(5,28),(5,29),(3,23),(3,24),(3,26),(3,25),(3,27),(3,28),(3,29),(2,38),(2,45),(2,46),(2,44),(2,47),(2,34),(2,35),(2,33),(2,36),(2,37),(2,43),(0,48),(2,32),(2,49),(2,50),(2,51),(2,52),(2,53),(2,54),(2,56),(2,57),(2,58),(2,55),(2,59),(2,60),(2,61),(2,0),(2,0),(2,0),(2,0),(2,0),(2,0),(2,0),(2,0),(2,0),(2,62),(2,63),(2,64),(2,65),(2,66),(2,67),(2,68),(2,70),(2,69),(2,70),(2,71),(2,72),(2,73),(2,74),(2,75),(2,76),(2,77),(2,78),(2,79),(2,29);
