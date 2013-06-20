<?php
	// import the config file
	include_once("../config.php");

	if(isset($_POST['_test']) && !empty($_POST['_test'])) {
		$_test = $_POST['_test'];
	}

	if(isset($_POST['_user']) && !empty($_POST['_user'])) {
		$_user = $_POST['_user'];
	}

	$con = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

	if (mysqli_connect_errno($con)) {
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}

  	$result = mysqli_query($con, "SELECT TestID FROM tests WHERE TestName = '" . $_test . "' AND CreatorID = " . intval($_user));
  	$result = mysqli_fetch_array($result);
    $id = $result['TestID'];

  	$result = mysqli_query($con, "SELECT StudentID FROM studenttest WHERE ClassID = " . intval($id));

  	while ($row = mysqli_fetch_array($result)) {
  		$student = mysqli_query($con, "SELECT Name FROM Students WHERE StudentID = '" . $row['StudentID'] . "'");
  		$student = mysqli_fetch_array($student);
    		$name = $student['Name'];

        	echo $name . " ";
    }


    mysqli_close($con);
?>
