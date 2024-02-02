<?php 
  session_start(); // start a session
  $image = imagecreate(95, 33); //create blank image (width, height)
  $bgcolor = imagecolorallocate($image, 127, 127, 127); //add background color with RGB.
  $textcolor = imagecolorallocate($image, 223, 223, 223); //add text/code color with RGB.
  //$code = rand(1000, 9999); //create a random number between 1000 and 9999
  $code = rand(10000, 99999);	
		
  $_SESSION['code'] = ($code); //add the random number to session 'code'
	  
  //imagestring($image, 10, 8, 3, $code, $textcolor); //create image with all the settings above.
  imagestring($image, 10, 25, 8, $code, $textcolor);
  header ("Content-type: image/png"); // define image type
  imagepng($image); //display image as PNG
	  
?>