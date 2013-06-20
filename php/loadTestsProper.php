<?php
	// import the config file
	include_once("config.php");

	/*
	* This load tests uses the unique IDs for tests.
	*/
	if(isset($_GET['_class']) && !empty($_GET['_class'])) {
		$_class = $_GET['_class'];
	}

	if(isset($_GET['_user']) && !empty($_GET['_user'])) {
		$user = $_GET['_user'];
	}

	$con = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

	if (mysqli_connect_errno($con)) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$result = mysqli_query($con, "SELECT TestName, TestID FROM Tests WHERE ClassID = " . intval($_class));

	while ($row = mysqli_fetch_array($result)) {
		echo $row['TestName'] . " ";
	}

	mysqli_close($con);
?>
