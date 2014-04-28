DROP SCHEMA IF EXISTS project CASCADE;

CREATE SCHEMA project;

SET search_path = project, public;

DROP TABLE IF EXISTS admin;
CREATE TABLE admin (
	id serial NOT NULL,
	pawprint varchar(25) NOT NULL,
	password varchar(20) NOT NULL,
	PRIMARY KEY (id)
);

INSERT INTO admin VALUES (1,'ar442','5735297383'),(2,'jsf2pc','5732917407'),(3,'jmabp7','8163041033'),(4,'kpetg6','5738195357'),(5,'wgm343','3148733440'),(6,'zztg2','5738258473');

DROP TABLE IF EXISTS courses;
CREATE TABLE courses (
        cid serial NOT NULL,
        courseid varchar(10) NOT NULL default '',
        coursename varchar(50) NOT NULL default '',
        description varchar(250) default NULL,
        PRIMARY KEY (courseid)
);

INSERT INTO courses VALUES (1,'CS4320','Software Engineering I - SP2014','you can add it some'),(2,'CS4380','Database Management Systems I, Sec. 01 - SP2014','Some description'),(3,'CS4520','Operating Systems I, Sec. 01 - SP2014','description');


DROP TABLE IF EXISTS assignments;
CREATE TABLE assignments (
	aid serial NOT NULL,
	courseid varchar(10) NOT NULL default '' REFERENCES courses ON DELETE CASCADE,
	aname varchar(50) NOT NULL default '',
	duedate varchar(50) default NULL,
	description varchar(250) default NULL,
	PRIMARY KEY (aid)
);

INSERT INTO assignments VALUES (1,'CS4320','Homework #1',NULL,NULL),(2,'CS4320','Homework # 2','April 20','you can add it some'),(3,'CS4320','Homework #3','April 21','you can add it some'),(4,'CS4320','Homework #4','April 26','Double weighted'),(5,'CS4380','Homework #4','April 26','Double weighted'),(6,'CS4320','Homework #5','April 30','Please submit it online');

DROP TABLE IF EXISTS section;
CREATE TABLE section (
	sid serial NOT NULL,
	sectionid varchar(1) NOT NULL default '1',
	courseid varchar(10) NOT NULL default '' REFERENCES courses ON DELETE CASCADE,
	description varchar(250) default NULL,
	PRIMARY KEY (sid)
);

DROP TABLE IF EXISTS create_assignments;
CREATE TABLE create_assignments (
	caid serial NOT NULL,
	courseid varchar(10) NOT NULL default '' REFERENCES courses ON DELETE CASCADE,
	aname varchar(50) NOT NULL default '',
	PRIMARY KEY (caid)
);

INSERT INTO create_Assignments VALUES (1,'CS4320','Homework #1');

DROP TABLE IF EXISTS enroll;
CREATE TABLE enroll (
	eid serial NOT NULL,
	pawprint varchar(25) NOT NULL default '',
	courseid varchar(10) NOT NULL default '' REFERENCES courses ON DELETE CASCADE,
	PRIMARY KEY (eid)
);

DROP TABLE IF EXISTS users;
CREATE TABLE users (
	uid serial NOT NULL,
	lastname varchar(20) NOT NULL default '',
	firstname varchar(20) NOT NULL default '',
	pawprint varchar(25) NOT NULL default '',
	password varchar(20) NOT NULL default '',
	role int NOT NULL default '0',
	PRIMARY KEY (uid)
);

INSERT INTO users VALUES (14160001,'Rama Akula','Amit','ar442','5735297383',3),(14160002,'Feldmann','Jake','jsf2pc','5732917407',0),(14160003,'Archie','Jordyn','jmabp7','8163041033',0),(14160004,'Eggemeyer','Kyle','kpetg6','5738195357',1),(14160005,'Mayham','Wade','wgm343','3148733440',0),(14160006,'Zhong','Zhaolong','zztg2','5738258473',2);

DROP TABLE IF EXISTS pro_ta_course;
CREATE TABLE pro_ta_course (
	ptc serial NOT NULL,
	courseid varchar(10) NOT NULL default '' REFERENCES courses ON DELETE CASCADE,
	pawprint varchar(25) NOT NULL default '',
	uid int NOT NULL REFERENCES users ON DELETE CASCADE,
	PRIMARY KEY (ptc)
	--tpawprint varchar(25) NOT NULL DEFAULT ''-->
);

INSERT INTO pro_ta_course VALUES (1,'CS4320','',14160001),(2,'CS4380','',14160001),(3,'CS4520','',14160001);

DROP TABLE IF EXISTS log;
CREATE TABLE log (
	log_id serial NOT NULL,
	pawprint varchar(25) NOT NULL default '',
	courseid varchar(10) NOT NULL default '' REFERENCES courses ON DELETE CASCADE,
	aid int NOT NULL default '0' REFERENCES assignments ON DELETE CASCADE,
	sectionid char(1) NOT NULL default '',
	log_date TIMESTAMP NOT NULL default CURRENT_TIMESTAMP,
	action varchar(50) default NULL,
	hash char(64) default NULL,
	PRIMARY KEY (log_id)
);

