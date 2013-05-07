<?php
 	# include parseCSV class.
	require_once('../php/parsecsv.lib.php');
       

        $csv = new parseCSV('tmp.csv');
	

	foreach ($csv->data as $entry) {
        	foreach ($entry as $e) {
			$res = str_replace("\"", "", $e);
			$split = explode("?", $res);
			$pages = $split[0];
			$idata = $split[1];

			echo $pages . "\n";

			$start = (explode(":", $pages));
			$start = $start[1];
			echo $start . "\n";

			echo $idata . "\n";
		}
	}
?>

