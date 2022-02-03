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
$handler =fopen("/home/pi/soil-moisture-sensor/fuktstatus.txt","r");
$fuktstatus= fread($handler,20);

if ($fuktstatus=="Fukt!"){
?>

<body style='background-color:green; font-size:35'>
<center><img src='bilder/chili-planta.jpg' width=75%><br>
<br>Fuktig jord!<br>Ej behov att vattna! <br> <img src='smilie-glad.gif' style='width:100px;'></center>
</body>
<?php

} else {
?>

<body style='background-color:red; font-size:35px;'>
<center><img src='bilder/chili-planta.jpg' style='width:75%'>
<br>Jorden är torr <br>Vattning behövs! <br> :(</center>
</body>
<?php
}

fclose($handler);

?>
