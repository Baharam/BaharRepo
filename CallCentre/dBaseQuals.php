<?php
	$tsql = $_POST['b'];

	$ieServer = '192.168.2.202';
	$ieDb = "Bluestone";
	$ieUId = $_POST['u'];
	$iePWD = $_POST['p'];

	$connInfo = array("Database"=>$ieDb, "UID"=>$ieUId, "PWD"=>$iePWD);
	$conn = sqlsrv_connect($ieServer, $connInfo) or die("Couldn't connect to SQL Server");

	$data = sqlsrv_query( $conn, $tsql);
	
	sqlsrv_next_result($data);

	$result = sqlsrv_fetch_array($data);
	echo json_encode($result);

?>