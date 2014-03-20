<?php
 	session_start(); 
	if(isset($_SESSION['user']))
  		unset($_SESSION['user']);
	$ieUId = $_POST['User'];
	$iePWD = $_POST['Pass'];

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

	$_SESSION['user']=$ieUId;
	echo $_SESSION['user'];
?>