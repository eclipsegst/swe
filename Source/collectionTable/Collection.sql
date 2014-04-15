CREATE TABLE Collection (
	id SERIAL, 
	pawprint VARCHAR(40) not null, 
	file VARCHAR(40) not null,
	PRIMARY KEY (id)
);
