<?php

// import the config file
include_once(__DIR__."/config.php");

?>
<!DOCTYPE html>
<html>
<head>
	<title>About - base-G</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Styles -->
    <link href="<?php echo $baseURL.$theme; ?>css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseURL.$theme; ?>css/theme.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" type="text/css" href="<?php echo $baseURL.$theme; ?>css/lib/animate.css" media="screen, projection">
    <link rel="stylesheet" href="<?php echo $baseURL.$theme; ?>css/about.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo $baseURL.$theme; ?>css/lib/flexslider.css" type="text/css" media="screen" />

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
</head>
<body>
	<?php
                spl_autoload_register( function($class) {
                        include('classes/Login.class.php');
                });

                $login = new Login($dbHost, $dbUser, $dbPass, $dbName);
                echo "<div id=\"user\">" . $_SESSION['user_email'] . "</div>";
        ?>

    <div id="navhead" class="navbar navbar-inverse navbar-static-top navbar-fixed-top">
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
            		<?php 
	            		if( ( $login->isLoggedIn() ) )
						{
							echo '<ul class="nav pull-right">
		                    	<li><a href="index.php">Home</a></li>
		                    	<li><a href="about.php" class="active">About</a></li>
								<li class="dropdown">
		                        	<a class="dropdown-toggle" data-toggle="dropdown" href="#">Options <b class="caret"></b></a>
		                            <ul class="dropdown-menu">
			                            <li><a href="annotation.php">Grade</a></li>
			                            <li><a href="upload_file.php">Upload</a></li>
			                            <li><a href="manageClass.php">Manage Classes</a></li>
			                            <li><a href="SelectTest.php">Manage Tests</a></li>
			                    		<li><a href="results.php">Results</a></li>
									</ul>
		                    	</li><li><a class=\"btn-header\" href=\"process.php\">Signed in as: ' . $_SESSION['user_email']  . '</a></li>
		                	</ul>';
						}
						else
						{
							echo '<ul class="nav pull-right">
				                    <li><a href="index.php">Home</a></li>
				                    <li><a href="about.php">About</a></li>
				                    <li><a href="process.php#signup">Sign up</a></li>
				                    <li><a href="process.php">Sign in</a></li>
				                </ul>';
						}
					?>
                	
            	</div>
        	</div>
      	</div>
    </div>


	<div id="aboutus">
		<div class="container">
			<div class="section_header"> <h3>About base-G</h3> </div>
			<div class="row">
				<div class="span6 intro">
					<h6>Convenient. Accessible. Refined.</h6>
						<p>
						base-G allows professors to establish a class list, compose tests for those classes, and grade those tests all in the same system!
						<br>Grade on the go with your smartphone or tablet!
						<br>Set permissions for TAs so they can grade for you!
						<br>Students can review their grades and submit questions!
						</p>
				</div>
				<div class="span6 flexslider">
					<ul class="slides">
						<li> <img src="<?php echo $baseURL.$theme; ?>img/about_slide1.jpg" /> </li>
						<li> <img src="<?php echo $baseURL.$theme; ?>img/about_slide1.jpg" /> </li>
						<li> <img src="<?php echo $baseURL.$theme; ?>img/about_slide1.jpg" /> </li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div id="team">
		<div class="container">
			<div class="section_header"> <h3>Meet the Devs</h3> </div>
				<div class="row people">
					<div class="row row1">
						<div class="span6 bio_box">
							<img src="http://sylvainw.github.io/HTML5-Future/img/github.png" width="200px" height="200px" alt="">
								<div class="info">
									<p class="name">Adam Alyyan</p>
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

              <div class="span6 bio_box bio_boxr">
                <img src="http://sylvainw.github.io/HTML5-Future/img/github.png" width="200px" height="200px" alt="">
                  <div class="info">
                    <p class="name">Sean Beach</p>
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
              </div>

              <div class="row row1">
                <div class="span6 bio_box">
                  <img src="http://sylvainw.github.io/HTML5-Future/img/github.png" width="200px" height="200px" alt="">
                    <div class="info">
                      <p class="name">Brandon Curry</p>
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

                  <div class="span6 bio_box bio_boxr">
                    <img src="http://sylvainw.github.io/HTML5-Future/img/github.png" width="200px" height="200px" alt="">
            		      <div class="info">
                        <p class="name">Ethan Willis</p>
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
                	</div>
          	  	</div>
        			</div>
   					</div>

		<div id="process">
        <div class="container">
            <div class="section_header">
                <h3>The Grading Process</h3>
            </div>
            <div class="row services_circles">
                <div class="span4 description">
                    <div class="text active">
                        <h4>Everything in one place</h4>
                        <p>
                        All your classes; all your students; all your tests. Bring everything together under the base-G umbrella.
                        </p>
                    </div>
                    <div class="text">
                        <h4>Grade on the go</h4>
                        <p>
                        Everything is stored in the cloud, so you can access everything at any time, from wherever you are.
                        </p>
                    </div>
                    <div class="text">
                        <h4>Let us guide you</h4>
                        <p>
                        Grades saved as you grade, so you never lose changes.<br>Take notes directly onto the tests, so comments are easy.<br>View analytics for each question and learning objective covered in your tests.
                        </p>
                    </div>
                </div>

                <div class="span7 areas">
                    <div class="circle active">
                        <img src="<?php echo $baseURL.$theme; ?>img/develop.png" />
                        <span>Convenient</span>
                    </div>
                    <div class="circle">
                        <img src="<?php echo $baseURL.$theme; ?>img/plan.png" />
                        <span>Accessible</span>
                    </div>
                    <div class="circle last_circle">
                        <img src="<?php echo $baseURL.$theme; ?>img/design.png" />
                        <span>Refined</span>
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
                        <li><strong>P.</strong> (901)678-5465</li>
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
    <script type="text/javascript" src="<?php echo $baseURL.$theme; ?>js/flexslider.js"></script>
</body>
</html>

