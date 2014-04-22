-- MySQL dump 10.13  Distrib 5.1.73, for redhat-linux-gnu (x86_64)
--
-- Host: dbhost-mysql.cs.missouri.edu    Database: zztg2
-- ------------------------------------------------------
-- Server version	5.1.73

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Admin`
--

DROP TABLE IF EXISTS `Admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pawprint` char(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Admin`
--

LOCK TABLES `Admin` WRITE;
/*!40000 ALTER TABLE `Admin` DISABLE KEYS */;
INSERT INTO `Admin` VALUES (1,'ar442','5735297383'),(2,'jsf2pc','5732917407'),(3,'jmabp7','8163041033'),(4,'kpetg6','5738195357'),(5,'wgm343','3148733440'),(6,'zztg2','5738258473');
/*!40000 ALTER TABLE `Admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Assignments`
--

DROP TABLE IF EXISTS `Assignments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Assignments` (
  `aid` int(10) NOT NULL AUTO_INCREMENT,
  `courseid` char(10) DEFAULT NULL,
  `aname` varchar(50) DEFAULT NULL,
  `duedate` varchar(50) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Assignments`
--

LOCK TABLES `Assignments` WRITE;
/*!40000 ALTER TABLE `Assignments` DISABLE KEYS */;
INSERT INTO `Assignments` VALUES (1,'CS4320','Homework #1',NULL,NULL),(2,'CS4320','Homework # 2','April 20','you can add it some'),(3,'0','Homework #3','April 21','you can add it some'),(4,NULL,'Homework #4','April 26','Double weighted'),(5,'CS4380','Homework #4','April 26','Double weighted'),(6,'CS4320','Homework #5','April 30','Please submit it online');
/*!40000 ALTER TABLE `Assignments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Boats`
--

DROP TABLE IF EXISTS `Boats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Boats` (
  `bid` char(10) NOT NULL,
  `bname` varchar(20) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Boats`
--

LOCK TABLES `Boats` WRITE;
/*!40000 ALTER TABLE `Boats` DISABLE KEYS */;
INSERT INTO `Boats` VALUES ('101','Interlake','Blue'),('102','Interlake','Red'),('103','Clipper','Green'),('104','Marine','Red');
/*!40000 ALTER TABLE `Boats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Courses`
--

DROP TABLE IF EXISTS `Courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Courses` (
  `cid` int(10) NOT NULL AUTO_INCREMENT,
  `courseid` char(10) DEFAULT NULL,
  `coursename` varchar(50) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Courses`
--

LOCK TABLES `Courses` WRITE;
/*!40000 ALTER TABLE `Courses` DISABLE KEYS */;
INSERT INTO `Courses` VALUES (1,'CS4320','Software Engineering I - SP2014','you can add it some'),(2,'CS4380','Database Management Systems I, Sec. 01 - SP2014','Some description'),(3,'CS4520','Operating Systems I, Sec. 01 - SP2014','description');
/*!40000 ALTER TABLE `Courses` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = latin1 */ ;
/*!50003 SET character_set_results = latin1 */ ;
/*!50003 SET collation_connection  = latin1_swedish_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`zztg2`@`%`*/ /*!50003 TRIGGER create_course_trigger AFTER INSERT on Courses
FOR EACH ROW BEGIN
INSERT INTO pro_ta_course(courseid) VALUES(new.courseid);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `Create_Assignments`
--

DROP TABLE IF EXISTS `Create_Assignments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Create_Assignments` (
  `caid` int(10) NOT NULL AUTO_INCREMENT,
  `courseid` char(10) DEFAULT NULL,
  `aname` varchar(50) NOT NULL,
  PRIMARY KEY (`caid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Create_Assignments`
--

LOCK TABLES `Create_Assignments` WRITE;
/*!40000 ALTER TABLE `Create_Assignments` DISABLE KEYS */;
INSERT INTO `Create_Assignments` VALUES (1,'CS4320','Homework #1');
/*!40000 ALTER TABLE `Create_Assignments` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = latin1 */ ;
/*!50003 SET character_set_results = latin1 */ ;
/*!50003 SET collation_connection  = latin1_swedish_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`zztg2`@`%`*/ /*!50003 TRIGGER create_assignments_trigger AFTER INSERT on Create_Assignments
FOR EACH ROW BEGIN
INSERT INTO Assignments(aname) VALUES(new.aname);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `Employee`
--

DROP TABLE IF EXISTS `Employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `dept` varchar(10) DEFAULT NULL,
  `salary` int(10) DEFAULT NULL,
  `lot` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=701 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Employee`
--

LOCK TABLES `Employee` WRITE;
/*!40000 ALTER TABLE `Employee` DISABLE KEYS */;
INSERT INTO `Employee` VALUES (100,'Thomas','Sales',5000,NULL),(200,'Jason','Technology',5500,NULL),(300,'Mayla','Technology',7000,NULL),(400,'Nisha','Marketing',9500,NULL),(500,'Randy','Technology',6000,NULL),(600,'zz','Badass',10000000,NULL),(700,'zz','Cool',1000000,NULL);
/*!40000 ALTER TABLE `Employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Employees`
--

DROP TABLE IF EXISTS `Employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Employees` (
  `ssn` char(11) NOT NULL DEFAULT '',
  `name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ssn`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Employees`
--

LOCK TABLES `Employees` WRITE;
/*!40000 ALTER TABLE `Employees` DISABLE KEYS */;
INSERT INTO `Employees` VALUES ('01','A'),('02','B'),('03','C');
/*!40000 ALTER TABLE `Employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Enroll`
--

DROP TABLE IF EXISTS `Enroll`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Enroll` (
  `eid` int(10) NOT NULL AUTO_INCREMENT,
  `pawprint` char(10) NOT NULL,
  `courseid` char(10) NOT NULL,
  PRIMARY KEY (`eid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Enroll`
--

LOCK TABLES `Enroll` WRITE;
/*!40000 ALTER TABLE `Enroll` DISABLE KEYS */;
/*!40000 ALTER TABLE `Enroll` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Enrolled`
--

DROP TABLE IF EXISTS `Enrolled`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Enrolled` (
  `sid` char(20) NOT NULL,
  `cid` char(20) NOT NULL,
  `grade` char(2) DEFAULT NULL,
  PRIMARY KEY (`sid`,`cid`),
  CONSTRAINT `Enrolled_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `Students` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Enrolled`
--

LOCK TABLES `Enrolled` WRITE;
/*!40000 ALTER TABLE `Enrolled` DISABLE KEYS */;
INSERT INTO `Enrolled` VALUES ('53650','Topology112','A'),('53666','Carnatic101','C'),('53666','History105','B'),('53689','History105','A');
/*!40000 ALTER TABLE `Enrolled` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Junior_Sailor`
--

DROP TABLE IF EXISTS `Junior_Sailor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Junior_Sailor` (
  `sid` char(10) NOT NULL,
  `sname` varchar(20) DEFAULT NULL,
  `age` double DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `parent_name` varchar(20) DEFAULT NULL,
  `school` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Junior_Sailor`
--

LOCK TABLES `Junior_Sailor` WRITE;
/*!40000 ALTER TABLE `Junior_Sailor` DISABLE KEYS */;
INSERT INTO `Junior_Sailor` VALUES ('71','Zobra',16,10,NULL,NULL);
/*!40000 ALTER TABLE `Junior_Sailor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Licenses`
--

DROP TABLE IF EXISTS `Licenses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Licenses` (
  `sid` char(10) NOT NULL,
  `bid` char(10) NOT NULL,
  `expiration_day` varchar(20) DEFAULT NULL,
  `licenseID` char(10) DEFAULT NULL,
  PRIMARY KEY (`sid`,`bid`),
  KEY `bid` (`bid`),
  CONSTRAINT `Licenses_ibfk_1` FOREIGN KEY (`bid`) REFERENCES `Boats` (`bid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Licenses_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `Sailors` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Licenses`
--

LOCK TABLES `Licenses` WRITE;
/*!40000 ALTER TABLE `Licenses` DISABLE KEYS */;
INSERT INTO `Licenses` VALUES ('22','101','10-OCT-98',NULL),('22','102','10-OCT-98',NULL),('22','103','08-OCT-98',NULL),('22','104','07-OCT-98',NULL),('31','102','10-NOV-98',NULL),('31','103','06-NOV-98',NULL),('31','104','12-NOV-98',NULL),('64','101','05-SEP-98',NULL),('64','102','08-SEP-98',NULL),('74','103','08-SEP-98',NULL);
/*!40000 ALTER TABLE `Licenses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Puppy`
--

DROP TABLE IF EXISTS `Puppy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Puppy` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `breed` varchar(40) NOT NULL,
  `age` varchar(40) NOT NULL,
  `color` varchar(40) NOT NULL,
  `sex` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Puppy`
--

LOCK TABLES `Puppy` WRITE;
/*!40000 ALTER TABLE `Puppy` DISABLE KEYS */;
INSERT INTO `Puppy` VALUES (11,'Daisy','Great Dane','1.3 years','Brown','Female'),(12,'Sadie','Chow Chow','2.2 years','Light Brown','Female'),(13,'Jack','St. Bernard','11 months','Black','Male'),(14,'Chloe','Dalmatian','3 years','Black and White','Female'),(15,'Zoe','Labradoodle','3.6 years','Brown','Female');
/*!40000 ALTER TABLE `Puppy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Reserves`
--

DROP TABLE IF EXISTS `Reserves`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Reserves` (
  `sid` char(10) NOT NULL,
  `bid` char(10) NOT NULL,
  `expiration_day` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`sid`,`bid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Reserves`
--

LOCK TABLES `Reserves` WRITE;
/*!40000 ALTER TABLE `Reserves` DISABLE KEYS */;
INSERT INTO `Reserves` VALUES ('22','101','10-OCT-98'),('22','102','10-OCT-98'),('22','103','08-OCT-98'),('22','104','07-OCT-98'),('31','102','10-NOV-98'),('31','103','06-NOV-98'),('31','104','12-NOV-98'),('64','101','05-SEP-98'),('64','102','08-SEP-98'),('74','103','08-SEP-98');
/*!40000 ALTER TABLE `Reserves` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Sailors`
--

DROP TABLE IF EXISTS `Sailors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Sailors` (
  `sid` char(10) NOT NULL,
  `sname` varchar(20) DEFAULT NULL,
  `age` double DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Sailors`
--

LOCK TABLES `Sailors` WRITE;
/*!40000 ALTER TABLE `Sailors` DISABLE KEYS */;
INSERT INTO `Sailors` VALUES ('22','Dustin',45,7),('29','Brutus',33,1),('31','Lubber',55.5,8),('32','Andy',25.5,8),('58','Rusty',35,10),('64','Horatio',35,7),('68','Muddy',55.5,8),('71','Zobra',16,10),('74','Horatio',35,9),('85','Art',25.5,3),('88','Kitty',16,10),('95','Bob',63.5,3);
/*!40000 ALTER TABLE `Sailors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Senior_Sailor`
--

DROP TABLE IF EXISTS `Senior_Sailor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Senior_Sailor` (
  `sid` char(10) NOT NULL,
  `sname` varchar(20) DEFAULT NULL,
  `age` double DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `zip_code` int(11) DEFAULT NULL,
  `discount_rate` int(11) DEFAULT NULL,
  PRIMARY KEY (`sid`),
  CONSTRAINT `Senior_Sailor_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `Sailors` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Senior_Sailor`
--

LOCK TABLES `Senior_Sailor` WRITE;
/*!40000 ALTER TABLE `Senior_Sailor` DISABLE KEYS */;
INSERT INTO `Senior_Sailor` VALUES ('95','Bob',63.5,3,NULL,NULL);
/*!40000 ALTER TABLE `Senior_Sailor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Students`
--

DROP TABLE IF EXISTS `Students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Students` (
  `sid` char(20) NOT NULL DEFAULT '',
  `name` char(20) DEFAULT NULL,
  `login` char(10) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gpa` double DEFAULT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Students`
--

LOCK TABLES `Students` WRITE;
/*!40000 ALTER TABLE `Students` DISABLE KEYS */;
INSERT INTO `Students` VALUES ('53650','Smith','smith@math',19,3.8),('53666','Jones','jones@cs',18,3.4),('53689','Brett','smith@cs',18,3.2);
/*!40000 ALTER TABLE `Students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Users` (
  `uid` int(10) NOT NULL DEFAULT '0',
  `lastname` varchar(20) DEFAULT NULL,
  `firstname` varchar(20) DEFAULT NULL,
  `pawprint` char(10) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `role` int(1) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users`
--

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
INSERT INTO `Users` VALUES (14160001,'Rama Akula','Amit','ar442','5735297383',3),(14160002,'Feldmann','Jake','jsf2pc','5732917407',0),(14160003,'Archie','Jordyn','jmabp7','8163041033',0),(14160004,'Eggemeyer','Kyle','kpetg6','5738195357',1),(14160005,'Mayham','Wade','wgm343','3148733440',0),(14160006,'Zhong','Zhaolong','zztg2','5738258473',2);
/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `borrowed`
--

DROP TABLE IF EXISTS `borrowed`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `borrowed` (
  `ref` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `employeeid` smallint(5) unsigned NOT NULL,
  `book` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ref`),
  KEY `employeeid` (`employeeid`),
  CONSTRAINT `borrowed_ibfk_1` FOREIGN KEY (`employeeid`) REFERENCES `employee` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `borrowed`
--

LOCK TABLES `borrowed` WRITE;
/*!40000 ALTER TABLE `borrowed` DISABLE KEYS */;
INSERT INTO `borrowed` VALUES (3,3,'C'),(4,22,'D');
/*!40000 ALTER TABLE `borrowed` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dep_policy`
--

DROP TABLE IF EXISTS `dep_policy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dep_policy` (
  `pname` varchar(20) NOT NULL DEFAULT '',
  `age` int(11) DEFAULT NULL,
  `cost` double DEFAULT NULL,
  `ssn` char(11) NOT NULL DEFAULT '',
  PRIMARY KEY (`pname`,`ssn`),
  KEY `ssn` (`ssn`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dep_policy`
--

LOCK TABLES `dep_policy` WRITE;
/*!40000 ALTER TABLE `dep_policy` DISABLE KEYS */;
INSERT INTO `dep_policy` VALUES ('a',10,1000,'01'),('aa',11,1001,'01'),('aaa',12,1002,'01'),('b',20,2000,'02'),('bb',21,2000,'02'),('bbb',21,2003,'02'),('bbbb',22,2002,'02'),('c',32,3002,'03'),('cc',32,3002,'03'),('ccc',32,3002,'03'),('d',42,4002,'04');
/*!40000 ALTER TABLE `dep_policy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee` (
  `id` smallint(5) unsigned NOT NULL,
  `firstname` varchar(30) DEFAULT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES (3,'Jane','Green','1967-07-15'),(22,'Laura','Jones','1969-09-05');
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employees` (
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `photo` varchar(10000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` VALUES ('Zhaolong Zhong','zztg2@mail.missouri.edu','5738258473','mvc_struc.JPG'),('zz','zztg2@mail.missouri.edu','5738258473','mvc_struc.JPG');
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lottery_apps`
--

DROP TABLE IF EXISTS `lottery_apps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lottery_apps` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `student_name` varchar(50) DEFAULT NULL,
  `home_school` varchar(50) DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lottery_apps`
--

LOCK TABLES `lottery_apps` WRITE;
/*!40000 ALTER TABLE `lottery_apps` DISABLE KEYS */;
INSERT INTO `lottery_apps` VALUES (1,'zz','mizzou','2014-01-28 21:06:43'),(2,'Zhaolong Zhong','MIZZOU','2014-01-30 19:46:23'),(3,'Pan ran','Mizzou','2014-02-11 01:13:47');
/*!40000 ALTER TABLE `lottery_apps` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `body` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'The title','This is the post body.','2014-02-13 09:53:05','2014-02-13 12:23:31'),(2,'The title','This is the post body.','2014-02-13 09:54:17',NULL),(3,'A title again','And this is the post body follows.','2014-02-13 09:55:18','2014-02-13 13:11:59'),(4,'Title strikes back','This is really exiting! \r\nNot sure.','2014-02-13 09:56:04','2014-02-13 13:18:25'),(5,'What is Software Engineering?','It\'s ...','2014-02-13 11:57:34','2014-02-13 12:33:17'),(13,'Damn it!','Man, life sucks!','2014-02-13 12:33:17','2014-02-13 12:58:02');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pro_ta_course`
--

DROP TABLE IF EXISTS `pro_ta_course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pro_ta_course` (
  `ptc` int(10) NOT NULL AUTO_INCREMENT,
  `courseid` char(10) DEFAULT NULL,
  `ppawprint` char(10) DEFAULT NULL,
  `tpawprint` char(10) DEFAULT NULL,
  PRIMARY KEY (`ptc`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pro_ta_course`
--

LOCK TABLES `pro_ta_course` WRITE;
/*!40000 ALTER TABLE `pro_ta_course` DISABLE KEYS */;
INSERT INTO `pro_ta_course` VALUES (1,'CS4320',NULL,NULL),(2,'CS4380',NULL,NULL),(3,'CS4520',NULL,NULL);
/*!40000 ALTER TABLE `pro_ta_course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `uid` int(10) NOT NULL DEFAULT '0',
  `lastname` varchar(20) DEFAULT NULL,
  `firstname` varchar(20) DEFAULT NULL,
  `pawprint` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `role` int(1) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (14160001,'Rama Akula','Amit','ar442','5735297383',3),(14160002,'Feldmann','Jake','jsf2pc','5732917407',2),(14160003,'Archie','Jordyn','jmabp7','8163041033',0),(14160004,'Eggemeyer','Kyle','kpetg6','5738195357',1),(14160005,'Mayham','Wade','wgm343','3148733440',0),(14160006,'Zhong','Zhaolong','zztg2','5738258473',2);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-04-17 15:31:22
