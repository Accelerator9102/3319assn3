<?php 
	$query='SELECT * FROM doctor';
	$result = mysqli_query( $connect, $query );
if ( !result ) {
  die( "query unsuccessful" );
}

while ( $row = mysqli_fetch_assoc( $result ) ) {
  echo '<option value="';
  echo $row["licensenum"];
  echo '">'.$row["fname"]." ".$row[ "lname" ]. "</option>";
}
mysqli_free_result( $result );



 ?>