<!DOCTYPE html>
<head>
<?php 
	include('business/authenticate.php') 
?>
<title>Interact Eduction</title>
<link href="css/Input.css" rel="stylesheet" type="text/css" media="screen" />
<link href="css/headstyle.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="javascripts/jsDatePick.min.1.3.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="jsDatePick_ltr.min.css" />
</head>

<script>
var userid;
var company;
var NewDets;
var dbSec;

function BindDate() {
	abc();
	reset('1');		
}

function Dets() {
var retrievedObject = localStorage.getItem('testObject');
NewDets = JSON.parse(retrievedObject);
document.getElementById("Userdets").innerHTML = 'Currently logged on :- ' + NewDets.User;
dbSec = '&u=' + NewDets.User + '&p=' + NewDets.Pass;
userid = NewDets.Uid;
}

function Dets1() {
txt = "b=select * from VenRooms";

xmlhttp=new XMLHttpRequest();
xmlhttp.open("POST","business/dBaseTraining.php",true);
xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp.setRequestHeader("Content-length", txt.length);
xmlhttp.setRequestHeader("Connection", "close");

xmlhttp.onreadystatechange=function() {
   	if (xmlhttp.readyState==4) {	
      		obj = xmlhttp.responseText;
      		obj3 = JSON.parse(obj);
      		txt1 = '<label for="ven">Venue:- </label><select id="ven" class="ta" size="9">';
      		len=obj3.length;

      		for (var i=0; i<len; i++) {
      			txt1 = txt1 + '<option value=' + obj3[i].RoomId  + '>' + obj3[i].City + ' - ' + obj3[i].RoomName + '</option>';
      		}
		txt1 = txt1 + '</select><br />'
		document.getElementById("vens").innerHTML=txt1;
	}
}
xmlhttp.send(txt);
}

function Dets2() {
txt2 = "b=select * from CurrentCourses";

xmlhttp1=new XMLHttpRequest();
xmlhttp1.open("POST","business/dBaseTraining1.php",true);
xmlhttp1.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp1.setRequestHeader("Content-length", txt2.length);
xmlhttp1.setRequestHeader("Connection", "close");

xmlhttp1.onreadystatechange=function() {
   	if (xmlhttp1.readyState==4) {	
      		obj1 = xmlhttp1.responseText;
      		obj4 = JSON.parse(obj1);
      		txt3 = '<label for="course">Course:- </label><select id="course" class="ta" size="6" style="width: 300px">';
      		len=obj4.length;

      		for (var i=0; i<len; i++) {
      			txt3 = txt3 + '<option value=' + obj4[i].CourseId  + '>' + obj4[i].CourseCode + ' - ' + obj4[i].CourseTitle + '</option>';
      		}
		txt3 = txt3 + '</select><br />'
		document.getElementById("ccs").innerHTML=txt3;
	}
}
xmlhttp1.send(txt2);
}

function Dets3() {
txt4 = "b=select * from EmpStaff";

xmlhttp11=new XMLHttpRequest();
xmlhttp11.open("POST","business/dBaseTraining2.php",true);
xmlhttp11.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp11.setRequestHeader("Content-length", txt4.length);
xmlhttp11.setRequestHeader("Connection", "close");

xmlhttp11.onreadystatechange=function() {
   	if (xmlhttp11.readyState==4) {	
      		obj2 = xmlhttp11.responseText;
      		obj5 = JSON.parse(obj2);
      		txt5 = '<label for="train">Trainer:- </label><select id="train" class="ta" size="3">';
      		len=obj5.length;

      		for (var i=0; i<len; i++) {
      			txt5 = txt5 + '<option value=' + obj5[i].StaffId  + '>' + obj5[i].Fname + ' ' + obj5[i].Sname + '</option>';
      		}
		txt5 = txt5 + '</select><br />'
		document.getElementById("tn").innerHTML=txt5;
	}
}
xmlhttp11.send(txt4);
}

function Dets4() {
txt6 = "b=select * from futurecourses order by dtcommence";

xmlhttp2=new XMLHttpRequest();
xmlhttp2.open("POST","business/dBaseTraining3.php",true);
xmlhttp2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp2.setRequestHeader("Content-length", txt6.length);
xmlhttp2.setRequestHeader("Connection", "close");

xmlhttp2.onreadystatechange=function() {
   	if (xmlhttp2.readyState==4) {	
      		obj6 = xmlhttp2.responseText;
      		obj7 = JSON.parse(obj6);
      		txt7 = '<label for="shed">Courses:- </label><select id="shed" class="ta" size="15" style="width: 300px">';
      		len=obj7.length;

      		for (var i=0; i<len; i++) {
      			txt7 = txt7 + '<option value=' + obj7[i].SchedId  + '>' + obj7[i].DateScheduled + ' - ' + obj7[i].CourseCode + ' - ' + obj7[i].Venue + '</option>';
      		}
		txt7 = txt7 + '</select><br />'
		document.getElementById("rightcol").innerHTML=txt7;
	}
}
xmlhttp2.send(txt6);
}

function save(type) {
txt = "b=exec SaveCourse ";
txt = txt + document.getElementById("course").value + ", "; 
txt = txt + document.getElementById("ven").value + ", "; 
txt = txt + document.getElementById("train").value + ", '"; 
txt = txt + document.getElementById("code").value + "', '"; 
txt = txt + document.getElementById("dob").value + "'"; 
txt = txt + dbSec; 

xmlhttp=new XMLHttpRequest();
xmlhttp.open("POST","business/dBase2.php",true);
xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp.setRequestHeader("Content-length", txt.length);
xmlhttp.setRequestHeader("Connection", "close");

xmlhttp.onreadystatechange=function()
   {
   if (xmlhttp.readyState==4)
      {	
	next();
	Dets4();
      }
   }

xmlhttp.send(txt);
}

function reset(indval) {
	Dets();
	next();
}


function next() {

	document.getElementById("ven").value = '';
	document.getElementById("course").value = '';
	document.getElementById("train").value = '';
	document.getElementById("code").value = '';
	document.getElementById("dob").value = '';
}

function abc(){
	Dets1();
	Dets2();
	Dets3();
	Dets4();

}
</script>

<body onload="BindDate()">
<div id="wrapper">
  <div id="header">
    <div id="logo">
    <h1>Pro-Active Training</h1>
    <h2>...Call Centre Application</h2>		
	<p id="Userdets"></p>
    </div>
  </div>
</div>
<div id="details">
<div id="leftcol">
	<label><input class="button" type="button" value="Home" onclick="location.href='default.html'"/></label>
	<label><input class="button" type="button" value="Save" onclick="save()"/></label>
	<label><input class="button" type="button" value="Next" onclick="Next()"/></label>  
</div>

<div id="midcol">
     <label for="code">Group Code:- </label> 
     <input type="text" id="code" class="input" /><br />
     <label for="dob">Start Date:- </label> 
     <input type="date" id="dob" class="input" /><br />
<div id="vens">
</div>
<div id="ccs">
</div>
<div id="tn">
</div>
</div>

<div id="rightcol">
</div>
</div>
</div>
</body>
</html> 