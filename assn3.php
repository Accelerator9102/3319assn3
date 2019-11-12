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
	<form action="getdata.php" method="post">
	<?php 
	include 'getdata.php';
	 ?>
	<table>
		<thead>
			<tr>
				<th>First Name<br>
					<a href="getdata.php?order=fname_asc">
						<img src="arrow_down.png" alt="Sort from A to Z">
					</a>
					<a href="getdata.php?order=fname_dsc">
						<img src="arrow_up.png" alt="Sort from Z to A">
					</a>
				</th>
				<th>Last Name<br>
					<a href="getdata.php?order=lname_asc">
						<img src="arrow_down.png" alt="Sort from A to Z">
					</a>
					<a href="getdata.php?order=lname_dsc">
						<img src="arrow_up.png" alt="Sort from Z to A">
					</a>
				</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
</body>
</html>