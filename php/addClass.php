<?php
	if(isset($_POST['classname']) && !empty($_POST['classname'])) {
		$class = $_POST['classname'];
	}

	if (isset($_POST['creator']) && !empty($_POST['creator'])) {
		$creator = $_POST['creator'];
	}

	$con = mysqli_connect("localhost","root","baseg","baseg");

	if (mysqli_connect_errno($con)) {
   		echo "Failed to connect to MySQL: " . mysqli_connect_error();
   	}

	$res = mysqli_query($con,"INSERT INTO Class (ClassName, CreatorID) VALUES ('" . $class . "', " . intval($creator) . ")");
	echo $res;
	mysqli_close($con);
?>
