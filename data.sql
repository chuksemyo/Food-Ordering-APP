/*
SQLyog Community v12.09 (32 bit)
MySQL - 5.6.17 : Database - food
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `admin_login` */

CREATE TABLE `admin_login` (
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `level` varchar(5) DEFAULT '2',
  `restaurant` varchar(100) DEFAULT '-',
  `snum` int(5) NOT NULL AUTO_INCREMENT,
  `token` varchar(20) DEFAULT '-',
  `phone` varchar(15) DEFAULT '-',
  `email` varchar(50) DEFAULT '-',
  PRIMARY KEY (`snum`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/*Data for the table `admin_login` */

insert  into `admin_login`(`username`,`password`,`level`,`restaurant`,`snum`,`token`,`phone`,`email`) values ('admin','12345','1','-',1,'77910','08034046347','citysoft2010@yahoo.com'),('Emaka','22222','2','-',21,'-','08034046348','emeka@yahoo.com'),('uju','11111','3','Fast Food Center',22,'-','088034046349','uju@yahoo.com'),('Ebuka','33333','1','PK Restaurant',23,'11111','080232154321','ebuka@yahoo.com'),('ik','9898','2','-',24,'-','09087623412','ik@yahoo.com');

/*Table structure for table `ecard` */

CREATE TABLE `ecard` (
  `firstname` varchar(20) DEFAULT NULL,
  `lastname` varchar(20) DEFAULT NULL,
  `cardnumber` varchar(40) NOT NULL,
  `signature` varchar(20) DEFAULT NULL,
  `expdate` date DEFAULT NULL,
  `pin` int(6) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `bnv` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`cardnumber`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ecard` */

insert  into `ecard`(`firstname`,`lastname`,`cardnumber`,`signature`,`expdate`,`pin`,`amount`,`phone`,`bnv`) values ('norbert','okwara','2339078050110082','35189','2025-01-01',2211,1775500,'08034046347','55555'),('admin','admin','4919433536285691','10831','2025-01-01',55555,56000,'08089585555','44444');

/*Table structure for table `foodmenu` */

CREATE TABLE `foodmenu` (
  `snum` int(5) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) DEFAULT NULL,
  `price` float(10,2) DEFAULT NULL,
  `pic` varchar(200) DEFAULT NULL,
  `catg` varchar(50) DEFAULT '-',
  `Restaurant` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`snum`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `foodmenu` */

insert  into `foodmenu`(`snum`,`description`,`price`,`pic`,`catg`,`Restaurant`) values (1,'Fried Rice',5000.00,'./food/310822165220images (14).jpg','English Food','PK Restaurant'),(2,'Semovita Swallow',3500.00,'./food/310822165327download (2).jpg','Afican Dish','PK Restaurant'),(3,'Jellof Rice',5000.00,'./food/310822165426download (5).jpg','Continental Dish','PK Restaurant'),(4,'Fried Plantain',2500.00,'./food/310822165458images (13).jpg','Afican Dish','PK Restaurant'),(5,'Turkey',1700.00,'./food/310822165533images (5).jpg','Sea Food','PK Restaurant'),(6,'Salad',2000.00,'./food/310822165719download (1).jpg','English Food','PK Restaurant');

/*Table structure for table `tbl_order` */

CREATE TABLE `tbl_order` (
  `sn` int(4) NOT NULL AUTO_INCREMENT,
  `id` int(4) DEFAULT NULL,
  `user` varchar(20) DEFAULT NULL,
  `dates` date DEFAULT NULL,
  `status` varchar(10) DEFAULT 'a',
  `price` double DEFAULT NULL,
  `product` varchar(20) DEFAULT NULL,
  `notice` varchar(100) DEFAULT 'Not Ready',
  PRIMARY KEY (`sn`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_order` */

insert  into `tbl_order`(`sn`,`id`,`user`,`dates`,`status`,`price`,`product`,`notice`) values (16,3,'ik','2022-09-01','p',5000,'Jellof Rice','Ready'),(23,6,'ik','2022-09-01','p',2000,'Salad','Ready'),(27,4,'ik','2022-09-01','p',2500,'Fried Plantain','Ready');

/*Table structure for table `tblidno` */

CREATE TABLE `tblidno` (
  `idno` int(10) DEFAULT NULL,
  `snum` int(3) NOT NULL AUTO_INCREMENT,
  `regno` int(10) DEFAULT NULL,
  `dno` int(10) DEFAULT NULL,
  `ticket` int(3) DEFAULT '0',
  PRIMARY KEY (`snum`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tblidno` */

insert  into `tblidno`(`idno`,`snum`,`regno`,`dno`,`ticket`) values (1,1,1,1,0);

/*Table structure for table `tblverify` */

CREATE TABLE `tblverify` (
  `acc` varchar(40) NOT NULL,
  `verified` varchar(5) DEFAULT NULL,
  `snum` varchar(5) NOT NULL,
  `amount` float(12,2) DEFAULT NULL,
  `token` varchar(30) DEFAULT NULL,
  `balance` float(12,2) DEFAULT NULL,
  PRIMARY KEY (`snum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tblverify` */

insert  into `tblverify`(`acc`,`verified`,`snum`,`amount`,`token`,`balance`) values ('2339078050110082','No','0',9500.00,'76607',1785000.00);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
