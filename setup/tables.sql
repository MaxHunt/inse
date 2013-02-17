DROP TABLE IF EXISTS projects, records;

CREATE TABLE projects (
	project_ID int unsigned NOT NULL auto_increment,
	project_name varchar(100) NOT NULL,
	PRIMARY KEY (project_ID)
	
);

CREATE TABLE records (
	record_ID int unsigned NOT NULL auto_increment,
	record_name varchar(100) NOT NULL,
	record_start_date DATETIME NOT NULL,
	record_end_date DATETIME NOT NULL,
	record_priority int unsigned NULL,
	project_ID int unsigned NOT NULL,
	PRIMARY KEY (record_ID)
);