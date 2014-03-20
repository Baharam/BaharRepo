<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Web forms, mail forms with captcha, captcha form example </title>
<meta name="description" content="using captcha in web forms, mail forms " />
<meta name="keywords" content=" Web forms, mail forms, using captcha, Form example, with captcha, captcha form, spammers bot, graphically generated code, validation page, examples of captcha, captcha protected page, form without captcha, captcha knowledge,  tested  form,  insertion of captcha generated image, preventing bots, captcha protected form, php,  javascript code, How to protect, how to implement captcha in web forms " />
<style type="text/css" media="all">
/* <![CDATA[ */
body{font-family:Verdana, Arial, Helvetica, sans-serif;font-size:.9em}
h2{text-align:center;color:#369}
.content{width:600px;margin:15px auto;padding:2px;border:1px solid #000;text-align:left;background-color:#ccc}
.cpt{text-align:center}
.cpt img{margin:2px 15px 2px 2px;vertical-align:middle}
.inp{margin:10px}
div.row{clear:both;margin:0;padding:3px 0}
div.row label{float:left;width:150px;padding:0 10px 0 0;text-align:right}
div.row label:hover{background-color:#666;color:#fff}
#scratch_submit{padding:2px 20px}
.error{text-align:center;color:#f00}
/* ]]> */
</style>
<script type="text/javascript">
function resetta()
{
	var obj=document.getElementById('captchaForm');
	var n=obj.elements.length;
	for(var i=0;i<n;i++){if(obj.elements[i].type == "text"){obj.elements[i].value = ''}};
	return false;
}
</script>
</head>
<body >
<h2>Please insert the requested information below and you may win <br />TEN MILLION DOLLARS</h2>
	<div class="content">
		<form id="captchaForm" name="captchaForm" method="post" action="">
			<div class="row"><label for="company">Company: </label><input name="company" type="text" id="company" size="60" value="" /></div>
			<div class="row"><label for="name">Name: </label><input name="name" type="text" id="name" size="30" value="" /> </div>
			<div class="row"><label for="name">Surname: </label><input name="surname" type="text" id="surname" size="30" value="" /></div>
			<div class="row"><label for="address">Address: </label><input name="address" type="text" id="address" size="60" value="" /></div>
			<div class="row"><label for="zip">ZIP: </label><input name="zip" type="text" id="zip" size="8" value="" /> City: <input name="city" type="text" id="city" size="20" value="" /> Region: <input name="region" type="text" id="region" size="5" value="" /></div>
			<div class="row"><label for="email">Email: </label><input type="text" name="email" size="40" value="" /></div>
			<div class="row"><label for="telephone">Telephone: </label><input name="telephone" type="text" id="telephone" size="20" value="" /> Mobile: <input name="mobile" type="text" id="mobile" size="20" value="" /></div>
			<div class="row"><label for="comments">Comments: </label><textarea name="comments" cols="45" rows="5" id="comments"></textarea></div>
			<div class="row"><label for="reset">(erases all data inserted up to now) </label><input type="reset" name="Reset" id="reset" value="I am stupid and want to start again" onclick="return resetta()"></div>
			<div class="clear">&nbsp;</div>	
			<hr />
			<p>Ready ? Ok, but before you click 'Send Form' please insert the same letters and numbers you see in this image into the box to your bottom</p>
			<div class="cpt"><img src="captchaImage.php" alt="captcha image"/><input type="text" id="captcha_input" name="captcha_input" size="15" /></div>
			<hr />
						<div class="inp" style="text-align:center"><label for="submit">&nbsp;</label><input type="submit" name="scratch_submit" id="scratch_submit" value="Send Form" /></div>
		</form>
	</div>
</body>
</html>