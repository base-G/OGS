<!DOCTYPE html>
<html>
<head>
	<title>Upload - base-G</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <!-- Styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/jasny-bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/theme.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" type="text/css" href="css/lib/animate.css" media="screen, projection">
    <link rel="stylesheet" href="css/upload.css" type="text/css" media="screen" />

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	<style>
		#shield {
			display: none;
			opacity: 0.40;
			position: absolute;
			width: 100%;
			height: 100%;
			z-index: 1;
			background-color: #000;
		}
	</style>

</head>
<body>
	<div id="shield">
	</div>

	<?php
                spl_autoload_register( function($class) {
                        include('classes/Login.class.php');
                });

                $login = new Login();
        ?>

    <div id="cover">
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
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">Options <b class="caret"></b></a>
				<ul class="dropdown-menu">
                        		<li><a href="annotation.php">Grade</a></li>
                        		<li><a href="#" class="active">Upload</a></li>
					<li><a href="manageClass.php">Manage Classes</a></li>
                        		<li><a href="SelectTest.php">Manage Tests</a></li>
					<li><a href="results.php">Results</a></li>
				</ul>
			</li>
                        <?php echo "<li><a href=\"process.php\">Sign in as: " . $_SESSION['user_email'] . "</a></li>"; 
			?>
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
                        <h4>Upload your tests</h4>
                        <p>
                            Please fill in the information regarding the test you are uploading, and then hit upload to add it to our database.</p>

                        <div class="span4 social">
                            
                        </div>
                    </div>

                    <div class="span3 division">
                        <div class="line l"></div>
                        <span>upload</span>
                        <div class="line r"></div>
                    </div>

                    <div class="span12 footer">
                        <form id="myform" action="php/upload.php" method="post" enctype="multipart/form-data">
                                <?php
                                    // Connect to the database.
                                    $con = mysqli_connect("localhost", "root", "baseg", "baseg");
                                    	if (mysqli_connect_errno($con)) {
  				        	echo "Failed to connect to MySQL: " . mysqli_connect_error();
     		 			} 

					$user = $_SESSION['user_email'];

                                    // Get the user ID.
                                    $result = mysqli_query($con, "SELECT user_id FROM Accounts WHERE user_email = '" . $user . "'");
                                    $result = mysqli_fetch_array($result);
                                    $id = $result['user_id'];

                                    echo "<select name=\"myclass\" class=\"span3\" onChange=\"updateTests(this.value, " . $id . ");\">";
                                    echo "<option selected=\"selected\">Select Class</option>";

                                    $result = mysqli_query($con, "SELECT * FROM Class WHERE CreatorID = '" . $id . "'");

                                    while ($row = mysqli_fetch_array($result)) {
                                        echo "<option>" . $row['ClassName'] . "</option>";
                                    }

                                    mysqli_close($con);

                                    echo "</select>";
                                    echo "<select name=\"mytest\" class=\"span3\" id=\"tests\">";
                                    echo "<option selected=\"selected\">Select Test</option>";
                                    echo "</select>";
                                ?>
                            
                            <!--
                            <select class="span3" id="students">
                                <option selected="selected">Select Student</option>
                            </select>
				-->

                            <br /><br />

				<div class="fileupload fileupload-new" data-provides="fileupload">
                              <div class="input-append">
                                <div class="uneditable-input span3"><i class="icon-file fileupload-exists"></i> <span class="fileupload-preview"></span></div><span class="btn btn-file"><span class="fileupload-new">Select file</span><span class="fileupload-exists">Change</span><input name="file" type="file" /></span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                              	</div>
                            	</div>

                            <br />
                            <input id="formSub" type="submit" name="submit" value="Submit">
                        </form>

                    </div>

                    <!-- <div class="span12 proof"> -->
                        
                    <!-- </div> -->
                </div>
            </div>
        </div>

	<div class="span6">
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
    <script src="js/bootstrap.js"></script>
    <script src="js/jasny-bootstrap.js"></script>
    <script src="js/theme.js"></script>
	<script src="http://malsup.github.com/jquery.form.js"></script> 
    <script src="js/updateData.js"></script>
</body>
</html>
