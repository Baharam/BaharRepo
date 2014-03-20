<?php
require('IEFunctions.php');
$IE = new IEFuncs();
$tsql = $_POST['b'];
$result = $IE->ieRecs($tsql);
echo json_encode($result);
$IE->Cleanup($data, $conn);
?>
