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
            
</head>
	<body onLoad="updateClock(); setInterval('updateClock()', 1000 )">

   	<div class="divHeader">
	  <h1 class="Header" >Raspberry Pi Hava İstasyonu</h1>
    </div>
        	
    <h1 align="center" class="MainMenu">Anlık Değerler</h1>
    <div align="left" style="padding:0px 0px 10px 0px"><span class="Time" id="clock" >&nbsp;</span> 
    <span>
    <?php
		set_time_limit(0);
		include "PhpSerial.php";
		$serial = new phpSerial;
		$serial->deviceSet("COM3");
		$serial->confBaudRate(9600);
		$serial->confParity("none");
		$serial->confCharacterLength(8);
		$serial->confStopBits(1);
		$serial->confFlowControl("none");
		
		$serial->deviceOpen();
		
		$read = $serial->readPort();
		echo $read;
		sleep(1);
		$serial->deviceClose();
		
	
	?>
	</span>
    </div>
	</body>
</html>