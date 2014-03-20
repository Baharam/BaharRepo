<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');

$ieServer = 'localhost';
$ieDb = "Bluestone";
$ieUId = "Hivized";
$iePWD = "Password13";

$connectionInfo = array("Database"=>$ieDb, "UID"=>$ieUId, "PWD"=>$iePWD);
$conn = sqlsrv_connect( $ieServer, $connectionInfo);





if( $conn ) {
     echo "Connection established.<br />";
}else{
     echo "Connection could not be established.<br />";
}
$tsql="INSERT INTO Messages
           ([Name]
           ,[EmailAddress]
           ,[Website]
           ,[Subject]
           ,[Message])
     VALUES
           ($name
           ,$email
           ,$url
           ,$email_subject
           ,$email_content)";

sqlsrv_query( $conn, $tsql);
sqlsrv_close($conn);
?>