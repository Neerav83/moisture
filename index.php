
<?php 
header('Content-type: text/html; charset=ISO-8859-1');


?>
<html lang="SE" dir="ltr" data-locale="SE" class="">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="default">
<?php /*<meta http-equiv="refresh" content="5; url=index.php"> */
?>


<title>Fuktstatus</title>
<style>
@import url('https://font.googleapis.com/css2?family=Open+Sans:wght@300&dispay=swap');
body{
font-family: 'Open Sans',sans-serif;
}

</style>

</head>
<?php 
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/
include 'db_connection.php';

include 'classes/loginclass.php';


$email=$_GET['username'];


$user= new login($email,'password');

//echo $login->username;


$conn = OpenCon();

$userid= $user->checklogin($conn);

$user->getRooms($conn,$userid);


$antalrooms=count($user->rum);



for ($i=0;$i<$antalrooms;$i++){
    if ($i>0){
        echo "<br>";
    }
    echo $user->rum[$i]."(";
    echo $user->rumid[$i].")";
    $user->sensorid[]=[];
    $user->sensorname[]=[];
    $user->getSensors($conn,$userid, $user->rumid[$i]);

    $antalsensors=count($user->sensorid);


    for ($a=0; $a<$antalsensors;$a++){
        
        echo $user->sensorname[$a]."(".$user->sensorid[$a].")";
        echo "<br>";
      }
    
}
/*

$sql = "SELECT * FROM moisture order by id DESC LIMIT 1"; 
if ($result = $conn->query($sql)) {

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
      //    echo "id: " . $row["id"]. " - Status: " . $row["status"]. " Time:" . $row["time"]. "<br>";
      $fuktstatus=$row["status"];
    }
      } else {
        echo "0 results";
      }
  

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
CloseCon($conn);



?>


<br>
<center><h4>Fuktstatus</h4></center>
<?php

//echo $fuktstatus;

if ($fuktstatus=="1"){
?>

<body style='background-color:green; font-size:35'>
<center><img src='bilder/chili-planta.jpg' width=75%><br>
<br>Jorden är fuktig!<br>Ej behov att vattna! <br><br> <img src='bilder/smilie-glad.gif' style='width:100px;'></center>
</body>
<?php

} else {
?>

<body style='background-color:red; font-size:35px;'>
<center><img src='bilder/chili-planta.jpg' style='width:75%'>
<br>Jorden är torr <br>Vattning behövs! <br> <br> <img src='bilder/sad-smile2.png' style='width:100px;'></center>
</body>
<?php
}

//fclose($handler);

?>
*/