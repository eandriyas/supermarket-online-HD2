/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.32 : Database - pwl
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`pwl` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `pwl`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_admin` varchar(255) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`id_admin`,`username`,`password`,`nama_admin`,`last_login`) values (1,'admin','21232F297A57A5A743894A0E4A801FC3','admin_pwl','2013-12-22 07:32:46');

/*Table structure for table `barang` */

DROP TABLE IF EXISTS `barang`;

CREATE TABLE `barang` (
  `id_barang` int(20) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(50) NOT NULL,
  `deskripsi_barang` text NOT NULL,
  `id_kategori` int(20) NOT NULL,
  `stok` int(20) NOT NULL,
  `harga` int(20) NOT NULL,
  `gambar_besar` varchar(255) NOT NULL,
  PRIMARY KEY (`id_barang`),
  UNIQUE KEY `nama_barang` (`nama_barang`),
  KEY `id_kategori` (`id_kategori`),
  CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

/*Data for the table `barang` */

insert  into `barang`(`id_barang`,`nama_barang`,`deskripsi_barang`,`id_kategori`,`stok`,`harga`,`gambar_besar`) values (25,'Coca Cola Can 6x250ml','Coca Cola Can 6x250ml',6,65,28250,'8992761119812.jpg'),(26,'Agarasa Puding santan 130gr','Agarasa Puding santan 130gr',3,6,7850,'8992933461114.jpg'),(27,'Inaco Pudding Powder Coklat 21.5 Gr','Inaco Pudding Powder Coklat 21.5 Gr',3,17,3650,'8992726894129.jpg'),(28,'Xtragin Bandrek Plus','Xtragin Bandrek Plus Jahe Merah 5s 125gr',3,13,9800,'8997004910065.jpg'),(29,'Milo Actigen-e','Milo Actigen-e Scht 30x14gr',2,2,42050,'8992696422261.jpg'),(30,'Ratu Abon Sapi','Ratu Abon Sapi',3,19,22800,'2414031002014.jpg'),(31,'Abc Mackarel Tomato ','Abc Mackarel Tomato ',1,3,20200,'0711844330214.jpg'),(32,'Alpenliebe Strawberry','Alpenliebe Strawberry 125gr',1,15,6350,'8991115004019.jpg'),(33,'Kurang Asem Hot Rujak','Kurang Asem Hot Rujak 130 Gr*',1,29,5300,'8991102282222.jpg'),(34,'Sw Fruit Cocktail','Sw Fruit Cocktail In Heavy Syrup 30 Oz',2,1,53462,'0011194166830.jpg'),(35,'Lily Longan 3','Lily Longan 688 Gr',5,3,32850,'8851011111962.jpg'),(36,'Lily Longan','Lily Longan 688 Gr',5,3,32850,'8851011111962.jpg'),(37,'Lily Longan 2','Lily Longan 688 Gr 2',5,3,32850,'8851011111962.jpg'),(38,'Lily Longan 4','Lily Longan 688 Gr 2',5,3,32850,'8851011111962.jpg'),(39,'Erawan Lychees','Erawan Lychees In H Syrup 688 Gr',1,8,30830,'8851011110262.jpg'),(40,'Topi Koki','Beras dengan Cap Topi Koki',2,9,204000,'8995184704016.jpg');

/*Table structure for table `beli` */

DROP TABLE IF EXISTS `beli`;

CREATE TABLE `beli` (
  `id_barang` int(20) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `id_order` int(20) DEFAULT NULL,
  KEY `id_barang` (`id_barang`),
  KEY `id_order` (`id_order`),
  CONSTRAINT `beli_ibfk_2` FOREIGN KEY (`id_order`) REFERENCES `order_new` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `beli_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `beli` */

insert  into `beli`(`id_barang`,`jumlah`,`id_order`) values (28,5,69),(32,8,69),(25,3,70),(27,4,70),(25,3,71),(27,4,71),(25,3,72),(27,4,72),(25,3,73),(27,4,73),(25,3,74),(27,4,74);

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(255) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `kategori` */

insert  into `kategori`(`id_kategori`,`kategori`) values (1,'pakaian'),(2,'buah'),(3,'makanan ringan'),(4,'minuman'),(5,'sayur'),(6,'baju');

/*Table structure for table `order_new` */

DROP TABLE IF EXISTS `order_new`;

CREATE TABLE `order_new` (
  `id_order` int(20) NOT NULL AUTO_INCREMENT,
  `date_order` datetime DEFAULT NULL,
  `id_pelanggan` int(20) DEFAULT NULL,
  PRIMARY KEY (`id_order`),
  KEY `id_pelanggan` (`id_pelanggan`),
  CONSTRAINT `order_new_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

/*Data for the table `order_new` */

insert  into `order_new`(`id_order`,`date_order`,`id_pelanggan`) values (68,'2013-12-22 11:53:38',7),(69,'2013-12-22 12:05:58',7),(70,'2013-12-22 12:11:13',10),(71,'2013-12-22 12:20:50',10),(72,'2013-12-22 12:20:56',10),(73,'2013-12-22 12:22:08',10),(74,'2013-12-22 12:22:35',10);

/*Table structure for table `pelanggan` */

DROP TABLE IF EXISTS `pelanggan`;

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(20) NOT NULL AUTO_INCREMENT,
  `nama_pelanggan` varchar(25) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `ttl` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `pelanggan` */

insert  into `pelanggan`(`id_pelanggan`,`nama_pelanggan`,`alamat`,`ttl`,`email`,`password`) values (7,'andri','nga','1998-12-19','andri@gmail.com','78e55a9524a191f7628f82a20bcaa167'),(8,'indra','maguwo','1993-03-03','indraandriawansaputra@live.com','11438d924213b24199d4153bc18267cb'),(10,'indra andriawan saputra','amerika','1993-03-03','indra@gmail.com','382335daf50dd4914be06c87d51b99f3'),(14,'a','an','2013-10-10','admin@gmail.com','21232f297a57a5a743894a0e4a801fc3'),(15,'Prisca','Bandung','1993-10-28','prisca@gmail.com','e5aef89fdd6afdd63e0114c852b0f74c');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
