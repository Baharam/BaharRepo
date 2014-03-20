<?php

const ieServer = '192.168.2.202';
const ieDb = "Training";
const ieUId = "sa";
const iePWD = "Password13";

class dbFuncs{

function dbRecs($tsql){

	$connectionInfo = array("Database"=>ieDb, "UID"=>ieUId, "PWD"=>iePWD);
	$conn = sqlsrv_connect( ieServer, $connectionInfo);
	$data = sqlsrv_query( $conn, $tsql);
	$result = array();   

	do {
    		while ($row = sqlsrv_fetch_array($data, SQLSRV_FETCH_ASSOC)){
        	$result[] = $row;   
    		}
	   }
	while ( sqlsrv_next_result($data) );

	return $result;
}

function dbSchema($tsql){
	$connectionInfo = array("Database"=>ieDb, "UID"=>ieUId, "PWD"=>iePWD);
	$conn = sqlsrv_connect( ieServer, $connectionInfo);
	$data = sqlsrv_query( $conn, $tsql);
	$result = array();   

	do {
    		while ($row = sqlsrv_fetch_array($data, SQLSRV_FETCH_ASSOC)){
        	$result[] = $row;   
    		}
	   }
	while ( sqlsrv_next_result($data) );
	return $result;
}

function dbAdd($tsql){
	$connectionInfo = array("Database"=>ieDb, "UID"=>ieUId, "PWD"=>iePWD);
	$conn = sqlsrv_connect( ieServer, $connectionInfo);
	$result = sqlsrv_query( $conn, $tsql);
	return $result;
}

function dbCleanup($data, $conn){
	sqlsrv_free_stmt($data);
	sqlsrv_close($conn); 
}

}
?>
