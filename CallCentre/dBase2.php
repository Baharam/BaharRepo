<?php
	$tsql = $_POST['b'];

	$ieServer = '192.168.2.202';
	$ieDb = "Bluestone";
	$ieUId = $_POST['u'];
	$iePWD = $_POST['p'];

	$connInfo = array("Database"=>$ieDb, "UID"=>$ieUId, "PWD"=>$iePWD);
	$conn = sqlsrv_connect($ieServer, $connInfo) or die("0");

	$data = sqlsrv_query($conn, $tsql) or die("0");
	
	sqlsrv_next_result($data);
	sqlsrv_fetch($data);
	$name = sqlsrv_get_field($data, 0);
	echo $name;

?>