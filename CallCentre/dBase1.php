<?php
$serverName = "192.168.2.202";
$connectionInfo = array( "Database"=>"BookSales", "UID"=>"sa", "PWD"=>"Password13");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) 
  {
  }
else
  {
  echo "Connection could not be established.<br />";
  die( print_r( sqlsrv_errors(), true));
  }

$tsql = "SELECT * FROM Customers";
$data = sqlsrv_query( $conn, $tsql);

if( $stmt === false)
{
     echo "Error in query preparation/execution.\n";
     die( print_r( sqlsrv_errors(), true));
}

$result = array();   

do {
    while ($row = sqlsrv_fetch_array($data, SQLSRV_FETCH_ASSOC)){
        $result[] = $row;   
    }
}while ( sqlsrv_next_result($data) );

// This will output in JSON format if you try to hit the page in a browser
echo json_encode($result);

sqlsrv_free_stmt($data);
sqlsrv_close($conn); 

?>