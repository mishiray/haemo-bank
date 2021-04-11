CREATE DATABASE haemo_bank;
USE haemo_bank;

CREATE TABLE `userprofile`(
    
);
CREATE TABLE `donors`(
    
);
CREATE TABLE `recipients`(
    `id` INT primary key AUTO_INCREMENT NOT NULL,
    `name` VARCHAR(100) NOT NULL,
    `gender` enum(male,female) NOT NULL,
    `dob` DATE NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `phone` VARCHAR(100) NOT NULL,
    `address` varchar(100)NOT NULL,
    `bloodrequest_details` VARCHAR(100) NOT NULL,
    `status` int(1) NOT NULL DEFAULT 1,
    `dateadded` DATETIME DEFAULT CURRENT_TIMESTAMP  NOT NULL
);
CREATE TABLE `transactions`(
    
);
create table `recipients`(

);