CREATE TABLE Collection (
	course  VARCHAR(40) not null,
	assignment VARCHAR(40) not null,
	section VARCHAR(40) not null, 
	pawprint VARCHAR(40) not null, 
	file VARCHAR(40) not null,
	PRIMARY KEY (pawprint)
);
