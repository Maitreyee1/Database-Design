-- CS 6360 Programming Assignment 1 
-- Maitreyee Abhijit Mhasakar net ID: mam171630 

DROP DATABASE IF EXISTS ADDRESS_BOOK_F;
-- Create the Database 
CREATE DATABASE ADDRESS_BOOK_F;
-- Set the currently active database 
USE ADDRESS_BOOK_F;

DROP TABLE IF EXISTS Contact;
CREATE TABLE Contact (
  Contact_id    INT NOT NULL auto_increment,
  Fname         VARCHAR(25) NOT NULL,
  Mname         VARCHAR(25) NULL,
  Lname         VARCHAR(25) NOT NULL,
  PRIMARY KEY (Contact_id)
);

DROP TABLE IF EXISTS Address;
CREATE TABLE Address (
  #Address_id	INT NOT NULL auto_increment,
  Contact_id INT NOT NULL,
  Address_type     VARCHAR(15), 
  Address     VARCHAR(100),
  City       VARCHAR(15), 
  State     VARCHAR(15),
  Zip	varchar(10),
  #PRIMARY KEY (Address_id),
  FOREIGN KEY (Contact_id) references Contact(Contact_id)
);

DROP TABLE IF EXISTS Phone;
CREATE TABLE Phone (
  #Phone_id	INT NOT NULL auto_increment,
  Contact_id INT Null,
  Phone_type     VARCHAR(15), 
  Area_code	varchar(3),
  Ph_Number varchar(10),
  #PRIMARY KEY (Phone_id),
  FOREIGN KEY (Contact_id) references Contact(Contact_id)
);

DROP TABLE IF EXISTS Birthdate;
CREATE TABLE Birthdate (
  #Date_id	INT NOT NULL auto_increment,
  Contact_id	INT NOT NULL,
  Date_type	VARCHAR(15), 
  Date_	varchar(20), 	 
  #PRIMARY KEY (Date_id),
  FOREIGN KEY (Contact_id) references Contact(Contact_id)
);


select * from Birthdate;

LOAD DATA INFILE 'C:/ProgramData/MySQL/MySQL Server 8.0/Uploads/Contacts_table.txt' 
INTO TABLE Contact
FIELDS TERMINATED BY ',' 
ENCLOSED BY '"'
LINES TERMINATED BY '\n';

LOAD DATA INFILE 'C:/ProgramData/MySQL/MySQL Server 8.0/Uploads/Date_table.txt' 
INTO TABLE Birthdate
FIELDS TERMINATED BY ',' 
ENCLOSED BY '"'
LINES TERMINATED BY '\n';

LOAD DATA INFILE 'C:/ProgramData/MySQL/MySQL Server 8.0/Uploads/Homephone_table.txt' 
INTO TABLE Phone
FIELDS TERMINATED BY ',' 
ENCLOSED BY '"'
LINES TERMINATED BY '\n';

LOAD DATA INFILE 'C:/ProgramData/MySQL/MySQL Server 8.0/Uploads/Cellphone_table.txt' 
INTO TABLE Phone
FIELDS TERMINATED BY ',' 
ENCLOSED BY '"'
LINES TERMINATED BY '\n';

LOAD DATA INFILE 'C:/ProgramData/MySQL/MySQL Server 8.0/Uploads/Workphone_table.txt' 
INTO TABLE Phone
FIELDS TERMINATED BY ',' 
ENCLOSED BY '"'
LINES TERMINATED BY '\n';

LOAD DATA INFILE 'C:/ProgramData/MySQL/MySQL Server 8.0/Uploads/Work_add_table.txt' 
INTO TABLE Address
FIELDS TERMINATED BY ',' 
ENCLOSED BY '"'
LINES TERMINATED BY '\n';

LOAD DATA INFILE 'C:/ProgramData/MySQL/MySQL Server 8.0/Uploads/Home_add_table.txt' 
INTO TABLE Address
FIELDS TERMINATED BY ',' 
ENCLOSED BY '"'
LINES TERMINATED BY '\n';

ALTER TABLE Address
ADD Address_id INT NOT NULL PRIMARY KEY auto_increment First;

ALTER TABLE Phone
ADD Phone_id INT NOT NULL PRIMARY KEY auto_increment First;


ALTER TABLE Birthdate
ADD Date_id INT NOT NULL PRIMARY KEY auto_increment First;


