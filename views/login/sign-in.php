<?php

// import the config file
include_once("config.php");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Account - base-G</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <!-- Styles -->
    <link href="<?php echo $baseURL.$theme; ?>css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseURL.$theme; ?>css/theme.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" type="text/css" href="<?php echo $baseURL.$theme; ?>css/lib/animate.css" media="screen, projection">
    <link rel="stylesheet" href="<?php echo $baseURL.$theme; ?>css/sign-in.css" type="text/css" media="screen" />

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
                    <li><a href="process.php#signup">Sign up</a></li>
                    <li><a href="process.php">Sign in</a></li>
                </ul>
            </div>
        </div>
      </div>
    </div>

    <!-- Sign In Option 1 -->
    <div id="sign_in1">
        <div class="container">
            <div class="row">
                <div class="span12 header">
                    <h4>Log in to your account</h4>
                    <p>Just fill in your email address and password to access your account.</p>

                    <div class="span4 social">
                        <a href="#" class="circle facebook">
                            <img src="<?php echo $baseURL.$theme; ?>img/face.png" alt="">
                        </a>
                         <a href="#" class="circle twitter">
                            <img src="<?php echo $baseURL.$theme; ?>img/twt.png" alt="">
                        </a>
                         <a href="#" class="circle gplus">
                            <img src="<?php echo $baseURL.$theme; ?>img/gplus.png" alt="">
                        </a>
                    </div>
                </div>

                <div class="span3 division">
                    <div class="line l"></div>
                    <span>login</span>
                    <div class="line r"></div>
                </div>

                <div class="span12 footer">
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" name="loginform" id="loginform">
                    <?php

    if ($login->errors) {
        foreach ($login->errors as $error) {
            echo '<div class="message_error">'.$error.'</div>';                
        }
    }
    
    ?>
                        <input  name="user_email" type="text" placeholder="Email">
                        <input type="password" name="user_password" placeholder="Password">
                        <input type="submit" name="login" placeholder="Confirm Password" value="sign in">
                    </form>
                </div>

                <div class="span12 proof">
                    <div class="span5 remember">
                        <label class="checkbox">
                            <input type="checkbox"> Remember me
                        </label>
                        <a href="reset.php">Forgot password?</a>
                    </div>

                    <div class="span3 dosnt">
                        <span>Don’t have an account?</span>
                        <a href="sign-up.html">Sign up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<a id="signup" name="signup" ></a>
    <!-- Sign In Option 2 -->
    <div id="sign_in2">
        <div class="container">
            <div class="section_header">
                <h3>Sign up <span></span></h3>
            </div>
            <div class="row login">
                <div class="span5 left_box">
                    <h4>Create your account</h4>

                    <div class="perk_box">
                        <div class="perk">
                            <span class="icos ico1"></span>
                            <p><strong>Account Types</strong> exist for both professors and students.</p>
                        </div>
                        <div class="perk">
                            <span class="icos ico2"></span>
                            <p><strong>Simplicity</strong> in account creation, quick and clean.</p>
                        </div>
                        <div class="perk">
                            <span class="icos ico3"></span>
                            <p><strong>Security </strong> is a major priority. Your password is safely stored and hashed.</p>
                        </div>
                    </div>
                </div>

                <div class="span6 signin_box">
                    <div class="box">
                        <div class="box_cont">
                            <div class="social">
                                <a href="#" class="circle facebook">
                                    <img src="<?php echo $baseURL.$theme; ?>img/face.png" alt="">
                                </a>
                                 <a href="#" class="circle twitter">
                                    <img src="<?php echo $baseURL.$theme; ?>img/twt.png" alt="">
                                </a>
                                 <a href="#" class="circle gplus">
                                    <img src="<?php echo $baseURL.$theme; ?>img/gplus.png" alt="">
                                </a>
                            </div>

                            <div class="division">
                                <div class="line l"></div>
                                <span>or</span>
                                <div class="line r"></div>
                            </div>

                            <div class="form">
                                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>#signup" name="registerform" id="registerform">
                                
                                <?php

	if ($login->errors2) {
	    foreach ($login->errors2 as $error2) {
	        echo '<div class="message_error">'.$error2.'</div>'; 
	    }
	}

	if ($login->messages) {
	    foreach ($login->messages as $message) {
	        echo '<div class="message_success">'.$message.'</div>'; 
	    }
	}

	?>
                   					<select name="account_type">
                                    	<option value="">Account Type: Select One</option>
										<option value="1">Professor</option>
                                        <option value="2">TA</option>
										<option value="3">Student</option>
									</select>
                                    <input type="text" name="user_email" placeholder="Email">
                                    <input type="password" name="user_password" placeholder="Password">
                                    <input type="password" name="confirm_password" placeholder="Confirm Password">
                                    <input type="text" name="first_name" placeholder="First Name">
                                    <input type="text" name="last_name" placeholder="Last Name">


                                    <div class="forgot">
                                        <span>Don’t have an account?</span>
                                        <a href="sign-up.html">Sign up</a>
                                    </div>
                                    <input type="submit" name="register" value="sign up">
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
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
    <script src="<?php echo $baseURL.$theme; ?>js/bootstrap.min.js"></script>
    <script src="<?php echo $baseURL.$theme; ?>js/theme.js"></script>
</body>
</html>
