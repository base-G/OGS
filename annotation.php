<?php

// import the config file
include_once(__DIR__."/config.php");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Annotations</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Styles -->
    <link href="<?php echo $baseURL.$theme; ?>css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseURL.$theme; ?>css/theme.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo $baseURL.$theme; ?>css/blog.css" type="text/css" media="screen" />

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	<script type="text/javascript" src="<?php echo $baseURL.$theme; ?>js/pdfjs/src/network.js"></script>
  <script type="text/javascript" src="<?php echo $baseURL.$theme; ?>js/pdfjs/src/chunked_stream.js"></script>
  <script type="text/javascript" src="<?php echo $baseURL.$theme; ?>js/pdfjs/src/pdf_manager.js"></script>
  <script type="text/javascript" src="<?php echo $baseURL.$theme; ?>js/pdfjs/src/core.js"></script>
  <script type="text/javascript" src="<?php echo $baseURL.$theme; ?>js/pdfjs/src/util.js"></script>
  <script type="text/javascript" src="<?php echo $baseURL.$theme; ?>js/pdfjs/src/api.js"></script>
  <script type="text/javascript" src="<?php echo $baseURL.$theme; ?>js/pdfjs/src/canvas.js"></script>
  <script type="text/javascript" src="<?php echo $baseURL.$theme; ?>js/pdfjs/src/obj.js"></script>
  <script type="text/javascript" src="<?php echo $baseURL.$theme; ?>js/pdfjs/src/function.js"></script>
  <script type="text/javascript" src="<?php echo $baseURL.$theme; ?>js/pdfjs/src/charsets.js"></script>
  <script type="text/javascript" src="<?php echo $baseURL.$theme; ?>js/pdfjs/src/cidmaps.js"></script>
  <script type="text/javascript" src="<?php echo $baseURL.$theme; ?>js/pdfjs/src/colorspace.js"></script>
  <script type="text/javascript" src="<?php echo $baseURL.$theme; ?>js/pdfjs/src/crypto.js"></script>
  <script type="text/javascript" src="<?php echo $baseURL.$theme; ?>js/pdfjs/src/evaluator.js"></script>
  <script type="text/javascript" src="<?php echo $baseURL.$theme; ?>js/pdfjs/src/fonts.js"></script>
  <script type="text/javascript" src="<?php echo $baseURL.$theme; ?>js/pdfjs/src/glyphlist.js"></script>
  <script type="text/javascript" src="<?php echo $baseURL.$theme; ?>js/pdfjs/src/image.js"></script>
  <script type="text/javascript" src="<?php echo $baseURL.$theme; ?>js/pdfjs/src/metrics.js"></script>
  <script type="text/javascript" src="<?php echo $baseURL.$theme; ?>js/pdfjs/src/parser.js"></script>
  <script type="text/javascript" src="<?php echo $baseURL.$theme; ?>js/pdfjs/src/pattern.js"></script>
  <script type="text/javascript" src="<?php echo $baseURL.$theme; ?>js/pdfjs/src/stream.js"></script>
  <script type="text/javascript" src="<?php echo $baseURL.$theme; ?>js/pdfjs/src/worker.js"></script>
  <script type="text/javascript" src="<?php echo $baseURL.$theme; ?>js/pdfjs/external/jpgjs/jpg.js"></script>
  <script type="text/javascript" src="<?php echo $baseURL.$theme; ?>js/pdfjs/src/jpx.js"></script>
  <script type="text/javascript" src="<?php echo $baseURL.$theme; ?>js/pdfjs/src/jbig2.js"></script>

    <script type="text/javascript">
            PDFJS.workerSrc = '<?php echo $baseURL.$theme; ?>js/pdf.js/src/worker_loader.js';
    </script>

    <style>
        #side2 {
            padding: 20px;
            position: absolute;
            height: auto;
            right: -50%;
            top: 60px;
            margin-top: 30px;
            border-left: 3px solid #eee;
            border-bottom: 3px solid #eee;
            border-top: 3px solid #eee;
            background-color: white;
            z-index: 2;
            display: none;
        }

        /*#showside {
            position: fixed;
            top: 50%;
            right: 1%;
            z-index: 3;
        }*/

        #sketchpad {
            position: absolute;
            top: 0px;
            left: 0px;
            z-index: 1;
        }

        #pdfpad {
            position: absolute;
            top: 0px;
            left: 0px;

        }

        #tmpCanvas {
            display: none;
        }

        #side {
            margin-right: -1%;
        }

		#controlpanel {
			position: fixed;
			top: 80% !important;
			bottom: 1% !important;
		}

        #main {
            position: relative;
            height: auto;   
        }

        .sidebar-nav-fixed {
            padding: 9px 0;
            position:fixed;
            left: 20px;
            margin-top: 30px;
            width: 250px;
        }

        .row-fluid > .span-fixed-sidebar {
            margin-left: 290px;
        }

         .sidebar-nav-fixed {
             position:fixed;
             top:60px;
             width:21.97%;
         }

         @media (max-width: 767px) {
             .sidebar-nav-fixed {
                 width:auto;
             }
         }

         @media (max-width: 979px) {
             .sidebar-nav-fixed {
                 position:static;
                width: auto;
             }
         }

         #navhead {
            margin-bottom: 50px;
         }

         #next, #back {
            margin-left: 1%
         }

         #user { 
         	display: none;
         }

		 button {
			margin-top: 10px !important;
		 }
    </style>
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
                	<ul class="nav pull-right">
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
                    	</li>
	                    <?php
	                        echo "<li><a class=\"btn-header\" href=\"process.php\">Signed in as: " . $_SESSION['user_email']  . "</a></li>";
	                    ?>
                	</ul>
            	</div>
        	</div>
      	</div>
    </div>


    <div class="container-fluid">
        <div class="row-fluid">
            <div id="side2" class="span3">
		
            </div>
        </div>
        <div class="row-fluid">
            <div id="side" class="span3">
                <div class="well sidebar-nav sidebar-nav-fixed">
                    <ul class="nav nav-list">
                        <?php 
				spl_autoload_register( function($class) {
                                        include('classes/Login.class.php');
                                });

                                $login = new Login($dbHost, $dbUser, $dbPass, $dbName);
                            	
					$con = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
                            	$user = $_SESSION['user_email'];
                            	$result = mysqli_query($con, "SELECT user_id FROM Accounts WHERE user_email = '" . $user . "'");
                            	$result = mysqli_fetch_array($result);
                            	$id = $result['user_id'];
                            
                            	$result = mysqli_query($con, "SELECT * FROM Class WHERE CreatorID = '" . $id . "'");

                            	while ($row = mysqli_fetch_array($result)) {
					$classname = $row['ClassName'];
					$class_id = $row['ClassID'];

                                	echo "<li class=\"nav-header\">" . $classname . "</li>";
					echo "<ul class=\"nav nav-list\">";

					$query = mysqli_query($con, "SELECT * FROM Tests WHERE CreatorID = '" . $id . "' AND ClassName = '" . $classname . "'");
					while ($row2 = mysqli_fetch_array($query)) {
						$testname = $row2['TestName'];
						$test_id = $row2['TestID'];						

						echo "<li class=\"nav-header\">" . $testname . "</li>";
						
						$query2 = mysqli_query($con, "SELECT * FROM StudentTest WHERE TestID = '" . $test_id . "' AND ClassID = '" .$class_id."'");
						while ($row3 = mysqli_fetch_array($query2)) {
							$student_id = $row3['StudentID'];
							echo "<li id=\"" . $test_id . ":" . $class_id . "\"><a class=\"testlink ". $student_id . "\" id=\"" . $row3['Location'] . "\" href=\"#\">Student " . $student_id . "</a></li>";
						}
					}
					
					echo "</ul>";
                            	}
                        ?>
                        
			<br />
                    </ul>

			<!--
                    <button id="back" class="btn" type="submit"><i class="icon-chevron-left"></i></button>
                    <button id="next" class="btn" type="submit"><i class="icon-chevron-right"></i></button>

                    <button style="float:right" id="showside" class="btn" type="submit"><i class="icon-chevron-right"></i></button>

		    <button id="undo" class="btn" type="submit"><i class="icon-arrow-left"></i></button>
                    <button id="redo" class="btn" type="submit"><i class="icon-arrow-right"></i></button>
			-->
                </div>
            </div>

            <div id="main" class="span9">
                <canvas id="sketchpad">Your browser does not support canvas, get with the times, please.</canvas>
                <canvas id="tmpCanvas"></canvas>
                <canvas id="pdfpad">Your browser does not support canvas, get with the times, please.</canvas>
            </div>
        </div>
    </div>

	<!--
    <footer id="footer">
        <div class="container">
            <div class="row info">
                <div class="span6 residence">
                    <ul>
                        <li>2301 East Lamar Blvd. Suite 140. City, Arlington.</li>
                        <li>United States, Zip Code TX 76006.</li>
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
    </footer> -->

	<div id="controlpanel" class="span4">
	<ul class="nav nav-list">
		<li class="nav-header">Control Panel</li>
		<li>
			<button id="back" class="btn" type="submit"><i class="icon-chevron-left"></i>Back</button>
                    	<button id="next" class="btn" type="submit"><i class="icon-chevron-right"></i>Next</button>
                    	<button style="float: right" id="showside" class="btn" type="submit"><i class="icon-chevron-right"></i>Input Tab</button>
		</li>
		<li>
                    	<button id="undo" class="btn" type="submit"><i class="icon-arrow-left"></i>Undo</button>
                    	<button id="redo" class="btn" type="submit"><i class="icon-arrow-right"></i>Redo</button>
		</li>
		<li>
			<button id="erase" class="btn btn-inverse" type="submit"><i class="icon-remove icon-white"></i></button>
			<button id="green" class="btn btn-success" type="submit"><i class="icon-tint icon-white"></i></button>
			<button id="blue" class="btn btn-primary" type="submit"><i class="icon-tint icon-white"></i></button>
			<button id="red" class="btn btn-danger" type="submit"><i class="icon-tint icon-white"></i></button>
			<button id="black" class="btn btn-inverse" type="submit"><i class="icon-tint icon-white"></i></button>
			<button id="clear" class="btn" type="submit"><i class="icon-ban-circle"></i></button>
		</li>
	</ul>
	</div>

    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="<?php echo $baseURL.$theme; ?>js/bootstrap.min.js"></script>
    <script src="<?php echo $baseURL.$theme; ?>js/theme.js"></script>
    <script src="<?php echo $baseURL.$theme; ?>js/canvas.js"></script>

</body>
</html>
