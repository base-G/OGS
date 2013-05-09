<?php

	if(isset($_POST['_class']) && !empty($_POST['_class'])) {
		$_class = $_POST['_class'];
	}

	if(isset($_POST['_test']) && !empty($_POST['_test'])) {
		$_test = $_POST['_test'];
	}

	if(isset($_POST['_student']) && !empty($_POST['_student'])) {
                $_student = $_POST['_student'];
        }


	$con = mysqli_connect("localhost","root","baseg","baseg");

	if (mysqli_connect_errno($con)) {
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}

   	$result = mysqli_query($con, "SELECT * FROM Questions WHERE TestID = " . intval($_test) . " AND ClassID = " . intval($_class));
  	while ($row = mysqli_fetch_array($result)) {
		echo $row['QuestionID'] . ":" . $row['PointVal'] . " ";
	}

	echo "\n";
	
	$result = mysqli_query($con, "SELECT * FROM Results WHERE TestID = " . intval($_test) . " AND ClassID = " . intval($_class) . " AND StudentID = " . intval($_student));
	while ($row = mysqli_fetch_array($result)) {
                echo $row['QuestionID'] . ":" . $row['Points'] . " ";
        }

	echo "\n";

	$result = mysqli_query($con, "SELECT Comments FROM Results WHERE TestID = " . intval($_test) . " AND ClassID = " . intval($_class) . " AND StudentID = " . intval($_student));
        while ($row = mysqli_fetch_array($result)) {
                echo $row['Comments'] . "***";
        }



	mysqli_close($con);
?>
