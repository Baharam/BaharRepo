<?php
	$ieUId = $_POST['b'];
	$iePWD = $_POST['c'];
	$iePWDnew = $_POST['d'];

	$ieServer = '192.168.2.202';
	$ieDb = 'Bluestone';

	$connInfo = array("Database"=>$ieDb, "UID"=>$ieUId, "PWD"=>$iePWD);
	$conn = sqlsrv_connect($ieServer, $connInfo) or die("0");

	$tsql = "exec LoginPass " . $ieUId . ", '" . $iePWD . "', '" . $iePWDnew . "'";

	echo $tsql;

	$stmt = sqlsrv_query($conn, $tsql);

	if( $stmt === false )
	{
		die("0");
	}

	echo "1";

?>