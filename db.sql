/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 5.7.9 : Database - db_dogshop
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_dogshop` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_dogshop`;

/*Table structure for table `tbl_breed` */

DROP TABLE IF EXISTS `tbl_breed`;

CREATE TABLE `tbl_breed` (
  `breed_id` int(5) NOT NULL AUTO_INCREMENT,
  `breed_name` varchar(20) NOT NULL,
  `breed_status` bit(1) NOT NULL,
  PRIMARY KEY (`breed_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_breed` */

/*Table structure for table `tbl_customer` */

DROP TABLE IF EXISTS `tbl_customer`;

CREATE TABLE `tbl_customer` (
  `cust_id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `c_fname` varchar(10) NOT NULL,
  `c_lname` varchar(10) DEFAULT NULL,
  `c_gender` varchar(6) NOT NULL,
  `c_dob` date NOT NULL,
  `password` varchar(10) NOT NULL,
  `c_phno` decimal(10,0) NOT NULL,
  `c_hno` int(5) NOT NULL,
  `c_street` varchar(15) NOT NULL,
  `c_district` varchar(20) NOT NULL,
  `c_pin` decimal(6,0) NOT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_customer` */

insert  into `tbl_customer`(`cust_id`,`username`,`c_fname`,`c_lname`,`c_gender`,`c_dob`,`password`,`c_phno`,`c_hno`,`c_street`,`c_district`,`c_pin`) values 
(2,'john@gmail.com','John','Jose','male','1997-05-01','john123',9087654321,12,'Rose Lane','ALA',691234),
(3,'rose@gmail.com','Rose','Thomas','female','1997-05-08','rose123',9090877865,15,'Dane Street','TVM',698713);

/*Table structure for table `tbl_gender` */

DROP TABLE IF EXISTS `tbl_gender`;

CREATE TABLE `tbl_gender` (
  `g_id` int(5) NOT NULL,
  `gender_name` varchar(7) NOT NULL,
  PRIMARY KEY (`g_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_gender` */

/*Table structure for table `tbl_item` */

DROP TABLE IF EXISTS `tbl_item`;

CREATE TABLE `tbl_item` (
  `item_id` int(5) NOT NULL AUTO_INCREMENT,
  `g_id` int(5) NOT NULL,
  `breed_id` int(5) NOT NULL,
  `description` varchar(200) NOT NULL,
  `image` longblob NOT NULL,
  `age` varchar(10) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `stock` decimal(8,2) NOT NULL,
  `i_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_item` */

/*Table structure for table `tbl_login` */

DROP TABLE IF EXISTS `tbl_login`;

CREATE TABLE `tbl_login` (
  `username` varchar(15) NOT NULL,
  `password` varchar(10) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_login` */

insert  into `tbl_login`(`username`,`password`,`user_type`) values 
('admin@gmail.com','admin123','admin'),
('priya@gmail.com','priya123','staff'),
('john@gmail.com','john123','customer'),
('xyz@gmail.com','xyz123','customer');

/*Table structure for table `tbl_purchase_master` */

DROP TABLE IF EXISTS `tbl_purchase_master`;

CREATE TABLE `tbl_purchase_master` (
  `pm_id` int(5) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(5) NOT NULL,
  `staff_id` int(5) NOT NULL,
  `tot_amt` decimal(8,2) NOT NULL,
  PRIMARY KEY (`pm_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_purchase_master` */

/*Table structure for table `tbl_staff` */

DROP TABLE IF EXISTS `tbl_staff`;

CREATE TABLE `tbl_staff` (
  `staff_id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `s_fname` varchar(10) NOT NULL,
  `s_lname` varchar(10) NOT NULL,
  `s_gender` varchar(6) NOT NULL,
  `s_dob` date NOT NULL,
  `password` varchar(10) NOT NULL,
  `s_phone` decimal(10,0) NOT NULL,
  `s_hno` int(5) NOT NULL,
  `s_street` varchar(15) NOT NULL,
  `s_district` varchar(20) NOT NULL,
  `s_pin` decimal(6,0) NOT NULL,
  `s_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_staff` */

insert  into `tbl_staff`(`staff_id`,`username`,`s_fname`,`s_lname`,`s_gender`,`s_dob`,`password`,`s_phone`,`s_hno`,`s_street`,`s_district`,`s_pin`,`s_status`) values 
(2,'priya@gmail.com','Priya','Jose','female','1996-06-08','priya123',9090878759,13,'Lane Ville','KAN',690123,0);

/*Table structure for table `tbl_vaccination` */

DROP TABLE IF EXISTS `tbl_vaccination`;

CREATE TABLE `tbl_vaccination` (
  `vacc_id` int(5) NOT NULL AUTO_INCREMENT,
  `item_id` int(5) NOT NULL,
  `vacc_type` varchar(25) NOT NULL,
  `vacc_date` date NOT NULL,
  `vacc_dose` varchar(5) NOT NULL,
  PRIMARY KEY (`vacc_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tbl_vaccination` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
