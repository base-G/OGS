<?php
	if(isset($_POST['_class']) && !empty($_POST['_class'])) {
		$_class = $_POST['_class'];
	}

	if(isset($_POST['_user']) && !empty($_POST['_user'])) {
		$_user = $_POST['_user'];
	}

	$con = mysqli_connect("localhost", "root", "baseg", "baseg");

	if (mysqli_connect_errno($con)) {
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}

  	$result = mysqli_query($con, "SELECT TestName FROM Tests WHERE ClassName = '" . $_class . "' AND CreatorID = " . intval($_user));

  	while ($row = mysqli_fetch_array($result)) {
        echo $row['TestName'] . " ";
    }


    mysqli_close($con);
?>
