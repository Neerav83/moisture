
<?php 
header('Content-type: text/html; charset=latin1_swedish_ci');

?>
<html lang="SE" dir="ltr" data-locale="SE" class="">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="default">
<meta http-equiv="refresh" content="5; url=index.php?username=<?php echo $_GET['username'];?>">


<title>Fuktstatus</title>
<style>
@import url('https://font.googleapis.com/css2?family=Open+Sans:wght@300&dispay=swap');
body{
font-family: 'Open Sans',sans-serif;
margin:0px;
padding:0px;
font-size:20px;
}
.header{
  height:5%;
  background-color:green;
  color:white;
  width:100%;
  padding-top:15px;
  font-size:25px;
  font-weight: 700;
 
}
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  width:calc(100% - 30px);
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  border-radius: 15px;
  position:fixed;
  bottom:50px;
  left:15px;
}
.container{
  padding:10px;
  background-color:lightgray;
  height:92%;
  overflow:hidden;
}
</style>

</head>
<body>
  <div class=header>
    <center>PlantSensor</center>
  </div>
  <div class=container>
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

$conn = OpenCon();
$userid= $user->checklogin($conn);
$user->getRooms($conn,$userid);
$antalrooms=count($user->rum);


for ($i=0;$i<$antalrooms;$i++){
    if ($i>0){
        echo "<br>";
    }
    echo "<b>".utf8_encode($user->rum[$i])."</b>";
  //  echo "(".$user->rumid[$i].")";
    
    unset($user->sensorid);
    unset($user->sensorname);

    $user->getSensors($conn,$userid, $user->rumid[$i]);

    $antalsensors=count($user->sensorid);

    //echo $antalsensors;

    for ($a=0; $a<$antalsensors;$a++){
        
      $user->getSensorStatus($conn,$user->sensorid[$a]);

     //   echo "<br>".utf8_encode($user->sensorname[$a])."(".$user->sensorid[$a].") - ";
     echo "<br>".utf8_encode($user->sensorname[$a])." - ";
     
     if ($user->sensorstatus=="1") {
         echo "<label style='font-size:15px; background-color:lightgreen'>Plantan är fuktig";
        } else {
          echo "<label style='font-size:15px; background-color:lightred'>Plantan är torr";

        }
        echo "(".$user->sensortime.")</label>";        

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

?>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<button class='button'>Lägg till Växt</button>
</div>
</body>
</html>