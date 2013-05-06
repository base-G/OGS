<?php
	$myclass = $_POST['myclass'];
	$mytest  = $_POST['mytest'];

	if ($_FILES["file"]["error"] > 0) {
		echo "Error: " . $_FILES["file"]["error"] . "<br>";
	} else {
		#echo "Upload: " . $_FILES["file"]["name"] . "<br>";
		#echo "Type: " . $_FILES["file"]["type"] . "<br>";
		#echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
		#echo "Stored in: " . $_FILES["file"]["tmp_name"];

		if (file_exists("../upload/" . $_FILES["file"]["name"])) {
			echo $_FILES["file"]["name"] . " already exists. ";
		} else {
			$dir = "../upload/" . $myclass . $mytest . "/";
			#$dir2 = $dir . $_POST['mytest'] . "/";
			mkdir($dir, 0777);
			#mkdir($dir2, 0777);
			move_uploaded_file($_FILES["file"]["tmp_name"], "../upload/" . $_FILES["file"]["name"]);
			echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
			$com = "mv ../upload/" . $_FILES["file"]["name"] . " ../upload/tmp.pdf";
			exec($com);
		}
	}

	$loc = "../upload/tmp.pdf";
	
	exec("/var/www/AMCTemplates/ocranalyse.sh " . $loc . " "  . $myclass . $mytest ." .5 ", $analysisouput);
	
	#exec("pdftk ../upload/tmp.pdf dump_data output - | grep NumberOfPages | cut -d' ' -f 2-", $a);
	#$max = $a[0];

	#for ($i = 1; $i <= $max; $i+=3) {
	#	$dir = $dir2 . $i . ".pdf";
	#	echo $dir;
	#	$com = "pdftk ../upload/tmp.pdf cat " . $i . "-" . ($i+2) . " output ../upload/" . $i . ".pdf";
	#	exec($com, $out);
	#	print_r($out);
	#}

	#$con = mysqli_connect("localhost","root","baseg","baseg");

	#if (mysqli_connect_errno($con)) {
  	#	echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	#}

	#mysqli_query($con, "UPDATE StudentTest SET Location = 'upload/1.pdf' WHERE StudentID = 1");
	#mysqli_query($con, "UPDATE StudentTest SET Location = 'upload/4.pdf' WHERE StudentID = 2");
	#mysqli_query($con, "UPDATE StudentTest SET Location = 'upload/7.pdf' WHERE StudentID = 3");
	#mysqli_query($con, "UPDATE StudentTest SET Location = 'upload/10.pdf' WHERE StudentID = 4");

	#mysqli_close($con);
?>
