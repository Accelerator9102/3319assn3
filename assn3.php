<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>xxie66assignment3</title>
</head>
<body>
<?php
include 'connectdb.php';
?>
<h1>Welcome to Xiaoyu's Assignment3!</h1>
<h2>Doctor Info</h2>
<table>
  <thead>
    <tr>
      <th align="left">First Name<br>
        <a href="assn3.php?order=fname_asc"> <img src="arrow_down.png" width="25px" alt="Sort from A to Z"> </a> <a href="assn3.php?order=fname_dsc"> <img src="arrow_up.png" width="25px" alt="Sort from Z to A"> </a> </th>
      <th align="right">Last Name<br>
        <a href="assn3.php?order=lname_asc"> <img src="arrow_down.png" width="25px" alt="Sort from A to Z"> </a> <a href="assn3.php?order=lname_dsc"> <img src="arrow_up.png" width="25px" alt="Sort from Z to A"> </a> </th>
    </tr>
  </thead>
  <tbody>
  </tbody>
</table><br>
<form action="getmoreinfo.php" method="post">
<?php
	include 'getdata.php';
?>
<input type="submit" value="Get More Info">
</form>

<form name="form1" action="assn3.php" method="post">
	Select date: <input type="date" name="d" value=""><br>
	<input type="submit" value="Submit!">
</form>
<?php 

$date = $_POST['d'];
if ($date!="") {

	$query1='SELECT * FROM doctor WHERE doctor.datelicensed<"'.$date.'"';
	$result1=mysqli_query($connect,$query1);
	while ( $row1 = mysqli_fetch_assoc( $result1 ) ) {
  		echo $row1["fname"]." ".$row1[ "lname" ]. " ".$row1["specialty"]." ".$row1["datelicensed"]."<br>";
}
}


?>
<p>
	<hr>
</p>
<h2>ADD A NEW DOCTOR</h2>

<form action="addnewdoctor.php" method="post" target="_blank">
	New Doctor's First Name: <input type="text" name="doctorfname"><br>
	New Doctor's Last Name: <input type="text" name="doctorlname"><br>
	New Doctor's License Number: <input type="text" name="doctorlicensenum"><br>
	New Doctor's Specialty: <input type="text" name="doctorspecialty"><br>
	New Doctor's Date Get License: <input type="text" name="doctordatelicensed"><br>
	New Doctor's Hospital: <br>
	<?php
	$query2="SELECT * FROM hospital";
	$result2=mysqli_query($connect,$query2);
	while($row2=mysqli_fetch_assoc($result2)){
		echo '<input type="radio" name="hospitalname" value="';
		echo $row2["hospitalcode"];
		echo '">'.$row2["name"]."in ".$row2["city"].", ".$row2["province"]."<br>";
	} 
	
	 ?>
	 <input type="submit" value="Add New Doctor">

</form>
<p>
	<hr>
</p>
<h2>DELETE A DOCTOR</h2>
<iframe  id="submitFrame" style="display: none;width:0; height:0" name="submitFrame"  src="about:blank"></iframe>
<form action="assn3.php" method="get" target="submitFrame">

<select name="doctorlicensenumber">
	<option selected="selected" value="None">Select Doctor: </option>
<?php 
include 'getdoctorlist.php' ?>
</select>
<input type="submit" value="Delete Doctor">
</form>
<?php
	$doctor_licensenum=$_GET["doctorlicensenumber"];
	var_dump($doctor_licensenum);
	echo $doctor_licensenum;
	$equal=strcmp($doctor_licensenum,"None");
	var_dump($equal);
	echo $equal;
	if(strcmp($doctor_licensenum,"None")!=0){
	$query3='SELECT * FROM treats';
	$result=mysqli_query($connect,$query3);
	$existence=2;
	while($row=mysqli_fetch_assoc($result)){
		if(strcmp($row["licensenum"],$doctor_licensenum)==0){
			$existence=1;
			echo $existence."success1";
			break;
		}
		else{
			$existence=0;
			echo $existence."success0";
		}
	}
	var_dump($existence==1);
	if($existence==1){
		echo $existence."success";
		echo "Doctor going to be deleted is currently treating a patient!"."<br>";
		echo "continue?";
		echo '<form action="assn3.php" method="post">';
		echo '<input type="radio" name="deletedoc" value="yes">Of Course!';
		echo '<input type="radio" name="deletedoc" value="no">Noooooo!';
		echo '<input type="submit" value="Good to Go!">';
		echo '</form>';
		if(!empty($_POST["deletedoc"])){
		$decision=$_POST["deletedoc"];
		var_dump($decision);
		echo $decision;
		if(strcmp($decision,"yes")){
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
	}
	else if($existence==0){
		$query4="DELETE FROM doctor WHERE licensenum='".$doctor_licensenum."'";
		if(!mysqli_query($connect,$query4)){
			die("Deletion failed".mysqli_error($connect));
		}
		echo "Doctor Deleted.";
	}


	}

?>


</body>
</html>