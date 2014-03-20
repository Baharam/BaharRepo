<!DOCTYPE html>
<?php 
	include('business/authenticate.php') 
?>
<head>
<title>Interact Eduction</title>
<link href="css/Input.css" rel="stylesheet" type="text/css" />
<link href="css/headstyle.css" rel="stylesheet" type="text/css" />
<link href="css/main.css" rel="stylesheet" type="text/css" />
<script src="javascripts/jquery-1.11.0.min.js"></script>
</head>
<script> 
	$(function () {
		$('#submitBookingBtn').click(function(){submit();});
		function submit() { 
 		$.ajax({
			url: "business/submitBooking.php",
			 type: "POST",
			 data: { 'User': user.value, 'Pass': pass.value, 'Uid': 1 }
			}).done(function(data) {
				if(data!=0)
					location.href='default.php';
			});
		}
	});</script>
<body>
<div id="wrapper">
  <div id="header">
    <div id="logo">
    <h1>Pro-Active Training</h1>
    <h2>...Call Centre Application</h2>		
	<p id="Userdets"></p>
    </div>
  </div>
</div>
<div id="studentInfo" class="centerDiv width700">
<div class="left label width90">First Name:</div>
<div class="right label  width600"><input placeholder="First Name" class="txtinput  width500" /></div>
<div class="clear"></div>
<div class="left label width90">Last Name:</div>
<div class="right label  width600"><input  placeholder="Last Name" class="txtinput  width500" /></div>
<div class="clear"></div>
<div class="left label width90">Address:</div>
<div class="right label  width600"><input placeholder="Address" class="txtinput  width500" /></div>
<div class="clear"></div>
<div class="left label width90">City:</div>
<div class="right label  width600"><input placeholder="City" class="txtinput  width500" /></div>
<div class="clear"></div>
<div class="left label width90">State:</div>
<div class="right label  width600"><input placeholder="State" class="txtinput  width500" /></div>
<div class="clear"></div>
<div class="left label width90">Mobile Phone:</div>
<div class="right label  width600"><input placeholder="Mobile Phone" class="txtinput  width500" /></div>
<div class="clear"></div>
<div class="left label width90">Email:</div>
<div class="right label  width600"><input placeholder="Email" class="txtinput  width500" /></div>
<div class="clear"></div>
<input type="submit" id="submitBookingBtn" class="margin-r-70 button right" value="Submit"/>
</div>
</div>
</body>
</html> 