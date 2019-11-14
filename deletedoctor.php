<?php 
include 'connectdb.php';
?>
<?php
	if(!empty($_GET["deletedoc"])){
		$decision=$_GET["deletedoc"];
		var_dump($decision);
		echo $decision;
		if(strcmp($decision,"yes")==0){
			$query4="DELETE FROM doctor WHERE licensenum='".$doctor_licensenum."'";
			echo $query4;
			if(!mysqli_query($GLOBALS['connect'],$query4)){
				die("Deletion failed".mysqli_error($GLOBALS['connect']));
			}
			echo "Doctor Deleted!";
			}
		else if(strcmp($decision,"no")==0){
			echo "Deletion Cancelled";
		}
		}

mysqli_close($connect);

 ?>