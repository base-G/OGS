<?php
	// import the config file
	include_once("config.php");

	if (isset($_POST['creator']) && !empty($_POST['creator'])) {
                $creator = $_POST['creator'];
        }

	$con = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

        if (mysqli_connect_errno($con)) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

	$result = mysqli_query($con, "SELECT * FROM Class WHERE CreatorID = '" . $creator . "'");

        while ($row = mysqli_fetch_array($result)) {
        	echo $row['ClassName'] . "\n";
        }
        
	mysqli_close($con);

?>
