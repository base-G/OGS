<?php

// import the config file
include_once(__DIR__."/config.php");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home - base-G</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <!-- Styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseURL.$theme; ?>css/theme.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" type="text/css" href="<?php echo $baseURL.$theme; ?>css/lib/animate.css" media="screen, projection">
    <link rel="stylesheet" href="<?php echo $baseURL.$theme; ?>/css/coming-soon.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo $baseURL.$theme; ?>css/index.css" type="text/css" media="screen" />
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <style>
        #footer {
            margin-top: 40px !important;
            padding-bottom: 50px;
        }
    </style>
</head>
<body class="pull_top">
    <div class="navbar transparent navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="../index.php">
                <strong>base-G</strong>
            </a>
            <div class="nav-collapse collapse">
                <ul class="nav pull-right">
                    <li><a href="index.php" class="active">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="process.php">Sign in</a></li>
                    <li><a href="process.php#signup">Sign up</a></li>

			
                </ul>
            </div>
        </div>
      </div>
    </div>

    <!-- Sign In Option 1 -->
    <div id="coming_soon">
        <div class="head">
            <div class="container">
                <br /><br /><br />
                <div class="span6 text">
                    <h4>Account Activated!</h4>
                    <p>
                        
<?php
mysql_connect($dbHost, $dbUser, $dbPass);
@mysql_select_db($dbName);

$queryString = $_SERVER['QUERY_STRING'];
$query = "SELECT * FROM Accounts"; 
$result = mysql_query($query) or die(mysql_error());
while($row = mysql_fetch_array($result))
{
	if ($queryString == $row["activationkey"])
	{
		echo "<p>Congratulations! " . $row["user_first_name"] . " Your account is activated.</p>";
	

		
		
		mysql_query("UPDATE Accounts SET user_activated=1
		WHERE activationkey='".$queryString."'");
		
	}
}
?></p>
                </div>
</div></div>
               

        <!-- <div class="email_wrapp">
            <div class="container">
                <div class="span11 wrapp">
                    <p><strong>Sign up here</strong> to be one of the first to know when it´s ready</p>
                    <input type="text" placeholder="Email address...">
                    <a href="#" class="btn send">ok</a>
                </div>
            </div>
        </div> -->

        <div class="social">
            <br /><br />
            <div class="container">
                    <p>Follow us</p>
                    <a href="#" class="facebook">
                        <span class="icons ico1"></span>
                        <span class="iconsh ico1h"></span>
                    </a>
                    <a href="#" class="twitter">
                        <span class="icons ico2"></span>
                        <span class="iconsh ico2h"></span>
                    </a>
                    <a href="#" class="gplus">
                        <span class="icons ico3"></span>
                        <span class="iconsh ico3h"></span>
                    </a>
            </div>
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

    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="<?php echo $baseURL.$theme; ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo $baseURL.$theme; ?>/js/theme.js"></script>

    <script>
        window.setInterval(function(){
            today = new Date();

            BigDay = new Date("May 7, 2013");
            msPerDay = 24 * 60 * 60 * 1000 ;
            timeLeft = (BigDay.getTime() - today.getTime());
            e_daysLeft = timeLeft / msPerDay;
            daysLeft = Math.floor(e_daysLeft);
            e_hrsLeft = (e_daysLeft - daysLeft)*24;
            hrsLeft = Math.floor(e_hrsLeft);
            e_minsLeft = (e_hrsLeft - hrsLeft)*60;
            minsLeft = Math.floor(e_minsLeft);
            e_secsLeft = (e_minsLeft - minsLeft)*60;
            secLeft = Math.floor(e_secsLeft);

            $("#minutes").html(minsLeft);
            $("#hours").html(hrsLeft);
            $("#days").html(daysLeft);
            $("#seconds").html(secLeft);
        }, 1000);
    </script>
</body>
</html>


