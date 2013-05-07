<?php
	if(isset($_POST['info']) && !empty($_POST['info'])) {
		$info = $_POST['info'];
	}
	

	$con = mysqli_connect("localhost", "root", "baseg", "baseg");

	if (mysqli_connect_errno($con)) {
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}

	for ($i = 0; $i < count($info); $i++) {
		$tmp = explode(":", $info[$i]);
		
		mysqli_query($con,"INSERT INTO Results (StudentID, ClassID, TestID, QuestionID, Points) 
				VALUES (" . intval($tmp[0]) . ", " . intval($tmp[1]) . ", " . intval($tmp[2]) . ", " . intval($tmp[3]) . ", " . intval($tmp[4]) .") ON DUPLICATE KEY UPDATE Points = " . intval($tmp[4]));

	}

	mysqli_close($con);
?>
