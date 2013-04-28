<!doctype html>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="content-type">
<meta content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width" name="viewport">
<title>FITkids </title>
    <link type="text/css" href="css/master2.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/preview.css"/>
    
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
  width:845px;
  height: 750px; /*can be anything, just should make sure it is taller than the sidebar*/
  padding: 25px;
  float: left;
      border: 1px solid #bbb;
 box-shadow: -4px 5px 11px rgba(0, 0, 0, 0.1);
    z-index: 1;
  background-color: #fafafa;
}
a{
	text-decoration:none;
	color:purple;
}

#main a:hover{
	color:black;
}

.sidebutton{
	display:block;
        color:white;
	width:200px;
	margin:0 auto;
	text-align:left;
	font-size:1.2em;
	margin-bottom: 1px;
padding-top:10px;
	padding-bottom:10px;
	text-align:center;
	text-shadow:#1f425e 0 -1px 0;
	border-color:#41627c;
	background:-moz-linear-gradient(top, rgba(255, 255, 255, 0.2) 0%, rgba(255, 255, 255, 0) 100%);
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(255, 255, 255, 0.2)), color-stop(100%, rgba(255, 255, 255, 0)));
	background:-webkit-linear-gradient(top, rgba(255, 255, 255, 0.2) 0%, rgba(255, 255, 255, 0) 100%);
	background:-o-linear-gradient(top, rgba(255, 255, 255, 0.2) 0%, rgba(255, 255, 255, 0) 100%);
	background:-ms-linear-gradient(top, rgba(255, 255, 255, 0.2) 0%, rgba(255, 255, 255, 0) 100%);
	background:linear-gradient(to bottom, rgba(255, 255, 255, 0.2) 0%, rgba(255, 255, 255, 0) 100%);
	background-color:rgb(105, 167, 78);	
		

}

.bigsidebutton{
	display:block;
	width:220px;
    color:white;
	background-color:#092e53;
	width:200px;
	padding-top:10px;
	padding-bottom:10px;


}

.bigsidebutton:hover{
	background-color:#092e53;
        color:white;
	
}



.sidebutton:hover{
	
		background-color:#4e7d3a;
        color:white;
	
	
}

#sidebar {
  width: 200px;
  height:300px;
  background-color: #104E8B;
  margin: 40px 0 65px 0;
    padding: 25px 0px;
    float: left;
    border: 1px solid #EEECEC;
    border-right: 0px;
 box-shadow: -4px 5px 11px rgba(0, 0, 0, 0.1);
}

#wrapper {
  width: 1050px; /* MUST HAVE WIDTH SET, should be the sidebar width + main width */
  margin-left: auto;
  margin-right: auto;
}
    
    </style>

    
    <script>
  $(document).ready(function(){
    $('#sidebar').stickyMojo({footerID: '#footer', contentID: '#main'});
  });
</script>


</head>



<body>
<div id="header">
<div class="wrap">
<div class="menu">
<a class="menu-item logo" href="index.php">
<span class="label" style="font-size:50px; color:white; font-family: 'Combo', cursive; margin-bottom:0px;  float:left;  ">FIT<span style="font-family: 'Finger Paint', cursive;">kids</span> </span>
</a>
<a class="menu-item menu-item-about" href="tools.php">
<span class="label">Tools</span>
</a>
<a class="menu-item menu-item-developer" href="projects.php">
<span class="label">Projects</span>
</a>
<a class="menu-item menu-item-community" href="information.php">
<span class="label">Information</span>
</a>
<a class="menu-item menu-item-app" href="#">
<span class="label">Community</span>
</a>
<a class="menu-item menu-item-support" href="contacts.php">
<span class="label">Support</span>
</a>
<a class="menu-item menu-item-account" href="process.php" style=" float:right; width:148px;"><span style="display: inline-block;margin-top:10px;"><img src="images/avatar-small.jpg" /></span>
<span class="label" style="margin-left:5px;display: inline-block; vertical-align:top;"><?php echo $_SESSION['user_name']; ?></span>
</a>


</div>
<div class="dropdown dropdown-about" style="left: 140px; height: 0px; display: block;">
<div class="inner">
<a href="tools/tag-it/program.php">Tag-it-A</a>
<a href="tools/growth-chart/program.php">Bmi Growth Chart</a>
<a href="tools/risk-assessment/program.php">Behavior Risk Assessment</a>

</div>
</div>
<div class="dropdown dropdown-developer" style="left: 221.183px; height: 0px; display: block;">
<div class="inner">
<a href="#">Placeholder</a>
</div>
</div>
<div class="dropdown dropdown-community" style="left: 324.867px; height: 0px; display: block;">
<div class="inner">
<a href="#">Placeholder</a>
</div>
</div>
<div class="dropdown dropdown-app">
<div class="inner">
<a href="#">Placeholder</a>

</div>
</div>
<div class="dropdown dropdown-account" style="left: 140px; height: 0px; display: block;">
<div class="inner">
<a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=logout">Logout</a>

</div>
</div>
<script type="text/javascript">
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
activateDropDown('account');

</script>
</div>
</div>





<div class="wrap" style="width:1100px; margin-top:50px;">

 
  <div id="sidebar">
  <a href="" class="bigsidebutton">
  <div style="margin:0 auto; text-align:center">
  <img src="images/avatar.jpg" /><br>
  <span style="color:white; font-weight:400"><?php echo $_SESSION['user_name']; ?></span>
 </div>
 </a>
 
  <a  style="margin-top:20px;"class="sidebutton" href="tools/growth-chart/program.php">Children</a>
  <a  class="sidebutton" href="tools/growth-chart/program.php">Tools</a>


  </div>
 
  <div id="main">
 
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