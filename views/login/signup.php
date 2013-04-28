

<!doctype html>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="content-type">
<meta content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width" name="viewport">
<title>FITkids - Sign In</title>
    <link type="text/css" href="css/master2.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/preview.css"/>
    <link rel='stylesheet' type='text/css' href='css/login.css'>


    <link href='http://fonts.googleapis.com/css?family=Finger+Paint' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Combo' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="js/ga.js"></script>
    <script type="text/javascript" src="js/cjo5ipu.js" ></script>
    <script type="text/javascript" src="js/jquery.easing.1.3.min.js"></script>
	<script type="text/javascript" src="js/preview.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="js/stickyMojo.js"></script>
    
    <style>
     #main {
  font-family:'Conv_AdobeCorporateIDMyriad-Light',Helvetica,Arial,sans-serif; 
  width:900px;
   /*can be anything, just should make sure it is taller than the sidebar*/
  padding: 25px;
      border: 1px solid #bbb;
 box-shadow: -4px 5px 11px rgba(0, 0, 0, 0.1);
    z-index: 1;
  background-color: #fafafa;
  margin:0 auto;
}


.sidebutton{
	display:block;
        color:white;
	width:170px;
	margin:0 auto;
	text-align:left;
	font-size:1.2em;
	margin-bottom: 1px;
	padding:10px;
	text-align:center;
	-webkit-box-shadow:rgba(0, 0, 0, 0.2) 0 1px 3px,inset rgba(255, 255, 255, 0.3) 0 1px 1px;
	-moz-box-shadow:rgba(0, 0, 0, 0.2) 0 1px 3px,inset rgba(255, 255, 255, 0.3) 0 1px 1px;
	-o-box-shadow:rgba(0, 0, 0, 0.2) 0 1px 3px,inset rgba(255, 255, 255, 0.3) 0 1px 1px;
	box-shadow:rgba(0, 0, 0, 0.2) 0 1px 3px,inset rgba(255, 255, 255, 0.3) 0 1px 1px;
	border: 1px solid #092e53;
	text-shadow:#1f425e 0 -1px 0;
	background:-moz-linear-gradient(top, rgba(255, 255, 255, 0.2) 0%, rgba(255, 255, 255, 0) 100%);
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(255, 255, 255, 0.2)), color-stop(100%, rgba(255, 255, 255, 0)));
	background:-webkit-linear-gradient(top, rgba(255, 255, 255, 0.2) 0%, rgba(255, 255, 255, 0) 100%);
	background:-o-linear-gradient(top, rgba(255, 255, 255, 0.2) 0%, rgba(255, 255, 255, 0) 100%);
	background:-ms-linear-gradient(top, rgba(255, 255, 255, 0.2) 0%, rgba(255, 255, 255, 0) 100%);
	background:linear-gradient(to bottom, rgba(255, 255, 255, 0.2) 0%, rgba(255, 255, 255, 0) 100%);
	background-color:rgb(105, 167, 78);
	

}

.sidebutton:hover{
	
		background-color:#4e7d3a;
        color:white;
	
	
}
    
    </style>

    
    <script>
  $(document).ready(function(){
    $('#sidebar').stickyMojo({footerID: '#footer', contentID: '#main'});
  });
</script>


</head>



<body>

<?php


		echo("<div id=\"header\">
		<div class=\"wrap\">
<div class=\"menu\">
<a class=\"menu-item logo\" href=\"index.php\">
<span class=\"label\" style=\"font-size:50px; color:white; font-family: 'Combo', cursive; margin-bottom:0px;  float:left;  \">FIT<span style=\"font-family: 'Finger Paint', cursive;\">kids</span> </span>
</a>
<a class=\"menu-item menu-item-about\" href=\"tools.php\">
<span class=\"label\">Tools</span>
</a>
<a class=\"menu-item menu-item-developer\" href=\"projects.php\">
<span class=\"label\">Projects</span>
</a>
<a class=\"menu-item menu-item-community\" href=\"information.php\">
<span class=\"label\">Information</span>
</a>
<a class=\"menu-item menu-item-app\" href=\"#\">
<span class=\"label\">Community</span>
</a>
<a class=\"menu-item menu-item-support\" href=\"contacts.php\">
<span class=\"label\">Support</span>
</a>
<div class=\"menu-item menu-item-download\" >
<a class=\"bt accent\" href=\"process.php\" style=\"width:130px;\">
<span class=\"label\" style=\"line-height:47px; margin-left:25px;\">Sign Up/ Sign In</span>
</a>
</div>

</div>
<div class=\"dropdown dropdown-about\" style=\"left: 140px; height: 0px; display: block;\">
<div class=\"inner\">
<a href=\"tools/tag-it/program.php\">Tag-it-A</a>
<a href=\"tools/growth-chart/program.php\">Bmi Growth Chart</a>
<a href=\"tools/risk-assessment/program.php\">Behavior Risk Assessment</a>

</div>
</div>
<div class=\"dropdown dropdown-developer\" style=\"left: 221.183px; height: 0px; display: block;\">
<div class=\"inner\">
<a href=\"#\">Placeholder</a>
</div>
</div>
<div class=\"dropdown dropdown-community\" style=\"left: 324.867px; height: 0px; display: block;\">
<div class=\"inner\">
<a href=\"#\">Placeholder</a>
</div>
</div>
<div class=\"dropdown dropdown-app\">
<div class=\"inner\">
<a href=\"#\">Placeholder</a>

</div>
</div>
<script type=\"text/javascript\">
function activateDropDown(target, height) {
var animate = true;
var prefix = '.dropdown-' + target;
var menuPrefix = '.menu-item-' + target;
var menu = $(prefix);
var height = 0;
height = $(prefix + ' .inner').height()+4+4+8;
$(prefix +', ' + '.menu-item-' + target).hover(function(r){
var item = $(this);
if (item[0].className && item[0].className.indexOf('menu') > -1) {
var left = item.position().left;
menu.css('left', left+'px');
menu.clearQueue().animate({height:height+'px'}, 200);
$(menuPrefix).addClass('active')
}
animate = false;
setTimeout(function(){animate = true;},1);
menu.css('display', 'block');
}, function(r) {
setTimeout(function(){
if (animate) {
menu.animate({height:'0px'}, 200);
$(menuPrefix).removeClass('active');
}
}, 0);
});
}
activateDropDown('about');
activateDropDown('developer');
activateDropDown('community');
activateDropDown('app');
activateDropDown('support');
</script>
</div>
</div>
");
		
        
    

?>


<div id="wrap"> </div>
<div class="leadin-block">
<div class="section1">
<div class="wrap">

<div style="float:left;margin-bottom:25px;">
<h1 >
Welcome to FITkids! Please <strong style="color:#8CC63F">SIGN UP</strong> to join!

</h1>

</div>
    

</div>
</div>


<div class="section2" style=" clear:both; background: linear-gradient(to bottom, rgba(255, 255, 255, 0.2) 0%, rgba(255, 255, 255, 0) 100%) repeat scroll 0% 0% rgb(105, 167, 78);background-color: rgb(105, 167, 78);background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.2) 0%, rgba(255, 255, 255, 0) 100%); height:15px; padding:0px;margin-top:-20px;">
<div class="wrap">

</div>
</div>
</div>



<div class="wrap" style="width:1100px; margin-top:50px;">

 
  
 
  <div id="main">
 
 <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>?action=register" name="registerform" id="registerform">

	<?php

	if ($login->errors) {
	    foreach ($login->errors as $error) {
	        echo '<div class="message_error">'.$error.'</div>'; 
	    }
	}

	if ($login->messages) {
	    foreach ($login->messages as $message) {
	        echo '<div class="message_success">'.$message.'</div>'; 
	    }
	}

	?>
    
    <p style="font-size:32px; 	
">account Information</p>

<table>
<tr>
<td width="150">Username: </td>
<td width="330"><input name="user_name" type="text" /></td>
</tr>

<tr>
<td>Email: </td>
<td width="330"><input name="user_email" type="email" /></td>
</tr>

<tr>
<td>Confirm Email: </td>
<td width="330"><input name="confirm_email" type="email" /></td>
</tr>

<tr>
<td>Password: </td>
<td width="330"><input name="user_password" type="password" /></td>
</tr>

<tr>
<td>Confirm Password: </td>
<td width="330"><input name="confirm_password" type="password" /></td>
</tr>

</table>

<hr style="margin-top:20px;">

<p style="font-size:32px; 	
">personal Information</p>

<table>
<tr>
<td width="150">First Name: </td>
<td width="330"><input name="first_name" type="text" /></td>
</tr>

<tr>
<td>Last Name: </td>
<td width="330"><input name="last_name" type="text" /></td>
</tr>

<tr>
<td>City: </td>
<td width="330"><input name="city" type="text" /></td>
</tr>

<tr>
<td>State: </td>
<td width="330"><input name="state" type="text"  maxlength="2" /></td>
</tr>


</table>

<p>If you will be accessing the system for your family members, you can register them below.</p>

<table>

<tr>
<td width="150"></td>
  <td>
 <label  for="first_child" >What Is the Name of Your First Child?</label><br>
  <input name="first_child" type="text"><br>
  
  </td>
  </tr>
  
  <tr>
<td width="150"></td>
  <td>
  <br>
 <label  for="second_child" >What Is the Name of Your Second Child?</label><br>
  <input name="second_child" type="text"><br>
  
  </td>
  </tr>

</table>

<hr style="margin-bottom:20px;">

<table>
<tr>
<td><input type="submit" name="register" value="submit"> </td>
</tr>
</table>

</form> 

</div>
</div>


<div class="clear-break"> </div>
<br>
<div id="footer">
<div class="wrap hide-trio">
<div class="block s1x2" style="height: auto">
<a href="tools.php">
<b style="font-size:1.5em; ">Tools</b>
</a>
<div class="footer-list">
<a href="tools/tag-it/program.php">Tag-it-A</a>
<a href="tools/growth-chart/program.php">Bmi Growth Chart</a>
<a href="tools/risk-assessment/program.php">Behavior Risk Assessment</a>

</div>
</div>
<div class="block s1x2" style="height: auto">
<a href="projects.php">
<b style="font-size:1.5em; ">Projects</b>
</a>
<div class="footer-list">

<a href="#">Placeholder</a>

</div>
</div>
<div class="block s1x2" style="height: auto">
<a href="information.php">
<b style="font-size:1.5em; ">Information</b>
</a>
<div class="footer-list">
<a href="#">Placeholder</a>

</div>
</div>
<div class="block s1x2" style="height: auto">
<a href="#">
<b style="font-size:1.5em; ">Community</b>
</a>
<div class="footer-list">
<a href="#">Placeholder</a>

</div>
</div>
<div class="block s1x2" style="height: auto">
<a href="contacts.php">
<b style="font-size:1.5em; ">Support</b>
</a>
<div class="footer-list">
<a href="#">Placeholder</a>

</div>
</div>
<!-- <div class="block s1x2" style="height: auto">
<div class="link-label">Social</div>
<div class="footer-list">
<a href="http://www.facebook.com/PhoneGap">
Facebook
<span class="ext"> </span>
</a>
<a href="http://twitter.com/phonegap">
Twitter
<span class="ext"> </span>
</a>
<a href="http://groups.google.com/group/phonegap">
Google Groups
<span class="ext"> </span>
</a>
<a href="/community#irc">IRC</a>
</div>
</div> -->
<div class="clear"> </div>
</div>
<hr>

</div>
</body>
</html>