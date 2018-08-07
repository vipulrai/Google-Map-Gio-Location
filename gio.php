<?php include"getAddress.php"; ?>



<!DOCTYPE html>
<html>
  <head>
   <script type="text/javascript">
     function initGeolocation()
     {
        if( navigator.geolocation )
        {
           // Call getCurrentPosition with success and failure callbacks
           navigator.geolocation.getCurrentPosition( success, fail );
        }
        else
        {
           alert("Sorry, your browser does not support geolocation services.");
        }
     }

     function success(position)
     {

         document.getElementById('long').value = position.coords.longitude;
         document.getElementById('lat').value = position.coords.latitude
     }

     function fail()
     {
        // Could not obtain location
     }

   </script>    
 </head>

 <body onLoad="initGeolocation();">
   
     
     
 <form name="rd" method="post" action="gio.php">
<input type="text" name="long" id="long" value="">
<input type="text" name="lat" id="lat" value="">
<input type="submit" name="submit" id="submit" value="Submit">
 </form>
     
     
     <?php
     if(isset($_REQUEST['lat'])) {$latitude = $_REQUEST['lat'];}
     if(isset($_REQUEST['long'])) {$longitude = $_REQUEST['long'];}
     

         //$latitude = '38.8976805';
//$longitude = '-77.0387185';
$address = getAddress($latitude,$longitude);
$address = $address?$address:'Not found';
     
     echo"$address";
         ?>
     
     
 </body>
</html>