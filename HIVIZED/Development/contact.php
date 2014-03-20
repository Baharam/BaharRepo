<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 'on');

include 'DbFuncs.php';
if(!$_POST) exit;
$email = $_POST['email'];
$name=$_POST['name'];
$url=$_POST['url'];

//Sending mail and validating data
$errors=0;
if(!eregi("^[a-z0-9]+([_\\.-][a-z0-9]+)*" ."@"."([a-z0-9]+([\.-][a-z0-9]+)*)+"."\\.[a-z]{2,}"."$",$email )){
	$error.="Invalid email address entered";
	$errors=1;
}
if($errors==1){ echo $error; exit;}

	$values = array ('name','email','message','subject');
	$required = array('name','email','message','subject');
	 
	$your_email = "james@example.com";
	$email_subject = "New Message: ".$_POST['subject'];
	$email_content = "new message:\n";
	
	foreach($values as $key => $value){
	  if(in_array($value,$required)){
		  if( empty($_POST[$value]) ) { echo 'Please fill in required fields.'; exit; }
		
		$email_content .= $value.': '.$_POST[$value]."\n";
	  }
	}
	 
	/*if(@mail($your_email,$email_subject,$email_content)) {
		echo 'Message sent!'; 
	} else {
		echo 'ERROR!';
	}*/

	$email_content = $_POST['message'];
	$email_subject = $_POST['subject'];

	//Saving message to the database
	$tsql="INSERT INTO Messages
			   (Name
			   ,EmailAddress
			   ,Website
			   ,Subject
			   ,Message)
		 VALUES
			   ('$name'
			   ,'$email'
			   ,'$url'
			   ,'$email_subject'
			   ,'$email_content')";

	$db = new DbFuncs();
	 
	$res=$db->Add($tsql); 

	if( $result === false ) 
		 die( print_r( sqlsrv_errors(), true));
	else
		 echo "Your message is successfully sent.";


?>