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
-- Dumping data for table `tblboat`
--

LOCK TABLES `tblboat` WRITE;
/*!40000 ALTER TABLE `tblboat` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblboat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tblfees`
--

LOCK TABLES `tblfees` WRITE;
/*!40000 ALTER TABLE `tblfees` DISABLE KEYS */;
INSERT INTO `tblfees` VALUES (1,'Environment',100.00,_binary '',1,'2020-12-09 10:54:06',NULL,NULL),(2,'Boat',10.00,_binary '',1,'2020-12-09 10:54:18',NULL,NULL),(3,'Parking',110.00,_binary '\0',1,'2020-12-09 10:54:33',NULL,NULL);
/*!40000 ALTER TABLE `tblfees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tblrole`
--

LOCK TABLES `tblrole` WRITE;
/*!40000 ALTER TABLE `tblrole` DISABLE KEYS */;
INSERT INTO `tblrole` VALUES (1,'Admin',1,'2020-12-05 18:20:38',NULL,NULL,_binary ''),(2,'Boat Captain',1,'2020-12-06 01:40:12',NULL,NULL,_binary ''),(3,'Receptionist',1,'2020-12-06 01:43:00',NULL,NULL,_binary ''),(4,'Administrative',1,'2020-12-06 01:45:47',NULL,NULL,_binary '');
/*!40000 ALTER TABLE `tblrole` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tblslots`
--

LOCK TABLES `tblslots` WRITE;
/*!40000 ALTER TABLE `tblslots` DISABLE KEYS */;
INSERT INTO `tblslots` VALUES (1,'Slot 1','00:00:00','01:00:00',1,'2020-12-11 05:10:05',NULL,NULL,_binary ''),(2,'Slot 2','01:00:00','02:00:00',1,'2020-12-11 05:13:28',NULL,NULL,_binary ''),(3,'Slot 3','13:00:00','14:00:00',1,'2020-12-11 05:13:50',1,'2020-12-11 05:44:06',_binary '\0');
/*!40000 ALTER TABLE `tblslots` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbluser`
--

LOCK TABLES `tbluser` WRITE;
/*!40000 ALTER TABLE `tbluser` DISABLE KEYS */;
INSERT INTO `tbluser` VALUES (1,'admin','ohAO1FvqMx3RCak3d0nrBg==','admin@tourbooking.com',1,1,'2020-12-05 18:23:23',NULL,NULL,_binary ''),(2,'turshar','ohAO1FvqMx3RCak3d0nrBg==','turshar@gmail.com',1,2,'2020-12-06 11:08:36',NULL,NULL,_binary ''),(3,'anant','XvXdY4MYgMmwMM3fC+fqpg==','anant@gmail.com',1,3,'2020-12-06 13:21:51',NULL,NULL,_binary ''),(4,'testanant','XvXdY4MYgMmwMM3fC+fqpg==','test@gmail.com',1,4,'2020-12-06 13:25:10',1,'2020-12-10 19:48:21',_binary '');
/*!40000 ALTER TABLE `tbluser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tblvehicle`
--

LOCK TABLES `tblvehicle` WRITE;
/*!40000 ALTER TABLE `tblvehicle` DISABLE KEYS */;
INSERT INTO `tblvehicle` VALUES (1,'Jeep',350.00,1,'2020-12-12 03:22:19',1,'2020-12-12 03:24:50',_binary ''),(2,'Van',300.00,1,'2020-12-12 03:25:08',NULL,NULL,_binary ''),(3,'Suv',250.00,1,'2020-12-12 03:25:23',NULL,NULL,_binary ''),(4,'Car',200.00,1,'2020-12-12 03:25:51',NULL,NULL,_binary ''),(5,'Tricycle',150.00,1,'2020-12-12 03:26:11',NULL,NULL,_binary ''),(6,'Motor',100.00,1,'2020-12-12 03:26:24',NULL,NULL,_binary '');
/*!40000 ALTER TABLE `tblvehicle` ENABLE KEYS */;
UNLOCK TABLES;

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

-- Dump completed on 2020-12-12 17:25:25
