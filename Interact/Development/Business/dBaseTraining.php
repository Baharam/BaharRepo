<?php
	$tsql = $_POST['b'];

	$ieServer = '192.168.2.202';
	$ieDb = "Training";
	$ieUId = "sa";
	$iePWD = "Password13";

	$connInfo = array("Database"=>$ieDb, "UID"=>$ieUId, "PWD"=>$iePWD);
	$conn = sqlsrv_connect($ieServer, $connInfo) or die("0");

	$data = sqlsrv_query($conn, $tsql);
	$result = array();   

	do {
    		while ($row = sqlsrv_fetch_array($data, SQLSRV_FETCH_ASSOC)){
        	$result[] = $row;   
    		}
	   }
	while ( sqlsrv_next_result($data) );

	echo json_encode($result);

?>