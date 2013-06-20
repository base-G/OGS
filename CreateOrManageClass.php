	<!DOCTYPE html>
	<?php 
	
		// import the config file
		include_once("config.php");
	
		include("classes/Login.class.php");
		
		$login = new Login();
		$userid = NULL;
		$classInformation = NULL;
		
		if( !( $login->isLoggedIn() ) )
		{
			header( 'Location: process.php' );
		}
		else 
		{
			$userid = $_SESSION['user_id'];	
		}
	
		
		
		// Check if a class has been selected to be modified
		if(isset($_GET['classID']))
		{
			// Resolve the class ID and get class information
			$classInformation = resolveClass( $_GET['classID'] );
			
			/*
			 * If no class was found redirect the user to the class selection page.
			 * 
			 * Otherwise if a class was found do nothing
			 */ 
			if( $classInformation == NULL )
			{
				// No class was found, redirect to the class selection page.
				header( 'Location: SelectClass.php' );
			}
			else 
			{
				// class was successfully found, do nothing.
			}
		}
		// If no class was selected redirect back to class selection
		else
		{
			
		}
		
		/*
		 * Returns all classes that $owner has created/can assign tests to.
		 * 
		 * $return['ClassID']
		 * $return['ClassName']
		 */ 
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
		
		
		/*
		 * Given a testID, return all the information associatd with that test from the database.
		 * 
		 * Returns an associative array with the following informations
		 * $return['TestID'] : The test's test id 
		 * $return['TestName'] : The test's test name
		 * $return['ClassID'] : The id of the class that this test belongs to.
		 * $return['ClassName'] : The name of the class that this test belongs to.
		 * $return['CreatorID'] : The id of the user who created this test.
		 * $return['Questions'] : An array of $questions[]
		 * 						$questions[] : Contains associative $question[] arrays that 
		 * 						contain question information.
		 * 						$question['QuestionID'] : The id of the question
		 * 						$question['PointVal'] : The number of points this question is worth
		 * 						$question['QuestionText'] : The text of the question. 
		 */
		function resolveClass( $classID )
		{
			$return = NULL;
			
			//connect to mysql database and fetch test information
			$conn = mysql_connect($dbHost, $dbUser, $dbPass) or die(mysql_error());
			mysql_select_db($dbName) or die(mysql_error());
	
			// Select this test from the database and its information
			$query_result = mysql_query("SELECT ClassID, ClassName FROM Class WHERE ClassID = ".$classID)
				or die(mysql_error());  
	
			// If a test exists with the given test id
			if( mysql_num_rows( $query_result ) > 0 )
			{
				$row = mysql_fetch_array( $query_result );
				
				$return = $row;
			}
			
			mysql_close($conn);
			
			// return the test metadata and the metadata about the questiosn on this test.
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
	    
	  	<script type="text/javascript">
	  		function addQuestion()
	  		{
	  			//get the current number of questions on the page
	  			var numQuestions = parseInt($('#numQuestions').val(), 10);
	  			
	  			
	  			//insert a new question after the last question on the page
	  			var questionHTML = '<div class="span12" name="questionID'+(numQuestions)+'" id="Question'+(numQuestions)+'"> <input type="hidden" name="questionID'+ numQuestions +'" value="NOID">';
	  			questionHTML += '<div class="span10"><input type="text" name="questionText'+(numQuestions)+'" value="" style="width: 100%;">';
	  			questionHTML += '</div>';
	  			questionHTML += '<div class="span1">';
	  			questionHTML += '<input type="text" name="questionValue'+(numQuestions)+'" value="0" style="width: 100%;">';
	  			questionHTML += '</div></div>';
	  			
	  			//add after an existing question
	  			if( numQuestions > 0)
	  			{
	  				$('#Question'+(numQuestions - 1)).after(questionHTML);
	  			}
	  			else //add a new question on a new test.
	  			{
	  				$('#beginQuestions').after(questionHTML);
	  				$('#noQuestionsAlert').remove();
	  			}
	  			
	  			// increase the current number of questions on the page
	  			$('#numQuestions').val((numQuestions + 1));
	  		}
	  		
	  		function removeQuestion()
	  		{
	  			//get the current number of questions on the page
	  			var numQuestions = parseInt($('#numQuestions').val(), 10);

				if( numQuestions == 1)
				{
					var noQuestionsAlert = '<div class="alert alert-block" id="noQuestionsAlert"><button type="button" class="close" data-dismiss="alert">&times;</button><h4> Hmm? </h4>No questions were found for this test, try adding some!</div>';
					$('#beginQuestions').after(noQuestionsAlert);
					$('#Question'+(numQuestions - 1)).remove();
	  			
	  				// Decrease the number of questions on the page.
	  				$('#numQuestions').val((numQuestions - 1));
				}
				else
				{
					$('#Question'+(numQuestions - 1)).remove();
	  			
	  				// Decrease the number of questions on the page.
	  				$('#numQuestions').val((numQuestions - 1));
				}
			
				
	  			
	  		}
	  	</script>  
	</head>
	<body>
	   <div id="navhead" class="navbar navbar-inverse navbar-static-top navbar-fixed-top">
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
	        		
	        	<?php
	        		if(isset($_GET['Updated']))
					{
						if($_GET['Updated'] === "true")
						{
							echo '<div class="span 12">
	        					<div class="alert alert-success">
	        						<b> Success! </b> The class was successfully updated.
	        					</div>
	        				</div>';
						}
						elseif($_GET['Updated'] === "false")
						{
							echo '<div class="span 12">
	        					<div class="alert alert-error">
	        						<b> Uh-oh </b> There was an error when trying to update the class.
	        					</div>
	        				</div>';
						}
					}
	        	?>
				<form action="ClassProcessor.php" method="POST">
					<input type="hidden" name="ClassID" value="<?php echo $classInformation['ClassID']; ?>">
		            <!-- start testname -->
		            <div class="span4 offset4"><h3><?php echo $classInformation['ClassName']; ?></h3></div>
		            <div class="span12"><input type="text" style="width: 100%;" name="ClassName" value="<?php echo $classInformation['ClassName'];?>"></div>
					
				
					
					
		            <!-- start questions -->
		            <div class="row-fluid">
						<div class="span12">
							<div class="row-fluid">
								<div id="beginQuestions"></div>
						<?php
						/*
						 * $question['QuestionID'] : The id of the question
			 			 * $question['PointVal'] : The number of points this question is worth
						 * $question['QuestionText'] : The text of the question. 
						 */
							$questions = $testInformation['Questions'];
		                    if( !($questions == NULL) )
		                    {
		                    		echo '<input type="hidden" id="numQuestions" name="numQuestions" value="'.count($questions).'">';
		                            for($i = 0; $i < count($questions); $i++)
		                            {       
		                                    echo '<div class="span12" id="Question'.$i.'">';
		                                    $question = $questions[$i];
												echo '<input type="hidden" name="questionID'.$i.'" value="'.$question['QuestionID'].'">';
												echo '<div class="span10">';
												echo '<input type="text" name="questionText'.$i.'" value="'.$question['QuestionText'].'" style="width: 100%;">';
												echo '</div>';
												echo '<div class="span1">';
												echo '<input type="text" name="questionValue'.$i.'" value="'.$question['PointVal'].'" style="width: 100%;">';
												echo '</div>';
		                                    echo '</div>';
											
		                            }
		                    }
		                    else
		                    {
		                            echo '<div class="alert alert-block">
		                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
		                                    <h4> Hmm? </h4>
		                                    No students have been added to this class. Try Adding Some!
		                            </div>';
		                    }
		
						?>
							</div>
						</div>
					</div>
		            <!-- start test upload -->
		            
		            
		            <!-- Start UI Controls -->
		            <div class="span12" style="">
		            	<div class="span4">
		            		<button type="button" onclick="addQuestion();">+ Add Student</button>
		            	</div>
		            	<div class="span4">
		            		<button type="button" onclick="removeQuestion();">- Remove Student</button>
		            	</div>
			            <div class="span4">
			            	<input type="submit" value="Create/Update Class">
			            </div>
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
