<?php
	$tsql = $_POST['b'];

	$ieServer = '192.168.2.202';
	$ieDb = "Bluestone";
	$ieUId = "sa";
	$iePWD = "Password13";

	$connInfo = array("Database"=>$ieDb, "UID"=>$ieUId, "PWD"=>$iePWD);
	$conn = sqlsrv_connect($ieServer, $connInfo) or die("Couldn't connect to SQL Server");

	$data = sqlsrv_query( $conn, $tsql);
	
	$result = sqlsrv_fetch_array($data);
	echo json_encode($result);

?>