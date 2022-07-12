CREATE DEFINER
=`root`@`localhost` PROCEDURE `sp_saveregistration`
(params JSON)
BEGIN
  DECLARE registrationid INT DEFAULT 0;
declare flag varchar
(20);
DECLARE isactivestatus INT DEFAULT 0;


INSERT INTO tblregistration
  (`pax`,`fromdate`,`todate`
,`numberofdays`,`numberofvehicle`,`totalcharge`,
  `paymentid`,`isactive`,`createdon`,`hotelid`,`boatid`)
VALUES
(params->>'$.pax',CAST
(params->>'$.fromdate' AS DATETIME),CAST
(params->>'$.todate' AS DATETIME)
,params->>'$.numberofdays',params->>'$.numberofvehicle',params->>'$.totalcharge',params->>'$.paymentid',1,Now
(),params->>'$.preferredhotels',
params->>'$.boatcapcity');
set registrationid
= LAST_INSERT_ID
();
-- ifnull(max(registrationid),0) + 1 


INSERT INTO tbltourist
  (`registrationid`,`firstname`,`middlename`,
  `lastname`,`address1`,`address2`,`hotelid`,
  `nationalityid`,`mobilenumber`
,`emailid`,`dob`,`createdon`,`citizenid`,`provinceid`,`municipalityid`,`gender`,
  `ismaubancitizen`)
SELECT registrationid, firstname, middlename, lastname ,
  address1, '', params->>'$.preferredhotels', nationalityid,
  mobilenumber, email, dob, now(), citizenid, provinceid, municipalityid, gender, ismaubancitizen
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
  dob date
PATH '$.dob' ,
                    citizenid int PATH '$.Citizenship' ,
                    provinceid int PATH '$.Province' ,
                     municipalityid int PATH '$.Municipality' ,
                     gender  int PATH '$.Gender' ,
                      ismaubancitizen  int PATH '$.ismaubancitizen'
                    ERROR ON ERROR )
    ) as jt;

INSERT INTO `tbltouristvehicle`
(
`
registrationid`,
`transactionid
`,
`createdon`,
`platenumber`,
`vehicleid`)

SELECT registrationid, params->>'$.paymentid', now(), "" , vehicleid

FROM
  JSON_TABLE( 
      params->>'$.touristvehicles',
    '$[*]' COLUMNS( 
					vehicleid
int PATH '$.id' 
                   
                    ERROR ON ERROR )
    ) as jts;

SELECT 0 as errflag, registrationid as id;

END