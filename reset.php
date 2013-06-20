<?php

// import the config file
include_once("config.php");

?>
			<?php
include("include/send.php");

if(isset($_POST["reset"]) && !empty($_POST['user_email'])) {

				$resetKey =  mt_rand() . mt_rand() . mt_rand() . mt_rand() . mt_rand();
				
	

		mysql_connect($dbHost, $dbUser, $dbPass) or die(mysql_error()); 
		mysql_select_db($dbName) or die(mysql_error()); 
		
		mysql_query("UPDATE Accounts SET resetkey=".$resetKey." WHERE user_email='".$_POST['user_email']."'");
		
		
		


                       $message = "<p>Your password reset request was successfully submitted. An email has been sent with a link to reset password. Please <a href='process.php'>click here to login</a>.</p>";
						
						$subject = "base-G Password Change Request";

						$email_message = "Welcome to base-G!\r\r You can reset your password by clicking the following link:\rhttp://baseg.codemelody.com/resetpassword.php?".$resetKey."\r\rIf this is an error, ignore this email.\r\rRegards,\r base-G";

						

					        sendmail($_POST['user_email'],$subject,$email_message);		
		
		}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Reset - base-G</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <!-- Styles -->
    <link href="<?php echo $baseURL.$theme; ?>css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseURL.$theme; ?>css/theme.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseURL.$theme; ?>css/reset.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
    <div class="navbar navbar-inverse navbar-static-top">
      <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="index.html">
                <strong>base-G</strong>
            </a>
            <div class="nav-collapse collapse">
                <ul class="nav pull-right">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="process.php">Sign in</a></li>
                    <li><a href="process.php#signup">Sign up</a></li>
                  
                </ul>
            </div>
        </div>
      </div>
    </div>

    <div id="reset_pwd" class="reset_page">
        <div class="container">
            <div class="row">
                <div class="span12 box_wrapper">
                <div class="span12 box">
                    <div>
                        <div class="head">
                            <h4>Enter your email address below to receive instructions on how to reset your password.</h4>
                            <div class="line"></div>
                        </div>
                        <div class="form">
						<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" name="resetform" id="resetform"> 
                        
                        <?php  if (isset($_POST["reset"])) {
	        echo '<div class="message_success">'.$message.'</div>'; 
	} ?>                        <input type="text" name="user_email" placeholder="Email address"/>
                                <input type="submit" class="btn" name="reset" value="Reset password"/>
                            </form>
                        </div>
                    </div>
                </div>
                <p class="already">Know your password? <a href="sign-in.html"> Sign in</a></p>
            </div>
            </div>
        </div>
    </div>

    <!-- starts footer -->
    <footer id="footer">
        <div class="container">
            <div class="row info">
                <div class="span6 residence">
                    <ul>
                        <li>3725 Norriswood Avenue</li>
                        <li>Memphis, TN 38152</li>
                    </ul>
                </div>
                <div class="span5 touch">
                    <ul>
                        <li><strong>P.</strong> 1 817 274 2933</li>
                        <li><strong>E.</strong><a href="#"> bootstrap@twitter.com</a></li>
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
                            <a href="#" class="flickr">
                                <span class="socialicons ico4"></span>
                                <span class="socialicons_h ico4h"></span>
                            </a>
                            <a href="#" class="pinterest">
                                <span class="socialicons ico5"></span>
                                <span class="socialicons_h ico5h"></span>
                            </a>
                            <a href="#" class="dribble">
                                <span class="socialicons ico6"></span>
                                <span class="socialicons_h ico6h"></span>
                            </a>
                            <a href="#" class="behance">
                                <span class="socialicons ico7"></span>
                                <span class="socialicons_h ico7h"></span>
                            </a>
                        </div>
                    </div>
                    <div class="row copyright">
                        <div class="span12">
                            © 2013 Clean Canvas. All rights reserved. Theme by Detail Canvas.
                        </div>
                    </div>
                </div>            
            </div>
        </div>
    </footer>

    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="<?php echo $baseURL.$theme; ?>js/bootstrap.min.js"></script>
    <script src="<?php echo $baseURL.$theme; ?>js/theme.js"></script>
</body>
</html>
