-- Create a new database called 'DatabaseName'
-- Connect to the 'master' database to run this snippet
USE master
GO
-- Create the new database if it does not exist already
IF NOT EXISTS (
    SELECT name
        FROM sys.databases
        WHERE name = N'DatabaseName'
)
DROP DATABASE haemo_bank;
CREATE DATABASE haemo_bank;
use haemo_bank;
create table blood_data(
blood_id INT NOT NULL PRIMARY KEY  AUTO_INCREMENT,
email varchar(100) UNIQUE  not null,
blood_group varchar(30) not null,
blood_type varchar(30) not null,
blood_test int(1) DEFAULT 1 not null,
status int(1) NOT NULL DEFAULT 1,
date_added datetime DEFAULT CURRENT_TIMESTAMP NOT NULL
);

create table userprofile(
id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
name varchar(100) NOT NULL,
phone varchar(20) not null,
gender varchar(30) NOT NULL,
address varchar(250) not null,
dob date not null,
email varchar(100)  UNIQUE   not null,
userrole varchar(30) NOT NULL,
password varchar(30) NOT NULL,
status int(1) NOT NULL DEFAULT 1,
date_added datetime DEFAULT CURRENT_TIMESTAMP NOT NULL
);

create table donor(
id INT primary key AUTO_INCREMENT not null,
name varchar(100) not null,
gender varchar(30) not null,
dob date not null,
email varchar(100) not null,
phone varchar(20) not null,
address varchar(250) not null,
blood_amount INT not null,
status int(1) NOT NULL DEFAULT 0,
date_added datetime DEFAULT CURRENT_TIMESTAMP NOT NULL
);

create table recipients(
id INT primary key AUTO_INCREMENT  not null,
token varchar(10) not null,
name varchar(100) not null,
gender varchar(30) not null,
dob date not null,
email varchar(100) not null,
phone varchar(20) not null,
address varchar(250) not null,
blood_amount INT not null,
date_needed DATETIME not null,
purpose varchar(250) not NULL,
status int(1) NOT NULL DEFAULT 0,
date_added datetime DEFAULT CURRENT_TIMESTAMP NOT NULL
);

create table transact(
transaction_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
token varchar(10) not null,
recipient_id varchar(100) not null,
foreign key (recipient_id) references recipients(id),
donor_id varchar(30) not null,
foreign key (donor_id) references donor(id),
status int(1) NOT NULL DEFAULT 1,
date_added datetime DEFAULT CURRENT_TIMESTAMP NOT NULL
);
