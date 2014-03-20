<?php

const ieServer = 'localhost';
const ieDb = "Bluestone";
const ieUId = "Hivized";
const iePWD = "Password13";

class DbFuncs{
  function Add($tsql){	
	$connectionInfo = array("Database"=>ieDb, "UID"=>ieUId, "PWD"=>iePWD);
	$conn = sqlsrv_connect( ieServer, $connectionInfo);
	$result = sqlsrv_query( $conn, $tsql);
	sqlsrv_close($conn);
	return $result;
  }
}
?>
