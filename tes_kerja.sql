/*
Navicat MySQL Data Transfer

Source Server         : ariazhar
Source Server Version : 50626
Source Host           : localhost:3306
Source Database       : tes_kerja

Target Server Type    : MYSQL
Target Server Version : 50626
File Encoding         : 65001

Date: 2017-02-27 08:29:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `No_Admin` varchar(10) NOT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Nama_Admin` varchar(40) DEFAULT NULL,
  `No_Hp` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`Id`,`No_Admin`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'AD-01', 'qwerty', 'Sayaka', '082283303737');
INSERT INTO `admin` VALUES ('2', 'AD-02', 'qwerty', 'Lampard', '081654298027');

-- ----------------------------
-- Table structure for dokumen
-- ----------------------------
DROP TABLE IF EXISTS `dokumen`;
CREATE TABLE `dokumen` (
  `Id` int(3) NOT NULL AUTO_INCREMENT,
  `Jenis_Dokumen` varchar(30) DEFAULT NULL,
  `Id_Mobil` varchar(30) DEFAULT NULL,
  `File` varchar(255) DEFAULT NULL,
  `Keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dokumen
-- ----------------------------
INSERT INTO `dokumen` VALUES ('44', 'STNK', 'MB-01', 'assets/gambar/stnk.jpg', 'No.12345');

-- ----------------------------
-- Table structure for master_mobil
-- ----------------------------
DROP TABLE IF EXISTS `master_mobil`;
CREATE TABLE `master_mobil` (
  `Id_Mobil` varchar(10) NOT NULL,
  `Nama_Mobil` varchar(30) NOT NULL,
  `No_Polisi` varchar(30) NOT NULL,
  `Status` char(10) CHARACTER SET utf8 DEFAULT NULL,
  `Harga` int(20) DEFAULT NULL,
  `Creator` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id_Mobil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of master_mobil
-- ----------------------------
INSERT INTO `master_mobil` VALUES ('MB-01', 'Toyota Avanza', 'B 1234 BB', 'Service', '200000', 'Sayaka');
INSERT INTO `master_mobil` VALUES ('MB-02', 'Toyota Innova', 'B 4321 AA', 'Available', '300000', 'Sayaka');
INSERT INTO `master_mobil` VALUES ('MB-03', 'Toyota Avanza', 'B 2222 RR', 'Available', '200000', 'Sayaka');
INSERT INTO `master_mobil` VALUES ('MB-05', 'Nissan Livina', 'B 5656 PP', 'Available', '250000', 'Sayaka');
INSERT INTO `master_mobil` VALUES ('MB-07', 'Toyota Yaris', 'A 5467 BB', 'Available', '200000', 'Sayaka');
INSERT INTO `master_mobil` VALUES ('MB-08', 'Isuzu Panther', 'B 4356 ZZ', 'Available', '250000', 'Sayaka');
INSERT INTO `master_mobil` VALUES ('MB-09', 'Nissan Serena', 'B 6765 MM', 'Available', '500000', 'Jasmine');
INSERT INTO `master_mobil` VALUES ('MB-10', 'Daihatsu Terios', 'B 4983 YU', 'Available', '250000', 'Jasmine');
INSERT INTO `master_mobil` VALUES ('MB-12', 'Toyota Yaris', 'B 9089 QF', 'Available', '200000', 'Jasmine');
INSERT INTO `master_mobil` VALUES ('MB-13', 'Toyota Sigra', 'B 3782 OI', 'Available', '150000', 'Sayaka');
INSERT INTO `master_mobil` VALUES ('MB-14', 'Honda Jazz', 'B 5389 QU', 'Booking', '300000', 'Sayaka');
INSERT INTO `master_mobil` VALUES ('MB-15', 'Daihatsu Ayla', 'B 3298 AQ', 'Available', '250000', 'Fabregas');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nama` varchar(30) DEFAULT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Jabatan` varchar(30) DEFAULT NULL,
  `Level` int(2) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'Sayaka Yamamoto', 'Sayaka', 'qwerty', 'Admin', '1');
INSERT INTO `user` VALUES ('2', 'Ari Azhar', 'Ari', 'qwerty', 'Admin', '1');
INSERT INTO `user` VALUES ('3', 'Didier Drogba', 'Drogba', 'qwerty', 'Admin', '1');
INSERT INTO `user` VALUES ('4', 'Jasmine Lee', 'Jasmine', 'qwerty', 'Admin', '1');
INSERT INTO `user` VALUES ('5', 'Cesc Fabregas', 'Fabregas', 'qwerty', 'Admin', '1');

-- ----------------------------
-- View structure for dokumen_view
-- ----------------------------
DROP VIEW IF EXISTS `dokumen_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `dokumen_view` AS select Id, Jenis_Dokumen, CONCAT(master_mobil.Id_Mobil,'   ',master_mobil.Nama_Mobil) as Id_Mobil, Keterangan, File from dokumen 
join MASTER_mobil on master_mobil.Id_Mobil = dokumen.Id_Mobil ;

-- ----------------------------
-- View structure for excel_view
-- ----------------------------
DROP VIEW IF EXISTS `excel_view`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`  VIEW `excel_view` AS SELECT Id_Mobil, Nama_Mobil, No_Polisi, `Status`, Harga, Nama, Jabatan FROM master_mobil 
JOIN `user` on `user`.Username = master_mobil.Creator ;
