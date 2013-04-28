<?php

	if(isset($_POST['canvas']) && !empty($_POST['canvas'])) {
		$canvas = $_POST['canvas'];
	}

	if(isset($_POST['page']) && !empty($_POST['page'])) {
		$page = $_POST['page'];
	}

	if(isset($_POST['test']) && !empty($_POST['test'])) {
		$test = $_POST['test'];
	}

	if(isset($_POST['next']) && !empty($_POST['next'])) {
		$next = $_POST['next'];
	}
	
	echo "Hello";

	// $con = mysqli_connect("localhost","root","","test");

	// if (mysqli_connect_errno($con)) {
 //  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
 //  	}

	// mysqli_query($con,"INSERT INTO canvas (testID, canvas, page) VALUES (" . intval($test) . ", '" . $canvas . "', " . intval($page) . ") ON DUPLICATE KEY UPDATE canvas='" . $canvas . "'");

 //  	$result = mysqli_query($con, "SELECT * FROM canvas WHERE testID = " . intval($test) . " AND page = " . intval($next));
 //  	$row = mysqli_fetch_array($result);

 //  	if ($row['canvas'] === NULL) {
 //  		echo "";
 //  	} else {
 //  		echo $row['canvas'];
 //  	}

	// mysqli_close($con);
?>
