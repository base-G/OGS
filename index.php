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
    <link href="<?php echo $baseURL.$theme; ?>css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseURL.$theme; ?>css/theme.css">
    <link rel="stylesheet" href="<?php echo $baseURL.$theme; ?>css/index.css" type="text/css" media="screen" />

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="<?php echo $baseURL.$theme; ?>css/lib/animate.css" media="screen, projection">    

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
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
            <a class="brand" href="index.php">
                <strong>base-G</strong>
            </a>
            <div class="nav-collapse collapse">
                <ul class="nav pull-right">
                    <li><a href="index.php" class="active">Home</a></li>
                    <li><a href="about.php">About</a></li>
		
                    <?php
				spl_autoload_register( function($class) {
    					include('classes/' . $class . '.class.php');
				});

				$login = new Login($dbHost, $dbUser, $dbPass, $dbName);

				if ($login->isLoggedIn()) {
					echo "<li class=\"dropdown\">";
					echo "<a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">Options <b class=\"caret\"></b></a>";
 	                               	echo "<ul class=\"dropdown-menu\">";
					echo "<li><a href=\"annotation.php\">Grade</a></li>";
                                        echo "<li><a href=\"upload_file.php\">Upload</a></li>";
					echo "<li><a href=\"manageClass.php\">Manage Classes</a></li>";
					echo "<li><a href=\"SelectTest.php\">Manage Tests</a></li>";
					echo "<li><a href=\"results.php\">Results</a></li>";
					echo "</ul>";
					echo "</li>";

					echo "<li><a class=\"btn-header\" href=\"#\">Signed in as: " . $_SESSION['user_email']  . "</a></li>";
					echo "<li><a href=\"" . $_SERVER['PHP_SELF'] . "?action=logout\">Logout</a></li>";
				} else {
					echo "<li><a href=\"process.php\">Sign in</a></li>";
                    			echo "<li><a href=\"process.php#signup\">Sign up</a></li>";
				}
			?>
                </ul>
            </div>
        </div>
      </div>
    </div>

    <section id="feature_slider" class="">
        <!-- 
            Each slide is composed by <img> and .info
            - .info's position is customized with css in index.css
            - each <img> parallax effect is declared by the following params inside its class:
            
            example: class="asset left-472 sp600 t120 z3"
            left-472 means left: -472px from the center
            sp600 is speed transition
            t120 is top to 120px
            z3 is z-index to 3
            Note: Maintain this order of params

            For the backgrounds, you can combine from the bgs folder :D
        -->
       
        <article class="slide" id="responsive" style="background: url('<?php echo $baseURL.$theme; ?>img/backgrounds/indigo.jpg') repeat-x top center;">
            <img class="asset left-472 sp600 t120 z3" src="<?php echo $baseURL.$theme; ?>img/grading.png" />
            <img class="asset left-190 sp500 t120 z2" src="<?php echo $baseURL.$theme; ?>img/upload.png" />
            <div class="info">
                <h2>
                     <strong>UPLOAD & GRADE</strong>
                     tests
                </h2>                
            </div>
        </article>        
        <article class="slide" id="responsive" style="background: url('<?php echo $baseURL.$theme; ?>img/backgrounds/indigo.jpg') repeat-x top center;">
            <img class="asset left-472 sp600 t120 z3" src="<?php echo $baseURL.$theme; ?>img/grading.png" />
            <img class="asset left-190 sp500 t120 z2" src="<?php echo $baseURL.$theme; ?>img/upload.png" />
            <div class="info">
                <h2>
                     <strong>UPLOAD & GRADE</strong>
                     tests
                </h2>                
            </div>
        </article>        
        <article class="slide" id="responsive" style="background: url('<?php echo $baseURL.$theme; ?>img/backgrounds/indigo.jpg') repeat-x top center;">
            <img class="asset left-472 sp600 t120 z3" src="<?php echo $baseURL.$theme; ?>img/grading.png" />
            <img class="asset left-190 sp500 t120 z2" src="<?php echo $baseURL.$theme; ?>img/upload.png" />
            <div class="info">
                <h2>
                     <strong>UPLOAD & GRADE</strong>
                     tests
                </h2>                
            </div>
        </article>        
        <article class="slide" id="responsive" style="background: url('<?php echo $baseURL.$theme; ?>img/backgrounds/indigo.jpg') repeat-x top center;">
            <img class="asset left-472 sp600 t120 z3" src="<?php echo $baseURL.$theme; ?>img/grading.png" />
            <img class="asset left-190 sp500 t120 z2" src="<?php echo $baseURL.$theme; ?>img/upload.png" />
            <div class="info">
                <h2>
                     <strong>UPLOAD & GRADE</strong>
                     tests
                </h2>                
            </div>
        </article>        
    </section>

    

    <div id="features">
        <div class="container">
            <div class="section_header">
                <h3>Features</h3>
            </div> 
            <div class="row feature">
                <div class="span6">
                    <img src="<?php echo $baseURL.$theme; ?>img/showcase1.png" />
                </div>
                <div class="span6 info">
                    <h3>
                        <img src="<?php echo $baseURL.$theme; ?>img/features-ico1.png" />
                        Beautiful on all devices
                    </h3>
                    <p>
                       base-G can be viewed beautifully on any device wether it is a phone, tablet, or computer. The functionality easliy converts between each device with grace and elegance.  
                    </p>
                </div>
            </div>
            <div class="row feature ss">
                <div class="span6 info">
                    <h3>
                        <img src="<?php echo $baseURL.$theme; ?>img/features-ico2.png" />
                        Fast Uploading
                    </h3>
                    <p>
                                                       base-G allows teachers to upload tests to the program directly from a scanner. This allows the teacher to view and store the test online.

                    </p>
                </div>
                <div class="span6">
                    <img src="<?php echo $baseURL.$theme; ?>img/upload2.png" class="pull-right" />
                </div>
            </div>
            <div class="row feature ss">
                <div class="span6">
                    <img src="<?php echo $baseURL.$theme; ?>img/reportcard.gif" />
                </div>
                <div class="span6 info">
                    <h3>
                        <img src="<?php echo $baseURL.$theme; ?>img/features-ico3.png" />
                       Easy grading
                    </h3>
                    <p>
                        base-G offers an easy and effective way to grade and view tests for teachers of all grades. Allows teachers to grade and keep track of grades without the hassle of using paper and pen.
                    </p>
                </div>
              
            </div>
            
                        <div class="row feature ss">

               <div class="span6 info">
                    <h3>
                        <img src="<?php echo $baseURL.$theme; ?>img/features-ico3.png" />
                       Custom comments
                    </h3>
                    <p>
                        base-G is implemented with an interface that allows the teacher to draw or write comments on the test with HTML5 canvas. There is also a comparment that allows the user to type comments for each question.
                    </p>
                </div>
                <div class="span6">
                    <img src="<?php echo $baseURL.$theme; ?>img/cloud.png" class="pull-right" />
                </div>
                </div>
        </div>
    </div>


    <!-- Pricing Option -->
    <div id="in_pricing">
        <div class="container">
            <div class="section_header">
                <h3>Pricing</h3>
            </div>

            <div class="row charts_wrapp">
                <!-- Plan Box -->
                <div class="span4">
                    <div class="plan">
                        <div class="wrapper">
                            <h3>Student</h3>
                            <div class="price">
                                <span class="dollar">$</span> 
                                <span class="qty">0.00</span> 
                                <span class="month">/year</span>
                            </div>
                            <div class="features">
                                <p>
                                    <strong>Unlimited</strong>
                                    Classes
                                </p>
                                <p>
                                    <strong>Unlimited</strong>
                                    Tests
                                </p>
                              
                            </div>
                            <a class="order" href="#">SIGN UP NOW</a>
                        </div>
                    </div>
                </div>
                <!-- Plan Box -->
                <div class="span4 pro">
                    <div class="plan">
                        <div class="wrapper">
                            <img class="ribbon" src="<?php echo $baseURL.$theme; ?>img/badge.png">
                            <h3>Teacher</h3>
                            <div class="price">
                                <span class="dollar">$</span> 
                                <span class="qty">0.00</span> 
                                <span class="month">/year</span>
                            </div>
                            <div class="features">
                                <p>
                                    <strong>Unlimited</strong>
                                    Classes
                                </p>
                                <p>
                                    <strong>Unlimited</strong>
                                    Tests
                                </p>
                               
                            </div>
                            <a class="order" href="#">SIGN UP NOW</a>
                        </div>
                    </div>
                </div>
                <!-- Plan Box -->
                <div class="span4 standar">
                    <div class="plan">
                        <div class="wrapper">
                            <h3>Teaching Assistant</h3>
                            <div class="price">
                                <span class="dollar">$</span> 
                                <span class="qty">0.00</span> 
                                <span class="month">/year</span>
                            </div>
                            <div class="features">
                                <p>
                                    <strong>Unlimited</strong>
                                    Classes
                                </p>
                                <p>
                                    <strong>Unlimited</strong>
                                    Tests
                                </p>
                                
                            </div>
                            <a class="order" href="#">SIGN UP NOW</a>
                        </div>
                    </div>
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

    <!-- Scripts -->
  		<script src="http://code.jquery.com/jquery-latest.js"></script>
	    <script src="<?php echo $baseURL.$theme; ?>js/bootstrap.min.js"></script>
	    <script src="<?php echo $baseURL.$theme; ?>js/theme.js"></script>

    <script type="text/javascript" src="<?php echo $baseURL.$theme; ?>js/index-slider.js"></script>	
</body>
</html>
