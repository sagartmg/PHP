<?php
	$dbHost = "localhost";
	$dbUser = "root";
	$dbPass = "";
	$dbName = "new_database";

	// $dbHost = "sql208.epizy.com";
	// $dbUser = "epiz_27219555";
	// $dbPass = "PtlRpQ103y4Is";
	// $dbName = "epiz_27219555_test1";


	$conn = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);


	if($conn){
		// echo "datgabase suceess";

	}
	else{
	// mysqli_conntect_error();
		die("DAtabase connection failed!!");

	}
?>
