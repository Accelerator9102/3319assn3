<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<?php 
		include 'connectdb.php';
	 ?>
	 <h1>Here are your doctors: </h1>
	 <ol>
	 	<?php 
	 		$doctor_fname=$_POST["doctorfname"];
	 		$doctor_lname=$_POST["doctorlname"];
	 		$doctor_specialty=$_POST["doctorspecialty"];
	 		$doctor_licensenum=$_POST["doctorlicensenum"];
	 		$doctor_date_licensed=$_POST["doctordatelicensed"];
	 		$doctor_hospital=$_POST["hospitalname"];
	 		$query1='SELECT * FROM hospital';
	 		$result=mysqli_query($connect,$query1);
	 		if(!$result){
	 			die("query failed");
	 		}
	 		$query='INSERT INTO doctor'



	 	 ?>
	 </ol>
</body>
</html>