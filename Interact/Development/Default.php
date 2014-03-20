<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php 
	include('business/authenticate.php') 
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/Input.css" rel="stylesheet" type="text/css" media="screen" />
<link href="css/headstyle.css" rel="stylesheet" type="text/css" media="screen" />
<title>Interact Eduction</title>
</head>
<div id="wrapper">
  <div id="header">
    <div id="logo">
    <h1>Pro-Active Training</h1>
    <h2>...Call Centre Application</h2>		
	<p id="Userdets">Currently logged on :<?php echo $_SESSION['user'];?></p>
    </div>
  </div>
</div>
<div id="details">
<div id="leftcol">
  <h2>...Admin</h2><br />
	<label><input class="button" type="button" value="Courses" onclick="location.href='courses.php' /></label><br />
	<label><input class="button" type="button" value="SMS Creator" onclick="location.href='smscreator.html'" /></label><br /><br />
	<label><input class="button" type="button" value="Booking" onclick="location.href='booking.php'" /></label><br />
</div>
<div id="midcol">
  <h2>...Sales</h2><br />
	<label><input class="button" type="button" value="Input Resumes" onclick="location.href='received.html'" /></label><br />
	<label><input class="button" type="button" value="Input Details" onclick="location.href='furtherinfo.html'" /></label><br />
	<label><input class="button" type="button" value="Input Quals" onclick="location.href='furtherinfoquals.html'" /></label><br />
	<label><input class="button" type="button" value="Review Quals" onclick="location.href='reviewquals.html'" /></label><br /><br />
	<label><input class="button" type="button" value="New Leads" onclick="location.href='calls.html'" /></label><br />
	<label><input class="button" type="button" value="No Answer" onclick="location.href='callsnoans.html'" /></label><br />
	<label><input class="button" type="button" value="Further Contact" onclick="location.href='callsinfo.html'" /></label><br />
	<label><input class="button" type="button" value="Cert III Leads" onclick="location.href='callsc3.html'" /></label><br />
	<label><input class="button" type="button" value="No shows" onclick="location.href='callsns.html'" /></label><br />
</div>
<div id="rightcol">
  <h2>...Reports</h2><br />
  <label><input class="button" type="button" value="Numbers per Category" onclick="location.href='business/reports/StatusNumbers.php'" /></label><br />
  <label><input class="button" type="button" value="Numbers per Company" onclick="location.href='business/reports/StatusNosCompany.php'" /></label><br /><br />
  <label><input class="button" type="button" value="Calls Per User" onclick="location.href='business/reports/CallsPerUser.php'" /></label><br />
  <label><input class="button" type="button" value="Results Per User" onclick="location.href='business/reports/ResultsPerUser.php'" /></label><br />
</div>
</div>
</body>
</html> 