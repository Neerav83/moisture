<?php 
header('Content-type: text/html; charset=latin1_swedish_ci');

?>
<html lang="SE" dir="ltr" data-locale="SE" class="">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="default">
<?php 
$username=$_POST['username'];
if ($_POST['username']=="") {
 $username=$_GET['username']; 
}
?>
<meta http-equiv="refresh" content="5; url=index.php?username=<?php echo $username;?>"> 


<title>Fuktstatus</title>
<style>
@import url('https://font.googleapis.com/css2?family=Open+Sans:wght@300&dispay=swap');
body{
font-family: 'Open Sans',sans-serif;
margin:0px;
padding:0px;
font-size:20px;
background-image: url("bilder/chili-planta.jpg");
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
  bottom:115px;
  left:15px;
}

.logoutbutton {
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
  background-color:rgba(211,211,211,0.8);
  height:92%;
  overflow:hidden;
}

.input {
  padding:15px;
  width:calc(100% - 30px);
  height:50px;
}
#addsensor{
  position:fixed;
  width:100%;
  top:0;
  height:100%;
  display: hidden;
  background-color: white;
}

</style>
<script>
function loggaut(){
  window.location.replace("index.php");

}
function showaddsensor(){
  document.getElementById("addsensor").display="block";
}
</script>

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

if ($username==""){

  ?>
  <center>
<br><br><br>  
<h2>Logga In</h2>
<form method=post> 

  Användarnamn:<br>
  <input class='input' type=text name=username><br>
  <br>
  <input class='input' type=submit value="Logga in">
</form>
</center>
  <?php

} else {

include 'db_connection.php';
include 'classes/loginclass.php';

$email=$username;

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
     echo "<br><font style='font-size:15px'>".utf8_encode($user->sensorname[$a])." - </font>";
     
     if ($user->sensorstatus=="1") {
         echo "<label style='font-size:15px; background-color:lightgreen'>Plantan är fuktig ";
        } else {
          echo "<label style='font-size:15px; background-color:lightred'>Plantan är torr ";

        }
        echo "(".$user->sensortime.")</label>";        

         }
    
}

?>
<button class='button' onclick=showaddsensor();>Lägg till Sensor</button>
<br>
<button class='logoutbutton' style='background-color:red;' onclick=loggaut();>Logga ut</button>
<?php
}
?>

</div>
</body>
</html>


<div id=addsensor>
  <form method=post>
  Sensornamn:<br>
  <input type='text' name=sensorname><br>
  Välj Rum:<br>
  <input type='text' name=room><br>
  <input type='hidden' name=username value='<?php echo $username;?>'>

  <input type=submit class='input'>Lägg till Sensor</button>
</div>