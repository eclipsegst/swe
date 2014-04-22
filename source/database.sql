CREATE SCHEMA project;

SET search_path = project, public;

DROP TABLE IF EXISTS Admin;
CREATE TABLE Admin (
	id int(11) SERIAL PRIMARY KEY,
	pawprint varchar(25) NOT NULL,
	password varchar(20) NOT NULL
);

INSERT INTO Admin VALUES (1,'ar442','5735297383'),(2,'jsf2pc','5732917407'),(3,'jmabp7','8163041033'),(4,'kpetg6','5738195357'),(5,'wgm343','3148733440'),(6,'zztg2','5738258473');

DROP TABLE IF EXISTS Assignments;
CREATE TABLE Assignments (
	aid int(10) SERIAL PRIMARY KEY,
	courseid varchar(10) NOT NULL default '' REFRENCES Courses,
	aname varchar(50) NOT NULL default '',
	duedate varchar(50) NOT NULL default '',
	description varchar(250) NOT NULL default ''
);

INSERT INTO Assignments VALUES (1,'CS4320','Homework #1',NULL,NULL),(2,'CS4320','Homework # 2','April 20','you can add it some'),(3,'0','Homework #3','April 21','you can add it some'),(4,NULL,'Homework #4','April 26','Double weighted'),(5,'CS4380','Homework #4','April 26','Double weighted'),(6,'CS4320','Homework #5','April 30','Please submit it online');

DROP TABLE IF EXISTS Courses;
CREATE TABLE Courses (
	cid int(10) SERIAL PRIMARY KEY,
	courseid varchar(10) NOT NULL default '' REFERENCES Courses,
	coursename varchar(50) NOT NULL default '',
	description varchar(250) NOT NULL default ''
);

INSERT INTO Courses VALUES (1,'CS4320','Software Engineering I - SP2014','you can add it some'),(2,'CS4380','Database Management Systems I, Sec. 01 - SP2014','Some description'),(3,'CS4520','Operating Systems I, Sec. 01 - SP2014','description');

DROP TABLE IF EXISTS Create_assignments;
CREATE TABLE Create_assignments (
	caid int(10) SERIAL PRIMARY KEY,
	courseid varchar(10) NOT NULL default '' REFERENCES Courses,
	aname varchar(50) NOT NULL default ''
);

INSERT INTO Create_Assignments VALUES (1,'CS4320','Homework #1');

DROP TABLE IF EXISTS Enroll;
CREATE TABLE Enroll (
	eid int(10) SERIAL PRIMARY KEY,
	pawprint varchar(25) NOT NULL default '',
	courseid varchar(10) NOT NULL REFERENCES Courses
);

DROP TABLE IF EXISTS Users;
CREATE TABLE Users (
	uid int(10) SERIAL PRIMARY KEY,
	lastname varchar(20) NOT NULL DEFAULT '',
	firstname varchar(20) NOT NULL DEFAULT '',
	pawprint varchar(25) NOT NULL DEFAULT '',
	password varchar(20) NOT NULL DEFAULT '',
	role int(1) NOT NULL DEFAULT '0'
);

INSERT INTO `Users` VALUES (14160001,'Rama Akula','Amit','ar442','5735297383',3),(14160002,'Feldmann','Jake','jsf2pc','5732917407',0),(14160003,'Archie','Jordyn','jmabp7','8163041033',0),(14160004,'Eggemeyer','Kyle','kpetg6','5738195357',1),(14160005,'Mayham','Wade','wgm343','3148733440',0),(14160006,'Zhong','Zhaolong','zztg2','5738258473',2);

DROP TABLE IF EXISTS pro_ta_course;
CREATE TABLE pro_ta_course (
	ptc int(10) SERIAL PRIMARY KEY,
	courseid varchar(10) NOT NULL REFERENCES Courses,
	ppawprint varchar(25) NOT NULL DEFAULT '',
	tpawprint varchar(25) NOT NULL DEFAULT ''
);

INSERT INTO `pro_ta_course` VALUES (1,'CS4320',NULL,NULL),(2,'CS4380',NULL,NULL),(3,'CS4520',NULL,NULL);




