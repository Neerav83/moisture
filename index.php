<?php 


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include 'db_connection.php';

include 'classes/loginclass.php';

$login= new login('username','password');

echo $login->username;


$conn = OpenCon();

echo $login->checklogin($conn);




//echo "Connected Successfully";

$email="XXX";

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



<html lang="SE" dir="ltr" data-locale="SE" class="">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="default">
<meta http-equiv="refresh" content="5; url=index.php">


<title>Fuktstatus</title>
<style>
@import url('https://font.googleapis.com/css2?family=Open+Sans:wght@300&dispay=swap');
body{
font-family: 'Open Sans',sans-serif;
}

</style>

</head>
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