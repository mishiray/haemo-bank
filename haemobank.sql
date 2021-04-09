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
blood_group varchar(30) not null,
blood_type varchar(30) not null,
blood_amount INT not null,
blood_test int not null,
status int(1) NOT NULL,
date_added date not null
);

create table userprofile(
user_id INT NOT NULL,
user_name varchar(100) NOT NULL,
gender varchar(30) NOT NULL,
dob date not null,
user_email varchar(100) not null,
user_role varchar(30) NOT NULL,
blood_group varchar(30) NOT NULL,
user_password varchar(30) NOT NULL,
userdate_added date not null,
user_status varchar(30) NOT NULL
);

create table donor(
donor_id INT primary key not null,
donor_name varchar(100) not null,
donor_gender varchar(30) not null,
donor_dob date not null,
donor_email varchar(100) not null,
donor_phone int not null,
donor_address varchar(100) not null,
blood_details varchar(100) not null,
donor_status int(1) NOT NULL,
date_added int(1) NOT NULL
);

create table transact(
transaction_id INT NOT NULL PRIMARY KEY,
recipient_ID varchar(100) not null,
foreign key (recipient_ID) references recipient(recipient_id),
donor_ID varchar(30) not null,
foreign key (donor_ID) references recipient(donor_id),
Blood_details varchar(30) not null,
foreign key (Blood_details) references recipient(blood_details),
status int(1) NOT NULL,
date_added date not null
);

create table recipients(
recipient_id INT primary key not null,
recipient_name varchar(100) not null,
recipient_gender varchar(30) not null,
recipient_dob date not null,
recipient_email varchar(100) not null,
recipient_phone int not null,
recipient_address varchar(100) not null,
bloodrequest_details varchar(100) not null,
recipient_status int(1) NOT NULL,
recipient_date_added int(1) NOT NULL
);