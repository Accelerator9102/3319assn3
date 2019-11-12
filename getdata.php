<?php 
$query = "SELECT * FROM doctor ORDER BY ";
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

$result = mysqli_query( $connect, $query );
if ( !result ) {
  die( "query unsuccessful" );
}

while ( $row = mysqli_fetch_assoc( $result ) ) {
  echo '<input type="radio" name="doctor" value="';
  echo $row["licensenum"];
  echo '">'.$row["fname"]." ".$row[ "lname" ]. "<br>";
}
mysqli_free_result( $result );
?>