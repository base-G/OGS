<?php
	if(isset($_POST['class']) && !empty($_POST['class'])) {
		$class = $_POST['class'];
	}

	if (isset($_POST['creator']) && !empty($_POST['creator'])) {
		$creator = $_POST['creator'];
	}

	$con = mysqli_connect("localhost","root","baseg","baseg");

	if (mysqli_connect_errno($con)) {
   		echo "Failed to connect to MySQL: " . mysqli_connect_error();
   	}

	$res = mysqli_query($con,"DELETE FROM Class WHERE ClassName = '" . $class . "' AND CreatorID = '" . $creator . "'");
	echo $res;
	mysqli_close($con);
?>
