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
CREATE DATABASE haemobank;
use haemobank;
create table blood_data(
blood_id INT NOT NULL,
email varchar(100) not null,
blood_group varchar(30) not null,
blood_type varchar(30) not null,
blood_amount INT not null,
blood_test int not null,
status int(1) NOT NULL,
date_added datetime DEFAULT CURRENT_TIMESTAMP  NOT NULL
);

create table userprofile(
userid INT NOT NULL,
username varchar(100) NOT NULL,
gender varchar(30) NOT NULL,
dob date not null,
email varchar(100) not null,
userrole varchar(30) NOT NULL,
password varchar(30) NOT NULL,
date_added datetime DEFAULT CURRENT_TIMESTAMP  NOT NULL
);

create table donor(
id INT primary key not null,
name varchar(100) not null,
gender varchar(30) not null,
dob date not null,
email varchar(100) not null,
phone int not null,
address varchar(100) not null,
blood_group varchar(30) not null,
blood_type varchar(30) not null,
blood_amount INT not null,
blood_test int(1) not null,
status int(1) NOT NULL,
date_added datetime DEFAULT CURRENT_TIMESTAMP  NOT NULL
);

create table transaction(
transaction_id INT NOT NULL PRIMARY KEY,
recipient_id varchar(100) not null,
foreign key (recipient_id) references recipient(recipient_id),
donor_id varchar(30) not null,
foreign key (donor_ID) references recipient(donor_id),
blood_details varchar(30) not null,
foreign key (blood_details) references recipient(blood_details),
status int(1) NOT NULL,
date_added datetime DEFAULT CURRENT_TIMESTAMP  NOT NULL
);

create table recipients(
id INT primary key not null,
name varchar(100) not null,
gender varchar(30) not null,
dob date not null,
email varchar(100) not null,
phone int not null,
address varchar(100) not null,
blood_request_details varchar(100) not null,
status int(1) NOT NULL,
date_added datetime DEFAULT CURRENT_TIMESTAMP  NOT NULL
);