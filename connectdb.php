<?php 
	$host="localhost";
	$user="root";
	$passwd="yh19981021";
	$dbname="xxie66assign2db";

	$result = mysqli_connect($host,$user,$passwd,$dbname);
	if(mysqli_connect_errno()){
		die("unable to connect to database: ".
			mysqli_connect_error().
			"(".mysqli_connect_errno().")"

		);
	}else{
		echo "connection successful!";
	}


 ?>