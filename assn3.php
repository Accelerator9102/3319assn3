<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>xxie66assignment3</title>
</head>
<body>
<?php
$host = "localhost";
$user = "root";
$passwd = "yh19981021";
$dbname = "xxie66assign2db";

$connect = new mysqli_connect( $host, $user, $passwd, $dbname );
?>
<h1>Welcome to Xiaoyu's Assignment3!</h1>
<h2>Doctor Info</h2>
<form action="getdata.php" method="post">
<?php


$query = "SELECT * FROM doctor, hospital WHERE doctor.hospitalcode=hospital.hospitalcode ORDER BY ";
$order = $_GET[ 'order' ];
if ( $order == 'fname_asc' ) {
  $query .= 'fname ASC';
} else if ( $order == 'fname_dsc' ) {
  $query .= 'fname DESC';
} else if ( $order == 'lname_asc' ) {
  $query .= 'lname ASC';
} else if ( $order == 'lname_dsc' ) {
  $query .= 'lname DESC';
}

$result = $connect->query($query);
if ( !result ) {
  die( "query unsuccessful" );
}
echo "<ol>";
while ( $row = $result->fetch_assoc() ) {
  echo "<li>";
  echo $row[ "fname" ];
  echo '>' . $row[ "fname" ] . "<br>";
}
mysqli_free_result( $result );
?>
<table>
  <thead>
    <tr>
      <th>First Name<br>
        <a href="getdata.php?order=fname_asc"> <img src="arrow_down.png" alt="Sort from A to Z"> </a> <a href="getdata.php?order=fname_dsc"> <img src="arrow_up.png" alt="Sort from Z to A"> </a> </th>
      <th>Last Name<br>
        <a href="getdata.php?order=lname_asc"> <img src="arrow_down.png" alt="Sort from A to Z"> </a> <a href="getdata.php?order=lname_dsc"> <img src="arrow_up.png" alt="Sort from Z to A"> </a> </th>
    </tr>
  </thead>
  <tbody>
  </tbody>
</table>
</body>
</html>