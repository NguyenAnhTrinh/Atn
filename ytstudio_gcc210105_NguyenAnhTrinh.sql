-- MariaDB dump 10.19  Distrib 10.4.27-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: ytstudio_gcc210105
-- ------------------------------------------------------
-- Server version	10.4.27-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `ytstudio_gcc210105`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `ytstudio_gcc210105` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci */;

USE `ytstudio_gcc210105`;

--
-- Table structure for table `at0510_product`
--

DROP TABLE IF EXISTS `at0510_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `at0510_product` (
  `pid` varchar(50) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Price` decimal(8,0) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `Description` varchar(100) DEFAULT NULL,
  `Image` varchar(500) DEFAULT NULL,
  `Quantity` int(255) NOT NULL,
  `Cat_ID` varchar(50) NOT NULL,
  PRIMARY KEY (`pid`),
  KEY `product_cat_id` (`Cat_ID`),
  CONSTRAINT `product_cat_id` FOREIGN KEY (`Cat_ID`) REFERENCES `tbl_cat` (`Cat_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `at0510_product`
--

LOCK TABLES `at0510_product` WRITE;
/*!40000 ALTER TABLE `at0510_product` DISABLE KEYS */;
INSERT INTO `at0510_product` VALUES ('Chanel1','Coco Mademoiselle 100ml',1000,1,'\r\nCOCO MADEMOISELLE Eau de Parfum Intense is the scent of a free and seductive woman. A personality ','chanel-coco-mademoiselle-intense_454b018683d2432ba28a61406041a508_1024x1024.webp',53,'c01'),('Chanel2','Chanel N°5 EDP Red Edition 100ml',1700,1,'\r\nN°5, the scent of a woman. The vibrant and fragrant flower blends with the aldehyde note, encased ','chanel-n52020Dec25163259.jpg',83,'c01'),('Chanel3','Bleu de chanel 100ml',1200,1,'\r\nThe song celebrates masculine freedom expressed in a seductive and classic woody fragrance, contai','bleu-de-chanel-eau-de-parfum-chanel-for-men-1-e1667270065426.jpg',23,'c01'),('Chanel4','Gabrielle Essence EDP 100ml',1500,1,'\r\nA sensual and vibrant floral fragrance crafted by Olivier Polge, perfumer of CHANEL.\r\nInspired by ','nuoc-hoa-nu-chanel-gabrielle-essence-edp-100ml-62061cd016e2d-11022022152240.jpg',24,'c01'),('Chanel5','Allure Homme Sport Eau Extreme 100ml',1500,1,'\r\nPerfume with a blend of herbs and musk.\r\nThe mans fierce and feisty charm never gives in.','nuoc-hoa-nam-chanel-allure-homme-sport-eau-extreme-edp-100ml-628f302b6d6c2-26052022144547.jpg',10,'c01'),('Chanel6','Coco Mademoiselle L Eau Privee 100ml',9500,1,'\r\nInspired by Gabrielle Chanel, GABRIELLE CHANEL ESSENCE represents the woman who always knows what ','nuoc-hoa-nu-chanel-coco-mademoiselle-l-eau-privee-100ml-628ef039b620b-26052022101257.jpg',14,'c01'),('LouisVuitton1','Spell on you 100ml',1500,1,'\r\nDubbed as one of the class and extremely warm fragrances from the house of Louis Vuitton through t','315561670_10166930341670125_563552601982318357_n.png',5,'l01'),('LouisVuitton2','Kilian Good Girl Gone Bad 100ml',2300,1,'\r\nDubbed as one of the class and extremely warm fragrances from the house of Louis Vuitton through t','kilian_good_girl_gone_bad_edp_8cd5a04016154ae6ae11c17c89b4f33a_master.webp',123,'l01'),('LouisVuitton3','Les Sables Rose EDP 100ml',5000,1,'\r\nDubbed as one of the class and extremely warm fragrances from the house of Louis Vuitton through t','shopping.webp',23,'l01'),('LouisVuitton4','Meteore EDP 100ml',4000,1,'\r\nDubbed as one of the class and extremely warm fragrances from the house of Louis Vuitton through t','shopping (1).webp',93,'l01'),('LouisVuitton5','California Dream (LP0175) 100ml',2000,1,'\r\nDubbed as one of the class and extremely warm fragrances from the house of Louis Vuitton through t','z3524113416071_96a0bd9b266f18f5fd1dafbff443e455.jpg',193,'l01'),('LouisVuitton6',' Yves Saint Laurent Libre 100ml',2000,1,'\r\nDubbed as one of the class and extremely warm fragrances from the house of Louis Vuitton through t','Laurent Libre.jpg',13,'l01'),('Versace1','Eros Eau de Parfum 100 ml.',2000,1,'Masculine and confident, the new Eros Eau de Parfum is a fragrance for a bold, passionate man. The s','281159645_4763675230403571_3988960949631620685_n.jpg',100,'v01'),('Versace2','Versace bright crytal 100ml',1999,1,'\r\nA sensual and feminine fragrance, symbolising the Versace woman who is confident and sure of her c','versace-bright-crystal_405b9f59113d48dea5e79fd1dd3a99e9_master.webp',20,'v01'),('Versace3','Versace pour home 100ml',1700,1,'\r\nEau de toilette natural spray 100 ml\r\nDiamante Citrus, Bitter Orange leaves and Neiroli flowers li','versace-pour-homme_aac4a84bdbdf400fb3140f176b64373a_grande.webp',50,'v01'),('Versace4','Flame eau de parfume 100ml',1600,1,'In a fiery red bottle, Eros Flame is the fragrance of love and passion, deeply masculine and intense','versace-eros-flame-eau-de-parfum-100ml_a0a41c8b63f249c89238b1284e9a4878_grande.webp',75,'v01'),('Versace5','Dylan blue 100ml',3000,1,'\r\nA strong, masculine fragrance, Dylan Blue encapsulates the sensual scents of the Mediterranean. Th','versace_pour_homme_dylan_blue_edt_sp.webp',65,'v01'),('Versace6','Versace Dylan Blue Pour Femme 100ml',6000,1,'\r\nIn the words of Donatella Versace, \"Dylan Blue pour femme is a tribute to femininity. It is a stro','Versace-Dylan-Blue-Pour-Femme.jpg',69,'v01');
/*!40000 ALTER TABLE `at0510_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nat05_cart`
--

DROP TABLE IF EXISTS `nat05_cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nat05_cart` (
  `cid` int(20) NOT NULL AUTO_INCREMENT,
  `pid` varchar(50) NOT NULL,
  `cquantity` int(10) NOT NULL,
  `udi` int(11) NOT NULL,
  PRIMARY KEY (`cid`),
  KEY `pid` (`pid`),
  KEY `udi` (`udi`),
  CONSTRAINT `add_cart` FOREIGN KEY (`pid`) REFERENCES `at0510_product` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nat05_cart`
--

LOCK TABLES `nat05_cart` WRITE;
/*!40000 ALTER TABLE `nat05_cart` DISABLE KEYS */;
INSERT INTO `nat05_cart` VALUES (9,'Versace6',2,8),(15,'Chanel2',1,7),(17,'Chanel2',9,22),(18,'LouisVuitton3',1,22),(19,'Chanel3',2,22);
/*!40000 ALTER TABLE `nat05_cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ny2408_user`
--

DROP TABLE IF EXISTS `ny2408_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ny2408_user` (
  `udi` int(11) NOT NULL AUTO_INCREMENT,
  `usrName` varchar(10) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `conpass` varchar(20) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `txtbirth` date NOT NULL,
  `Address` varchar(600) NOT NULL,
  PRIMARY KEY (`udi`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ny2408_user`
--

LOCK TABLES `ny2408_user` WRITE;
/*!40000 ALTER TABLE `ny2408_user` DISABLE KEYS */;
INSERT INTO `ny2408_user` VALUES (6,'ngocyen','fcea920f7412b5da7be0','fcea920f7412b5da7be0','0919723728','trinhnagcc210105@fpt.edu.vn','2022-12-15','Soc trang'),(7,'ngocyen','hihihi','hihihi','0919723728','trinhnagcc210105@fpt.edu.vn','2022-12-23','Soc trang'),(8,'trinhdz','1234567','1234567','0919723728','trinhnagcc210105@fpt.edu.vn','2022-12-15','Soc trang'),(21,'anhtrinh','1234567','1234567','0919723728','trinhnagcc210105@fpt.edu.vn','2022-12-23','ap hoa nhan, xa hoa tu1, huyen my xuyen, tinh soc trang'),(22,'Anhtrinh','123456','123456','1234567890','trinhnagcc210105@fpt.edu.vn','2022-12-08','Soc trang');
/*!40000 ALTER TABLE `ny2408_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl-billdetail`
--

DROP TABLE IF EXISTS `tbl-billdetail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl-billdetail` (
  `bdid` int(11) NOT NULL AUTO_INCREMENT,
  `bid` int(11) NOT NULL,
  `pid` varchar(50) NOT NULL,
  `bquan` int(11) NOT NULL,
  PRIMARY KEY (`bdid`),
  KEY `pid` (`pid`),
  KEY `detail1` (`bid`),
  CONSTRAINT `detail1` FOREIGN KEY (`bid`) REFERENCES `tbl_bill` (`bid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl-billdetail_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `at0510_product` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl-billdetail`
--

LOCK TABLES `tbl-billdetail` WRITE;
/*!40000 ALTER TABLE `tbl-billdetail` DISABLE KEYS */;
INSERT INTO `tbl-billdetail` VALUES (1,1,'LouisVuitton3',3),(2,1,'Versace6',1),(3,1,'LouisVuitton2',1),(4,2,'Chanel3',1),(5,3,'Chanel2',9),(6,4,'Chanel2',9);
/*!40000 ALTER TABLE `tbl-billdetail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_bill`
--

DROP TABLE IF EXISTS `tbl_bill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_bill` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `Total` decimal(8,0) NOT NULL,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`bid`),
  KEY `uid` (`uid`),
  CONSTRAINT `bill_udi` FOREIGN KEY (`uid`) REFERENCES `ny2408_user` (`udi`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_bill`
--

LOCK TABLES `tbl_bill` WRITE;
/*!40000 ALTER TABLE `tbl_bill` DISABLE KEYS */;
INSERT INTO `tbl_bill` VALUES (1,23300,7),(2,1200,22),(3,15300,22),(4,15300,22);
/*!40000 ALTER TABLE `tbl_bill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_cat`
--

DROP TABLE IF EXISTS `tbl_cat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_cat` (
  `Cat_ID` varchar(50) NOT NULL,
  `CatName` varchar(30) NOT NULL,
  PRIMARY KEY (`Cat_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_cat`
--

LOCK TABLES `tbl_cat` WRITE;
/*!40000 ALTER TABLE `tbl_cat` DISABLE KEYS */;
INSERT INTO `tbl_cat` VALUES ('c01','Chanel'),('l01','Louis Vuitton'),('v01','Versace');
/*!40000 ALTER TABLE `tbl_cat` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-17 20:03:34
