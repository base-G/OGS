<?php

// import the config file
include_once("config.php");

?>
	<!DOCTYPE html>
	<?php 
		include("classes/Login.class.php");
		
		$login = new Login();
		$userid = NULL;
		$classList = NULL;
		
		if( !( $login->isLoggedIn() ) )
		{
			header( 'Location: '.$baseURL.'process.php' );
		}
		else 
		{
			$userid = $_SESSION['user_id'];	
		}
		
		$classList = getClasses( $userid );
	
		function getClasses( $owner )
		{
			$return = NULL;
			
			$conn = mysql_connect($dbHost, $dbUser, $dbPass) or die(mysql_error());
			mysql_select_db($dbName) or die(mysql_error());
	
			// Select this test from the database and its information
			$query_result = mysql_query("SELECT ClassID, ClassName FROM Class WHERE CreatorID = ".$owner)
				or die(mysql_error());  
			
			for( $i = 0; $i < mysql_num_rows($query_result); ++$i)
			{
				$row = mysql_fetch_array($query_result);
				$return[$i] = $row; 
			}
			
			mysql_close($conn);
			
			return $return;
		}
		
		
		
	?>
	
	<html>
	<head>
	    <title>Create and Manage Test</title>
	    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    
	    <!-- Styles -->
	    <link href="<?php echo $baseURL.$theme; ?>css/bootstrap.css" rel="stylesheet">
	    <link rel="stylesheet" type="text/css" href="<?php echo $baseURL.$theme; ?>css/theme.css">
	    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
	    <link rel="stylesheet" href="<?php echo $baseURL.$theme; ?>css/create_manage_test.css" type="text/css" media="screen" />
	
	    <!--[if lt IE 9]>
	      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	    <![endif]-->
	</head>
	<body>
	    <div class="navbar navbar-inverse navbar-fixed-top">
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
		
		
		
	    <!-- start test creation widget -->
	    <div class="row-fluid">
	        <div class="span8 offset2">
	        	<div class="row-fluid">
	        		<form action="CreateOrManageClass.php" method="get">
	        		<div class="span12">
	        			
			        		<?php 
				        		echo '<div class="span12">
									<select name="classID" style="width: 100%;">';
								echo '<option value="-1">Create New Class</option>';
								if(!($classList == NULL))
								{
									for($i = 0; $i < count($classList); $i++)
									{
										$class = $classList[$i];
										echo '
											<option value="'.$class['ClassID'].'">'.$class['ClassName'].'</option>';
										
									}
								}
								else 
								{
									echo '<option value="none" selected disabled="disabled"> No Classes Found </option>';	
								}
								echo '</select></div>';
							?>
			        	
	        		</div>
	        		<div class="span12">
	        			<input type="submit" value="Manage Class">
	        		</div>
	        		</form>
	        	</div>
	        </div>
	    </div>
	    
	            
	    <!-- starts footer -->
	    <footer id="footer">
	        <div class="container">
	            
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
	                            © 2013 baseG. All rights reserved.
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
