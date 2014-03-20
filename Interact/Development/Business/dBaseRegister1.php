<?php
	$iesms = $_POST['s'];

    	$ieServer = '192.168.2.202';
    	$ieDb = "Bluestone";
    	$ieUId = "sa";
    	$iePWD = "Password13";

    	$connInfo = array("Database"=>$ieDb, "UID"=>$ieUId, "PWD"=>$iePWD);
	$conn = sqlsrv_connect($ieServer, $connInfo);

	if( $conn === false )
	{
    		die("0");
	}

	$tsql = "exec Create_Login " . $iesms;

	$data = sqlsrv_query( $conn, $tsql);
	
	if( $data === false )
	{
     		die("0");
	}

	sqlsrv_fetch($data);
	$name = sqlsrv_get_field($data, 0);
	echo $name;

?>