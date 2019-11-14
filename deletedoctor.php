<?php 
	if(!empty($_GET["deletedoc"])){
		$decision=$_GET["deletedoc"];
		var_dump($decision);
		echo $decision;
		if(strcmp($decision,"yes")==0){
			$query4="DELETE FROM doctor WHERE licensenum='".$doctor_licensenum."'";
			if(!mysqli_query($connect,$query4)){
				die("Deletion failed".mysqli_error($connect));
			}
			echo "Doctor Deleted!";
			}
		else if(strcmp($decision,"no")==0){
			echo "Deletion Cancelled";
		}
		}



 ?>