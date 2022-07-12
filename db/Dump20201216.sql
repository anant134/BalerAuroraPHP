CREATE DATABASE  IF NOT EXISTS `tourbooking` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */;
USE `tourbooking`;
-- MySQL dump 10.13  Distrib 8.0.20, for Win64 (x86_64)
--
-- Host: localhost    Database: tourbooking
-- ------------------------------------------------------
-- Server version	8.0.15

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tblboat`
--

DROP TABLE IF EXISTS `tblboat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblboat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) DEFAULT NULL,
  `isactive` bit(1) DEFAULT b'1',
  `createdby` int(11) DEFAULT NULL,
  `createdon` datetime DEFAULT NULL,
  `modifiedby` int(11) DEFAULT NULL,
  `modifiedon` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblfees`
--

DROP TABLE IF EXISTS `tblfees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblfees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) DEFAULT NULL,
  `price` decimal(18,2) DEFAULT '0.00',
  `isactive` bit(1) DEFAULT b'1',
  `createdby` int(11) DEFAULT NULL,
  `createdon` datetime DEFAULT CURRENT_TIMESTAMP,
  `modifiedby` int(11) DEFAULT NULL,
  `modifiedon` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblrole`
--

DROP TABLE IF EXISTS `tblrole`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblrole` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `rolename` varchar(100) NOT NULL,
  `createdby` int(100) DEFAULT NULL,
  `createdon` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modifiedby` int(100) DEFAULT NULL,
  `modifiedon` timestamp NULL DEFAULT NULL,
  `isactive` bit(1) DEFAULT b'1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblslots`
--

DROP TABLE IF EXISTS `tblslots`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblslots` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) DEFAULT NULL,
  `starttime` time DEFAULT NULL,
  `endtime` time DEFAULT NULL,
  `createby` int(11) DEFAULT NULL,
  `createdon` datetime DEFAULT CURRENT_TIMESTAMP,
  `modifiedby` int(11) DEFAULT NULL,
  `modifiedon` datetime DEFAULT NULL,
  `isactive` bit(1) DEFAULT b'1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbluser`
--

DROP TABLE IF EXISTS `tbluser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbluser` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `createdby` int(100) DEFAULT NULL,
  `roleid` int(100) DEFAULT NULL,
  `createdon` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modifiedby` int(100) DEFAULT NULL,
  `modifiedon` timestamp NULL DEFAULT NULL,
  `isactive` bit(1) DEFAULT b'1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tblvehicle`
--

DROP TABLE IF EXISTS `tblvehicle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblvehicle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `typeofvehicle` varchar(100) DEFAULT NULL,
  `amount` decimal(18,2) DEFAULT NULL,
  `createdby` int(11) DEFAULT NULL,
  `createdon` datetime DEFAULT CURRENT_TIMESTAMP,
  `modifiedby` int(11) DEFAULT NULL,
  `modifiedon` datetime DEFAULT NULL,
  `isactive` bit(1) DEFAULT b'1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping events for database 'tourbooking'
--

--
-- Dumping routines for database 'tourbooking'
--
/*!50003 DROP PROCEDURE IF EXISTS `sp_boat` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_boat`(params JSON)
BEGIN
    DECLARE isactivestatus INT DEFAULT 0;
	declare flag varchar(20);
    SET flag=params->>'$.flag';
    if (flag='i') then
		INSERT INTO tblboat
        (`description`,`createdby`)
		VALUES
        (params->>'$.description',params->>'$.loggedinid');
		SELECT  0 as errflag,LAST_INSERT_ID() as rowid;
	elseif(flag='u') then
		set isactivestatus=params->>'$.isactive';
		
		UPDATE tblboat
		SET
		`description` = (params->>'$.description'),
		`isactive` = isactivestatus,
		`modifiedby` =(params->>'$.loggedinid'),
		`modifiedon` = now()
		WHERE `id` =(params->>'$.id');
		SELECT  0 as errflag,params->>'$.id' as rowid;

    end if;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_fee` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_fee`(params JSON)
BEGIN
DECLARE errflag INT DEFAULT 0;
    DECLARE isactivestatus INT DEFAULT 0;
    declare flag varchar(20);
     SET flag=params->>'$.flag';
	if (flag='i') then
		INSERT INTO tblfees(`description`,`price`,`createdby`,`createdon`)
		VALUES
        (params->>'$.description',params->>'$.price',params->>'$.loggedinid',now());
		SELECT  0 as errflag,LAST_INSERT_ID() as rowid;
	elseif(flag='u') then
		set isactivestatus=params->>'$.isactive';
		update tblfees
        set 
        description=params->>'$.description',
        price=params->>'$.price',
        isactive=isactivestatus
        where id =params->>'$.id';
        SELECT  0 as errflag,params->>'$.id' as rowid;
    end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_getboat` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getboat`(params JSON)
BEGIN
declare flag varchar(20);
    SET flag=params->>'$.flag';
    IF flag="actv" Then
		SELECT id,description,isactive FROM tblboat
        where isactive=1;
	elseif flag="a" then
		SELECT id,description,isactive FROM tblboat;
	elseif flag="byid" then
		SELECT id,description,isactive FROM tblboat
        where id=(params->>'$.id') ;
	
    END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_getfees` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getfees`(params JSON)
BEGIN
	declare flag varchar(20);
    SET flag=params->>'$.flag';
    IF flag="actv" Then
		SELECT id,description,price,isactive,createdby,createdon,modifiedby,modifiedon
		FROM tblfees
        where isactive=1;
	elseif flag="a" then
		SELECT id,description,price,isactive,createdby,createdon,modifiedby,modifiedon
		FROM tblfees;
	elseif flag="byid" then
		SELECT id,description,price,isactive,createdby,createdon,modifiedby,modifiedon
		FROM tblfees
        where id=(params->>'$.id') ;
	
    END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_getrole` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getrole`(params JSON)
BEGIN
	declare flag varchar(20);
    SET flag=params->>'$.flag';
    IF flag="actv" Then
		SELECT id,rolename,createdby,createdon,modifiedby,modifiedon,isactive
		FROM tblrole where isactive=1 and id<>1;
	elseif flag="a" Then
		SELECT id,rolename,createdby,createdon,modifiedby,modifiedon,isactive
		FROM tblrole where  id<>1;
	elseif flag="byid" Then
		SELECT id,rolename,createdby,createdon,modifiedby,modifiedon,isactive
		FROM tblrole where id=(params->>'$.id');
    END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_getslots` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getslots`(params JSON)
BEGIN
	declare flag varchar(20);
    SET flag=params->>'$.flag';
    IF flag="actv" Then
		SELECT id,description,starttime,endtime,createby,createdon,modifiedby,modifiedon,isactive
		FROM tblslots
        where isactive=1;
	elseif flag="a" then
		SELECT id,description,starttime,endtime,createby,createdon,modifiedby,modifiedon,isactive
		FROM tblslots;
	elseif flag="byid" then
		SELECT id,description,starttime,endtime,createby,createdon,modifiedby,modifiedon,isactive
		FROM tblslots
        where id=(params->>'$.id') ;
    END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_getuser` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getuser`(params JSON)
BEGIN
declare flag varchar(20);
    SET flag=params->>'$.flag';
    IF flag="auth" Then
		SELECT u.id, u.username, u.password, u.email, u.createdby, u.roleid,r.rolename,
        u.createdon, u.modifiedby, u.modifiedon FROM tbluser u
        left join tblrole r on u.roleid=r.id
		where (u.email=(params->>'$.username') or u.username=(params->>'$.username'))
        and u.password=(params->>'$.password') 
		and u.isactive=1;
    END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_getuserinfo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getuserinfo`(params JSON)
BEGIN
	declare flag varchar(20);
    SET flag=params->>'$.flag';
     IF flag="actv" Then
		SELECT u.id, u.username, u.password, u.email, u.createdby,
        u.roleid,r.rolename,u.isactive,
        u.createdon, u.modifiedby, u.modifiedon FROM tbluser u
        left join tblrole r on u.roleid=r.id
		where u.isactive=1 and u.roleid<>1;
	 elseif flag="a" Then
		SELECT u.id, u.username, u.password, u.email, u.createdby, u.roleid,r.rolename,
        u.createdon, u.modifiedby, u.modifiedon,u.isactive FROM tbluser u
		left join tblrole r on u.roleid=r.id
        where  u.roleid<>1;
	elseif flag="byid" Then
		SELECT u.id, u.username, u.password, u.email, u.createdby, u.roleid,r.rolename,
        u.createdon, u.modifiedby, u.modifiedon,u.isactive FROM tbluser u
        left join tblrole r on u.roleid=r.id
        where u.id=(params->>'$.id') and u.roleid<>1;
	 END IF;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_getvehicle` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getvehicle`(params JSON)
BEGIN
	declare flag varchar(20);
    SET flag=params->>'$.flag';
    IF flag="actv" Then
		SELECT id,typeofvehicle,amount,createdby,createdon,modifiedby,modifiedon,isactive
		FROM tblvehicle where isactive=1;
	elseif flag="a" then
		SELECT id,typeofvehicle,amount,createdby,createdon,modifiedby,modifiedon,isactive
		FROM tblvehicle;
	elseif flag="byid" then
		SELECT id,typeofvehicle,amount,createdby,createdon,modifiedby,modifiedon,isactive
		FROM tblvehicle
        where id=(params->>'$.id') ;
	
    END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_slot` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_slot`(params JSON)
BEGIN
	DECLARE isactivestatus INT DEFAULT 0;
    declare flag varchar(20);
	SET flag=params->>'$.flag';
    if (flag='i') then
		INSERT INTO tblslots
        (`description`,`starttime`,`endtime`,`createby`)
		VALUES
        (params->>'$.description',params->>'$.starttime',params->>'$.endtime',params->>'$.loggedinid');
		SELECT  0 as errflag,LAST_INSERT_ID() as rowid;
     elseif(flag='u') then   
        set isactivestatus=params->>'$.isactive';
        UPDATE tblslots
		SET
		`description` = params->>'$.description',
		`starttime` = params->>'$.starttime',
		`endtime` = params->>'$.endtime',
		`modifiedby` = params->>'$.loggedinid',
		`modifiedon` = now(),
		`isactive` =isactivestatus
		WHERE `id` = params->>'$.id';
        SELECT  0 as errflag,params->>'$.id' as rowid;

        
    end if;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_user` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_user`(params JSON)
BEGIN
	DECLARE errflag INT DEFAULT 0;
    DECLARE isactive INT DEFAULT 0;
    declare flag varchar(20);
    declare isupdatepassword varchar(20);
    SET flag=params->>'$.flag';
	if (flag='i') then
		INSERT INTO tbluser
        (`username`,`password`,`email`,`createdby`,`roleid`,`createdon`)
		VALUES
		(params->>'$.username',params->>'$.password',params->>'$.email',
        params->>'$.loggedinid',params->>'$.roleid',now());
		SELECT  0 as errflag,LAST_INSERT_ID() as rowid;
	elseif (flag='u') then
		SET isupdatepassword=params->>'$.isupdatepassword';
        set isactive=params->>'$.isactive';
        if(isupdatepassword='0') then
			update tbluser
			set 
            username=params->>'$.username',
            isactive=isactive,
            email=params->>'$.email',
            roleid=params->>'$.roleid',
            modifiedon=now(),
            modifiedby=params->>'$.loggedinid'
			where id=params->>'$.id';
			SELECT  0 as errflag,params->>'$.id' as rowid;
		else
			update tbluser
			set 
            username=params->>'$.username',
            isactive=isactive,
            email=params->>'$.email',
            roleid=params->>'$.roleid',
            password=params->>'$.password',
            modifiedon=now(),
            modifiedby=params->>'$.loggedinid'
			where id=params->>'$.id';
			SELECT  0 as errflag,params->>'$.id' as rowid;
        end if;
		
	end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_vehicle` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_vehicle`(params JSON)
BEGIN
	DECLARE isactivestatus INT DEFAULT 0;
	declare flag varchar(20);
    SET flag=params->>'$.flag';
    if (flag='i') then
		INSERT INTO tblvehicle
		(`typeofvehicle`,`amount`,`createdby`)
		VALUES
		(params->>'$.typeofvehicle',params->>'$.amount',params->>'$.loggedinid');
		SELECT  0 as errflag,LAST_INSERT_ID() as rowid;
	elseif(flag='u') then
		set isactivestatus=params->>'$.isactive';
		
		UPDATE tblvehicle
		SET
		`typeofvehicle` = (params->>'$.typeofvehicle'),
        `amount` = (params->>'$.amount'),
		`isactive` = isactivestatus,
		`modifiedby` =(params->>'$.loggedinid'),
		`modifiedon` = now()
		WHERE `id` =(params->>'$.id');
		SELECT  0 as errflag,params->>'$.id' as rowid;

    end if;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-16 11:03:32
