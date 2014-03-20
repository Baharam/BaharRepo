<?php
	$ieUId = $_POST['b'];
	$iePWD = $_POST['c'];

	$ieServer = '192.168.2.202';
	$ieDb = 'Bluestone';

	$connInfo = array("Database"=>$ieDb, "UID"=>$ieUId, "PWD"=>$iePWD);
	$conn = sqlsrv_connect($ieServer, $connInfo) or die("0");

	if ($ieUId == 'sa'){
		echo "1";
		return;
	}

	$tsql = "exec GetUid '" . $ieUId . "'";

	$stmt = sqlsrv_query( $conn, $tsql);
	if( $stmt === false )
	{
     		echo "Error in statement preparation/execution.\n";
     		die( print_r( sqlsrv_errors(), true));
	}

	if( sqlsrv_fetch( $stmt ) === false )
	{
		     echo "Error in retrieving row.\n";
 		     die( print_r( sqlsrv_errors(), true));
	}


	$name = sqlsrv_get_field($stmt, 0);

	echo $name;

?>