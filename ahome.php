<?php header("Content-Type: application/json; charset=UTF-8"); ?>
<?php

$obj = json_decode($_POST["user"], false);
//echo json_encode($obj->usrEmail);

// Create connection
$conn = mysqli_connect("localhost","root","","ipl") or die(mysqli_connect_error());
// Check connection

$emailid=$obj->usrEmail;
//$emailid = "ralop@ertocp.com";
$output = array();

$sql = "SELECT * from player where id ='$emailid'";
//echo $sql;
$result = mysqli_query($conn, $sql);
 while($row = mysqli_fetch_assoc($result)) {
	$output[]=$row;
  }
$sresult = json_encode($output);
echo $sresult;
mysqli_close($conn);
?>