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
      <th>First Name<br>
        <a href="assn3.php?order=fname_asc"> <img src="arrow_down.png" width="25px" alt="Sort from A to Z"> </a> <a href="assn3.php?order=fname_dsc"> <img src="arrow_up.png" width="25px" alt="Sort from Z to A"> </a> </th>
      <th>Last Name<br>
        <a href="assn3.php?order=lname_asc"> <img src="arrow_down.png" width="25px" alt="Sort from A to Z"> </a> <a href="assn3.php?order=lname_dsc"> <img src="arrow_up.png" width="25px" alt="Sort from Z to A"> </a> </th>
    </tr>
  </thead>
  <tbody>
  </tbody>
</table>
<form action="getmoreinfo.php" method="post">
<?php
	include 'getdata.php';
?>
<input type="submit" value="Get More Info">
</form>
<?php 
mysqli_close($connect);
?>

</body>
</html>