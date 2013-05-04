<?php

	if(isset($_POST['canvas']) && !empty($_POST['canvas'])) {
		$canvas = $_POST['canvas'];
	}

	if(isset($_POST['page']) && !empty($_POST['page'])) {
		$page = $_POST['page'];
	}

	if(isset($_POST['_class']) && !empty($_POST['_class'])) {
		$class = $_POST['_class'];
	}

	if(isset($_POST['_test']) && !empty($_POST['_test'])) {
                $test = $_POST['_test'];
        }

	if(isset($_POST['_student']) && !empty($_POST['_student'])) {
                $student = $_POST['_student'];
        }

	if(isset($_POST['next']) && !empty($_POST['next'])) {
		$next = $_POST['next'];
	}
	
	$con = mysqli_connect("localhost","root","baseg","baseg");

	if (mysqli_connect_errno($con)) {
   		echo "Failed to connect to MySQL: " . mysqli_connect_error();
   	}

	mysqli_query($con,"INSERT INTO Canvas (ClassID, TestID, StudentID, Page, CanvasData) VALUES (" . intval($class) . ", " . intval($test) . ", " . intval($student) . ", " . intval($page) . ", '" . $canvas . "') ON DUPLICATE KEY UPDATE CanvasData = '" . $canvas . "'");

   	$result = mysqli_query($con, "SELECT * FROM Canvas WHERE ClassID = " . intval($class) . " AND TestID = " . intval($test) . " AND StudentID = " . intval($student) . " AND Page = " . intval($next));
   	$row = mysqli_fetch_array($result);

   	if ($row['CanvasData'] === NULL) {
   		echo "";
   	} else {
   		echo $row['CanvasData'];
   	}

	mysqli_close($con);
?>
