<?php

$myclass = $_POST['myclass'];
$mytest  = $_POST['mytest'];

$con = mysqli_connect("localhost", "root", "baseg", "baseg");

if (mysqli_connect_errno($con)) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

# Get the ClassID.
$res = mysqli_query($con, "SELECT ClassID FROM Class WHERE ClassName = '" . $myclass . "'");
$row = mysqli_fetch_array($res);
$cid = $row['ClassID'];

# Get the TestID
$res = mysqli_query($con, "SELECT TestID FROM Tests WHERE TestName = '" . $mytest . "'");
$row = mysqli_fetch_array($res);
$tid = $row['TestID'];

$result = mysqli_query($con, "SELECT StudentID FROM StudentTest WHERE ClassID = " . intval($cid) . " AND TestID = " . intval($tid));
$ids = array();

while ($row = mysqli_fetch_array($result)) {
	array_push($ids, $row['StudentID']);
}

$runningAvg = 0;
$max = 0;
$min = 100000;

$result = mysqli_query($con, "SELECT SUM(PointVal) FROM Questions WHERE ClassID = " . intval($cid) . " AND TestID = " . intval($tid));
$row = mysqli_fetch_array($result);
$total = $row['SUM(PointVal)'];

foreach ($ids as $id) {
	$result = mysqli_query($con, "SELECT SUM(Points) FROM Results WHERE ClassID = " . intval($cid) . " AND TestID = " . intval($tid) . " AND StudentID = " . intval($id));
	$row = mysqli_fetch_array($result);
	$value = $row['SUM(Points)'];

	$min = min($value, $min);
	$max = max($value, $max);
	$runningAvg += $value;
}

$avg = $runningAvg / count($ids);

echo "<p>Overall Breakdown</p>\n";
echo "<table class=\"table\">\n";
echo "<thead>\n";
echo "<tr>\n";
echo "<th></th>\n";
echo "<th>Max</th>\n";
echo "<th>Min</th>\n";
echo "<th>Average</th>\n";
echo "</tr>\n";
echo "</thead>\n";
echo "<tbody>\n";

echo "<tr>\n";
echo "<td></td>\n";
echo "<td>" . $max . " / " . $total . "</td>\n";
echo "<td>" . $min . " / " . $total . "</td>\n";
echo "<td>" . $avg . " / " . $total . "</td>\n";
echo "</tr>\n";

echo "</tbody>\n";
echo "</table>\n";


# Get the number of questions
$result = mysqli_query($con, "SELECT COUNT(*) FROM Questions WHERE ClassID = " . intval($cid) . " AND TestID = " . intval($tid));
$row = mysqli_fetch_array($result);
$val = $row['COUNT(*)'];

$max = array();
$min = array();
$avg = array();

for ($i = 1; $i <= intval($val); $i++) {
	$result = mysqli_query($con, "SELECT MAX(Points) FROM Results WHERE ClassID = " . intval($cid) . " AND TestID = " . intval($tid) . " AND QuestionID = " . $i);
	$row = mysqli_fetch_array($result);
	$total = $row['MAX(Points)'];
	array_push($max, $total);
}

for ($i = 1; $i <= intval($val); $i++) {
        $result = mysqli_query($con, "SELECT MIN(Points) FROM Results WHERE ClassID = " . intval($cid) . " AND TestID = " . intval($tid) . " AND QuestionID = " . $i);
        $row = mysqli_fetch_array($result);
        $total = $row['MIN(Points)'];
        array_push($min, $total);
}

for ($i = 1; $i <= intval($val); $i++) {
        $result = mysqli_query($con, "SELECT AVG(Points) FROM Results WHERE ClassID = " . intval($cid) . " AND TestID = " . intval($tid) . " AND QuestionID = " . $i);
        $row = mysqli_fetch_array($result);
        $total = $row['AVG(Points)'];
        array_push($avg, $total);
}

echo "<p>Question breakdown</p>\n";
echo "<table class=\"table\">\n";
echo "<thead>\n";
echo "<tr>\n";
echo "<th>Question #</th>\n";
echo "<th>Max</th>\n";
echo "<th>Min</th>\n";
echo "<th>Average</th>\n";
echo "</tr>\n";
echo "</thead>\n";
echo "<tbody>\n";

for ($i = 0; $i < intval($val); $i++) {
	echo "<tr>\n";
	echo "<td>" . (intval($i) + 1) . "</td>\n";
	echo "<td>" . $max[$i] . "</td>\n";
	echo "<td>" . $min[$i] . "</td>\n";
	echo "<td>" . $avg[$i] . "</td>\n";
	echo "</tr>\n";
}

echo "</tbody>\n";
echo "</table>\n";


mysqli_close($con);

?>
