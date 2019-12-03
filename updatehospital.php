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
	 <h1>Here are your hospitals: </h1>
	 <ol>
	 	<?php 
	 		$hospitalname=$_POST["hospitalname"];
	 		$hospitalcode=$_POST["hospitalcode"];
	 		echo $doctor_hospital;
	 		$query1='SELECT * FROM hospital';
	 		$result=mysqli_query($connect,$query1);
	 		if(!$result){
	 			die("query failed");
	 		}
	 		while($row=mysqli_fetch_assoc($result)){
	 			if($hospitalcode==$row["hospitalcode"]){
	 				$hospitalname=$row["name"];
	 			}
	 		}
	 		
	 		
	 		$query='UPDATE hospital SET name="'.$hospitalname.'", WHERE hospitalcode="'.$hospitalcode.'";
	 		if(!mysqli_query($connect,$query)){
	 			die("Insertion failed".mysqli_error($connect));
	 		}
	 		echo "Hospital Updated!";
	 		mysqli_close($connect);




	 	 ?>
	 </ol>
</body>
</html>