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
	 		echo $doctor_hospital;
	 		$query1='SELECT * FROM hospital';
	 		$result=mysqli_query($connect,$query1);
	 		if(!$result){
	 			die("query failed");
	 		}
	 		while($row=mysqli_fetch_assoc($result)){
	 			if($doctor_hospital==$row["hospitalcode"]){
	 				$hospital_name=$row["name"];
	 			}
	 		}
	 		
	 		
	 		$query='INSERT INTO doctor VALUES("'.$doctor_licensenum.'","'.$doctor_fname.'","'.$doctor_lname.'","'.$doctor_specialty.'","'.$doctor_date_licensed.'","'.$doctor_hospital.'")';
	 		if(!mysqli_query($connect,$query)){
	 			die("Insertion failed".mysqli_error($connect));
	 		}
	 		echo "New Doctor Added!";
	 		mysqli_close($connect);




	 	 ?>
	 </ol>
</body>
</html>