
/* 
 cd to mysql bin folder then type what is given below into the terminal 

mysql -u root -p -h 127.0.0.1  */

create database employeemanagement;
use employeemanagement;

create table organisations(
    id int(10) primary key AUTO_INCREMENT,
    organisation varchar(50),
    email varchar(50),
    contact int(50),
    address varchar(100),
    city varchar(50),
    state varchar(50),
    password varchar(50),
    token varchar(50),
    emailverified int(10)
);

-- copy from here --

CREATE TABLE IF NOT EXISTS `employee_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eid` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `email` varchar(25) NOT NULL,
  `DOB` varchar(25) NOT NULL,
  `contact_no` varchar(25) NOT NULL,
  `department` varchar(20) NOT NULL,
  `organisation` int(30),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `attendance_taken` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eid` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `attendance` varchar(20) NOT NULL,
  `organisation` int(20),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `admin_details`(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eid` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `DOB` varchar(25) NOT NULL,
  `contact_no` varchar(25),
  `organisation` int(30),
  PRIMARY KEY(`id`)
);

--Add records in the employee_details table  for organisation 1--
insert into employee_details values('',101,'Mohil Gupta','male','mohil@innerwork.com','25-02-2000','123456789','IT',1,'12345');
insert into employee_details values('',102,'Aditya Rathore','male','aditya@innerwork.com','1-02-2000','123456789','IT',1,'12345');
insert into employee_details values('',103,'Vanshika Sharma','female','vanshika@innerwork.com','1-02-2000','123456789','IT',1,'12345');
insert into employee_details values('',104,'Nikita Khoj','female','nikita@innerwork.com','1-02-2000','123456789','IT',1,'12345');

--Add records in the organisation table for organisation 2 --

insert into employee_details values('',101,'Ram Gupta','male','ram@alphatech.com','25-02-2000','123456789','IT',2,'12345');
insert into employee_details values('',102,'Shyam Rathore','male','shyam@alphatech.com','1-02-2000','123456789','IT',2,'12345');
insert into employee_details values('',103,'Ritika Sharma','female','ritika@alphatech.com','1-02-2000','123456789','IT',2,'12345');
insert into employee_details values('',104,'Priyal Khoj','female','priyal@alpha.com','1-02-2000','123456789','IT',2,'12345');


--Add records in the admin table  for organisation 1--

insert into admin_details values('',111,'Ram','male','admin_ram@innerwork.com','admin','2-02-1986','123456789',1);
insert into admin_details values('',112,'Ghansam','male','admin_ghansam@innerwork.com','admin','2-02-1986','123456789',1);

--Add records in the admin_details for organisation 2 --

insert into admin_details values('',111,'Sushant','male','admin_sushant@alphatech.com','admin','2-02-1986','123456789',2);
insert into admin_details values('',112,'Shraddha','female','admin_shraddha@aplhatech.com','admin','2-02-1986','123456789',2);


-- added a password column for user table--

alter table employee_details add password varchar(25);

alter table employee_details add project_name varchar(50);
alter table employee_details add manager varchar(50);
alter table employee_details add location varchar(50);
alter table employee_details add doj varchar(50);

