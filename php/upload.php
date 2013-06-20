<?php

	// import the config file
	include_once("../config.php");

# include parseCSV class.
require_once('parsecsv.lib.php');

# Stores the start pages of tests with invalid UUIDs.
$invalid = array();

# Returns a UUID or an error.
function getID($arg) {
	$id = "";

	foreach ($arg as $i) {
		if (strlen($i) == 1) {
			$tmp = intval(ord($i));
			$tmp = $tmp - 65;

			$id .= $tmp;
		} else {
			return "error";
		}
	}

	return $id;
}
	
# Set the Class and Test variables.
$myclass = $_POST['myclass'];
$mytest  = $_POST['mytest'];

# Make sure any old temp files are removed first.
exec("rm ../upload/tmp.*");

# Upload the file and create the temp files.
if ($_FILES["file"]["error"] > 0) {
	echo "error uploading";
} else {
	if (file_exists("../upload/" . $_FILES["file"]["name"])) {
		echo $_FILES["file"]["name"] . " already exists. ";
	} else {
		$dir = "../upload/" . $myclass . $mytest . "/";
		mkdir($dir, 0777);
		move_uploaded_file($_FILES["file"]["tmp_name"], "../upload/" . $_FILES["file"]["name"]);		
		#echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
		$com = "mv ../upload/" . $_FILES["file"]["name"] . " ../upload/tmp.pdf";
		exec($com);
	}
}

# Location of the pdf.
$loc = "../upload/tmp.pdf";
	
# Execute the OCR tool to generate a CSV file.
exec("../AMCTemplates/ocranalyse.sh " . $loc . " "  . $myclass . $mytest ." .5 ", $analysisouput);

# Move the CSV to a temp stroage container.
$com = "mv ../tmp/baseg" . $myclass . $mytest . "/exports/*.csv ../upload/tmp.csv";
exec($com);
	
# Load the CSV file.
$csv = new parseCSV('../upload/tmp.csv');

# Get the total number of pages.
exec("pdftk ../upload/tmp.pdf dump_data output - | grep NumberOfPages | cut -d' ' -f 2-", $a);
$end = $a[0];

# Reverses the array so we can easily determine the length of each PDF.
$data = $csv->data;
$rev = array_reverse($data);

# Loop through each entry and find the UUID.
# If found, split the PDF at the correct place and move the new PDF to the correct directory,
# and add the user to the database if they do not exist.
# 
# If there is an invalid UUID, then report the starting page number of the illegal UUID.	
foreach ($rev as $entry) {
	foreach ($entry as $e) {
		# A little processing to get the start page.
		$res = str_replace("\"", "", $e);
		$split = explode("?", $res);
		$pages = $split[0];
		$idata = $split[1];
		$start = (explode(":", $pages));
		$start = $start[1];
		$length = $end - $start;		
		$end = $end - $length - 1;

		# Split the search string so we get the letters in an array
		$search = explode("0", $idata);
		array_splice($search, 0, 2);

		# Get the ID.
		$ret = getID($search);

		if ($ret == "error") {
			# Invalid ID, store the start page.
			array_push($invalid, $start);
		} else {
			# We have a valid ID, create the PDF.
			$dest = "../upload/" . $myclass . $mytest . "/" . $ret;
			$com = "pdftk ../upload/tmp.pdf cat " . ($start) . "-" . ($start+$length) . " output " . $dest . ".pdf";
               		exec($com, $out);

			# Add the location of the students test to the database.
			$con = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

			if (mysqli_connect_errno($con)) {
  				echo "error";
			}

			# Add the student to the database if they do not exist, get the StudentID of the student.
			mysqli_query($con, "INSERT INTO Students (StudentUUID) VALUES ('" . $ret . "')");
			$res = mysqli_query($con, "SELECT StudentID FROM Students WHERE StudentUUID = '" . $ret . "'");
			$row = mysqli_fetch_array($res);
			$sid = $row['StudentID'];

			# Get the ClassID.
			$res = mysqli_query($con, "SELECT ClassID FROM Class WHERE ClassName = '" . $myclass . "'");
                        $row = mysqli_fetch_array($res);
                        $cid = $row['ClassID'];

			# Get the TestID
			$res = mysqli_query($con, "SELECT TestID FROM Tests WHERE TestName = '" . $mytest . "'");
                        $row = mysqli_fetch_array($res);
                        $tid = $row['TestID'];
			
			mysqli_query($con, "INSERT INTO StudentTest (StudentID, ClassID, TestID, Location) VALUES (" . intval($sid) . ", " . intval($cid) . ", " . intval($tid) . ", '" . ($dest . ".pdf") . "') ON DUPLICATE KEY UPDATE Location = '" . ($dest . ".pdf") . "'");

			mysqli_close($con);
		}

	}
}

#exec("rm ../upload/tmp.*");

#$con = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

#if (mysqli_connect_errno($con)) {
  #	echo "Failed to connect to MySQL: " . mysqli_connect_error();
#}

#mysqli_query($con, "UPDATE StudentTest SET Location = 'upload/1.pdf' WHERE StudentID = 1");
#mysqli_query($con, "UPDATE StudentTest SET Location = 'upload/4.pdf' WHERE StudentID = 2");
#mysqli_query($con, "UPDATE StudentTest SET Location = 'upload/7.pdf' WHERE StudentID = 3");
#mysqli_query($con, "UPDATE StudentTest SET Location = 'upload/10.pdf' WHERE StudentID = 4");

#mysqli_close($con);

?>
