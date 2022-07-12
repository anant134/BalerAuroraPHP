CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_saveregistration`(params JSON)
BEGIN
DECLARE registrationid INT DEFAULT 0;
declare flag varchar(20);
DECLARE isactivestatus INT DEFAULT 0;


INSERT INTO tblregistration
(`pax`,`fromdate`,`todate`,`numberofdays`,`numberofvehicle`,`totalcharge`,
`paymentid`,`isactive`,`createdon`,`hotelid`,`boatid`)
VALUES
(params->>'$.pax',CAST(params->>'$.fromdate' AS DATETIME),CAST(params->>'$.todate' AS DATETIME)
,params->>'$.numberofdays',params->>'$.numberofvehicle',params->>'$.totalcharge',params->>'$.paymentid',1,Now(),params->>'$.preferredhotels',
params->>'$.boatcapcity');
 set registrationid = LAST_INSERT_ID();
-- ifnull(max(registrationid),0) + 1 


INSERT INTO tbltourist
(`registrationid`,`firstname`,`middlename`,
`lastname`,`address1`,`address2`,`hotelid`,
`nationalityid`,`mobilenumber`,`emailid`,`dob`,`createdon`,`citizenid`,`provinceid`,`municipalityid`,`gender`,
`ismaubancitizen`)
SELECT registrationid,firstname,middlename,lastname ,
 address1,'',params->>'$.preferredhotels',nationalityid,
 mobilenumber,email,dob,now(),citizenid,provinceid,municipalityid,gender,ismaubancitizen
 FROM
       JSON_TABLE( 
      params->>'$.touristinfo',
    '$[*]' COLUMNS( firstname text PATH '$.Firstname',
					middlename text PATH '$.Middlename' ,
                    lastname text PATH '$.Lastname' ,
                    address1 text PATH '$.Address' ,
                    nationalityid int PATH '$.CountryofOrigin' ,
					mobilenumber text PATH '$.Mobilenumber' ,
                    email text PATH '$.emailid' ,
                    dob date PATH '$.dob' ,
                    citizenid int PATH '$.Citizenship' ,
                    provinceid int PATH '$.Province' ,
                     municipalityid int PATH '$.Municipality' ,
                     gender  int PATH '$.Gender' ,
                      ismaubancitizen  int PATH '$.ismaubancitizen'
                    ERROR ON ERROR )
    ) as jt;


SELECT  0 as errflag,registrationid as id;

END



-------------

CREATE TABLE `tblregistration` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pax` int DEFAULT '1',
  `fromdate` datetime DEFAULT NULL,
  `todate` datetime DEFAULT NULL,
  `numberofdays` int DEFAULT NULL,
  `numberofvehicle` int DEFAULT NULL,
  `totalcharge` decimal(18,2) DEFAULT NULL,
  `paymentid` varchar(100) DEFAULT NULL,
  `isactive` bit(1) DEFAULT NULL,
  `createdon` datetime DEFAULT CURRENT_TIMESTAMP,
  `modifiedon` datetime DEFAULT NULL,
  `hotelid` int DEFAULT NULL,
  `boatid` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;



----------------------

CREATE TABLE `tbltourist` (
  `id` int NOT NULL AUTO_INCREMENT,
  `registrationid` int DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `address1` varchar(100) DEFAULT NULL,
  `address2` varchar(100) DEFAULT NULL,
  `hotelid` int DEFAULT NULL,
  `nationalityid` int DEFAULT NULL,
  `mobilenumber` varchar(50) DEFAULT NULL,
  `emailid` varchar(50) DEFAULT NULL,
  `dob` datetime DEFAULT NULL,
  `qrcode` varchar(50) DEFAULT NULL,
  `createdon` datetime DEFAULT CURRENT_TIMESTAMP,
  `rfid` varchar(100) DEFAULT NULL,
  `isassigned` bit(1) DEFAULT b'0',
  `citizenid` int DEFAULT NULL,
  `provinceid` int DEFAULT NULL,
  `municipalityid` int DEFAULT NULL,
  `gender` int DEFAULT NULL,
  `ismaubancitizen` tinyint DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
