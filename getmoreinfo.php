<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Your Doctor's Info</title>
</head>
<body>
	<?php 
		include 'connectdb.php';
	 ?>
	 <h1>Info:</h1>
 	<?php 
 	$license_num=$_POST["doctor"];
 	$query = 'SELECT * FROM doctor, hospital WHERE doctor.hospitalcode=hospital.hospitalcode AND doctor.licensenum="'.$license_num.'"';
 	$result=mysqli_query($connect,$query);
 	if(!result){
 		die("query failed.");
 	}

	echo $row["fname"]." ".$row[ "lname" ]." ".$row["licensenum"]." ".$row["specialty"]." ".$row["datelicensed"]." ".$row["name"]."<br>";
 	mysqli_free_result($result);
 	mysqli_close($connect);
 	 ?>
</body>
</html>