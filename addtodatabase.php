<?php

$status=$_GET['status'];
$sensorid=$_GET['sensorid'];

if (($status=='1') or ($status=='0')){

include 'db_connection.php';
$conn = OpenCon();
//echo "Connected Successfully";
$sql = "INSERT INTO moisture ('status','sensorid') VALUES (".$status.",".$sensorid.")";

if ($conn->query($sql) === TRUE) {
//  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
CloseCon($conn);

} else {

echo "ERROR";

}
?>