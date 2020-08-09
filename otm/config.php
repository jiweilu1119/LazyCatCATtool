<?php
include "init.php";
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'otm');
$conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD);


	if(! $conn )
		{
			die('Could not connect: ' . mysqli_error());
		}

	mysqli_select_db($conn,"otm");
	mysqli_query($conn, "set names 'utf8'");

?>