<!DOCTYPE html>

<html>
	
	<head>
		<meta charset = "utf-8" />
		<title>RasPi MWS</title>
		<link rel="stylesheet" type="text/css" href="main.css">
            <script type="text/javascript">
<!--

function updateClock ( )
{
  var currentTime = new Date ( );

  var currentHours = currentTime.getHours ( );
  var currentMinutes = currentTime.getMinutes ( );
  var currentSeconds = currentTime.getSeconds ( );

  // Pad the minutes and seconds with leading zeros, if required
  currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
  currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;

  // Convert an hours component of "0" to "12"
  currentHours = ( currentHours == 0 ) ? 12 : currentHours;

  // Compose the string for display
  var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds ;

  // Update the time display
  document.getElementById("clock").firstChild.nodeValue = currentTimeString;
  
}

// -->
</script>
<style type="text/css">
.Time {
font-family:Arial;
margin:0px 10px 0px 50px;
font-size:24px;
color:#EEEEEE;
}
            </style>
            
            
<?php
//File to read
$file = '/sys/devices/w1_bus_master1/10-000802292522/w1_slave';

//Read the file line by line
$lines = file($file);

//Get the temp from second line 
$temp = explode('=', $lines[1]);

//Setup some nice formatting (i.e. 21,3)
$temp = number_format($temp[1] / 1000, 1, ',', '');

//And echo that temp
echo $temp . " °C";
?>
</head>
	<body onload="updateClock(); setInterval('updateClock()', 1000 )">

   	<div class="divHeader">
	  <h1 class="Header" >Raspberry Pi Hava İstasyonu</h1>
    </div>
        	
    <h1 align="center" class="MainMenu">Anlık Değerler</h1>
    <div align="left" style="padding:0px 0px 10px 0px"><span class="Time" id="clock" >&nbsp;</span> </div>
    <div align="left" style="padding:0px 0px 10px 0px"><span class="Time" ><?php echo $temp ?></span></div>
	</body>
</html>