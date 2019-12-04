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
	$query8='SELECT * FROM treats WHERE OHIPnumber="'.$_POST["ohipnumber"].'"';
    $result8=mysqli_query($connect,$query8);
    echo $query8;
	
	while($row8=mysqli_fetch_assoc($result8)){
        
        echo $query8;
		$licensen=$row8["licensenum"];
        $query9 = 'SELECT * FROM doctor WHERE licensenum = "'.$licensen.'"';
        echo $query9;
		$result9=mysqli_query($connect,$query9);

		$ohipn=$row8["OHIPnumber"];
        $query10 = 'SELECT * FROM patient WHERE OHIPnumber = "'.$ohipn.'"';
        echo $query10;
		$result10=mysqli_query($connect,$query10);
		
        $row9=mysqli_fetch_assoc($result9);
        $row10=mysqli_fetch_assoc($result10);
            echo "successful";
		echo $row10["fname"]." ".$row10["lname"]." treated by ".$row9["fname"]." ".$row9["lname"]."<br>";	
		
		
		
	} 
	
	 ?>
	 </ol>
</body>
</html>