<?php
print 'start';
	$ieUId = $_POST['b'];
echo $ieUId;

	$iePWD = $_POST['c'];
echo $iePWD;

	$ieServer = '192.168.2.202';
	$ieDb = "Bluestone";

	echo $connInfo;
	$connInfo = array("Database"=>$ieDb, "UID"=>$ieUId, "PWD"=>$iePWD);
	$conn = sqlsrv_connect($ieServer, $connInfo) or die(echo '2');
	echo 1;

?>