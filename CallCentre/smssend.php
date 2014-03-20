<?php
    function sendSMS($content) {
        $ch = curl_init('http://www.smsbroadcast.com.au/api-adv.php');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $content);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec ($ch);
        curl_close ($ch);
        return $output;    
    }

    $ieServer = '192.168.2.202';
    $ieDb = "Bluestone";
    $ieUId = 'sa';
    $iePWD = 'Password13';

    $connInfo = array("Database"=>$ieDb, "UID"=>$ieUId, "PWD"=>$iePWD);
    $conn = sqlsrv_connect($ieServer, $connInfo) or die("Couldn't connect to SQL Server");

    $username = 'chrisd013';
    $password = 'Goswans13';

    $destination = $_POST['d'];
    $source    = $_POST['s'];
    $text = $_POST['n'];
    $ref = $_POST['r'];
    $user = $_POST['u'];
        
    $content =  'username='.rawurlencode($username).
                '&password='.rawurlencode($password).
                '&to='.rawurlencode($destination).
                '&from='.rawurlencode($source).
                '&message='.rawurlencode($text).
                '&ref='.rawurlencode($ref);
  
    $smsbroadcast_response = sendSMS($content);
    $response_lines = explode("\n", $smsbroadcast_response);
    $mobiles = explode(",", $destination);
    $i = 0;
    
     foreach( $response_lines as $data_line){
        $message_data = "";
        $message_data = explode(':',$data_line);
	if ($message_data[0] != '') {
		$tsql = "Insert SMSRegister Values (GetDate(), '" . 
		$user . "', '" . $source . "', '" . $mobiles[$i] . "', '" .
		$text . "', '" . $ref . "', '" . $message_data[0] . "', '" . 
		$message_data[1] . "', '" .	$message_data[2] . "')";
		$data = sqlsrv_query( $conn, $tsql);
		$i++;
		}
	}

echo "Done!";
?> 