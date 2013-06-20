<?php

	// import the config file
	include_once("../config.php");

	if(isset($_POST['info']) && !empty($_POST['info'])) {
		$info = $_POST['info'];
	}
	

	$con = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

	if (mysqli_connect_errno($con)) {
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}

	for ($i = 0; $i < count($info); $i++) {
		$tmp = explode(":", $info[$i]);
		
		mysqli_query($con,"INSERT INTO Results (StudentID, ClassID, TestID, QuestionID, Points) 
				VALUES (" . intval($tmp[0]) . ", " . intval($tmp[1]) . ", " . intval($tmp[2]) . ", " . intval($tmp[3]) . ", " . intval($tmp[4]) .") ON DUPLICATE KEY UPDATE Points = " . intval($tmp[4]));

		mysqli_query($con,"INSERT INTO Results (StudentID, ClassID, TestID, QuestionID, Comments) 
                                VALUES (" . intval($tmp[0]) . ", " . intval($tmp[1]) . ", " . intval($tmp[2]) . ", " . intval($tmp[3]) . ", '" . $tmp[5] ."') ON DUPLICATE KEY UPDATE Comments = '" . $tmp[5] . "'");
	}

	mysqli_close($con);
?>
