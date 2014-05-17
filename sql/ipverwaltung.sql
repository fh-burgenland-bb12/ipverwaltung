-- MySQL dump 10.13  Distrib 5.1.73, for redhat-linux-gnu (x86_64)
--
-- Host: localhost    Database: ipverwaltung
-- ------------------------------------------------------
-- Server version	5.1.73-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `firewall`
--

DROP TABLE IF EXISTS `firewall`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `firewall` (
  `firewallId` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `typId` smallint(5) unsigned NOT NULL,
  `seriennummer` varchar(45) NOT NULL,
  `inventarnummer` varchar(45) NOT NULL,
  `lieferdatum` date NOT NULL,
  `managementIp` varchar(15) NOT NULL,
  `gateway` varchar(15) NOT NULL,
  `bemerkung` varchar(500) DEFAULT NULL,
  `proxyIp` varchar(15) DEFAULT NULL,
  `proxyport` smallint(5) unsigned DEFAULT NULL,
  `standortId` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`firewallId`),
  KEY `fk_fw_typ_idx` (`typId`),
  KEY `fk_fw_stand_idx` (`standortId`),
  CONSTRAINT `fk_fw_stand` FOREIGN KEY (`standortId`) REFERENCES `standort` (`standortId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_fw_typ` FOREIGN KEY (`typId`) REFERENCES `typ` (`typId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `firewall`
--

LOCK TABLES `firewall` WRITE;
/*!40000 ALTER TABLE `firewall` DISABLE KEYS */;
/*!40000 ALTER TABLE `firewall` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `firewallInterface`
--

DROP TABLE IF EXISTS `firewallInterface`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `firewallInterface` (
  `interfaceId` int(11) NOT NULL AUTO_INCREMENT,
  `firewallId` mediumint(8) unsigned NOT NULL,
  `typ` enum('extern','intern') NOT NULL DEFAULT 'intern',
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`interfaceId`),
  KEY `fk_fw_fw_int_idx` (`firewallId`),
  CONSTRAINT `fk_fw_fw_int` FOREIGN KEY (`firewallId`) REFERENCES `firewall` (`firewallId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `firewallInterface`
--

LOCK TABLES `firewallInterface` WRITE;
/*!40000 ALTER TABLE `firewallInterface` DISABLE KEYS */;
/*!40000 ALTER TABLE `firewallInterface` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `firewallInterfaceIp`
--

DROP TABLE IF EXISTS `firewallInterfaceIp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `firewallInterfaceIp` (
  `interfaceId` int(11) NOT NULL,
  `ipadresse` varchar(15) NOT NULL,
  `vlanId` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`interfaceId`,`ipadresse`),
  KEY `fk_fwintip_fwint_idx` (`interfaceId`),
  KEY `fk_fwintip_vlan_idx` (`vlanId`),
  CONSTRAINT `fk_fwintip_fwint` FOREIGN KEY (`interfaceId`) REFERENCES `firewallInterface` (`interfaceId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_fwintip_vlan` FOREIGN KEY (`vlanId`) REFERENCES `vlan` (`vlanId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `firewallInterfaceIp`
--

LOCK TABLES `firewallInterfaceIp` WRITE;
/*!40000 ALTER TABLE `firewallInterfaceIp` DISABLE KEYS */;
/*!40000 ALTER TABLE `firewallInterfaceIp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `firewallNat`
--

DROP TABLE IF EXISTS `firewallNat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `firewallNat` (
  `firewallId1` mediumint(8) unsigned NOT NULL,
  `firewallId2` mediumint(8) unsigned NOT NULL,
  `standortId` smallint(5) unsigned NOT NULL,
  `ip1` varchar(15) NOT NULL,
  `port1` smallint(5) unsigned NOT NULL,
  `ip2` varchar(15) NOT NULL,
  `port2` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`firewallId1`,`firewallId2`,`standortId`),
  KEY `fk_fw1_nat_idx` (`firewallId1`),
  KEY `fk_fw2_nat_idx` (`firewallId2`),
  KEY `fk_nat_stand_idx` (`standortId`),
  CONSTRAINT `fk_fw1_nat` FOREIGN KEY (`firewallId1`) REFERENCES `firewall` (`firewallId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_fw2_nat` FOREIGN KEY (`firewallId2`) REFERENCES `firewall` (`firewallId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_nat_stand` FOREIGN KEY (`standortId`) REFERENCES `standort` (`standortId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `firewallNat`
--

LOCK TABLES `firewallNat` WRITE;
/*!40000 ALTER TABLE `firewallNat` DISABLE KEYS */;
/*!40000 ALTER TABLE `firewallNat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `firewalldhcp`
--

DROP TABLE IF EXISTS `firewalldhcp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `firewalldhcp` (
  `firewalldhcpId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firewallId` mediumint(8) unsigned NOT NULL,
  `rangebeginn` varchar(15) NOT NULL,
  `rangeende` varchar(15) NOT NULL,
  `vlanId` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`firewalldhcpId`),
  KEY `fk_fwdhcp_fw_idx` (`firewallId`),
  KEY `fk_fwdhcp_vlan_idx` (`vlanId`),
  CONSTRAINT `fk_fwdhcp_fw` FOREIGN KEY (`firewallId`) REFERENCES `firewall` (`firewallId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_fwdhcp_vlan` FOREIGN KEY (`vlanId`) REFERENCES `vlan` (`vlanId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `firewalldhcp`
--

LOCK TABLES `firewalldhcp` WRITE;
/*!40000 ALTER TABLE `firewalldhcp` DISABLE KEYS */;
/*!40000 ALTER TABLE `firewalldhcp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `firma`
--

DROP TABLE IF EXISTS `firma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `firma` (
  `firmaId` smallint(5) unsigned NOT NULL,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`firmaId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `firma`
--

LOCK TABLES `firma` WRITE;
/*!40000 ALTER TABLE `firma` DISABLE KEYS */;
/*!40000 ALTER TABLE `firma` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `group`
--

DROP TABLE IF EXISTS `group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `group` (
  `groupId` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`groupId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group`
--

LOCK TABLES `group` WRITE;
/*!40000 ALTER TABLE `group` DISABLE KEYS */;
INSERT INTO `group` VALUES (1,'guest'),(2,'admin');
/*!40000 ALTER TABLE `group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groupPermission`
--

DROP TABLE IF EXISTS `groupPermission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groupPermission` (
  `groupId` smallint(5) unsigned NOT NULL,
  `permissionId` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`groupId`,`permissionId`),
  KEY `permissionId_idx` (`permissionId`),
  KEY `groupId_idx` (`groupId`),
  CONSTRAINT `fk_group_perm` FOREIGN KEY (`groupId`) REFERENCES `group` (`groupId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permissionId` FOREIGN KEY (`permissionId`) REFERENCES `permission` (`permissionId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='m:n relation of groups to permissions';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groupPermission`
--

LOCK TABLES `groupPermission` WRITE;
/*!40000 ALTER TABLE `groupPermission` DISABLE KEYS */;
INSERT INTO `groupPermission` VALUES (1,1),(2,2);
/*!40000 ALTER TABLE `groupPermission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `land`
--

DROP TABLE IF EXISTS `land`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `land` (
  `landId` smallint(5) unsigned NOT NULL,
  `iso` char(3) NOT NULL,
  `bezeichnung` varchar(120) NOT NULL,
  PRIMARY KEY (`landId`),
  UNIQUE KEY `iso_UNIQUE` (`iso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `land`
--

LOCK TABLES `land` WRITE;
/*!40000 ALTER TABLE `land` DISABLE KEYS */;
/*!40000 ALTER TABLE `land` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission`
--

DROP TABLE IF EXISTS `permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission` (
  `permissionId` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `module` varchar(45) NOT NULL DEFAULT 'web',
  `controller` varchar(45) NOT NULL,
  `action` varchar(45) NOT NULL DEFAULT 'index',
  PRIMARY KEY (`permissionId`),
  UNIQUE KEY `comb_UNIQUE` (`module`,`controller`,`action`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='Permissions that are possible';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission`
--

LOCK TABLES `permission` WRITE;
/*!40000 ALTER TABLE `permission` DISABLE KEYS */;
INSERT INTO `permission` VALUES (1,'web','auth','login'),(2,'web','home','');
/*!40000 ALTER TABLE `permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `standort`
--

DROP TABLE IF EXISTS `standort`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `standort` (
  `standortId` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `bezeichnung` varchar(45) NOT NULL,
  `adresse` varchar(250) NOT NULL,
  `firmaId` smallint(5) unsigned NOT NULL,
  `landId` smallint(5) unsigned NOT NULL,
  `gpscoords` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`standortId`),
  KEY `fk_stand_firma_idx` (`firmaId`),
  KEY `fk_stand_land_idx` (`landId`),
  CONSTRAINT `fk_stand_firma` FOREIGN KEY (`firmaId`) REFERENCES `firma` (`firmaId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_stand_land` FOREIGN KEY (`landId`) REFERENCES `land` (`landId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `standort`
--

LOCK TABLES `standort` WRITE;
/*!40000 ALTER TABLE `standort` DISABLE KEYS */;
/*!40000 ALTER TABLE `standort` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typ`
--

DROP TABLE IF EXISTS `typ`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `typ` (
  `typId` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `art` enum('FW','AP') NOT NULL DEFAULT 'FW',
  `bezeichnung` varchar(500) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`typId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typ`
--

LOCK TABLES `typ` WRITE;
/*!40000 ALTER TABLE `typ` DISABLE KEYS */;
/*!40000 ALTER TABLE `typ` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `userId` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `email` varchar(200) NOT NULL,
  `salt` char(5) NOT NULL,
  `password` char(40) NOT NULL,
  `status` enum('active','disabled') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`userId`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='consists of all the application users';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','admin@example.com','ajkng','4fd91aec0cb1c1526c5be2c27c56e5d070ab3c02','active');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userGroup`
--

DROP TABLE IF EXISTS `userGroup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userGroup` (
  `userId` mediumint(8) unsigned NOT NULL,
  `groupId` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`userId`,`groupId`),
  KEY `userId_idx` (`userId`),
  KEY `groupId_idx` (`groupId`),
  CONSTRAINT `fk_user_group` FOREIGN KEY (`groupId`) REFERENCES `group` (`groupId`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `userId` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='m:n relation between users and groups';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userGroup`
--

LOCK TABLES `userGroup` WRITE;
/*!40000 ALTER TABLE `userGroup` DISABLE KEYS */;
INSERT INTO `userGroup` VALUES (1,2);
/*!40000 ALTER TABLE `userGroup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vlan`
--

DROP TABLE IF EXISTS `vlan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vlan` (
  `vlanId` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `bezeichnung` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`vlanId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vlan`
--

LOCK TABLES `vlan` WRITE;
/*!40000 ALTER TABLE `vlan` DISABLE KEYS */;
/*!40000 ALTER TABLE `vlan` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-04-18 21:03:37
