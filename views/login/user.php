<?php
 // Don't need to import config because this script is included by process.php which alread includes config.php
?>
<!DOCTYPE html>
<html>
<head>
	<title>User - base-G</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <!-- Styles -->
    <link href="<?php echo $baseURL.$theme; ?>css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo $baseURL.$theme; ?>css/jasny-bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseURL.$theme; ?>css/theme.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" type="text/css" href="<?php echo $baseURL.$theme; ?>css/lib/animate.css" media="screen, projection">
    <link rel="stylesheet" href="<?php echo $baseURL.$theme; ?>css/manage.css" type="text/css" media="screen" />

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	<style>
		#createContent, #success, #error, #deleteContent, #success2, #error2 { display: none; }
		.curUser { display: none; }

	</style>

</head>
<body>
	<?php
                spl_autoload_register( function($class) {
                        include('../../classes/Login.class.php');
                });

                $login = new Login();

				$con = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
                $user = $_SESSION['user_email'];
                $result = mysqli_query($con, "SELECT user_id FROM Accounts WHERE user_email = '" . $user . "'");
                $result = mysqli_fetch_array($result);
                $id = $result['user_id'];
        ?>

	<span id=<?php echo '"' . $id . '"' ?> class="curUser"></span>

    <div id="cover">
        <div class="navbar navbar-inverse navbar-static-top">
          <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a class="brand" href="index.php">
                    <strong>base-G</strong>
                </a>
                <div class="nav-collapse collapse">
                    <ul class="nav pull-right">
                        <li><a href="process.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
			
			<li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Options <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                        <li><a href="annotation.html" class="active">Grade</a></li>
                                        <li><a href="upload_file.html">Upload</a></li>
                                        <li><a href="manageClass.php">Manage Classes</a></li>
                                        <li><a href="SelectTest.php">Manage Tests</a></li>
					<li><a href="results.php">Results</a></li>
                                </ul>
                        </li>

			<!--
                        <li><a href="annotation.html">Grade</a></li>
                        <li><a href="upload_file.html">Upload</a></li>
						<li><a href="manageClass.php">Manage Classes</a></li>
                        <li><a href="SelectTest.php">Manage Tests</a></li>
			-->
                        <?php echo "<li><a href=\"#\">Sign in as: " . $_SESSION['user_email'] . "</a></li>"; ?>
			<?php echo "<li><a href=\"" . $_SERVER['PHP_SELF'] . "?action=logout\">Logout</a></li>"; ?>
                    </ul>
                </div>
            </div>
          </div>
        </div>

        <div id="sign_in1">
            <div class="container">
                <div class="row">
                    <div class="span12 header">
                        <h4>Your Information</h4>
                    </div>

		<div class="span6 division">
		
		</div>

	

                </div>
            </div>
        </div>
        
        <div class="container">
      <div class="container"><div class="span5" style="float:left"><h3>Classes</h3></div>   <div class="span6" style="float:right"><h3>Tests</h3></div>
</div>

        	<div class="span5" style=" float:left;box-shadow: 0 0 5px 0 rgb(238, 238, 238);border: 1px solid 
#DFDFDF;border-radius: 5px;">
	<table class="table table-striped" >
            <thead>
    			<tr>
      				<th>Class Name</th>
    			</tr>
  </thead>
  <tbody>
            <?php
			mysql_connect($dbHost, $dbUser, $dbPass);
@mysql_select_db($dbName);
			$query = "SELECT ClassName FROM Class WHERE CreatorID=".$id.""; 
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result))
{
	Print "<tr><td>".$row['ClassName']."</td></tr>";				
			
}
			 ?>
			 
</tbody>
            
</table>
		</div>

        <div class="span6" style=" float:right; box-shadow: 0 0 5px 0 rgb(238, 238, 238);border: 1px solid 
#DFDFDF;border-radius: 5px;">

	<table class="table table-striped table-bordered" >
            <thead>
    			<tr>
      				<th>Test Name</th>
                    <th>Class Name</th>

    			</tr>
  </thead>
  <tbody>
            <?php
	
			$query = "SELECT TestName,ClassName FROM Tests WHERE CreatorID=".$id.""; 
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result))
{
	Print "<tr><td>".$row['TestName']."</td><td>".$row['ClassName']."</td></tr>";				
			
}
			 ?>
			 
</tbody>
            
</table>
		</div>
</div>
        
        <footer id="footer">
            <div class="container">
                <div class="row info">
                    <div class="span6 residence">
                        <ul>
                            <li>base-G - Online Grading System</li>
                            <li>Based in Memphis, TN.</li>
                        </ul>
                    </div>
                    <div class="span5 touch">
                        <ul>
                            <li><strong>P.</strong></li>
                            <li><strong>E.</strong><a href="#"> baseg@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row credits">
                    <div class="span12">
                        <div class="row social">
                            <div class="span12">
                                <a href="#" class="facebook">
                                    <span class="socialicons ico1"></span>
                                    <span class="socialicons_h ico1h"></span>
                                </a>
                                <a href="#" class="twitter">
                                    <span class="socialicons ico2"></span>
                                    <span class="socialicons_h ico2h"></span>
                                </a>
                                <a href="#" class="gplus">
                                    <span class="socialicons ico3"></span>
                                    <span class="socialicons_h ico3h"></span>
                                </a>
                            </div>
                        </div>
                        <div class="row copyright">
                            <div class="span12">
                                © 2013 base-G. All rights reserved. Website theme thanks to Clean Canvas.
                            </div>
                        </div>
                    </div>            
                </div>
            </div>
        </footer>
    </div>

    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="<?php echo $baseURL.$theme; ?>js/bootstrap.js"></script>
    <script src="<?php echo $baseURL.$theme; ?>js/jasny-bootstrap.js"></script>
    <script src="<?php echo $baseURL.$theme; ?>js/theme.js"></script> 
    <script src="http://malsup.github.com/jquery.form.js"></script> 
    <script src="<?php echo $baseURL.$theme; ?>js/manage.js"></script>
</body>
</html>
