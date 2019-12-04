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
	 <h1>Patient Info: </h1>
	 <ol>
     <?php
	$query='SELECT * FROM treats WHERE OHIPnumber="'.$_POST["ohipnumber"].'"';
    $result=mysqli_query($connect,$query);

	if(!$result){
        die("query failed");
    }
	while($row=mysqli_fetch_assoc($result)){
        

		$licensen=$row["licensenum"];
        $query1 = 'SELECT * FROM doctor WHERE licensenum = "'.$licensen.'"';

		$result1=mysqli_query($connect,$query1);

		$ohipn=$row["OHIPnumber"];
        $query2 = 'SELECT * FROM patient WHERE OHIPnumber = "'.$ohipn.'"';

		$result2=mysqli_query($connect,$query2);
		
        $row1=mysqli_fetch_assoc($result1);
        $row2=mysqli_fetch_assoc($result2);
		echo $row2["fname"]." ".$row2["lname"]." treated by ".$row1["fname"]." ".$row1["lname"]."<br>";	
		
		
		
	} 
	
	 ?>
	 </ol>
</body>
</html>