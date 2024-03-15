<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/config/main.php';
header("content-type: text/plain");
$id = $_GET["id"];
header("Location: https://assetdelivery.roblox.com/v1/asset/?id=". $id . "");
?>