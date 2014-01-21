-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2014 at 12:36 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_admin` varchar(255) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_admin`, `last_login`) VALUES
(1, 'admin', '21232F297A57A5A743894A0E4A801FC3', 'admin_pwl', '2013-12-23 04:01:33');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` int(20) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(50) NOT NULL,
  `deskripsi_barang` text NOT NULL,
  `id_kategori` int(20) NOT NULL,
  `stok` int(20) NOT NULL,
  `harga` int(20) NOT NULL,
  `gambar_besar` varchar(255) NOT NULL,
  PRIMARY KEY (`id_barang`),
  UNIQUE KEY `nama_barang` (`nama_barang`),
  KEY `id_kategori` (`id_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `deskripsi_barang`, `id_kategori`, `stok`, `harga`, `gambar_besar`) VALUES
(25, 'Coca Cola Can 6x250mlq', 'Coca Cola Can 6x250ml', 6, 65, 2500, '8992761119812.jpg'),
(26, 'Agarasa Puding santan 130gr', 'Agarasa Puding santan 130gr', 3, 6, 7850, '8992933461114.jpg'),
(28, 'Xtragin Bandrek Plus', 'Xtragin Bandrek Plus Jahe Merah 5s 125gr', 3, 13, 9800, '8997004910065.jpg'),
(29, 'Milo Actigen-e', 'Milo Actigen-e Scht 30x14gr', 2, 2, 42050, '8992696422261.jpg'),
(30, 'Ratu Abon Sapi', 'Ratu Abon Sapi', 3, 19, 22800, '2414031002014.jpg'),
(31, 'Abc Mackarel Tomato ', 'Abc Mackarel Tomato ', 1, 3, 20200, '0711844330214.jpg'),
(32, 'Alpenliebe Strawberry', 'Alpenliebe Strawberry 125gr', 1, 15, 6350, '8991115004019.jpg'),
(33, 'Kurang Asem Hot Rujak', 'Kurang Asem Hot Rujak 130 Gr*', 1, 29, 5300, '8991102282222.jpg'),
(34, 'Sw Fruit Cocktail', 'Sw Fruit Cocktail In Heavy Syrup 30 Oz', 2, 1, 53462, '0011194166830.jpg'),
(35, 'Lily Longan 3', 'Lily Longan 688 Gr', 5, 3, 32850, '8851011111962.jpg'),
(36, 'Lily Longan', 'Lily Longan 688 Gr', 5, 3, 32850, '8851011111962.jpg'),
(37, 'Lily Longan 2', 'Lily Longan 688 Gr 2', 5, 3, 32850, '8851011111962.jpg'),
(38, 'Lily Longan 4', 'Lily Longan 688 Gr 2', 5, 3, 32850, '8851011111962.jpg'),
(39, 'Erawan Lychees', 'Erawan Lychees In H Syrup 688 Gr', 1, 8, 30830, '8851011110262.jpg'),
(40, 'Topi Koki', 'Beras dengan Cap Topi Koki', 2, 9, 204000, '8995184704016.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `beli`
--

CREATE TABLE IF NOT EXISTS `beli` (
  `id_barang` int(20) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `id_order` int(20) DEFAULT NULL,
  KEY `id_barang` (`id_barang`),
  KEY `id_order` (`id_order`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beli`
--

INSERT INTO `beli` (`id_barang`, `jumlah`, `id_order`) VALUES
(28, 5, 69),
(32, 8, 69),
(25, 3, 70),
(25, 3, 71),
(25, 3, 72),
(25, 3, 73),
(25, 3, 74),
(25, 3, 75);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(255) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'pakaian'),
(2, 'buah'),
(3, 'makanan ringan'),
(4, 'minuman'),
(5, 'sayur'),
(6, 'baju');

-- --------------------------------------------------------

--
-- Table structure for table `order_new`
--

CREATE TABLE IF NOT EXISTS `order_new` (
  `id_order` int(20) NOT NULL AUTO_INCREMENT,
  `date_order` datetime DEFAULT NULL,
  `id_pelanggan` int(20) DEFAULT NULL,
  PRIMARY KEY (`id_order`),
  KEY `id_pelanggan` (`id_pelanggan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=76 ;

--
-- Dumping data for table `order_new`
--

INSERT INTO `order_new` (`id_order`, `date_order`, `id_pelanggan`) VALUES
(68, '2013-12-22 11:53:38', 7),
(69, '2013-12-22 12:05:58', 7),
(70, '2013-12-22 12:11:13', 10),
(71, '2013-12-22 12:20:50', 10),
(72, '2013-12-22 12:20:56', 10),
(73, '2013-12-22 12:22:08', 10),
(74, '2013-12-22 12:22:35', 10),
(75, '2013-12-23 03:48:03', 14);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id_pelanggan` int(20) NOT NULL AUTO_INCREMENT,
  `nama_pelanggan` varchar(25) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `ttl` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat`, `ttl`, `email`, `password`) VALUES
(7, 'andri', 'nga', '1998-12-19', 'andri@gmail.com', '78e55a9524a191f7628f82a20bcaa167'),
(8, 'indra', 'maguwo', '1993-03-03', 'indraandriawansaputra@live.com', '11438d924213b24199d4153bc18267cb'),
(10, 'indra andriawan saputra', 'amerika', '1993-03-03', 'indra@gmail.com', '382335daf50dd4914be06c87d51b99f3'),
(14, 'a', 'an', '2013-10-10', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `beli`
--
ALTER TABLE `beli`
  ADD CONSTRAINT `beli_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `beli_ibfk_2` FOREIGN KEY (`id_order`) REFERENCES `order_new` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_new`
--
ALTER TABLE `order_new`
  ADD CONSTRAINT `order_new_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
