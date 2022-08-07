<?php
	$db_Host = "localhost";
	$db_Id = "minyeong3";
	$db_Pass = "2022Wnsldj!";
	$db_Name = "minyeong3";

	$conn = mysqli_connect($db_Host,$db_Id, $db_Pass, $db_Name);
	mysqli_query($conn, "set session character_set_connection=utf8;");

	mysqli_query($conn, "set session character_set_results=utf8;");
	
	mysqli_query($conn, "set session character_set_client=utf8;");
	if(mysqli_connect_errno())
		die('Connect Error : '.mysqli_connect_errno());

?>