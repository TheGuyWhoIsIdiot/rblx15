<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/config/main.php';
   $scripts = array(
   37801172,
   60595695,
   59002209,
   46295863,
   36868950,
   153556783,
   48488235,
   53878047,
   89449093,
   53878057,
   64164692,
   152908679
   );
   if(in_array($_GET['id'], $scripts)){
	   $hostscriptsigned = gameUtils::signv1(file_get_contents("./scripts/".$_GET['id']));
	   header("Content-type: text/plain");
	   die($hostscriptsigned);

   }
  Header("Location: https://assetdelivery.roblox.com/v1/asset/?id=".$_GET['id']);
?>