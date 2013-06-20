<?php

// import the config file
include_once(__DIR__."/config.php");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Manage Classes - base-G</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <!-- Styles -->
    <link href="<?php echo $baseURL.$theme; ?>css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo $baseURL.$theme; ?>css/jasny-bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseURL.$theme; ?>css/theme.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" type="text/css" href="<?php echo $baseURL.$theme; ?>css/lib/animate.css" media="screen, projection">
    <link rel="stylesheet" href="<?php echo $baseURL.$theme; ?>css/manage2.css" type="text/css" media="screen" />

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	<style>
		#createContent, #success, #error, #deleteContent, #success2, #error2 { display: none; }
		.curUser { display: none; }
		
		#footer {
			/*margin-top: 400px !important;*/
		}
	</style>

</head>
<body>
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

        <div id="sign_in1">
            <div class="container">
                <div class="row">
                    <div class="span12 header">
                        <h4>Create/Delete Classes</h4>
                        <p>To start, select an option.</p>
                    </div>

		<div class="span6 division">
			<p>
				<button id="create" class="btn" type="button">Create</button>
				<button id="delete" class="btn" type="button">Delete</button>
                	</p>
		</div>

		<div id="createContent" class="span6 division">
			<form id="createForm" class="form-inline" action="php/addClass.php" method="post">
				<div id="success" class="alert alert-success">
  					Class Added!
				</div>

				<div id="error" class="alert alert-error">
                                        An error occured when trying to add that class.
                                </div>

				<input type="hidden" name="creator" value=<?php echo '"' .$id . '"' ?>>
  				<input class="span3" type="text" name="classname" placeholder="Class Name">
				<button id="createSubmit" type="submit" class="btn">Submit</button>
			</form>
		</div>

		<div id="deleteContent" class="span6 division">
                        <form id="deleteForm" class="form-inline" action="php/deleteClass.php" method="post">
                                <div id="success2" class="alert alert-success">
                                        Class Deleted!
                                </div>

                                <div id="error2" class="alert alert-error">
                                        An error occured when trying to delete that class.
                                </div>

                                <input type="hidden" name="creator" value=<?php echo '"' .$id . '"' ?>>

				<select id="class" name="class" class="span3">
				</select>
                                <button id="createSubmit" type="submit" class="btn">Submit</button>
                        </form>
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
                                © 2013 base-G. All rights reserved.
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
