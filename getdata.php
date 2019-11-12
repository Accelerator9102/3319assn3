<?php 
$host="localhost";
$user="root";
$passwd="yh19981021";
$dbname="xxie66assign2db";

$connect = mysqli_connect($host,$user,$passwd,$dbname);

$query = "SELECT * FROM doctor, hospital WHERE doctor.hospitalcode=hospital.hospitalcode ORDER BY ";
$order=$_GET['order'];
if ($order == 'fname_asc'){
	$query .='fname ASC';
}else if ($order == 'fname_dsc'){
	$query .='fname DESC';
}else if ($order == 'lname_asc'){
	$query .='lname ASC';
}else if ($order == 'lname_dsc'){
	$query .='lname DESC';
}

$result = mysqli_query($connect,$query);
if(!result){
	die("query unsuccessful");
}
echo "<ol>";
while($row = mysqli_fetch_assoc($result)){
	echo "<li>";
	echo $row["fname"];
	echo '">'.$row["fname"]." " .$row["lname"]."<br>";
}
mysqli_free_result($result);
 ?>