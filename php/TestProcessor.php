<?php

	// import the config file
	include_once("../config.php");

	 // Connect to the database
	 $conn = mysql_connect($dbHost, $dbUser, $dbPass) or die(mysql_error());
			mysql_select_db($dbName) or die(mysql_error());
	
	// Select this test from the database and its information
	$deleteQuestions = 'DELETE FROM Questions WHERE TestID = '.$_POST['TestID'];
	$updateQuestions = "";
	$selectClassName = 'SELECT ClassName FROM Class WHERE ClassID='.$_POST['class'].';';
	$updateTest   = '';
	
	// delete all questions for this test
	$query_result = mysql_query($deleteQuestions)
		or die(mysql_error());  
	
	// insert all the questions that are being put onto the test
	$testID = $_POST['TestID'];
	$classID = $_POST['class'];
	
	for($i = 0; $i < $_POST['numQuestions']; ++$i)
	{
	 	$questionID = $_POST['questionID'.$i];
	 	$pointVal = $_POST['questionValue'.$i];
	 	$questionText = $_POST['questionText'.$i];
		
		//Build the insert query for question $i
		if($questionID === "NOID")
		{
			$updateQuestions = 'INSERT INTO Questions (TestID, ClassID, PointVal, Question) VALUES(\''.$testID.'\', \''.$classID.'\', \''.$pointVal.'\', \''.$questionText.'\');';	
			
		}
		else
		{
			$updateQuestions = 'INSERT INTO Questions (QuestionID, TestID, ClassID, PointVal, Question) VALUES(\''.$questionID.'\', \''.$testID.'\', \''.$classID.'\', \''.$pointVal.'\', \''.$questionText.'\');';	
			
		}
		
	 	
		//Insert the question into the database.
	 	$query_result = mysql_query($updateQuestions)
			or die(mysql_error());  
	}
	
	
	//get the name of the class that this test belongs to.
	$className = "";
	$query_result = mysql_query($selectClassName)
		or die(mysql_error());  
	while($row = mysql_fetch_array($query_result))
	{
		$className = $row['ClassName'];
	} 
	//update the test name and the class it belongs to.
		
	$updateTest   = 'UPDATE Tests SET ClassID = '.$_POST['class'].', TestName ="'.$_POST['TestName'].'", ClassName="'.$className.'" WHERE TestID='.$_POST['TestID'].';';
	$query_result = mysql_query($updateTest)
			or die(mysql_error());
			
	//Redirect Back to Test Management Page
	header( 'Location: '.$baseURL.'/CreateOrManageTest.php?testID='.$testID.'&Updated=true' );
	
?>
